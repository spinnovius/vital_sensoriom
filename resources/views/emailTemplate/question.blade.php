<!DOCTYPE>
<html>
    <head>

    </head>
    <body>
        <!--<img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/bootstrap_startup/images/app_logo_new.png">-->
        <img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/transparent-logo.png">
        <h3>Hello {{ @$parameter['fname'] }},</h3>
        <p>Question : {{ @$question }}</p>
        <p><b>Thanks & Regards</b></p>
        Sensoriom Team

    </body>
</html>
