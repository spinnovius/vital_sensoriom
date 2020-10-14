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
use App\City;
use App\Hospital;
use Illuminate\Support\Facades\Storage;

class HospitalController extends Controller {

    public function viewall_hospital(Request $request) {

        return view('admin/allhospital_list');
    }

    public function add_new(Request $request) {
        $city = City::get()->toArray();
        return view('admin/add_hospital',array('city' => $city));
    }

    public function edit($id) {
        $city = City::get()->toArray();
        $hospital = Hospital::where('id', $id)->get()->toarray();
        return view('admin/add_hospital',array('hospital' => $hospital,'city' => $city));
    }

    public function store(Request $request) {

        $messages = [
            'required' => ':attribute is required.',
            'name.required' => 'Hospital name is required.',
            'email.required' => 'Email is required',
            'contact_number.required' => 'Contact number is required',
            'urgent_care_number.required' => 'Urgent Care Number is required',
            'city.required' => 'City is required',
        ];
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email',
                    'contact_number' => 'required|max:10|min:10',
                    'urgent_care_number' => 'required',
                    'city' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $hospital = new Hospital;
        $hospital->name = $request->name;
        $hospital->email = $request->email;
        $hospital->contact_number = $request->contact_number;
        $hospital->address = $request->address;
        $hospital->urgent_care_number = $request->urgent_care_number;
        $hospital->city = $request->city;
        $hospital->save();

        return redirect()->route('hospital.new')->with('success','Hospital added successfully.');

    }

    public function hospitalarray(Request $request) {
        $response = [];

        $users = Hospital::select('id', 'name', 'email', 'contact_number', 'city', 'address', 'urgent_care_number', 'status')->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            $sub[] = ($user['name']) ? ucfirst($user['name']) : "-";
            $sub[] = ($user['email']) ? $user['email'] : "-";
            $sub[] = ($user['contact_number']) ? $user['contact_number'] : "-";
            $sub[] = ($user['address']) ? $user['address'] : "-";

            $city = City::select('city')->where('id',$user['city'])->first();
            $sub[] = ($city['city']) ? $city['city'] : "-";

            $sub[] = ($user['urgent_care_number']) ? $user['urgent_care_number'] : "-";

            if($user['status'] == 1)
            {
                $verified_url = route('hospital.verified', array($id , 0));
                $sub[] = '<a  onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this hospital ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>' . ' ';
            }
            elseif($user['status'] == 0)
            {
                $verified_url = route('hospital.verified', array($id, 1));
                $sub[] = '<a   onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this hospital ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>' . ' ';
            }

            // $sub[] = (date('m-d-Y', strtotime($user['created_at'])));

            $delete_url = route("hospital.delete", $id);

            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('hospital.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this hospital ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
            } else {
                $action = '<a href="' . route('hospital.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
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
            if(!in_array( 9 ,$manager_permissions )){
            $response=[];
            }
            //dd($response);
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }

    public function verified($id,$status) {
        // echo $id;
        $hospital = Hospital::select('name')->where('id',$id)->first();
        Hospital::whereId($id)->update([
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

        return redirect()->route('hospital.viewall_hospital')->with('success',ucfirst($hospital->name).' is '.$msg.' successfully');
    }

    public function update(Request $request) {

        $messages = [
            'required' => ':attribute is required.',
            'name.required' => 'Hospital name is required.',
            'email.required' => 'Email is required',
            'contact_number.required' => 'Contact number is required',
            'urgent_care_number.required' => 'Urgent Care Number is required',
            'city.required' => 'City is required',
        ];
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email',
                    'contact_number' => 'required|max:10|min:10',
                    'urgent_care_number' => 'required',
                    'city' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        Hospital::whereId($request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'urgent_care_number' => $request->urgent_care_number,
            'city' => $request->city,
            ]);

        return redirect()->route('hospital.viewall_hospital')->with('success', 'Hospital detail updated successfully');
    }

    public function delete($id) {
        Hospital::where('id', $id)->delete();
        return redirect()->route('hospital.viewall_hospital')->with('success', 'Hospital deleted successfully');
    }

}
