@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Doctor All Detail</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="{{ route('doctor.viewall_pending_doctor') }}"><i class="fa fa-dashboard"></i>Pending Doctor</a></li>        
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
                    <h3 class="profile-username text-center">{{  $doctor->fname }}</h3>

                    <p class="text-muted text-center"></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Create Date</b>
                            @if($doctor->created_at != null)
                            <a class="pull-right">{{ date('m-d-Y',strtotime($doctor->created_at))  }}</a>
                            @else
                            <a class="pull-right"> - </a>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Available</b>
                            @if($doctor->available == 0) 
                            <span class="pull-right" style="color: green;">Available</span> 
                            @else 
                            <span class="pull-right" style="color: red;">Not Available</span>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Verified</b>
                            @if($doctor->verified == 0) 
                            <a class="pull-right" href="#" data-toggle="modal" data-target="#myModal">
                                <span class="label label-danger" style="color: red;">Verified</span> 
                            </a>
                            @else 
                            <span class="pull-right" style="color: green;">Verified</span>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Status</b> <a class="pull-right">@if($doctor->status == 1) <span style="color: green;">Active</span>@else <span style="color: red;">Inactive</span> @endif</a>
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
                                    <td>{{  ($doctor->fee_of_consultation != null) ? $doctor->fee_of_consultation : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">MBBS Registration Number</th>
                                    <td>{{  ($doctor->mbbs_registration_number != null) ? $doctor->mbbs_registration_number : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">MBBS Authority Council Name</th>
                                    <td>{{  ($doctor->mbbs_authority_council_name != null) ? $doctor->mbbs_authority_council_name : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">MD/MS/DNB Registration Number</th>
                                    <td>{{  ($doctor->md_ms_dnb_registration_number != null) ? $doctor->md_ms_dnb_registration_number : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">MD/MS/DNB Authority Council Name</th>
                                    <td>{{  ($doctor->md_ms_dnb_authority_council_name != null) ? $doctor->md_ms_dnb_authority_council_name : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">DM/MCH/DNB Registration Number</th>
                                    <td>{{  ($doctor->dm_mch_dnb_registration_number != null) ? $doctor->dm_mch_dnb_registration_number : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">DM/MCH/DNB Authority Council Name</th>
                                    <td>{{  ($doctor->dm_mch_dnb_authority_council_name != null) ? $doctor->dm_mch_dnb_authority_council_name : '-'  }}</td>
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
                                    @endif
                                    <h4 class="profile-username text-center">No Document</h4>
                                </tr> 
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane active" id="balance">
                        <table class="table table-striped">
                            <tbody>                                
                                <tr>
                                    <th style="width:40%;">Online Amount</th>
                                    <td>{{  ($doctor->online_amount != null) ? $doctor->online_amount : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Offline Amount</th>
                                    <td>{{  ($doctor->offline_amount != null) ? $doctor->offline_amount : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">Total Amount</th>
                                    <td>{{  ($doctor->total_amount != null) ? $doctor->total_amount : '-'  }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane active" id="bank_detail">
                        <table class="table table-striped">
                            <tbody>
                            {{ 
                                $account_number1 = substr($doctor->account_number, -4) 
                            }}                                
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
                                    <td>{{  ($doctor->account_number != null) ? $account_number = 'XXXX XXXX XXXX '.$account_number1 : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th style="width:40%;">IFSC Code</th>
                                    <td>{{  ($doctor->ifsc_code != null) ? $doctor->ifsc_code : '-'  }}</td>
                                </tr>
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

<!-- end of Main content -->
@endsection


