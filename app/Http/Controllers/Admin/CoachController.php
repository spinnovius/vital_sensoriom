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
use App\User;
use App\CoachDetail;
use App\Role;
use App\HealthTeam;
use App\UserLocation;
use App\AdminNotification;
use PDF;
use App\Helpers\Notification\PushNotification;
use Illuminate\Support\Facades\Storage;

class CoachController extends Controller {

    public function viewall_pending_coach(Request $request) {

        return view('admin/allpending_coach_list');
    }

    public function viewall_approve_coach(Request $request) {

        return view('admin/approve_coach_list');
    }

    public function coachall_detail($id) {

        // $doctor = Doctor::where('id', $id)->get()->toarray();

        $coach = DB::table('users')
                ->select('users.id', 'users.fname', 'users.email', 'users.contact_number','users.verified','users.status','users.created_at','coach_detail.qualification','coach_detail.registration_number','coach_detail.profile_pic','coach_detail.document','role.role','city.city',DB::raw('authority_council.name as authority_council_name'))
                ->leftjoin('coach_detail', 'users.id', '=', 'coach_detail.coach_id')
                ->leftjoin('role', 'users.role_id', '=', 'role.id')
                ->leftjoin('city', 'coach_detail.city', '=', 'city.id')
                ->leftjoin('authority_council', 'coach_detail.authority_council_id', '=', 'authority_council.id')
                ->where('users.id', $id)
                ->first();

        return view('admin/viewall_coach_detail',array('coach' => $coach));
    }

    public function pendingcoacharray(Request $request) {
        $response = [];

        $users = User::select('id', 'fname', 'lname', 'email', 'contact_number', 'role_id', 'verified', 'status')->where('role_id',3)->where('verified',0)->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            if($user['fname']){
            $username='<a href="' . route('coach.coachall_detail', $id) . '">'.ucfirst($user['fname']).'</a>';
            }else{
            $username='<a href="' . route('coach.coachall_detail', $id) . '">-</a>';
            }
            $sub[] = $username;
            //$sub[] = ($user['fname']) ? ucfirst($user['fname']) : "-";
            // $sub[] = ($user['lname']) ? $user['lname'] : "-";
            $sub[] = ($user['email']) ? $user['email'] : "-";
            $sub[] = $user['contact_number'];

            $admin_role = Role::select('role')->where('id',$user['role_id'])->first()->toArray();

            $sub[] = $admin_role['role'];
            if(Session::get('admin_role') != 7){
              if($user['verified'] == 0)
              {
              $sub[] = '<a  style="color:red" href="#" onclick="return verified_coach('.$id.')" data-toggle="modal" data-target="#myModal"><label class="label label-danger" data-toggle="tooltip" title="click here for verified">Unverified</label></a>' . ' ';
              }
              elseif($user['verified'] == 1)
              {
              $sub[] = '<label class="label label-success">Verified</label>' . ' ';
              }

              if($user['status'] == 1)
              {
                  $verified_url = route('coach.verified', array($id , 0));
                  $sub[] = '<a style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this coach ?`)"  href="#"><label class="label label-success">Active</label></a>' . ' ';
              }
              elseif($user['status'] == 0)
              {
                  $verified_url = route('coach.verified', array($id, 1));
                  $sub[] = '<label class="label label-danger">Inactive</label>' . ' ';
              }
              // $sub[] = '<a style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to verified this doctor ?`)"  href="#"><label class="label label-success">Unverified</label></a>' . ' ';

              $delete_url = route("coach.delete", $id);

              if ($user['role_id'] != 1) {
                  $action = '<a href="' . route('coach.coachall_detail', $id) . '"><i class="fa fa-list" aria-hidden="true"></i></a>' . ' ';

              } else {
                  $action = '<a href="' . route('coach.coachall_detail', $id) . '"><i class="fa fa-list" aria-hidden="true"></i></a>' . ' ';
              }
              $sub[] = $action;
            }
            $sub[] = $response[] = $sub;
        }
        
        if(Session::get('admin_role') == 7){
            $UserId=Session::get('admin_id');
            $User=User::find($UserId);
            $manager_permissions=$User->manager_permissions;
            $manager_permissions=explode(",",$manager_permissions);
            //dd($manager_permissions);
            if(!in_array( 6 ,$manager_permissions )){
            $response=[];
            }
            //dd($response);
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }

    public function approvecoacharray(Request $request) {
        $response = [];

        $users = User::select('id', 'fname', 'lname', 'email', 'contact_number', 'role_id', 'verified', 'status')->where('role_id',3)->where('verified',1)->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            if($user['fname']){
            $username='<a href="' . route('coach.coachall_detail', $id) . '">'.ucfirst($user['fname']).'</a>';
            }else{
            $username='<a href="' . route('coach.coachall_detail', $id) . '">-</a>';
            }
            $sub[] = $username;
            //$sub[] = ($user['fname']) ? ucfirst($user['fname']) : "-";
            // $sub[] = ($user['lname']) ? $user['lname'] : "-";
            $sub[] = ($user['email']) ? $user['email'] : "-";
            $sub[] = $user['contact_number'];
            $admin_role = Role::select('role')->where('id',$user['role_id'])->first()->toArray();
            $sub[] = $admin_role['role'];
            if(Session::get('admin_role') != 7){
              $sub[] = '<a  style="color:red" href="#" onclick="return coach_notification('.$id.')" data-toggle="modal" data-target="#myModal1"><label class="label label-info" data-toggle="tooltip" title="click here to send notification">Send Notification</label></a>' . ' ';

              if($user['status'] == 1)
              {
                  $verified_url = route('coach.verified', array($id , 0));
                  $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this coach ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>' . ' ';
              }
              elseif($user['status'] == 0)
              {
                  $verified_url = route('coach.verified', array($id, 1));
                  $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this coach ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>' . ' ';
              }
              // $sub[] = '<a style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to verified this doctor ?`)"  href="#"><label class="label label-success">Unverified</label></a>' . ' ';

              $delete_url = route("coach.delete", $id);

              if ($user['role_id'] != 1) {
                  $action = '<a href="' . route('coach.createpdf', $id) . '"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>' . ' ';
                  $action .= '<a href="' . route('coach.coachall_detail', $id) . '"><i class="fa fa-list" aria-hidden="true"></i></a>' . ' ';
                  $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this coach ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
              } else {
                  $action = '<a href="' . route('coach.coachall_detail', $id) . '"><i class="fa fa-list" aria-hidden="true"></i></a>' . ' ';
              }
              $sub[] = $action;
            }
            $sub[] = $response[] = $sub;
        }
        
        if(Session::get('admin_role') == 7){
            $UserId=Session::get('admin_id');
            $User=User::find($UserId);
            $manager_permissions=$User->manager_permissions;
            $manager_permissions=explode(",",$manager_permissions);
            //dd($manager_permissions);
            if(!in_array( 7 ,$manager_permissions )){
            $response=[];
            }
            //dd($response);
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
        User::whereId($request->id)->update([
            'verified' => 1,
            'password' => $password,
            ]);

        $coach_detail = User::select('fname','email')->where('id',$request->id)->get()->toArray();

        $email = $coach_detail[0]['email'];
        $name = $coach_detail[0]['fname'];
        $data['to_email'] = $email;
        $para = array('fname' => $name, 'password' => $request->password, 'type' => 'Coach');
        Mail::send('emailTemplate.createdoctorpassword', ['parameter' => $para], function ($m) use($data) {
                        $m->from('vitalx@gmail.com', 'Sensoriom');
                        $m->to($data['to_email'])->subject('Sensoriom | Password for Sensoriom coach');
                    });

        // return view('emailTemplate/createdoctorpassword');
       return redirect()->route('coach.viewall_pending_coach')->with('success', "Coach's  password created successfully");
    }

    public function verified($id,$status) {
        // echo $id;
        $coach = User::select('fname')->where('id',$id)->first();
        User::whereId($id)->update([
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

        return redirect()->route('coach.viewall_approve_coach')->with('success',ucfirst($coach->fname).' is '.$msg.' successfully.');
    }

    public function delete($id) {
        try{
            $patient_health_team_count = HealthTeam::where('coach_id',$id)->count();
            $location_count = UserLocation::where('user_id',$id)->count();
            if($patient_health_team_count > 0)
            {
                $patient_health_team = HealthTeam::select('id')->where('coach_id',$id)->first();
                HealthTeam::where('id',@$patient_health_team->id)->delete();
            }

            if(CoachDetail::select('id')->where('coach_id',$id)->count())
            {
                $coach = CoachDetail::select('id')->where('coach_id',$id)->first();
                CoachDetail::where('id', $coach->id)->delete();
            }
            if($location_count > 0)
            {
                $location = UserLocation::select('id')->where('user_id',$id)->first();
                UserLocation::where('id', $location->id)->delete();
            }

            User::where('id', $id)->delete();
            return redirect()->route('coach.viewall_approve_coach')->with('success', 'Coach deleted successfully');

         }catch (\Illuminate\Database\QueryException $exc) {
            return redirect()->route('coach.viewall_approve_coach')->with('danger', 'Coach deleted failed');
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

            $coach_detail = User::select('device_id')->where('id',$request->id)->first();

            $device_id = $coach_detail->device_id;


            // $device_id = "cun0cnocBMM:APA91bFMtZEvALHcPncUmFNzT3aBy3t6JHsNj1JsAt4ne0J3OolfHhfyuT4PaWYWkrmC5dnL1n17kekitlq6RslbWyHhyhWWMXSMLJCOLqbG2zSXcqvBpedtE-jBYSTwcX7Wg8MZk14i";

            $msg = array(
                'body' => $request->message,
                'title' => 'Vitalx',
                'icon' => 'myicon',
                'sound' => 'mySound'
            );

            $notificationdata = array('message' => $request->message);

            PushNotification::PushAndroidNotificationUser($msg, $notificationdata, [$device_id]);

            $notification = new AdminNotification;
            $notification->from_id = $request->id;
            $notification->to_id = $request->id;
            $notification->notification_description = $request->message;
            $notification->status = 0;
            $notification->save();

            return redirect()->route('coach.viewall_approve_coach')->with('success', 'Coach notification send successfully');

            }catch (\Illuminate\Database\QueryException $exc) {
                return redirect()->route('coach.viewall_approve_coach')->with('danger', 'Coach notification send failed');
            }
    }


    public function createpdf($id) {
        try{

            $coach_detail = DB::table('coach_detail')
                            ->select('users.fname','users.email','users.contact_number','users.verified','coach_detail.qualification','coach_detail.registration_number','coach_detail.profile_pic','city.city',DB::raw('authority_council.name as council_name'))
                            ->leftjoin('users','coach_detail.coach_id','users.id')
                            ->leftjoin('city','coach_detail.city','city.id')
                            ->leftjoin('authority_council','coach_detail.authority_council_id','authority_council.id')
                            ->where('coach_detail.coach_id',$id)
                            ->first();

            if($coach_detail->verified == 1)
            {
                $status = "Verified";
            }
            else
            {
                $status = "Unverified";
            }

            $coach_health_team = HealthTeam::where('coach_id',$id)->orderby('id','asc')->get()->toArray();

            $data = [
                'title' => $coach_detail->fname,
                'coach_name' => $coach_detail->fname,
                'email' => $coach_detail->email,
                'contact_number' => $coach_detail->contact_number,
                'status' => $status,
                'qualification' => $coach_detail->qualification,
                'registration_number' => $coach_detail->registration_number,
                'profile_pic' => $coach_detail->profile_pic,
                'city' => $coach_detail->city,
                'authority_council_name' => $coach_detail->council_name,
                'health_team' => $coach_health_team
            ];

            $pdf = PDF::loadView('admin/coachpdf', $data);

            return $pdf->download(ucfirst($coach_detail->fname).'.pdf');

        }catch (\Illuminate\Database\QueryException $exc) {
            return redirect()->route('coach.viewall_approve_coach');
        }

    }




}
