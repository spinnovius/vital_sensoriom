@extends('layouts.admin_main')
@section('content')
<ul class="nav nav-tabs">
 <li><a href="{{ route('store_patient.edit', $patient_id) }}">Details</a></li>
 <li class="active"><a href="{{ route('admin_main.vitalsindex', $patient_id) }}">Vitals</a></li>
 <li ><a href="{{ route('admin_main.labtestindex', $patient_id) }}">Lab Tests</a></li>
 <li><a href="{{ route('admin_main.procedureindex', $patient_id) }}">Procedures</a></li>
</ul>
<div class="row">
  <div class="col-md-12">
<div class="col-md-12">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li class='text-white'>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    @if( session('success') )
    <div class="alert alert-success alert-dismissable fade in alert_msg">            
      <span style='color:white'>{{ session('success') }}</span>
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>
    @endif
    @if( session('danger') )
    <div class="alert alert-danger alert-dismissable fade in alert_msg">            
      <span style='color:white'>{{ session('danger') }}</span>
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>
    @endif
    <div class="">
      <h3 class="card-title text-uppercase"><b>Edit Vital</b></h3>
    </div>
    <form action="{{ route('admin_main.vitalsupdate', [$patient_id, $PatientProcedure->id]) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')

      <!-- <div class="form-row">
        <div class="col-md-4 mb-3">  
          <input type="text" class="form-control" id="singledate" name="date" placeholder="Date" value="{{$PatientProcedure->add_date}}" autocomplete="off" required="">
        </div>
      </div> -->
      <div class="form-row">
        <div class="col-md-2 mb-3">
          <label for="bloodpressure">Blood Pressure</label>
          <input type="text" class="form-control" id="validationDefault01" placeholder="SBP"  name="sbp" value="{{$PatientProcedure->blood_pressure_min_value}}">
        </div>

        <div class="col-md-2 mb-3">
          <label for="bloodpressure">Blood Pressure</label>
          <input type="text" class="form-control" id="validationDefault01" placeholder="DBP"  name="dbp" value="{{$PatientProcedure->blood_pressure_max_value}}">
        </div>

        <div class="col-md-2 col-md-offset-6 mb-3"> 
          <label for="bloodpressure">Date</label>
          <input type="text" class="form-control" id="singledate" name="date" placeholder="Date" value="{{$PatientProcedure->add_date}}" autocomplete="off" required="" readonly>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-2 mb-3">
          <label for="heartrate">Pulse/Heart Rate</label>
          <input type="text" class="form-control" id="validationDefault01" placeholder="per min"   name="hr" value="{{$PatientProcedure->breathing_rate}}">
        </div>

        <div class="col-md-2 mb-3">
          <label for="respiratoryrate">Respiratory Rate</label>
          <input type="text" class="form-control" id="validationDefault01" placeholder="per minute" name="rr" value="{{$PatientProcedure->pluse}}">
        </div>

        <div class="col-md-2 mb-3">
          <label for="saturationoxygen">Saturation Oxygen(%)</label>
          <input type="text" class="form-control" id="validationDefault01" placeholder="%"   name="sp2" value="{{$PatientProcedure->oxygen_saturation}}">
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-2 mb-3">
          <label for="bloodsugar">Blood Sugar</label>
          <input type="text" class="form-control" id="validationDefault01" placeholder="mg/dl" name="fbs" value="{{$PatientProcedure->blood_sugar}}">
        </div>
        <div class="col-md-2 mb-3">
          <label for="temperature">Temperature</label>
          <input type="text" class="form-control" id="validationDefault01" placeholder="*f"   name="temp" value="{{$PatientProcedure->temperature}}">
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-2 mb-3">
          <label for="weight">Weight</label>
          <input type="text" class="form-control" id="weight" placeholder="kg"  name="weight" value="{{$PatientProcedure->weight}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
        </div>

        <div class="col-md-2 mb-3">
          <label for="height">Height</label>
          <input type="text" class="form-control" id="height" placeholder="Height(m)" name="height" value="{{$PatientProcedure->height}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
        </div>

        <div class="col-md-2 mb-3">
          <label for="bodymassindex">Body Mass Index</label>
          <input type="text" class="form-control" id="bmi" placeholder="BMI"  name="bmi" value="{{$PatientProcedure->bmi}}" readonly="">
        </div>
        <div class="col-md-2 mb-3">
          <label for="abdominalcircumference">Abdominal Circumference</label>
          <input type="text" class="form-control" id="validationDefault01" placeholder="cm"  name="ac" value="{{$PatientProcedure->abdominal_circumference}}">
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-4">
          <!-- <button type="reset" class="btn btn-primary btn-info" value="Reset">RESET</button> -->
          <button type="submit" class="btn btn-primary btn-info" value="submit">UPDATE</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">PATIENTS VITAL LIST</h4>                
                <div class="table-responsive">
                    <table id="editvitals" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="display: none;">ID</th>    
                                <th>Date</th>
                                <th>RBS</th>
                                <th>SBP</th>
                                <th>DBP</th>
                                <th>HR</th>
                                <th>RR</th>
                                <th>SpO2</th>
                                <th>AC</th>
                                <th>TEMP</th>
                                <th>WT</th>
                                <th>HT</th>
                                <th>BMI</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>  
                           @foreach($vitals_detail as $vitals)
                           <tr>
                            <td style="display: none;">{{isset($vitals['uniqueid'])?$vitals['uniqueid']:'-'}}</td>
                            <td>{{isset($vitals['add_date'])?date("d/m/Y",$vitals['add_date']):'-'}}</td>
                            <td>{{isset($vitals['blood_sugar'])?$vitals['blood_sugar']:'-'}}</td>
                            <td>{{isset($vitals['blood_pressure_min_value'])?$vitals['blood_pressure_min_value']:'-'}} </td>
                            <td>{{isset($vitals['blood_pressure_max_value'])?$vitals['blood_pressure_max_value']:'-'}} </td>
                            <td>{{isset($vitals['breathing_rate'])?$vitals['breathing_rate']:'-'}}</td>
                            <td>{{isset($vitals['pluse'])?$vitals['pluse']:'-'}}</td>
                            <td>{{isset($vitals['oxygen_saturation'])?$vitals['oxygen_saturation']:'-'}}</td>
                            <td>{{isset($vitals['abdominal_circumference'])?$vitals['abdominal_circumference']:'-'}}</td>
                            <td>{{isset($vitals['temperature'])?$vitals['temperature']:'-'}}</td>
                            <td>{{isset($vitals['weight'])?$vitals['weight']:'-'}}</td>
                            <td>{{isset($vitals['height'])?$vitals['height']:'-'}}</td>
                            <td>{{isset($vitals['bmi'])?$vitals['bmi']:'-'}}</td>
                            <td>
                                <?php $delete_url = route("admin_main.vitalsdelete", ["patient_id" =>$patient_id, "id" => $vitals['uniqueid']]);?>
                                <a href="{{route('admin_main.vitalsedit',["patient_id" =>$patient_id, "id" => $vitals['uniqueid']])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a style="color:red" onclick="return confirm(`<?php echo $delete_url  ?>`,`Are you sure you want to delete this Vital ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>
                            </td>
                            @php
                            /*
                            <td style="display: none;">{{isset($vitals->uniqueid)?$vitals->uniqueid:'-'}}</td>
                            <td>{{isset($vitals->add_date)?$vitals->add_date:'-'}}</td>
                            <td>{{isset($vitals->blood_sugar)?$vitals->blood_sugar:'-'}}</td>
                            <td>{{$vitals->blood_pressure_min_value}} </td>
                            <td>{{$vitals->blood_pressure_max_value}} </td>
                            <td>{{isset($vitals->breathing_rate)?$vitals->breathing_rate:'-'}}</td>
                            <td>{{isset($vitals->pluse)?$vitals->pluse:'-'}}</td>
                            <td>{{isset($vitals->oxygen_saturation)?$vitals->oxygen_saturation:'-'}}</td>
                            <td>{{isset($vitals->abdominal_circumference)?$vitals->abdominal_circumference:'-'}}</td>
                            <td>{{isset($vitals->temperature)?$vitals->temperature:'-'}}</td>
                            <td>{{isset($vitals->weight)?$vitals->weight:'-'}}</td>
                            <td>{{isset($vitals->height)?$vitals->height:'-'}}</td>
                            <td>{{isset($vitals->bmi)?$vitals->bmi:'-'}}</td>
                            <td>
                                <?php $delete_url = route("admin_main.vitalsdelete", ["patient_id" =>$patient_id, "id" => $vitals->uniqueid]);?>
                                <a href="{{route('admin_main.vitalsedit',["patient_id" =>$patient_id, "id" => $vitals->uniqueid])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a style="color:red" onclick="return confirm(`<?php echo $delete_url  ?>`,`Are you sure you want to delete this Vital ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>
                            </td>
                            */
                            @endphp
                        </tr>
                        @endforeach   
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
</div>
<script>
      $(function () {
                $('#editvitals').DataTable({
                     "order": []
                });
            });
</script>
@endsection