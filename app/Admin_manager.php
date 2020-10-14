<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_manager extends Model
{
    protected $table = 'admin_manager';
    protected $fillable = [
        'id','email','status'
    ];
}
