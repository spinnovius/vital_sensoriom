<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orthopedics extends Model
{
    protected $table = 'orthopedics_examination';

    protected $fillable = [
        'doctor_id', 'examination_id', 'types_orthopedic', 'consciousness','gait','nutrition','painscale','skinissue','abnormality','bones','joints','muscles','sensations','motor','dtrs','spine','specialtests'
    ];

    public $timestamps = false;
}
