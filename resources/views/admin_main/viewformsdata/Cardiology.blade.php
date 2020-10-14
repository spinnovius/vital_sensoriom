@extends('layouts.admin_main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary btn-info pull-right" href="{{ route('store_patient.pasthealthrecords',$userid)}}">Past Health Records</a>    
    </div>
    
</div>
<div class=" card col-md-12" style="padding-top:2em;">
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Radial Rate: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Cardiology->radial_rate)?$Cardiology->radial_rate:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Rhythm: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Cardiology->rhythm)?$Cardiology->rhythm:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Carotidartery: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Cardiology->carotidartery)?$Cardiology->carotidartery:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Jugular Pressure: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Cardiology->jugularpressure)?$Cardiology->jugularpressure:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Thrills: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Cardiology->Thrills)?$Cardiology->Thrills:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>S1</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Cardiology->S1)?$Cardiology->S1:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>S2</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Cardiology->S2)?$Cardiology->S2:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>S3</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Cardiology->S3)?$Cardiology->S3:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>S4</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Cardiology->S4)?$Cardiology->S4:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Murmurs</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Cardiology->Murmurs)?$Cardiology->Murmurs:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Extra Sounds</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Cardiology->extrasounds)?$Cardiology->extrasounds:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Pulmonary Exam</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Cardiology->pulmonaryexam)?$Cardiology->pulmonaryexam:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Heart Failure</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Cardiology->heartfailure)?$Cardiology->heartfailure:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Endocarditis</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Cardiology->endocarditis)?$Cardiology->endocarditis:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Heart Disease</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Cardiology->heartdsease)?$Cardiology->heartdsease:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Cardiac Disease</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Cardiology->cardiacdisease)?$Cardiology->cardiacdisease:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Other</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Cardiology->Other)?$Cardiology->Other:'-'}}</p>
        </div>
    </div>
    
</div>
@endsection
