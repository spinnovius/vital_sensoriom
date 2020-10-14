<!DOCTYPE>
<html>
    <head>

    </head>
    <body>
        <!--<img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/bootstrap_startup/images/app_logo_new.png">-->
        <img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/transparent-logo.png">
        <h3>Hello {{ ucfirst(@$parameter['fname']) }},</h3>
        <p>Greeting from Sensoriom,</p>
        <p>We’d like to take this opportunity to thank you for your support over the past 1 months. We value all contributions to sensoriom, and subscription plan make up the our organization. Your involvement is extremely important to us and very much appreciated.</p>
        <p>That said, we know you’re busy and just wanted to take this time to remind you that your subscription plan with sensoriom will expire on <b>{{ $parameter['date'] }}</b>.</p>
        <p>If you’re still deciding whether or not to renew, or just haven’t gotten around to it yet, please let us remind you of what you’ll be missing if you do not renew your subscription plan with Sensoriom:
        </p>
        <p>We hope that you’ll take this time to renew your subscription plan and remain a part of our community.</p>
        
        <p><b>Thanks & Regards</b></p>
        Sensoriom Team

    </body>
</html>
