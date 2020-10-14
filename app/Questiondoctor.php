<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questiondoctor extends Model
{
    //
    protected $table = 'question_doctors';
    protected $fillable = [
        'patient_id','doctor_id','city_id','question','answer','status'
    ];
}
