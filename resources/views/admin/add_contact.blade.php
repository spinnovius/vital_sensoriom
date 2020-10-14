@extends('layouts.admin')

@section('content')           
<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>Admin Contact</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Admin Contact</a></li>
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

                    @if(isset($contact))
                    <form class="form-horizontal" action="{{ route('admin.contactupdate')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" value="{{ $contact[0]['id'] }}" name="id" />
                    @else
                    <form class="form-horizontal" action="{{ route('admin.contactstore')}}" method="post" enctype="multipart/form-data">
                    @endif

                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="col-md-6">                            
                            <div class="form-group">
                                <label class="control-label">Contact <span class="text-danger">*</span></label>
                                @if(isset($contact))
                                <input type="number" name="contact" class="form-control" value="{{ $contact[0]['contact'] }}"/>
                                @else
                                <input type="number" name="contact" class="form-control" value="{{ old('contact') }}"/>
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
                                    <th>Contact</th>
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
            "ajax": "{{ route('admin.ajax.contactarray') }}",
            "language": {
                "emptyTable": "No Contact available"
            },
            "order": [[0, "desc"]],
        });
        userdatatable.columns([0]).visible(false, false);
        
    }); // end of document ready
</script>

@endsection

