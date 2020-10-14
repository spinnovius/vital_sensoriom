<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ophthalmology extends Model
{
    protected $table = 'ophthalmology_examination';

    protected $fillable = [
        'doctor_id','examination_id','visualacuity','pupils','extraocularmotility','intraocular','confrontation','external','slitlamp','fundoscopic','diff_diagnosis','planned_procedure'
    ];

    public  $timestamps = false;
}
