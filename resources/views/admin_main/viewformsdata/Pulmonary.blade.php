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
            <label>Respiratory Rate: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pulmonary->respiratory_rate)?$Pulmonary->respiratory_rate:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Respiratory Rhythm: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pulmonary->respiratory_rhythm)?$Pulmonary->respiratory_rhythm:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Muscles Respiration: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pulmonary->muscles_respiration)?$Pulmonary->muscles_respiration:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Dioxide Retention: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pulmonary->dioxide_retention)?$Pulmonary->dioxide_retention:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Troisier Sign: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pulmonary->troisier_sign)?$Pulmonary->troisier_sign:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Chest Expansion: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pulmonary->chest_expansion)?$Pulmonary->chest_expansion:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Percussion Ribs: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pulmonary->percussion_ribs)?$Pulmonary->percussion_ribs:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Vocal Fremitus: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pulmonary->vocal_fremitus)?$Pulmonary->vocal_fremitus:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Auscultation Notes: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pulmonary->auscultation_notes)?$Pulmonary->auscultation_notes:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Any Notes: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pulmonary->any_notes)?$Pulmonary->any_notes:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Radial Rate: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pulmonary->radial_Rate)?$Pulmonary->radial_Rate:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Rhythm: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pulmonary->rhythm)?$Pulmonary->rhythm:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Carotid Rate: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pulmonary->carotid_Rate)?$Pulmonary->carotid_Rate:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Jugular Pressure</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pulmonary->jugular_pressure)?$Pulmonary->jugular_pressure:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Different Diagnosis: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pulmonary->diff_diagnosis)?$Pulmonary->diff_diagnosis:'-'}}</p>
        </div>
    </div>
     
</div>
@endsection
