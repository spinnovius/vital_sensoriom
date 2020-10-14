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
            <p>{{isset($Nephrology->generalappearance)?$Nephrology->generalappearance:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Arms & Hands: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Nephrology->arms_hands)?$Nephrology->arms_hands:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Face: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Nephrology->face)?$Nephrology->face:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Head & Neck: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Nephrology->head_neck)?$Nephrology->head_neck:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Chest: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Nephrology->chest)?$Nephrology->chest:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Abdomen: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Nephrology->abdomen)?$Nephrology->abdomen:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Legs: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Nephrology->legs)?$Nephrology->legs:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Groin & Genitals: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Nephrology->groin)?$Nephrology->groin:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Back: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Nephrology->back)?$Nephrology->back:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>PR Examination: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Nephrology->prexamination)?$Nephrology->prexamination:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Differential Diagnosis: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Nephrology->diff_diagnosis)?$Nephrology->diff_diagnosis:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Planned Procedure: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Nephrology->plannned_procedure)?$Nephrology->plannned_procedure:'-'}}</p>
        </div>
    </div>
     
</div>
@endsection
