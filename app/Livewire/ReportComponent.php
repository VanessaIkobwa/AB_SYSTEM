<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AppointmentsExport; // Custom export class for Excel
use Dompdf\Dompdf;
use Dompdf\Options;



class ReportComponent extends Component
{

    public $appointmentsData = [];
    public $dailyAppointmentsData = [];
    public $appointmentsByLecturerData =[];

    public function mount()
    {
        // Fetch the number of appointments for each month in the current year
        $this->appointmentsData = $this->getAppointmentsPerMonth();

        // Call method to get daily appointments
        $this->dailyAppointmentsData = $this->getAppointmentsPerDay();

         // Call method to get appointments by lecturer
        $this->appointmentsByLecturerData = $this->getAppointmentsByLecturer();
    }

    public function getAppointmentsPerMonth()
    {
     
    // Initialize an array with zeroes for each month
    $monthlyCounts = array_fill(1, 12, 0); // Months are 1-indexed in PHP (1 = January, 12 = December)

     // Retrieve the count of appointments grouped by month for the current year
     $appointmentsPerMonth = Appointment::selectRaw('MONTH(appointment_date) as month, COUNT(*) as count')
     ->whereYear('appointment_date', Carbon::now()->year) // Filter for the current year
     ->groupBy('month')
     ->pluck('count', 'month') // Get counts indexed by month
     ->toArray();

     // Fill the monthlyCounts array with actual counts
    foreach ($appointmentsPerMonth as $month => $count)
    {
        $monthlyCounts[$month] = $count; // Replace zero with actual count for months that have data
    }

    return $monthlyCounts; // Return the array where months without appointments will have a count of 0
    }

    public function getAppointmentsPerDay()
    {
        return Appointment::selectRaw('DATE(appointment_date) as date, COUNT(*) as count')
            ->whereMonth('appointment_date', Carbon::now()->month) // Filter for the current month
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count', 'date') // Get counts indexed by date
           
            ->map(function ($count, $date) {
                // Format the date to include day of the week
                return [
                    'date' => Carbon::parse($date)->format('l, d M'), // e.g., "Monday, 01 Nov"
                    'count' => $count
                ];
            })
           
           
            ->toArray();
    }

    public function getAppointmentsByLecturer()
    {
        // Fetch appointments grouped by lecturer_id with their user names
        $appointmentsByLecturer = Appointment::selectRaw('COUNT(*) as count, users.name as lecturer_name')
            ->join('lecturers', 'appointments.lecturer_id', '=', 'lecturers.id') // Join with the lecturers table
            ->join('users', 'lecturers.user_id', '=', 'users.id') // Join with the users table
            ->groupBy('lecturers.id', 'users.name') // Group by lecturer ID and user name
            ->get(); // Use get() to retrieve the data
    
        // Prepare the data in a suitable format for the chart
        return $appointmentsByLecturer->pluck('count', 'lecturer_name')->toArray();
    }


    //export to pdf
    public function exportToPDF()
    {
        $data = [
            'appointmentsData' => $this->appointmentsData,
            'dailyAppointmentsData' => $this->dailyAppointmentsData,
            'appointmentsByLecturerData' => $this->appointmentsByLecturerData,

        ];

         // Create Dompdf instance with custom options

         $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true); // To allow PHP code within the PDF content


       $pdf = new Dompdf($options);
        $pdf->loadHtml(view('livewire.p-d-f-component', $data)->render()); // Load the view into PDF
        $pdf->setPaper('A4', 'landscape'); // Set paper size and orientation
        $pdf->render(); // Render the PDF
        
        // Stream the generated PDF as a download
        return response()->streamDownload(
            fn() => print($pdf->output()),
            'appointments_report.pdf'
        );
    }

    // Export to Excel
    public function exportToExcel()
    {
        return Excel::download(new AppointmentsExport($this->appointmentsData, $this->dailyAppointmentsData), 'report.xlsx');
    }
    
     // Export to CSV
     public function exportToCSV()
     {
         return Excel::download(new AppointmentsExport($this->appointmentsData, $this->dailyAppointmentsData), 'report.csv', \Maatwebsite\Excel\Excel::CSV);
     }


    public function render()
    {
        return view('livewire.report-component', [
            'appointmentsData' => $this->appointmentsData,
            'dailyAppointmentsData' => $this->dailyAppointmentsData,
            'appointmentsByLecturerData' => $this->appointmentsByLecturerData, 
        ]);
    }
}
