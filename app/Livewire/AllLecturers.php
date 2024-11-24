<?php

namespace App\Livewire;
use App\Models\Lecturer; 


use Livewire\Component;

class AllLecturers extends Component
{
    public function render()
    {
        return view('livewire.all-lecturers',[
            'all_lecturers'=> Lecturer::with(['unit', 'lecturerUser'])->get()
        ]);
    }
}
