@extends('layouts.admin_main')
@section('content')
<style>
    .table-striped tbody tr:nth-of-type(odd){
        background: none;
    }
</style>
@if(session('role')==8)
<ul class="nav nav-tabs">
    <li><a href="{{ route('admin_main.panel.edit', $patient_id) }}">Details</a></li>
    <li class="active"><a href="{{ route('admin_main.hopiindex', $patient_id) }}">HOPI</a></li>
    <li><a href="{{ route('admin_main.exindex', $patient_id) }}">Examination</a></li>
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
    @if(session('role') != 6)
    <li class="active"><a href="{{ route('admin_main.hopiindex', $patient_id) }}">HOPI</a></li>
    <li><a href="{{ route('admin_main.exindex', $patient_id) }}">Examination</a></li>
    {{--<li><a href="{{ route('admin_main.geindex', $patient_id) }}">General Examination</a></li>
    <li><a href="{{ route('admin_main.seindex', $patient_id) }}">Systemic Examination</a></li>
    <li ><a href="{{ route('admin_main.ppindex', $patient_id) }}">Prescription</a></li>
    <li><a href="{{ route('admin_main.atindex', $patient_id) }}">Advice Treatment</a></li> --}}
    <li><a href="{{ route('admin_main.clinical_managementindex', $patient_id) }}">CLINICAL MANAGEMENT</a></li>
    @endif
    <li><a href="{{ route('store_patient.pasthealthrecords', $patient_id) }}">Past Health Records</a></li>
     @if(session('role') != 6)
    <li><a href="{{ route('admin_main.indexvitalslabtest', $patient_id) }}">Vitals Labtest</a></li>
     @endif
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

<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="">
                <h3 class="card-title text-uppercase"><b>Add (HOPI) Data:</b></h3>
            </div>
            <div class="col-md-12 mb-2">
            <a class="btn btn-primary btn-info pull-right" href="{{ route('store_patient.pasthealthrecords', $patient_id) }}">Past Health Records</a>
            </div>
            <form action="{{ route('admin_main.hopistore',$patient_id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="complainnodiv mb-5">
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-3 mb-3">
                            <input type="text" name="complain[]" class="form-control" placeholder="Complaints" autocomplete="off">
                        </div>
                        <div class="col-md-1 mb-3">
                            <label class="form-check-label" for="Since"><h4>Since</h4></label>
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" name="complainno[]" class="form-control isnumbertype" placeholder="No." autocomplete="off">
                        </div>
                        <div class="col-md-3 mb-3">
                            <select class="form-control" name="complaindays[]">
                                <option value="hours">Hrs</option>
                                <option value="days">Days</option>
                                <option value="weeks">Weeks</option>
                                <option value="months">Months</option>
                                <option value="years">Years</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <span class="btn btn-primary complainnoplusbtm">+</span>
                        </div>
                    </div>
                </div>
                <div class="comorbidinodiv">
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-3 mb-3">
                            <input type="text" name="comorbidi[]" class="form-control" placeholder="Comorbidities" autocomplete="off">
                        </div>
                        <div class="col-md-1 mb-3">
                            <label class="form-check-label" for="Since"><h4>Since</h4></label>
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" name="comorbidino[]" class="form-control isnumbertype" placeholder="No." autocomplete="off">
                        </div>
                        <div class="col-md-3 mb-3">
                            <select class="form-control"  name="comorbidays[]">
                              <option value="hours">Hrs</option>
                              <option value="days">Days</option>
                              <option value="weeks">Weeks</option>
                              <option value="months">Months</option>
                              <option value="years">Years</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <span class="btn btn-primary comorbidinoplusbtm">+</span>
                        </div>
                    </div>
                </div>
                <div class="form-row" style="margin-bottom: 1em;">
                    {{-- <label class="form-check-label" for="AddRiskFactors"><h4>Add Risk Factors</h4></label> --}}
                    <h3 class="card-title"><b>Add Risk Factors:</b></h3>
                </div>
                <div class="form-row" style="margin-bottom: 1em;">
                    <div class="col-md-3 mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="Obese" name="hopidata[]" id="Obese">
                            <label class="form-check-label" for="Obese">Obese</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="High Stress Levels" name="hopidata[]" id="High Stress Levels">
                            <label class="form-check-label" for="High Stress Levels">High Stress Levels</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="Sedentary Lifestyle" name="hopidata[]" id="Sedentary Lifestyle">
                        <label class="form-check-label" for="Sedentary Lifestyle">Sedentary Lifestyle</label>
                    </div>
                </div>
            </div>
            <div class="form-row" style="margin-bottom: 1em;">
                <div class="col-md-3 mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="Drug Dependence" name="hopidata[]" id="Drug Dependence">
                        <label class="form-check-label" for="Drug Dependence">Drug Dependence</label>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="Alcoholism" name="hopidata[]" id="Alcoholism">
                        <label class="form-check-label" for="Alcoholism">Alcoholism</label>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                   <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="Smoking" name="hopidata[]" id="Smoking">
                        <label class="form-check-label" for="Smoking">Smoking</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-info" value="submit">SAVE</button>
                    <button type="reset" class="btn btn-outline-primary btn-info" value="Reset" >RESET</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="">
            <div class="card-body">
                {{-- <h4 class="card-title">Past HOPI Data</h4> --}}
                <h3 class="card-title"><b>Past HOPI Data:</b></h3>
               {{--  <table border="1">
                    <thead>
                        <tr>
                        <th>Date</th>
                        <th>Doctor Name</th>
                        <th>Risk Factor</th>
                        <th colspan="3">Complaints</th>
                        <th colspan="3">Comorbidities</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Complaints</th>
                            <th>Complaints Since</th>
                            <th>Complaints Days</th>
                            <th>Comorbidities</th>
                            <th>Comorbidities Since</th>
                            <th>Comorbidities Days</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                        </tr>
                    </tbody>
                </table> --}}
                <div class="table-responsive">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                {{-- <th>Patient Name</th> --}}
                                <th>Doctor Name</th>
                                <th>Risk Factor</th>
                                <th>Complaints</th>
                                <th>Comorbidities</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patient_detail as $patient_detail)
                            <tr>
                                <td>{{date("d-m-Y", strtotime($patient_detail->created_at))}}</td>
                                {{-- <td>{{@$patient_detail->pfname}}</td> --}}
                                <td>{{@$patient_detail->Dfname}}</td>
                                <td>{{@$patient_detail->risk_factors}}</td>
                                <td>
                                    @if(isset($patient_detail->hopipatientcomplain))
                                    <table style="color: blue" cellpadding="15">
                                    @foreach($patient_detail->hopipatientcomplain as $hopipatientcomplain)
                                        <tr>
                                        <td>{{ $hopipatientcomplain->complain_name }}</td>
                                        <td>{{ $hopipatientcomplain->complain_since }}</td>
                                        <td>{{ $hopipatientcomplain->complain_days }}</td>
                                        </tr>
                                    @endforeach
                                    </table>
                                    @endif
                                </td>
                                <td>
                                    @if(isset($patient_detail->hopipatientcomorbidities))
                                    <table style="color: red" cellpadding="15">
                                    @foreach($patient_detail->hopipatientcomorbidities as $hopipatientcomorbidities)
                                        <tr>
                                        <td>{{ $hopipatientcomorbidities->comorbidities_name }}</td>
                                        <td>{{ $hopipatientcomorbidities->comorbidities_since }}</td>
                                        <td>{{ $hopipatientcomorbidities->comorbidities_days }}</td>
                                        </tr>
                                    @endforeach
                                    </table>
                                    @endif
                                </td>
                                <!-- <td>
                                    <?php 
                                    ///$delete_url = route("admin_main.hopidelete", ["patient_id" =>$patient_id, "id" => $patient_detail->hopi_patient_id]);?>
                                    <a href="{{route('admin_main.hopiedit',["patient_id" =>$patient_id, "id" => $patient_detail->hopi_patient_id])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a style="color:red" onclick="return confirm(`<?php //echo $delete_url  ?>`,`Are you sure you want to delete this Present Illness (HOPI) ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>
                                </td> -->
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
    var count = 1;
// complainnoplusbtm
jQuery('body').on('click', '.complainnoplusbtm', function (e) {
  jQuery('.complainnodiv').append('<div class="form-row"><div class="col-md-3 mb-3"><input type="text" name="complain[]" class="form-control" placeholder="Complaints" autocomplete="off" required></div><div class="col-md-1 mb-3"><label class="form-check-label" for="Since"><h4>Since</h4></label></div><div class="col-md-3 mb-3"><input type="text" name="complainno[]" class="form-control isnumbertype" placeholder="No." autocomplete="off" required></div><div class="col-md-3 mb-3"><select class="form-control" name="complaindays[]" required><option value="hours">Hrs</option><option value="days">Days</option><option value="weeks">Weeks</option><option value="months">Months</option><option value="years">Years</option></select></div><div class="col-md-2 mb-3"><span class="btn btn-primary complainnominusbtm">-</span></div></div>');
  count ++;
});
jQuery('body').on('click', '.complainnominusbtm', function (e) {
  jQuery(this).closest('.form-row').remove();
});

// complainnoplusbtm
jQuery('body').on('click', '.comorbidinoplusbtm', function (e) {
  jQuery('.comorbidinodiv').append('<div class="form-row"><div class="col-md-3 mb-3"><input type="text" name="comorbidi[]" class="form-control" placeholder="Comorbidities" autocomplete="off" required></div><div class="col-md-1 mb-3"><label class="form-check-label" for="Since"><h4>Since</h4></label></div><div class="col-md-3 mb-3"><input type="text" name="comorbidino[]" class="form-control isnumbertype" placeholder="No." autocomplete="off" required></div><div class="col-md-3 mb-3"><select class="form-control" name="comorbidays[]" required><option value="hours">Hrs</option><option value="days">Days</option><option value="weeks">Weeks</option><option value="months">Months</option><option value="years">Years</option></select></div><div class="col-md-2 mb-3"><span class="btn btn-primary complainnominusbtm">-</span></div></div>');
  count ++;
});

jQuery('body').on('click', '.complainnominusbtm', function (e) {
  jQuery(this).closest('.form-row').remove();
});
</script>
@endsection