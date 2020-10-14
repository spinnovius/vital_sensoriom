<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poc extends Model
{
    protected $table = 'pointofcare';
    protected $fillable = [
        'id','poc_no','manager_name','city','pincode','phone_number','email','status'
    ];

    public function city()
    {
    	return $this->belongsTo('App\City','city','id');
    }
}
