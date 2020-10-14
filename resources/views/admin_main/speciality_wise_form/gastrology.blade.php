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
                    
                    <h3 class="card-title text-uppercase"><b>INSPECTION:</b></h3>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Relevant positive findings">Relevant positive findings</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="relevant_positive" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <h3 class="card-title text-uppercase"><b>PALPATION:</b></h3>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Relevant positive findings">Relevant positive findings</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="relevant_palpation" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Tenderness points">Tenderness points</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="tenderness_points" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Organomegaly">Organomegaly, if any</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="organomegaly" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Organomegaly">Hernial Sites</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="hernialsites" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Organomegaly">Abdominal Aorta</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="abdominal_aorta" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    
                    <h3 class="card-title text-uppercase"><b>PERCUSSION:</b></h3>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Relevant positive findings">Relevant positive findings</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="relevant_percussion" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Examination for Ascites">Examination for Ascites</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="examination_ascites" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <h3 class="card-title text-uppercase"><b>AUSCULTATION:</b></h3>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Relevant positive findings">Relevant positive findings</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="relevant_auscultation" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <h3 class="card-title text-uppercase"><b>EXTERNAL GENITALIA & PR EXAM:</b></h3>
                    
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Relevant positive findings">Relevant positive findings</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="relevant_external" placeholder="Enter value" class="form-control">
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