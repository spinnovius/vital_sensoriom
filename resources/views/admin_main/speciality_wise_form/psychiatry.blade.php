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

                    <h3 class="card-title text-uppercase"><b>Risk Assessment:</b></h3>

                    <div class="form-row">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="pregnant" value="Deliberate" name="risk_assessment[]" >
                                <label class="form-check-label" for="pregnant" style="font-size: 1em;">Deliberate Self Harm</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="belowyears" value="Suicidal" name="risk_assessment[]" >
                                <label class="form-check-label" for="belowyears" style="font-size: 1em;">Suicidal Tendency</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="infertility" value="Violence" name="risk_assessment[]" >
                                <label class="form-check-label" for="infertility" style="font-size: 1em;">Violence</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="contraception" value="Substance" name="risk_assessment[]" >
                                <label class="form-check-label" for="contraception" style="font-size: 1em;">Substance abuse</label>
                            </div>
                        </div>
                    </div>
                    <h3 class="card-title"><center><b>List of all current medications</b></center></h3>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="" for="Radial Artery"><b>Name of the drug</b></label>
                        </div>
                        <div class="col-md-3">
                            <label class="" for="Radial Artery"><b>Dose</b></label>
                        </div>
                        <div class="col-md-3">
                            <label class="" for="Radial Artery"><b>Frequency</b></label>
                        </div>
                        <div class="col-md-3">
                            <label class="" for="Radial Artery"><b>Using since,</b></label>
                        </div>
                    </div>
                    <div class="row" style="padding-bottom:1em;">
                        <div class="col-md-3">
                           <input type="text" name="drugname[]" placeholder="Enter value" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="dose[]" placeholder="Enter value" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="frequency[]" placeholder="Enter value" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="since[]" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    <div class="row" style="padding-bottom:1em;">
                        <div class="col-md-3">
                            <input type="text" name="drugname[]" placeholder="Enter value" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="dose[]" placeholder="Enter value" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="frequency[]" placeholder="Enter value" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="since[]" placeholder="Enter value" class="form-control">
                        </div>
                    </div>
                    <h3 class="card-title text-uppercase"><b>Mental State Examination:</b></h3>                

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Appearance & Behaviour</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="appearance" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Speech</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="speech" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Mood</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="mood" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Thoughts</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="thoughts" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Perceptions</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="perceptions" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Delusions</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="delusions" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Cognition</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="cognition" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="insight">Insight</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="insight" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Differential Diagnosis Psychiatric Patient:</b></h3>

                    <div class="form-row">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="anxiety" value="Anxiety" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="anxiety" style="font-size: 1em;">Anxiety Disorder</label>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="mood" value="Mood" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="mood" style="font-size: 1em;">Mood Disorder</label>
                            </div>
                        </div>

                         <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="psychotic" value="Psychotic" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="psychotic" style="font-size: 1em;">Psychotic Disorder</label>
                            </div>
                        </div>


                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="personality" value="Personality" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="personality" style="font-size: 1em;">Personality Disorder</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="eating" value="Eating" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="eating" style="font-size: 1em;">Eating Disorder</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="traumatic" value="Traumatic" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="traumatic" style="font-size: 1em;">Post Traumatic Stress</label>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="substance" value="Substance" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="substance" style="font-size: 1em;">Substance Abuse</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="malingering" value="Malingering" name="diff_diagnosis[]" >
                                <label class="form-check-label" for="malingering" style="font-size: 1em;">Malingering</label>
                            </div>
                        </div>

                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Other</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="others" placeholder="Enter value" class="form-control">
                        </div>
                    </div>

        <!--            <div class="form-row">-->
        <!--                <div class="col-md-4">-->
        <!--                    <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>-->
        <!--                    <button type="submit" class="btn btn-primary btn-info" value="submit">SUBMIT</button>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--</form>-->