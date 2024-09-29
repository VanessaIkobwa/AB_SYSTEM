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
}
