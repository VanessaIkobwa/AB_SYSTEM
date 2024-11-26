@component('mail::message')
# Appointment Notification

Dear {{ $appointmentData['recipient_name'] }},

An appointment has been Updated with the following details:

### New Appointment Details:
- **Date:** {{ $appointmentData['date'] }}
- **Time:** {{ $appointmentData['time'] }}
- **Location:** {{ $appointmentData['location'] }}

### Old Appointment Details:
- **Date:** {{ $appointmentData['old_date'] }}
- **Time:** {{ $appointmentData['old_time'] }}
- **Location:** {{ $appointmentData['location'] }}

### Student Details:
- **Name:** {{ $appointmentData['student_name'] }}
- **Email:** {{ $appointmentData['student_email'] }}

### Lecturer Details:
- **Name:** {{ $appointmentData['lecturer_name'] }}
- **Unit:** {{ $appointmentData['lecturer_specialization'] }}


@if($appointmentData['recipient_role'] == 'academic_admin')
## Academic Admin Notification
You are receiving this email because an appointment has been scheduled in your system.
@endif

@if($appointmentData['recipient_role'] == 'lecturer')
## Lecturer Notification
Appointment has been rescheduled with the above details.
@endif

@if($appointmentData['recipient_role'] == 'student')
## Student Notification
Your appointment has been rescheduled. 
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent