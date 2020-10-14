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
            <p>{{isset($Oncology->generalappearance)?$Oncology->generalappearance:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Site: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Oncology->site)?$Oncology->site:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Lump Exam: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Oncology->lumpexam)?$Oncology->lumpexam:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Vascular Supply of affected area: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Oncology->vascular)?$Oncology->vascular:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Nerve Supply of affected area: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Oncology->nerve)?$Oncology->nerve:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Lymphatics of affected area: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Oncology->lymphatics)?$Oncology->lymphatics:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Spread or Metastases: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Oncology->spread)?$Oncology->spread:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Differential Diagnosis: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Oncology->diff_diagnosis)?$Oncology->diff_diagnosis:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Planned Procedure: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Oncology->planned_procedure)?$Oncology->planned_procedure:'-'}}</p>
        </div>
    </div>
     
</div>
@endsection
