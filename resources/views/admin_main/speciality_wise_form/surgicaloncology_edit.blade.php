<form action="{{ route('admin_main.geupdate',[$patient_id, $patientge->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-row" style="margin-bottom: 1em;"style="margin-bottom: 1em;">
                        <label for="Add clinical data of Systemic Examination of your specialty form (selected from the settings) or add your own in the notes below (optional):"><b>Add clinical data of Systemic Examination of your specialty form (selected from the settings) or add your own in the notes below (optional):</b></label>
                    </div>
                    <div class="form-row">
                       @foreach ($ge as $g)
                        <?php 
                            $examination_id=$patientge->examination_id;         
                            $arr = explode(',',$examination_id);
                        ?>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="{{$g->id}}" value="{{$g->id}}" <?php if(in_array($g->id, $arr)){ echo "checked";}?> name="examination_name[]">
                                <label class="form-check-label" for="{{$g->id}}"style="font-size: 1em;" >{{$g->examination_name}}</label>
                            </div>
                        </div>
                         @endforeach
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;"style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">  
                            <textarea class="form-control" placeholder="General Appearance of the patient" name="notes">{{$patientge->notes}}</textarea>
                        </div>
                    </div>

                   <h3 class="card-title text-uppercase"><b>Cardio Specific Examination:</b></h3>

                    <!-- <h3 class="card-title text-uppercase"><b>General Cardio Exam:</b></h3> -->

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="General Appearance">General Appearance</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="general_appearance" placeholder="Enter value" class="form-control"value="{{$PatientGeNew->generalappearance}}">
                        </div>
                    </div>
                    
                    <h3 class="card-title text-uppercase"><b>AREA SPECIFIC EXAMINATION:</b></h3>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Site">Site</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="site" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->site}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Lump Exam">Lump Exam</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="lump_exam" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->lumpexam}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Vascular Supply of affected area">Vascular Supply of affected area</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="vascular_area" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->vascular}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Nerve Supply of affected area">Nerve Supply of affected area</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="nerve_area" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->nerve}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Lymphatics of affected area">Lymphatics of affected area</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="lymphatics_area" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->lymphatics}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Spread or Metastases">Spread or Metastases</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="spread_area" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->spread}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Differential Diagnosis">Differential Diagnosis</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="diff_diagnosis" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->diff_diagnosis}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Planned Procedure">Planned Procedure</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="planned_procedure" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->planned_procedure}}">
                        </div>
                    </div>
