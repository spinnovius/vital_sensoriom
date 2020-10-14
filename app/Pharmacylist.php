<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacylist extends Model
{
    //
    protected $table = 'pharmacy_list';
    protected $fillable = [
        'name','location','city_id','email','contact_number','status'
    ];
}
