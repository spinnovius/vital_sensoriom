<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientHopi extends Model
{
    protected $table = 'hopi_patient';

    protected $fillable = [
        'patient_id', 'doctor_id', 'risk_factors', 'created_at'
    ];

    public  $timestamps = false;


    public function patientuser()
	{
	    return $this->belongsTo('App\User', 'patient_id');
	}

	public function doctoruser()
	{
	    return $this->belongsTo('App\User', 'doctor_id');
	}
	public function hopipatientcomplain()
	{
	    return $this->hasMany('App\HopiPatientComplain','hopi_patient_id');
	}
	public function hopipatientcomorbidities()
	{
	    return $this->hasMany('App\HopiPatientComorbidities', 'hopi_patient_id');
	}

	
}
