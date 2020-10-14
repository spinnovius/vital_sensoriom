<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorDays extends Model
{
    protected $table = 'doctor_days';
    protected $fillable = [
     'user_id', 'days', 'start_time', 'end_time', 'available',
    ];
}
