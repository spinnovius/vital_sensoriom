@extends('layouts.admin')

@section('content')           
<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>Health Problem</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Health Problem</a></li>
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

                    @if(isset($healthproblem))
                    <form class="form-horizontal" action="{{ route('health_problem.update')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" value="{{ $healthproblem[0]['id'] }}" name="id" />
                    @else
                    <form class="form-horizontal" action="{{ route('health_problem.store')}}" method="post" enctype="multipart/form-data">
                    @endif

                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="col-md-6">                            
                            <div class="form-group">
                                <label class="control-label">Health Problem <span class="text-danger">*</span></label>
                                @if(isset($healthproblem))
                                <input type="text" name="problem" class="form-control" value="{{ $healthproblem[0]['problem'] }}"/>
                                @else
                                <input type="text" name="problem" class="form-control" value="{{ old('problem') }}"/>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">Type <span class="text-danger">*</span></label>
                                @if(isset($healthproblem))
                                <input type="radio" name="type" <?php if($healthproblem[0]['type'] == 'Family'){ ?> checked="checked" <?php } ?>  value="Family"/> Family
                                <input type="radio" name="type" <?php if($healthproblem[0]['type'] == 'Past'){ ?> checked="checked" <?php } ?> value="Past"/> Past
                                <input type="radio" name="type" <?php if($healthproblem[0]['type'] == 'Personal'){ ?> checked="checked" <?php } ?> value="Personal"/> Personal
                                @else
                                <input type="radio" name="type"  value="Family"/> Family
                                <input type="radio" name="type"  value="Past"/> Past
                                <input type="radio" name="type"  value="Personal"/> Personal
                                @endif
                            </div>
  
                            <div class="form-group">
                                <input type="submit" value="Submit" name="submit" class="btn btn-info pull-left" />
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
                                    <th>Problem</th>
                                    <th>Type</th>
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
            "ajax": "{{ route('health_problem.ajax.problemarray') }}",
            "language": {
                "emptyTable": "No Health Problem available"
            },
            "order": [[0, "desc"]],
        });
        userdatatable.columns([0]).visible(false, false);
        
    }); // end of document ready
</script>
@endsection

