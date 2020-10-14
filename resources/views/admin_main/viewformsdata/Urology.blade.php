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
            <p>{{isset($Urology->generalappearance)?$Urology->generalappearance:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Arms & Hands: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Urology->armshands)?$Urology->armshands:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Face: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Urology->face)?$Urology->face:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Head & Neck: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Urology->headneck)?$Urology->headneck:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Chest: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Urology->chest)?$Urology->chest:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Abdomen: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Urology->abdomen)?$Urology->abdomen:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Legs: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Urology->legs)?$Urology->legs:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Groin & Genitals: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Urology->groin)?$Urology->groin:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Back: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Urology->back)?$Urology->back:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>PR Examination: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Urology->pr_examination)?$Urology->pr_examination:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Differential Diagnosis: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Urology->diff_diagnosis)?$Urology->diff_diagnosis:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Planned Procedure: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Urology->planned_procedure)?$Urology->planned_procedure:'-'}}</p>
        </div>
    </div>
     
</div>
@endsection
