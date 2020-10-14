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

	<h1><b>{{ ucfirst($name) }} All Details (Patient)</b></h1>

	 <div class='col-sm-12'>
                <div class="tab-content">
                   
                   <div class="tab-pane active" id="detail">
                        <label><h3>General Detail</h3></label>
                        <table class="table table-striped">
                            <tbody>
                            	<tr>
                                    <!-- <th><img style="width: 100px;height:100px;" src="http://innoviussoftware.com/vitalx/storage/app/doctor/profile_pic/FI3g54vOV4RuZ5Ttqr89nNvrByjUfE9KawZm1xhU.jpeg" ></th> -->
                                    {{-- <th><img style="width: 100px;height:100px;" src="{{ env('APP_URL') }}public/bootstrap_startup/images/app_logo_new.png" ></th> --}}
                                    <th><img style="width: 100px;height:100px;" src="{{ url('storage/app/'.$profile_pic) }}" ></th>
                                    
                                    <td>
                                    	<b>{{ $name }}
                                    	<br>
                                    	{{ $email }}
                                    	<br>
                                    	{{ $contact_number }}
                                    	</b>
                                    </td>
                                </tr>                                
                                <tr>
                                    <th>Gender</th>
                                    <td>{{ $gender }}</td>
                                </tr>
                                <tr>
                                    <th>Date Of Birth</th>
                                    <td>{{ $dob }}</td>
                                </tr>
                                <tr>
                                    <th>Marital Status</th>
                                    <td>{{ $marital_status }}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{ $city }}</td>
                                </tr>
                                <tr>
                                    <th>Height</th>
                                    <td>{{ $height }}</td>
                                </tr>
                                <tr>
                                    <th>Weight</th>
                                    <td>{{ $weight }}</td>
                                </tr>
                                <tr>
                                    <th>BMI</th>
                                    <td>{{ $bmi }}</td>
                                </tr>
                                <tr>
                                    <th>Blood Group</th>
                                    <td>{{ $blood_group }}</td>
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
                                    $coach = App\User::select('fname')->where('id',$c['coach_id'])->first();
                                    $hospital = App\Hospital::select('name')->where('id',$c['hospital_id'])->first();
                                    ?>
                                    <td>{{ ($doctor->fname != null) ? $doctor->fname : '-'  }}</td>
                                    <td>{{ ($coach->fname != null) ? $coach->fname : '-'  }}</td>
                                    <td>{{ ($hospital->name != null) ? $hospital->name : '-'  }}</td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                    @php
                        //dd($plan_name);
                    @endphp
                    {{-- @if(count($plan_name) > 0) --}}
                    @if(isset($plan_name))
                     <div class="tab-pane active table-responsive" id="team">
                        <label><h3>Health Plan</h3></label>
                        <table class="table table-striped" id="team_detail">
                            <thead>
                                <tr>
                                    <th>Plan Name</th>
                                    <th>Plan Price</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <?php if($in_pay == 1)
                                {
                                    $payment_status = 'Purchased Plan';
                                }
                                elseif($in_pay == 0)
                                {
                                    $payment_status = 'Save Plan';
                                }
                                ?>
                            <tbody>
                                <tr>
                                    <td>{{ $plan_name }}</td>
                                    <td>{{ $plan_price }}</td>
                                    <td>{{ $one_line_description }}</td>
                                    <td>{{ $payment_status }}</td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if(count($family_contact) > 0)
                     <div class="tab-pane active table-responsive" id="team">
                        <label><h3>Family Contact Detail</h3></label>
                        <table class="table table-striped" id="team_detail">
                            <thead>
                                <tr>
                                    <th>Member Name</th>
                                    <th>Relation</th>
                                    <th>Contact Number</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($family_contact as $d)                                
                                <tr>
                                    <td>{{ $d['member_name']  }}</td>
                                    <td>{{ $d['relation'] }}</td>
                                    <td>{{ $d['contact_number'] }}</td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if(count($health_history) > 0)
                     <div class="tab-pane active table-responsive" id="team" style="width: 100%">
                        <label><h3>Health History</h3></label>
                        <table class="table table-striped" id="team_detail" style="width: none!important;max-width: none;">
                            <thead>
                                <tr>
                                    <th>Problem</th>
                                    <th>Smoking</th>
                                    <th>Alcohol Drinking</th>
                                    <th>Allergies</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($health_history as $h)                                
                                <?php
                                    $problem_id = explode(',',$h['problem_id']);

                                    $problem_name = array();
                                    foreach ($problem_id as $p) {
                                        $prb_name = App\HealthProblem::select('problem')->where('id',$p)->first(); 
                                        $problem_name[] = @$prb_name->problem;
                                    }

                                    $problem = implode(',',@$problem_name);
                                ?>
                                <tr>
                                    <td style="width: 25%">{{ @$problem  }}</td>
                                    <td>{{ @$h['smoking'] }}</td>
                                    <td>{{ @$h['alcohol_drinking'] }}</td>
                                    <td>{{ @$h['allergies'] }}</td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif


                    @if(count($health_history_family) > 0)
                     <div class="tab-pane active table-responsive" id="team">
                        <label><h3>Family Health History</h3></label>
                        <table class="table table-striped" id="team_detail">
                            <thead>
                                <tr>
                                    <th>Problem</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($health_history_family as $hhf) 
                                <?php
                                    $problem_id = explode(',',$hhf['problem_id']);

                                    $problem_name = array();
                                    foreach ($problem_id as $hf) {
                                        $prb_name = App\HealthProblem::select('problem')->where('id',$hf)->first(); 
                                        $problem_name[] = @$prb_name->problem;
                                    }

                                    $problem = implode(',',@$problem_name);
                                ?>                               
                                <tr>
                                    <td>{{ @$problem }}</td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif


                    @if(count($health_history_past) > 0)
                     <div class="tab-pane active table-responsive" id="team">
                        <label><h3>Past Health History</h3></label>
                        <table class="table table-striped" id="team_detail">
                            <thead>
                                <tr>
                                    <th>Problem</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($health_history_past as $hhp) 
                                <?php
                                    $problem_id = explode(',',$hhp['problem_id']);

                                    $problem_name = array();
                                    foreach ($problem_id as $hp) {
                                        $prb_name = App\HealthProblem::select('problem')->where('id',$hp)->first(); 
                                        $problem_name[] = @$prb_name->problem;
                                    }

                                    $problem = implode(',',@$problem_name);
                                ?>                               
                                <tr>
                                    <td>{{ @$problem }}</td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if(count($health_record) > 0)
                     <div class="tab-pane active table-responsive" id="team"  style="width: 100%">
                        <label><h3>Health Record</h3></label>
                        <table class="table table-striped" id="team_detail" style="width: none!important;max-width: none;">
                            <thead>
                                <tr>
                                    <th>Blood Pressure<br>Min Value</th>
                                    <th>Blood Pressure<br>Max Value</th>
                                    <th>Pulse</th>
                                    <th>Temperature</th>
                                    <th>Oxygen<br>Saturation</th>
                                    <th>Breathing<br>Rate</th>
                                    <th>Abdominal<br>Circumference</th>
                                    <th>Blood<br>Sugar</th>
                                    <th>Weight</th>
                                    <th>Height</th>
                                    <th>BMI</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($health_record as $r) 
                                <tr>
                                    <td>{{ $r['blood_pressure_min_value'] }}</td>
                                    <td>{{ $r['blood_pressure_max_value'] }}</td>
                                    <td>{{ $r['pluse'] }}</td>
                                    <td>{{ $r['temperature'] }}</td>
                                    <td>{{ $r['oxygen_saturation'] }}</td>
                                    <td>{{ $r['breathing_rate'] }}</td>
                                    <td>{{ $r['abdominal_circumference'] }}</td>
                                    <td>{{ $r['blood_sugar'] }}</td>
                                    <td>{{ $r['weight'] }}</td>
                                    <td>{{ $r['height'] }}</td>
                                    <td>{{ $r['bmi'] }}</td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif


                    @if(count($lab_report) > 0)
                     <div class="tab-pane active table-responsive" id="team">
                        <label><h3>Lab Report Detail</h3></label>
                        <table class="table table-striped" id="team_detail">
                            <thead>
                                <tr>
                                    <th>Coach Name</th>
                                    <th>Test Name</th>
                                    <th>Test Date</th>
                                    <th>Value</th>
                                    <th>Unit</th>
                                    <th>Result</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($lab_report as $lb) 
                                <tr>
                                    <td>{{ $lb->coach_name }}</td>
                                    <td>{{ $lb->test_name }}</td>
                                    <td>{{date("d-m-Y", strtotime($lb->test_date))}}</td>
                                    <td>{{ $lb->value }}</td>
                                    <td>{{ $lb->unit }}</td>
                                    <td>{{ $lb->result }}</td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if(count($past_history) > 0)
                     <div class="tab-pane active table-responsive" id="team">
                        <label><h3>Past History</h3></label>
                        <table class="table table-striped" id="team_detail">
                            <thead>
                                <tr>
                                    <th>Blood Transfusion</th>
                                    <th>Blood Transfusion Remark</th>
                                    <th>Surgery</th>
                                    <th>Surgery Remark</th>
                                    <th>Hospitalization</th>
                                    <th>Hospitalization Remark</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($past_history as $r) 
                                <tr>
                                    <td>{{ $r['blood_transfusion'] }}</td>
                                    <td>{{ $r['blood_transfusion_remark'] }}</td>
                                    <td>{{ $r['surgery'] }}</td>
                                    <td>{{ $r['surgery_remark'] }}</td>
                                    <td>{{ $r['hospitalization'] }}</td>
                                    <td>{{ $r['hospitalization_remark'] }}</td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if(count($patient_prescrition) > 0)
                     <div class="tab-pane active table-responsive" id="team">
                        <label><h3>Prescription</h3></label>
                        <table class="table table-striped" id="team_detail">
                            <thead>
                                <tr>
                                    <th>Doctor</th>
                                    <th>Medicine Name</th>
                                    <th>Dose</th>
                                    <th>Freq</th>
                                    <th>Route</th>
                                    <th>Duration</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($patient_prescrition as $pp) 
                                <tr>
                                    <td>{{ $pp->fname }}</td>
                                    <td>{{ $pp->medicine_name }}</td>
                                    <td>{{ $pp->dose }}</td>
                                    <td>{{ $pp->freq }}</td>
                                    <td>{{ $pp->route }}</td>
                                    <td>{{ $pp->duration }}</td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if(count($patient_procedure) > 0)
                     <div class="tab-pane active table-responsive" id="team">
                        <label><h3>Prescription</h3></label>
                        <table class="table table-striped" id="team_detail">
                            <thead>
                                <tr>
                                    <th>Coach</th>
                                    <th>Procedure Name</th>
                                    <th>Procedure Date</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($patient_procedure as $pp) 
                                <tr>
                                    <td>{{ $pp->fname }}</td>
                                    <td>{{ $pp->procedure_name }}</td>
                                    <td>{{date("d-m-Y", strtotime($pp->procedure_date))}}</td>
                                    <td>{{ $pp->remark }}</td>
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
@php
    //exit;
@endphp