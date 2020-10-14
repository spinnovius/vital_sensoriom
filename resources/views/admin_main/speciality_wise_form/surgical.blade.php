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

                    <h3 class="card-title text-uppercase"><b>Cardio Specific Examination:</b></h3>

                    <!-- <h3 class="card-title text-uppercase"><b>General Cardio Exam:</b></h3> -->

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Radial Artery</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="number" name="radial_rate" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <select class="form-control" name="rhythm" id="rhythm">
                                    <option class="">Select Rhythm</option>
                                    <option class="symmetrical" value="regular">Regular</option>
                                    <option class="asymmetrical" value="irregular">Irregular</option>
                            </select>
                        </div>
                        <div class="col-md-6 md-6">
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

                    
                    <h3 class="card-title text-uppercase"><b>Orthopedic Specific Examination:</b></h3>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Pulmonary Exam</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="pulmonaryexam" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Signs of Congestive Heart Failure</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="heartfailure" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Signs of Infective Endocarditis</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="endocarditis" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Signs of Rheumatic Heart Disease</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="heartdsease" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Differential Diagnosis Cardiac Disease:</b></h3>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="degenerativedisease" value="Congenital Heart Disease" name="cardiacdisease[]" >
                                <label class="form-check-label" for="degenerativedisease" style="font-size: 1em;">Congenital Heart Disease</label>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="pulmonaryhypertension" value="Pulmonary Hypertension" name="cardiacdisease[]" >
                                <label class="form-check-label" for="pulmonaryhypertension" style="font-size: 1em;">Pulmonary Hypertension</label>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="valvularheartdisease" value="Valvular Heart Disease" name="cardiacdisease[]" >
                                <label class="form-check-label" for="valvularheartdisease" style="font-size: 1em;">RHD/ Valvular Heart Disease</label>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="cardiomyopathy" value="Cardiomyopathy" name="cardiacdisease[]" >
                                <label class="form-check-label" for="cardiomyopathy" style="font-size: 1em;">Cardiomyopathy</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="infectiveendocarditis" value="Infective Endocarditis" name="cardiacdisease[]" >
                                <label class="form-check-label" for="infectiveendocarditis" style="font-size: 1em;">Infective Endocarditis</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="stroke" value="Stroke" name="cardiacdisease[]" >
                                <label class="form-check-label" for="stroke" style="font-size: 1em;">Stroke</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="coronaryheartdisease" value="Coronary Heart Disease" name="cardiacdisease[]" >
                                <label class="form-check-label" for="coronaryheartdisease" style="font-size: 1em;">Coronary Heart Disease</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="congestiveheartfailure" value="Congestive Heart Failure" name="cardiacdisease[]" >
                                <label class="form-check-label" for="congestiveheartfailure" style="font-size: 1em;">Congestive Heart Failure</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="arrhythmicheartdisease" value="Arrhythmic Heart Disease" name="cardiacdisease[]" >
                                <label class="form-check-label" for="arrhythmicheartdisease" style="font-size: 1em;">Arrhythmic Heart Disease</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="peripheralarterydisease" value="Peripheral Artery Disease" name="cardiacdisease[]" >
                                <label class="form-check-label" for="peripheralarterydisease" style="font-size: 1em;">Peripheral Artery Disease</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Others</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="others" placeholder="Others" class="form-control">
                        </div>
                    </div>

                   
                    
                    

                  

                <!--    <div class="form-row">-->
                <!--        <div class="col-md-4">-->
                <!--            <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>-->
                <!--            <button type="submit" class="btn btn-primary btn-info" value="submit">SUBMIT</button>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</form>-->