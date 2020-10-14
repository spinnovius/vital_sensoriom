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
                <h3 class="card-title text-uppercase"><b>Pending Appointments</b></h3>
                <div class="table-responsive">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>PATIENT NAME</th>
                                <th>DOCTOR NAME</th>
                                <th>DATE</th>
                                <th>TIME</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>  
                         @foreach($PatientDetail as $vitals)
                                <tr>
                                    <td><a class="colorname" href="{{route('store_patient.edit', $vitals->patient_id)}}">{{$vitals->patientname}}</a></td>
                                    {{-- <td>{{isset($vitals->patientname)?$vitals->patientname:'-'}}</td> --}}
                                    <td>{{isset($vitals->doctorname)?$vitals->doctorname:'-'}}</td>
                                    <td>{{date("d-m-Y", strtotime($vitals->date))}}</td>
                                     <td>{{date("g:i A", strtotime($vitals->time))}}{{-- {{@$vitals->time}} --}}</td>
                                    <td>
                                        @if($vitals->flag==0)
                                            <label class="label label-info">Waiting</label>
                                        @elseif($vitals->flag==1)
                                            <label class="label label-info">Approved</label>
                                        @else
                                            <label class="label label-info">Rejected</label>
                                        @endif
                                    </td>
                                    <td>
                                         @if($vitals->flag==0)
                                        <?php $verified_url = route('admin_main.apporve', array($vitals->id , 1));?>
                                            <a data-toggle="tooltip" title="click here to approve" style="color:red" onclick="return confirm(`<?php echo $verified_url;?>`,`Are you sure you want to approve this appointment ?`)"  href="#"><label class="label label-success">Approve</label></a>
                                            <?php $rejverified_url = route('admin_main.apporve', array($vitals->id , 2));?>
                                            <a data-toggle="tooltip" title="click here to reject" style="color:red" onclick="return confirm(`<?php echo $rejverified_url;?>`,`Are you sure you want to reject this appointment?`)"  href="#"><label class="label label-danger">Reject</label></a>
                                        @endif
                                        @if($vitals->flag==1)
                                            <?php $rejverified_url = route('admin_main.apporve', array($vitals->id , 2));?>
                                            <a data-toggle="tooltip" title="click here to reject" style="color:red" onclick="return confirm(`<?php echo $rejverified_url;?>`,`Are you sure you want to reject this appointment?`)"  href="#"><label class="label label-danger">Reject</label></a>
                                        @elseif($vitals->flag==2)
                                            <?php $verified_url = route('admin_main.apporve', array($vitals->id , 1));?>
                                            <a data-toggle="tooltip" title="click here to approve" style="color:red" onclick="return confirm(`<?php echo $verified_url;?>`,`Are you sure you want to approve this appointment ?`)"  href="#"><label class="label label-success">Approve</label></a>
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