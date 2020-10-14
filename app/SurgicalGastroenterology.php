<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurgicalGastroenterology extends Model
{
    protected $table = 'surgical_examination';

    protected $fillable = [
        'doctor_id','examination_id','generalappearance','relevant_inspection','relevant_palpation','tenderness','organomegaly','hernial','abdominal','relevant_percussion','examination_ascites','auscultation','relevant_genitalia','diff_diagnosis','planned_procedure'
    ];

    public  $timestamps = false;
}
