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
            <p>{{isset($Neurology->glasgow_scale)?$Neurology->glasgow_scale:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Consciousness: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->Consciousness)?$Neurology->Consciousness:'-'}}</p>
        </div>
    </div>
      <div class="row"  <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Alertness: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->Alertness)?$Neurology->Alertness:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Speech: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->Speech)?$Neurology->Speech:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Pupils: </label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->Pupils)?$Neurology->Pupils:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Cranial Nerves</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->CranialNerves)?$Neurology->CranialNerves:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Gait</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->Gait)?$Neurology->Gait:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Involuntary Movements</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->InvoluntaryMovements)?$Neurology->InvoluntaryMovements:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Abnormal Postures</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->AbnormalPostures)?$Neurology->AbnormalPostures:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Trophic Changes</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->Trophicchanges)?$Neurology->Trophicchanges:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Contractions</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->Contractions)?$Neurology->Contractions:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Muscle Tone</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->MuscleTone)?$Neurology->MuscleTone:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Motor Power</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->MotorPower)?$Neurology->MotorPower:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Deep Reflexes</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->DeepReflexes)?$Neurology->DeepReflexes:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Superficial Reflexes</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->SuperficialReflexes)?$Neurology->SuperficialReflexes:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Tactile Sensation</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->tactilesensation)?$Neurology->tactilesensation:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>TactilediScrimination</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->tactilediscrimination)?$Neurology->tactilediscrimination:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Temperature Discrimination</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->temperaturediscrimination)?$Neurology->temperaturediscrimination:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Joint Propioception</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->jointpropioception)?$Neurology->jointpropioception:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Pain Sensation</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->painsensation)?$Neurology->painsensation:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Vibration Sense</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->vibrationsense)?$Neurology->vibrationsense:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>UMN Lesion</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->UMN_lesion)?$Neurology->UMN_lesion:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>LMN Lesion</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->LMN_lesion)?$Neurology->LMN_lesion:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Extrapyramidal Lesion</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->Extrapyramidal_lesion)?$Neurology->Extrapyramidal_lesion:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Cerebellar Lesion</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->Cerebellar_lesion)?$Neurology->Cerebellar_lesion:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Raised Ict</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->raised_ict)?$Neurology->raised_ict:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Meningitis</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->Meningitis)?$Neurology->Meningitis:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Head Trauma</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->head_trauma)?$Neurology->head_trauma:'-'}}</p>
        </div>
    </div>
      <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Peripheral Disease</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->peripheral_disease)?$Neurology->peripheral_disease:'-'}}</p>
        </div>
    </div>
     <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Myopathies</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->Myopathies)?$Neurology->Myopathies:'-'}}</p>
        </div>
    </div>
     <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Systemic Notes</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->systemic_notes)?$Neurology->systemic_notes:'-'}}</p>
        </div>
    </div>
     <div class="row" style="padding-bottom:2em;">
        <div class="col-md-2">
            <label>Different Diagnosis</label>
        </div>
        <div class="col-md-8">
            <p>{{isset($Neurology->diff_diagnosis)?$Neurology->diff_diagnosis:'-'}}</p>
        </div>
    </div>
</div>
@endsection
