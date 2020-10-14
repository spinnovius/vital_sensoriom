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
use App\PatientWalletDetail;
use App\PatientHopi;
use App\PatientGeneralExamination;
use App\Procedure;
use App\Reminder;
use App\Role;
use App\Speciality;
use App\Unit;
use App\User;
use App\PatientDetail;
use App\DoctorBalance;
use Auth;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Plivo\RestClient;
use Session;
use Validator;
use PDF;
use App\PatientPriscription;
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

                foreach ($nearby as $key => $n) {   

                    $doctor = DB::table('users')
                            ->select('users.id','users.fname','users.contact_number','doctors.mbbs_registration_number','doctors.md_ms_dnb_registration_number','doctors.fee_of_consultation','city.city','doctors.exp_year','doctors.profile_pic','doctors.call_payment','speciality')
                            ->leftjoin('doctors', 'users.id', '=', 'doctors.doctor_id')
                            ->leftjoin('city', 'doctors.city', '=', 'city.id')
                            ->where('users.id',$n->user_id)
                            ->where('users.role_id',2)
                            ->where('users.status',1)
                            ->where('doctors.available',1)
                            ->where('users.verified',1)
                            ->first();
                            
                    if(isset($doctor)) 
                    {

                        $doctor_details=DoctorSpecialitySelect::
                        select('doctor_speciality_select.speciality_id as idname',\DB::raw('GROUP_CONCAT(doctor_speciality.speciality) as sp'))
                         ->leftjoin('doctor_speciality', 'doctor_speciality_select.speciality_id', '=', 'doctor_speciality.id')
                         ->where('doctor_speciality_select.doctor_id',isset($doctor->id)?$doctor->id:'')
                        ->groupBy('doctor_speciality_select.doctor_id')
                        ->orderby('idname','ASC')
                        ->get();
                        $newarray=[];
                        foreach ($doctor_details as  $value) {
                            $newarray[]=$value->sp;

                        }
                        $newarrays=implode(',',$newarray );
                        //$doctor->speciality=$newarray;
                        $doctor->speciality =$newarrays;
                        
                    } 


                       
                        


                            
                
                            // $count=DoctorSpecialitySelect::
                            // where('doctor_id','=',isset($doctor->id)?$doctor->id:'')
                            // ->get()
                            // ->count();

                            // if($count != 0){
                            //     $speciality=DoctorSpecialitySelect::
                            //     select('doctor_speciality.speciality as speciality')
                            //     ->leftjoin('doctor_speciality', 'doctor_speciality_select.speciality_id', '=', 'doctor_speciality.id')
                            //     ->where('doctor_speciality_select.doctor_id',$doctor->id)
                            //     ->get();
                             
                            //     $array=array();
                            //     foreach ($speciality as $key => $value) {
                            //         $array[]=$value->speciality;
                            //     }
                            //     //$array=implode(',',$array);
                            //     if(isset($array))
                            //     {
                            //         $doctor->speciality=implode(',',$array);
                            //     }
                            //     else
                            //     {
                            //         $doctor->speciality='';
                            //     }
                            // }else{
                            //     //$doctor->speciality=(object)[];
                            // }
                    if($doctor){
                         $doctor_2= DB::table('users')
                            ->select('users.id','users.fname','users.contact_number','doctors.mbbs_registration_number','doctors.md_ms_dnb_registration_number','doctors.fee_of_consultation','city.city','doctors.exp_year','doctors.profile_pic','doctors.call_payment','videocall.request_status','videocall.response_status','videocall.call_status','videocall.total_requested_time','speciality')
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

                            
                            
                            $doctor_2->speciality =$newarrays; 
                            $doctor_detail[] = $doctor_2; 

                        }   
                        else{
                            
                            $doctor->request_status = "[]";
                            $doctor->response_status= "[]";
                            $doctor->call_status="[]";
                            $doctor->speciality =$newarrays;
                            $doctor_detail[] = $doctor;    
                            
                        } 
                    }
                    //$doctor_detail[]=isset($array)?$array:(object)[];
                }
                $firstarray=[];
                $twoarray=[];
                $thirdrray=[];
                $finalarray=[];

                foreach($doctor_detail as $value)
                {
                    $is_patient = DB::table('videocall')
                    ->where('videocall.patient_id',$patient_id)
                    ->where('videocall.doctor_id',$value->id)
                    ->latest()->first();
                    
                    if($is_patient)
                    {
                        if($is_patient->request_status==1 && $is_patient->response_status==1 && $is_patient->call_status==1)
                        {
                            $is_patient="1";
                        }
                        elseif($is_patient->request_status==0 && $is_patient->response_status==1 && $is_patient->call_status==1)
                        {
                            $is_patient="1";
                        }
                        elseif($is_patient->request_status==1 && $is_patient->response_status==0 && $is_patient->call_status==0)
                        {
                            $is_patient="1";    
                        }
                        elseif($is_patient->request_status==1 && $is_patient->response_status==1 && $is_patient->call_status==0)
                        {
                            $is_patient="1";    
                        }
                        else
                        {
                            $is_patient="0";
                        }
                    }
                    else
                    {
                        $is_patient="0";
                    }
                    
                    if($value->request_status==1 && $value->response_status==1 && $value->call_status==1)
                    {
                        $firstarray[]=array(
                            'id'=>$value->id,
                            'fname'=>$value->fname,
                            'contact_number'=>$value->contact_number,
                            'mbbs_registration_number'=>$value->mbbs_registration_number,
                            'md_ms_dnb_registration_number'=>$value->md_ms_dnb_registration_number,
                            'fee_of_consultation'=>$value->fee_of_consultation,
                            'city'=>$value->city,
                            'exp_year'=>$value->exp_year,
                            'profile_pic'=>$value->profile_pic,
                            'call_payment'=>$value->call_payment,
                            'request_status'=>$value->request_status,
                            'response_status'=>$value->response_status,
                            'call_status'=>$value->call_status,
                            //'total_requested_time'=>$value->total_requested_time,
                            //'idname'=>$value->idname,
                            'speciality'=>$value->speciality,
                            'is_patient'=>$is_patient
                        );
                        
                    }
                    elseif($value->request_status==0 && $value->response_status==0 && $value->call_status==0)
                    {
                        $twoarray[]=array(
                            'id'=>$value->id,
                            'fname'=>$value->fname,
                            'contact_number'=>$value->contact_number,
                            'mbbs_registration_number'=>$value->mbbs_registration_number,
                            'md_ms_dnb_registration_number'=>$value->md_ms_dnb_registration_number,
                            'fee_of_consultation'=>$value->fee_of_consultation,
                            'city'=>$value->city,
                            'exp_year'=>$value->exp_year,
                            'profile_pic'=>$value->profile_pic,
                            'call_payment'=>$value->call_payment,
                            'request_status'=>$value->request_status,
                            'response_status'=>$value->response_status,
                            'call_status'=>$value->call_status,
                            //'total_requested_time'=>$value->total_requested_time,
                            //'idname'=>$value->idname,
                            'speciality'=>$value->speciality,
                            'is_patient'=>$is_patient
                        );
                    }
                    else
                    {
                        $thirdrray[]=array(
                            'id'=>$value->id,
                            'fname'=>$value->fname,
                            'contact_number'=>$value->contact_number,
                            'mbbs_registration_number'=>$value->mbbs_registration_number,
                            'md_ms_dnb_registration_number'=>$value->md_ms_dnb_registration_number,
                            'fee_of_consultation'=>$value->fee_of_consultation,
                            'city'=>$value->city,
                            'exp_year'=>$value->exp_year,
                            'profile_pic'=>$value->profile_pic,
                            'call_payment'=>$value->call_payment,
                            'request_status'=>$value->request_status,
                            'response_status'=>$value->response_status,
                            'call_status'=>$value->call_status,
                           // 'total_requested_time'=>$value->total_requested_time,
                           // 'idname'=>$value->idname,
                            'speciality'=>$value->speciality,
                            'is_patient'=>$is_patient
                        );
                    }
                }

            $finalarray=array_merge($firstarray,$twoarray,$thirdrray);
            $response = array(
                'data' => $finalarray,  
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
    
    public function newgetallnearbydoctor(Request $request)
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

                foreach ($nearby as $key => $n) {   

                    $doctor = DB::table('users')
                            ->select('users.id','users.fname','users.contact_number','doctors.mbbs_registration_number','doctors.md_ms_dnb_registration_number','doctors.fee_of_consultation','city.city','doctors.exp_year','doctors.profile_pic','doctors.call_payment','speciality')
                            ->leftjoin('doctors', 'users.id', '=', 'doctors.doctor_id')
                            ->leftjoin('city', 'doctors.city', '=', 'city.id')
                            ->where('users.id',$n->user_id)
                            ->where('users.role_id',2)
                            ->where('users.status',1)
                            ->where('doctors.available',1)
                            ->where('users.verified',1)
                            ->first();
                            
                    if(isset($doctor)) 
                    {

                        $doctor_details=DoctorSpecialitySelect::
                        select('doctor_speciality_select.speciality_id as idname',\DB::raw('GROUP_CONCAT(doctor_speciality.speciality) as sp'))
                         ->leftjoin('doctor_speciality', 'doctor_speciality_select.speciality_id', '=', 'doctor_speciality.id')
                         ->where('doctor_speciality_select.doctor_id',isset($doctor->id)?$doctor->id:'')
                        ->groupBy('doctor_speciality_select.doctor_id')
                        ->orderby('idname','ASC')
                        ->get();
                        $newarray=[];
                        foreach ($doctor_details as  $value) {
                            $newarray[]=$value->sp;

                        }
                        $newarrays=implode(',',$newarray );
                        //$doctor->speciality=$newarray;
                        $doctor->speciality =$newarrays;
                        
                    } 


                       
                        


                            
                
                            // $count=DoctorSpecialitySelect::
                            // where('doctor_id','=',isset($doctor->id)?$doctor->id:'')
                            // ->get()
                            // ->count();

                            // if($count != 0){
                            //     $speciality=DoctorSpecialitySelect::
                            //     select('doctor_speciality.speciality as speciality')
                            //     ->leftjoin('doctor_speciality', 'doctor_speciality_select.speciality_id', '=', 'doctor_speciality.id')
                            //     ->where('doctor_speciality_select.doctor_id',$doctor->id)
                            //     ->get();
                             
                            //     $array=array();
                            //     foreach ($speciality as $key => $value) {
                            //         $array[]=$value->speciality;
                            //     }
                            //     //$array=implode(',',$array);
                            //     if(isset($array))
                            //     {
                            //         $doctor->speciality=implode(',',$array);
                            //     }
                            //     else
                            //     {
                            //         $doctor->speciality='';
                            //     }
                            // }else{
                            //     //$doctor->speciality=(object)[];
                            // }
                    if($doctor){
                         $doctor_2= DB::table('users')
                            ->select('users.id','users.fname','users.contact_number','doctors.mbbs_registration_number','doctors.md_ms_dnb_registration_number','doctors.fee_of_consultation','city.city','doctors.exp_year','doctors.profile_pic','doctors.call_payment','videocall.request_status','videocall.response_status','videocall.call_status','videocall.total_requested_time','speciality')
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

                            
                            
                            $doctor_2->speciality =$newarrays; 
                            $doctor_detail[] = $doctor_2; 

                        }   
                        else{
                            
                            $doctor->request_status = "[]";
                            $doctor->response_status= "[]";
                            $doctor->call_status="[]";
                            $doctor->speciality =$newarrays;
                            $doctor_detail[] = $doctor;    
                            
                        } 
                    }
                    //$doctor_detail[]=isset($array)?$array:(object)[];
                }
                
                $firstarray=[];
                $twoarray=[];
                $thirdrray=[];
                $finalarray=[];

                foreach($doctor_detail as $value)
                {
                    if($value->request_status==1 && $value->response_status==1 && $value->call_status==1)
                    {
                        $firstarray[]=array(
                            'id'=>$value->id,
                            'fname'=>$value->fname,
                            'contact_number'=>$value->contact_number,
                            'mbbs_registration_number'=>$value->mbbs_registration_number,
                            'md_ms_dnb_registration_number'=>$value->md_ms_dnb_registration_number,
                            'fee_of_consultation'=>$value->fee_of_consultation,
                            'city'=>$value->city,
                            'exp_year'=>$value->exp_year,
                            'profile_pic'=>$value->profile_pic,
                            'call_payment'=>$value->call_payment,
                            'request_status'=>$value->request_status,
                            'response_status'=>$value->response_status,
                            'call_status'=>$value->call_status,
                            //'total_requested_time'=>$value->total_requested_time,
                            //'idname'=>$value->idname,
                            'speciality'=>$value->speciality
                        );
                        
                    }
                    elseif($value->request_status==0 && $value->response_status==0 && $value->call_status==0)
                    {
                        $twoarray[]=array(
                            'id'=>$value->id,
                            'fname'=>$value->fname,
                            'contact_number'=>$value->contact_number,
                            'mbbs_registration_number'=>$value->mbbs_registration_number,
                            'md_ms_dnb_registration_number'=>$value->md_ms_dnb_registration_number,
                            'fee_of_consultation'=>$value->fee_of_consultation,
                            'city'=>$value->city,
                            'exp_year'=>$value->exp_year,
                            'profile_pic'=>$value->profile_pic,
                            'call_payment'=>$value->call_payment,
                            'request_status'=>$value->request_status,
                            'response_status'=>$value->response_status,
                            'call_status'=>$value->call_status,
                            //'total_requested_time'=>$value->total_requested_time,
                            //'idname'=>$value->idname,
                            'speciality'=>$value->speciality
                        );
                    }
                    else
                    {
                        $thirdrray[]=array(
                            'id'=>$value->id,
                            'fname'=>$value->fname,
                            'contact_number'=>$value->contact_number,
                            'mbbs_registration_number'=>$value->mbbs_registration_number,
                            'md_ms_dnb_registration_number'=>$value->md_ms_dnb_registration_number,
                            'fee_of_consultation'=>$value->fee_of_consultation,
                            'city'=>$value->city,
                            'exp_year'=>$value->exp_year,
                            'profile_pic'=>$value->profile_pic,
                            'call_payment'=>$value->call_payment,
                            'request_status'=>$value->request_status,
                            'response_status'=>$value->response_status,
                            'call_status'=>$value->call_status,
                           // 'total_requested_time'=>$value->total_requested_time,
                           // 'idname'=>$value->idname,
                            'speciality'=>$value->speciality
                        );
                    }
                }

            $finalarray=array_merge($firstarray,$twoarray,$thirdrray);
            //dd($doctor_detail);
            $response = array(
                'data' => $finalarray,  
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
                    //'unit.required' => 'Unit is required.',
                    'value.required' => 'Value is required.',
                    //'result.required' => 'Result is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'coach_id' => 'required|integer',
                            'patient_id' => 'required|integer',
                            'test_name' => 'required',
                            'test_date' => 'required',
                            //'unit' => 'required',
                            'value' => 'required',
                            //'result' => 'required',
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
                //dd($test_name);
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
            $patient_lab_report_detail->test_name = $request->test_name;

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
    
    public function checkwalletstatus(Request $request)
    {
        $patient_id = request('patient_id');

        $doctor_id  = request('doctor_id');    

        $PatientWalletDetail=PatientWalletDetail::where('patient_id',$patient_id)->latest()->first();
        
        //dd($PatientWalletDetail);

        $DoctorDetail=DoctorDetail::where('doctor_id',$doctor_id)->first();
        
        $WalletMoney=isset($PatientWalletDetail)?$PatientWalletDetail->total_amount:'';
        
        $Doctor_fees=isset($DoctorDetail)?$DoctorDetail->fee_of_consultation:'';
        
        if($WalletMoney>=$Doctor_fees)
        {
            
            $is_balance_low=array(
                'user_total_balance'=>$WalletMoney,
                'dr_fees'=>$Doctor_fees,
                'is_balance_low'=>1
            );
                
            $response = array(
                    "data" => $is_balance_low,
                    "error_code" => 1,
                    "message" => 'Successfully' 
            );
        }
        else
        {
            
            $is_balance_low=array(
                'user_total_balance'=>$WalletMoney,
                'dr_fees'=>$Doctor_fees,
                'is_balance_low'=>0
            );
            $response = array(
                    "data" => $is_balance_low,
                    "error_code" => 0,
                    "message" => 'insufficiant balance' 
            );
        }
        
        return response()->json($response);
    }
    
    public function patient_paymentcut(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'patient_id' => 'required',
        'doctor_id' => 'required',
        'completeCallAns' => 'required',
        'refendRequestAns' => 'required',
        'is_patient' => 'required',
        ]);

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
        $patient_id = request('patient_id');
        $doctor_id  = request('doctor_id');
        $completeCallAns=request('completeCallAns');
        $refendRequestAns=request('refendRequestAns');
        
        $callhistory = Callhistory::select('id')
        ->where('patient_id',$patient_id)
        ->where('doctor_id',$doctor_id)
        ->latest()
        ->first();
        //$call_history_id  = request('call_history_id');
        $call_history_id  = $callhistory->id;
        
        $DoctorDetail=DoctorDetail::where('doctor_id',$doctor_id)->first();
        $Doctor_fees=isset($DoctorDetail)?$DoctorDetail->fee_of_consultation:0;
        $users=User::where('id',$doctor_id)->first();
        $patient_name=User::where('id',$patient_id)->first();
        
        $Callhistory = Callhistory::find($call_history_id);
        if($request->refendRequestAns == "yes"){
            $Callhistory->refund_status = 1;
            $Callhistory->refund_amount = $Doctor_fees;
        }else{
            $Callhistory->refund_status = 0;
            $Callhistory->refund_amount = 0;
        }
        if($request->completeCallAns == "yes"){
            $Callhistory->patientans = 1;
        }else{
            $Callhistory->patientans = 0;
        }
        $Callhistory->save();
        
        if($refendRequestAns == 'yes')
        {
            if(isset($users->email))
            {
                $city=City::where('id',$users->city)->first();
                $data['city'] = isset($city)?$city->city:'';                    
            }
            
            $para = array(
                'fname' =>$users->fname,
                'city'=>$data['city'],
                'email'=>$users->email,
                'patient_name'=>$patient_name->fname
            );
            
            $mail = Mail::send('emailTemplate.refundrequest', ['parameter' => $para], function ($m) use($para) {
            $m->from('accounts@sensoriom.com', 'Sensoriom');
            $m->to($para['email'])->subject('Sensoriom | Refund Request');
            $m->cc('accounts@sensoriom.com');
            });
        }
        $response = array(
            "data" => [],
            "error_code" => 1,
            "message" => 'Payment successfully.'
        );
        return response()->json($response);
        
        //$is_patient=request('is_patient');
        /*
        
        $users=User::where('id',$doctor_id)->first();
        
        
        $PatientWalletDetail =PatientWalletDetail::where('patient_id',$patient_id)->latest()->first();
        
        
        if(isset($PatientWalletDetail))
        {
            $total_amount = $PatientWalletDetail->total_amount - $Doctor_fees ;
            $credit_amount = $PatientWalletDetail->credit_amount;
            $debit_amount = $PatientWalletDetail->debit_amount;
            $totalCr_Amount=$PatientWalletDetail->credit_amount-$Doctor_fees;
        }
        
        $DoctorBalance =DoctorBalance::where('doctor_id',$doctor_id)->latest()->first();
        if(isset($DoctorBalance))
        {
            $totaldr_amount = $DoctorBalance->total_amount + $Doctor_fees ;
        
            $creditdr_amount = $DoctorBalance->online_amount;
            
            $debitdr_amount = $DoctorBalance->offline_amount;    
        }

        if($is_patient=='1' && $completeCallAns == 'yes')
        {
            $patientwallet = new PatientWalletDetail;

            $patientwallet->patient_id = $patient_id;
        
            $patientwallet->credit_amount = '0';
            
            $patientwallet->debit_amount = isset($Doctor_fees)?$Doctor_fees:0;
    
            $patientwallet->total_amount = isset($total_amount)?$total_amount:0;
            
            $patientwallet->amount_description ='Pay for teleconsultation.';
    
            $patientwallet->save();

            $response = array(
                    "data" => [],
                    "error_code" => 1,
                    "message" => 'payment successfully' 
            );
            
        }
        elseif($is_patient=='1' && $completeCallAns == 'no')
        {
            $response = array(
                "data" => [],
                "error_code" => 1,
                "message" => 'refund request' 
            );
        }else{
            $response = array(
                "data" => [],
                "error_code" => 1,
                "message" => 'no payment deduct' 
            );
        }
        
        */
        
       
    }

    public function doctor_paymentcut(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'completeCallAns' => 'required',
            'eprescriptionAns' => 'required',
            'emergencyCaseAns' => 'required',
            'is_doctor' => 'required',
        ]);
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
        $patient_id = request('patient_id');
        $doctor_id  = request('doctor_id');
        $completeCallAns=request('completeCallAns');
        $eprescriptionAns=request('eprescriptionAns');
        $emergencyCaseAns=request('emergencyCaseAns');
        $is_doctor=request('is_doctor');
        
        
        $callhistory = Callhistory::select('id')
        ->where('patient_id',$patient_id)
        ->where('doctor_id',$doctor_id)
        ->latest()
        ->first();
        //$call_history_id  = request('call_history_id');
        $call_history_id  = $callhistory->id;
        
        $count = Callhistory::where('id',$request->call_history_id)->count();
        if($count == 0){
            $datacheck = Callhistory::where('patient_id',$patient_id)
            ->where('doctor_id',$doctor_id)
            ->count();
            if($datacheck==0){
                $call_history = new Callhistory;
                $call_history->patient_id = $patient_id;
                $call_history->doctor_id = $doctor_id;
                $call_history->calling_time = "0 Min 0 Sec";
                $call_history->save();    
                $call_history_id = $call_history->id;
            }else{
                $Callhistory = Callhistory::where('patient_id',$patient_id)
                ->where('doctor_id',$doctor_id)
                ->latest()
                ->first();
                $call_history_id = $Callhistory->id;
            }
            
        }else{
            $call_history_id  = request('call_history_id');    
        }
        
        

        $DoctorDetail=DoctorDetail::where('doctor_id',$doctor_id)->first();
        $users=User::where('id',$doctor_id)->first();
        $Doctor_fees=isset($DoctorDetail)?$DoctorDetail->fee_of_consultation:0;
        
        $PatientWalletDetail =PatientWalletDetail::where('patient_id',$patient_id)
        ->latest()
        ->first();
        
        if($request->completeCallAns=="yes"){
            //patient_wallet_detail
            $patientcountentry=PatientWalletDetail::where('call_history_id',$call_history_id)->count();
            if($patientcountentry==0){
                    if($PatientWalletDetail){
                        $PatientTotal = $PatientWalletDetail->total_amount - $Doctor_fees;
                    }else{
                        $response = array(
                        "data" => [],
                        "error_code" => 1,
                        "message" => 'Patient No Money'
                        );
                        return response()->json($response);
                    }
                    $patientwallet = new PatientWalletDetail;
                    $patientwallet->call_history_id = $call_history_id;
                    $patientwallet->patient_id = $patient_id;
                    $patientwallet->credit_amount = 0;
                    $patientwallet->debit_amount = isset($Doctor_fees)?$Doctor_fees:0;
                    $patientwallet->total_amount = $PatientTotal;
                    $patientwallet->amount_description ='Pay for teleconsultation with Dr '.@$users->fname.'.';
                    //pay for teleconsultation with Dr(name)
                    $patientwallet->save();
            }
            //doctors_balance
            $doctorcountentry=DoctorBalance::where('call_history_id',$call_history_id)->count();
            if($doctorcountentry==0){
                $DoctorBalance = DoctorBalance::where('doctor_id',$doctor_id)->latest()->first();
                
                if($DoctorBalance){
                    $DoctorTotal=$DoctorBalance->total_amount + $Doctor_fees;
                }else{
                    $DoctorTotal=$Doctor_fees;
                }
                
                $doctorbalance = new DoctorBalance;
                $doctorbalance->call_history_id = $call_history_id;
                $doctorbalance->patient_id = $patient_id;
                $doctorbalance->doctor_id = $doctor_id;
                $doctorbalance->online_amount = $Doctor_fees;
                $doctorbalance->total_amount = $DoctorTotal;
                $doctorbalance->amount_description = 'Teleconsultation payment; successfully.';
                $doctorbalance->save();
            }
            
            $Callhistory = Callhistory::find($call_history_id);
            $Callhistory->doctorans = 1;
            if($request->emergencyCaseAns=="yes"){
                $Callhistory->emergencycaseans=1;
            }else{
                $Callhistory->emergencycaseans=0;
            }
            $Callhistory->save();
            
            $response = array(
                    "data" => [],
                    "error_code" => 1,
                    "message" => 'payment successfully' 
            );
        }else if ($request->completeCallAns=="no"){
            
            $Callhistory = Callhistory::find($call_history_id);
            $Callhistory->doctorans = 1;
            $Callhistory->refund_status = 0;
            $Callhistory->refund_amount = 0;
            $Callhistory->save();
            
            
            if($Callhistory->patientans == 1){
                $response = array(
                "data" => [],
                "error_code" => 1,
                "message" => 'no payment rare' 
                );
            }else{
                $response = array(
                    "data" => [],
                    "error_code" => 1,
                    "message" => 'no payment deduct' 
                );
            }
            
        }
        
        //eprescription
        if($is_doctor =='1' && $eprescriptionAns=='yes')
        { 
            $date = date('Y-m-d');
            $dr=User::where('id',$doctor_id)->first();
            
            $pt=User::where('id',$patient_id)->first();
            $patient_prescrition=PatientPriscription::where('patient_id',$patient_id)->where('doctor_id',$doctor_id)->whereRaw('DATE(created_at) = ?', [$date])->get();
          //  dd($patient_prescrition);
            $path = 'storage/pp/E-Prescription.pdf';
            $complain=PatientHopi::select('hopi_patient.*','hopi_patient_complain.*')
					->join('hopi_patient_complain', 'hopi_patient.id', '=', 'hopi_patient_complain.hopi_patient_id')
					->where('hopi_patient.patient_id',$patient_id)
					->get();
					
    		$comorbidities=PatientHopi::select('hopi_patient.*','hopi_patient_comorbidities.*')
    					->join('hopi_patient_comorbidities', 'hopi_patient.id', '=', 'hopi_patient_comorbidities.hopi_patient_id')
    					->where('hopi_patient.patient_id',$patient_id)
    					->get();
    					
    		$vitals=DB::table('patient_health_records')
                        ->where('patient_id',$patient_id)
                        ->orderby('created_at','DESC')
                        ->first();
                        
            $examination=PatientGeneralExamination::
            select('patient_general_examination.id as uniqueid','d.fname as doctorname','patient_general_examination.*',\DB::raw("GROUP_CONCAT(general_examination.examination_name) as examinationName"))
            ->join("general_examination",\DB::raw("FIND_IN_SET(general_examination.id,patient_general_examination.examination_id)"),">",\DB::raw("'0'"))
            ->leftjoin('users as d', 'patient_general_examination.doctor_id', '=', 'd.id')
            ->where('patient_general_examination.patient_id','=',$patient_id)
            ->groupBy("patient_general_examination.id")
            ->get();

            $systemexamination=DB::table('system examination')->where('patient_id',$patient_id)->get();
            $investigation=DB::table('investigation')
                    ->where('patient_id',$patient_id)
                ->get();
                
            $ptd=PatientDetail::where('patient_id',$patient_id)->first();
            $pdf = PDF::loadView('admin.eprescription',compact('patient_prescrition','complain','comorbidities','vitals','examination','systemexamination','investigation','pt','patient_id','ptd'))->save($path);
            
            
            $para = array(
                'path' => $path,
                'doctor_name'=>$dr->fname,
                'patient_name'=>$pt->fname,
                'email'=>$pt->email,
                'dr_name'=>$dr->name
                
            );
            $mail = Mail::send('emailTemplate.pdf_epp', ['parameter' => $para], function ($m) use($para) {
                $m->from('hello@sensoriom.com', 'Sensoriom');
                $m->to($para['email'])->subject('E-Prescription');
                $m->attach($para['path']);
            });
                            
        }
        
        return response()->json($response);
        /*
        if(isset($PatientWalletDetail))
        {
            $total_amount = $PatientWalletDetail->total_amount - $Doctor_fees ;
            $credit_amount = $PatientWalletDetail->credit_amount;
            $debit_amount = $PatientWalletDetail->debit_amount;    
        }
        
        $DoctorBalance =DoctorBalance::where('doctor_id',$doctor_id)->latest()->first();
        
        if(isset($DoctorBalance))
        {
            $totaldr_amount = $DoctorBalance->total_amount + $Doctor_fees ;
            $creditdr_amount = $DoctorBalance->online_amount;
            $debitdr_amount = $DoctorBalance->offline_amount;    
        }

        if($is_doctor =='1' && $completeCallAns =='yes' )
        {
            $doctorbalance = new DoctorBalance;
            $doctorbalance->patient_id = $patient_id;
            $doctorbalance->doctor_id = $doctor_id;
            $doctorbalance->online_amount = $Doctor_fees;
            $doctorbalance->total_amount = isset($totaldr_amount)?$totaldr_amount:$Doctor_fees ;
            $doctorbalance->amount_description = 'Teleconsultation payment; successfully.';
            $doctorbalance->save();
            
            $response = array(
                    "data" => [],
                    "error_code" => 1,
                    "message" => 'payment successfully' 
            );
            
        }
        elseif($is_doctor =='1' && $completeCallAns =='no')
        {
            $response = array(
                    "data" => [],
                    "error_code" => 1,
                    "message" => 'no payment rare' 
            );
        }
        else
        {
            $response = array(
                    "data" => [],
                    "error_code" => 1,
                    "message" => 'no payment deduct' 
            );
        }
        */

    }
    
      public function generatepdf()

    {
        $date = date('Y-m-d');
        $patient_id='682';
        $doctor_id='669';
        $dr=User::where('id',$doctor_id)->first();
        $pt=User::where('id',$patient_id)->first();
        $patient_prescrition=PatientPriscription::where('patient_id',$patient_id)->where('doctor_id',$doctor_id)->whereRaw('DATE(created_at) = ?', [$date])->get();
        $ptd=PatientDetail::where('patient_id',$patient_id)->first();
        $path = 'storage/pp/pp.pdf';
        $complain=PatientHopi::select('hopi_patient.*','hopi_patient_complain.*')
					->join('hopi_patient_complain', 'hopi_patient.id', '=', 'hopi_patient_complain.hopi_patient_id')
					->where('hopi_patient.patient_id',$patient_id)
					->get();
		$comorbidities=PatientHopi::select('hopi_patient.*','hopi_patient_comorbidities.*')
					->join('hopi_patient_comorbidities', 'hopi_patient.id', '=', 'hopi_patient_comorbidities.hopi_patient_id')
					->where('hopi_patient.patient_id',$patient_id)
					->get();
		$vitals=DB::table('patient_health_records')
                    ->where('patient_id',$patient_id)
                    ->orderby('created_at','DESC')
                    ->first();
        $examination=PatientGeneralExamination::
        select('patient_general_examination.id as uniqueid','d.fname as doctorname','patient_general_examination.*',\DB::raw("GROUP_CONCAT(general_examination.examination_name) as examinationName"))
        ->join("general_examination",\DB::raw("FIND_IN_SET(general_examination.id,patient_general_examination.examination_id)"),">",\DB::raw("'0'"))
        ->leftjoin('users as d', 'patient_general_examination.doctor_id', '=', 'd.id')
        ->where('patient_general_examination.patient_id','=',$patient_id)
        ->groupBy("patient_general_examination.id")
        ->get();
        $systemexamination=DB::table('system examination')->where('patient_id',$patient_id)->get();
        $investigation=DB::table('investigation')
                ->where('patient_id',$patient_id)
            ->get();
        $pdf = PDF::loadView('admin.eprescription',compact('patient_prescrition','complain','comorbidities','vitals','examination','systemexamination','investigation','pt','patient_id','ptd'))->save($path);

        $para = array(
                'path' => $path,
                'doctor_name'=>$dr->name,
                'patient_name'=>$pt->name
            );
         $mail = Mail::send('emailTemplate.pdf_epp', ['parameter' => $para], function ($m) use($para) {
                                    $m->from('hello@sensoriom.com', 'Sensoriom');
                                    $m->to('shahidpatel.innovius@gmail.com')->subject('E-Prescription');
                                      $m->attach($para['path']);
                            });
                            
    }

}
