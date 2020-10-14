<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralSurgery extends Model
{
    protected $table = 'general_diabetes';

    protected $fillable = [
        'doctor_id', 'examination_id', 'abdominal', 'organomegaly','hernial','rectal','breast','localnodes','metastasis','lumpexam','genitaliaexam','thyroiddisease','eyeexam','thyroidexam','pembertonsign','ulcers_exam','limbs_exam','system_exam','diff_diagnosis'
    ];

    public $timestamps = false;
}
