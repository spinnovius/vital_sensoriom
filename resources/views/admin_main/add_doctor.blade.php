@extends('layouts.admin_main')
@section('custom_head')
@endsection
@section('content')
@if(isset($Doctormain))
    <section class="content-header">
        <h1>Edit Doctor</h1>
    </section>
@else
    <section class="content-header">
        <h1>Add Doctor</h1>
    </section>
@endif
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">

            <div class="box box-info">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class='text-white'>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- /.box-header -->
                <!-- form start -->
                <!-- Error message -->
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

                 @if(isset($Doctormain))
                    <form class="form-horizontal" action="{{ route('doctor.updatedotors')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" value="{{ isset($Doctormain[0]['uniqueid'])?$Doctormain[0]['uniqueid']:'' }}" name="id" />
                    <input type="hidden" value="{{ isset($Doctormain[0]['profile_pic'])?$Doctormain[0]['profile_pic']:'' }}" name="profile_pic" />
                    @else 
                    <form class="form-horizontal" action="{{ route('admin_main.store_doctor') }}" method="post" enctype="multipart/form-data" id="doctor_form">
                    @endif 

                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="col-md-6">                            
                            <div class="form-group">
                                <label class="control-label">City <span class="text-danger">*</span></label>
                                @if(isset($Doctormain))
                                    <input class="form-control" type="text" name="city_name" value="{{isset($city_login->cityname)?$city_login->cityname:$poc_login->cityname}}" readonly>
                                    <input class="form-control" type="hidden" name="city" value="{{$Doctormain[0]['city'] }}" id="city_id" >
                                @else
                                    <input class="form-control" type="text" name="city_name" value="{{isset($city_login->cityname)?$city_login->cityname:$poc_login->cityname}}" readonly>
                                    <input class="form-control" type="hidden" name="city" value="{{isset($city_login->city)?$city_login->city:$poc_login->city}}" id="city_id" >
                                @endif                            
                            </div>

<!-- 

                            <div class="form-group">
                                <label class="control-label">Speciality <span class="text-danger">*</span></label>
                                @if(isset($Doctormain))
                                <select class="select2 col-sm-12" name="speciality[]" required="" multiple="multiple" disabled>
                                <option value="">Select Speciality</option>
                                @foreach($speciality as $c)
                                <option <?php if(in_array($c['id'],$doctor_speciality)){?>
                                 selected="selected" 
                                 <?php } ?> value="{{ $c['id'] }}">{{ $c['speciality'] }}
                                </option>
                                @endforeach
                                </select>
                                @else
                                
                                <select class="select2 col-sm-12" name="speciality[]" required=""  multiple="multiple">
                                <option value="">Select speciality</option>
                                @foreach($speciality as $c)
                                <option <?php if(old('speciality') == $c['id']){ ?> selected="selected" <?php } ?> value="{{ $c['id'] }}" readonly>{{ $c['speciality'] }}</option>
                                @endforeach
                                </select>
                                @endif                        
                            </div> -->

                            <div class="form-group">
                                <label class="control-label">Speciality<span class="text-danger">*</span></label>
                                @if(isset($Doctormain))
                              
                                <select class="select2 col-sm-12" name="speciality" required="" disabled>
                                <option value="">Select Speciality</option>
                                @foreach($speciality as $c)
                                <option <?php if(in_array($c['id'],$doctor_speciality)){?>
                                 selected="selected" 
                                 <?php }else{echo "disabled";} ?> value="{{ $c['id'] }}">{{ $c['speciality'] }}
                                 
                                </option>
                                @endforeach
                                </select>
                                @else
                                
                                <select class="select2 col-sm-12" name="speciality" required="">
                                <option value="">Select speciality</option>
                                @foreach($speciality as $c)
                                <option <?php if(old('speciality') == $c['id']){ ?> selected="selected" <?php } ?> value="{{ $c['id'] }}" readonly>{{ $c['speciality'] }}</option>
                                @endforeach
                                </select>
                                @endif                        
                            </div>


                            <div class="form-group">
                                <label class="control-label">Doctor Name<span class="text-danger">*</span></label>
                                @if(isset($Doctormain))
                                <input type="text" class="form-control" id="doctor_name" name="doctor_name" value="{{ $Doctormain[0]['fname'] }}" readonly>  
                                @else
                                <input type="text" class="form-control" id="doctor_name" name="doctor_name" value="{{ old('doctor_name') }}" required="">
                                @endif        
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label">Experience Year<span class="text-danger">*</span></label>
                                @if(isset($Doctormain))
                                <input type="number" class="form-control" id="exp_year" name="exp_year" value="{{ $Doctormain[0]['exp_year'] }}">  
                                @else
                                <input type="number" class="form-control" id="exp_year" name="exp_year" value="{{ old('exp_year') }}" required="">
                                @endif        
                            </div>

                            <div class="form-group">
                                <label class="control-label">Phone Number<span class="text-danger">*</span></label>
                                @if(isset($Doctormain))
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $Doctormain[0]['contact_number'] }}" required maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength=10 pattern=".{10}" title="please enter minimum 10 digits to enter mobile number" autocomplete="off" readonly> 
                                @else
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}"  required="" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength=10 pattern=".{10}" title="please enter minimum 10 digits to enter mobile number" autocomplete="off">
                                @endif         
                            </div>

                            <div class="form-group">
                                <label class="control-label">Email<span class="text-danger">*</span></label>
                                @if(isset($Doctormain))
                                <input type="email" class="form-control" id="email" name="email" value="{{ $Doctormain[0]['email'] }}" readonly> 
                                @else
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required="">
                                @endif          
                            </div>

                            <div class="form-group">
                                <label class="control-label">Registration No.(OPTIONAL)</label>
                                @if(isset($Doctormain))
                                <input type="text" class="form-control" id="registration_no" name="registration_no" value="{{ $Doctormain[0]['mbbs_registration_number'] }}"> 
                                @else
                                <input type="text" class="form-control" id="registration_no" name="registration_no" value="{{ old('registration_no') }}">
                                @endif          
                            </div>
                            <div class="form-group">
                                <label class="control-label">Registration Council(OPTIONAL)</label>
                                @if(isset($Doctormain))
                                    <select class="form-control" name="registration_council">
                                    <option value="">Select Register Council</option>
                                    @foreach($authorityCouncil as $c)
                                    <option <?php if($Doctormain[0]['mbbs_authority_council_name'] == $c['id']){ ?> selected="selected" <?php } ?> value="{{ $c['id'] }}">{{ $c['name'] }}</option>
                                    @endforeach
                                    </select>
                                @else
                                    <select class="form-control" name="registration_council">
                                    <option value="">Select Register Council</option>
                                    @foreach($authorityCouncil as $c)
                                    <option <?php if(old('Council') == $c['id']){ ?> selected="selected" <?php } ?> value="{{ $c['id'] }}">{{ $c['name'] }}</option>
                                    @endforeach
                                    </select>
                                @endif   
                            </div>

                            <div class="form-group">
                                <label class="control-label">Aadhaar No.(OPTIONAL)</label>
                                @if(isset($Doctormain))
                                <input type="text" class="form-control" id="aadhhar_no" name="aadhhar_no" value="{{ $Doctormain[0]['aadhhar_no'] }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"> 
                                @else
                                <input type="text" class="form-control" id="aadhhar_no" name="aadhhar_no" value="{{ old('aadhhar_no') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                @endif  
                            </div>
                            <div class="form-group">
                                @if(isset($Doctormain))
                                <label class="control-label">Profile Pic</label>
                                
                                    <input type="file" class="form-control" id="validationDefault03"name="profile">
                                    <?php if($Doctormain[0]['profile_pic'] != null){?>
                                    <img src="{{ env('APP_URL') .'/storage/app/'.$Doctormain[0]['profile_pic'] }}" style="width: 200px;height: 150px;">
                                    <?php }?>
                                    
                                
                                @else
                                <label class="control-label">Profile Pic</label>
                                
                                    <input type="file" class="form-control" id="validationDefault03"name="profile">
                                  @endif

                            </div>
                    <div class="form-group col-lg-12">
                        @if(isset($Doctormain))
                        <div class="form-row">
                            <div class="form-group">
                                <div class="col-md-4 mb-3">

                                    <button type="reset" class="btn btn-primary btn-info" value="Reset" style="margin-left:10px">RESET</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 mb-3">
                                    <button id="myForm" type="submit" class="btn btn-primary btn-info" value="submit" style="margin-left:10px">UPDATE</button>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="form-row">
                            <div class="form-group">
                                <div class="col-md-4 mb-3">
                                    <button type="reset" class="btn btn-primary btn-info" value="Reset" style="margin-left:10px">RESET</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 mb-3">
                                    <button type="submit" class="btn btn-primary btn-info" value="submit" style="margin-left:10px">CONFIRM</button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                 </div>
                    <!-- /.box-body -->                    
             </form>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection
@section('custom_js')
<script>
    $('#myForm').submit(function() {
    $('select').removeAttr('disabled');
});
</script>
@endsection
