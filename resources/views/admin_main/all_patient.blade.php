
@extends('layouts.admin_main')
@section('content')
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
        <h3 class="card-title text-uppercase"><b>ALL PATIENTS LIST</b></h3>
        @if(session('role')==6)
        <form action="" method="get">
        <div class="row">
          <div class="col-xs-3">
            <input type="text" class="form-control" id="validationDefault03" placeholder="PHONE NUMBER" required name="phonenumber" maxlength="10"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength=10 pattern=".{10}" title="please enter minimum 10 digits to enter mobile number" autocomplete="off">
          </div>
          <div class="col-xs-2">
                <button type="submit" class="btn btn-primary btn-info" value="submit">Search</button>
          </div>
        </div>
        </form>
        @endif
        <div class="table-responsive">
          <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
               <th style="display:none;">id</th>
               <th>Name</th>
               @if(session('role')==5) <th>Doctor</th> @endif
               <th>
                @if(session('role')==5) Age @endif
                @if(session('role')==2) DOB @endif
               </th>
               <th>Sex</th>
               <th>Phone Number</th>
               <th>Email</th>
                @if(session('role')==6)
              <th>
                  Answer
              </th>
              @endif
               @if(session('role')==5)
               <th>Date</th>
               <th>Time</th>
               <th>Status</th>
               @else
               <th>Action</th>
               @endif
             </tr>
           </thead>
           <tbody>
            <?php //dd($PatientDetail); ?>
             @foreach($PatientDetail as $PatientDetail)
             <tr>
              <td style="display:none;">{{$PatientDetail->id}}</td>
              <td><a class="colorname" href="{{route('store_patient.edit', $PatientDetail->patient_id)}}">{{$PatientDetail->fname}}</a></td>
              {{-- <td>{{$PatientDetail->fname}}</td> --}}
              
              @if(session('role')==5) 
              <td>
                @php
                  $dataa=App\Appointments::select('d.fname as Dfname','date','time','flag')
                  ->leftjoin('users as d',  'appointment_details.doctor_id',  '=', 'd.id')
                  ->where('patient_id','=',$PatientDetail->patient_id)
                  ->orderby('date','DESC')->first();
                  //dd($dataa);
                @endphp
                {{@$dataa->Dfname}}
              </td> 
              @endif
              <td>
                @if(session('role')==5){{$PatientDetail->age}}@endif
                @if(session('role')==2)
                {{date("d-m-Y", strtotime($PatientDetail->dob))}}
                @endif
              </td>
              <td>{{$PatientDetail->gender}}</td>
              <td>{{$PatientDetail->contact_number}}</td>
              <td>{{$PatientDetail->email}}</td>
              @if(session('role')==5)
               <td>{{isset($dataa->date)?date("d-m-Y", strtotime($dataa->date)):'-'}}</td>
               <td>{{isset($dataa->time)?date("g:i A", strtotime($dataa->time)):'-'}}</td>
               <td>
                   @if(isset($dataa->flag))
                  @if($dataa->flag==0)
                    <label class="label label-info">Waiting</label>
                  @elseif($dataa->flag==1)
                    <label class="label label-success">Approved</label>
                  @elseif($dataa->flag==2)
                    <label class="label label-success">Complete</label>
                  @else
                    <label class="label label-danger">Rejected</label>
                  @endif
                  @endif
               </td>
               @else
               <?php if(session('role')==6){?>
                   
                   <td>
                        <a href="{{route("admin_main.answer", $PatientDetail->patient_id)}}" >View Detail</a>
                    </td>
               
            <!--<td>-->
            <!--  <a href="#" title="{{$PatientDetail->answer}}">{{ substr($PatientDetail->answer,0,30).".." }}</a>-->
            <!--</td>-->
            <!--<td>-->
            <!--  <a href="{{route('store_patient.edit', $PatientDetail->patient_id)}}">View Detail</a>-->
            <!--</td>-->
            <?php }?>
              <td>
               <?php if(session('role')==2){?>
                <?php $delete_url = route("store_patient.deletepatient", $PatientDetail->patient_id);?>
                <a href="{{route('store_patient.edit', $PatientDetail->patient_id)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <!-- <a style="color:red" onclick="return confirm(`<?php //echo $delete_url  ?>`,`Are you sure you want to delete this Patient ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a> -->
              <?php }else{?>
                <?php $delete_url = route("store_patient.deletepatient", $PatientDetail->patient_id);?>
                <a href="{{route('store_patient.edit', $PatientDetail->patient_id)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <!-- <a style="color:red" onclick="return confirm(`<?php //echo $delete_url  ?>`,`Are you sure you want to delete this Patient ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a> -->
                <?php if(session('role')==6){?>
                  <input type="hidden" name="pat_name" id="pat_name_{{$PatientDetail->patient_id}}" value="{{$PatientDetail->fname}}">
                  <a class="sharebttn" data-toggle="modal" data-target="#myModal" id="<?php echo $PatientDetail->patient_id; ?>" href="#" title="Share to Doctor"><i class="fa fa-share" aria-hidden="true"></i></a>
                  <a class="sharebttn_panalist" data-toggle="modal" data-target="#sharebttn_panalist" id="<?php echo $PatientDetail->patient_id; ?>" href="#" title="Share to Panellist"><i class="fa fa-share" aria-hidden="true"></i></a>
                <?php }?>
              <?php }?>
            </td>
            
            @endif
            
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
<!-- //model  -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Share Patient Information</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin_main.patientsharedoctor') }}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <div class="col-md-12 mb-2">
              <input type="hidden" class="form-control" name="pa_id" value="" id="pa_id">
              <label for="exampleInputEmail1">Patient Name</label>
              <input type="text" class="form-control" name="pa_name" value="" id="pa_name" readonly>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 mb-2">
              <label for="exampleInputEmail1">City</label>
              <?php  $city = \App\City::where('status',1)->get(); ?>
              <select class="form-control city" name="city" id="city" required="">
                <option class="form-control">Select City</option>
                @foreach($city as $c)
                <option class="form-control" value="{{$c->id}}">{{$c->city}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6 mb-2">
              <label for="exampleInputEmail1">Hostipal</label>
              <select class="form-control" name="hostipal" id="hospitalnew" required="">
                <option class="">Select Hostipal</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 mb-2">
              <label for="exampleInputEmail1">Speciality</label>
              <?php $speciality = \App\Speciality::where('status',1)->get(); ?>
              <select class="form-control speciality" name="speciality" required="">
                <option value="">Select speciality</option>
                @foreach($speciality as $c)
                <option <?php if(old('speciality') == $c['id']){ ?> selected="selected" <?php } ?> value="{{ $c['id'] }}">{{ $c['speciality'] }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6 mb-2">
              <label for="exampleInputEmail1">Doctor</label>
              <select class="form-control" name="doctorname" id="doctors" required="">
                <option class="">Select Doctor</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12 mb-2">
              <label for="exampleInputEmail1">Query Text</label>
              <textarea rows="4" class="form-control"  name="query_text" id="query_text" maxlength="250" placeholder="Query Text" required=""></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12 mt-2">
              <button type="submit" class="btn btn-default" >Share</button>
            </div>
          </div>
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>

  </div>
</div>
<script>
  $(document).ready(function(){
    $("body").on("click",".sharebttn",function(){
      var pid = $(this).attr('id');
      var pname = $('#pat_name_'+pid).val();
      var paid = $('#pa_id').val(pid);
      var paname = $('#pa_name').val(pname);
    });
  });
  $(document).ready(function(){
    $("body").on("click",".sharebttn_panalist",function(){
      var pid = $(this).attr('id');
      var pname = $('#pat_name_'+pid).val();
      var paid = $('#pan_id').val(pid);
      var paname = $('#pan_name').val(pname);
    });
  });
</script>

<!-- //panalaist model  -->
<div id="sharebttn_panalist" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Share Patient Information To Panelist</h4>
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      </div>
      <div class="modal-body">
        <form action="{{ route('poc.refer.patient') }}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <div class="col-md-12 mb-2">
              <input type="hidden" class="form-control" name="pan_id" value="" id="pan_id">
              <label for="exampleInputEmail1">Patient Name</label>
              <input type="text" class="form-control" name="pan_name" value="" id="pan_name" readonly>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 mb-2">
              <label for="exampleInputEmail1">City</label>
              <?php  $city = \App\City::where('status',1)->get(); ?>
              <select class="form-control cityfindpanelist" name="city" id="city" required>
                <option class="form-control">Select City</option>
                @foreach($city as $c)
                <option class="form-control" value="{{$c->id}}">{{$c->city}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6 mb-2">
              <label for="exampleInputEmail1">Panelist</label>
              <select class="form-control" name="panalist" id="panalistnew" required>
                <option class="">Select Panelist</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12 mb-2">
              <label for="exampleInputEmail1">Query Text</label>
              <textarea rows="4" class="form-control"  name="query_text" id="query_text" maxlength="250" placeholder="Query Text" required=""></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12 mt-2">
              <button type="submit" class="btn btn-default" >Share to Panelist</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
<script>
 $(document).ready(function(){
  $('.cityfindpanelist').change(function(){
    var id  = $(this).val();
    $.ajax({
      url:"{{ env('APP_URL') }}get/panelist/bycity/"+id,
      method:"get",
      success:function(e){

        var html = '<option value="" required>Select Panellist</option>';
        for(var i = 0; i < e.length; i++){
          console.log(e[i].id);
          html += "<option  value='"+e[i].id+"'>"+e[i].fname+"</option>";
        }
        $("#panalistnew").html(html);
      }
    });
  });
});
</script>
@endsection
