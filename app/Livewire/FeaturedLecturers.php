<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Lecturer; 

class FeaturedLecturers extends Component
{

    public $featuredLecturers;

    public function mount()
    {
        $this->featuredLecturers = Lecturer::with('unit', 'lecturerUser')->get();
    }
    public function render()
    {
        return view('livewire.featured-lecturers');
    }
}
