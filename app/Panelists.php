<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panelists extends Model
{
    protected $table = 'panelists';
    protected $fillable = [
        'id','name','experties','city','phone_number','email','password','status'
    ];
    
    public function city()
    {
    	return $this->belongsTo('App\City','city','id');
    }
}
