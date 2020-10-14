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

                    <h3 class="card-title text-uppercase"><b>Neurology Specific Examination:</b></h3>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="glasgow_scale" placeholder="Glasgow Coma Scale" value="" class="form-control
                            ">
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Higher Mental Functions:</b></h3>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Consciousness" placeholder="Consciousness" value="">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Alertness" placeholder="Alertness" value="">
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Speech" placeholder="Speech" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Pupils" placeholder="Pupils" value class="form-control">
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="CranialNerves" placeholder="Cranial Nerves" value="" class="form-control">
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Motor:</b></h3>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Gait" placeholder="Gait" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="InvoluntaryMovements" placeholder="Involuntary Movements" value="" class="form-control">
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="AbnormalPostures" placeholder="Abnormal Postures" value="" class="form-control
                            ">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Trophicchanges" placeholder="Trophic changes" value="" class="form-control">
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Contractions" placeholder="Contractions or Contractures" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="MuscleTone" placeholder="Muscle Tone" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="MotorPower" placeholder="Motor Power" value="" class="form-control">
                        </div>
                    </div>
                    <h3 class="card-title text-uppercase"><b>Reflexes:</b></h3>
                    <div class="form-row" style="margin-bottom: 1em;">
                        
                        <div class="col-md-4 mb-4">
                            <input type="text" name="DeepReflexes" placeholder="Deep Tendon Reflexes" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="SuperficialReflexes" placeholder="Superficial Reflexes" value="" class="form-control">
                        </div>
                    </div> 
                    
                    <h3 class="card-title text-uppercase"><b>Sensory:</b></h3>
                   <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="tactilesensation" placeholder="Tactile sensation" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="tactilediscrimination" placeholder="Tactile discrimination" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="temperaturediscrimination" placeholder="Temperature discrimination" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="jointpropioception" placeholder="Joint Propioception" value="" class="form-control">
                        </div>
                        
                    </div>

                     <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="painsensation" placeholder="Pain sensation" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="vibrationsense" placeholder="Vibration sense" value="" class="form-control">
                        </div>
                    </div>


                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="UMN_lesion" placeholder="Signs of UMN lesion" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="LMN_lesion" placeholder="Signs of LMN lesion" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Extrapyramidal_lesion" placeholder="Signs of Extrapyramidal pathway lesion" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Cerebellar_lesion" placeholder="Signs of Cerebellar lesion" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="raised_ict" placeholder="Signs of raised ICT" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Meningitis" placeholder="Signs of Meningitis" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="head_trauma" placeholder="Signs of Head Trauma/ Spine trauma" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="peripheral_disease" placeholder="Signs of Peripheral Nerve disease" value="" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Myopathies" placeholder="Signs of Myopathies" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <textarea placeholder="Related Systemic Examination Notes" name="systemic_notes" class="form-control"></textarea>
                        </div>
                        <div class="col-md-4 mb-4">
                            <textarea placeholder="diff_diagnosis" name="diffdianosis" class="form-control"></textarea>
                        </div>
                    </div>


                <!--    <div class="form-row">-->
                <!--        <div class="col-md-4">-->
                <!--            <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>-->
                <!--            <button type="submit" class="btn btn-primary btn-info" value="submit">SUBMIT</button>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</form>-->