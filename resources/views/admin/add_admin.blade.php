@extends('layouts.admin')

@section('content')           
<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>Admin</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="{{ route('admin.viewall_admin') }}">Admin List</a></li>
        <li><a href="#">Admin</a></li>
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

                    @if(isset($admin))
                    <form class="form-horizontal" action="{{ route('admin.update')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" value="{{ $admin[0]['id'] }}" name="id" />
                    @else
                    <form class="form-horizontal" action="{{ route('admin.store')}}" method="post" enctype="multipart/form-data">
                    @endif

                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="col-md-6">                            
                            <div class="form-group">
                                <label class="control-label">First Name <span class="text-danger">*</span></label>
                                @if(isset($admin))
                                <input type="text" name="fname" class="form-control" value="{{ $admin[0]['fname'] }}"/>
                                @else
                                <input type="text" name="fname" class="form-control" value="{{ old('fname') }}"/>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">Last Name <span class="text-danger">*</span></label>
                                @if(isset($admin))
                                <input type="text" name="lname" class="form-control" value="{{ $admin[0]['lname'] }}"/>
                                @else
                                <input type="text" name="lname" class="form-control" value="{{ old('lname') }}"/>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">Email <span class="text-danger">*</span></label>
                                @if(isset($admin))
                                <input type="email" name="email" class="form-control" value="{{ $admin[0]['email'] }}"/>
                                @else
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"/>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">Contact Number <span class="text-danger">*</span></label>
                                @if(isset($admin))
                                <input type="number" name="contact_number" class="form-control" value="{{ $admin[0]['contact_number'] }}" disabled="disabled" />
                                @else
                                <input type="number" name="contact_number" class="form-control" value="{{ old('contact_number') }}"/>
                                @endif
                            </div>

                            @if(!isset($admin))
                            <div class="form-group">
                                <label class="control-label">Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" value=""/>
                            </div>
                            @endif

                            <input type="hidden" name="role" value="1">
                            <!-- <div class="form-group">
                                <label class="control-label">Role <span class="text-danger">*</span></label>
                                <select class="form-control" name="role">
                                	<option>Select Role</option>
                                    <?php foreach ($role as $r) { ?>
                                        <option @if(@old('role') == $r['id']) selected="selected" @endif  @if(@$admin[0]['role_id'] == $r['id']) selected="selected" @endif  value="<?php echo $r['id'];?>"><?php echo $r['role'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
 -->
                             
                            <div class="form-group">
                                <input type="submit" value="Submit" name="submit" class="btn btn-info pull-left" />
                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->                    
                     </form>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>


@endsection

