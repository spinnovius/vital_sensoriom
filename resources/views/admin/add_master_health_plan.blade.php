@extends('layouts.admin')

@section('content')           
<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>Health Plan</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Health Plan</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            @if(Session::get('admin_role') == 1)
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

                    @if(isset($healthplan))
                    <form class="form-horizontal" action="{{ route('health_plan.update')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" value="{{ $healthplan[0]['id'] }}" name="id" />
                    @else
                    <form class="form-horizontal" action="{{ route('health_plan.store')}}" method="post" enctype="multipart/form-data">
                    @endif

                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="col-md-12">
                        <div class="col-md-6">                            
                            
                            <div class="form-group" style="padding: 1%;">
                                <label class="control-label">Name <span class="text-danger">*</span></label>
                                @if(isset($healthplan))
                                <input type="text" name="plan_name" class="form-control" value="{{ $healthplan[0]['plan_name'] }}"/>
                                @else
                                <input type="text" name="plan_name" class="form-control" value="{{ old('plan_name') }}"/>
                                @endif
                            </div>
                            
                            <div class="form-group" style="padding: 1%;">
                                <label class="control-label">City </label>
                                @if(isset($healthplan))
                                 <select class="form-control" name="city_id">
                                    @foreach($city as $c)
                                    <option class="form-control" value="{{$c->id}}" <?php if($healthplan[0]['city_id']==$c->id){ echo 'selected';}?>>{{$c->city}}</option>
                                    @endforeach
                                </select>
                                @else
                                
                                <select class="form-control" name="city_id">
                                    @foreach($city as $c)
                                    <option class="form-control" value="{{$c->id}}">{{$c->city}}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>

                        
                            <!-- <div class="form-group" style="padding: 1%;">
                                <label class="control-label">MD Physician Consults </label>
                                @if(isset($healthplan))
                                <input type="number" name="doctor" class="form-control" value="{{ $healthplan[0]['doctor'] }}"/>
                                @else
                                <input type="number" name="doctor" class="form-control" value="{{ old('doctor') }}"/>
                                @endif
                            </div>

                            <div class="form-group" style="padding: 1%;">
                                <label class="control-label">Special Workup </label>
                                <select class="form-control" name="special_workup">
                                    <option value="">Select One</option>
                                    <option <?php if(@$healthplan[0]['special_workup'] == 'None'){ ?> selected="selected" <?php } ?> value="None">None</option>
                                    <option <?php if(@$healthplan[0]['special_workup'] == 'Basic'){ ?> selected="selected" <?php } ?> value="Basic">Basic (ECG)</option>
                                    <option <?php if(@$healthplan[0]['special_workup'] == 'Advanced'){ ?> selected="selected" <?php } ?> value="Advanced">Advanced (ECG, ECHO)</option>
                                </select>
                            </div> -->

                        </div>
                        <div class="col-md-6">
                            <!-- <div class="form-group" style="padding: 1%;">
                                <label class="control-label">Specialist Doctor Consults </label>
                                @if(isset($healthplan))
                                <input type="number" name="appointment" class="form-control" value="{{ $healthplan[0]['appointment'] }}"/>
                                @else
                                <input type="number" name="appointment" class="form-control" value="{{ old('appointment') }}"/>
                                @endif
                            </div> -->

                            <div class="form-group" style="padding: 1%;">
                                <label class="control-label">One Line Description </label>
                                @if(isset($healthplan))
                                <input type="text-white" name="one_line_description" class="form-control" value="{{ $healthplan[0]['one_line_description'] }}" required=""/>
                                @else
                                <input type="text" name="one_line_description" class="form-control" value="{{ old('one_line_description') }}" required=""/>
                                @endif
                            </div>
                                <div class="form-group" style="padding: 1%;">
                                <label class="control-label">Price </label>
                                @if(isset($healthplan))
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-rupee"></i>
                                    </div>
                                    <!-- <input type="number" max="10000" class="form-control" name="price[]" id="price" required="" placeholder="Enter Price"> -->
                                <input type="number" name="price" class="form-control" value="{{ $healthplan[0]['price'] }}" required="true"/>
                                </div>
                                @else
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-rupee"></i>
                                    </div>
                                    <!-- <input type="number" max="10000" class="form-control" name="price[]" id="price" required="" placeholder="Enter Price"> -->
                                <input type="number" name="price" class="form-control" value="{{ old('price') }}" required="true"/>
                                </div>
                                @endif
                            </div>

                            <!-- <div class="form-group" style="padding: 1%;">
                                <label class="control-label">Plan Duration (month) </label>
                                @if(isset($healthplan))
                                <input type="number" name="duration" class="form-control" value="{{ $healthplan[0]['duration'] }}"/>
                                @else
                                <input type="number" name="duration" class="form-control" value="{{ old('duration') }}"/>
                                @endif
                            </div> -->

                        </div>

                    </div>
                    <div class="col-md-12">
                     <div class="col-md-6">
                     <div class="form-group" style="padding:1%;">
                                <input type="submit" value="Submit" name="submit" class="btn btn-info pull-left" />
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.box-body -->                    
                     </form>
            </div>
            @endif
            <div class="box">
                <div class="box-header">
                    <!--<h3 class="box-title">Hover Data Table</h3>-->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    
                        <table id="userdatatable2" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>City</th>
                                    <th>Price</th>
                                    <th>One Line Description</th>
                                    <th>Status</th>
                                    @if(Session::get('admin_role') == 1)
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                   
                </div>
                <!-- /.box-body -->
            </div>

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>


@endsection

@section('custom_js')     
<script>
    $(document).ready(function () {

        var userdatatable = $('#userdatatable2').DataTable({
            
            responsive: true,
            "processing": true,
            "ajax": "{{ route('health_plan.ajax.planarray') }}",
            "language": {
                "emptyTable": "No Health Plan available"
            },
            "order": [[0, "desc"]],
        });
        userdatatable.columns([0]).visible(false, false);
        
    }); // end of document ready
</script>
@endsection
