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
                <h3 class="card-title text-uppercase"><b>Upcoming Appointments</b></h3>
                <div class="table-responsive">
                    <table id="upcoming" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>PATIENT NAME</th>
                                @if(session('role')==5)
                                <th>DOCTOR NAME</th>
                                @endif
                                @if(session('role')==2)
                                <th>AGE</th>
                                <th>SEX</th>
                                <th>PHONE NO.</th>
                                <th>EMAIL</th>
                                @endif
                                <th>DATE</th>
                                <th>TIME</th>
                                <th>STATUS</th>
                                <th>CHECK BUTTON{{-- PATIENT ARRIVES --}}</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>  
                          @foreach($PatientDetail as $vitals)
                                <tr>
                                    {{-- <td>{{$vitals->patientname}}</td> --}}
                                    <td><a class="colorname" href="{{route('store_patient.edit', $vitals->patient_id)}}">{{$vitals->patientname}}</a></td>
                                    @if(session('role')==5)
                                    <td>{{$vitals->doctorname}}</td>
                                    @endif
                                    @if(session('role')==2)
                                    <td>{{@$vitals->age}}</td>
                                    <td>{{@$vitals->gender}}</td>
                                    <td>{{@$vitals->contact_number}}</td>
                                    <td>{{@$vitals->email}}</td>
                                    @endif
                                    {{-- <td>{{isset($vitals->doctorname)?$vitals->doctorname:'-'}}</td> --}}
                                    <td>{{date("d-m-Y", strtotime($vitals->date))}}</td>
                                    <td>{{@$vitals->time}}</td>
                                    <td>
                                        @if($vitals->flag==0)
                                            <label class="label label-info">Waiting</label>
                                        @elseif($vitals->flag==1)
                                            <label class="label label-success">Apporved</label>
                                        @else
                                            <label class="label label-danger">Rejected</label>
                                        @endif
                                    </td>
                                    <td id='arrive_{{ $vitals->id }}'><label style="cursor: pointer;" id='{{ $vitals->id }}' class="label btnclk {{ ($vitals->arrives == 0) ? 'label-success' : 'label-dark' }}">{{ ($vitals->arrives == 0) ? 'Arrived' : 'NotArrived' }}</label></td>
                                    @if(session('role')==5)
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
                                    @endif
                                    @if(session('role')==2)
                                    <td><a class="colorname" href="{{route('store_patient.edit', $vitals->patient_id)}}"><i class="fa fa-pencil"></i></a></td>
                                    @endif
                                </tr>
                         @endforeach   
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
     $(function () {
                $('#upcoming').DataTable({
                     "order": []
                });
            });
    $(document).ready(function(){
        $('.btnclk').click(function(){
            var aid = $(this).attr('id');
            console.log(aid);
            $.ajax({
                        url:"{{ env('APP_URL') }}user/arrive/status/"+aid,
                        method:"get",
                        success:function(e){
                            console.log(e);
                            if(e == '0'){
                                $("#"+aid).text('Arrived');
                                $("#"+aid).removeClass('label-dark');
                                $("#"+aid).addClass('label-success');
                                // $("#"+aid).html('<label id="'+aid+'" class="label btnclk label-info">Arrive</lable>');
                            }else{
                                $("#"+aid).text('NotArrived');
                                $("#"+aid).removeClass('label-success');
                                $("#"+aid).addClass('label-dark');
                                // $("#arrive_"+aid).html('<label id="'+aid+'" class="label btnclk label-success">Coming</lable>');
                            }
                            
                        }
                });
        });
    });
</script>
@endsection