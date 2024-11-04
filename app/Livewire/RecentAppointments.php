<?php

namespace App\Livewire;

use App\Models\Lecturer;
use Livewire\Component;
use App\Models\Appointment;
use Livewire\WithPagination;

class RecentAppointments extends Component
{
    public function render()
    {

        if(auth()->user() && auth()->user()->role == 1){
            $user_lecturer = auth()->user(); 
            $lecturer = Lecturer::where('user_id',$user_lecturer->id)->first();
        
            return view('livewire.recent-appointments',[
                'recent_appointments' => Appointment::with('student','lecturer')
                ->where('lecturer_id',$lecturer->id)
                ->get()
            ]);
        }
        
        if(auth()->user() && auth()->user()->role == 0){
            $student = auth()->user(); 
        
            return view('livewire.recent-appointments',[
                'recent_appointments' => Appointment::with('student','lecturer')
                ->where('student_id',$student->id)
                ->limit(10)
                ->get()
            ]);
        }
        return view('livewire.recent-appointments',[
            'recent_appointments' => Appointment::with('student','lecturer')
            ->limit(10)
          ->get()
        ]);
    }
}