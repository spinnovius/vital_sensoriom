<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\User;
use App\AuthorityCouncil;
use Illuminate\Support\Facades\Storage;

class AuthorityCouncilController extends Controller {

    public function add_new(Request $request) {
        return view('admin/add_authority_council');
    }

    public function edit($id) {
        
        $authority_council = AuthorityCouncil::where('id', $id)->get()->toarray();
        return view('admin/add_authority_council',array('authority_council' => $authority_council));
    }

    public function store(Request $request) {
        
        $messages = [
            'required' => ':attribute is required.',
            'name.required' => 'Name is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'name' => 'required|regex:/^[\pL\s\-]+$/u',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $check_authority = AuthorityCouncil::where('name',$request->name)->count();
        $authority_council = new AuthorityCouncil;
        $authority_council->name = $request->name;
        $authority_council->address = $request->address;
        $authority_council->register_number = $request->register_number;
        $authority_council->save();

        return redirect()->route('authority_council.new')->with('success','Authority council add successfully.');
    }

    public function authority_councilarray(Request $request) {
        $response = [];

        $users = AuthorityCouncil::select('id', 'name', 'address', 'register_number', 'status')->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            $sub[] = ($user['name']) ? ucfirst($user['name']) : "-";
            // $sub[] = ($user['register_number']) ? $user['register_number'] : "-";
            $sub[] = ($user['address']) ? $user['address'] : "-";
            
            if($user['status'] == 1)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-success">Active</label></a>';
                }else{
                    $verified_url = route('authority_council.verified', array($id , 0));
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this authority council ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>';
                }
            }
            elseif($user['status'] == 0)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-danger">Inactive</label></a>';
                }else{
                    $verified_url = route('authority_council.verified', array($id, 1));
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this authority council ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>';
                }
            }
            
            // $sub[] = (date('m-d-Y', strtotime($user['created_at'])));

            $delete_url = route("authority_council.delete", $id);

            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('authority_council.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this authority council ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
            } else {
                $action = '<a href="' . route('authority_council.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
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
            if(!in_array( 14 ,$manager_permissions )){
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
            'name.required' => 'Name is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'name' => 'required|regex:/^[\pL\s\-]+$/u',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        AuthorityCouncil::whereId($request->id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'register_number' => $request->register_number,
            ]);
       
        return redirect()->route('authority_council.new')->with('success','Authority council updated successfully.');
    }


    public function verified($id,$status) {
        // echo $id;
        $authority = AuthorityCouncil::select('name')->where('id',$id)->first();
        AuthorityCouncil::whereId($id)->update([
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

        return redirect()->route('authority_council.new')->with('success',ucfirst($authority->name).' authority is '.$msg.' successfully.');
    }

     public function delete($id) {
        AuthorityCouncil::where('id', $id)->delete();
        return redirect()->route('authority_council.new')->with('success','Authirity council deleted successfully.');
    }

}
