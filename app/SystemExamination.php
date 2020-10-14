<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemExamination extends Model
{
    
    protected $table = 'system examination';
    
    protected $fillable = [
        'doctor_id','patient_id','diagnosis','notes'
    ];

    public  $timestamps = false;
}
