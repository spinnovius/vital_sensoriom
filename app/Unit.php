<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'unit_for_lab_details';
    protected $fillable = [
        'unit','status'
    ];
}
