<?php

namespace App\Http\Controllers\API;

use App\AdminNotification;
use App\Appointments;
use App\AuthorityCouncil;
use App\Doctor;
use App\DoctorBalance;
use App\DoctorBankDetail;
use App\DoctorDays;
use App\DoctorDetail;
use App\DoctorSpecialitySelect;
use App\HealthProblem;
use App\HealthTeam;
use App\Helpers\Notification\PushNotification;
use App\Hospital;
use App\Http\Controllers\Controller;
use App\PatientDetail;
use App\PatientDiagnosis;
use App\PatientFamilyHealthHistory;
use App\PatientHealthHistory;
use App\PatientHealthRecordDetail;
use App\PatientLabDetail;
use App\PatientPastHealthHistory;
use App\PatientPastHistory;
use App\PatientPriscription;
use App\PatientProcedure;
use App\User;
use App\Others;
use Auth;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Plivo\RestClient;
use Session;
use Validator;
use Mail;
use Config;

class DoctorController extends Controller {


    public function adddoctorbankdetail(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'doctor_id.required' => 'Doctor Id is required.',
                    'bank_name.required' => 'Bank name is required.',
                    'account_number.required' => 'Account number is required.',
                    'ifsc_code.required' => 'Ifsc code is required.',
                    'beneficiary_name.required' => 'Beneficiary name is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'doctor_id' => 'required|integer',
                            'bank_name' => 'required',
                            'account_number' => 'required|numeric',
                            'ifsc_code' => 'required',
                            'beneficiary_name' => 'required',
                                ], $messages);

                $errors = $validator->errors();
                if ($validator->fails()) {
                    $response = array(
                                "data" => $errors,
                                "error_code" => 1,
                                "message" => 'Please fill all data' 
                            );
                    return response()->json($response);
                    exit;
                }

              $doctor_bank_detail_count = DoctorBankDetail::where('doctor_id',$request->doctor_id)->count();
              if($doctor_bank_detail_count > 0)
              {
                $account_number = base64_encode($request->account_number);
                $doctor_bank_detail = DoctorBankDetail::select('id')->where('doctor_id',$request->doctor_id)->first();
                $bank_detail = DoctorBankDetail::whereId($doctor_bank_detail->id)->update([
                    'bank_name' => $request->bank_name,
                    'account_number' => $account_number,
                    'ifsc_code' => $request->ifsc_code,
                    'beneficiary_name' => $request->beneficiary_name,
                    ]);

                $response_data = array(
                    'doctor_id' => $request->doctor_id,
                    'bank_name' => $request->bank_name,
                    'account_number' => $account_number,
                    'ifsc_code' => $request->ifsc_code,
                    'beneficiary_name' => $request->beneficiary_name
                );
              }
              else
              { 
                $account_number = base64_encode($request->account_number);
                $response_data = new DoctorBankDetail();
                $response_data->doctor_id = $request->doctor_id;
                $response_data->bank_name = $request->bank_name;
                $response_data->account_number = $account_number;
                $response_data->ifsc_code = $request->ifsc_code;
                $response_data->beneficiary_name = $request->beneficiary_name;
                $response_data->save();
              }

          $response = array(
                    "data" => $response_data,
                    "error_code" => 0,
                    "message" => 'Bank detail added successfully' 
                );

        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => '',
                    "error_code" => 1,
                    "message" => 'Bank detail added failed' 
                );
        }
    return response()->json($response);
    }


    public function doctorbankdetail(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'doctor_id.required' => 'Doctor Id is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'doctor_id' => 'required|integer',
                                ], $messages);

                $errors = $validator->errors();
                if ($validator->fails()) {
                    $response = array(
                                "data" => $errors,
                                "error_code" => 1,
                                "message" => 'Please fill all data' 
                            );
                    return response()->json($response);
                    exit;
                }

            $doctorbankdetail_count = DoctorBankDetail::where('doctor_id',$request->doctor_id)->count();
            $doctorbankdetail = DoctorBankDetail::where('doctor_id',$request->doctor_id)->first();
            
            if($doctorbankdetail_count)
            {
                $response = array(
                    "data" => $doctorbankdetail,
                    "error_code" => 0,
                    "message" => 'Bank detail available' 
                );
            }
            else
            {
                $response = array(
                    "data" => '',
                    "error_code" => 1,
                    "message" => 'No bank detail available' 
                );
            }
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => '',
                    "error_code" => 1,
                    "message" => 'No record Found' 
                );
        }
    return response()->json($response);
    }

    public function doctorpatientlist(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'doctor_id.required' => 'Doctor Id is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'doctor_id' => 'required|integer',
                                ], $messages);

                $errors = $validator->errors();
                if ($validator->fails()) {
                    $response = array(
                                "data" => $errors,
                                "error_code" => 1,
                                "message" => 'Please fill all data' 
                            );
                    return response()->json($response);
                    exit;
                }

             $doctorpatient_count = HealthTeam::where('doctor_id',$request->doctor_id)->count();

            if($doctorpatient_count)
            {

                $doctorpatient = DB::table('health_team')
                    ->select('health_team.patient_id', 'users.fname','city.city','patient_detail.dob','patient_detail.profile_pic','patient_detail.gender','users.contact_number')
                    ->leftjoin('patient_detail', 'health_team.patient_id', '=', 'patient_detail.patient_id')
                    ->leftjoin('users', 'health_team.patient_id', '=', 'users.id')
                    ->leftjoin('city', 'patient_detail.city', '=', 'city.id')
                    ->where('health_team.doctor_id', $request->doctor_id)
                    ->get()->toArray();

                foreach ($doctorpatient as $value) {
                    $value = (array) $value;

                    if($value['patient_id'])
                    {

                        $patient_diagnosis = PatientDiagnosis::select('id','diagnosis','year')->where('patient_id',$value['patient_id'])->get()->toArray();
                        $PatientPriscription = PatientPriscription::select('medicine_name','dose','freq','route','duration','releventpoint','examination_lab_finding','suggest_investigation','special_investigation')->where('patient_id',$value['patient_id'])->get()->toArray();
                        $dateOfBirth = date("Y-m-d", strtotime($value['dob']));
                        
                        $today = date("Y-m-d");
                        $diff = date_diff(date_create($dateOfBirth), date_create($today));
                        //dd($diff->format('%y'));
                        //$diff->format('%y')
                        $response_data = array(
                            'patient_id' => $value['patient_id'],
                            'fname' => $value['fname'],
                            'city' => $value['city'],
                            'dob' => @$diff->format('%y'),
                            'profile_pic' => $value['profile_pic'],
                            'gender' => $value['gender'],
                            'mobile' => $value['contact_number'],
                            'diagnosis' => $patient_diagnosis,
                            'prescription' => $PatientPriscription
                        );

                        $doctorpatientlist[] = $response_data;
                    }
                } 

                $doctorpatient = array_map("unserialize", array_unique(array_map("serialize", $doctorpatientlist)));


                $doctorpatient1 = DB::table('call_history')
                    ->select('call_history.patient_id', 'users.fname','city.city','patient_detail.dob','patient_detail.profile_pic','patient_detail.gender','users.contact_number')
                    ->leftjoin('patient_detail', 'call_history.patient_id', '=', 'patient_detail.patient_id')
                    ->leftjoin('users', 'call_history.patient_id', '=', 'users.id')
                    ->leftjoin('city', 'patient_detail.city', '=', 'city.id')
                    ->where('call_history.doctor_id', $request->doctor_id)
                    ->get()
                    ->toArray();

                foreach (@$doctorpatient1 as $val) {
                    $val = (array) $val;
                    if($value['patient_id'])
                    {

                        $patient_diagnosis = PatientDiagnosis::select('id','diagnosis','year')->where('patient_id',$val['patient_id'])->get()->toArray();
                        $PatientPriscription = PatientPriscription::select('medicine_name','dose','freq','route','duration','releventpoint','examination_lab_finding','suggest_investigation','special_investigation')->where('patient_id',$val['patient_id'])->get()->toArray();
                        $dateOfBirth = date("Y-m-d", strtotime($value['dob']));
                        $today = date("Y-m-d");
                        $diff = date_diff(date_create($dateOfBirth), date_create($today));
                        //$diff->format('%y')
                        $response_data = array(
                            'patient_id' => $val['patient_id'],
                            'fname' => $val['fname'],
                            'city' => $val['city'],
                            'dob' => @$diff->format('%y'),
                            'profile_pic' => $val['profile_pic'],
                            'gender' => $val['gender'],
                            'mobile' => $val['contact_number'],
                            'diagnosis' => $patient_diagnosis,
                            'prescription' => $PatientPriscription
                        );

                        $doctorpatientlist1[] = $response_data;
                    }
                } 

                @$doctorpatient1 = array_map("unserialize", array_unique(array_map("serialize", $doctorpatientlist1)));

                @$doctorpatient2 = array_map("unserialize", array_unique(array_map("serialize", $doctorpatient)));

                if(@$doctorpatient1 != null && @$doctorpatient2 != null)
                {
                    $response1 = array_merge(@$doctorpatient2,@$doctorpatient1);
                }

                if($doctorpatient1 != null && $doctorpatient2 == null)
                {
                    $response1 = $doctorpatient1;
                }

                if($doctorpatient2 != null && $doctorpatient1 == null)
                {
                    $response1 = $doctorpatient2;
                }

                @$final_response = array_map("unserialize", array_unique(array_map("serialize", @$response1)));                

                // dd($response);

                $response_data = array();   
                $patient = array();

                foreach ($response1 as $r) {
                    if(!in_array($r['patient_id'], $patient))
                    {
                        if(User::whereId($r['patient_id'])->count() > 0)
                        {
                            //$dateOfBirth = date("Y-m-d", strtotime($r['dob']));
                            //dd($r);
                            //$today = date("Y-m-d");
                            //$diff = date_diff(date_create($dateOfBirth), date_create($today));
                            //$diff->format('%y')
                            $response_data[] = array(
                                'patient_id' => $r['patient_id'],
                                'fname' => $r['fname'],
                                'city' => $r['city'],
                                'dob' => $r['dob'],//@$diff->format('%y'),
                                'profile_pic' => $r['profile_pic'],
                                'gender' => $r['gender'],
                                'mobile' => $r['mobile'],
                                'diagnosis' => $r['diagnosis'],
                                'prescription' => $r['prescription'],
                            );
                            $patient[] = $r['patient_id'];
                        }
                    }
                }

                if($doctorpatient1 == null)
                {
                    $doctorpatient1 = 0;   
                }
                else
                {
                    $doctorpatient1 = count($doctorpatient1);
                }

                if($doctorpatient2 == null)
                {
                    $doctorpatient2 = 0;   
                }
                else
                {
                    $doctorpatient2 = count($doctorpatient2);
                }

                $total_data = $doctorpatient1 + $doctorpatient2;
                
                $response = array(
                    "data" => $response_data,
                    "error_code" => 0,
                    "message" => $total_data.' patient available' 
                );
                
            }
            else
            {
                $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'No patient available' 
                );
            }
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'No record Found' 
                );
        }
    return response()->json($response);
    }

    public function patienthealthhistory(Request $request)
    {
        try{

                $messages = [
                        'required' => ':attribute is required.',
                        'patient_id.required' => 'Patient Id is requuired.',
                    ];
                    $validator = Validator::make($request->all(), [
                                'patient_id' => 'required|integer',
                                    ], $messages);

                    $errors = $validator->errors();
                    if ($validator->fails()) {
                        $response = array(
                                    "data" => $errors,
                                    "error_code" => 1,
                                    "message" => 'Please fill all data' 
                                );
                     return response()->json($response);
                        exit;
                    }

            $patient_detail = DB::table('patient_detail')
                    ->select('users.fname','city.city','patient_detail.dob','patient_detail.profile_pic','patient_detail.gender',DB::raw('patient_health_history_family.problem_id as family_problem_id'),DB::raw('patient_health_history_past.problem_id as past_problem_id'),DB::raw('patient_health_history.problem_id as personal_problem_id'),DB::raw('patient_health_history.smoking as smoking'),DB::raw('patient_health_history.alcohol_drinking as alcohol_drinking'),DB::raw('patient_health_history.allergies as allergies'))
                    ->leftjoin('users', 'patient_detail.patient_id', '=', 'users.id')
                    ->leftjoin('city', 'patient_detail.city', '=', 'city.id')
                    ->leftjoin('patient_health_history_family', 'patient_detail.patient_id', '=', 'patient_health_history_family.patient_id')
                    ->leftjoin('patient_health_history_past', 'patient_detail.patient_id', '=', 'patient_health_history_past.patient_id')
                    ->leftjoin('patient_health_history', 'patient_detail.patient_id', '=', 'patient_health_history.patient_id')
                    ->where('patient_detail.patient_id', $request->patient_id)
                    ->first();

            $response1['patient_name'] = @$patient_detail->fname;
            $response1['patient_age'] = @$patient_detail->dob;
            $response1['patient_location'] = @$patient_detail->city;
            $response1['patient_profile_pic'] = @$patient_detail->profile_pic;
            $response1['patient_gender'] = @$patient_detail->gender;

            $family_problem = explode(',', @$patient_detail->family_problem_id);
            
            $fp_name = array();
            foreach ($family_problem as $fp) {
                $patient_family_problem = HealthProblem::where('id',$fp)->first();
                $fp_name[] = @$patient_family_problem->problem;
            }

            $fp_name = implode(',', $fp_name);

            $past_problem = explode(',', @$patient_detail->past_problem_id);
            
            $past_problem_name = array();
            foreach ($past_problem as $pp) {
                $patient_family_problem = HealthProblem::where('id',$pp)->first();
                $past_problem_name[] = @$patient_family_problem->problem;
            }

            $past_problem_name = implode(',', $past_problem_name);

            $personal_problem = explode(',', @$patient_detail->personal_problem_id);
            
            $personal_problem_name = array();
            foreach ($personal_problem as $pp) {
                $patient_family_problem = HealthProblem::where('id',$pp)->first();
                $personal_problem_name[] = @$patient_family_problem->problem;
            }

            $personal_problem_name = implode(',', $personal_problem_name);

            $response1['patient_family_problem'] = $fp_name;
            $response1['patient_past_problem'] = $past_problem_name;
            $response1['patient_personal_problem'] = $personal_problem_name;
            $response1['patient_smoking'] = @$patient_detail->smoking;
            $response1['patient_alcohol_drinking'] = @$patient_detail->alcohol_drinking;
            $response1['patient_allergies'] = @$patient_detail->allergies;

            $response = array(
                "data" => $response1,
                "error_code" => 0,
                "message" => 'Patient all detail available' 
            );
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => '',
                    "error_code" => 1,
                    "message" => 'No record Found' 
                );
        }
    return response()->json($response);
    }

    public function patientallhealthrecords(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is requuired.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                                ], $messages);

                $errors = $validator->errors();
                if ($validator->fails()) {
                    $response = array(
                                "data" => $errors,
                                "error_code" => 1,
                                "message" => 'Please fill all data' 
                            );
                    return response()->json($response);
                    exit;
                }

            $healthrecords = PatientHealthRecordDetail::where('patient_id',$request->patient_id)->get()->toArray();
            $lab_detail = PatientLabDetail::where('patient_id',$request->patient_id)->get()->toArray();
            $procedure = PatientProcedure::where('paatient_id',$request->patient_id)->get()->toArray();
            
            $response1['patient_vitals_detail'] = $healthrecords;
            $response1['patient_lab_detail'] = $lab_detail;
            $response1['patient_procedure'] = $procedure;

            $response = array(
                "data" => $response1,
                "error_code" => 0,
                "message" => 'Patient all health records' 
            );
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'No record Found' 
                );
        }
    return response()->json($response);
    }

    public function getallpatientpriscription(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'doctor_id' => 'Doctor id is requuired',
                    'patient_id.required' => 'Patient Id is requuired.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'doctor_id' => 'required|integer',
                                ], $messages);

                $errors = $validator->errors();
                if ($validator->fails()) {
                    $response = array(
                                "data" => $errors,
                                "error_code" => 1,
                                "message" => 'Please fill all data' 
                            );
                    return response()->json($response);
                    exit;
                }

          //  $priscription = PatientPriscription::where('patient_id',$request->patient_id)->where('doctor_id',$request->doctor_id)->get()->toArray();
            
            
            $priscription = PatientPriscription::
                 
                 where('patient_id',$request->patient_id)
                 ->where('doctor_id',$request->doctor_id)
                 ->get()
                 ->toArray();
                
                 
            $others=Others::where('patient_id',$request->patient_id)->where('doctor_id',$request->doctor_id)->latest()->first();
             
            $priscription_response1=[];
            foreach($priscription as $value)
            {
                
                $priscription_response1[]  = array(
                                    'id' => $value['id'],
                                    'patient_id' => $value['patient_id'],
                                    'doctor_id' => $value['doctor_id'],
                                    'diagnosis'=>$value['diagnosis'],
                                    'medicine_name' => $value['medicine_name'],
                                    'dose' => $value['dose'],
                                    'freq' => $value['freq'],
                                    'route' => $value['route'],
                                    'duration' => $value['duration'],
                                    'notes'=>$value['notes'],
                                    'status'=>$value['status'],
                                    'created_at'=>$value['created_at'],
                                    'updated_at'=>$value['updated_at'],
                                    'releventpoint'=>isset($others)?$others->releventpoint:'',
                                    'examination_lab_finding'=>isset($others)?$others->examination_lab_finding:'',
                                    'suggest_investigation'=>isset($others)?$others->suggest_investigation:'',
                                   'special_investigation'=>isset($others)?$others->special_investigation:''
                                );
            }
           

            // $row['releventpoint']=;
            // $row['examination_lab_finding']=;
            // $row['suggest_investigation']=;
            // $row['special_investigation']=;
            // $dd=array_push( $priscription_response1, $row );
            // dd($priscription_response1);
            $response = array(
                "data" => $priscription_response1,
                "error_code" => 0,
                "message" => 'Patient priscription' 
            );
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => '',
                    "error_code" => 1,
                    "message" => 'No record Found' 
                );
        }
    return response()->json($response);
    }

    public function addpatientpriscription(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'doctor_id' => 'Doctor id is requuired',
                    'patient_id.required' => 'Patient Id is requuired.',
                     'prescription_detail.required' => 'Medicine Name is requuired.',
                    // 'dose.required' => 'Dose is requuired.',
                    // 'freq.required' => 'Freq is requuired.',
                    // 'route.required' => 'Route is requuired.',
                    // 'duration.required' => 'Duration is requuired.',
                    // 'diagnosis.required' => 'Diagnosis is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'doctor_id' => 'required|integer',
                            // 'medicine_name' => 'required',
                            // 'dose' => 'required',
                            // 'freq' => 'required',
                            // 'route' => 'required',
                            // 'duration' => 'required',
                            // 'diagnosis' => 'required',
                                ], $messages);

                $errors = $validator->errors();
                if ($validator->fails()) {
                    $response = array(
                                "data" => $errors,
                                "error_code" => 1,
                                "message" => 'Please fill all data' 
                            );
                    return response()->json($response);
                    exit;
                }
            $prescription_detail= request('prescription_detail');
            $patient_id=request('patient_id');
            $doctor_id=request('doctor_id');
            $releventpoint=request('releventpoint');
            $examination_lab_finding=request('examination_lab_finding');
            $suggest_investigation=request('suggest_investigation');
            $special_investigation=request('special_investigation');
            
            if(!empty($prescription_detail[0]))
            {
                $priscription_response1=[];
                if(!empty($prescription_detail[0]))
                {
                    $prescription_array = json_decode($prescription_detail);
                    foreach ($prescription_array as $key => $value) {
                                $priscription = new PatientPriscription;
                                $priscription->patient_id = $patient_id;
                                $priscription->doctor_id = $doctor_id;
                                $priscription->medicine_name = $value->medicine_name;
                                $priscription->dose = $value->dose;
                                $priscription->freq = $value->freq;
                                $priscription->route = $value->route;
                                $priscription->duration = $value->duration;
                               // $priscription->releventpoint = $releventpoint;
                                //$priscription->examination_lab_finding = $examination_lab_finding;
                                //$priscription->suggest_investigation = $suggest_investigation;
                                //$priscription->special_investigation = $special_investigation;
                                $priscription->save();
                                

                                $priscription_response1[]  = array(
                                    'id' => $priscription->id,
                                    'patient_id' => $patient_id,
                                    'doctor_id' => $doctor_id,
                                    'medicine_name' => $value->medicine_name,
                                    'dose' => $value->dose,
                                    'freq' => $value->freq,
                                    'route' => $value->route,
                                    'duration' => $value->duration,
                                   // 'releventpoint'=>$releventpoint,
                                   // 'examination_lab_finding'=>$examination_lab_finding,
                                   // 'suggest_investigation'=>$suggest_investigation,
                                   //'special_investigation'=>$special_investigation
                                );
                    }
                }
            }
            else
            {
                $priscription_response1[] = null;
            }
            
            $Others= new Others;
            $Others->patient_id= $patient_id;
            $Others->doctor_id= $doctor_id;
            $Others->doctor_id= $doctor_id;
            $Others->releventpoint= $releventpoint;
            $Others->examination_lab_finding= $examination_lab_finding;
            $Others->suggest_investigation= $suggest_investigation;
            $Others->special_investigation= $special_investigation;
            $Others->save();

            if($request->diagnosis)
            {
                @$diagnosis = json_decode($request->diagnosis);
                $response_diagnosis = array();
                foreach (@$diagnosis as $d) {
                    // dd(PatientDiagnosis::where('id',$d->diagnosis_id)->count());
                    if(PatientDiagnosis::where('id',$d->diagnosis_id)->count() > 0)
                    {
                        $diagnosis = PatientDiagnosis::whereId($d->diagnosis_id)->update([
                            'diagnosis' => $d->diagnosis,
                            'year' => $d->year,
                            ]);
                        $diagnosis_id = $d->diagnosis_id;
                    }
                    else
                    {
                        $diagnosis = new PatientDiagnosis;
                        $diagnosis->patient_id = $request->patient_id;
                        $diagnosis->doctor_id = $request->doctor_id;
                        $diagnosis->diagnosis = $d->diagnosis;
                        $diagnosis->year = $d->year;
                        $diagnosis->save();
                        $diagnosis_id = $diagnosis->id;
                    }

                    $response_diagnosis[] = array('id' => $diagnosis_id,'diagnosis' => $d->diagnosis , 'year' => $d->year);
                }

                $response_diagnosis = $response_diagnosis;

                $priscription_response2  = array(
                    'diagnosis' => $response_diagnosis, 
                );
            }
            else
            {
                $priscription_response2 = null;
            }

            $priscription_response = array(
                'medicine_detail' => $priscription_response1,
                'diagnosis_detail' => $priscription_response2,
                'releventpoint'=>$releventpoint,
                'examination_lab_finding'=>$examination_lab_finding,
                'suggest_investigation'=>$suggest_investigation,
                'special_investigation'=>$special_investigation
            );


            //Notification
            
            $patient_team = HealthTeam::select('coach_id')->where('patient_id',$request->patient_id)->first();
            // dd($patient_team);
            $patient_detail = User::select('fname','device_id')->where('id',$request->patient_id)->first();
            $doctor_detail = User::select('fname')->where('id',$request->doctor_id)->first();
            
            $datetime = date('d-m-Y h:i A');
            if(isset($doctor_detail))
            {
                $pmsg = array(
                'body' => 'Dr. '.ucfirst(trim($doctor_detail['fname']," Dr.")).' has sent you an e-prescription on '.$datetime.' Please check and follow the instructions.',
                'title' => 'Add Prescription',
                'icon' => 'myicon',
                'sound' => 'mySound'
            );

            $cmsg = array(
                'body' => 'Dr. '.ucfirst(trim($doctor_detail['fname']," Dr.")).' has written an e-prescription to Patient '.ucfirst($patient_detail->fname).' on '.$datetime,
                'title' => 'Add Prescription',
                'icon' => 'myicon',
                'sound' => 'mySound'
            );
    
            }
            
            $patient_msg = array('type' => 'Patient');

            $coach_msg = array('type' => 'Coach','coach_id' => @$patient_team->coach_id);
            
            if($patient_team != null){
            $coach_detail = User::select('fname','device_id')->where('id',$patient_team->coach_id)->first();
            
            if(isset($coach_detail))
            {
                $coach_device_id = $coach_detail->device_id;
                PushNotification::PushAndroidNotificationUser($cmsg, $coach_msg, [$coach_device_id]);    
            }
            
            if(isset($patient_detail))
            {
                $patient_device_id = $patient_detail->device_id;
                PushNotification::PushAndroidNotificationUser($pmsg, $patient_msg, [$patient_device_id]);    
            }
            
            
            }
            

            
            if(isset($doctor_detail))
            {
                $notification = new AdminNotification;
            $notification->from_id = $request->doctor_id;
            $notification->to_id = $request->patient_id;
            $notification->notification_description = 'Dr. '.ucfirst(trim($doctor_detail['fname']," Dr.")).' has sent you an e-prescription on '.$datetime.' Please check and follow the instructions.';
            $notification->save();
    
            $notification = new AdminNotification;
            $notification->from_id = $request->doctor_id;
            $notification->to_id = @$request->coach_id;
            $notification->notification_description = 'Dr. '.ucfirst(trim($doctor_detail['fname']," Dr.")).' has written an e-prescription to Patient '.ucfirst($patient_detail->fname).' on '.$datetime;
            $notification->save();
    
            }
            

            
            // dd($coach_msg);
            //End Notification

            $response = array(
                "data" => $priscription_response,
                "error_code" => 0,
                "message" => 'Patient prescription' 
            );
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'No record Found' 
                );
        }
    return response()->json($response);
    }

    public function doctorchangestatus(Request $request) {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'doctor_id' => 'Doctor id is requuired',
                    'status.required' => 'Status is requuired.',
                ];
                $validator = Validator::make($request->all(), [
                            'status' => 'required|integer',
                            'doctor_id' => 'required|integer',
                                ], $messages);

                $errors = $validator->errors();
                if ($validator->fails()) {
                    $response = array(
                                "data" => $errors,
                                "error_code" => 1,
                                "message" => 'Please fill all data' 
                            );
                    return response()->json($response);
                    exit;
                }

                $doctor_id = DoctorDetail::where('doctor_id',$request->doctor_id)->first();
                if($doctor_id)
                {
                    $doctor_satus = DoctorDetail::whereId($doctor_id->id)->update([
                        'available' => $request->status,
                        ]);
                }
                $response = array('doctor_status' => $request->status);
                    $response = array(
                        "data" => $response,
                        "error_code" => 0,
                        "message" => 'Doctor Status Changed' 
                    );
                }catch (\Illuminate\Database\QueryException $exc) {
                    $response = array(
                        "data" => '',
                        "error_code" => 1,
                        "message" => 'Doctor Status failed' 
                    );
                }
                return response()->json($response);
    }


    public function adddoctorbalancedetail(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'doctor_id' => 'Doctor id is requuired',
                    'patient_id' => 'Patient id is requuired',
                    'online_amount.required' => 'Online amount is requuired.',
                    'offline_amount.required' => 'Offline amount is requuired.',
                    'total_amount.required' => 'Total_amount is requuired.',
                    'amount_description.required' => 'Amount description is requuired.',
                    ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'doctor_id' => 'required|integer',
                            'online_amount' => 'required',
                            'offline_amount' => 'required',
                            'total_amount' => 'required',
                            'amount_description' => 'required',
                            ], $messages);

                $errors = $validator->errors();
                if ($validator->fails()) {
                    $response = array(
                                "data" => $errors,
                                "error_code" => 1,
                                "message" => 'Please fill all data' 
                            );
                    return response()->json($response);
                    exit;
                }

            $doctorbalance = new DoctorBalance;
            $doctorbalance->patient_id = $request->patient_id;
            $doctorbalance->doctor_id = $request->doctor_id;
            $doctorbalance->online_amount = $request->online_amount;
            $doctorbalance->offline_amount = $request->offline_amount;
            $doctorbalance->total_amount = $request->total_amount;
            $doctorbalance->amount_description = $request->amount_description;
            $doctorbalance->save();

            $response = array(
                "data" => $doctorbalance,
                "error_code" => 0,
                "message" => 'Doctor balance added successfully' 
            );

            //Notification
            
            $patient_detail = User::select('fname','device_id')->where('id',$request->patient_id)->first();
            // $coach_detail = User::select('fname','device_id')->where('id',$request->coach_id)->first();
            $doctor_detail = User::select('fname','device_id')->where('id',$request->doctor_id)->first();
            $patient_device_id = $patient_detail['device_id'];
            $doctor_device_id = $doctor_detail['device_id'];
            
            $datetime = date('d-m-Y h:i A');

            $pat_msg = array(
                'body' => 'You have successfully completed video teleconsultation with '.ucfirst($patient_detail['fname']).' on '.$datetime.'.Please wait for the e-prescription.',
                'title' => 'Debited amount in wallet',
                'icon' => 'myicon',
                'sound' => 'mySound'
            );

            $patient_msg = array('type' => 'Patient');

            PushNotification::PushAndroidNotificationUser($pat_msg, $patient_msg, [$patient_device_id]);

            $notification = new AdminNotification;
            $notification->from_id = $request->doctor_id;
            $notification->to_id = $request->patient_id;
            $notification->notification_description = 'Your wallet has been debited with INR '.$request->online_amount.' on '.$datetime.' as teleconsultation fees for Dr '.ucfirst(trim($doctor_detail['fname'],' Dr')).'.';   
            $notification->save();

            $doc_msg = array(
                'body' => 'Your wallet has been credited with INR '.$request->online_amount.' on '.$datetime.' as teleconsultation fees from Patient '.ucfirst($patient_detail['fname']).'.',
                'title' => 'Credited amount in wallet',
                'icon' => 'myicon',
                'sound' => 'mySound'
            );

            $doctor_msg = array('type' => 'Doctor');
            
            PushNotification::PushAndroidNotificationUser($doc_msg, $doctor_msg, [$doctor_device_id]);

            $notification = new AdminNotification;
            $notification->from_id = $request->patient_id;
            $notification->to_id = $request->doctor_id;
            $notification->notification_description = 'Patient '.ucfirst($patient_detail['fname']).' has successfully completed teleconsultation with you on '.$datetime.'.Please write e-prescription and Diagnosis.';   
            $notification->save();

            // dd($notification);
            //End Notification

        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => '',
                    "error_code" => 1,
                    "message" => 'Doctor balance added failed' 
                );
        }
    return response()->json($response);
    }

    public function deletediagnosis(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'diagnosis_id' => 'Diagnosis id is requuired',
                    ];
                $validator = Validator::make($request->all(), [
                            'diagnosis_id' => 'required|integer',
                            ], $messages);

                $errors = $validator->errors();
                if ($validator->fails()) {
                    $response = array(
                                "data" => $errors,
                                "error_code" => 1,
                                "message" => 'Please fill all data' 
                            );
                    return response()->json($response);
                    exit;
                }

            PatientDiagnosis::where('id',$request->diagnosis_id)->delete();

            $response = array(
                    "data" => null,
                    "error_code" => 0,
                    "message" => 'Diagnosis deleted successfully' 
                );

        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Diagnosis deleted failed' 
                );
        }

        return response()->json($response);
    }



    public function changeprice(Request $request) {
        
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'doctor_id' => 'Doctor id is requuired',
                    'fee_of_consultation' => 'Fee of consultation is requuired',
                    ];
                $validator = Validator::make($request->all(), [
                            'doctor_id' => 'required|integer',
                            'fee_of_consultation' => 'required',
                            ], $messages);

                $errors = $validator->errors();
                if ($validator->fails()) {
                    $response = array(
                                "data" => $errors,
                                "error_code" => 1,
                                "message" => 'Please fill all data' 
                            );
                    return response()->json($response);
                    exit;
                }

                $doctor = DoctorDetail::select('id')->where('doctor_id',$request->doctor_id)->first();
                
                DoctorDetail::whereId($doctor->id)->update([
                    'fee_of_consultation' => $request->fee_of_consultation,
                    ]);

                 $response = array(
                            "data" => null,
                            "error_code" => 0,
                            "message" => 'Fee of consultation updated succesfully' 
                        );

                }catch (\Illuminate\Database\QueryException $exc) {
                    $response = array(
                            "data" => null,
                            "error_code" => 1,
                            "message" => 'Fee of consultantion updated failed' 
                        );
                }
                return response()->json($response);
            }


    public function doctorbalancehistory(Request $request) {
        
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'doctor_id' => 'Doctor id is requuired',
                    ];
                $validator = Validator::make($request->all(), [
                            'doctor_id' => 'required|integer',
                            ], $messages);

                $errors = $validator->errors();
                if ($validator->fails()) {
                    $response = array(
                                "data" => $errors,
                                "error_code" => 1,
                                "message" => 'Please fill all data' 
                            );
                    return response()->json($response);
                    exit;
                }

            $doctor_balance = DoctorBalance::select('id','online_amount','offline_amount','created_at')->where('doctor_id',$request->doctor_id)->get()->toArray();

            $response = array(
                        "data" => $doctor_balance,
                        "error_code" => 0,
                        "message" => 'Doctor balance detail available' 
                    );

            }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                        "data" => null,
                        "error_code" => 1,
                        "message" => 'Doctor balance detail not found' 
                    );
            }
            
            return response()->json($response);
        }

            public function SpecialityWiseDrList(Request $request)
        {

            $validator = Validator::make($request->all(), [
            'city_id'=>'required',
            'speciality_id'=>'required'
            ]);
        if ($validator->fails()) {
            $errorMessage = implode(',', $validator->errors()->all());
            return response()->json(['errors' => $errorMessage], 422);
        }else{
            try{
                $doctordetail=DoctorDetail::select('doctors.*','c.fname as clinic_name','c.contact_number as clinic_contact_number','d.id as doctorid','d.fname as doctor_name','clinic.address as clinic_address','doctor_speciality.speciality as speciality_name','doctor_speciality.id as speciality')//
                ->leftjoin('users as c', 'doctors.clinic_id', '=', 'c.id')
                ->leftjoin('clinic', 'doctors.clinic_id', '=', 'clinic.user_id')
                //doctor_name
                ->leftjoin('users as d', 'doctors.doctor_id', '=', 'd.id')
                //speciality
                ->leftjoin('doctor_speciality_select', 'doctors.doctor_id', '=', 'doctor_speciality_select.doctor_id')
                ->leftjoin('doctor_speciality', 'doctor_speciality_select.speciality_id', '=', 'doctor_speciality.id')
                ->where('doctors.speciality', $request->speciality_id)
                ->where('doctors.city', $request->city_id)
                ->where('doctors.clinic_id','!=',0)
                ->where('d.verified',1)
                //->where('doctors.speciality', $request->speciality_id)
                ->where('doctors.status', 1)
                ->get();
                //dd($doctordetail);
                if(count($doctordetail)){//$doctordetail check not empty
                // foreach ($doctordetail as $key => $ddays) {
                //     $arraydays=DoctorDays::where('user_id','=',$ddays['doctorid'])->get();
                //     if(count($arraydays)){
                //         $day = array(); 
                //         foreach ($arraydays as $value) {
                //             $days['days']=$value->days;  
                //             $days['starttime']=$value->start_time;    
                //             $days['endtime']=$value->end_time;    
                //             $days['timeslot']=$value->time_slot;   
                //             $days['available']=$value->available;    
                //             $day[] = $days;
                //         }
                //         $ddays['doctor_days'] = $day;
                //     }else{//$arraydays check empty
                //         $ddays['doctor_days'] = (object)[];                        
                //     }
                 //}
                $response = array(
                    "data" => $doctordetail,
                    "error_code" => 0,
                    "message" => count($doctordetail) .' available' 
                );
                }else{//$doctordetail check empty
                    $response = array(
                    "data" => [],
                    "error_code" => 1,
                    "message" => 'No Data available' 
                    );
                }

                }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'not found' 
                );
            }
            return response()->json($response);
        }
        }

        public function GetDoctorDetails(Request $request)
        {
            $validator = Validator::make($request->all(), [
            'doctor_id'=>'required',
            ]);
        if ($validator->fails()) {
            $errorMessage = implode(',', $validator->errors()->all());
            return response()->json(['errors' => $errorMessage], 422);
        }else{
            try{
                $doctordetail=DoctorDetail::select('doctors.*')
                ->where('doctor_id', $request->doctor_id)
                ->where('status', 1)
                ->first();
                //dd($doctordetail);
                $speciality = DB::table('doctor_speciality_select')
                ->select('doctor_speciality.speciality as speciality')
                ->leftjoin('doctor_speciality', 'doctor_speciality_select.speciality_id', '=', 'doctor_speciality.id')
                ->where('doctor_id','=',$request->doctor_id)
                ->get();
                //dd($speciality);
                if($speciality){
                $array = array();
                foreach ($speciality as $value) {
                    $array[]=$value->speciality;
                }
                //dd($array);
                $speciality_id=implode(",",$array);
                }else{
                $speciality_id=null;
                }
                //dd($speciality_id);exit;
                $doctordetail['speciality']=$speciality_id;
                

                $response = array(
                    "data" => $doctordetail,
                    "error_code" => 0,
                    "message" => 1 .' available' 
                );
                }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'not found' 
                );
            }
            return response()->json($response);
        }
        }


        public function cityWiseSpecialityDrList(Request $request)
        {
            $validator = Validator::make($request->all(), [
          'city_id'=>'required',
          
        ]);
        if ($validator->fails()) {
            $errorMessage = implode(',', $validator->errors()->all());
            return response()->json(['errors' => $errorMessage], 422);
        }else{
            try{
                $doctordetail=DoctorDetail::select('doctor_speciality.id as id','doctor_speciality.speciality as speciality_name')
                //->leftjoin('doctor_speciality_select', 'doctors.doctor_id', '=', 'doctor_speciality_select.doctor_id')
                 //->leftjoin('doctor_speciality', 'doctor_speciality_select.speciality_id', '=', 'doctor_speciality.id')
                ->leftjoin('doctor_speciality', 'doctors.speciality', '=', 'doctor_speciality.id')
                ->leftjoin('users', 'doctors.doctor_id', '=', 'users.id')
                ->where('users.verified', 1)
                ->where('doctors.city', $request->city_id)
                ->where('doctors.clinic_id','!=',0)
                ->where('doctors.status', 1)
                ->where('doctor_speciality.speciality','!=', null)
                ->distinct('speciality_name')
                ->get()
                ->toArray();
                //old 10-02-2020
                /*
                $doctordetail=DoctorDetail::select('doctor_speciality.id as id','doctor_speciality.speciality as speciality_name')
                ->leftjoin('doctor_speciality', 'doctors.speciality', '=', 'doctor_speciality.id')
                ->where('doctors.speciality','!=',null)
                ->where('doctors.city', $request->city_id)
                ->where('doctors.status', 1)
                ->get()
                ->toArray();
                //dd($request->all());
                // $doctordetail=Appointments::
                // where('speciality','!=',null)
                // ->where('city_id', $request->city_id)
                // ->where('flag', 1)
                // ->get();
                */
                $response = array(
                    "data" => $doctordetail,
                    "error_code" => 0,
                    "message" => count($doctordetail) .' available' 
                );
                }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'not found' 
                );
            }
            return response()->json($response);
        }
        }  

        /*cityWiseSpecialityDrList*/

        public function cityWiseSpecialityDrList1(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'city_id'=>'required',
            ]);
        if ($validator->fails()) {
            $errorMessage = implode(',', $validator->errors()->all());
            return response()->json(['errors' => $errorMessage], 422);
        }else{

            try{
                $doctordetail = DoctorDetail::select('doctors.doctor_id','doctors.city','doctors.fee_of_consultation','doctors.exp_year','doctor_speciality.speciality','users.fname','doctor_speciality.id')
                ->leftjoin('doctor_speciality', 'doctors.speciality', '=', 'doctor_speciality.id')
                ->leftjoin('users', 'doctors.doctor_id', '=', 'users.id')
                ->Where('doctors.city', $request->city_id)
                ->Where('doctors.clinic_id','!=',0)
                ->orderBy('id', 'DESC')->get();
                $response = array(
                    "data" => $doctordetail,
                    "error_code" => 0,
                    "message" => count($doctordetail) .' available' 
                );

                }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'not found' 
                );
            }
            return response()->json($response);
        }
        }

        /*specialitywisedrlist*/
        
        public function specialitywisedrlist1(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'city_id'=>'required',
                'speciality_id',
            ]);
        if ($validator->fails()) {
            $errorMessage = implode(',', $validator->errors()->all());
            return response()->json(['errors' => $errorMessage], 422);
        }else{

            try{
                $doctordetail = DoctorDetail::select('doctors.city','doctor_speciality.speciality','users.fname','doctor_speciality.id','doctors.doctor_id','doctors.exp_year','doctors.profile_pic','doctors.fee_of_consultation')
                ->leftjoin('doctor_speciality', 'doctors.speciality', '=', 'doctor_speciality.id')
                ->leftjoin('users', 'doctors.doctor_id', '=', 'users.id')
                ->Where('doctors.clinic_id','!=',0)
                ->Where('doctors.city', $request->city_id)
                
                //->where('users.verified',1)
                ->orderBy('id', 'DESC')
                ->get();
                

                $response = array(
                    "data" => $doctordetail,
                    "error_code" => 0,
                    "message" => count($doctordetail) .' available' 
                );

                }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'not found' 
                );
            }
            return response()->json($response);
        }
        }

        public function GetAppointmentTimeList(Request $request)
        {

            $validator = Validator::make($request->all(), [
                'doctor_id'=>'required',
                'date'=>'required',
            ]);
        if ($validator->fails()) {
            $errorMessage = implode(',', $validator->errors()->all());
            return response()->json(['errors' => $errorMessage], 422);
        }else{
            try{
                $DoctorDaysQ=DoctorDays::where('user_id','=',$request->doctor_id)
                ->where('days','=',lcfirst(date('l', strtotime($request->date))));
                $DoctorDays=$DoctorDaysQ->get();
                
                //$Doctorcount=$DoctorDaysQ->count();
                if(count($DoctorDays) > 0){
                //dd($Doctorcount);
                //if($Doctorcount > 0){  
                
                foreach ($DoctorDays as $key => $dd) {
                    $slopt = $this->getServiceScheduleSlots($dd['time_slot'], $dd['start_time'],$dd['end_time']);
                    
                    foreach ($slopt as $key => $s) {
                      $sp[] = $s;
                    }
                }
                
               $DoctorDays=$DoctorDaysQ->first();
               foreach ($sp as $slot) {
                    //dd($slot);
                    $checkAppointments=Appointments::
                    where('doctor_id','=',$request->doctor_id)
                    ->whereDate('date','=',date("Y-m-d", strtotime($request->date)))
                    ->whereTime('time','=',$slot['start'])
                    //->toSql();
                    ->count();
                    //dd($checkAppointments);
                    if($checkAppointments==0){
                        $check=1;
                    }else{
                        $check=0;
                    }
                    $dxy[]= array(
                        'id' => $DoctorDays->id,
                        'user_id' => $DoctorDays->user_id,
                        'days' => $DoctorDays->days,
                        'time_slot' => $DoctorDays->time_slot,
                        'available' => $check,
                        'start_time'=>date("g:i A", strtotime($slot['start'])),
                        'end_time'=>date("g:i A", strtotime($slot['end'])),
                        'created_at' => date("Y-m-d h:i:s", strtotime($DoctorDays->created_at)),
                        'updated_at' => date("Y-m-d h:i:s", strtotime($DoctorDays->updated_at)),
                         );
                }
                //dd($dxy);
                $response = array(
                        "data" => $dxy,
                        "error_code" => 0,
                        "message" => count($dxy) .' available' 
                        );
                }//count doctor day
                else{
                    //dd($end);
                    //$slopt = $this->getServiceScheduleSlots(15, "00:00","23:30");
                    //dd($slopt);
                    //$day=[];
                    // foreach ($slopt as $key => $value) {
                    //     $day['user_id']=0;
                    //     $day['days']=lcfirst(date('l', strtotime($request->date)));;
                    //     $day['start_time']='';//date("g:i A", strtotime($value['start']));
                    //     $day['end_time']='';//date("g:i A", strtotime($value['end']));
                    //     $day['time_slot']=15;
                    //     $day['available']=0;
                    //     $day['created_at']='';
                    //     $day['updated_at']='';
                    //     $dayv[]=$day;
                    // }
                    // $day['start_time']=date("g:i A", strtotime("23:30"));
                    // $day['end_time']=date("g:i A", strtotime("23:45"));
                    // $dayv[]=$day;
                    // $day['start_time']=date("g:i A", strtotime("23:45"));
                    // $day['end_time']=date("g:i A", strtotime("00:00"));
                    // $dayv[]=$day;
                     $response = array(
                        "data" => [],
                        "error_code" => 1,
                        "message" => 'Time Slot Not Available' 
                        );
                }
                }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'not found' 
                );
            }
            return response()->json($response);
        }
        }//funcation end
        
        public function getServiceScheduleSlots($duration, $start,$end)
        {
            
            $start = new DateTime($start);
            $end = new DateTime($end);
            $start_time = $start->format('H:i');
            $end_time = $end->format('H:i');
            
            $i=0;
            
            while(strtotime($start_time) <= strtotime($end_time)){
                
                $start = $start_time;
                $end = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));
                
                $start_time = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));
                $i++;
                
                if(strtotime($start_time) <= strtotime($end_time)){
                    $time[$i]['start'] = $start;
                    $time[$i]['end'] = $end;
                }
            }
            
            return $time;
        }
        
        public function checktimeslot(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'doctor_id'=>'required',
                'date'=>'required',
                'time'=>'required',
            ]);
        if ($validator->fails()) {
            $errorMessage = implode(',', $validator->errors()->all());
            return response()->json(['errors' => $errorMessage], 422);
        }else{

            try{
                 $Appointments=Appointments::select('appointment_details.*')
                        ->Where('appointment_details.doctor_id', $request->doctor_id)
                        ->Where('appointment_details.date', $request->date)
                        ->Where('appointment_details.time', $request->time)
                        ->get();
                        
                        $response = array(
                        "data" => $Appointments,
                        "error_code" => 0,
                        "message" => count($Appointments) .' available' 
                        );

                }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'not found' 
                );
            }
            return response()->json($response);
        }
        }//funcation end
        public function doctorbookin(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'doctor_id'=>'required',
                'booking_date'=>'required',
                'booking_time'=>'required',
               // 'reason_to_previsit'=>'required',
            //    'report_attached'=>'required',
            ]);
        if ($validator->fails()) {
            $errorMessage = implode(',', $validator->errors()->all());
            return response()->json(['errors' => $errorMessage], 422);
        }else{
            $request->booking_time=date("H:i",strtotime($request->booking_time));
            try{
                $checkAppointments=Appointments::
                Where('appointment_details.doctor_id', $request->doctor_id)
                ->Where('appointment_details.date', $request->booking_date)
                ->Where('appointment_details.time', $request->booking_time)
                ->count();
                if($checkAppointments==0){
                    $id = Auth::user()->id;
                     $doctor=Doctor::
                     select('users.*','doctors.speciality','doctors.clinic_id','doctors.city')
                     ->leftjoin('doctors', 'users.id', '=', 'doctors.doctor_id')
                     ->where('users.id','=',$request->doctor_id)
                     ->first();

                    $report_file_data = '';
                    if($request->report_attached == 1)
                    {
                        if($request->report_file)
                        {
                            $report_file = $request->report_file;
                            $report_file_input = [];
                            foreach ($report_file as $key => $r) {
                            
                            $img = $r;
                            $custom_file_name = 'patient-'.$key.time().'.'.$img->getClientOriginalExtension();
                            $profile = $img->storeAs('patient_report', $custom_file_name);
                            $report_file_input[] = $profile;
                            }

                            $report_file_data = implode(' | ', $report_file_input);
                        }
                    }
                    
                    $Appointments=new Appointments;
                    $Appointments->user_id=$id;
                    $Appointments->clinic_id=$doctor->clinic_id;
                    $Appointments->patient_id=$id;
                    $Appointments->city_id=$doctor->city;
                    $Appointments->hostipal_id=$request->doctor_id;
                    $Appointments->speciality_id=$doctor->speciality;
                    $Appointments->doctor_id=$request->doctor_id;
                    $Appointments->date=$request->booking_date;
                    $Appointments->time=$request->booking_time;
                    //$Appointments->reason_to_previsit=$request->reason_to_previsit;
                    //$Appointments->description_to_previsit=isset($request->description_to_previsit)? $request->description_to_previsit : '';
                    //$Appointments->report_attached=$request->report_attached;
                   // $Appointments->report_file=$report_file_data;
                    $Appointments->role=4;
                    $Appointments->flag=0;
                    $Appointments->arrives=0;
                    $Appointments->save();
                    
                    $HealthTeam=HealthTeam::where('patient_id',$id)->where('doctor_id',$request->doctor_id)->where('hospital_id',$request->doctor_id)->first();

                    if($HealthTeam == null)
                    {
                        $HealthTeam=new HealthTeam;
                        $HealthTeam->patient_id=$id;
                        $HealthTeam->doctor_id=$request->doctor_id;
                        $HealthTeam->hospital_id=$request->doctor_id;
                        $HealthTeam->save();
                    }
                    
                    try {
                        $parameter['patient_name']=isset($id->fname)?$id->name:'';
                        $parameter['doctor_name']=isset($doctor->fname)?$doctor->fname:'';
                        $email = Auth::user()->email;
                        $ppp = Mail::send('emailTemplate.appointmentbyapp', ['parameter' => $parameter], function ($m) use($email) {
                        $m->from(Config::get('app.from_mail'), Config::get('app.from_name'));
                        $m->to($email)->subject('Sensoriom | Appointment Booked');
                        });
                    } catch (Exception $e) {
                        //ERROR
                    }
                    //mail funcation end
                    $response = array(
                        "data" => $Appointments,
                        "error_code" => 0,
                        "message" => 'Appointments Successfully' 
                        );
                }else{
                    $response = array(
                        "data" => (object)[],
                        "error_code" => 1,
                        "message" => 'Doctor Alreay Booked' 
                        );
                }

                }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'not found' 
                );
            }
            return response()->json($response);
        }
        }//funcation end

        public function GetDoctorDays(Request $request)
        {

            $validator = Validator::make($request->all(), [
                'doctor_id'=>'required',
            ]);
            if ($validator->fails()) {
            $errorMessage = implode(',', $validator->errors()->all());
            return response()->json(['errors' => $errorMessage], 422);
            }else{
                try{
                    $days=DoctorDays::where('user_id','=',$request->doctor_id)->get();
                    $response = array(
                    "data" => $days,
                    "error_code" => 0,
                    "message" => count($days) .' available' 
                    );
                }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'not found' 
                );
            }
            return response()->json($response);
            }//validator end
        }

}
