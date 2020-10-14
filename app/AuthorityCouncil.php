<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorityCouncil extends Model
{
    protected $table = 'authority_council';
    protected $fillable = [
        'name','address','register_number','status'
    ];
}
