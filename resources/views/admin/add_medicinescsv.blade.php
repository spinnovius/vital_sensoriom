@extends('layouts.admin')
@section('content')           
<section class="content-header">
    <h1>Import CSV Medicine</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Medicine</a></li>
    </ol>
</section>
<style>
    .m-1{
        margin: 1px!important;
    }
    .mt-5{
        margin-top: 5px!important;
    }
</style>
<section class="content">    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            @if(Session::get('admin_role') != 7)
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
                    <div class="box-body">
                        <div class="col-md-12 mt-5">
                            <form method='post' action='{{ route('medicines.medinesuploadfile') }}' enctype='multipart/form-data' >
                            {{ csrf_field() }}
                            <div class="col-md-6">
                            <input type='file' name='file'>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <input type='submit' name='submit' value='Submit' class="btn btn-info pull-left">
                                <a href="{{ env('APP_URL').'storage/app/csv/medicine.csv'}}" class="btn btn-info" style="margin-left: 3px;">SAMPLE CSV</a>
                            </div>
                            
                            </div>
                            </form>
                        </div>
                    </div>
                     </form>
            </div>
            @endif
            
        </div>
    </div>
</section>
@endsection
@section('custom_js')     
@endsection