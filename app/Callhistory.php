<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Callhistory extends Model
{
    protected $table = 'call_history';
    protected $fillable = [
        'patient_id','coach_id','calling_time'
    ];
}
