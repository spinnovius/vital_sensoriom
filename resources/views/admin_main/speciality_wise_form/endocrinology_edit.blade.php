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
                            <label class="" for="Radial Artery">Built & Stature</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="built" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->built}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Hair Changes</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="hair" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->hair}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Eye Changes</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="eye" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->eye}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Ear Changes</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="ear" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->ear}}">
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Mid-facial Structure</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="mid" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->midfacial}}">
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Lip Changes</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="lip" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->lip}}">
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Dental Alliance</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="dental" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->dental}}">
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Tongue Changes</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="tongue" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->tongue}}">
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Neck Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="neck" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->neck}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Skin & Nail Changes</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="skin" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->skin}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Podiatric Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="podiatric" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->podiatric}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Peripheral Vascular Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="vascular" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->peripheral}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Complete Thyroid Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="thyroid" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->complete}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">External Genitalia Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="external_gene" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->external}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Sexual Maturation Index</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="sexual" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->sexual}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Systemic Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="systemic" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->systemic}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Differential Diagnosis</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="diff_diagnosis" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->diff_diagnosis}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Planned Procedure</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="planned_procedure" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->planned_procedure}}">
                        </div>
                    </div>
                    
                    
