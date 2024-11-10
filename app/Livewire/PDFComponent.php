<?php

namespace App\Livewire;

use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Appointment;
use Illuminate\Support\Facades\Response;


class PDFComponent extends Component
{

    public function render()
    {

        // Fetch the data you want to include in the PDF report
        $appointmentsData = Appointment::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month');

        $dailyAppointmentsData = Appointment::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->pluck('count', 'date');

        return view('livewire.p-d-f-component', [
            'appointmentsData' => $appointmentsData,
            'dailyAppointmentsData' => $dailyAppointmentsData,
        ]);
    }

    public function downloadPDF()
    {
        // Fetch data again for the PDF
        $appointmentsData = Appointment::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month');

        $dailyAppointmentsData = Appointment::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->pluck('count', 'date');

        // Load the view into DomPDF
        $pdf = Pdf::loadView('livewire.p-d-f-component', [
            'appointmentsData' => $appointmentsData,
            'dailyAppointmentsData' => $dailyAppointmentsData,
        ]);

        // Return the generated PDF as a download
        
        return Response::streamDownload(function() use ($pdf) {
            echo $pdf->stream();
        }, 'appointments_report.pdf');
    } 
    
}

