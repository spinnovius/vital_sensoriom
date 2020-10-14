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
                        <div class="col-md-6 mb-6">  
                            <textarea class="form-control" placeholder="General Appearance of the patient" name="notes"></textarea>
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>General Systemic Exam:</b></h3>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">
                            <label class="form-check-label">Cardiovascular</label>
                        </div>
                         <div class="col-md-4 mb-4">
                            <input type="text" name="cardiovascular" placeholder="Cardiovascular" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">
                            <label class="form-check-label">Respiratory</label>
                        </div>
                         <div class="col-md-4 mb-4">
                            <input type="text" name="respiratory" placeholder="Respiratory" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">
                            <label class="form-check-label">Central Nervous System</label>
                        </div>
                         <div class="col-md-4 mb-4">
                            <input type="text" name="comascale" placeholder="Respiratory" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">
                            <label class="form-check-label">Abdominal</label>
                        </div>
                         <div class="col-md-4 mb-4">
                            <input type="text" name="abdominal" placeholder="Abdominal" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">
                            <label class="form-check-label">Genitourinary</label>
                        </div>
                         <div class="col-md-4 mb-4">
                            <input type="text" name="genitourinary" placeholder="Genitourinary" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">
                            <label class="form-check-label">Endocrine & Metabolism</label>
                        </div>
                         <div class="col-md-4 mb-4">
                            <input type="text" name="endocrinemeta" placeholder="Endocrine & Metabolism" value="" class="form-control">
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Diabetes Specific Examination:</b></h3>
                    <?php 
                        $diabetes_examination = DB::table('diabetes_examination')->get();
                    ?>
                    <div class="form-row">
                        @foreach ($diabetes_examination as $de)
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="d{{$de->id}}" value="{{$de->id}}" name="diabetesexamination_name[]" >
                                <label class="form-check-label" for="d{{$de->id}}" style="font-size: 1em;">{{$de->name}}</label>
                            </div>
                        </div>
                         @endforeach
                    </div>
                    <h3 class="card-title text-uppercase"><b>Podiatric Exam:</b></h3>
                    <div class="form-row" style="margin-bottom: 1em;">
                    
                         <div class="col-md-4 mb-4">
                            <input type="text" name="podiatricexam" placeholder="Respiratory" value="" class="form-control">
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Type of Diabetes:</b></h3>
                    
                    <div class="form-row">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="type1" value="Type 1" name="typeofdiabetes[]" >
                                <label class="form-check-label" for="type1" style="font-size: 1em;">Type 1</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="type2" value="Type 2" name="typeofdiabetes[]" >
                                <label class="form-check-label" for="type2" style="font-size: 1em;">Type 2</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="Gestational" value="Gestational" name="typeofdiabetes[]" >
                                <label class="form-check-label" for="Gestational" style="font-size: 1em;">Gestational</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="Pancreatic" value="Pancreatic" name="typeofdiabetes[]" >
                                <label class="form-check-label" for="Pancreatic" style="font-size: 1em;">Pancreatic</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="steroidinduced" value="Steroid Induced" name="typeofdiabetes[]" >
                                <label class="form-check-label" for="steroidinduced" style="font-size: 1em;">Steroid Induced</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="prediabetes" value="Pre Diabetes" name="typeofdiabetes[]" >
                                <label class="form-check-label" for="prediabetes" style="font-size: 1em;">Pre Diabetes</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="LADA" value="LADA" name="typeofdiabetes[]" >
                                <label class="form-check-label" for="LADA" style="font-size: 1em;">LADA</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="MODY" value="MODY" name="typeofdiabetes[]" >
                                <label class="form-check-label" for="MODY" style="font-size: 1em;">MODY</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-6">
                            <textarea placeholder="Differential Diagnosis" name="diffdianosis" class="form-control"></textarea>
                        </div>
                    </div>

                   
                <!--    <div class="form-row">-->
                <!--        <div class="col-md-4">-->
                <!--            <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>-->
                <!--            <button type="submit" class="btn btn-primary btn-info" value="submit">SUBMIT</button>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</form>-->