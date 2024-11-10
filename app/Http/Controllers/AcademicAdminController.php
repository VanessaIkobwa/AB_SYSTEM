<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LecturerSchedule;

class AcademicAdminController extends Controller
{
    public function loadAcademicAdminDashboard()
    {
        return view('academic_admin.dashboard');
    }

    public function loadAllAppointments()
    {
        return view('academic_admin.appointments');
    }

    public function loadAllReports()
    {
        return view('academic_admin.reports');
    }

    public function loadPDFForm()
    {
        return view('academic_admin.PDFform');
    }

    
}
