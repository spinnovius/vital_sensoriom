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
                <h3 class="card-title text-uppercase"><b>Previous Appointments</b></h3>
                <div class="table-responsive">
                    <table id="previous" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>PATIENT NAME</th>
                                @if(session('role')==2)
                                <th>AGE</th>
                                <th>SEX</th>
                                @endif
                                @if(session('role')==5)
                                <th>DOCTOR NAME</th>
                                @endif
                                <th>DATE</th>
                                <th>TIME</th>
                            </tr>
                        </thead>
                        <tbody>  
                            @php
                                //dd($PatientDetail);
                            @endphp
                         @foreach($PatientDetail as $vitals)
                                <tr>
                                    <td>
                                        <a href="{{ route('store_patient.pasthealthrecords',$vitals->patient_id) }}">
                                        {{@$vitals->patientname}}
                                        </a>
                                    </td>
                                    @php
                                        $patientd=DB::table('patient_detail')->where('patient_id','=',$vitals->patient_id)->first();
                                    @endphp
                                    @if(session('role')==2)
                                    <td>{{@$patientd->age}}</td>
                                    <td>{{@$patientd->gender}}</td>
                                    @endif
                                    @if(session('role')==5)
                                    <td>{{isset($vitals->doctorname)?$vitals->doctorname:'-'}}</td>
                                    @endif
                                    <td>{{date("d-m-Y", strtotime($vitals->date))}}</td>
                                    <td>{{date("g:i A", strtotime($vitals->time))}}{{-- {{@$vitals->time}} --}}</td>
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
                $('#previous').DataTable({
                     "order": false
                });
            });
</script>
@endsection