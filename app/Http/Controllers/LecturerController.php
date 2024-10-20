<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function loadLecturerDashboard()
    {
        return view('lecturer.dashboard');
    }

    public function loadAllAppointments()
    {
        return view('lecturer.appointments');
    }

    public function loadAllSchedules()
    {
        return view('lecturer.schedules');
    }

    public function loadAddScheduleForm()
    {
        return view('lecturer.schedule-form');
    }

}
