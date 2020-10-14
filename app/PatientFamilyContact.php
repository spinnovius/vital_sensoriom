<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientFamilyContact extends Model
{
    protected $table = 'patient_family_contact';
    protected $fillable = [
        'patient_id', 'member_name', 'relation', 'contact_number'
    ];
}
