<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panalistrefer extends Model
{
    protected $table = 'panalistrefer';
    protected $fillable = [
        'user_id','panalist_id','question','answer','status'
    ];
}


