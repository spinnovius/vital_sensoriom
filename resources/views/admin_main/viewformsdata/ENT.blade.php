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
            <p>{{isset($ENT->generalappearance)?$ENT->generalappearance:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Ability to Communicate & Quality of Voice: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($ENT->abilitycommunicate)?$ENT->abilitycommunicate:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Constitutional Symptoms, If Any: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($ENT->constitutional)?$ENT->constitutional:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>External Examination (Ear & Nose): </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($ENT->externalexamination)?$ENT->externalexamination:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Nasal Mucosa, Septum & Turbinates: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($ENT->nasalmucosa)?$ENT->nasalmucosa:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Lips, Teeth & Gums: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($ENT->lips)?$ENT->lips:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Examination of Oropharynx: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($ENT->examination_oropharynx)?$ENT->examination_oropharynx:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Pharyngeal walls & Pyriform Sinuses: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($ENT->pharyngealwalls)?$ENT->pharyngealwalls:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Laryngoscopic Examination: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($ENT->laryngoscopic)?$ENT->laryngoscopic:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Adenoids, Posterior Choanae & Eustachian Tube: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($ENT->adenoids)?$ENT->adenoids:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>External Auditory Canal & Tympanic Membrane Examination: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($ENT->externalauditory)?$ENT->externalauditory:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Assessment of Hearing: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($ENT->assementofhearing)?$ENT->assementofhearing:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Salivary Glands: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($ENT->salivary_glands)?$ENT->salivary_glands:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Tender Areas: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($ENT->tender_areas)?$ENT->tender_areas:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Examination of Neck: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($ENT->examination_neck)?$ENT->examination_neck:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Thyroid Examination:</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($ENT->thyroidexamination)?$ENT->thyroidexamination:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Differential Diagnosis: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($ENT->diff_diagnosis)?$ENT->diff_diagnosis:'-'}}</p>
        </div>
    </div>
          <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Planned Procedure: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($ENT->planned_procedure)?$ENT->planned_procedure:'-'}}</p>
        </div>
    </div>
    
</div>
@endsection
