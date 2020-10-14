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
use App\Unit;
use Illuminate\Support\Facades\Storage;

class UnitController extends Controller {

    public function add_new(Request $request) {

        return view('admin/add_unit_for_lab_detail');

    }

    public function edit($id) {
        
        $unit = Unit::where('id', $id)->get()->toarray();
        return view('admin/add_unit_for_lab_detail',array('unit' => $unit));
    }

    public function store(Request $request) {
        
        $messages = [
            'required' => ':attribute is required.',
            'unit.required' => 'Unit is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'unit' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $unit = new Unit;
        $unit->unit = $request->unit;
        $unit->save();

        return redirect()->route('unit.new')->with('success','Unit added successfully.');
    }

    public function unitarray(Request $request) {
        $response = [];

        $users = Unit::select('id', 'unit', 'status')->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            $sub[] = ($user['unit']) ? ucfirst($user['unit']) : "-";
            
            if($user['status'] == 1)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-success">Active</label></a>';
                }else{
                $verified_url = route('unit.verified', array($id , 0));
                $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this unit ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>';
                }

            }
            elseif($user['status'] == 0)
            {
                if (Session::get('admin_role') == 7) {
                    $sub[] = '<a  style="color:red" href="#"><label class="label label-danger">Inactive</label></a>';
                }else{
                    $verified_url = route('unit.verified', array($id, 1));
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this unit ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>';

                }
                
            }

            // $sub[] = (date('m-d-Y', strtotime($user['created_at'])));

            $delete_url = route("unit.delete", $id);

            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('unit.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this unit ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
            } else {
                $action = '<a href="' . route('unit.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
            }
            $sub[] = $action;
            $sub[] = $response[] = $sub;
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }

 
    public function update(Request $request) {

        $messages = [
            'required' => ':attribute is required.',
            'unit.required' => 'Unit is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'unit' => 'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }
        Unit::whereId(@$request->id)->update([
            'unit' => @$request->unit,
            ]);
        return redirect()->route('unit.new')->with('success','Unit updated successfully.');
    }


    public function verified($id,$status) {
        // echo $id;
        $unit = Unit::select('unit')->where('id',$id)->first();
        Unit::whereId($id)->update([
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

        return redirect()->route('unit.new')->with('success',$unit->unit.' is '.$msg.' successfully.'); 
    }

     public function delete($id) {
        Unit::where('id', $id)->delete();
        return redirect()->route('unit.new')->with('success','Unit deleted successfully.');
    }

}
