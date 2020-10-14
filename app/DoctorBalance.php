<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorBalance extends Model
{
    protected $table = 'doctors_balance';
    protected $fillable = [
        'doctor_id', 'online_amount', 'offline_amount', 'total_amount','status','debitAmount','call_history_id'
    ];
}
