<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neurosurgery extends Model
{
	protected $table = 'neurosurgery_examination';

    protected $fillable = [
        'doctor_id', 'examination_id', 'glasgow_scale', 'Consciousness','Alertness','Speech','Pupils','CranialNerves','Gait','InvoluntaryMovements','AbnormalPostures','Trophicchanges','Contractions','MuscleTone','MotorPower','DeepReflexes','SuperficialReflexes','tactilesensation','tactilediscrimination','temperaturediscrimination','jointpropioception','painsensation','vibrationsense','UMN_lesion','LMN_lesion','Extrapyramidal_lesion','Cerebellar_lesion','raised_ict','Meningitis','head_trauma','peripheral_disease','Myopathies','systemic_notes','diff_diagnosis'
    ];

    public $timestamps = false;
}
