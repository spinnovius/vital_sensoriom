<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dermatology extends Model
{
    protected $table = 'dermatology_examination';

    protected $fillable = [
        'doctor_id', 'examination_id', 'general_appearance', 'distribution','which_surface','density_lesions','other_lesion','examination_notes','diffdiagnosis'
    ];

    public $timestamps = false;
}
