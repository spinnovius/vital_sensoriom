<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Mail;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Doctor;
use App\DoctorDetail;
use App\Role;
use App\HealthTeam;
use App\DoctorBankDetail;
use App\DoctorBalance;
use App\UserLocation;
use App\AdminNotification;
use App\Clinic;
use App\Poc;
use App\City;
use Auth;
use App\Experties;
use App\Panelists;
use App\Admin_manager;
use App\User;
use PDF;
use App\Helpers\Notification\PushNotification;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller {

    public function viewall_pending_doctor(Request $request) {
        
        return view('admin/allpending_doctor_list');
    }

    public function viewall_approve_doctor(Request $request) {
        
        return view('admin/approve_doctor_list');
    }


    public function doctorall_detail($id) {

        // $doctor = Doctor::where('id', $id)->get()->toarray();
        
        $doctor = DB::table('users')
                ->select('users.id', 'users.fname', 'users.email', 'users.contact_number','users.verified','users.status','users.created_at','doctors.fee_of_consultation','doctors.mbbs_registration_number','doctors.mbbs_authority_council_name','doctors.md_ms_dnb_registration_number','doctors.md_ms_dnb_authority_council_name','doctors.dm_mch_dnb_registration_number','doctors.dm_mch_dnb_authority_council_name','doctors.profile_pic','doctors.document','doctors.available','doctor_speciality.speciality','role.role','city.city','doctors_balance.online_amount','doctors_balance.offline_amount','doctors_balance.total_amount','doctors_bank_detail.beneficiary_name','.doctors_bank_detail.bank_name','doctors_bank_detail.account_number','doctors_bank_detail.ifsc_code')
                ->leftjoin('doctors', 'users.id', '=', 'doctors.doctor_id')
                ->leftjoin('doctor_speciality', 'doctors.speciality', '=', 'doctor_speciality.id')
                ->leftjoin('role', 'users.role_id', '=', 'role.id')
                ->leftjoin('city', 'doctors.city', '=', 'city.id')
                ->leftjoin('doctors_balance', 'users.id', '=', 'doctors_balance.doctor_id')
                ->leftjoin('doctors_bank_detail', 'users.id', '=', 'doctors_bank_detail.doctor_id')
                ->where('users.id', $id)
                ->first();

        return view('admin/viewall_doctor_detail',array('doctor' => $doctor));
    }

    public function pendingdoctorarray(Request $request) {
        $response = [];

        $users = Doctor::select('id', 'fname', 'lname', 'email', 'contact_number', 'role_id', 'verified', 'status')->where('role_id',2)->where('verified',0)->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            $sub[] = ($user['fname']) ? ucfirst($user['fname']) : "-";
            // $sub[] = ($user['lname']) ? $user['lname'] : "-";
            $sub[] = ($user['email']) ? $user['email'] : "-";
            $sub[] = $user['contact_number'];

            $admin_role = Role::select('role')->where('id',$user['role_id'])->first();

            $sub[] = $admin_role['role'];

            if($user['verified'] == 0)
            {
            $sub[] = '<a  style="color:red" href="#" onclick="return verified_doctor('.$id.')" data-toggle="modal" data-target="#myModal"><label class="label label-danger" data-toggle="tooltip" title="click here to verified">Unverified</label></a>' . ' ';
            }
            elseif($user['verified'] == 1)
            {
            $sub[] = '<label class="label label-success">Verified</label>' . ' ';   
            }

            if($user['status'] == 1)
            {
                $verified_url = route('doctor.verified', array($id , 0));
                // $sub[] = '<a style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this doctor ?`)"  href="#"><label class="label label-danger">Active</label></a>' . ' ';
                $sub[] = '<label class="label label-success">Active</label>' . ' ';
            }
            elseif($user['status'] == 0)
            {
                $verified_url = route('doctor.verified', array($id, 1));
                // $sub[] = '<a style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this doctor ?`)"  href="#"><label class="label label-success">Inactive</label></a>' . ' ';
                $sub[] = '<label class="label label-danger">Inactive</label>' . ' ';
            }
            // $sub[] = '<a style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to verified this doctor ?`)"  href="#"><label class="label label-success">Unverified</label></a>' . ' ';

            $delete_url = route("doctor.delete", $id);

            if ($user['role_id'] != 1) {
                $action = '<a href="' . route('doctor.doctorall_detail', $id) . '"><i class="fa fa-list" aria-hidden="true"></i></a>' . ' ';
                // $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this doctor ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
            } else {
                $action = '<a href="' . route('doctor.doctorall_detail', $id) . '"><i class="fa fa-list" aria-hidden="true"></i></a>' . ' ';
            }
            $sub[] = $action;
            $sub[] = $response[] = $sub;
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }

    public function approvedoctorarray(Request $request) {
        $response = [];

        $users = Doctor::select('id', 'fname', 'lname', 'email', 'contact_number', 'role_id', 'verified', 'status')->where('role_id',2)->where('verified',1)->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            $sub[] = ($user['fname']) ? ucfirst($user['fname']) : "-";
            // $sub[] = ($user['lname']) ? $user['lname'] : "-";
            $sub[] = ($user['email']) ? $user['email'] : "-";
            $sub[] = $user['contact_number'];

            $admin_role = Role::select('role')->where('id',$user['role_id'])->first()->toArray();

            $sub[] = $admin_role['role'];

            
            $sub[] = '<a  style="color:red" href="#" onclick="return doctor_notification('.$id.')" data-toggle="modal" data-target="#myModal1"><label class="label label-info" data-toggle="tooltip" title="click here to send notification">Send Notification</label></a>' . ' ';   
         

            if($user['status'] == 1)
            {
                $verified_url = route('doctor.verified', array($id , 0));
                $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this doctor ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>' . ' ';
            }
            elseif($user['status'] == 0)
            {
                $verified_url = route('doctor.verified', array($id, 1));
                $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this doctor ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>' . ' ';
            }
            // $sub[] = '<a style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to verified this doctor ?`)"  href="#"><label class="label label-success">Unverified</label></a>' . ' ';

            $delete_url = route("doctor.delete", $id);

            if ($user['role_id'] != 1) {
                $action = '<a href="' . route('doctor.createpdf', $id) . '"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>' . ' ';
                $action .= '<a href="' . route('doctor.doctorall_detail', $id) . '"><i class="fa fa-list" aria-hidden="true"></i></a>' . ' ';
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this doctor ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
            } else {
                $action = '<a href="' . route('doctor.doctorall_detail', $id) . '"><i class="fa fa-list" aria-hidden="true"></i></a>' . ' ';
            }

            $sub[] = $action;
            $sub[] = $response[] = $sub;
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }


    public function createpassword(Request $request) {

        $messages = [
            'required' => ':attribute is required.',
            'password.required' => 'Password is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'password' => 'required|max:14|min:6',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $password = app('hash')->make($request->password);
        Doctor::whereId($request->id)->update([
            'verified' => 1,
            'password' => $password,
            ]);

        $doctor_detail = Doctor::select('fname','email')->where('id',$request->id)->get()->toArray();
        $email = $doctor_detail[0]['email'];
        $name = $doctor_detail[0]['fname'];
        $data['to_email'] = $email;
        $para = array('fname' => $name, 'password' => $request->password, 'type' => 'Doctor');
        $mail = Mail::send('emailTemplate.createdoctorpassword', ['parameter' => $para], function ($m) use($data) {
                        $m->from('hello@sensoriom.com', 'Sensoriom');
                        $m->to($data['to_email'])->subject('Sensoriom | Password for Sensoriom doctor');
                    });
        
        // dd($mail);
        return redirect()->route('doctor.viewall_pending_doctor')->with('success', "Doctor's password created successfully");
    }

    public function verified($id,$status) {
        // echo $id;
        $doctor = Doctor::select('fname')->where('id',$id)->first();
        Doctor::whereId($id)->update([
            'status' => $status,
            ]);

        if($status == 1)
        {
            $msg = 'active';
        }
        elseif($status == 0)
        {
            $msg = 'inactive';
        }

        return redirect()->route('doctor.viewall_approve_doctor')->with('success',ucfirst($doctor->fname).' is '.$msg.' successfully.');
    }

    public function delete($id) {
        try{
            
            $patient_health_team_count = HealthTeam::select('id')->where('doctor_id',$id)->count();
            $doctors_bank_detail_count = DoctorBankDetail::select('id')->where('doctor_id',$id)->count();
            $doctors_balance_count = DoctorBalance::select('id')->where('doctor_id',$id)->count();
            $location_count = UserLocation::where('user_id',$id)->count();

            if($patient_health_team_count > 0)
            {
                $patient_health_team = HealthTeam::select('id')->where('doctor_id',$id)->first();
                HealthTeam::where('id',@$patient_health_team->id)->delete();
            }

            if($doctors_bank_detail_count > 0)
            {
                $doctors_bank_detail = DoctorBankDetail::select('id')->where('doctor_id',$id)->first();
                DoctorBankDetail::where('id',@$doctors_bank_detail->id)->delete();
            }
             
            if($doctors_balance_count > 0)
            {
                $doctors_balance = DoctorBalance::select('id')->where('doctor_id',$id)->first();
                DoctorBalance::where('id',@$doctors_balance->id)->delete();
            }

            if(DoctorDetail::select('id')->where('doctor_id',$id)->count() > 0)
            {
                $doctor = DoctorDetail::select('id')->where('doctor_id',$id)->first();
                DoctorDetail::where('id', $doctor->id)->delete();
            }
            if($location_count > 0)
            {
                $location = UserLocation::select('id')->where('user_id',$id)->first();
                UserLocation::where('id', $location->id)->delete();   
            }
            
            Doctor::where('id', $id)->delete();

            return redirect()->route('doctor.viewall_approve_doctor')->with('success', 'Doctor deleted successfully');
        }catch (\Illuminate\Database\QueryException $exc) {
            return redirect()->route('doctor.viewall_approve_doctor')->with('danger', 'Doctor deleted failed');
        }

    }


    public function sendnotification(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'message.required' => 'Message is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'message' => 'required',
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

        $doctor_detail = Doctor::select('device_id')->where('id',$request->id)->first();
        
        $device_id = $doctor_detail->device_id;

        // $device_id = "esq4M4CJHUM:APA91bFUDj5E69vDWiDfEbpA49lv3aeznPFrK12lXBqETGCVQXUUE1RteULAE_0ss_KX5FJfiw1v6fXnFgL_5PwpUy3uKSKTZ-5iUufgLnGWvvHc84abe-pw15HJxZ2UBkriPwSa-wpkdehkv23yQu-kN0BxLHqU6A";

        $msg = array(
            'body' => $request->message,
            'title' => 'Vitalx',
            'icon' => 'myicon',
            'sound' => 'mySound'
        );

        $notificationdata = array('type' => 'Doctor');
        
        PushNotification::PushAndroidNotificationUser($msg, $notificationdata, [$device_id]);

        $notification = new AdminNotification;
        $notification->from_id = $request->id;
        $notification->to_id = $request->id;
        $notification->notification_description = $request->message;
        $notification->status = 0;
        $notification->save();

        return redirect()->route('doctor.viewall_approve_doctor')->with('success', 'Doctor notification send successfully');

        }catch (\Illuminate\Database\QueryException $exc) {
            return redirect()->route('doctor.viewall_approve_doctor')->with('danger', 'Doctor notification send failed');
        }
    }



    public function createpdf($id) {
        try{
            
            $doctor_all_detail = DB::table('users')
                                ->select('users.fname','users.email','users.contact_number','users.verified','doctors.exp_year','doctors.fee_of_consultation','doctors.mbbs_registration_number','doctors.mbbs_authority_council_name','doctors.md_ms_dnb_registration_number','doctors.md_ms_dnb_authority_council_name','doctors.dm_mch_dnb_registration_number','doctors.dm_mch_dnb_authority_council_name','doctors.profile_pic','doctor_speciality.speciality','doctors_bank_detail.bank_name','doctors_bank_detail.account_number','doctors_bank_detail.ifsc_code','doctors_bank_detail.beneficiary_name','city.city')
                                ->leftjoin('doctors','users.id','doctors.doctor_id')
                                ->leftjoin('doctor_speciality','doctors.speciality','doctor_speciality.id')
                                ->leftjoin('doctors_bank_detail','doctors.doctor_id','doctors_bank_detail.doctor_id')
                                ->leftjoin('city','doctors.city','city.id')
                                ->where('users.id',$id)
                                ->first();

            $doctors_balance = DB::table('doctors_balance')
                            ->select('doctors_balance.id','doctors_balance.online_amount','doctors_balance.total_amount','doctors_balance.amount_description',DB::raw('users.fname as patient_name'))
                            ->leftjoin('users','doctors_balance.patient_id','users.id')
                            ->where('doctors_balance.doctor_id',$id)
                            ->orderby('id','asc')
                            ->get()
                            ->toArray();

            $doctor_call_history = DB::table('call_history')
                                ->select('call_history.id','call_history.calling_time','call_history.created_at','users.fname')
                                ->leftjoin('users','call_history.patient_id','users.id')
                                ->where('call_history.doctor_id',$id)
                                ->orderby('id','asc')
                                ->get()
                                ->toArray();

            $doctor_health_team = HealthTeam::where('doctor_id',$id)->orderby('id','asc')->get()->toArray();

            if($doctor_all_detail->verified == 1)
            {
                $status = "Verified";
            }
            else
            {
                $status = "Unverified";
            }

            $data = [
                'title' => $doctor_all_detail->fname,
                'name' => $doctor_all_detail->fname,
                'email' => $doctor_all_detail->email,
                'contact_number' => $doctor_all_detail->contact_number,
                'status' => $status,
                'exp_year' => $doctor_all_detail->exp_year,
                'fee_of_consultation' => $doctor_all_detail->fee_of_consultation,
                'mbbs_registration_number' => $doctor_all_detail->mbbs_registration_number,
                'mbbs_authority_council_name' => $doctor_all_detail->mbbs_authority_council_name,
                'md_ms_dnb_registration_number' => $doctor_all_detail->md_ms_dnb_registration_number,
                'md_ms_dnb_authority_council_name' => $doctor_all_detail->md_ms_dnb_authority_council_name,
                'dm_mch_dnb_registration_number' => $doctor_all_detail->dm_mch_dnb_registration_number,
                'dm_mch_dnb_authority_council_name' => $doctor_all_detail->dm_mch_dnb_authority_council_name,
                'city' => $doctor_all_detail->city,
                'speciality' => $doctor_all_detail->speciality,
                'profile_pic' => $doctor_all_detail->profile_pic,
                'bank_name' => $doctor_all_detail->bank_name,
                'account_number' => $doctor_all_detail->account_number,
                'ifsc_code' => $doctor_all_detail->ifsc_code,
                'beneficiary_name' => $doctor_all_detail->beneficiary_name,
                'doctors_balance' => $doctors_balance,
                'health_team' => $doctor_health_team,
                'doctor_call_history' => $doctor_call_history
            ];

            $pdf = PDF::loadView('admin/doctorpdf', $data);

            return $pdf->download(ucfirst($doctor_all_detail->fname).'.pdf');

        }catch (\Illuminate\Database\QueryException $exc) {
            return redirect()->route('doctor.viewall_approve_doctor');
        }

    }


    

    public function add_poc(Request $request){

        return view('admin/add_poc');
    }

    public function store_poc(Request $request){

        $messages = [
            'required' => ':attribute is required.',
            'poc_no.required' => 'POC Number is required.',
            'manager_name.required' => 'Manager Name is required',
            'city.required' => 'City  is required',
            'pincode.required' => 'Pincode is required',
            'phone_number.required' => 'Phone_number is required',
            'email.required' => 'Email address is required',            
        ];

        $validator = Validator::make($request->all(), [
                    'poc_no' => 'required|integer',
                    'manager_name' => 'required',
                    'city' => 'required',
                    'pincode' => 'required|size:6|integer',
                    'phone_number' => 'required|max:10|min:10',
                    'email' => 'required|email',
                    'password' => 'required|max:14|min:6',                                    
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }
       // dd($request->all());
        // dd($poc);

        $password = app('hash')->make($request->password);
        $pointofcare = new Poc;
        $pointofcare->poc_no = $request->poc_no;
        $pointofcare->status = 1;
        $pointofcare->manager_name = $request->manager_name;
        $pointofcare->city = $request->city;
        $pointofcare->pincode = $request->pincode;
        $pointofcare->phone_number = $request->phone_number;
        $pointofcare->email = $request->email;
        $pointofcare->password = $password;
        
        $pointofcare->save();
         // dd("vjhgfgv");
        // return redirect()->route('clinic.add_clinic');
        return redirect()->route('poc.all_poc')->with('success','POC added successfully.');
    }

    public function all_poc(Request $request){

        $pointofcare = Poc::all();
        return view('admin.all_poc',['Poc'=>$pointofcare]);
    }

    public function pocallarray(Request $request) {
        $response = [];

        $pointofcare = Poc::select('id', 'poc_no', 'manager_name',  'city', 'pincode', 'phone_number','email', 'status')->get();
        $pointofcare = $pointofcare->toArray();
        foreach ($pointofcare as $pointofcare) {
            $sub = [];
            $id = $pointofcare['id'];
            $sub[] = $id;
            $sub[] = ($pointofcare['poc_no']) ? ucfirst($pointofcare['poc_no']) : "-";
            $sub[] = ($pointofcare['manager_name']) ? $pointofcare['manager_name'] : "-";
            $sub[] = ($pointofcare['city']) ? $pointofcare['city'] : "-";
            $sub[] = ($pointofcare['pincode']) ? $pointofcare['pincode'] : "-";
            $sub[] = ($pointofcare['phone_number']) ? $pointofcare['phone_number'] : "-";
            $sub[] = ($pointofcare['email']) ? $pointofcare['email'] : "-";
            
            
           

            if($pointofcare['status'] == 1)
            {
                $verified_url = route('poc.verifiedpoc', array($id , 0));
                $sub[] = '<a  onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this POC ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>' . ' ';
            }
            elseif($pointofcare['status'] == 0)
            {
                $verified_url = route('poc.verifiedpoc', array($id, 1));
                $sub[] = '<a   onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this POC ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>' . ' ';
            }

            /* $sub[] = (date('m-d-Y', strtotime($user['created_at'])));*/

            $delete_url1 = route("poc.deletepoc", $id);

            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('poc.editpoc', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url1 . '`,`Are you sure you want to delete this POC ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
            } else {
                $action = '<a href="' . route('poc.editpoc', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
            }
            $sub[] = $action;
            $sub[] = $response[] = $sub;
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }

    public function verifiedpoc($id,$status) {
        // echo $id;
        $pointofcare = Poc::select('poc_no')->where('id',$id)->first();
        Poc::whereId($id)->update([
            'status' => $status,
            ]);

        if($status == 1)
        {
            $msg = 'active';
        }
        elseif($status == 0)
        {
            $msg = 'inactive';
        }

        return redirect()->route('poc.all_poc')->with('success',ucfirst($pointofcare->poc_no).' is '.$msg.' successfully');
    }

    /*public function deletepoc($id) {
        Poc::where('Poc', $id)->delete();
        return redirect()->route('poc.all_poc')->with('success', 'POC deleted successfully');
    }*/

    public function editpoc($id) {
         $pointofcare = Poc::where('id', $id)->get()->toarray();
        return view('admin/add_poc',array('Poc' => $pointofcare));
    }

    public function updatepoc(Request $request) {
        // dd("kfjbdf");
        $messages = [
            'required' => ':attribute is required.',
            'poc_no.required' => 'POC no is required.',
            'manager_name.required' => 'Manager name is required',
            'city.required' => 'City is required',
            'pincode.required' => 'Pin code is required',
            'phone_number.required' => 'phone_number is required',
            'email.required' => 'Email address is required',
        ];
        $validator = Validator::make($request->all(), [
                    'poc_no' => 'required|integer',
                    'manager_name' => 'required',
                    'city' => 'required',
                    'pincode' => 'required|size:6|integer',
                    'phone_number' => 'required|max:10|min:10', 
                    'email' => 'required|email',          
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        Poc::whereId($request->id)->update([
            'poc_no' => $request->poc_no,
            'manager_name' => $request->manager_name,
            'city' => $request->city,
            'pincode' => $request->pincode,
            'phone_number' => $request->phone_number,  
            'email' => $request->email,
                              
            ]);
        
        return redirect()->route('poc.all_poc')->with('success', 'POC detail updated successfully');
    }

    public function deletepoc($id) {
        Poc::where('id', $id)->delete();
        return redirect()->route('poc.all_poc')->with('success', 'POC deleted successfully');
    }

    


    /*Panelists*/

    public function add_panelists(Request $request){

        $experties = Experties::all();

        return view('admin/add_panelists',array('experties' => $experties));
    }

    public function store_panelists(Request $request){
       
        $messages = [
            'required' => ':attribute is required.',
            'name.required' => 'Name is required.',
            'expertise.required' => 'Expertise is required',
            'city.required' => 'City  is required',
            'phone_number.required' => 'Phone_number is required',
            'email.required' => 'Email address is required',            
        ];

        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'expertise' => 'required',
                    'city' => 'required',
                    'phone_number' => 'required|max:10|min:10',
                    'email' => 'required|email',
                    'password' => 'required|max:14|min:6',                                    
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }
       // dd($request->all());
        // dd($poc);

        $password = app('hash')->make($request->password);
        $panelists = new Panelists;
        $panelists->name = $request->name;
        $panelists->status = 1;
        $panelists->expertise = $request->expertise;
        $panelists->city = $request->city;
        $panelists->phone_number = $request->phone_number;
        $panelists->email = $request->email;
        $panelists->password = $password;
       
        $panelists->save();

        return redirect()->route('panelists.all_panelists')->with('success','panelists added successfully.');
    }

    public function panelistsarray(Request $request) {
        $response = [];

        $panelists = Panelists::select('id', 'name', 'expertise', 'city', 'phone_number', 'email', 'status')->get();
        $panelists = $panelists->toArray();
        foreach ($panelists as $panelists) {
            $sub = [];
            $id = $panelists['id'];
            $sub[] = $id;
            $sub[] = ($panelists['name']) ? ucfirst($panelists['name']) : "-";

            $experties = Experties::select('expertise')->where('id',$panelists['expertise'])->first();
            $sub[] = ($experties['expertise']) ? $experties['expertise'] : "-";

            $sub[] = ($panelists['city']) ? $panelists['city'] : "-";
            $sub[] = ($panelists['phone_number']) ? $panelists['phone_number'] : "-";
            $sub[] = ($panelists['email']) ? $panelists['email'] : "-";
            
           
            

            if($panelists['status'] == 1)
            {
                $verified_url = route('panelists.verifiedpanelists', array($id , 0));
                $sub[] = '<a  onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this panelists ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>' . ' ';
            }
            elseif($panelists['status'] == 0)
            {
                $verified_url = route('panelists.verifiedpanelists', array($id, 1));
                $sub[] = '<a   onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this panelists ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>' . ' ';
            }

            // $sub[] = (date('m-d-Y', strtotime($user['created_at'])));

            $delete_url = route("panelists.deletepanelists", $id);

            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('panelists.editpanelists', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this panelists ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
            } else {
                $action = '<a href="' . route('panelists.editpanelists', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
            }
            $sub[] = $action;
            $sub[] = $response[] = $sub;
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }

    public function all_panelists(Request $request){

        $panelists = Panelists::all();
        return view('admin.all_panelists',['Panelists'=>$panelists]);
    }

    public function verifiedpanelists($id,$status) {
        // echo $id;
        $panelists = Panelists::select('name')->where('id',$id)->first();
        Panelists::whereId($id)->update([
            'status' => $status,
            ]);

        if($status == 1)
        {
            $msg = 'active';
        }
        elseif($status == 0)
        {
            $msg = 'inactive';
        }

        return redirect()->route('panelists.all_panelists')->with('success',ucfirst($panelists->name).' is '.$msg.' successfully');
    }

    public function editpanelists($id) {
        $experties = Experties::all();
        $panelists = Panelists::where('id', $id)->get()->toarray();

        return view('admin/add_panelists',array('Panelists' => $panelists,'expert' => $experties));
    }

    public function updatepanelists(Request $request) {
        // dd("kfjbdf");
        $messages = [
            'required' => ':attribute is required.',
            'name.required' => 'Name is required.',
            'expertise.required' => 'Expertise is required',
            'city.required' => 'City is required',
            'phone_number.required' => 'phone_number is required',
            'email.required' => 'Email address is required',
        ];
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'expertise' => 'required',
                    'city' => 'required',
                    'phone_number' => 'required|max:10|min:10', 
                    'email' => 'required|email',          
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        Panelists::whereId($request->id)->update([
            'name' => $request->name,
            'expertise' => $request->expertise,
            'city' => $request->city,
            'phone_number' => $request->phone_number,  
            'email' => $request->email,
                              
            ]);
        
        return redirect()->route('panelists.all_panelists')->with('success', 'Panelists detail updated successfully');
    }
    public function deletepanelists($id) {
        Panelists::where('id', $id)->delete();
        return redirect()->route('panelists.all_panelists')->with('success', 'Panelists deleted successfully');
    }


    /*Manager*/


    public function add_manager(Request $request){

        return view('admin/add_manager');
    }

    public function all_manager(Request $request){

        $admin_manager = Admin_manager::all();
        return view('admin.all_manager',['Admin_manager'=>$admin_manager]);
    }

    public function store_manager(Request $request){
       
        $messages = [
            'required' => ':attribute is required.',
            'email.required' => 'Email address is required',            
        ];

        $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
                    'password' => 'required|max:14|min:6',                                    
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }
       // dd($request->all());
        // dd($poc);

        $password = app('hash')->make($request->password);
        $admin_manager = new Admin_manager;
        $admin_manager->status = 1;
        $admin_manager->email = $request->email;
        $admin_manager->password = $password;
       
        $admin_manager->save();

        return redirect()->route('manager.all_manager')->with('success','Manager added successfully.');
    }

    public function managerarray(Request $request) {
        $response = [];

        $admin_manager = Admin_manager::select('id','email', 'status')->get();
        $admin_manager = $admin_manager->toArray();
        foreach ($admin_manager as $admin_manager) {
            $sub = [];
            $id = $admin_manager['id'];
            $sub[] = $id;
            $sub[] = ($admin_manager['email']) ? ucfirst($admin_manager['email']) : "-";
            if($admin_manager['status'] == 1)
            {
                $verified_url = route('manager.verifiedmanager', array($id , 0));
                $sub[] = '<a  onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this manager ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>' . ' ';
            }
            elseif($admin_manager['status'] == 0)
            {
                $verified_url = route('manager.verifiedmanager', array($id, 1));
                $sub[] = '<a   onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this manager ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>' . ' ';
            }

            // $sub[] = (date('m-d-Y', strtotime($user['created_at'])));

            $delete_url = route("manager.deletemanager", $id);

            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('manager.editmanager', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this manager ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
            } else {
                $action = '<a href="' . route('manager.editmanager', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
            }
            $sub[] = $action;
            $sub[] = $response[] = $sub;
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }

    public function verifiedmanager($id,$status) {
        // echo $id;
        $admin_manager = Admin_manager::select('email')->where('id',$id)->first();
        Admin_manager::whereId($id)->update([
            'status' => $status,
            ]);

        if($status == 1)
        {
            $msg = 'active';
        }
        elseif($status == 0)
        {
            $msg = 'inactive';
        }

        return redirect()->route('manager.all_manager')->with('success',ucfirst($admin_manager->email).' is '.$msg.' successfully');
    }

    public function editmanager($id) {

        $admin_manager = Admin_manager::where('id', $id)->get()->toarray();
        return view('admin/add_manager',array('Admin_manager' => $admin_manager));
    }
    public function updatemanager(Request $request) {
        // dd("kfjbdf");
        $messages = [
            'required' => ':attribute is required.',
            'email.required' => 'Email address is required',
        ];
        $validator = Validator::make($request->all(), [
                    'email' => 'required|email',         
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        Admin_manager::whereId($request->id)->update([
            'email' => $request->email,
                              
            ]);
        
        return redirect()->route('manager.all_manager')->with('success', 'Manager detail updated successfully');
    }
    public function deletemanager($id) {
        Admin_manager::where('id', $id)->delete();
        return redirect()->route('manager.all_manager')->with('success', 'Manager deleted successfully');
    }




    /*CLINIC*/

    public function add_clinic(Request $request){

        $city = City::where('status',1)->get();
        return  view('admin/add_clinic',array('City' => $city));   
    }

    public function store_clinic(Request $request){

        $messages = [
            'required' => ':attribute is required.',
            'fname.required' => 'Clinic name is required.',
            'city.required' => 'City is required.',
            'address.required' => 'Address is required.',
            'email.required' => 'Email Id is required.',
            'password.required' => 'Password is required.',
            'contact_number.required' => 'Contact Number is required.',
        ];

        $validator = Validator::make($request->all(), [
                    'fname' => 'required',
                    'city' => 'required',
                    'address' => 'required',
                    'email' => 'required|email',
                    'password' => 'required|max:14|min:6',
                    'contact_number' => 'bail|required|numeric|digits:10',                  
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }
       // dd($request->all());
        $password = app('hash')->make($request->password);
        $clinic = new User();
        $clinic->fname = $request->fname;
        $clinic->lname = $request->lname;
        $clinic->email = $request->email;
        $clinic->password = $password;
        $clinic->contact_number = $request->contact_number;
        $clinic->device_id = $request->device_id;
        // $clinic->city = $request->city;
        $clinic->verified = 1;
        $clinic->role_id = 5;
        $clinic->view = 0;
        $clinic->status = 1;
        $clinic->save();
        $insertedId = $clinic->id;

        $password = app('hash')->make($request->password);
        $clinic = new Clinic;
        $clinic->fname = $request->fname;
        $clinic->status = 1;
        $clinic->address = $request->address;
        $clinic->city = $request->city;
        $clinic->email = $request->email;
        $clinic->password = $password;
        $clinic->contact_number = $request->contact_number;
        $clinic->user_id=$insertedId;
        $clinic->save();


        
        try {
            // $patients->notify(new WelcomeUser($patients));
        } catch (Exception $e) {
        }

    
        return redirect()->route('clinic.all_clinic')->with('success','Clinic added successfully.');
    }

    public function all_clinic(Request $request){

        $clinic = Clinic::all();
        return view('admin/all_clinic',['Clinic'=>$clinic]);
    }

    public function clinicallarray(Request $request) {
        $response = [];

        $clinic = Clinic::select('id', 'fname', 'address',  'city', 'email', 'contact_number', 'status')->get();
        $clinic = $clinic->toArray();
        foreach ($clinic as $clinic) {
            $sub = [];
            $id = $clinic['id'];
            $sub[] = $id;
            $sub[] = ($clinic['fname']) ? ucfirst($clinic['fname']) : "-";

            $city = City::select('city')->where('id',$clinic['city'])->first();
            $sub[] = ($city['city']) ? $city['city'] : "-";

            $sub[] = ($clinic['address']) ? $clinic['address'] : "-";
           /* $sub[] = ($clinic['city']) ? $clinic['city'] : "-";*/
            $sub[] = ($clinic['email']) ? $clinic['email'] : "-";
            $sub[] = ($clinic['contact_number']) ? $clinic['contact_number'] : "-";
            
           

            if($clinic['status'] == 1)
            {
                $verified_url = route('clinic.verifiedclinic', array($id , 0));
                $sub[] = '<a  onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this clinic ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>' . ' ';
            }
            elseif($clinic['status'] == 0)
            {
                $verified_url = route('clinic.verifiedclinic', array($id, 1));
                $sub[] = '<a   onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this clinic ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>' . ' ';
            }

            /* $sub[] = (date('m-d-Y', strtotime($user['created_at'])));*/

           $delete_url1 = route("clinic.deleteclinic", $id);

            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('clinic.editclinic', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url1 . '`,`Are you sure you want to delete this clinic ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
            } else {
                $action = '<a href="' . route('clinic.editclinic', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
            }
            $sub[] = $action;
            $sub[] = $response[] = $sub;
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }

    public function verifiedclinic($id,$status) {
        // echo $id;


        $clinic = Clinic::select('fname')->where('id',$id)->first();
        Clinic::whereId($id)->update([
            'status' => $status,
            ]);

        if($status == 1)
        {
            $msg = 'active';
        }
        elseif($status == 0)
        {
            $msg = 'inactive';
        }

        return redirect()->route('clinic.all_clinic')->with('success',ucfirst($clinic->fname).' is '.$msg.' successfully');
    }

    public function editclinic($id) {

         $city = City::all();
         $clinic = Clinic::where('id', $id)->get()->toarray();

        return view('admin/add_clinic',array('Clinic' => $clinic,'City' => $city));
    }
    public function deleteclinic($id) {
        Clinic::where('id', $id)->delete();
        return redirect()->route('clinic.all_clinic')->with('success', 'Clinic deleted successfully');
    }

    public function updateclinic(Request $request) {
    // dd("kfjbdf");
        $messages = [
            'required' => ':attribute is required.',
            'fname.required' => 'Clinic name is required.',
            'city.required' => 'City is required',
            'address.required' => 'Address is required.',
            'email.required' => 'Email Id is required.',
            'contact_number.required' => 'Contact Number is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'fname' => 'required',
                    'city' => 'required',
                    'address' => 'required',
                    'email' => 'required|email',
                    'contact_number' => 'required|max:10|min:10',               
                        ], $messages);
// dd("djgfvd");
        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        Clinic::whereId($request->id)->update([
            // dd($request->id);
            'fname' => $request->fname,
            'city' => $request->city,
            'address' => $request->address,
            'email' => $request->email,
            'contact_number' => $request->contact_number,                    
            ]);
        $ddd=Clinic::whereId($request->id)->first();
        $user_id=$ddd->user_id;
        User::whereId($user_id)->update([
            'fname' => $request->fname,
            'email' => $request->email,
            // 'city' => $request->city,
            'contact_number' => $request->contact_number,
        ]);
        
        return redirect()->route('clinic.all_clinic')->with('success', 'Clinic detail updated successfully');
    }


}
