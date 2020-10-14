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
use App\HealthProblem;
use Illuminate\Support\Facades\Storage;

class HealthProblemController extends Controller {

    public function add_new(Request $request) {

        return view('admin/add_health_problem');

    }

    public function edit($id) {
        
        $health_problem = HealthProblem::where('id', $id)->get()->toarray();
        return view('admin/add_health_problem',array('healthproblem' => $health_problem));
    }

    public function store(Request $request) {
        
        $messages = [
            'required' => ':attribute is required.',
            'problem.required' => 'Health problem is required.',
            'type.required' => 'Type is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'problem' => 'required|regex:/^[\pL\s\-]+$/u',
                    'type' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $healthproblem = new HealthProblem;
        $healthproblem->problem = $request->problem;
        $healthproblem->type = $request->type;
        $healthproblem->save();

        return redirect()->route('health_problem.new')->with('success','Health problem added successfully.');
    }

    public function problemarray(Request $request) {
        $response = [];

        $users = HealthProblem::select('id', 'problem', 'type', 'status')->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            $sub[] = ($user['problem']) ? ucfirst($user['problem']) : "-";
            $sub[] = ($user['type']) ? $user['type'] : "-";
            
            if($user['status'] == 1)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-success">Active</label></a>';
                }else{
                    $verified_url = route('health_problem.verified', array($id , 0));
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this problem ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>';
                }
            }
            elseif($user['status'] == 0)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-danger">Inactive</label></a>';

                }else{
                    $verified_url = route('health_problem.verified', array($id, 1));
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this problem ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>';
                }
                
            }

            // $sub[] = (date('m-d-Y', strtotime($user['created_at'])));

            $delete_url = route("health_problem.delete", $id);

            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('health_problem.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this problem ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
            } else {
                $action = '<a href="' . route('health_problem.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
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
            if(!in_array( 15 ,$manager_permissions )){
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
            'problem.required' => 'Health problem is required.',
            'type.required' => 'Type is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'problem' => 'required|regex:/^[\pL\s\-]+$/u',
                    'type' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }
        HealthProblem::whereId($request->id)->update([
            'problem' => $request->problem,
            'type' => $request->type,
            ]);
        return redirect()->route('health_problem.new')->with('success','Health problem updated successfully.');
    }


    public function verified($id,$status) {
        // echo $id;
        $plan = HealthProblem::select('problem')->where('id',$id)->first();
        HealthProblem::whereId($id)->update([
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

        return redirect()->route('health_problem.new')->with('success',ucfirst($plan->problem).' is '.$msg.' successfully.');
    }

     public function delete($id) {
        HealthProblem::where('id', $id)->delete();
        return redirect()->route('health_problem.new')->with('success','Health problem deleted successfully.');
    }

}
