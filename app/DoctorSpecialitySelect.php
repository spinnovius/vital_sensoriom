<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorSpecialitySelect extends Model
{
    //
    protected $table = 'doctor_speciality_select';

    protected $fillable = [
        'doctor_id','speciality_id'
    ];
}
