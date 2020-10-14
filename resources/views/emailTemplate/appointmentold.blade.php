<!DOCTYPE>
<html>
    <head>

    </head>
    <body>
    	<img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/bootstrap_startup/images/app_logo_new.png">
        <h3>Hello {{ $parameter['patient_name']}},</h3>
        {{-- <p>Your Appointment with {{$parameter['doctor_name']}} is {{$parameter['type']}}.</p> --}}
        @php
            if(isset($parameter['status'])){
               $msg= $parameter['status'];
            }else{
               $msg= 'confirmed';
            }
        @endphp
           
        <p>Your appointment is {{$msg}} with {{$parameter['doctor_name']}}</p>
        {{-- <p><b>Thanks & Regards</b></p> --}}
        @if(isset($parameter['report']))
        <p>
        <p>Medical Report</p>
        @foreach ($parameter['report'] as $image)
            @php
                $img=env('APP_URL')."storage/app/".trim($image);
            @endphp
            
            <img style="width: 100px;height:80px;" src="{{$img}}">
        @endforeach
        </p>
        @endif
        <p><b>Thank you for booking an appointment!</b></p>
        {{-- Sensoriom Team --}}
        Regards,<br>
		Sensoriom
    </body>
</html>