@extends('layouts.admin_main')
@section('content')
<ul class="nav nav-tabs">
                 <li><a href="{{ route('store_patient.edit', $patient_id) }}">Details</a></li>
                 <li><a href="{{ route('admin_main.vitalsindex', $patient_id) }}">Vitals</a></li>
                 <li class="active"><a href="{{ route('admin_main.labtestindex', $patient_id) }}">Lab Tests</a></li>
                 <li><a href="{{ route('admin_main.procedureindex', $patient_id) }}">Procedures</a></li>
                 
</ul>
<section class="content-header" style="padding-bottom: 1em;">
        <h3 style="margin-left: 22px;">Add Lab Test</h3>
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
                

                <form action="{{ route('admin_main.labteststore',$patient_id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-row">
                        <div class="col-md-4 mb-3">  
                          <input type="text" class="form-control labtestdate" name="date" placeholder="Date" value="{{old('date')}}" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <select class="form-control" name="labtestname" required="">
                                <option value="">Select Lab Test Name</option>
                                @foreach($labreports as $labreport)
                                <option <?php if(old('speciality') == $labreport->id ){ ?> selected="selected" <?php } ?> value="{{ $labreport->test_name }}">{{ $labreport->test_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">  
                          <input type="text" class="form-control" id="validationDefault01" placeholder="Value"  required name="value" value="{{old('value')}}">
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