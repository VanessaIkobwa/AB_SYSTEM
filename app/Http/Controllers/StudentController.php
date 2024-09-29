<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function loadStudentDashboard()
    {
        return view('student.dashboard');
    }

}
