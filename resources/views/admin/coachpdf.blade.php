<!DOCTYPE html>

<html>

<head>
	<title>{{ ucfirst($title) }}</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<style type="text/css">
    h1,h3{color: #3c8dbc;}
</style>

<body>

	<h1><b>{{ ucfirst($coach_name) }} All Details (Coach)</b></h1>

	 <div class='col-sm-12'>
                <div class="tab-content">
                   
                   <div class="tab-pane active" id="detail">
                        <label><h3>General Detail</h3></label>
                        <table class="table table-striped">
                            <tbody>
                            	<tr>
                                    <!-- <th><img style="width: 100px;height:100px;" src="http://innoviussoftware.com/vitalx/storage/app/doctor/profile_pic/FI3g54vOV4RuZ5Ttqr89nNvrByjUfE9KawZm1xhU.jpeg" ></th> -->
                                    <th><img style="width: 100px;height:100px;" src="{{ env('APP_URL') }}public/bootstrap_startup/images/app_logo_new.png" ></th>
                                    <td>
                                    	<b>{{ $coach_name }}
                                    	<br>
                                    	{{ $email }}
                                    	<br>
                                    	{{ $contact_number }}
                                    	<br>
                                    	{{ $status }}
                                    	</b>
                                    </td>
                                </tr>                                
                                <tr>
                                    <th>Qualification</th>
                                    <td>{{ $qualification }}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{ $city }}</td>
                                </tr>
                                <tr>
                                    <th>Registration Number</th>
                                    <td>{{ $registration_number }}</td>
                                </tr>
                                <tr>
                                    <th>Authority Council Name</th>
                                    <td>{{ $authority_council_name }}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    
                    @if(count($health_team) > 0)
                     <div class="tab-pane active table-responsive" id="team">
                        <label><h3>Health Team</h3></label>
                        <table class="table table-striped" id="team_detail">
                            <thead>
                                <tr>
                                    <th>Doctor Name</th>
                                    <th>Patient Name</th>
                                    <th>Hospital Name</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($health_team as $c)                                
                                <tr>
                                    <?php
                                    $doctor = App\User::select('fname')->where('id',$c['doctor_id'])->first();
                                    $patient = App\User::select('fname')->where('id',$c['patient_id'])->first();
                                    $hospital = App\Hospital::select('name')->where('id',$c['hospital_id'])->first();
                                    ?>
                                    <td>{{ ($doctor->fname != null) ? $doctor->fname : '-'  }}</td>
                                    <td>{{ ($patient->fname != null) ? $patient->fname : '-'  }}</td>
                                    <td>{{ ($hospital->name != null) ? $hospital->name : '-'  }}</td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                </div> 
        </div>


</body>

</html>