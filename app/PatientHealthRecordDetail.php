<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientHealthRecordDetail extends Model
{
    protected $table = 'patient_health_records';
    protected $fillable = [
        'patient_id', 'vital_id', 'min_value', 'max_value'
    ];
}
