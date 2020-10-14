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

                    <h3 class="card-title text-uppercase"><b>Surgery Specific Examination::</b></h3>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-12 mb-12">
                            <label><b>Abdomen Exam</b></label>
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="abdominal" placeholder="Abdominal Quadrants" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="organomegaly" placeholder="Organomegaly" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="hernial" placeholder="Hernial sites" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="rectal" placeholder="Rectal Exam" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-12 mb-12">
                            <label><b>Breast Exam</b></label>
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="breast" placeholder="Breast & Nipple" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="localnodes" placeholder="Local Lymph Nodes" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="metastasis" placeholder="Signs of Metastasis" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="lumpexam" placeholder="Lump Exam" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="genitaliaexam" placeholder="Male Genitalia Exam" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-12 mb-12">
                            <label><b>Thyroid Exam</b></label>
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="thyroiddisease" placeholder="General exam of thyroid disease" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="eyeexam" placeholder="Eye Exam" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="thyroidexam" placeholder="Thyroid Exam" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="pembertonsign" placeholder="Pemberton’s Sign" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="ulcers_exam" placeholder="Ulcers Exam" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="limbs_exam" placeholder="Vascular Supply of Limbs Exam" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="system_exam" placeholder="Cardiovascular system Exam" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <textarea placeholder="Differential Diagnosis" name="diffdiagnosis" class="form-control"></textarea>
                        </div>
                    </div>


                 <!--   <div class="form-row">-->
                 <!--       <div class="col-md-4">-->
                 <!--           <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>-->
                 <!--           <button type="submit" class="btn btn-primary btn-info" value="submit">SUBMIT</button>-->
                 <!--       </div>-->
                 <!--   </div>-->
                 <!--</form>-->