<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdviceTreatmentGoal extends Model
{
    //
    protected $table = 'investigation_goal';

    protected $fillable = [
        'investigation_id','goal','no','daysofmonth'
    ];

    public  $timestamps = false;
}
