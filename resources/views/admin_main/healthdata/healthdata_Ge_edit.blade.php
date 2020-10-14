@extends('layouts.admin_main')
@section('content')
<ul class="nav nav-tabs">
                 <li><a href="{{ route('store_patient.edit', $patient_id) }}">Details</a></li>
                 <li><a href="{{ route('admin_main.hopiindex', $patient_id) }}">HOPI</a></li>
                 <li class="active"><a href="{{ route('admin_main.geindex', $patient_id) }}">General Examination</a></li>
                 <li><a href="{{ route('admin_main.seindex', $patient_id) }}">Systemic Examination</a></li>
                 <li><a href="{{ route('admin_main.ppindex', $patient_id) }}">Prescription</a></li>
                 <li ><a href="{{ route('admin_main.atindex', $patient_id) }}">Advice Treatment</a></li>
</ul>
<section class="content-header" style="padding-bottom: 1em;">
        <h3 style="margin-left: 22px;">Edit General Examination</h3>
</section>
<?php $id = \Auth::user()->id;
      $doctor_speciality=App\DoctorDetail::where('doctor_id',$id)->first();
      $specialty=App\Speciality::where('id',$doctor_speciality->speciality)->first();
      $specialty_name=isset($specialty)?$specialty->speciality:'';
      $name=strtolower(preg_replace('/\s/', '', $specialty_name));
?>
<div class="col-sm-10">
<div class="container">
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
                
                @if($name=='dermatology')
                    @include('admin_main.speciality_wise_form.dermatology_edit')
                @elseif($name=='diabetes')
                    @include('admin_main.speciality_wise_form.general_diabetes_edit')
                @elseif($name=='cardiology')
                    @include('admin_main.speciality_wise_form.cardiology_edit')
                @elseif($name=='obstetricsandgynecology')
                    @include('admin_main.speciality_wise_form.obsterics_gynecology_edit')
                @elseif($name=='orthopedics')
                    @include('admin_main.speciality_wise_form.orthopedics_edit')
                @elseif($name=='psychiatry')
                    @include('admin_main.speciality_wise_form.psychiatry_edit')
                @elseif($name=='pulmonarymedicine')
                    @include('admin_main.speciality_wise_form.pulmonary_medicine_edit')
                @elseif($name=='generalsurgery')
                    @include('admin_main.speciality_wise_form.general_surgery_edit')
                @elseif($name=='neurology')
                    @include('admin_main.speciality_wise_form.neurology_edit')
                @elseif($name=='neurosurgery')
                    @include('admin_main.speciality_wise_form.neurosurgery_edit')
                @else
                    @include('admin_main.speciality_wise_form.default_edit')
                @endif

                <!-- <form action="{{ route('admin_main.geupdate',[$patient_id, $patientge->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-3">  
                           <label for="Click the relevant clinical findings or add your own in the notes below (optional)"><b>Click the relevant clinical findings or add your own in the notes below (optional)</b></label>
                        </div>
                    </div>
                    <div class="form-row">
                    	@foreach ($ge as $g)
                    	<?php 
                    		$examination_id=$patientge->examination_id;                    		
                    		$arr = explode(',',$examination_id);
                    		

                    	?>
                    	<div class="col-md-4 mb-3"> 
                    			<div class="form-check">
							    <input type="checkbox" class="form-check-input" id="{{$g->id}}" value="{{$g->id}}" <?php if(in_array($g->id, $arr)){ echo "checked";}?> name="examination_name[]">
							    <label class="form-check-label" for="{{$g->id}}"style="font-size: 1em;" >{{$g->examination_name}}</label>
  							</div>
                        </div>
                         @endforeach
                    </div>
                   

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">  
                          	<textarea class="form-control" placeholder="General Examination Notes" name="notes" required="">{{$patientge->notes}}</textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4">
                            <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>
                            <button type="submit" class="btn btn-primary btn-info" value="submit">UPDATE</button>
                        </div>
                    </div>
                    
                </form> -->
</div>
</div>
@endsection