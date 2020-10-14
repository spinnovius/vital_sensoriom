<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralDiabetes extends Model
{
    protected $table = 'general_diabetes';

    protected $fillable = [
        'doctor_id', 'examination_id', 'cardiovascular', 'respiratory','abdominal','genitourinary','endocrinemeta','signofdiabetes','podiatricexam','typeofdiabetes','diffdiagnosis'
    ];

    public $timestamps = false;
}
