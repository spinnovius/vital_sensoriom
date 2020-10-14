<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientPriscription extends Model
{
    protected $table = 'patient_priscription';
    protected $fillable = [
        'patient_id', 'doctor_id', 'medicine_name', 'dose', 'freq', 'route', 'start_date', 'end_date'
    ];
    public function doctor()
    {
        return $this->belongsTo('App\Doctor', 'doctor_id');
    }
}
