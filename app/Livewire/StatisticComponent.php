<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Units;
use App\Models\Appointment;
use App\Models\Lecturer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticComponent extends Component
{
    public $users_count = 0;
    public $lecturers_count = 0;
    public $students_count = 0;
    public $units_count = 0;
    public $academic_admin_count = 0;
    public $appointments_count = 0;
    public $lecturer_appointments_count = 0;
    public $upcoming_appointments_count = 0;
    public $complete_appointments_count = 0;
    public $last_week_appointments_count = 0;
    public $last_month_appointments_count = 0;
    public $last_week_users_count = 0;
    public $last_month_users_count = 0;

    public $last_week_lecturer_count = 0;
    public $last_month_lecturer_count = 0;

    public $last_week_student_count = 0;
    public $last_month_student_count = 0;

    public $last_week_academic_count = 0;
    public $last_month_academic_count = 0;
    

    



    public function mount()
    {
        $this->users_count = User::count();
        $this->lecturers_count = Lecturer::count();
        $this->students_count = User::where('role',0)->count();
        $this->academic_admin_count = User::where('role',3)->count();
        $this->appointments_count = Appointment::count();
        $this->units_count = Units::count();

        if(auth()->user()->role == 1)
        {
            $user_lecturer = auth()->user(); 
            $lecturer = Lecturer::where('user_id',$user_lecturer->id)->first();
            $this->lecturer_appointments_count = Appointment::where('lecturer_id',$lecturer->id)->count();

            //upcoming
            $lecturers_appointments = Appointment::where('lecturer_id',$lecturer->id)->get();
    
            foreach ($lecturers_appointments as $value) 
            {
                if(Carbon::parse($value->appointment_date)->isAfter(Carbon::today()))
                {
                    $this->upcoming_appointments_count++;
                }

                if(Carbon::parse($value->appointment_date)->isBefore(Carbon::today()))
                {
                    $this->complete_appointments_count++;
                }

                if(Carbon::parse($value->appointment_date)->isBetween(Carbon::today()->subWeek(),Carbon::today()))
                {
                    $this->last_week_appointments_count++;
                }

                if(Carbon::parse($value->appointment_date)->isBetween(Carbon::today()->subMonth(),Carbon::today()))
                {
                    $this->last_month_appointments_count++;
                }
            }
        }
     //  all users
     $all_users = User::all();
     foreach ($all_users as $value)
      {
         if(Carbon::parse($value->created_at)->isBetween(Carbon::today()->subWeek(),Carbon::today()))
         {
             $this->last_week_users_count++;
         }

         if(Carbon::parse($value->created_at)->isBetween(Carbon::today()->subMonth(),Carbon::today()))
         {
             $this->last_month_users_count++;
         }
     }

     //  all appointments
     $all_appointment = Appointment::all();
     foreach ($all_appointment as $value) 
     {
         if(Carbon::parse($value->created_at)->isBetween(Carbon::today()->subWeek(),Carbon::today()))
         {
             $this->last_week_appointments_count++;
         }

         if(Carbon::parse($value->created_at)->isBetween(Carbon::today()->subMonth(),Carbon::today()))
         {
             $this->last_month_appointments_count++;
         }
     }

     //  all lecturers
     $all_lecturers = Lecturer::all();
     foreach ($all_lecturers as $value)
      {
         if(Carbon::parse($value->created_at)->isBetween(Carbon::today()->subWeek(),Carbon::today()))
         {
             $this->last_week_lecturer_count++;
         }

         if(Carbon::parse($value->created_at)->isBetween(Carbon::today()->subMonth(),Carbon::today()))
         {
             $this->last_month_lecturer_count++;
         }
     }

     //  all students
     $all_students = User::where('role',0)->get();
     foreach ($all_students as $value)
      {
         if(Carbon::parse($value->created_at)->isBetween(Carbon::today()->subWeek(),Carbon::today()))
         {
             $this->last_week_student_count++;
         }

         if(Carbon::parse($value->created_at)->isBetween(Carbon::today()->subMonth(),Carbon::today()))
         {
             $this->last_month_student_count++;
         }
     }

       //  all students
       $all_academic = User::where('role',3)->get();
       foreach ($all_academic as $value)
        {
           if(Carbon::parse($value->created_at)->isBetween(Carbon::today()->subWeek(),Carbon::today()))
           {
               $this->last_week_academic_count++;
           }
  
           if(Carbon::parse($value->created_at)->isBetween(Carbon::today()->subMonth(),Carbon::today()))
           {
               $this->last_month_academic_count++;
           }
       }

     

}
   



    public function render()
    {
        return view('livewire.statistic-component');
    }
}
