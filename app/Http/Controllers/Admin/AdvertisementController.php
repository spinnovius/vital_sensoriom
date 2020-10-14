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
use App\Advertisement;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function add_new(Request $request) {

        return view('admin/add_addvertisement');

    }

     public function edit($id) {
        
        $advertisement = Advertisement::where('id', $id)->get()->toarray();
        return view('admin/add_addvertisement',array('advertisement' => $advertisement));
    }

    public function store(Request $request) {
        
        $messages = [
            'required' => ':attribute is required.',
            'images.required' => 'Advertisement is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'images' => 'regex:/^[\pL\s\-]+$/u',
                        ], $messages);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }
        if ($request->file('advertisement')) {
            $advertisement = $request->advertisement;
            $path = $advertisement->store('advertisement');
        }
        $advertisement = new Advertisement;
        $advertisement->images = isset($path)?$path:'';
        $advertisement->save();

        return redirect()->route('advertisement.new')->with('success','Advertisement added successfully.');
    }

    public function advertisementarray(Request $request) {
        $response = [];

        $users = Advertisement::select('id', 'images', 'status')->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            $sub[] = $id;

            $sub[] = '<img src="'.env('STORAGE_FILE_PATH').'/'.$user['images'].'"  width="50px" height="auto" class="img-responsive">';
            
            

            if($user['status'] == 1)
            {
                if (Session::get('admin_role')==7) {
                $sub[] = '<a  style="color:red"href="#"><label class="label label-success" data-toggle="tooltip">Active</label></a>';    
                }else{
                $verified_url = route('advertisement.verified', array($id , 0));
                $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this advertisement ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>';
                }
            }
            elseif($user['status'] == 0)
            {
                if (Session::get('admin_role')==7) {
                $sub[] = '<a  style="color:red" href="#"><label class="label label-danger">Inactive</label></a>';
                }else{
                $verified_url = route('advertisement.verified', array($id, 1));
                $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this advertisement ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>';
                }
            }

            // $sub[] = (date('m-d-Y', strtotime($user['created_at'])));

            $delete_url = route("advertisement.delete", $id);

            if (Session::get('admin_role')==1) {
                $action = '<a href="' . route('advertisement.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this advertisement ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
            } else {
                $action = '<a href="' . route('advertisement.edit', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
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
            if(!in_array( 12 ,$manager_permissions )){
            $response=[];
            }
            //dd($response);
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }

 
    public function update(Request $request) {

        

        if (isset($request->advertisement)) {
            $advertisement = $request->advertisement;
            $path = $advertisement->store('advertisement');
        } else {
            $advertisement = $request->hidden_image;
            $path = $advertisement;
        }

        Advertisement::whereId($request->id)->update([
            'images' => $path,
            ]);
       

        return redirect()->route('advertisement.new')->with('success','Advertisement updated successfully.');
    }


    public function verified($id,$status) {
        // echo $id;
        $Advertisement = Advertisement::select('images')->where('id',$id)->first();
        Advertisement::whereId($id)->update([
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

        return redirect()->route('advertisement.new')->with('success',ucfirst($Advertisement->images).' is '.$msg.' successfully.');
    }

     public function delete($id) {
        Advertisement::where('id', $id)->delete();
        return redirect()->route('advertisement.new')->with('success','Advertisement deleted successfully.');
    }
}
