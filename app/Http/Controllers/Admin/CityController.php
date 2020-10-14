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
use App\Clinic;
use Illuminate\Support\Facades\Storage;

class CityController extends Controller {

    public function add_new(Request $request) {
//         $city_id=1;
// $countCityDATAConnect=City::select('city.*','clinic.*','doctors.*')
//             ->join('clinic', 'city.id', '=', 'clinic.city')
//             ->join('doctors', 'clinic.id', '=', 'doctors.clinic_id')
//             //->join('doctors', 'clinic.id', '=', 'doctors.clinic_id')
//             ->where('city.id','=',$city_id)
//             ->get();
//             dd($countCityDATAConnect);
        return view('admin/add_city');

    }

    public function edit($id) {
        
        $city = City::where('id', $id)->get()->toarray();
        return view('admin/add_city',array('city' => $city));
    }

    public function store(Request $request) {
        
        $messages = [
            'required' => ':attribute is required.',
            'city.required' => 'City is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'city' => 'required|regex:/^[\pL\s\-]+$/u',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $check_city = City::where('city',$request->city)->count();
        if($check_city)
        {
            return redirect()->route('city.new')->with('danger','City already exist.');
        }
        else
        {
            $city = new City;
            $city->city = $request->city;
            $city->save();
            return redirect()->route('city.new')->with('success','City added successfully.');
        }

    }

    public function cityarray(Request $request) {
        $response = [];

        $users = City::select('id', 'city', 'status')->get();

        $users = $users->toArray();
        foreach ($users as $user) {
            // dd($user);
            $citycount = Clinic::where('city',$user['id'])->count();
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            /*if($user['city']){
            $username='<a href="' . route('city.edit', $id) . '">'.ucfirst($user['city']).'</a>';
            }else{
            $username='<a href="' . route('city.edit', $id) . '">-</a>';
            }
            $sub[] = $username;*/
            $sub[] = ($user['city']) ? ucfirst($user['city']) : "-";
            
            if($user['status'] == 1)
            {
                if (Session::get('admin_role') == 7) {
                $sub[] = '<a  style="color:red" href="#"><label class="label label-success">Active</label></a>';    
                }else{
                $verified_url = route('city.verified', array($id , 0));
                    if($citycount == 0){
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this city ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>';
                    }else{
                    $sub[] = '<a  style="color:red" onclick="CountDataForInactiveDelete()" href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>';
                    }
                }

            }
            elseif($user['status'] == 0)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-danger">Inactive</label></a>';
                }else{
                $verified_url = route('city.verified', array($id, 1));
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this city ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>';
                }
            }

            // $sub[] = (date('m-d-Y', strtotime($user['created_at'])));

            $delete_url = route("city.delete", $id);
            //123456789
            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('city.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                //delete
                if($citycount == 0){
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this city ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
                }else{
                $action .= '<a style="color:red" onclick="CountDataForInactiveDelete()" href="#"><i class="fa fa-trash"></i>&nbsp;</a>'; 
                }
            } else {
                $action = '<a href="' . route('city.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
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
            if(!in_array( 13 ,$manager_permissions )){
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
            'city.required' => 'City is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'city' => 'required|regex:/^[\pL\s\-]+$/u',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $check_city = City::where('city',$request->city)->count();
        if($check_city)
        {
            return redirect()->route('city.new')->with('danger','City already exist.');
        }
        else
        {
            City::whereId($request->id)->update([
                'city' => $request->city,
                ]);
            return redirect()->route('city.new')->with('success','City updated successfully.');
        }
    }


    public function verified($id,$status) {
        // echo $id;
        $city = City::select('city')->where('id',$id)->first();
        city::whereId($id)->update([
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

        return redirect()->route('city.new')->with('success',ucfirst($city->city).' city is '.$msg.' successfully.');
    }

     public function delete($id) {
        $check_city = Clinic::where('city',$id)->count();
        //dd($check_city);
        if($check_city >= 1)
        {
            return redirect()->route('city.new')->with('danger','City already exist.');
        }
        else
        {
            City::where('id', $id)->delete();
            return redirect()->route('city.new')->with('success','City deleted successfully.');
        }
    
       
    }

}
