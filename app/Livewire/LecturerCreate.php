<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Units;
use Illuminate\Support\Facades\Hash;


class LecturerCreate extends Component
{
    public $name = '';
    public $email = '';
    public $unit_id = '';
    public $password = '';
    public $department_name = '';
   // public $office = '';

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
          //  'office' => 'required',
            'password' => 'required|confirmed|min:4',
            

          //  'password_confirmation' => 'required'
        ]);
         //user table
         $user = new User;
         $user->name =$this->name;
         $user->email =$this->email;
         $user->role = 1;
         $user->password = Hash::make($this->password);
       //lecturer table
    }


    public function render()
    {
        return view('livewire.lecturer-create');
    }
}
