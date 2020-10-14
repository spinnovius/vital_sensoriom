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

                    <h3 class="card-title text-uppercase"><b>Type of OBG Patient:</b></h3>

                    <div class="form-row">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="Pregnant" value="Pregnant" name="obgpatient[]" >
                                <label class="form-check-label" for="Pregnant" style="font-size: 1em;">Pregnant</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="belowyears" value="18years" name="obgpatient[]" >
                                <label class="form-check-label" for="belowyears" style="font-size: 1em;">Below 18 years (Minor)</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="infertility" value="Infertility" name="obgpatient[]" >
                                <label class="form-check-label" for="infertility" style="font-size: 1em;">Infertility</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="contraception" value="Contraception" name="obgpatient[]" >
                                <label class="form-check-label" for="contraception" style="font-size: 1em;">Under Contraception</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="menopaused" value="Menopaused" name="obgpatient[]" >
                                <label class="form-check-label" for="menopaused" style="font-size: 1em;">Menopaused</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="hysterectomized" value="Hysterectomized" name="obgpatient[]" >
                                <label class="form-check-label" for="hysterectomized" style="font-size: 1em;">Hysterectomized</label>
                            </div>
                        </div>
                    </div>
                    
                    <h3 class="card-title text-uppercase"><b>Obstetrics Specific History & Examination:</b></h3>
                    <h3 class="card-title text-uppercase"><b>Obstetrics History:</b></h3>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Gravida</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="number" name="Gravida" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Parity</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="number" name="Parity" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Abortions</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="number" name="Abortions" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Live</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="number" name="Live" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">LMP</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="LMP" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">EDD</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="EDD" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Past Ectopic Pregnancy</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="ectopicpregnancy" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Bad Obstetric History</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="obstetrichistory" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    
                    <h3 class="card-title"><center>List of all past birth</center></h3>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="" for="Radial Artery">Name</label>
                        </div>
                        <div class="col-md-3">
                            <label class="" for="Radial Artery">Date of Birth</label>
                        </div>
                        <div class="col-md-3">
                            <label class="" for="Radial Artery">Sex</label>
                        </div>
                        <div class="col-md-3">
                            <label class="" for="Radial Artery">Complications, if any</label>
                        </div>
                    </div>
                    <div class="row" style="padding-bottom:1em;">
                        <div class="col-md-3">
                           <input type="text" name="birthname[]" placeholder="Enter value" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="dobofbirth[]" placeholder="Enter value" class="form-control dobpicker">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="sexofbirth[]" placeholder="Enter value" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="compli[]" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    <div class="row" style="padding-bottom:1em;">
                        <div class="col-md-3">
                            <input type="text" name="birthname[]" placeholder="Enter value" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="dobofbirth[]" placeholder="Enter value" class="form-control dobpicker">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="sexofbirth[]" placeholder="Enter value" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="compli[]" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    
                    <h3 class="card-title text-uppercase"><b>Obstetrics Exam:</b></h3>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Breast Exam for Pregnancy</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="BreastExam" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Abdominal Exam:</b></h3>

                    <h3 class="card-title text-uppercase"><b>Inspection:</b></h3>                    

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Previous CS scar">Previous CS scar</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="CSscar" placeholder="Previous CS scar" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Signs of Pregnancy">Signs of Pregnancy</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="SignsPregnancy" placeholder="Previous CS scar" class="form-control">
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Palpation:</b></h3>
                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Signs of Pregnancy">Synphysis-Fundal Height</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="SynphysisFundal" placeholder="Previous CS scar" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Signs of Pregnancy">Pelvic Grip</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="PelvicGrip" placeholder="Previous CS scar" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Signs of Pregnancy">Lie</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="Lie" placeholder="Previous CS scar" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Signs of Pregnancy">Presentation</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="Presentation" placeholder="Previous CS scar" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Signs of Pregnancy">Amniotic Fluid Volume</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="AmnioticFluid" placeholder="Previous CS scar" class="form-control">
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Auscultation:</b></h3>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Signs of Pregnancy">FHR</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="FHR" placeholder="Previous CS scar" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Pelvic Internal Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="InternalExamination" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Bi-Manual Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="ManualExamination" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Gynaecology Specific History & Examination:</b></h3>
                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Breast Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="BreastExamination" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Pelvic External Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="PelvicExamination" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Pelvic Speculum Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="SpeculumExamination" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Bi-Manual Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="BmanualExamination" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Per Rectal Examination</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="RectalExamination" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                <!--    <div class="form-row">-->
                <!--        <div class="col-md-4">-->
                <!--            <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>-->
                <!--            <button type="submit" class="btn btn-primary btn-info" value="submit">SUBMIT</button>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</form>-->