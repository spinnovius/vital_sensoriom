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
                            <label class="" for="Visual Acuity">Visual Acuity</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="visual_acuity" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->visualacuity}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Pupils">Pupils</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="pupils" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->pupils}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Extraocular Motility & Alignment">Extraocular Motility & Alignment</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="extraocular" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->extraocularmotility}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Extraocular Motility & Alignment">Intraocular Pressure</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="intraocular" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->intraocular}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Confrontation Visual Fields">Confrontation Visual Fields</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="confrontation" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->confrontation}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="External Examination">External Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="external" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->external}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Slit Lamp Examination">Slit Lamp Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="slit" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->slitlamp}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Fundoscopic Examination">Fundoscopic Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="fundoscopic" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->fundoscopic}}">
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
