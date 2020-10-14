<?php

namespace App\Helpers\Notification;

use Illuminate\Support\Facades\DB;
use App\User;

class PushNotification {

    public static function SendPushNotification($msg) {
        self::PushAndroidNotification($msg);
        self::PushIphoneNotification($msg);
    }

    public static function PushAndroidNotificationUser($msg, $data, $device_ids) {

            $fields = array
                (
                'registration_ids' => $device_ids,
                'data' => $data,
                'notification' => $msg,
                'content_available' => true,
            );  
                //dd($fields);
            $headers = array
            (
            // AAAA1y4IV54:APA91bEgWv7gADlqm-XPJYou8M41XNYYflPeBCn8qLMUlLg2u5ornHM55D3NSu8kLUbEyF0QVSY_hqrXP1E77dJsr2yVBFV09JiMA6XqUd1PjgAfqIiLe0vYtCBNLnXucAksLMZxL6YHzbUOeIMZ_m08Vw78ugNaLQ
                
                //17-08-2020 'Authorization: key=AAAANa5-Z0A:APA91bHdQvWZcHCgK3YJbbqzzuN0EtuD7M6OCVNDdYe22WWnkQSj8kM74L_kSh1c5xvq7R9RdHFyCY8zMGxjL_1Md6T14FJONKUJTDBHbnpqQ0ofrdxm-KkJ0crSEhXDgC-WoEl2WAO8','Content-Type: application/json'
                'Authorization: key=AAAA3Gcp5lM:APA91bFKtOfuBJxbv_G4jEs9z_F_617I5ieqz6nYHAhG6GPCsKS7dbnexnYNaWXsff-GCOlmpXpiz6ADgkdIPFgxVfHg5P2EKdIZJqw2iLAORjocUPOmZpuWk1MRwqRQPSXCBH2Bfpyg','Content-Type: application/json'
            );
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            $result = curl_exec($ch);
 
            curl_close($ch);            
        }

    }
    