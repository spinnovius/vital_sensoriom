<?php

namespace App\Http\Controllers\API;
use App\AdminNotification;
use App\AuthorityCouncil;
use App\City;
use App\CoachDetail;
use App\DoctorBalance;
use App\DoctorDetail;
use App\HealthPlan;
use App\HealthPlanDescription;
use App\HealthProblem;
use App\HealthTeam;
use App\Helpers\Notification\PushNotification;
use App\Hospital;
use App\Http\Controllers\Controller;
use App\LabReportName;
use App\Location;
use App\PatientDetail;
use App\PatientDiagnosis;
use App\PatientFamilyContact;
use App\PatientFamilyHealthHistory;
use App\PatientHealthHistory;
use App\PatientHealthPlan;
use App\PatientHealthRecordDetail;
use App\PatientLabDetail;
use App\PatientPastHealthHistory;
use App\PatientPastHistory;
use App\PatientPriscription;
use App\PatientProcedure;
use App\PatientWalletDetail;
use App\Pharmacylist;
use App\Prescriptionpharmacy;
use App\Procedure;
use App\Questiondoctor;
use App\Reminder;
use App\Role;
use App\User;
use App\Videocall;
use App\DrugName;
use App\Others;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Mail;
use PDF;
use Plivo\RestClient;
use Session;
use Validator;
use Auth;

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

                    "data" => [],

                    "error_code" => 1,

                    "message" => 'No coach available' 

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



            // $messages = [

            //         'required' => ':attribute is required.',

            //         'patient_id.required' => 'Patient id is required.',

            //         'doctor_id.required' => 'Doctor id is required.',

            //         'coach_id.required' => 'Coach id is required.',

            //         'hospital_id.required' => 'Hospital id is required.',

            //     ];

            //     $validator = Validator::make($request->all(), [

            //                 'patient_id' => 'required|integer',

            //                 'doctor_id' => 'required|integer',

            //                 'coach_id' => 'required|integer',

            //                 'hospital_id' => 'required|integer',

            //                     ], $messages);



            //     $errors = $validator->errors();

            //     if ($validator->fails()) {

            //         $response = array(

            //                     "data" => $errors,

            //                     "error_code" => 1,

            //                     "message" => 'Please fill all data' 

            //                 );

            //         return response()->json($response);

            //         exit;

            //     }



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
            
$patient_id=Auth::user()->id;

            $available_doctors = DB::table('doctors')
                    ->select('users.id', 'users.fname', 'users.contact_number','doctors.mbbs_registration_number','doctors.md_ms_dnb_registration_number','doctors.fee_of_consultation','city.city','doctors.exp_year','doctors.profile_pic','doctors.call_payment','videocall.request_status','videocall.response_status','videocall.call_status','videocall.total_requested_time','doctor_speciality_select.speciality_id as idname',\DB::raw('GROUP_CONCAT(doctor_speciality.speciality) as speciality'))
                    ->leftjoin('users', 'doctors.doctor_id', '=', 'users.id')

                    //->leftjoin('doctor_speciality', 'doctors.speciality', '=', 'doctor_speciality.id')
                   
                    ->leftjoin('doctor_speciality_select', 'doctors.doctor_id', '=', 'doctor_speciality_select.doctor_id')
                  //  ->leftjoin('doctor_speciality', 'doctor_speciality_select.speciality_id', '=', 'doctor_speciality.id') 
                    ->leftjoin('doctor_speciality', 'doctors.speciality', '=', 'doctor_speciality.id') 
                    

                    ->leftjoin('city', 'doctors.city', '=', 'city.id')

                    ->leftJoin('videocall', function($query) {
                         $query->on('doctors.doctor_id','=','videocall.doctor_id')
                                ->whereRaw('videocall.id IN (select MAX(a2.id) from videocall as a2 join doctors as u2 on u2.doctor_id = a2.doctor_id group by u2.doctor_id)');
                    })
                    ->where('doctors.available', 1)
                    ->where('doctors.status', 1)
                    ->where('users.verified',1)
                    ->groupBy('doctors.id')
                    ->orderby('videocall.request_status','desc')
                    ->orderby('videocall.response_status','desc')
                    ->orderby('videocall.call_status','desc')
                    ->get();
                    
            if($available_doctor_count)
            {
                
                $firstarray=[];
                $twoarray=[];
                $thirdrray=[];
                $finalarray=[];
                
                foreach($available_doctors as $value)
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
                            'total_requested_time'=>$value->total_requested_time,
                            'idname'=>$value->idname,
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
                            'total_requested_time'=>$value->total_requested_time,
                            'idname'=>$value->idname,
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
                            'total_requested_time'=>$value->total_requested_time,
                            'idname'=>$value->idname,
                            'speciality'=>$value->speciality,
                            'is_patient'=>$is_patient
                        );
                    }
                     
                }
                $finalarray=array_merge($firstarray,$twoarray,$thirdrray);
            
                $response = array(

                    "data" => $finalarray,

                    "error_code" => 0,

                    "message" => $available_doctor_count.' doctor available' 

                );

            }

            else

            {

                $response = array(

                    "data" => array(),

                    "error_code" => 1,

                    "message" => 'No doctor available' 

                );

            }

        }catch (\Illuminate\Database\QueryException $exc) {

            $response = array(

                    "data" => array(),

                    "error_code" => 1,

                    "message" => 'No record Found' 

                );

        }

    return response()->json($response);

    }
    
        public function newavailabledoctors(Request $request)
    {

        try{

            $available_doctor_count = DoctorDetail::where('available',1)->where('status',1)->count();

            $available_doctors = DB::table('doctors')
                    ->select('users.id', 'users.fname', 'users.contact_number','doctors.mbbs_registration_number','doctors.md_ms_dnb_registration_number','doctors.fee_of_consultation','city.city','doctors.exp_year','doctors.profile_pic','doctors.call_payment','videocall.request_status','videocall.response_status','videocall.call_status','videocall.total_requested_time','doctor_speciality_select.speciality_id as idname',\DB::raw('GROUP_CONCAT(doctor_speciality.speciality) as speciality'))//,'doctor_speciality.speciality'
                    ->leftjoin('users', 'doctors.doctor_id', '=', 'users.id')

                //->leftjoin('doctor_speciality', 'doctors.speciality', '=', 'doctor_speciality.id')
                   
                    ->leftjoin('doctor_speciality_select', 'doctors.doctor_id', '=', 'doctor_speciality_select.doctor_id')

                    ->leftjoin('doctor_speciality', 'doctor_speciality_select.speciality_id', '=', 'doctor_speciality.id') 

                    ->leftjoin('city', 'doctors.city', '=', 'city.id')

                    ->leftJoin('videocall', function($query) {
                         $query->on('doctors.doctor_id','=','videocall.doctor_id')
                                ->whereRaw('videocall.id IN (select MAX(a2.id) from videocall as a2 join doctors as u2 on u2.doctor_id = a2.doctor_id group by u2.doctor_id)');
                    })

                    ->where('doctors.available', 1)

                    ->where('doctors.status', 1)

                    ->where('users.verified',1)

                    ->groupBy('doctors.id')

                    ->orderby('videocall.request_status',1)

                    ->orderby('videocall.response_status',1)

                    ->orderby('videocall.call_status',1)
                    
                    ->get();
            
//dd($available_doctors);
            if($available_doctor_count)

            {
                $firstarray=[];
                $twoarray=[];
                $thirdrray=[];
                $finalarray=[];
                foreach($available_doctors as $value)
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
                            'total_requested_time'=>$value->total_requested_time,
                            'idname'=>$value->idname,
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
                            'total_requested_time'=>$value->total_requested_time,
                            'idname'=>$value->idname,
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
                            'total_requested_time'=>$value->total_requested_time,
                            'idname'=>$value->idname,
                            'speciality'=>$value->speciality
                        );
                    }
                    // dd($thirdrray);
                }
                $finalarray=array_merge($thirdrray,$firstarray,$twoarray);
                
                $response = array(

                    "data" => $finalarray,

                    "error_code" => 0,

                    "message" => $available_doctor_count.' doctor available' 

                );

            }

            else

            {

                $response = array(

                    "data" => array(),

                    "error_code" => 1,

                    "message" => 'No doctor available' 

                );

            }

        }catch (\Illuminate\Database\QueryException $exc) {

            $response = array(

                    "data" => array(),

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

            $patienthealthrecord->bmi = str_replace("BMI","",$request->bmi);

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
             $messages = [
                    'required' => ':attribute is required.',
                    'city.required' => 'City is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'city' => 'required|integer',
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

            $subscription_plan_count = HealthPlan::where('city_id',$request->city)->where('status',1)->count(); 
            $subscription_plan = HealthPlan::where('city_id',$request->city)->where('status',1)->get();
            $response1 = array();
            $plan_description = array();
            foreach ($subscription_plan as $sp) {    
                $plan_description = HealthPlanDescription::select('description')->where('plan_id',$sp->id)->where('status',1)->get()->toArray();
                $city = City::whereId($request->city)->first();
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
                    'city' => $city->city
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
            
            if($patient_plan)
            {

            $patienthealthplan = PatientHealthPlan::whereId(@$patient_plan->id)->update([

                'in_pay' => $request->in_pay,

                'payment_date' => $today,

                ]);
            $patient_plan_id = $patient_plan->id;
            }
            else
            {
                $patienthealthplan = new PatientHealthPlan;
                $patienthealthplan->patient_id = $request->patient_id;
                $patienthealthplan->plan_id = $request->plan_id;
                $patienthealthplan->in_pay = $request->in_pay;
                $patienthealthplan->payment_date = $today;
                $patienthealthplan->save();
                
                $patient_plan_id = $patienthealthplan->id;
            }
            

            $response1 = array(

                'id' => @$patient_plan_id,

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
                      
                    // 'doctor_id.required' => 'Doctor Id is required.',
            ];

                $validator = Validator::make($request->all(), [

                            'patient_id' => 'required|integer',
                            
                      //      'doctor_id' => 'required|integer',

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

            $priscription_count = PatientPriscription::
             select('id','medicine_name','dose','freq','route','duration','created_at','doctor_id','releventpoint','examination_lab_finding','suggest_investigation','special_investigation')
             ->where('patient_id',$request->patient_id)
             ->groupBy('doctor_id')
             ->get();
             $others=Others::where('patient_id',$request->patient_id)->latest()->first();
             $response1=[];
             $prescriptiondata=[];
             $doctordata=[];
             $pres_data=[];
             
             foreach($priscription_count as $key=> $value){
               
                 $prescriptiondata[]=array(
                     'id'=>$value->id,
                     'medicine_name'=>$value->medicine_name,
                     'dose'=>$value->dose,
                     'freq'=>$value->freq,
                     'route'=>$value->route,
                     'duration'=>$value->duration,
                     'created_at'=>$value->created_at->toDateTimeString(),
                 );
                 
                 $priscription_counts = PatientPriscription::
                     select('id','medicine_name','dose','freq','route','duration','created_at','doctor_id')
                     ->where('patient_id',$request->patient_id)
                     ->where('doctor_id',$value->doctor_id)
                     ->get();
                    
                    foreach($priscription_counts as $values1)
                     {
                         
                          $pres_data[]=array(
                             'id'=>$values1->id,
                             'medicine_name'=>$values1->medicine_name,
                             'dose'=>$values1->dose,
                             'freq'=>$values1->freq,
                             'route'=>$values1->route,
                             'duration'=>$values1->duration,
                             'created_at'=>$values1->created_at->toDateTimeString(),
                            );
                     }

              
                 $name = User::select('id','fname')
                         ->where('id',$value->doctor_id)
                         ->first();
                
                 $dr_details = DoctorDetail::select('doctors.fee_of_consultation','doctors.mbbs_registration_number','doctors.md_ms_dnb_registration_number','ct.city as cityname','doctor_speciality.speciality as speciality')
                         ->leftjoin('city as ct', 'doctors.city', '=', 'ct.id')
                         ->leftjoin('doctor_speciality', 'doctors.speciality', '=', 'doctor_speciality.id')
                         ->where('doctors.doctor_id',$value->doctor_id)
                         ->groupby('doctors.doctor_id')
                         ->first();
                
                //$patient_diagnosis = PatientDiagnosis::select('id','diagnosis','year')->where('patient_id',$value->doctor_id)->get()->toArray();
                $patient_diagnosis = PatientDiagnosis::select('id','diagnosis','year')->where('patient_id',$request->patient_id)->get()->toArray();
                
                $doctordata[]=array( 'doctor_id'=>$value->doctor_id,
                    'doctor_name'=>isset($name->fname)?$name->fname:'',
                    'dr_fees'=>isset($dr_details)?$dr_details->fee_of_consultation:'',
                    'created_at'=>$value->created_at->toDateTimeString(),
                    'speciality'=>isset($dr_details)?$dr_details->speciality:'',
                    'mbbs_registration_number'=>isset($dr_details)?$dr_details->mbbs_registration_number:'',
                    'md_ms_dnb_registration_number'=>isset($dr_details)?$dr_details->md_ms_dnb_registration_number:'',
                    'city'=>isset($dr_details)?$dr_details->cityname:'',
                    'prescriptiondata'=>$pres_data,
                    'diagnosis'=>$patient_diagnosis,
                    'releventpoint'=>isset($others->releventpoint)?$others->releventpoint:'',
                     'examination_lab_finding'=>isset($others->examination_lab_finding)?$others->examination_lab_finding:'',
                     'suggest_investigation'=>isset($others->suggest_investigation)?$others->suggest_investigation:'',
                     'special_investigation'=>isset($others->special_investigation)?$others->special_investigation:'',
                );
                    unset($pres_data);
                $response1=array(
                     'doctordata'=>$doctordata,
                      
                );
             }
            
            $response = array(

                "data" => $response1,

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

            if($request->year){
                $year = $request->year;
            }else{
                 $year = '';
            }   
             
            if($request->vital_id == 1)
            {
                $patient_vital_detail = PatientHealthRecordDetail::select('id','patient_id','add_date','blood_pressure_max_value','blood_pressure_min_value')->where('patient_id',$request->patient_id)->where('add_date','like',"%$year%")
                ->get()->toArray();

            }
            elseif($request->vital_id == 2)
            {
                $patient_vital_detail = PatientHealthRecordDetail::select('id','patient_id','add_date','pluse')->where('patient_id',$request->patient_id)->where('add_date','like',"%$year%")->get()->toArray();
            }
            elseif($request->vital_id == 3)
            {
                $patient_vital_detail = PatientHealthRecordDetail::select('id','patient_id','add_date','temperature')->where('patient_id',$request->patient_id)->where('add_date','like',"%$year%")->get()->toArray();
            }
            elseif($request->vital_id == 4)
            {
                $patient_vital_detail = PatientHealthRecordDetail::select('id','patient_id','add_date','oxygen_saturation')->where('patient_id',$request->patient_id)->where('add_date','like',"%$year%")->get()->toArray();
            }
            elseif($request->vital_id == 5)
            {
                $patient_vital_detail = PatientHealthRecordDetail::select('id','patient_id','add_date','breathing_rate')->where('patient_id',$request->patient_id)->where('add_date','like',"%$year%")->get()->toArray();
            }
            elseif($request->vital_id == 6)
            {
                $patient_vital_detail = PatientHealthRecordDetail::select('id','patient_id','add_date','abdominal_circumference')->where('patient_id',$request->patient_id)->where('add_date','like',"%$year%")->get()->toArray();
            }
            elseif($request->vital_id == 7)
            {
                $patient_vital_detail = PatientHealthRecordDetail::select('id','patient_id','add_date','blood_sugar')->where('patient_id',$request->patient_id)->where('add_date','like',"%$year%")->get()->toArray();
            }
            elseif($request->vital_id == 8)
            {
                $patient_vital_detail = PatientHealthRecordDetail::select('id','patient_id','add_date','weight')->where('patient_id',$request->patient_id)->where('add_date','like',"%$year%")->get()->toArray();
            }
            elseif($request->vital_id == 9)
            {
                $patient_vital_detail = PatientHealthRecordDetail::select('id','patient_id','add_date','bmi')->where('patient_id',$request->patient_id)->where('add_date','like',"%$year%")->get()->toArray();
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



    //get diagosis

    public function getdiagnosis()
    {
        # code...
        try{
            $PatientDiagnosis = PatientDiagnosis::select('*')->where('status',1)->orderBy('id', 'desc')->get();
            if($PatientDiagnosis){
                $response = array(
                    "data" => $PatientDiagnosis,
                    "error_code" => 0,
                    "message" => count($PatientDiagnosis).' Patient Diagnosis available' 
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


public function getcurrentplan(Request $request)
    {
        # code...

        try{
            $planmonth = 0;
            $getcurrentplanid = DB::table('users')
                    ->select(
                        'users.id',
                        'patient_health_plan.plan_id'
                    )
                    ->leftjoin('patient_health_plan', 'users.id', '=', 'patient_health_plan.patient_id')
                    ->leftjoin('master_health_plan', 'patient_health_plan.plan_id', '=', 'master_health_plan.id')
                    ->where('users.id', $request->user_id)
                    ->first();
            // dd($getcurrentplanid->plan_id);  
            if($getcurrentplanid){        
                if($getcurrentplanid->plan_id){
                    $subscription_plan_master = HealthPlan::where('id',$getcurrentplanid->plan_id)->get(); 
                    $planmonth =  $subscription_plan_master['0']->duration;
                }  
            }else{
                $response = array(
                    "data" => [],
                    "error_code" => 0,
                    "message" => 'Patient Plan Detail' 
                );
            }
            $getcurrentplan = DB::table('users')
                    ->select(
                        'users.id',
                        'patient_health_plan.in_pay',
                        'patient_health_plan.plan_id',
                        'master_health_plan.plan_name',
                        DB::raw('master_health_plan.created_at as plan_create_date'),
                        DB::raw('master_health_plan.updated_at as plan_update_date'),
                        DB::raw('DATE_ADD(date_format(str_to_date(payment_date, "%d/%m/%Y"), "%Y%m%d"), INTERVAL '.$planmonth.' month) as plan_expire_date')
                    )
                    ->leftjoin('patient_health_plan', 'users.id', '=', 'patient_health_plan.patient_id')
                    ->leftjoin('master_health_plan', 'patient_health_plan.plan_id', '=', 'master_health_plan.id')
                    ->where('users.id', $request->user_id)
                    ->first();
            if($getcurrentplan){
                $response = array(
                    "data" => $getcurrentplan,
                    "error_code" => 0,
                    "message" => 'Patient Plan Detail' 
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


public function getprocedureyear(Request $request)
    {
        try{
            if($request->year){
                $year = $request->year;
            }else{
                $year = date("Y");
            }
            $getcurrentplan = DB::table('patient_procedure')
            ->select('patient_procedure.*')//,'admin_procedure.procedure_name'
            // ->where('procedure_date','like',"%$year%")
            //->leftjoin('admin_procedure', 'patient_procedure.procedure_name', '=', 'admin_procedure.id')
            ->where('patient_procedure.procedure_date','like',"%$year%")
            ->where('patient_procedure.patient_id',$request->user_id)
            ->orderBy('patient_procedure.procedure_date', 'desc')
            ->get();
            if($getcurrentplan){
                $response = array(
                    "data" => $getcurrentplan,
                    "error_code" => 0,
                    "message" => 'Procedure Detail' 
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



public function gettransactionlist(Request $request)
    {
        # code..
        try{
            $patientWalletDetail['all_details'] = PatientWalletDetail::select('*')
            ->where('status',1)
            ->where('patient_id',$request->user_id)
            ->orderBy('id', 'desc')
            ->get();
            
            $patientWalletDetailONE = PatientWalletDetail::select('*')
            ->where('status',1)
            ->where('patient_id',$request->user_id)
            ->orderBy('id', 'desc')
            ->first();
            
            if(isset($patientWalletDetailONE)){
                $patientWalletDetail['total_amount'] = $patientWalletDetailONE->total_amount;
            }else{
                $patientWalletDetail['total_amount'] = (string) 0;
            }
            
            
            if($patientWalletDetail){
                $response = array(
                    "data" => $patientWalletDetail,
                    "error_code" => 0,
                    "message" => 'Procedure Detail' 
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


public function getlabtest(Request $request)
    {
        try{
            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is required.',
                    'test_id.required' => 'Test id is required.',
                    'year.required' => 'Test id is required.',
            ];
            $validator = Validator::make($request->all(), [
                        'patient_id' => 'required|integer',
                        'test_id' => 'required|integer',
                        'year' => 'required',
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

            if($request->year){
                $year = $request->year;
            }else{
                $year = date("Y");
            }

            // $patient_lab_detail = PatientLabDetail::select('id','test_date','test_name','value','unit','result')
            // ->where('patient_id',$request->patient_id)
            // ->where('test_name',$request->test_id)
            // ->where('test_date','like',"%$year%")->orderBy('id', 'desc')->get()->toArray();

            // $patient_lab_detail = DB::table('patient_lab_detail')
            // ->select(DB::raw('patient_lab_detail.test_name as id'),'lab_report.test_name','test_date','value','unit','result')
            // ->leftjoin('lab_report','patient_lab_detail.test_name','lab_report.id')
            // ->where('patient_lab_detail.patient_id',$request->patient_id)
            // ->where('patient_lab_detail.test_name',$request->test_id)
            // ->where('patient_lab_detail.test_date','like',"%$year%")
            // ->orderBy('patient_lab_detail.test_date')
            // ->get()->toArray();
            if($request->test_id != 0 ){
                $patient_lab_detail = DB::table('patient_lab_detail')
                ->select('patient_lab_detail.id as id','patient_lab_detail.test_name','test_date','value','unit','result')
                //->select('patient_lab_detail.id as id','lab_report.test_name','test_date','value','unit','result')
                
                ->leftjoin('lab_report','patient_lab_detail.test_name','lab_report.id')
                ->where('patient_lab_detail.patient_id',$request->patient_id)
                ->where('patient_lab_detail.test_name',$request->test_id)
                ->where('patient_lab_detail.test_date','like',"%$year%")
                ->orderBy('patient_lab_detail.test_date')
                ->get()->toArray();
                $response = array(
                    "data" => $patient_lab_detail,
                    "error_code" => 0,
                    "message" => 'Lab test available'
                );
            }else{
                $patient_lab_detail = DB::table('patient_lab_detail')
                ->select('patient_lab_detail.id as id','patient_lab_detail.test_name','test_date','value','unit','result')
                //->select('patient_lab_detail.test_name as id','lab_report.test_name','test_date','value','unit','result')
                ->leftjoin('lab_report','patient_lab_detail.test_name','lab_report.id')
                ->where('patient_lab_detail.patient_id',$request->patient_id)
                //->where('patient_lab_detail.test_name',$request->test_id)
                ->where('patient_lab_detail.test_date','like',"%$year%")
                ->orderBy('patient_lab_detail.test_date')
                ->get()->toArray();
                //dd($patient_lab_detail);
                $response = array(
                    "data" => $patient_lab_detail,
                    "error_code" => 0,
                    "message" => 'Lab test available'
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

public function getuserreminder(Request $request)
    {
        try{
            $var = $request->monthyear;
            $year = date("Y", strtotime($var) );
            $month = date("m", strtotime($var) );
            if($year){
                $year = $year;
            }else{
                $year = date("Y");
            }
            if($month){
                $month = $month;
            }else{
                $month = date("m");
            }
            $monthyear = $month."/".$year;
            $patient_reminder_detail = Reminder::select('*')->where('patient_id',$request->user_id)->where('reminder_date','like',"%$monthyear%")->orderBy('id', 'desc')->get();
            $response = array(
                "data" => $patient_reminder_detail,
                "error_code" => 0,
                "message" => 'Reminder available'
            );
        }catch (\Illuminate\Database\QueryException $exc) {
                $response = array(
                        "data" => [],
                        "error_code" => 1,
                        "message" => 'No record Found' 

                );
        }
        return response()->json($response);     

    }


    // video call

    public function addvideocall(Request $request)
    {
        // echo "Asds";exit;
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is requuired.',
                    'doctor_id' => 'Coach id is requuired',
                    'diagnosis.required' => 'Diagnosis is requuired.',
                    'complaints.required' => 'Complaints is requuired.',
                    'requested_time.required' => 'Requested time Time is requuired.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'doctor_id' => 'required|integer',
                            'diagnosis' => 'required',
                            'complaints' => 'required',
                            'requested_time' => 'required',
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

            $videocall = new Videocall;
            $videocall->patient_id = $request->patient_id;
            $videocall->doctor_id = $request->doctor_id;
            $videocall->diagnosis = $request->diagnosis;
            $videocall->complaints = $request->complaints;
            $videocall->total_requested_time = $request->requested_time;
            $videocall->request_status = 0;
            $videocall->response_status = 0;
            $videocall->call_status = 0;
            $videocall->save();
            $videocall->noti_type = 'book_call_request';
            $videocall->from_user = 'patient';
            
            // dd($videocall);

            // try {
            //     // $data['to_email'] = $request->email;
            //     $patient_detail = User::select('*')->where('id',$request->patient_id)->first()->toArray();
            //     $data['to_email'] = 'purvesh.innovius@gmail.com';
            //     $doctor_detail = User::select('*')->where('id',$request->doctor_id)->first()->toArray();
            //     Mail::send('emailTemplate.addvideocall', ['parameter' => $patient_detail,'videocall'=> $videocall,'doctor' => $doctor_detail], function ($m) use($data) {
            //                 $m->from('vitalx@gmail.com', 'vitalX');
            //                 $m->to($data['to_email'])->subject('VitalX | Add video to Doctor for VitalX');
            //     });
            // } catch (Exception $e) {
                
            // }
            $doctor_detail = User::select('*')->where('id',$request->doctor_id)->first()->toArray();
            $patient_detail = User::select('*')->where('id',$request->patient_id)->first()->toArray();
            // dd($patient_detail['fname']);
            $doctor_detail_id = $doctor_detail['device_id'];
            $doctor_msg = array(
                'body' => 'You have video call booking request from '.$patient_detail["fname"],
                'title' => 'Add Video Request.',
                'icon' => 'myicon',
                'sound' => 'mySound'
            );

            $patient_doctor_msg = array(
                'id' => $videocall->id,
                'noti_type' => $videocall->noti_type,
                'patient_id' => $videocall->patient_id,
                'call_status' => $videocall->call_status,
                'doctor_id' => $videocall->doctor_id,
                'from_user' => $videocall->from_user,
                'total_requested_time' => $videocall->total_requested_time,
                'diagnosis' => $videocall->diagnosis,
                'complaints' => $videocall->complaints,
                'response_status' => $videocall->response_status,
                'request_status' => $videocall->request_status
                );
            PushNotification::PushAndroidNotificationUser($doctor_msg, $patient_doctor_msg, [$doctor_detail_id]);
            
            $response = array(
                "data" => $videocall,
                "error_code" => 0,
                "message" => 'Videocall added' 
            );
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => [],
                    "error_code" => 1,
                    "message" => 'Videocall added failed' 
                );
        }
    return response()->json($response);
    }



    public function videocallresponce(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'request_id.required' => 'Patient Id is requuired.',
                    'response_status' => 'Coach id is requuired',
                ];
                $validator = Validator::make($request->all(), [
                            'request_id' => 'required|integer',
                            'response_status' => 'required|integer',
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
                $request_status = ($request->request_status) ? $request->request_status : 0;
                $call_status = ($request->call_status) ? $request->call_status : 0;
                $reject_reason=($request->reject_reason) ? $request->reject_reason : 0;
                $videocall = Videocall::whereId($request->request_id)->update([
                    'response_status' => $request->response_status,
                    'request_status' => $request->request_status,
                    //'call_status' => $request->call_status,
                    'rejectReason'=>$request->reject_reason
                ]);   
                //dd($videocall);
                $patient_videocall = Videocall::select('*')->where('id',$request->request_id)->orderBy('id', 'desc')->get();
                $patient_videocall['0']->noti_type = 'book_call_request';
                $patient_videocall['0']->from_user = 'doctor';
                // dd($patient_videocall['0']->patient_id);
                // try {
                // // $data['to_email'] = $request->email;
                //     $patient_videocall_responce = Videocall::select('*')->where('id',$request->request_id)->first()->toArray();
                //     // dd($patient_videocall_responce);
                //     $patient_detail = User::select('*')->where('id',$patient_videocall['0']->patient_id)->first()->toArray();
                //     $data['to_email'] = 'purvesh.innovius@gmail.com';
                //     $doctor_detail = User::select('*')->where('id',$patient_videocall['0']->doctor_id)->first()->toArray();
                //     Mail::send('emailTemplate.addvideocallresponce', ['parameter' => $patient_detail,'videocall'=> $patient_videocall_responce,'doctor' => $doctor_detail], function ($m) use($data) {
                //                 $m->from('vitalx@gmail.com', 'vitalX');
                //                 $m->to($data['to_email'])->subject('VitalX | Add Video Responce to Doctor for VitalX');
                //     });
                // } catch (Exception $e) {
                    
                // }
                $doctor_detail = User::select('*')->where('id',$patient_videocall['0']->doctor_id)->first()->toArray();
                $patient_detail = User::select('*')->where('id',$patient_videocall['0']->patient_id)->first()->toArray();
                $patient_detail_id = $patient_detail['device_id'];
                // dd($doctor_detail["fname"]);
                $doctor_msg = array(
                    'body' => 'You have video call booking response from '.$doctor_detail["fname"],
                    'title' => 'Add Video Responce.',
                    'icon' => 'myicon',
                    'sound' => 'mySound'
                );

                $patient_doctor_msg = array(
                    'id' => $patient_videocall['0']->id,
                    'noti_type' => $patient_videocall['0']->noti_type,
                    'patient_id' => $patient_videocall['0']->patient_id,
                    'call_status' => $patient_videocall['0']->call_status,
                    'doctor_id' => $patient_videocall['0']->doctor_id,
                    'from_user' => $patient_videocall['0']->from_user,
                    'total_requested_time' => $patient_videocall['0']->total_requested_time,
                    'diagnosis' => $patient_videocall['0']->diagnosis,
                    'complaints' => $patient_videocall['0']->complaints,
                    'response_status' => $patient_videocall['0']->response_status,
                    'request_status' => $patient_videocall['0']->request_status,
                    'reject_reason'=>$patient_videocall['0']->rejectReason
                    );
                PushNotification::PushAndroidNotificationUser($doctor_msg, $patient_doctor_msg, [$patient_detail_id]);

                $response = array(
                    "data" => $patient_videocall,
                    "error_code" => 0,
                    "message" => 'Videocall status updated' 
                );
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => [],
                    "error_code" => 1,
                    "message" => 'Videocall status update failed' 
                );
        }
    return response()->json($response);
    }


    public function changecallpaymentstatus(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is requuired.',
                    'doctor_id.required' => 'Doctor Id is requuired.',
                    //'response_status' => 'Coach id is requuired',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'doctor_id' => 'required|integer',
                            //'response_status' => 'required|integer',
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
                
                $call_status = ($request->call_status) ? $request->call_status : 0;
                //dd($request->all());
                $videocall = Videocall::where('patient_id',$request->patient_id)->where('doctor_id',$request->doctor_id)->update([
                        'call_status' => $request->call_status,
                    ]); 
                $patient_videocall_get = Videocall::select('*')->where('patient_id',$request->patient_id)->where('doctor_id',$request->doctor_id)->orderBy('id', 'desc')->limit(1)->get()->toArray();
                $response = array(
                    "data" => $patient_videocall_get,
                    "error_code" => 0,
                    "message" => 'Videocall status updated' 
                );

                // $patient_videocall_get = Videocall::select('*')->where('patient_id',$request->patient_id)->where('doctor_id',$request->doctor_id)->orderBy('id', 'desc')->limit(1)->get()->toArray();
                // //dd($patient_videocall_get);
                // //dd($patient_videocall_get['0']['id']);
                // $request->request_id = $patient_videocall_get['0']['id'];
                // $request_status = ($request->request_status) ? $request->request_status : 0;
                // $call_status = ($request->call_status) ? $request->call_status : 0;

                // if($request->response_status==1 && $request->request_status==1 && $request->call_status==1)
                // {
                //     $videocall = Videocall::whereId($request->request_id)->first();
                    
                //     $date = strtotime(date('Y-m-d H:i:s'));
                //     $date_notify = strtotime($videocall->total_requested_time, $date);
                //    // $newdate=date('Y-m-d H:i:s', $date_notify);
                //     $videocall = Videocall::whereId($request->request_id)->update([
                //         'response_status' => $request->response_status,
                //         'request_status' => $request->request_status,
                //         'call_status' => $request->call_status,
                //         'call_time'=>date('Y-m-d H:i:s'),
                //         'notification_time'=>date('Y-m-d H:i:s', $date_notify),
                //     ]);  
                // }
                // else
                // {
                //     $videocall = Videocall::whereId($request->request_id)->update([
                //         'response_status' => $request->response_status,
                //         'request_status' => $request->request_status,
                //         'call_status' => $request->call_status,
                //         'call_time'=>'',
                //         'notification_time'=>'',
                //     ]);
                // }
                 

                // $patient_videocall = Videocall::select('*')->where('id',$request->request_id)->orderBy('id', 'desc')->get();
                // $patient_videocall['0']->noti_type = 'book_call_request';
                // $patient_videocall['0']->from_user = 'doctor';
                // $response = array(
                //     "data" => $patient_videocall,
                //     "error_code" => 0,
                //     "message" => 'Videocall status updated' 
                // );
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => [],
                    "error_code" => 1,
                    "message" => 'Videocall status update failed' 
                );
        }
    return response()->json($response);
    }


    //add doctore
    public function addquestiondoctor(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'patient_id.required' => 'Patient Id is requuired.',
                    'doctor_id' => 'Coach id is requuired',
                    'city_id' => 'City is requuired.',
                    'question.required' => 'Question is requuired.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'doctor_id' => 'required|integer',
                            'city_id' => 'required',
                            'question' => 'required',
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

            $Questiondoctor = new Questiondoctor;
            $Questiondoctor->patient_id = $request->patient_id;
            $Questiondoctor->doctor_id = $request->doctor_id;
            $Questiondoctor->city_id = $request->city_id;
            $Questiondoctor->question = $request->question;
            $Questiondoctor->answer = $request->answer;
            $Questiondoctor->save();

            $doctor_name= User::where('role_id',2)->where('id', $request->doctor_id)->first();
            $doctor_email=isset($doctor_name->email)?$doctor_name->email:'';
            $patient_name= User::where('role_id',4)->where('id', $request->patient_id)->first();
            $patient_email=isset($patient_name->email)?$patient_name->email:'';

            try {
                // $data['to_email'] = $request->email;
                $patient_detail = User::select('*')->where('id',$request->patient_id)->first()->toArray();
                $data['to_email'] = array($doctor_email,$patient_email);

                // $emails = array($doctor_email, $patient_email);
                
                // dd($Questiondoctor->question);
                // $para = array('fname' => $patient_detail->fname, 'type' => $type);
                Mail::send('emailTemplate.question', ['parameter' => $patient_detail,'question' => $Questiondoctor->question], function ($m) use($data) {
                            $m->from('hello@sensoriom.com', 'Sensoriom');
                            $m->to($data['to_email'])->subject('Sensoriom | Ask Question to Doctor for Sensoriom');
                });

            } catch (Exception $e) {
                
            }
            

            $response = array(
                "data" => $Questiondoctor,
                "error_code" => 0,
                "message" => 'Question added' 
            );
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => [],
                    "error_code" => 1,
                    "message" => 'Question added failed' 
                );
        }
    return response()->json($response);
    }


//get  location  list
    public function getlocation(Request $request)
    {
       try{
            $city_id=request('city_id');
            //$location=Location::where('city_id',$city_id)->get();
            $location = Pharmacylist::where('city_id',$city_id)->get();

            if($location){
                $response = array(
                    "data" => $location,
                    "error_code" => 0,
                    "message" => 'Location List Detail' 
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
//get  pharmacy  list

    public function getpharmacylist(Request $request)
    {
        # code..
        try{
            if($request->city_id){
                $pharmacylist = Pharmacylist::select('*')->where('status',1)->where('city_id',$request->city_id)->where('location',$request->location)->orderBy('id', 'desc')->get();
            }else{
                $pharmacylist = Pharmacylist::select('*')->where('status',1)->orderBy('id', 'desc')->get();
            }
            if($pharmacylist){
                $response = array(
                    "data" => $pharmacylist,
                    "error_code" => 0,
                    "message" => 'Pharmacy List Detail' 
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

    //add doctore
    public function addprescriptionpharmacy(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'parmacy_id' => 'Coach id is required',
                    'patient_id' => 'Patient Id is requuired.',
                    'patient_name' => 'Patient Name is required',
                    'patient_contact' => 'Patient Contact id is required',
                    'city_id' => 'City is requuired.'
                ];
                $validator = Validator::make($request->all(), [
                            'parmacy_id' => 'required|integer',
                            'patient_id' => 'required|integer',
                            'patient_name' => 'required',
                            'patient_contact' => 'required',
                            'city_id' => 'required'
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

            $prescriptionpharmacy = new Prescriptionpharmacy;
            $prescriptionpharmacy->parmacy_id = $request->parmacy_id;
            $prescriptionpharmacy->patient_id = $request->patient_id;
            $prescriptionpharmacy->patient_name = $request->patient_name;
            $prescriptionpharmacy->patient_contact = $request->patient_contact;
            $prescriptionpharmacy->city_id = $request->city_id;
            
            if($request->hasFile('images'))
            {
                $allowedfileExtension=['jpg','png','jpeg','gif'];
                $files = $request->file('images');
                foreach($files as $file){
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $check=in_array($extension,$allowedfileExtension);
                    if($check)
                    {
                        $filenames[] = $file->store('images');
                    }
                }
            }
            $filestring = implode(",",$filenames);
            $prescriptionpharmacy->image = $filestring;
            $prescriptionpharmacy->save();
            $pharmacylist = Pharmacylist::select('*')->where('id',$request->parmacy_id)->orderBy('id', 'desc')->get();
            $patient_name= User::where('role_id',4)->where('id', $request->patient_id)->first();
            $Pharmacy=Pharmacylist::find($request->parmacy_id);
            
            if($patient_name->email != null)
            {
                //$data['to_email'] = $patient_name->email;
                $data['to_email'] = $Pharmacy->email;
                Mail::send('emailTemplate.pharmacy', ['parameter' => $pharmacylist,'patient' => $prescriptionpharmacy], function ($m) use($data) {
                $m->from('hello@sensoriom.com', 'Sensoriom');
                $m->to($data['to_email'])
                ->cc(env('EMAIL_CC'))
                ->subject('Sensoriom | Ask Prescription Pharmacy for Sensoriom');
                 });
            }
            $response = array(
                "data" => $prescriptionpharmacy,
                "error_code" => 0,
                "message" => 'Prescription Pharmacy added' 
            );
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => [],
                    "error_code" => 1,
                    "message" => 'Prescription Pharmacy added failed' 
                );
        }
        return response()->json($response);
    }

    //Get Data from patienthealthrecord using patient_id

    public function patienthealthrecordswithadddate(Request $request)

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

                    ->orderBy('id','DESC')->first();

            

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

    public function myprescriptionPdf(Request $request)
    {
        
        $patient_id = request('patient_id');

        $path = 'storage/pdf/prescription/' .$patient_id. '_prescription.pdf';

        $PatientProcedure=PatientProcedure::where('patient_id',$patient_id)->
        $pdf = PDF::loadView('Prescription.pdf',compact('visit_prescription'))->save($path);
         Visit_Prescription::where('id',$visit_id)->update(array('pdf'=>$path))  ;
    }

    public function testNotification(Request $request)
    {
        $date = date('d/m/Y');

        $videocall = Reminder::where('reminder_date','=',$date)->limit(1)->get();

        $patient_detail = array();

        foreach ($videocall as $value) {
            
            $users=User::select('*')->where('id',$value->patient_id)->first();

           
            $patient_detail[] = ($users) ? $users->device_id : "";

        }

        $notification_type='Reminder';

        $cmsg = array(

                'body' => 'Patient  has chosen you as the Care Coach on',

                'title' => 'Your Today Reminder',  

                'icon' => 'myicon',

                'sound' => 'mySound',

        );

        $coach_msg = array('type' => 'Coach','coach_id' => '1','noti_type'=>$notification_type);

        PushNotification::PushAndroidNotificationUser($cmsg, $coach_msg, ['aaae5BpMw9by1E:APA91bHz45O5vW2g7vcl6AKNi83EH447Qtt_M0zrCSDqP0H0v-e9kLVfbdT_bQK4YGUJF51KTLGSOqsQXpmmR8N5aSGagLsYO9DV2Vv5xJ4r0kTcszVuoPcCq6slClRfuGqDdp-QeeNZ']);

        Videocall::whereId(14)->update([
                  'response_status' =>'1',
                  'request_status' =>'1',
                  'call_status' =>'1',
                  'call_time'=>'0',
                  'notification_time'=>'0',
        ]);

    }

    public function getMyreminder(Request $request)
    {
        try{
            $patient_id=request('patient_id');

            $date = date('d/m/Y');

            $reminder=Reminder::where('patient_id',$patient_id)->where('reminder_date','=',$date)->get();

            if($reminder){
                $response = array(
                    "data" => $reminder,
                    "error_code" => 0,
                    "message" => 'Reminder List Detail' 
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

    public function getVideocallstatus(Request $request)
    {
        try{
            $request_id=request('request_id');

            $videocall=Videocall::where('id',$request_id)->get();

            if($videocall){
                $response = array(
                    "data" => $videocall,
                    "error_code" => 0,
                    "message" => 'Videocall Status Detail' 
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
    public function refundMoney(Request $request)
    {
        try{
            $patient_id=request('patient_id');

            $doctor_id=request('doctor_id');

            $amount=request('amount');

            $videocall=Videocall::where('id',$request_id)->get();

            if($videocall){
                $response = array(
                    "data" => $videocall,
                    "error_code" => 0,
                    "message" => 'Videocall Status Detail' 
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

    

    public function sendnotificationidthru(Request $request)
    {
        try
        {
            $patient_detail = User::select('*')->where('id',request('user_id'))->first()->toArray();

            $patient_detail_id = $patient_detail['device_id'];

            $doctor_msg = array(
                        'body' => 'Incoming video call from '.$patient_detail["fname"],
                        'title' => 'Video call request.',
                        'icon' => 'myicon',
                        'sound' => 'mySound'
            );

            $noti_type='Video call request';

            $patient_doctor_msg = array(
                        
                        'noti_type' => $noti_type,
                        'call_request'=>'Video call request',
            );

            PushNotification::PushAndroidNotificationUser($doctor_msg, $patient_doctor_msg, [$patient_detail_id]);

                
            $response = array(
                                        "data" => '',
                                        "error_code" => 0,
                                        "message" => 'Videocall status updated' 
            );
        }
        catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => [],
                    "error_code" => 1,
                    "message" => 'No record Found' 
            );
        }
        return response()->json($response);

    }

    public function sharepdf(Request $request)
    {

        $user_id=request('user_id');

        $labyear=request('labyear');

        $procedureyear=request('procedureyear');

        $patient_lab_detail = DB::table('patient_lab_detail')
                ->select(DB::raw('patient_lab_detail.test_name as id'),'lab_report.test_name','test_date','value','unit','result',DB::raw("STR_TO_DATE(test_date, '%d/%m/%Y') as newtest_date"))
                ->leftjoin('lab_report','patient_lab_detail.test_name','lab_report.id')
                ->where('patient_lab_detail.patient_id',$user_id)
                // ->where('patient_lab_detail.test_name',$test_id)
                ->where('patient_lab_detail.test_date','like',"%$labyear%")
                ->orderBy('newtest_date', 'desc')
                ->orderBy('lab_report.test_name', 'asc')
                ->get()->toArray();

        $getcurrentplan = DB::table('patient_procedure')->select('patient_procedure.*','    admin_procedure.procedure_name',DB::raw("STR_TO_DATE(patient_procedure.procedure_date, '%d/%m/%Y') as newprocedure_date"))
                ->leftjoin('admin_procedure', 'patient_procedure.procedure_name', '=', 'admin_procedure.id')
            ->where('patient_procedure.procedure_date','like',"%$procedureyear%")
            ->where('patient_procedure.patient_id',$user_id)
            ->orderBy('newprocedure_date', 'desc')
            ->orderBy('admin_procedure.procedure_name', 'asc')
            ->get();

            $pdetails = DB::table('patient_detail')->select('*')
            ->where('patient_id',$user_id)
            ->first();

            $userdetails = DB::table('users')->select('*')
            ->where('id',$user_id)
            ->first();
            
        $path = 'storage/pdf/yearreports/' .$user_id.'-'.$labyear. '_yearreports.pdf';

        $pdf = PDF::loadView('admin.yearwisepdf',compact('getcurrentplan','patient_lab_detail','pdetails','userdetails'))->save($path);

        
        $response = array(
                                        "data" => $path,
                                        "error_code" => 0,
                                        "message" => 'Pdf Link' 
        );

        return response()->json($response);
    }

    public function shareprescriptionpdf(Request $request)
    {
        $user_id=request('user_id');

        $getdate=request('date');

        
        $date=date('Y-m-d', strtotime($getdate));

        $month=date('m', strtotime($getdate));

        $priscription_count = PatientPriscription::select('id','medicine_name','dose','freq','route','duration','created_at')->where('patient_id',$user_id)->whereDate('created_at', '=', $date)->get();

        if($priscription_count == null)
        {
            $priscription_count = PatientPriscription::select('id','medicine_name','dose','freq','route','duration','created_at')->where('patient_id',$user_id)->whereMonth('created_at', '=', $month)->orderBY('created_at','desc')->get();
        }

        $pdetails = DB::table('patient_detail')->select('*')
            ->where('patient_id',$user_id)
            ->first();

        $userdetails = DB::table('users')->select('*')
            ->where('id',$user_id)
            ->first();

        $patient_diagnosis = PatientDiagnosis::where('patient_id',$user_id)->get();

        $path = 'storage/pdf/prescription/' .$user_id.'-'.$date. '_prescription.pdf';

        $pdf = PDF::loadView('admin.getprescriptionpdf',compact('priscription_count','pdetails','userdetails','patient_diagnosis'))->save($path);

        $response = array(
                    "data" => $path,
                    "error_code" => 0,
                    "message" => 'Pdf Link' 
        );
    }
    public function getcallstatus(Request $request)
    {
        
        try{
            $type=request('type');

            if($type=='videocall')
            {
                $id=request('patient_id');

                $videocall=Videocall::where('patient_id',$id)
                ->orderBy('id', 'desc')
                ->with('doctor_fee')->first();
                $response = array(
                                    "data" => $videocall,
                                    "error_code" => 0,
                                    "message" => 'Videocall status updated' 
                );
            }

            if($type=='patientdetail')
            {
                $id=request('patient_id');

                $patientdetail=PatientDetail::
                where('patient_id',$id)
                ->first();
                $response = array(
                                    "data" => $patientdetail,
                                    "error_code" => 0,
                                    "message" => 'Patientdetail status updated' 
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
    public function updatecallstatus(Request $request)
    {
        try{
            $type=request('type');

            if($type=='videocall')
            {
                $id=request('patient_id');

                $videocall=Videocall::where('patient_id',$id)->orderBy('id', 'desc')->first();

                $videocall_id=isset($videocall->id)?$videocall->id:'';
                
                $videocall=Videocall::where('id',$videocall_id)->update([
                    'call_start_status' => request('status')
                ]);
                
                $videocall=Videocall::where('id',$videocall_id)->orderBy('id', 'desc')->first();
                
                $response = array(
                                    "data" => $videocall,
                                    "error_code" => 0,
                                    "message" => 'Videocall status updated' 
                );
            }

            if($type=='patientdetail')
            {
                $id=request('patient_id');

                $patientdetail = PatientDetail::where('patient_id',$id)->update([
                    'is_book_call' => request('status')
                ]);

                $patientdetail=PatientDetail::where('patient_id',$id)->first();

                $response = array(
                                    "data" => $patientdetail,
                                    "error_code" => 0,
                                    "message" => 'Patientdetail status updated' 
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
    public function cancelRequestBypatient(Request $request)
    {
        try{
            $patient_videocall =  Videocall::select('*')->where('id',$request->request_id)->orderBy('id', 'desc')->get();

            

            $patient_detail = User::select('*')->where('id',$patient_videocall['0']->patient_id)->first()->toArray();

            if($patient_videocall['0']->call_status==1)
            {
                            
                            $doctor_debit_amt=$request->doctor_debit_amt;
                            $doctorBalance= new DoctorBalance();
                            $doctorBalance->doctor_id=$patient_videocall['0']->doctor_id;
                            $doctorBalance->patient_id=$patient_videocall['0']->patient_id;
                            $doctorBalance->debitAmount=$doctor_debit_amt;
                            $doctorBalance->amount_description='refund money';
                            $doctorBalance->online_amount='0';
                            $doctorBalance->offline_amount='0';
                            $doctorBalance->total_amount='0';
                            //dd($doctorBalance);
                            $doctorBalance->save();

                            $patient_wallet=  PatientWalletDetail::select('*')->where('id',$patient_videocall['0']->patient_id)->orderBy('id', 'desc')->get();

                            $patient_balance = PatientWalletDetail::where('patient_id',$patient_videocall['0']->patient_id)->get()->toArray();

                            $wallet = PatientWalletDetail::where('patient_id',$patient_videocall['0']->patient_id)->orderby('id','Desc')->first();
                            $patient_credit_amt=$request->patient_credit_amt;

                            $balance=$wallet->total_amount+$patient_credit_amt;

                            
                            $patientWalletDetail=new PatientWalletDetail();
                            $patientWalletDetail->patient_id=$patient_videocall['0']->patient_id;
                            $patientWalletDetail->credit_amount=$patient_credit_amt;
                            $patientWalletDetail->debit_amount='0';
                            $patientWalletDetail->total_amount=$balance;
                            $patientWalletDetail->amount_description='refund money';
                            $patientWalletDetail->in_wallet='0';
                            $patientWalletDetail->payment_id='0';
                            $patientWalletDetail->save();
            }

            $patient_videocall =  Videocall::select('*')->where('id',$request->request_id)->update([
                'request_status' => 3,
                'response_status'=>3,
                'call_status'=>3,
            ]);

            $noti_type = 'book_cancel_request';
            $new_user='testdoctor';
            $from_user = 'doctor';

            $patient_videocall =  Videocall::select('*')->where('id',$request->request_id)->orderBy('id', 'desc')->get();

            $doctor_msg = array(
                    'body' => 'Video call request is cancel by '.$patient_detail["fname"],
                    'title' => 'Video call response.',
                    'icon' => 'myicon',
                    'sound' => 'mySound'
            );

            $patient_doctor_msg = array(
                    'id' => $patient_videocall['0']->id,
                    'noti_type' => $noti_type,
                    'patient_id' => $patient_videocall['0']->patient_id,
                    'call_status' => $patient_videocall['0']->call_status,
                    'doctor_id' => $patient_videocall['0']->doctor_id,
                    'from_user' => $from_user,
                    'total_requested_time' => $patient_videocall['0']->total_requested_time,
                    'diagnosis' => $patient_videocall['0']->diagnosis,
                    'complaints' => $patient_videocall['0']->complaints,
                    'response_status' => $patient_videocall['0']->response_status,
                    'request_status' => $patient_videocall['0']->request_status,
                    'reject_reason'=>$patient_videocall['0']->rejectReason,
                    'test_user'=>$new_user
            );

            if($patient_videocall['0']->doctor_id == ''){

            
            $doctor_detail = User::select('*')->where('id',$patient_videocall['0']->doctor_id)->first()->toArray();
            
            $patient_detail_id = $doctor_detail['device_id'];
            PushNotification::PushAndroidNotificationUser($doctor_msg, $patient_doctor_msg, [$patient_detail_id]);
            }

            
            $response = array(
                                    "data" => $patient_videocall,
                                    "error_code" => 0,
                                    "message" => 'Videocall status updated' 
            );

        
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => [],
                    "error_code" => 1,
                    "message" => 'No record Found' 
            );
        }
        return response()->json($response);
    }
    
    public function Getmedicinelist(Request $request)
    {
        try{
            $DrugName = DrugName::select('*')->where('status',1)->orderBy('id', 'desc')->get();
            if($DrugName){
                $response = array(
                    "data" => $DrugName,
                    "error_code" => 0,
                    "message" => 'Patient medicines available' 
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

    public function getPriscriptionDocCoach(Request $request)
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
     public function getPriscriptionDatewise(Request $request)
    {
        $date=request('date');
        
        $patient_id=request('patient_id');

          try{



            $messages = [

                    'required' => ':attribute is required.',

                    'patient_id.required' => 'Patient Id is required.',
                      
                     'date.required' => 'date is required.',
            ];

                $validator = Validator::make($request->all(), [

                            'patient_id' => 'required|integer',
                            
                           'date' => 'required',

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

         $priscription_count = PatientPriscription::
             select('id','medicine_name','dose','freq','route','duration','created_at','doctor_id')
             ->where('patient_id',$request->patient_id)
             ->whereDate('created_at', '=', date($date))
             ->groupBy('doctor_id')
             ->get();
        $others=Others::where('patient_id',$request->patient_id)->latest()->first();
        
       //dd($priscription_count);
              $response1=[];
             $prescriptiondata=[];
             $doctordata=[];
             $pres_data=[];
             foreach($priscription_count as $value){
                 
                 
                 $prescriptiondata=array(
                     'id'=>$value->id,
                     'medicine_name'=>$value->medicine_name,
                     'dose'=>$value->dose,
                     'freq'=>$value->freq,
                     'route'=>$value->route,
                     'duration'=>$value->duration,
                     'created_at'=>$value->created_at->toDateTimeString(),
                     //'releventpoint'=>$value->releventpoint,
                     //'examination_lab_finding'=>$value->examination_lab_finding,
                     //'suggest_investigation'=>$value->suggest_investigation,
                     //'special_investigation'=>$value->special_investigation,
                 );
                $priscription_counts = PatientPriscription::
                 select('id','medicine_name','dose','freq','route','duration','created_at','doctor_id')
                 ->where('doctor_id',$value->doctor_id)
                 ->whereDate('created_at', '=', date($date))
                 ->where('patient_id',$request->patient_id)
                 ->get();
             
                foreach($priscription_counts as $values1)
                 {
                      $pres_data[]=array(
                         'id'=>$values1->id,
                         'medicine_name'=>$values1->medicine_name,
                         'dose'=>$values1->dose,
                         'freq'=>$values1->freq,
                         'route'=>$values1->route,
                         'duration'=>$values1->duration,
                         'created_at'=>$values1->created_at->toDateTimeString(),
                        
                        );
                 }
                 $name = User::select('id','fname')
                         ->where('id',$value->doctor_id)
                         ->first();
                
                 $dr_details = DoctorDetail::select('doctors.fee_of_consultation','doctors.mbbs_registration_number','doctors.md_ms_dnb_registration_number','ct.city as cityname','doctor_speciality.speciality as speciality')
                         ->leftjoin('city as ct', 'doctors.city', '=', 'ct.id')
                         ->leftjoin('doctor_speciality', 'doctors.speciality', '=', 'doctor_speciality.id')
                         ->where('doctors.doctor_id',$value->doctor_id)
                         ->groupby('doctors.doctor_id')
                         ->first();
                
                $patient_diagnosis = PatientDiagnosis::select('id','diagnosis','year')->where('patient_id',$value->doctor_id)->get()->toArray();
                       
                $doctordata[]=array( 'doctor_id'=>$value->doctor_id,
                    'doctor_name'=>isset($name->fname)?$name->fname:'',
                    'dr_fees'=>isset($dr_details)?$dr_details->fee_of_consultation:'',
                    'created_at'=>$value->created_at->toDateTimeString(),
                    'speciality'=>isset($dr_details)?$dr_details->speciality:'',
                    'mbbs_registration_number'=>isset($dr_details)?$dr_details->mbbs_registration_number:'',
                    'md_ms_dnb_registration_number'=>isset($dr_details)?$dr_details->md_ms_dnb_registration_number:'',
                    'city'=>isset($dr_details)?$dr_details->cityname:'',
                    'prescriptiondata'=>$pres_data,
                    'diagnosis'=>$patient_diagnosis,
                    'releventpoint'=>isset($others->releventpoint)?$others->releventpoint:'',
                     'examination_lab_finding'=>isset($others->examination_lab_finding)?$others->examination_lab_finding:'',
                     'suggest_investigation'=>isset($others->suggest_investigation)?$others->suggest_investigation:'',
                     'special_investigation'=>isset($others->special_investigation)?$others->special_investigation:'',
                    );
                     unset($pres_data);
                 $response1=array(
                     'doctordata'=>$doctordata,
                     
                     //'prescriptiondata'=>$prescriptiondata
                );
                
                
             }
            //dd($pres_data);
            //$response1['doctordata']['prescriptiondata']=$response1;
            $response = array(

                "data" =>$response1,

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
}

