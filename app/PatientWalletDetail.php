<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientWalletDetail extends Model
{
    protected $table = 'patient_wallet_detail';
    protected $fillable = [
        'patient_id', 'credit_amount', 'debit_amount', 'total_amount', 'amount_description', 'in_wallet','payment_id','status','call_history_id'
    ];
}
