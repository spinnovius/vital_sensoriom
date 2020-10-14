@extends('layouts.admin_main')
@section('content')
@if(session('role')==8)
<ul class="nav nav-tabs">
    <li><a href="{{ route('admin_main.panel.edit', $patient_id) }}">Details</a></li>
    <li><a href="{{ route('admin_main.hopiindex', $patient_id) }}">HOPI</a></li>
    <li><a href="{{ route('admin_main.exindex', $patient_id) }}">Examination</a></li>
    {{--<li><a href="{{ route('admin_main.geindex', $patient_id) }}">General Examination</a></li>
    <li><a href="{{ route('admin_main.seindex', $patient_id) }}">Systemic Examination</a></li>
    <li class="active" ><a href="{{ route('admin_main.ppindex', $patient_id) }}">Prescription</a></li>
    <li><a href="{{ route('admin_main.atindex', $patient_id) }}">Advice Treatment</a></li> --}}
    <li><a href="{{ route('admin_main.clinical_managementindex', $patient_id) }}">CLINICAL MANAGEMENT</a></li>
    <li><a href="{{ route('store_patient.pasthealthrecords', $patient_id) }}">Past Health Records</a></li>
</ul>
@else
<ul class="nav nav-tabs">
    <li><a href="{{ route('store_patient.edit', $patient_id) }}">Details</a></li>
    <li><a href="{{ route('admin_main.hopiindex', $patient_id) }}">HOPI</a></li>
    <li><a href="{{ route('admin_main.exindex', $patient_id) }}">Examination</a></li>
    {{--<li><a href="{{ route('admin_main.geindex', $patient_id) }}">General Examination</a></li>
    <li><a href="{{ route('admin_main.seindex', $patient_id) }}">Systemic Examination</a></li>
    <li  class="active"><a href="{{ route('admin_main.ppindex', $patient_id) }}">Prescription</a></li>
    <li><a href="{{ route('admin_main.atindex', $patient_id) }}">Advice Treatment</a></li> --}}
    <li><a href="{{ route('admin_main.clinical_managementindex', $patient_id) }}">CLINICAL MANAGEMENT</a></li>
    <li><a href="{{ route('store_patient.pasthealthrecords', $patient_id) }}">Past Health Records</a></li>
    <li><a href="{{ route('admin_main.indexvitalslabtest', $patient_id) }}">Vitals Labtest</a></li>
</ul>
@endif
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
		            <div class="col-md-12 align-self-center text-right d-none d-md-block" style="padding-top: 1em;">
		                <a class="btn btn-info" href="{{ route('admin_main.ppadd', $patient_id) }}"><i class="fa fa-plus-circle"></i> Add Prescription</a>
		            </div>
            	</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Prescription Data</h4>                
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                
                                <th>Drug Name</th>
                                <th>Dose</th>
                                <th>Frequency</th>
                                <th>Route</th>
                                <th>Duration</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>  
                         @foreach($lab_detail as $lab_detail)
                             <tr>
                                        <td>{{$lab_detail->medicine_name}}</td>
                                        <td>{{$lab_detail->dose}}</td>
                                        <td>{{$lab_detail->freq}}</td>
                                        <td>{{$lab_detail->route}}</td>
                                        <td>{{$lab_detail->duration}}</td>
                                        <td>
                                            <?php $delete_url = route("admin_main.ppdelete", ["patient_id" =>$patient_id, "id" => $lab_detail->uniqueid]);?>
                                            <a href="{{route('admin_main.ppedit',["patient_id" =>$patient_id, "id" => $lab_detail->uniqueid])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a style="color:red" onclick="return confirm(`<?php echo $delete_url  ?>`,`Are you sure you want to delete this Prescription ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>
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