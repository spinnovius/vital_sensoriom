<!DOCTYPE>
<html>
    <head>

    </head>
    <body>
        <!--<img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/bootstrap_startup/images/app_logo_new.png">-->
        <img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/transparent-logo.png">
        <h3>Hello {{ @$parameter['fname'] }},</h3>
        <p>Greeting from Sensoriom,</p>
        <p>Your new {{ $parameter['type'] }} Account has been created. Welcome to the Sensoriom.</p>
        <?php if($parameter['type'] == 'Patient'){ ?>
        <p>From  now on, please log in to your account using your registered mobile number and your password.</p>
        <?php } else { ?>
        <p>You will receive an email with your login credentials after admin will approve your account.</p>
        <?php } ?>
        <p>To add more profiles. Log in to the sensoriom and click profile.</p>
        
        <p><b>Thanks & Regards</b></p>
        Sensoriom Team

    </body>
</html>
