<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    //
    protected $table = 'appointment_details';

    protected $fillable = [
        'clinic_id', 'patient_id', 'city_id', 'hostipal_id', 'speciality_id', 'doctor_id','date','time','adhaarno','poc_id'
    ];

    public function doctor()
    {
    	return $this->belongsto('App\User','doctor_id','id');
    }

    public function patient()
    {
    	return $this->belongsto('App\User','patient_id','id');
    }

    public function poc()
    {
        return $this->belongsto('App\User','poc_id','id');
    }

    public function city()
    {

    }



}
