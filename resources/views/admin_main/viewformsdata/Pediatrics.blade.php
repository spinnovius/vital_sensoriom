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
            <p>{{isset($Pediatrics->perinatal)?$Pediatrics->perinatal:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Developmental History: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->development)?$Pediatrics->development:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Feeding History: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->feeding)?$Pediatrics->feeding:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Immunization History: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->immunization)?$Pediatrics->immunization:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Family History: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->family)?$Pediatrics->family:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Past History: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->past)?$Pediatrics->past:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>APGAR Score: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->apgar)?$Pediatrics->apgar:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>General Appearance: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->general_apperance)?$Pediatrics->general_apperance:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Weight (cm): </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->weight)?$Pediatrics->weight:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Length/ Height (cm): </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->length)?$Pediatrics->length:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Head Circumference (cm): </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->head)?$Pediatrics->head:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Skin: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->skin)?$Pediatrics->skin:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Lymph Nodes: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->lymph)?$Pediatrics->lymph:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Facies: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->facies)?$Pediatrics->facies:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Oral Cavity: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->oral)?$Pediatrics->oral:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Chest: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->chest)?$Pediatrics->chest:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Abdomen: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->abdomen)?$Pediatrics->abdomen:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Genitalia: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->genitalia)?$Pediatrics->genitalia:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Rectum and Anus: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->rectum)?$Pediatrics->rectum:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Musculoskeletal: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->musculos)?$Pediatrics->musculos:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Back: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->back)?$Pediatrics->back:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Reflexes: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->reflexs)?$Pediatrics->reflexs:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Neurological Examination: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->neurological)?$Pediatrics->neurological:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Differential Diagnosis: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->diff_diagnosis)?$Pediatrics->diff_diagnosis:'-'}}</p>
        </div>
    </div>
    <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Planned Procedure: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Pediatrics->planned_procedure)?$Pediatrics->planned_procedure:'-'}}</p>
        </div>
    </div>
    
</div>
@endsection
