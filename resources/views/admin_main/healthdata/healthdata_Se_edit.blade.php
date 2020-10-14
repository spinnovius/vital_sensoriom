@extends('layouts.admin_main')
@section('content')
<ul class="nav nav-tabs">
        <li><a href="{{ route('store_patient.edit', $patient_id) }}">Details</a></li>
        <li><a href="{{ route('admin_main.hopiindex', $patient_id) }}">HOPI</a></li>
        <li><a href="{{ route('admin_main.exindex', $patient_id) }}">General Examination</a></li>
        <li class="active"><a href="{{ route('admin_main.seindex', $patient_id) }}">Systemic Examination</a></li>
        <li><a href="{{ route('admin_main.ppindex', $patient_id) }}">Prescription</a></li>
        <li><a href="{{ route('admin_main.atindex', $patient_id) }}">Advice Treatment</a></li>
</ul>
<section class="content-header" style="padding-bottom: 1em;">
        <h3 style="margin-left: 22px;">Edit System Examination</h3>
</section>
<div class="col-sm-10">
<div class="container">
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
                

                <form action="{{ route('admin_main.seupdate',[$patient_id, $patientge->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    
                    <div class="form-row" style="margin-bottom: 1em;">
                    	<div class="col-md-6 mb-6">  
                          	<textarea class="form-control" placeholder="Probable Diagnosis" name="diagnosis">{{$patientge->diagnosis}}</textarea>
                        </div>
                    </div>
                   

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">  
                          	<textarea class="form-control" placeholder="System Examination Notes" name="notes">{{$patientge->notes}}</textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4">
                            <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>
                            <button type="submit" class="btn btn-primary btn-info" value="submit">UPDATE</button>
                        </div>
                    </div>
                    
                </form>
</div>
</div>
@endsection