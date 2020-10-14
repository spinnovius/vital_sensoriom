@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Pending Doctor List</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Pending Doctor List</li>
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
                                    <!-- <th>Last Name</th> -->
                                    <th>Email Address</th>
                                    <th>Contact Number</th>
                                    <th>Role</th>
                                    <?php if(Session::get('admin_role') != 7){ ?>
                                    <th>Verified</th>
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
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
     <form  action="{{ route('doctor.createpassword')}}" method="post">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" id="doctor_id" />
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Password</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
                <label class="control-label">Password</label>
                <input type="password" name="password" class="form-control" value="" required="required" />
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-info">Create</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>





@endsection
@section('custom_js')
<script>

    function verified_doctor(id)
    {
        $('#doctor_id').val(id);
    }

    $(document).ready(function () {

        var userdatatable = $('#userdatatable').DataTable({
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true,
            "processing": true,
            "ajax": "{{ route('pendingdoctor.ajax.pendingdoctorarray') }}",
            "language": {
                "emptyTable": "No Pending doctor available"
            },
            "order": [[0, "desc"]],
        });
        userdatatable.columns([0]).visible(false, false);

    }); // end of document ready
</script>
@endsection
