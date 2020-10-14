<!DOCTYPE>
<html>
    <head>

    </head>
    <body>
        <!--<img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/bootstrap_startup/images/app_logo_new.png">-->
        <img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/transparent-logo.png">
        
        <h3>Hello {{ @$parameter['fname'] }},</h3>
        
        <p>The {{ @$parameter['patient_name'] }} from {{ @$parameter['city'] }} was not satisfied with your  Teleconsultation and requests for the refund of the fees. To raise a dispute, please email us at escalate@sensoriom.com
        
        <p>Greeting from Sensoriom,</p>
        <p><b>Thanks & Regards</b></p>
        Sensoriom Team

    </body>
</html>
