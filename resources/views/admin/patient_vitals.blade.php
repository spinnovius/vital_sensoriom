@extends('layouts.admin')
@section('content')           
<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>Patient Vitals</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class=""><a href="{{ route('clinic.all_clinic_patient') }}">Clinic Visit List</a></li>
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
                <input type="hidden" name="patient_id" value="{{$patient_id}}" id="patient_id">
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="userdatatable" class="table table-bordered table-hover display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Blood Sugar</th>
                                    <th>Blood Pressure (Min-Max)</th>
                                    <th>Pulse/Heart Rate</th>
                                    <th>Respiratory Rate</th>
                                    <th>Oxygen Saturation</th>
                                    <th>Abdominal Circumference</th>
                                    <th>Temperature</th>
                                    <th>Weight</th>
                                    <th>Height</th>
                                    <th>BMI</th>
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

@endsection

@section('custom_js')     
<script>
    $(document).ready(function () {
        var id=$('#patient_id').val();
        var url = '{{ route("clinic.vitalsallarray", ":id") }}';
        url = url.replace(':id', id);
        var userdatatable = $('#userdatatable').DataTable({
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true,
            // "columnDefs": [
            //     { "width": "15%", "targets": 2 }
            //   ],
            "processing": true,
            "ajax": url,
            
            "language": {
                "emptyTable": "No Vitals available"
            },
            "order": [[0, "desc"]],
        });
        userdatatable.columns([0]).visible(false, false);
        
    }); // end of document ready
</script>
@endsection

