@extends('layouts.admin')

@section('content')           
<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>POC</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="{{ route('poc.all_poc') }}">POC List</a></li>
        <li><a href="#">POC</a></li>
    </ol>
</section>

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
                @if(isset($Poc))
                <form  class="form-horizontal" method="post" action="{{ route('poc.updatepoc')}}"  enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" value="{{ $Poc[0]['id'] }}" name="id" />
                @else 
                <form class="form-horizontal" action="{{ route('poc.store_poc')}}" method="post" enctype="multipart/form-data">
                @endif 

                {{csrf_field()}}
                <div class="box-body">
                <div class="col-md-6">  
                <div class="form-group">
                    <label class="control-label">POC NO <span class="text-danger">*</span></label>
                    @if(isset($Poc))
                    <input type="text" class="form-control" id="poc_no" name="poc_no" value="{{ $Poc[0]['poc_no'] }}" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    @else
                    <input type="text" name="poc_no" class="form-control" value="{{ old('poc_no') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>
                    @endif
                </div>

                <div class="form-group">
                  <label class="control-label">MANAGER NAME<span class="text-danger">*</span></label>
                  @if(isset($Poc))
                  <input  type="text" name="manager_name" class="form-control" value="{{ $Poc[0]['manager_name'] }}" required>
                  @else
                  <input type="text" name="manager_name" class="form-control" value="{{ old('manager_name') }}"/>
                  @endif
                </div>

                <div class="form-group">
                  <label class="control-label">Select City <span class="text-danger">*</span></label>
                  @if(isset($Poc)) 
                  <select class="form-control" name="city">
                  <option value="">Select City</option>
                  @foreach($City as $c)
                  <option <?php if($Poc[0]['city'] == $c['id']){ ?> selected="selected" <?php } ?> value="{{ $c['id'] }}">{{ $c['city'] }}</option>
                  @endforeach
                  </select>
                  @else
                  <select class="form-control" name="city">
                  <option>Select City</option>
                  @foreach($City as $c)
                  <option <?php if(old('city') == $c['id']){ ?> selected="selected" <?php } ?> value="{{ $c['id'] }}">{{ $c['city'] }}</option>
                  @endforeach
                  </select>
                  @endif
                </div>

                <div class="form-group">
                  <label class="control-label">Address <span class="text-danger">*</span></label>
                  @if(isset($Poc))
                  <input type="text" class="form-control" id="address" name="address" value="{{ $Poc[0]['address'] }}" required>
                  @else
                  <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                  @endif
                </div>

                <div class="form-group">
                  <label class="control-label">PIN CODE<span class="text-danger">*</span></label>
                  @if(isset($Poc))
                  <input type="text" class="form-control" id="pincode" name="pincode" value="{{ $Poc[0]['pincode'] }}" required>
                  @else
                  <input type="text" class="form-control" id="pincode" name="pincode" value="{{ old('pincode') }}">
                  @endif
                </div>

                <div class="form-group">
                  <label class="control-label">Phone Number <span class="text-danger">*</span></label>
                  @if(isset($Poc))
                  <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $Poc[0]['phone_number'] }}"  required maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength=10 pattern=".{10}" title="please enter minimum 10 digits to enter mobile number" autocomplete="off">
                  @else
                  <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength=10 pattern=".{10}" title="please enter minimum 10 digits to enter mobile number" autocomplete="off"/>
                  @endif
                </div>

                <div class="form-group">
                  <label class="control-label">Email <span class="text-danger">*</span></label>
                  @if(isset($Poc))
                  <input type="email" class="form-control" id="email" name="email" value="{{ $Poc[0]['email'] }}"  required>
                  @else
                  <input type="email" name="email" class="form-control" value="{{ old('email') }}"/>
                  @endif
                </div>

                  @if(isset($Poc))
                  @else
                  <div class="form-group">
                  <label class="control-label">Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" id="password" name="password">
                  </div>
                  @endif

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
