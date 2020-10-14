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

                    

                    <!-- <h3 class="card-title text-uppercase"><b>General Cardio Exam:</b></h3> -->

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Visual Acuity">Visual Acuity</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="visual_acuity" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Pupils">Pupils</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="pupils" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Extraocular Motility & Alignment">Extraocular Motility & Alignment</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="extraocular" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Extraocular Motility & Alignment">Intraocular Pressure</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="intraocular" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Confrontation Visual Fields">Confrontation Visual Fields</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="confrontation" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="External Examination">External Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="external" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Slit Lamp Examination">Slit Lamp Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="slit" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Fundoscopic Examination">Fundoscopic Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="fundoscopic" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Differential Diagnosis">Differential Diagnosis</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="diff_diagnosis" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Planned Procedure">Planned Procedure</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="planned_procedure" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    

                   
                    
                    

                  

                <!--    <div class="form-row">-->
                <!--        <div class="col-md-4">-->
                <!--            <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>-->
                <!--            <button type="submit" class="btn btn-primary btn-info" value="submit">SUBMIT</button>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</form>-->