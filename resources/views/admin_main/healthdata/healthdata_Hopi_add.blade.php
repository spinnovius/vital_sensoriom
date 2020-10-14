  @extends('layouts.admin_main')
  @section('content')

  <ul class="nav nav-tabs">
   <li><a href="{{ route('store_patient.edit', $patient_id) }}">Details</a></li>
   <li class="active"><a href="{{ route('admin_main.hopiindex', $patient_id) }}">HOPI</a></li>
   <li><a href="{{ route('admin_main.geindex', $patient_id) }}">General Examination</a></li>
   <li><a href="{{ route('admin_main.seindex', $patient_id) }}">Systemic Examination</a></li>
   <li><a href="{{ route('admin_main.ppindex', $patient_id) }}">Prescription</a></li>
   <li><a href="{{ route('admin_main.atindex', $patient_id) }}">Advice Treatment</a></li>
 </ul>
 <section class="content-header" style="padding-bottom: 1em;">
  <h3 style="margin-left: 22px;">Add Present Illness (HOPI) Data</h3>
</section>
<div class="col-sm-10">
  <div class="container">
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
      <form action="{{ route('admin_main.hopistore',$patient_id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="complainnodiv">
          <div class="form-row" style="margin-bottom: 1em;">
            <div class="col-md-3 mb-3">
             <input type="text" name="complain[]" class="form-control" placeholder="Complaints" autocomplete="off" required>
           </div>
           <div class="col-md-1 mb-3">
             <label class="form-check-label" for="Since"><h4>Since</h4></label>
           </div>
           <div class="col-md-3 mb-3">
             <input type="text" name="complainno[]" class="form-control isnumbertype" placeholder="No." autocomplete="off" required>
           </div>
           <div class="col-md-3 mb-3">
            <select class="form-control" name="complaindays[]" required>
              <option value="hours">Hrs</option>
              <option value="days">Days</option>
              <option value="weeks">Weeks</option>
              <option value="months">Months</option>
              <option value="years">Years</option>
            </select>
             <!-- <input type="text" name="complaindays[]" class="form-control" placeholder="Days/Months" autocomplete="off" required> -->
           </div>
           <div class="col-md-2 mb-3">
             <span class="btn btn-primary complainnoplusbtm">+</span>
           </div>
         </div>
       </div>
       <div class="comorbidinodiv">
        <div class="form-row" style="margin-bottom: 1em;">
          <div class="col-md-3 mb-3">
           <input type="text" name="comorbidi[]" class="form-control" placeholder="Comorbidities" autocomplete="off">
         </div>
         <div class="col-md-1 mb-3">
           <label class="form-check-label" for="Since"><h4>Since</h4></label>
         </div>
         <div class="col-md-3 mb-3">
           <input type="text" name="comorbidino[]" class="form-control isnumbertype" placeholder="No." autocomplete="off">
         </div>
         <div class="col-md-3 mb-3">
            <select class="form-control"  name="comorbidays[]" required>
              <option value="hours">Hrs</option>
              <option value="days">Days</option>
              <option value="weeks">Weeks</option>
              <option value="months">Months</option>
              <option value="years">Years</option>
            </select>
           <!-- <input type="text" name="comorbidays[]" class="form-control daymonthselect" placeholder="Days/Months" autocomplete="off"> -->
         </div>
         <div class="col-md-2 mb-3">
           <span class="btn btn-primary comorbidinoplusbtm">+</span>
         </div>
       </div>
     </div>
     <div class="form-row" style="margin-bottom: 1em;">
        <label class="form-check-label" for="AddRiskFactors"><h4>Add Risk Factors</h4></label>
     </div>
     <div class="form-row" style="margin-bottom: 1em;">
      <div class="col-md-3 mb-3">
       <div class="form-check">
         <input type="checkbox" class="form-check-input" value="Obese" name="hopidata[]" id="Obese">
         <label class="form-check-label" for="Obese">Obese</label>
       </div>
     </div>
     <div class="col-md-3 mb-3">
       <div class="form-check">
         <input type="checkbox" class="form-check-input" value="High Stress Levels" name="hopidata[]" id="High Stress Levels">
         <label class="form-check-label" for="High Stress Levels">High Stress Levels</label>
       </div>
     </div>
     <div class="col-md-3 mb-3">
       <div class="form-check">
         <input type="checkbox" class="form-check-input" value="Sedentary Lifestyle" name="hopidata[]" id="Sedentary Lifestyle">
         <label class="form-check-label" for="Sedentary Lifestyle">Sedentary Lifestyle</label>
       </div>
     </div>
   </div>

   <div class="form-row" style="margin-bottom: 1em;">
    <div class="col-md-3 mb-3">
     <div class="form-check">
       <input type="checkbox" class="form-check-input" value="Drug Dependence" name="hopidata[]" id="Drug Dependence">
       <label class="form-check-label" for="Drug Dependence">Drug Dependence</label>
     </div>
   </div>
   <div class="col-md-3 mb-3">
     <div class="form-check">
       <input type="checkbox" class="form-check-input" value="Alcoholism" name="hopidata[]" id="Alcoholism">
       <label class="form-check-label" for="Alcoholism">Alcoholism</label>
     </div>
   </div>
   <div class="col-md-3 mb-3">
     <div class="form-check">
       <input type="checkbox" class="form-check-input" value="Smoking" name="hopidata[]" id="Smoking">
       <label class="form-check-label" for="Smoking">Smoking</label>
     </div>
   </div>
  </div>
  <div class="form-row">
    <div class="col-md-4">
      <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>
      <button type="submit" class="btn btn-primary btn-info" value="submit">SUBMIT</button>
    </div>
  </div>
  </form>
</div>
</div>
<script>
var count = 1;
// complainnoplusbtm
jQuery('body').on('click', '.complainnoplusbtm', function (e) {
  jQuery('.complainnodiv').append('<div class="form-row"><div class="col-md-3 mb-3"><input type="text" name="complain[]" class="form-control" placeholder="Complaints" autocomplete="off" required></div><div class="col-md-1 mb-3"><label class="form-check-label" for="Since"><h4>Since</h4></label></div><div class="col-md-3 mb-3"><input type="text" name="complainno[]" class="form-control isnumbertype" placeholder="No." autocomplete="off" required></div><div class="col-md-3 mb-3"><select class="form-control" name="complaindays[]" required><option value="hours">Hrs</option><option value="days">Days</option><option value="weeks">Weeks</option><option value="months">Months</option><option value="years">Years</option></select></div><div class="col-md-2 mb-3"><span class="btn btn-primary complainnominusbtm">-</span></div></div>');
              count ++;
});
jQuery('body').on('click', '.complainnominusbtm', function (e) {
      jQuery(this).closest('.form-row').remove();
});

// comorbidinodiv
jQuery('body').on('click', '.comorbidinoplusbtm', function (e) {
  jQuery('.comorbidinodiv').append('<div class="form-row"><div class="col-md-3 mb-3"><input type="text" name="comorbidi[]" class="form-control" placeholder="Comorbidities" autocomplete="off" required></div><div class="col-md-1 mb-3"><label class="form-check-label" for="Since"><h4>Since</h4></label></div><div class="col-md-3 mb-3"><input type="text" name="comorbidino[]" class="form-control isnumbertype" placeholder="No." autocomplete="off" required></div><div class="col-md-3 mb-3"><select class="form-control" name="complaindays[]" required><option value="hours">Hrs</option><option value="days">Days</option><option value="weeks">Weeks</option><option value="months">Months</option><option value="years">Years</option></select></div><div class="col-md-2 mb-3"><span class="btn btn-primary comorbidinominusbtm">-</span></div></div>');
    count ++;
});
jQuery('body').on('click', '.comorbidinominusbtm', function (e) {
      jQuery(this).closest('.form-row').remove();
});


</script>
@endsection

