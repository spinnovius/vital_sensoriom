<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthProblem extends Model
{
    protected $table = 'list_of_problem';
    protected $fillable = [
        'problem','type','status'
    ];
}
