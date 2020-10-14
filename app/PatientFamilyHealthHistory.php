<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientFamilyHealthHistory extends Model
{
    protected $table = 'patient_health_history_family';
    protected $fillable = [
        'patient_id', 'problem_id', 'status'
    ];
}
