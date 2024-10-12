<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Lecturer;


class LecturerListingComponent extends Component
{
    public $lecturers;

    public function mount()
    {
        $this->lecturers = Lecturer::with('unit','lecturerUser')->get();
    }
    public function render()
    {
        return view('livewire.lecturer-listing-component',
    [
        'lecturers'=> Lecturer::all()
       // 'lecturers' => $this->lecturers,
    ]
    );
    }
}
