<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urology extends Model
{
    protected $table = 'urology_examination';

    protected $fillable = [
        'doctor_id','examination_id','generalappearance','armshands','face','headneck','chest','abdomen','legs','groin','back','pr_examination','diff_diagnosis','planned_procedure'
    ];

    public  $timestamps = false;
}
