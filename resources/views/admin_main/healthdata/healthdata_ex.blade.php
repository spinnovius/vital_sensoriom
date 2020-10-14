@extends('layouts.admin_main')
@section('content')
@if(session('role')==8)
<ul class="nav nav-tabs">
    <li><a href="{{ route('admin_main.panel.edit', $patient_id) }}">Details</a></li>
    <li><a href="{{ route('admin_main.hopiindex', $patient_id) }}">HOPI</a></li>
    <li class="active"><a href="{{ route('admin_main.exindex', $patient_id) }}">Examination</a></li>
    {{--<li><a href="{{ route('admin_main.geindex', $patient_id) }}">General Examination</a></li>
    <li><a href="{{ route('admin_main.seindex', $patient_id) }}">Systemic Examination</a></li>
    <li ><a href="{{ route('admin_main.ppindex', $patient_id) }}">Prescription</a></li>
    <li><a href="{{ route('admin_main.atindex', $patient_id) }}">Advice Treatment</a></li> --}}
    <li><a href="{{ route('admin_main.clinical_managementindex', $patient_id) }}">CLINICAL MANAGEMENT</a></li>
    <li><a href="{{ route('store_patient.pasthealthrecords', $patient_id) }}">Past Health Records</a></li>
</ul>
@else
<ul class="nav nav-tabs">
    <li><a href="{{ route('store_patient.edit', $patient_id) }}">Details</a></li>
    <li><a href="{{ route('admin_main.hopiindex', $patient_id) }}">HOPI</a></li>
    <li class="active"><a href="{{ route('admin_main.exindex', $patient_id) }}">Examination</a></li>
    {{--<li><a href="{{ route('admin_main.geindex', $patient_id) }}">General Examination</a></li>
    <li><a href="{{ route('admin_main.seindex', $patient_id) }}">Systemic Examination</a></li>
    <li ><a href="{{ route('admin_main.ppindex', $patient_id) }}">Prescription</a></li>
    <li><a href="{{ route('admin_main.atindex', $patient_id) }}">Advice Treatment</a></li> --}}
    <li><a href="{{ route('admin_main.clinical_managementindex', $patient_id) }}">CLINICAL MANAGEMENT</a></li>
    <li><a href="{{ route('store_patient.pasthealthrecords', $patient_id) }}">Past Health Records</a></li>
    <li><a href="{{ route('admin_main.indexvitalslabtest', $patient_id) }}">Vitals Labtest</a></li>
</ul>
@endif

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
<?php $id = \Auth::user()->id;
      $doctor_speciality=App\DoctorDetail::where('doctor_id',$id)->first();
      
      if($doctor_speciality)
      {
        $specialty=App\Speciality::where('id',$doctor_speciality->speciality)->first();
        
          $specialty_name=isset($specialty)?$specialty->speciality:'';
          
          $name=strtolower(preg_replace('/\s/', '', $specialty_name));  
          //dd($name);
      }
      else
      {
          $name='';
      }
?>
<div class="row">
    <div class="col-12">
        <div class="">
            <div class="card-body ml-3">
                <h3 class="card-title"><b>General Examination Data</b></h3>
                <div class="pull-right">
                <a class="btn btn-primary btn-info" href="{{ route('store_patient.pasthealthrecords', $patient_id) }}">Past Health Records</a>
                <a class="btn btn-primary btn-info" href="{{ route('admin_main.clinical_managementindex', $patient_id) }}">Skip</a>
                </div>

                @if($name=='dermatology')
                    @include('admin_main.speciality_wise_form.dermatology')
                @elseif($name=='generalmedicineanddiabetes')
                    @include('admin_main.speciality_wise_form.general_diabetes')
                @elseif($name=='cardiology')
                    @include('admin_main.speciality_wise_form.cardiology')
                @elseif($name=='obstetricsandgynecology')
                    @include('admin_main.speciality_wise_form.obsterics_gynecology')
                @elseif($name=='orthopedics')
                    @include('admin_main.speciality_wise_form.orthopedics')
                @elseif($name=='psychiatry')
                    @include('admin_main.speciality_wise_form.psychiatry')
                @elseif($name=='pulmonarymedicine')
                    @include('admin_main.speciality_wise_form.pulmonary_medicine')
                @elseif($name=='generalsurgery')
                    @include('admin_main.speciality_wise_form.general_surgery')
                @elseif($name=='neurology')
                    @include('admin_main.speciality_wise_form.neurology')
                @elseif($name=='neurosurgery')
                    @include('admin_main.speciality_wise_form.neurosurgery')
                @else
                    @include('admin_main.speciality_wise_form.default')
                @endif
                 <!-- 
                <form action="{{ route('admin_main.gestore',$patient_id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-row" style="margin-bottom: 1em;">
                        <label for="Add clinical data of Systemic Examination of your specialty form (selected from the settings) or add your own in the notes below (optional):"><b>Add clinical data of Systemic Examination of your specialty form (selected from the settings) or add your own in the notes below (optional):</b></label>
                    </div>
                    <div class="form-row">
                        @foreach ($ge as $g)
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="{{$g->id}}" value="{{$g->id}}" name="examination_name[]" >
                                <label class="form-check-label" for="{{$g->id}}" style="font-size: 1em;">{{$g->examination_name}}</label>
                            </div>
                        </div>
                         @endforeach
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">  
                            <textarea class="form-control" placeholder="General Examination Notes (Optional)" name="notes"></textarea>
                        </div>
                    </div>
                    {{-- <div class="form-row">
                        <div class="col-md-4">
                            <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>
                            <button type="submit" class="btn btn-primary btn-info" value="submit">SUBMIT</button>
                        </div>
                    </div> --}}
                {{-- </form> --}} -->
                <h3 class="card-title text-uppercase"><b>Systemic Examination</b></h3>
                {{-- <form action="{{ route('admin_main.sestore',$patient_id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}} --}}
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">  
                            <textarea class="form-control" placeholder="System Examination Notes" name="notes1"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-info" value="submit">SUBMIT</button>
                            <button type="reset" class="btn btn-outline-primary btn-info" value="Reset" >RESET</button>
                        </div>
                    </div>
                </form>
                <h3 class="card-title text-uppercase"><b>General Examination Data</b></h3>
                <div class="table-responsive">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>DATE</th>
                                <th>DOCTOR NAME</th>
                                <th>Examination</th>
                                <th>Notes</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>  
                            
                        @foreach($patient_detail as $patient_detail)
                             <tr>
                                
                                <td>{{date("d-m-Y", strtotime($patient_detail->created_at))}}</td>
                                <td>{{($patient_detail->doctorname!='')?$patient_detail->doctorname:'-'}}</td>
                                <td>{{($patient_detail->examinationName!='')?$patient_detail->examinationName:'-'}}</td>
                                <td>{{($patient_detail->notes!='')?$patient_detail->notes:'-'}}</td>
                                <td>
                                    <?php $delete_url = route("admin_main.gedelete", ["patient_id" =>$patient_id, "id" => $patient_detail->uniqueid]);?>
                                    <a href="{{route('admin_main.geedit',["patient_id" =>$patient_id, "id" => $patient_detail->uniqueid])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a style="color:red" onclick="return confirm(`<?php echo $delete_url  ?>`,`Are you sure you want to delete this General examination ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>
                                </td>
                             </tr>
                         @endforeach  
                        </tbody>
                    </table>
                </div>
                <h3 class="card-title text-uppercase"><b>System Examination Data</b></h3>
                <div class="table-responsive">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>DATE</th>
                                <th>DOCTOR NAME</th>
                                {{-- <th>DIAGNOSIS</th> --}}
                                <th>NOTES</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($SystemExamination as $patient_detail)
                             <tr>
                                    <td>{{date("d-m-Y", strtotime($patient_detail->created_at))}}</td>
                                    <td>{{($patient_detail->doctorname!='')?$patient_detail->doctorname:'-'}}</td>
                                   {{--  <td>{{($patient_detail->diagnosis!='')?$patient_detail->diagnosis:'-'}}</td> --}}
                                    <td>{{($patient_detail->notes!='')?$patient_detail->notes:'-'}}</td>
                                    <td>
                                        <?php 
                                        $delete_url = route("admin_main.sedelete", ["patient_id" =>$patient_id, "id" => $patient_detail->id]);
                                        ?>
                                        <a href="{{route('admin_main.seedit',["patient_id" =>$patient_id, "id" => $patient_detail->id])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a style="color:red" onclick="return confirm(`<?php echo $delete_url  ?>`,`Are you sure you want to delete this system examination ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>
                                    </td>
                             </tr>
                         @endforeach  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection