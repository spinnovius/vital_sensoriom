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
            <label>General Appearance: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Dentistry->generalappearance)?$Dentistry->generalappearance:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Facies: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Dentistry->facies)?$Dentistry->facies:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Skin & Nail Changes: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Dentistry->skin)?$Dentistry->skin:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Palpation of joint areas: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Dentistry->palpation)?$Dentistry->palpation:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Extra-oral Examination: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Dentistry->extra)?$Dentistry->extra:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Intra-oral Examination: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Dentistry->intra)?$Dentistry->intra:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Dental Examination: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Dentistry->dental)?$Dentistry->dental:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Regional Lymph Nodes Examination: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Dentistry->regional)?$Dentistry->regional:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Systemic Examination: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Dentistry->systemic)?$Dentistry->systemic:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Differential Diagnosis: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Dentistry->diff_diagnosis)?$Dentistry->diff_diagnosis:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Planned Procedure: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Dentistry->planned_procedure)?$Dentistry->planned_procedure:'-'}}</p>
        </div>
    </div>
     
</div>
@endsection
