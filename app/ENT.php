<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ENT extends Model
{
    protected $table = 'ent_examination';
    
    protected $fillable = [
        'doctor_id','examination_id','generalappearance','abilitycommunicate','constitutional','externalexamination','nasalmucosa','lips','examination_oropharynx','pharyngealwalls','laryngoscopic','adenoids','externalauditory','assementofhearing','salivary_glands','tender_areas','examination_neck','thyroidexamination','diff_diagnosis','planned_procedure'
    ];

    public  $timestamps = false;
}
