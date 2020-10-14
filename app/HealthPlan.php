<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthPlan extends Model
{
    protected $table = 'master_health_plan';
    protected $fillable = [
        'plan_name','price','doctor','appointment','one_line_description','special_workup','duration','status'
    ];
}
