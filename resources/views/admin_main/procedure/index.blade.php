@extends('layouts.admin_main')
@section('content')

<ul class="nav nav-tabs">
    <li><a href="{{ route('store_patient.edit', $patient_id) }}">Details</a></li>
    <li><a href="{{ route('admin_main.vitalsindex', $patient_id) }}">Vitals</a></li>
    <li><a href="{{ route('admin_main.labtestindex', $patient_id) }}">Labtests</a></li>
    <li class="active"><a href="{{ route('admin_main.procedureindex', $patient_id) }}">Procedures</a></li>
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
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="">
                <h3 class="card-title"><b>Add Procedure</b></h3>
            </div>
            <form action="{{ route('admin_main.procedurestore',$patient_id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <select class="form-control" name="name" required="">
                            <option value="">Select Procedure</option>
                            @foreach($procedure as $procedure)
                            <option <?php if(old('speciality') == $procedure->id ){ ?> selected="selected" <?php } ?> value="{{ $procedure->procedure_name }}">{{ $procedure->procedure_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">  
                        <textarea class="form-control" id="validationDefault02" placeholder="Impression" name="impression" required></textarea>
                    </div>
                    <div class="col-md-2 col-md-offset-3 mb-3">  
                        <input type="text" class="form-control labtestdate" name="date" placeholder="Date" value="{{old('date')}}" autocomplete="off">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4">
                        <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>
                        <button type="submit" class="btn btn-primary btn-info" value="submit">SAVE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Procedure Data</h4>                
                <div class="table-responsive">
                    <table id="procedure" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="display: none;">id</th>
                                <th>Date</th>
                                <th>Procedure Name</th>
                                <th>Remark</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($patient_detail as $patient_detail)
                         @php
                         //dd($patient_detail);
                         @endphp
                         <tr>
                            <td style="display: none;">{{$patient_detail['uniqueid']}}</td>
                            <!--<td>{{date("d/m/Y", strtotime($patient_detail['procedure_date']))}}</td>-->
                            <td>{{ date("d/m/Y",$patient_detail['procedure_date']) }}</td>
                           <!--<td>{{$patient_detail['procedure_date']}}</td>-->
                            <td>{{$patient_detail['procedure_name']}}</td>
                            <td>{{$patient_detail['remark']}}</td>
                            <td>
                                <?php $delete_url = route("admin_main.proceduredelete", ["patient_id" =>$patient_id, "id" => $patient_detail['uniqueid']]);?>
                                <a href="{{route('admin_main.procedureedit',["patient_id" =>$patient_id, "id" => $patient_detail['uniqueid']])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a style="color:red" onclick="return confirm(`<?php echo $delete_url  ?>`,`Are you sure you want to delete this Procedure ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>
                            </td>
                            @php
                            /*
                             <td style="display: none;">{{$patient_detail->uniqueid}}</td>
                            <td>{{date("d-m-Y", strtotime($patient_detail->procedure_date))}}</td>
                            <td>{{$patient_detail->procedure_name}}</td>
                            <td>{{$patient_detail->remark}}</td>
                            <td>
                                <?php $delete_url = route("admin_main.proceduredelete", ["patient_id" =>$patient_id, "id" => $patient_detail->uniqueid]);?>
                                <a href="{{route('admin_main.procedureedit',["patient_id" =>$patient_id, "id" => $patient_detail->uniqueid])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a style="color:red" onclick="return confirm(`<?php echo $delete_url  ?>`,`Are you sure you want to delete this Procedure ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>
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
$('#procedure').DataTable({
   "order": []
   ///"order": false
});
});
</script>
@endsection