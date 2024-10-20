<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Lecturer; 

class FeaturedLecturers extends Component
{

    public $featuredLecturers;

    public function mount($unit_id)
    {
        if ($unit_id != 0) {
            
            $this->featuredLecturers = Lecturer::with(['unit', 'lecturerUser'])
            ->whereHas('unit',function($query) use($unit_id)
            {
                $query->where('id',$unit_id);
            }
            )->get();

        } else {
        
            $this->featuredLecturers = Lecturer::with('unit', 'lecturerUser')->get();
            
        }
        


    }
    public function render()
    {
        return view('livewire.featured-lecturers',  [
            'lecturers' => $this->featuredLecturers,
        ]);
    }
}
