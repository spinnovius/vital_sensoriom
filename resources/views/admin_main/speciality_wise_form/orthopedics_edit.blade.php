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

                    <h3 class="card-title text-uppercase"><b>Type of Orthopedic Patient:</b></h3>
                    <?php 
                            $types_orthopedic=$PatientGeNew->types_orthopedic;                         
                            $newarr = explode(',',$types_orthopedic);
                            

                        ?>
                    <div class="form-row">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="congenital" value="Congenital" name="types_orthopedic[]" <?php if(in_array('Congenital', $newarr)){ echo "checked";}?> >
                                <label class="form-check-label" for="congenital" style="font-size: 1em;">Congenital</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="neuromotorimpairment" value="Neuromotor impairment" name="types_orthopedic[]" <?php if(in_array('Neuromotor impairment', $newarr)){ echo "checked";}?> >
                                <label class="form-check-label" for="neuromotorimpairment" style="font-size: 1em;">Neuromotor impairment</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="burns" value="Burns" name="types_orthopedic[]" <?php if(in_array('Burns', $newarr)){ echo "checked";}?>>
                                <label class="form-check-label" for="burns" style="font-size: 1em;">Burns</label>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="polytrauma" value="Polytrauma" name="types_orthopedic[]" <?php if(in_array('Polytrauma', $newarr)){ echo "checked";}?>>
                                <label class="form-check-label" for="polytrauma" style="font-size: 1em;">Polytrauma</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="birthtrauma" value="Birth Trauma" name="types_orthopedic[]" <?php if(in_array('Birth Trauma', $newarr)){ echo "checked";}?>>
                                <label class="form-check-label" for="birthtrauma" style="font-size: 1em;">Birth Trauma</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="degenerativedisease" value="Degenerative disease" name="types_orthopedic[]" <?php if(in_array('Degenerative disease', $newarr)){ echo "checked";}?>>
                                <label class="form-check-label" for="degenerativedisease" style="font-size: 1em;">Degenerative disease</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="musculoskeletaldisorder" value="Musculoskeletal disorder" name="types_orthopedic[]" <?php if(in_array('Musculoskeletal disorder', $newarr)){ echo "checked";}?>>
                                <label class="form-check-label" for="musculoskeletaldisorder" style="font-size: 1em;">Musculoskeletal disorder</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3"> 
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="arthritis" value="Arthritis" name="types_orthopedic[]" <?php if(in_array('Arthritis', $newarr)){ echo "checked";}?>>
                                <label class="form-check-label" for="arthritis" style="font-size: 1em;">Arthritis</label>
                            </div>
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Orthopedic Specific Examination:</b></h3>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Consciousness</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="consciousness" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->consciousness}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Gait</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="gait" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->gait}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Nutrition</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="nutrition" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->nutrition}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Pain Scale</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="painscale" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->painscale}}">
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Local Exam:</b></h3>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Skin & Soft Tissue</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="skinissue" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->skinissue}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Abnormality (Pain, Shortening, Deformity)</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="abnormality" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->abnormality}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Bones</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="bones" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->bones}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Joints (Fractures, Limitations, Hypermobility) </label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="joints" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->joints}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Muscles</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="muscles" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->muscles}}">
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Neurological Testing:</b></h3>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Sensations</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="sensations" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->sensations}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Motor Power</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="motor" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->motor}}">
                        </div>
                    </div>

                    <h3 class="card-title text-uppercase"><b>Proprioception:</b></h3>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">DTRs</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="dtrs" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->dtrs}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Spine</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="spine" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->spine}}">
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 md-6">
                            <label class="" for="Radial Artery">Special Tests</label>
                        </div>
                        <div class="col-md-4 md-4">
                            <input type="text" name="specialtests" placeholder="Enter value" class="form-control" value="{{$PatientGeNew->specialtests}}">
                        </div>
                    </div>

                   
                    
                    

                  

                 <!--   <div class="form-row">-->
                 <!--       <div class="col-md-4">-->
                 <!--           <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>-->
                 <!--           <button type="submit" class="btn btn-primary btn-info" value="submit">UPDATE</button>-->
                 <!--       </div>-->
                 <!--   </div>-->
                 <!--</form>-->