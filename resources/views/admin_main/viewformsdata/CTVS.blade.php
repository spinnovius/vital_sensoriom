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
            <p>{{isset($CTVS->generalappearance)?$CTVS->generalappearance:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Radial Artery: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->radial)?$CTVS->radial:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Rhythm: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->rhythm)?$CTVS->rhythm:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Carotid Artery: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->cardotid)?$CTVS->cardotid:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Jugular Venous Pressure: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->jugular)?$CTVS->jugular:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Thrills: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->thrills)?$CTVS->thrills:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>S1</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->s1)?$CTVS->s1:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>S2</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->s2)?$CTVS->s2:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>S3</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->s3)?$CTVS->s3:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>S4</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->s4)?$CTVS->s4:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Murmurs: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->murmurs)?$CTVS->murmurs:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Extra Sounds: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->extrasounds)?$CTVS->extrasounds:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Respiratory Rate: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->respiratory)?$CTVS->respiratory:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Rhythm: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->pulmonary_rhythm)?$CTVS->pulmonary_rhythm:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Use of accessory muscles of respiration: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->muscules)?$CTVS->muscules:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Evidence of Carbon Dioxide Retention: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->retention)?$CTVS->retention:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Troisier’s Sign: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->troisier)?$CTVS->troisier:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Chest Expansion: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->chest)?$CTVS->chest:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Percussion between ribs: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->percussion)?$CTVS->percussion:'-'}}</p>
        </div>
    </div>
    
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Tactile Vocal Fremitus: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->tactile)?$CTVS->tactile:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Auscultation important notes: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->auscultation)?$CTVS->auscultation:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Any other important notes: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->anyother)?$CTVS->anyother:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Peripheral Vascular Examination: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->vascular)?$CTVS->vascular:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Signs of Congestive Heart Failure: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->congestive)?$CTVS->congestive:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Signs of Infective Endocarditis: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->infective)?$CTVS->infective:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Signs of Rheumatic Heart Disease: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->rheumatic)?$CTVS->rheumatic:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Differential Diagnosis: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->diff_diagnosis)?$CTVS->diff_diagnosis:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Planned Procedure: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($CTVS->planned_procedures)?$CTVS->planned_procedures:'-'}}</p>
        </div>
    </div>
    
</div>
@endsection
