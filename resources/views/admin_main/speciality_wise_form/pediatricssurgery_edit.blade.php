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

                    <h3 class="card-title text-uppercase"><b>Pediatric Specific Examination:</b></h3> 

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Perinatal & Birth History">Perinatal & Birth History</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="perinatal_birth" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->perinatal}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Developmental History">Developmental History</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="developmental_history" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->development}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Feeding History">Feeding History</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="feeding_history" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->feeding}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Immunization History">Immunization History</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="immunization_history" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->immunization}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Family History">Family History</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="family_history" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->family}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Past History">Past History</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="past_history" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->past}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="APGAR Score">APGAR Score</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="number" name="apgar_score" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->apgar}}">
                        </div>
                    </div>
                    
                    <h3 class="card-title text-uppercase"><b>Neonatal Examination:</b></h3>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="General Appearance">General Appearance</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="general_appearance" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->general_appearance}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Weight">Weight(cm)</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="number" name="weight" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->weight}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Length/ Height (">Length/ Height (cm)</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="number" name="length" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->length}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Head Circumference">Head Circumference(cm)</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="number" name="head_circum" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->head}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Skin">Skin</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="skin" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->skin}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Lymph Nodes">Lymph Nodes</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="lymph_nodes" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->lymph}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Facies">Facies</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="facies" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->facies}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Oral Cavity">Oral Cavity</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="oral_cavity" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->oral}}">
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
                            <label class="" for="Genitalia">Genitalia</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="genitalia" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->genitalia}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Rectum and Anus">Rectum and Anus</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="rectum_anus" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->rectum}}">
                        </div>
                    </div>
                    
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Musculoskeletal">Musculoskeletal</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="musculoskeletal" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->musculos}}">
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
                            <label class="" for="Reflexes">Reflexes</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="reflexes" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->reflexes}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Neurological Examination">Neurological Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="neurological_Examination" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->neurological}}">
                        </div>
                    </div>
                    
                    <h3 class="card-title text-uppercase"><b>Surgery Specific Examination:</b></h3> 
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Local Examimation">Local Examimation</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="local_examimation" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->local}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Lump Exam">Lump Exam</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="lump_exam" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->lump}}">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Ulcers Exam">Ulcers Exam</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="ulcers_exam" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->ulcers}}">
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
                            <input type="text" name="planned_procedure" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->planned_procedures}}">
                        </div>
                    </div>
                    