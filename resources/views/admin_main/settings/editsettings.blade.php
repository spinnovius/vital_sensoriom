@extends('layouts.admin_main')
@section('content')
<section class="content-header" style="margin-bottom:2em; ">
  @if(session('role')=='2')
  @if (count($DoctorDays)==0)
  <h4 style="margin-left: 15px;">Add Settings</h4>
  @else
  <h4 style="margin-left: 15px;">Edit Settings</h4>
  @endif
  @else
  <h4 style="margin-left: 15px;">Edit Settings</h4>
  @endif
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
    @if(session('role')=='5')
    <form class="form-horizontal" action="{{ route('admin_main.updatesettings',auth()->user()->id)}}" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_method" value="PATCH">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" value="{{ $settings->id }}" name="id" />
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label><b>User Name</b></label>
          <input type="text" class="form-control" id="validationDefault01" placeholder="NAME"  required name="username" value="{{$settings['fname']}}">
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">  
          <label><b>City</b></label>
          <select class="form-control" name="city">
            <option value="">Select City</option>
            @foreach($city as $c)
            <option <?php if($settings->city == $c['id']){ ?> selected="selected" <?php } ?> value="{{ $c['id'] }}">{{ $c['city'] }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label><b>Address</b></label>
          <input type="text" class="form-control" id="validationDefault01" placeholder="NAME"  required name="address" value="{{$settings['address']}}">
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label><b>Current Password</b></label>
          <input type="password" class="form-control" id="validationDefault01" placeholder="Current Password" name="currentpassword" value="">
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label><b>Change Password</b></label>
          <input type="password" class="form-control" id="validationDefault01" placeholder="Change Password" name="newpassword" value="">
          <input type="hidden" class="form-control" id="validationDefault01" placeholder="Change Password" name="oldpassword" value="{{$settings['password']}}">
        </div>
      </div>
      <div class="form-row">
        <div class="custom-control custom-checkbox mr-sm-2 mb-3">
          <input type="checkbox" name="flag" class="form-control" id="checkbox0" value="1" <?php if($settings['book_flag']==1){?>checked <?php }?>>
          <label class="custom-control-label" for="checkbox0">Check this box to enable Appointment Booking Management System</label>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <button type="submit" class="btn btn-primary btn-info" value="submit" style="margin-left:10px">CONFIRM</button>
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
      </div>
    </div>
  </form>
  @endif
   @if(session('role')=='6')
    <form class="form-horizontal" action="{{ route('admin_main.updatesettings',auth()->user()->id)}}" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_method" value="PATCH">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" value="{{ $settings->id }}" name="id" />
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label><b>User Name</b></label>
          <input type="text" class="form-control" id="validationDefault01" placeholder="NAME"  required name="username" value="{{$settings['manager_name']}}">
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label><b>Email</b></label>
          <input type="text" class="form-control" id="validationDefault01" placeholder="email"  required name="email" value="{{$settings['email']}}" disabled>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label><b>Phone Number</b></label>
          <input type="text" class="form-control" id="" placeholder="phone number"  required name="phone_number" value="{{$settings['phone_number']}}" disabled>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">  
          <label><b>City</b></label>
          <select class="form-control" name="city">
            <option value="">Select City</option>
            @foreach($city as $c)
            <option <?php if($settings->city == $c['id']){ ?> selected="selected" <?php } ?> value="{{ $c['id'] }}">{{ $c['city'] }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label><b>Address</b></label>
          <input type="text" class="form-control" id="validationDefault01" placeholder="NAME"  required name="address" value="{{$settings['address']}}">
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label><b>Current Password</b></label>
          <input type="password" class="form-control" id="validationDefault01" placeholder="Current Password" name="currentpassword" value="">
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label><b>Change Password</b></label>
          <input type="password" class="form-control" id="validationDefault01" placeholder="Change Password" name="newpassword" value="">
          <input type="hidden" class="form-control" id="validationDefault01" placeholder="Change Password" name="oldpassword" value="{{$settings['password']}}">
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <button type="submit" class="btn btn-primary btn-info" value="submit" style="margin-left:10px">CONFIRM</button>
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
      </div>
    </div>
  </form>
  @endif
  @if(session('role')=='2')
  @if (count($DoctorDays)==0)
  <form class="form-horizontal" action="{{ route('admin_main.storedoctorsettings',auth()->user()->id)}}" method="post" enctype="multipart/form-data">
  @else
    <form class="form-horizontal" action="{{ route('admin_main.editdoctorsettings',auth()->user()->id)}}" method="post" enctype="multipart/form-data">
    {{method_field('PATCH')}}    
  @endif
    @csrf
      <div class="col-lg-12">
    @php
    //dd($DoctorDays[0]->time_slot);
    if(isset($DoctorDays)){
        $slottime=@$DoctorDays[0]->time_slot;
    }else{
        $slottime=15;
    }
    @endphp
    <div class="form-group col-lg-3 mr-2">
        <label class="control-label">Fee Of Consultation</label>
        @if(isset($DoctorDetail))
        <input type="number" class="form-control" id="" name="fee_of_consultation" value="{{ $DoctorDetail->fee_of_consultation }}"> 
        @else
        <input type="number" class="form-control" id="" name="fee_of_consultation" value="{{ old('fee_of_consultation') }}">
        @endif          
      </div>
    <div class="form-group col-lg-3">
        <label for="" class="control-label">Slot Time </label>
        <select class="form-control" name="timeslot" required="">
            <option class="form-control" value="2" {{$slottime == 2 ? "selected" : ""}}>2 Min</option>
            <option class="form-control" value="3" {{$slottime == 3 ? "selected" : ""}}>3 Min</option>
            <option class="form-control" value="5" {{$slottime == 5 ? "selected" : ""}}>5 Min</option>
            <option class="form-control" value="7" {{$slottime == 7 ? "selected" : ""}}>7 Min</option>
            <option class="form-control" value="10" {{$slottime == 10 ? "selected" : ""}}>10 Min</option>
            <option class="form-control" value="15" {{$slottime == 15 ? "selected" : ""}}>15 Min</option>
            <option class="form-control" value="20" {{$slottime == 20 ? "selected" : ""}}>20 Min</option>
            <option class="form-control" value="30" {{$slottime == 30 ? "selected" : ""}}>30 Min</option>
        </select>
    </div>
    @if(!isset($DoctorDetail))
    <div class="col-lg-12"></div>
    <div class="col-lg-6">
            <div class="row sundayachieve">
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label>                                          
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="sunday"  id="sundayInline1" name="days[]">
                            <label class="custom-control-label" for="sundayInline1">Sunday</label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control sunday_starttime" name="sunday_starttime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control sunday_endtime" name="sunday_endtime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary sundayplusbtm mt-5">+</span>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- monday -->
        <div class="col-lg-6">
            <div class="row mondayachieve">
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label><div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="monday" id="mondayInline2" name="days[]">
                            <label class="custom-control-label" for="mondayInline2">Monday</label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control monday_starttime" name="monday_starttime[]"  value="" autocomplete="off" >
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control monday_endtime" name="monday_endtime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary mondayplusbtm mt-5">+</span>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- tuesday -->
        <div class="col-lg-6">
            <div class="row tuesdayachieve">
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label><div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="tuesday" id="tuesdayInline2" name="days[]">
                            <label class="custom-control-label" for="tuesdayInline2">Tuesday</label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control tuesday_starttime" name="tuesday_starttime[]"  value="" autocomplete="off" >
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control tuesday_endtime" name="tuesday_endtime[]" value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary tuesdayplusbtm mt-5">+</span>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- wednesday -->
        <div class="col-lg-6">
            <div class="row wednesdayachieve">
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label><div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="wednesday" id="wednesdayInline2" name="days[]">
                            <label class="custom-control-label" for="wednesdayInline2">Wednesday</label>    
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control wednesday_starttime" name="wednesday_starttime[]"  value="" autocomplete="off" >
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label>
                        <input type="time" class="form-control wednesday_endtime" name="wednesday_endtime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary wednesdayplusbtm mt-5">+</span>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- thursday -->
        <div class="col-lg-6">
            <div class="row thursdayachieve">
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label><div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="thursday" id="thursdayInline2" name="days[]">
                            <label class="custom-control-label" for="thursdayInline2">Thursday</label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control thursday_starttime" name="thursday_starttime[]"  value="" autocomplete="off" >
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control thursday_endtime" name="thursday_endtime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary thursdayplusbtm mt-5">+</span>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- friday -->
        <div class="col-lg-6">
            <div class="row fridayachieve">
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label><div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="friday" id="fridayInline2" name="days[]">
                            <label class="custom-control-label" for="fridayInline2" style="margin-right: 15px;">Friday</label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control friday_starttime" name="friday_starttime[]"  value="" autocomplete="off" >
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control friday_endtime" name="friday_endtime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary fridayplusbtm mt-5">+</span>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- saturday -->
        <div class="col-lg-6">
            <div class="row saturdayachieve">
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label><div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="saturday" id="saturdayInline2" name="days[]">
                            <label class="custom-control-label" for="saturdayInline2">Saturday</label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control saturday_starttime" name="saturday_starttime[]"  value="" autocomplete="off" >
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control saturday_endtime" name="saturday_endtime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary saturdayplusbtm mt-5">+</span>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6">
          <button type="submit" class="btn btn-primary btn-info" value="submit">Submit</button>
        </div>
        @else
        <div class="col-lg-12"></div>
        <!-- sunday -->
        <div class="col-lg-6">
            <div class="row sundayachieve sundayform">
               @php
                $sundaydb=DB::table('doctor_days')->where('days','=','sunday')->where('user_id','=',$DoctorDetail->doctor_id)->get();
                @endphp
                @foreach ($sundaydb as $key=>$element)
                @if ($element->days == 'sunday')
                @if ($key == 0)
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="sunday"  id="sundayInline1" name="days[]" checked="">
                            <label class="custom-control-label" for="sundayednesdayInline1">Sunday</label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control sunday_starttime" name="sunday_starttime[]"  value="{{date("H:i", strtotime($element->start_time))}}" autocomplete="off">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control sunday_endtime" name="sunday_endtime[]"  value="{{date("H:i", strtotime($element->end_time))}}" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary sundayplusbtm mt-5">+</span>
                </div>
                @endif
                @if ($key != 0)
                <div class="col-lg-12 sundayrow">
                    <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="control-label">Start Time </label>
                                <input type="time" class="form-control basicExample" name="sunday_starttime[]"  value="{{date("H:i", strtotime($element->start_time))}}" autocomplete="off" >
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="control-label">End Time </label> 
                                <input type="time" class="form-control basicExample" name="sunday_endtime[]"  value="{{date("H:i", strtotime($element->end_time))}}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-1">
                            <span class="btn btn-primary sundayminusbtm mt-5">-</span>
                        </div>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
                @if (count($sundaydb) == 0)
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="sunday"  id="sundayInline1" name="days[]">
                            <label class="custom-control-label" for="sundayInline1">Sunday</label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control sunday_starttime" name="sunday_starttime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control sunday_endtime" name="sunday_endtime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary sundayplusbtm mt-5">+</span>
                </div>
                @endif
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- monday -->
        <div class="col-lg-6">
            <div class="row mondayachieve mondayform">
               @php
                $mondaydb=DB::table('doctor_days')->where('days','=','monday')->where('user_id','=',$DoctorDetail->doctor_id)->get();
                @endphp
                @foreach ($mondaydb as $key=>$element)
                @if ($element->days == 'monday')
                @if ($key == 0)
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="monday"  id="mondayInline1" name="days[]" checked="">
                            <label class="custom-control-label" for="mondayednesdayInline1">Monday</label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control monday_starttime" name="monday_starttime[]"  value="{{date("H:i", strtotime($element->start_time))}}" autocomplete="off">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control monday_endtime" name="monday_endtime[]"  value="{{date("H:i", strtotime($element->end_time))}}" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary mondayplusbtm mt-5">+</span>
                </div>
                @endif
                @if ($key != 0)
                <div class="col-lg-12 mondayrow">
                    <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="control-label">Start Time </label>
                                <input type="time" class="form-control basicExample" name="monday_starttime[]"  value="{{date("H:i", strtotime($element->start_time))}}" autocomplete="off" >
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="control-label">End Time </label> 
                                <input type="time" class="form-control basicExample" name="monday_endtime[]"  value="{{date("H:i", strtotime($element->end_time))}}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-1">
                            <span class="btn btn-primary mondayminusbtm mt-5">-</span>
                        </div>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
                @if (count($mondaydb) == 0)
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="monday"  id="mondayInline1" name="days[]">
                            <label class="custom-control-label" for="mondayInline1">Monday</label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control monday_starttime" name="monday_starttime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control monday_endtime" name="monday_endtime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary mondayplusbtm mt-5">+</span>
                </div>
                @endif
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- tuesday -->
        <div class="col-lg-6">
            <div class="row tuesdayachieve tuesdayform">
                @php
                $tuesdaydb=DB::table('doctor_days')->where('days','=','tuesday')->where('user_id','=',$DoctorDetail->doctor_id)->get();
                @endphp
                @foreach ($tuesdaydb as $key=>$element)
                @if ($element->days == 'tuesday')
                @if ($key == 0)
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="tuesday"  id="tuesdayInline1" name="days[]" checked="">
                            <label class="custom-control-label" for="tuesdayInline1">Tuesday</label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control tuesday_starttime" name="tuesday_starttime[]"  value="{{date("H:i", strtotime($element->start_time))}}" autocomplete="off">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control tuesday_endtime" name="tuesday_endtime[]"  value="{{date("H:i", strtotime($element->end_time))}}" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary tuesdayplusbtm mt-5">+</span>
                </div>
                @endif
                @if ($key != 0)
                <div class="col-lg-12 tuesdayrow">
                    <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="control-label">Start Time </label>
                                <input type="time" class="form-control basicExample" name="tuesday_starttime[]"  value="{{date("H:i", strtotime($element->start_time))}}" autocomplete="off" >
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="control-label">End Time </label> 
                                <input type="time" class="form-control basicExample" name="tuesday_endtime[]"  value="{{date("H:i", strtotime($element->end_time))}}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-1">
                            <span class="btn btn-primary tuesdayminusbtm mt-5">-</span>
                        </div>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
                @if (count($tuesdaydb) == 0)
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="tuesday"  id="tuesdayInline1" name="days[]">
                            <label class="custom-control-label" for="tuesdayInline1">Tuesday</label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control tuesday_starttime" name="tuesday_starttime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control tuesday_endtime" name="tuesday_endtime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary tuesdayplusbtm mt-5">+</span>
                </div>
                @endif
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- wednesday -->
        <div class="col-lg-6">
            <div class="row wednesdayachieve wednesdayform">
                @php
                $wednesdaydb=DB::table('doctor_days')->where('days','=','wednesday')->where('user_id','=',$DoctorDetail->doctor_id)->get();
                @endphp
                @foreach ($wednesdaydb as $key=>$element)
                @if ($element->days == 'wednesday')
                @if ($key == 0)
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="wednesday"  id="wednesdayInline1" name="days[]" checked="">
                            <label class="custom-control-label" for="wednesdayInline1">Wednesday</label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control wednesday_starttime" name="wednesday_starttime[]"  value="{{date("H:i", strtotime($element->start_time))}}" autocomplete="off">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control wednesday_endtime" name="wednesday_endtime[]"  value="{{date("H:i", strtotime($element->end_time))}}" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary wednesdayplusbtm mt-5">+</span>
                </div>
                @endif
                @if ($key != 0)
                <div class="col-lg-12 wednesdayrow">
                    <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="control-label">Start Time </label>
                                <input type="time" class="form-control basicExample" name="wednesday_starttime[]"  value="{{date("H:i", strtotime($element->start_time))}}" autocomplete="off" >
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="control-label">End Time </label> 
                                <input type="time" class="form-control basicExample" name="wednesday_endtime[]"  value="{{date("H:i", strtotime($element->end_time))}}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-1">
                            <span class="btn btn-primary wednesdayminusbtm mt-5">-</span>
                        </div>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
                @if (count($wednesdaydb) == 0)
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="wednesday"  id="wednesdayInline1" name="days[]">
                            <label class="custom-control-label" for="wednesdayInline1">Wednesday</label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control wednesday_starttime" name="wednesday_starttime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control wednesday_endtime" name="wednesday_endtime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary wednesdayplusbtm mt-5">+</span>
                </div>
                @endif
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- thursday -->
        <div class="col-lg-6">
            <div class="row thursdayachieve thursdayform">
                 @php
                $thursdaydb=DB::table('doctor_days')->where('days','=','thursday')->where('user_id','=',$DoctorDetail->doctor_id)->get();
                @endphp
                @foreach ($thursdaydb as $key=>$element)
                @if ($element->days == 'thursday')
                @if ($key == 0)
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="thursday"  id="thursdayInline1" name="days[]" checked="">
                            <label class="custom-control-label" for="thursdayInline1">Thursday</label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control thursday_starttime" name="thursday_starttime[]"  value="{{date("H:i", strtotime($element->start_time))}}" autocomplete="off">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control thursday_endtime" name="thursday_endtime[]"  value="{{date("H:i", strtotime($element->end_time))}}" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary thursdayplusbtm mt-5">+</span>
                </div>
                @endif
                @if ($key != 0)
                <div class="col-lg-12 thursdayrow">
                    <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="control-label">Start Time </label>
                                <input type="time" class="form-control basicExample" name="thursday_starttime[]"  value="{{date("H:i", strtotime($element->start_time))}}" autocomplete="off" >
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="control-label">End Time </label> 
                                <input type="time" class="form-control basicExample" name="thursday_endtime[]"  value="{{date("H:i", strtotime($element->end_time))}}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-1">
                            <span class="btn btn-primary thursdayminusbtm mt-5">-</span>
                        </div>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
                @if (count($thursdaydb) == 0)
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="thursday"  id="thursdayInline1" name="days[]">
                            <label class="custom-control-label" for="thursdayInline1">Thursday</label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control thursday_starttime" name="thursday_starttime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control thursday_endtime" name="thursday_endtime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary thursdayplusbtm mt-5">+</span>
                </div>
                @endif
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- friday -->
        <div class="col-lg-6">
            <div class="row fridayachieve">
                 @php
                $fridaydb=DB::table('doctor_days')->where('days','=','friday')->where('user_id','=',$DoctorDetail->doctor_id)->get();
                @endphp
                @foreach ($fridaydb as $key=>$element)
                @if ($element->days == 'friday')
                @if ($key == 0)
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="friday"  id="fridayInline1" name="days[]" checked="">
                            <label class="custom-control-label" for="fridayInline1" style="margin-right: 15px;">Friday</label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control friday_starttime" name="friday_starttime[]"  value="{{date("H:i", strtotime($element->start_time))}}" autocomplete="off">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control friday_endtime" name="friday_endtime[]"  value="{{date("H:i", strtotime($element->end_time))}}" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary fridayplusbtm mt-5">+</span>
                </div>
                @endif
                @if ($key != 0)
                <div class="col-lg-12 fridayrow">
                    <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="control-label">Start Time </label>
                                <input type="time" class="form-control basicExample" name="friday_starttime[]"  value="{{date("H:i", strtotime($element->start_time))}}" autocomplete="off" >
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="control-label">End Time </label> 
                                <input type="time" class="form-control basicExample" name="friday_endtime[]"  value="{{date("H:i", strtotime($element->end_time))}}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-1">
                            <span class="btn btn-primary fridayminusbtm mt-5">-</span>
                        </div>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
                @if (count($fridaydb) == 0)
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="friday"  id="fridayInline1" name="days[]">
                            <label class="custom-control-label" for="fridayInline1" style="margin-right: 15px;">Friday </label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control friday_starttime" name="friday_starttime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control friday_endtime" name="friday_endtime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary fridayplusbtm mt-5">+</span>
                </div>
                @endif
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- saturday -->
        <div class="col-lg-6">
            <div class="row saturdayachieve">
                @php
                $saturdaydb=DB::table('doctor_days')->where('days','=','saturday')->where('user_id','=',$DoctorDetail->doctor_id)->get();
                @endphp
                @foreach ($saturdaydb as $key=>$element)
                @if ($element->days == 'saturday')
                @if ($key == 0)
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="saturday"  id="saturdayInline1" name="days[]" checked="">
                            <label class="custom-control-label" for="saturdayInline1">Saturday</label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control  saturday_starttime" name=" saturday_starttime[]"  value="{{date("H:i", strtotime($element->start_time))}}" autocomplete="off">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control    panalistrefer_endtime" name="saturday_endtime[]"  value="{{date("H:i", strtotime($element->end_time))}}" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary saturdayplusbtm mt-5">+</span>
                </div>
                @endif
                @if ($key != 0)
                <div class="col-lg-12 saturdayrow">
                    <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="control-label">Start Time </label>
                                <input type="time" class="form-control basicExample" name="saturday_starttime[]"  value="{{date("H:i", strtotime($element->start_time))}}" autocomplete="off" >
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="control-label">End Time </label> 
                                <input type="time" class="form-control basicExample" name="saturday_endtime[]"  value="{{date("H:i", strtotime($element->end_time))}}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-1">
                            <span class="btn btn-primary saturdayminusbtm mt-5">-</span>
                        </div>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
                @if (count($saturdaydb) == 0)
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label">Days</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input col-lg-6" value="saturday"  id="saturdayInline1" name="days[]">
                            <label class="custom-control-label" for="saturdayInline1">Saturday</label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">Start Time </label>
                        <input type="time" class="form-control saturday_starttime" name="saturday_starttime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label">End Time </label> <input type="time" class="form-control saturday_endtime" name="saturday_endtime[]"  value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-1">
                    <span class="btn btn-primary saturdayplusbtm mt-5">+</span>
                </div>
                @endif
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 mb-5">
          <button type="submit" class="btn btn-primary btn-info" value="submit">Update</button>
        </div>
        @endif
        
  </div>
  </form>
  @endif
</div>
</div>
<script>
var count = 1;
// complainnoplusbtm
jQuery('body').on('click', '.sundayplusbtm', function (e) {
  jQuery('.sundayachieve').append('<div class="col-lg-12 sundayrow"><div class="row"><div class="col-3"></div><div class="col-4"><div class="form-group"><label for="" class="control-label">Start Time </label><input type="time" class="form-control basicExample" name="sunday_starttime[]"  value="" autocomplete="off" ></div></div><div class="col-4"><div class="form-group"><label for="" class="control-label">End Time </label> <input type="time" class="form-control basicExample" name="sunday_endtime[]"  value="" autocomplete="off"></div></div><div class="col-1"><span class="btn btn-primary sundayminusbtm mt-5">-</span></div></div></div>');
  count ++;
});
jQuery('body').on('click', '.sundayminusbtm', function (e) {
      jQuery(this).closest('.sundayrow').remove();
});
</script>
<!--monday-->
<script>
var count = 1;
// complainnoplusbtm
jQuery('body').on('click', '.mondayplusbtm', function (e) {
  jQuery('.mondayachieve').append('<div class="col-lg-12 mondayrow"><div class="row"><div class="col-3"></div><div class="col-4"><div class="form-group"><label for="" class="control-label">Start Time </label><input type="time" class="form-control basicExample" name="monday_starttime[]"  value="" autocomplete="off" ></div></div><div class="col-4"><div class="form-group"><label for="" class="control-label">End Time </label> <input type="time" class="form-control basicExample" name="monday_endtime"  value="" autocomplete="off"></div></div><div class="col-1"><span class="btn btn-primary mondayminusbtm mt-5">-</span></div></div></div>');
  count ++;
});
jQuery('body').on('click', '.mondayminusbtm', function (e) {
      jQuery(this).closest('.mondayrow').remove();
});
</script>
<!--tuesday-->
<script>
var count = 1;
// complainnoplusbtm
jQuery('body').on('click', '.tuesdayplusbtm', function (e) {
  jQuery('.tuesdayachieve').append('<div class="col-lg-12 tuesdayrow"><div class="row"><div class="col-3"></div><div class="col-4"><div class="form-group"><label for="" class="control-label">Start Time </label><input type="time" class="form-control basicExample" name="tuesday_starttime[]"  value="" autocomplete="off" ></div></div><div class="col-4"><div class="form-group"><label for="" class="control-label">End Time </label> <input type="time" class="form-control basicExample" name="tuesday_endtime[]"  value="" autocomplete="off"></div></div><div class="col-1"><span class="btn btn-primary tuesdayminusbtm mt-5">-</span></div></div></div>');
  count ++;
});
jQuery('body').on('click', '.tuesdayminusbtm', function (e) {
      jQuery(this).closest('.tuesdayrow').remove();
});
</script>
<!--wednesday-->
<script>
var count = 1;
// complainnoplusbtm
jQuery('body').on('click', '.wednesdayplusbtm', function (e) {
  jQuery('.wednesdayachieve').append('<div class="col-lg-12 wednesdayrow"><div class="row"><div class="col-3"></div><div class="col-4"><div class="form-group"><label for="" class="control-label">Start Time </label><input type="time" class="form-control basicExample" name="wednesday_starttime[]"  value="" autocomplete="off" ></div></div><div class="col-4"><div class="form-group"><label for="" class="control-label">End Time </label> <input type="time" class="form-control basicExample" name="wednesday_endtime[]"  value="" autocomplete="off"></div></div><div class="col-1"><span class="btn btn-primary wednesdayminusbtm mt-5">-</span></div></div></div>');
  count ++;
});
jQuery('body').on('click', '.wednesdayminusbtm', function (e) {
      jQuery(this).closest('.wednesdayrow').remove();
});
</script>
<!--thursday-->
<script>
var count = 1;
// complainnoplusbtm
jQuery('body').on('click', '.thursdayplusbtm', function (e) {
  jQuery('.thursdayachieve').append('<div class="col-lg-12 thursdayrow"><div class="row"><div class="col-3"></div><div class="col-4"><div class="form-group"><label for="" class="control-label">Start Time </label><input type="time" class="form-control basicExample" name="thursday_starttime[]"  value="" autocomplete="off" ></div></div><div class="col-4"><div class="form-group"><label for="" class="control-label">End Time </label> <input type="time" class="form-control basicExample" name="thursday_endtime[]"  value="" autocomplete="off"></div></div><div class="col-1"><span class="btn btn-primary thursdayminusbtm mt-5">-</span></div></div></div>');
  count ++;
});
jQuery('body').on('click', '.thursdayminusbtm', function (e) {
      jQuery(this).closest('.thursdayrow').remove();
});
</script>
<!--friday-->
<script>
var count = 1;
// complainnoplusbtm
jQuery('body').on('click', '.fridayplusbtm', function (e) {
  jQuery('.fridayachieve').append('<div class="col-lg-12 fridayrow"><div class="row"><div class="col-3"></div><div class="col-4"><div class="form-group"><label for="" class="control-label">Start Time </label><input type="time" class="form-control basicExample" name="friday_starttime[]"  value="" autocomplete="off" ></div></div><div class="col-4"><div class="form-group"><label for="" class="control-label">End Time </label> <input type="time" class="form-control basicExample" name="friday_endtime[]"  value="" autocomplete="off"></div></div><div class="col-1"><span class="btn btn-primary fridayminusbtm  mt-5">-</span></div></div></div>');
  count ++;
});
jQuery('body').on('click', '.fridayminusbtm', function (e) {
      jQuery(this).closest('.fridayrow').remove();
});
</script>
<!--saturday-->
<script>
var count = 1;
// complainnoplusbtm
jQuery('body').on('click', '.saturdayplusbtm', function (e) {
  jQuery('.saturdayachieve').append('<div class="col-lg-12 saturdayrow"><div class="row"><div class="col-3"></div><div class="col-4"><div class="form-group"><label for="" class="control-label">Start Time </label><input type="time" class="form-control basicExample" name="saturday_starttime[]"  value="" autocomplete="off" ></div></div><div class="col-4"><div class="form-group"><label for="" class="control-label">End Time </label> <input type="time" class="form-control basicExample" name="saturday_endtime[]"  value="" autocomplete="off"></div></div><div class="col-1"><span class="btn btn-primary saturdayminusbtm  mt-5">-</span></div></div></div>');
  count ++;
});
jQuery('body').on('click', '.saturdayminusbtm', function (e) {
      jQuery(this).closest('.saturdayrow').remove();
});
</script>

<script>
$('.basicExample').datetimepicker({
});
    $(function() {

     $("body").on("click",".custom-control-input", function(){
        
        var value= $(this).filter(':checked').val();
         if(value=='sunday')
          {
            $("input[name='sunday_starttime']").prop('required',true);
            $("input[name='sunday_endtime']").prop('required',true);
          }
          else
          {
            $("input[name='sunday_starttime']").removeAttr('required');
            $("input[name='sunday_endtime']").removeAttr('required');
          }

           if(value=='monday')
          {
            $("input[name='monday_starttime']").prop('required',true);
            $("input[name='monday_endtime']").prop('required',true);
          }
          else
          {
            $("input[name='monday_starttime']").removeAttr('required');
            $("input[name='monday_endtime']").removeAttr('required');
          }

           if(value=='tuesday')
          {
            $("input[name='tuesday_starttime']").prop('required',true);
            $("input[name='tuesday_endtime']").prop('required',true);
          }
          else{
            $("input[name='tuesday_starttime']").removeAttr('required');
            $("input[name='tuesday_endtime']").removeAttr('required');
          }

           if(value=='wednesday')
          {
            $("input[name='wednesday_starttime']").prop('required',true);
            $("input[name='wednesday_endtime']").prop('required',true);
          }else{

            $("input[name='wednesday_starttime']").removeAttr('required');
            $("input[name='wednesday_endtime']").removeAttr('required');
          }

           if(value=='thursday')
          {
            $("input[name='thursday_starttime']").prop('required',true);
            $("input[name='thursday_endtime']").prop('required',true);
          }
          else
          {
            $("input[name='thursday_starttime']").removeAttr('required');
            $("input[name='thursday_endtime']").removeAttr('required');
          }

           if(value=='friday')
          {
            $("input[name='friday_starttime']").prop('required',true);
            $("input[name='friday_endtime']").prop('required',true);
          }else{
            $("input[name='friday_starttime']").removeAttr('required');
            $("input[name='friday_endtime']").removeAttr('required');
          }

           if(value=='saturday')
          {
            $("input[name='saturday_starttime']").prop('required',true);
            $("input[name='saturday_endtime']").prop('required',true);
          }
          else
          {
            $("input[name='saturday_starttime']").removeAttr('required');
            $("input[name='saturday_endtime']").removeAttr('required');
          }
     });
  });
</script>
<!--Update Used start--->
@if(isset($DoctorDays))
<script>
 $(document).ready(function () {
    var days = '<?php echo URL::to('doctor/dayssearchtask',$DoctorDetail->doctor_id); ?>';
        $.ajax({
            type:'get',
            url:days,
            success:function(data){
                //console.log(data);
                var count = Object.keys(data).length;
                $.each(data, function(i, value) {
                   // $('.sundayform').append('<div class="col-3"><div class="form-group"><label for="" class="control-label">Days</label><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input col-lg-6" value="sunday"  id="sundayInline1" name="days[]"><label class="custom-control-label" for="sundayInline1">Sunday</label></div></div></div><div class="col-4"><div class="form-group"><label for="" class="control-label">Start Time </label><input type="time" class="form-control sunday_starttime" name="sunday_starttime[]"  value="" autocomplete="off"></div></div><div class="col-4"><div class="form-group"><label for="" class="control-label">End Time </label> <input type="time" class="form-control sunday_endtime" name="sunday_endtime[]"  value="'+value.start_time+'" autocomplete="off"></div></div><div class="col-1"><span class="btn btn-primary sundayplusbtm mt-5">+</span></div>');
                   
                });
               
              
            }

        });

 });
</script>
@endif
<!--Update Used end--->
@endsection
