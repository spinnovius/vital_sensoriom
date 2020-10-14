@extends('layouts.admin')

@section('content')           
<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>Clinic</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="{{ route('clinic.all_clinic') }}">Clinic List</a></li>
        <li><a href="#">Clinic</a></li>
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
                @if(isset($Clinic))
                <form  class="form-horizontal" method="post" action="{{ route('clinic.updateclinic')}}"  enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" value="{{ $Clinic[0]['id'] }}" name="id" />
                @else
                <form class="form-horizontal" action="{{ route('clinic.store_clinic')}}" method="post" enctype="multipart/form-data">
                @endif

                {{csrf_field()}}
                <div class="box-body">
                <div class="col-md-6">  
                <div class="form-group">
                  <label class="control-label">Clinic Name <span class="text-danger">*</span></label>
                  @if(isset($Clinic))
                  <input type="text" class="form-control" id="fname" name="fname" value="{{ $Clinic[0]['fname'] }}" required>
                  @else
                  <input type="text" name="fname" class="form-control" value="{{ old('fname') }}" required/>
                  @endif
                </div>

                

                <div class="form-group">
                  <label class="control-label">Select City <span class="text-danger">*</span></label>
                  @if(isset($Clinic)) 
                  <select class="form-control" name="city">
                  <option value="">Select City</option>
                  @foreach($City as $c)
                  <option <?php if($Clinic[0]['city'] == $c['id']){ ?> selected="selected" <?php } ?> value="{{ $c['id'] }}">{{ $c['city'] }}</option>
                  @endforeach
                  </select>
                  @else
                  <select class="form-control" name="city" required>
                  <option>Select City</option>
                  @foreach($City as $c)
                  <option <?php if(old('city') == $c['id']){ ?> selected="selected" <?php } ?> value="{{ $c['id'] }}">{{ $c['city'] }}</option>
                  @endforeach
                  </select>
                  @endif
                </div>

                <div class="form-group">
                  <label class="control-label">Address <span class="text-danger">*</span></label>
                  @if(isset($Clinic))
                  <textarea type="text" name="address" class="form-control" value="" required>{{ $Clinic[0]['address'] }}</textarea>
                  @else
                  <textarea type="text" name="address" class="form-control" value="{{ old('address') }}" required>{{ old('address') }}</textarea>
                  @endif
                </div>

                <div class="form-group">
                  <label class="control-label">Email Id<span class="text-danger">*</span></label>
                  @if(isset($Clinic))
                  <input type="email" class="form-control" id="email" name="email" value="{{ $Clinic[0]['email'] }}"  required>
                  @else
                  <input type="email" name="email" class="form-control" value="{{ old('email') }}" required/>
                  @endif
                </div>

                  @if(isset($Clinic))
                  @else
                  <div class="form-group">
                  <label class="control-label">Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" id="password" name="password">
                  </div>
                  @endif

                <div class="form-group">
                  <label class="control-label">Phone Number <span class="text-danger">*</span></label>
                  @if(isset($Clinic))
                  <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ $Clinic[0]['contact_number'] }}"  required maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength=10 pattern=".{10}" title="please enter minimum 10 digits to enter mobile number" autocomplete="off">
                  @else
                  <input type="text" name="contact_number" class="form-control" value="{{ old('contact_number') }}" required  maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength=10 pattern=".{10}" title="please enter minimum 10 digits to enter mobile number" autocomplete="off"/>
                  @endif
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

