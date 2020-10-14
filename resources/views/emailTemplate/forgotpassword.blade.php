<!DOCTYPE>
<html>
    <head>

    </head>
    <body>
        <h3>Hello {{ @$parameter['fname'] }},</h3>
        <!--<img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/bootstrap_startup/images/app_logo_new.png">-->
        <img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/transparent-logo.png">
        <p>Greeting from Sensoriom,</p>
        <p>We got a request to forgot your Sensoriom {{ $parameter['type'] }} account password </p>
        <p>Your new password for Sensoriom {{ @$parameter['type'] }} account is :{{ @$parameter['password']  }}</p>
        
        <p><b>Thanks & Regards</b></p>
        Sensoriom Team

    </body>
</html>
