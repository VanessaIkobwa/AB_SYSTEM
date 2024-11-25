<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\LecturerSchedule;
use App\Models\Appointment;
use App\Mail\AppointmentCreated;
use Illuminate\Support\Facades\Mail;
//use App\Models\Lecturer;
//use App\Models\User;
//use Illuminate\Support\Facades\DB;


class BookingComponent extends Component
{ 
    public $lecturer_details;
  //  public $appointment_type;
    public $selectedDate;
    public $availableDates = [];
    public $timeSlots = [];

    public function mount($lecturer)
    {
        $this->lecturer_details = $lecturer;

        $this->fetchAvailableDates($this->lecturer_details);
    }
    

    public function bookAppointment($slot){
        $carbonDate = Carbon::parse($this->selectedDate)->format('Y-m-d');
        $newAppointment = new Appointment();
        $newAppointment->student_id = auth()->user()->id;
        $newAppointment->lecturer_id = $this->lecturer_details->id;
        $newAppointment->appointment_date = $carbonDate;
        $newAppointment->appointment_time = $slot;
      //  $newAppointment->appointment_type = $this->appointment_type;
        $newAppointment->save();

        $appointmentEmailData = [
            'date' => $this->selectedDate,
            'time' => Carbon::parse($slot)->format('H:i A'),
            'location' => 'ABC Office',
            'student_name' => auth()->user()->name,
            'student_email' => auth()->user()->email,
            'lecturer_name' => $this->lecturer_details->lecturerUser->name,
            'lecturer_email' => $this->lecturer_details->lecturerUser->email,
           // 'appointment_type' => $this->appointment_type == 0 ? 'on-site' : 'live consultation',
            'lecturer_specialization' => $this->lecturer_details->unit->unit_name,
        ];
        $this->sendAppointmentNotification($appointmentEmailData);


        session()->flash('message','appointment with '.$this->lecturer_details->lecturerUser->name.' on '.$this->selectedDate.$slot.' was created!');

        return $this->redirect('/my/appointments');
    }

    public function fetchAvailableDates($lecturer)
    {
        $schedules = LecturerSchedule::where('lecturer_id', $lecturer->id)
            ->get();

        $availability = [];
        foreach ($schedules as $schedule) {
            $dayOfWeek = $schedule->available_day; //0 - sunday
            $fromTime = Carbon::createFromFormat('H:i:s', $schedule->from);
            $toTime = Carbon::createFromFormat('H:i:s', $schedule->to);
            $availability[$dayOfWeek] = [
                'from' => $fromTime,
                'to' => $toTime,
            ];
        }

        $dates = [];
        $today = Carbon::today();
        for ($i = 0; $i < 365; $i++) { //1 year
            $date = $today->copy()->addDays($i);
            $dayOfWeek = $date->dayOfWeek;

            if (isset($availability[$dayOfWeek])) {
                $dates[] = $date->format('Y-m-d');
            }
        }

        $this->availableDates = $dates;
    }



    public function selectDate($date)
    {
        $this->selectedDate = $date;
        $this->fetchTimeSlots($date, $this->lecturer_details);
    }
 



    public function fetchTimeSlots($date, $lecturer)
    {
        $dayOfWeek = Carbon::parse($date)->dayOfWeek; //0 , 1... 5
        $carbonDate = Carbon::parse($date)->format('Y-m-d');
        $schedule = LecturerSchedule::where('lecturer_id', $lecturer->id)
            ->where('available_day', $dayOfWeek)
            ->first();

        if ($schedule) {
            $fromTime = Carbon::createFromFormat('H:i:s', $schedule->from);
            $toTime = Carbon::createFromFormat('H:i:s', $schedule->to);

            $slots = [];
            while ($fromTime->lessThan($toTime)) {

                $timeSlot = $fromTime->format('H:i:s');
                $appointmentExists = Appointment::where('lecturer_id', $lecturer->id)
                    ->where('appointment_date', $carbonDate)
                    ->where('appointment_time', $timeSlot)
                    ->exists();
                if (!$appointmentExists) {
                    $slots[] = $timeSlot;
                }

                $fromTime->addHour();
            }

            $this->timeSlots = $slots;
                    // dd($this->timeSlots);

        } else {
            $this->timeSlots = [];
        }
    }


    public function sendAppointmentNotification($appointmentData)
    {
        // Send to Admin
        $appointmentData['recipient_name'] = 'Admin Admin';
        $appointmentData['recipient_role'] = 'admin';
        Mail::to('veemwoko@gmail.com')->send(new AppointmentCreated($appointmentData));

        // Send to Academic_Admin
        $appointmentData['recipient_name'] = 'Academic_Admin Academic_Admin';
        $appointmentData['recipient_role'] = 'academic_admin';
        Mail::to('nessazipporahikim@gmail.com')->send(new AppointmentCreated($appointmentData));

        // Send to Lec
        $appointmentData['recipient_name'] = $appointmentData['lecturer_name'];
        $appointmentData['recipient_role'] = 'lecturer';
        Mail::to($appointmentData['lecturer_email'])->send(new AppointmentCreated($appointmentData));

        // Send to student
        $appointmentData['recipient_name'] = $appointmentData['student_name'];
        $appointmentData['recipient_role'] = 'student';
        Mail::to($appointmentData['student_email'])->send(new AppointmentCreated($appointmentData));

        return 'Appointment notifications sent successfully!';
    }

    public function render()
    {
        return view('livewire.booking-component', [
            'availableDates'=> $this->availableDates,
        ]);
    }
}
