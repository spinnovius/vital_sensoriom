<!DOCTYPE>
<html>
    <head>

    </head>
    <body>
    	<!--<img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/bootstrap_startup/images/app_logo_new.png">-->
    	<img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/transparent-logo.png">
        <h3>Hello {{ $parameter['patient_name']}},</h3>
        <!--<p>Thank you for signing up with Sensoriom!</p>-->
        <!--<p>Use the Sensoriom mobile app to connect with the best local service providers who are committed to providing you with an excellent service experience...every time</p>-->
        <p>Thank you for visiting a Sensoriom Smart Clinic!</p>
        <p>To avail all the benefits of Sensoriom Technology Platform for your well being, sign up our mobile app now!</p>
        <!--<p>Password :- {{ @$parameter['password'] }}</p>-->
        <p>Your Password for the app: {{ @$parameter['password'] }}</p>
        <!--<a href="http://innoviussoftware.com/sansoriom" target="_black">click here to download the Sensoriom App</a>-->
        <a href="https://play.google.com/store/apps/details?id=online.doctor.consult.health.tracker.app&hl=en" target="_black">click here to download the app</a>
        <!--<p>Thank you for using Sensoriom!</p><br>-->
        <p>Thank you for using Sensoriom Smart Clinic!</p><br>
        Regards,<br>
		Sensoriom
    </body>
</html>