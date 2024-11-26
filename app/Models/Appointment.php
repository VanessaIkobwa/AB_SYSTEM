<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecturer_id',
        'student_id',
        'appointment_date',
        'appointment_time',
        'appointment_type',
        'cancellation_reason',
    ];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class,'lecturer_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class,'student_id');
    }

}
