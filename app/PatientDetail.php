<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientDetail extends Model
{
    protected $table = 'patient_detail';
    protected $fillable = [
        'patient_id', 'gender', 'dob', 'marital_status', 'city', 'height','weight','bmi','blood_group'
    ];
}
