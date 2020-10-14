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
                <h4 class="card-title">Doctors Data</h4>
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="display:none;">Id</th>  
                                <th>Name</th>
                                <th>Speciality</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>City</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                         @foreach($doctor_detail as $doctor)
                                <tr>
                                  <td style="display:none;">{{$doctor->id}}</td>
                                    <td>{{$doctor->fname}}</td>
                                    <td data-toggle="tooltip" title="{{$doctor->sp}}">{{substr($doctor->sp,0,25)}}</td>
                                    <td>{{$doctor->email}}</td>
                                    <td>{{$doctor->contact_number}}</td>
                                    <td>{{$doctor->cityname}}</td>
                                    <td>
                                        @if($doctor->verified==1)
                                            <label class="label label-success">Approved</label>
                                        @else
                                            <label class="label label-danger">Pending</label>
                                        @endif
                                    </td>
                                    <td>
                                        <?php $delete_url = route("doctor.deletedoctors",$doctor->uniqueid);?>
                                        <a href="{{route('doctor.editdoctors',$doctor->uniqueid)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a style="color:red" onclick="return confirm(`<?php echo $delete_url  ?>`,`Are you sure you want to delete this Doctor ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>
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
