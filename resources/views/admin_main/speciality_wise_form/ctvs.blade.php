<form action="{{ route('admin_main.gestore',$patient_id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-row" style="margin-bottom: 1em;"style="margin-bottom: 1em;">
                        <label for="Add clinical data of Systemic Examination of your specialty form (selected from the settings) or add your own in the notes below (optional):"><b>Add clinical data of Systemic Examination of your specialty form (selected from the settings) or add your own in the notes below (optional):</b></label>
                    </div>
                    <div class="form-row">
                        @foreach ($ge as $g)
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="{{$g->id}}" value="{{$g->id}}" name="examination_name[]" >
                                <label class="form-check-label" for="{{$g->id}}" style="font-size: 1em;">{{$g->examination_name}}</label>
                            </div>
                        </div>
                         @endforeach
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;"style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">  
                            <textarea class="form-control" placeholder="General Appearance of the patient" name="notes"></textarea>
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">General Appearance</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="general" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    <h3 class="card-title text-uppercase"><b>Cardio Specific Examination:</b></h3>

                     <h3 class="card-title text-uppercase"><b>General Cardio Exam:</b></h3> 

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Radial Artery</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="number" name="radial_rate" placeholder="beats/min" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Rhythm</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <select class="form-control" name="rhythm" id="rhythm">
                                    <option class="">Select Rhythm</option>
                                    <option class="symmetrical" value="regular">Regular</option>
                                    <option class="asymmetrical" value="irregular">Irregular</option>
                            </select>
                        </div>
                    </div>
                    <div class=form-row style="margin-bottom:1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Carotid Artery</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <select class="form-control" name="carotidartery" id="amplitude">
                                    <option class="">Select Amplitude & Countour</option>
                                    <option class="Normal" value="Normal">Normal</option>
                                    <option class="Bisferiencs" value="Bisferiencs">Bisferiencs</option>
                                    <option class="Collapsing" value="Collapsing">Collapsing</option>
                                    <option class="Bisferiencs" value="Parvus et Tardus">Parvus et Tardus</option>
                                    <option class="Alternans" value="Alternans">Alternans</option>
                                    <option class="Normal" value="Bigeminal">Bigeminal</option>
                                    <option class="Bisferiencs" value="Paradoxical">Paradoxical</option>
                                    <option class="Normal" value="Dicrotic">Dicrotic</option>
                                    <option class="Bisferiencs" value="Filiform">Filiform</option>
                        </select>
                        </div>
                    </div>
                
                        


                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery" >Jugular Venous Pressure</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="jugularpressure" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Thrills</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="thrills" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">S1</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="s1" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">S2</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="s2" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">S3</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="s3" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">S4</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="s4" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Murmurs</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="murmurs" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Extra Sounds</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="extrasounds" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    
                     <h3 class="card-title text-uppercase"><b>Pulmonary Exam:</b></h3> 

<div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Respiratory Rate</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="number" name="respiratory_rate" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Rhythm</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <select class="form-control" name="respiratory_rhythm" id="rhythm">
                                    <option class="">Select Rhythm</option>
                                    <option class="symmetrical" value="Regular">Regular</option>
                                    <option class="asymmetrical" value="Irregular">Irregular</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Use of accessory muscles of respiration:</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <select class="form-control" name="respiration" id="respiration">
                                    <option class="">Select Answer</option>
                                    <option class="1" value="1">Yes</option>
                                    <option class="2" value="2">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Evidence of Carbon Dioxide Retention:</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <select class="form-control" name="dioxide_retention" id="respiration">
                                    <option class="">Select Answer</option>
                                    <option class="1" value="1">Yes</option>
                                    <option class="2" value="2">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Troisier’s Sign:</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <select class="form-control" name="troisier_sign" id="respiration">
                                    <option class="">Select Answer</option>
                                    <option class="1" value="1">Yes</option>
                                    <option class="2" value="2">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Chest Expansion:</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <select class="form-control" name="chest_expansion" id="respiration">
                                    <option class="">Select Answer</option>
                                    <option class="1" value="Adequate">Adequate</option>
                                    <option class="2" value="Not Adequate">Not Adequate</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Percussion between ribs:</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="percussion_ribs" placeholder="Enter Value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Tactile Vocal Fremitus:</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="vocal_fremitus" placeholder="Enter Value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Auscultation important notes:</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="auscultation_notes" placeholder="Enter Value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Any other important notes:</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="any_notes" placeholder="Enter Value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Peripheral Vascular Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="peripheral_examination" placeholder="Enter Value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Signs of Congestive Heart Failure</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="heart_failure" placeholder="Enter Value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Signs of Infective Endocarditis</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="infective_endocarditis" placeholder="Enter Value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Signs of Rheumatic Heart Disease</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="heart_disease" placeholder="Enter Value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Differential Diagnosis</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="diff_diagnosis" placeholder="Enter Value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Planned Procedure:</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="planned_procedure" placeholder="Enter Value" class="form-control">
                        </div>
                    </div>
                    

                  

                <!--    <div class="form-row">-->
                <!--        <div class="col-md-4">-->
                <!--            <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>-->
                <!--            <button type="submit" class="btn btn-primary btn-info" value="submit">SUBMIT</button>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</form>-->