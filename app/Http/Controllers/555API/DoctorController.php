<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Plivo\RestClient;
use Validator;
use App\User;
use App\DoctorDetail;
use App\PatientDetail;
use App\DoctorBankDetail;
use App\DoctorBalance;
use App\AuthorityCouncil;
use App\Hospital;
use App\HealthTeam;
use App\HealthProblem;
use App\PatientHealthHistory;
use App\PatientFamilyHealthHistory;
use App\PatientPastHealthHistory;
use App\PatientPastHistory;
use App\PatientHealthRecordDetail;
use App\PatientLabDetail;
use App\PatientProcedure;
use App\PatientPriscription;
use App\PatientDiagnosis;
use App\AdminNotification;
use App\Helpers\Notification\PushNotification;
use Illuminate\Support\Facades\Storage;

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
                    ->select('health_team.patient_id', 'users.fname','city.city','patient_detail.dob','patient_detail.profile_pic','patient_detail.gender')
                    ->leftjoin('patient_detail', 'health_team.patient_id', '=', 'patient_detail.patient_id')
                    ->leftjoin('users', 'health_team.patient_id', '=', 'users.id')
                    ->leftjoin('city', 'patient_detail.city', '=', 'city.id')
                    ->where('health_team.doctor_id', $request->doctor_id)
                    ->get()->toArray();

                foreach ($doctorpatient as $value) {
                    $value = (array) $value;

                    $patient_diagnosis = PatientDiagnosis::select('id','diagnosis','year')->where('patient_id',$value['patient_id'])->get()->toArray();
                    
                    $response_data = array(
                        'patient_id' => $value['patient_id'],
                        'fname' => $value['fname'],
                        'city' => $value['city'],
                        'dob' => $value['dob'],
                        'profile_pic' => $value['profile_pic'],
                        'gender' => $value['gender'],
                        'diagnosis' => $patient_diagnosis
                    );

                    $doctorpatientlist[] = $response_data;
                } 

                $doctorpatient = array_map("unserialize", array_unique(array_map("serialize", $doctorpatientlist)));


                $doctorpatient1 = DB::table('call_history')
                    ->select('call_history.patient_id', 'users.fname','city.city','patient_detail.dob','patient_detail.profile_pic','patient_detail.gender')
                    ->leftjoin('patient_detail', 'call_history.patient_id', '=', 'patient_detail.patient_id')
                    ->leftjoin('users', 'call_history.patient_id', '=', 'users.id')
                    ->leftjoin('city', 'patient_detail.city', '=', 'city.id')
                    ->where('call_history.doctor_id', $request->doctor_id)
                    ->get()
                    ->toArray();

                foreach (@$doctorpatient1 as $val) {
                    $val = (array) $val;

                    $patient_diagnosis = PatientDiagnosis::select('id','diagnosis','year')->where('patient_id',$val['patient_id'])->get()->toArray();
                    
                    $response_data = array(
                        'patient_id' => $val['patient_id'],
                        'fname' => $val['fname'],
                        'city' => $val['city'],
                        'dob' => $val['dob'],
                        'profile_pic' => $val['profile_pic'],
                        'gender' => $val['gender'],
                        'diagnosis' => $patient_diagnosis
                    );

                    $doctorpatientlist1[] = $response_data;
                } 

                @$doctorpatient1 = array_map("unserialize", array_unique(array_map("serialize", $doctorpatientlist1)));

                @$doctorpatient2 = array_map("unserialize", array_unique(array_map("serialize", $doctorpatient)));

                if($doctorpatient1 != null && $doctorpatient2 != null)
                {
                    $response = array_merge(@$doctorpatient2,@$doctorpatient1);
                }

                if($doctorpatient1 != null && $doctorpatient2 == null)
                {
                    $response = $doctorpatient1;
                }

                if($doctorpatient2 != null && $doctorpatient1 == null)
                {
                    $response = $doctorpatient2;
                }

                @$final_response = array_map("unserialize", array_unique(array_map("serialize", @$response)));                

                // dd($response);

                $response_data = array();   
                $patient = array();

                foreach ($response as $r) {
                    if(!in_array($r['patient_id'], $patient))
                    {
                        $response_data[] = array(
                            'patient_id' => $r['patient_id'],
                            'fname' => $r['fname'],
                            'city' => $r['city'],
                            'dob' => $r['dob'],
                            'profile_pic' => $r['profile_pic'],
                            'gender' => $r['gender'],
                            'diagnosis' => $r['diagnosis'],

                        );
                        $patient[] = $r['patient_id'];
                    }
                }

                $response = array(
                    "data" => $response_data,
                    "error_code" => 0,
                    "message" => count($doctorpatient) + count($doctorpatient1).' patient available' 
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

            $priscription = PatientPriscription::where('patient_id',$request->patient_id)->where('doctor_id',$request->doctor_id)->get()->toArray();

            $response = array(
                "data" => $priscription,
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
                    // 'medicine_name.required' => 'Medicine Name is requuired.',
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

            if($request->medicine_name)
            {
                $messages = [
                    'required' => ':attribute is required.',
                    'doctor_id' => 'Doctor id is requuired',
                    'patient_id.required' => 'Patient Id is requuired.',
                    'medicine_name.required' => 'Medicine Name is requuired.',
                    'dose.required' => 'Dose is requuired.',
                    'freq.required' => 'Freq is requuired.',
                    'route.required' => 'Route is requuired.',
                    'duration.required' => 'Duration is requuired.',
                    // 'diagnosis.required' => 'Diagnosis is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'doctor_id' => 'required|integer',
                            'medicine_name' => 'required',
                            'dose' => 'required',
                            'freq' => 'required',
                            'route' => 'required',
                            'duration' => 'required',
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

                $priscription = new PatientPriscription;
                $priscription->patient_id = $request->patient_id;
                $priscription->doctor_id = $request->doctor_id;
                $priscription->medicine_name = $request->medicine_name;
                $priscription->dose = $request->dose;
                $priscription->freq = $request->freq;
                $priscription->route = $request->route;
                $priscription->duration = $request->duration;
                $priscription->save();


                $priscription_response1  = array(
                    'id' => $priscription->id,
                    'patient_id' => $request->patient_id,
                    'doctor_id' => $request->doctor_id,
                    'medicine_name' => $request->medicine_name,
                    'dose' => $request->dose,
                    'freq' => $request->freq,
                    'route' => $request->route,
                    'duration' => $request->duration,
                    // 'diagnosis' => $response_diagnosis, 
               );
            }
            else
            {
                $priscription_response1 = null;
            }
            

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
            );


            //Notification
            
            $patient_team = HealthTeam::select('coach_id')->where('patient_id',$request->patient_id)->first();

            $patient_detail = User::select('fname','device_id')->where('id',$request->patient_id)->first();
            $doctor_detail = User::select('fname')->where('id',$request->doctor_id)->first();
            $coach_detail = User::select('fname','device_id')->where('id',$patient_team->coach_id)->first();

            $patient_device_id = $patient_detail->device_id;
            $coach_device_id = $coach_detail->device_id;
            $datetime = date('d-m-Y h:i A');

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

            $patient_msg = array('type' => 'Patient');

            $coach_msg = array('type' => 'Coach','coach_id' => $patient_team->coach_id);

            PushNotification::PushAndroidNotificationUser($pmsg, $patient_msg, [$patient_device_id]);

            PushNotification::PushAndroidNotificationUser($cmsg, $coach_msg, [$coach_device_id]);

            $notification = new AdminNotification;
            $notification->from_id = $request->doctor_id;
            $notification->to_id = $request->patient_id;
            $notification->notification_description = 'Dr. '.ucfirst(trim($doctor_detail['fname']," Dr.")).' has sent you an e-prescription on '.$datetime.' Please check and follow the instructions.';
            $notification->save();

            $notification = new AdminNotification;
            $notification->from_id = $request->doctor_id;
            $notification->to_id = $request->coach_id;
            $notification->notification_description = 'Dr. '.ucfirst(trim($doctor_detail['fname']," Dr.")).' has written an e-prescription to Patient '.ucfirst($patient_detail->fname).' on '.$datetime;
            $notification->save();

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

}
