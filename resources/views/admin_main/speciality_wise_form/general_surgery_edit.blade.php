<form action="{{ route('admin_main.geupdate',[$patient_id, $patientge->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-row" style="margin-bottom: 1em;">
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
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">  
                            <textarea class="form-control" placeholder="General Appearance of the patient" name="notes">{{$patientge->notes}}</textarea>
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Surgery Specific Examination::</b></h3>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-12 mb-12">
                            <label><b>Abdomen Exam</b></label>
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="abdominal" placeholder="Abdominal Quadrants" value="{{$PatientGeNew->abdominal}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="organomegaly" placeholder="Organomegaly" value="{{$PatientGeNew->organomegaly}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="hernial" placeholder="Hernial sites" value="{{$PatientGeNew->hernial}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="rectal" placeholder="Rectal Exam" value="{{$PatientGeNew->rectal}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-12 mb-12">
                            <label><b>Breast Exam</b></label>
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="breast" placeholder="Breast & Nipple" value="{{$PatientGeNew->breast}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="localnodes" placeholder="Local Lymph Nodes" value="{{$PatientGeNew->localnodes}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="metastasis" placeholder="Signs of Metastasis" value="{{$PatientGeNew->metastasis}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="lumpexam" placeholder="Lump Exam" value="{{$PatientGeNew->lumpexam}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="genitaliaexam" placeholder="Male Genitalia Exam" value="{{$PatientGeNew->genitaliaexam}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-12 mb-12">
                            <label><b>Thyroid Exam</b></label>
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="thyroiddisease" placeholder="General exam of thyroid disease" value="{{$PatientGeNew->thyroiddisease}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="eyeexam" placeholder="Eye Exam" value="{{$PatientGeNew->eyeexam}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="thyroidexam" placeholder="Thyroid Exam" value="{{$PatientGeNew->thyroidexam}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="pembertonsign" placeholder="Pemberton’s Sign" value="{{$PatientGeNew->pembertonsign}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="ulcers_exam" placeholder="Ulcers Exam" value="{{$PatientGeNew->ulcers_exam}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="limbs_exam" placeholder="Vascular Supply of Limbs Exam" value="{{$PatientGeNew->limbs_exam}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="system_exam" placeholder="Cardiovascular system Exam" value="{{$PatientGeNew->system_exam}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <textarea placeholder="Differential Diagnosis" name="diffdiagnosis" class="form-control">{{$PatientGeNew->diffdiagnosis}}</textarea>
                        </div>
                    </div>


                <!--    <div class="form-row">-->
                <!--        <div class="col-md-4">-->
                <!--            <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>-->
                <!--            <button type="submit" class="btn btn-primary btn-info" value="submit">UPDATE</button>-->
                <!--        </div>-->
                <!--    </div> -->
                <!--</form> -->