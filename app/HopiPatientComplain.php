<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HopiPatientComplain extends Model
{
    protected $table = 'hopi_patient_complain';
    protected $fillable = [
         'hopi_patient_id', 'complain_name', 'complain_since', 'complain_days'
    ];
    public  $timestamps = false;
    public function patienthopi()
	{
	    return $this->belongsTo('App\PatientHopi', 'hopi_patient_id');
	}
}