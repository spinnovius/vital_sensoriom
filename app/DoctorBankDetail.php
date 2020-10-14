<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorBankDetail extends Model
{
    protected $table = 'doctors_bank_detail';
    protected $fillable = [
        'doctor_id', 'bank_name', 'account_number', 'ifsc_code', 'beneficiary_name','status'
    ];
}
