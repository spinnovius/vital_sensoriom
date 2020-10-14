<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientPastHistory extends Model
{
    protected $table = 'patient_past_history';
    protected $fillable = [
        'patient_id', 'blood_transfusion', 'blodd_transfusion_remark', 'surgery', 'surgery_remark', 'hospitalization', 'hospitalization_remark', 'status'
    ];
}
