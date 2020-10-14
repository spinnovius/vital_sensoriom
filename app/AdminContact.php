<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminContact extends Model
{
    protected $table = 'admin_contact';
    protected $fillable = [
        'admin_id','contact'
    ];
}
