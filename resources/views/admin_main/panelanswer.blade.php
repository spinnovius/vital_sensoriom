@extends('layouts.admin_main')
@section('content')
<div class="row">
  <div class="col-md-12">
<div class="col-md-12">
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
    <div class="">
      <h3 class="card-title text-uppercase"><b>Answer</b></h3>
    </div>
    <ul class="nav nav-tabs">
        <li><a href="{{route('admin_main.answer',$Patient_id)}}">Doctor Answer</a></li>
        <li class="active"><a href="{{route('admin_main.panelanswer',$Patient_id)}}">Panelists Answer</a></li>
    </ul>
        <div class="row" style="margin-top:2em;">
            <div class="col-8">
                <b style="padding-bottom:2em;">Answer:</b>
                <p>
                     @if(!is_null($Patient_detail->answer))
                        {{$Patient_detail->answer}}
                    @else
                        Panelists Reply Message - Please Waiting
                    @endif
                    
                </p>        
            </div>
        </div>
  </div>
</div>
</div>
@endsection