<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctorrefer extends Model
{
    protected $table = 'doctorrefer';
    protected $fillable = [
        'user_id','panalist_id','question','answer','status','is_read'
    ];
}


