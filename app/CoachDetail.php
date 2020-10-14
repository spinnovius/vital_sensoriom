<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoachDetail extends Model
{
    protected $table = 'coach_detail';
    protected $fillable = [
        'coach_id','city', 'qualification', 'registration_number', 'authority_council_id','profile_pic','document','status'
    ];
}
