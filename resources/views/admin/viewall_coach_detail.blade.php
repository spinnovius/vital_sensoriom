@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Details of {{  ucfirst($coach->fname) }}</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
        <!-- <li><a href="{{ route('coach.viewall_pending_coach') }}"><i class="fa fa-dashboard"></i>Pending Coach</a></li>         -->
        <li class="active">Coach All Detail</li>
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
                    @if($coach->profile_pic != null)
                    <img class="profile-user-img img-responsive img-circle" src="{{ url('storage/app/'.$coach->profile_pic) }}" alt="Profile Pic"  style="width:150px;height:150px;" />
                    @else
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('public/dist/img/no-image-available.png') }}" alt="Profile Pic"/>
                    @endif
                    <h3 class="profile-username text-center">{{  ucfirst($coach->fname) }}</h3>

                    <p class="text-muted text-center"></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Create Date</b>
                            @if($coach->created_at != null)
                            <a class="pull-right">{{ date('d-m-Y',strtotime($coach->created_at))  }}</a>
                            @else
                            <a class="pull-right"> - </a>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Status</b> <a class="pull-right">@if($coach->status == 1) <span style="color: green;">Active</span>@else <span style="color: red;">Inactive</span> @endif</a>
                        </li>
                        
                        <li class="list-group-item">
                            <b>Verified</b>
                            @if($coach->verified == 0) 
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
                    <li class=""><a href="#team" data-toggle="tab" aria-expanded="false">Health Team</a></li>
                </ul>
                <div class="tab-content">
                   <div class="tab-pane active" id="detail">
                        <table class="table table-striped">
                            <tbody>                                
                                <tr>
                                    <th style="width:40%;">Email</th>
                                    <td>{{  ($coach->email != null) ? $coach->email : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Contact Number</th>
                                    <td>{{  ($coach->contact_number != null) ? $coach->contact_number : '-'  }}</td>
                                </tr> 
                                <tr>
                                    <th style="width:40%;">Role</th>
                                    <td>{{  ($coach->role != null) ? $coach->role : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">City</th>
                                    <td>{{  ($coach->city != null) ? $coach->city : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Qualification</th>
                                    <td>{{  ($coach->qualification != null) ? $coach->qualification : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Authority Council Name</th>
                                    <td>{{  ($coach->authority_council_name != null) ? $coach->authority_council_name : '-'  }}</td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="document">
                        <table class="table table-striped">
                            <tbody>                                
                                <tr>
                                    @if($coach->document != null)
                                    <a href="{{ url('storage/app/'.$coach->document) }}" target="blank"><img class="profile-user-img img-responsive img-circle" src="{{ url('storage/app/'.$coach->document) }}" alt="Coach Document"  style="width:125px;height:125px;" /></a>
                                    @else
                                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('public/dist/img/no_document.jpg') }}" alt="No Document"/>
                                    <h4 class="profile-username text-center">No Document</h4>
                                    @endif
                                </tr> 
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane table-responsive" id="team">
                        <table class="table table-striped" id="team_detail">
                            <thead>
                                <tr>
                                    <th>Doctor Name</th>
                                    <th>Patient Name</th>
                                    <th>Hospital Name</th>
                                </tr>
                            </thead>
                            <?php 
                            $coach_team = App\HealthTeam::where('coach_id',$coach->id)->get()->toArray();
                            ?>
                            <tbody>
                                @if(@count($coach_team) > 0)
                                @foreach($coach_team as $c)                                
                                <tr>
                                    <?php
                                    $doctor = App\User::select('fname')->where('id',$c['doctor_id'])->first();
                                    $patient = App\User::select('fname')->where('id',$c['patient_id'])->first();
                                    $hospital = App\Hospital::select('name')->where('id',$c['hospital_id'])->first();
                                    ?>
                                    <td>{{ ($doctor) ? $doctor->fname : '-'  }}</td>
                                    <td>{{ ($patient) ? $patient->fname : '-'  }}</td>
                                    <td>{{ ($hospital) ? $hospital->name : '-'  }}</td>
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

</section>





<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
     <form  action="{{ route('coach.createpassword')}}" method="post">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $coach->id }}" />
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
        $('#team_detail').DataTable({
            "ordering": false,
            "order": [[0, "asc"]],
        });
    }); 
</script>
@endsection

