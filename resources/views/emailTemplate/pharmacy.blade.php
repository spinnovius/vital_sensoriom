<!DOCTYPE>
<html>
    <head>

    </head>
    <body>
    	<!--<img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/bootstrap_startup/images/app_logo_new.png">-->
    	<img style="width: 100px;height:80px;" src="{{ env('APP_URL') }}public/transparent-logo.png">
        <h3>Hello {{ $parameter['0']->name }},</h3>
        <p>Please check  atteched prescription.</p>
        <p>Name : {{ $patient->patient_name }}</p>
        <p>Contact  : {{ $patient->patient_contact }}</p>
        <p>
        	<?php

        	if($patient->image){
        		$img = explode(",",$patient->image);
        		foreach($img as $file){ 
                    //dd(ENV("APP_URL")."storage/app/".$file);
	        		?>
	        		<img style="width: 100px;height:80px;"  src='<?php echo ENV("APP_URL")."storage/app/".$file; ?>' alt="patient">
	        		<?php
				}
			}
        	?>
        </p>
        <p><b>Thanks & Regards</b></p>
        Sensoriom Team

    </body>
</html>