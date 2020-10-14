@extends('layouts.admin')

@section('content')           
<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>Doctors & Health Plans <small>In patient appointments & telemedicine</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Doctors & Health Plans</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            @if(Session::get('admin_role') == 1)
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

                    @if(isset($doctorfaq))
                    <form class="form-horizontal" action="{{ route('doctorfaq.update')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" value="{{ $doctorfaq[0]['id'] }}" name="id" />
                    @else
                    <form class="form-horizontal" action="{{ route('doctorfaq.store')}}" method="post" enctype="multipart/form-data">
                    @endif

                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="col-md-12">                            
                            <div class="form-group">
                                <label class="control-label">Question <span class="text-danger">*</span></label>
                                @if(isset($doctorfaq))
                                <input type="text" name="question" class="form-control" value="{{ $doctorfaq[0]['question'] }}"/>
                                @else
                                <input type="text" name="question" class="form-control" value="{{ old('question') }}"/>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">Answer <span class="text-danger">*</span></label>
                                @if(isset($doctorfaq))
                                <textarea id="editor1" type="text" name="answer" class="form-control" >{{ @$doctorfaq[0]['answer'] }}</textarea>
                                @else
                                <textarea id="editor1" type="text" name="answer" class="form-control" >{{ old('answer') }}</textarea>
                                @endif
                            </div>
  
                            <div class="form-group">
                                <input type="submit" value="Submit" name="submit" class="btn btn-info pull-left" />
                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->                    
                     </form>
            </div>
            @endif
            <div class="box">
                <div class="box-header">
                    <!--<h3 class="box-title">Hover Data Table</h3>-->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    
                        <table id="userdatatable2" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="width: 27%">Question</th>
                                    <th style="width: 73%">Answer</th>
                                    <th>Status</th>
                                    @if(Session::get('admin_role') == 1)
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                   
                </div>
                <!-- /.box-body -->
            </div>

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>


@endsection

@section('custom_js')     
<script>
    $(document).ready(function () {

        var userdatatable = $('#userdatatable2').DataTable({
            
            responsive: true,
            "processing": true,
            "ajax": "{{ route('doctorfaq.ajax.faqarray') }}",
            "language": {
                "emptyTable": "No faq available"
            },
            "order": [[0, "desc"]],
        });
        userdatatable.columns([0]).visible(false, false);
        
    }); // end of document ready
</script>

@endsection

