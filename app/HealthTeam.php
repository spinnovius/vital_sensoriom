<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthTeam extends Model
{
    protected $table = 'health_team';
    protected $fillable = [
        'patient_id','coach_id','doctor_id','hospital_id','status'
    ];
}
