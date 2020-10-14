<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthPlanDescription extends Model
{
    protected $table = 'plan_description';
    protected $fillable = [
        'plan_id','description'
    ];
}
