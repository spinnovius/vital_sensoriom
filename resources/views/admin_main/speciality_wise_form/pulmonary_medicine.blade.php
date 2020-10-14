<form action="{{ route('admin_main.gestore',$patient_id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-row" style="margin-bottom: 1em;">
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
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">  
                            <textarea class="form-control" placeholder="General Appearance of the patient" name="notes"></textarea>
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Respiratory Specific Examination:</b></h3>
                    <h3 class="card-title text-uppercase"><b>General Respiratory Exam:</b></h3>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Respiratory Rate</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="number" name="respiratory_rate" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-12 md-12">
                            <select class="form-control" name="respiratory_rhythm" id="rhythm">
                                    <option class="">Select Rhythm</option>
                                    <option class="symmetrical" value="Regular">Regular</option>
                                    <option class="asymmetrical" value="Irregular">Irregular</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 md-4">
                            <label class="" for="Radial Artery">Use of accessory muscles of respiration:</label>
                        </div>
                        <div class="col-md-8 md-8">
                            <select class="form-control" name="respiration" id="respiration">
                                    <option class="">Select Answer</option>
                                    <option class="1" value="1">Yes</option>
                                    <option class="2" value="2">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 md-4">
                            <label class="" for="Radial Artery">Evidence of Carbon Dioxide Retention:</label>
                        </div>
                        <div class="col-md-8 md-8">
                            <select class="form-control" name="dioxide_retention" id="respiration">
                                    <option class="">Select Answer</option>
                                    <option class="1" value="1">Yes</option>
                                    <option class="2" value="2">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 md-4">
                            <label class="" for="Radial Artery">Troisier’s Sign:</label>
                        </div>
                        <div class="col-md-8 md-8">
                            <select class="form-control" name="troisier_sign" id="respiration">
                                    <option class="">Select Answer</option>
                                    <option class="1" value="1">Yes</option>
                                    <option class="2" value="2">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 md-4">
                            <label class="" for="Radial Artery">Chest Expansion:</label>
                        </div>
                        <div class="col-md-8 md-8">
                            <select class="form-control" name="chest_expansion" id="respiration">
                                    <option class="">Select Answer</option>
                                    <option class="1" value="Adequate">Adequate</option>
                                    <option class="2" value="Not Adequate">Not Adequate</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 md-4">
                            <label class="" for="Radial Artery">Percussion between ribs:</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="percussion_ribs" placeholder="Percussion between ribs" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 md-4">
                            <label class="" for="Radial Artery">Tactile Vocal Fremitus:</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="vocal_fremitus" placeholder="Tactile Vocal Fremitus" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 md-4">
                            <label class="" for="Radial Artery">Auscultation important notes:</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="auscultation_notes" placeholder="Auscultation important notes" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 md-4">
                            <label class="" for="Radial Artery">Any other important notes:</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="any_notes" placeholder="Any other important notes" class="form-control">
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>General Cardio Exam:</b></h3>
                    <div class="form-row">
                        <div class="col-md-12 md-12">
                            <label class="" for="Radial Artery"><b>Radial Artery</b></label>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Rate</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="number" name="Cardio_Rate" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-12 md-12">
                            <select class="form-control" name="rhythm" id="rhythm">
                                    <option class="">Select Rhythm</option>
                                    <option class="symmetrical" value="Regular">Regular</option>
                                    <option class="asymmetrical" value="Irregular">Irregular</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-12 md-12">
                            <select class="form-control" name="Carotid" id="rhythm">
                                    <option class="">Select Amplitude & Countour</option>
                                    <option class="Normal" value="Normal">Normal</option>
                                    <option class="Bisferiencs" value="Bisferiencs">Bisferiencs</option>
                                    <option class="Collapsing" value="Collapsing">Collapsing</option>
                                    <option class="Parvus et Tardus" value="Parvus et Tardus">Parvus et Tardus</option>
                                    <option class="Alternans" value="Alternans">Alternans</option>
                                    <option class="Bigeminal" value="Bigeminal">Bigeminal</option>
                                    <option class="Paradoxical" value="Paradoxical">Paradoxical</option>
                                    <option class="Dicrotic" value="Dicrotic">Dicrotic</option>
                                    <option class="Filiform" value="Filiform">Filiform</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                           <label class="" for="Radial Artery">Jugular Venous Pressure</label>
                        </div>

                        <div class="col-md-4 md-4">
                           <input type="text" name="jugular_pressure" class="form-control">
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Differential Diagnosis:</b></h3>
                    <div class="form-row" >
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="asthma" value="Asthma" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="asthma" style="font-size: 1em;">Asthma</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="copd" value="COPD" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="copd" style="font-size: 1em;">COPD</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="chronicbronchitis" value="Chronic Bronchitis" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="chronicbronchitis" style="font-size: 1em;">Chronic Bronchitis</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="emphysema" value="Emphysema" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="emphysema" style="font-size: 1em;">Emphysema</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="lungtumormass" value="Lung Tumor" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="lungtumormass" style="font-size: 1em;">Lung Tumor/ Mass</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="cysticfibrosisbronchiectasis" value="Cystic Fibrosis" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="cysticfibrosisbronchiectasis" style="font-size: 1em;">Cystic Fibrosis/ Bronchiectasis</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="pneumonia" value="Pneumonia" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="pneumonia" style="font-size: 1em;">Pneumonia</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="pleuraleffusion" value="Pleural Effusion" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="pleuraleffusion" style="font-size: 1em;">Pleural Effusion</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="pneumothorax" value="Pneumothorax" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="pneumothorax" style="font-size: 1em;">Pneumothorax</label>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-row">
                        
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="otherpleuraldisorders" value="Other Pleural disorders" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="otherpleuraldisorders" style="font-size: 1em;">Other Pleural disorders</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="acuterespiratorydistress" value="Acute Respiratory Distress" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="acuterespiratorydistress" style="font-size: 1em;">Acute Respiratory Distress</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="respiratoryfailure" value="Respiratory Failure" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="respiratoryfailure" style="font-size: 1em;">Respiratory Failure</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="tuberculosis" value="Tuberculosis" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="tuberculosis" style="font-size: 1em;">Tuberculosis</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;"> 
                        
                        <div class="col-md-6 mb-6">
                            <label class="form-check-label">Others</label>
                        </div>
                         <div class="col-md-4 mb-4">
                            <input type="text" name="others" placeholder="Others" value="" class="form-control">
                        </div>
                        
                    </div>

                  

                <!--    <div class="form-row">-->
                <!--        <div class="col-md-4">-->
                <!--            <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>-->
                <!--            <button type="submit" class="btn btn-primary btn-info" value="submit">SUBMIT</button>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</form>-->