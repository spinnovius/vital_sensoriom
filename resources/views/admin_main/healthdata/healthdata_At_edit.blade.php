@extends('layouts.admin_main')
@section('content')
<ul class="nav nav-tabs">
  <li><a href="{{ route('store_patient.edit', $patient_id) }}">Details</a></li>
  <li><a href="{{ route('admin_main.hopiindex', $patient_id) }}">HOPI</a></li>
  <li><a href="{{ route('admin_main.geindex', $patient_id) }}">General Examination</a></li>
  <li><a href="{{ route('admin_main.seindex', $patient_id) }}">Systemic Examination</a></li>
  <li><a href="{{ route('admin_main.ppindex', $patient_id) }}">Prescription</a></li>
  <li class="active"><a href="{{ route('admin_main.atindex', $patient_id) }}">Advice Treatment</a></li>
</ul>
<section class="content-header" style="padding-bottom: 1em;">
  <h3 style="margin-left: 22px;">Edit Advice Treatment</h3>
</section>
<div class="col-sm-10">
  <div class="container">
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


    <form action="{{ route('admin_main.atupdate',[$patient_id, $patientge->id])}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <input type="hidden" name="city" value="{{$patientge->city}}" id="city_value">
      <input type="hidden" name="hostipal" value="{{$patientge->hospital}}" id="hospital_value">
      <input type="hidden" name="speciality" value="{{$patientge->speciality}}" id="speciality_value">
      <input type="hidden" name="doctor" value="{{$dd->id}}" id="doctor_value">
      <label style="font-size: 1.3em;">Advice Investigations</label>
      <div class="form-row" style="margin-bottom: 1em;">
        <div class="col-md-6 mb-6">
          <textarea class="form-control" placeholder="Investigation" name="investigationnotes">{{$patientge->investigation_name}}</textarea>
        </div>
        <div class="col-md-6 mb-6">
          <input type="text" name="date" class="form-control atdate" placeholder="Select Date" autocomplete="off" value="{{$patientge->date}}">
        </div>
      </div>
      <label style="font-size: 1.3em;">Make Referrals</label>
      <div class="form-row" style="margin-bottom: 1em;">
        <div class="col-md-6 mb-6">
          <select class="form-control cityselect" name="city" id="city">
            <option class="form-control">Select City</option>
            @foreach($city as $c)
            <option class="form-control" value="{{$c->id}}" <?php if($patientge->city==$c->id){ echo 'selected';}?>>{{$c->city}}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-6 mb-6">
          <select class="form-control" name="hostipal" id="clinics" required="">
            <option class="">Select Clinic</option>
            
          </select>
        </div>

      </div>

      <div class="form-row" style="margin-bottom: 1em;">
        <div class="col-md-6 mb-6">
          <select class="form-control speciality" name="speciality" required="">
            <option value="">Select speciality</option>
            @foreach($speciality as $c)
            <option <?php if($patientge->speciality==$c->id){ echo 'selected';}?> value="{{ $c['id'] }}">{{ $c['speciality'] }}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-6 mb-6">
          <select class="form-control" name="doctorname" id="doctors" required="">
            <option class="">Select Doctor</option>
          </select>
        </div>
      </div>
      <label style="font-size: 1.3em;">Goals To Achieve</label>
      <div class="goalachieve">

        <?php
        if(count($patientgegoal) > 0){
         foreach ($patientgegoal as $key => $value): ?>
          <div class="form-row" style="margin-bottom: 0.2em;">
            <div class="col-md-2 mb-3">
              <input type="text" name="goal[]" class="form-control" placeholder="Goal" value="{{ $value->goal }}" required>
            </div>
            <div class="col-md-1 mb-3">
              <label class="form-check-label" for="Since"><h4>IN</h4></label>
            </div>
            <div class="col-md-2 mb-3">
              <input type="text" name="no[]" class="form-control isnumbertype" placeholder="No" value="{{ $value->no }}">
            </div>
            <div class="col-md-2 mb-3">
              <select class="form-control"  name="days[]" required>
              <option value="days" {{ ($value->daysofmonth == "days") ? "selected" : "" }}>Days</option>
              <option value="months" {{ ($value->daysofmonth == "months") ? "selected" : "" }}>Months</option>
            </select>
            </div>
            <div class="col-md-2 mb-3">
              <?php
               if($key == 0){ ?>
                <span class="btn btn-primary goaloplusbtm">+</span>
              <?php }else{ ?>
                <span class="btn btn-primary goalominusbtm">-</span>
              <?php } ?>
            </div>
          </div>
        <?php endforeach; }else{ ?>
          <div class="form-row" style="margin-bottom: 0.2em;">
            <div class="col-md-2 mb-3">
              <input type="text" name="goal[]" class="form-control" placeholder="Goal" value="">
            </div>
            <div class="col-md-1 mb-3">
              <label class="form-check-label" for="Since"><h4>IN</h4></label>
            </div>
            <div class="col-md-2 mb-3">
              <input type="text" name="no[]" class="form-control isnumbertype" placeholder="No" value="">
            </div>
            <div class="col-md-2 mb-3">
              <select class="form-control"  name="days[]" required>
              <option value="days">Days</option>
              <option value="months">Months</option>
            </select>
              <!-- <input type="text" name="days[]" class="form-control" placeholder="Days/Months"value=""> -->
            </div>
            <div class="col-md-2 mb-3">
                <span class="btn btn-primary goaloplusbtm">+</span>
            </div>
          </div>
        <?php } ?>
      </div>

      <div id="flats" style="margin-bottom: 0.2em;">
      </div>

      <div class="form-row">
        <div class="col-md-4">
          <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>
          <button type="submit" class="btn btn-primary btn-info" value="submit">UPDATE</button>
        </div>
      </div>

    </form>
  </div>
</div>
<script>
var count = 1;
// complainnoplusbtm
jQuery('body').on('click', '.goaloplusbtm', function (e) {
  jQuery('.goalachieve').append('<div class="form-row" style="margin-bottom: 0.2em;"><div class="col-md-2 mb-3"><input type="text" name="goal[]" class="form-control" placeholder="Goal"></div><div class="col-md-1 mb-3"><label class="form-check-label" for="Since"><h4>IN</h4></label></div><div class="col-md-2 mb-3"><input type="text" name="no[]" class="form-control isnumbertype" placeholder="No"></div><div class="col-md-2 mb-3"><select class="form-control"  name="days[]" required><option value="days">Days</option><option value="months">Months</option></select></div><div class="col-md-2 mb-3"><span class="btn btn-primary goalominusbtm">-</span></div></div>');
  count ++;
});
jQuery('body').on('click', '.goalominusbtm', function (e) {
      jQuery(this).closest('.form-row').remove();
});


$('.cityselect').change(function(){
      var id  = $(this).val();
      $.ajax({
          url:"{{ env('APP_URL') }}clinic/byCity/"+id,
          method:"get",
          success:function(e){
            // alert("ASd");
              var html = '<option value="" required>Select Clinic</option>';
              for(var i = 0; i < e.length; i++){
                // if(hostipal==e[i].id)
                // {
                //     selected="selected";  
                //     html += "<option value='"+e[i].id+"' "+selected+">"+e[i].name+"</option>";
                // }
                // else
                // {
                //     html += "<option value='"+e[i].id+"'>"+e[i].name+"</option>";
                // }
                  html += "<option  value='"+e[i].id+"'>"+e[i].name+"</option>";
              }
              $("#clinics").html(html);
          }
      });
});
var hostipal=$('#hospital_value').val();
var city=$('#city_value').val();
if(city != '')
    {
        var city=$('#city_value').val();
        $.ajax({
                url:"{{ env('APP_URL') }}clinic/byCity/"+city,
                method:"get",
                success:function(e){
                    var selected='';
                    var html = '<option value="" required>Select Clinic</option>';
                    for(var i = 0; i < e.length; i++){
                        if(hostipal==e[i].id)
                        {
                            selected="selected";  
                            html += "<option value='"+e[i].id+"' "+selected+">"+e[i].name+"</option>";
                        }
                        else
                        {
                            html += "<option value='"+e[i].id+"'>"+e[i].name+"</option>";
                        }
                    }
                    $("#clinics").html(html);
                }
        });
    }

</script>
@endsection
