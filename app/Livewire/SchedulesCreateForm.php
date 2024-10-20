<?php

namespace App\Livewire;

use Livewire\Component;

class SchedulesCreateForm extends Component
{
    public $daysOfweek = [
        '0' => 'Sunday',
        '1' => 'Monday',
        '2' => 'Tuesday',
        '3' => 'Wednesday',
        '4' => 'Thursday',
        '5' => 'Friday',
        '6' => 'Saturday', 
    ];



    public function render()
    {
        return view('livewire.schedules-create-form');
    }
}
