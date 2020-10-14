<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrugName extends Model
{
    protected $table = 'medicines';
    protected $fillable = [
        'id','name','status'
    ];
}
