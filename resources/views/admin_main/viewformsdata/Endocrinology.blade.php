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
            <label>Built & Stature: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Endocrinology->built)?$Endocrinology->built:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Hair Changes: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Endocrinology->hair)?$Endocrinology->hair:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Eye Changes: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Endocrinology->eye)?$Endocrinology->eye:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Ear Changes: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Endocrinology->ear)?$Endocrinology->ear:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Mid-facial Structure: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Endocrinology->midfacial)?$Endocrinology->midfacial:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Lip Changes: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Endocrinology->lip)?$Endocrinology->lip:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Dental Alliance: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Endocrinology->dental)?$Endocrinology->dental:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Tongue Changes: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Endocrinology->tongue)?$Endocrinology->tongue:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Neck Examination: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Endocrinology->neck)?$Endocrinology->neck:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Skin & Nail Changes: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Endocrinology->skin)?$Endocrinology->skin:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Podiatric Examination: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Endocrinology->podiatric)?$Endocrinology->podiatric:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Peripheral Vascular Examination: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Endocrinology->peripheral)?$Endocrinology->peripheral:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Complete Thyroid Examination: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Endocrinology->complete)?$Endocrinology->complete:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>External Genitalia Examination: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Endocrinology->external)?$Endocrinology->external:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Sexual Maturation Index: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Endocrinology->sexual)?$Endocrinology->sexual:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Systemic Examination: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Endocrinology->systemic)?$Endocrinology->systemic:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Differential Diagnosis: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Endocrinology->diff_diagnosis)?$Endocrinology->diff_diagnosis:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Planned Procedure: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Endocrinology->planned_procedure)?$Endocrinology->planned_procedure:'-'}}</p>
        </div>
    </div>
    
</div>
@endsection
