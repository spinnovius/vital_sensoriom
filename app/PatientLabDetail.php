<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientLabDetail extends Model
{
    protected $table = 'patient_lab_detail';
    protected $fillable = [
        'patient_id', 'coach_id', 'test_name', 'test_date', 'value', 'unit', 'result', 'status'
    ];
}
