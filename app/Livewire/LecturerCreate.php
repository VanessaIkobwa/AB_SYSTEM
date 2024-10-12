<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Units;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Lecturer;

class LecturerCreate extends Component
{
    public $name = '';
    public $email = '';
    public $unit_id = '';
    public $password = '';
    public $department_name = '';
    public $office = '';

 //   public $password_confirmation = '';
    public $units;

    public function mount()
    {
        $this->units = Units::all();
    }
    public function register()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'unit_id' => 'required',
            'department_name' => 'required',
           'office' => 'required',
            'password' => 'required|min:4',
            

          //  'password_confirmation' => 'required'
        ]);
         //user table
         $user = new User;
         $user->name =$this->name;
         $user->email =$this->email;
         $user->role = 1;
         $user->password = Hash::make($this->password);
         $user->save();

       //lecturer table

       $lecturer = new Lecturer;
       $lecturer->user_id = $user->id; // Ensure you link the lecturer to the user
       $lecturer->unit_id = $this->unit_id;
       $lecturer->department_name = $this->department_name;
       $lecturer->office = $this->office;
       $lecturer->save();

    session()->flash('message','. Lecturer Created successfully');
    return redirect('/admin/lecturers');

    

       
    }


    public function render()
    {
        return view('livewire.lecturer-create');
    }
}
