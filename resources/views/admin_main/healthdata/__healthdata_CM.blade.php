@extends('layouts.admin_main')
@section('content')
<style type="text/css">
.box{
width:600px;
margin:0 auto;
}
</style>
<ul class="nav nav-tabs">
<li><a href="{{ route('store_patient.edit', $patient_id) }}">Details</a></li>
<li><a href="{{ route('admin_main.hopiindex', $patient_id) }}">HOPI</a></li>
<li><a href="{{ route('admin_main.exindex', $patient_id) }}">General & Systemic Examination</a></li>
{{--<li><a href="{{ route('admin_main.geindex', $patient_id) }}">General Examination</a></li>
<li><a href="{{ route('admin_main.seindex', $patient_id) }}">Systemic Examination</a></li>
<li ><a href="{{ route('admin_main.ppindex', $patient_id) }}">Prescription</a></li>
<li><a href="{{ route('admin_main.atindex', $patient_id) }}">Advice Treatment</a></li> --}}
<li class="active"><a href="{{ route('admin_main.clinical_managementindex', $patient_id) }}">CLINICAL MANAGEMENT</a></li>
<li><a href="{{ route('store_patient.pasthealthrecords', $patient_id) }}">Past Health Records</a></li>
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
                {{-- <div class="row">
		            <div class="col-md-12 align-self-center text-right d-none d-md-block" style="padding-top: 1em;">
		                <a class="btn btn-info" href="{{ route('admin_main.atadd', $patient_id) }}"><i class="fa fa-plus-circle"></i> Add Advice Treatment</a>
		            </div>
            	</div> --}}
<div class="row">
    <div class="col-12">
        <div class="">
            <div class="card-body">
                <h3 class="card-title text-uppercase"><b>PROBABLE DIAGNOSIS:</b></h3>
                <a class="btn btn-primary btn-info pull-right" href="{{ route('store_patient.edit', $patient_id) }}">Skip</a>
                <form action="{{ route('admin_main.clinicalmanagementstore',$patient_id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">  
                            <textarea class="form-control" placeholder="Probable Diagnosis (if any.)" name="diagnosis"></textarea>
                        </div>
                    </div>
                    {{-- <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">  
                            <textarea class="form-control" placeholder="System Examination Notes" name="notes"></textarea>
                        </div>
                    </div> --}}
                <h3 class="card-title text-uppercase"><b>PRESCRIPTION:</b></h3>
                    <div class="form-row">
                        <div class="col-md-2 mb-3">
                            @php
                                //https://www.webslesson.info/2018/06/ajax-autocomplete-textbox-in-laravel-using-jquery.html
                            @endphp
                            <div class="form-group"> 
                                <input type="text" class="form-control"  id="drugname" name="drugname" placeholder="Drug Name" value="{{old('date')}}" autocomplete="on" required>
                                <div id="drugList" width="200px">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                          <input type="text" class="form-control" maxlength="5" id="validationDefault01" placeholder="DOSE (mg)" required name="dose" value="{{old('labtestname')}}">
                        </div>{{-- isnumbertype --}}
                        <div class="col-md-2 mb-3">
                          {{-- <input type="text" class="form-control isnumbertype" maxlength="5" id="validationDefault01" placeholder="Frequency"  required name="frequency" value="{{old('value')}}"> --}}
                          <select class="form-control" name="frequency" required>
                                <option class="form-control">Select Frequency</option>
                                <option class="form-control" value="Once daily">Once daily</option>
                                <option class="form-control" value="6 hourly daily">6 hourly daily</option>
                                <option class="form-control" value="8 hourly daily">8 hourly daily</option>
                                <option class="form-control" value="12 hourly daily">12 hourly daily</option>
                                <option class="form-control" value="Bed Time Only">Bed Time Only</option>
                                <option class="form-control" value="Empty stomach once daily">Empty stomach once daily</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">  
                          {{-- <input type="text" class="form-control" id="validationDefault01" placeholder="Route"  required name="route" value="{{old('value')}}"> --}}
                          <select class="form-control" name="route" required>
                                <option class="form-control">Select Route</option>
                                <option class="form-control" value="IV">IV</option>
                                <option class="form-control" value="NASAL">NASAL</option>
                                <option class="form-control" value="Oral">Oral</option>
                                <option class="form-control" value="SC">SC</option>
                                <option class="form-control" value="SL">SL</option>
                                <option class="form-control" value="TOPICAL">TOPICAL</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">  
                          <input type="text" class="form-control isnumbertype" maxlength="5" id="validationDefault01" placeholder="Duration"  required name="duration" value="{{old('value')}}">
                        </div>
                        <div class="col-md-2 mb-3">  
                          <textarea class="form-control" name="notes" placeholder="Prescription safety notes"></textarea>
                        </div>
                    </div>
                <h3 class="card-title text-uppercase"><b>Advice INVESTIGATIONS:</b></h3>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">
                            <textarea class="form-control" placeholder="Investigation" name="investigationnotes" required></textarea>
                        </div>
                        <div class="col-md-2 mb-6">
                            <input type="text" name="date" class="form-control atdate" placeholder="Select Date" autocomplete="off" required>
                        </div>
                        <div class="col-md-4 mb-6"></div>
                    </div>
                    <h3 class="card-title text-uppercase"><b>Make Referrals:</b></h3>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-3 mb-6">
                            <select class="form-control cityselect" name="city" id="city">
                                <option class="form-control">Select City</option>
                                @foreach($city as $c)
                                <option class="form-control" value="{{$c->id}}">{{$c->city}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-6">
                            <select class="form-control" name="hostipal" id="clinics">
                                <option class="">Select Clinic</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-6">
                            <select class="form-control specialityc" name="speciality">
                                <option value="">Select speciality</option>
                                @foreach($speciality as $c)
                                <option <?php if(old('speciality') == $c['id']){ ?> selected="selected" <?php } ?> value="{{ $c['id'] }}">{{ $c['speciality'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-6">
                            <select class="form-control" name="doctorname" id="doctors">
                                <option class="">Select Doctor</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                    <div class="col-md-6 mb-6 ">
                            <textarea class="form-control" placeholder="Reason for Referral (Mandatory)" name="reasonforreferral"></textarea>
                        </div>
                    </div>
                    <h3 class="card-title text-uppercase"><b>Goals To Achieve:</b></h3>
                    {{-- <label style="font-size: 1.3em;">Goals To Achieve</label> --}}
                    <div class="goalachieve">
                        <div class="form-row" style="margin-bottom: 0.2em;">
                            <div class="col-md-2 mb-3">
                                <input type="text" name="goal[]" class="form-control" placeholder="Goal" required>
                            </div>
                            <div class="col-md-1 mb-3">
                                <label class="form-check-label" for="Since"><h4>IN</h4></label>
                            </div>
                            <div class="col-md-2 mb-3">
                                <input type="text" name="no[]" class="form-control isnumbertype" placeholder="No.">
                            </div>
                            <div class="col-md-2 mb-3">
                                <select class="form-control"  name="days[]" required>
                                    <option value="days">Days</option>
                                    <option value="months">Months</option>
                                </select>
                                <!-- <input type="text" name="days[]" class="form-control" placeholder="Days/Months"> -->
                            </div>
                            <div class="col-md-2 mb-3">
                                <span class="btn btn-primary goaloplusbtm">+</span>
                            </div>
                        </div>
                    </div>
                    <div id="flats" style="margin-bottom: 0.2em;">
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 ml-auto">
                            <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>
                            <button type="submit" class="btn btn-primary btn-info" value="submit">SUBMIT</button>
                        </div>
                    </div>
                </form>
                <h3 class="card-title text-uppercase">
                    <b>PAST CLINICAL MANAGEMENT DATA</b>
                </h3>
                <h4 class="card-title">Diagnosis & Prescription</h4>                
                <div class="table-responsive">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>DATE</th>
                                <th>DOCTOR</th>
                                <th>PROBABLE DIAGNOSIS</th>
                                <th>Drug Name</th>
                                <th>Dose</th>
                                <th>Frequency</th>
                                <th>Route</th>
                                <th>Duration</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($lab_detail as $lab_detail)
                            <tr>
                                <td>{{date("d-m-Y", strtotime($lab_detail->created_at))}}</td>
                                {{-- <td>{{$lab_detail->date}}</td> --}}
                                
                                <td>{{@$lab_detail->doctor->fname}}</td>
                                <td>{{$lab_detail->diagnosis}}</td>
                                <td>{{$lab_detail->medicine_name}}</td>
                                <td>{{$lab_detail->dose}}</td>
                                <td>{{$lab_detail->freq}}</td>
                                <td>{{$lab_detail->route}}</td>
                                <td>{{$lab_detail->duration}}</td>
                                @php
                                    /*
                                <td>
                                    <?php $delete_url = route("admin_main.ppdelete", ["patient_id" =>$patient_id, "id" => $lab_detail->uniqueid]);?>
                                    <a href="{{route('admin_main.ppedit',["patient_id" =>$patient_id, "id" => $lab_detail->uniqueid])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a style="color:red" onclick="return confirm(`<?php echo $delete_url  ?>`,`Are you sure you want to delete this Prescription ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>
                                </td>
                                */
                                @endphp
                            </tr>
                            @endforeach  
                        </tbody>
                    </table>
                </div>
                <h4 class="card-title">Referral Data From This Clinic{{-- Advice Treatment Data --}}</h4>
                <div class="table-responsive">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>REFERRAL DATE</th>
                                <th>REFERRED TO DOCTOR NAME</th>
                                <th>REFERRED DOC CITY</th>
                                <th>REFERRED DOC CLINIC</th>
                                <th>REFERRED DOC SPECIALTY</th>
                                <th>REASON FOR REFERRAL</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($refer as $pd)
                             <tr>
                                <td>{{date("d-m-Y", strtotime($pd->date))}}</td>
                                <td>{{$pd->Dfname}}</td>
                                <td>{{$pd->city}}</td>
                                <td>{{$pd->Cfname}}</td>
                                @php
                                    // $select=DB::table('doctor_speciality_select')
                                    // ->leftjoin('doctor_speciality','doctor_speciality_select.speciality_id','=','doctor_speciality.id')
                                    // ->where('doctor_id','=',$pd->Did)
                                    // ->get();
                                    // $speciality=array();
                                    // foreach ($select as $key => $value) {
                                    //     //dd($value);
                                    //     $speciality[]=$value->speciality;
                                    // }
                                    // $specialityc=implode(",",$speciality);
                                @endphp
                                {{-- <td>
                                {{$specialityc}}
                                </td> --}}
                                <td>{{$pd->speciality}}</td>
                                <td>{{$pd->reason_refer}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                </div>
                <h4 class="card-title">Goals Settting Data</h4>
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Dates</th>
                                <th>Investigation</th>
                                <th>No.</th>
                                <th>DAYS/ WEEKS/ MONTHS/ YRS</th>
                            </tr>
                        </thead>
                        <tbody>  
                        @foreach($patient_detail as $patient_detail)
                             <tr>
                                        <td>{{date("d-m-Y", strtotime($patient_detail->date))}}</td>
                                        <td>{{$patient_detail->goal}}</td>
                                        <td>{{$patient_detail->no}}</td>
                                        <td>{{$patient_detail->daysofmonth}}</td>
                             </tr>
                         @endforeach  
                        </tbody>
                    </table>
                </div>
                
                <!--end-->
            </div>
        </div>
    </div>
</div>
<script>
    $('.specialityc').change(function(){
                    var id  = $(this).val();
                    var city_id = $('#city').val();
                    var clinic_id = $('#clinics').val();
                    //alert(clinic_id);
                    $.ajax({
                        url:"{{ env('APP_URL') }}doctor/bySpeciality/"+clinic_id+"/"+id+"/"+city_id,
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
<script>
var count = 1;
// complainnoplusbtm
jQuery('body').on('click', '.goaloplusbtm', function (e) {
  jQuery('.goalachieve').append('<div class="form-row" style="margin-bottom: 0.2em;"><div class="col-md-2 mb-3"><input type="text" name="goal[]" class="form-control" placeholder="Goal" required></div><div class="col-md-1 mb-3"><label class="form-check-label" for="Since"><h4>IN</h4></label></div><div class="col-md-2 mb-3"><input type="text" name="no[]" class="form-control isnumbertype" placeholder="No."></div><div class="col-md-2 mb-3"><select class="form-control"  name="days[]" required><option value="days">Days</option><option value="months">Months</option></select></div><div class="col-md-2 mb-3"><span class="btn btn-primary goalominusbtm">-</span></div></div>');
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
                  html += "<option  value='"+e[i].id+"'>"+e[i].name+"</option>";
              }
              $("#clinics").html(html);
          }
      });
});


</script>
<script>
$(document).ready(function(){

 $('#drugname').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('admin_main.medicinesList') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#drugList').fadeIn();  
                    $('#drugList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#drugname').val($(this).text());  
        $('#drugList').fadeOut();  
    });  

});
</script>
@endsection