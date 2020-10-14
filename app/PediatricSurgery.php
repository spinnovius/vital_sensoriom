<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PediatricSurgery extends Model
{
    protected $table = 'pediatricssurgery_examination';

    protected $fillable = [
        'doctor_id','examination_id','perinatal','development','feeding','immunization','family','past','apgar','general_appearance','weight','length','head','skin','lymph','facies','oral','chest','abdomen','genitalia','rectum','musculos','back','reflexes','neurological','local','lump','ulcers','diff_diagnosis','planned_procedures'
    ];

    public  $timestamps = false;
}
