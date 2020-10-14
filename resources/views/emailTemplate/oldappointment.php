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
               //$msg= $parameter['status'];
               $msg= 'REJECTED';
            }else{
               $msg= 'APPROVED';
               //$msg= 'confirmed';
               
            }
        @endphp
        {{-- <p>Your appointment is {{$msg}} with {{$parameter['doctor_name']}}</p> --}}
        <p>Your appointment with {{$parameter['doctor_name']}} has been
        {{$msg}} by the Clinic.</p>
        @if ($msg == 'REJECTED')
            <p>You can call the clinic to know the reason.</p>
        @elseif($msg == 'APPROVED')
            <p>Please reach on time.</p>
        @endif
                {{-- @if(isset($parameter['report']))
                <p>
                <p>Medical Report</p>
                @foreach ($parameter['report'] as $image)
                    @php
                        $img=env('APP_URL')."storage/app/".trim($image);
                    @endphp
                    
                    <img style="width: 100px;height:80px;" src="{{$img}}">
                @endforeach
                </p>
                @endif --}}
        Thank you,<br>
        Regards,<br>
		Sensoriom
    </body>
</html>