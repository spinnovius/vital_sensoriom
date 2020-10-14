<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chathistory extends Model
{
    protected $table = 'chat_history';
    protected $fillable = [
        'patient_id','coach_id','last_chat_date','refund_status','refund_amount'
    ];
}
