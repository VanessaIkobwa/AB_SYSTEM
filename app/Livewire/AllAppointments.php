<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Appointment;
use Livewire\Component;
use App\Models\Lecturer;
use Livewire\WithPagination;
use App\Mail\AppointmentCancelled;
use Illuminate\Support\Facades\Mail;

class AllAppointments extends Component
{
    public $all_appointments; 

    public function cancel($id)
    {
        $cancelled_by_details = auth()->user();
        $appointment = Appointment::find($id);

        $student = User::find($appointment->student_id);
        $lecturer = Lecturer::find($appointment->lecturer_id);

        $appointmentEmailData = [
            'date' => $appointment->appointment_date,
            'time' => Carbon::parse($appointment->appointment_time)->format('H:i A'),
            'location' => 'ABC Office',
            'student_name' => $student->name,
            'student_email' => $student->email,
            'lecturer_name' => $lecturer->lecturerUser->name,
            'lecturer_email' => $lecturer->lecturerUser->email,
           // 'appointment_type' => $this->appointment_type == 0 ? 'on-site' : 'live consultation',
            'lecturer_specialization' => $lecturer->unit->unit_name,
            'cancelled_by' => $cancelled_by_details->name,
            'role' => $cancelled_by_details->role,
        ];
        $this->sendAppointmentNotification($appointmentEmailData);


        $appointment ->delete();

        session()->flash('message','Appointment cancelled successfully');
        if (auth()->user()->role == 3) {
            return $this->redirect('/academic_admin/appointments');
        }
    } 

    public function sendAppointmentNotification($appointmentData)
    {
        // Send to Admin
       // $appointmentData['recipient_name'] = 'Admin Admin';
       // $appointmentData['recipient_role'] = 'admin';
        //Mail::to('veemwoko@gmail.com')->send(new AppointmentCancelled($appointmentData));

        // Send to Academic_Admin
        $appointmentData['recipient_name'] = 'Academic_Admin Academic_Admin';
        $appointmentData['recipient_role'] = 'academic_admin';
        Mail::to('nessazipporahikim@gmail.com')->send(new AppointmentCancelled($appointmentData));

        // Send to Lec
        $appointmentData['recipient_name'] = $appointmentData['lecturer_name'];
        $appointmentData['recipient_role'] = 'lecturer';
        Mail::to($appointmentData['lecturer_email'])->send(new AppointmentCancelled($appointmentData));

        // Send to student
        $appointmentData['recipient_name'] = $appointmentData['student_name'];
        $appointmentData['recipient_role'] = 'student';
        Mail::to($appointmentData['student_email'])->send(new AppointmentCancelled($appointmentData));

        return 'Appointment notifications sent successfully!';
    }

    //form relationships in Appointment Model
    public function mount()
    {
        $this->all_appointments = Appointment::with('student','lecturer')->get();
    }

    public function render()
    {
        return view('livewire.all-appointments');
    }
}
