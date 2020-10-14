<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Others extends Model
{
    protected $table = 'others_field';
    protected $fillable = [
        'patient_id','doctor_id','releventpoint','examination_lab_finding','suggest_investigation','special_investigation'
    ];
}
