@extends('layouts.admin_main')
@section('content')
<ul class="nav nav-tabs">
            <li><a href="{{ route('store_patient.edit', $patient_id) }}">Details</a></li>
            <li><a href="{{ route('admin_main.hopiindex', $patient_id) }}">HOPI</a></li>
            <li><a href="{{ route('admin_main.exindex', $patient_id) }}">General Examination</a></li>
            <li class="active"><a href="{{ route('admin_main.seindex', $patient_id) }}">Systemic Examination</a></li>
            {{-- <li><a href="{{ route('admin_main.ppindex', $patient_id) }}">Prescription</a></li>
            <li><a href="{{ route('admin_main.atindex', $patient_id) }}">Advice Treatment</a></li> --}}
            <li><a href="{{ route('admin_main.clinical_managementindex', $patient_id) }}">CLINICAL MANAGEMENT</a></li>
            <li><a href="{{ route('admin_main.indexvitalslabtest', $patient_id) }}">Vitals Labtest</a></li>
</ul>
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
                {{-- <div class="row">
		            <div class="col-md-12 align-self-center text-right d-none d-md-block" style="padding-top: 1em;">
		                <a class="btn btn-info" href="{{ route('admin_main.seadd', $patient_id) }}"><i class="fa fa-plus-circle"></i> Add System Examination</a>
		            </div>
            	</div> --}}
<div class="row">
    <div class="col-12">
        <div class="">
            <div class="card-body">
                <h3 class="card-title text-uppercase"><b>Add System Examination</b></h3>
                <a class="btn btn-primary btn-info pull-right" href="{{ route('admin_main.clinical_managementindex', $patient_id) }}">Skip</a>
                <form action="{{ route('admin_main.sestore',$patient_id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">  
                            <textarea class="form-control" placeholder="Probable Diagnosis" name="diagnosis"></textarea>
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">  
                            <textarea class="form-control" placeholder="System Examination Notes" name="notes"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>
                            <button type="submit" class="btn btn-primary btn-info" value="submit">SUBMIT</button>
                        </div>
                    </div>
                </form>
                <h3 class="card-title text-uppercase"><b>System Examination Data</b></h3>
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                
                                <th>Diagnosis</th>
                                <th>Notes</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>  
                        @foreach($patient_detail as $patient_detail)
                             <tr>
                                        <td>{{$patient_detail->diagnosis}}</td>
                                        <td>{{$patient_detail->notes}}</td>
                                        <td>
                                            <?php 
                                            $delete_url = route("admin_main.sedelete", ["patient_id" =>$patient_id, "id" => $patient_detail->id]);
                                            ?>
                                            <a href="{{route('admin_main.seedit',["patient_id" =>$patient_id, "id" => $patient_detail->id])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a style="color:red" onclick="return confirm(`<?php echo $delete_url  ?>`,`Are you sure you want to delete this system examination ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>
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