<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientHealthHistory extends Model
{
    protected $table = 'patient_health_history';
    protected $fillable = [
        'patient_id', 'problem_id', 'smoking', 'alkohol_drinking', 'allergies', 'status'
    ];
}
