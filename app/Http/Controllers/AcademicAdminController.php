<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcademicAdminController extends Controller
{
    public function loadAcademicAdminDashboard()
    {
        return view('academic_admin.dashboard');
    }
}
