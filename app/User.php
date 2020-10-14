<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable {

    use HasApiTokens,
        Notifiable;

    protected $fillable = [
        'fname', 'lname', 'email', 'contact_number', 'role_id', 'password','device_id','verified','view','city','expertise','manager_permissions'
    ];

    public function roles()
	{
	    return $this->belongsToMany('App\Role','user_role','user_id','role_id');
	}

	public function city()
    {
    	return $this->belongsTo('App\City','city','id');
    }
    
}
