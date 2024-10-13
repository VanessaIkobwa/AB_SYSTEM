<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Units; 


class FacultySection extends Component
{

    public $unit_card;

    public function mount()
    {
        $this->unit_card= Units::all();
    }

    public function render()
    {
        return view('livewire.faculty-section');
    }
}
