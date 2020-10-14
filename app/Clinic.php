<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $table = 'clinic';
    protected $fillable = [
        'name','status','address','city','email','contact_number'
    ];
}
