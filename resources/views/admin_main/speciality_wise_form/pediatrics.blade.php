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

                    

                     <h3 class="card-title text-uppercase"><b>Pediatric Specific Examination:</b></h3> 

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Perinatal & Birth History">Perinatal & Birth History</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="perinatal_birth" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Developmental History">Developmental History</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="developmental_history" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Feeding History">Feeding History</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="feeding_history" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Immunization History">Immunization History</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="immunization_history" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Family History">Family History</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="family_history" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Past History">Past History</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="past_history" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="APGAR Score">APGAR Score</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="number" name="apgar_score" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <h3 class="card-title text-uppercase"><b>Neonatal Examination:</b></h3>
                    
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
                            <label class="" for="Weight">Weight(cm)</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="number" name="weight" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Length/ Height (">Length/ Height(cm)</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="number" name="length" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Head Circumference">Head Circumference(cm)</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="number" name="head_circum" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Skin">Skin</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="skin" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Lymph Nodes">Lymph Nodes</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="lymph_nodes" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Facies">Facies</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="facies" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Oral Cavity">Oral Cavity</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="oral_cavity" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Chest">Chest</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="chest" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Abdomen">Abdomen</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="abdomen" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Genitalia">Genitalia</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="genitalia" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Rectum and Anus">Rectum and Anus</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="rectum_anus" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Musculoskeletal">Musculoskeletal</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="musculoskeletal" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Back">Back</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="back" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Reflexes">Reflexes</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="reflexes" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Neurological Examination">Neurological Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="neurological_Examination" placeholder="Enter value" class="form-control">
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