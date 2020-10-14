<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gastroenterology extends Model
{
    protected $table = 'gastroenterology_examination';

    protected $fillable = [
        'doctor_id','examination_id','generalappearance','relevant_positive','relevant_positive_other','tenderness','organomegaly','hernial','abdominal','relevant_percussion','examination_ascites','relevant_auscultation','relevant_external','diff_diagnosis','planned_procedure'
    ];

    public  $timestamps = false;
}
