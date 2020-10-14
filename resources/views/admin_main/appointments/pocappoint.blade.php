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
                <h3 class="card-title text-uppercase"><b>Point Of Care</b></h3>
                <div class="table-responsive">
                    <table id="example23" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>PATIENT NAME</th>
                                <th>AGE</th>
                                <th>SEX</th>
                                <th>POC NUMBER</th>
                                <th>POC NAME</th>
                                <th>POC CITY</th>
                                <th style="width:250px;">CONCERNS</th>
                                <th>DATE</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($PatientDetail as $vitals)
                          @php
                              //dd($vitals);
                          @endphp
                                <tr>
                                    @if (session('role')==2)
                                        <td>
                                        <a class="colorname" href="{{route('admin_main.upcomingappointment.openreadlinkpointofcare', $vitals->id)}}">{{$vitals->patientname}}</a>
                                        </td>
                                    @else
                                    <td>
                                        <a class="colorname" href="{{route('store_patient.edit', $vitals->user_id)}}">{{$vitals->patientname}}</a>
                                    </td>
                                    @endif
                                    <td>{{$vitals->age}} Y</td>
                                    <td>{{ $vitals->gender }}</td>
                                    <td>{{$vitals->poc_no}}</td>
                                    <td>{{$vitals->pocfname}}</td>
                                    <td>{{$vitals->city}}</td>
                                    <td>{{$vitals->question}}</td>
                                    <td>{{date("d-m-Y", strtotime($vitals->created_at))}}</td>
                                    <td>
                                        @if($vitals->status==0)
                                            <label class="label label-info">Waiting</label>
                                        @elseif($vitals->status==1)
                                            <label class="label label-info">Approved</label>
                                        @else
                                            <label class="label label-info">Rejected</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if($vitals->is_read==1)
                                        <i class="fa fa-check" style="color: blue;"></i>
                                        @endif
                                        <!--<a class="colorname" href="{{route('store_patient.edit', $vitals->user_id)}}">View Details</a></td>-->
                                        <a href="{{route('admin_main.doctor.DoctorReplay',$vitals->user_id)}}"><i class="fa fa-reply" aria-hidden="true"></i></a>
                                </tr>
                                @php
                                    /*
                                 <td><a class="colorname" href="{{route('store_patient.edit', $vitals->patient_id)}}">{{$vitals->patientname}}</a></td>
                                    <td>{{$vitals->age}} Y</td>
                                    <td>{{ $vitals->gender }}</td>
                                    <td>{{$vitals->poc->poc_no}}</td>
                                    <td>{{$vitals->poc->fname}}</td>
                                    <td>{{$vitals->poc->poccity}}</td>
                                    <td>{{$vitals->reason_refer}}</td>
                                    <td>{{date("d-m-Y", strtotime($vitals->date))}}</td>
                                    
                                    <td>
                                        @if($vitals->flag==0)
                                            <label class="label label-info">Waiting</label>
                                        @elseif($vitals->flag==1)
                                            <label class="label label-info">Apporved</label>
                                        @else
                                            <label class="label label-info">Rejected</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if($vitals->flag==0)
                                        <?php $verified_url = route('admin_main.apporve', array($vitals->id , 1));?>
                                            <a data-toggle="tooltip" title="click here to apporve" style="color:red" onclick="return confirm(`<?php echo $verified_url;?>`,`Are you sure you want to apporve this appointment ?`)"  href="#"><label class="label label-success">Apporve</label></a>
                                            <?php $rejverified_url = route('admin_main.apporve', array($vitals->id , 2));?>
                                            <a data-toggle="tooltip" title="click here to reject" style="color:red" onclick="return confirm(`<?php echo $rejverified_url;?>`,`Are you sure you want to reject this appointment?`)"  href="#"><label class="label label-danger">Reject</label></a>
                                        @endif
                                        @if($vitals->flag==1)
                                            <?php $rejverified_url = route('admin_main.apporve', array($vitals->id , 2));?>
                                            <a data-toggle="tooltip" title="click here to reject" style="color:red" onclick="return confirm(`<?php echo $rejverified_url;?>`,`Are you sure you want to reject this appointment?`)"  href="#"><label class="label label-danger">Reject</label></a>
                                        @elseif($vitals->flag==2)
                                            <?php $verified_url = route('admin_main.apporve', array($vitals->id , 1));?>
                                            <a data-toggle="tooltip" title="click here to apporve" style="color:red" onclick="return confirm(`<?php echo $verified_url;?>`,`Are you sure you want to apporve this appointment ?`)"  href="#"><label class="label label-success">Apporve</label></a>
                                        @endif
                                    </td> 
                                    */
                                @endphp
                         @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
