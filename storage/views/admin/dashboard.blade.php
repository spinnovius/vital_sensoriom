@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
@if(Session::get('admin_role') && Session::get('admin_role') == 1)
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
        <!-- Total Amount -->
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <p class="text-uppercase">Total User</p>
                    <h3>12</h3>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-bag"></i>
                </div>
                <a target="_blank" href="" class="small-box-footer"> 
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

