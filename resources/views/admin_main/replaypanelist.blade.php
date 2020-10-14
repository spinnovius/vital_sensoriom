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
      <h3 class="card-title text-uppercase"><b>Replay Patient</b></h3>
    </div>
    <form action="{{ route('panel.update') }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')

      <input type="hidden" name="panel_id" value="{{$Panelist_id}}">

      <div class="form-row" style="margin-bottom: 2em;">
      	<div class="col-md-6">
      		<textarea class="form-control" placeholder="Enter reply of patient" name="answer"></textarea>
      	</div>
      </div>

      <div class="form-row">
        <div class="col-md-4">
          <!-- <button type="reset" class="btn btn-primary btn-info" value="Reset">RESET</button> -->
          <button type="submit" class="btn btn-primary btn-info" value="submit">UPDATE</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
@endsection