<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'fname', 'lname', 'email', 'contact_number', 'role_id', 'password','device_id','verified'
    ];
    public function advicetreatment()
	{
	    return $this->hasMany('App\PatientPriscription', 'id');
	}
}
