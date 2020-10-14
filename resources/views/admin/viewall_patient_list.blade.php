@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Patient List</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Patient List</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-xs-12">
        	@if( session('success') )
                        <div class="alert alert-success alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <b>Success ! </b>{{ session('success') }}
                        </div>
                    @endif

                    @if( session('danger') )
                        <div class="alert alert-danger alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <b>Success ! </b>{{ session('danger') }}
                        </div>
                    @endif

                    @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Whoops!</strong> There were some problems.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif


            <div class="box">
                <div class="box-header">
                    <!--<h3 class="box-title">Hover Data Table</h3>-->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="userdatatable" class="table table-bordered table-hover display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>Contact Number</th>
                                    <th>Role</th>
                                    <?php if(Session::get('admin_role') != 7){ ?>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>

@endsection
@section('custom_js')
<script>

    $(document).ready(function () {

        var userdatatable = $('#userdatatable').DataTable({
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true,
            "processing": true,
            "ajax": "{{ route('patientarray.ajax.patientarray') }}",
            "language": {
                "emptyTable": "No Patient available"
            },
            "order": [[0, "desc"]],
        });
        userdatatable.columns([0]).visible(false, false);

    }); // end of document ready
</script>
@endsection
