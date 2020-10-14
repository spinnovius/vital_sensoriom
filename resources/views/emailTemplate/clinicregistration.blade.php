<!DOCTYPE>
<html>
    <head>

    </head>
    <body>
    	<!--<img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/bootstrap_startup/images/app_logo_new.png">-->
    	<img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/transparent-logo.png">
        <h3>Hello {{ $parameter['patient_name']}},</h3>
        <p>To avail all the benefits of Sensoriom Technology Platform for your wellbeing, sign up our mobile app now!</p><br>
        
        <p>Your Password for the Web: {{ @$parameter['password'] }}</p><br>
        <a href="http://vitalxhealth.com/sensoriom/admin" target="_black">Web Login</a><br>
        <a href="https://play.google.com/store/apps/details?id=online.doctor.consult.health.tracker.app&hl=en" target="_black">click here to download the app</a><br>
        <p>Thank you for using Sensoriom Smart Clinic!</p><br>
        Regards,<br>
		Sensoriom
    </body>
</html>