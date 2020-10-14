<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Faq;
use App\User;
use Illuminate\Support\Facades\Storage;

class FaqController extends Controller {

    public function add_general_new(Request $request) {

        return view('admin/add_general_faq');

    }

    public function add_coach_new(Request $request) {

        return view('admin/add_coach_faq');

    }

    public function add_account_new(Request $request) {

        return view('admin/add_account_faq');

    }

    public function add_doctor_new(Request $request) {

        return view('admin/add_doctor_faq');

    }

    public function edit_general($id) {
        
        $generalfaq = Faq::where('id', $id)->where('type',1)->get()->toarray();
        return view('admin/add_general_faq',array('generalfaq' => $generalfaq));
    }

    public function edit_coach($id) {
        
        $coachfaq = Faq::where('id', $id)->where('type',2)->get()->toarray();
        return view('admin/add_coach_faq',array('coachfaq' => $coachfaq));
    }

    public function edit_account($id) {
        
        $accountfaq = Faq::where('id', $id)->where('type',4)->get()->toarray();
        return view('admin/add_account_faq',array('accountfaq' => $accountfaq));
    }

    public function edit_doctor($id) {
        
        $doctorfaq = Faq::where('id', $id)->where('type',3)->get()->toarray();
        return view('admin/add_doctor_faq',array('doctorfaq' => $doctorfaq));
    }

    public function store_general(Request $request) {
        
        $messages = [
            'required' => ':attribute is required.',
            'question.required' => 'Question is required.',
            'answer.required' => 'Answer is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'question' => 'required',
                    'answer' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $faq = new Faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->type = 1;
        $faq->save();

        return redirect()->route('generalfaq.new')->with('success','General faq added successfully.');
    }

    public function store_coach(Request $request) {
        
        $messages = [
            'required' => ':attribute is required.',
            'question.required' => 'Question is required.',
            'answer.required' => 'Answer is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'question' => 'required',
                    'answer' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $faq = new Faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->type = 2;
        $faq->save();

        return redirect()->route('coachfaq.new')->with('success','My care coach faq added successfully.');
    }

    public function store_account(Request $request) {
        
        $messages = [
            'required' => ':attribute is required.',
            'question.required' => 'Question is required.',
            'answer.required' => 'Answer is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'question' => 'required',
                    'answer' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $faq = new Faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->type = 4;
        $faq->save();

        return redirect()->route('accountfaq.new')->with('success','My account faq added successfully.');
    }

    public function store_doctor(Request $request) {
        
        $messages = [
            'required' => ':attribute is required.',
            'question.required' => 'Question is required.',
            'answer.required' => 'Answer is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'question' => 'required',
                    'answer' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $faq = new Faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->type = 3;
        $faq->save();

        return redirect()->route('doctorfaq.new')->with('success','Doctors & health plans faq added successfully.');
    }

    public function faqarray(Request $request) {
        $response = [];

        $users = Faq::select('id', 'question', 'answer', 'status')->where('type',1)->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            $sub[] = ($user['question']) ? $user['question'] : "-";
            $sub[] = ($user['answer']) ? $user['answer'] : "-";
            
            if($user['status'] == 1)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-success">Active</label></a>';
                }else{
                    $verified_url = route('generalfaq.verified', array($id , 0));
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this general faq ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>';
                }
            }
            elseif($user['status'] == 0)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-danger">Inactive</label></a>';
                }else{
                    $verified_url = route('generalfaq.verified', array($id, 1));
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this general faq ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>';
                }
            }

            // $sub[] = (date('m-d-Y', strtotime($user['created_at'])));

            $delete_url = route("generalfaq.delete", $id);

            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('generalfaq.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this general faq ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
            } else {
                $action = '<a href="' . route('generalfaq.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
            }
            $sub[] = $action;
            $sub[] = $response[] = $sub;
        }
        
            if(Session::get('admin_role') == 7){
                $UserId=Session::get('admin_id');
                $User=User::find($UserId);
                $manager_permissions=$User->manager_permissions;
                $manager_permissions=explode(",",$manager_permissions);
                //dd($manager_permissions);
                if(!in_array( 21 ,$manager_permissions )){
                $response=[];
                }
                //dd($response);
            }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }

    public function coachfaqarray(Request $request) {
        $response = [];

        $users = Faq::select('id', 'question', 'answer', 'status')->where('type',2)->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            $sub[] = ($user['question']) ? $user['question'] : "-";
            $sub[] = ($user['answer']) ? $user['answer'] : "-";
            
            if($user['status'] == 1)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-success">Active</label></a>';
                }else{
                    $verified_url = route('coachfaq.verified', array($id , 0));
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this my care coach faq ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>';
                }
            }
            elseif($user['status'] == 0)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-danger">Inactive</label></a>';
                }else{
                $verified_url = route('coachfaq.verified', array($id, 1));
                $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this my care coach faq ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>';
                }
            }

            // $sub[] = (date('m-d-Y', strtotime($user['created_at'])));

            $delete_url = route("coachfaq.delete", $id);

            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('coachfaq.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this my care coach faq ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
            } else {
                $action = '<a href="' . route('coachfaq.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
            }
            $sub[] = $action;
            $sub[] = $response[] = $sub;
        }
        
        if(Session::get('admin_role') == 7){
            $UserId=Session::get('admin_id');
            $User=User::find($UserId);
            $manager_permissions=$User->manager_permissions;
            $manager_permissions=explode(",",$manager_permissions);
            //dd($manager_permissions);
            if(!in_array( 22 ,$manager_permissions )){
            $response=[];
            }
            //dd($response);
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }

    public function accountfaqarray(Request $request) {
        $response = [];

        $users = Faq::select('id', 'question', 'answer', 'status')->where('type',4)->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            $sub[] = ($user['question']) ? $user['question'] : "-";
            $sub[] = ($user['answer']) ? $user['answer'] : "-";
            
            if($user['status'] == 1)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-success">Active</label></a>';
                }else{
                    $verified_url = route('accountfaq.verified', array($id , 0));
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this my account faq ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>';
                }
            }
            elseif($user['status'] == 0)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-danger">Inactive</label></a>';
                }else{
                    $verified_url = route('accountfaq.verified', array($id, 1));
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this my account faq ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>';
                }
            }

            // $sub[] = (date('m-d-Y', strtotime($user['created_at'])));

            $delete_url = route("accountfaq.delete", $id);

            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('accountfaq.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this my account faq ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
            } else {
                $action = '<a href="' . route('accountfaq.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
            }
            $sub[] = $action;
            $sub[] = $response[] = $sub;
        }
        
        if(Session::get('admin_role') == 7){
            $UserId=Session::get('admin_id');
            $User=User::find($UserId);
            $manager_permissions=$User->manager_permissions;
            $manager_permissions=explode(",",$manager_permissions);
            //dd($manager_permissions);
            if(!in_array( 23 ,$manager_permissions )){
            $response=[];
            }
            //dd($response);
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }

    public function doctorfaqarray(Request $request) {
        $response = [];

        $users = Faq::select('id', 'question', 'answer', 'status')->where('type',3)->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            $sub[] = ($user['question']) ? $user['question'] : "-";
            $sub[] = ($user['answer']) ? $user['answer'] : "-";
            
            if($user['status'] == 1)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-success">Active</label></a>';
                }else{
                $verified_url = route('doctorfaq.verified', array($id , 0));
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this doctors & health plans faq ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>';
                }
            }
            elseif($user['status'] == 0)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this doctors & health plans faq ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>';
                }else{
                    $verified_url = route('doctorfaq.verified', array($id, 1));
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this doctors & health plans faq ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>';
                }
            }

            // $sub[] = (date('m-d-Y', strtotime($user['created_at'])));

            $delete_url = route("doctorfaq.delete", $id);

            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('doctorfaq.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this doctors & health plans faq ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
            } else {
                $action = '<a href="' . route('doctorfaq.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
            }
            $sub[] = $action;
            $sub[] = $response[] = $sub;
        }
        
        if(Session::get('admin_role') == 7){
            $UserId=Session::get('admin_id');
            $User=User::find($UserId);
            $manager_permissions=$User->manager_permissions;
            $manager_permissions=explode(",",$manager_permissions);
            //dd($manager_permissions);
            if(!in_array( 24 ,$manager_permissions )){
            $response=[];
            }
            //dd($response);
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }

    public function general_update(Request $request) {

        $messages = [
            'required' => ':attribute is required.',
            'question.required' => 'Question is required.',
            'answer.required' => 'Answer is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'question' => 'required',
                    'answer' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        Faq::whereId($request->id)->update([
            'question' => $request->question,
            'answer' => $request->answer,
            ]);
        
        return redirect()->route('generalfaq.new')->with('success','General faq updated successfully.');
        
    }

    public function coach_update(Request $request) {

        $messages = [
            'required' => ':attribute is required.',
            'question.required' => 'Question is required.',
            'answer.required' => 'Answer is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'question' => 'required',
                    'answer' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        Faq::whereId($request->id)->update([
            'question' => $request->question,
            'answer' => $request->answer,
            ]);
        
        return redirect()->route('coachfaq.new')->with('success','My care coach faq updated successfully.');
        
    }

    public function account_update(Request $request) {

        $messages = [
            'required' => ':attribute is required.',
            'question.required' => 'Question is required.',
            'answer.required' => 'Answer is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'question' => 'required',
                    'answer' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        Faq::whereId($request->id)->update([
            'question' => $request->question,
            'answer' => $request->answer,
            ]);
        
        return redirect()->route('accountfaq.new')->with('success','My account faq updated successfully.');
        
    }

    public function doctor_update(Request $request) {

        $messages = [
            'required' => ':attribute is required.',
            'question.required' => 'Question is required.',
            'answer.required' => 'Answer is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'question' => 'required',
                    'answer' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        Faq::whereId($request->id)->update([
            'question' => $request->question,
            'answer' => $request->answer,
            ]);
        
        return redirect()->route('doctorfaq.new')->with('success','Doctors & health plans faq updated successfully.');
        
    }


    public function generalfaq_verified($id,$status) {
        // echo $id;
        Faq::whereId($id)->update([
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

        return redirect()->route('generalfaq.new')->with('success','General faq is '.$msg.' successfully.');
    }

    public function coachfaq_verified($id,$status) {
        // echo $id;
        Faq::whereId($id)->update([
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

        return redirect()->route('coachfaq.new')->with('success','My care coach faq is '.$msg.' successfully.');
    }

    public function accountfaq_verified($id,$status) {
        // echo $id;
        Faq::whereId($id)->update([
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

        return redirect()->route('accountfaq.new')->with('success','My account faq is '.$msg.' successfully.');
    }

    public function doctorfaq_verified($id,$status) {
        // echo $id;
        Faq::whereId($id)->update([
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

        return redirect()->route('doctorfaq.new')->with('success','Doctors & health plans faq is '.$msg.' successfully.');
    }

    public function generalfaq_delete($id) {
        Faq::where('id', $id)->delete();
        return redirect()->route('generalfaq.new')->with('success','General faq deleted successfully.');
    }

    public function coachfaq_delete($id) {
        Faq::where('id', $id)->delete();
        return redirect()->route('coachfaq.new')->with('success','My care coach faq deleted successfully.');
    }

    public function accountfaq_delete($id) {
        Faq::where('id', $id)->delete();
        return redirect()->route('accountfaq.new')->with('success','My account faq deleted successfully.');
    }

    public function doctorfaq_delete($id) {
        Faq::where('id', $id)->delete();
        return redirect()->route('doctorfaq.new')->with('success','Doctors & health plans faq deleted successfully.');
    }

}
