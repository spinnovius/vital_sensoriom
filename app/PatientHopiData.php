<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientHopiData extends Model
{
    protected $table = 'hopi_patient_data';

    protected $fillable = [
        'hopi_patient_id', 'complain_name', 'complain_no','complain_days/week','comorbi_name','comorbi_no','comorbi_days/week','problem',
    ];

    public  $timestamps = false;
}
