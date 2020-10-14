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
use App\CoachDetail;
use App\DoctorDetail;
use App\PatientDetail;
use App\AuthorityCouncil;
use App\PatientWalletDetail;
use App\PatientFamilyContact;
use App\Hospital;
use App\HealthTeam;
use App\HealthProblem;
use App\PatientHealthHistory;
use App\PatientFamilyHealthHistory;
use App\PatientPastHealthHistory;
use App\PatientPastHistory;
use App\PatientHealthRecordDetail;
use App\Role;
use App\LabReportName;
use App\PatientLabDetail;
use App\HealthPlan;
use App\HealthPlanDescription;
use App\PatientHealthPlan;
use App\PatientPriscription;
use App\PatientProcedure;
use App\Procedure;
use App\AdminNotification;
use App\Helpers\Notification\PushNotification;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller {

    public function alldoctor(Request $request)
    {
        try{
            $doctor = User::select('id','fname')->where('role_id',2)->where('verified', 1)->get();
            // $doctor = DB::table('doctors')
            //         ->select('users.id', 'users.fname')
            //         ->leftjoin('users', 'doctors.doctor_id', '=', 'users.id')
            //         ->where('users.role_id',2)
            //         ->where('users.verified', 1)
            //         ->where('doctors.available', 1)
            //         ->get(); 

            $doctor_count = User::where('role_id',2)->where('verified', 1)->count();
            
            if($doctor_count)
            {
                $response = array(
                    "data" => $doctor,
                    "error_code" => 0,
                    "message" => $doctor_count.' doctor available' 
                );
            }
            else
            {
                $response = array(
                    "data" => '',
                    "error_code" => 1,
                    "message" => 'No doctor available' 
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

    public function allcoach(Request $request)
    {
        try{

            $coach = User::select('id','fname')->where('role_id',3)->where('verified', 1)->get();
            $coach_count = User::where('role_id',3)->where('verified', 1)->count();
            
            if($coach_count)
            {
                $response = array(
                    "data" => $coach,
                    "error_code" => 0,
                    "message" => $coach_count.' coach available' 
                );
            }
            else
            {
                $response = array(
                    "data" => '',
                    "error_code" => 1,
                    "message" => 'No coach available' 
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

    public function allhospital(Request $request)
    {
        try{

            $hospital = Hospital::select('id','name','urgent_care_number')->where('status',1)->get();
            $hospital_count = Hospital::where('status', 1)->count();
            
            if($hospital_count)
            {
                $response = array(
                    "data" => $hospital,
                    "error_code" => 0,
                    "message" => $hospital_count.' hospital available' 
                );
            }
            else
            {
                $response = array(
                    "data" => '',
                    "error_code" => 1,
                    "message" => 'No hospital available' 
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

    public function patienthealthteam(Request $request)
    {
        try{

             $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
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

            $health_team_count = HealthTeam::where('patient_id',$request->patient_id)->count();
            if($health_team_count)
            {
                $health_team = HealthTeam::where('patient_id',$request->patient_id)->first();
                $patient_name = User::where('id',$request->patient_id)->first();
                $doctor_name = User::where('id',$health_team->doctor_id)->first();
                $coach_name = User::where('id',$health_team->coach_id)->first();
                $hospital_name = Hospital::where('id',$health_team->hospital_id)->first();

                $healthteam = array(
                    'health_team_id' => $health_team->id,
                    'patient_name' => $patient_name->fname,
                    'doctor_name' => $doctor_name->fname,
                    'coach_name' => $coach_name->fname,
                    'hospital_name' => $hospital_name->name,
                    'urgent_care_number' => $hospital_name->urgent_care_number,
                );
                
                $response = array(
                    "data" => $healthteam,
                    "error_code" => 0,
                    "message" => 'patient health team available' 
                ); 
            }
            else
            {
                $response = array(
                        "data" => null,
                        "error_code" => 1,
                        "message" => 'No healthteam available' 
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

    public function patientcityhealthteam(Request $request)
    {
        try{

             $messages = [
                    'required' => ':attribute is required.',
                    'city_id.required' => 'City Id is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'city_id' => 'required|integer',
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

            $doctor = DoctorDetail::where('city',$request->city_id)->count();
            $coach = CoachDetail::where('city',$request->city_id)->count();
            $hospital = Hospital::where('city',$request->city_id)->count();
            if($doctor)
            {
                $doctor_detail = DB::table('doctors')
                    ->select('doctors.doctor_id', 'users.fname')
                    ->leftjoin('users', 'doctors.doctor_id', '=', 'users.id')
                    ->where('doctors.city',$request->city_id)
                    ->where('doctors.status', 1)
                    ->where('users.verified', 1)
                    ->get(); 
            }
            else
            {
                $doctor_detail = [];
            }
            if($coach)
            {
                $coach_detail = DB::table('coach_detail')
                    ->select('coach_detail.coach_id', 'users.fname')
                    ->leftjoin('users', 'coach_detail.coach_id', '=', 'users.id')
                    ->where('coach_detail.city',$request->city_id)
                    ->where('coach_detail.status', 1)
                    ->where('users.verified', 1)
                    ->get(); 
            }
            else
            {
                $coach_detail = [];
            }

            if($hospital)
            {   
                if(Hospital::select('id','name')->where('city',$request->city_id)->where('status',1)->count())
                {
                    $hospital_detail = Hospital::select('id','name','urgent_care_number')->where('city',$request->city_id)->where('status',1)->get(); 
                }
                else
                {
                    $hospital_detail = [];
                }
            }
            else
            {
                $hospital_detail = [];
            }
            
            $all_detail = array(
                'doctor' => $doctor_detail,
                'coach' => $coach_detail,
                'hospital' => $hospital_detail,
                );

            $response = array(
                "data" => $all_detail,
                "error_code" => 0,
                "message" => $doctor.' doctor & '.$coach.' coach & '.$hospital.' are available' 
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

    public function addpatienthealthteam(Request $request) 
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient id is required.',
                    'doctor_id.required' => 'Doctor id is required.',
                    'coach_id.required' => 'Coach id is required.',
                    'hospital_id.required' => 'Hospital id is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'doctor_id' => 'required|integer',
                            'coach_id' => 'required|integer',
                            'hospital_id' => 'required|integer',
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

            $team_count = HealthTeam::where('patient_id',$request->patient_id)->count();
            
            if($team_count > 0)
            {
                $team_detail = HealthTeam::select('id')->where('patient_id',$request->patient_id)->first();
                $health_team = HealthTeam::whereId($team_detail->id)->update([
                    'doctor_id' => $request->doctor_id,
                    'coach_id' => $request->coach_id,
                    'hospital_id' => $request->hospital_id,
                    ]);

                $response_data = array(
                    'id' => $team_detail->id,
                    'patient_id' => $request->patient_id,
                    'doctor_id' => $request->doctor_id,
                    'coach_id' => $request->coach_id,
                    'hospital_id' => $request->hospital_id,
                );
            } 
            else
            {
                $health_team = new HealthTeam;
                $health_team->doctor_id = $request->doctor_id;
                $health_team->patient_id = $request->patient_id;
                $health_team->coach_id = $request->coach_id;
                $health_team->hospital_id = $request->hospital_id;
                $health_team->save();                
                
                $response_data = array(
                    'id' => $health_team->id,
                    'patient_id' => $health_team->patient_id,
                    'doctor_id' => $health_team->doctor_id,
                    'coach_id' => $health_team->coach_id,
                    'hospital_id' => $health_team->hospital_id,
                );
            }

            //Notification
            
            $patient_detail = User::select('fname','device_id')->where('id',$request->patient_id)->first();
            $coach_detail = User::select('fname','device_id')->where('id',$request->coach_id)->first();
            $doctor_detail = User::select('fname','device_id')->where('id',$request->doctor_id)->first();
            $coach_device_id = $coach_detail->device_id;
            $doctor_device_id = $doctor_detail->device_id;
            
            $datetime = date('d-m-Y h:i a');

            $cmsg = array(
                'body' => 'Patient '.ucfirst($patient_detail['fname']).' has chosen you as the Care Coach on '.$datetime.'.',
                'title' => 'Save Health-Team',  
                'icon' => 'myicon',
                'sound' => 'mySound'
            );

            $coach_msg = array('type' => 'Coach','coach_id' => $request->coach_id);

            PushNotification::PushAndroidNotificationUser($cmsg, $coach_msg, [$coach_device_id]);

            $notification = new AdminNotification;
            $notification->from_id = $request->patient_id;
            $notification->to_id = $request->coach_id;
            $notification->notification_description = 'Patient '.ucfirst($patient_detail['fname']).' has chosen you as the Care Coach on '.$datetime.'.';   
            $notification->save();

            $dmsg = array(
                'body' => 'Patient '.ucfirst($patient_detail['fname']).' has chosen you as the preferred Doctor on '.$datetime.'.',
                'title' => 'Save Health-Team',  
                'icon' => 'myicon',
                'sound' => 'mySound'
            );

            $doctor_msg = array('type' => 'Doctor');

            PushNotification::PushAndroidNotificationUser($dmsg, $doctor_msg, [$doctor_device_id]);

            $notification = new AdminNotification;
            $notification->from_id = $request->patient_id;
            $notification->to_id = $request->doctor_id;
            $notification->notification_description = 'Patient '.ucfirst($patient_detail['fname']).' has chosen you as the preferred Doctor on '.$datetime.'.';   
            $notification->save();

            // dd($coach_msg);
            //End Notification


            $response = array(
                "data" => $response_data,
                "error_code" => 0,
                "message" => 'Health team saved' 
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

    public function problemlist(Request $request)
    {
        try{

            $problem = HealthProblem::select('id','problem','type')->where('status',1)->get();
            $problem_count = HealthProblem::where('status',1)->count();
            
            if($problem_count)
            {
                $response = array(
                    "data" => $problem,
                    "error_code" => 0,
                    "message" => $problem_count.' problem available' 
                );
            }
            else
            {
                $response = array(
                    "data" => [],
                    "error_code" => 1,
                    "message" => 'No problem available' 
                );
            }
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => [],
                    "error_code" => 1,
                    "message" => 'No record Found' 
                );
        }
    return response()->json($response);
    }

    public function availabledoctors(Request $request)
    {
        try{
            $available_doctor_count = DoctorDetail::where('available',1)->where('status',1)->count();
            $available_doctors = DB::table('doctors')
                    ->select('users.id', 'users.fname', 'users.contact_number','doctors.mbbs_registration_number','doctors.md_ms_dnb_registration_number','doctors.fee_of_consultation','city.city','doctors.exp_year','doctors.profile_pic','doctors.call_payment')
                    ->leftjoin('users', 'doctors.doctor_id', '=', 'users.id')
                    ->leftjoin('city', 'doctors.city', '=', 'city.id')
                    ->where('doctors.available', 1)
                    ->where('doctors.status', 1)
                    ->where('users.verified',1)
                    ->get();
            
            if($available_doctor_count)
            {
                $response = array(
                    "data" => $available_doctors,
                    "error_code" => 0,
                    "message" => $available_doctor_count.' doctor available' 
                );
            }
            else
            {
                $response = array(
                    "data" => '',
                    "error_code" => 1,
                    "message" => 'No doctor available' 
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

    public function familycontact(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
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

            $familycontact_count = PatientFamilyContact::where('patient_id',$request->patient_id)->count();
            $familycontact = DB::table('patient_family_contact')
                    ->select('patient_family_contact.id', 'users.fname','patient_family_contact.member_name','patient_family_contact.relation','patient_family_contact.contact_number')
                    ->leftjoin('users', 'patient_family_contact.patient_id', '=', 'users.id')
                    ->where('patient_id',$request->patient_id)
                    ->get();
            
            if($familycontact_count)
            {
                $response = array(
                    "data" => $familycontact,
                    "error_code" => 0,
                    "message" => $familycontact_count.' family contact available' 
                );
            }
            else
            {
                $response = array(
                    "data" => [],
                    "error_code" => 1,
                    "message" => 'No family contact available' 
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

    public function patienthealthrecords(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
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

            $healthrecords_count = PatientHealthRecordDetail::where('patient_id',$request->patient_id)->count();
            $healthrecords = PatientHealthRecordDetail::where('patient_id',$request->patient_id)
                    ->get();
            
            if($healthrecords_count)
            {
                $response = array(
                    "data" => $healthrecords,
                    "error_code" => 0,
                    "message" => $healthrecords_count.' health records available' 
                );
            }
            else
            {
                $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'No health records available' 
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

    public function addfamilycontact(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
                    'member_name.required' => 'Member Name is required.',
                    'relation.required' => 'Relation is required.',
                    'contact_number.required' => 'Contact Number is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'member_name' => 'required',
                            'relation' => 'required',
                            'contact_number' => 'required',
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

            $patientfamilycontact = new PatientFamilyContact;
            $patientfamilycontact->patient_id = $request->patient_id;
            $patientfamilycontact->member_name = $request->member_name;
            $patientfamilycontact->relation = $request->relation;
            $patientfamilycontact->contact_number = $request->contact_number;
            $patientfamilycontact->save();

            $response = array(
                "data" => $patientfamilycontact,
                "error_code" => 0,
                "message" => 'Family Contact added' 
            );
            
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Family contact add failed' 
                );
        }
    return response()->json($response);
    }

    public function addpatienthealthrecords(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
                    'add_date.required' => 'Date is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'add_date' => 'required',
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

            $patienthealthrecord = new PatientHealthRecordDetail;
            $patienthealthrecord->patient_id = $request->patient_id;
            $patienthealthrecord->add_date = $request->add_date;
            $patienthealthrecord->blood_pressure_min_value = $request->min_value;
            $patienthealthrecord->blood_pressure_max_value = $request->max_value;
            $patienthealthrecord->pluse = $request->pluse;
            $patienthealthrecord->temperature = $request->temperature;
            $patienthealthrecord->oxygen_saturation = $request->oxygen_saturation;
            $patienthealthrecord->breathing_rate = $request->breathing_rate;
            $patienthealthrecord->abdominal_circumference = $request->abdominal_circumference;
            $patienthealthrecord->blood_sugar = $request->blood_sugar;
            $patienthealthrecord->weight = $request->weight;
            $patienthealthrecord->height = $request->height;
            $patienthealthrecord->bmi = $request->bmi;
            $patienthealthrecord->save();

            if($patienthealthrecord)
                {
                    $papatienthealthrecord = $patienthealthrecord;
                }
                else
                {
                    $patienthealthrecord = null;
                }
            $response = array(
                "data" => $patienthealthrecord,
                "error_code" => 0,
                "message" => 'Health record added successfully' 
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

    public function patienthealthhistory(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
                    'smoking.required' => 'Smoking is required.',
                    'alcohol_drinking.required' => 'Alcohol Drinking is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'smoking' => 'required',
                            'alcohol_drinking' => 'required',
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
            $check_patient = PatientHealthHistory::where('patient_id',$request->patient_id)->count();
            if($check_patient){

                $patient = PatientHealthHistory::where('patient_id',$request->patient_id)->first();
                $patienthealthhistory1 = PatientHealthHistory::whereId($patient->id)->update([
                    'problem_id' => $request->problem_id,
                    'smoking' => $request->smoking,
                    'alcohol_drinking' => $request->alcohol_drinking,
                    'allergies' => $request->allergies,
                    ]);

                $patienthealthhistory = array(
                    'id' => $patient->id,
                    'patient_id' => $request->patient_id,
                    'problem_id' => $request->problem_id,
                    'smoking' => $request->smoking,
                    'alcohol_drinking' => $request->alcohol_drinking,
                    'allergies' => $request->allergies,
                );
            }
            else
            {
                $patienthealthhistory = new PatientHealthHistory;
                $patienthealthhistory->patient_id = $request->patient_id;
                $patienthealthhistory->problem_id = $request->problem_id;
                $patienthealthhistory->smoking = $request->smoking;
                $patienthealthhistory->alcohol_drinking = $request->alcohol_drinking;
                $patienthealthhistory->allergies = $request->allergies;
                $patienthealthhistory->save();
            }

            $response = array(
                "data" => $patienthealthhistory,
                "error_code" => 0,
                "message" => 'Health history added.' 
            );
          
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Health history failed.' 
                );
        }
    return response()->json($response);
    }

    public function getallpatienthealthhistory(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
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
            $check_patient = PatientHealthHistory::where('patient_id',$request->patient_id)->count();
            if($check_patient > 0){

                $patient = PatientHealthHistory::select('patient_id','smoking','alcohol_drinking','allergies')->where('patient_id',$request->patient_id)->first();   
                $response = array(
                        "data" => $patient,
                        "error_code" => 0,
                        "message" => $check_patient.' health history available' 
                   );
            }
            else
            {
                    $response = array(
                        "data" => null,
                        "error_code" => 1,
                        "message" => 'No health history found' 
                   );
            }
          
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'No health history found.' 
                );
        }
    return response()->json($response);
    }

    public function patienthealthhistoryfamily(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
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

            $check_patient = PatientFamilyHealthHistory::where('patient_id',$request->patient_id)->count();
            if($check_patient){

                $patient = PatientFamilyHealthHistory::where('patient_id',$request->patient_id)->first();
                $patienthealthhistoryfamily1 = PatientFamilyHealthHistory::whereId($patient->id)->update([
                    'problem_id' => $request->problem_id,
                    ]);

                $patienthealthhistoryfamily = array(
                    'id' => $patient->id,
                    'patient_id' => $request->patient_id,
                    'problem_id' => $request->problem_id,
                );
            }
            else
            {
                $patienthealthhistoryfamily = new PatientFamilyHealthHistory;
                $patienthealthhistoryfamily->patient_id = $request->patient_id;
                $patienthealthhistoryfamily->problem_id = $request->problem_id;
                $patienthealthhistoryfamily->save();
            }

            $response = array(
                "data" => $patienthealthhistoryfamily,
                "error_code" => 0,
                "message" => 'Health History added.' 
            );
          
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Health History failed.' 
                );
        }
    return response()->json($response);
    }

    public function getallhealthhistoryfamily(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient id is required.',
                    'type.required' => 'Type is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'type' => 'required',
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

            if($request->type == 'Family')
            {
                $patienthealthhistoryfamily = PatientFamilyHealthHistory::select('patient_id','problem_id')->where('patient_id',$request->patient_id)->first();
            }
            elseif($request->type == 'Past')
            {
                $patienthealthhistoryfamily = PatientPastHealthHistory::select('patient_id','problem_id')->where('patient_id',$request->patient_id)->first();   
            }
            elseif($request->type == 'Personal')
            {
                $patienthealthhistoryfamily = PatientHealthHistory::select('patient_id','problem_id')->where('patient_id',$request->patient_id)->first();   
            }
            if($patienthealthhistoryfamily)
            {
                $problem = explode(',',@$patienthealthhistoryfamily->problem_id);
                $p = array();
                foreach ($problem as $pf) {
                    $problem_id = HealthProblem::select('id')->where('id',$pf)->where('type',$request->type)->first();
                    if($problem_id['id'])
                    {
                        $p[] = $problem_id['id'];
                    }
                }
                $problems = implode(',',$p);
               
                $response1 = array(
                    'patient_id' => @$patienthealthhistoryfamily->patient_id,
                    'problem_id' => $problems
                );

                $response = array(
                    "data" => $response1,
                    "error_code" => 0,
                    "message" => 'Problem available.' 
                    );
            }
            else
            {
                $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Problem not available.' 
                );
            }

        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Problem not available.' 
                );
        }
    return response()->json($response);
    }
    
    public function patienthealthhistorypast(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
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

            $check_patient = PatientPastHealthHistory::where('patient_id',$request->patient_id)->count();
            if($check_patient){

                $patient = PatientPastHealthHistory::select('id','created_at')->where('patient_id',$request->patient_id)->first();
                
                $patienthealthhistoryfamilypast1 = PatientPastHealthHistory::whereId($patient->id)->update([
                    'problem_id' => $request->problem_id,
                    ]);

                $patienthealthhistoryfamilypast = array(
                    'id' => $patient->id,
                    'patient_id' => $request->patient_id,
                    'problem_id' => $request->problem_id,
                );
            }
            else
            {
                $patienthealthhistoryfamilypast = new PatientPastHealthHistory;
                $patienthealthhistoryfamilypast->patient_id = $request->patient_id;
                $patienthealthhistoryfamilypast->problem_id = $request->problem_id;
                $patienthealthhistoryfamilypast->save();
            }
            $response = array(
                "data" => $patienthealthhistoryfamilypast,
                "error_code" => 0,
                "message" => 'Health History added.' 
            );
          
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Health History failed.' 
                );
        }
    return response()->json($response);
    }

    public function patientpasthistory(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
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

                    $patientpasthistory = new PatientPastHistory;
                    $patientpasthistory->patient_id = $request->patient_id;
                    $patientpasthistory->blood_transfusion = $request->blood_transfusion;
                    $patientpasthistory->blood_transfusion_remark = $request->blood_transfusion_remark;
                    $patientpasthistory->surgery = $request->surgery;
                    $patientpasthistory->surgery_remark = $request->surgery_remark;
                    $patientpasthistory->hospitalization = $request->hospitalization;
                    $patientpasthistory->hospitalization_remark = $request->hospitalization_remark;
                    $patientpasthistory->save();

            $response = array(
                "data" => $patientpasthistory,
                "error_code" => 0,
                "message" => 'Health History added.' 
            );
          
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Past History failed.' 
                );
        }
    return response()->json($response);
    }

    public function patientsubscriptionplan(Request $request)
    {
        try{

            $subscription_plan_count = HealthPlan::where('status',1)->count(); 
            $subscription_plan = HealthPlan::where('status',1)->get();
            // dd($subscription_plan);
            $response1 = array();
            $plan_description = array();
            foreach ($subscription_plan as $sp) {    
            
                $plan_description = HealthPlanDescription::select('description')->where('plan_id',$sp->id)->where('status',1)->get()->toArray();
                $one_description = array();
                foreach ($plan_description as $pd) {
                    $one_description[] = $pd['description'];
                }
                $response1[] = array(
                    'plan_id' => $sp['id'],
                    'plan_name' => $sp['plan_name'],
                    'plan_price' => $sp['price'],
                    'ms_physician_consults' => $sp['doctor'],
                    'specialist_doctor_consults' => $sp['appointment'],
                    'one_line_description' => $sp['one_line_description'],
                    'plan_duration' => $sp['duration'],
                    'special_workup' => $sp['special_workup'],
                    'description' => $one_description,
                );
            }


            $response = array(
                "data" => $response1,
                "error_code" => 0,
                "message" => $subscription_plan_count.' Subscription plan avilable' 
            );
          
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'No subscription plan available' 
                );
        }
    return response()->json($response);
    }


    public function deleteallergies(Request $request)
    {
         try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
                    'allergies.required' => 'Allergies is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'allergies' => 'required',
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

            $patient = PatientHealthHistory::select('id','allergies')->where('patient_id',$request->patient_id)->first();
            $all_allergies = explode(',',$patient->allergies);

            $deleteallergies = array_search($request->allergies, $all_allergies);
            unset($all_allergies[$deleteallergies]);

            $newallergies = implode(',', $all_allergies);
            $allergies = PatientHealthHistory::whereId($patient->id)->update([
                    'allergies' => $newallergies,
                    ]);

            $response = array(
                'data' => $newallergies,
                'error_code' => 0,
                'message' => 'Allergies deleted successfully'
            );

         }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Allergies deleted failed' 
                );
        }
        return response()->json($response);   
    }

    public function savepatientsubscriptionplan(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
                    'plan_id.required' => 'Plan id is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'plan_id' => 'required|integer',
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
            
            $patient_plan_check = PatientHealthPlan::where('patient_id',$request->patient_id)->count();
            if($patient_plan_check)
            {
                $patient_plan = PatientHealthPlan::where('patient_id',$request->patient_id)->first();
                $patienthealthplan = PatientHealthPlan::whereId($patient_plan->id)->update([
                    'plan_id' => $request->plan_id,
                    ]);
                
                $response1 = array(
                    'id' => $patient_plan->id,
                    'plan_id' => $request->plan_id,
                    'patient_id' => $request->patient_id,
                    'in_pay' => $patient_plan->in_pay
                );
            }
            else
            {
                $patienthealthplan = new PatientHealthPlan;
                $patienthealthplan->plan_id = $request->plan_id;
                $patienthealthplan->patient_id = $request->patient_id;
                $patienthealthplan->save();

                $response1 = array(
                    'id' => $patienthealthplan->id,
                    'plan_id' => $patienthealthplan->plan_id,
                    'patient_id' => $patienthealthplan->patient_id,
                    'in_pay' => 0
                );
            }

            $response = array(
                "data" => $response1,
                "error_code" => 0,
                "message" => 'Health plan saved successfully'
            );

        }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                        "data" => null,
                        "error_code" => 1,
                        "message" => 'Health plan saved failed' 
                    );
        }
        return response()->json($response);     
    }


    public function purchasedpatienthealthsubscriptionplan(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
                    'plan_id.required' => 'Plan id is required.',
                    'in_pay.required' => 'In pay is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'plan_id' => 'required|integer',
                            'in_pay' => 'required|integer',
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
            
            $today = date('d/m/Y');
            $patient_plan = PatientHealthPlan::where('patient_id',$request->patient_id)->first();
            $patienthealthplan = PatientHealthPlan::whereId($patient_plan->id)->update([
                'in_pay' => $request->in_pay,
                'payment_date' => $today,
                ]);
            
            $response1 = array(
                'id' => $patient_plan->id,
                'plan_id' => $request->plan_id,
                'patient_id' => $request->patient_id,
                'in_pay' => $request->in_pay
            );
            
            $response = array(
                "data" => $response1,
                "error_code" => 0,
                "message" => 'Health plan purchased successfully'
            );

        }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                        "data" => null,
                        "error_code" => 1,
                        "message" => 'Health plan purchased failed' 
                    );
        }
        return response()->json($response);     
    }


    public function deletefamilycontact(Request $request)
    {
         try{

            $messages = [
                    'required' => ':attribute is required.',
                    'contact_id.required' => 'Contact Id is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'contact_id' => 'required|integer',
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

            $patient = PatientFamilyContact::where('id',$request->contact_id)->delete();

            $response = array(
                'data' => $patient,
                'error_code' => 0,
                'message' => 'Family contact deleted successfully'
            );

         }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Family contact deleted failed' 
                );
        }
        return response()->json($response);   
    }

    public function addpatientwallete(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
                    'credit_amount.required' => 'Credit amount is required.',
                    'debit_amount.required' => 'Debit amount is required.',
                    'amount_description.required' => 'Amount description is required.',
                    'payment_id.required' => 'Payment id is required.',
                    'in_wallet.required' => 'In wallet is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'credit_amount' => 'required',
                            'debit_amount' => 'required',
                            'amount_description' => 'required',
                            'payment_id' => 'required',
                            'in_wallet' => 'required|integer',
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

                if(PatientWalletDetail::where('patient_id',$request->patient_id)->count() > 0)
                {
                    $wallet = PatientWalletDetail::where('patient_id',$request->patient_id)->orderby('id','Desc')->first();
                    if($request->credit_amount > 0 && $request->debit_amount > 0)
                    {
                        $balance = $wallet->total_amount + $request->credit_amount - $request->debit_amount;
                    }
                    elseif($request->credit_amount > 0)
                    {
                        $balance = $wallet->total_amount + $request->credit_amount;
                    }
                    elseif($request->debit_amount > 0)
                    {
                        $balance = $wallet->total_amount - $request->debit_amount;
                    }
                }
                else
                {

                    $balance1 = 0;

                    if($request->credit_amount > 0 && $request->debit_amount > 0)
                    {
                        $balance = $balance1 + $request->credit_amount - $request->debit_amount;
                    }
                    elseif($request->credit_amount > 0)
                    {
                        $balance = $balance1 + $request->credit_amount;
                    }
                    elseif($request->debit_amount > 0)
                    {
                        $balance = $balance1 - $request->debit_amount;
                    }
                }
                
                $patientwallet = new PatientWalletDetail;
                $patientwallet->patient_id = $request->patient_id;
                $patientwallet->credit_amount = $request->credit_amount;
                $patientwallet->debit_amount = $request->debit_amount;
                $patientwallet->total_amount = $balance;
                $patientwallet->amount_description = $request->amount_description;
                $patientwallet->in_wallet = $request->in_wallet;
                $patientwallet->payment_id = $request->payment_id;
                $patientwallet->save();

                $response_data = array(
                    'id' => $patientwallet->id,
                    'patient' => $request->patient,
                    'credit_amount' => $request->credit_amount,
                    'debit_amount' => $request->debit_amount,
                    'total_amount' => $balance,
                    'amount_description' => $request->amount_description,
                    'in_wallet' => $request->in_wallet,
                    'payment_id' => $request->payment_id
                );


                //Notification & response msg 
                    $datetime = date('d-m-Y h:i A');
                    if($request->credit_amount > 0 && $request->debit_amount > 0)
                    {
                        $notification_msg = "You have successfully credited INR ".$request->credit_amount." & debited INR ".$request->debit_amount." in your wallet on ".$datetime.".";
                    }
                    elseif($request->credit_amount > 0)
                    {
                        $notification_msg = "You have successfully credited INR ".$request->credit_amount." in your wallet on ".$datetime.".";
                    }
                    elseif($request->debit_amount > 0)
                    {
                        $notification_msg = "You have successfully debited INR ".$request->debit_amount." in your wallet on ".$datetime.".";
                    }
                //End msg

                $response = array(
                    "data" => $response_data,
                    "error_code" => 0,
                    "message" => $notification_msg 
                );

                //Notification 
                    
                    $patient_detail = User::select('device_id')->where('id',$request->patient_id)->first();
                    $patient_device_id = $patient_detail->device_id;

                    $msg = array(
                    'body' => $notification_msg,
                    'title' => 'Wallet Money',
                    'icon' => 'myicon',
                    'sound' => 'mySound'
                    );

                    $patient_msg = array('type' => 'Patient');

                    PushNotification::PushAndroidNotificationUser($msg, $patient_msg, [$patient_device_id]);

                    $notification = new AdminNotification;
                    $notification->from_id = $request->patient_id;
                    $notification->to_id = $request->patient_id;
                    $notification->notification_description = $notification_msg;
                    $notification->save();
                
                //End Notification
            
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Patient wallet detail saved failed' 
                );
        }
    return response()->json($response);
    }


    public function getallpriscription(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
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
            
            $priscription_count = PatientPriscription::select('id','medicine_name','dose','freq','route','duration','created_at')->where('patient_id',$request->patient_id)->get()->toArray();

            $response = array(
                "data" => $priscription_count,
                "error_code" => 0,
                "message" => 'Patient priscription available'
            );

        }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                        "data" => null,
                        "error_code" => 1,
                        "message" => 'Patient priscription not found' 
                    );
        }
        return response()->json($response);     
    }



    public function getallvitalsdetail(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
                    'vital_id.required' => 'Vital id is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'vital_id' => 'required|integer',
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
            
            if($request->vital_id == 1)
            {
                $patient_vital_detail = PatientHealthRecordDetail::select('id','patient_id','add_date','blood_pressure_max_value','blood_pressure_min_value')->where('patient_id',$request->patient_id)->get()->toArray();
            }
            elseif($request->vital_id == 2)
            {
                $patient_vital_detail = PatientHealthRecordDetail::select('id','patient_id','add_date','pluse')->where('patient_id',$request->patient_id)->get()->toArray();
            }
            elseif($request->vital_id == 3)
            {
                $patient_vital_detail = PatientHealthRecordDetail::select('id','patient_id','add_date','temperature')->where('patient_id',$request->patient_id)->get()->toArray();
            }
            elseif($request->vital_id == 4)
            {
                $patient_vital_detail = PatientHealthRecordDetail::select('id','patient_id','add_date','oxygen_saturation')->where('patient_id',$request->patient_id)->get()->toArray();
            }
            elseif($request->vital_id == 5)
            {
                $patient_vital_detail = PatientHealthRecordDetail::select('id','patient_id','add_date','breathing_rate')->where('patient_id',$request->patient_id)->get()->toArray();
            }
            elseif($request->vital_id == 6)
            {
                $patient_vital_detail = PatientHealthRecordDetail::select('id','patient_id','add_date','abdominal_circumference')->where('patient_id',$request->patient_id)->get()->toArray();
            }
            elseif($request->vital_id == 7)
            {
                $patient_vital_detail = PatientHealthRecordDetail::select('id','patient_id','add_date','blood_sugar')->where('patient_id',$request->patient_id)->get()->toArray();
            }
            elseif($request->vital_id == 8)
            {
                $patient_vital_detail = PatientHealthRecordDetail::select('id','patient_id','add_date','weight')->where('patient_id',$request->patient_id)->get()->toArray();
            }
            elseif($request->vital_id == 9)
            {
                $patient_vital_detail = PatientHealthRecordDetail::select('id','patient_id','add_date','bmi')->where('patient_id',$request->patient_id)->get()->toArray();
            }

            $response = array(
                "data" => $patient_vital_detail,
                "error_code" => 0,
                "message" => 'Patient vitals available'
            );

        }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                        "data" => null,
                        "error_code" => 1,
                        "message" => 'Patient vitals not found' 
                    );
        }
        return response()->json($response);     
    }


    public function deleteprescription(Request $request)
    {
         try{

            $messages = [
                    'required' => ':attribute is required.',
                    'prescription_id.required' => 'Prescription Id is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'prescription_id' => 'required|integer',
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

            $prescription = PatientPriscription::where('id',$request->prescription_id)->delete();

            $response = array(
                'data' => $prescription,
                'error_code' => 0,
                'message' => 'Prescription deleted successfully'
            );

         }catch (\Illuminate\Database\QueryException $exc) {
            
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Prescription deleted failed' 
                );
        }
        return response()->json($response);   
    }

    public function getalllabdetailsdropdown(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
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
                
            $patient_lab_detail_test_name = DB::table('patient_lab_detail')
                ->select(DB::raw('patient_lab_detail.test_name as id'),'lab_report.test_name')
                ->leftjoin('lab_report','patient_lab_detail.test_name','lab_report.id')
                ->where('patient_lab_detail.patient_id',$request->patient_id)
                ->get()->toArray();

            $response = array(
                "data" => $patient_lab_detail_test_name,
                "error_code" => 0,
                "message" => 'Patient lab details test name available'
            );

        }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                        "data" => null,
                        "error_code" => 1,
                        "message" => 'Patient lab details test name not found' 
                    );
        }
        return response()->json($response);     
    }

    public function getalllabreportdetail(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
                    'test_id.required' => 'Test id is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'test_id' => 'required|integer',
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
                
            $patient_lab_detail = PatientLabDetail::select('id','test_date','value','unit','result')->where('patient_id',$request->patient_id)->where('test_name',$request->test_id)->get()->toArray();

            $response = array(
                "data" => $patient_lab_detail,
                "error_code" => 0,
                "message" => 'Patient lab details available'
            );

        }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                        "data" => null,
                        "error_code" => 1,
                        "message" => 'Patient lab details not found' 
                    );
        }
        return response()->json($response);     
    }


    public function getallpatientproceduredetail(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
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
            
            $patient_procedure = DB::table('patient_procedure')
                        ->select('patient_procedure.id','patient_procedure.procedure_date','patient_procedure.remark','admin_procedure.procedure_name')
                        ->leftjoin('admin_procedure','patient_procedure.procedure_name','admin_procedure.id')
                        ->where('patient_procedure.patient_id',$request->patient_id)
                        ->get()
                        ->toArray();

            $response = array(
                "data" => $patient_procedure,
                "error_code" => 0,
                "message" => 'Patient procedure details available'
            );

        }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                        "data" => null,
                        "error_code" => 1,
                        "message" => 'Patient procedure details not found' 
                    );
        }
        return response()->json($response);     
    }

}
