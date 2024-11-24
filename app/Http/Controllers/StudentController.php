<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Units;
use App\Models\Lecturer;



class StudentController extends Controller
{
    public function loadStudentDashboard()
    {
        return view('student.dashboard');
    }
    public function loadLecturerByUnit($unit_id)
    {
        $id = $unit_id;
        $unit= Units::find($id);
        return view('student.lecturer-by-unit',compact('id','unit'));
        
    }
    public function loadMyAppointments()
    {
        return view('student.my-appointments');
    }
    public function loadBookingPage($id)
    {
        $lecturer = Lecturer::with('unit','lecturerUser')->where('id',$id)->first();
        return view('student.booking-page',compact('lecturer'));
    }
    public function loadAllLecturers()
    {
        return view('student.all-lecturers');

    }

    
}
