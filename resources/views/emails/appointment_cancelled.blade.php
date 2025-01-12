@component('mail::message')
# Appointment Confirmation

Dear {{ $appointmentData['recipient_name'] }},

An appointment has been Cancelled with the following details:

### Appointment Details:
- **Date:** {{ $appointmentData['date'] }}
- **Time:** {{ $appointmentData['time'] }}
- **Location:** {{ $appointmentData['location'] }}

### Student Details:
- **Name:** {{ $appointmentData['student_name'] }}
- **Email:** {{ $appointmentData['student_email'] }}

### Lecturer Details:
- **Name:** {{ $appointmentData['lecturer_name'] }}
- **Unit:** {{ $appointmentData['lecturer_specialization'] }}

### Appointment Cancelled by:
- **Name:** {{ $appointmentData['cancelled_by'] }}
@if ($appointmentData['cancelled_by'] == 1)
- **Role:** Lecturer
@elseif($appointmentData['cancelled_by'] == 3)
- **Role:** Academic Admin
@elseif($appointmentData['cancelled_by'] == 0)
- **Role:** Student
@endif


@if($appointmentData['recipient_role'] == 'academic_admin')
## Academic_Admin Notification
You are receiving this email because an appointment has been cancelled in your system.
@endif

@if($appointmentData['recipient_role'] == 'lecturer')
## Lecturer Notification
You have a cancelled appointment.
@endif

@if($appointmentData['recipient_role'] == 'student')
## Student Notification
Your appointment has been cancelled.
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
