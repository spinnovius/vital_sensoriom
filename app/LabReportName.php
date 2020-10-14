<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabReportName extends Model
{
    protected $table = 'lab_report';
    protected $fillable = [
        'test_name','status'
    ];
}
