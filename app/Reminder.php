<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $table = 'reminder';
    protected $fillable = [
        'patient_id', 'coach_id', 'reminder_text', 'reminder_date', 'reminder_time', 'status'
    ];
}
