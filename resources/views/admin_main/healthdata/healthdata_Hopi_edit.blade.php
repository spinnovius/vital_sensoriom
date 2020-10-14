@extends('layouts.admin_main')
@section('content')
<ul class="nav nav-tabs">
 <li><a href="{{ route('store_patient.edit', $patient_id) }}">Details</a></li>
 <li class="active"><a href="{{ route('admin_main.hopiindex', $patient_id) }}">HOPI</a></li>
 <li><a href="{{ route('admin_main.geindex', $patient_id) }}">General Examination</a></li>
 <li><a href="{{ route('admin_main.seindex', $patient_id) }}">Systemic Examination</a></li>
 <li><a href="{{ route('admin_main.ppindex', $patient_id) }}">Prescription</a></li>
 <li><a href="{{ route('admin_main.atindex', $patient_id) }}">Advice Treatment</a></li>
</ul>

<div class="row">
  <div class="col-md-12">
    <div class="col-md-12">
      <div class="card">
        <h4 class="card-title">Edit (HOPI) Data</h4>
      </div>
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


      <form action="{{ route('admin_main.hopiupdate',[$patient_id, $patientge->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <input type="hidden" name="hopi_id" value="{{isset($patientge->id)?$patientge->id:''}}" id="hopi_id">
        <div class="complainnodiv">
        </div>
        <div class="comorbidinodiv">

        </div>
        <div class="form-row" style="margin-bottom: 1em;">
          <label class="form-check-label" for="AddRiskFactors"><h4>Add Risk Factors</h4></label>
        </div>
        <?php
        $string=array_map('trim', explode(',', $patientge_data->problem));

        ?>
        <div class="form-row" style="margin-bottom: 1em;">
          <div class="col-md-3 mb-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" value="Obese" name="hopidata[]" id="Obese" <?php if(in_array('Obese',$string)){echo "checked";}?>>
              <label class="form-check-label" for="Obese">Obese</label>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" value="High Stress Levels" name="hopidata[]" id="High Stress Levels" <?php if(in_array('High Stress Levels',$string)){echo "checked";}?>>
              <label class="form-check-label" for="High Stress Levels">High Stress Levels</label>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" value="Sedentary Lifestyle" name="hopidata[]" id="Sedentary Lifestyle" <?php if(in_array('Sedentary Lifestyle',$string)){echo "checked";}?>>
              <label class="form-check-label" for="Sedentary Lifestyle">Sedentary Lifestyle</label>
            </div>
          </div>
        </div>

        <div class="form-row" style="margin-bottom: 1em;">
          <div class="col-md-3 mb-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" value="Drug Dependence" name="hopidata[]" id="Drug Dependence" <?php if(in_array('Drug Dependence',$string)){echo "checked";}?>>
              <label class="form-check-label" for="Drug Dependence">Drug Dependence</label>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" value="Alcoholism" name="hopidata[]" id="Alcoholism" <?php if(in_array('Alcoholism',$string)){echo "checked";}?>>
              <label class="form-check-label" for="Alcoholism">Alcoholism</label>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" value="Smoking" name="hopidata[]" id="Smoking" <?php if(in_array('Smoking',$string)){echo "checked";}?>>
              <label class="form-check-label" for="Smoking">Smoking</label>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-4">
            <!-- <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button> -->
            <button type="submit" class="btn btn-primary btn-info" value="submit">UPDATE</button>
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
        <h4 class="card-title">Present Illness (HOPI) Data</h4>                
        <div class="table-responsive m-t-40">
          <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                          <tr>

                              <th>Patient Name</th>
                              <th>Doctor Name</th>
                              <th>Complaints / Comorbidities</th>
                              <th>Risk Factor</th>
                              <!-- <th>Action</th> -->
                          </tr>
                      </thead>
                      <tbody>  
                          @foreach($patient_detail as $patient_detail)
                          <tr>
                              <td>{{$patient_detail->patientuser->fname}}</td>
                              <td>{{$patient_detail->doctoruser->fname}}</td>
                              <td>{{$patient_detail->complain_name}}</td>
                              <td>{{$patient_detail->problem}}</td>
                             <!--  <td>
                                  <?php 
                                 // $delete_url = route("admin_main.hopidelete", ["patient_id" =>$patient_id, "id" => $patient_detail->id]);?>
                                  <a href="{{route('admin_main.hopiedit',["patient_id" =>$patient_id, "id" => $patient_detail->id])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
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
  // alert("Asd");
// laod data Hopiget
var details = '<?php echo route('admin_main.Hopiget'); ?>';
var emr_id = $('#hopi_id').val();
$.ajax({
  type:'get',
  url:details,
  data: {emr_id: emr_id},
  success:function(res){
    var count = Object.keys(res).length;
    $.each(res, function(index, value) {
      console.log(value.complain_no);
                  // $('.complainnodiv').append('<div class="form-row" style="margin-bottom: 1em;"><div class="col-md-3 mb-3"><input type="text" name="complain[]" class="form-control" placeholder="Complaints" autocomplete="off" value="'+value.complain_name+'" required></div><div class="col-md-1 mb-3"><label class="form-check-label" for="Since"><h4>Since</h4></label></div><div class="col-md-3 mb-3"><input type="text" name="complainno[]" class="form-control" placeholder="No." autocomplete="off" value="'+value.complain_no+'" required></div><div class="col-md-3 mb-3"><input type="text" name="complaindays[]" class="form-control" placeholder="Days/Months" autocomplete="off" value="'+value.complain_days+'"  required></div><div class="col-md-2 mb-3">'+(index == 0 ? '<span class="btn btn-primary complainnoplusbtm">+</span>' : '<span class="btn btn-primary complainnominusbtm">-</span>' )+'</div></div>');

                  $('.complainnodiv').append('<div class="form-row" style="margin-bottom: 1em;"><div class="col-md-3 mb-3"><input type="text" name="complain[]" class="form-control" placeholder="Complaints" autocomplete="off" value="'+value.complain_name+'" required></div><div class="col-md-1 mb-3"><label class="form-check-label" for="Since"><h4>Since</h4></label></div><div class="col-md-3 mb-3"><input type="text" name="complainno[]" class="form-control isnumbertype" placeholder="No." autocomplete="off" value="'+value.complain_no+'" required></div><div class="col-md-3 mb-3"><select class="form-control"  name="complaindays[]" required><option   value="hours" '+(value.complain_days == "hours" ? "selected" : "")+'>Hrs</option><option value="days" '+(value.complain_days == "days" ? "selected" : "")+'>Days</option><option value="weeks" '+(value.complain_days == "weeks" ? "selected" : "")+'>Weeks</option><option value="months" '+(value.complain_days == "months" ? "selected" : "")+'>Months</option><option value="years" '+(value.complain_days == "years" ? "selected" : "")+'>Years</option></select></div><div class="col-md-2 mb-3">'+(index == 0 ? '<span class="btn btn-primary complainnoplusbtm">+</span>' : '<span class="btn btn-primary complainnominusbtm">-</span>' )+'</div></div>');
                });

  }
});
//remove
jQuery('body').on('click', '.complainnominusbtm', function (e) {
  jQuery(this).closest('.form-row').remove();
});

//add section
jQuery('body').on('click', '.complainnoplusbtm', function (e) {
  jQuery('.complainnodiv').append('<div class="form-row"><div class="col-md-3 mb-3"><input type="text" name="complain[]" class="form-control" placeholder="Complaints" autocomplete="off" required></div><div class="col-md-1 mb-3"><label class="form-check-label" for="Since"><h4>Since</h4></label></div><div class="col-md-3 mb-3"><input type="text" name="complainno[]" class="form-control isnumbertype" placeholder="No." autocomplete="off" required></div><div class="col-md-3 mb-3"><select class="form-control"  name="complaindays[]" required><option value="hours">Hrs</option><option value="days">Days</option><option value="weeks">Weeks</option><option value="months">Months</option><option value="years">Years</option></select></div><div class="col-md-2 mb-3"><span class="btn btn-primary complainnominusbtm">-</span></div></div>');
});
// laod data Comorbidities
var detail = '<?php echo route('admin_main.Hopigetcomorbidities'); ?>';
var comorbidities_id = $('#hopi_id').val();
// console.log(hopi_id);
$.ajax({
  type:'get',
  url:detail,
  data: {emr_id: comorbidities_id},
  success:function(res){
    var count = Object.keys(res).length;
    if(count > 0){
      console.log("if enter");
      $.each(res, function(index, value) {
        console.log(value.complain_no);
        $('.comorbidinodiv').append('<div class="form-row" style="margin-bottom: 1em;"><div class="col-md-3 mb-3"><input type="text" name="comorbidi[]" class="form-control" placeholder="Comorbidities" autocomplete="off" value="'+value.complain_name+'" required></div><div class="col-md-1 mb-3"><label class="form-check-label" for="Since"><h4>Since</h4></label></div><div class="col-md-3 mb-3"><input type="text" name="comorbidino[]" class="form-control isnumbertype" placeholder="No." autocomplete="off" value="'+value.complain_no+'" required></div><div class="col-md-3 mb-3"><select class="form-control"  name="comorbidays[]" required><option   value="hours" '+(value.complain_days == "hours" ? "selected" : "")+'>Hrs</option><option value="days" '+(value.complain_days == "days" ? "selected" : "")+'>Days</option><option value="weeks" '+(value.complain_days == "weeks" ? "selected" : "")+'>Weeks</option><option value="months" '+(value.complain_days == "months" ? "selected" : "")+'>Months</option><option value="years" '+(value.complain_days == "years" ? "selected" : "")+'>Years</option></select></div><div class="col-md-2 mb-3">'+(index == 0 ? '<span class="btn btn-primary comorbidinoplusbtm">+</span>' : '<span class="btn btn-primary complainnominusbtm">-</span>' )+'</div></div>');
      });
    }else{
      jQuery('.comorbidinodiv').append('<div class="form-row"><div class="col-md-3 mb-3"><input type="text" name="comorbidi[]" class="form-control" placeholder="Comorbidities" autocomplete="off" required></div><div class="col-md-1 mb-3"><label class="form-check-label" for="Since"><h4>Since</h4></label></div><div class="col-md-3 mb-3"><input type="text" name="comorbidino[]" class="form-control isnumbertype" placeholder="No." autocomplete="off" required></div><div class="col-md-3 mb-3"><select class="form-control"  name="comorbidays[]" required><option value="hours">Hrs</option><option value="days">Days</option><option value="weeks">Weeks</option><option value="months">Months</option><option value="years">Years</option></select></div><div class="col-md-2 mb-3"><span class="btn btn-primary comorbidinoplusbtm">+</span></div></div>');
    }
  }
});
//remove
jQuery('body').on('click', '.comorbidinominusbtm', function (e) {
  jQuery(this).closest('.form-row').remove();
});

//add section
jQuery('body').on('click', '.comorbidinoplusbtm', function (e) {
  jQuery('.comorbidinodiv').append('<div class="form-row"><div class="col-md-3 mb-3"><input type="text" name="comorbidi[]" class="form-control" placeholder="Comorbidities" autocomplete="off" required></div><div class="col-md-1 mb-3"><label class="form-check-label" for="Since"><h4>Since</h4></label></div><div class="col-md-3 mb-3"><input type="text" name="comorbidino[]" class="form-control isnumbertype" placeholder="No." autocomplete="off" required></div><div class="col-md-3 mb-3"><select class="form-control"  name="comorbidays[]" required><option value="hours">Hrs</option><option value="days">Days</option><option value="weeks">Weeks</option><option value="months">Months</option><option value="years">Years</option></select></div><div class="col-md-2 mb-3"><span class="btn btn-primary comorbidinominusbtm">-</span></div></div>');
});
</script>
@endsection
