<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdviceTreatment extends Model
{
    //
    protected $table = 'investigation';

    protected $fillable = [
        'date','investigation_name','city','hospital','speciality','doctorsname','goal','no','days of month'
    ];

        public  $timestamps = false;
}
