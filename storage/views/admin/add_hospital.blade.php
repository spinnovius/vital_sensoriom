@extends('layouts.admin')

@section('content')           
<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>Hospital</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="{{ route('hospital.viewall_hospital') }}">Hospital List</a></li>
        <li><a href="#">Hospital</a></li>
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

                    @if(isset($hospital))
                    <form class="form-horizontal" action="{{ route('hospital.update')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" value="{{ $hospital[0]['id'] }}" name="id" />
                    @else
                    <form class="form-horizontal" action="{{ route('hospital.store')}}" method="post" enctype="multipart/form-data">
                    @endif

                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="col-md-6">                            
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                @if(isset($hospital))
                                <input type="text" name="name" class="form-control" value="{{ $hospital[0]['name'] }}"/>
                                @else
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"/>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">Email</label>
                                @if(isset($hospital))
                                <input type="email" name="email" class="form-control" value="{{ $hospital[0]['email'] }}"/>
                                @else
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"/>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">Contact Number</label>
                                @if(isset($hospital))
                                <input type="number" name="contact_number" class="form-control" value="{{ $hospital[0]['contact_number'] }}"/>
                                @else
                                <input type="number" name="contact_number" class="form-control" value="{{ old('contact_number') }}"/>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">Urgent Care Number</label>
                                @if(isset($hospital))
                                <input type="number" name="urgent_care_number" class="form-control" value="{{ $hospital[0]['urgent_care_number'] }}"/>
                                @else
                                <input type="number" name="urgent_care_number" class="form-control" value="{{ old('urgent_care_number') }}"/>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">Address</label>
                                @if(isset($hospital))
                                <textarea type="text" name="address" class="form-control" value="">{{ $hospital[0]['address'] }}</textarea>
                                @else
                                <textarea type="text" name="address" class="form-control" value="{{ old('address') }}">{{ old('address') }}</textarea>
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


@endsection

