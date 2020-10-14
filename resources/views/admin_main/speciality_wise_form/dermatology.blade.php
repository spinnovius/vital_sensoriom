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
                            <textarea class="form-control" placeholder="General Appearance of the patient" name="Generalnotes"></textarea>
                        </div>
                    </div>
                    <h3 class="card-title text-uppercase"><b>Local Exam of Lesion:</b></h3>
                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-3 mb-6">
                                <select class="form-control" name="distribution" id="distributions">
                                    <option class="">Select Distribution</option>
                                    <option class="symmetrical" value="Symmetrical">Symmetrical</option>
                                    <option class="asymmetrical" value="Asymmetrical" >Asymmetrical</option>
                                </select>
                        </div>
                        <div class="col-md-3 mb-6">
                                <select class="form-control" name="surface" id="surfaces">
                                    <option class="">Which surface more involved</option>
                                    <option class="flexor" value="flexor">Flexor</option>
                                    <option class="extensor" value="extensor">Extensor</option>
                                    <option class="equal" value="equal">Equal</option>
                                    <option class="none" value="none">None</option>
                                    <option class="na" value="na">NA</option>
                                </select>
                        </div>
                        <div class="col-md-3 mb-6">
                                <select class="form-control" name="lesion" id="lesions">
                                    <option class="">Density of the lesions</option>
                                    <option class="single" value="single">Single</option>
                                    <option class="multiple" value="multiple">Multiple</option>
                                </select>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">  
                            <textarea class="form-control" placeholder="Other Notes Of Lesion" name="notesoflesion"></textarea>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">  
                            <textarea class="form-control" placeholder="Systemic Examination Notes" name="systemnotes"></textarea>
                        </div>
                    </div>

                    <div class="form-row" style="margin-bottom: 1em;">
                        <div class="col-md-6 mb-6">  
                            <textarea class="form-control" placeholder="Differential Diagnosis" name="diffdiagnosis"></textarea>
                        </div>
                    </div>

                <!--    <div class="form-row">-->
                <!--        <div class="col-md-4">-->
                <!--            <button type="reset" class="btn btn-primary btn-info" value="Reset" >RESET</button>-->
                <!--            <button type="submit" class="btn btn-primary btn-info" value="submit">SUBMIT</button>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</form>-->