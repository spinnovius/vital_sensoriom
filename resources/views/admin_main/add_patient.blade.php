@extends('layouts.admin_main')
@section('content')

@if(isset($PatientDetail))
@if(session('role')==2 || session('role')==6 )
<ul class="nav nav-tabs">
  <li class="active"><a href="{{ route('store_patient.edit', $PatientDetail->uniqueid) }}">Details</a></li>
    @if(session('role') != 6)
   <li ><a href="{{ route('admin_main.hopiindex', $PatientDetail->uniqueid) }}">HOPI</a></li>
    <li><a href="{{ route('admin_main.exindex', $PatientDetail->uniqueid) }}">Examination</a></li>
    {{--<li><a href="{{ route('admin_main.geindex', $PatientDetail->uniqueid) }}">General Examination</a></li>
    <li><a href="{{ route('admin_main.seindex', $PatientDetail->uniqueid) }}">Systemic Examination</a></li>
    <li ><a href="{{ route('admin_main.ppindex', $PatientDetail->uniqueid) }}">Prescription</a></li>
    <li><a href="{{ route('admin_main.atindex', $PatientDetail->uniqueid) }}">Advice Treatment</a></li> --}}
    <li><a href="{{ route('admin_main.clinical_managementindex', $PatientDetail->uniqueid) }}">CLINICAL MANAGEMENT</a></li>
    @endif
    <li><a href="{{ route('store_patient.pasthealthrecords', $PatientDetail->uniqueid) }}">Past Health Records</a></li>
    @if(session('role') != 6)
    <li><a href="{{ route('admin_main.indexvitalslabtest', $PatientDetail->uniqueid) }}">Vitals Labtest</a></li>
    @endif
</ul>
@else
<ul class="nav nav-tabs">
    {{--
<li class="active"><a href="{{ route('store_patient.edit', $PatientDetail->uniqueid) }}">Details</a></li>
<li ><a href="{{ route('admin_main.hopiindex', $PatientDetail->uniqueid) }}">HOPI</a></li>
<li><a href="{{ route('admin_main.exindex', $PatientDetail->uniqueid) }}">Examination</a></li>
<li><a href="{{ route('admin_main.geindex', $PatientDetail->uniqueid) }}">General Examination</a></li>
<li><a href="{{ route('admin_main.seindex', $PatientDetail->uniqueid) }}">Systemic Examination</a></li>
<li ><a href="{{ route('admin_main.ppindex', $PatientDetail->uniqueid) }}">Prescription</a></li>
<li><a href="{{ route('admin_main.atindex', $PatientDetail->uniqueid) }}">Advice Treatment</a></li> 
<li><a href="{{ route('admin_main.clinical_managementindex', $PatientDetail->uniqueid) }}">CLINICAL MANAGEMENT</a></li>
<li><a href="{{ route('store_patient.pasthealthrecords', $PatientDetail->uniqueid) }}">Past Health Records</a></li>

--}}
    <li class="active"><a href="{{ route('store_patient.edit', $PatientDetail->uniqueid) }}">Details</a></li>
     <li><a href="{{ route('admin_main.vitalsindex', $PatientDetail->uniqueid) }}">Vitals</a></li>
     <li><a href="{{ route('admin_main.labtestindex', $PatientDetail->uniqueid) }}">Labtests</a></li>
     <li><a href="{{ route('admin_main.procedureindex', $PatientDetail->uniqueid) }}">Procedures</a></li>
</ul>
@endif
<!-- <section class="content-header"> -->
  <!-- <div class="card">
      <h4 class="card-title">Edit Patient</h4>
  </div> -->
  <!-- <h4 class="card-title">Edit Patient</h4> -->
  <!-- <h3 style="margin-left: 22px;">Edit Patient</h3> -->
<!-- </section> -->
@else
<!-- <section class="content-header"> -->
<!--   <div class="card">
      <h4 class="card-title">Add Patient</h4>
  </div> -->
  <!-- <h4 class="card-title">Add Patient</h4> -->
  <!-- <h3 style="margin-left: 22px;">Add Patient</h3> -->
<!-- </section> -->
@endif

<div class="col-md-12">
  <!-- <div class="container"> -->
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
    @if(isset($PatientDetail))
      <div class="">
        <h3 class="card-title text-uppercase"><b>Edit Patient</b></h3>
        {{--
        <h3 class="card-title text-uppercase"><b>@if(session('role')==2) Patient @else Edit Patient @endif</b></h3>
        --}}
        {{-- <div class="row">
          <div class="col-md-12 align-self-center text-right d-none d-md-block" style="padding-top: 1em;">
            <a class="btn btn-primary btn-info mr-auto" href="{{ route('store_patient.pasthealthrecords',$PatientDetail->uniqueid)}}">PAST HEALTH RECORDS</a>
          </div>
        </div> --}}
        <a class="btn btn-primary btn-info pull-right" href="{{ route('store_patient.pasthealthrecords', $PatientDetail->uniqueid) }}">Past Health Records</a>
      </div>
    @else
      <div class="card">
        <h3 class="card-title"><b>Add Patient</b></h3>
      </div>
    @endif
    

    @if(isset($PatientDetail))
    <form class="form-horizontal" action="{{ route('store_patient.update')}}" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_method" value="PATCH">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" value="{{ $PatientDetail->uniqueid }}" name="id" />
      <input type="hidden" name="hidden_image" value="{{$PatientDetail->profile_pic}}">
      @else
      <form action="{{ route('admin_main.store_patient')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        @endif
        <input type="hidden" name="role" value="4{{-- {{session('role')}} --}}">
        <div class="form-row">
          <div class="col-md-3 mb-3">
            @if(isset($PatientDetail))
            <input type="text" class="form-control" id="validationDefault01" placeholder="NAME"  required name="name" value="{{$PatientDetail['fname']}}" @if(session('role')==2 || session('role')==6 ||  session('role')==6 ||session('role')==5) readonly @endif>
            @else
            <input type="text" class="form-control" id="validationDefault01" placeholder="NAME"  required name="name" value="{{old('name')}}">
            @endif
          </div>

          <div class="col-md-2 mb-3">
            @if(isset($PatientDetail))
            <input type="text" class="form-control dobDMYpicker" id="validationDefault02" placeholder="Date Of Birth" required name="age" value="{{date("d-m-Y", strtotime($PatientDetail['dob']))}}" maxlength="3" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" @if(session('role')==2 || session('role')==6 ||session('role')==5) readonly @endif >
            @else
            <input type="text" class="form-control dobDMYpicker" id="validationDefault02" placeholder="Date Of Birth" required name="age" value="{{old('age')}}" maxlength="3" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
            @endif
          </div>

          <div class="col-md-4 mb-3">
            <div class="input-group">
              @if(isset($PatientDetail))
              <select class="form-control" name="gender" required="" @if(session('role')==2 || session('role')==6  || session('role')==5) disabled @endif style="width:125px;">
                <option value="">Sex</option>
                <option class="form-control" value="male" <?php if($PatientDetail['gender']=='male'||$PatientDetail['gender']=='Male'||$PatientDetail['gender']=='MALE'){?>selected="selected"<?php }?>>Male</option>
                <option class="form-control" value="female" <?php if($PatientDetail['gender']=='female'||$PatientDetail['gender']=='Female'||$PatientDetail['gender']=='FEMALE'){?>selected="selected"<?php }?>>Female</option>
              </select>
              @else
              <select class="form-control" name="gender" required="" @if(session('role')==2)  disabled @endif  style="width:125px;">
                <option value="">Select Sex</option>
                <option class="form-control" value="male">Male</option>
                <option class="form-control" value="female">Female</option>
              </select>
              @endif
            </div>
          </div>

        </div>
        <div class="form-row">

          <div class="col-md-5 mb-3">
            @if(isset($PatientDetail))
            <input type="text" class="form-control" id="validationDefault03" placeholder="PHONE NUMBER" required name="phonenumber" maxlength="10" value="{{ $PatientDetail->contact_number }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength=10 pattern=".{10}" title="please enter minimum 10 digits to enter mobile number" autocomplete="off" @if(session('role')==2 || session('role')==6 ||session('role')==5 ) readonly @endif>

            @else
            <input type="text" class="form-control" id="validationDefault03" placeholder="PHONE NUMBER" required name="phonenumber" maxlength="10" value="{{old('phonenumber')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength=10 pattern=".{10}" title="please enter minimum 10 digits to enter mobile number" autocomplete="off">
            @endif
          </div>

          <div class="col-md-5 mb-3">
            @if(isset($PatientDetail))
            <input type="email" class="form-control" id="validationDefault04" placeholder="EMAIL" required name="email" value="{{ $PatientDetail->email }}" readonly>
            @else
            <input type="email" class="form-control" id="validationDefault04" placeholder="EMAIL" required name="email" value="{{old('email')}}">
            @endif
          </div>
        </div>
        <div class="form-row">
          @if(isset($PatientDetail))
          <div class="col-md-5 mb-3">
            <input type="file" class="form-control" id="validationDefault03"name="profile" @if(session('role')==2 || session('role')==6 ||session('role')==5) disabled @endif>
            <?php if($PatientDetail->profile_pic != null){?>
              <img src="{{ env('APP_URL') .'/storage/app/'.$PatientDetail->profile_pic }}" style="width: 200px;height: 150px;">
            <?php }?>

          </div>
          @else
          <div class="col-md-5 mb-3">
            <input type="file" class="form-control" id="validationDefault03"name="profile">
          </div>
          @endif

        </div>
        @if(session('role')!=6)
        @if(!isset($PatientDetail))
        <section class="content-header">
          <h3>APPOINTMENT DETAILS</h3>
        </section>
        @endif

        <div class="form-row">
          <div class="col-md-4 mb-3">
            @if(isset($PatientDetail))

            @else

              @if(session('role')==2)
              <input class="form-control" type="text" name="city_name" value="{{isset($city_login->cityname)?$city_login->cityname:''}}" readonly>
              <input class="form-control" type="hidden" name="city" value="{{isset($city_login->city)?$city_login->city:''}}" id="city_id" >
              @endif

              @if(session('role')==5)
              <input class="form-control" type="text" name="city_name" value="{{isset($city_login->cityname)?$city_login->cityname:''}}" readonly>
              <input class="form-control" type="hidden" name="city" value="{{isset($city_login->city)?$city_login->city:''}}" id="city_id" >
              @endif

              @if(session('role')==6)
                  <select class="form-control cityselect" name="city_name" id="city_id" required="">
                  <option class="form-control">Select City</option>
                  @php
                    $city=App\City::get();
                  @endphp
                  @foreach($city as $c)
                  <option class="form-control" value="{{$c->id}}">{{$c->city}}</option>
                  @endforeach
                  </select>
              {{-- <input class="form-control cityselect" id="city" type="text" name="city_name" value="{{isset($poc_login->cityname)?$poc_login->cityname:''}}">
              <input class="form-control" type="hidden" name="city" value="{{isset($poc_login->city)?$poc_login->city:''}}" id="city_id" > --}}

              @endif
            @endif
          </div>
          
            @if(isset($PatientDetail))
            @else
              @if(session('role')==2)
              <div class="col-md-4 mb-3">
              <input class="form-control" type="text" name="hostipal_name" value="{{isset($city_login->fname)?$city_login->fname:''}}" readonly>
              <input class="form-control" type="hidden" name="hostipal" value="{{isset($city_login->user_id)?$city_login->user_id:''}}">
              </div>
              @endif
              @if(session('role')==5)
              <div class="col-md-4 mb-3">
              <input class="form-control" type="text" name="hostipal_name" value="{{isset($city_login->fname)?$city_login->fname:''}}" readonly>
              <input class="form-control" type="hidden" name="hostipal" value="{{isset($city_login->user_id)?$city_login->user_id:''}}">
                </div>
              @endif
            @endif
          

            @if(!isset($PatientDetail))
            <div class="col-md-4 mb-3">
              <div class="input-group">
                <select class="form-control specialitygetbypoc" name="speciality" required="">
                  <option value="">Select speciality</option>
                  @foreach($speciality as $c)
                  <option <?php if(old('speciality') == $c['id']){ ?> selected <?php } ?> value="{{ $c['id'] }}">{{ $c['speciality'] }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            @endif
          
        {{-- </div>

        <div class="form-row"> --}}
          <div class="col-md-4 mb-3">
            @if(isset($PatientDetail))
            @else
            <select class="form-control" name="doctorname" id="doctors" required="">
             <option class="">Select Doctor</option>
           </select>
           @endif
         </div>
         <div class="col-md-4 mb-3">
          @if(isset($PatientDetail))

          @else

          <input id="datesearchtask" type="text" class="form-control singleDMYdate" name="date" placeholder="Date" value="{{old('date')}}" autocomplete="off" required>
          @endif
        </div>
        <div class="col-md-4 mb-3">
          @if(isset($PatientDetail))

          @else
          <div class="input-group clockpicker">
            <select id="selecttime" class="form-control" name="time" required="">
            {{-- <option value="">Select Time</option> --}}
            <option value="">Time slot not selected</option>
            </select>
            {{-- <input type="text" class="form-control timepicker" placeholder="Time" id="single-input" name="time" value="{{old('time')}}" autocomplete="off" required="">
            <div class="input-group-append">
              <span class="input-group-text"><i class="far fa-clock"></i></span>
            </div> --}}
          </div>
          @endif
        </div>
      </div>
      @endif <!--session('role')!=5 end-->
      <div class="form-row">
          @if(!isset($PatientDetail))
          <div class="col-md-5 mb-3">
          <input type="text" class="form-control" id="validationDefault03" placeholder="AADHAAR NO.(OPTIONAL)" name="aadhaarno" value="{{old('aadhaarno')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
          </div>
          @endif
        
        
          @if(isset($PatientDetail))
          <div class="form-row">
            @if(session('role')==5)
            <div class="form-row">
              <div class="col-md-4">
                <button type="submit" class="btn btn-primary btn-info" value="submit" style="margin-left:10px"  >UPDATE ONLY</button>
              </div>
              <div class="col-md-4 ml-5">
                   <button type="submit" onclick="show_my_receipt()" class="btn btn-primary btn-info" value="submit" style="margin-left:10px"  >UPDATE & PRINT</button>
              {{--
              <a class="btn btn-primary btn-info" href="{{route('admin_main.printappointment', $PatientDetail->id)}}" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Print</a>
              --}}

              </div>
            </div>

            @endif
          </div>
          @else
          <div class="form-row">
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <button type="reset" class="btn btn-primary btn-info" value="Reset" style="margin-left:10px">RESET</button>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <button type="submit" class="btn btn-primary btn-info" value="submit" style="margin-left:10px">Submit</button>
              </div>
            </div>
          </div>
          @endif
        

      </form>
      @if(isset($PatientDetail))
          @if(session('role')==6)
          <div class="form-row">
          <form class="" action="{{ route('store_patient.patient_plan_store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" value="{{ $PatientDetail->uniqueid }}" name="patient_id" />
          
          <div class="col-md-4 mb-3">
            <select class="form-control" name="plan_id" required="">
              <option value="">Select Plan Name</option>
              
              @foreach($master_health_plan as $plan)
              <option <?php if(isset($patient_health_plan)?$patient_health_plan->plan_id:'0' == $plan->id ){ ?> selected <?php } ?> value="{{ $plan->id }}">
                {{ $plan->plan_name }} - {{ $plan->one_line_description }}
                <li role="separator" class="divider"></li>
              </option>
              @endforeach
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <select class="form-control" name="in_pay" required="">
              <option <?php if(isset($patient_health_plan)?$patient_health_plan->in_pay:'' == 1 ){ ?> selected <?php } ?>value="1">Paid</option>
              <option <?php if(isset($patient_health_plan)?$patient_health_plan->in_pay:'' == 0 ){ ?> selected <?php } ?>value="0">No Paid</option>
            </select>
          </div>
          <div class="col-md-4 mb-3">
              <div class="col-md-4 mb-3">
                <button type="submit" class="btn btn-primary btn-info" value="submit" style="margin-left:10px">UPDATE</button>
              </div>
              @if(isset($PatientDetail))
              @if(session('role')==6)
              <div class="col-md-4 mb-3 ml-2">
                  <a class="btn btn-primary btn-info" href="{{route('admin_main.printappointment', $PatientDetail->id)}}" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PRINT</a>
              </div>
              @endif
              @endif
            </div>
          </form>
        </div>
          @endif
          @endif
          
    </div>
    @if(session('role')==2)
      @php
        //dd($PatientDetail);
      @endphp
      <div class="form-group m-1">
        @if(isset($PatientDetail))
        <a class="btn btn-primary btn-info" href="{{route('admin_main.printappointment', $PatientDetail->id)}}" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Print</a>
        {{--onclick="redirectpastappointment()"--}}
        @endif    
      </div>
    @endif  
    
    @if(isset($PatientDetail))
    @if(session('role')==5)
    <h3 class="card-title text-uppercase style="margin-top: 20px;""><b> New Appointment Details</b></h3>
    <form class="form-inline" action="{{ route('admin_main.reappointment',$PatientDetail->id)}}" method="post" enctype="multipart/form-data" style="margin-top: -4px;">
      @csrf
      <div class="form-group m-1">
          <select class="form-control" id="doctorsnew" name="doctor" required="">
                <option class="form-control" value="">Select Doctor</option>
                @foreach ($doctorlist as $e)
                <option class="form-control" value="{{$e->id}}">{{$e->doctorname}}</option>
                @endforeach
          </select>
      </div>
      <div class="form-group m-1">
        <input type="text" id="datesearchtasknew" class="form-control singleDMYdate" name="date" placeholder="Date" autocomplete="off" required="">
      </div>
      <div class="form-group m-1">
      <select id="selecttimenew" class="form-control" name="time" required="">
            <option value="">Time slot not selected</option>
      </select>
      </div>
      {{--
      <div class="input-group m-1 clockpicker">
        <input type="text" class="form-control timepicker" placeholder="Time" id="single-input" name="time" autocomplete="off" required="">
        <div class="input-group-append">
          <span class="input-group-text"><i class="far fa-clock"></i></span>
        </div>
      </div>
      --}}
      <div class="form-group m-1">
        <button type="submit" class="btn btn-primary btn-info" value="submit">Re-Appointment</button>
      </div>
    </form>
    @endif
    @endif
  </div>
  <script>
  function show_my_receipt() {
// open the page as popup //
var page = '{{route('admin_main.printappointment', isset($PatientDetail->id)?$PatientDetail->id:'1')}}';
var myWindow = window.open(page, "_blank", "scrollbars=yes,width=400,height=500,top=300");
// focus on the popup //
myWindow.focus();
}
function redirectpastappointment() {
  window.location.href = "{{ env('APP_URL') }}pastappointment";
}
</script>
<script type="text/javascript">
  $('.specialitygetbypoc').change(function(){
            var id  = $(this).val();
            var city_id = $('#city_id').val();
            // alert(city_id);
            // alert(id);
            $.ajax({
                url:"{{ env('APP_URL') }}doctor/bySpeciality/"+id+"/"+city_id,
                method:"get",
                success:function(e){
                    var html = '<option value="" required>Select Doctor</option>';
                    for(var i = 0; i < e.length; i++){
                        html += "<option  value='"+e[i].id+"'>"+e[i].name+"</option>";
                    }
                    $("#doctors").html(html);
                }
            });
    });
</script>

<script type="text/javascript">
//phonenumber
$('#datesearchtask').on('change',function(){
var dateselect = $('#datesearchtask').val();
var doctor_id = $('#doctors').val();
$.ajax({
type : 'get',
url : '{{ env('APP_URL') }}patient/datesearchtask/'+doctor_id+'/'+dateselect,
success:function(data){
//console(data);
//alert(data);
//alert(obj);
    var html='';
     $.each(data, function(key,val) {             
            html += "<option  value='"+val.start_time+"'>"+val.start_time+'-'+val.end_time+"</option>";       
        });     
    $("#selecttime").html(html);
}
});
})
</script>

<script type="text/javascript">
// New Appointment Details
$('#datesearchtasknew').on('change',function(){
var dateselect = $('#datesearchtasknew').val();
var doctor_id = $('#doctorsnew').val();
$.ajax({
type : 'get',
url : '{{ env('APP_URL') }}patient/datesearchtask/'+doctor_id+'/'+dateselect,
success:function(data){
//console(data);
//alert(data);
//alert(obj);
    var html='';
     $.each(data, function(key,val) {             
            html += "<option  value='"+val.start_time+"'>"+val.start_time+'-'+val.end_time+"</option>";       
        });     
    $("#selecttimenew").html(html);
}
});
})
</script>
@endsection