<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctormain extends Model
{
    protected $table = 'doctor_main';
    protected $fillable = [
        'city','fname','speciality','doctor_name','phone_number','email','registration_no','registration_council','aadhhar_no','status',
    ];


    public function doctorspeciality()
    {
        return $this->belongsTo('App\Speciality','id');
    }

    public function doctorcity()
    {
        return $this->belongsTo('App\City','id');
    }
}
