<?php

namespace App\Http\Controllers\API;

use App\AdminContact;
use App\AdminNotification;
use App\Advertisement;
use App\AuthorityCouncil;
use App\Callhistory;
use App\Chathistory;
use App\City;
use App\DoctorDetail;
use App\DoctorSpecialitySelect;
use App\Faq;
use App\HealthTeam;
use App\Helpers\Notification\PushNotification;
use App\Http\Controllers\Controller;
use App\LabReportName;
use App\PatientDiagnosis;
use App\PatientLabDetail;
use App\PatientProcedure;
use App\Procedure;
use App\Reminder;
use App\Role;
use App\Speciality;
use App\Unit;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Plivo\RestClient;
use Session;
use Validator;

class ConfigurationController extends Controller {
    
    public function getallcity(Request $request)
    {
        try{
            $city = City::select('id','city')->where('status', 1)->orderBy('city','asc')->get()->toArray();
            $city_count = City::where('status', 1)->count();
            $response = array(
                    "data" => $city,
                    "error_code" => 0,
                    "message" => $city_count .' city available' 
                );

        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'City not found' 
                );
        }
    return response()->json($response);
    }

    public function getallspeciality(Request $request)
    {
        try{
            $speciality = Speciality::where('status', 1)->get()->toArray();
            $speciality_count = Speciality::where('status', 1)->count();
            $response = array(
                    "data" => $speciality,
                    "error_code" => 0,
                    "message" => $speciality_count .' speciality available' 
                );

        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Speciality not found' 
                );
        }
    return response()->json($response);
    }

    public function getallauthoritycouncil(Request $request)
    {
        try{
            $authoritycouncil = AuthorityCouncil::where('status', 1)->get()->toArray();
            $authoritycouncil_count = AuthorityCouncil::where('status', 1)->count();
            $response = array(
                    "data" => $authoritycouncil,
                    "error_code" => 0,
                    "message" => $authoritycouncil_count .' Authority council available' 
                );

        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Authority council not found' 
                );
        }
    return response()->json($response);
    }

    public function getallfaq(Request $request)
    {
        try{

            $general = Faq::select('question','answer')->where('type',1)->where('status',1)->get()->toArray();
            $coach = Faq::select('question','answer')->where('type',2)->where('status',1)->get()->toArray();
            $doctor = Faq::select('question','answer')->where('type',3)->where('status',1)->get()->toArray();
            $account = Faq::select('question','answer')->where('type',4)->where('status',1)->get()->toArray();

            $data = array('general' => $general,'coach' => $coach,'doctor' => $doctor,'account' => $account);

            $response = array(
                    "data" => $data,
                    "error_code" => 0,
                    "message" => 'Faq available' 
                );

        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Faq not found' 
                );
        }
    return response()->json($response);
    }

    public function getallnearbydoctor(Request $request)
    {
        try{  

            $messages = [
                    'required' => ':attribute is required.',
                    'lat.required' => 'Lattitude is required.',
                    'lng.required' => 'Longitude is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'lat' => 'required',
                            'lng' => 'required',
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

                $lat = $request->lat;
                $lng = $request->lng;
                $patient_id=Auth::user()->id;

                $nearby = DB::select("SELECT  `user_id`, (
                    6371 * ACOS( COS( RADIANS(  " . $lat . " ) ) * COS( RADIANS(  `lat` ) ) * COS( RADIANS(  `long` ) - RADIANS( " . $lng . " ) ) + 
                                    SIN( RADIANS(  " . $lat . " ) ) * SIN( RADIANS(  `lat` ) ) )
                                    ) `distance` 
                    FROM  `user_location` 
                    HAVING  `distance` < 2000");
                        
                
                        
                $doctor_detail = array();

                $doctor_detail2 = array();

                foreach ($nearby as $n) {   

                    $doctor = DB::table('users')
                            ->select('users.id','users.fname','users.contact_number','doctors.mbbs_registration_number','doctors.md_ms_dnb_registration_number','doctors.fee_of_consultation','city.city','doctors.exp_year','doctors.profile_pic','doctors.call_payment')
                            ->leftjoin('doctors', 'users.id', '=', 'doctors.doctor_id')
                            ->leftjoin('city', 'doctors.city', '=', 'city.id')
                            ->where('users.id',$n->user_id)
                            ->where('users.role_id',2)
                            ->where('users.status',1)
                            ->where('doctors.available',1)
                            ->where('users.verified',1)
                            ->first();

                            $count=DoctorSpecialitySelect::
                            where('doctor_id','=',isset($doctor->id)?$doctor->id:'')
                            ->get()
                            ->count();

                            if($count != 0){
                                $speciality=DoctorSpecialitySelect::
                                select('doctor_speciality.speciality as speciality')
                                ->leftjoin('doctor_speciality', 'doctor_speciality_select.speciality_id', '=', 'doctor_speciality.id')
                                ->where('doctor_id',$doctor->id)
                                ->get();
                                //dd($speciality);
                                $array=array();
                                foreach ($speciality as $key => $value) {
                                    $array[]=$value->speciality;
                                }
                                $doctor->speciality=implode(',',$array);
                            }else{
                                $doctor->speciality='';
                            }
                    if($doctor){
                         $doctor_2= DB::table('users')
                            ->select('users.id','users.fname','users.contact_number','doctors.mbbs_registration_number','doctors.md_ms_dnb_registration_number','doctors.fee_of_consultation','city.city','doctors.exp_year','doctors.profile_pic','doctors.call_payment','videocall.request_status','videocall.response_status','videocall.call_status','videocall.total_requested_time')
                            //,'doctor_speciality.speciality'
                            ->leftjoin('doctors', 'users.id', '=', 'doctors.doctor_id')
                            //->leftjoin('doctor_speciality', 'doctors.speciality', '=', 'doctor_speciality.id')
                            ->leftjoin('city', 'doctors.city', '=', 'city.id')
                            ->where('users.id',$n->user_id)
                            ->leftjoin('videocall', 'users.id', '=', 'videocall.doctor_id')
                            ->where('videocall.patient_id',$patient_id)
                            ->where('videocall.doctor_id',isset($doctor->id)?$doctor->id:'')
                            ->where('users.role_id',2)
                            ->where('users.status',1)
                            ->where('doctors.available',1)
                            ->where('users.verified',1)
                            ->orderBy('videocall.id','desc')
                            ->first();
                        if($doctor_2)
                        {
                            $doctor_detail[] = $doctor_2;    
                        }   
                        else{
                            $doctor->request_status = "[]";
                            $doctor->response_status= "[]";
                            $doctor->call_status="[]";
                            $doctor_detail[] = $doctor;    
                        } 
                    }


                }

            $response = array(
                'data' => $doctor_detail,  
                'error_code' => 0,
                'message' => 'Doctor found'
            );

    }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Doctor not found' 
                );
        }
    return response()->json($response);
    }


    public function addchathistory(Request $request)
    {
        try{  

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient id is required.',
                    'coach_id.required' => 'Coach id is required.',
                    'last_chat_date.required' => 'Last chat time is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required',
                            'coach_id' => 'required',
                            'last_chat_date' => 'required',
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
                
                $chat_history = Chathistory::select('*')
                    ->where('patient_id',$request->patient_id)
                    ->where('coach_id',$request->coach_id)
                    ->first();
                    
                if($chat_history){
                    $chat_history->last_chat_date = $request->last_chat_date;
                    $chat_history->save();                
                }else{
                    $chat_history = new Chathistory;
                    $chat_history->patient_id = $request->patient_id;
                    $chat_history->coach_id = $request->coach_id;
                    $chat_history->last_chat_date = $request->last_chat_date;
                    $chat_history->save();
                }
                
            $response = array(
                'data' => $chat_history,
                'error_code' => 0,
                'message' => 'Chat history added successfully'
            );

    }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Chat history added failed' 
                );
        }
    return response()->json($response);
    }

    public function getchathistory(Request $request)
    {
        try{  

            $messages = [
                    'required' => ':attribute is required.',
                    'coach_id.required' => 'Coach id is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'coach_id' => 'required',
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
                
               $doctor = DB::table('chat_history')
                            ->select('users.id','users.fname','users.contact_number','chat_history.last_chat_date','patient_detail.profile_pic','patient_detail.dob','patient_detail.gender','city.city')
                            ->leftjoin('patient_detail', 'chat_history.patient_id', '=', 'patient_detail.patient_id')
                            ->leftjoin('users', 'chat_history.patient_id', '=', 'users.id')
                            ->leftjoin('city', 'patient_detail.city', '=', 'city.id')
                            ->where('chat_history.coach_id',$request->coach_id)
                            ->get()->toArray(); 
                
                $response_data = array();
                foreach ($doctor as $d) {
                    
                    $diagnosis_one = PatientDiagnosis::select('diagnosis','year')->where('patient_id',$d->id)->get()->toArray();
                    
                    $response_data[] = array(
                        'patient_id' => $d->id,
                        'patient_name' => $d->fname,
                        'patient_contact_number' => $d->contact_number,
                        'patient_profile_pic' => $d->profile_pic,
                        'patient_age' => $d->dob,
                        'patient_last_chat_time' => $d->last_chat_date,
                        'patient_gender' => $d->gender,
                        'patient_location' => $d->city,
                        'patient_diagnosis' => $diagnosis_one 
                    );
                }



            $response = array(
                'data' => $response_data,
                'error_code' => 0,
                'message' => 'Chat history available'
            );

    }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Chat history not found' 
                );
        }
    return response()->json($response);
    }


    public function getadmincontact(Request $request)
    {
        try{
            $city = AdminContact::select('contact')->where('status', 1)->first();
            
            $response = array(
                    "data" => $city,
                    "error_code" => 0,
                    "message" => 'Contact available' 
                );

        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Contact not found' 
                );
        }
    return response()->json($response);
    }

    public function callpaymentstatus(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'doctor_id.required' => 'Doctor Id is required.',
                    'payment_status.required' => 'Payment status is required.',
                ];
            $validator = Validator::make($request->all(), [
                        'doctor_id' => 'required|integer',
                        'payment_status' => 'required|integer',
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

            $doctor_all_clear = DoctorDetail::where('available',1)->update(['call_payment' => 0]);

            $doctor = DoctorDetail::select('id')->where('doctor_id',$request->doctor_id)->first();
            $doctorcallpayment = DoctorDetail::whereId($doctor->id)->update([
                'call_payment' => $request->payment_status,
                ]);

            $response = array(
                "data" => $doctorcallpayment,
                "error_code" => 0,
                "message" => 'Doctor payment status changed successfully.' 
            );
          
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Doctor payment status changed failed.' 
                );
        }
    return response()->json($response);
    }


    public function addcallhistory(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
                    'doctor_id.required' => 'Doctor Id is required.',
                    'calling_time.required' => 'Calling time is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'doctor_id' => 'required|integer',
                            'calling_time' => 'required',
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

            $call_history = new Callhistory;
            $call_history->patient_id = $request->patient_id;
            $call_history->doctor_id = $request->doctor_id;
            $call_history->calling_time = $request->calling_time;
            $call_history->save();

            $doctor = DoctorDetail::select('id')->where('doctor_id',$request->doctor_id)->first();
            $doctorcallpayment = DoctorDetail::whereId(@$doctor->id)->update([
                'call_payment' => 0,
                ]);

            $response = array(
                "data" => $call_history,
                "error_code" => 0,
                "message" => 'Doctor calling history added successfully.' 
            );


            //Notification
            
            $patient_detail = User::select('fname','device_id')->where('id',$request->patient_id)->first();
            // $coach_detail = User::select('fname','device_id')->where('id',$request->coach_id)->first();
            $doctor_detail = User::select('fname','device_id')->where('id',$request->doctor_id)->first();
            $patient_device_id = $patient_detail->device_id;
            $doctor_device_id = $doctor_detail->device_id;
            
            $datetime = date('d-m-Y h:i a');

            $pmsg = array(
                'body' => 'You have successfully completed video teleconsultation with '.ucfirst(trim($doctor_detail['fname'],' Dr')).' on '.$datetime.'.Please wait for the e-prescription.',
                'title' => 'Completes the video teleconsultation',
                'icon' => 'myicon',
                'sound' => 'mySound'
            );

            $patient_msg = array('message' => 'You have successfully completed video teleconsultation with '.ucfirst(trim($doctor_detail['fname'],' Dr')).' on '.$datetime.'.Please wait for the e-prescription.');

            PushNotification::PushAndroidNotificationUser($pmsg, $patient_msg, [$patient_device_id]);

            $notification = new AdminNotification;
            $notification->from_id = $request->doctor_id;
            $notification->to_id = $request->patient_id;
            $notification->notification_description = 'You have successfully completed video teleconsultation with '.ucfirst(trim($doctor_detail['fname'],' Dr')).' on '.$datetime.'.Please wait for the e-prescription.';   
            $notification->save();

            $dmsg = array(
                'body' => 'Patient '.ucfirst($patient_detail['fname']).' has successfully completed teleconsultation with you on '.$datetime.'.Please write e-prescription and Diagnosis.',
                'title' => 'Completes the video teleconsultation',
                'icon' => 'myicon',
                'sound' => 'mySound'
            );

            $doctor_msg = array('message' => 'Patient '.ucfirst($patient_detail['fname']).' has successfully completed teleconsultation with you on '.$datetime.'.Please write e-prescription and Diagnosis.');
            
            PushNotification::PushAndroidNotificationUser($dmsg, $doctor_msg, [$doctor_device_id]);

            $notification = new AdminNotification;
            $notification->from_id = $request->patient_id;
            $notification->to_id = $request->doctor_id;
            $notification->notification_description = 'Patient '.ucfirst($patient_detail['fname']).' has successfully completed teleconsultation with you on '.$datetime.'.Please write e-prescription and Diagnosis.';   
            $notification->save();

            // dd($coach_msg);
            //End Notification
          
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Doctor calling history added failed.' 
                );
        }
    return response()->json($response);
    }


    public function pastteleconsultantpatientlist(Request $request)
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

            $teleconsultant = DB::table('call_history')
                    ->select(DB::raw('users.id as patient_id'),'users.fname','users.contact_number','call_history.calling_time','call_history.created_at')
                    ->leftjoin('users', 'call_history.patient_id', '=', 'users.id')
                    ->where('call_history.doctor_id',$request->doctor_id)
                    ->get();
                            
            $response = array(
                "data" => $teleconsultant,
                "error_code" => 0,
                "message" => 'Doctor calling history available.' 
            );
          
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Doctor calling history not found.' 
                );
        }
    return response()->json($response);
    }



    public function getallreportname(Request $request)
    {
        try{  

            $report_name = LabReportName::select('id','test_name')->where('status',1)->get()->toArray();

            $response = array(
                'data' => $report_name,
                'error_code' => 0,
                'message' => 'Lab report name available'
            );

    }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Lab report name not found' 
                );
        }
    return response()->json($response);
    }


     public function getallprocedure(Request $request)
    {
        try{  

            $report_name = Procedure::select('id','procedure_name')->where('status',1)->get()->toArray();

            $response = array(
                'data' => $report_name,
                'error_code' => 0,
                'message' => 'Procedure name available'
            );

    }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Procedure name not found' 
                );
        }
    return response()->json($response);
    }



    public function addpatientproceduredetail(Request $request)
    {
         try{

            $messages = [
                    'required' => ':attribute is required.',
                    'coach_id.required' => 'Coach Id is required.',
                    'patient_id.required' => 'Patient Id is required.',
                    'procedure_name.required' => 'Procedure name is required.',
                    'procedure_date.required' => 'Procedure date is required.',
                    'remark.required' => 'Remark is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'coach_id' => 'required|integer',
                            'patient_id' => 'required|integer',
                            'procedure_name' => 'required',
                            'procedure_date' => 'required',
                            'remark' => 'required',
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

            if($request->procedure_name == 0)
            {
                $messages = [
                    'required' => ':attribute is required.',
                    'procedure_admin_name.required' => 'Procedure admin name is required.',
                ];

                $validator = Validator::make($request->all(), [
                            'procedure_admin_name' => 'required',
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

                $procedure = new Procedure;
                $procedure->procedure_name = $request->procedure_admin_name;
                $procedure->save();

                $procedure_name = $procedure->id;
            }
            else
            {
                $procedure_name = $request->procedure_name;
            }

            $patient_procedure = new PatientProcedure;
            $patient_procedure->coach_id = $request->coach_id;
            $patient_procedure->patient_id = $request->patient_id;
            $patient_procedure->procedure_name = $procedure_name;
            $patient_procedure->procedure_date = $request->procedure_date;
            $patient_procedure->remark = $request->remark;
            $patient_procedure->save();

            $response = array(
                "data" => $patient_procedure,
                "error_code" => 0,
                "message" => 'Patient procedure detail added successfully.' 
            );


            //Notification
            
            $patient_detail = User::select('fname','device_id')->where('id',$request->patient_id)->first();
            // $coach_detail = User::select('fname','device_id')->where('id',$request->coach_id)->first();
            $coach_detail = User::select('fname','device_id')->where('id',$request->coach_id)->first();
            $patient_device_id = $patient_detail->device_id;
            
            $datetime = date('d-m-Y h:i a');

            $msg = array(
                'body' => "",
                'title' => 'Add new procedures reports',
                'icon' => 'myicon',
                'sound' => 'mySound'
            );

            $patient_msg = array('type' => 'Patient');

            PushNotification::PushAndroidNotificationUser($msg, $patient_msg, [$patient_device_id]);

            $notification = new AdminNotification;
            $notification->from_id = $request->coach_id;
            $notification->to_id = $request->patient_id;
            $notification->notification_description = 'Your Coach '.ucfirst($coach_detail['fname']).' has added new Procedure Reports to your Records on '.$datetime.'.Kindly check.';   
            $notification->save();

            // dd($coach_msg);
            //End Notification

          
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Patient procedure detail added failed.' 
                );
        }
    return response()->json($response);
    }

    public function addpatientlabreportdetail(Request $request)
    {
         try{

            $messages = [
                    'required' => ':attribute is required.',
                    'coach_id.required' => 'Coach Id is required.',
                    'patient_id.required' => 'Patient Id is required.',
                    'test_name.required' => 'Test name is required.',
                    'test_date.required' => 'Test date is required.',
                    'unit.required' => 'Unit is required.',
                    'value.required' => 'Value is required.',
                    'result.required' => 'Result is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'coach_id' => 'required|integer',
                            'patient_id' => 'required|integer',
                            'test_name' => 'required',
                            'test_date' => 'required',
                            'unit' => 'required',
                            'value' => 'required',
                            'result' => 'required',
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

            if($request->test_name == 0)
            {
                $messages = [
                    'required' => ':attribute is required.',
                    'report_name.required' => 'Report name is required.',
                ];

                $validator = Validator::make($request->all(), [
                            'report_name' => 'required',
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

                $lab_detail = new LabReportName;
                $lab_detail->test_name = $request->report_name;
                $lab_detail->save();

                $test_name = $lab_detail->id;
            }
            else
            {
                $testname=DB::table('lab_report')->where('id','=',$request->test_name)->first();
                $test_name = $testname->test_name;
            }

            $patient_lab_report_detail = new PatientLabDetail;
            $patient_lab_report_detail->coach_id = $request->coach_id;
            $patient_lab_report_detail->patient_id = $request->patient_id;
            $patient_lab_report_detail->test_name = $test_name;
            $patient_lab_report_detail->test_date = $request->test_date;
            $patient_lab_report_detail->unit = $request->unit;
            $patient_lab_report_detail->value = $request->value;
            $patient_lab_report_detail->result = $request->result;
            $patient_lab_report_detail->save();


            //Notification
            
            $patient_team = HealthTeam::select('coach_id')->where('patient_id',$request->patient_id)->first();

            $patient_detail = User::select('fname','device_id')->where('id',$request->patient_id)->first();
            $coach_detail = User::select('fname')->where('id',$request->coach_id)->first();
            $device_id = $patient_detail->device_id;
            $datetime = date('d-m-Y h:i a');

            $msg = array(
                'body' => '',
                'title' => 'Add lab report',
                'icon' => 'myicon',
                'sound' => 'mySound'
            );

            $patient_msg = array('type' => 'Patient');

            PushNotification::PushAndroidNotificationUser($msg, $patient_msg, [$device_id]);

            $notification = new AdminNotification;
            $notification->from_id = $request->coach_id;
            $notification->to_id = $request->patient_id;
            $notification->notification_description = 'Your Coach '.ucfirst($coach_detail['fname']).' has added new Lab Reports to your Records on '.$datetime.' Kindly check';   
            $notification->save();

            $response = array(
                "data" => $patient_lab_report_detail,
                "error_code" => 0,
                "message" => 'Patient lab detail added successfully.' 
            );
          
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Patient lab detail added failed.' 
                );
        }
    return response()->json($response);
    }


    public function getallunit(Request $request)
    {
        try{  

            $unit = Unit::select('id','unit')->where('status',1)->get()->toArray();

            $response = array(
                'data' => $unit,
                'error_code' => 0,
                'message' => 'Unit available'
            );

    }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => null,
                    "error_code" => 1,
                    "message" => 'Unit not found' 
                );
        }
    return response()->json($response);
    }


    public function getallreminder(Request $request)
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
            
            $today = date('d/m/Y');

            $no_of_reminder = Reminder::where('patient_id',$request->patient_id)->where('reminder_date', '>=', $today)->count();
            
            $all_reminder = DB::table('reminder')
                            ->select('reminder.id','reminder.reminder_text','reminder.reminder_date','reminder.reminder_time',DB::raw('users.fname as coach_name'))
                            ->leftjoin('users','reminder.coach_id','users.id')
                            ->where('patient_id',$request->patient_id)
                            ->where('reminder_date', '>=' , $today)
                            ->orderby('reminder_date','asc')
                            ->get()
                            ->toArray();

            $response = array(
                'data' => $all_reminder,
                'error_code' => 0,
                'message' => $no_of_reminder.' Reminders available'
            );

        }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                        "data" => null,
                        "error_code" => 1,
                        "message" => 'Reminder not found' 
                    );
            }
    return response()->json($response);
    }


    public function getallreminderforcoach(Request $request)
    {
        try{ 

            $messages = [
                    'required' => ':attribute is required.',
                    'coach_id.required' => 'Coach Id is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'coach_id' => 'required|integer',
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

            $no_of_reminder = Reminder::where('coach_id',$request->coach_id)->where('reminder_date', '>=', $today)->count();
            
            $all_reminder = DB::table('reminder')
                            ->select('reminder.id','reminder.reminder_text','reminder.reminder_date','reminder.reminder_time',DB::raw('users.fname as patient_name'))
                            ->leftjoin('users','reminder.coach_id','users.id')
                            ->where('coach_id',$request->coach_id)
                            ->where('reminder_date', '>=' , $today)
                            ->orderby('id','desc')
                            ->get()
                            ->toArray();

            $response = array(
                'data' => $all_reminder,
                'error_code' => 0,
                'message' => $no_of_reminder.' Reminders available'
            );

        }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                        "data" => null,
                        "error_code" => 1,
                        "message" => 'Reminder not found' 
                    );
            }
    return response()->json($response);
    }



    public function getallnotification(Request $request)
    {
        try{ 

            $messages = [
                    'required' => ':attribute is required.',
                    'user_id.required' => 'Patient Id is required.',
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
    
            $no_of_notification = AdminNotification::where('to_id',$request->user_id)->count();
            
            $all_notification = DB::table('notification')
                            ->select(DB::raw('notification.id as notification_id'),'notification.notification_description','notification.status','notification.created_at',DB::raw('users.fname as from_notification_name'))
                            ->leftjoin('users','notification.from_id','users.id')
                            ->where('to_id',$request->user_id)
                            ->orderby('notification.id','desc')
                            ->get()
                            ->toArray();

            $response = array(
                'data' => $all_notification,
                'error_code' => 0,
                'message' => $no_of_notification.' notification available'
            );

        }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                        "data" => null,
                        "error_code" => 1,
                        "message" => 'Notification not found' 
                    );
            }
    return response()->json($response);
    }



    public function demo_notification(Request $request)
    {
        
        $device_id = "d9s5nGmuklI:APA91bHIcovNUmnvhQrNdKgBtjYDamMj0Mm8-6BqGP2Mszol4LmwHI127zJdz3gzVAPuziTd2JnjyY1_waF7C2ppqDDT4USzfJ-22vVYqtU_vJtMZby5VZGLeFHxJoXSg3E-1ZsZKzMT1ZvuXa4ysfEwdjRtFTPbGQ";

        $msg = array(
            'body' => "Test Notifiction",
            'title' => 'Test',
            'icon' => 'myicon',
            'sound' => 'mySound'
        );
        $notificationdata = array('message' => 'Hello');
        PushNotification::PushAndroidNotificationUser($msg, $notificationdata, [$device_id]);
        
    }

    public function get_advertsiment(Request $request)
    {
        $advertisement=Advertisement::where('status',1)->get();

        return response()->json(['Advertisement'=>$advertisement]);
    }

    public function deletenotification(Request $request)
    {
        $id=request('id');

        $notification=AdminNotification::where('id',$id)->delete();

        return response()->json(['message'=>'Deleted Successfully']);
    }


}
