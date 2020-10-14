@extends('layouts.admin_main')
@section('content')
<ul class="nav nav-tabs">
                 <li><a href="{{ route('store_patient.edit', $patient_id) }}">Details</a></li>
                 <li><a href="{{ route('admin_main.hopiindex', $patient_id) }}">HOPI</a></li>
                 <li><a href="{{ route('admin_main.geindex', $patient_id) }}">General Examination</a></li>
                 <li><a href="{{ route('admin_main.seindex', $patient_id) }}">Systemic Examination</a></li>
                 <li class="active"><a href="{{ route('admin_main.ppindex', $patient_id) }}">Prescription</a></li>
                 <li ><a href="{{ route('admin_main.atindex', $patient_id) }}">Advice Treatment</a></li>
</ul>
<section class="content-header" style="padding-bottom: 1em;">
        <h3 style="margin-left: 22px;">Edit Prescription</h3>
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
                

                <form action="{{ route('admin_main.ppupdate', [$patient_id, $PatientLabDetail->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-row">
                        <div class="col-md-4 mb-3">  
                          <input type="text" class="form-control" name="drugname" placeholder="Drug Name" value="{{$PatientLabDetail->medicine_name}}" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <input type="text" class="form-control isnumbertype" id="validationDefault01" maxlength="5" placeholder="Dose" required name="dose" value="{{$PatientLabDetail->dose}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">   
                          <input type="text" class="form-control isnumbertype" id="validationDefault01" maxlength="5" placeholder="Frequency"  required name="frequency" value="{{$PatientLabDetail->freq}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">  
                          <input type="text" class="form-control " id="validationDefault01" placeholder="Route"  required name="route" value="{{$PatientLabDetail->route}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">  
                          <input type="text" class="form-control isnumbertype" maxlength="5" id="validationDefault01" placeholder="Duration"  required name="duration" value="{{$PatientLabDetail->duration}}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">  
                          <textarea class="form-control" name="notes" placeholder="Prescription safety notes">{{$PatientLabDetail->notes}}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md-4">
                            <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>
                            <button type="submit" class="btn btn-primary btn-info" value="submit">SUBMIT</button>
                        </div>
                    </div>
                </form>
</div>
</div>
@endsection