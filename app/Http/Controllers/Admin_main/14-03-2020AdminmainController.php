<?php
namespace App\Http\Controllers\Admin_main;

use App\AdviceTreatment;
use App\AdviceTreatmentGoal;
use App\Appointments;
use App\AuthorityCouncil;
use App\City;
use App\Clinic;
use App\Doctodoc;
use App\Doctor;
use App\DoctorBalance;
use App\DoctorBankDetail;
use App\DoctorDays;
use App\DoctorDetail;
use App\DoctorSpecialitySelect;
use App\Doctorclinic;
use App\Doctormain;
use App\Doctorrefer;
use App\GeneralExamination;
use App\HealthTeam;
use App\HopiPatientComorbidities;
use App\HopiPatientComplain;
use App\Hospital;
use App\Http\Controllers\Controller;
use App\LabReportName;
use App\Panalistrefer;
use App\PatientDetail;
use App\PatientGeneralExamination;
use App\PatientHealthPlan;
use App\PatientHealthRecordDetail;
use App\PatientHopi;
use App\PatientHopiData;
use App\PatientLabDetail;
use App\PatientPriscription;
use App\PatientProcedure;
use App\Poc;
use App\Procedure;
use App\Speciality;
use App\SystemExamination;
use App\User;
use App\UserLocation;
use Auth;
use Config;
use DB;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use PDF;
use Session;
use Validator;
/**
 *
 */
class AdminmainController extends Controller
{
    

    public function dashboard(Request $request) {


        if (Auth::check())
        {
            $id = Auth::user();
            $user_id = $id->id;
            // clinic panal     
            if($id->role_id==5)
            {
                $patient_detail = PatientDetail::
                select('patient_detail.id as uniqueid','patient_detail.age','patient_detail.patient_id','users.*','patient_detail.dob','patient_detail.gender', 'users.contact_number','users.email')
                ->join('users', 'patient_detail.patient_id', '=', 'users.id')
                ->where('patient_detail.clinic_id','=',$user_id)
                ->orderby('uniqueid','desc')
                ->get()->count();

                $upcomingappointment = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                    ->join('users as d','appointment_details.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.clinic_id','=',$user_id)
                    ->where('appointment_details.date','>=', date('Y-m-d'))
                    ->where('appointment_details.flag','=', 1)
                    ->get()->count();

                $pendingappointment = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                    ->join('users as d','appointment_details.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.clinic_id','=',$user_id)
                    ->where('appointment_details.flag','=',0)
                    ->get()->count();
                $cancelappointment = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                    ->join('users as d','appointment_details.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    // ->where('appointment_details.date','=', date('Y-m-d'))  //2020-01-07
                    ->where('appointment_details.clinic_id','=',$user_id)   //381
                    ->where('appointment_details.flag','=',2)
                    ->get()->count();

                return view('admin_main/dashboard_main',['patient_detail'=>$patient_detail,'upcoming'=>$upcomingappointment,'cancel'=>$cancelappointment,'pending'=>$pendingappointment,'role'=>5]);
            }

            // doctor panal     
            if($id->role_id==2)
            {

                // $upcoming = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                //     //->join('doctors','appointment_details.doctor_id','=','doctors.id')
                //     ->join('users as d','appointment_details.doctor_id','=','d.id')
                //     ->join('users as p','appointment_details.patient_id','=','p.id')
                //     ->where('appointment_details.doctor_id','=',$user_id)
                //     ->where('appointment_details.date','>=', date('Y-m-d'))
                //     ->where('appointment_details.flag','=',1)
                //     ->get()->count();

                $upcoming=Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                  //  ->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->leftjoin('users as d','appointment_details.doctor_id','=','d.id')
                    ->leftjoin('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.clinic_id','=',$user_id)
                    ->where('appointment_details.date','>=', date('Y-m-d'))
                    ->where('appointment_details.flag','=', 1)
                    ->get()->count();

                // $patient_all_detail = Appointments::
                // select('patient_detail.id as uniqueid','patient_detail.dob','patient_detail.patient_id','users.*','patient_detail.dob','patient_detail.gender', 'users.contact_number','users.email')
                // ->join('patient_detail', 'appointment_details.patient_id', '=', 'patient_detail.patient_id')
                // ->join('users', 'patient_detail.patient_id', '=', 'users.id')
                // ->where('appointment_details.doctor_id','=',$id->id)
                // ->where('appointment_details.flag','=',1)
                // ->orderby('appointment_details.id','desc')
                // ->get()->count(); 
                $patient_all_detail = PatientDetail::
                select('patient_detail.*','users.contact_number','users.email','users.fname as fname')
                ->join('users', 'patient_detail.patient_id', '=', 'users.id')
                ->join('appointment_details', 'patient_detail.patient_id', '=', 'appointment_details.patient_id')
                ->where('appointment_details.doctor_id','=',$id->id)
                ->where('appointment_details.flag','=',1)
                ->distinct('patient_detail.patient_id')
                ->get()->count();

                return view('admin_main/dashboard_main',['role'=>2,'upcoming'=>$upcoming,'patient_detail'=>$patient_all_detail]);
            }
            if($id->role_id==6)
            {

                $patient_detail=PatientDetail::
                select('patient_detail.id as uniqueid','patient_detail.age','patient_detail.patient_id','users.*','patient_detail.dob','patient_detail.gender', 'users.contact_number','users.email')
                ->join('users', 'patient_detail.patient_id', '=', 'users.id')
                ->where('patient_detail.clinic_id','=',$user_id)
                ->orderby('uniqueid','desc')
                ->get()->count();

                $upcoming = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                    ->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->join('users as d','doctors.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.date','>=', date('d/m/Y'))
                    ->where('appointment_details.doctor_id','=',$user_id)
                    ->where('appointment_details.flag','=',1)
                    ->get()->count();
                $today = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                    ->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->join('users as d','doctors.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.date','=', date('d/m/Y'))
                    ->where('appointment_details.clinic_id','=',$user_id)
                    ->where('appointment_details.flag','=',1)
                    ->get()->count();

                return view('admin_main/dashboard_main',['role'=>6,'upcoming'=>$upcoming,'today'=>$today,'patient_detail'=>$patient_detail]);
            }
            if($id->role_id==8)
            {
                 $upcoming =Appointments::where('appointment_details.date','>=', date('d/m/Y'))->where('appointment_details.doctor_id','=',$user_id)
                ->where('appointment_details.flag',1)->with('doctor','patient')->get()->count();

                $today=DB::table('panalistrefer')
                ->where('panalist_id','=',$user_id)
                ->count();
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
            $patient_detail = PatientDetail::
            select('patient_detail.*','users.contact_number','users.email','users.fname as fname')
            ->join('users', 'patient_detail.patient_id', '=', 'users.id')
            ->join('appointment_details', 'patient_detail.patient_id', '=', 'appointment_details.patient_id')
            ->where('appointment_details.doctor_id','=',$id->id)
            ->where('appointment_details.flag','=',1)
            ->distinct('patient_detail.patient_id')
            ->get();
        }

        if($id->role_id==6)
        {
            $patient_detail =PatientDetail::
                select('patient_detail.id as uniqueid','patient_detail.dob','patient_detail.patient_id','users.*','patient_detail.dob','patient_detail.age as age','patient_detail.gender', 'users.contact_number','users.email')
                ->join('users', 'patient_detail.patient_id', '=', 'users.id')
                ->where('patient_detail.clinic_id','=',$id->id)
                ->orderby('uniqueid','desc')
                ->get();
        }

        if($id->role_id==5)
        {
            $patient_detail=PatientDetail::
                select('patient_detail.id as uniqueid','patient_detail.dob','patient_detail.patient_id','users.*','patient_detail.dob','patient_detail.age as age','patient_detail.gender', 'users.contact_number','users.email')
                ->join('users', 'patient_detail.patient_id', '=', 'users.id')
                ->where('patient_detail.clinic_id','=',$id->id)
                ->get();
        }

        return  view('admin_main/all_patient',['PatientDetail'=>$patient_detail]);

    }

    public function patientsharedoctor2(Request $request)
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
        }else
        {   
            $id = Auth::user()->id;
            //dd($request->all());
            $Panalistrefer= new Doctorrefer;
            $Panalistrefer->user_id=$request->pa_id;
            $d=DB::table('doctors')->where('id','=',$request->doctorname)->first();
            $Panalistrefer->doc_id=$d->doctor_id;
            $Panalistrefer->poc_id=$id;
            $Panalistrefer->status=1;
            $Panalistrefer->question=$request->query_text;
            $Panalistrefer->answer='';
            $Panalistrefer->save();
        
            return redirect()->back()->with('success','Message send successfully to the Doctor.');
        }
         return redirect()->back()->with('success','Some Things Wrong.');
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

    }

    public function patientstore(Request $request) {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required',//|unique:users,email
                    'gender' => 'required',
                    'phonenumber' => 'required|unique:users,contact_number',
                    'profile' => 'mimes:jpeg,png,jpg|max:2048',
        ],['phonenumber.unique' => 'Phone number is already exists']);//'email.unique'=>'Email is already exists',

        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }
        else
        {

            $strtotime = strtotime($request->age);
            $request->age = date("Y-m-d", $strtotime);    
            //dd($request->age);
            if($request->age){
                $agetimestamp = strtotime($request->age);
                $age_date = date("Y-m-d", $agetimestamp);
                $diff = date_diff(date_create($request->age), date_create(date("Y-m-d")));
                $pyear = $diff->format('%y');
            }else{
                $pyear = 18;
            }
            
            if (Auth::check())
            {
                $id = Auth::user()->id;
                $auth = Auth::user();
                $UserQuery=User::query();
                $PatientDetailQuery=PatientDetail::query();
                $UserCount=$UserQuery->where('email','=',$request->email)->count();
                if($UserCount==0){
                    $pwd = strtolower(substr($request->name,0,3));
                    $pwd=ucfirst($pwd).date("Y", $agetimestamp);
                    //dd($pwd);
                    $masteradmin = new User;
                    $masteradmin->fname = $request->name;
                    $masteradmin->email = $request->email;
                    $masteradmin->contact_number = $request->phonenumber;
                    $masteradmin->role_id = 4;
                    $masteradmin->verified = 1;
                    $masteradmin->password=app('hash')->make($pwd);
                    $masteradmin->save();
                    //echo "new data";
                    //dd($masteradmin);
                    //PatientDetail
                    if ($request->file('profile')) {
                    $profile = $request->profile;
                    $path = $profile->store('profile');
                    }
                    $patient_details = new PatientDetail;
                    $patient_details->patient_id=$masteradmin->id;
                    $patient_details->clinic_id=$id;
                    $patient_details->gender=$request->gender;
                    $patient_details->dob = $request->age;
                    $patient_details->age = $pyear;
                    $patient_details->profile_pic=isset($path)?$path:'';
                    $patient_details->save();
                }else{
                    $masteradmin =$UserQuery->where('email','=',$request->email)->first();
                    PatientDetail::where('patient_id','=',$masteradmin->id)
                    ->update(['clinic_id'=>$id]);
                    $patient_details = $PatientDetailQuery->where('patient_id','=',$masteradmin->id)->first();
                }

                $timestamp = strtotime($request->date);
                $new_date = date("Y-m-d", $timestamp);
                if($auth->role_id != 6){
                $Doctor_id=DoctorSpecialitySelect::where('doctor_id',$request->doctorname)->first();
                $doctor_detail=DoctorDetail::where('id',$request->doctorname)->first();
                
                
                $Appointments=new Appointments;
                $Appointments->user_id=$id;
                $Appointments->clinic_id=$id;
                $Appointments->patient_id=$masteradmin->id;
                $Appointments->city_id=$request->city;
                $Appointments->hostipal_id=$request->hospital;
                $Appointments->speciality_id=$request->speciality;
                $Appointments->doctor_id=isset($doctor_detail)?$doctor_detail->doctor_id:'';
                $Appointments->date= $new_date;
                $Appointments->flag=1;
                $Appointments->time= date("H:i", strtotime($request->time));
                $Appointments->adhaarno=$request->aadhaarno;
                $Appointments->role=$request->role;
                //dd($Appointments);
                $Appointments->save();
                
                $doctor=DB::table('users')->where('id','=',$doctor_detail->doctor_id)->first();
                $doctor_speciality=DB::table('doctor_speciality')->where('id','=',$request->speciality)->first();
                }//poc not Appointments
                    try {
                    $parameter['patient_name']=isset($request->name)?$request->name:'';
                    if($auth->role_id != 6){
                    $parameter['doctor_name']=isset($doctor->fname)?$doctor->fname:'';//$doctor->fname.' '.$doctor->lname;
                    $parameter['type']=isset($doctor_speciality->speciality)?$doctor_speciality->speciality:'';
                    }//poc not Appointments
                    $parameter['password']=@$pwd;
                    $email = $request->email;
                    if($auth->role_id != 6){
                    //Appointment 
                    $ppp = Mail::send('emailTemplate.appointment', ['parameter' => $parameter], function ($m) use($email) {
                    $m->from(Config::get('app.from_mail'), Config::get('app.from_name'));
                    $m->to($email)->subject('Sensoriom | Appointment Confirmed');
                    });
                    }//poc not Appointments
                    //Download the App
                    $ppp = Mail::send('emailTemplate.downloadapp', ['parameter' => $parameter], function ($m) use($email) {
                    $m->from(Config::get('app.from_mail'), Config::get('app.from_name'));
                    $m->to($email)->subject('Welcome To Sensoriom');
                    });

                    } catch (Exception $e) {
                          echo 'Message: ' .$e->getMessage();
                    }
                return redirect()->route('admin_main.allpatient',$masteradmin->id)->with('success','Patient added successfully.');
            }
            else
            {
                return redirect()->route('admin.index');
            }


        }

    }

    public function edit($id) {

        $userid = Auth::user()->id;
        $role = Auth::user()->role_id;
        // if($role==5){
        //     $PatientDetail=PatientDetail::
        //     select('patient_detail.age','patient_detail.id','patient_detail.patient_id as uniqueid','users.*','patient_detail.dob','patient_detail.gender', 'users.contact_number','users.email','patient_detail.profile_pic')
        //     ->join('users', 'patient_detail.patient_id', '=', 'users.id')
        //     ->where('patient_detail.patient_id',$id)
        //     ->where('patient_detail.clinic_id',$userid)
        //     ->first();
        // }else{
        //     $PatientDetail=PatientDetail::
        //     select('patient_detail.age','patient_detail.id','patient_detail.patient_id as uniqueid','users.*','patient_detail.dob','patient_detail.gender', 'users.contact_number','users.email','patient_detail.profile_pic')
        //     ->join('users', 'patient_detail.patient_id', '=', 'users.id')
        //     ->where('patient_detail.patient_id',$id)
        //     ->first();
        // }
            $PatientDetail=PatientDetail::
            select('patient_detail.age','patient_detail.id','patient_detail.patient_id as uniqueid','users.*','patient_detail.dob','patient_detail.gender', 'users.contact_number','users.email','patient_detail.profile_pic')
            ->join('users', 'patient_detail.patient_id', '=', 'users.id')
            ->where('patient_detail.patient_id',$id)
            ->first();
        $master_health_plan=DB::table('master_health_plan')
        ->select('master_health_plan.*')//,'plan_description.description as description'
        //->join('plan_description', 'master_health_plan.id', '=', 'plan_description.plan_id')
        ->where('status',1)
        ->get();
        //dd($master_health_plan);
        $speciality = Speciality::where('status',1)->orderby('speciality')->get();
        return view('admin_main/add_patient',array('PatientDetail' => $PatientDetail,'master_health_plan'=>$master_health_plan,'speciality'=>$speciality));   
    }//past

    public function update(Request $request) {
        //dd($request->all());
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
                if($request->age){
                    $agetimestamp = strtotime($request->age);
                    $age_date = date("Y-m-d", $agetimestamp);
                    $diff = date_diff(date_create($request->age), date_create(date("Y-m-d")));
                    $pyear = $diff->format('%y');
                }else{
                    $pyear = 18;
                }
                $id = PatientDetail::where('patient_id',$request->id)->first();
                $user_id = $id->id;

                PatientDetail::whereId($user_id)->update([
                    'profile_pic' => $path,
                    'age'=> $pyear,
                    'dob'=>$request->age,
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
        $id = Auth::user();
        $user_id=$id->id;
        if($id->role_id==6){

        $doctor_detail=DoctorDetail::
                select('doctors.id as uniqueid','doctors.*','users.*','users.email','city.city as cityname','doctor_speciality_select.speciality_id as idname',\DB::raw('GROUP_CONCAT(doctor_speciality.speciality) as sp'))
                ->leftjoin('users', 'doctors.doctor_id', '=', 'users.id')
                ->leftjoin('city', 'doctors.city', '=', 'city.id')
                ->leftjoin('doctor_speciality_select', 'doctors.id', '=', 'doctor_speciality_select.doctor_id')
                ->leftjoin('doctor_speciality', 'doctor_speciality_select.speciality_id', '=', 'doctor_speciality.id')
                //->where('doctors.clinic_id','=',$userid)
                ->groupBy('doctors.id')
                ->orderby('idname','ASC')
                ->get();
        }else{
            
            $doctor_detail=DoctorDetail::
                select('doctors.id as uniqueid','doctors.*','users.*','users.email','city.city as cityname','doctor_speciality_select.speciality_id as idname',\DB::raw('GROUP_CONCAT(doctor_speciality.speciality) as sp'))
                ->leftjoin('users', 'doctors.doctor_id', '=', 'users.id')
                ->leftjoin('city', 'doctors.city', '=', 'city.id')
                ->leftjoin('doctor_speciality_select', 'doctors.doctor_id', '=', 'doctor_speciality_select.doctor_id')
                ->leftjoin('doctor_speciality', 'doctor_speciality_select.speciality_id', '=', 'doctor_speciality.id')
                ->where('doctors.clinic_id','=',$userid)
                ->groupBy('doctors.id')
                ->orderby('idname','ASC')
                ->get();
                //dd($doctor_detail);
        }        
        
        return view('admin_main/all_doctor',['doctor_detail'=>$doctor_detail]);
    }


    public function storedoctor(Request $request) {
            //dd($request->all());
            $validator = Validator::make($request->all(), [
                    //'name' => 'required',
                    'email' => 'required|unique:users,email',
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
                    //implode(",",$request->speciality)
                    //$doctor_main->speciality = $request->speciality;
                    $doctor_main->mbbs_registration_number = $request->registration_no;
                    $doctor_main->mbbs_authority_council_name = $request->registration_council;
                    $doctor_main->aadhhar_no = $request->aadhhar_no;
                    $doctor_main->fee_of_consultation = isset($request->fee_of_consultation)?$request->fee_of_consultation:'';
                    $doctor_main->profile_pic=isset($path)?$path:'';
                    $doctor_main->exp_year='0';
                    $doctor_main->save();

                    foreach (request('speciality') as $value) {
                            $doctor_speciality=new DoctorSpecialitySelect;
                            $doctor_speciality->doctor_id=$masteradmin->id;
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
        //dd($id);
        
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
        $ids=DoctorDetail::
        where('id','=',$id)
        ->first();
        $doctor_speciality=DoctorSpecialitySelect::where('doctor_id',$ids->doctor_id)
        ->pluck('speciality_id')
        ->toArray();
        $time_slot=DoctorDays::
        where('user_id','=',$ids->doctor_id)
        ->get();
        //dd($time_slot);
        return view('admin_main/add_doctor',array('Doctormain' => $doctor_main,'city' => $city,'clinic' => $clinic,'speciality' => $speciality,'authorityCouncil'=>$authorityCouncil,'city_login'=>$city_login,'doctor_speciality'=>$doctor_speciality,'poc_login'=>$poc_login,'time_slot'=>$time_slot));
    }

     public function updatedotors(Request $request) {
            //dd($request->all());
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
                    'mbbs_registration_number'=>isset($request->registration_no)?$request->registration_no:'',
                    'mbbs_authority_council_name'=>isset($request->registration_council)?$request->registration_council:'',
                    'aadhhar_no'=>isset($request->aadhhar_no)?$request->aadhhar_no:'',
                    'fee_of_consultation' => isset($request->fee_of_consultation)?$request->fee_of_consultation:'',
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
        try{
            $id=DoctorDetail::whereId($id)->first();
            $patient=DoctorDetail::where('doctor_id',isset($id->doctor_id)?$id->doctor_id:'')->first();
            if($patient != null)
            {
            $patient->delete();
            User::where('id',$id->doctor_id)->delete();
            DB::table('doctor_speciality_select')->where('doctor_id','=',$id->doctor_id)->delete();
            }
        return redirect()->route('admin_main.all_doctor')->with('success', 'Doctors deleted successfully');
        }catch (\Illuminate\Database\QueryException $exc) {
            return redirect()->route('admin_main.all_doctor')->with('danger', 'Doctor deleted failed');
        }
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

    

    public function indexExamination($patient_id){
       $patient_detail=PatientGeneralExamination::
                select('patient_general_examination.id as uniqueid','d.fname as doctorname','patient_general_examination.*',\DB::raw("GROUP_CONCAT(general_examination.examination_name) as examinationName"))
                ->join("general_examination",\DB::raw("FIND_IN_SET(general_examination.id,patient_general_examination.examination_id)"),">",\DB::raw("'0'"))
                ->leftjoin('users as d', 'patient_general_examination.doctor_id', '=', 'd.id')
                ->where('patient_general_examination.patient_id','=',$patient_id)
                ->groupBy("patient_general_examination.id")
                ->get();
                
        $SystemExamination =SystemExamination::
        select('system examination.*','d.fname as doctorname')
        ->leftjoin('users as d', 'system examination.doctor_id', '=', 'd.id')
        ->where('system examination.patient_id','=',$patient_id)
        ->get();
        
        $ge=GeneralExamination::all();        
        return view('admin_main.healthdata.healthdata_ex',["patient_id" => $patient_id,'patient_detail'=>$patient_detail,'ge'=>$ge,'SystemExamination'=>$SystemExamination]);
        
    }

    public function indexGeneral($patient_id){


       $patient_detail=PatientGeneralExamination::
                select('patient_general_examination.id as uniqueid','patient_general_examination.*',\DB::raw("GROUP_CONCAT(general_examination.examination_name) as examinationName"))
                ->join("general_examination",\DB::raw("FIND_IN_SET(general_examination.id,patient_general_examination.examination_id)"),">",\DB::raw("'0'"))
                ->where('patient_general_examination.patient_id','=',$patient_id)
                ->groupBy("patient_general_examination.patient_id")
                ->get();
        //bhargav        
        $ge=GeneralExamination::all();        
        return view('admin_main.healthdata.healthdata_Ge',["patient_id" => $patient_id,'patient_detail'=>$patient_detail,'ge'=>$ge]);

        
    }

    public function addGeneral($patient_id){
        $ge=GeneralExamination::all();
        return view('admin_main.healthdata.healthdata_Ge_add',["patient_id" => $patient_id,'ge'=>$ge]);
    }

    public function storeGeneral(Request $request,$patient_id){
        // if(isset($request->examination_name) && !isset($request->notes)){
        //     $validator = Validator::make($request->all(), [
        //     'examination_name' => 'required',
        //     ]);    
        // }elseif(!isset($request->examination_name) && isset($request->notes)){
        //     $validator = Validator::make($request->all(), [
        //     'notes' => 'required',
        //     ]);    
        // }else{
        //     $validator = Validator::make($request->all(), [
        //     'examination_name' => 'required',
        //     'notes' => 'required',
        //     ]);
        // }
        // if(isset($request->diagnosis) && !isset($request->notes)){
        //     $validator = Validator::make($request->all(), [
        //     'diagnosis' => 'required',
        //     ]);    
        // }elseif(!isset($request->diagnosis) && isset($request->notes1)){
        //     $validator = Validator::make($request->all(), [
        //     'notes1' => 'required',
        //     ]);    
        // }else{
        //     $validator = Validator::make($request->all(), [
        //     'diagnosis' => 'required',
        //     'notes1' => 'required',
        //     ]);
        // }

        // $errors = $validator->errors();
        // if ($validator->fails()) {
        //     return redirect()->back()
        //                     ->withInput($request->all())
        //                     ->withErrors($errors);
        //     exit;
        // }
        // else
        // {
            $id = Auth::user()->id;
            if(request('examination_name'))
            {
                $str_Names=implode(",", request('examination_name'));
            }
            $notes=request('notes');
            $city = new PatientGeneralExamination();
            $city->patient_id=$patient_id;
            $city->doctor_id=$id;
            $city->examination_id = isset($str_Names)?$str_Names:'';
            $city->notes = isset($notes)?$notes:'';
            $city->save();
            //SYSTEMIC EXAMINATION
            $city = new SystemExamination();
            $city->patient_id=$patient_id;
            $city->doctor_id=$id;
            $city->diagnosis = isset($request->diagnosis)?$request->diagnosis:'';
            $city->notes = isset($request->notes1)?$request->notes1:'';
            $city->save();
        //}
        //SYSTEMIC EXAMINATION
        return redirect()->route('admin_main.exindex',$patient_id);
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
        if(isset($request->diagnosis) && !isset($request->notes)){
            $validator = Validator::make($request->all(), [
            'diagnosis' => 'required',
            ]);    
        }elseif(!isset($request->diagnosis) && isset($request->notes)){
            $validator = Validator::make($request->all(), [
            'notes' => 'required',
            ]);    
        }else{
            $validator = Validator::make($request->all(), [
            'diagnosis' => 'required',
            'notes' => 'required',
            ]);
        }
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
        $city = new SystemExamination();
        $city->patient_id=$patient_id;
        $city->doctor_id=$id;
        $city->diagnosis = isset($request->diagnosis)?$request->diagnosis:'';
        $city->notes = isset($request->notes)?$request->notes:'';
        $city->save();
        return redirect()->route('admin_main.exindex',$patient_id);
        }
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
        $AdviceTreatment->hospital=request('hostipal');   //clinic id
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
        // $patient_detail = PatientHopi::
        //         select('hopi_patient.*')
        //         ->where('hopi_patient.patient_id','=',$patient_id)
        //         ->join('users', 'patient_detail.patient_id', '=', 'users.id')
        //         ->orderby('hopi_patient.id','desc')
        //         ->get();
        /*$patient_detail = PatientHopiData::
                select('hopi_patient_data.*','hopi_patient.patient_id','hopi_patient.doctor_id','users.fname as Dfname','p.fname as pfname')
                ->join('hopi_patient', 'hopi_patient_data.hopi_patient_id', '=', 'hopi_patient.id')
                ->join('users', 'hopi_patient.doctor_id', '=', 'users.id')
                ->join('users as p', 'hopi_patient.patient_id', '=', 'p.id')
                ->where('hopi_patient.patient_id','=',$patient_id)
                ->orderby('hopi_patient.id','desc')
                ->get();*/
        $patient_detail = PatientHopi::
        select('hopi_patient.*','hopi_patient.patient_id','hopi_patient.doctor_id','users.fname as Dfname','p.fname as pfname')
                ->join('users', 'hopi_patient.doctor_id', '=', 'users.id')
                ->join('users as p', 'hopi_patient.patient_id', '=', 'p.id')
                ->where('hopi_patient.patient_id','=',$patient_id)
                ->orderby('hopi_patient.id','desc')
                ->get();

        //dd($patient_detail);
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
        $patient_hopi->risk_factors=$hopidata;
        $patient_hopi->save();

        $hopiid = $patient_hopi->id;
        foreach ($complains as $key => $complain) {
          if(isset($complain)){
            $PatientComplain = new HopiPatientComplain();
            $PatientComplain->hopi_patient_id=$hopiid;
            $PatientComplain->complain_name=isset($complains[$key]) ? $complains[$key] : '';
            $PatientComplain->complain_since=isset($complainnos[$key]) ? $complainnos[$key] : '';
            $PatientComplain->complain_days=isset($complaindays[$key]) ? $complaindays[$key] : '';
            $PatientComplain->save();
            
            // $patienthopi = new PatientHopiData();
            // $patienthopi->hopi_patient_id = $hopiid;
            // $patienthopi->complain_name= isset($complains[$key]) ? $complains[$key] : '';
            // $patienthopi->complain_no = isset($complainnos[$key]) ? $complainnos[$key] : '';
            // $patienthopi->complain_days= isset($complaindays[$key]) ? $complaindays[$key] : '';
            // $patienthopi->problem = $hopidata;
            // $patienthopi->save();
          }
        }

        // dd($comorbidis);
        foreach ($comorbidis as $ckey => $comorbidi) {
          if(isset($comorbidi)){
            $PatientComorbidities= new HopiPatientComorbidities();
            $PatientComorbidities->hopi_patient_id=$hopiid;
            $PatientComorbidities->comorbidities_name=isset($comorbidis[$ckey]) ? $comorbidis[$ckey] : '';
            $PatientComorbidities->comorbidities_since=isset($comorbidinos[$ckey]) ?  $comorbidinos[$ckey] : '';
            $PatientComorbidities->comorbidities_days=isset($comorbidays[$ckey]) ? $comorbidays[$ckey] : '';
            $PatientComorbidities->save();
            // $patienthopi2 = new PatientHopiData();
            // $patienthopi2->hopi_patient_id = $hopiid;
            // $patienthopi2->complain_name = isset($comorbidis[$ckey]) ? $comorbidis[$ckey] : '';
            // $patienthopi2->complain_no = isset($comorbidinos[$ckey]) ?  $comorbidinos[$ckey] : '';
            // $patienthopi2->complain_days = isset($comorbidays[$ckey]) ? $comorbidays[$ckey] : '';
            // $patienthopi2->is_comorbidities = 1;
            // $patienthopi2->problem = $hopidata;
            // $patienthopi2->save();
          }
        }
        return redirect()->route('admin_main.hopiindex',$patient_id);
    }

    public function editHopi($patient_id,$testId)
    {
        $patientge = PatientHopi::find($testId);
        $patientge_data = PatientHopiData::where('hopi_patient_id',$patientge->id)->first();
        $patient_detail = PatientHopiData::
                select('hopi_patient_data.*','hopi_patient.patient_id','hopi_patient.doctor_id')
                ->join('hopi_patient', 'hopi_patient_data.hopi_patient_id', '=', 'hopi_patient.id')
                ->where('hopi_patient.patient_id','=',$patient_id)
                ->orderby('hopi_patient.id','desc')
                ->get();
        // dd($patientge_data);
        return view('admin_main.healthdata.healthdata_Hopi_edit',["patient_id" => $patient_id,'testId'=>$testId,'patientge'=>$patientge,'patientge_data'=>$patientge_data,'patient_detail'=>$patient_detail]);
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

    public function indexLabtests($patient_id){
        $lab_detail=PatientLabDetail::select('patient_lab_detail.id as uniqueid','patient_lab_detail.*')
                //->join('users', 'patient_lab_detail.patient_id', '=', 'users.id')
                ->where('patient_lab_detail.patient_id','=',$patient_id)
                ->orderBy('patient_lab_detail.test_date','DESC')
                ->get();
        //dd($lab_detail);
        $labreports = LabReportName::where('status',1)->orderby('test_name')->get();   
        return view('admin_main.labtest.index',["patient_id" => $patient_id,'lab_detail'=>$lab_detail,'labreports'=>$labreports]);
    }

    public function addLabtests($patient_id){
        $labreports=LabReportName::where('status',1)->get();
        return view('admin_main.labtest.add_labtest',["patient_id" => $patient_id,'labreports'=>$labreports]);
    }

    public function storeLabtests(Request $request,$patient_id){

        $validator = Validator::make($request->all(), [
                    'date' => 'required',
                    'labtestname' => 'required',
                    'value'=>'required'
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
            $timestamp = strtotime(request('date'));
            //$new_date = date("Y-m-d", $timestamp);
            $new_date = date("d/m/Y", $timestamp);
//            dd($new_date);
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
    }

    public function editLabtests($patient_id,$testId){
        $PatientLabDetail=PatientLabDetail::find($testId);
        $labreports=LabReportName::where('status',1)->get();
        $lab_detail =PatientLabDetail::select('patient_lab_detail.id as uniqueid','patient_lab_detail.*')
                ->where('patient_lab_detail.patient_id','=',$patient_id)
                ->orderby('patient_lab_detail.test_date','DESC')
                ->get();

        return view('admin_main.labtest.edit_labtest',["patient_id" => $patient_id,'testId'=>$testId,'lab_detail'=>$lab_detail,'PatientLabDetail'=>$PatientLabDetail,'labreports'=>$labreports]);
    }

    public function updateLabtests(Request $request,$patient_id,$testId){

        $validator = Validator::make($request->all(), [
                    'date' => 'required',
                    'labtestname' => 'required',
                    'value'=>'required'
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

    }

    public function deleteLabtests($patient_id,$testId){
        $city = PatientLabDetail::find($testId);
        if($city){
          $city->delete();
        }
        return redirect()->route('admin_main.labtestindex',$patient_id)->with('success','Lab Test deleted successfully.');
    }


    public function indexProcedure($patient_id){
        $patient_detail=PatientProcedure::select('patient_procedure.id as uniqueid','patient_procedure.*')
                ->where('patient_procedure.patient_id','=',$patient_id)
                ->orderBy('patient_procedure.procedure_date','DESC')
                ->get();
        $Procedure=Procedure::where('status',1)->orderby('procedure_name')->get();
        
        return view('admin_main.procedure.index',["patient_id" => $patient_id,'patient_detail'=>$patient_detail,'procedure'=>$Procedure]);
    }

     public function addProcedure($patient_id){

         $Procedure=Procedure::where('status',1)->get();
         return view('admin_main.procedure.add_procedures',["patient_id" => $patient_id,'procedure'=>$Procedure]);
    }

    public function storeProcedure(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
                    'date' => 'required',
                    'name' => 'required',
                    'impression'=>'required'
                ]);
        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($errors);
            exit;
        }
        else
        {
            $timestamp = strtotime(request('date'));
            $new_date = date("Y-m-d", $timestamp);
            $city = new PatientProcedure();
            $city->patient_id=$id;
            $city->coach_id='0';
            $city->procedure_name = request('name');
            $city->procedure_date = $new_date;
            $city->remark = request('impression');
            $city->save();
            return redirect()->route('admin_main.procedureindex',$id);
        }
    }
    public function editProcedure($patient_id,$id)
    {
        $PatientProcedure = PatientProcedure::find($id);
        $Procedure = Procedure::where('status',1)->get();
        $patient_detail =PatientProcedure::select('patient_procedure.id as uniqueid','patient_procedure.*')
                ->where('patient_procedure.patient_id','=',$patient_id)
                ->orderby('patient_procedure.procedure_date','DESC')
                ->get();
        return view('admin_main.procedure.edit_procedures',["patient_id" => $patient_id,'id'=>$id,'PatientProcedure'=>$PatientProcedure,'procedure'=>$Procedure,'patient_detail'=>$patient_detail,]);
    }
    public function updateProcedure(Request $request,$patient_id, $id)
    {
        $validator = Validator::make($request->all(), [
                    'date' => 'required',
                    'name' => 'required',
                    'impression'=>'required'
                ]);
        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($errors);
            exit;
        }
        else
        {
            $patient =  PatientProcedure::find($id);
            $timestamp = strtotime(request('date'));
            $new_date = date("Y-m-d", $timestamp);
            if($patient){
                $patient->patient_id = $patient_id;
                $patient->coach_id = '0';
                $patient->procedure_name = request('name');
                $patient->procedure_date = $new_date;
                $patient->remark = request('impression');
                $patient->save();
            }
            return redirect()->route('admin_main.procedureindex',$patient_id)->with('success','Procedure updated successfully.');
        }

    }

    public function deleteProcedure($patient_id,$id)
    {
        $city = PatientProcedure::find($id);
        if($city){
          $city->delete();
        }
        return redirect()->route('admin_main.procedureindex',$patient_id)->with('success','Procedure deleted successfully.');
    }

    public function indexVitals($patient_id){
        $vitals_detail = PatientHealthRecordDetail::select('patient_health_records.id as uniqueid','patient_health_records.*')
                ->where('patient_health_records.patient_id','=',$patient_id)
                ->orderBy('add_date', 'DESC')
                ->get();
        $PatientDetail=PatientDetail::where('patient_id','=',$patient_id)->first();
        //dd($PatientDetail);
        return view('admin_main.vitals.index',["patient_id" => $patient_id,'vitals_detail'=>$vitals_detail,'PatientDetail'=>$PatientDetail]);
    }

     public function addVitals($patient_id){

         return view('admin_main.vitals.add_vitals',["patient_id" => $patient_id]);
     }

    public function storeVitals(Request $request,$id)
    {

            $validator = Validator::make($request->all(), [
                    'date' => 'required',
            ]);
           $errors = $validator->errors();
            if ($validator->fails()) {
                return redirect()->back()
                                ->withInput($request->all())
                                ->withErrors($errors);
                exit;
            }
            else{
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

                $PatientDetailCount=PatientDetail::where('patient_id','=',$id)->count();
                
                if($PatientDetailCount==1){
                    $PatientDetail=PatientDetail::where('patient_id','=',$id)->first();
                    $PatientDetail->height=isset($request->height)?$request->height:'';
                    $PatientDetail->weight=isset($request->weight)?$request->weight:'';
                    $PatientDetail->bmi=isset($request->bmi)?$request->bmi:'';
                    $PatientDetail->save();
                }else{
                    $PatientDetail= new PatientDetail();
                    $PatientDetail->patient_id=$id;
                    $PatientDetail->height=isset($request->height)?$request->height:'';
                    $PatientDetail->weight=isset($request->weight)?$request->weight:'';
                    $PatientDetail->bmi=isset($request->bmi)?$request->bmi:'';
                    $PatientDetail->save();
                }
                return redirect()->route('admin_main.vitalsindex',$id);
            }
    }

    

    public function editVitals($patient_id,$id)
    {
        $vitals_detail = PatientHealthRecordDetail::select('patient_health_records.id as uniqueid','patient_health_records.*')
                ->where('patient_health_records.patient_id','=',$patient_id)
                ->orderBy('patient_health_records.add_date', 'DESC')
                ->get();
                //dd($vitals_detail);
        $PatientProcedure=PatientHealthRecordDetail::find($id);
        return view('admin_main.vitals.edit_vitals',["patient_id" => $patient_id,'id'=>$id,'vitals_detail'=>$vitals_detail,'PatientProcedure'=>$PatientProcedure]);
        
    }
    public function updateVitals(Request $request,$patient_id, $id)
    {
        $validator = Validator::make($request->all(), [
                    'date' => 'required',
            ]);
           $errors = $validator->errors();
            if ($validator->fails()) {
                return redirect()->back()
                                ->withInput($request->all())
                                ->withErrors($errors);
                exit;
            }
            else{
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
        $authuser = Auth::user();
        // $today = $this->dateconvertstr();
        // dd($id);
        $user_id = $authuser->id;
        $today = (string) date('d/m/Y');
        // dd($today);
        // dd($authuser->role_id);
        if($authuser->role_id == 5)
        {
            // $patient_detail =Appointments::where('appointment_details.date','>=', date('d/m/Y'))->where('appointment_details.clinic_id','=',$user_id)
            //     ->where('appointment_details.flag',1)->with('doctor','patient')->get();
            $patient_detail=Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                  //  ->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->leftjoin('users as d','appointment_details.doctor_id','=','d.id')
                    ->leftjoin('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.clinic_id','=',$user_id)
                    ->where('appointment_details.date','>=', date('Y-m-d'))
                    ->where('appointment_details.flag','=', 1)
                    ->get();
            //dd($user_id);
            //dd($patient_detail);
            return view('admin_main/appointments/upcoming',['PatientDetail'=>$patient_detail]);
        }

        if($authuser->role_id==2)
        {
            // $patient_detail =Appointments::where('appointment_details.date','>=', date('d/m/Y'))->where('appointment_details.doctor_id','=',$user_id)
            //     ->where('appointment_details.flag',1)->with('doctor','patient')->get();
                $patient_detail = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*','patient_detail.gender as gender','p.contact_number as contact_number','p.email as email','patient_detail.age as age')//
                    //->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->leftjoin('users as d','appointment_details.doctor_id','=','d.id')
                    ->leftjoin('users as p','appointment_details.patient_id','=','p.id')
                    ->leftjoin('patient_detail','appointment_details.patient_id','=','patient_detail.patient_id')
                    ->where('appointment_details.doctor_id','=',$user_id)
                    ->where('appointment_details.date','>=', date('Y-m-d'))
                    ->where('appointment_details.flag','=',1)
                    ->orderBy('date','DESC')
                    ->orderBy('time','DESC')
                    ->get();
            //dd($patient_detail);
            return view('admin_main/appointments/upcoming',['PatientDetail'=>$patient_detail]);
        }

    }

    public function pendingappointmentlist()
    {
        $authuser = Auth::user()->id;
        $previousdate = date("Y-m-d",strtotime("-1 day"));
        // dd($ppp);
        $patient_detail = Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                   //->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->join('users as d','appointment_details.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.clinic_id','=',$authuser)
                    // ->where('appointment_details.date','<',date('Y-m-d'))
                    ->where('appointment_details.flag','=',0)   //0 pending
                    ->get();

        return view('admin_main/appointments/pending',['PatientDetail'=>$patient_detail]);
    }

    public function pointofcareappointmentlist()
    {
        $id = Auth::user()->id;
        $patient_detail=Doctorrefer::select('doctorrefer.*','poc.fname as pocfname','pointofcare.poc_no as poc_no','pointofcare.city as poccity','pd.age as age','pd.gender as gender','pd.status as status','patient.fname as patientname','doctor_speciality.speciality as speciality','city.city as city','C.fname as Cfname','doc.fname as Dfname')
            //poc
            ->leftjoin('users as poc','doctorrefer.poc_id','=','poc.id')
            ->leftjoin('pointofcare','poc.id','=','pointofcare.user_id')
            ->leftjoin('users as patient','doctorrefer.user_id','=','patient.id')
            ->leftjoin('patient_detail as pd','doctorrefer.user_id','=','pd.patient_id')
            //doctor
            ->leftjoin('users as doc','doctorrefer.doc_id','=','doc.id')
            ->leftjoin('doctors','doctorrefer.doc_id','=','doctors.doctor_id')
            ->leftjoin('doctor_speciality','doctors.speciality','=','doctor_speciality.id')
            ->leftjoin('city','doctors.city','=','city.id')
            ->leftjoin('users as C','doctors.clinic_id','=','C.id')
            ->where('doctorrefer.doc_id','=',$id)
            ->get();
            //dd($patient_detail);
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

            $patient_detail=Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
                   // ->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->join('users as d','appointment_details.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->where('appointment_details.date','!=',date('Y-m-d'))
                    ->where('appointment_details.date','<=',date('Y-m-d'))
                    ->where('appointment_details.clinic_id','=',$user_id)
                    //->where('appointment_details.flag','=',1)
                    ->orderBy('date','DESC')
                    ->orderBy('time','DESC')
                    ->get();
            //dd($patient_detail);
            return  view('admin_main/appointments/past',['PatientDetail'=>$patient_detail]);
        }

        if($id->role_id==2)
        {
            // $patient_detail =Appointments::where('appointment_details.date','!=', date('d/m/Y'))->where('appointment_details.date','<=', date('d/m/Y'))->where('appointment_details.doctor_id','=',$user_id)->where('appointment_details.flag',1)->with('doctor','patient')->get();
            $patient_detail = Appointments::select('d.fname as doctorname','pds.age','pds.gender','p.fname as patientname','appointment_details.*')
                   // ->join('doctors','appointment_details.doctor_id','=','doctors.id')
                    ->leftjoin('users as d','appointment_details.doctor_id','=','d.id')
                    ->leftjoin('users as p','appointment_details.patient_id','=','p.id')
                    ->leftjoin('patient_detail as pds','pds.patient_id','=','appointment_details.patient_id')
                    ->where('appointment_details.date','!=',date('Y-m-d'))
                    ->where('appointment_details.date','<=',date('Y-m-d'))
                    ->where('appointment_details.doctor_id','=',$user_id)
                    ->orderBy('date','DESC')
                    ->orderBy('time','DESC')
                    //->where('appointment_details.flag','=',1)
                    ->get();
             //dd($patient_detail);

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
            $msg = 'approved';
        }
        elseif($status == 2)
        {
            $msg = 'rejected';
        }

        // $patient_name=isset($user_detail->patient->fname)?$user_detail->patient->fname:'';
        // $doctor_name=isset($user_detail->doctor->fname)?$user_detail->doctor->fname:'';
        // $para = array('patient_name' => $patient_name, 'doctor_name' => $doctor_name, 'type' => $msg);
        // $data['to_email'] = isset($user_detail->patient->email)?$user_detail->patient->email:'';
        // try {
        //     Mail::send('emailTemplate.appointment', ['parameter' => $para], function ($m) use($data) {
        //                     $m->from(Config::get('app.from_mail'), Config::get('app.from_name'));
        //                     $m->to($data['to_email'])->subject('Sensoriom | Appointments');
        //     });
        // } catch (Exception $e) {
            
        // }
        // 
        //dd($user_detail);
        $image=explode(" | ",$user_detail->report_file);
        //dd($image);
       try {

            $userdata['patient_name']=isset($user_detail->patient->fname)?$user_detail->patient->fname:'';
            $userdata['doctor_name']=isset($user_detail->doctor->fname)?$user_detail->doctor->fname:'';
            $userdata['status']=$msg;
            $userdata['report']=$image;
            $email=isset($user_detail->patient->email)?$user_detail->patient->email:'';
            $ppp=Mail::send('emailTemplate.appointment', ['parameter' => $userdata], function ($m) use($email) {
                $m->from(Config::get('app.from_mail'), Config::get('app.from_name'));
                $m->to($email)->subject('Sensoriom | Appointment Status');
                //dd($m);
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
        $authuserdata = Auth::user();
        $role_id = $authuserdata->role_id;
        if($role_id == 5){
        //edit clinic
        $settings=Clinic::where('user_id',$id)->first();
        $city = City::get()->toArray();
        return view('admin_main/settings/editsettings',['settings'=>$settings,'city'=>$city]);
        }elseif ($role_id == 2) {
            $DoctorDetail=DoctorDetail::where('doctor_id','=',$authuserdata->id)->first();
            //dd($DoctorDetail);
            $DoctorDays=DoctorDays::where('user_id','=',$authuserdata->id)->get();
            //dd($DoctorDays);
            return view('admin_main/settings/editsettings',['DoctorDetail'=>$DoctorDetail,'DoctorDays'=>$DoctorDays]);
        }

    }
    public function storedoctorsettings(Request $request)
    {
        //dd($request->all());
        $id=Auth::user()->id;
        if(!empty($request->fee_of_consultation)){
        DB::table('doctors')->where('doctor_id','=',$id)->update(['fee_of_consultation' => $request->fee_of_consultation]);
        }
        
        $days=request('days');
            if($days)
            {
                $id=Auth::user()->id;
                    foreach ($days as $key => $e) {
                        $starttime =  $e."_starttime";
                        $endtime =  $e."_endtime";
                        //dd($request->$starttime);
                        foreach ($request->$starttime as $key => $value) {
                            $DoctorDays = new DoctorDays;
                            $DoctorDays->user_id = $e ?$id :"";
                            $DoctorDays->days = $e? $e :"";
                            $DoctorDays->start_time = $request->$starttime[$key];
                            $DoctorDays->end_time = $request->$endtime[$key];
                            $DoctorDays->time_slot = $request->timeslot;
                            $DoctorDays->available ='1';
                            $DoctorDays->save();
                        }
                        
                    }
            }
            return redirect()->back();
    }
    public function editdoctorsettings(Request $request)
    {
        $id=Auth::user()->id;
        if(!empty($request->fee_of_consultation)){
        DB::table('doctors')->where('doctor_id','=',$id)->update(['fee_of_consultation' => $request->fee_of_consultation]);
        }
        //dd($id);
        $days=request('days');

            if($days)
            {
        
                $id=Auth::user()->id;
                DoctorDays::where('user_id',$id)->delete();
                    foreach ($days as $key => $e) {
                        $starttime =  $e."_starttime";
                        $endtime =  $e."_endtime";
                        foreach ($request->$starttime as $key => $value) {
                            
                            $DoctorDays = new DoctorDays;
                            $DoctorDays->user_id = $e ?$id :"";
                            $DoctorDays->days = $e? $e :"";
                            $DoctorDays->start_time = $request->$starttime[$key];
                            $DoctorDays->end_time = $request->$endtime[$key];
                            $DoctorDays->time_slot = $request->timeslot;
                            $DoctorDays->available ='1';
                            $DoctorDays->save();
                        }
                    }
            }
            return redirect()->back();
    }
    public function dayssearchtask($doctorid)
    {   
        //dd($doctorid);
        $response=DoctorDays::where('user_id','=',$doctorid)->get()->toArray();
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }
    public function updateSettings(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
                    'username' => 'required',
                    'address' => 'required',
                    'city' => 'required',
                    'currentpassword' => 'required',
        ],['currentpassword.required' => 'Enter your current password']);
        $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors($errors);
            exit;
        }
        else{
            if($request->newpassword){
                $newpassword=app('hash')->make($request->newpassword);
            }
            else{
                $newpassword=$request->oldpassword;
            }
            
            $settings = Clinic::where('user_id',$id)->first();
            $settings->fname=request('username');
            $settings->address=request('address');
            $settings->city=request('city');
            $settings->password = $newpassword;
            $settings->book_flag=request('flag');
            $settings->save();
            $userid=isset($settings->user_id)?$settings->user_id:'';
            $usercheck=User::find($userid);
            $password1 = Hash::check($request->currentpassword, $usercheck->password);
            //dd($password1);
            if ($password1 > 0) {
                $user = User::find($userid);
                $user->password=$newpassword;
                $user->save();
            }else{
                return redirect()->back()->with('danger','Login Password Wrong');
            }

            try {
                $para = array('fname' => $settings->fname);
                $data['to_email'] = 'accounts@sensoriom.com';
                Mail::send('emailTemplate.profilechange', ['parameter' => $para,'clinic' => $settings,'newpassword'=>$request->newpassword], function ($m) use($data) {
                    $m->from(Config::get('app.from_mail'), Config::get('app.from_name'));
                    $m->to($data['to_email'])->subject('Sensoriom | clinic update profile to Sensoriom');
                });  
            } catch (Exception $e) {
                
            }
            return redirect()->back()->with('success','Settings updated successfully');
        }
    }

    public function hospitalByCity($city_id)
    {
        $areas = Hospital::select('name','id')->where('city',$city_id)->get();
        return response()->json($areas);
    }

    public function clinicByCity($city_id)
    {
        $clinics = Clinic::select('fname as name','id')->where('city',$city_id)->get();
        return response()->json($clinics);
    }

    public function doctorclinicBySpeciality($clinic_id,$speciality_id,$city_id)
    {
        
        $authuserdata = Auth::user();

        $role_id = $authuserdata->role_id;
                $clinicid=Clinic::where('id','=',$clinic_id)->first();
                $doctorBySpeciality=DoctorDetail::
                        select('doctors.id as uniqueid','doctors.*', 'users.fname as name')
                        ->join('users', 'doctors.doctor_id', '=', 'users.id')
                        ->join('doctor_speciality_select', 'doctors.doctor_id', '=', 'doctor_speciality_select.doctor_id')
                        ->where('doctors.clinic_id','=',$clinicid->user_id)
                        ->where('doctor_speciality_select.speciality_id','=',$speciality_id)
                        ->where('users.verified',1)
                        ->get();
                return response()->json($doctorBySpeciality);
    }
    public function doctorBySpeciality($speciality_id,$city_id)
    {
        $authuserdata = Auth::user();

        $role_id = $authuserdata->role_id;
        if($role_id == 5)
        {
                $doctorBySpeciality=DoctorDetail::
                        select('doctors.id as uniqueid','doctors.*', 'users.fname as name')
                        ->join('users', 'doctors.doctor_id', '=', 'users.id')
                        ->join('doctor_speciality_select', 'doctors.doctor_id', '=', 'doctor_speciality_select.doctor_id')
                        ->where('doctors.clinic_id','=',$authuserdata->id)
                        ->where('doctor_speciality_select.speciality_id','=',$speciality_id)
                        ->where('users.verified',1)
                        ->get();
                return response()->json($doctorBySpeciality);
        }

        if($role_id == 2)
        {
                $doctorBySpeciality=DoctorDetail::
                        select('doctors.*','doctors.id as uniqueid', 'users.fname as name')
                        ->join('users', 'doctors.doctor_id', '=', 'users.id')
                        ->join('doctor_speciality_select', 'doctors.doctor_id', '=', 'doctor_speciality_select.doctor_id')
                        //->where('doctors.doctor_id','=',$authuserdata->id)
                        ->where('doctors.city','=',$city_id)
                        ->where('doctor_speciality_select.speciality_id','=',$speciality_id)
                        ->where('users.verified',1)
                        ->get();                                        
                return response()->json($doctorBySpeciality);
        }

         if($role_id == 6)
        {
                $doctorBySpeciality=DoctorDetail::
                        select('doctors.id as uniqueid','doctors.*', 'users.fname as name')
                        ->join('users', 'doctors.doctor_id', '=', 'users.id')
                        ->join('doctor_speciality_select', 'doctors.doctor_id', '=', 'doctor_speciality_select.doctor_id')
                        //->where('doctors.clinic_id','=',$authuserdata->id)
                        ->where('doctors.city','=',$city_id)
                        ->where('doctor_speciality_select.speciality_id','=',$speciality_id)
                        ->where('users.verified',1)
                        ->get();
                return response()->json($doctorBySpeciality);
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
          $panalistrefer = new Panalistrefer();
          $panalistrefer->user_id = request('pan_id');
          $panalistrefer->status = 1;
          $panalistrefer->panalist_id = request('panalist');
          $panalistrefer->poc_id = $id;
          $panalistrefer->question = request('query_text');
          $panalistrefer->save();
        }
        return redirect()->back()->with('success','Message send successfully to the Panelist.');
      # code...
    }


    //reffer panalist
    public function answerreferpanalistpatient(Request $request)
    {
        // dd($request->all());
      $validator = Validator::make($request->all(), [
                  'reffer_id' => 'required',
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
          $answer = Panalistrefer::find(request('reffer_id'));
          if($answer){
              $poc_id = $answer->poc_id;
              $answer->poc_id = $answer->panalist_id;
              $answer->panalist_id = $poc_id;
              $answer->save();
          }

          // $id = Auth::user()->id;
          // dd($answer);
          // $panalistrefer = new Panalistrefer();
          // $panalistrefer->user_id = request('pan_id');
          // $panalistrefer->status = 1;
          // $panalistrefer->panalist_id = request('panalist');
          // $panalistrefer->poc_id = $id;
          // $panalistrefer->question = request('query_text');
          // $panalistrefer->save();
        }
        return redirect()->back()->with('success','Reffer successfully');
      # code...
    }

    public function allpanalistpatient(){
       $id = Auth::user()->id;
       $patient_detail = Panalistrefer::select('panalistrefer.*','u.fname','u.id as uid','pd.age','pd.gender','u.contact_number','u.email')
                   ->leftjoin('users as u','panalistrefer.user_id','=','u.id')
                   ->leftjoin('patient_detail as pd','panalistrefer.user_id','=','pd.patient_id')
                   ->where('panalistrefer.panalist_id','=',$id)
                   ->get();
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

    public function arrivechangestatus(Request $request,$id)
    {
         //dd("Adsad");
        //echo "bhargav".$id;exit;
        // $user = User::where('email', $request->email)->first();
        $patient_arravis = Appointments::where('id',$id)->first();
        if($patient_arravis->arrives == 0){
            $patient_arravis = Appointments::where('id',$id)->update(['arrives'=>1]);
            return "1";
        }else{
            $patient_arravis = Appointments::where('id',$id)->update(['arrives'=>0]);
            return "0";
        }
        # code...
    }

    public function past_health_records($id) {
        $userid = Auth::user()->id;
        $PatientDetail=PatientDetail::
        select('patient_detail.age','patient_detail.id','patient_detail.patient_id as uniqueid','users.*','patient_detail.dob','patient_detail.gender', 'users.contact_number','users.email','patient_detail.profile_pic','patient_health_history.allergies as allergies','patient_detail.height as height','patient_detail.weight as weight','patient_detail.bmi as bmi')
        ->leftjoin('users', 'patient_detail.patient_id', '=', 'users.id')
        ->leftjoin('patient_health_history', 'patient_detail.patient_id', '=', 'patient_health_history.patient_id')
        ->where('patient_detail.patient_id',$id)
        ->first();
        $familyhistory=DB::table('patient_health_history_family')->where('patient_id', '=',$id)->first();
        if($familyhistory){
        $familyhistory=explode(",",$familyhistory->problem_id);
             $array=array();
            foreach ($familyhistory as $ids) {
                   $db=DB::table('list_of_problem')->where('id','=',$ids)->first();
                   $array[] = $db->problem;
            }
        $familyhistory=implode(",",$array);            
        }//familyhistory
        
        //patient_health_history
        $history=DB::table('patient_health_history')->where('patient_id', '=',$id)->first();
        $habit=array();
        if($history){
        $habit['smoking']=$history->smoking;
        $habit['alcohol_drinking']=$history->alcohol_drinking;
        $history=explode(",",$history->problem_id);
             $array=array();
            foreach ($history as $ids1) {
                   $db=DB::table('list_of_problem')->where('id','=',$ids1)->first();
                   $array[] = $db->problem;
            }
        $habit['problem']=implode(",",$array);
        }//history
        
        $charts=PatientHealthRecordDetail::where('patient_id','=',$id)->orderBy('add_date', 'DESC')->get();
        $PatientLab=PatientLabDetail::where('patient_id','=',$id)->orderBy('test_name', 'ASC')->get();
        $PatientProcedure=PatientProcedure::where('patient_procedure.patient_id','=',$id)->orderBy('procedure_name', 'ASC')->get();
        
        $PatientPriscription=PatientPriscription::
        select('patient_priscription.*','users.fname as Dfname','patient_detail.height as height','patient_detail.weight as weight','patient_detail.bmi as bmi')
        ->leftjoin('users', 'patient_priscription.doctor_id', '=', 'users.id')
        ->leftjoin('patient_detail', 'patient_priscription.patient_id', '=', 'patient_detail.patient_id')
        ->where('patient_priscription.patient_id','=',$id)
        ->orderBy('created_at', 'DESC')
        ->get();
        return view('admin_main/past_health_records',array('PatientDetail' => $PatientDetail,'charts'=>$charts,'PatientLab'=>$PatientLab,'PatientPriscription'=>$PatientPriscription,'PatientProcedure'=>$PatientProcedure,'familyhistory'=>$familyhistory,'history'=>$habit));
    }
    //CLINICAL MANAGEMENT
    public function indexClinicalManagement($patient_id)
    {
        $patient_detail=AdviceTreatment::
                //leftjoin('users', 'appointment_details.doctor_id', '=', 'users.id')
                select('investigation.*','investigation_goal.*')//,'users.fname as Dfname'
                ->leftjoin('investigation_goal', 'investigation.id', '=', 'investigation_goal.investigation_id')
                ->where('investigation.patient_id','=',$patient_id)
                ->orderby('investigation.id','desc')
                ->get();
        $city = City::where('status',1)->get();
        $speciality = Speciality::where('status',1)->orderby('speciality')->get();
        $hospital=Hospital::get();
        
        $refer = DB::table('appointment_details')
        ->join('clinic', 'appointment_details.clinic_id', '=', 'clinic.user_id')
        ->join('doctor_speciality', 'appointment_details.speciality_id', '=', 'doctor_speciality.id')
        ->join('city', 'appointment_details.city_id', '=', 'city.id')
        ->join('users', 'appointment_details.doctor_id', '=', 'users.id')
        ->select('appointment_details.*','clinic.fname as Cfname', 'doctor_speciality.speciality', 'city.city','users.fname as Dfname')
        ->where('patient_id','=',$patient_id)
        ->get();

        //Priscription
        $lab_detail=PatientPriscription::select('patient_priscription.id as uniqueid','patient_priscription.*','d.fname as doctorname')
                ->leftjoin('users as d', 'patient_priscription.doctor_id', '=', 'd.id')
                ->where('patient_priscription.patient_id','=',$patient_id)
                ->get();
        $medicines=DB::table('medicines')->orderby('name')->get();
        return view('admin_main.healthdata.healthdata_CM',["patient_id" => $patient_id,'patient_detail'=>$patient_detail,'city'=>$city,'speciality'=>$speciality,'hospital'=>$hospital,'lab_detail'=>$lab_detail,'refer'=>$refer,'medicines'=>$medicines]);
    }
    public function StoreClinicalManagement(Request $request,$patient_id)
    {
        // dd($request->drugname[0]);
        // dd($request->all());
        //echo "<pre>";print_r($request->all());exit;
        $id = Auth::user()->id;
        //System Examination
        if($request->diagnosis){
            $sm = new SystemExamination();
            $sm->patient_id=$patient_id;
            $sm->doctor_id=$id;
            $sm->diagnosis = request('diagnosis');
            $sm->save();
        }
        //dd(request('user_id'));
        if(isset($request->doctorname)){
            $dd=DoctorDetail::where('id',request('doctorname'))->first();
        }else{
            $dd=DoctorDetail::where('doctor_id',$id)->first();
        }
        //Priscription
        foreach ($request->drugname as $key => $value) {
            $pp = new PatientPriscription();
            $pp->patient_id=$patient_id;
            $pp->doctor_id=isset($dd->doctor_id)?$dd->doctor_id:'';
            $pp->diagnosis = isset($request->diagnosis)?$request->diagnosis:'';
            $pp->medicine_name = $request->drugname[$key];
            $pp->dose = $request->dose[$key];
            $pp->freq = $request->frequency[$key];
            $pp->route = $request->route[$key];
            $pp->duration = $request->duration[$key];
            $pp->notes = isset($request->notes[$key]) ? $request->notes[$key] : '';//request('notes');
            $pp->save();
        }
            
        //Advice Treatment
        $goal = request('goal');
        $no = request('no');
        $days = request('days');
        if (isset($request->reasonforreferral)) {
        $Appointments=new Appointments();
        $Appointments->user_id = 0;//request('reasonforreferral');//user_id
        $Appointments->clinic_id = isset($dd->clinic_id)?$dd->clinic_id:'';
        $Appointments->patient_id = $patient_id;
        $Appointments->city_id = isset($request->city) ? $request->city : '';
        $Appointments->hostipal_id = isset($request->hostipal) ? $request->hostipal : '';//request('hostipal');
        $Appointments->speciality_id = isset($request->speciality) ? $request->speciality : '';//request('speciality');
        $Appointments->doctor_id = isset($dd->doctor_id)?$dd->doctor_id:'';
        $Appointments->date = date('Y-m-d', strtotime("+1 day"));
        //$Appointments->poc_id =$id;
        $Appointments->time = '1:15 PM';
        $Appointments->flag = 0;
        $Appointments->role = 6;
        $Appointments->reason_refer = isset($request->reasonforreferral)?$request->reasonforreferral:'';
        $Appointments->save();
        }
        //doctor referral
        if (isset($request->reasonforreferral)) {
            # code...
        $docrefer = new Doctodoc;
        $docrefer->doc_send=$id;
        $docrefer->doc_rec=isset($dd->doctor_id)?$dd->doctor_id:'';
        $docrefer->appointment_id=$Appointments->id;
        $docrefer->message=request('reasonforreferral');
        $docrefer->date=date('Y-m-d');
        $docrefer->save();
        }
        $AdviceTreatment = new AdviceTreatment();
        $AdviceTreatment->doctor_id=isset($dd->doctor_id)?$dd->doctor_id:'';
        $AdviceTreatment->patient_id=$patient_id;
        $AdviceTreatment->date=request('date');
        $AdviceTreatment->investigation_name = request('investigationnotes');
        $AdviceTreatment->city = request('city');
        $AdviceTreatment->hospital=isset($request->hostipal) ? $request->hostipal : 0;   //clinic id
        $AdviceTreatment->speciality = isset($request->speciality) ? $request->speciality : 0;//request('speciality');
        $AdviceTreatment->doctorsname =$dd->doctor_id;//isset($dd)?$dd->doctor_id:'';
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
        // dd($days);
        return redirect()->route('admin_main.clinical_managementindex',$patient_id);
    }
    public function referral(Request $request)
    {

        $id = Auth::user()->id;
            // $patient_detail=Doctorrefer::
            // select('doctorrefer.*','pd.age as age','pd.gender as gender','patient.fname as patientname','patient.id as patient_id','doc.fname as Dfname','city.city as city','C.fname as Cfname')
            // ->leftjoin('patient_detail as pd','doctorrefer.user_id','=','pd.patient_id')
            // ->leftjoin('users as patient','doctorrefer.user_id','=','patient.id')
            // ->leftjoin('users as doc','doctorrefer.doc_id','=','doc.id')
            // ->leftjoin('doctors','doctorrefer.doc_id','=','doctors.doctor_id')
            // ->leftjoin('city','doctors.city','=','city.id')
            // ->leftjoin('users as C','doctors.clinic_id','=','C.id')
            // ->where('doctorrefer.doc_id','=',$id)
            // ->orderby('doctorrefer.created_at','DESC')
            // ->get();//referral2
        $patient_detail=DB::table('doctodoc')
        ->select('doctodoc.*','doc.fname as Dfname','C.fname as Cfname','doc.id as doc_id','city.city','pd.age','pd.gender','pd.patient_id','patient.fname as patientname','doctodoc.message as question')
        ->join('appointment_details', 'doctodoc.appointment_id', '=','appointment_details.id')
        ->join('city', 'appointment_details.city_id', '=', 'city.id')
        ->leftjoin('patient_detail as pd','appointment_details.patient_id','=','pd.patient_id')
        //doctor
        ->leftjoin('users as doc', 'doctodoc.doc_send', '=', 'doc.id')
        ->join('users as patient', 'appointment_details.patient_id', '=', 'patient.id')
        ->leftjoin('users as C', 'appointment_details.clinic_id', '=', 'C.id')
        ->where('doc_rec','=',$id)
        ->get();
        return  view('admin_main/appointments/referral',['PatientDetail'=>$patient_detail]);
    }
    public function patient_plan_store(Request $request)
    {
        //dd($request->all());   
        $patient_health_plan=new PatientHealthPlan();
        $patient_health_plan->patient_id=$request->patient_id;
        $patient_health_plan->plan_id=$request->plan_id;
        $patient_health_plan->in_pay=$request->in_pay;
        $patient_health_plan->status=1;
        $patient_health_plan->save();
    }
    public function reappointment (Request $request,$id)
    {       
            
            $AuthUser = Auth::user();
            $UserQuery=User::query();
            $AppointmentsQuery=Appointments::query();

            $PatientData=$UserQuery
            ->where('role_id','=','4')
            ->where('id','=',$id)
            ->first();
            //dd($PatientData);
            $PatientOldAppointments=$AppointmentsQuery
            ->where('patient_id','=',$PatientData->id)
            ->orderby('date','DESC')
            ->orderby('time','DESC')
            ->first();

            //dd($PatientOldAppointments);
            //User::find($userid);
            //$Appointments=new Appointments;
            $Appointments=Appointments::find($PatientOldAppointments->id);
            $Appointments->user_id=$AuthUser->id;
            $Appointments->clinic_id=$PatientOldAppointments->clinic_id;
            $Appointments->patient_id=$PatientData->id;
            $Appointments->city_id=$PatientOldAppointments->city_id;
            $Appointments->hostipal_id=$PatientOldAppointments->hostipal_id;
            $Appointments->speciality_id=$PatientOldAppointments->speciality_id;
            $Appointments->doctor_id=$PatientOldAppointments->doctor_id;
            $Appointments->date=date("Y-m-d", strtotime($request->date));
            $Appointments->time=date("H:i", strtotime($request->time));
            $Appointments->flag=1;
            $Appointments->adhaarno=$PatientOldAppointments->adhaarno;
            $Appointments->role=4;
            $Appointments->poc_id='';
            $Appointments->arrives=0;
            //dd($Appointments);
            $Appointments->save();
            return redirect()->back()->with('success','Appointment booked Successfully.');
    }
    public function medicinesList(Request $request)
    {
        if($request->get('query'))
        {
            //https://www.webslesson.info/2018/06/ajax-autocomplete-textbox-in-laravel-using-jquery.html
            $query = $request->get('query');
            $data = DB::table('medicines')
            ->select('name')
            ->where('name', 'LIKE', "%{$query}%")
            ->where('status',1)
            ->orderby('name')
            ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative;height: 150px;overflow: hidden;width: 400px;" >';
            foreach($data as $row)
            {
                $output .= '
                <li><a href="#">'.$row->name.'</a></li>
                ';
            }
            $output .= '</ul>';
            echo $output;
        }

        
    }
    public function printappointment($patientid)
    {
        try{
        $patientprint=User::select('users.*','patient_detail.*')
        ->leftjoin('patient_detail', 'users.id', '=', 'patient_detail.patient_id')
        ->where('users.id','=',$patientid)
        ->where('users.role_id','=',4)
        ->first()
        ;
        //dd($patientprint);
        $appointment=DB::table('appointment_details')
        ->select('appointment_details.*','clinic.fname as clinicname','doctor.fname as doctorname','city.city as city')
        ->leftjoin('users as clinic', 'appointment_details.clinic_id', '=', 'clinic.id')
        ->leftjoin('users as doctor', 'appointment_details.doctor_id', '=', 'doctor.id')
        ->leftjoin('city', 'appointment_details.city_id', '=', 'city.id')
        ->where('patient_id','=',$patientid)
        ->first();
        //dd($appointment);
        $data = [
                'patientid' => $patientid,
                'fname' => $patientprint->fname,
                'email' => $patientprint->email,
                'contact_number' => $patientprint->contact_number,
                'gender' => $patientprint->gender,
                'dob' => date("d-m-Y", strtotime($patientprint->dob)),
                'age' => $patientprint->age,
                'marital_status' => $patientprint->marital_status,
                'blood_group' => $patientprint->blood_group,
                'height' => $patientprint->height,
                'weight' => $patientprint->weight,
                'bmi' => $patientprint->bmi,
                'clinicname' => $appointment->clinicname,
                'city' => $appointment->city,
                'doctorname' => $appointment->doctorname,
                'appointmentdate' => date("d-m-Y", strtotime($appointment->date)),
                'appointmenttime' => date("g:i A", strtotime($appointment->time)),
            ];
        $pdf = PDF::loadView('print/appointment', $data);
        return $pdf->download(ucfirst($patientprint->fname).'.pdf');
        }catch (\Illuminate\Database\QueryException $exc) {
            return redirect()->route('patient.viewall_patient');
        }
    }
    public function datesearchtask($doctorid,$date)
    {
            //dd($doctorid);
            //dd(date('l', strtotime($date)));
            $dId=DB::table('doctors')->where('id','=',$doctorid)->first();
            //dd($dId);
            //dd($dId);
            $DoctorDaysQ=DoctorDays::where('user_id','=',$dId->doctor_id)
                ->where('days','=',lcfirst(date('l', strtotime($date))));
                $DoctorDays=$DoctorDaysQ->get();
                //dd($DoctorDays);
                //$Doctorcount=$DoctorDaysQ->count();
                
                if(count($DoctorDays) > 0){
                //dd($DoctorDays);
                foreach ($DoctorDays as $key => $dd) {
                    $slopt = $this->getServiceScheduleSlots($dd['time_slot'], $dd['start_time'],$dd['end_time']);
                    foreach ($slopt as $key => $s) {
                      $sp[] = $s;
                    }
                }
                //dd($sp);
               $DoctorDays=$DoctorDaysQ->first();
               foreach ($sp as $slot) {
                    //dd($slot);
                    $checkAppointments=Appointments::
                    where('doctor_id','=',$doctorid)
                    ->whereDate('date','=',date("Y-m-d", strtotime($date)))
                    ->whereTime('time','=',$slot['start'])
                    ->count();
                    //dd($checkAppointments);
                    if($checkAppointments==0){
                        //$check=1;
                        $dxy[]= array(
                        'start_time'=>date("g:i A", strtotime($slot['start'])),
                        'end_time'=>date("g:i A", strtotime($slot['end'])),
                        );
                    }
                    
                }
                //dd($dxy);
                return response()->json($dxy);
                
                }//count doctor day
                else{
                    //dd($end);
                    // $slopt = $this->getServiceScheduleSlots(15, "00:00","23:30");
                    // //dd($slopt);
                    $day=[];
                    // foreach ($slopt as $key => $value) {
                    //     $day['start_time']=date("g:i A", strtotime($value['start']));
                    //     $day['end_time']=date("g:i A", strtotime($value['end']));
                    //     $dayv[]=$day;
                    // }
                    // $day['start_time']=date("g:i A", strtotime("23:30"));
                    // $day['end_time']=date("g:i A", strtotime("23:45"));
                    // $dayv[]=$day;
                    // $day['start_time']=date("g:i A", strtotime("23:45"));
                    // $day['end_time']=date("g:i A", strtotime("00:00"));
                    $day['start_time']="Time slot";
                    $day['end_time']='not selected';
                    $dayv[]=$day;
                    return response()->json($dayv);
                }
        
    }
    public function getServiceScheduleSlots($duration, $start,$end)
    {
        $start = new DateTime($start);
        $end = new DateTime($end);
        $start_time = $start->format('H:i');
        $end_time = $end->format('H:i');
        $i=0;
        //dd($end_time);
        while(strtotime($start_time) <= strtotime($end_time)){
            $start = $start_time;
            $end = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));
            $start_time = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));
            $i++;

            if(strtotime($start_time) <= strtotime($end_time)){
                $time[$i]['start'] = $start;
                $time[$i]['end'] = $end;
            }
        }
    return $time;
    }

}
