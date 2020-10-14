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
            <label>Risk Assessment: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Psychiatry->risk_assessment)?$Psychiatry->risk_assessment:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Appearance: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Psychiatry->appearance)?$Psychiatry->appearance:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Speech: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Psychiatry->speech)?$Psychiatry->speech:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Drug: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Psychiatry->drug)?$Psychiatry->drug:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Dose: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Psychiatry->dose)?$Psychiatry->dose:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Frequency: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Psychiatry->frequency)?$Psychiatry->frequency:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Since: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Psychiatry->since)?$Psychiatry->since:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Mood: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Psychiatry->mood)?$Psychiatry->mood:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Thoughts: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Psychiatry->thoughts)?$Psychiatry->thoughts:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Perceptions: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Psychiatry->perceptions)?$Psychiatry->perceptions:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Delusions: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Psychiatry->delusions)?$Psychiatry->delusions:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Cognition: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Psychiatry->cognition)?$Psychiatry->cognition:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Insight: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Psychiatry->insight)?$Psychiatry->insight:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Different Diagnosis: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Psychiatry->diff_diagnosis)?$Psychiatry->diff_diagnosis:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Others: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Psychiatry->others)?$Psychiatry->others:'-'}}</p>
        </div>
    </div>
     
</div>
@endsection
