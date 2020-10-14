<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\Notification\PushNotification;
use App\Videocall;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Sentnotification:Notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notification Sent Successfully';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $date = date('Y-m-d H:i:s');

        $videocall = Videocall::whereDate('notification_time','<=',$date)->get();

        $patient_detail=[];

        foreach ($videocall as $value) {
            
            $users=User::select('*')->where('id',$value->patient_id)->first()->toArray();
           
            $patient_detail[] = $users['device_id'];

        }

         $cmsg = array(

                'body' => "You've a scheduled video call pending from your end. Kindly start the call within 2 minutes, otherwise your request will be terminated and fees forfeited",

                'title' => 'Video call reminder',  

                'icon' => 'myicon',

                'sound' => 'mySound'

        );

        $coach_msg = array('type' => 'Coach','coach_id' => '1');

        PushNotification::PushAndroidNotificationUser($cmsg, $coach_msg, $patient_detail);

        Videocall::whereId(13)->update([
                  'response_status' =>'1',
                  'request_status' =>'1',
                  'call_status' =>'1',
                  'call_time'=>'0',
                  'notification_time'=>'0',
        ]);
    }
}
