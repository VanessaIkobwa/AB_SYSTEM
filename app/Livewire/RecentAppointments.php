<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;


class RecentAppointments extends Component
{
    public $recent_appointments;

    public function mount()
    {
        //sorting the appointments by months, from the most recent month. limit 10 rows..
        $this->recent_appointments = Appointment::with('student','lecturer')->orderBy('appointment_date','ASC')
        ->limit(10)->get();
    }
 
    public function render()
    {
        return view('livewire.recent-appointments');
    }
}
