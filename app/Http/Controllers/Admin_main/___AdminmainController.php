<?php
namespace App\Http\Controllers\Admin_main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\PatientDetail;
use App\User;
use App\City;
use App\Hospital;
use App\Speciality;
use App\Doctor;
use App\DoctorDetail;
use App\Doctorclinic;
use App\Clinic;
use App\Doctormain;
use App\PatientProcedure;
use App\PatientLabDetail;
use App\PatientHealthRecordDetail;
use App\AuthorityCouncil;
use App\Appointments;
use App\DoctorSpecialitySelect;
use App\Poc;
use App\PatientPriscription;
use App\GeneralExamination;
use App\PatientGeneralExamination;
use App\SystemExamination;
use App\AdviceTreatment;
use App\AdviceTreatmentGoal;
use App\PatientHopi;
use App\PatientHopiData;
use App\LabReportName;
use App\Procedure;
use Session;
use Auth;
use Mail;
use DB;
use App\Panalistrefer;
/**
 *
 */
class AdminmainController extends Controller
{

    public function dashboard(Request $request) {


        if (Auth::check())
        {
            $id = Auth::user();
            $user_id=$id->id;

            if($id->role_id==5)
            {
                $patient_detail =PatientDetail::
                select('patient_detail.id as uniqueid','patient_detail.age','patient_detail.patient_id','users.*','patient_detail.dob','patient_detail.gender', 'users.contact_number','users.email')
                ->join('users', 'patient_detail.patient_id', '=', 'users.id')
                ->where('patient_detail.clinic_id','=',$user_id)
                ->orderby('uniqueid','desc')
                ->get()->count();

                // $upcoming =Appointments::where('appointment_details.date','>=', date('d/m/Y'))->where('appointment_details.clinic_id','=',$id)
                // ->where('appointment_details.flag',1)->with('doctor','patient')->get()->count();

                $upcoming = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                    // ->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->join('users as d','appointment_details.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.clinic_id','=',$user_id)
                    ->where('appointment_details.date','>=', date('Y-m-d'))
                    // ->where('appointment_details.flag','=',0)
                    ->get()->count();

               

                // $today =Appointments::where('appointment_details.date','=', date('d/m/Y'))->where('appointment_details.clinic_id','=',$id)
                // ->where('appointment_details.flag',1)->with('doctor','patient')->get()->count();

                $today = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                    // ->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->join('users as d','appointment_details.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.date','=', date('Y-m-d'))
                    ->where('appointment_details.clinic_id','=',$user_id)
                    // ->where('appointment_details.flag','=',0)
                    ->get()->count();

                return view('admin_main/dashboard_main',['patient_detail'=>$patient_detail,'upcoming'=>$upcoming,'today'=>$today,'role'=>5]);
            }
            if($id->role_id==2)
            {

                // $upcoming =Appointments::where('appointment_details.date','>=', date('d/m/Y'))->where('appointment_details.doctor_id','=',$user_id)
                // ->where('appointment_details.flag',1)->with('doctor','patient')->get()->count();

                // $today =Appointments::where('appointment_details.date','=', date('d/m/Y'))->where('appointment_details.clinic_id','=',$user_id)
                // ->where('appointment_details.flag',1)->with('doctor','patient')->get()->count();

                // $upcoming = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                //     // ->join('doctors','appointment_details.doctor_id','=','doctors.id')
                //     ->join('users as d','appointment_details.doctor_id','=','d.id')
                //     ->join('users as p','appointment_details.patient_id','=','p.id')
                //     ->where('appointment_details.doctor_id','=',$user_id)
                //     ->where('appointment_details.date','>=', date('Y-m-d'))
                //     // ->where('appointment_details.flag','=',1)
                //     ->get()->count();

                $upcoming = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                    //->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->join('users as d','appointment_details.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.doctor_id','=',$user_id)
                    ->where('appointment_details.date','>=', date('Y-m-d'))
                    ->where('appointment_details.flag','=',1)
                    ->get()->count();

                // dd($upcoming);   

                $today = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                    //->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->join('users as d','appointment_details.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.doctor_id','=',$user_id)
                    ->where('appointment_details.date','=', date('Y-m-d'))
                    ->where('appointment_details.flag','=',1)
                    ->get()->count();


                // $today = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                //     ->join('doctors','appointment_details.doctor_id','=','doctors.id')
                //     ->join('users as d','doctors.doctor_id','=','d.id')
                //     ->join('users as p','appointment_details.patient_id','=','p.id')
                //     ->where('appointment_details.date','=', date('Y-m-d'))
                //     ->where('appointment_details.clinic_id','=',$user_id)
                //     ->where('appointment_details.flag','=',1)
                //     ->get()->count();

                return view('admin_main/dashboard_main',['role'=>2,'upcoming'=>$upcoming,'today'=>$today]);
            }
            if($id->role_id==6)
            {
                //  $upcoming =Appointments::where('appointment_details.date','>=', date('d/m/Y'))->where('appointment_details.doctor_id','=',$user_id)
                // ->where('appointment_details.flag',1)->with('doctor','patient')->get()->count();

                $upcoming = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                    ->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->join('users as d','doctors.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.date','>=', date('d/m/Y'))
                    ->where('appointment_details.doctor_id','=',$user_id)
                    ->where('appointment_details.flag','=',1)
                    ->get()->count();

                // $today =Appointments::where('appointment_details.date','=', date('d/m/Y'))->where('appointment_details.clinic_id','=',$user_id)
                // ->where('appointment_details.flag',1)->with('doctor','patient')->get()->count();

                $today = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                    ->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->join('users as d','doctors.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.date','=', date('d/m/Y'))
                    ->where('appointment_details.clinic_id','=',$user_id)
                    ->where('appointment_details.flag','=',1)
                    ->get()->count();

                return view('admin_main/dashboard_main',['role'=>6,'upcoming'=>$upcoming,'today'=>$today]);
            }
            if($id->role_id==8)
            {
                 $upcoming =Appointments::where('appointment_details.date','>=', date('d/m/Y'))->where('appointment_details.doctor_id','=',$user_id)
                ->where('appointment_details.flag',1)->with('doctor','patient')->get()->count();

                $today = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                    ->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->join('users as d','doctors.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.date','=', date('d/m/Y'))
                    ->where('appointment_details.clinic_id','=',$user_id)
                    ->where('appointment_details.flag','=',1)
                    ->get()->count();


                return view('admin_main/dashboard_main',['role'=>8,'upcoming'=>$upcoming,'today'=>$today]);
            }
        }
        else
        {
             return redirect()->route('admin.index');
        }

    }

    public function profile(Request $request) {

        return view('admin_main/profile');
    }

    public function upcoming(Request $request) {

        return view('admin_main/upcoming');
    }

    public function addpatient(Request $request){

        $id = Auth::user()->id;


        $role=Auth::user()->role_id;

        if($role==2)
        {
            $city = City::where('status',1)->get()->toArray();
            $speciality = Speciality::where('status',1)->get()->toArray();
            $hospital=Hospital::get()->toArray();

            $doctor_id=DoctorDetail::where('doctor_id',$id)->first();
            $doctor_speciallity=DoctorSpecialitySelect::where('doctor_id',$doctor_id->id)->get();


            $city_login =Clinic::
                    select('clinic.*','city.city as cityname')
                    ->join('city', 'clinic.city', '=', 'city.id')
                    ->where('clinic.user_id','=',$doctor_id->clinic_id)
                    ->first();



            $doctorname =DoctorDetail::
                    select('doctors.id as uniqueid','doctors.*', 'users.fname as fname')
                    ->join('users', 'doctors.doctor_id', '=', 'users.id')
                    ->where('doctors.clinic_id','=',$id)
                    ->get();

            return view('admin_main/add_patient',['speciality'=>$speciality,'city'=>$city,'hospital'=>$hospital,'doctorname'=>$doctorname,'city_login'=>$city_login,'role'=>$role]);
        }

        if($role==5)
        {
            $city = City::where('status',1)->get()->toArray();
            $speciality = Speciality::where('status',1)->get()->toArray();
            $hospital=Hospital::get()->toArray();

            $city_login =Clinic::
                    select('clinic.*','city.city as cityname')
                    ->join('city', 'clinic.city', '=', 'city.id')
                    ->where('clinic.user_id','=',$id)
                    ->first();

            $poc_login =Poc::
                    select('pointofcare.*','pointofcare.manager_name','city.city as cityname')
                    ->join('city', 'pointofcare.city', '=', 'city.id')
                    ->where('pointofcare.user_id','=',$id)
                    ->first();


            $doctorname =DoctorDetail::
                    select('doctors.id as uniqueid','doctors.*', 'users.fname as fname')
                    ->join('users', 'doctors.doctor_id', '=', 'users.id')
                    ->where('doctors.clinic_id','=',$id)
                    ->get();

            return view('admin_main/add_patient',['speciality'=>$speciality,'city'=>$city,'hospital'=>$hospital,'doctorname'=>$doctorname,'city_login'=>$city_login,'role'=>$role,'poc_login'=>$poc_login]);
        }

        if($role==6)
        {
            $city = City::where('status',1)->get()->toArray();
            $speciality = Speciality::where('status',1)->get()->toArray();

            $hospital=Hospital::get()->toArray();

            $city_login =Clinic::
                    select('clinic.*','city.city as cityname')
                    ->join('city', 'clinic.city', '=', 'city.id')
                    ->where('clinic.user_id','=',$id)
                    ->first();

            $poc_login =Poc::
                    select('pointofcare.*','pointofcare.manager_name','city.city as cityname')
                    ->join('city', 'pointofcare.city', '=', 'city.id')
                    ->where('pointofcare.user_id','=',$id)
                    ->first();


            $doctorname =DoctorDetail::
                    select('doctors.id as uniqueid','doctors.*', 'users.fname as fname')
                    ->join('users', 'doctors.doctor_id', '=', 'users.id')
                    ->where('doctors.clinic_id','=',$id)
                    ->get();

            return view('admin_main/add_patient',['speciality'=>$speciality,'city'=>$city,'hospital'=>$hospital,'doctorname'=>$doctorname,'city_login'=>$city_login,'role'=>$role,'poc_login'=>$poc_login]);
        }
    }


    public function allpatient(Request $request){

        $id = Auth::user();


        if($id->role_id==2)
        {

            $patient_detail =Appointments::
                select('patient_detail.id as uniqueid','patient_detail.age','patient_detail.patient_id','users.*','patient_detail.dob','patient_detail.gender', 'users.contact_number','users.email')
                ->join('patient_detail', 'appointment_details.patient_id', '=', 'patient_detail.patient_id')
                ->join('users', 'patient_detail.patient_id', '=', 'users.id')
                ->where('appointment_details.doctor_id','=',$id->id)
                ->orderby('appointment_details.id','desc')
                ->get();
        }

        if($id->role_id==6)
        {
            $patient_detail =PatientDetail::
                select('patient_detail.id as uniqueid','patient_detail.age','patient_detail.patient_id','users.*','patient_detail.dob','patient_detail.gender', 'users.contact_number','users.email')
                ->join('users', 'patient_detail.patient_id', '=', 'users.id')
                ->where('patient_detail.clinic_id','=',$id->id)
                ->orderby('uniqueid','desc')
                ->get();
        }

        if($id->role_id==5)
        {
            $patient_detail = PatientDetail::
                select('patient_detail.id as uniqueid','patient_detail.age','patient_detail.patient_id','users.*','patient_detail.dob','patient_detail.gender', 'users.contact_number','users.email')
                ->join('users', 'patient_detail.patient_id', '=', 'users.id')
                ->where('patient_detail.clinic_id','=',$id->id)
                ->orderby('uniqueid','desc')
                // ->orderby('users.id','DESC')
                // ->get();
                ->get();
                // dd($patient_detail);

        }

        return  view('admin_main/all_patient',['PatientDetail'=>$patient_detail]);

    }

    public function patientsharedoctor(Request $request)
    {
      $validator = Validator::make($request->all(), [
                  'pa_id' => 'required',
                  'city' => 'required',
                  'hostipal' => 'required',
                  'speciality' => 'required',
                  'doctorname' => 'required',
      ]);

      $errors = $validator->errors();
      if ($validator->fails()) {
          return redirect()->back()
                          ->withInput($request->all())
                          ->withErrors($errors);
          exit;
      }
      else
      {
        $id = Auth::user()->id;

        $copyAppointments = Appointments::where('patient_id',$request->pa_id)->first();
        $copyDoctors = DoctorDetail::find($request->doctorname);
        // dd($copyDoctors->doctor_id);
        // dd($request->all());
        // dd('asdsad');
        $Appointments= new Appointments;
        $Appointments->user_id = $id;
        $Appointments->clinic_id = $id;
        $Appointments->patient_id = $request->pa_id;
        $Appointments->city_id = $request->city;
        $Appointments->hostipal_id = $request->hostipal;
        $Appointments->speciality_id = $request->speciality;
        $Appointments->doctor_id = isset($copyDoctors->doctor_id)? $copyDoctors->doctor_id : '';
        $Appointments->date = $copyAppointments->date;
        $Appointments->time = $copyAppointments->time;
        $Appointments->poc_id = $id;
        $Appointments->reason_refer = $request->query_text;
        // $Appointments->adhaarno = $request->aadhaarno;
        $Appointments->role = 6;
        $Appointments->save();
        return redirect()->back();
      }

      // dd($request->all());
      # code...
    }

    public function patientstore(Request $request) {


        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email',
                    'gender' => 'required',
                    'phonenumber' => 'required|unique:users,contact_number',
                    'profile' => 'mimes:jpeg,png,jpg|max:2048',
        ],['phonenumber.unique' => 'Phone number is already exists']);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }
        else
        {
            if (Auth::check())
            {
                $id = Auth::user()->id;
                $masteradmin = new User;
                $masteradmin->fname = $request->name;
                $masteradmin->email = $request->email;
                $masteradmin->contact_number = $request->phonenumber;
                $masteradmin->role_id = 4;
                $masteradmin->verified = 1;
                $masteradmin->password="";
                $masteradmin->save();

                if ($request->file('profile')) {
                        $profile = $request->profile;
                        $path = $profile->store('profile');
                }

                $patient_details=new PatientDetail;
                $patient_details->patient_id=$masteradmin->id;
                $patient_details->clinic_id=$id;
                $patient_details->gender=$request->gender;
                $patient_details->age=$request->age;
                $patient_details->profile_pic=isset($path)?$path:'';
                $patient_details->save();

                $timestamp = strtotime($request->date);
                $new_date = date("Y-m-d", $timestamp);

                $Doctor_id=DoctorSpecialitySelect::where('doctor_id',$request->doctorname)->first();
                $doctor_detail=DoctorDetail::where('id',isset($Doctor_id)?$Doctor_id->doctor_id:'')->first();
                $Appointments=new Appointments;
                $Appointments->user_id=$id;
                $Appointments->clinic_id=$id;
                $Appointments->patient_id=$masteradmin->id;
                $Appointments->city_id=$request->city;
                $Appointments->hostipal_id=$request->hospital;
                $Appointments->speciality_id=$request->speciality;
                $Appointments->doctor_id=isset($doctor_detail)?$doctor_detail->doctor_id:'';
                $Appointments->date= $new_date;
                $Appointments->time= $request->time;
                $Appointments->adhaarno=$request->aadhaarno;
                $Appointments->role=$request->role;
                $Appointments->save();

                return redirect()->route('admin_main.allpatient',$masteradmin->id)->with('success','Add Patient Successfully.');
            }
            else
            {
                return redirect()->route('admin.index');
            }


        }

    }

    public function edit($id) {

        $userid = Auth::user()->id;
        $PatientDetail =PatientDetail::
                select('patient_detail.age','patient_detail.id','patient_detail.patient_id as uniqueid','users.*','patient_detail.dob','patient_detail.gender', 'users.contact_number','users.email','patient_detail.profile_pic')
                ->join('users', 'patient_detail.patient_id', '=', 'users.id')
                ->where('patient_detail.patient_id',$id)
                ->first();

        return view('admin_main/add_patient',array('PatientDetail' => $PatientDetail));
    }

    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
                    'profile' => 'mimes:jpeg,png,jpg|max:2048',
                    'phonenumber' => 'required',
                    'name' => 'required',
                    'age' => 'required',
        ]);

        $errors = $validator->errors();
            if ($validator->fails()) {
                return redirect()->back()
                                ->withInput($request->all())
                                ->withErrors($errors);
                exit;
            }else
            {
                if (isset($request->profile)) {
                    $profile = $request->profile;
                    $path = $profile->store('profile');
                } else {
                    $profile = $request->hidden_image;
                    $path = $profile;
                }

                $id = PatientDetail::where('patient_id',$request->id)->first();
                $user_id = $id->id;

                PatientDetail::whereId($user_id)->update([
                    'profile_pic' => $path,
                    'age'=>$request->age,
                ]);

                User::whereId($request->id)->update([
                    'fname' => $request->name,
                    // 'email'=>$request->email,
                    'contact_number'=> $request->phonenumber,
                ]);

               return redirect()->route('admin_main.vitalsindex',$request->id);
               }
    }

    public function deletepatient(Request $request,$id)
    {
        $id=PatientDetail::where('patient_id',$id)->first();
        $uu=User::find($id->patient_id);
        $patient=PatientDetail::where('patient_id',$id->patient_id)->first();
        $patient->delete();
        $uu->delete();


       return redirect()->route('admin_main.allpatient')->with('success','Patient deleted successfully.');
    }

    public function patientsarray(Request $request) {
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
                $verified_url = route('advertisement.verified', array($id , 0));
                $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this advertisement ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>' . ' ';
            }
            elseif($user['status'] == 0)
            {
                $verified_url = route('advertisement.verified', array($id, 1));
                $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this advertisement ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>' . ' ';
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
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }



    /*DOCTOR*/

    public function add_doctor(Request $request){
        $userid = Auth::user()->id;
        $city = City::where('status',1)->get()->toArray();
        $speciality = Speciality::where('status',1)->get()->toArray();
        $clinic = Clinic::get()->toArray();
        $clinic_city=Clinic::where('user_id',$userid)->first();
        $authorityCouncil = AuthorityCouncil::get()->toArray();
        $city_login =Clinic::
                select('clinic.*','city.city as cityname')
                ->join('city', 'clinic.city', '=', 'city.id')
                ->where('clinic.user_id','=',$userid)
                ->first();
        $poc_login =Poc::
                select('pointofcare.*','pointofcare.manager_name','city.city as cityname')
                ->join('city', 'pointofcare.city', '=', 'city.id')
                ->where('pointofcare.user_id','=',$userid)
                ->first();
        return view('admin_main/add_doctor',['city' => $city,'clinic' => $clinic,'speciality' => $speciality,'authorityCouncil'=>$authorityCouncil,'clinic_city'=>$clinic_city,'city_login'=>$city_login,'poc_login'=>$poc_login]);
    }

    public function all_doctor(Request $request){

        $userid = Auth::user()->id;

        $doctor_detail =DoctorDetail::
                select('doctors.id as uniqueid','doctors.*','users.*','users.email','city.city as cityname','doctor_speciality_select.speciality_id as idname',\DB::raw('GROUP_CONCAT(doctor_speciality.speciality) as sp'))
                ->join('users', 'doctors.doctor_id', '=', 'users.id')
                ->join('city', 'doctors.city', '=', 'city.id')
                ->join('doctor_speciality_select', 'doctors.id', '=', 'doctor_speciality_select.doctor_id')
                ->join('doctor_speciality', 'doctor_speciality_select.speciality_id', '=', 'doctor_speciality.id')
                ->where('doctors.clinic_id','=',$userid)
                ->groupBy('doctors.id')
                ->orderby('doctors.id','desc')
                ->get();

        return view('admin_main/all_doctor',['doctor_detail'=>$doctor_detail]);
    }


    public function storedoctor(Request $request) {



            $validator = Validator::make($request->all(), [
                    //'name' => 'required',
                    //'email' => 'required|email',
                    'profile' => 'mimes:jpeg,png,jpg|max:2048',
                    'phone_number' => 'required|unique:users,contact_number',
            ],['phone_number.unique' => 'Phone number is already exists']);
           $errors = $validator->errors();
            if ($validator->fails()) {
                return redirect()->back()
                                ->withInput($request->all())
                                ->withErrors($errors);
                exit;
            }
            else{

                if (Auth::check())
                {
                    $id = Auth::user()->id;
                    $password = app('hash')->make($request->phone_number);
                    $masteradmin = new User;
                    $masteradmin->fname = $request->doctor_name;
                    $masteradmin->email = $request->email;
                    $masteradmin->contact_number = $request->phone_number;
                    $masteradmin->role_id = 2;
                    $masteradmin->verified = 0;
                    $masteradmin->password=$password;
                    $masteradmin->save();

                    if ($request->file('profile')) {
                            $profile = $request->profile;
                            $path = $profile->store('profile');
                    }

                    $doctor_main = new DoctorDetail;
                    $doctor_main->clinic_id= $id;
                    $doctor_main->doctor_id = $masteradmin->id;
                    $doctor_main->city = $request->city;
                    //$doctor_main->speciality = $request->speciality;
                    $doctor_main->mbbs_registration_number = $request->registration_no;
                    $doctor_main->mbbs_authority_council_name = $request->registration_council;
                    $doctor_main->aadhhar_no = $request->aadhhar_no;
                    $doctor_main->profile_pic=isset($path)?$path:'';
                    $doctor_main->exp_year='0';
                    $doctor_main->save();

                    foreach (request('speciality') as $value) {
                            $doctor_speciality=new DoctorSpecialitySelect;
                            $doctor_speciality->doctor_id=$doctor_main->id;
                            $doctor_speciality->speciality_id=$value;
                            $doctor_speciality->save();
                    }



                    return redirect()->route('admin_main.all_doctor')->with('success','Doctor added successfully.');
                }
                else
                {
                    return redirect()->route('admin.index');
                }
            }



    }

    public function editdoctors($id) {
        $clinic = Clinic::all();
        $city = City::where('status',1)->get()->toArray();
        $speciality = Speciality::where('status',1)->get()->toArray();

        $userid = Auth::user()->id;

        $doctor_main =DoctorDetail::
                select('doctors.id as uniqueid','doctors.*','users.*','users.email','city.city as cityname')
                ->join('users', 'doctors.doctor_id', '=', 'users.id')
                ->join('city', 'doctors.city', '=', 'city.id')
                // ->join('doctor_speciality', 'doctors.speciality', '=', 'doctor_speciality.id')
                ->where('doctors.clinic_id','=',$userid)
                ->where('doctors.id','=',$id)
                ->get()->toArray();

        $city_login =Clinic::
                select('clinic.*','city.city as cityname')
                ->join('city', 'clinic.city', '=', 'city.id')
                ->where('clinic.user_id','=',$userid)
                ->first();

        $poc_login =Poc::
                select('pointofcare.*','pointofcare.manager_name','city.city as cityname')
                ->join('city', 'pointofcare.city', '=', 'city.id')
                ->where('pointofcare.user_id','=',$userid)
                ->first();
        $authorityCouncil = AuthorityCouncil::get()->toArray();

        $doctor_speciality=DoctorSpecialitySelect::where('doctor_id',$id)->pluck('speciality_id')->toArray();

        return view('admin_main/add_doctor',array('Doctormain' => $doctor_main,'city' => $city,'clinic' => $clinic,'speciality' => $speciality,'authorityCouncil'=>$authorityCouncil,'city_login'=>$city_login,'doctor_speciality'=>$doctor_speciality,'poc_login'=>$poc_login));
    }

     public function updatedotors(Request $request) {

            $validator = Validator::make($request->all(), [
                    'profile' => 'mimes:jpeg,png,jpg|max:2048',
            ]);
            $errors = $validator->errors();
            if ($validator->fails()) {
                return redirect()->back()
                                ->withInput($request->all())
                                ->withErrors($errors);
                exit;
            }else
            {
                if (isset($request->profile)) {
                    $profile = $request->profile;
                    $path = $profile->store('profile');
                } else {
                    $profile = $request->profile_pic;
                    $path = $profile;
                }

                $id=DoctorDetail::whereId($request->id)->first();

                $user_id=$id->doctor_id;

                DoctorDetail::whereId($request->id)->update([
                    'profile_pic' => $path,
                    'city'=>$request->city,
                    'mbbs_registration_number'=>$request->registration_no,
                    'mbbs_authority_council_name'=>$request->registration_council,
                    'aadhhar_no'=>$request->aadhhar_no,
                ]);
                DoctorSpecialitySelect::where('doctor_id',$request->id)->delete();

                foreach (request('speciality') as $value) {
                            $doctor_speciality=new DoctorSpecialitySelect;
                            $doctor_speciality->doctor_id=$request->id;
                            $doctor_speciality->speciality_id=$value;
                            $doctor_speciality->save();
                    }

                User::whereId($user_id)->update([
                    'fname' => $request->doctor_name,
                    'email'=>$request->email,
                    'contact_number'=>$request->phone_number,
                ]);

                return redirect()->route('admin_main.all_doctor')->with('success', 'Doctors detail updated successfully');
            }

    }
    public function deletedoctors($id) {

        $id=DoctorDetail::whereId($id)->first();

        $patient=DoctorDetail::where('doctor_id',isset($id->doctor_id)?$id->doctor_id:'')->first();

        if($patient != null)
        {
            $patient->delete();
            User::where('id',$id->doctor_id)->delete();

        }

        return redirect()->route('admin_main.all_doctor')->with('success', 'Doctors deleted successfully');
    }

    public function addpatientdetails(Request $request)
    {
        return view('admin_main/add_patient_details');
    }

    public function storepatientdetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email',
                    'gender' => 'required',
                    'phonenumber' => 'required|unique:users,contact_number',
                    'profile' => 'mimes:jpeg,png,jpg|max:2048',
        ]);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }
        else
        {


            if (Auth::check())
            {
                $id = Auth::user()->id;
                $masteradmin = new User;
                $masteradmin->fname = $request->name;
                $masteradmin->email = $request->email;
                $masteradmin->contact_number = $request->phonenumber;
                $masteradmin->role_id = 4;
                $masteradmin->verified = 1;
                $masteradmin->password="";
                $masteradmin->save();

                if ($request->file('profile')) {
                        $profile = $request->profile;
                        $path = $profile->store('profile');
                }

                $timestamp = strtotime($request->date);
                $new_date = date("d/m/Y", $timestamp);
                $patient_details=new PatientDetail;
                $patient_details->patient_id=$masteradmin->id;
                $patient_details->clinic_id=$id;
                $patient_details->gender=$request->gender;
                $patient_details->age=$request->age;
                $patient_details->city_name=$request->city;
                $patient_details->hospital=$request->hostipal;
                $patient_details->speciality=$request->speciality;
                $patient_details->doctor_name=$request->doctorname;
                $patient_details->date=$new_date;
                $patient_details->time=$request->time;
                $patient_details->aadhaarno=$request->aadhaarno;
                $patient_details->profile_pic=isset($path)?$path:'';
                $patient_details->save();

                return redirect()->route('store_patient.edit',$masteradmin->id)->with('success','Add Patient Successfully.');

            }
            else
            {
                return redirect()->route('admin.index');
            }


        }
    }

    public function allpatientdetails(Request $request){
       $patient_detail =PatientDetail::
                select('patient_detail.id as uniqueid','patient_detail.age','patient_detail.patient_id','users.*','patient_detail.dob','patient_detail.gender', 'users.contact_number','users.email')
                ->join('users', 'patient_detail.patient_id', '=', 'users.id')
                ->where('patient_detail.clinic_id','!=',0)
                ->orderby('patient_detail.id','desc')
                ->get();

            return  view('admin_main/all_patient',['PatientDetail'=>$patient_detail]);
    }

    public function indexLabtests($patient_id){
        $lab_detail =PatientLabDetail::select('patient_lab_detail.id as uniqueid','patient_lab_detail.*')
                //->join('users', 'patient_lab_detail.patient_id', '=', 'users.id')
                ->where('patient_lab_detail.patient_id','=',$patient_id)
                ->get();
        return view('admin_main.labtest.index',["patient_id" => $patient_id,'lab_detail'=>$lab_detail]);
    }



    public function indexGeneral($patient_id){


       $patient_detail =PatientGeneralExamination::
                select('patient_general_examination.id as uniqueid','patient_general_examination.*',\DB::raw("GROUP_CONCAT(general_examination.examination_name) as examinationName"))
                ->join("general_examination",\DB::raw("FIND_IN_SET(general_examination.id,patient_general_examination.examination_id)"),">",\DB::raw("'0'"))
                ->where('patient_general_examination.patient_id','=',$patient_id)
                ->groupBy("patient_general_examination.patient_id")
                ->get();


        return view('admin_main.healthdata.healthdata_Ge',["patient_id" => $patient_id,'patient_detail'=>$patient_detail]);
    }

    public function addGeneral($patient_id){
        $ge=GeneralExamination::all();
        return view('admin_main.healthdata.healthdata_Ge_add',["patient_id" => $patient_id,'ge'=>$ge]);
    }

    public function storeGeneral(Request $request,$patient_id){
        $validator = Validator::make($request->all(), [
                    'examination_name' => 'required',
                    'notes' => 'required',
        ]);

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }
        else
        {
            $id = Auth::user()->id;

            if(request('examination_name'))
            {
                $str_Names=implode(",", request('examination_name'));
            }

            $city = new PatientGeneralExamination();
            $city->patient_id=$patient_id;
            $city->doctor_id=$id;
            $city->examination_id = isset($str_Names)?$str_Names:'';
            $city->notes = request('notes');
            $city->save();
        }

        return redirect()->route('admin_main.geindex',$patient_id);
    }

    public function editGeneral($patient_id,$testId){

        $ge=GeneralExamination::all();
        $patientge=PatientGeneralExamination::find($testId);
        return view('admin_main.healthdata.healthdata_Ge_edit',["patient_id" => $patient_id,'testId'=>$testId,'ge'=>$ge,'patientge'=>$patientge]);
    }


    public function updateGeneral(Request $request,$patient_id,$testId){

        $patient =  PatientGeneralExamination::find($testId);
        if(request('examination_name'))
        {
            $str_Names=implode(",", request('examination_name'));
        }

        if($patient){
            $patient->patient_id=$patient_id;
            $patient->examination_id = isset($str_Names)?$str_Names:'';
            $patient->notes = request('notes');
            $patient->save();
        }

        return redirect()->route('admin_main.geindex',$patient_id)->with('success','General examination updated successfully.');

    }

    public function deleteGeneral($patient_id,$testId)
    {
        $city = PatientGeneralExamination::find($testId);
        if($city){
          $city->delete();
        }
        return redirect()->route('admin_main.geindex',$patient_id)->with('success','General examination deleted successfully.');
    }

    public function indexSystem($patient_id){

       $patient_detail =SystemExamination::
                select('system examination.*')
                ->where('system examination.patient_id','=',$patient_id)
                ->get();


        return view('admin_main.healthdata.healthdata_Se',["patient_id" => $patient_id,'patient_detail'=>$patient_detail]);
    }
     public function addSystem($patient_id){

        return view('admin_main.healthdata.healthdata_Se_add',["patient_id" => $patient_id]);
    }

    public function storeSystem(Request $request,$patient_id){

        $id = Auth::user()->id;

        $city = new SystemExamination();
        $city->patient_id=$patient_id;
        $city->doctor_id=$id;
        $city->diagnosis = request('diagnosis');
        $city->notes = request('notes');
        $city->save();

        return redirect()->route('admin_main.seindex',$patient_id);
    }

    public function editSystem($patient_id,$testId){
        $patientge=SystemExamination::find($testId);

        return view('admin_main.healthdata.healthdata_Se_edit',["patient_id" => $patient_id,'testId'=>$testId,'patientge'=>$patientge]);
    }


    public function updateSystem(Request $request,$patient_id,$testId){

        $patient =  SystemExamination::find($testId);

        if($patient){
            $patient->patient_id=$patient_id;
            $patient->diagnosis = request('diagnosis');
            $patient->notes = request('notes');
            $patient->save();
        }

        return redirect()->route('admin_main.seindex',$patient_id)->with('success','System examination updated successfully.');

    }

    public function deleteSystem($patient_id,$testId)
    {
        $city = SystemExamination::find($testId);
        if($city){
          $city->delete();
        }
        return redirect()->route('admin_main.seindex',$patient_id)->with('success','System examination deleted successfully.');
    }

    public function indexAdviceTreatment($patient_id)
    {
        $patient_detail =AdviceTreatment::
                select('investigation.*')
                ->where('investigation.patient_id','=',$patient_id)
                ->orderby('investigation.id','desc')
                ->get();

        return view('admin_main.healthdata.healthdata_At',["patient_id" => $patient_id,'patient_detail'=>$patient_detail]);
    }

    public function addAdviceTreatment($patient_id)
    {
        $city = City::where('status',1)->get();
        $speciality = Speciality::where('status',1)->get();
        $hospital=Hospital::get();
        return view('admin_main.healthdata.healthdata_At_add',
        ["patient_id" => $patient_id,'city'=>$city,'speciality'=>$speciality,'hospital'=>$hospital]);
    }

    public function storeAdviceTreatment(Request $request,$patient_id)
    {
      //  dd($request->all());
        $id = Auth::user()->id;
        $goal = request('goal');
        $no = request('no');
        $days = request('days');

        $dd=DoctorDetail::where('id',request('doctorname'))->first();

        $AdviceTreatment = new AdviceTreatment();
        $AdviceTreatment->doctor_id=$id;
        $AdviceTreatment->patient_id=$patient_id;
        $AdviceTreatment->date=request('date');
        $AdviceTreatment->investigation_name = request('investigationnotes');
        $AdviceTreatment->city = request('city');
        $AdviceTreatment->hospital=request('hostipal');
        $AdviceTreatment->speciality = request('speciality');
        $AdviceTreatment->doctorsname = isset($dd)?$dd->doctor_id:'';
        $AdviceTreatment->save();
        $advicetreatment_id = $AdviceTreatment->id;
        foreach ($goal as $key => $value) {
          $AdviceGoal = new AdviceTreatmentGoal();
          $AdviceGoal->investigation_id = $advicetreatment_id;
          $AdviceGoal->goal = isset($goal[$key]) ? $goal[$key] : '';
          $AdviceGoal->no = isset($no[$key]) ? $no[$key] : '';
          $AdviceGoal->daysofmonth = isset($days[$key]) ? $days[$key] : '';
          $AdviceGoal->save();
        }
        return redirect()->route('admin_main.atindex',$patient_id);
    }

    public function editAdviceTreatment($patient_id,$testId)
    {
        $patientge=AdviceTreatment::find($testId);
        $city = City::where('status',1)->get();
        $speciality = Speciality::where('status',1)->get();
        $hospital=Hospital::get();
        $dd=DoctorDetail::where('doctor_id',$patientge->doctorsname)->first();
        $patientgegoal = AdviceTreatmentGoal::where('investigation_id',$testId)->get();
        return view('admin_main.healthdata.healthdata_At_edit',["patient_id" => $patient_id,'testId'=>$testId,'patientge'=>$patientge,'city'=>$city,'speciality'=>$speciality,'hospital'=>$hospital,'dd'=>$dd,'patientgegoal' => $patientgegoal]);
    }

    public function updateAdviceTreatment(Request $request,$patient_id,$testId)
    {

        $patient =  AdviceTreatment::find($testId);
        $goal = request('goal');
        $no = request('no');
        $days = request('days');
        //$goal = implode(', ', request('goal'));
        //$no = implode(', ', request('no'));
        //$days = implode(', ', request('days'));
         $dd=DoctorDetail::where('id',request('doctorname'))->first();
        if($patient){
            $patient->patient_id=$patient_id;
            $patient->date=request('date');
            $patient->investigation_name = request('investigationnotes');
            $patient->city = request('city');
            $patient->hospital=request('hostipal');
            $patient->speciality = request('speciality');
            $patient->doctorsname = isset($dd)?$dd->doctor_id:'';
            // $patient->goal=request('goal');
            // $patient->no = request('no');
            // $patient->daysofmonth = request('days');
            $patient->save();
            $advicetreatment_id = $patient->id;
            AdviceTreatmentGoal::where('investigation_id',$advicetreatment_id)->delete();
            // dd($goal);
            foreach ($goal as $key => $value) {
              $AdviceGoal = new AdviceTreatmentGoal();
              $AdviceGoal->investigation_id = $advicetreatment_id;
              $AdviceGoal->goal = isset($goal[$key]) ? $goal[$key] : '';
              $AdviceGoal->no = isset($no[$key]) ? $no[$key] : '';
              $AdviceGoal->daysofmonth = isset($days[$key]) ? $days[$key] : '';
              $AdviceGoal->save();
            }
        }


        return redirect()->route('admin_main.atindex',$patient_id)->with('success','Advice Treatment updated successfully.');
    }

    public function deleteAdviceTreatment($patient_id,$testId)
    {
        $city = AdviceTreatment::find($testId);
        if($city){
          $city->delete();
        }
        return redirect()->route('admin_main.atindex',$patient_id)->with('success','Advice Treatment deleted successfully.');
    }

    public function indexHopi($patient_id)
    {
        $patient_detail =PatientHopi::
                select('hopi_patient.*')
                ->where('hopi_patient.patient_id','=',$patient_id)
                ->orderby('hopi_patient.id','desc')
                ->get();

        return view('admin_main.healthdata.healthdata_Hopi',["patient_id" => $patient_id,'patient_detail'=>$patient_detail]);
    }

    public function addHopi($patient_id)
    {
         return view('admin_main.healthdata.healthdata_Hopi_add',['patient_id'=>$patient_id]);
    }

    public function storeHopi(Request $request,$patient_id)
    {

        $id = Auth::user()->id;
        $complains = request('complain');
        $complainnos = request('complainno');
        $complaindays = request('complaindays');
        $comorbidis = request('comorbidi');
        $comorbidinos = request('comorbidino');
        $comorbidays = request('comorbidays');
        $hopidatas = request('hopidata');
        if(isset($hopidatas)){
          $hopidata = implode(",",$hopidatas);
        }else{
          $hopidata = '';
        }
        $patient_hopi = new PatientHopi();
        $patient_hopi->doctor_id=$id;
        $patient_hopi->patient_id=$patient_id;
        $patient_hopi->save();
        $hopiid = $patient_hopi->id;
        foreach ($complains as $key => $complain) {
          # code...
          if(isset($complain)){
            $patienthopi = new PatientHopiData();
            $patienthopi->hopi_patient_id = $hopiid;
            $patienthopi->complain_name= isset($complains[$key]) ? $complains[$key] : '';
            $patienthopi->complain_no = isset($complainnos[$key]) ? $complainnos[$key] : '';
            $patienthopi->complain_days= isset($complaindays[$key]) ? $complaindays[$key] : '';
            $patienthopi->problem = $hopidata;
            $patienthopi->save();
          }
        }

        // dd($comorbidis);
        foreach ($comorbidis as $ckey => $comorbidi) {
          # code...
          if(isset($comorbidi)){
            $patienthopi2 = new PatientHopiData();
            $patienthopi2->hopi_patient_id = $hopiid;
            $patienthopi2->complain_name = isset($comorbidis[$ckey]) ? $comorbidis[$ckey] : '';
            $patienthopi2->complain_no = isset($comorbidinos[$ckey]) ?  $comorbidinos[$ckey] : '';
            $patienthopi2->complain_days = isset($comorbidays[$ckey]) ? $comorbidays[$ckey] : '';
            $patienthopi2->is_comorbidities = 1;
            $patienthopi2->problem = $hopidata;
            $patienthopi2->save();
          }
        }
        return redirect()->route('admin_main.hopiindex',$patient_id);
    }

    public function editHopi($patient_id,$testId)
    {
        $patientge = PatientHopi::find($testId);
        $patientge_data = PatientHopiData::where('hopi_patient_id',$patientge->id)->first();
        // dd($patientge_data);
        return view('admin_main.healthdata.healthdata_Hopi_edit',["patient_id" => $patient_id,'testId'=>$testId,'patientge'=>$patientge,'patientge_data'=>$patientge_data]);
    }

    public function updateHopi(Request $request,$patient_id,$testId)
    {

        $patient =  PatientHopi::find($testId);
        // $goal = implode(', ', request('hopidata'));

        $complains = request('complain');
        $complainnos = request('complainno');
        $complaindays = request('complaindays');
        $comorbidis = request('comorbidi');
        $comorbidinos = request('comorbidino');
        $comorbidays = request('comorbidays');
        $hopidatas = request('hopidata');
        if(isset($hopidatas)){
          $hopidata = implode(",",$hopidatas);
        }else{
          $hopidata = '';
        }
        PatientHopiData::where('hopi_patient_id',$testId)->delete();

        foreach ($complains as $key => $complain) {
          # code...
          if(isset($complain)){
            if(!empty($complain)){
              $patienthopi = new PatientHopiData();
              $patienthopi->hopi_patient_id = $testId;
              $patienthopi->complain_name= isset($complains[$key]) ? $complains[$key] : '';
              $patienthopi->complain_no = isset($complainnos[$key]) ? $complainnos[$key] : '';
              $patienthopi->complain_days= isset($complaindays[$key]) ? $complaindays[$key] : '';
              $patienthopi->problem = $hopidata;
              $patienthopi->save();
            }
          }
        }

        foreach ($comorbidis as $ckey => $comorbidi) {
          # code...
          if(isset($comorbidi)){
            if(!empty($comorbidi)){
              $patienthopi2 = new PatientHopiData();
              $patienthopi2->hopi_patient_id = $testId;
              $patienthopi2->complain_name = isset($comorbidis[$ckey]) ? $comorbidis[$ckey] : '';
              $patienthopi2->complain_no = isset($comorbidinos[$ckey]) ?  $comorbidinos[$ckey] : '';
              $patienthopi2->complain_days = isset($comorbidays[$ckey]) ? $comorbidays[$ckey] : '';
              $patienthopi2->is_comorbidities = 1;
              $patienthopi2->problem = $hopidata;
              $patienthopi2->save();
            }
          }
        }

        // if($patient){
        //     $patient->patient_id=$patient_id;
        //     $patient->complain_name=request('complain');
        //     $patient->complain_no = request('complainno');
        //     $patient->complain_days= request('complaindays');
        //     $patient->comorbi_name=request('comorbidi');
        //     $patient->comorbi_no = request('comorbidino');
        //     $patient->comorbi_days = request('comorbidays');
        //     $patient->problem=isset($goal)?$goal:'';
        //     $patient->save();
        // }

        return redirect()->route('admin_main.hopiindex',$patient_id)->with('success','Health Data updated successfully.');
    }


    public function getHopi()
    {
      $id = $_GET['emr_id'];
      $patientge = [];
      if (isset($id)) {
        $patientge =PatientHopiData::where('hopi_patient_id',$id)->where('is_comorbidities',0)->get()->toArray();
        return $patientge;
      }
      return $patientge;
    }
    public function getHopicomorbidities()
    {
      $id = $_GET['emr_id'];
      $patientge = [];
      if (isset($id)) {
        $patientge =PatientHopiData::where('hopi_patient_id',$id)->where('is_comorbidities',1)->get()->toArray();
        return $patientge;
      }
      return $patientge;
    }

    public function deleteHopi($patient_id,$testId)
    {
        $city = PatientHopi::find($testId);
        if($city){
          $city->delete();
        }
        return redirect()->route('admin_main.hopiindex',$patient_id)->with('success','Health Data deleted successfully.');
    }

    public function indexPrescription($patient_id){
        $lab_detail =PatientPriscription::select('patient_priscription.id as uniqueid','patient_priscription.*')
                ->where('patient_priscription.patient_id','=',$patient_id)
                ->get();

        return view('admin_main.healthdata.healthdata_Pr',["patient_id" => $patient_id,'lab_detail'=>$lab_detail]);
    }

    public function addPrescription($patient_id){
        return view('admin_main.healthdata.healthdata_Pr_add',["patient_id" => $patient_id]);
    }


    public function storePrescription(Request $request,$patient_id){


        $id = Auth::user()->id;


        $city = new PatientPriscription();
        $city->patient_id=$patient_id;
        $city->doctor_id=$id;
        $city->medicine_name = request('drugname');
        $city->dose = request('dose');
        $city->freq = request('frequency');
        $city->route = request('route');
        $city->duration = request('duration');
        $city->notes = request('notes');
        $city->save();

        return redirect()->route('admin_main.ppindex',$patient_id);
    }

    public function editPrescription($patient_id,$testId){

        $PatientLabDetail=PatientPriscription::find($testId);

         return view('admin_main.healthdata.healthdata_Pr_edit',["patient_id" => $patient_id,'testId'=>$testId,'PatientLabDetail'=>$PatientLabDetail]);
    }

    public function updatePrescription(Request $request,$patient_id,$testId){

        $patient =  PatientPriscription::find($testId);

        if($patient){
            $patient->patient_id=$patient_id;
            $patient->medicine_name = request('drugname');
            $patient->dose = request('dose');
            $patient->freq = request('frequency');
            $patient->route = request('route');
            $patient->duration = request('duration');
            $patient->notes = request('notes');
            $patient->save();
        }
        return redirect()->route('admin_main.ppindex',$patient_id)->with('success','Prescription updated successfully.');

    }

    public function deletePrescription($patient_id,$testId)
    {
        $city = PatientPriscription::find($testId);
        if($city){
          $city->delete();
        }
        return redirect()->route('admin_main.ppindex',$patient_id)->with('success','Prescription deleted successfully.');
    }

    public function indexVitals($patient_id){

        $vitals_detail =PatientHealthRecordDetail::select('patient_health_records.id as uniqueid','patient_health_records.*')
              //  ->join('users', 'patient_health_records.patient_id', '=', 'users.id')
                ->where('patient_health_records.patient_id','=',$patient_id)
                ->get();
        return view('admin_main.vitals.index',["patient_id" => $patient_id,'vitals_detail'=>$vitals_detail]);
    }

    public function indexProcedure($patient_id){

        $patient_detail =PatientProcedure::select('patient_procedure.id as uniqueid','patient_procedure.*')
               // ->join('users', 'patient_procedure.patient_id', '=', 'users.id')
                ->where('patient_procedure.patient_id','=',$patient_id)
                ->get();

        return view('admin_main.procedure.index',["patient_id" => $patient_id,'patient_detail'=>$patient_detail]);
    }

    public function addLabtests($patient_id){
        $labreports=LabReportName::where('status',1)->get();
        return view('admin_main.labtest.add_labtest',["patient_id" => $patient_id,'labreports'=>$labreports]);
    }

    public function storeLabtests(Request $request,$patient_id){

        $this->validate($request, [
            'date' => 'required',
            'labtestname' => 'required',
            'value'=>'required'
        ]);

        $timestamp = strtotime(request('date'));
        $new_date = date("d/m/Y", $timestamp);

        $city = new PatientLabDetail();
        $city->patient_id=$patient_id;
        $city->coach_id='0';
        $city->test_name = request('labtestname');
        $city->test_date = $new_date;
        $city->value = request('value');
        $city->unit='0';
        $city->save();

        return redirect()->route('admin_main.labtestindex',$patient_id);
    }

    public function editLabtests($patient_id,$testId){
        $PatientLabDetail=PatientLabDetail::find($testId);
        $labreports=LabReportName::where('status',1)->get();
         return view('admin_main.labtest.edit_labtest',["patient_id" => $patient_id,'testId'=>$testId,'PatientLabDetail'=>$PatientLabDetail,'labreports'=>$labreports]);
    }

    public function updateLabtests(Request $request,$patient_id,$testId){

        $patient =  PatientLabDetail::find($testId);
        $timestamp = strtotime(request('date'));
        $new_date = date("d/m/Y", $timestamp);
        if($patient){
            $patient->patient_id=$patient_id;
            $patient->coach_id='0';
            $patient->test_name = request('labtestname');
            $patient->test_date = $new_date;
            $patient->value = request('value');
            $patient->unit='0';
            $patient->save();
        }
        return redirect()->route('admin_main.labtestindex',$patient_id)->with('success','Lab Test updated successfully.');

    }

    public function deleteLabtests($patient_id,$testId){
        $city = PatientLabDetail::find($testId);
        if($city){
          $city->delete();
        }
        return redirect()->route('admin_main.labtestindex',$patient_id)->with('success','Lab Test deleted successfully.');
    }

    public function addProcedure($patient_id){

        $Procedure=Procedure::where('status',1)->get();
        return view('admin_main.procedure.add_procedures',["patient_id" => $patient_id,'procedure'=>$Procedure]);
    }

    public function storeProcedure(Request $request,$id)
    {
        $this->validate($request, [
            'date' => 'required',
            'name' => 'required',
            'impression'=>'required'
        ]);

        $timestamp = strtotime(request('date'));
        $new_date = date("d/m/Y", $timestamp);

        $city = new PatientProcedure();
        $city->patient_id=$id;
        $city->coach_id='0';
        $city->procedure_name = request('name');
        $city->procedure_date = $new_date;
        $city->remark = request('impression');
        $city->save();

        return redirect()->route('admin_main.procedureindex',$id);
    }
    public function editProcedure($patient_id,$id)
    {
        $PatientProcedure=PatientProcedure::find($id);
        $Procedure=Procedure::where('status',1)->get();
        return view('admin_main.procedure.edit_procedures',["patient_id" => $patient_id,'id'=>$id,'PatientProcedure'=>$PatientProcedure,'procedure'=>$Procedure]);
    }
    public function updateProcedure(Request $request,$patient_id, $id)
    {
        $patient =  PatientProcedure::find($id);
        $timestamp = strtotime(request('date'));
        $new_date = date("d/m/Y", $timestamp);
        if($patient){
          $patient->patient_id=$patient_id;
        $patient->coach_id='0';
        $patient->procedure_name = request('name');
        $patient->procedure_date = $new_date;
        $patient->remark = request('impression');
        $patient->save();
        }
        return redirect()->route('admin_main.procedureindex',$patient_id)->with('success','Procedure updated successfully.');

    }

    public function deleteProcedure($patient_id,$id)
    {
        $city = PatientProcedure::find($id);
        if($city){
          $city->delete();
        }
        return redirect()->route('admin_main.procedureindex',$patient_id)->with('success','Procedure deleted successfully.');
    }

    public function addVitals($patient_id){

        return view('admin_main.vitals.add_vitals',["patient_id" => $patient_id]);
    }

    public function storeVitals(Request $request,$id)
    {

        $timestamp = strtotime(request('date'));
        $new_date = date("d/m/Y", $timestamp);

        $city = new PatientHealthRecordDetail();
        $city->patient_id=$id;
        $city->add_date = $new_date;
        $city->blood_pressure_min_value = request('sbp');
        $city->blood_pressure_max_value = request('dbp');
        $city->pluse = request('rr');
        $city->temperature = request('temp');
        $city->oxygen_saturation = request('sp2');
        $city->breathing_rate = request('hr');
        $city->abdominal_circumference = request('ac');
        $city->blood_sugar = request('fbs');
        $city->weight = request('weight');
        $city->height = request('height');
        $city->bmi = request('bmi');
        $city->save();

        return redirect()->route('admin_main.vitalsindex',$id);
    }
    public function editVitals($patient_id,$id)
    {
        $PatientProcedure=PatientHealthRecordDetail::find($id);

        return view('admin_main.vitals.edit_vitals',["patient_id" => $patient_id,'id'=>$id,'PatientProcedure'=>$PatientProcedure]);
    }
    public function updateVitals(Request $request,$patient_id, $id)
    {
        $patient =  PatientHealthRecordDetail::find($id);
        $timestamp = strtotime(request('date'));
        $new_date = date("d/m/Y", $timestamp);
        if($patient){
            $patient->patient_id=$patient_id;
            $patient->add_date = $new_date;
            $patient->blood_pressure_min_value = request('sbp');
            $patient->blood_pressure_max_value = request('dbp');
            $patient->pluse = request('rr');
            $patient->temperature = request('temp');
            $patient->oxygen_saturation = request('sp2');
            $patient->breathing_rate = request('hr');
            $patient->abdominal_circumference = request('ac');
            $patient->blood_sugar = request('fbs');
            $patient->weight = request('weight');
            $patient->height = request('height');
            $patient->bmi = request('bmi');
            $patient->save();
        }
        return redirect()->route('admin_main.vitalsindex',$patient_id)->with('success','Vitals updated successfully.');

    }

    public function deleteVitals($patient_id,$id)
    {
        $city = PatientHealthRecordDetail::find($id);
        if($city){
          $city->delete();
        }
        return redirect()->route('admin_main.vitalsindex',$patient_id)->with('success','Vitals deleted successfully.');
    }
    public function dateconvertstr()
    {
      $date = date('d/m/Y');
      return  json_encode($date);
      # code...
    }
    public function upcomingappointmentlist()
    {
        $id = Auth::user();
        // $today = $this->dateconvertstr();
        // dd();
        $user_id = $id->id;
        $today = (string) date('d/m/Y');
        // dd($today);
        // dd($id->role_id); 5
        if($id->role_id==5)
        {
            // $patient_detail =Appointments::where('appointment_details.date','>=', date('d/m/Y'))->where('appointment_details.clinic_id','=',$user_id)
            //     ->where('appointment_details.flag',1)->with('doctor','patient')->get();
            $patient_detail = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                  //  ->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->join('users as d','appointment_details.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.clinic_id','=',$user_id)
                    ->where('appointment_details.date','>=', date('Y-m-d'))
                    // ->where('appointment_details.flag','=', 0)
                    ->get();
            return view('admin_main/appointments/upcoming',['PatientDetail'=>$patient_detail]);
        }

        if($id->role_id==2)
        {
            // $patient_detail =Appointments::where('appointment_details.date','>=', date('d/m/Y'))->where('appointment_details.doctor_id','=',$user_id)
            //     ->where('appointment_details.flag',1)->with('doctor','patient')->get();

                $patient_detail = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                    //->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->join('users as d','appointment_details.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.doctor_id','=',$user_id)
                    ->where('appointment_details.date','>=', date('Y-m-d'))
                    ->where('appointment_details.flag','=',1)
                    ->get();

            return view('admin_main/appointments/upcoming',['PatientDetail'=>$patient_detail]);
        }

    }

    public function pendingappointmentlist()
    {
        $id = Auth::user()->id;
        $previousdate = date("Y-m-d",strtotime("-1 day"));
        // dd($ppp);
        $patient_detail = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                   //->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->join('users as d','appointment_details.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.clinic_id','=',$id)
                    ->where('appointment_details.date','<=',date('Y-m-d'))
                    ->where('appointment_details.date','>',$previousdate)
                    ->where('appointment_details.flag','=',0)   //0 pending
                    ->get();

        return view('admin_main/appointments/pending',['PatientDetail'=>$patient_detail]);
    }

    public function pointofcareappointmentlist()
    {

        $id = Auth::user()->id;

        $patient_detail = Appointments::select('d.fname as doctorname','pd.age','pd.gender','p.fname as patientname','appointment_details.*')
                    //->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->join('users as d','appointment_details.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->join('patient_detail as pd','p.id','=','pd.patient_id')
                    ->where('appointment_details.doctor_id','=',$id)
                    ->where('appointment_details.role','=',6)
                    ->where('appointment_details.poc_id','!=','')
                    ->get();
                    // dd($patient_detail);
        return  view('admin_main/appointments/pocappoint',['PatientDetail'=>$patient_detail]);
    }

    public function cancelledappointmentlist()
    {
        $id = Auth::user()->id;

        $patient_detail = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                   // ->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->join('users as d','appointment_details.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.clinic_id','=',$id)
                    ->where('appointment_details.flag','=',2)
                    ->where('appointment_details.date','>=',date('d/m/Y'))
                    ->get();

        return  view('admin_main/appointments/cancel',['PatientDetail'=>$patient_detail]);
    }

    public function pastappointmentlist()
    {
        $id = Auth::user();

        $user_id=$id->id;

        if($id->role_id==5)
        {
            // $patient_detail =Appointments::where('appointment_details.date','!=', date('d/m/Y'))->where('appointment_details.date','<=', date('d/m/Y'))->where('appointment_details.clinic_id','=',$user_id)->where('appointment_details.flag',1)->with('doctor','patient')->get();

            $patient_detail = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                   // ->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->join('users as d','appointment_details.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.date','!=',date('Y-m-d'))
                    ->where('appointment_details.date','<=',date('Y-m-d'))
                    ->where('appointment_details.user_id','=',$user_id)
                   // ->where('appointment_details.flag','=',1)
                    ->get();

            return  view('admin_main/appointments/past',['PatientDetail'=>$patient_detail]);
        }

        if($id->role_id==2)
        {
            // $patient_detail =Appointments::where('appointment_details.date','!=', date('d/m/Y'))->where('appointment_details.date','<=', date('d/m/Y'))->where('appointment_details.doctor_id','=',$user_id)->where('appointment_details.flag',1)->with('doctor','patient')->get();
            $patient_detail = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                   // ->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->join('users as d','appointment_details.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.date','!=',date('d/m/Y'))
                    ->where('appointment_details.date','<=',date('d/m/Y'))
                    ->where('appointment_details.doctor_id','=',$user_id)
                    //->where('appointment_details.flag','=',1)
                    ->get();
            return  view('admin_main/appointments/past',['PatientDetail'=>$patient_detail]);
        }

    }

    public function apporverejectappointments($id,$status)
    {

        $user_detail = Appointments::where('id',$id)->with('doctor','patient')->first();
        // dd($user_detail);
        Appointments::whereId($id)->update([
            'flag' => $status,
            ]);

        if($status == 1)
        {
            $msg = 'apporved';
        }
        elseif($status == 2)
        {
            $msg = 'rejected';
        }

        $patient_name=isset($user_detail->patient->fname)?$user_detail->patient->fname:'';
        $doctor_name=isset($user_detail->doctor->fname)?$user_detail->doctor->fname:'';
        $para = array('patient_name' => $patient_name, 'doctor_name' => $doctor_name, 'type' => $msg);
        $data['to_email'] = isset($user_detail->patient->email)?$user_detail->patient->email:'';
        try {
            Mail::send('emailTemplate.appointment', ['parameter' => $para], function ($m) use($data) {
                            $m->from('hello@sensoriom.com', 'Sensoriom');
                            $m->to($data['to_email'])->subject('Sensoriom | Appointments');
            });
        } catch (Exception $e) {
            
        }
       

        if($status==1)
        {
            return redirect()->route('admin_main.upcomingappointment')->with('success','Appointments '.$msg.' successfully');
        }
        elseif ($status==2) {
            return redirect()->route('admin_main.cancelappointment')->with('success','Appointments '.$msg.' successfully');
        }
    }

    public function indexSettings(Request $request)
    {
        return view('admin_main/settings/index');
    }

    public function addsettings(Request $request)
    {
        return view('admin_main/settings/addsettings');
    }

    public function editsettings($id)
    {

        $settings=Clinic::where('user_id',$id)->first();

        $city = City::get()->toArray();
        return view('admin_main/settings/editsettings',['settings'=>$settings,'city'=>$city]);
    }

    public function updateSettings(Request $request,$id)
    {

        if($request->newpassword)
        {
            $newpassword=app('hash')->make($request->newpassword);
        }
        else
        {
            $newpassword=$request->oldpassword;
        }
        $settings=Clinic::where('user_id',$id)->first();
        $settings->fname=request('username');
        $settings->address=request('address');
        $settings->city=request('city');
        $settings->password=$newpassword;
        $settings->book_flag=request('flag');
        $settings->save();


        $userid=isset($settings->user_id)?$settings->user_id:'';

        $user=User::find($userid);
        $user->password=$newpassword;
        $user->save();

        return redirect()->back()->with('success','Settings updated successfully');
    }

    public function hospitalByCity($city_id)
    {
        $areas = Hospital::select('name','id')->where('city',$city_id)->get();
        return response()->json($areas);
    }

    public function doctorBySpeciality($speciality_id,$city_id)
    {
        $id=Auth::user();
        $role_id=$id->role_id;
        if($role_id == 5)
        {
                $areas =DoctorDetail::
                        select('doctors.id as uniqueid','doctors.*', 'users.fname as name')
                        ->join('users', 'doctors.doctor_id', '=', 'users.id')
                        ->join('doctor_speciality_select', 'doctors.id', '=', 'doctor_speciality_select.doctor_id')
                        ->where('doctors.clinic_id','=',$id->id)
                        ->where('doctor_speciality_select.speciality_id','=',$speciality_id)
                        ->get();
                return response()->json($areas);
        }

        if($role_id == 2)
        {
                $areas =DoctorDetail::
                        select('doctors.id as uniqueid','doctors.*', 'users.fname as name')
                        ->join('users', 'doctors.doctor_id', '=', 'users.id')
                        ->join('doctor_speciality_select', 'doctors.id', '=', 'doctor_speciality_select.doctor_id')
                        ->where('doctors.doctor_id','=',$id->id)
                        ->where('doctor_speciality_select.speciality_id','=',$speciality_id)
                        ->get();
                return response()->json($areas);
        }

         if($role_id == 6)
        {
                $areas =DoctorDetail::
                        select('doctors.id as uniqueid','doctors.*', 'users.fname as name')
                        ->join('users', 'doctors.doctor_id', '=', 'users.id')
                        ->join('doctor_speciality_select', 'doctors.id', '=', 'doctor_speciality_select.doctor_id')
                        //->where('doctors.doctor_id','=',$id->id)
                        ->where('doctor_speciality_select.speciality_id','=',$speciality_id)
                        ->get();
                return response()->json($areas);
        }
    }

    public function appointments()
    {

    }

    public function getcitybypanalist($id)
    {
    $user = User::where('role_id',8)->where('city',$id)->get();
    return response()->json($user);
      # code...
    }
    //reffer panalist
    public function referpanalistpatient(Request $request)
    {
      $validator = Validator::make($request->all(), [
                  'pan_id' => 'required',
                  'city' => 'required',
      ]);

      $errors = $validator->errors();
      if ($validator->fails()) {
          return redirect()->back()
                          ->withInput($request->all())
                          ->withErrors($errors);
          exit;
      }
      else
      {
          $id = Auth::user()->id;
          // dd($request->all());
          $panalistrefer = new Panalistrefer();
          $panalistrefer->user_id = request('pan_id');
          $panalistrefer->status = 1;
          $panalistrefer->panalist_id = $id;
          $panalistrefer->question = request('query_text');
          $panalistrefer->save();
        }
        return redirect()->back()->with('success','Reffer successfully');
      # code...
    }

    public function allpanalistpatient(){

       $id = Auth::user()->id;

       $patient_detail = Panalistrefer::select('Panalistrefer.*','u.fname','u.id as uid','pd.age','pd.gender','u.contact_number','u.email')
                   ->leftjoin('users as u','Panalistrefer.user_id','=','u.id')
                   ->leftjoin('patient_detail as pd','Panalistrefer.user_id','=','pd.patient_id')
                   ->where('Panalistrefer.panalist_id','=',336)
                   ->get();
                  //  dd($patient_detail);
        return  view('admin_main/all_panalist',['PatientDetail'=>$patient_detail]);
    }

    public function panelVitals($patient_id){

        $vitals_detail = PatientHealthRecordDetail::select('patient_health_records.id as uniqueid','patient_health_records.*')
              //  ->join('users', 'patient_health_records.patient_id', '=', 'users.id')
                ->where('patient_health_records.patient_id','=',$patient_id)
                ->get();
        return view('admin_main.vitals.panalist.index',["patient_id" => $patient_id,'vitals_detail'=>$vitals_detail]);
    }

    public function panelLabtests($patient_id){
        $lab_detail =PatientLabDetail::select('patient_lab_detail.id as uniqueid','patient_lab_detail.*')
                //->join('users', 'patient_lab_detail.patient_id', '=', 'users.id')
                ->where('patient_lab_detail.patient_id','=',$patient_id)
                ->get();
        return view('admin_main.labtest.panalist.index',["patient_id" => $patient_id,'lab_detail'=>$lab_detail]);
    }

    public function panelProcedure($patient_id){

        $patient_detail =PatientProcedure::select('patient_procedure.id as uniqueid','patient_procedure.*')
               // ->join('users', 'patient_procedure.patient_id', '=', 'users.id')
                ->where('patient_procedure.patient_id','=',$patient_id)
                ->get();

        return view('admin_main.procedure.panalist.index',["patient_id" => $patient_id,'patient_detail'=>$patient_detail]);
    }

    public function paneledit($id) {

        $userid = Auth::user()->id;
        $PatientDetail =PatientDetail::
                select('patient_detail.age','patient_detail.patient_id as uniqueid','patient_detail.patient_id','users.*','patient_detail.dob','patient_detail.gender', 'users.contact_number','users.email','patient_detail.profile_pic')
                ->join('users', 'patient_detail.patient_id', '=', 'users.id')
                ->where('patient_detail.patient_id',$id)
                ->first();

        return view('admin_main/add_panalist_patient',array('PatientDetail' => $PatientDetail));
    }

}
