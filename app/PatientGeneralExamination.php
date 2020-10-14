<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientGeneralExamination extends Model
{
    //
    protected $table = 'patient_general_examination';
    
    protected $fillable = [
        'doctor_id','patient_id','examination_id','notes'
    ];

    public  $timestamps = false;
}
