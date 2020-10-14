@php
//dd($role);    
@endphp

@extends('layouts.admin_main')
@section('content')
<div class="container-fluid dashbordpanel">
    <div class="row">
        @if($role=='5')
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <a href="{{ route('admin_main.allpatient') }}"> 
                    <div class="card-body">
                        <div class="p-10 no-block">
                            <div class="align-self-center text-center">
                                <h3 class="text-muted m-b-0">ALL PATIENTS</h3>
                                <h2 class="m-b-0">{{$patient_detail}}</h2>
                            </div>
                            <div class="align-self-center display-6 ml-auto"><i class="text-success icon-Target-Market"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <a href="{{ route('admin_main.pendingappointment') }}"> 
                    <div class="card-body">
                        <div class="p-10 no-block">
                            <div class="align-self-center text-center">
                                <h3 class="text-muted m-b-0">PENDING APPOINTMENTS</h3>
                                <h2 class="m-b-0">{{ $pending }}</h2>
                            </div>
                            <div class="align-self-center display-6 ml-auto"><i class="text-success icon-Target-Market"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <a href="{{ route('admin_main.upcomingappointment') }}"> 
                    <div class="card-body">
                        <div class="p-10 no-block">
                            <div class="align-self-center text-center">
                                <h3 class="text-muted m-b-0">UPCOMING APPOINTMENTS</h3>
                                <h2 class="m-b-0">{{$upcoming}}</h2>
                            </div>
                            <div class="align-self-center display-6 ml-auto"><i class="text-success icon-Target-Market"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <a href="{{ route('admin_main.cancelappointment') }}"> 
                    <div class="card-body">
                        <div class="p-10 no-block">
                            <div class="align-self-center text-center">
                                <h3 class="text-muted m-b-0">CANCEL APPOINTMENTS</h3>
                                <h2 class="m-b-0">{{$cancel}}</h2>
                            </div>
                            <div class="align-self-center display-6 ml-auto"><i class="text-success icon-Target-Market"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endif
        @if($role=='8')
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <a href="{{ route('panel.allpatient') }}"> 
                    <div class="card-body">
                        <div class="p-10 no-block">
                            <div class="align-self-center text-center">
                                <h3 class="text-muted m-b-0">POC APPOINTMENTS</h3>
                                <h2 class="m-b-0">{{$today}}</h2>
                            </div>
                            <div class="align-self-center display-6 ml-auto"><i class="text-success icon-Target-Market"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endif
        @if($role=='2')
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <a href="{{ route('admin_main.allpatient') }}"> 
                    <div class="card-body">
                        <div class="p-10 no-block">
                            <div class="align-self-center text-center">
                                <h3 class="text-muted m-b-0">ALL PATIENTS</h3>
                                <h2 class="m-b-0">{{$patient_detail}}</h2>
                            </div>
                            <div class="align-self-center display-6 ml-auto"><i class="text-success icon-Target-Market"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <a href="{{ route('admin_main.upcomingappointment') }}"> 
                    <div class="card-body">
                        <div class="p-10 no-block">
                            <div class="align-self-center text-center">
                                @if($role==2)
                                <h3 class="text-muted m-b-0">UPCOMING APPOINTMENTS</h3>
                                <h2 class="m-b-0">{{$upcoming}}</h2>
                                @else
                                <h3 class="text-muted m-b-0">UPCOMING APPOINTMENTS</h3>
                                <h2 class="m-b-0">{{$upcoming}}</h2>
                                @endif
                            </div>
                            <div class="align-self-center display-6 ml-auto"><i class="text-success icon-Target-Market"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endif
        @if($role=='6')
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <a href="{{ route('admin_main.allpatient') }}"> 
                    <div class="card-body">
                        <div class="p-10 no-block">
                            <div class="align-self-center text-center">
                                <h3 class="text-muted m-b-0">ALL PATIENTS</h3>
                                <h2 class="m-b-0">{{$patient_detail}}</h2>
                            </div>
                            <div class="align-self-center display-6 ml-auto"><i class="text-success icon-Target-Market"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        {{-- <div class="col-lg-3 col-md-6">
            <div class="card">
                <a href="{{ route('admin_main.upcomingappointment') }}"> 
                    <div class="card-body">
                        <div class="p-10 no-block">
                            <div class="align-self-center text-center">
                                @if($role==2)
                                <h3 class="text-muted m-b-0">UPCOMING APPOINTMENTS</h3>
                                <h2 class="m-b-0">{{$upcoming}}</h2>
                                @else
                                <h3 class="text-muted m-b-0">UPCOMING APPOINTMENTS</h3>
                                <h2 class="m-b-0">{{$upcoming}}</h2>
                                @endif
                            </div>
                            <div class="align-self-center display-6 ml-auto"><i class="text-success icon-Target-Market"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div> --}}
        @endif
    </div>
</div>
@endsection