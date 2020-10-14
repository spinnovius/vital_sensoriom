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
                            <label class="" for="Radial Artery">Radial Artery</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="number" name="radial_rate" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->radial_rate}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <select class="form-control" name="rhythm" id="rhythm">
                                    <option class="">Select Rhythm</option>
                                    <option class="symmetrical" value="regular" <?php if($PatientGeNew=='regular'){ echo 'selected';}?>>Regular</option>
                                    <option class="asymmetrical" value="irregular" <?php if($PatientGeNew=='irregular'){ echo 'selected';}?>>Irregular</option>
                            </select>
                        </div>
                        <div class="col-md-6 md-6">
                            <select class="form-control" name="carotidartery" id="amplitude">
                                    <option class="">Select Amplitude & Countour</option>
                                    <option class="Normal" value="Normal" <?php if($PatientGeNew=='Normal'){ echo 'selected';}?>>Normal</option>
                                    <option class="Bisferiencs" value="Bisferiencs" <?php if($PatientGeNew=='Bisferiencs'){ echo 'selected';}?>>Bisferiencs</option>
                                    <option class="Collapsing" value="Collapsing" <?php if($PatientGeNew=='Collapsing'){ echo 'selected';}?>>Collapsing</option>
                                    <option class="Bisferiencs" value="Parvus et Tardus" <?php if($PatientGeNew=='Parvus et Tardus'){ echo 'selected';}?>>Parvus et Tardus</option>
                                    <option class="Alternans" value="Alternans" <?php if($PatientGeNew=='Alternans'){ echo 'selected';}?>>Alternans</option>
                                    <option class="Normal" value="Bigeminal" <?php if($PatientGeNew=='Bigeminal'){ echo 'selected';}?>>Bigeminal</option>
                                    <option class="Bisferiencs" value="Paradoxical" <?php if($PatientGeNew=='Paradoxical'){ echo 'selected';}?>>Paradoxical</option>
                                    <option class="Normal" value="Dicrotic" <?php if($PatientGeNew=='Dicrotic'){ echo 'selected';}?>>Dicrotic</option>
                                    <option class="Bisferiencs" value="Filiform" <?php if($PatientGeNew=='Filiform'){ echo 'selected';}?>>Filiform</option>
                        </select>
                        </div>
                    </div>


                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery" >Jugular Venous Pressure</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="jugularpressure" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->jugularpressure}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Thrills</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="thrills" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->thrills}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">S1</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="s1" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->s1}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">S2</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="s2" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->s2}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">S3</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="s3" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->s3}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">S4</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="s4" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->s4}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Murmurs</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="murmurs" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->murmurs}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Extra Sounds</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="extrasounds" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->extrasounds}}">
                        </div>
                    </div>

                    
                    <h3 class="card-title text-uppercase"><b>Orthopedic Specific Examination:</b></h3>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Pulmonary Exam</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="pulmonaryexam" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->pulmonaryexam}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Signs of Congestive Heart Failure</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="heartfailure" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->heartfailure}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Signs of Infective Endocarditis</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="endocarditis" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->endocarditis}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Signs of Rheumatic Heart Disease</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="heartdsease" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->heartdsease}}">
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Differential Diagnosis Cardiac Disease:</b></h3>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <?php 
                            $cardiacdisease=$PatientGeNew->cardiacdisease;                         
                            $arr = explode(',',$cardiacdisease);
                        ?>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="Degenerative disease" value="Congenital Heart Disease" name="cardiacdisease[]" <?php if(in_array('Congenital Heart Disease', $arr)){ echo "checked";}?>>
                                <label class="form-check-label" for="" style="font-size: 1em;">Congenital Heart Disease</label>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="Pulmonary Hypertension" value="Pulmonary Hypertension" name="cardiacdisease[]" <?php if(in_array('Pulmonary Hypertension', $arr)){ echo "checked";}?>>
                                <label class="form-check-label" for="" style="font-size: 1em;">Pulmonary Hypertension</label>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="Degenerative disease" value="Valvular Heart Disease" name="cardiacdisease[]" <?php if(in_array('Valvular Heart Disease', $arr)){ echo "checked";}?>>
                                <label class="form-check-label" for="" style="font-size: 1em;">RHD/ Valvular Heart Disease</label>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="Degenerative disease" value="Cardiomyopathy" name="cardiacdisease[]" <?php if(in_array('Cardiomyopathy', $arr)){ echo "checked";}?>>
                                <label class="form-check-label" for="" style="font-size: 1em;">Cardiomyopathy</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="Degenerative disease" value="Infective Endocarditis" name="cardiacdisease[]" <?php if(in_array('Infective Endocarditis', $arr)){ echo "checked";}?>>
                                <label class="form-check-label" for="" style="font-size: 1em;">Infective Endocarditis</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="Degenerative disease" value="Stroke" name="cardiacdisease[]" <?php if(in_array('Stroke', $arr)){ echo "checked";}?>>
                                <label class="form-check-label" for="" style="font-size: 1em;">Stroke</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="Degenerative disease" value="Coronary Heart Disease" name="cardiacdisease[]" <?php if(in_array('Coronary Heart Disease', $arr)){ echo "checked";}?>>
                                <label class="form-check-label" for="" style="font-size: 1em;">Coronary Heart Disease</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="Degenerative disease" value="Congestive Heart Failure" name="cardiacdisease[]" <?php if(in_array('Congestive Heart Failure', $arr)){ echo "checked";}?>>
                                <label class="form-check-label" for="" style="font-size: 1em;">Congestive Heart Failure</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="Degenerative disease" value="Arrhythmic Heart Disease" name="cardiacdisease[]" <?php if(in_array('Arrhythmic Heart Disease', $arr)){ echo "checked";}?>>
                                <label class="form-check-label" for="" style="font-size: 1em;">Arrhythmic Heart Disease</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="Degenerative disease" value="Peripheral Artery Disease" name="cardiacdisease[]" <?php if(in_array('Peripheral Artery Disease', $arr)){ echo "checked";}?>>
                                <label class="form-check-label" for="" style="font-size: 1em;">Peripheral Artery Disease</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Others</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="others" placeholder="Others" class="form-control" value="{{$PatientGeNew->others}}">
                        </div>
                    </div>

                   
                    
                    

                  

                <!--    <div class="form-row">-->
                <!--        <div class="col-md-4">-->
                <!--            <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>-->
                <!--            <button type="submit" class="btn btn-primary btn-info" value="submit">UPDATE</button>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</form>-->