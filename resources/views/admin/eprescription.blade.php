<!DOCTYPE html>
<html>
<head>
	<title>{{ ucfirst($pt->fname) }}</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
    h1,h3{color: #3c8dbc;}
    .logo{
    	position: absolute;
    }
     html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: arial;
            padding-bottom: 100px;
            width: 100%;
            padding-top: 150px;
            padding-left: 150px;
            
        }
      .footer {
            position: fixed; 
            bottom: 0;
            width: 100%;
            text-align: center;
        }
</style>
<body style="position: relative;">

<div class='col-sm-12'>
 <!--   <center style="margin-bottom: 20px;">	-->
	<!--<h2>Appointment Details</h2>-->
	<!--</center>-->
<div class="tab-content">
	{{-- <div class="logo">
		<div style="float: left;">
		<img style="width: 100px;height:100px;" src="{{ env('APP_URL') }}public/bootstrap_startup/images/app_logo_new.png">	
		</div>
	</div>
	<div class="header-title">
		<div class="text-center">
		<h1>Sensoriom</h1>
		</div>
	</div>
	<center>	
	<h2>Appointment Details</h2>
	</center>
	<center>
	<h2>Prescription</h2>
	</center>
	--}}
	
<style>
#table td, #table th {
  border: 1px solid #ddd;
  padding: 8px;
}	
</style>
<table width="100%;">
	<tr>
		<td><b style="font-size: 16px;">{{$pt->fname}}</b></td>
		<td><b style="font-size: 16px;">{{$pt->age}} Y/{{$ptd->gender}}</b></td>
		<td><b style="font-size: 16px;">Date :- <?php echo date("d-m-Y"); ?></b></td>
	</tr>
</table>
<div style="width:100%;margin-top: 20px;">
	<table class="table table-striped" id="table">
		<thead>
			<tr>
			<th>Complaints</th>
			<th>Comorbidities</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					@php
					$complain=App\PatientHopi::select('hopi_patient.*','hopi_patient_complain.*')
					->join('hopi_patient_complain', 'hopi_patient.id', '=', 'hopi_patient_complain.hopi_patient_id')
					->where('hopi_patient.patient_id',$patient_id)
					->get();
					//dd($complain);
					// $complain=DB::table('hopi_patient_complain')
					// ->join('users', 'hopi_patient.doctor_id', '=', 'users.id')
					// ->where('hopi_patient_id',$patient_id)
					// ->get();
					foreach ($complain as $value) {
					echo $value->complain_name.' since '.$value->complain_since.' '.$value->complain_days.'<br>';
					}
					@endphp
				</td>
				<td>
					@php
					// $comorbidities=DB::table('hopi_patient_comorbidities')
					// ->where('hopi_patient_id',$patient_id)
					// ->get();
					$comorbidities=App\PatientHopi::select('hopi_patient.*','hopi_patient_comorbidities.*')
					->join('hopi_patient_comorbidities', 'hopi_patient.id', '=', 'hopi_patient_comorbidities.hopi_patient_id')
					->where('hopi_patient.patient_id',$patient_id)
					->get();
					foreach ($comorbidities as $value) {
					echo $value->comorbidities_name.' since '.$value->comorbidities_since.' '.$value->comorbidities_days.'<br>';
					}
					@endphp
				</td>
			</tr>
		</tbody>
	</table>
</div>
<br>
@php
$vitals=DB::table('patient_health_records')
->where('patient_id',$patient_id)
->orderby('created_at','DESC')
->first();
//dd($vitals);
@endphp
@if ($vitals)
	{{-- expr --}}
<div style="width:100%">
	<p><b>Vitals</b></p>
	<table class="table table-striped" id="table">
		<tr>
			@if ($vitals->blood_pressure_max_value != '')
			<td>
				BP : {{$vitals->blood_pressure_max_value}} - {{$vitals->blood_pressure_min_value}} mm Hg
			</td>
			@else
			<td>
				BP : -	
			</td>
			@endif
			@if ($vitals->blood_sugar != '')
			<td>
				RBS : {{$vitals->blood_sugar}} mg%
			</td>
			@else
			<td>
				RBS : - -<br>
			</td>
			@endif
		</tr>
		<tr>
			@if ($vitals->breathing_rate != '')
			<td>
				HR : {{$vitals->breathing_rate}} bpm
			</td>
			@else
			<td>
				HR : -<br>
			</td>
			@endif

			@if ($vitals->temperature != '')
			<td>
				TEMP : {{$vitals->temperature}}
			</td>
			@else
			<td>
				TEMP : -
			</td>
			@endif
		</tr>
		<tr>
			@if ($vitals->oxygen_saturation != '')
			<td>
				SpO2 : {{$vitals->oxygen_saturation}} %
			</td>
			@else
			<td>
				SpO2 : -
			</td>
			@endif

			@if ($vitals->pluse != '')
			<td>
				RR : {{$vitals->pluse}} pm
			</td>
			@else
			<td>
				RR : -
			</td>
			@endif
		</tr>

		<tr>
			@if ($vitals->height != '')
			<td>
				HT : {{$vitals->height}} bpm
			</td>
			@else
			<td>
				HT : -<br>
			</td>
			@endif

			@if ($vitals->weight != '')
			<td>
				WT : {{$vitals->weight}} kg
			</td>
			@else
			<td>
				WT : -
			</td>
			@endif
		</tr>
	</table>
</div>
@endif
@php
$examination=App\PatientGeneralExamination::
select('patient_general_examination.id as uniqueid','d.fname as doctorname','patient_general_examination.*',\DB::raw("GROUP_CONCAT(general_examination.examination_name) as examinationName"))
->join("general_examination",\DB::raw("FIND_IN_SET(general_examination.id,patient_general_examination.examination_id)"),">",\DB::raw("'0'"))
->leftjoin('users as d', 'patient_general_examination.doctor_id', '=', 'd.id')
->where('patient_general_examination.patient_id','=',$patient_id)
->groupBy("patient_general_examination.id")
->get();
$systemexamination=DB::table('system examination')->where('patient_id',$patient_id)->get();
@endphp
@if ($examination)
<div class="row">
  <div class="col-md-12">
		<label for="">Examination Notes</label>
		<p>
		@foreach ($examination as $element)
			@if ($element->examinationName != '')
			{{$element->examinationName}},
			@endif
		@endforeach
		</p>
		<p>
		@foreach ($examination as $element)
			@if ($element->notes != '')
				{{$element->notes}}<br>
			@endif
		@endforeach
		</p>
		<label for="">Systemic Examination</label>
		<p>
		@foreach ($systemexamination as $element)
			@if ($element->notes != '')
			{{$element->notes}}<br>
			@endif
		@endforeach
		</p>
  </div>
</div>
@endif

@php
$investigation=DB::table('investigation')
->where('patient_id',$patient_id)
->get();
@endphp
@if ($investigation)
<div class="row">
  <div class="col-md-6">
		<label for="">Advice Investigation</label>
		<p>
			@foreach ($investigation as $element)
				{{$element->investigation_name}}<br>
			@endforeach
		</p>
  </div>
  <div class="col-md-6">
		<label for=""></label>
  </div>
</div>
@endif

@php
$date=date('Y-m-d');
$patient_priscription=DB::table('patient_priscription')
->where('patient_id',$patient_id)
->whereDate('created_at',$date)
->latest()
//->first();
->get();
//dd($patient_priscription);
@endphp
@if ($patient_priscription)
<div class="row">
  <div class="col-md-12">
		<label for="">Prescription</label>
		<table class="table table-striped" id="table">
			<thead>
				<tr>
					<td><b>SN</b></td>
					<td><b>Medicine Name</b></td>
					{{--<td><b>Dose</b></td>--}}
					<td><b>Freq</b></td>
					<td><b>Route</b></td>
					<td><b>Duration</b></td>
				</tr>
			</thead>
			<tbody>
			@foreach ($patient_priscription as $key => $element)
				<tr>
					<td>{{$key}}</td>
					<td>{{$element->medicine_name}}</td>
					{{--<td>{{$element->dose}}</td>--}}
					<td>{{$element->freq}}</td>
					<td>{{$element->route}}</td>
					<td>{{$element->duration}}</td>
				</tr>
			@endforeach
			</tbody>
			</table>
		</p>
  </div>
</div>
@endif

@php
/*
$refer=App\Appointments::
select('doctor_speciality_select.speciality_id as idname',\DB::raw('GROUP_CONCAT(doctor_speciality.speciality) as sp'),'doctodoc.*','d.fname as Dfname','city.city as city','C.fname as Cfname')
->join('doctodoc', 'appointment_details.id', '=', 'doctodoc.appointment_id')
//doctor name
->leftjoin('users as d', 'doctodoc.doc_send', '=', 'd.id')
->leftjoin('doctors', 'doctodoc.doc_send', '=', 'doctors.doctor_id')
//clinic
->leftjoin('users as C','doctors.clinic_id','=','C.id')
//city name
->leftjoin('city','doctors.city','=','city.id')
//speciality
->leftjoin('doctor_speciality_select', 'doctors.doctor_id', '=', 'doctor_speciality_select.doctor_id')
->leftjoin('doctor_speciality', 'doctor_speciality_select.speciality_id', '=', 'doctor_speciality.id')
->where('appointment_details.patient_id',$patient_id)
->where('doctodoc.id','!=','')
->groupBy('doctors.id')
->orderby('idname','ASC')
->get();
*/
$refer = App\Appointments::
        join('clinic', 'appointment_details.clinic_id', '=', 'clinic.user_id')
        ->join('doctor_speciality', 'appointment_details.speciality_id', '=', 'doctor_speciality.id')
        ->join('city', 'appointment_details.city_id', '=', 'city.id')
        ->join('users', 'appointment_details.doctor_id', '=', 'users.id')
        ->select('appointment_details.*','clinic.fname as Cfname', 'doctor_speciality.speciality', 'city.city','users.fname as Dfname','doctor_speciality.speciality as sp')
        ->where('patient_id','=',$patient_id)
        ->get();
//dd($patient_id);
//dd($refer);
@endphp
@if ($refer)
<div class="row">
  <div class="col-md-12">
		<label for="">Referral</label>
			<p>
			@foreach ($refer as $key => $element)
					{{$element->city}} -
					{{$element->Cfname}} -
					{{$element->sp}} -
					{{$element->Dfname}} <br>
			@endforeach
			</p>
		</p>
  </div>
</div>
@endif
@php
	/*
<table class="table table-striped" id="table">
<thead>
		<tr>
			<td><b>Clinic Name</b></td>
			<td><b>City</b></td>
			<td><b>Doctor Name</b></td>			
			<td><b>Date</b></td>
			<td><b>Time</b></td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				{{$clinicname}}
			</td>
			@if($city)
				<td>{{$city}}</td>
			@else
				<td align="center">-</td>
			@endif
			<td>{{$doctorname}}</td>
			<td>{{date("d-m-Y", strtotime($appointmentdate))}}</td>
			<td>{{$appointmenttime}}</td>
		</tr>
	</tbody>
</table>
*/
@endphp
<br>
<br>
<br>
<div style="float: right;">
	<b>Dr {{isset($doctorname)?$doctorname:''}} (Sign)</b>
</div>
</div>
</div>
<div class="footer" style="padding-top: 10px; border-top: 1px solid #ddd; font-size:13px; color: #333; margin-top: 20px; text-align: center;">{{--| <a style="color: #03c; text-decoration: none;" href="https://footer.example">Footer Text</a>--}} Sansoriom </div>
</body>
</html>
@php
	//exit;
@endphp