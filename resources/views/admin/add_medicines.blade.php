@extends('layouts.admin')
@section('content')           
<section class="content-header">
    <h1>Medicine</h1>
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
                    @if(isset($medicine))
                    <form class="form-horizontal" action="{{ route('medicines.update')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" value="{{ $medicine->id }}" name="id" />
                    @else
                    <form class="form-horizontal" action="{{ route('medicines.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @endif
                    <div class="box-body">
                        <div class="col-md-8">
                            <div class="form-group m-1">
                                <label class="control-label">Medicine Name <span class="text-danger">*</span></label>
                                @if(isset($medicine))
                                <input type="text" name="name" class="form-control" value="{{ $medicine->name }}" required/>
                                @else
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required/>
                                @endif
                            </div>
                        </div>
                        {{--
                        <div class="col-md-2">
                            <div class="form-group m-1">
                                <label class="control-label">Dose<span class="text-danger">*</span></label>
                                @if(isset($medicine))
                                <input type="text" name="dose" class="form-control" value="{{ $medicine->dose }}" required/>
                                @else
                                <input type="text" name="dose" class="form-control" value="{{ old('dose') }}" required/>
                                @endif
                            </div>
                        </div>
                        --}}
                        <!--<div class="col-md-2">-->
                        <!--    <div class="form-group m-1">-->
                        <!--        <label class="control-label">Unit<span class="text-danger">*</span></label>-->
                        <!--        @if(isset($medicine))-->
                        <!--        {{---->
                        <!--        <input type="text" name="unit" class="form-control" value="{{ $medicine->unit }}" required/>-->
                        <!--        --}}-->
                        <!--        <select class="form-control" name="unit">-->
                        <!--            <option value="">Select Unit</option>-->
                        <!--            <option value="mg" <?php if($medicine->unit == "mg"){ echo "selected"; } ?> >mg</option>-->
                        <!--            <option value="ml" <?php if($medicine->unit == "ml"){ echo "selected"; } ?> >ml</option>-->
                        <!--            <option value="g" <?php if($medicine->unit == "g"){ echo "selected"; } ?> >g</option>-->
                        <!--            <option value="mcg" <?php if($medicine->unit == "mcg"){ echo "selected"; } ?> >mcg</option>-->
                        <!--            <option value="mg/ml" <?php if($medicine->unit == "mg/ml"){ echo "selected"; } ?> >mg/ml</option>-->
                        <!--            <option value="%" <?php if($medicine->unit == "%"){ echo "selected"; } ?> >%</option>-->
                        <!--        </select>-->
                        <!--        @else-->
                        <!--        {{---->
                        <!--        <input type="text" name="unit" class="form-control" value="{{ old('name') }}" required/>-->
                        <!--        --}}-->
                        <!--        <select class="form-control" name="unit">-->
                        <!--            <option value="">Select Unit</option>-->
                        <!--            <option value="mg">mg</option>-->
                        <!--            <option value="ml">ml</option>-->
                        <!--            <option value="g">g</option>-->
                        <!--            <option value="mcg">mcg</option>-->
                        <!--            <option value="mg/ml">mg/ml</option>-->
                        <!--            <option value="%">%</option>-->
                        <!--        </select>-->
                        <!--        @endif-->
                        <!--    </div>-->
                        <!--</div>-->
                        {{--
                        <div class="col-md-2">
                            <div class="form-group m-1">
                                <label class="control-label">Route<span class="text-danger">*</span></label>
                                @if(isset($medicine))
                                <input type="text" name="route" class="form-control" value="{{ $medicine->route }}" required/>
                                @else
                                <input type="text" name="route" class="form-control" value="{{ old('name') }}" required/>
                                @endif
                            </div>
                        </div>
                        --}}
                        <!--<div class="col-md-2">-->
                        <!--    <div class="form-group m-1">-->
                        <!--        <label class="control-label">Route<span class="text-danger">*</span></label>-->
                        <!--        @if(isset($medicine))-->
                        <!--            <select class="form-control" name="route" required>-->
                        <!--                <option class="form-control" value="">Select Route</option>-->
                        <!--                <option class="form-control" <?php if($medicine->route == "Oral"){ echo "selected"; } ?> value="Oral">Oral</option>-->
                        <!--                <option class="form-control" <?php if($medicine->route == "IV"){ echo "selected"; } ?> value="IV">IV</option>-->
                        <!--                <option class="form-control" <?php if($medicine->route == "IM"){ echo "selected";} ?> value="IM">IM</option>-->
                        <!--                <option class="form-control" <?php if($medicine->route == "SC"){ echo "selected"; } ?> value="SC">SC</option>-->
                        <!--                <option class="form-control" <?php if($medicine->route == "ID"){ echo "selected"; } ?> value="ID">ID</option>-->
                        <!--                <option class="form-control" <?php if($medicine->route == "SL"){ echo "selected"; } ?> value="SL">SL</option>-->
                        <!--                <option class="form-control" <?php if($medicine->route == "PV"){ echo "selected"; } ?> value="PV">PV</option>-->
                        <!--                <option class="form-control" <?php if($medicine->route == "PR"){ echo "selected"; } ?> value="PR">PR</option>-->
                        <!--                {{-- <option class="form-control" value="NASAL">NASAL</option> --}}-->
                        <!--                <option class="form-control" <?php if($medicine->route == "TOPICAL"){ echo "selected"; } ?> value="TOPICAL">TOPICAL</option>-->
                        <!--            </select>-->
                        <!--        @else-->
                        <!--            <select class="form-control" name="route" required>-->
                        <!--                <option class="form-control" value="">Select Route</option>-->
                        <!--                <option class="form-control" value="Oral">Oral</option>-->
                        <!--                <option class="form-control" value="IV">IV</option>-->
                        <!--                <option class="form-control" value="IM">IM</option>-->
                        <!--                <option class="form-control" value="SC">SC</option>-->
                        <!--                <option class="form-control" value="ID">ID</option>-->
                        <!--                <option class="form-control" value="SL">SL</option>-->
                        <!--                <option class="form-control" value="PV">PV</option>-->
                        <!--                <option class="form-control" value="PR">PR</option>-->
                        <!--                {{-- <option class="form-control" value="NASAL">NASAL</option> --}}-->
                        <!--                <option class="form-control" value="TOPICAL">TOPICAL</option>-->
                        <!--            </select>-->
                        <!--        @endif-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="col-md-12 mt-5">
                            <div class="col-md-6">
                            <div class="form-group">
                                <input type="submit" value="Submit" name="submit" class="btn btn-info pull-left" />
                            </div>
                            </div>
                        </div>
                    </div>
                     </form>
            </div>
            @endif
            <div class="box">
                <div class="box-header">
                    <a href="{{ route('medicines.medinesuploadfilepage') }}" class="btn btn-info">CSV IMPORT</a>
                </div>
                <div class="box-body">
                    
                        <table id="userdatatable1" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Medicine Name</th>
                                    <!--<th>Dose</th>-->
                                    <!--<th>Unit</th>-->
                                    <!--<th>Route</th>-->
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
            </div>
        </div>
    </div>
</section>
@endsection
@section('custom_js')     
<script>
    $(document).ready(function () {
        var userdatatable = $('#userdatatable1').DataTable({
            responsive: true,
            "processing": true,
            "ajax": "{{ route('medicines.ajax.medicinesarray') }}",
            "language": {
                "emptyTable": "No Medicine available"
            },
            "order": [[0, "desc"]],
        });
        userdatatable.columns([0]).visible(false, false);
    }); // end of document ready
</script>
@endsection