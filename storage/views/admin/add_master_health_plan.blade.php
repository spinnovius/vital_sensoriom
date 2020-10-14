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
                                <label class="control-label">Name</label>
                                @if(isset($healthplan))
                                <input type="text" name="plan_name" class="form-control" value="{{ $healthplan[0]['plan_name'] }}"/>
                                @else
                                <input type="text" name="plan_name" class="form-control" value="{{ old('plan_name') }}"/>
                                @endif
                            </div>

                            <div class="form-group" style="padding: 1%;">
                                <label class="control-label">Price</label>
                                @if(isset($healthplan))
                                <input type="number" name="price" class="form-control" value="{{ $healthplan[0]['price'] }}"/>
                                @else
                                <input type="number" name="price" class="form-control" value="{{ old('price') }}"/>
                                @endif
                            </div>

                            <div class="form-group" style="padding: 1%;">
                                <label class="control-label">Doctor</label>
                                @if(isset($healthplan))
                                <input type="number" name="doctor" class="form-control" value="{{ $healthplan[0]['doctor'] }}"/>
                                @else
                                <input type="number" name="doctor" class="form-control" value="{{ old('doctor') }}"/>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group" style="padding: 1%;">
                                <label class="control-label">Appointment</label>
                                @if(isset($healthplan))
                                <input type="number" name="appointment" class="form-control" value="{{ $healthplan[0]['appointment'] }}"/>
                                @else
                                <input type="number" name="appointment" class="form-control" value="{{ old('appointment') }}"/>
                                @endif
                            </div>

                            <div class="form-group" style="padding: 1%;">
                                <label class="control-label">Free Test</label>
                                @if(isset($healthplan))
                                <input type="number" name="free_test" class="form-control" value="{{ $healthplan[0]['free_test'] }}"/>
                                @else
                                <input type="number" name="free_test" class="form-control" value="{{ old('free_test') }}"/>
                                @endif
                            </div>
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
                                    <th>Price</th>
                                    <th>Doctor</th>
                                    <th>Appointment</th>
                                    <th>Free Test</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
