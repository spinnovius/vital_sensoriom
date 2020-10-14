@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>Panelists</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="{{ route('panelists.all_panelists') }}">Panelists List</a></li>
        <li><a href="#">Panelists</a></li>
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
               <?php //dd($Panelists); ?>
                @if(isset($Panelists))
                    <form class="form-horizontal" action="{{ route('panelists.updatepanelists')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" value="{{ $Panelists->id }}" name="id" />
                    @else
                    <form class="form-horizontal" action="{{ route('panelists.store_panelists')}}" method="post" enctype="multipart/form-data">
                    @endif

                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name <span class="text-danger">*</span></label>
                                @if(isset($Panelists))
                                <input type="text" name="name" class="form-control" value="{{ $Panelists->fname }}" required />
                                @else
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"/>
                                @endif
                            </div>

		                    <div class="form-group">
		                    	<?php //dd($Panelists) ?>
		                    	<label class="control-label">Expertise <span class="text-danger">*</span></label>
		                         @if(isset($Panelists))
		                          <select class="form-control form-control-sm required select2" title="Search Expertise" name="expertise">
                                    <option value="">Select Experties</option>
		                          	@foreach($expert as $experts)
		                          	<option <?php if($Panelists->expertise == $experts['id']){ ?> selected="selected" <?php } ?> value="{{ $experts['id'] }}">{{ $experts['expertise'] }}</option>

		                            @endforeach
		                          </select>
		                          @else
		                          <select class="form-control form-control-sm required select2" title="Search expertise" name="expertise">
		                          	<option value="">Select Experties</option>
		                            @foreach($experties as $key => $expert)
		                            	<option value="<?php echo $expert->id ?>"><?php echo $expert->expertise ?></option>
		                            @endforeach
		                          </select>
		                          @endif
		                        </div>


                            <div class="form-group">
                                  <label class="control-label">Select City <span class="text-danger">*</span></label>
                                  @if(isset($Panelists))
                                  <select class="form-control" name="city">
                                  <option value="">Select City</option>
                                  @foreach($city as $c)
                                  <option <?php if($Panelists->city == $c['id']){ ?> selected="selected" <?php } ?> value="{{ $c['id'] }}">{{ $c['city'] }}</option>
                                  @endforeach
                                  </select>
                                  @else
                                  <select class="form-control" name="city">
                                  <option>Select City</option>
                                  @foreach($city as $c)
                                  <option <?php if(old('city') == $c['id']){ ?> selected="selected" <?php } ?> value="{{ $c['id'] }}">{{ $c['city'] }}</option>
                                  @endforeach
                                  </select>
                                  @endif
                            </div>

                            <div class="form-group">
			                  <label class="control-label">Phone Number <span class="text-danger">*</span></label>
			                  @if(isset($Panelists))
			                  <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $Panelists->contact_number }}"   required maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength=10 pattern=".{10}" title="please enter minimum 10 digits to enter mobile number" autocomplete="off">
			                  @else
			                  <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}"  required maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength=10 pattern=".{10}" title="please enter minimum 10 digits to enter mobile number" autocomplete="off"/>
			                  @endif
			                </div>

			                <div class="form-group">
			                  <label class="control-label">Email <span class="text-danger">*</span></label>
			                  @if(isset($Panelists))
			                  <input type="email" class="form-control" id="email" name="email" value="{{ $Panelists->email }}"  required>
			                  @else
			                  <input type="email" name="email" class="form-control" value="{{ old('email') }}"/>
			                  @endif
			                </div>

			                  @if(isset($Panelists))
			                  @else
			                  <div class="form-group">
			                  <label class="control-label">Password <span class="text-danger">*</span></label>
			                  <input type="password" class="form-control" id="password" name="password">
			                  </div>
			                  @endif

                            <div class="form-group">
                                <input type="submit" value="Submit" name="submit" class="btn btn-info pull-left" />
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
