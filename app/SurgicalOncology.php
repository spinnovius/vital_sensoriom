<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurgicalOncology extends Model
{
    protected $table = 'surgicaloncology_examination';

    protected $fillable = [
        'doctor_id','examination_id','generalappearance','site','lumpexam','vascular','nerve','lymphatics','spread','diff_diagnosis','planned_procedure'
    ];

    public  $timestamps = false;
}
