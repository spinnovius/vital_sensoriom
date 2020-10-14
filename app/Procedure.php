<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    protected $table = 'admin_procedure';
    protected $fillable = [
        'id','procedure_name', 'status'
    ];
}
