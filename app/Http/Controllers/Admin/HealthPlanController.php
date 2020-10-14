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
use App\HealthPlan;
use App\HealthPlanDescription;
use Illuminate\Support\Facades\Storage;
use App\City;

class HealthPlanController extends Controller {

    public function add_new(Request $request) {
        $city=City::get();
        return view('admin/add_master_health_plan',array('city'=>$city));

    }

    public function edit($id) {
        
        $healthplan = HealthPlan::where('id', $id)->get()->toarray();
        $city=City::get();
        return view('admin/add_master_health_plan',array('healthplan' => $healthplan,'city'=>$city));
    }

    public function adddescription($id) {
        
        $healthplan = HealthPlan::where('id', $id)->get()->toarray();
        $healthplandescription = HealthPlanDescription::where('plan_id', $id)->get()->toarray();
        return view('admin/viewallplandetail',array('healthplan' => $healthplan,'healthplandescription' => $healthplandescription));
    }

    public function store(Request $request) {
        
        $messages = [
            'required' => ':attribute is required.',
            'plan_name.required' => 'Plan name is required.',
            'price.required' => 'Price is required.',
            'doctor.required' => 'Doctor is required.',
            'appointment.required' => 'Appointment is required.',
            'one_line_description.required' => 'One line description is required.',
            'special_workup.required' => 'Special workup is required.',
            'duration.required' => 'Duration is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'plan_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'one_line_description' => 'max:75',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $healthplan = new HealthPlan;    
        $healthplan->plan_name = $request->plan_name;
        $healthplan->price = $request->price;
        $healthplan->doctor = $request->doctor;
        $healthplan->appointment = $request->appointment;
        $healthplan->one_line_description = $request->one_line_description;
        $healthplan->special_workup = $request->special_workup;
        $healthplan->duration = $request->duration;
        $healthplan->city_id = $request->city_id;
        $healthplan->save();

        return redirect()->route('health_plan.new')->with('success','HealthPlan added successfully.');
    }

    public function storedescription(Request $request) {
        
        $messages = [
            'required' => ':attribute is required.',
            'plan_id.required' => 'Plan id is required.',
            'description.required' => 'Description is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'plan_id' => 'required',
                    'description' => 'required|max:255',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $healthplandescription = new HealthPlanDescription;
        $healthplandescription->plan_id = $request->plan_id;
        $healthplandescription->description = $request->description;
        $healthplandescription->save();

        return redirect()->route('health_plan.description',$request->plan_id)->with('success','HealthPlan description added successfully.');
    }


    public function planarray(Request $request) {
        $response = [];

        $users = HealthPlan::select('master_health_plan.*', 'plan_name', 'price', 'doctor', 'appointment', 'one_line_description', 'special_workup', 'duration','master_health_plan.status as mstatus','ct.city as cityname')
        ->leftjoin('city as ct','ct.id','=','master_health_plan.city_id')
        ->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            $sub[] = ($user['plan_name']) ? ucfirst($user['plan_name']) : "-";
            $sub[] = ($user['cityname']) ? ucfirst($user['cityname']) : "-";
            $sub[] = ($user['price']) ? $user['price'] : "-";
            $sub[] = ($user['one_line_description']) ? $user['one_line_description'] : "-";
            if($user['mstatus'] == 1)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-success">Active</label></a>';
                }else{
                    $verified_url = route('health_plan.verified', array($id , 0));
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this plan ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>';
                }
                
            }
            elseif($user['mstatus'] == 0)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-danger">Inactive</label></a>';
                }else{
                    $verified_url = route('health_plan.verified', array($id, 1));
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this plan ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>';
                }
            }

            $delete_url = route('health_plan.delete', $id);

            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('health_plan.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                $action .= '<a href="' . route('health_plan.description', $id) . '"><i class="fa fa-list" aria-hidden="true"></i></a>' . ' ';
                // $action .= ' <a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this plan ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
            } else {
                $action = '<a href="' . route('health_plan.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
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
            if(!in_array( 18 ,$manager_permissions )){
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
            'plan_name.required' => 'Plan name is required.',
            'price.required' => 'Price is required.',
            'doctor.required' => 'Doctor is required.',
            'appointment.required' => 'Appointment is required.',
            'one_line_description.required' => 'One line description is required.',
            'special_workup.required' => 'Special workup is required.',
            'duration.required' => 'Duration is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'plan_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'one_line_description' => 'max:75  ',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        HealthPlan::whereId($request->id)->update([
            'plan_name' => $request->plan_name,
            'price' => $request->price,
            'doctor' => $request->doctor,
            'appointment' => $request->appointment,
            'one_line_description' => $request->one_line_description,
            'special_workup' => $request->special_workup,
            'duration' => $request->duration,
            'city_id' => $request->city_id,
            ]);
        return redirect()->route('health_plan.new')->with('success','HealthPlan Updated successfully.');
    }


    public function verified($id,$status) {
        // echo $id;
        $plan = HealthPlan::select('plan_name')->where('id',$id)->first();
        HealthPlan::whereId($id)->update([
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

        return redirect()->route('health_plan.new')->with('success',ucfirst($plan->plan_name).' is '.$msg.' successfully.');
    }

    public function updatestatus($id,$status) {
        // echo $id;
        $plan_id = HealthPlanDescription::select('plan_id')->where('id',$id)->first();
        HealthPlanDescription::whereId($id)->update([
            'status' => $status,
            ]);

        if($status == 1)
        {
            $msg = 'Active';
        }
        elseif($status == 0)
        {
            $msg = 'Inactive';
        }

        return redirect()->route('health_plan.description',$plan_id->plan_id)->with('success',$msg.' successfully.');
    }

    public function updatedescription(Request $request) {
        // echo $id;
        $plan_id = HealthPlanDescription::select('plan_id')->where('id',$request->description_id)->first();
        HealthPlanDescription::whereId($request->description_id)->update([
            'description' => $request->description,
            ]);

        return redirect()->route('health_plan.description',$plan_id->plan_id)->with('success','Description updated successfully.');
    }

    public function delete($id) {
        HealthPlan::where('id', $id)->delete();
        return redirect()->route('health_plan.new')->with('success','Health plan deleted successfully.');
    }

    public function deletedescription($id) {
        $plan_id = HealthPlanDescription::select('plan_id')->where('id',$id)->first();
        HealthPlanDescription::where('id', $id)->delete();
        return redirect()->route('health_plan.description',$plan_id->plan_id)->with('success','Health plan deleted successfully.');
    }

}
