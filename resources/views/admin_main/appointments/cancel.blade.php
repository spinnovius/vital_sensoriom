@extends('layouts.admin_main')
@section('content')


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
                
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-uppercase"><b>Cancel Appointments</b></h3>
                <div class="table-responsive">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            {{-- <tr>
                                <th rowspan="1"></th>
                                <th rowspan="1"></th>
                                <th align="center">Doctor Name</th>
                            </tr> --}}
                            <tr>
                                <th>PATIENT NAME</th>
                                <th>DOCTOR NAME</th>
                                <th>DATE</th>
                                <th>TIME</th>
                                @if(session('role')==5)
                                <th>STATUS</th>
                                @endif
                                @if(session('role')==2)
                                <th>ACTION</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>  
                         @foreach($PatientDetail as $vitals)
                                <tr>
                                    <td>{{$vitals->patientname}}</td>
                                    <td>{{isset($vitals->doctorname)?$vitals->doctorname:'-'}}</td>
                                    <td>{{date("d-m-Y", strtotime($vitals->date))}}</td>
                                     <td>{{date("g:i A", strtotime($vitals->time))}}{{-- {{@$vitals->time}} --}}</td>
                                    <td>
                                        @if(session('role')==5)
                                            @if($vitals->flag==0)
                                                <label class="label label-info">Waiting</label>
                                            @elseif($vitals->flag==1)
                                                <label class="label label-success">Approved</label>
                                            @else
                                                <label class="label label-danger">Rejected</label>
                                            @endif
                                        @endif
                                        @if(session('role')==2)
                                            @if($vitals->flag==2)
                                                <a data-toggle="tooltip" style="color:red"><label class="label label-danger">Rejected</label></a>
                                            @endif
                                        @endif
                                    </td>
                                    
                                </tr>
                         @endforeach   
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection