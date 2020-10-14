<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiagnosisMaster extends Model
{
    protected $table = 'diagnosis_list';
    protected $fillable = [
        'id','name'
    ];
}
