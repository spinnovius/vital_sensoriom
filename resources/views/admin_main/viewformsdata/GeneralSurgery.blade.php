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
            <label>Abdominal: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralSurgery->abdominal)?$GeneralSurgery->abdominal:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Organomegaly: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralSurgery->organomegaly)?$GeneralSurgery->organomegaly:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Hernial: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralSurgery->hernial)?$GeneralSurgery->hernial:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Rectal: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralSurgery->rectal)?$GeneralSurgery->rectal:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Breast: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralSurgery->breast)?$GeneralSurgery->breast:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Local Nodes</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralSurgery->localnodes)?$GeneralSurgery->localnodes:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Metastasis</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralSurgery->metastasis)?$GeneralSurgery->metastasis:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Lump Exam</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralSurgery->lumpexam)?$GeneralSurgery->lumpexam:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Genitalia Exam</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralSurgery->genitaliaexam)?$GeneralSurgery->genitaliaexam:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Thyroid Disease</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralSurgery->thyroiddisease)?$GeneralSurgery->thyroiddisease:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Eyeexam</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralSurgery->eyeexam)?$GeneralSurgery->eyeexam:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Thyroid Exam</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralSurgery->thyroidexam)?$GeneralSurgery->thyroidexam:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Pemberton Sign</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralSurgery->pembertonsign)?$GeneralSurgery->pembertonsign:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Ulcers Exam</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralSurgery->ulcers_exam)?$GeneralSurgery->ulcers_exam:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Limbs Exam</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralSurgery->limbs_exam)?$GeneralSurgery->limbs_exam:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>system_exam</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralSurgery->Presentation)?$GeneralSurgery->system_exam:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Different Diagnosis</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($GeneralSurgery->diff_diagnosis)?$GeneralSurgery->diff_diagnosis:'-'}}</p>
        </div>
    </div>
      
</div>
@endsection
