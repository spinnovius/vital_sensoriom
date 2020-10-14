<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientDiagnosis extends Model
{
    protected $table = 'patient_diagnosis';
    protected $fillable = [
        'doctor_id', 'patient_id', 'diagnosis', 'year','status'
    ];
}
