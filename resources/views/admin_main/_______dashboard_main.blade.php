@extends('layouts.admin_main')
@section('content')
<div class="container-fluid">
    
<div class="row">

    @if($role=='5')
	<div class="col-lg-3 col-md-6">
		<div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">

                    <div class="align-slef-center">
                                        <h2 class="m-b-0">{{$patient_detail}}</h2>
                                        <h6 class="text-muted m-b-0">Patients</h6>
                    </div>
                    <div class="align-self-center display-6 ml-auto"><i class="text-success icon-Target-Market"></i></div>
                </div>
            </div>
            <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:3px;"> <span class="sr-only">50% Complete</span></div>
            </div>
        </div>
    </div>
    @endif


     @if($role=='8')
     <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">

                    <div class="align-slef-center">
                                        <h2 class="m-b-0">1</h2>
                                        <h6 class="text-muted m-b-0">Poc Appointments</h6>
                    </div>
                    <div class="align-self-center display-6 ml-auto"><i class="text-success icon-Target-Market"></i></div>
                </div>
            </div>
            <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:3px;"> <span class="sr-only">50% Complete</span></div>
            </div>
        </div>
    </div>
    
     @endif


    <div class="col-lg-3 col-md-6">
		<div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-slef-center">
                                        @if($role==2)
                                        <h2 class="m-b-0">{{$upcoming}}</h2>
                                        <h6 class="text-muted m-b-0">Upcoming Appointments</h6>
                                        @else
                                        <h2 class="m-b-0">{{$upcoming}}</h2>
                                        <h6 class="text-muted m-b-0">Upcoming Appointments</h6>
                                        @endif
                    </div>
                    <div class="align-self-center display-6 ml-auto"><i class="text-success icon-Target-Market"></i></div>
                </div>
            </div>
            <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:3px;"> <span class="sr-only">50% Complete</span></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
		<div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-slef-center">
                                        <h2 class="m-b-0">{{$today}}</h2>
                                        <h6 class="text-muted m-b-0">Today's Appointments</h6>
                    </div>
                    <div class="align-self-center display-6 ml-auto"><i class="text-success icon-Target-Market"></i></div>
                </div>
            </div>
            <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:3px;"> <span class="sr-only">50% Complete</span></div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
