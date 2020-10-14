<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obstetrics extends Model
{
    protected $table = 'obstetrics_examination';

    protected $fillable = [
        'doctor_id', 'examination_id', 'typesofobg', 'Gravida','Parity','Abortions','Live','LMP','EDD','ectopicpregnancy','obstetrichistory','BreastExam','CSscar','SignsPregnancy','SynphysisFundal','PelvicGrip','Lie','Presentation','AmnioticFluid','FHR','InternalExamination','ManualExamination','BreastExamination','PelvicExamination','SpeculumExamination','BmanualExamination','RectalExamination'
    ];

    public $timestamps = false;
    
}
