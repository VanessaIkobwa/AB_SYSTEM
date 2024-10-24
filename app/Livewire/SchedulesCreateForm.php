<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Lecturer;
use App\Models\LecturerSchedule;


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

    public $available_day = '';
    public $from = '';
    public $to = '';


public function save()
{
    $this->validate([
        'available_day' => 'required',
        'from' => 'required',
        'to' => 'required',
    ]);

    $user_id = auth()->user()->id;
    $lecturer_details = Lecturer::where('user_id',$user_id)->first();
    $newSchedule = new LecturerSchedule;
    $newSchedule->lecturer_id = $lecturer_details->id;
    $newSchedule->available_day = $this->available_day;
    $newSchedule->from = $this->from;
    $newSchedule->to = $this->to;
    $newSchedule->save();

    session()->flash('message','. Slot created successfully');
    return redirect('/lecturer/schedules');


}

    public function render()
    {
        return view('livewire.schedules-create-form');
    }
}
