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
            <label>Perinatal & Birth History: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->perinatal)?$PediatricSurgery->perinatal:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Developmental History: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->development)?$PediatricSurgery->development:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Feeding History: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->feeding)?$PediatricSurgery->feeding:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Immunization History: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->immunization)?$PediatricSurgery->immunization:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Family History: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->family)?$PediatricSurgery->family:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Past History: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->past)?$PediatricSurgery->past:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>APGAR Score: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->apgar)?$PediatricSurgery->apgar:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>General Appearance: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->general_appearance)?$PediatricSurgery->general_appearance:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Weight (cm): </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->weight)?$PediatricSurgery->weight:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Length/ Height (cm): </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->length)?$PediatricSurgery->length:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Head Circumference (cm): </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->head)?$PediatricSurgery->head:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Skin: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->skin)?$PediatricSurgery->skin:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Lymph Nodes: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->lymph)?$PediatricSurgery->lymph:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Facies: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->facies)?$PediatricSurgery->facies:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Oral Cavity: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->oral)?$PediatricSurgery->oral:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Chest: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->chest)?$PediatricSurgery->chest:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Abdomen: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->abdomen)?$PediatricSurgery->abdomen:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Genitalia: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->genitalia)?$PediatricSurgery->genitalia:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Rectum and Anus: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->rectum)?$PediatricSurgery->rectum:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Musculoskeletal: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->musculos)?$PediatricSurgery->musculos:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Back: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->back)?$PediatricSurgery->back:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Reflexes: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->reflexes)?$PediatricSurgery->reflexes:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Neurological Examination: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->neurological)?$PediatricSurgery->neurological:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Local Examimation: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->local)?$PediatricSurgery->local:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Lump Exam: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->lump)?$PediatricSurgery->lump:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Ulcers Exam: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->ulcers)?$PediatricSurgery->ulcers:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Differential Diagnosis: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->diff_diagnosis)?$PediatricSurgery->diff_diagnosis:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Planned Procedure: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($PediatricSurgery->planned_procedures)?$PediatricSurgery->planned_procedures:'-'}}</p>
        </div>
    </div>
    
</div>
@endsection
