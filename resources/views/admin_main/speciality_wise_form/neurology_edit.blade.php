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
                        <div class="col-md-6 mb-6">  
                            <textarea class="form-control" placeholder="General Appearance of the patient" name="notes">{{$patientge->notes}}</textarea>
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Neurology Specific Examination:</b></h3>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="glasgow_scale" placeholder="Glasgow Coma Scale" value="{{$PatientGeNew->glasgow_scale}}" class="form-control
                            ">
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Higher Mental Functions:</b></h3>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Consciousness" placeholder="Consciousness" value="{{$PatientGeNew->Consciousness}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Alertness" placeholder="Alertness" value="{{$PatientGeNew->Alertness}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Speech" placeholder="Speech" value="{{$PatientGeNew->Speech}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Pupils" placeholder="Pupils" value="{{$PatientGeNew->Pupils}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="CranialNerves" placeholder="Cranial Nerves" value="{{$PatientGeNew->CranialNerves}}" class="form-control">
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Motor:</b></h3>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Gait" placeholder="Gait" value="{{$PatientGeNew->Gait}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="InvoluntaryMovements" placeholder="Involuntary Movements" value="{{$PatientGeNew->InvoluntaryMovements}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="AbnormalPostures" placeholder="Abnormal Postures" value="{{$PatientGeNew->AbnormalPostures}}" class="form-control
                            ">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Trophicchanges" placeholder="Trophic changes" value="{{$PatientGeNew->Trophicchanges}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Contractions" placeholder="Contractions or Contractures" value="{{$PatientGeNew->Contractions}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="MuscleTone" placeholder="Muscle Tone" value="{{$PatientGeNew->MuscleTone}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="MotorPower" placeholder="Motor Power" value="{{$PatientGeNew->MotorPower}}" class="form-control">
                        </div>
                    </div>
                    <h3 class="card-title text-uppercase"><b>Reflexes:</b></h3>
                    <div class="form-row" style="margin-bottom: 1em;">
                        
                        <div class="col-md-4 mb-4">
                            <input type="text" name="DeepReflexes" placeholder="Deep Tendon Reflexes" value="{{$PatientGeNew->DeepReflexes}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="SuperficialReflexes" placeholder="Superficial Reflexes" value="{{$PatientGeNew->SuperficialReflexes}}" class="form-control">
                        </div>
                    </div> 
                    
                    <h3 class="card-title text-uppercase"><b>Sensory:</b></h3>
                   <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="tactilesensation" placeholder="Tactile sensation" value="{{$PatientGeNew->tactilesensation}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="tactilediscrimination" placeholder="Tactile discrimination" value="{{$PatientGeNew->tactilediscrimination}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="temperaturediscrimination" placeholder="Temperature discrimination" value="{{$PatientGeNew->temperaturediscrimination}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="jointpropioception" placeholder="Joint Propioception" value="{{$PatientGeNew->jointpropioception}}" class="form-control">
                        </div>
                        
                    </div>

                     <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="painsensation" placeholder="Pain sensation" value="{{$PatientGeNew->painsensation}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="vibrationsense" placeholder="Vibration sense" value="{{$PatientGeNew->vibrationsense}}" class="form-control">
                        </div>
                    </div>


                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="UMN_lesion" placeholder="Signs of UMN lesion" value="{{$PatientGeNew->UMN_lesion}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="LMN_lesion" placeholder="Signs of LMN lesion" value="{{$PatientGeNew->LMN_lesion}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Extrapyramidal_lesion" placeholder="Signs of Extrapyramidal pathway lesion" value="{{$PatientGeNew->Extrapyramidal_lesion}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Cerebellar_lesion" placeholder="Signs of Cerebellar lesion" value="{{$PatientGeNew->Cerebellar_lesion}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="raised_ict" placeholder="Signs of raised ICT" value="{{$PatientGeNew->raised_ict}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Meningitis" placeholder="Signs of Meningitis" value="{{$PatientGeNew->Meningitis}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <input type="text" name="head_trauma" placeholder="Signs of Head Trauma/ Spine trauma" value="{{$PatientGeNew->head_trauma}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="peripheral_disease" placeholder="Signs of Peripheral Nerve disease" value="{{$PatientGeNew->peripheral_disease}}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" name="Myopathies" placeholder="Signs of Myopathies" value="{{$PatientGeNew->Myopathies}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-4 mb-4">
                            <textarea placeholder="Related Systemic Examination Notes" name="systemic_notes" class="form-control">{{$PatientGeNew->systemic_notes}}</textarea>
                        </div>
                        <div class="col-md-4 mb-4">
                            <textarea placeholder="diff_diagnosis" name="diffdianosis" class="form-control">{{$PatientGeNew->diffdianosis}}</textarea>
                        </div>
                    </div>


                <!--    <div class="form-row">-->
                <!--        <div class="col-md-4">-->
                <!--            <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>-->
                <!--            <button type="submit" class="btn btn-primary btn-info" value="submit">SUBMIT</button>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</form>-->