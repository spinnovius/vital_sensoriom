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
            <label>Types Of Orthopedic: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Orthopedics->types_orthopedic)?$Orthopedics->types_orthopedic:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Consciousness: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Orthopedics->consciousness)?$Orthopedics->consciousness:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Gait: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Orthopedics->gait)?$Orthopedics->gait:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Nutrition: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Orthopedics->nutrition)?$Orthopedics->nutrition:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Painscale: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Orthopedics->painscale)?$Orthopedics->painscale:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Skinissue</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Orthopedics->skinissue)?$Orthopedics->skinissue:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Abnormality</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Orthopedics->abnormality)?$Orthopedics->abnormality:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Bones</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Orthopedics->bones)?$Orthopedics->bones:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Joints</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Orthopedics->joints)?$Orthopedics->joints:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Muscles</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Orthopedics->muscles)?$Orthopedics->muscles:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Sensations</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Orthopedics->sensations)?$Orthopedics->sensations:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Motor</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Orthopedics->motor)?$Orthopedics->motor:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Dtrs</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Orthopedics->dtrs)?$Orthopedics->dtrs:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Spine</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Orthopedics->spine)?$Orthopedics->spine:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Special Tests:</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Orthopedics->specialtests)?$Orthopedics->specialtests:'-'}}</p>
        </div>
    </div>
    
</div>
@endsection
