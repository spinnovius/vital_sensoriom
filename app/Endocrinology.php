<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endocrinology extends Model
{
    protected $table = 'endocrinology_examination';

    protected $fillable = [
        'doctor_id','examination_id','built','hair','eye','ear','midfacial','lip','dental','tongue','neck','skin','podiatric','peripheral','complete','external','sexual','systemic','diff_diagnosis','planned_procedure'
    ];

    public  $timestamps = false;
}
