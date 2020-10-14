<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videocall extends Model
{
    protected $table = 'videocall';

    // protected $fillable = [
    //     'patient_id','doctor_id','diagnosis','complaints','total_requested_time','request_status','response_status','call_status','call_time','notification_time'
    // ];
    protected $fillable = [
        'patient_id','doctor_id','diagnosis','complaints','total_requested_time','request_status','response_status','call_status','call_time','notification_time','notification_flag','call_start_status'
    ];

   public function doctor_fee()
    {
        return $this->belongsTo('App\DoctorDetail','doctor_id','doctor_id');
    }

}
