    @extends('layouts.admin_main')
@section('content')
@if(isset($PatientDetail))
@if(session('role')==2)
<ul class="nav nav-tabs">
 <li><a href="{{ route('store_patient.edit', $PatientDetail->uniqueid) }}"><b>Details</b></a></li>
 <li><a href="{{ route('admin_main.hopiindex', $PatientDetail->uniqueid) }}"><b>HOPI</b></a></li>
 <li><a href="{{ route('admin_main.exindex', $PatientDetail->uniqueid) }}"><b>Examination</b></a></li>
 {{-- <li><a href="{{ route('admin_main.geindex', $PatientDetail->uniqueid) }}">General Examination</a></li>
 <li><a href="{{ route('admin_main.seindex', $PatientDetail->uniqueid) }}">Systemic Examination</a></li>
 <li><a href="{{ route('admin_main.ppindex', $PatientDetail->uniqueid) }}">Prescription</a></li>
 <li><a href="{{ route('admin_main.atindex', $PatientDetail->uniqueid) }}">Advice Treatment</a></li> --}}
 <li><a href="{{ route('admin_main.clinical_managementindex',  $PatientDetail->uniqueid) }}"><b>CLINICAL MANAGEMENT</b></a></li>
 <li  class="active"><a href="{{ route('store_patient.pasthealthrecords', $PatientDetail->uniqueid) }}"><b>Past Health Records</b></a></li>
 <li><a href="{{ route('admin_main.indexvitalslabtest', $PatientDetail->uniqueid) }}"><b>Vitals Labtest</b></a></li>
</ul>
@else
<ul class="nav nav-tabs">
 <li><a href="{{ route('store_patient.edit', $PatientDetail->uniqueid) }}"><b>Details</b></a></li>
 {{--
 <li><a href="{{ route('admin_main.hopiindex', $PatientDetail->uniqueid) }}"><b>HOPI</b></a></li>
 <li><a href="{{ route('admin_main.exindex', $PatientDetail->uniqueid) }}"><b>Examination</b></a></li>
 --}}
 {{-- <li><a href="{{ route('admin_main.geindex', $PatientDetail->uniqueid) }}">General Examination</a></li>
 <li><a href="{{ route('admin_main.seindex', $PatientDetail->uniqueid) }}">Systemic Examination</a></li>
 <li><a href="{{ route('admin_main.ppindex', $PatientDetail->uniqueid) }}">Prescription</a></li>
 <li><a href="{{ route('admin_main.atindex', $PatientDetail->uniqueid) }}">Advice Treatment</a></li> --}}
 {{--
 <li><a href="{{ route('admin_main.clinical_managementindex',  $PatientDetail->uniqueid) }}"><b>CLINICAL MANAGEMENT</b></a></li>
 --}}
 <li  class="active"><a href="{{ route('store_patient.pasthealthrecords', $PatientDetail->uniqueid) }}"><b>Past Health Records</b></a></li>
 
</ul>
@endif
<!-- <section class="content-header"> -->
  <!-- <div class="card">
      <h4 class="card-title">Edit Patient</h4>
  </div> -->
  <!-- <h4 class="card-title">Edit Patient</h4> -->
  <!-- <h3 style="margin-left: 22px;">Edit Patient</h3> -->
<!-- </section> -->
@else
<!-- <section class="content-header"> -->
<!--   <div class="card">
      <h4 class="card-title">Add Patient</h4>
  </div> -->
  <!-- <h4 class="card-title">Add Patient</h4> -->
  <!-- <h3 style="margin-left: 22px;">Add Patient</h3> -->
<!-- </section> -->
@endif

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
      <h4 class="card-title">Past Medical Records</h4>
      <form action="{{ route('store_patient.pasthealthrecords',$PatientDetail->uniqueid) }}" method="GET">
    @php
    if(isset($_GET['graph_select'])){
    $graph_select=$_GET['graph_select'];
    }else{
        $graph_select='';
    }
    if(isset($_GET['StartDate'])){
        $startdate=$_GET['StartDate'];
    }else{
         $startdate='';
    }
    @endphp
      <div class="row" style="margin-bottom:2em;">
        <div class="col-md-6 md-6">
            <select class="form-control" id="graph_select" name="graph_select">
              <option class="form-control" value="" 
              @if($graph_select=='')
              selected
              @endif
              >Select Field</option>
              <option class="form-control" value="10"
              @if($graph_select==10)
              selected
              @endif
              >Blood Pressure SBP</option>
              <option class="form-control" value="1"
              @if($graph_select==1)
              selected
              @endif
              >Blood Pressure DBP</option>
              <option class="form-control" value="2"
              @if($graph_select==2)
              selected
              @endif
              >Pulse</option>
              <option class="form-control" value="3"
              @if($graph_select==3)
              selected
              @endif
              >Temperature</option>
              <option class="form-control" value="4"
                @if($graph_select==4)
                selected
                @endif
              >Oxygen Saturation</option>
              <option class="form-control" value="5"
               @if($graph_select==5)
              selected
              @endif
              >Breathing/Respiratory Rate</option>
              <option class="form-control" value="6"
               @if($graph_select==6)
              selected
              @endif
              >Abdominal Circumference</option>
              <option class="form-control" value="7"
               @if($graph_select==7)
              selected
              @endif
              >Blood Sugar</option>
              <option class="form-control" value="8"
               @if($graph_select==8)
              selected
              @endif
              >Weight</option>
              <option class="form-control" value="9"
               @if($graph_select==9)
              selected
              @endif
              >BMI</option>
            </select>
        </div>
        <div class="col-md-3 md-3">
            <input type="text" name="StartDate" value="{{$startdate}}" class="form-control singleDMYEdate" id="StartDate" placeholder="Enter End Date" autocomplete="off" required>
        </div>
         <button type="submit" class="btn btn-primary btn-info">Submit</button>
        </form>
      </div>
      <div class="row">
        <div class="col-md-10 mb-3">
           
          <div id="chartContainer" class="col-md-12 chartContainer" style="height: 300px; width: 100%;"></div>
          
          <div class="col-md-5">
          <h4 class="card-title">Lab Tests</h4>
          <div class="table-responsive">
            <table id="example25" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" >
              <thead>
                <th>Date</th>
                <th>Lab Test</th>
                <th>Value</th>
              </thead>
              <tbody>
                @foreach ($PatientLab as $lab)
                <tr>
                  <td>{{date("d-m-Y",strtotime($lab['test_date']))}}</td>
                  <td>{{$lab['test_name']}}</td>
                  <td>{{$lab['value']}}</td>
                  @php
                  /*
                  <td>{{$lab->test_date}}</td>
                  <td>{{$lab->test_name}}</td>
                  <td>{{$lab->value}}</td>
                  */
                  @endphp
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-6">
          <h4 class="card-title">Procedure</h4>
          <div class="table-responsive">
            <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0">
              <thead>
                <th>Date</th>
                <th>Name</th>
                <th>Remarks</th>
              </thead>
              <tbody>
                @foreach ($PatientProcedure as $pprocedure)
                <tr>
                    <td>{{date("d-m-Y",$pprocedure['procedure_date'])}}</td>
                  <td>{{$pprocedure['procedure_name']}}</td>
                  <td>{{$pprocedure['remark']}}</td>
                    @php
                    /*
                  <td>{{$pprocedure->procedure_date}}</td>
                  <td>{{$pprocedure->procedure_name}}</td>
                  <td>{{$pprocedure->remark}}</td>
                  */
                  @endphp
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        </div>
        <div class="col-md-2 mb-3">
            
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
          <p>{{ isset($PatientDetail->contact_number)?$PatientDetail->contact_number:'-' }}</p>
          <p>{{ isset($PatientDetail->email)?$PatientDetail->email:'-' }}</p>
          <hr class="m-2">
          <p>Allergies:{{ isset($PatientDetail->allergies)?$PatientDetail->allergies:'N/A' }}</p>
        </div>
      </div>
    <h4 class="card-title">Clinical History</h4>
    {{-- <h5 class="card-title">Diagnosis | Treating Doctor | Prescription</h5> --}}
    <div class="row">
      <div class="col-md-10">
        <div class="table-responsive">
          <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <th>Date</th>
              <th>Diagnosis</th>
              <th>Treating Doctor</th>
              <th>Drug</th>
              <th>Dose(mg)</th>
              <th>Route</th>
              <th>Freq.</th>
              <th>Duration</th>
            </thead>
            <tbody>
              @foreach ($PatientPriscription as $pp)
              <tr>
                <td>{{date("d-m-Y", strtotime($pp->created_at))}}</td>
                <td>{{$pp->diagnosis}}</td>
                <td>{{$pp->Dfname}}</td>
                <td>{{$pp->medicine_name}}</td>
                <td>{{$pp->dose}}</td>
                <td>{{$pp->route}}</td>
                <td>{{$pp->freq}}</td>
                <td>{{$pp->duration}}</td>
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
    <h4 class="card-title">Panelist History</h4>
    <div class="row">
      <div class="col-md-10">
        <div class="table-responsive">
          <table id="example27" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <th>Panelist Name</th>
              <th>Question</th>
              <th>Answer</th>
            </thead>
            <tbody>
              @foreach ($PatientPanelists as $pp)
              <tr>
                <td>{{$pp->panelistname}}</td>
                <td>{{$pp->question}}</td>
                <td>{{$pp->answer}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <h4 class="card-title">POC History</h4>
    <div class="row">
      <div class="col-md-10">
        <div class="table-responsive">
          <table id="example29" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <th>POC Name</th>
              <th>Question</th>
              <th>Answer</th>
            </thead>
            <tbody>
              @foreach ($PatientPoc as $pp)
              <tr>
                {{-- <td>{{$pp->panelistsnames}}</td> --}}
                <td>{{$pp->pocname}}</td>
                <!--<td>{{$pp->dranswer}}</td>-->
                <td>{{$pp->question}}</td>
                
                <td>{{$pp->answer}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <h4 class="card-title">General Examination History</h4>
        <div class="row">
            <div class="col-md-10">
                <table id="example28" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <th>Patient Name</th>
                      <th>Doctor Name</th>
                      <th>Examination Name</th>
                      <th>Notes</th>
                      <th>View Records</th>
                    </thead>
                    <tbody>
                      @foreach ($pge as $pp)
                      <?php $user=App\User::where('id',$pp->doctor_id)->first();
                      $username=isset($user)?$user->fname:''?>
                      <tr>
                        <td>{{$pp->patientname}}</td>
                        <td>{{$username}}</td>
                        <?php
                            $id=explode(',',$pp->examination_id);
                            $examination_name=App\GeneralExamination::whereIn('id',$id)->get();
                            $exe_name=[];
                            foreach($examination_name as $exe)
                            {
                                
                                $exe_name[]=$exe->examination_name;
                            }
                            $examd=implode(',',$exe_name);
                            unset($exe_name);
                        ?>
                        <td>{{$examd}}</td>
                        <td>{{$pp->notes}}</td>
                        <td><a href="{{route('admin_main.drforms',$pp->id)}}"><i class="fa fa-eye"></i></a></td>
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
      $('#example24').DataTable({
            "order": [],
            "searching": false,
            "pageLength": 5,

            "lengthChange": false // Will Disabled Record number per page

      });
      $('#example25').DataTable({
            "order": [],            
            "pageLength": 5,
            "searching": false,
            "lengthChange": false // Will Disabled Record number per page

      });
      $('#example27').DataTable({
            "order": [],            
            "searching": false,
            "lengthChange": false // Will Disabled Record number per page

      });
      $('#example28').DataTable({
            "order": [],            
            "searching": false,
            "lengthChange": false // Will Disabled Record number per page

      }); 
      $('#example29').DataTable({
            "order": [],            
            "searching": false,
            "lengthChange": false // Will Disabled Record number per page

      });
    });
</script>

@php
  if(isset($_GET['graph_select'])){
    $graph_select=$_GET['graph_select'];
  }else{
    $graph_select=5;
  }
  if($graph_select=="" || $graph_select==5){
      $title="Heart Rate V";
      $filed="breathing_rate";
  }elseif($graph_select==1){
      $title="Blood Pressure DBP";
      $filed="blood_pressure_min_value";          
  }elseif($graph_select==2){
      $title="Pulse";
      $filed="pluse";
  }elseif($graph_select==3){
      $title="Temperature";
      $filed="temperature";
  }elseif($graph_select==4){
      $title="Oxygen Saturation";
      $filed="oxygen_saturation";
  }elseif($graph_select==6){
      $title="Abdominal Circumference";
      $filed="abdominal_circumference";
  }elseif($graph_select==7){
      $title="Blood Sugar";
      $filed="blood_sugar";
  }elseif($graph_select==8){
      $title="Weight";
      $filed="weight";
  }elseif($graph_select==10){
      $title="Blood Pressure SBP";
      $filed="blood_pressure_max_value";
  }else{
      $title="BMI";
      $filed="bmi";
  }
  
@endphp
@if (count($charts)!=0)
<script>
window.onload = function () {
var options = {
  animationEnabled: true,  
  title:{
    text: "{{$title}}"
  },
  axisX: {
    valueFormatString: "DD-MM-YY"
  },
  axisY: {
    title: "{{$title}}",
    prefix: "",
    includeZero: false
  },
  data: [{
    yValueFormatString: "###",
    xValueFormatString: "DD-MM-YY",
    type: "spline",
    dataPoints: [
@foreach ($charts as $data)
<?php
//$date=explode("/",$data->add_date);
  $date=explode("/",$data['add_date']);
$bug=$date[1]-1;
//{{"{ x: new Date(".$date[2].", ".$bug.", ".$date[0]."), y: ".$data->$filed."},"}}
?>
@if(!is_null($data[$filed]))
{{"{ x: new Date(".$date[2].", ".$bug.", ".$date[0]."), y: ".$data[$filed]."},"}}
@endif
@endforeach
    ]
  }]
};
$("#chartContainer").CanvasJSChart(options);
}
</script>
@else
<script>
  var points = [
       { y: 53.37, indexLabel: "Android" }, { y: 35.0, indexLabel: "Apple iOS" },
       { y: 7, indexLabel: "Blackberry" }, { y: 2, indexLabel: "Windows Phone" },
       { y: null}, { y: 5, indexLabel: "Others" }
       ];

var chart = new CanvasJS.Chart("chartContainer",
  {
      data: [
      {
       type: "column",
       
       dataPoints: null
       },
      ]
    });


//chart.options.data[0].dataPoints = points;

showDefaultText(chart, "No Data available");
chart.render();
 
function showDefaultText(chart, text){
    
   var isEmpty = !(chart.options.data[0].dataPoints && chart.options.data[0].dataPoints.length > 0);
  
   if(!chart.options.subtitles)
    (chart.options.subtitles = []);
   
   if(isEmpty)
    chart.options.subtitles.push({
     text : text,
     verticalAlign : 'center',
   });
   else
    (chart.options.subtitles = []);
 }
</script>
@endif
@php
/*
old code
<script>

window.onload = function () {
var options = {
  animationEnabled: true,  
  title:{
    text: "Heart Rate V"
  },
  axisX: {
    valueFormatString: "DD-MM-YY"
  },
  axisY: {
    title: "Heart Rate",
    prefix: "",
    includeZero: false
  },
  data: [{
    yValueFormatString: "###",
    xValueFormatString: "DD-MM-YY",
    type: "spline",
    dataPoints: [
@foreach ($charts as $data)
<?php
$date=explode("/",$data->add_date);
$bug=$date[1]-1;
?>
 {{"{ x: new Date(".$date[2].", ".$bug.", ".$date[0]."), y: ".$data->breathing_rate."},"}}
@endforeach
    ]
  }]
  
};

$("#chartContainer").CanvasJSChart(options);

}

</script>
<script type="text/javascript">

$('#graph_select').change(function(){
    var id  = $(this).val();
    //alert(id);
    if(id==1)
    {
        var options = {
          animationEnabled: true,  
          title:{
            text: "Heart Rate V"
          },
          axisX: {
            valueFormatString: "DD-MM-YY"
          },
          axisY: {
            title: "Heart Rate",
            prefix: "",
            includeZero: false
          },
          data: [{
            yValueFormatString: "###",
            xValueFormatString: "DD-MM-YY",
            type: "spline",
            dataPoints: [
        @foreach ($charts as $data)
        <?php
            $date=explode("/",$data->add_date);
            $bug=$date[1]-1;
        ?>
         {{"{ x: new Date(".$date[2].", ".$bug.", ".$date[0]."), y:$data->blood_pressure_max_value},"}}
        @endforeach
            ]
          }]
          
        };
        
        $("#chartContainer").CanvasJSChart(options);
    }
    
    if(id==2)
    {
        var options = {
          animationEnabled: true,  
          title:{
            text: "Heart Rate V"
          },
          axisX: {
            valueFormatString: "DD-MM-YY"
          },
          axisY: {
            title: "Heart Rate",
            prefix: "",
            includeZero: false
          },
          data: [{
            yValueFormatString: "###",
            xValueFormatString: "DD-MM-YY",
            type: "spline",
            dataPoints: [
        @foreach ($charts as $data)
        <?php
            $date=explode("/",$data->add_date);
            $bug=$date[1]-1;
        ?>
         {{"{ x: new Date(".$date[2].", ".$bug.", ".$date[0]."), y:$data->pluse},"}}
        @endforeach
            ]
          }]
          
        };
        
        $("#chartContainer").CanvasJSChart(options);
    }

    if(id==3)
    {
        var options = {
          animationEnabled: true,  
          title:{
            text: "Heart Rate V"
          },
          axisX: {
            valueFormatString: "DD-MM-YY"
          },
          axisY: {
            title: "Heart Rate",
            prefix: "",
            includeZero: false
          },
          data: [{
            yValueFormatString: "###",
            xValueFormatString: "DD-MM-YY",
            type: "spline",
            dataPoints: [
        @foreach ($charts as $data)
        <?php
            $date=explode("/",$data->add_date);
            $bug=$date[1]-1;
        ?>
         {{"{ x: new Date(".$date[2].", ".$bug.", ".$date[0]."), y:$data->temperature},"}}
        @endforeach
            ]
          }]
          
        };
        
        $("#chartContainer").CanvasJSChart(options);
    }

    if(id==4)
    {
        var options = {
          animationEnabled: true,  
          title:{
            text: "Heart Rate V"
          },
          axisX: {
            valueFormatString: "DD-MM-YY"
          },
          axisY: {
            title: "Heart Rate",
            prefix: "",
            includeZero: false
          },
          data: [{
            yValueFormatString: "###",
            xValueFormatString: "DD-MM-YY",
            type: "spline",
            dataPoints: [
        @foreach ($charts as $data)
        <?php
            $date=explode("/",$data->add_date);
            $bug=$date[1]-1;
        ?>
         {{"{ x: new Date(".$date[2].", ".$bug.", ".$date[0]."), y:$data->oxygen_saturation},"}}
        @endforeach
            ]
          }]
          
        };
        
        $("#chartContainer").CanvasJSChart(options);
    }

    if(id==5)
    {
        var options = {
          animationEnabled: true,  
          title:{
            text: "Heart Rate V"
          },
          axisX: {
            valueFormatString: "DD-MM-YY"
          },
          axisY: {
            title: "Heart Rate",
            prefix: "",
            includeZero: false
          },
          data: [{
            yValueFormatString: "###",
            xValueFormatString: "DD-MM-YY",
            type: "spline",
            dataPoints: [
        @foreach ($charts as $data)
        <?php
            $date=explode("/",$data->add_date);
            $bug=$date[1]-1;
        ?>
         {{"{ x: new Date(".$date[2].", ".$bug.", ".$date[0]."), y:$data->breathing_rate},"}}
        @endforeach
            ]
          }]
          
        };
        
        $("#chartContainer").CanvasJSChart(options);
    }

    if(id==6)
    {
        var options = {
          animationEnabled: true,  
          title:{
            text: "Heart Rate V"
          },
          axisX: {
            valueFormatString: "DD-MM-YY"
          },
          axisY: {
            title: "Heart Rate",
            prefix: "",
            includeZero: false
          },
          data: [{
            yValueFormatString: "###",
            xValueFormatString: "DD-MM-YY",
            type: "spline",
            dataPoints: [
        @foreach ($charts as $data)
        <?php
            $date=explode("/",$data->add_date);
            $bug=$date[1]-1;
        ?>
         {{"{ x: new Date(".$date[2].", ".$bug.", ".$date[0]."), y:$data->abdominal_circumference},"}}
        @endforeach
            ]
          }]
          
        };
        
        $("#chartContainer").CanvasJSChart(options);
    }

    if(id==7)
    {
        var options = {
          animationEnabled: true,  
          title:{
            text: "Heart Rate V"
          },
          axisX: {
            valueFormatString: "DD-MM-YY"
          },
          axisY: {
            title: "Heart Rate",
            prefix: "",
            includeZero: false
          },
          data: [{
            yValueFormatString: "###",
            xValueFormatString: "DD-MM-YY",
            type: "spline",
            dataPoints: [
        @foreach ($charts as $data)
        <?php
            $date=explode("/",$data->add_date);
            $bug=$date[1]-1;
        ?>
         {{"{ x: new Date(".$date[2].", ".$bug.", ".$date[0]."), y:$data->blood_sugar},"}}
        @endforeach
            ]
          }]
          
        };
        
        $("#chartContainer").CanvasJSChart(options);
    }

    if(id==8)
    {
        var options = {
          animationEnabled: true,  
          title:{
            text: "Heart Rate V"
          },
          axisX: {
            valueFormatString: "DD-MM-YY"
          },
          axisY: {
            title: "Heart Rate",
            prefix: "",
            includeZero: false
          },
          data: [{
            yValueFormatString: "###",
            xValueFormatString: "DD-MM-YY",
            type: "spline",
            dataPoints: [
        @foreach ($charts as $data)
        <?php
            $date=explode("/",$data->add_date);
            $bug=$date[1]-1;
        ?>
         {{"{ x: new Date(".$date[2].", ".$bug.", ".$date[0]."), y:$data->weight},"}}
        @endforeach
            ]
          }]
          
        };
        
        $("#chartContainer").CanvasJSChart(options);
    }

    else
    {
        var options = {
          animationEnabled: true,  
          title:{
            text: "Heart Rate V"
          },
          axisX: {
            valueFormatString: "DD-MM-YY"
          },
          axisY: {
            title: "Heart Rate",
            prefix: "",
            includeZero: false
          },
          data: [{
            yValueFormatString: "###",
            xValueFormatString: "DD-MM-YY",
            type: "spline",
            dataPoints: [
        @foreach ($charts as $data)
        <?php
        //$d=date("d", strtotime($data->add_date));
        //$m=date("m", strtotime($data->add_date));
        //$y=date("Y", strtotime($data->add_date));
        $date=explode("/",$data->add_date);
        $bug=$date[1]-1;
        ?>
         {{"{ x: new Date(".$date[2].", ".$bug.", ".$date[0]."), y: ".$data->breathing_rate."},"}}
        @endforeach
            ]
          }]
          
        };
        
        $("#chartContainer").CanvasJSChart(options);

    }


});
</script>

*/
@endphp
@endsection