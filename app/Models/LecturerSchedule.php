<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerSchedule extends Model
{
    use HasFactory;

    protected $fillable = [

    'lecturer_id',
    'available_day',
    'from',
    'to',
    
    ];
}
