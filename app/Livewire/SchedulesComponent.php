<?php

namespace App\Livewire;

use App\Models\LecturerSchedule;
use Livewire\Component;

class SchedulesComponent extends Component
{
    public $daysOfweek;

    public function mount()
    {
        $this->daysOfweek = [
            '0' => 'Sunday',
            '1' => 'Monday',
            '2' => 'Tuesday',
            '3' => 'Wednesday',
            '4' => 'Thursday',
            '5' => 'Friday',
            '6' => 'Saturday', 
        ];
    }

    public function render()
    { 
        $user_id = auth()->user()->id;

        return view('livewire.schedules-component',[
            'schedules' => LecturerSchedule::with('lecturer')
            ->whereHas('lecturer',function($query) use($user_id)
            {
                $query->where('user_id',$user_id);
            })->get()
        ]);
    }
}
