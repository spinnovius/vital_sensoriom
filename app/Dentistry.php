<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dentistry extends Model
{
    protected $table = 'dentistry_examination';

    protected $fillable = [
        'doctor_id','examination_id','generalappearance','facies','skin','palpation','extra','intra','dental','regional','systemic','diff_diagnosis','planned_procedure'
    ];

    public  $timestamps = false;
}
