@extends('layouts.admin_main')
@section('content')

@if(session('role')==8)
<ul class="nav nav-tabs">
    <li><a href="{{ route('admin_main.panel.edit', $patient_id) }}">Details</a></li>
    <li class="active"><a href="{{ route('admin_main.hopiindex', $patient_id) }}">HOPI</a></li>
    <li><a href="{{ route('admin_main.exindex', $patient_id) }}">Examination</a></li>
    {{--<li><a href="{{ route('admin_main.geindex', $patient_id) }}">General Examination</a></li>
    <li><a href="{{ route('admin_main.seindex', $patient_id) }}">Systemic Examination</a></li>
    <li ><a href="{{ route('admin_main.ppindex', $patient_id) }}">Prescription</a></li>
    <li ><a href="{{ route('admin_main.atindex', $patient_id) }}">Advice Treatment</a></li> --}}
    <li><a href="{{ route('admin_main.clinical_managementindex', $patient_id) }}">CLINICAL MANAGEMENT</a></li>
    <li><a href="{{ route('store_patient.pasthealthrecords', $patient_id) }}">Past Health Records</a></li>
</ul>
@else
<ul class="nav nav-tabs">
    <li><a href="{{ route('store_patient.edit', $patient_id) }}">Details</a></li>
    <li><a href="{{ route('admin_main.hopiindex', $patient_id) }}">HOPI</a></li>
    <li><a href="{{ route('admin_main.exindex', $patient_id) }}">Examination</a></li>
    {{--<li><a href="{{ route('admin_main.geindex', $patient_id) }}">General Examination</a></li>
    <li><a href="{{ route('admin_main.seindex', $patient_id) }}">Systemic Examination</a></li>
    <li ><a href="{{ route('admin_main.ppindex', $patient_id) }}">Prescription</a></li>
    <li class="active"><a href="{{ route('admin_main.atindex', $patient_id) }}">Advice Treatment</a></li> --}}
    <li><a href="{{ route('admin_main.clinical_managementindex', $patient_id) }}">CLINICAL MANAGEMENT</a></li>
    <li><a href="{{ route('store_patient.pasthealthrecords', $patient_id) }}">Past Health Records</a></li>
    <li class="active"><a href="{{ route('admin_main.indexvitalslabtest', $patient_id) }}">Vitals Labtest</a></li>
</ul>
@endif<!-- <section class="content-header"> -->
<!--   <div class="card">
      <h4 class="card-title">Add Patient</h4>
  </div> -->
  <!-- <h4 class="card-title">Add Patient</h4> -->
  <!-- <h3 style="margin-left: 22px;">Add Patient</h3> -->
<!-- </section> -->

<div class=" card col-md-12">
  <!-- <div class="container"> -->
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
      
      <div class="row">
          <div class="col-md-10 mb-3">
            <h4 class="card-title">Vitals Data</h4>                
                <div class="table-responsive">
              <table id="vitals" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="display: none;">ID</th>    
                                    <th>Date</th>
                                    <th>RBS</th>
                                    <th>SBP</th>
                                    <th>DBP</th>
                                    <th>HR</th>
                                    <th>RR</th>{{-- Respiratory Rate --}}
                                    <th>SpO2</th>{{-- Oxygen Saturation --}}
                                    <th>AC</th>
                                    <th>TEMP</th>
                                    <th>WT</th>
                                    <th>HT</th>
                                    <th>BMI</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($vitals_detail as $vitals)
                               <tr>
                                <td style="display: none;">{{isset($vitals['uniqueid'])?$vitals['uniqueid']:'-'}}</td>
                                <td>{{isset($vitals['add_date'])?date("d-m-Y",$vitals['add_date']):'-'}}</td>
                                <td>{{isset($vitals['blood_sugar'])?$vitals['blood_sugar']:'-'}}</td>
                                <td>{{$vitals['blood_pressure_min_value']}} </td>
                                <td>{{$vitals['blood_pressure_max_value']}} </td>
                                <td>{{isset($vitals['breathing_rate'])?$vitals['breathing_rate']:'-'}}</td>
                                <td>{{isset($vitals['pluse'])?$vitals['pluse']:'-'}}</td>
                                <td>{{isset($vitals['oxygen_saturation'])?$vitals['oxygen_saturation']:'-'}}</td>
                                <td>{{isset($vitals['abdominal_circumference'])?$vitals['abdominal_circumference']:'-'}}</td>
                                <td>{{isset($vitals['temperature'])?$vitals['temperature']:'-'}}</td>
                                <td>{{isset($vitals['weight'])?$vitals['weight']:'-'}}</td>
                                <td>{{isset($vitals['height'])?$vitals['height']:'-'}}</td>
                                <td>{{isset($vitals['bmi'])?$vitals['bmi']:'-'}}</td>
                                @php
                                /*
                                <td style="display: none;">{{isset($vitals->uniqueid)?$vitals->uniqueid:'-'}}</td>
                                {{--
                                     $datey=explode("/",$vitals->add_date);
                                     $datey=implode("-",$datey);
                                --}}
                                {{-- <td>{{isset($vitals->add_date)?$datey:'-'}}</td> --}}
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
                                */
                                @endphp
                            </tr>
                            @endforeach   
                        </tbody>
                    </table>
                  </div>
          </div>
          <div class="col-md-2 mb-3 mt-2">
            
            <?php if($PatientDetail->profile_pic != null){?>
            <img class="img-rounded" src="{{ env('APP_URL') .'/storage/app/'.@$PatientDetail->profile_pic }}"  style="width: 140px;height: 150px;">  
            <?php }else{?>
            <img class="img-rounded" src="{{ env('APP_URL') .'/storage/app/default_pic/default.png'}}"  style="width: 140px;height: 150px;">
            <?php }?>
          
          <h4 class="card-title"><b>{{@$PatientDetail->fname}} {{@$PatientDetail->lname}}</b></h4>
          <p>{{@$PatientDetail->gender}}</p>
          <p>{{@$PatientDetail->age}} yrs. ({{@$PatientDetail->dob}})</p>
          <p>Ht:{{isset($PatientDetail->height)?$PatientDetail->height:'-'}}</p>
          <p>Wt:{{isset($PatientDetail->height)?$PatientDetail->weight:'-'}}</p>
          <p>BMI:{{isset($PatientDetail->bmi)?$PatientDetail->bmi:'-'}}</p>
          <hr class="m-2">
          @php 
          //dd($PatientDetail);
          @endphp
          <p>{{ isset($PatientDetail->contact_number)?$PatientDetail->contact_number:'-' }}</p>
          <p>{{ isset($PatientDetail->email)?$PatientDetail->email:'-' }}</p>
          <hr class="m-2">
          <p>Allergies:{{ isset($PatientDetail->allergies)?$PatientDetail->allergies:'N/A' }}</p>
        </div>
      </div>
      <div class="row">
          <div class="col-md-10 mb-3">
            <h4 class="card-title">Procedure Data</h4>                
                <div class="table-responsive">
              <table id="procedure" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="display: none;">id</th>
                                <th>Date</th>
                                <th>Procedure Name</th>
                                <th>Remark</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @php
                               // dd($patient_detail);
                            @endphp
                         @foreach($Procedure_detail as $patient_detail)
                         <tr>
                            <td style="display: none;">{{$patient_detail['uniqueid']}}</td>
                            <td>{{date("d-m-Y", $patient_detail['procedure_date'])}}</td>
                            <td>{{$patient_detail['procedure_name']}}</td>
                            <td>{{$patient_detail['remark']}}</td>
                            @php
                            /*
                            <td style="display: none;">{{$patient_detail->uniqueid}}</td>
                            <td>{{date("d-m-Y", strtotime($patient_detail->procedure_date))}}</td>
                            <td>{{$patient_detail->procedure_name}}</td>
                            <td>{{$patient_detail->remark}}</td>
                            */
                            @endphp
                        </tr>
                        @endforeach   
                    </tbody>
                </table>
              </div>
          </div>
                <div class="col-2">
                <h5><b>Health History</b></h5>
                <b>Family History:</b>
                
                <p>N/A</p>
                <b>Past History:</b>
                <p>{{ isset($history['problem'])?$history['problem']:'N/A' }}</p>
                <b>Personal History:</b>
                <p>Smoking: {{ isset($history['smoking'])?$history['smoking']."Per Day":'N/A' }}</p>
                <p>Alcohol Drinkings: {{ isset($history['alcohol_drinking'])?$history['alcohol_drinking']."Per Week":'N/A' }} </p>
                </div>
      </div>
      <div class="row">
          <div class="col-md-10 mb-3">
            <h4 class="card-title">Labtest Data</h4>                
                <div class="table-responsive">
             <table id="labtest" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="display: none;">id</th>
                                <th>Date</th>
                                <th>Lab Test Name</th>
                                <th>Value</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($lab_detail as $lab_detail)
                            <tr>
                                <td style="display: none;">{{$lab_detail['uniqueid']}}</td>
                                <td>{{date("d-m-Y",strtotime($lab_detail['test_date']))}}</td>
                                <td>{{$lab_detail['test_name']}}</td>
                                <td>{{$lab_detail['value']}}</td>
                                @php
                                /*
                                <td style="display: none;">{{$lab_detail->uniqueid}}</td>
                                {{-- <td>{{date("d-m-Y", strtotime($lab_detail->test_date))}}</td> --}}
                                <td>{{$lab_detail->test_date}}</td>
                                <td>{{$lab_detail->test_name}}</td>
                                <td>{{$lab_detail->value}}</td>
                                */
                                @endphp
                            </tr>
                            @endforeach  
                        </tbody>
                    </table>
                  </div>
          </div>
      </div>
      
  
<script type="text/javascript">
  $('.specialitygetbypoc').change(function(){
            var id  = $(this).val();
            var city_id = $('#city_id').val();
            // alert(city_id);
            $.ajax({
                url:"http://localhost/sansoriamlive/doctor/bySpeciality/"+id+"/"+city_id,
                method:"get",
                success:function(e){
                    var html = '<option value="" required>Select Doctor</option>';
                    for(var i = 0; i < e.length; i++){
                        html += "<option  value='"+e[i].id+"'>"+e[i].name+"</option>";
                    }
                    $("#doctors").html(html);
                }
            });
    });
  //charts
  //
</script>

<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script>
    $(function () {
      $('#procedure').DataTable({
            "order": [],
            "searching": false,
            "lengthChange": false // Will Disabled Record number per page

      });
      $('#labtest').DataTable({
            "order": [],            
            "searching": false,
            "lengthChange": false // Will Disabled Record number per page

      });
      $('#vitals').DataTable({
            "order": [],            
            "searching": false,
            "lengthChange": false // Will Disabled Record number per page

      });
    });
</script>

@endsection