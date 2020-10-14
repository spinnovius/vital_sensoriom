<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientProcedure extends Model
{
    protected $table = 'patient_procedure';
    protected $fillable = [
        'patient_id', 'coach_id', 'procedure_name', 'procedure_date', 'remark', 'status'
    ];
}
