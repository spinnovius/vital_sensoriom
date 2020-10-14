@extends('layouts.admin_main')
@section('content')
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
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-uppercase"><b>Referral</b></h3>
                <div class="table-responsive">
                    <table id="referralid" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>PATIENT NAME</th>
                                <th>AGE</th>
                                <th>SEX</th>
                                <th>REFER. DOCTOR NAME</th>
                                <th>REFER. DOCTOR SPECIALITY</th>
                                <th>REFER DOCTOR CLINIC NAME</th>
                                <th>REFER DOCTOR CITY</th>
                                <th>REASON FOR REFERRAL</th>
                                <th>DATE OF REFERRAL</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($PatientDetail as $vitals)
                                <tr>
                                     @if(session('role')==2)
                                        <td>
                                            <a class="colorname" href="{{route('admin_main.upcomingappointment.openreadlinkreferral', $vitals->id)}}">{{@$vitals->patientname}}</a>    
                                        </td>
                                    @else
                                    <td>
                                    @if ($vitals->patient_id)
                                        <a class="colorname" href="{{route('store_patient.edit', $vitals->patient_id)}}">{{@$vitals->patientname}}</a>
                                    @else
                                        <a class="colorname" href="#">{{@$vitals->patientname}}</a>
                                    @endif    
                                    
                                    </td>
                                    @endif
                                    <td>{{$vitals->age}} Y</td>
                                    <td>{{$vitals->gender }}</td>
                                    <td>{{$vitals->Dfname}}</td>
                                    @php
                                    $select= App\DoctorSpecialitySelect::
                                    select('doctor_speciality.speciality as speciality_name')
                                    ->join('doctor_speciality','doctor_speciality_select.speciality_id','=','doctor_speciality.id')
                                    ->where('doctor_id','=',$vitals->doc_id)
                                    ->get();
                                    $l=array();
                                    foreach ($select as $element){
                                    $l[] = $element->speciality_name;
                                    }
                                    $l=implode(",",$l);
                                    //dd($l);
                                    @endphp
                                    <td>{{$l}}</td>    
                                    {{-- <td>{{$vitals->speciality}}</td> --}}
                                    <td>{{$vitals->Cfname}}</td>
                                    <td>{{$vitals->city}}</td>
                                    @php
                                        if(isset($vitals->question)){
                                    @endphp
                                    <td>{{$vitals->question}}</td>
                                    @php
                                    }else{
                                        echo "<td align='center' > - </td>";
                                    }
                                    @endphp
                                    <td>{{date("d-m-Y", strtotime($vitals->created_at))}}</td>
                                    <td>
                                        @if($vitals->is_read==1)
                                        <i class="fa fa-check" style="color: blue;"></i>
                                        @endif
                                        <a href="{{ url('admin/patient/edit/'.$vitals->patient_id) }}"><label class="label label-info">Edit Patient</label></a>
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

<script>
$(function () {
$('#referralid').DataTable({
     "order": []
});
});
</script>
@endsection