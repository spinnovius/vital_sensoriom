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
            <label>Types Of OBG: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->typesofobg)?$Obstetrics->typesofobg:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Gravida: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->Gravida)?$Obstetrics->Gravida:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Parity: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->Parity)?$Obstetrics->Parity:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Abortions: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->Abortions)?$Obstetrics->Abortions:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Live: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->Live)?$Obstetrics->Live:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>LMP</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->LMP)?$Obstetrics->LMP:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>EDD</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->EDD)?$Obstetrics->EDD:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Ectopic Pregnancy</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->ectopicpregnancy)?$Obstetrics->ectopicpregnancy:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Obstetric History</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->obstetrichistory)?$Obstetrics->obstetrichistory:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>BreastExam</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->BreastExam)?$Obstetrics->BreastExam:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>CSscar</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->CSscar)?$Obstetrics->CSscar:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>SignsPregnancy</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->SignsPregnancy)?$Obstetrics->SignsPregnancy:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>SynphysisFundal</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->SynphysisFundal)?$Obstetrics->SynphysisFundal:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>PelvicGrip</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->PelvicGrip)?$Obstetrics->PelvicGrip:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Lie</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->Lie)?$Obstetrics->Lie:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Presentation</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->Presentation)?$Obstetrics->Presentation:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>AmnioticFluid</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->AmnioticFluid)?$Obstetrics->AmnioticFluid:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>FHR</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->FHR)?$Obstetrics->FHR:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Internal Examination</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->InternalExamination)?$Obstetrics->InternalExamination:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Manual Examination</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->ManualExamination)?$Obstetrics->ManualExamination:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Breast Examination</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->BreastExamination)?$Obstetrics->BreastExamination:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Pelvic Examination</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->PelvicExamination)?$Obstetrics->PelvicExamination:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Speculum Examination</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->SpeculumExamination)?$Obstetrics->SpeculumExamination:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Bmanua lExamination</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->BmanualExamination)?$Obstetrics->BmanualExamination:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Rectal Examination</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->RectalExamination)?$Obstetrics->RectalExamination:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Name Child</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->namechild)?$Obstetrics->namechild:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Date of Birth</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->dateofbirth)?$Obstetrics->dateofbirth:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Sex</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->sex)?$Obstetrics->sex:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Complications</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Obstetrics->complications)?$Obstetrics->complications:'-'}}</p>
        </div>
    </div>
</div>
@endsection
