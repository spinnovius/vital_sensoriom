<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTVS extends Model
{
    protected $table = 'ctvs_examination';

    protected $fillable = [
        'doctor_id','examination_id','generalappearance','radial','cardotid','jugular','thrills','s1','s2','s3','s4','murmurs','extrasounds','respiratory','muscules','retention','troisier','chest','percussion','tactile','auscultation','anyother','vascular','congestive','infective','rheumatic','diff_diagnosis','planned_procedures'
    ];

    public  $timestamps = false;
}
