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
                            <textarea class="form-control" placeholder="General Appearance of the patient" name="Generalnotes">{{$patientge->notes}}</textarea>
                        </div>
                    </div>
                    <h3 class="card-title text-uppercase"><b>Local Exam of Lesion:</b></h3>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-3 mb-6">
                                <select class="form-control" name="distribution" id="distributions">
                                    <option class="">Select Distribution</option>
                                    <option class="symmetrical" value="Symmetrical"  <?php if($PatientGeNew->distribution=='Symmetrical'){ echo 'selected';} ?>>Symmetrical</option>
                                    <option class="asymmetrical" value="Asymmetrical"  <?php if($PatientGeNew->distribution=='Asymmetrical'){ echo 'selected';} ?>>Asymmetrical</option>
                                </select>
                        </div>
                        <div class="col-md-3 mb-6">
                                <select class="form-control" name="surface" id="surfaces">
                                    <option class="">Which surface more involved</option>
                                    <option class="flexor"  value="flexor" <?php if($PatientGeNew->surface=='flexor'){ echo 'selected';} ?>>Flexor</option>
                                    <option class="extensor"  value="extensor" <?php if($PatientGeNew->surface=='extensor'){ echo 'selected';} ?>>Extensor</option>
                                    <option class="equal" value="equal" <?php if($PatientGeNew->surface=='equal'){ echo 'selected';} ?>>Equal</option>
                                    <option class="none" value="none" <?php if($PatientGeNew->surface=='none'){ echo 'selected';} ?>>None</option>
                                    <option class="na" value="na" <?php if($PatientGeNew->surface=='na'){ echo 'selected';} ?>>NA</option>
                                </select>
                        </div>
                        <div class="col-md-3 mb-6">
                                <select class="form-control" name="lesion" id="lesions">
                                    <option class="">Density of the lesions</option>
                                    <option class="single" value="single" <?php if($PatientGeNew->lesion=='single'){ echo 'selected';} ?>>Single</option>
                                    <option class="multiple" value="multiple" <?php if($PatientGeNew->lesion=='multiple'){ echo 'selected';} ?>>Multiple</option>
                                </select>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">  
                            <textarea class="form-control" placeholder="Other Notes Of Lesion" name="notesoflesion">{{$PatientGeNew->notesoflesion}}</textarea>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">  
                            <textarea class="form-control" placeholder="Systemic Examination Notes" name="systemnotes">{{$PatientGeNew->systemnotes}}</textarea>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">  
                            <textarea class="form-control" placeholder="Differential Diagnosis" name="diffdiagnosis">{{$PatientGeNew->diffdiagnosis}}</textarea>
                        </div>
                    </div>

                <!--    <div class="form-row">-->
                <!--        <div class="col-md-4">-->
                <!--            <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>-->
                <!--            <button type="submit" class="btn btn-primary btn-info" value="submit">UPDATE</button>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</form>-->