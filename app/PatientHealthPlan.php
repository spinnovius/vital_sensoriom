<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientHealthPlan extends Model
{
    protected $table = 'patient_health_plan';
    protected $fillable = [
        'plan_id','patient_id','in_pay'
    ];
}
