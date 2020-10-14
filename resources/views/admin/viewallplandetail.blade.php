@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Plan All Detail</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="{{ route('health_plan.new') }}"><i class="fa fa-dashboard"></i>Plan List</a></li>        
        <li class="active">Plan All Detail</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class='row' id='pro_desc'>
        <div class="col-xs-12">
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
            @if( session('warning') )
            <div class="alert alert-warning alert-dismissable fade in alert_msg">            
                <span style='color:white'>{{ session('warning') }}</span>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
            @endif
        </div>
        <!-- profile left -->
        <div class='col-sm-4'>
            <div class="box box-primary">
                <div class="box-body box-profile">
                    
                    <h3 class="profile-username text-center">{{  $healthplan[0]['plan_name'] }}</h3>

                    <p class="text-muted text-center"></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Create Date</b>
                            @if($healthplan[0]['created_at'] != null)
                            <a class="pull-right">{{ date('m-d-Y',strtotime($healthplan[0]['created_at']))  }}</a>
                            @else
                            <a class="pull-right"> - </a>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Status</b> <a class="pull-right">@if($healthplan[0]['status'] == 1) <span style="color: green;">Active</span>@else <span style="color: red;">Inactive</span> @endif</a>
                        </li>
                        
                    </ul>                    
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- profile Right -->
        <div class='col-sm-8'>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    @if( session('success'))
                    <li class=""><a href="#detail" data-toggle="tab" aria-expanded="true">Details</a></li>
                    <li class="active"><a href="#description" data-toggle="tab" aria-expanded="false">Description</a></li>
                    @else
                    <li class="active"><a href="#detail" data-toggle="tab" aria-expanded="true">Details</a></li>
                    <li class=""><a href="#description" data-toggle="tab" aria-expanded="false">Description</a></li>
                    @endif
                </ul>
                <div class="tab-content">
                   <div class="tab-pane <?php if(!session('success')){?>active<?php } ?>" id="detail">
                        <table class="table table-striped" style="font-size: 13px !important">
                            <tbody>                                
                                <tr>
                                    <th>Price</th>
                                    <td><i class="fa fa-rupee"></i> {{  ($healthplan[0]['price'] != null) ? $healthplan[0]['price'] : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th>MD Physician Consults</th>
                                    <td>{{  ($healthplan[0]['doctor'] != null) ? $healthplan[0]['doctor'] : '-'  }}</td>
                                </tr> 
                                <tr>
                                    <th>Specialist Doctor Consults</th>
                                    <td>{{  ($healthplan[0]['appointment'] != null) ? $healthplan[0]['appointment'] : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th>One Line Description</th>
                                    <td>{{  ($healthplan[0]['one_line_description'] != null) ? $healthplan[0]['one_line_description'] : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th>Special Workup </th>
                                    <td>{{  ($healthplan[0]['special_workup'] != null) ? $healthplan[0]['special_workup'] : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th>Duration</th>
                                    <td>{{  ($healthplan[0]['duration'] != null) ? $healthplan[0]['duration'] : '-'  }} months</td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane <?php if( session('success')){ ?> active <?php } ?>" id="description">
                        <a class="pull-right" href="#" data-toggle="modal" data-target="#myModal">
                            <button class="btn btn-info">Add Description</button> 
                        </a><br><br><br> 
                        <table class="table table-striped" style="font-size: 13px !important">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                             
                                @foreach ($healthplandescription as $d)
                                <tr>
                                    <td>{{ $d['description'] }}</td>
                                    <td>
                                        @if($d['status'] ==1 )
                                        <a style="color:red" onclick="return confirm(`{{ route('health_plan.changestatus',array($d['id'] , 0)) }} `,`Are you sure you want to inactive this description ?`)"  href="#"><label class="label label-success">Active</label></a>
                                        @elseif($d['status'] == 0)
                                        <a style="color:red" onclick="return confirm(`{{ route('health_plan.changestatus',array($d['id'] , 1)) }}`,`Are you sure you want to active this description ?`)"  href="#"><label class="label label-danger">Inactive</label></a>
                                        @endif
                                    </td>
                                    <td>
                                        <a onclick="return editdescription(<?php echo $d['id'];?>,'<?php echo $d['description'];?>')" data-toggle="modal" data-target="#myModal1"   href="#"><label class="fa fa-pencil"></label></a>

                                        <a style="color:red" onclick="return confirm(`{{ route('health_plan.deletedescription', $d['id']) }} `,`Are you sure you want to delete this description ?`)"  href="#"><label class="fa fa-trash" style="color:red"></label></a>
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
</section>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
     <form  action="{{ route('health_plan.storedescription')}}" method="post">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="plan_id" value="{{ $healthplan[0]['id'] }}" />
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Description</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
                <label class="control-label">Description</label>
                <input type="text" name="description" class="form-control" value="" required="required" />
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-info">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>

  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
     <form  action="{{ route('health_plan.editdescription')}}" method="post">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="description_id" id="description_id"  />
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Description</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
                <label class="control-label">Description</label>
                <input type="text" name="description" class="form-control" id="description_detail" required="required" />
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-info">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
<!-- end of Main content -->
@endsection
<script type="text/javascript">
   function editdescription(id,description)
   {
        $('#description_id').val(id);
        $('#description_detail').val(description);
   }
</script>

