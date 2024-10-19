<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\LecturerSchedule;
use App\Models\Appointment;
//use App\Mail\AppointmentCreated;
//use Illuminate\Support\Facades\Mail;
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
        $schedule = LecturerSchedule::where('lecturer_id', 1)
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


  

    public function render()
    {
        return view('livewire.booking-component', [
            'availableDates'=> $this->availableDates,
        ]);
    }
}
