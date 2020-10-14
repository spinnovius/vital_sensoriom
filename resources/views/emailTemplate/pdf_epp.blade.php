<!DOCTYPE>
<html>
    <head>

    </head>
    <body>
    	<!--<img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/bootstrap_startup/images/app_logo_new.png">-->
    	<img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/transparent-logo.png">
        <p>Hello {{$parameter['patient_name']}},</p>
        <p>Dr.{{$parameter['doctor_name']}} Share Prescription as below</p>
        <p>Please check the attached PDF for it.</p>
        <p>Regards,</p>
        <p>Sensoriom.</p>
    </body>
</html>