@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>Manager</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="{{ route('manager.all_manager') }}">Manager List</a></li>
        <li><a href="#">Manager</a></li>
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

                @if(isset($Admin_manager))
                <form  class="form-horizontal" method="post" action="{{ route('manager.updatemanager')}}"  enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" value="{{ $Admin_manager[0]['id'] }}" name="id" />
                @else
                <form class="form-horizontal" action="{{ route('manager.store_manager')}}" method="post" enctype="multipart/form-data">
                @endif
                  {{csrf_field()}}
                <div class="box-body">
                <div class="col-md-6">

                {{csrf_field()}}
                <div class="form-group">
                  <label class="control-label">Name <span class="text-danger">*</span></label>
                  @if(isset($Admin_manager))
                  <input type="text" class="form-control" id="name" name="name" value="{{ $Admin_manager[0]['fname'] }}"  required>
                  @else
                  <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                  @endif
                </div>
                <div class="form-group">
                  <label class="control-label">Email <span class="text-danger">*</span></label>
                  @if(isset($Admin_manager))
                  <input type="email" class="form-control" id="email" name="email" value="{{ $Admin_manager[0]['email'] }}"  required readonly>
                  @else
                  <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                  @endif
                </div>

                  @if(isset($Admin_manager))
                  @else
                  <div class="form-group">
                  <label class="control-label">Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" id="password" name="password" required>
                  </div>
                  @endif

                  <div class="form-group">
                    <label class="control-label">Contact Number <span class="text-danger">*</span></label>
                    @if(isset($Admin_manager))
                    <input type="text" class="form-control" id="contact_no" maxlength="10" name="contact_no" value="{{ $Admin_manager[0]['contact_number'] }}"  required>
                    @else
                    <input type="text" name="contact_no" class="form-control" maxlength="10" value="{{ old('contact_no') }}" required>
                    @endif
                  </div>
                  
                  @php
                  
                    if(isset($Admin_manager)){
                    $manager_permissions=$Admin_manager[0]['manager_permissions'];
                    $manager_permissions=explode(",",$manager_permissions);
                    }else{
                    $manager_permissions=[];
                    }
                  @endphp
                  <label class="control-label"><h5><b>Permission</b> <span class="text-danger">*</span></h5></label><br>
                  <label class="control-label">Doctor</label>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 1 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="1">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="1" checked>
                      @endif
                      View Doctor Pending
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 2 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="2">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="2" checked>
                      @endif
                      View Doctor Approve
                    </label>
                  </div>
                  <label class="control-label">Clinic</label>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 3 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="3">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="3" checked>
                      @endif
                      View Clinic
                    </label>
                  </div>
                  <label class="control-label">Point Of Care</label>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 4 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="4">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="4" checked>
                      @endif                      
                      View POC
                    </label>
                  </div>
                  <label class="control-label">Admin Manager</label>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 5 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="5">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="5" checked>
                      @endif                      
                      View Admin Manager
                    </label>
                  </div>
                  <label class="control-label">Coach</label>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 6 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="6">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="6" checked>
                      @endif
                      View Pending Coach
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 7 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="7">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="7" checked>
                      @endif
                      View Approve Coach
                    </label>
                  </div>
                  <label class="control-label">Patient</label>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 8 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="8">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="8" checked>
                      @endif                      
                      View Patient
                    </label>
                  </div>
                  <label class="control-label">Hospital</label>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 9 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="9">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="9" checked>
                      @endif                      
                      View Hospital
                    </label>
                  </div>
                  <label class="control-label">Pharmacy</label>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 10 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="10">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="10" checked>
                      @endif                      
                      View Pharmacy
                    </label>
                  </div>
                  <label class="control-label">Configuration</label>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 11 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="11">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="11" checked>
                      @endif                      
                      View Speciality
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 12 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="12">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="12" checked>
                      @endif                      
                      View Advertisement
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 13 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="13">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="13" checked>
                      @endif                      
                      View City
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 14 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="14">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="14" checked>
                      @endif                      
                      View Authority Council
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 15 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="15">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="15" checked>
                      @endif                      
                      View Health Problem
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 16 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="16">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="16" checked>
                      @endif                      
                      View Test name For Lab Details
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 17 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="17">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="17" checked>
                      @endif                      
                      View Procedure
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 18 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="18">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="18" checked>
                      @endif                      
                      View Health Plan
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 19 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="19">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="19" checked>
                      @endif                      
                      View Admin Contact
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 20 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="20">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="20" checked>
                      @endif                      
                      View Medicine
                    </label>
                  </div>
                  <label class="control-label">FAQ</label>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 21 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="21">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="21" checked>
                      @endif                      
                      View General Question
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 22 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="22">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="22" checked>
                      @endif
                      View My Care Coach
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 23 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="23">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="23" checked>
                      @endif                      
                      View My Account
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 24 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="24">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="24" checked>
                      @endif                      
                      View Doctors & Healthplan
                    </label>
                  </div>
                  <label class="control-label">Clinic Visit</label>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 25 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="25">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="25" checked>
                      @endif                      
                      View Patient List
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      @if(!in_array( 26 ,$manager_permissions ))
                      <input type="checkbox" name="manager_permissions[]" value="26">
                      @else
                      <input type="checkbox" name="manager_permissions[]" value="26" checked>
                      @endif                      
                      View Doctor List
                    </label>
                  </div>

                <div class="form-group">
                  <input type="submit" value="Submit" name="submit" class="btn btn-info pull-left" />
                </div>
            </form>
        </div>
      </div>
    <!-- /.col -->
    </div>
  <!-- /.row -->
</section>

@endsection
