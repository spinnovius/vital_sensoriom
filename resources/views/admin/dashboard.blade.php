@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
@if(Session::get('admin_role') && Session::get('admin_role') == 1 || Session::get('admin_role') == 7)

<?php
$doctor = App\User::where('role_id',2)->where('verified',1)->count();
$coach = App\User::where('role_id',3)->where('verified',1)->count();
$patient = App\User::where('role_id',4)->where('verified',1)->count();
$hospital = App\Hospital::count();
$lab = App\LabReportName::count();
?>
<section class="content-header">
    <h1>
        Dashboard
<!--        <small>Control panel</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <!-- row 1-->
    <div class="row">
        <div class="col-lg-2 col-xs-6">
            <div class="small-box bg-green boxheight">
                <div class="inner">
                    <p style="font-size:11px !important;" class="text-uppercase">Approved Doctor</p>
                    <h3><?php echo $doctor; ?></h3>
                </div>
                <div class="icon boxheighticon">
                    <i class="fa fa-plus-square"></i>
                </div>

                <a href="{{ route('doctor.viewall_approve_doctor') }}" class="small-box-footer">
                    <i class="fa fa-arrow-circle-right"></i> View details
                </a>

            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
            <div class="small-box bg-blue boxheight">
                <div class="inner">
                    <p style="font-size:11px !important;" class="text-uppercase">Approved Coach</p>
                    <h3><?php echo $coach;?></h3>
                </div>
                <div class="icon boxheighticon">
                    <i class="fa fa-user"></i>
                </div>

                 <a href="{{ route('coach.viewall_approve_coach') }}" class="small-box-footer">
                    <i class="fa fa-arrow-circle-right"></i> View details
                </a>

            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
            <div class="small-box bg-yellow boxheight">
                <div class="inner">
                    <p style="font-size:11px !important;" class="text-uppercase">Total Patient</p>
                    <h3><?php echo $patient;?></h3>
                </div>
                <div class="icon boxheighticon">
                    <i class="fa fa-user"></i>
                </div>

                 <a href="{{ route('patient.viewall_patient') }}" class="small-box-footer">
                    <i class="fa fa-arrow-circle-right"></i> View details
                </a>

            </div>
        </div>


        <div class="col-lg-2 col-xs-6">
            <div class="small-box bg-aqua boxheight">
                <div class="inner">
                    <p style="font-size:11px !important;" class="text-uppercase">Total Hospital</p>
                    <h3><?php echo $hospital;?></h3>
                </div>
                <div class="icon boxheighticon">
                    <i class="fa fa-medkit"></i>
                </div>

                 <a href="{{ route('hospital.viewall_hospital') }}" class="small-box-footer">
                    <i class="fa fa-arrow-circle-right"></i> View details
                </a>

            </div>
        </div>


        <div class="col-lg-2 col-xs-6">
            <div class="small-box bg-red boxheight">
                <div class="inner">
                    <p style="font-size:11px !important;" class="text-uppercase">Total Labs</p>
                    <h3><?php echo $lab;?></h3>
                </div>
                <div class="icon boxheighticon">
                    <i class="fa fa-medkit"></i>
                </div>

                 <a href="{{ route('labreport.new') }}" class="small-box-footer">
                    <i class="fa fa-arrow-circle-right"></i> View details
                </a>

            </div>
        </div>

    </div>

</section>

@else

<div class="row" style="padding: 50px;background-color: #fff;height: 100vh;">
    <div class="col-xs-12">
        <center>
            <h3>Welcome to Travel</h3>
        </center>
    </div>
</div>
@endif

@endsection
