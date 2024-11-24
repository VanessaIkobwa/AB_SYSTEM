<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Units;
use App\Models\User;


class Lecturer extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'unit_id',
        'user_id' ,
        'department_name',
        'office',
        'is_featured',

      
    ];

    

    public function unit()
    {
        return $this->belongsTo(Units::class,'unit_id');
    }
    public function lecturerUser()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
