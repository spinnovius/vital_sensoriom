<!DOCTYPE>
<html>
    <head>

    </head>
    <body>
        <h3>Hello {{ @$parameter['fname'] }},</h3>
        <!--<img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/bootstrap_startup/images/app_logo_new.png">-->
        <img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/transparent-logo.png">
        <p>Greeting from Sensoriom,</p>
        <p>Password for Sensoriom {{ @$parameter['type'] }} is :{{ @$parameter['password']  }}</p>
        <p><b>Thanks & Regards</b></p>
        Sensoriom Team

    </body>
</html>
