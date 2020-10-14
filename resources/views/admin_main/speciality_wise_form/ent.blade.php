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
                            <label class="" for="General Appearance">General Appearance</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="general_appearance" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Ability to Communicate & Quality of Voice">Ability to Communicate & Quality of Voice</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="ability_communicate" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Constitutional Symptoms, If Any">Constitutional Symptoms, If Any</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="constitutional" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <h3 class="card-title text-uppercase"><b>EAR,NOSE,MOUTH & THROAT</b></h3>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="External Examination (Ear & Nose)">External Examination (Ear & Nose)</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="external_examination" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Nasal Mucosa, Septum & Turbinates">Nasal Mucosa, Septum & Turbinates</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="nasal" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Lips, Teeth & Gums">Lips, Teeth & Gums</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="lips" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Examination of Oropharynx">Examination of Oropharynx</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="examination" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Pharyngeal walls & Pyriform Sinuses">Pharyngeal walls & Pyriform Sinuses</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="pharyngeal" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Laryngoscopic Examination">Laryngoscopic Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="laryngoscopic" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Adenoids, Posterior Choanae & Eustachian Tube">Adenoids, Posterior Choanae & Eustachian Tube</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="adenoids" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="External Auditory Canal & Tympanic Membrane Examination">External Auditory Canal & Tympanic Membrane Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="external" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Assessment of Hearing">Assessment of Hearing</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="assessment" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <h3 class="card-title text-uppercase"><b>HEAD,NECK & FACE</b></h3>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Salivary Glands">Salivary Glands</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="salivary" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Tender Areas">Tender Areas</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="tender" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Examination of Neck">Examination of Neck</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="examination_neck" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Thyroid Examination">Thyroid Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="thyroid_examination" placeholder="Enter value" class="form-control">
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