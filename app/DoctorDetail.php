<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorDetail extends Model
{
    protected $table = 'doctors';
    protected $fillable = [
        'doctor_id', 'speciality', 'city', 'fee_of_consultation', 'mbbs_registration_number', 'mbbs_authority_council_name','md_ms_dnb_registration_number','md_ms_dnb_counsil_name','dm_mch_dnb_registration_number','dm_mch_dnb_authority_council_name','profile_pic','document','available'
    ];

}
