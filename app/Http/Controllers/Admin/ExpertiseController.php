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
use App\Experties;
use Illuminate\Support\Facades\Storage;

class ExpertiseController extends Controller {

    public function add_expertise(Request $request) {

        return view('admin/add_expertise');

    }

    public function store_expertise(Request $request) {

        $messages = [
            'required' => ':attribute is required.',
            'expertise.required' => 'Expertise is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'expertise' =>  'required',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $experties = new Experties;
        $experties->expertise = $request->expertise;
        $experties->save();

        return redirect()->route('panelists.add_expertise')->with('success','Experties added successfully.');
    }

    public function edit_expertise($id) {

        $experties = Experties::where('id', $id)->get()->toarray();
        return view('admin/add_expertise',array('Experties' => $experties));
    }

    public function expertiesarray(Request $request) {


        $response = [];

        $experties = Experties::select('id', 'expertise', 'status')->get();
        $experties = $experties->toArray();
        foreach ($experties as $experties) {

            $sub = [];
            $id = $experties['id'];
            $countpanelist=DB::table('panelists')->where('expertise','=',$id)->count();
            //dd($countpanelist);
            $sub[] = $id;
            $sub[] = ($experties['expertise']) ? ucfirst($experties['expertise']) : "-";
            
            if($experties['status'] == 1)
            {
                $verified_url = route('panelists.verified_expertise', array($id , 0));
                if($countpanelist==0){
                $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this expertise ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>' . ' ';
                }else{
                $sub[] = '<a  style="color:red" onclick="CountDataForInactiveDelete()" href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>' . ' ';
                }
            }
            elseif($experties['status'] == 0)
            {
                $verified_url = route('panelists.verified_expertise', array($id, 1));
                $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this expertise ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>' . ' ';
            }

            // $sub[] = (date('m-d-Y', strtotime($user['created_at'])));

           $delete_url = route("panelists.delete", $id);

            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('panelists.edit_experties', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                if($countpanelist==0){
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this speciality ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
                }else{
                 $action .= '<a style="color:red" onclick="CountDataForInactiveDelete()" href="#"><i class="fa fa-trash"></i>&nbsp;</a>';   
                }
            } else {
                $action = '<a href="' . route('panelists.edit_experties', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
            }
            $sub[] = $action;
            $sub[] = $response[] = $sub;
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }

    public function updateexperties(Request $request) {

        $messages = [
            'required' => ':attribute is required.',
            'expertise.required' => 'Expertise is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'expertise' => 'required|regex:/^[\pL\s\-]+$/u',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        Experties::whereId($request->id)->update([
            'expertise' => $request->expertise,
            ]);


        return redirect()->route('panelists.add_expertise')->with('success','Experties updated successfully.');
    }

    public function verified_expertise($id,$status) {
        // echo $id;
        $experties = Experties::select('expertise')->where('id',$id)->first();
        Experties::whereId($id)->update([
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

        return redirect()->route('panelists.add_expertise')->with('success',ucfirst($experties->expertise).' is '.$msg.' successfully.');
    }

    public function delete($id) {
        Experties::where('id', $id)->delete();
        return redirect()->route('panelists.add_expertise')->with('success','Expertise deleted successfully.');
    }

 }
