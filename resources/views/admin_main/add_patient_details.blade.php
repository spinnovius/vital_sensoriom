@extends('layouts.admin_main')
@section('content')

@if(isset($PatientDetail))
    <ul class="nav nav-tabs">
                 <li class="active"><a href="#">Details</a></li>
                 <li><a href="#">Procedure</a></li>
                 <li><a href="#">Vital</a></li>
                 <li><a href="#">Labtest</a></li>
    </ul>
    <section class="content-header">
        <h3 style="margin-left: 22px;">Edit Patient</h3>    
    </section>
@else
     <ul class="nav nav-tabs">
                 <li class="active"><a href="#">Details</a></li>
                 <li><a href="#">Procedure</a></li>
                 <li><a href="#">Vital</a></li>
                 <li><a href="#">Labtest</a></li>
    </ul>
     <section class="content-header">
        <h3 style="margin-left: 22px;">Add Patient</h3>
    </section>
@endif

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
          
                @if(isset($PatientDetail))
                    <form class="form-horizontal" action="{{ route('store_patient.update')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" value="{{ $PatientDetail->uniqueid }}" name="id" />
                @else
                <form action="{{ route('admin_main.store_patient')}}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                @endif

                  <div class="form-row">
                    <div class="col-md-4 mb-3">
                      @if(isset($PatientDetail))
                      <input type="text" class="form-control" id="validationDefault01" placeholder="NAME"  required name="name" value="{{$PatientDetail['fname']}}">
                      @else
                      <input type="text" class="form-control" id="validationDefault01" placeholder="NAME"  required name="name" value="{{old('name')}}">
                      @endif
                    </div>

                    <div class="col-md-4 mb-3">  
                      @if(isset($PatientDetail))
                      <input type="text" class="form-control" id="validationDefault02" placeholder="AGE" required name="age" value="{{$PatientDetail['age']}}" maxlength="3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                      @else
                      <input type="text" class="form-control" id="validationDefault02" placeholder="AGE" required name="age" value="{{old('age')}}" maxlength="3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                      @endif
                    </div>

                    <div class="col-md-4 mb-3">
                      <div class="input-group">
                        @if(isset($PatientDetail))
                        <select class="form-control" name="gender">
                          <option >Select Sex</option>
                          <option class="form-control" value="male" <?php if($PatientDetail['gender']=='male'||$PatientDetail['gender']=='Male'||$PatientDetail['gender']=='MALE'){?>selected="selected"<?php }?>>Male</option>
                          <option class="form-control" value="female" <?php if($PatientDetail['gender']=='female'||$PatientDetail['gender']=='Female'||$PatientDetail['gender']=='FEMALE'){?>selected="selected"<?php }?>>FeMale</option>
                        </select>
                        @else
                        <select class="form-control" name="gender">
                          <option >Select Sex</option>
                          <option class="form-control" value="male">Male</option>
                          <option class="form-control" value="female">FeMale</option>
                        </select>
                        @endif
                      </div>
                    </div>

                  </div>
                  <div class="form-row">

                    <div class="col-md-6 mb-3">
                      @if(isset($PatientDetail))
                        <input type="text" class="form-control" id="validationDefault03" placeholder="PHONE NUMBER" required name="phonenumber" maxlength="10" value="{{ $PatientDetail->contact_number }}">
                        
                      @else
                      <input type="text" class="form-control" id="validationDefault03" placeholder="PHONE NUMBER" required name="phonenumber" maxlength="10" value="{{old('phonenumber')}}">
                      @endif
                    </div>

                    <div class="col-md-6 mb-3">
                      @if(isset($PatientDetail))
                         <input type="email" class="form-control" id="validationDefault04" placeholder="EMAIL" required name="email" value="{{ $PatientDetail->email }}">

                      @else
                      <input type="email" class="form-control" id="validationDefault04" placeholder="EMAIL" required name="email" value="{{old('email')}}">
                       @endif
                    </div>

                  </div>
                  <div class="form-row">
                    @if(isset($PatientDetail))
                    <div class="col-md-6 mb-3">
                        <input type="file" class="form-control" id="validationDefault03"name="profile">
                        <?php if($PatientDetail->profile_pic != null){?>
                        <img src="{{ env('APP_URL') .'/storage/app/'.$PatientDetail->profile_pic }}" style="width: 200px;height: 150px;">
                        <?php }?>
                        
                    </div>
                    @else
                    <div class="col-md-6 mb-3">
                        <input type="file" class="form-control" id="validationDefault03"name="profile">
                    </div>
                      @endif

                  </div>


                    <section class="content-header">
                      <h3>APPOINTMENT DETAILS</h3>
                    </section>

                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                      @if(isset($PatientDetail))
                        <input type="text" class="form-control" id="validationDefault01" placeholder="CITY" required name="city" value="{{ $PatientDetail->city_name }}">
                      @else
                      <input type="text" class="form-control" id="validationDefault01" placeholder="CITY" required name="city" value="{{old('city')}}">
                      @endif
                    </div>
                    <div class="col-md-4 mb-3">
                      @if(isset($PatientDetail))
                         <input type="text" class="form-control" id="validationDefault02" placeholder="HOSPITAL" required name="hostipal" value="{{ $PatientDetail->hospital }}">
                      @else  
                      <input type="text" class="form-control" id="validationDefault02" placeholder="HOSPITAL" required name="hostipal" value="{{old('hostipal')}}">
                      @endif
                    </div>
                    <div class="col-md-4 mb-3">
                      <div class="input-group">
                        @if(isset($PatientDetail))
                        <input type="text" class="form-control" id="validationDefaultUsername" placeholder="SPECIALITY" aria-describedby="inputGroupPrepend2" required name="speciality" value="{{ $PatientDetail->speciality }}">
                        @else 
                        <input type="text" class="form-control" id="validationDefaultUsername" placeholder="SPECIALITY" aria-describedby="inputGroupPrepend2" required name="speciality" value="{{old('speciality')}}">
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-4 mb-3">
                      @if(isset($PatientDetail))
                        <input type="text" class="form-control" id="validationDefault01" placeholder="DOCTOR'S NAME"  required name="doctorname" value="{{ $PatientDetail->doctor_name }}">
                      @else 
                      <input type="text" class="form-control" id="validationDefault01" placeholder="DOCTOR'S NAME"  required name="doctorname" value="{{old('doctorname')}}">
                      @endif
                    </div>
                    <div class="col-md-4 mb-3">  
                      @if(isset($PatientDetail))
                         <input type="text" class="form-control singledate" name="date" placeholder="Date" value="{{ $PatientDetail->date }}" autocomplete="off">
                      @else 

                      <input type="text" class="form-control singledate" name="date" placeholder="Date" value="{{old('date')}}" autocomplete="off">
                      @endif
                    </div>
                    <div class="col-md-4 mb-3">
                      @if(isset($PatientDetail))
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control timepicker" placeholder="Time" id="single-input" name="time" value="{{ $PatientDetail->time }}" autocomplete="off">
                            <div class="input-group-append">
                              <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                      </div>
                      @else 
                      <div class="input-group clockpicker">
                            <input type="text" class="form-control timepicker" placeholder="Time" id="single-input" name="time" value="{{old('time')}}" autocomplete="off">
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
                        <input type="text" class="form-control" id="validationDefault03" placeholder="AADHAAR NO.(OPTIONAL)" name="aadhaarno" value="{{ $PatientDetail->aadhaarno }}">
                      @else 
                      <input type="text" class="form-control" id="validationDefault03" placeholder="AADHAAR NO.(OPTIONAL)" name="aadhaarno" value="{{old('aadhaarno')}}">
                       @endif
                    </div>
                  </div>
                    <div class="form-row">
                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <button type="reset" class="btn btn-primary btn-info" value="Reset" style="margin-left:10px">RESET</button>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <button type="submit" class="btn btn-primary btn-info" value="submit" style="margin-left:10px">CONFIRM</button>
                        </div>
                      </div>
                    </div>
                </form>
</div>
</div>

@endsection
