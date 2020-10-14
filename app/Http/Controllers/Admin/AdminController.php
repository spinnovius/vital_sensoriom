<?php

namespace App\Http\Controllers\Admin;

use App\Clinic;
use App\Doctor;
use App\Http\Controllers\Controller;
use App\PatientHealthPlan;
use App\Poc;
use App\Role;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Mail;
use Session;
use Validator;

class AdminController extends Controller {

    public function testing(Request $request) {
        $password = Hash::make('55@Gajanannagar');
        dd($password);
    }
    
    public function index(Request $request) {
        if ($request->session()->has('admin_email')) {
            return self::dashboard($request);
        } else {
            return view('admin/loginNew');
        }
    }

    public function dashboard(Request $request) {

        return view('admin/dashboard');
    }

    public function viewall_admin(Request $request) {

        return view('admin/alladmin_list');
    }

    public function add_new(Request $request) {

        $role = Role::all()->toArray();

        return view('admin/add_admin',array('role' => $role));

    }

    public function edit($id) {

        $MasterAdmin = User::where('id', $id)->get()->toarray();
        $role = Role::all()->toArray();

        return view('admin/add_admin',array('role' => $role , 'admin' => $MasterAdmin));
    }

    public function store(Request $request) {

        $messages = [
            'required' => ':attribute is required.',
            'fname.required' => 'Firstname is required.',
            'lname.required' => 'Lastname is required',
            'email.required' => 'Email is required',
            'contact_number.required' => 'Contact number is required',
            'role.required' => 'Role is required',
            'password.required' => 'Password is required',
        ];
        $validator = Validator::make($request->all(), [
                    'fname' => 'required',
                    'lname' => 'required',
                    'email' => 'required|email',
                    'contact_number' => 'required',
                    'role' => 'required',
                    'password' => 'required|max:20|min:6',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $check_admin = User::where('contact_number', $request->contact_number)->count();
        if($check_admin > 0)
        {
            $errors1 = 'Your contact number is already exits.';
            return redirect()->back()->withInput($request->all())->withErrors($errors1);
        }
        else
        {

            $password = app('hash')->make($request->password);
            $masteradmin = new User;
            $masteradmin->fname = $request->fname;
            $masteradmin->lname = $request->lname;
            $masteradmin->email = $request->email;
            $masteradmin->contact_number = $request->contact_number;
            $masteradmin->password = $password;
            $masteradmin->role_id = $request->role;
            $masteradmin->verified = 1;
            $masteradmin->save();

            return redirect()->route('admin.new')->with('success','Add admin successfully.');
        }

    }

    public function adminarray(Request $request) {
        $response = [];

        $users = User::select('id', 'fname', 'lname', 'email', 'contact_number', 'role_id', 'verified', 'status')->where('role_id',1)->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            $sub[] = ($user['fname']) ? $user['fname'] : "-";
            $sub[] = ($user['lname']) ? $user['lname'] : "-";
            $sub[] = ($user['email']) ? $user['email'] : "-";
            $sub[] = $user['contact_number'];

            $admin_role = Role::select('role')->where('id',$user['role_id'])->first()->toArray();

            $sub[] = $admin_role['role'];

            if($user['verified'] == 1)
            {
                $verified_url = route('admin.verified', array($id , 0));
                $sub[] = '<a data-toggle="tooltip" title="click here to inactive" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to unverified this admin ?`)"  href="#"><label class="label label-success">Verified</label></a>' . ' ';
            }
            elseif($user['verified'] == 0)
            {
                $verified_url = route('admin.verified', array($id, 1));
                $sub[] = '<a data-toggle="tooltip" title="click here to active" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to verified this admin ?`)"  href="#"><label class="label label-danger">Unverified</label></a>' . ' ';
            }

            // $sub[] = (date('m-d-Y', strtotime($user['created_at'])));

            $delete_url = route("admin.delete", $id);

            if ($user['role_id'] == 1) {
                $action = '<a href="' . route('admin.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this admin ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
            } else {
                $action = '<a href="' . route('admin.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
            }
            $sub[] = $action;
            $sub[] = $response[] = $sub;
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }

    public function verified($id,$status) {
        // echo $id;
        $user_detail = User::select('fname')->where('id',$id)->first();
        User::whereId($id)->update([
            'verified' => $status,
            ]);

        if($status == 1)
        {
            $msg = 'verifed';
        }
        elseif($status == 0)
        {
            $msg = 'unverified';
        }

        return redirect()->route('admin.viewall_admin')->with('success', ucfirst($user_detail->fname).' is '.$msg.' successfully');
    }

    public function login(Request $request) {
        
        $messages = [
                'admin_email.required' => 'Email id is required',
                'admin_password.required' => 'Password is required',
            ];
            $validator = Validator::make($request->all(), [
                        'admin_email' => 'required',
                        'admin_password' => 'required|max:20|min:6'
                            ], $messages);

            $errors = $validator->errors();
                if ($validator->fails()) {
                return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
                exit;
            }


        $admin_count = User::where('email', $request->admin_email)->first();
        if(isset($admin_count))
        {
            if($admin_count->role_id==1)
            {
                $admin_count2 = User::where('email', $request->admin_email)->first();
                if($admin_count2->verified == 1){
                    $password1 = Hash::check($request->admin_password, $admin_count2->password);
                    if ($password1 > 0) {
                        $data = User::where('email', $request->admin_email)->first();
                        $userdata = $request->all();
                        Session::put('admin_id', $data->id);
                        Session::put('admin_name', $data->fname.' '.$data->lname);
                        Session::put('admin_email', $data->email);
                        Session::put('admin_role', $data->role_id);
                        return redirect('admin');
                    } else {
                        return redirect()->back()->with('error', 'User name or password is invalid')->withInput($request->all());
                    }
                }
                else
                {
                    return redirect()->back()->with('error', 'Your account is deactive')->withInput($request->all());
                }
            }

            // if($admin_count->role_id==2)
            // {
            //     $admin_count3 = User::where('email', $request->admin_email)->first();
                
            //     if (Auth::attempt ( array ('email' => $request->admin_email,'password' => $request->admin_password))) {
            //         Session::put('role', $admin_count3->role_id);
            //         return redirect('admin_main');
            //     } else {
            //         return Redirect::back ()->with('error', 'invalid login details');
            //     }
            // }

            if($admin_count->role_id==2)
            {
                $admin_count3 = User::where('email', $request->admin_email)->first();
                //$password1 = Hash::check($request->admin_password, $admin_count3->password);
                //dd($password1);
                if (Auth::attempt ( array ('email' => $request->admin_email,'password' => $request->admin_password))) {
                    $doctor=Doctor::where('email',$request->admin_email)->where('status',1)->first();
                    if($doctor!=null)
                    {
                        Session::put('role', $admin_count3->role_id);
                        return redirect('admin_main');
                    }
                    else
                    {
                        return Redirect::back ()->with('error', 'invalid login details 1');
                    }

                } else {
                    return Redirect::back ()->with('error', 'invalid login details');
                }
                
            }

            if($admin_count->role_id==5)
            {
                $admin_count3 = User::where('email', $request->admin_email)->first();

                if (Auth::attempt ( array ('email' => $request->admin_email,'password' => $request->admin_password))) {
                    $clinic=Clinic::where('email',$request->admin_email)->where('status',1)->first();
                    if($clinic!=null)
                    {
                        Session::put('role', $admin_count3->role_id);
                        return redirect('admin_main');
                    }
                    else
                    {
                        return Redirect::back ()->with('error', 'invalid login details');
                    }

                } else {
                    return Redirect::back ()->with('error', 'invalid login details');
                }
            }

            if($admin_count->role_id==6)
            {
                $admin_count3 = User::where('email', $request->admin_email)->first();

                if (Auth::attempt ( array ('email' => $request->admin_email,'password' => $request->admin_password))) {
                    $clinic=Poc::where('email',$request->admin_email)->where('status',1)->first();

                    if($clinic!=null)
                    {
                        Session::put('role', $admin_count3->role_id);
                        return redirect('admin_main');
                    }
                    else
                    {
                        return Redirect::back ()->with('error', 'invalid login details');
                    }

                } else {
                    return Redirect::back ()->with('error', 'invalid login details');
                }
            }
            if($admin_count->role_id==7)
            {


                $admin_count2 = User::where('email', $request->admin_email)->first();
                
                // if($admin_count2->verified == 1){

                    $password1 = Hash::check($request->admin_password, $admin_count2->password);
                    if ($password1 > 0) {
                        $data = User::where('email', $request->admin_email)->first();
                        $userdata = $request->all();
                        Session::put('admin_id', $data->id);
                        Session::put('admin_name', $data->fname.' '.$data->lname);
                        Session::put('admin_email', $data->email);
                        Session::put('admin_role', $data->role_id);
                        return redirect('admin');
                    } else {
                        return redirect()->back()->with('error', 'User name or password is invalid')->withInput($request->all());
                    }
                // }
                // else
                // {
                //     return redirect()->back()->with('error', 'Your account is deactive')->withInput($request->all());
                // }
            }
            if($admin_count->role_id==8)
            {
                $admin_count3 = User::where('email', $request->admin_email)->first();

                if (Auth::attempt ( array ('email' => $request->admin_email,'password' => $request->admin_password))) {
                        Session::put('role', 8);
                        return redirect('admin_main');
                } else {
                    return Redirect::back ()->with('error', 'invalid login details');
                }
            }
            

        }else{
            return redirect()->back()->with('error', 'Email id not exist')->withInput($request->all());
        }

        return redirect()->route('admin.index')->with('error', 'These credentials do not match our records.');

    }

    public function logout() {
        Session::flush();
        return redirect('admin');
    }

    public function update(Request $request) {

        $messages = [
            'required' => ':attribute is required.',
            'fname.required' => 'Firstname is required.',
            'lname.required' => 'Lastname is required',
            'email.required' => 'Email is required',
            'contact_number.required' => 'Contact number is required',
            'role.required' => 'Role is required',
        ];
        $validator = Validator::make($request->all(), [
                    'fname' => 'required',
                    'lname' => 'required',
                    'email' => 'required|email',
                    'contact_number' => 'required',
                    'role' => 'required',
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
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'role_id' => $request->role,
            'password' => $password,
        ]);

        return redirect()->route('admin.viewall_admin')->with('success', 'Admin detail updated successfully');
    }

    public function delete($id) {
        User::where('id', $id)->delete();
        return redirect()->route('admin.viewall_admin')->with('success', 'Admin deleted successfully');
    }


    public function viewnotification($id) {

        $userdetail = User::select('id','role_id')->where('id',$id)->first();
        User::whereId($id)->update([
            'view' => 1,
            ]);

        if($userdetail->role_id == 3)
        {
            return redirect()->route('coach.coachall_detail', $id);
        }
        elseif($userdetail->role_id == 2)
        {
            return redirect()->route('doctor.doctorall_detail', $id);
        }
    }



    public function check_plan_status() {

        $today = date('d/m/Y');

        $exp_date = date('d/m/Y', strtotime("+3 day", strtotime("NOW")));

        $next_month = date('d/m/Y', strtotime("+1 months", strtotime("NOW")));

        $patient_plan_detail = PatientHealthPlan::select('id','patient_id','payment_date')->where('in_pay',1)->get()->toArray();

        $patient_id = array();
        foreach ($patient_plan_detail as $p) {

            if($p['payment_date'] == $exp_date)
            {
                $patient_id[] = $p['patient_id'];
            }

            if($p['payment_date'] < $today)
            {
                PatientHealthPlan::whereId($p['id'])->update([
                    'in_pay' => 0,
                    ]);
            }
        }


        foreach ($patient_id as $p) {
            $patient_detail = User::select('fname','email')->where('id',$p)->first();
            $email = $patient_detail->email;
            $name = $patient_detail->fname;
            $data['to_email'] = $email;
            $date = date('d/m/Y');
            $para = array('fname' => $name, 'date' => $date, 'type' => 'Coach');
            Mail::send('emailTemplate.plan_exp', ['parameter' => $para], function ($m) use($data) {
                            $m->from('hello@sensoriom.com', 'Sensoriom');
                            $m->to($data['to_email'])->subject('Sensoriom | Subscription plan will expire soon');
                        });

        }
    }

}
