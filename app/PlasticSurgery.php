<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlasticSurgery extends Model
{
    protected $table = 'plastic_examination';

    protected $fillable = [
        'doctor_id','examination_id','generalappearance','site','localexamination','special_notes','diff_diagnosis','planned_procedure'
    ];

    public  $timestamps = false;
}
