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
    public function loadEditScheduleForm($schedule_id)
    {
        $id = $schedule_id;
        return view('lecturer.edit-schedule-form', compact('id'));
    }
    public function loadReschedulingForm($id)
    {
        $appointment_id = $id;
        return view('lecturer.rescheduling-form', compact ('appointment_id'));
    }

}
