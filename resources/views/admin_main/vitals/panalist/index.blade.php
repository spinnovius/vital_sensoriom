@extends('layouts.admin_main')
@section('content')
<ul class="nav nav-tabs">
    <li><a href="{{ route('admin_main.panel.edit', $patient_id) }}">Details</a></li>
    <li class="active"><a href="{{ route('admin_main.panel.vitalsindex', $patient_id) }}">Vitals</a></li>
    <li><a href="{{ route('admin_main.panel.labtestindex', $patient_id) }}">Lab Tests</a></li>
    <li><a href="{{ route('admin_main.panel.procedureindex', $patient_id) }}">Procedures</a></li>
</ul>
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
        <div class="">
            <div class="card-body">
                <h3 class="card-title text-uppercase"><b>Vital Data</b></h3>
                <div class="table-responsive">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>RBS</th>
                                <th>SBP</th>
                                <th>DBP</th>
                                <th>HR</th>
                                <th>RR</th>
                                <th>Oxygen Saturation</th>
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
