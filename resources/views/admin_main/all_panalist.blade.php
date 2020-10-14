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

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">Patient Data</h4>

                <div class="table-responsive m-t-40">

                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                        <thead>

                            <tr>



                                <th>Name</th>
                                
                                <th>Name Of POC</th>

                                <th>City</th>

                                <th>Date</th>                                

                                <th>Age</th>

                                <th>Sex</th>

                                <th>Phonenumber</th>

                                <th>Email</th>
                                
                                <th>Question</th>

                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>

                           @foreach($PatientDetail as $PatientDetail)

                         <?php //dd($PatientDetail); ?>

                                <tr>

                                    <td> 
                                        <!--<a href="{{ route('admin_main.panel.edit',$PatientDetail->uid) }}">-->
                                      <!--</a>-->
                                      {{$PatientDetail->fname}}
                                    </td>
                                    
                                     <td>{{$PatientDetail->pocname}}</td>

                                    <td>{{$PatientDetail->cityname}}</td>

                                    <td>{{date("d-m-Y", strtotime($PatientDetail->created_at))}}</td>
                                    


                                    <td>{{$PatientDetail->age}}</td>

                                    <td>{{$PatientDetail->gender}}</td>

                                    <td>{{$PatientDetail->contact_number}}</td>

                                    <td>{{$PatientDetail->email}}</td>
                                    
                                    <td> <a href="#" title="{{$PatientDetail->question}}">{{ substr($PatientDetail->question,0,30).".." }}</a></td>
                                    
                                    <td>

                                      <!--<a href="{{ route('admin_main.panel.edit',$PatientDetail->uid) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>-->
                                      
                                      
                                      <a href="{{route('admin_main.panel.panelreply',$PatientDetail->id)}}"><i class="fa fa-reply" aria-hidden="true"></i></a>
                                      
                                      
                                    </td>

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

        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->

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

              <select class="form-control city" name="city" id="city">

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

              <textarea rows="4" class="form-control"  name="query_text" id="query_text" maxlength="250" placeholder="Query Text"></textarea>

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

        <h4 class="modal-title">Share Patient Information To Panalist</h4>

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

                <label for="exampleInputEmail1">Panalist</label>

                <select class="form-control" name="panalist" id="panalistnew" required>

                  <option class="">Select Hostipal</option>

                </select>

            </div>

          </div>

          <div class="form-group">

            <div class="col-md-12 mb-2">

              <label for="exampleInputEmail1">Query Text</label>

              <textarea rows="4" class="form-control"  name="query_text" id="query_text" maxlength="250" placeholder="Query Text"></textarea>

            </div>

          </div>

          <div class="form-group">

            <div class="col-md-12 mt-2">

              <button type="submit" class="btn btn-default" >Share to Panalist</button>

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

$('.cityfindpanelist').change(function(){

    var id  = $(this).val();

    $.ajax({

        url:"http://localhost/sansoriamlive/get/panelist/bycity/"+id,

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

