<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\User;
use App\City;
use App\Pharmacylist;
use App\Location;
use Illuminate\Support\Facades\Storage;

class PharmacyController extends Controller
{
    public function viewall_hospital(Request $request) {

        return view('admin/allpharmacy_list');
    }

    public function add_new(Request $request) {
        $city = City::get()->toArray();
        return view('admin/add_pharmacy',array('city' => $city));
    }

    public function edit($id) {
        $city = City::get()->toArray();
        $Pharmacylist = Pharmacylist::where('id', $id)->get()->toarray();
        return view('admin/add_pharmacy',array('Pharmacylist' => $Pharmacylist,'city' => $city));
    }

    public function store(Request $request) {

        $messages = [
            'required' => ':attribute is required.',
            'name.required' => 'Hospital name is required.',
            'email.required' => 'Email is required',
            'contact_number.required' => 'Contact number is required',
            'address.required' => 'Address is required',
            'city.required' => 'City is required',
        ];
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email',
                    'contact_number' => 'required|max:10|min:10',
                    'address' => 'required',
                    'city' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $pharmacylist = new Pharmacylist;
        $pharmacylist->name = $request->name;
        $pharmacylist->email = $request->email;
        $pharmacylist->contact_number = $request->contact_number;
        $pharmacylist->location = $request->address;
        $pharmacylist->city_id = $request->city;
        $pharmacylist->save();

        $check_clinic_name = Location::where('city_id', $request->city)->where('name',$request->address)->count();
        if($check_clinic_name == 0)
        {
            $location = new Location;
            $location->city_id = $request->city;
            $location->name = $request->address;
            $location->save();
        }



        return redirect()->route('pharmacy.new')->with('success','Pharmacy added successfully.');

    }

    public function hospitalarray(Request $request) {
        $response = [];

        $users = Pharmacylist::select('id', 'name', 'email', 'contact_number', 'city_id', 'location', 'status')->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            $sub[] = ($user['name']) ? ucfirst($user['name']) : "-";
            $sub[] = ($user['email']) ? $user['email'] : "-";

             $city = City::select('city')->where('id',$user['city_id'])->first();

            $sub[] = ($city['city']) ? $city['city'] : "-";
            $sub[] = ($user['location']) ? $user['location'] : "-";

            $sub[] = ($user['contact_number']) ? $user['contact_number'] : "-";
            if(Session::get('admin_role') != 7){
              if($user['status'] == 1)
              {
                  $verified_url = route('pharmacy.verified', array($id , 0));
                  $sub[] = '<a  onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this pharmacy ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>' . ' ';
              }
              elseif($user['status'] == 0)
              {
                  $verified_url = route('pharmacy.verified', array($id, 1));
                  $sub[] = '<a   onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this pharmacy ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>' . ' ';
              }

              // $sub[] = (date('m-d-Y', strtotime($user['created_at'])));

              $delete_url = route("pharmacy.delete", $id);

              if (Session::get('admin_role')==1) {
                  $action = '<a href="' . route('pharmacy.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                  $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this pharmacy ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
              } else {
                  $action = '<a href="' . route('pharmacy.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
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
            if(!in_array( 10 ,$manager_permissions )){
            $response=[];
            }
        //dd($response);
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }

    public function verified($id,$status) {
        // echo $id;
        $hospital = Pharmacylist::select('name')->where('id',$id)->first();
        Pharmacylist::whereId($id)->update([
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

        return redirect()->route('pharmacy.viewall_pharmacy')->with('success',ucfirst($hospital->name).' is '.$msg.' successfully');
    }

    public function update(Request $request) {

        $messages = [
            'required' => ':attribute is required.',
            'name.required' => 'Hospital name is required.',
            'email.required' => 'Email is required',
            'contact_number.required' => 'Contact number is required',
            'address.required' => 'Address is required',
            'city.required' => 'City is required',
        ];
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email',
                    'contact_number' => 'required|max:10|min:10',
                    'address' => 'required',
                    'city' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        Pharmacylist::whereId($request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'location' => $request->address,
            'city_id' => $request->city,
        ]);

        $check_clinic_name = Location::where('city_id', $request->city)->where('name',$request->address)->count();

        if($check_clinic_name == 0)
        {
            $location = new Location;
            $location->city_id = $request->city;
            $location->name = $request->address;
            $location->save();
        }


        return redirect()->route('pharmacy.viewall_pharmacy')->with('success', 'Pharmacy detail updated successfully');
    }

    public function delete($id) {
        Pharmacylist::where('id', $id)->delete();

        return redirect()->route('pharmacy.viewall_pharmacy')->with('success', 'Pharmacy deleted successfully');
    }
}
