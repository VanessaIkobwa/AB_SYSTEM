<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class StatisticComponent extends Component
{
    public $users_count = 0;
    public $lecturers_count = 0;
    public $students_count = 0;
    public $academic_admin_count = 0;
    public $appointments_count = 0;

    public function mount()
    {
        $this->users_count = User::count();
    }


    public function render()
    {
        return view('livewire.statistic-component');
    }
}
