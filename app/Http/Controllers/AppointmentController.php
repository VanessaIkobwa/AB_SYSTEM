<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment; 

class AppointmentController extends Controller
{
    // Method to show the appointments list
    public function index()
    {
        $appointments = Appointment::all(); // Fetch all appointments
        return view('admin.appointment', compact('appointments')); // Return a view with appointments
    }
    public function getAppointmentsData()
    {
        $appointments = Appointment::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
 
        $data = [
            'labels' => $appointments->pluck('month')->map(function ($month) {
                return date('F', mktime(0, 0, 0, $month, 1));
            }),
            'data' => $appointments->pluck('count'),
        ];
 
        return response()->json($data);
    }
    
   

}
