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

                     <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="General Appearance">General Appearance</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="general" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->generalappearance}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Arms & Hands">Arms & Hands</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="arms_hands" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->armshands}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Face">Face</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="face" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->face}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Head & Neck">Head & Neck</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="head_neck" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->headneck}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Chest">Chest</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="chest" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->chest}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Abdomen">Abdomen</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="abdomen" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->abdomen}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Legs">Legs</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="legs" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->legs}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Groin & Genitals">Groin & Genitals</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="groingenitals" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->groin}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Back">Back</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="back" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->back}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="PR Examination">PR Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="prexamination" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->pr_examination}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Differential Diagnosis">Differential Diagnosis</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="differentialdiagnosis" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->diff_diagnosis}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Planned Procedure">Planned Procedure</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="plannedprocedure" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->planned_procedure}}">
                        </div>
                    </div>