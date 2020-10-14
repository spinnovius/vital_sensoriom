<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experties extends Model
{
    protected $table = 'experties';
    protected $fillable = [
        'id','experties','status'
    ];
}
