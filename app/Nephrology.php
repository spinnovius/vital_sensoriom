<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nephrology extends Model
{
    protected $table = 'nephrology_examination';

    protected $fillable = [
        'doctor_id','examination_id','generalappearance','arms_hands','face','head_neck','chest','abdomen','legs','groin','back','prexamination','diff_diagnosis','plannned_procedure'
    ];

    public  $timestamps = false;
}
