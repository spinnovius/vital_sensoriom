<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cardiology extends Model
{
    protected $table = 'cardology_examination';

    protected $fillable = [
        'doctor_id', 'examination_id', 'radial_rate', 'rhythm','jugularpressure','Thrills','S1','S2','S3','S4','Murmurs','extrasounds','pulmonaryexam','heartfailure','endocarditis','heartdsease','cardiacdisease','Other','carotidartery'
    ];

    public $timestamps = false;
}
