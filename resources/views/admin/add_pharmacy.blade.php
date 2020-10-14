@extends('layouts.admin')

@section('content')           
<!-- Content Header (Page header) -->

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwtkU8jS65b7cxMzwWrYNzd2XFfgQ8Cgo&libraries=places"></script>
<section class="content-header">
    <h1>Pharmacy</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="{{ route('hospital.viewall_hospital') }}">Pharmacy List</a></li>
        <li><a href="#">Pharmacy</a></li>
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

                    @if(isset($Pharmacylist))
                    <form class="form-horizontal" action="{{ route('pharmacy.update')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" value="{{ $Pharmacylist[0]['id'] }}" name="id" />
                    @else
                    <form class="form-horizontal" action="{{ route('pharmacy.store')}}" method="post" enctype="multipart/form-data">
                    @endif

                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="col-md-6">                            
                            <div class="form-group">
                                <label class="control-label">Name <span class="text-danger">*</span></label>
                                @if(isset($Pharmacylist))
                                <input type="text" name="name" class="form-control" value="{{ $Pharmacylist[0]['name'] }}"/>
                                @else
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"/>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">Select City <span class="text-danger">*</span></label>
                                @if(isset($Pharmacylist))
                                <select class="form-control" name="city">
                                    <option value="">Select City</option>
                                    @foreach($city as $c)
                                    <option <?php if($Pharmacylist[0]['city_id'] == $c['id']){ ?> selected="selected" <?php } ?> value="{{ $c['id'] }}">{{ $c['city'] }}</option>
                                    @endforeach
                                </select>
                                @else
                                <select class="form-control" name="city" >
                                    <option>Select City</option>
                                    @foreach($city as $c)
                                    <option <?php if(old('city') == $c['id']){ ?> selected="selected" <?php } ?> value="{{ $c['id'] }}">{{ $c['city'] }}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">Address</label>
                                @if(isset($Pharmacylist))
                                <!-- <textarea type="text" name="address" class="form-control" value=""></textarea> -->
                                <input type="text" name="address" class="form-control" id="city" value="{{ $Pharmacylist[0]['location'] }}">
                                @else
                                <input type="text" name="address" class="form-control" id="city"> 
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">Email <span class="text-danger">*</span></label>
                                @if(isset($Pharmacylist))
                                <input type="email" name="email" class="form-control" value="{{ $Pharmacylist[0]['email'] }}"/>
                                @else
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"/>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">Contact Number <span class="text-danger">*</span></label>
                                @if(isset($Pharmacylist))
                                <input type="text" name="contact_number" class="form-control" value="{{ $Pharmacylist[0]['contact_number'] }}"/>
                                @else
                                <input type="text" name="contact_number" class="form-control" value="{{ old('contact_number') }}" maxlength="10" />
                                @endif
                            </div>


                            
                             
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>

    $(document).ready(function () {

        var autocomplete;
        
        input = document.getElementById('city');
        autocomplete = new google.maps.places.Autocomplete(input, {
        });
        autocomplete.addListener('place_changed', function ()
        {
            var place = autocomplete.getPlace();
        });
    });

</script>

@endsection

