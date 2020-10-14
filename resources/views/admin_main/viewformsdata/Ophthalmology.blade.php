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
            <label>Visual Acuity: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Ophthalmology->visualacuity)?$Ophthalmology->visualacuity:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Pupils: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Ophthalmology->pupils)?$Ophthalmology->pupils:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Extraocular Motility & Alignment: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Ophthalmology->extraocularmotility)?$Ophthalmology->extraocularmotility:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Intraocular Pressure: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Ophthalmology->intraocular)?$Ophthalmology->intraocular:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Confrontation Visual Fields: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Ophthalmology->confrontation)?$Ophthalmology->confrontation:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>External Examination:</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Ophthalmology->external)?$Ophthalmology->external:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Slit Lamp Examination:</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Ophthalmology->slitlamp)?$Ophthalmology->slitlamp:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Fundoscopic Examination:</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Ophthalmology->fundoscopic)?$Ophthalmology->fundoscopic:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Differential Diagnosis:</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Ophthalmology->diff_diagnosis)?$Ophthalmology->diff_diagnosis:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Planned Procedure:</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Ophthalmology->planned_procedure)?$Ophthalmology->planned_procedure:'-'}}</p>
        </div>
    </div>
     
    
</div>
@endsection
