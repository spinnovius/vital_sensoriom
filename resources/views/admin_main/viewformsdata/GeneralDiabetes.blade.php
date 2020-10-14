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
            <label>Cardiovascular: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralDiabetes->cardiovascular)?$GeneralDiabetes->cardiovascular:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Respiratory: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralDiabetes->respiratory)?$GeneralDiabetes->respiratory:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Abdominal: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralDiabetes->abdominal)?$GeneralDiabetes->abdominal:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Genitourinary: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralDiabetes->genitourinary)?$GeneralDiabetes->genitourinary:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Endocrinemeta: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralDiabetes->endocrinemeta)?$GeneralDiabetes->endocrinemeta:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Sign Of Diabetes</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralDiabetes->signofdiabetes)?$GeneralDiabetes->signofdiabetes:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Podiatric Exam</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralDiabetes->podiatricexam)?$GeneralDiabetes->podiatricexam:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Type Of Diabetes</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralDiabetes->typeofdiabetes)?$GeneralDiabetes->typeofdiabetes:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Different Diagnosis</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralDiabetes->diffdiagnosis)?$GeneralDiabetes->diffdiagnosis:'-'}}</p>
        </div>
    </div>
      
</div>
@endsection
