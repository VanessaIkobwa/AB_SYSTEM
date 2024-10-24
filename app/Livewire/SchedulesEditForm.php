<?php

namespace App\Livewire;

use App\Models\LecturerSchedule;
use Livewire\Component;

class SchedulesEditForm extends Component
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

    public $schedules;
    public $available_day;
    public $from;
    public $to;


    public function update()
    {
        $this->validate(
            [
                'available_day' => 'required',
                'from' => 'required',
                'to' => 'required',

            ] );

            LecturerSchedule::where('id',$this->schedules->id)->update([

                'available_day' => $this->available_day,
            'from' => $this->from,
            'to' => $this->to,
            ]);
            
    session()->flash('message','. Slot updated successfully');

    
    return redirect('/lecturer/schedules');

            
    }

    public function mount($schedule_id)
    {
        $this->schedules = LecturerSchedule::find($schedule_id);
        $this->from = $this->schedules->from;
        $this->to = $this->schedules->to;


    }

    public function render()
    {
        return view('livewire.schedules-edit-form');
    }
}
