@extends('layouts.admin_main')
@section('content')
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
      <h3 class="card-title text-uppercase"><b>Answer</b></h3>
    </div>
    <ul class="nav nav-tabs">
        <li  class="active"><a href="{{route('admin_main.answer',$Patient_id)}}">Doctor Answer</a></li>
        <li><a href="{{route('admin_main.panelanswer',$Patient_id)}}">Panelists Answer</a></li>
    </ul>
    <div class="row" style="margin-top:2em;">
            <div class="col-8">
                <b style="padding-bottom:2em;">Answer:</b>
                <p>
                     @if(!is_null($Patient_detail->dranswer) && $Patient_detail->dranswer != "")
                        {{$Patient_detail->dranswer}}
                    @else
                        Doctor Reply Message - Please Waiting
                    @endif
                </p>        
            </div>
    </div>
    <h3 class="card-title text-uppercase">
                    <b>PAST CLINICAL MANAGEMENT DATA</b>
                </h3>
                <h4 class="card-title">Diagnosis & Prescription</h4>                
                <div class="table-responsive">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>DATE</th>
                                <th>DOCTOR</th>
                                <th>PROBABLE DIAGNOSIS</th>
                                <th>Drug Name</th>
                                {{--<th>Dose</th>--}}
                                <th>Frequency</th>
                                <th>Route</th>
                                <th>Duration</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($lab_detail as $lab_detail)
                            <tr>
                                <td>{{date("d-m-Y", strtotime($lab_detail->created_at))}}</td>
                                {{-- <td>{{$lab_detail->date}}</td> --}}
                                
                                <td>{{@$lab_detail->doctor->fname}}</td>
                                <td>{{$lab_detail->diagnosis}}</td>
                                <td>{{$lab_detail->medicine_name}}</td>
                                {{--<td>{{$lab_detail->dose}}</td>--}}
                                <td>{{$lab_detail->freq}}</td>
                                <td>{{$lab_detail->route}}</td>
                                <td>{{$lab_detail->duration}}</td>
                                @php
                                    /*
                                <td>
                                    <?php $delete_url = route("admin_main.ppdelete", ["patient_id" =>$patient_id, "id" => $lab_detail->uniqueid]);?>
                                    <a href="{{route('admin_main.ppedit',["patient_id" =>$patient_id, "id" => $lab_detail->uniqueid])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a style="color:red" onclick="return confirm(`<?php echo $delete_url  ?>`,`Are you sure you want to delete this Prescription ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>
                                </td>
                                */
                                @endphp
                            </tr>
                            @endforeach  
                        </tbody>
                    </table>
                </div>
                <h4 class="card-title">Referral Data From This Clinic{{-- Advice Treatment Data --}}</h4>
                <div class="table-responsive">
                        <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>REFERRAL DATE</th>
                                <th>REFERRED TO DOCTOR NAME</th>
                                <th>REFERRED DOC CITY</th>
                                <th>REFERRED DOC CLINIC</th>
                                <th>REFERRED DOC SPECIALTY</th>
                                <th>REASON FOR REFERRAL</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($refer as $pd)
                             <tr>
                                <td>{{date("d-m-Y", strtotime($pd->date))}}</td>
                                <td>{{$pd->Dfname}}</td>
                                <td>{{$pd->city}}</td>
                                <td>{{$pd->Cfname}}</td>
                                @php
                                    // $select=DB::table('doctor_speciality_select')
                                    // ->leftjoin('doctor_speciality','doctor_speciality_select.speciality_id','=','doctor_speciality.id')
                                    // ->where('doctor_id','=',$pd->Did)
                                    // ->get();
                                    // $speciality=array();
                                    // foreach ($select as $key => $value) {
                                    //     //dd($value);
                                    //     $speciality[]=$value->speciality;
                                    // }
                                    // $specialityc=implode(",",$speciality);
                                @endphp
                                {{-- <td>
                                {{$specialityc}}
                                </td> --}}
                                <td>{{$pd->speciality}}</td>
                                <td>{{$pd->reason_refer}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                </div>
                <h4 class="card-title">Goals Settting Data</h4>
                    <div class="table-responsive">
                        <table id="example25" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Dates</th>
                                <th>Goals Set</th>
                                <th>No.</th>
                                <th>DAYS/ WEEKS/ MONTHS/ YRS</th>
                            </tr>
                        </thead>
                        <tbody>  
                        @foreach($patient_detail as $patient_detail)
                                {{--
                             <tr>
                                        <td>{{date("d-m-Y", strtotime($patient_detail->date))}}</td>
                                        <td>{{$patient_detail->goal}}</td>
                                        <td>{{$patient_detail->no}}</td>
                                        <td>{{$patient_detail->daysofmonth}}</td>
                             </tr>--}}
                             @if ($patient_detail->goal)
                            <tr>
                                    <td>{{date("d-m-Y", strtotime($patient_detail->date))}}</td>
                                    <td>{{$patient_detail->goal}}</td>
                                    <td>{{$patient_detail->no}}</td>
                                    <td>{{$patient_detail->daysofmonth}}</td>
                             </tr>
                            @endif
                         @endforeach  
                        </tbody>
                    </table>
                </div>

    
  </div>
</div>
</div>
<script>
$(function () {
$('#example24').DataTable({
"order": [[ 0, "desc" ]]
});
});
$(function () {
$('#example25').DataTable({
"order": [[ 0, "desc" ]]
});
});
</script>
@endsection