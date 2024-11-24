@component('mail::message')
# Appointment Confirmation

Dear {{ $appointmentData['recipient_name'] }},

An appointment has been successfully created with the following details:

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

@if($appointmentData['recipient_role'] == 'admin')
## Admin Notification
You are receiving this email because an appointment has been scheduled in the system.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
View Appointment
@endcomponent
@endif

@if($appointmentData['recipient_role'] == 'academic_admin')
## Academic Admin Notification
You are receiving this email because an appointment has been scheduled in the system.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
View Appointment
@endcomponent
@endif

@if($appointmentData['recipient_role'] == 'lecturer')
## Lecturer Notification
You have a new appointment scheduled. Please review the details.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/lecturer/dashboard'])
View Appointment
@endcomponent
@endif

@if($appointmentData['recipient_role'] == 'student')
## Student Notification
Your appointment has been successfully scheduled. Please make sure to arrive on time.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/my/appointments'])
View Appointment
@endcomponent
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent