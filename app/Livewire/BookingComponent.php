<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;

class BookingComponent extends Component
{ 
    public $lecturer_details;
    public $appointment_type;
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
        $newAppointment->appointment_type = $this->appointment_type;
        $newAppointment->save();

        $appointmentEmailData = [
            'date' => $this->selectedDate,
            'time' => Carbon::parse($slot)->format('H:i A'),
            'location' => '123 Office',
            'student_name' => auth()->user()->name,
            'student_email' => auth()->user()->email,
            'lecturer_name' => $this->lecturer_details->lecturerUser->name,
            'lecturer_email' => $this->lecturer_details->lecturerUser->email,
            'appointment_type' => $this->appointment_type == 0 ? 'on-site' : 'live consultation',
            'lecturer_specialization' => $this->lecturer_details->unit->unit_name,
        ];
        // dd($appointmentEmailData);
        $this->sendAppointmentNotification($appointmentEmailData);

        session()->flash('message','appointment with.'.$this->lecturer_details->lecturerUser->name.' on '.$this->selectedDate.$slot.' was created!');

        return $this->redirect('/my/appointments',navigate: true);
    }

    public function render()
    {
        return view('livewire.booking-component');
    }
}
