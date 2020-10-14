<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HopiPatientComorbidities extends Model
{
    protected $table = 'hopi_patient_comorbidities';
    protected $fillable = [
        'hopi_patient_id', 'comorbidities_name', 'comorbidities_since', 'comorbidities_days'
    ];
    public  $timestamps = false;
    public function patienthopi()
	{
	    return $this->belongsTo('App\PatientHopi', 'hopi_patient_id');
	}
}