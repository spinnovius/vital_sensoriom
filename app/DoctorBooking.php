<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorBooking extends Model
{
    protected $table = 'doctor_booking';
    protected $fillable = [
        'patient_id', 'doctor_id', 'date', 'time', 'time_slot',
    ];
}
