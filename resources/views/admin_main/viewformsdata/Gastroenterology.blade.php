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
            <p>{{isset($Gastroenterology->generalappearance)?$Gastroenterology->generalappearance:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Relevant positive findings: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Gastroenterology->relevant_positive)?$Gastroenterology->relevant_positive:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Relevant positive findings: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Gastroenterology->relevant_positive_other)?$Gastroenterology->relevant_positive_other:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Tenderness points: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Gastroenterology->tenderness)?$Gastroenterology->tenderness:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Organomegaly, if any: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Gastroenterology->organomegaly)?$Gastroenterology->organomegaly:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Hernial Sites: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Gastroenterology->hernial)?$Gastroenterology->hernial:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Abdominal Aorta: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Gastroenterology->abdominal)?$Gastroenterology->abdominal:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Relevant positive findings: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Gastroenterology->relevant_percussion)?$Gastroenterology->relevant_percussion:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Examination for Ascites: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Gastroenterology->examination_ascites)?$Gastroenterology->examination_ascites:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Relevant positive findings: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Gastroenterology->relevant_auscultation)?$Gastroenterology->relevant_auscultation:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Relevant positive findings: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Gastroenterology->relevant_external)?$Gastroenterology->relevant_external:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Differential Diagnosis: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Gastroenterology->diff_diagnosis)?$Gastroenterology->diff_diagnosis:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Planned Procedure: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Gastroenterology->planned_procedure)?$Gastroenterology->planned_procedure:'-'}}</p>
        </div>
    </div>
      
</div>
@endsection
