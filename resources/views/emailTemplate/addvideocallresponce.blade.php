<!DOCTYPE>
<html>
    <head>

    </head>
    <body>
        <!--<img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/bootstrap_startup/images/app_logo_new.png">-->
        <img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/transparent-logo.png">
        <h3>Hello {{ @$doctor['fname'] }},</h3>
        <p>Patient detail : </p>
        <p>Patient Name = {{ @$parameter['fname'] }}</p>
        <p>Patient id = {{ @$videocall['patient_id'] }}</p>
        <p>Doctor id = {{ @$videocall['doctor_id'] }}</p>
        <p>Diagnosis = {{ @$videocall['diagnosis'] }}</p>
        <p>Complaints = {{ @$videocall['complaints'] }}</p>
        <p>Requested Time = {{ @$videocall['total_requested_time'] }}</p>
        <p>Request Status = {{ @$videocall['request_status'] }}</p>	
        <p>Response Status = {{ @$videocall['response_status'] }}</p>	
        <p>Call Status = {{ @$videocall['call_status'] }}</p>
        <p>From User = Doctor</p>	
        <p>Notification Type = book call request</p>
        <p><b>Thanks & Regards</b></p>
        Sensoriom Team

    </body>
</html>
<?php //exit; ?>
