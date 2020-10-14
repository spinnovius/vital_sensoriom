<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientPastHealthHistory extends Model
{
    protected $table = 'patient_health_history_past';
    protected $fillable = [
        'patient_id', 'problem_id', 'status'
    ];
}
