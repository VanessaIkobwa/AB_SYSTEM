<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LecturerSchedule;
use App\Mail\AppointmentCreated;
use App\Mail\AppointmentUpdated;
use App\Models\Appointment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;


class RescheduleForm extends Component
{
    public $lecturer_details;
    public $selectedDate;
    public $appointment_details;
    public $availableDates = [];
    public $timeSlots = [];

    public function mount($appointment_id)
    {

        $this->appointment_details = Appointment::find($appointment_id);
        $this->lecturer_details = $this->appointment_details->lecturer;
        $this->fetchAvailableDates($this->lecturer_details);
    }

    public function updateAppointment($slot){
        $carbonDate = Carbon::parse($this->selectedDate)->format('Y-m-d');
        $updateAppointment = Appointment::find($this->appointment_details->id);
        $updateAppointment->update([
            'appointment_date' => $carbonDate,
            'appointment_time' => $slot,
        ]);
    
        $appointmentEmailData = [
            'old_date' => $this->appointment_details->appointment_date,
            'old_time' => $this->appointment_details->appointment_time,
            'date' => $this->selectedDate,
            'time' => Carbon::parse($slot)->format('H:i A'),
            'location' => 'ABC Office',
            'student_name' => auth()->user()->name,
            'student_email' => auth()->user()->email,
            'lecturer_name' => $this->lecturer_details->lecturerUser->name,
            'lecturer_email' => $this->lecturer_details->lecturerUser->email,
            'lecturer_specialization' => $this->lecturer_details->unit->unit_name,
        ];

        $this->sendAppointmentNotification($appointmentEmailData);

        session()->flash('message','appointment with .'.$this->lecturer_details->lecturerUser->name.' on '.$this->selectedDate.$slot.' was created!');
        if (auth()->user()->role == 0) {
            return $this->redirect('/my/appointments');
        } elseif(auth()->user()->role == 1) {
            return $this->redirect('/lecturer/appointments');
        }elseif (auth()->user()->role == 3) {
            return $this->redirect('/academic_admin/appointments');
        }
              
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
     //   $appointmentData['recipient_name'] = 'Admin Admin';
     //   $appointmentData['recipient_role'] = 'admin';
     //   Mail::to('veemwoko@gmail.com')->send(new AppointmentCreated($appointmentData));

        // Send to Academic_Admin
       $appointmentData['recipient_name'] = 'Academic_Admin Academic_Admin';
      $appointmentData['recipient_role'] = 'academic_admin';
       Mail::to('nessazipporahikim@gmail.com')->send(new AppointmentUpdated($appointmentData));

        // Send to Lec
       $appointmentData['recipient_name'] = $appointmentData['lecturer_name'];
       $appointmentData['recipient_role'] = 'lecturer';
        Mail::to($appointmentData['lecturer_email'])->send(new AppointmentUpdated($appointmentData));

        // Send to student
       $appointmentData['recipient_name'] = $appointmentData['student_name'];
      $appointmentData['recipient_role'] = 'student';
     Mail::to($appointmentData['student_email'])->send(new AppointmentUpdated($appointmentData));

     return 'Appointment notifications sent successfully!';
   }


    public function render()
    {
        return view('livewire.reschedule-form');
    }
}