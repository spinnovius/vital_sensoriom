<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescriptionpharmacy extends Model
{
    //
    protected $table = 'prescription_pharmacy';
    protected $fillable = [
         'parmacy_id', 'patient_id', 'patient_name', 'patient_contact', 'city_id', 'image', 'status'
    ];
}
