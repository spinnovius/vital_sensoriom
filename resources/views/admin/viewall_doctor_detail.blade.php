@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Details of {{  ucfirst($doctor->fname) }}</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
        <!-- <li><a href="{{ route('doctor.viewall_pending_doctor') }}"><i class="fa fa-dashboard"></i>Pending Doctor</a></li>         -->
        <li class="active">Doctor All Detail</li>
    </ol>
</section>
<!-- Main content -->
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
        <!-- profile left -->
        <div class='col-sm-4'>
            <div class="box box-primary">
                <div class="box-body box-profile">
                    @if($doctor->profile_pic != null)
                    <img class="profile-user-img img-responsive img-circle" src="{{ url('storage/app/'.$doctor->profile_pic) }}" alt="Profile Pic"  style="width:150px;height:150px;" />
                    @else
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('public/dist/img/no-image-available.png') }}" alt="Profile Pic"/>
                    @endif
                    <h3 class="profile-username text-center">{{  ucfirst($doctor->fname) }}</h3>

                    <p class="text-muted text-center"></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Create Date</b>
                            @if($doctor->created_at != null)
                            <a class="pull-right">{{ date('d-m-Y',strtotime($doctor->created_at))  }}</a>
                            @else
                            <a class="pull-right"> - </a>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Available</b>
                            @if($doctor->available == 1) 
                            <span class="pull-right" style="color: green;">Available</span> 
                            @else 
                            <span class="pull-right" style="color: red;">Not Available</span>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Status</b> <a class="pull-right">@if($doctor->status == 1) <span style="color: green;">Active</span>@else <span style="color: red;">Inactive</span> @endif</a>
                        </li>
                        <li class="list-group-item">
                            <b>Verified</b>
                            @if($doctor->verified == 0) 
                            <a class="pull-right" href="#" data-toggle="modal" data-target="#myModal">
                                <span class="label label-danger">Unverified</span> 
                            </a>
                            @else 
                            <span class="pull-right" style="color: green;">Verified</span>
                            @endif
                        </li>
                        
                    </ul>                    
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- profile Right -->
        <div class='col-sm-8'>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#detail" data-toggle="tab" aria-expanded="true">Details</a></li>
                    <li class=""><a href="#document" data-toggle="tab" aria-expanded="false">Document</a></li>
                    <li class=""><a href="#balance" data-toggle="tab" aria-expanded="false">Balance</a></li>
                    <li class=""><a href="#bank_detail" data-toggle="tab" aria-expanded="false">Bank Detail</a></li>
                    <li class=""><a href="#team" data-toggle="tab" aria-expanded="false">Health Team</a></li>
                    <li class=""><a href="#calling_history" data-toggle="tab" aria-expanded="false">Calling History</a></li>
                </ul>
                <div class="tab-content">
                   <div class="tab-pane active" id="detail">
                        <table class="table table-striped">
                            <tbody>                                
                                <tr>
                                    <th style="width:40%;">Email</th>
                                    <td>{{  ($doctor->email != null) ? $doctor->email : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Contact Number</th>
                                    <td>{{  ($doctor->contact_number != null) ? $doctor->contact_number : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Speciality</th>
                                    <td>{{  ($doctor->speciality != null) ? $doctor->speciality : '-'  }}</td>
                                </tr> 
                                <tr>
                                    <th style="width:40%;">Role</th>
                                    <td>{{  ($doctor->role != null) ? $doctor->role : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">City</th>
                                    <td>{{  ($doctor->city != null) ? $doctor->city : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Fee Of Consultation</th>
                                    <td><?php if($doctor->fee_of_consultation){ ?><i class="fa fa-rupee"></i><?php } ?> {{  ($doctor->fee_of_consultation != null) ? $doctor->fee_of_consultation : '-'  }}</td>
                                </tr>
                                <?php
                                $mbbs_authority_council_name = \App\AuthorityCouncil::where('id',$doctor->mbbs_registration_number)->first();
                                ?>
                                <tr>
                                    <th style="width:40%;">MBBS Registration Number</th>
                                    <td>{{  (@$doctor->mbbs_registration_number != null) ? $doctor->mbbs_registration_number : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">MBBS Authority Council Name</th>
                                    <td>{{  (@$doctor->mbbs_authority_council_name != null) ? $mbbs_authority_council_name['name'] : '-'  }}</td>
                                </tr>
                                <?php
                                $md_ms_dnb_authority_council_name = \App\AuthorityCouncil::where('id',$doctor->md_ms_dnb_authority_council_name)->first();
                                ?>
                                <tr>
                                    <th style="width:40%;">MD/MS/DNB Registration Number</th>
                                    <td>{{  (@$doctor->md_ms_dnb_registration_number != null) ? $doctor->md_ms_dnb_registration_number : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">MD/MS/DNB Authority Council Name</th>
                                    <td>{{  (@$doctor->md_ms_dnb_authority_council_name != null) ? $md_ms_dnb_authority_council_name['name'] : '-'  }}</td>
                                </tr>
                                <?php
                                $dm_mch_dnb_authority_council_name = \App\AuthorityCouncil::where('id',$doctor->dm_mch_dnb_authority_council_name)->first();
                                ?>
                                <tr>
                                    <th style="width:40%;">DM/MCH/DNB Registration Number</th>
                                    <td>{{  (@$doctor->dm_mch_dnb_registration_number != null) ? $doctor->dm_mch_dnb_registration_number : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">DM/MCH/DNB Authority Council Name</th>
                                    <td>{{  (@$doctor->dm_mch_dnb_authority_council_name != null) ? $dm_mch_dnb_authority_council_name['name'] : '-'  }}</td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="document">
                        <table class="table table-striped">
                            <tbody>                                
                                <tr>
                                    @if($doctor->document != null)
                                    <a href="{{ url('storage/app/'.$doctor->document) }}" target="blank"><img class="profile-user-img img-responsive img-circle" src="{{ url('storage/app/'.$doctor->document) }}" alt="Doctors Document"  style="width:125px;height:125px;" /></a>
                                    @else
                                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('public/dist/img/no_document.jpg') }}" alt="No Document"/>
                                    <h4 class="profile-username text-center">No Document</h4>
                                    @endif
                                </tr> 
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="balance">
                         <div class="table-responsive">
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
                                    $docbal = DB::table('doctors_balance')->select('doctors_balance.id','doctors_balance.online_amount','doctors_balance.offline_amount','doctors_balance.total_amount','doctors_balance.amount_description','users.fname')
                                    ->leftjoin('users','doctors_balance.patient_id','users.id')
                                    ->where('doctors_balance.doctor_id',$doctor->id)
                                    ->orderby('doctors_balance.id','asc')
                                    ->get()
                                    ->toArray();
                                    $total_balance = 0;
                                    ?>
                                    @if(count($docbal) > 0)
                                        @foreach($docbal as $db)
                                        <tr>
                                            <td>{{ $db->id }}</td>
                                            <td>{{ $db->fname }}</td>
                                            <td>{{ $db->online_amount ? $db->online_amount : "-" }}</td>
                                            <!-- <td>{{ $db->offline_amount ? $db->offline_amount : "-" }}</td> -->
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
                                    @endif
                            </tbody>
                        </table>
                        </div>
                    </div>


                    <div class="tab-pane" id="bank_detail">
                        <table class="table table-striped">
                            <tbody>
                            <?php $account_number1 = substr(base64_decode($doctor->account_number), -4); ?>                                
                                <tr>
                                    <th style="width:40%;">Beneficiary Name</th>
                                    <td>{{  ($doctor->beneficiary_name != null) ? $doctor->beneficiary_name : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Bank Name</th>
                                    <td>{{  ($doctor->bank_name != null) ? $doctor->bank_name : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Bank Account Number</th>
                                    <!-- <td>{{  $doctor->account_number  }}</td> -->
                                    <td>{{  ($doctor->account_number != null) ? $account_number = 'XXXX XXXX XXXX '.$account_number1 : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">IFSC Code</th>
                                    <td>{{  ($doctor->ifsc_code != null) ? $doctor->ifsc_code : '-'  }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane table-responsive" id="team">
                        <table class="table table-striped" id="team_detail">
                            <thead>
                                <tr>
                                    <th>Coach Name</th>
                                    <th>Patient Name</th>
                                    <th>Hospital Name</th>
                                </tr>
                            </thead>
                            <?php 
                            $coach_team = App\HealthTeam::where('doctor_id',$doctor->id)->get()->toArray();
                            ?>
                            <tbody>
                                @if(@count($coach_team) > 0)
                                @foreach($coach_team as $c)                                
                                <tr>
                                    <?php
                                    $coach = App\User::select('fname')->where('id',$c['coach_id'])->first();
                                    $patient = App\User::select('fname')->where('id',$c['patient_id'])->first();
                                    $hospital = App\Hospital::select('name')->where('id',$c['hospital_id'])->first();
                                    ?>
                                    <td>{{ ($coach) ? $coach->fname : '-'  }}</td>
                                    <td>{{ ($patient) ? $patient->fname : '-'  }}</td>
                                    <td>{{ ($hospital) ? $hospital->name : '-'  }}</td>
                                </tr> 
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="calling_history">
                         <div class="table-responsive">
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
                                <?php 
                                    $doctor_call_history = App\Callhistory::where('doctor_id',$doctor->id)->orderBy('id','asc')->get()->toArray();
                                    ?>
                                    @if(count($doctor_call_history) > 0)
                                        @foreach($doctor_call_history as $dc)
                                        <tr>
                                            <td>{{ $dc['id'] }}</td>
                                            <?php @$patient_detail = App\User::select('fname')->where('id',@$dc['patient_id'])->first(); ?>
                                            <td>{{ (@$patient_detail->fname != null) ? ucfirst($patient_detail->fname) : '-'  }}</td>
                                            <td>{{ (@$dc['calling_time'] != null) ? @$dc['calling_time'] : '-'  }}</td>
                                            <td>{{ (@$dc['created_at'] != null) ? date('d-m-Y h:i A', strtotime(@$dc['created_at'])) : '-'  }}</td>
                                        </tr>
                                        @endforeach
                                    @endif
                            </tbody>
                        </table>
                        </div>
                    </div>


                </div> 

               
            </div>
        </div>

    </div>

</section>





<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
     <form  action="{{ route('doctor.createpassword')}}" method="post">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $doctor->id }}" />
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Password</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
                <label class="control-label">Password</label>
                <input type="password" name="password" class="form-control" value="" required="required" />
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
    $(document).ready(function () {
        $('#doctorbalance_detail').DataTable({
            "order": [[0, "asc"]],
            "ordering": false,
        });

        $('#team_detail').DataTable({
            "ordering": false,
            "order": [[0, "asc"]],
        });

        $('#calling_history_detail').DataTable({
            "ordering": false,
            "order": [[0, "asc"]],
        });

    }); 
</script>
@endsection


