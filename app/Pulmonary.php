<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pulmonary extends Model
{
    protected $table = 'pulmonary_examination';

    protected $fillable = [
        'doctor_id', 'examination_id', 'respiratory_rate','respiratory_rhythm', 'muscles_respiration','dioxide_retention','troisier_sign','chest_expansion','percussion_ribs','vocal_fremitus','auscultation_notes','any_notes','radial_Rate','rhythm','carotid_Rate','jugular_pressure','diff_diagnosis'
    ];

    protected $timestamps = false;
}
