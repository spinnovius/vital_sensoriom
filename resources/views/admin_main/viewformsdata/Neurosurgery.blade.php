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
            <label>Glasgow Scale: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->glasgow_scale)?$Neurosurgery->glasgow_scale:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Consciousness: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->Consciousness)?$Neurosurgery->Consciousness:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Alertness: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->Alertness)?$Neurosurgery->Alertness:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Speech: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->Speech)?$Neurosurgery->Speech:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Pupils: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->Pupils)?$Neurosurgery->Pupils:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Cranial Nerves</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->CranialNerves)?$Neurosurgery->CranialNerves:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Gait</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->Gait)?$Neurosurgery->Gait:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Involuntary Movements</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->InvoluntaryMovements)?$Neurosurgery->InvoluntaryMovements:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Abnormal Postures</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->AbnormalPostures)?$Neurosurgery->AbnormalPostures:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Trophic Changes</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->Trophicchanges)?$Neurosurgery->Trophicchanges:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Contractions</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->Contractions)?$Neurosurgery->Contractions:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Muscle Tone</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->MuscleTone)?$Neurosurgery->MuscleTone:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Motor Power</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->MotorPower)?$Neurosurgery->MotorPower:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Deep Reflexes</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->DeepReflexes)?$Neurosurgery->DeepReflexes:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Superficial Reflexes</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->SuperficialReflexes)?$Neurosurgery->SuperficialReflexes:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Tactile Sensation</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->tactilesensation)?$Neurosurgery->tactilesensation:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>TactilediScrimination</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->tactilediscrimination)?$Neurosurgery->tactilediscrimination:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Temperature Discrimination</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->temperaturediscrimination)?$Neurosurgery->temperaturediscrimination:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Joint Propioception</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->jointpropioception)?$Neurosurgery->jointpropioception:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Pain Sensation</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->painsensation)?$Neurosurgery->painsensation:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Vibration Sense</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->vibrationsense)?$Neurosurgery->vibrationsense:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>UMN Lesion</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->UMN_lesion)?$Neurosurgery->UMN_lesion:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>LMN Lesion</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->LMN_lesion)?$Neurosurgery->LMN_lesion:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Extrapyramidal Lesion</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->Extrapyramidal_lesion)?$Neurosurgery->Extrapyramidal_lesion:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Cerebellar Lesion</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->Cerebellar_lesion)?$Neurosurgery->Cerebellar_lesion:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Raised Ict</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->raised_ict)?$Neurosurgery->raised_ict:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Meningitis</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->Meningitis)?$Neurosurgery->Meningitis:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Head Trauma</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->head_trauma)?$Neurosurgery->head_trauma:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Peripheral Disease</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->peripheral_disease)?$Neurosurgery->peripheral_disease:'-'}}</p>
        </div>
    </div>
     <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Myopathies</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->Myopathies)?$Neurosurgery->Myopathies:'-'}}</p>
        </div>
    </div>
     <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Systemic Notes</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->systemic_notes)?$Neurosurgery->systemic_notes:'-'}}</p>
        </div>
    </div>
     <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Different Diagnosis</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurosurgery->diff_diagnosis)?$Neurosurgery->diff_diagnosis:'-'}}</p>
        </div>
    </div>
</div>
@endsection
