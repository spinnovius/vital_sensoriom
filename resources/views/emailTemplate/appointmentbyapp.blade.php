<!DOCTYPE>
<html>
    <head>

    </head>
    <body>
    	<h3>Hello{{--  {{ $parameter['patient_name']}} --}},</h3>
        {{-- <p>Your Appointment with {{$parameter['doctor_name']}} is {{$parameter['type']}}.</p> --}}
        {{-- @php
            if(isset($parameter['status'])){
               $msg= $parameter['status'];
            }else{
               $msg= 'confirmed';
            }
        @endphp --}}
        <p>Thank you for using Sensoriom app to book
your appointment with {{$parameter['doctor_name']}}.{{--$msg--}}</p>
        <p>Please wait for the approval of your booking
        from the clinic.</p>
        <p>Thank you,</p>
        Regards,<br>
		Sensoriom<br>
        <!--<img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/bootstrap_startup/images/app_logo_new.png">-->
        <img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/transparent-logo.png">
    </body>
</html>