
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
        <h3 class="card-title text-uppercase"><b>ALL Panelists LIST</b></h3>
        <div class="table-responsive">
          <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
               <th style="display:none;">id</th>
               <th>Name</th>
               <th>Panel Category</th>
               <th>Phone Number</th>
               <th>Email</th>
             </tr>
           </thead>
           <tbody>
             @foreach($panelists as $PatientDetail)
                <tr>
                <td style="display:none;">{{$PatientDetail->id}}</td>
                <!--<td><a class="colorname" href="{{route('store_patient.edit', $PatientDetail->id)}}">{{$PatientDetail->fname}}</a></td>-->
                <td>{{$PatientDetail->fname}}</td>
                <td>{{$PatientDetail->expertise}}</td>
                <td>{{$PatientDetail->contact_number}}</td>
                <td>{{$PatientDetail->email}}</td>
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
