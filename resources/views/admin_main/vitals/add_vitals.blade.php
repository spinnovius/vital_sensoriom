@extends('layouts.admin_main')
@section('content')
<ul class="nav nav-tabs">
 <li><a href="{{ route('store_patient.edit', $patient_id) }}">Details</a></li>
 <li class="active"><a href="{{ route('admin_main.vitalsindex', $patient_id) }}">Vitals</a></li>
 <li ><a href="{{ route('admin_main.labtestindex', $patient_id) }}">Lab Tests</a></li>
 <li><a href="{{ route('admin_main.procedureindex', $patient_id) }}">Procedures</a></li>

</ul>
<section class="content-header" style="padding-bottom: 1em;">
  <h3 style="margin-left: 22px;">Add Vitals</h3>
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

    <form action="{{ route('admin_main.vitalsstore',$patient_id)}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <input type="text" class="form-control " id="singledate" name="date" placeholder="Date" value="{{old('date')}}" autocomplete="off" required="" required="">
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-2 mb-3">
          <label for="bloodpressure">Blood Pressure</label>
          <input type="text" class="form-control" id="validationDefault01" placeholder="SBP"  name="sbp" value="{{old('sbp')}}" required="">{{-- isnumbertype --}}
        </div>

        <div class="col-md-2 mb-3">
          <label for="bloodpressure">Blood Pressure</label>
          <input type="text" class="form-control " id="validationDefault01" placeholder="DBP"   name="dbp" value="{{old('dbp')}}" required="">{{-- isnumbertype --}}
        </div>
      </div>
      <div class="form-row">

        <div class="col-md-2 mb-3">
          <label for="heartrate">Pulse/Heart Rate</label>
          <input type="text" class="form-control isnumbertype" id="validationDefault01" placeholder="per min"  name="hr" value="{{old('hr')}}" required="">
        </div>

        <div class="col-md-2 mb-3">
          <label for="respiratoryrate">Respiratory Rate</label>
          <input type="text" class="form-control isnumbertype" id="validationDefault01" placeholder="per minute" name="rr" value="{{old('rr')}}" required="">
        </div>
        <div class="col-md-2 mb-3">
          <label for="saturationoxygen">Saturation Oxygen(%)</label>
          <input type="text" class="form-control isnumbertype" id="validationDefault01" placeholder="SpO2 "  name="sp2" value="{{old('sp2')}}" required="">
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-2 mb-3">
          <label for="bloodsugar">Blood Sugar</label>
          <input type="text" class="form-control isnumbertype" id="validationDefault01" placeholder="mg/dl" name="fbs" value="{{old('fbs')}}" required="">
        </div>
        <div class="col-md-2 mb-3">
          <label for="temperature">Temperature</label>
          <input type="text" class="form-control" id="validationDefault01" placeholder="*f"  name="temp" value="{{old('temp')}}" required="">
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-2 mb-3">
          <label for="weight">Weight</label>
          <input type="text" class="form-control isnumbertype" id="weight" placeholder="kg"   name="weight" value="{{old('weight')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required="">
        </div>

        <div class="col-md-2 mb-3">
          <label for="height">Height</label>
          <input type="text" class="form-control isnumbertype" id="height" placeholder="Height(m)"  name="height" value="{{old('height')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required="">
        </div>

        <div class="col-md-2 mb-3">
          <label for="bodymassindex">Body Mass Index</label>
          <input type="text" class="form-control" id="bmi" placeholder="BMI"  name="bmi" value="{{old('bmi')}}" readonly="">
        </div>

        <div class="col-md-2 mb-3">
          <label for="abdominalcircumference">Abdominal Circumference</label>
          <input type="text" class="form-control" id="validationDefault01" placeholder="cm"  name="ac" value="{{old('ac')}}" required="">
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