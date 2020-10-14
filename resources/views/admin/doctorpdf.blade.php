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

	<h1><b>{{ ucfirst($name) }} All Details (Doctor)</b></h1>

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
                                    	<b>{{ $name }}
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
                                    <th>Experience</th>
                                    <td>{{ $exp_year }}</td>
                                </tr>
                                <tr>
                                    <th>Speciality</th>
                                    <td>{{ $speciality }}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{ $city }}</td>
                                </tr>
                                <tr>
                                    <th>Fee of consiltation</th>
                                    <td>{{ $fee_of_consultation }}</td>
                                </tr>
                                <tr>
                                    <th>MBBS Registration Number</th>
                                    <td>{{ $mbbs_registration_number }}</td>
                                </tr>
                                <tr>
                                    <?php $mbbs_authority_council_name1 = App\AuthorityCouncil::select('name')->where('id',$mbbs_authority_council_name)->first();  ?>
                                    <th>MBBS Authority Council Name</th>
                                    <td>{{ @$mbbs_authority_council_name1->name }}</td>
                                </tr>
                                <tr>
                                    <th>MD MS DNB Registration Number</th>
                                    <td>{{ @$md_ms_dnb_registration_number }}</td>
                                </tr>
                                <tr>
                                    <?php $md_ms_dnb_authority_council_name1 = App\AuthorityCouncil::select('name')->where('id',$md_ms_dnb_authority_council_name)->first();  ?>
                                    <th>MD MS DNB Authority Councul Name</th>
                                    <td>{{ @$md_ms_dnb_authority_council_name1->name }}</td>
                                </tr>
                                <tr>
                                    <th>DM MCH DNB Registration Number</th>
                                    <td>{{ @$dm_mch_dnb_registration_number }}</td>
                                </tr>
                                <tr>
                                    <?php $dm_mch_dnb_authority_council_name1 = App\AuthorityCouncil::select('name')->where('id',$dm_mch_dnb_authority_council_name)->first();  ?>

                                    <th>DM MCH DNB Authority Council Name</th>
                                    <td>{{ @$dm_mch_dnb_authority_council_name1->name }}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane active" id="detail">
                        <label><h3>Bank Detail</h3></label>
                        <table class="table table-striped">
                            <?php $account_number1 = substr(base64_decode($account_number), -4); ?> 
                            <tbody>                               
                                <tr>
                                    <th>Bank Name</th>
                                    <td>{{ $bank_name }}</td>
                                </tr>
                                <tr>
                                    <th>Account Number</th>
                                    <td>{{ $account_number1 }}</td>
                                </tr>
                                <tr>
                                    <th>IFSC Code</th>
                                    <td>{{ $ifsc_code }}</td>
                                </tr>
                                <tr>
                                    <th>Beneficiary Name</th>
                                    <td>{{ $beneficiary_name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    @if(count($doctors_balance) > 0)
                    <div class="tab-pane active" id="balance">
                        <div class="table-responsive">
                        <label><h3>Balance Detail</h3></label>
                        <table class="table table-striped" id="doctorbalance_detail">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Patient</th>
                                    <th>Online Amount</th>
                                    <!-- <th>Offline Amount</th> -->
                                    <th>Amount Description</th>
                                    <th>Total Balance</th>
                                </tr>                                
                            </thead>
                            <tbody>
                                <?php   
                                    $total_balance = 0;
                                    ?>
                                        @foreach($doctors_balance as $db)
                                        <tr>
                                            <td>{{ $db->id }}</td>
                                            <td>{{ $db->patient_name }}</td>
                                            <td>{{ $db->online_amount ? $db->online_amount : "-" }}</td>
                                            <td>{{ $db->amount_description ? $db->amount_description : "-" }}</td>
                                            <td>{{ $db->total_amount ? $db->total_amount : "-" }}</td>
                                        </tr>
                                        <?php $total_balance = $total_balance + $db->total_amount; ?>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>{{ $total_balance }}</b></td>
                                        </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    @endif

                    @if(@count($health_team) > 0)
                     <div class="tab-pane active table-responsive" id="team">
                        <label><h3>Health Team</h3></label>
                        <table class="table table-striped" id="team_detail">
                            <thead>
                                <tr>
                                    <th>Coach Name</th>
                                    <th>Patient Name</th>
                                    <th>Hospital Name</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($health_team as $c)                                
                                <tr>
                                    <?php
                                    $coach = App\User::select('fname')->where('id',$c['coach_id'])->first();
                                    $patient = App\User::select('fname')->where('id',$c['patient_id'])->first();
                                    $hospital = App\Hospital::select('name')->where('id',$c['hospital_id'])->first();
                                    ?>
                                    <td>{{ ($coach->fname != null) ? $coach->fname : '-'  }}</td>
                                    <td>{{ ($patient->fname != null) ? $patient->fname : '-'  }}</td>
                                    <td>{{ ($hospital->name != null) ? $hospital->name : '-'  }}</td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if(count($doctor_call_history) > 0)
                    <div class="tab-pane active" id="calling_history">
                         <div class="table-responsive">
                            <label><h3>Calling History</h3></label>
                        <table class="table table-striped" id="calling_history_detail">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Patient</th>
                                    <th>Calling Time</th>
                                    <th>Date</th>
                                </tr>                                
                            </thead>
                            <tbody>
                                @foreach($doctor_call_history as $dc)
                                <tr>
                                    <td>{{ $dc->id }}</td>
                                    <td>{{ (@$dc->fname != null) ? ucfirst($dc->fname) : '-'  }}</td>
                                    <td>{{ (@$dc->calling_time != null) ? @$dc->calling_time : '-'  }}</td>
                                    <td>{{ (@$dc->created_at != null) ? date('d-m-Y h:i A', strtotime(@$dc->created_at)) : '-'  }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                    @endif

                </div> 
        </div>


</body>

</html>