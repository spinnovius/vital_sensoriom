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
            <p>{{isset($SurgicalGastroenterology->generalappearance)?$SurgicalGastroenterology->generalappearance:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Relevant positive findings: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($SurgicalGastroenterology->relevant_inspection)?$SurgicalGastroenterology->relevant_inspection:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Relevant positive findings: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($SurgicalGastroenterology->relevant_palpation)?$SurgicalGastroenterology->relevant_palpation:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Tenderness points: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($SurgicalGastroenterology->tenderness)?$SurgicalGastroenterology->tenderness:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Organomegaly, if any: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($SurgicalGastroenterology->organomegaly)?$SurgicalGastroenterology->organomegaly:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Hernial Sites: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($SurgicalGastroenterology->hernial)?$SurgicalGastroenterology->hernial:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Abdominal Aorta: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($SurgicalGastroenterology->abdominal)?$SurgicalGastroenterology->abdominal:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Relevant positive findings: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($SurgicalGastroenterology->relevant_percussion)?$SurgicalGastroenterology->relevant_percussion:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Examination for Ascites: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($SurgicalGastroenterology->examination_ascites)?$SurgicalGastroenterology->examination_ascites:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Relevant positive findings: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($SurgicalGastroenterology->relevant_auscultation)?$SurgicalGastroenterology->relevant_auscultation:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Relevant positive findings: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($SurgicalGastroenterology->auscultation)?$SurgicalGastroenterology->auscultation:'-'}}</p>
        </div>
    </div>
     <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Relevant positive findings: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($SurgicalGastroenterology->relevant_genitalia)?$SurgicalGastroenterology->relevant_genitalia:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Differential Diagnosis: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($SurgicalGastroenterology->diff_diagnosis)?$SurgicalGastroenterology->diff_diagnosis:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Planned Procedure: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($SurgicalGastroenterology->planned_procedure)?$SurgicalGastroenterology->planned_procedure:'-'}}</p>
        </div>
    </div>
      
</div>
@endsection
