<!DOCTYPE>
<html>
    <head>

    </head>
    <body>
        <!--<img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/bootstrap_startup/images/app_logo_new.png">-->
        <img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/transparent-logo.png">
        <h3>Hello {{ @$parameter['fname'] }},</h3>
        <p>Greeting from Sensoriom,</p>
        <p>Clinic have been update record.</p>
        <p>
            Clinic name : {{ $clinic->fname }}
        </p>
        <p>
            Clinic Address : {{ $clinic->address }}
        </p>
        <p>
            New Password : {{ $newpassword }}
        </p>
        <p><b>Thanks & Regards</b></p>
        Sensoriom Team

    </body>
</html>
