<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\AdminContact;
use App\User;
use Illuminate\Support\Facades\Storage;

class AdminContactController extends Controller {

    public function add_new(Request $request) {

        return view('admin/add_contact');

    }

    public function edit($id) {
        
        $city = AdminContact::where('id', $id)->get()->toarray();
        return view('admin/add_contact',array('contact' => $city));
    }

    public function store(Request $request) {
        
        $messages = [
            'required' => ':attribute is required.',
            'contact.required' => 'Contact number is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'contact' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $check_city = AdminContact::where('contact',$request->contact)->count();
        if($check_city)
        {
            return redirect()->route('admin.contact')->with('danger','Contact number is already exist.');
        }
        else
        {
            $city = new AdminContact;
            $city->admin_id = Session::get('admin_role');
            $city->contact = $request->contact;
            $city->save();
            return redirect()->route('admin.contact')->with('success','Contact number added successfully.');
        }

    }

    public function contactarray(Request $request) {
        $response = [];

        $users = AdminContact::select('id', 'contact', 'status')->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            $sub[] = ($user['contact']) ? $user['contact'] : "-";
            
            if($user['status'] == 1)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-success">Active</label></a>';
                }else{
                    $verified_url = route('admin.contactverified', array($id , 0));
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this contact ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>';
                }
            }
            elseif($user['status'] == 0)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-danger">Inactive</label></a>';
                }else{
                    $verified_url = route('admin.contactverified', array($id, 1));
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this contact ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>';
                }
            }

            // $sub[] = (date('m-d-Y', strtotime($user['created_at'])));

            $delete_url = route("admin.contactdelete", $id);

            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('admin.contactedit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this contact ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
            } else {
                $action = '<a href="' . route('admin.contactedit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
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
                if(!in_array( 19 ,$manager_permissions )){
                $response=[];
                }
                //dd($response);
            }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }

 
    public function update(Request $request) {

        $messages = [
            'required' => ':attribute is required.',
            'contact.required' => 'Contact number is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'contact' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $check_city = AdminContact::where('contact',$request->contact)->count();
        if($check_city)
        {
            return redirect()->route('admin.contact')->with('danger','Contact number is already exist.');
        }
        else
        {
            AdminContact::whereId($request->id)->update([
                'contact' => $request->contact,
                ]);
            return redirect()->route('admin.contact')->with('success','Contact number updated successfully.');
        }
    }


    public function verified($id,$status) {
        // echo $id;
        AdminContact::whereId($id)->update([
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

        return redirect()->route('admin.contact')->with('success','Contact number '.$msg.' successfully.');
    }

     public function delete($id) {
        AdminContact::where('id', $id)->delete();
        return redirect()->route('admin.contact')->with('success','Contact number deleted successfully.');
    }

}
