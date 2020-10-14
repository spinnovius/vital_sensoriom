@extends('layouts.admin_main')
@section('content')
@if(isset($PatientDetail))
    @if(session('role')==2)
    <ul class="nav nav-tabs">
                 <li class="active"><a href="{{ route('store_patient.edit', $PatientDetail->uniqueid) }}">Details</a></li>
                <li ><a href="{{ route('admin_main.hopiindex', $PatientDetail->uniqueid) }}">HOPI</a></li>
                <li><a href="{{ route('admin_main.exindex', $PatientDetail->uniqueid) }}">General & Systemic Examination</a></li>
                {{--<li><a href="{{ route('admin_main.geindex', $PatientDetail->uniqueid) }}">General Examination</a></li>
                <li><a href="{{ route('admin_main.seindex', $PatientDetail->uniqueid) }}">Systemic Examination</a></li>
                <li ><a href="{{ route('admin_main.ppindex', $PatientDetail->uniqueid) }}">Prescription</a></li>
                <li><a href="{{ route('admin_main.atindex', $PatientDetail->uniqueid) }}">Advice Treatment</a></li> --}}
                <li><a href="{{ route('admin_main.clinical_managementindex', $PatientDetail->uniqueid) }}">CLINICAL MANAGEMENT</a></li>
                <li><a href="{{ route('store_patient.pasthealthrecords', $PatientDetail->uniqueid) }}">Past Health Records</a></li>
    </ul>
    @else
    
    <ul class="nav nav-tabs">
    <li class="active"><a href="{{ route('admin_main.panel.edit', $PatientDetail->uniqueid) }}">Details</a></li>
    <li ><a href="{{ route('admin_main.hopiindex', $PatientDetail->uniqueid) }}">HOPI</a></li>
    <li><a href="{{ route('admin_main.exindex', $PatientDetail->uniqueid) }}">General & Systemic Examination</a></li>
    {{--<li><a href="{{ route('admin_main.geindex', $PatientDetail->uniqueid) }}">General Examination</a></li>
    <li><a href="{{ route('admin_main.seindex', $PatientDetail->uniqueid) }}">Systemic Examination</a></li>
    <li ><a href="{{ route('admin_main.ppindex', $PatientDetail->uniqueid) }}">Prescription</a></li>
    <li><a href="{{ route('admin_main.atindex', $PatientDetail->uniqueid) }}">Advice Treatment</a></li> --}}
    <li><a href="{{ route('admin_main.clinical_managementindex', $PatientDetail->uniqueid) }}">CLINICAL MANAGEMENT</a></li>
    <li><a href="{{ route('store_patient.pasthealthrecords', $PatientDetail->uniqueid) }}">Past Health Records</a></li>
</ul>
    @endif
<!--    <section class="content-header">-->
<!--        <h3 style="margin-left: 22px;"></h3>-->
<!--    </section>-->
<!--@else-->
<!--    <section class="content-header">-->
<!--        <h3 style="margin-left: 22px;"></h3>-->
<!--    </section>-->
<!--@endif-->

<div class="col-md-12">
<!--<div class="container">-->
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
                @endif
                
                @if(isset($PatientDetail))
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" value="{{ $PatientDetail->uniqueid }}" name="id" />
                    <input type="hidden" name="hidden_image" value="{{$PatientDetail->profile_pic}}">
                @else
                <form action="" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                @endif
                <input type="hidden" name="role" value="{{session('role')}}">
                  <div class="form-row">
                    <div class="col-md-3 mb-3">
                      @if(isset($PatientDetail))
                      <input type="text" class="form-control" id="validationDefault01" placeholder="NAME"  required name="name" value="{{$PatientDetail['fname']}}" readonly>
                      @else
                      <input type="text" class="form-control" id="validationDefault01" placeholder="NAME"  required name="name" value="{{old('name')}}">
                      @endif
                    </div>

                    <!--<div class="col-md-2 mb-3">-->
                    <!--  @if(isset($PatientDetail))-->
                    <!--  <input type="text" class="form-control" id="validationDefault02" placeholder="AGE" required name="age" value="{{$PatientDetail['age']}}" maxlength="3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" readonly>-->
                    <!--  @else-->
                    <!--  <input type="text" class="form-control" id="validationDefault02" placeholder="AGE" required name="age" value="{{old('age')}}" maxlength="3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">-->
                    <!--  @endif-->
                    <!--</div>-->
                    
                     <div class="col-md-2 mb-3">
            @if(isset($PatientDetail))
            <input type="text" class="form-control dobDMYpicker" id="validationDefault02" placeholder="Date Of Birth" required name="age" value="{{date("d-m-Y", strtotime($PatientDetail['dob']))}}" maxlength="3" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" @if(session('role')==2 || session('role')==6) disabled @endif  readonly>
            @else
            <input type="text" class="form-control dobDMYpicker" id="validationDefault02" placeholder="Date Of Birth" required name="age" value="{{old('age')}}" maxlength="3" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
            @endif
          </div>

                    <div class="col-md-4 mb-3">
                      <div class="input-group">
                        @if(isset($PatientDetail))
                        <input type="hidden" name="gender" value="{{$PatientDetail['gender']}}">
                        <select class="form-control" name="gender" required="" disabled>
                          <option value="">Select Sex</option>
                          <option class="form-control" value="male" <?php if($PatientDetail['gender']=='male'||$PatientDetail['gender']=='Male'||$PatientDetail['gender']=='MALE'){?>selected="selected"<?php }?>>Male</option>
                          <option class="form-control" value="female" <?php if($PatientDetail['gender']=='female'||$PatientDetail['gender']=='Female'||$PatientDetail['gender']=='FEMALE'){?>selected="selected"<?php }?>>Female</option>
                        </select>
                        @else
                        <select class="form-control" name="gender" required="">
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
                        <input type="text" class="form-control" id="validationDefault03" placeholder="PHONE NUMBER" required name="phonenumber" maxlength="10" value="{{ $PatientDetail->contact_number }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength=10 pattern=".{10}" title="please enter minimum 10 digits to enter mobile number" autocomplete="off" readonly>

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
                        <input type="file" class="form-control" id="validationDefault03"name="profile" disabled>
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
                    
                 
                    
                    @if(isset($PatientDetail))

                    @else
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
                                    <input class="form-control" type="text" name="city_name" value="{{isset($poc_login->cityname)?$poc_login->cityname:''}}" readonly>
                                    <input class="form-control" type="hidden" name="city" value="{{isset($poc_login->city)?$poc_login->city:''}}" id="city_id" >
                                    @endif
                                  @endif
                      </div>
                      <div class="col-md-4 mb-3">
                                  @if(isset($PatientDetail))

                                  @else

                                     @if(session('role')==2)
                                     <input class="form-control" type="text" name="hostipal_name" value="{{isset($city_login->fname)?$city_login->fname:''}}" readonly>
                                     <input class="form-control" type="hidden" name="hostipal" value="{{isset($city_login->user_id)?$city_login->user_id:''}}">
                                     @endif

                                     @if(session('role')==5)
                                     <input class="form-control" type="text" name="hostipal_name" value="{{isset($city_login->fname)?$city_login->fname:''}}" readonly>
                                     <input class="form-control" type="hidden" name="hostipal" value="{{isset($city_login->user_id)?$city_login->user_id:''}}">
                                     @endif

                                     @if(session('role')==6)
                                     <input class="form-control" type="text" name="hostipal_name" value="{{isset($poc_login->manager_name)?$poc_login->manager_name:''}}" readonly>
                                     <input class="form-control" type="hidden" name="hostipal" value="{{isset($poc_login->user_id)?$poc_login->user_id:''}}">
                                     @endif

                                  @endif
                      </div>
                      <div class="col-md-4 mb-3">
                        <div class="input-group">
                                @if(isset($PatientDetail))

                                  @else

                                  <select class="form-control speciality" name="speciality" required="">
                                  <option value="">Select speciality</option>
                                  @foreach($speciality as $c)
                                  <option <?php if(old('speciality') == $c['id']){ ?> selected="selected" <?php } ?> value="{{ $c['id'] }}">{{ $c['speciality'] }}</option>
                                  @endforeach
                                  </select>
                                  @endif
                        </div>
                      </div>
                  </div>

                  <div class="form-row">
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

                        <input type="text" class="form-control singledate" name="date" placeholder="Date" value="{{old('date')}}" autocomplete="off" required="">
                        @endif
                      </div>
                      <div class="col-md-4 mb-3">
                        @if(isset($PatientDetail))

                        @else
                        <div class="input-group clockpicker">
                              <input type="text" class="form-control timepicker" placeholder="Time" id="single-input" name="time" value="{{old('time')}}" autocomplete="off" required="">
                              <div class="input-group-append">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                              </div>
                        </div>
                        @endif
                      </div>
                  </div>
                   <div class="form-row">
                    <div class="col-md-6 mb-3">
                      @if(isset($PatientDetail))

                      @else
                      <input type="text" class="form-control" id="validationDefault03" placeholder="AADHAAR NO.(OPTIONAL)" name="aadhaarno" value="{{old('aadhaarno')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                       @endif
                    </div>


                </form>
</div>
<!--</div>-->

@endsection
