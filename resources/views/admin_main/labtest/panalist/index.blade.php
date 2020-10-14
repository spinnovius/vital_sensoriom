@extends('layouts.admin_main')
@section('content')
<ul class="nav nav-tabs">
  <li><a href="{{ route('admin_main.panel.edit', $patient_id) }}">Details</a></li>
  <li><a href="{{ route('admin_main.panel.vitalsindex', $patient_id) }}">Vitals</a></li>
  <li class="active"><a href="{{ route('admin_main.panel.labtestindex', $patient_id) }}">Lab Tests</a></li>
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
        <h3 class="card-title text-uppercase"><b>Lab Test Data</b></h3>
        <div class="table-responsive">
          <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>

                <th>Lab Test Name</th>
                <th>Value</th>
              </tr>
            </thead>
            <tbody>
              @foreach($lab_detail as $lab_detail)
              <tr>
                <td>{{$lab_detail->test_name}}</td>
                <td>{{$lab_detail->value}}</td>
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
