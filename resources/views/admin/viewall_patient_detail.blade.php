@extends('layouts.admin')

@section('content')

<section class="content-header">
    <h1>Details of {{  ucfirst($patient->fname) }}</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="{{ route('patient.viewall_patient') }}"><i class="fa fa-dashboard"></i>Patient List</a></li>        
        <li class="active">Patient All Details</li>
    </ol>
</section>

<section class="content">
    <div class='row' id='pro_desc'>
        <div class="col-xs-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class='text-white'>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if( session('success') )
            <div class="alert alert-success alert-dismissable fade in alert_msg">            
                <span style='color:white'>{{ session('success') }}</span>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
            @endif
            @if( session('danger') )
            <div class="alert alert-danger alert-dismissable fade in alert_msg">            
                <span style='color:white'>{{ session('danger') }}</span>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
            @endif
            @if( session('warning') )
            <div class="alert alert-warning alert-dismissable fade in alert_msg">            
                <span style='color:white'>{{ session('warning') }}</span>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
            @endif
        </div>
        
        <div class='col-sm-3'>
            <div class="box box-primary">
                <div class="box-body box-profile">

                    @if($patient->profile_pic != null)
                    <img class="profile-user-img img-responsive img-circle" src="{{ url('storage/app/'.$patient->profile_pic) }}" alt="Profile Pic"  style="width:150px;height:150px;" />
                    @else
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('public/dist/img/no-image-available.png') }}" alt="Profile Pic"/>
                    @endif

                    <h3 class="profile-username text-center">{{ ucfirst($patient->fname) }}</h3>


                    <p class="text-muted text-center">{{ $patient->email }}</p>

                    <ul class="list-group list-group-unbordered">
                       <!--  <li class="list-group-item">
                            <b>Email</b>
                            @if($patient->email != null)
                            <a class="pull-right">{{ $patient->email }}</a>
                            @else
                            <a class="pull-right"> - </a>
                            @endif
                        </li> -->
                        <li class="list-group-item">
                            <b>Contact No</b>
                            @if($patient->contact_number != null)
                            <a class="pull-right">{{ $patient->contact_number }}</a>
                            @else
                            <a class="pull-right"> - </a>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Create Date</b>
                            @if($patient->created_at != null)
                            <a class="pull-right">{{ date('d-m-Y',strtotime($patient->created_at))  }}</a>
                            @else
                            <a class="pull-right"> - </a>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Update Date</b>
                            @if($patient->updated_at != null)
                            <a class="pull-right">{{ date('d-m-Y',strtotime($patient->updated_at ))  }}</a>
                            @else
                            <a class="pull-right"> - </a>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Status</b> <a class="pull-right">@if($patient->status == 1) <span style="color: green;">Active</span>@else <span style="color: red;">Inactive</span> @endif</a>
                        </li>

                        
                    </ul>                    
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        
        <div class='col-sm-9'>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    @if( session('vitals'))
                    <li class=""><a href="#detail" data-toggle="tab" aria-expanded="true">Details</a></li>
                    @else
                    <li class="active"><a href="#detail" data-toggle="tab" aria-expanded="true">Details</a></li>
                    @endif
                    <li class=""><a href="#family" data-toggle="tab" aria-expanded="false">Family Contact</a></li>
                    <li class=""><a href="#plan" data-toggle="tab" aria-expanded="false">Health Plan</a></li>
                    <li class=""><a href="#wallet" data-toggle="tab" aria-expanded="false">Wallet</a></li>
                    <li class=""><a href="#lab_detail" data-toggle="tab" aria-expanded="false">Lab Detail</a></li>
                    <li class=""><a href="#procedures" data-toggle="tab" aria-expanded="false">Procedures</a></li>
                    <li class=""><a href="#family_health_history" data-toggle="tab" aria-expanded="false">Family Health History</a></li>
                    <li class=""><a href="#past_health_history" data-toggle="tab" aria-expanded="false">Patient Past Health History</a></li>
                    <li class=""><a href="#personal_past_history" data-toggle="tab" aria-expanded="false">Patient Personal History</a></li>
                    <li class=""><a href="#allergies" data-toggle="tab" aria-expanded="false">Patient Allergies</a></li>
                    <li class=""><a href="#calling_history" data-toggle="tab" aria-expanded="false">Calling History</a></li>
                    <li class=""><a href="#patient_priscription" data-toggle="tab" aria-expanded="false">Prescription</a></li>
                </ul>
                <div class="tab-content">
                   <div class="tab-pane active table-responsive" id="detail">
                        <table class="table table-striped" id="patient_detail">
                            <tbody>                                
                                <tr>
                                    <th style="width:40%;">Email</th>
                                    <td>{{  ($patient->email != null) ? $patient->email : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Contact Number</th>
                                    <td>{{  ($patient->contact_number != null) ? $patient->contact_number : '-'  }}</td>
                                </tr> 
                                <tr>
                                    <th style="width:40%;">Role</th>
                                    <td>{{  ($patient->role != null) ? $patient->role : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">City</th>
                                    <td>{{  ($patient->city != null) ? $patient->city : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Gender</th>
                                    <td>{{  ($patient->gender != null) ? $patient->gender : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">DOB</th>
                                    
                                    <td>{{  ($patient->dob != null) ? date("d-m-Y", strtotime($patient->dob)) : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Marital Status</th>
                                    <td>{{  ($patient->marital_status != null) ? $patient->marital_status : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Height</th>
                                    <td>{{  ($patient->height != null) ? $patient->height : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Weight(kg)</th>
                                    <td>{{  ($patient->weight != null) ? $patient->weight : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">BMI</th>
                                    <td>{{  ($patient->bmi != null) ? $patient->bmi : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Blood Group</th>
                                    <td>{{  ($patient->blood_group != null) ? $patient->blood_group : '-'  }}</td>
                                </tr>
                            </tbody>
                        </table>
                   </div>

                    <div class="tab-pane table-responsive" id="family">
                        <table class="table table-striped" id="family_detail">
                            <thead>
                                <tr>
                                    <th>Member Name</th>
                                    <th>Relation</th>
                                    <th>Contact Number</th>
                                </tr>
                            </thead>
                            <?php 
                            $familycontact = App\PatientFamilyContact::where('patient_id',$patient->id)->get()->toArray();
                            ?>
                            <tbody>
                                @if(@count($familycontact) > 0)
                                @foreach($familycontact as $f)                                
                                <tr>
                                    <td>{{ ($f['member_name'] != null) ? ucfirst($f['member_name']) : '-'  }}</td>
                                    <td>{{ ($f['relation'] != null) ? ucfirst($f['relation']) : '-'  }}</td>
                                    <td>{{ ($f['contact_number'] != null) ? $f['contact_number'] : '-'  }}</td>
                                </tr> 
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="tab-pane table-responsive" id="plan">
                        <table class="table table-striped" id="plan_detail">
                            <tbody>                                
                                <tr>
                                    <th style="width:40%;">Plan Name</th>
                                    <td>{{  ($patient->plan_name != null) ? $patient->plan_name : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Price</th>
                                    <td>{{  (@$patient->price != null) ? @$patient->price : '-'  }}</td>
                                </tr> 
                                <tr>
                                    <th style="width:40%;">Description</th>
                                    <td>{{  (@$patient->one_line_description != null) ? @$patient->one_line_description : '-'  }}</td>
                                </tr>
                                <?php 
                                    if($patient->plan_name != '') 
                                    { 
                                        if(@$patient->in_pay == 0)
                                        { 
                                            $plan_status = 'Save Plan';
                                        }
                                        elseif(@$patient->in_pay == 1)
                                        { 
                                            $plan_status = 'Purchase Plan'; 
                                        } 
                                    }
                                ?>
                                <tr>
                                    <th style="width:40%;">Plan Status</th>
                                    <td>{{  (@$plan_status != null) ? @$plan_status : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Create Date</th>
                                    <td>{{  (@$patient->plan_create_date != null) ? @$patient->plan_create_date : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Update Date</th>
                                    <td>{{  (@$patient->plan_update_date != null) ? @$patient->plan_update_date : '-'  }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane table-responsive" id="wallet">
                        <table class="table table-striped" id="wallet_detail">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Credit Amount</th>
                                    <th>Debit Amount</th>
                                    <th>Amount Description</th>
                                    <th>Total Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <?php 
                            $patientwallet = App\PatientWalletDetail::where('patient_id',$patient->id)->orderby('id','asc')->get()->toArray();
                            ?>
                            <tbody>
                                @if(@count($patientwallet) > 0)
                                @foreach($patientwallet as $w)                                
                                <tr>
                                    <td>{{ $w['id'] }}</td>
                                    <td>{{ ($w['credit_amount'] != null) ? $w['credit_amount'] : '-'  }}</td>
                                    <td>{{ ($w['debit_amount'] != null) ? $w['debit_amount'] : '-' }}</td>
                                    <td>{{ ($w['amount_description'] != null) ? $w['amount_description'] : '-'  }}</td>
                                    <td>{{ ($w['total_amount'] != null) ? $w['total_amount'] : '-'  }}</td>
                                    <td>{{ ($w['created_at'] != null) ? $w['created_at'] : '-'  }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right"><b>Total Balance : </b></td>
                                    <td><b>{{ ($w['total_amount'] != null) ? $w['total_amount'] : '-' }}</b></td>
                                    <td></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>                    
                   
                    <div class="tab-pane table-responsive" id="lab_detail">
                        <table class="table table-striped" id="lab_detail1">
                                <thead>
                                    <tr>
                                        <th>Coach Name</th>
                                        <th>Test Name</th>
                                        <th>Date</th>
                                        <th>Value</th>
                                        <th>Unit</th>
                                        <th>Result</th>
                                    </tr>
                                </thead>
                                <?php 
                                $patientlabdetail = App\PatientLabDetail::where('patient_id',$patient->id)->orderby('test_name')->get()->toArray();
                                ?>
                                <tbody>
                                    @if(count($patientlabdetail) > 0)
                                    @foreach($patientlabdetail as $l)                                
                                    <tr>
                                        <?php $coach_name = App\User::where('id',$l['coach_id'])->first();?>
                                        <td>{{ ($coach_name) ? $coach_name['fname'] : '-'  }}</td>
                                        <td>{{ ($l['test_name'] != null) ? $l['test_name'] : '-'  }}</td>
                                        <td>{{ ($l['test_date'] != null) ? date('m-d-Y',strtotime($l['test_date'] )) : '-' }}</td>
                                        <td>{{ ($l['value'] != null) ? $l['value'] : '-'  }}</td>
                                        <td>{{ ($l['unit'] != null) ? $l['unit'] : '-'  }}</td>
                                        <td>{{ ($l['result'] != null) ? $l['result'] : '-'  }}</td>
                                    </tr> 
                                    @endforeach
                                @endif
                                </tbody>
                        </table>
                    </div>

                    <div class="tab-pane table-responsive" id="procedures">
                        <table class="table table-striped" id="procedures_detail">
                            <thead>
                                <tr>
                                    <th>Coach Name</th>
                                    <th>Procedure Name</th>
                                    <th>Date</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>
                            <?php 
                            $patientprocedures=App\PatientProcedure::select('patient_procedure.*','authority_council.name as coach')
                            ->leftjoin('authority_council','patient_procedure.coach_id','=','authority_council.id')
                            ->where('patient_id',$patient->id)
                            ->orderby('procedure_name')
                            ->get()->toArray();
                            ?>
                            <tbody>
                                @if(count($patientprocedures) > 0)
                                @foreach($patientprocedures as $p)                                
                                <?php $procedure_name = App\Procedure::select('procedure_name')->where('id',$p['procedure_name'])->first(); ?>
                                <tr>
                                    <td>{{ ($p['coach']) ? $p['coach'] : '-'  }}</td>
                                    <td>{{ ($p['procedure_name'] != null) ? $p['procedure_name'] : '-'  }}</td>
                                    <td>{{ ($p['procedure_date'] != null) ? $p['procedure_date'] : '-' }}</td>
                                    <td>{{ ($p['remark'] != null) ? $p['remark'] : '-'  }}</td>
                                </tr> 
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane table-responsive" id="family_health_history">
                        <table class="table table-striped">
                            <tbody> 
                            <?php 
                            $patientfamilyhealthhistory = App\PatientFamilyHealthHistory::where('patient_id',$patient->id)->get()->toArray();
                            ?>   
                            @if($patientfamilyhealthhistory)
                            <?php
                                $prb = explode(',', @$patientfamilyhealthhistory[0]['problem_id']); 
                                $problemName = array();
                            ?>
                                                           
                                <?php 
                                foreach($prb as $fh){
                                    $problemname_count = App\HealthProblem::select('problem')->where('id',@$fh)->where('type','Family')->first();
                                    //dd($problemname_count);
                                    if(isset($problemname_count))
                                    {
                                        $problemName[] = $problemname_count->problem;    
                                    }
                                    else
                                    {
                                        
                                    }
                                    
                                }
                                $prbname = implode(',', $problemName);
                                ?>
                                <tr>
                                    <th>Problem Name</th>
                                    <td>{{ $prbname }}</td>
                                </tr>
                                @else
                                <tr>
                                    <td colspan="6" class="text-center">No records found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane table-responsive" id="past_health_history">
                        
                        <table class="table table-striped" id="past_history">
                            <tbody> 
                                <thead>
                                <tr>
                                    <!-- <th>Problem</th> -->
                                    <th>Blood Transfusion</th>
                                    <th>Remark</th>
                                    <th>Surgery</th>
                                    <th>Remark</th>
                                    <th>Hospitalization</th>
                                    <th>Remark</th>
                                </tr>
                                </thead>
                                <?php 
                                $patientpasthistory = App\PatientPastHistory::where('patient_id',$patient->id)->get()->toArray();
                                ?>
                                <tbody>
                                    @if(count($patientpasthistory) > 0)
                                    @foreach($patientpasthistory as $pph)                                
                                    <tr>
                                      
                                        <td>{{ ($pph['blood_transfusion'] != null) ? $pph['blood_transfusion'] : '-'  }}</td>
                                        <td>{{ ($pph['blood_transfusion_remark'] != null) ? $pph['blood_transfusion_remark'] : '-'  }}</td>
                                        <td>{{ ($pph['surgery'] != null) ? $pph['surgery'] : '-' }}</td>
                                        <td>{{ ($pph['surgery_remark'] != null) ? $pph['surgery_remark'] : '-'  }}</td>
                                        <td>{{ ($pph['hospitalization'] != null) ? $pph['hospitalization'] : '-'  }}</td>
                                        <td>{{ ($pph['hospitalization_remark'] != null) ? $pph['hospitalization_remark'] : '-'  }}</td>
                                    </tr> 
                                    @endforeach
                                @endif
                                </tbody>
                        </table>

                        <table class="table table-striped">
                            <tbody> 
                            <?php 
                            $patientpasthealthhistory = App\PatientPastHealthHistory::where('patient_id',$patient->id)->get()->toArray();
                            $prbname = array(); 
                            $prb = explode(',', @$patientpasthealthhistory[0]['problem_id']);
                            ?>
                            @foreach($prb as $ph)                              
                            <?php 
                            $problemname_count = App\HealthProblem::where('id',@$ph)->count();
                            if($problemname_count){
                            @$problemname1 = App\HealthProblem::where('id',@$ph)->where('type','Past')->first(); 
                            @$prbname[] = @$problemname1->problem;
                            } ?>
                            @endforeach
                            <?php $prbname = implode(',', $prbname);?>
                                @if($prbname)
                                <tr>
                                    <th style="width:40%;">Problem Name</th>
                                    <td>{{ $prbname }}</td>
                                </tr>
                                @else
                                <tr>
                                    <th style="width:40%;">Problem Name</th>
                                    <td>-</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane table-responsive" id="personal_past_history">
                        <table class="table table-striped">
                                <?php 
                                $patienthealthhistory = App\PatientHealthHistory::where('patient_id',$patient->id)->first();
                                ?>
                                    <tr>
                                        <td style="width: 40%">Smoking (per day)</td>
                                        <td>{{ ($patienthealthhistory['smoking'] != null) ? $patienthealthhistory['smoking'] : '-'  }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 40%">Alcohol Drinking (per week)</td>
                                        <td>{{ ($patienthealthhistory['alcohol_drinking'] != null) ? $patienthealthhistory['alcohol_drinking'] : '-' }}</td>
                                    </tr>
                                    
                                    <?php $problem_array = explode(',',$patienthealthhistory['problem_id']);
                                    $pname = array();
                                    ?>
                                    @foreach($problem_array as $p)
                                    <?php $problem_name = App\HealthProblem::where('id',$p)->where('type','Personal')->first(); 
                                    $pname[] = $problem_name['problem'];
                                    ?>
                                    @endforeach
                                    <?php $pname = implode(',',$pname);?>
                                    @if($pname)
                                    <tr>
                                        <th style="width:40%;">Problem Name</th>
                                        <td>{{ $pname }}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <th style="width:40%;">Problem Name</th>
                                        <td>-</td>
                                    </tr>
                                    @endif

                        </table>
                    </div>

                    <div class="tab-pane table-responsive" id="allergies">
                        <table class="table table-striped col-md-12">
                                <?php 
                                $patientallergies = App\PatientHealthHistory::select('allergies')->where('patient_id',$patient->id)->first();
                                $all = json_decode($patientallergies);
                                ?>  
                                <tr>
                                    <th><b>Allergies</b></th>
                                    @if($all)
                                    <td style="width: 80%;">{{ @$all->allergies }}</td>
                                    @else
                                    <td>-</td>
                                    @endif
                                </tr>
                        </table>
                    </div>

                    <div class="tab-pane table-responsive" id="calling_history">
                        
                        <table class="table table-striped" id="calling_history_detail">
                            
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Doctor</th>
                                    <th>Calling Time</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <?php 
                                $patient_call_history = App\Callhistory::where('patient_id',$patient->id)->orderBy('id','asc')->get()->toArray();
                                ?>
                                <tbody>
                                    @if(count($patient_call_history) > 0)
                                    @foreach($patient_call_history as $cl)                                
                                    <tr>
                                        <td>{{ $cl['id'] }}</td>
                                        <?php @$doctor_detail = App\User::select('fname')->where('id',@$cl['doctor_id'])->first(); ?>
                                        <td>{{ (@$doctor_detail->fname != null) ? ucfirst($doctor_detail->fname) : '-'  }}</td>
                                        <td>{{ (@$cl['calling_time'] != null) ? @$cl['calling_time'] : '-'  }}</td>
                                        <td>{{ (@$cl['created_at'] != null) ? date('d-m-Y h:ia', strtotime(@$cl['created_at'])) : '-'  }}</td>
                                    </tr> 
                                    @endforeach
                                    @endif
                                </tbody>
                        </table>
                    </div>

                    <div class="tab-pane table-responsive" id="patient_priscription">
                        
                        <table class="table table-striped" id="patient_priscription_detail">
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
                                <?php 
                                $patient_priscription = App\PatientPriscription::where('patient_id',$patient->id)->get()->toArray();
                                
                                ?>
                                <tbody>
                                    @if(count($patient_priscription) > 0)
                                    @foreach($patient_priscription as $pp)                                
                                    <tr>
                                        <?php @$doctor_detail = App\User::select('fname')->where('id',$pp['doctor_id'])->first(); ?>
                                        <td>{{ (@$doctor_detail->fname != null) ? ucfirst(@$doctor_detail->fname) : '-'  }}</td>
                                        <td>{{ ($pp['medicine_name'] != null) ? $pp['medicine_name'] : '-'  }}</td>
                                        <td>{{ ($pp['dose'] != null) ? $pp['dose'] : '-'  }}</td>
                                        <td>{{ ($pp['freq'] != null) ? $pp['freq'] : '-'  }}</td>
                                        <td>{{ ($pp['route'] != null) ? $pp['route'] : '-'  }}</td>
                                        <td>{{ ($pp['duration'] != null) ? $pp['duration'] : '-'  }}</td>
                                    </tr> 
                                    @endforeach
                                    @endif
                                </tbody>
                        </table>
                    </div>

                </div> 

               
            </div>
        </div>


         <div class='col-sm-12'>
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <div class="tab-pane" id="record">
                        <div class="table-responsive">
                        <table class="table table-striped" id="healthrecord">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>SBP</th>
                                    <th>DBP</th>
                                    <th>HR</th>
                                    <th>Temp.</th>
                                    <th>O2 %</th>
                                    <th>RR</th>
                                    <th>Abd. Circ.</th>
                                    <th>B. Sugar</th>
                                    <th>Wt</th>
                                    <th>Height</th>
                                    <th>BMI</th>
                                </tr>
                            </thead>
                            <?php 
                            $healthrecord = App\PatientHealthRecordDetail::where('patient_id',$patient->id)->get()->toArray();
                            ?>
                            <tbody>
                                @if(@count($healthrecord) > 0)
                                @foreach($healthrecord as $r)                                
                                <tr>
                                    <?php 
                                    $patient_id = $patient->id;
                                    $vitalname = @$r['vitals_id']; 
                                    ?>
                                    <!-- <td><a style="color:blue" href="#" onclick="return change_vitals(<?php echo $r['id'];?>,'<?php echo @$vitalname;?>',<?php echo $patient_id;?>)" data-toggle="modal" data-target="#myModal">{{ (@$r['vitals_id'] != null) ? @$r['vitals_id'] : '-'  }}</a></td> -->
                                    <td>{{ (@$r['add_date'] != null) ? @$r['add_date'] : '-'  }}</td>
                                    <td>{{ (@$r['blood_pressure_max_value'] != null) ? @$r['blood_pressure_max_value'] : '-'  }}</td>
                                    <td>{{ (@$r['blood_pressure_min_value'] != null) ? @$r['blood_pressure_min_value'] : '-'  }}</td>
                                    <td>{{ (@$r['pluse'] != null) ? @$r['pluse'] : '-'  }}</td>
                                    <td>{{ (@$r['temperature'] != null) ? @$r['temperature'] : '-'  }}</td>
                                    <td>{{ (@$r['oxygen_saturation'] != null) ? @$r['oxygen_saturation'] : '-'  }}</td>
                                    <td>{{ (@$r['breathing_rate'] != null) ? @$r['breathing_rate'] : '-'  }}</td>
                                    <td>{{ (@$r['abdominal_circumference'] != null) ? @$r['abdominal_circumference'] : '-'  }}</td>
                                    <td>{{ (@$r['blood_sugar'] != null) ? @$r['blood_sugar'] : '-'  }}</td>
                                    <td>{{ (@$r['weight'] != null) ? @$r['weight'] : '-'  }}</td>
                                    <td>{{ (@$r['height'] != null) ? @$r['height'] : '-'  }}</td>
                                    <td>{{ (@$r['bmi'] != null) ? @$r['bmi'] : '-'  }}</td>
                                </tr> 
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </div>

</section>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
     <form  action="{{ route('patient.changevitals')}}" method="post">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" id="vitals_id" />
        <input type="hidden" name="patient_id" id="patient_id" />
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Vitals</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
                <label class="control-label">vital</label>
                <input type="text" name="vital" class="form-control" id="vitals_name" required="required" />
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-info">Create</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>

@endsection
@section('custom_js')     
<script>

    function change_vitals(id,vital_name,patient_id)
    {
        $('#vitals_id').val(id);
        $('#vitals_name').val(vital_name);
        $('#patient_id').val(patient_id);
    }

</script>


<script>
    $(document).ready(function () {
        $('#healthrecord').DataTable();
        $('#family_detail').DataTable();
        $('#wallet_detail').DataTable({
            "ordering": false,
            "order": [[0, "asc"]],
        });
        $('#lab_detail1').DataTable();
        $('#procedures_detail').DataTable();
        $('#past_history').DataTable();
        $('#patient_priscription_detail').DataTable();
        $('#calling_history_detail').DataTable({
             "ordering": false,
             "order": [[0, "asc"]],
        });
    }); 
</script>
@endsection

