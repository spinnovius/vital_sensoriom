<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pediatrics extends Model
{
    protected $table = 'pediatrics_examination';

    protected $fillable = [
        'doctor_id','examination_id','perinatal','development','feeding','immunization','family','past','apgar','general_apperance','weight','length','head','skin','lymph','facies','oral','chest','abdomen','genitalia','rectum','musculos','back','reflexs','neurological','diff_diagnosis','planned_procedure'
    ];

    public  $timestamps = false;
}
