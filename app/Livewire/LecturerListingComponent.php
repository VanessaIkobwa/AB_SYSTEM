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

    public function featured($id)
    {
        $lecturer = Lecturer::find($id);
        
        if ($lecturer->is_featured == 1)
        {
            $lecturer->update([
                'is_featured' => 0
            ]);
        }
         else 
        {
            $lecturer->update([
                'is_featured' => 1
            ]);
        }
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
