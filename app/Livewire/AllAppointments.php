<?php

namespace App\Livewire;

use App\Models\Appointment;
use Livewire\Component;

class AllAppointments extends Component
{

    public $all_appointments;

    //form relationships in Appointment Model
    public function mount()
    {
        $this->all_appointments = Appointment::with('student','lecturer')->get();
    }

    public function render()
    {
        return view('livewire.all-appointments');
    }
}
