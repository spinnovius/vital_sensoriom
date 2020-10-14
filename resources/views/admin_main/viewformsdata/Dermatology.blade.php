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
            <p>{{isset($Dermatology->general_appearance)?$Dermatology->general_appearance:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Distribution: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Dermatology->distribution)?$Dermatology->distribution:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Which Surface: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Dermatology->which_surface)?$Dermatology->which_surface:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Density Lesions: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Dermatology->density_lesions)?$Dermatology->density_lesions:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Other Lesion: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Dermatology->other_lesion)?$Dermatology->other_lesion:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Examination Notes</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Dermatology->examination_notes)?$Dermatology->examination_notes:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Different Diagnosis</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Dermatology->diffdiagnosis)?$Dermatology->diffdiagnosis:'-'}}</p>
        </div>
    </div>
    
</div>
@endsection
