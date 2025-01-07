<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;


class BookingReason extends Component
{
    public $appointment_id; // Store the appointment ID
    public $reason; // Store the booking reason

    // Mount method to initialize the appointment ID when the component is loaded
    public function mount($appointment_id)
    {

     $this->appointment_id = $appointment_id;
    }

  
    // Method to handle the form submission
    public function submit()
    {
        // Validate the input
        $this->validate([
            'reason' => 'required|string|min:5|max:255',
        ]);



        // Find the appointment and update the booking reason
        $appointment = Appointment::find($this->appointment_id);

        if ($appointment) {
            // Update the booking reason in the database
            $appointment->update([
                'booking_reason' => $this->reason, // Save the booking reason
                
            ]);

            // Provide feedback to the user
            session()->flash('message', 'Booking reason submitted successfully.');

            // Optionally, redirect after submission (e.g., back to the student appointment page)
            return $this->redirect('/my/appointments');
        } else {
            // If appointment is not found
            session()->flash('error', 'Appointment not found.');
        }
    }

    public function render()
    {
        return view('livewire.booking-reason');
    }

}
