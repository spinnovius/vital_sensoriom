<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralExamination extends Model
{
    protected $table = 'general_examination';
    
    protected $fillable = [
        'id','examination_name'
    ];
}
