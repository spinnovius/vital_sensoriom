<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $table = 'doctor_speciality';
    protected $fillable = [
        'speciality','status'
    ];
}
