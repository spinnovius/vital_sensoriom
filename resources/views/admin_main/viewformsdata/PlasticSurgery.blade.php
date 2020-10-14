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
            <p>{{isset($PlasticSurgery->generalappearance)?$PlasticSurgery->generalappearance:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Site: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PlasticSurgery->site)?$PlasticSurgery->site:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Local Examination Notes: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PlasticSurgery->localexamination)?$PlasticSurgery->localexamination:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Special Notes: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PlasticSurgery->special_notes)?$PlasticSurgery->special_notes:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Differential Diagnosis: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PlasticSurgery->diff_diagnosis)?$PlasticSurgery->diff_diagnosis:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Planned Procedure:</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PlasticSurgery->planned_procedure)?$PlasticSurgery->planned_procedure:'-'}}</p>
        </div>
    </div>
      
    
</div>
@endsection
