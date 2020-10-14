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
use Mail;
use App\DoctorDetail;
use App\CoachDetail;
use App\PatientDetail;
use App\AuthorityCouncil;
use App\PatientWalletDetail;
use App\UserLocation;
use App\Role;
use App\HealthTeam;
use App\AdminContact;
use App\PatientDiagnosis;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller {

    public function login(Request $request) {
        try{
            $messages = [
                'required' => ':attribute is required.',
                'phone.required' => 'Contact number is required',
                'device_id.required' => 'Device Id is required',
            ];
            $validator = Validator::make($request->all(), [
                        'phone' => 'required',
                        'device_id' => 'required',
                        'password' => 'required|max:14|min:6'
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

            $admin_count = User::where('contact_number', $request->phone)->count();
                if ($admin_count > 0) {
                $admin_status = User::where('contact_number', $request->phone)->where('status', 1)->count();
                if($admin_status > 0){
                    
                    $admin_count2 = User::where('contact_number', $request->phone)->first();

                    if($admin_count2->role_id != 1){
                        $password1 = Hash::check($request->password, $admin_count2->password);
                        if ($password1 > 0) {

                            $data = User::where('contact_number', $request->phone)->first();
                            
                            $success['token'] = $data->createToken('MyApp')->accessToken;
                            $success['user_id'] = $data->id;
                            $success['role_id'] = $data->role_id;
                            
                            User::whereId($admin_count2->id)->update([
                                'device_id' => $request->device_id,
                                ]);

                            $response = array(
                                    "data" => $success,
                                    "error_code" => 0,
                                    "message" => "Login Success"
                                );
                        } else {
                            $response = array(
                                    "data" => null,
                                    "error_code" => 1,
                                    "message" => "Password is invalid"
                                );
                        }
                    }
                    else
                    {
                       $response = array(
                                    "data" => null,
                                    "error_code" => 1,
                                    "message" => "Account Does not exits"
                                ); 
                    }
                }
                else
                {
                    $response = array(
                                    "data" => null,
                                    "error_code" => 1,
                                    "message" => "Account is inactive"
                                ); 
                }
            } else {
                $response = array(
                            "data" => null,
                            "error_code" => 1,
                            "message" => "Contact number is invalid"
                        );
            }
        }catch (\Illuminate\Database\QueryException $exc) {
        $response = array(
                "data" => null,
                "error_code" => 1,
                "message" => 'Login Failed' 
            );
        } 

        return response()->json($response);
    }

    public function mobileverification(Request $request)
    {
        try{
            $messages = [
                'required' => ':attribute is required.',
                'contact_number.required' => 'Contact number is required',
            ];
            $validator = Validator::make($request->all(), [
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

            $check_user = User::where('contact_number', $request->contact_number)->count();

            if ($check_user > 0) 
            {
                $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Mobile Number is already exist.' 
                );
            }
            else
            {

                $otp = rand(100000,999999);
                $authKey = "222266AkDOqqCSgJKW5b2fb10a";

                //Multiple mobiles numbers separated by comma
                $mobileNumber = $request->contact_number;

                //Sender ID,While using route4 sender id should be 6 characters long.
                $senderId = "Vitalx";

                //Your message to send, Add URL encoding here.
                
                // $msg = "Use this one-time-password to validate your mobile varification: ".$otp;
                $msg = "Verify your mobile number during registration with One Time Passcode(".$otp.")";
                $message = urlencode($msg);

                //Define route 
                $route = "otp";
                //Prepare you post parameters
                $postData = array(
                    'authkey' => $authKey,
                    'mobiles' => $mobileNumber,
                    'message' => $message,
                    'sender' => $senderId,
                    'route' => $route
                );

                //API URL
                $url="https://control.msg91.com/api/sendhttp.php";

                // init the resource
                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $postData
                    //,CURLOPT_FOLLOWLOCATION => true
                ));

                //Ignore SSL certificate verification
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

                //get response
                $output = curl_exec($ch);

                $data = array('otp'=> $otp, 'contact_number' => $request->contact_number); 
                
                $response = array(
                                "data" => $data,
                                "error_code" => 0,
                                "message" => 'Otp Succesfully Send' 
                            );

            }
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Verification Failed' 
                );
        }
    return response()->json($response);
    }

    public function register(Request $request)
    {
        try {

                $messages = [
                    'required' => ':attribute is required.',
                    'fname.required' => 'Firstname is required.',
                    // 'lname.required' => 'Lastname is required',
                    'email.required' => 'Email is required',
                    'contact_number.required' => 'Contact number is required',
                    'role_id.required' => 'Role is required',
                    'device_id.required' => 'Device Id is required',
                ];
                $validator = Validator::make($request->all(), [
                            'fname' => 'required',
                            // 'lname' => 'required',
                            'email' => 'required|email',
                            'contact_number' => 'required',
                            'role_id' => 'required|integer',
                            'device_id' => 'required',
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

                $check_email = User::where('email',$request->email)->count();
                
                if($check_email){
                    $response = array(
                            "data" => null,
                            "error_code" => 1,
                            "message" => 'Email is already exist' 
                        );
                }

                else
                {

                    if($request->role_id == 4)
                    {
                        $messages1 = [
                        'required' => ':attribute is required.',
                        'gender.required' => 'Gender is required.',
                        'city.required' => 'City is required',
                        'dob.required' => 'Date Of Birth is required',
                        'height.required' => 'Height is required',
                        'weight.required' => 'Weight is required',
                        'password.required' => 'Password is required',            
                        ];
                        $validator = Validator::make($request->all(), [
                                    'gender' => 'required',
                                    'city' => 'required|integer',
                                    'dob' => 'required',
                                    'height' => 'required',
                                    'weight' => 'required',
                                    'password' => 'required|max:14|min:6',
                                        ], $messages1);

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

                        $password = app('hash')->make($request->password);
                        $user = new User;
                        $user->fname = $request->fname;
                        $user->lname = $request->lname;
                        $user->email = $request->email;
                        $user->contact_number = $request->contact_number;
                        $user->password = $password;
                        $user->role_id = $request->role_id;
                        $user->verified = 1;
                        $user->device_id = $request->device_id;
                        $user->save();

                        $patient = new PatientDetail;
                        $patient->patient_id = $user->id;
                        $patient->gender = $request->gender;
                        $patient->dob = $request->dob;
                        $patient->marital_status = $request->marital_status;
                        $patient->city = $request->city;
                        $patient->height = $request->height;
                        $patient->weight = $request->weight;
                        $patient->bmi = $request->bmi;
                        $patient->blood_group = $request->blood_group;
                        $patient->save();

                        $response1 = array(
                            'id' => $patient->id,
                            'patient_id' => $user->id,
                            'contact_number' => $request->contact_number,
                            'email' => $request->email,
                            'gender' => $request->gender,
                            'dob' => $request->dob,
                            'marital_status' => $request->marital_status,
                            'city' => $request->city,
                            'height' => $request->height,
                            'weight' => $request->weight,
                            'bmi' => $request->bmi,
                            'blood_group' => $request->blood_group 
                        );

                        $response = array(
                            "data" => $response1,
                            "error_code" => 0,
                            "message" => 'Registration Succesfully' 
                        );

                        $type = "Patient";
                    }
                    elseif($request->role_id == 3)
                    {
                        $messages1 = [
                        'required' => ':attribute is required.',
                        'city.required' => 'City is required',          
                        ];
                        $validator = Validator::make($request->all(), [
                                    'city' => 'required|integer',
                                    ], $messages1);

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

                        $user = new User;
                        $user->fname = $request->fname;
                        $user->lname = $request->lname;
                        $user->email = $request->email;
                        $user->contact_number = $request->contact_number;      
                        $user->role_id = $request->role_id;
                        $user->device_id = $request->device_id;
                        $user->password = '';
                        $user->save();

                        if($request->document != ''){
                            $document1 = $request->document->store('coach/document');
                            // $image1 = str_replace(' ', '+', $request->document);
                            // $image1 = base64_decode($image1);
                            // $document = 'coach/document' . rand(100, 999) . time(). '.png';
                            // $document1 = storage_path('app/' . $document);
                            // file_put_contents($document1, $image1);
                        }
                        else
                        {
                            $document1 = '';
                        }
                        
                        $coach = new CoachDetail;
                        $coach->coach_id = $user->id;
                        $coach->city = $request->city;
                        $coach->qualification = $request->qualification;
                        $coach->registration_number = $request->registration_number;
                        $coach->authority_council_id = $request->authority_council_id;
                        $coach->document = $document1;
                        $coach->save();

                        $response = array(
                            "data" => $coach,
                            "error_code" => 0,
                            "message" => 'Registration Succesfully' 
                        );

                        $type = 'Coach';

                    }
                    elseif($request->role_id == 2)
                    {
                        $messages1 = [
                        'required' => ':attribute is required.',
                        'speciality.required' => 'Speciality is required.',
                        'city.required' => 'City is required',
                        'exp_year.required' => 'Experience is required',
                        'fee_of_consultation.required' => 'Fee per consultation is required',           
                        ];
                        $validator = Validator::make($request->all(), [
                                    'speciality' => 'required',
                                    'city' => 'required|integer',
                                    'exp_year' => 'required',
                                    'fee_of_consultation' => 'required',
    							], $messages1);

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

                        $user = new User;
                        $user->fname = $request->fname;
                        $user->lname = $request->lname;
                        $user->email = $request->email;
                        $user->contact_number = $request->contact_number;
                        $user->role_id = $request->role_id;
                        $user->password = '';
                        $user->device_id = $request->device_id;
                        $user->save();

                        if($request->document != ''){ 
                            $document1 = $request->document->store('doctor/document');
                            // $image1 = str_replace(' ', '+', $request->document);
                            // $image1 = base64_decode($image1);
                            // $document = 'doctor/document' . rand(100, 999) . time(). '.png';
                            // $document1 = storage_path('app/' . $document);
                            // file_put_contents($document1, $image1);
                        }
                        else
                        {
                            $document1 = '';
                        }

                        $doctor = new DoctorDetail;
                        $doctor->doctor_id = $user->id;
                        $doctor->speciality = $request->speciality;
                        $doctor->exp_year = $request->exp_year;
                        $doctor->city = $request->city;
                        $doctor->fee_of_consultation = $request->fee_of_consultation;
                        $doctor->mbbs_registration_number = $request->mbbs_registration_number;
                        $doctor->mbbs_authority_council_name = $request->mbbs_authority_council_name;
                        $doctor->md_ms_dnb_registration_number = $request->md_ms_dnb_registration_number;
                        $doctor->md_ms_dnb_authority_council_name = $request->md_ms_dnb_authority_council_name;
                        $doctor->dm_mch_dnb_registration_number = $request->dm_mch_dnb_registration_number;
                        $doctor->dm_mch_dnb_authority_council_name = $request->dm_mch_dnb_authority_council_name;
                        $doctor->document = $document1;
                        $doctor->save();

                        $response = array(
                            "data" => $doctor,
                            "error_code" => 0,
                            "message" => 'Registration Succesfully' 
                        );

                        $type = 'Doctor';
                    }

                    $data['to_email'] = $request->email;
                    // $data['to_email'] = 'raj.innovius@gmail.com';

                    $para = array('fname' => $request->fname, 'type' => $type);
                    Mail::send('emailTemplate.registration', ['parameter' => $para], function ($m) use($data) {
                                $m->from('vitalx@gmail.com', 'vitalX');
                                $m->to($data['to_email'])->subject('VitalX | New registration for VitalX');
                        });

                }
        } 
        catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Registration Failed' 
                );
        }
    
        return response()->json($response);
    }

    public function userprofile(Request $request)
    {

        try {

                $messages = [
                    'required' => ':attribute is required.',
                    'user_id.required' => 'User Id is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'user_id' => 'required|integer',
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

                $user = User::where('id',$request->user_id)->first();
                $role = $user->role_id;

                $admin_contact = AdminContact::select('contact')->where('status',1)->first();
                if($admin_contact)
                {
                    $admin_contact = $admin_contact->contact;
                }
                else
                {
                    $admin_contact = null;
                }

                if($role == 4)
                {
                    $patient_detail = DB::table('users')
                    ->select('users.id', 'users.fname', 'users.email', 'users.contact_number','users.verified','users.status','users.created_at','patient_detail.gender','patient_detail.marital_status','patient_detail.dob','patient_detail.height','patient_detail.weight','patient_detail.bmi','patient_detail.blood_group','patient_detail.created_at','patient_detail.updated_at','role.role','city.city','patient_health_plan.in_pay','patient_health_plan.plan_id','master_health_plan.plan_name',DB::raw('master_health_plan.created_at as plan_create_date'),DB::raw('master_health_plan.updated_at as plan_update_date'),'patient_detail.profile_pic')
                    ->leftjoin('patient_detail', 'users.id', '=', 'patient_detail.patient_id')
                    ->leftjoin('role', 'users.role_id', '=', 'role.id')
                    ->leftjoin('city', 'patient_detail.city', '=', 'city.id')
                    ->leftjoin('patient_health_plan', 'users.id', '=', 'patient_health_plan.patient_id')
                    ->leftjoin('master_health_plan', 'patient_health_plan.plan_id', '=', 'master_health_plan.id')
                    ->where('users.id', $request->user_id)
                    ->first();

                    $health_team = DB::table('health_team')
                    ->select('users.id', 'users.fname','health_team.coach_id')
                    ->join('users', 'health_team.patient_id', '=', 'users.id')
                    ->where('health_team.patient_id', $request->user_id)
                    ->first();
                    $patient_team = array();
                    if($health_team){
                        $coach_id = @$health_team->coach_id;                        
                        if($coach_id != ''){
                            if(DB::table('users')->select('id', 'fname', 'contact_number')->where('id', $coach_id)->count())
                            {
                                $patient_team[] = DB::table('users')
                                ->select('users.id', 'users.fname', 'users.contact_number','coach_detail.profile_pic')
                                ->leftjoin('coach_detail', 'users.id', '=', 'coach_detail.coach_id')
                                ->where('users.id', $coach_id)
                                ->first();

                            }
                            else
                            {
                                $patient_team = "";
                            }             
                        }                        
                    }
                    
                    // dd($patient_team);
                    $patient_diagnosis = PatientDiagnosis::where('patient_id',$request->user_id)->get()->toArray();

                    $patient_balance = PatientWalletDetail::where('patient_id',$request->user_id)->get()->toArray();
                    foreach ($patient_balance as $b) {
                        @$total_balance = $b['total_amount'];
                    }
                    
                    if(@$total_balance == null)
                    {
                    	$balance = "";
                    }
                    else
                    {
                    	$balance = $total_balance;
                    }
                    
                    if($patient_detail->in_pay == null)
                    {
                    	$in_pay = "";
                    }
                    else
                    {
                    	$in_pay = $patient_detail->in_pay;
                    }

                    if($patient_detail->plan_id == null)
                    {
                        $plan_id = "";
                    }
                    else
                    {
                        $plan_id = $patient_detail->plan_id;
                    }
                    
                    $patient = array(
                        'name' => $patient_detail->fname,
                        'email' => $patient_detail->email,
                        'contact_number' => $patient_detail->contact_number,
                        'gender' => $patient_detail->gender,
                        'marital_status' => $patient_detail->marital_status,
                        'dob' => $patient_detail->dob,
                        'height' => $patient_detail->height,
                        'weight' => $patient_detail->weight,
                        'bmi' => $patient_detail->bmi,
                        'blood_group' => $patient_detail->blood_group,
                        'city' => $patient_detail->city,
                        'health_plan_in_pay' => $in_pay,
                        'health_plan_id' => $plan_id,
                        'health_plan_name' => $patient_detail->plan_name,
                        'total_balance' => @$balance,
                        'profile_pic' => @$patient_detail->profile_pic,
                        'coach_detail' => $patient_team,
                        'admin_contact' => $admin_contact,
                        'patient_diagnosis' => $patient_diagnosis,
                    );

                    $response = array(
                        "data" => $patient,
                        "error_code" => 0,
                        "message" => 'Patient All Detail' 
                    );
                }
                elseif($role == 3)
                {
                    $coach_detail = DB::table('users')
                    ->select('users.id', 'users.fname', 'users.email', 'users.contact_number','users.verified','users.status','users.created_at','coach_detail.qualification','coach_detail.registration_number','coach_detail.profile_pic','coach_detail.document','role.role','city.city',DB::raw('authority_council.name as authority_council_name'))
                    ->leftjoin('coach_detail', 'users.id', '=', 'coach_detail.coach_id')
                    ->leftjoin('role', 'users.role_id', '=', 'role.id')
                    ->leftjoin('city', 'coach_detail.city', '=', 'city.id')
                    ->leftjoin('authority_council', 'coach_detail.authority_council_id', '=', 'authority_council.id')
                    ->where('users.id', $request->user_id)
                    ->first();

                    $coach = array(
                        'name' => $coach_detail->fname,
                        'email' => $coach_detail->email,
                        'contact_number' => $coach_detail->contact_number,
                        'qualification' => $coach_detail->qualification,
                        'registration_number' => $coach_detail->registration_number,
                        'authority_council_name' => $coach_detail->authority_council_name,
                        'profile_pic' => $coach_detail->profile_pic,
                        'document' => $coach_detail->document,
                        'city' => $coach_detail->city,
                        'admin_contact' => $admin_contact,
                    );

                    $response = array(
                        "data" => $coach,
                        "error_code" => 0,
                        "message" => 'Coach All Detail' 
                    );
                }
                elseif($role == 2)
                {
                    $doctor_detail = DB::table('users')
                    ->select('users.id', 'users.fname', 'users.email', 'users.contact_number','users.verified','users.status','users.created_at','doctors.fee_of_consultation','doctors.mbbs_registration_number','doctors.mbbs_authority_council_name','doctors.md_ms_dnb_registration_number','doctors.md_ms_dnb_authority_council_name','doctors.dm_mch_dnb_registration_number','doctors.dm_mch_dnb_authority_council_name','doctors.profile_pic','doctors.document','doctors.available','doctor_speciality.speciality','role.role','city.city','doctors_balance.online_amount','doctors_balance.offline_amount','doctors_balance.total_amount','doctors_bank_detail.beneficiary_name','.doctors_bank_detail.bank_name','doctors_bank_detail.account_number','doctors_bank_detail.ifsc_code')
                    ->leftjoin('doctors', 'users.id', '=', 'doctors.doctor_id')
                    ->leftjoin('doctor_speciality', 'doctors.speciality', '=', 'doctor_speciality.id')
                    ->leftjoin('role', 'users.role_id', '=', 'role.id')
                    ->leftjoin('city', 'doctors.city', '=', 'city.id')
                    ->leftjoin('doctors_balance', 'users.id', '=', 'doctors_balance.doctor_id')
                    ->leftjoin('doctors_bank_detail', 'users.id', '=', 'doctors_bank_detail.doctor_id')
                    ->where('users.id', $request->user_id)
                    ->first();

                    $mbbs_authority_council_name = AuthorityCouncil::where('id',$doctor_detail->mbbs_authority_council_name)->first();
                    $md_ms_dnb_authority_council_name = AuthorityCouncil::where('id',$doctor_detail->md_ms_dnb_authority_council_name)->first();
                    $dm_mch_dnb_authority_council_name = AuthorityCouncil::where('id',$doctor_detail->dm_mch_dnb_authority_council_name)->first();
			
		    
		          if(@$doctor_detail->mbbs_registration_number == null)
                    {
                    	$mbbs_registration_number = "";
                    }
                    else
                    {
                    	$mbbs_registration_number = $doctor_detail->mbbs_registration_number;
                    }
                    
                    if(@$mbbs_authority_council_name->name == null)
                    {
                    	$mbbs_authority_council_name = "";
                    }
                    else
                    {
                    	$mbbs_authority_council_name = $mbbs_authority_council_name->name;
                    }
                    
                    if(@$doctor_detail->md_ms_dnb_registration_number == null)
                    {
                    	$md_ms_registration_number = "";
                    }
                    else
                    {
                    	$md_ms_registration_number = $doctor_detail->md_ms_dnb_registration_number;
                    }
                    
                    if(@$md_ms_dnb_authority_council_name->name == null)
                    {
                    	$md_ms_authority_council_name = "";
                    }
                    else
                    {
                    	$md_ms_authority_council_name = $md_ms_dnb_authority_council_name->name;
                    }
                    
                    if(@$doctor_detail->dm_mch_dnb_registration_number == null)
                    {
                    	$dm_registration_number = "";
                    }
                    else
                    {
                    	$dm_registration_number = $doctor_detail->dm_mch_dnb_registration_number;
                    }
                    
                    if(@$dm_mch_dnb_authority_council_name->name == null)
                    {
                    	$dm_authority_council_name = "";
                    }
                    else
                    {
                    	$dm_authority_council_name = $dm_mch_dnb_authority_council_name->name;
                    }
                
		            if(@$doctor_detail->profile_pic == null)
                    {
                    	$profile = "";
                    }
                    else
                    {
                    	$profile = $doctor_detail->profile_pic;
                    }
                    
                    if(@$doctor_detail->document == null)
                    {
                    	$document = "";
                    }
                    else
                    {
                    	$document = $doctor_detail->document;
                    }
                    
                    if(@$doctor_detail->available == null)
                    {
                    	$available = "";
                    }
                    else
                    {
                    	$available = $doctor_detail->available;
                    }	
                    
                    if(@$doctor_detail->total_amount == null)
                    {
                    	$total_amount = "";
                    }
                    else
                    {
                    	$total_amount = $doctor_detail->total_amount;
                    }
                    
                    if(@$doctor_detail->bank_name == null)
                    {
                    	$bank_detail = "";
                    }
                    else
                    {
                    	$bank_detail = $doctor_detail->bank_name;
                    }
                    
                    if(@$doctor_detail->account_number == null)
                    {
                    	$account_number = "";
                    }
                    else
                    {
                    	$account_number = $doctor_detail->account_number;
                    }
                    
                    if(@$doctor_detail->ifsc_code == null)
                    {
                    	$ifsc_code = "";
                    }
                    else
                    {
                    	$ifsc_code = $doctor_detail->ifsc_code;
                    }
                    
                    if(@$doctor_detail->beneficiary_name == null)
                    {
                    	$beneficiary_name = "";
                    }
                    else
                    {
                    	$beneficiary_name = $doctor_detail->beneficiary_name;
                    }			
			
                    $doctor = array(
                        'name' => $doctor_detail->fname,
                        'email' => $doctor_detail->email,
                        'contact_number' => $doctor_detail->contact_number,
                        'speciality' => $doctor_detail->speciality,
                        'city' => $doctor_detail->city,
                        'fee_per_consultation' => $doctor_detail->fee_of_consultation,
                        'mbbs_registration_number' => $mbbs_registration_number,
                        'mbbs_authority_council_name' => $mbbs_authority_council_name ,
                        'md_ms_dnb_registration_number' => $md_ms_registration_number,
                        'md_ms_dnb_authority_council_name' => $md_ms_authority_council_name,
                        'dm_mch_dnb_registration_number' => $dm_registration_number ,
                        'dm_mch_dnb_authority_council_name' => $dm_authority_council_name,
                        'profile_pic' => $profile,
                        'document' => $document,
                        'available' => $available,
                        'doctor_balance' => $total_amount,
                        'bank_name' => $bank_detail,
                        'bank_account_number' => $account_number,
                        'bank_ifsc_code' => $ifsc_code,
                        'bank_beneficiary_name' => $beneficiary_name,
                        'admin_contact' => $admin_contact,
                    );
                    $response = array(
                        "data" => $doctor,
                        "error_code" => 0,
                        "message" => 'Doctor All Detail' 
                    );
                }
        } 
        catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Profile is not exits' 
                );
        }
    
        return response()->json($response);
    }  

    public function profile_pic(Request $request)
    {

        try {

                $messages = [
                    'required' => ':attribute is required.',
                    'user_id.required' => 'User Id is required.',
                    'profile_pic.required' => 'Profile pic is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'user_id' => 'required|integer',
                            'profile_pic' => 'required',
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

                $user = User::where('id',$request->user_id)->first();
                $role = $user->role_id;

                if($role == 4)
                {
                    $profile_pic1 = $request->profile_pic->store('patient');
                        // $image1 = str_replace(' ', '+', $request->profile_pic);
                        // $image1 = base64_decode($image1);
                        // $profile_pic = 'patient/' . rand(100, 999) . time(). '.png';
                        // $profile_pic1 = storage_path('app/' . $profile_pic);
                        // file_put_contents($profile_pic1, $image1);

                    $patient_detail = PatientDetail::where('patient_id',$request->user_id)->first();
                    $patient = PatientDetail::whereId($patient_detail->id)->update([
                        'profile_pic' => $profile_pic1,
                        ]);

                    $response = array(
                        "data" => $profile_pic1,
                        "error_code" => 0,
                        "message" => 'Profile photo uploaded successfully' 
                    );
                }
                elseif($role == 3)
                {
                    
                    $profile_pic1 = $request->profile_pic->store('coach/profile_pic');

                    // $image1 = str_replace(' ', '+', $request->profile_pic);
                    // $image1 = base64_decode($image1);
                    // $profile_pic = 'coach/profile_pic' . rand(100, 999) . time(). '.png';
                    // $profile_pic1 = storage_path('app/' . $profile_pic);
                    // file_put_contents($profile_pic1, $image1);

                    $coach_detail = CoachDetail::where('coach_id',$request->user_id)->first();
                    $coach = CoachDetail::whereId($coach_detail->id)->update([
                        'profile_pic' => $profile_pic1,
                        ]);
                    $response = array(
                        "data" => $profile_pic1,
                        "error_code" => 0,
                        "message" => 'Profile photo uploaded successfully' 
                    );
                }
                elseif($role == 2)
                {
                    $profile_pic1 = $request->profile_pic->store('doctor/profile_pic');
                    // $image1 = str_replace(' ', '+', $request->profile_pic);
                    // $image1 = base64_decode($image1);
                    // $profile_pic = 'doctor/profile_pic' . rand(100, 999) . time(). '.png';
                    // $profile_pic1 = storage_path('app/' . $profile_pic);
                    // file_put_contents($profile_pic1, $image1);

                    $doctor_detail = DoctorDetail::where('doctor_id',$request->user_id)->first();
                    $doctor = DoctorDetail::whereId($doctor_detail->id)->update([
                        'profile_pic' => $profile_pic1,
                        ]);
                    $response = array(
                        "data" => $profile_pic1,
                        "error_code" => 0,
                        "message" => 'Profile photo uploaded successfully' 
                    );
                }
        } 
        catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Profile photo uploaded failed' 
                );
        }
    
        return response()->json($response);
    }   

    public function forgotpassword(Request $request){
        try {

                $messages = [
                    'required' => ':attribute is required.',
                    'contact_number.required' => 'Contact number is required',
                ];
                $validator = Validator::make($request->all(), [
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
                
                $usercount = User::where('contact_number',$request->contact_number)->count();
                if($usercount)
                {
                    $user_check_verified = User::where('contact_number',$request->contact_number)->where('verified',1)->count();
                    if($user_check_verified)
                    {
                        $user_detail = User::where('contact_number',$request->contact_number)->first();
                        $email = $user_detail->email;
                        $name = $user_detail->fname;
                        if($user_detail->role_id == 2)
                        {
                            $type = 'Doctor';
                        }
                        elseif($user_detail->role_id == 3)
                        {
                            $type = 'Coach';
                        }
                        elseif($user_detail->role_id == 4)
                        {
                            $type = 'Patient';
                        }
  
                        // $email = 'raj.innovius@gmail.com';
                        $data['to_email'] = $email;

                        $number = rand(10000,99999);
                        $stringpassword = substr($email, 0, 7);
                        $password =  $stringpassword.$number;

                        $para = array('fname' => $name, 'password' => $password, 'type' => $type);
                        Mail::send('emailTemplate.forgotpassword', ['parameter' => $para], function ($m) use($data) {
                                    $m->from('vitalx@gmail.com', 'vitalX');
                                    $m->to($data['to_email'])->subject('VitalX | Forgot password for VitalX');
                            });

                        $newpassword = app('hash')->make($password);
                        $patient = User::whereId($user_detail->id)->update([
                            'password' => $newpassword,
                        ]);

                        $response = array(
                            "data" => null,
                            "error_code" => 0,
                            "message" => 'Forgot password successfully' 
                           );
                    }
                    else
                    {
                        $response = array(
                            "data" => null,
                            "error_code" => 1,
                            "message" => 'Your account is not approved from admin side' 
                           );        
                    }
                }
                else
                {
                       $response = array(
                            "data" => null,
                            "error_code" => 1,
                            "message" => 'Contact number is invalid' 
                           ); 
                }

        } catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Mail sending failed' 
                );
        }
    
    return response()->json($response);

    }

    public function changepassword(Request $request){
        try {
                $messages = [
                    'required' => ':attribute is required.',
                    'user_id.required' => 'User id is required',
                    'old_password.required' => 'Old password is required',
                    'new_password.required' => 'New password is required',
                ];
                $validator = Validator::make($request->all(), [
                            'user_id' => 'required|integer',
                            'old_password' => 'required|max:14|min:6',
                            'new_password' => 'required|max:14|min:6',
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

            $userdetail = User::select('password')->where('id',$request->user_id)->first();
            $password1 = Hash::check($request->old_password, $userdetail->password);
            if($password1)
            {
                $newpassword = app('hash')->make($request->new_password);
                        $patient = User::whereId($request->user_id)->update([
                            'password' => $newpassword,
                        ]);

                $response = array(
                    "data" => $patient,
                    "error_code" => 0,
                    "message" => 'Password updated successfully' 
                );

            }
            else
            {
                $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Old password is invalid' 
                );
            }
        } catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Password updated failed' 
                );
        }
        return response()->json($response);
    }

    public function logout(Request $request) {
        
        try {

                $messages = [
                    'required' => ':attribute is required.',
                    'device_id.required' => 'Device id is required',
                    'user_id.required' => 'User Id is required',
                ];
                $validator = Validator::make($request->all(), [
                            'device_id' => 'required',
                            'user_id' => 'required|integer',
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

                $userlocation = User::whereId($request->user_id)->update([
                                'device_id' => $request->device_id,
                                ]);

                $response = array(
                            "data" => null,
                            "error_code" => 0,
                            "message" => 'Logout successfully' 
                        );
                } 
                catch (\Illuminate\Database\QueryException $exc) {
                    $response = array(
                            "data" => null,
                            "error_code" => 1,
                            "message" => 'Location Update Failed' 
                        );
                }

        return response()->json($response);
    }

    public function userlocation(Request $request) {
         try {

                $messages = [
                    'required' => ':attribute is required.',
                    'lat.required' => 'Lat is required.',
                    'long.required' => 'Long is required',
                    'user_id.required' => 'User Id is required',
                ];
                $validator = Validator::make($request->all(), [
                            'lat' => 'required',
                            'long' => 'required',
                            'user_id' => 'required|integer',
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

                $check_user_location = UserLocation::where('user_id',$request->user_id)->count();
                if($check_user_location)
                {
                    $userlocation = UserLocation::whereId($request->user_id)->update([
                        'lat' => $request->lat,
                        'long' => $request->long,
                        ]);
                }
                else
                {
                    $userlocation = new UserLocation;
                    $userlocation->user_id = $request->user_id;
                    $userlocation->lat = $request->lat;
                    $userlocation->long = $request->long;
                    $userlocation->save();
                }

            $userlocation = array('user_id'=>$request->user_id,'lat'=>$request->lat,'long'=>$request->long);
            $response = array(
                    "data" => $userlocation,
                    "error_code" => 0,
                    "message" => 'Location Update Successfully' 
                );
        } 
        catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Location Update Failed' 
                );
        }
    
    return response()->json($response);
    }


     public function base64_image_demo(Request $request)
    {

        try {


            $user = User::where('id',$request->user_id)->first();
            $role = $user->role_id;

                    // $profile_pic = $request->profile_pic->store('patient');
            $image1 = str_replace(' ', '+', $request->profile_pic);
            $image1 = base64_decode($image1);
            $profile_pic = 'demo/' . rand(100, 999) . time(). '.png';
            $profile_pic1 = storage_path('app/' . $profile_pic);
            file_put_contents($profile_pic1, $image1);
            $response = array(
                "data" => $profile_pic1,
                "error_code" => 0,
                "message" => 'profile Pic Uploded' 
            );   
        } 
        catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Profile is not exits' 
                );
        }

        return response()->json($response);
    } 


     public function multipart_image_demo(Request $request)
    {

        try {


            $image1 = $request->profile_pic;
            $driving_license = $image1->store('demo');

            $response = array(
                "data" => $driving_license,
                "error_code" => 0,
                "message" => 'profile Pic Uploded' 
            );
               
        } 
        catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Profile is not exits' 
                );
        }

        return response()->json($response);
    } 


}
