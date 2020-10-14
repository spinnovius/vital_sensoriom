<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Procedure;
use App\User;

use Illuminate\Support\Facades\Storage;

class ProcedureController extends Controller {

    public function add_new(Request $request) {

        return view('admin/add_procedure_name');

    }

    public function edit($id) {
        
        $procedure = Procedure::where('id', $id)->get()->toarray();
        return view('admin/add_procedure_name',array('procedure' => $procedure));
    }

    public function store(Request $request) {
        
        $messages = [
            'required' => ':attribute is required.',
            'procedure_name.required' => 'Procedure name is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'procedure_name' => 'required|max:100',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $check_procedure = Procedure::where('procedure_name',$request->procedure_name)->count();
        if($check_procedure)
        {
            return redirect()->route('procedure.new')->with('danger','Procedure name already exist.');
        }
        else
        {
            $procedure = new Procedure;
            $procedure->procedure_name = $request->procedure_name;
            $procedure->save();
            return redirect()->route('procedure.new')->with('success','Procedure name added successfully.');
        }

    }

    public function procedurearray(Request $request) {
        $response = [];

        $users = Procedure::select('id', 'procedure_name', 'status')->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $countpatient=DB::table('patient_procedure')
            ->where('procedure_name','=',$user['id'])
            ->count();
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            $sub[] = ($user['procedure_name']) ? ucfirst($user['procedure_name']) : "-";
            
            if($user['status'] == 1)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-success">Active</label></a>';
                }else{
                    $verified_url = route('procedure.verified', array($id , 0));
                    if($countpatient==0){
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this name ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>';
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
                $verified_url = route('procedure.verified', array($id, 1));
                $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this name ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>';
                }
            }

            // $sub[] = (date('m-d-Y', strtotime($user['created_at'])));

            $delete_url = route("procedure.delete", $id);

            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('procedure.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                //onclick="CountDataForInactiveDelete()"
                if($countpatient==0){
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this name ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
                }else{
                $action .= '<a style="color:red" onclick="CountDataForInactiveDelete()" href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
                }
            } else {
                $action = '<a href="' . route('procedure.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
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
            if(!in_array( 17 ,$manager_permissions )){
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
            'procedure_name.required' => 'Procedure name is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'procedure_name' => 'required|max:100',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $check_procedure = Procedure::where('procedure_name',$request->procedure_name)->count();
        if($check_procedure)
        {
            return redirect()->route('procedure.new')->with('danger','Procedure name already exist.');
        }
        else
        {
            Procedure::whereId($request->id)->update([
                'procedure_name' => $request->procedure_name,
                ]);
            return redirect()->route('procedure.new')->with('success','Procedure name updated successfully.');
        }
    }


    public function verified($id,$status) {
        // echo $id;
        $report = Procedure::select('procedure_name')->where('id',$id)->first();
        Procedure::whereId($id)->update([
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

        return redirect()->route('procedure.new')->with('success',ucfirst($report->test_name).' name is '.$msg.' successfully.');
    }

     public function delete($id) {
        Procedure::where('id', $id)->delete();
        return redirect()->route('procedure.new')->with('success','Procedure name deleted successfully.');
    }

}
