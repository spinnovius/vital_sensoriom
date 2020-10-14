<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\LabReportName;
use App\User;

use Illuminate\Support\Facades\Storage;

class LabReportController extends Controller {

    public function add_new(Request $request) {

        return view('admin/add_report_name');

    }

    public function edit($id) {
        
        $labreport = LabReportName::where('id', $id)->get()->toarray();
        return view('admin/add_report_name',array('labreport' => $labreport));
    }

    public function store(Request $request) {
        
        $messages = [
            'required' => ':attribute is required.',
            'test_name.required' => 'Test name is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'test_name' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $check_report = LabReportName::where('test_name',$request->test_name)->count();
        if($check_report)
        {
            return redirect()->route('labreport.new')->with('danger','Test name already exist.');
        }
        else
        {
            $labreport = new LabReportName;
            $labreport->test_name = $request->test_name;
            $labreport->save();
            return redirect()->route('labreport.new')->with('success','Test name added successfully.');
        }

    }

    public function reportarray(Request $request) {
        $response = [];

        $users = LabReportName::select('id', 'test_name', 'status')->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $countpatient=DB::table('patient_lab_detail')
            ->where('test_name','=',$user['id'])
            ->count();
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            $sub[] = ($user['test_name']) ? ucfirst($user['test_name']) : "-";
            
            if($user['status'] == 1)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-success">Active</label></a>';
                }else{
                    $verified_url = route('labreport.verified', array($id , 0));
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
                $verified_url = route('labreport.verified', array($id, 1));
                $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this name ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>';
                }
            }

            // $sub[] = (date('m-d-Y', strtotime($user['created_at'])));

            $delete_url = route("labreport.delete", $id);

            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('labreport.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                if($countpatient==0){
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this name ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
                }else{
                $action .= '<a style="color:red" onclick="CountDataForInactiveDelete()" href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
                }
            } else {
                $action = '<a href="' . route('labreport.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
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
            if(!in_array( 16 ,$manager_permissions )){
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
            'test_name.required' => 'Test name is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'test_name' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $check_report = LabReportName::where('test_name',$request->test_name)->count();
        if($check_report)
        {
            return redirect()->route('labreport.new')->with('danger','Test name already exist.');
        }
        else
        {
            LabReportName::whereId($request->id)->update([
                'test_name' => $request->test_name,
                ]);
            return redirect()->route('labreport.new')->with('success','Test name updated successfully.');
        }
    }


    public function verified($id,$status) {
        // echo $id;
        $report = LabReportName::select('test_name')->where('id',$id)->first();
        LabReportName::whereId($id)->update([
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

        return redirect()->route('labreport.new')->with('success',ucfirst($report->test_name).' name is '.$msg.' successfully.');
    }

     public function delete($id) {
        LabReportName::where('id', $id)->delete();
        return redirect()->route('labreport.new')->with('success','Test name deleted successfully.');
    }

}
