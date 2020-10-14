<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Psychiatry extends Model
{
    protected $table = 'psychiatry_examination';

    protected $fillable = [
        'doctor_id', 'examination_id', 'risk_assessment', 'appearance','speech','mood','thoughts','perceptions','delusions','cognition','insight','diff_diagnosis','others'
    ];

    public $timestamps = false;
}
