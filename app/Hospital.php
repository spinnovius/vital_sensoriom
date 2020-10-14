<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $table = 'hospital';
    protected $fillable = [
        'name', 'email', 'contact_number', 'city', 'address', 'urgent_care_number', 'status'
    ];
}
