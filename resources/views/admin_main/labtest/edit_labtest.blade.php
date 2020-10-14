@extends('layouts.admin_main')
@section('content')
<ul class="nav nav-tabs">
 <li><a href="{{ route('store_patient.edit', $patient_id) }}">Details</a></li>
 <li><a href="{{ route('admin_main.vitalsindex', $patient_id) }}">Vitals</a></li>
 <li class="active"><a href="{{ route('admin_main.labtestindex', $patient_id) }}">Lab Tests</a></li>
 <li><a href="{{ route('admin_main.procedureindex', $patient_id) }}">Procedures</a></li>
</ul>
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
                <h3 class="card-title text-uppercase"><b>Edit Lab Test</b></h3>
            </div>
            <form action="{{ route('admin_main.labtestupdate', [$patient_id, $PatientLabDetail->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <select class="form-control" name="labtestname" required="">
                            <option value="">Select Lab Test Name</option>
                            @foreach($labreports as $labreport)
                            <option <?php if($PatientLabDetail->test_name == $labreport->test_name ){ ?> selected="selected" <?php } ?> value="{{ $labreport->test_name }}">{{ $labreport->test_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">  
                        <input type="text" class="form-control" id="validationDefault01" placeholder="Value"  required name="value" value="{{$PatientLabDetail->value}}">
                    </div>
                    <div class="col-md-2 col-md-offset-4 mb-3">  
                        <input type="text" class="form-control labtestdate" name="date" placeholder="Date" value="{{$PatientLabDetail->test_date}}" autocomplete="off">{{--date("d/m/Y", strtotime($PatientLabDetail->test_date))--}}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-info" value="submit">UPDATE</button>
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
                <h3 class="card-title text-uppercase"><b>Lab Test Data</b></h3>
                <div class="table-responsive">
                    <table id="editlabtest" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="display: none;">id</th>
                                <th>Date</th>
                                <th>Lab Test Name</th>
                                <th>Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>  
                           @foreach($lab_detail as $lab_detail)
                           <tr>
                            <td style="display: none;">{{$lab_detail['uniqueid']}}</td>
                            <td>{{$lab_detail['test_date']}}</td>
                            <!--<td>{{date("d/m/Y", strtotime($lab_detail['test_date']))}}</td>-->
                            <td>{{$lab_detail['test_name']}}</td>
                            <td>{{$lab_detail['value']}}</td>
                            <td>
                                <?php $delete_url = route("admin_main.labtestdelete", ["patient_id" =>$patient_id, "id" => $lab_detail['uniqueid']]);?>
                                <a href="{{route('admin_main.labtestedit',["patient_id" =>$patient_id, "id" => $lab_detail['uniqueid']])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a style="color:red" onclick="return confirm(`<?php echo $delete_url  ?>`,`Are you sure you want to delete this labtest ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>
                            </td>
                            @php
                                /*
                            <td>{{$lab_detail->test_date}}</td>
                            <td>{{$lab_detail->test_name}}</td>
                            <td>{{$lab_detail->value}}</td>
                            <td>
                                <?php $delete_url = route("admin_main.labtestdelete", ["patient_id" =>$patient_id, "id" => $lab_detail->uniqueid]);?>
                                <a href="{{route('admin_main.labtestedit',["patient_id" =>$patient_id, "id" => $lab_detail->uniqueid])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a style="color:red" onclick="return confirm(`<?php echo $delete_url  ?>`,`Are you sure you want to delete this labtest ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>
                            </td>
                            */
                            @endphp
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
                $('#editlabtest').DataTable({
                     "order": []
                });
            });
</script>
@endsection