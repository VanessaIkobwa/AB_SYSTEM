<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;


class CancellationReason extends Component
{
    public $appointment_id;
    public $reason; 

    public function mount($appointment_id)
    {
        $this->appointment_id = $appointment_id;
    }

    public function submit()
{
    // Validate the input
    $this->validate([
        'reason' => 'required|string|min:5|max:255',
    ]);

    // Find the appointment and update cancellation details
    $appointment = Appointment::find($this->appointment_id);

    if ($appointment)
    {
        $appointment->update([
            'cancelation_reason' => $this->reason,
            'is_complete' => 2, // Mark as cancelled
        ]);

        session()->flash('message', 'Cancellation reason submitted successfully.');
        if (auth()->user()->role == 0) {
            return $this->redirect('/my/appointments');
        }elseif (auth()->user()->role == 1) {
            return $this->redirect('/lecturer/appointments');
        }
    }
    else {
        session()->flash('error', 'Appointment not found.');
    }

}
    public function render()
    {
        return view('livewire.cancellation-reason');
    }
}
