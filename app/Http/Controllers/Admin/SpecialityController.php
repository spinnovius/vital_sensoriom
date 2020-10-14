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
use App\Speciality;
use Illuminate\Support\Facades\Storage;
use App\Medicines;
class SpecialityController extends Controller {

    
    public function add_new(Request $request) {

        return view('admin/add_speciality');

    }

    public function edit($id) {
        
        $speciality = Speciality::where('id', $id)->get()->toarray();
        return view('admin/add_speciality',array('speciality' => $speciality));
    }

    public function store(Request $request) {
        
        $messages = [
            'required' => ':attribute is required.',
            'speciality.required' => 'Speciality is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'speciality' => 'regex:/^[\pL\s\-]+$/u',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $speciality = new Speciality;
        $speciality->speciality = $request->speciality;
        $speciality->save();

        return redirect()->route('speciality.new')->with('success','Speciality added successfully.');
    }

    public function specialityarray(Request $request) {
        $response = [];

        $users = Speciality::select('id', 'speciality', 'status')->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            //$countdoctor=DB::table('doctors')->where('speciality','=',$id)->count();
            $countdoctor=DB::table('doctor_speciality_select')
            ->where('speciality_id','=',$id)
            ->count();
            //dd($countdoctor);
            $sub[] = $id;
            /*if($user['speciality']){
            $username='<a href="' . route('speciality.edit', $id) . '">'.ucfirst($user['speciality']).'</a>';
            }else{
            $username='<a href="' . route('speciality.edit', $id) . '">-</a>';
            }
            $sub[] = $username;*/
            $sub[] = ($user['speciality']) ? ucfirst($user['speciality']) : "-";
            
            if($user['status'] == 1)
            {
                if (Session::get('admin_role') == 7) {
                $sub[] = '<a  style="color:red" href="#"><label class="label label-success">Active</label></a>';
                }else{
                  if($countdoctor==0){
                    $verified_url = route('speciality.verified', array($id , 0));
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this speciality ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>';
                  }else{
                    $sub[] = '<a  style="color:red" onclick="CountDataForInactiveDelete()" href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>';
                  }
                
                }
            }
            elseif($user['status'] == 0)
            {
                if (Session::get('admin_role') == 7) {
                $sub[] = '<a  style="color:red" href="#"><label class="label label-danger">Inactive</label></a>' . ' ';    
                }else{
                $verified_url = route('speciality.verified', array($id, 1));
                    if($countdoctor==0){
                    $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this speciality ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>' . ' ';
                    }else{
                    $sub[] = '<a  style="color:red" onclick="CountDataForInactiveDelete()" href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>' . ' ';
                    }
                }
            }

            // $sub[] = (date('m-d-Y', strtotime($user['created_at'])));
            if (Session::get('admin_role') != 7) {
            $delete_url = route("speciality.delete", $id);
            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('speciality.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                if($countdoctor==0){
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this speciality ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
                }else{
                 $action .= '<a style="color:red" onclick="CountDataForInactiveDelete()" href="#"><i class="fa fa-trash"></i>&nbsp;</a>';   
                }
            } else {
                $action = '<a href="' . route('speciality.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
            }
            $sub[] = $action;
            }//if (Session::get('admin_role') != 7) { end
            $sub[] = $response[] = $sub;
        }
        
            if(Session::get('admin_role') == 7){
                $UserId=Session::get('admin_id');
                $User=User::find($UserId);
                $manager_permissions=$User->manager_permissions;
                $manager_permissions=explode(",",$manager_permissions);
                //dd($manager_permissions);
                if(!in_array( 11 ,$manager_permissions )){
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
            'speciality.required' => 'Speciality is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'speciality' => 'required|regex:/^[\pL\s\-]+$/u',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        Speciality::whereId($request->id)->update([
            'speciality' => $request->speciality,
            ]);
       

        return redirect()->route('speciality.new')->with('success','Speciality updated successfully.');
    }


    public function verified($id,$status) {
        // echo $id;
        $speciality = Speciality::select('speciality')->where('id',$id)->first();
        Speciality::whereId($id)->update([
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

        return redirect()->route('speciality.new')->with('success',ucfirst($speciality->speciality).' is '.$msg.' successfully.');
    }

     public function delete($id) {
        Speciality::where('id', $id)->delete();
        return redirect()->route('speciality.new')->with('success','Speciality deleted successfully.');
    }
    
        public function addmedines_new(Request $request) {

        return view('admin/add_medicines');
    }
    
    public function medinesuploadfilepage(Request $request)
    {
        return view('admin/add_medicinescsv');
    }
    
   public function medinesuploadfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required',
        ]);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
            ->withInput($request->all())
            ->withErrors($errors);
            exit;
        }
     //dd($request->all());exit;
   if ($request->input('submit') != null ){

    $file = $request->file('file');

    // File Details 
    $filename = $file->getClientOriginalName();
    $extension = $file->getClientOriginalExtension();
    $tempPath = $file->getRealPath();
    $fileSize = $file->getSize();
    $mimeType = $file->getMimeType();

    // Valid File Extensions
    $valid_extension = array("csv");

    // 20MB in Bytes
    $maxFileSize = 20097152; 

    // Check file extension
    if(in_array(strtolower($extension),$valid_extension)){

    // Check file size
            if($fileSize <= $maxFileSize){

                // File upload location
                $location = 'storage/app/csv';

                // Upload file
                $file->move($location,$filename);

                // Import CSV to Database
                //$filepath = public_path($location."/".$filename);
                $filepath = env('APP_URL').($location."/".$filename);
                
                // Reading file
                $file = fopen($filepath,"r");
                
                $importData_arr = array();
                $i = 0;

                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata );

                // Skip first row (Remove below comment if you want to skip the first row)
                if($i == 0){
                $i++;
                continue; 
                }
                    for ($c=0; $c < $num; $c++) {
                        $importData_arr[$i][] = $filedata [$c];
                    }
                $i++;
                }
                fclose($file);
                //dd($importData_arr);
        // Insert to MySQL database
        foreach($importData_arr as $importData){

            $insertData = array(
                "name"=>$importData[1],
                );
            Medicines::insertData($insertData);

        }

        return redirect()->route('medicines.new')->with('success','Import Successful.');
        }else{
            return redirect()->route('medicines.new')->with('danger','File too large. File must be less than 2MB.');
        }

    }else{
        return redirect()->route('medicines.new')->with('danger','Invalid File Extension.');
    }

        }

        // Redirect to index
        return redirect()->route('medicines.new');
    }

    public function editmedicines($id) {
        
        $medicine = Medicines::where('id', $id)->first();
        return view('admin/add_medicines',compact('medicine'));
    }

    public function storemedicines(Request $request) {
        
        $messages = [
            'required' => ':attribute is required.',
            'name.required' => 'Medicine is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    //'dose' => 'required',
                    //'unit' => 'required',
                    //'route' => 'required',
        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        $speciality = new Medicines;
        $speciality->name = $request->name;
        //$speciality->dose = $request->dose;
        //$speciality->unit = $request->unit;
        //$speciality->route = $request->route;
        $speciality->save();

        return redirect()->route('medicines.new')->with('success','Medicine added successfully.');
    }
 public function medicinesarray(Request $request) {
        $response = [];

        $users = Medicines::get();

        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;
            $sub[] = ($user['name']) ? ucfirst($user['name']) : "-";
            // $sub[] = ($user['dose']) ? $user['dose'] : "-";
           // $sub[] = ($user['unit']) ? $user['unit'] : "-";
            //$sub[] = ($user['route']) ? $user['route'] : "-";
            
            if($user['status'] == 1)
            {
                $verified_url = route('medicines.verified', array($id , 0));
                $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this medicine ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>';
            }
            elseif($user['status'] == 0)
            {
                $verified_url = route('medicines.verified', array($id, 1));
                $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this medicine ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>' . ' ';
            }

        
            $delete_url = route("medicines.delete", $id);
            $action = '<a href="' . route('medicines.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
            $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this medicine ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
            
            $sub[] = $action;
            
            $sub[] = $response[] = $sub;
        } 
        
        if(Session::get('admin_role') == 7){
            $UserId=Session::get('admin_id');
            $User=User::find($UserId);
            $manager_permissions=$User->manager_permissions;
            $manager_permissions=explode(",",$manager_permissions);
            //dd($manager_permissions);
            if(!in_array( 20 ,$manager_permissions )){
            $response=[];
            }
            //dd($response);
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }

 
    public function medicineupdate(Request $request) {

        $messages = [
            'required' => ':attribute is required.',
            'name.required' => 'name is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    //'dose' => 'required',
             //       'unit' => 'required',
               //     'route' => 'required',
        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }

        Medicines::whereId($request->id)->update([
            'name' => $request->name,
            //'dose' => $request->dose,
            //'unit' => $request->unit,
            //'route' => $request->route,
        ]);
       

        return redirect()->route('medicines.new')->with('success','Medicine updated successfully.');
    }


    public function medicineverified($id,$status) {
        // echo $id;
        $speciality = Medicines::select('name')->where('id',$id)->first();
        Medicines::whereId($id)->update([
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

        return redirect()->route('medicines.new')->with('success',ucfirst($speciality->name).' is '.$msg.' successfully.');
    }

     public function medicinedelete($id) {
        Medicines::where('id', $id)->delete();
        return redirect()->route('medicines.new')->with('success','Medicine deleted successfully.');
    }


}
