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
use App\Cardiology;
use App\Dermatology;
use App\GeneralDiabetes;
use App\GeneralSurgery;
use App\Neurology;
use App\Neurosurgery;
use App\Obstetrics;
use App\Orthopedics;
use App\Psychiatry;
use App\Pulmonary;
use App\CTVS;
use App\Dentistry;
use App\Endocrinology;
use App\ENT;
use App\Gastroenterology;
use App\Nephrology;
use App\Oncology;
use App\Ophthalmology;
use App\Pediatrics;
use App\PediatricSurgery;
use App\SurgicalGastroenterology;
use App\SurgicalOncology;
use App\Urology;
use App\PlasticSurgery;
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
                $doctors=DoctorDetail::where('doctor_id',$user_id)->where('clinic_id','=',0)->first();
               
                if($doctors)
                {
               
                     return redirect('admin')->with('success','You are not authorised to access panel.');
                }
                

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
                //->where('appointment_details.flag','=',1)
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
    
    public function indexvitalslabtest($patient_id)
    {
        $lab_detail=  PatientLabDetail::select('patient_lab_detail.id as uniqueid','patient_lab_detail.*')
                    ->where('patient_lab_detail.patient_id','=',$patient_id)
                    ->orderBy('patient_lab_detail.test_date','DESC')
                    ->get();
//dd($lab_detail);
//11-06-2020 bhargav 
$a=[];
foreach ($lab_detail as $key => $l) {
    $datetime = DateTime::createFromFormat('d/m/Y', $l->test_date);
    $la['test_date']=$datetime->format('Y-m-d');
    $la['uniqueid']=$l->uniqueid;
    $la['id']=$l->id;
    $la['coach_id']=$l->coach_id;
    $la['patient_id']=$l->patient_id;
    $la['test_name']=$l->test_name;
    $la['value']=$l->value;
    $la['unit']=$l->unit;
    $la['result']=$l->result;
    $la['status']=$l->status;
    $la['created_at']=$l->created_at;
    $la['updated_at']=$l->updated_at;
    $a[]=$la;
}
$lab_detail=$a;
array_multisort( array_column($lab_detail, "test_date"), SORT_DESC, $lab_detail );
//dd($lab_detail);
        $labreports = LabReportName::where('status',1)->orderby('test_name')->get(); 

        $Procedure_detail=  PatientProcedure::select('patient_procedure.id as uniqueid','patient_procedure.*')
                            ->where('patient_procedure.patient_id','=',$patient_id)
                            ->orderBy('patient_procedure.procedure_date','DESC')
                            ->get();
//dd($patient_detail);
        //11-06-2020 bhargav
$a=[];
foreach ($Procedure_detail as $key => $l) {
$datetime = DateTime::createFromFormat('d/m/Y', $l->procedure_date);
$la['procedure_date']=strtotime($datetime->format('Y-m-d'));
$la['uniqueid']=$l->uniqueid;
$la['id']=$l->id;
$la['coach_id']=$l->coach_id;
$la['patient_id']=$l->patient_id;
$la['procedure_name']=$l->procedure_name;
$la['remark']=$l->remark;
$la['status']=$l->status;
$la['created_at']=$l->created_at;
$la['updated_at']=$l->updated_at;
$a[]=$la;
}
$Procedure_detail=$a;
array_multisort( array_column($Procedure_detail, "procedure_date"), SORT_DESC, $Procedure_detail );                            
                            
        $Procedure=Procedure::where('status',1)->orderby('procedure_name')->get(); 

        $vitals_detail = PatientHealthRecordDetail::select('patient_health_records.id as uniqueid','patient_health_records.*')
                ->where('patient_health_records.patient_id','=',$patient_id)
                ->orderBy('patient_health_records.add_date', 'DESC')
                ->get();
//11-06-2020 bhargav
        //dd($vitals_detail);
$a=[];
foreach ($vitals_detail as $key => $l) {
$datetime = DateTime::createFromFormat('d/m/Y', $l->add_date);
$la['add_date']=strtotime($datetime->format('Y-m-d'));
$la['uniqueid']=$l->uniqueid;
$la['id']=$l->id;
$la['patient_id']=$l->patient_id;
$la['blood_pressure_min_value']=$l->blood_pressure_min_value;
$la['blood_pressure_max_value']=$l->blood_pressure_max_value;
$la['pluse']=$l->pluse;
$la['temperature']=$l->temperature;
$la['oxygen_saturation']=$l->oxygen_saturation;
$la['breathing_rate']=$l->breathing_rate;
$la['abdominal_circumference']=$l->abdominal_circumference;
$la['blood_sugar']=$l->blood_sugar;
$la['weight']=$l->weight;
$la['height']=$l->height;
$la['bmi']=$l->bmi;
$la['status']=$l->status;
$la['created_at']=$l->created_at;
$la['updated_at']=$l->updated_at;
$a[]=$la;
}
$vitals_detail=$a;
array_multisort( array_column($vitals_detail, "add_date"), SORT_DESC, $vitals_detail );

        $PatientDetail=PatientDetail::
            select('patient_detail.*','users.email as email','users.contact_number as contact_number')
            ->join('users', 'patient_detail.patient_id', '=', 'users.id')
            ->where('patient_id','=',$patient_id)
            ->first(); 
        
        return view('admin_main.healthdata.vitals_labtest',["patient_id" => $patient_id,'lab_detail'=>$lab_detail,'labreports'=>$labreports,'Procedure_detail'=>$Procedure_detail,'Procedure'=>$Procedure,'vitals_detail'=>$vitals_detail,'PatientDetail'=>$PatientDetail]);
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
            //->where('appointment_details.flag','=',1)
            ->distinct('patient_detail.patient_id')
            
            ->get();
            
        }

        if($id->role_id==6)
        {  
            if (isset($_GET['phonenumber'])) {
                //dd($_GET['phonenumber']);
                $patient_detail =PatientDetail::
                select('patient_detail.id as uniqueid','patient_detail.dob','patient_detail.patient_id','users.*','patient_detail.dob','patient_detail.age as age','patient_detail.gender', 'users.contact_number','users.email','pf.*','df.answer as dranswer')
                ->join('users', 'patient_detail.patient_id', '=', 'users.id')
                ->leftjoin('panalistrefer as pf', 'users.id', '=', 'pf.user_id')
                ->leftjoin('doctorrefer as df', 'users.id', '=', 'df.user_id')
                ->where('users.contact_number','LIKE','%'.$_GET['phonenumber'].'%')
                //->where('patient_detail.clinic_id','=',$id->id)
                ->orderby('uniqueid','desc')
                ->get();
            }else{
            $patient_detail =PatientDetail::
                select('patient_detail.id as uniqueid','patient_detail.dob','patient_detail.patient_id','users.*','patient_detail.dob','patient_detail.age as age','patient_detail.gender', 'users.contact_number','users.email','pf.*','df.answer as dranswer')
                ->join('users', 'patient_detail.patient_id', '=', 'users.id')
                 ->leftjoin('panalistrefer as pf', 'users.id', '=', 'pf.user_id')
                 ->leftjoin('doctorrefer as df', 'users.id', '=', 'df.user_id')
                ->where('patient_detail.clinic_id','=',$id->id)
                ->orderby('uniqueid','desc')
                ->groupby('uniqueid')
                ->get();
            }    
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
    
    public function panelists(){
        $panelists=User::
        select('users.*','experties.expertise')
        ->join('experties', 'users.expertise', '=', 'experties.id')
        ->where('users.role_id',8)
        ->get();
        return  view('admin_main/panelists',['panelists'=>$panelists]);
    }
    
    public function Answer($id)
    {
        //dd($id);
        $patient_detail =PatientDetail::
                select('patient_detail.id as uniqueid','patient_detail.dob','patient_detail.patient_id','users.*','patient_detail.dob','patient_detail.age as age','patient_detail.gender', 'users.contact_number','users.email','pf.*','df.answer as dranswer')
                ->join('users', 'patient_detail.patient_id', '=', 'users.id')
                 ->leftjoin('panalistrefer as pf', 'users.id', '=', 'pf.user_id')
                 ->leftjoin('doctorrefer as df', 'patient_detail.patient_id', '=', 'df.user_id')
                ->where('patient_detail.patient_id','=',$id)
                ->orderby('uniqueid','desc')
                ->first();
        $currentdate=date('d-m-Y');
        $currentdatef=date('Y-m-d');
        //above old 
        $patient_detail2=AdviceTreatment::
        select('investigation.*','investigation_goal.*')
        ->leftjoin('investigation_goal', 'investigation.id', '=', 'investigation_goal.investigation_id')
        ->where('investigation.patient_id','=',$id)
        ->where('investigation.date',$currentdate)
        ->orderby('investigation.id','desc')
        ->get();
        $refer = DB::table('appointment_details')
        ->join('clinic', 'appointment_details.clinic_id', '=', 'clinic.user_id')
        ->join('doctor_speciality', 'appointment_details.speciality_id', '=', 'doctor_speciality.id')
        ->join('city', 'appointment_details.city_id', '=', 'city.id')
        ->join('users', 'appointment_details.doctor_id', '=', 'users.id')
        ->select('appointment_details.*','clinic.fname as Cfname', 'doctor_speciality.speciality', 'city.city','users.fname as Dfname')
        ->where('patient_id','=',$id)
        ->where('appointment_details.date',$currentdatef)
        ->get();

        //Priscription
        $lab_detail=PatientPriscription::select('patient_priscription.id as uniqueid','patient_priscription.*','d.fname as doctorname')
        ->leftjoin('users as d', 'patient_priscription.doctor_id', '=', 'd.id')
        ->where('patient_priscription.patient_id','=',$id)
        ->whereDate('patient_priscription.created_at',$currentdatef)
        ->get();
        
        return view('admin_main/replayanswer',['Patient_id'=>$id,'Patient_detail'=>$patient_detail,'refer'=>$refer,'patient_detail'=>$patient_detail2,'lab_detail'=>$lab_detail]);
        
    }
    
    public function PanelAnswer($id)
    {
        $patient_detail =PatientDetail::
                select('patient_detail.id as uniqueid','patient_detail.dob','patient_detail.patient_id','users.*','patient_detail.dob','patient_detail.age as age','patient_detail.gender', 'users.contact_number','users.email','pf.*','df.answer as dranswer')
                ->join('users', 'patient_detail.patient_id', '=', 'users.id')
                ->leftjoin('panalistrefer as pf', 'users.id', '=', 'pf.user_id')
                ->leftjoin('doctorrefer as df', 'patient_detail.patient_id', '=', 'df.user_id')
                ->where('patient_detail.patient_id','=',$id)
                ->orderby('uniqueid','desc')
                ->first();
        if($patient_detail){
        $panalistrefer=DB::table('panalistrefer')
        ->where('user_id',$patient_detail->user_id)
        ->where('panalist_id',$patient_detail->panalist_id)
        ->where('poc_id',$patient_detail->poc_id)
        ->orderby('id','desc')
        ->first();
            if($panalistrefer->answer){
                 $patient_detail->answer =$panalistrefer->answer; 
            }
        }
        return view('admin_main/panelanswer',['Patient_id'=>$id,'Patient_detail'=>$patient_detail]);
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
                $users=User::where('email',$request->email)->first();
                //dd($users);
                if($users)
                {
                    
                    
                    return redirect()->back()
                            ->withInput($request->all())
                            ->withErrors(['email address already exists']);
        
            
                }
                else
                {
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
                    
                    $HealthTeam=new HealthTeam;
                    $HealthTeam->patient_id=$masteradmin->id;
                    $HealthTeam->doctor_id=isset($doctor_detail)?$doctor_detail->doctor_id:'';
                    $HealthTeam->hospital_id=$id;
                    $HealthTeam->save();
                    
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
        
        $AppointmentsLasttId=Appointments::select('id')->where('user_id',$id)->orderby('created_at','DESC')->first();
        //dd($AppointmentsLasttId);
        
        if($AppointmentsLasttId){
        $Appointments=Appointments::find($AppointmentsLasttId->id);
        $Appointments->is_read=1;
        $Appointments->save();
        }
        
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
        
        $patient_health_plan=DB::table('patient_health_plan')
        ->where('patient_id',$PatientDetail->uniqueid)
        ->OrderBy('created_at','DESC')
        ->first();
        
        if($role == 5){
        $doctorlist=DoctorDetail::
        select('doctors.*','users.fname as doctorname')
        ->join('users', 'doctors.doctor_id', '=', 'users.id')
        ->where('clinic_id',$userid)
        ->get();
        }else{
            $doctorlist=(object) [];
        }
        
        //dd($master_health_plan);
        $speciality = Speciality::where('status',1)->orderby('speciality')->get();
        return view('admin_main/add_patient',array('PatientDetail' => $PatientDetail,'master_health_plan'=>$master_health_plan,'speciality'=>$speciality,'doctorlist'=>$doctorlist,'patient_health_plan'=>$patient_health_plan));   
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
                    $doctor_main->speciality = $request->speciality;
                    $doctor_main->mbbs_registration_number = $request->registration_no;
                    $doctor_main->mbbs_authority_council_name = $request->registration_council;
                    $doctor_main->aadhhar_no = $request->aadhhar_no;
                    $doctor_main->fee_of_consultation = isset($request->fee_of_consultation)?$request->fee_of_consultation:'';
                    $doctor_main->profile_pic=isset($path)?$path:'';
                    $doctor_main->exp_year=request('exp_year');
                    $doctor_main->save();

                    // foreach (request('speciality') as $value) {
                    //         $doctor_speciality=new DoctorSpecialitySelect;
                    //         $doctor_speciality->doctor_id=$masteradmin->id;
                    //         $doctor_speciality->speciality_id=$value;
                    //         $doctor_speciality->save();
                    // }
                     // foreach (request('speciality') as $value) {
                            $doctor_speciality=new DoctorSpecialitySelect;
                            $doctor_speciality->doctor_id=$masteradmin->id;
                            $doctor_speciality->speciality_id=request('speciality');
                            $doctor_speciality->save();
                    // }
                    
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
                    'exp_year'=>isset($request->exp_year)?$request->exp_year:''
                ]);
                //DoctorSpecialitySelect::where('doctor_id',$user_id)->delete();

                // foreach (request('speciality') as $value) {
                //             $doctor_speciality=new DoctorSpecialitySelect;
                //             $doctor_speciality->doctor_id=$request->id;
                //             $doctor_speciality->speciality_id=$value;
                //             $doctor_speciality->save();
                //     }
                /*
                $doctor_speciality=new DoctorSpecialitySelect;
                $doctor_speciality->doctor_id=$user_id;
                $doctor_speciality->speciality_id=request('speciality');
                $doctor_speciality->save();
                */
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
            $doctor_speciality=DoctorDetail::where('doctor_id',$id)->first();
            
            $specialty=Speciality::where('id',$doctor_speciality->speciality)->first();
            $specialty_name=isset($specialty)?$specialty->speciality:'';
            $name=strtolower(preg_replace('/\s/', '', $specialty_name));
          //dd($name);
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
            //dd($city->id);
            $lastexaminationid=$city->id;
            //
            if($name=='dermatology'){

                $Dermatology = new Dermatology();
                $Dermatology->doctor_id=$id;
                $Dermatology->examination_id=$lastexaminationid;
                $Dermatology->general_appearance = request('Generalnotes');
                $Dermatology->distribution = request('distribution');
                $Dermatology->which_surface= request('surface');
                $Dermatology->density_lesions= request('lesion');
                $Dermatology->other_lesion = request('notesoflesion');
                $Dermatology->examination_notes = request('systemnotes');
                $Dermatology->diffdiagnosis= request('diffdiagnosis');
                $Dermatology->save();

                
            }

            if($name=='diabetes'){
                $GeneralDiabetes = new GeneralDiabetes();
                $GeneralDiabetes->doctor_id=$id;
                $GeneralDiabetes->examination_id=$lastexaminationid;
                $GeneralDiabetes->cardiovascular = request('cardiovascular');
                $GeneralDiabetes->respiratory = request('respiratory');
                $GeneralDiabetes->abdominal= request('abdominal');
                $GeneralDiabetes->genitourinary= request('genitourinary');
                $GeneralDiabetes->endocrinemeta = request('cardiovascular');
                if(request('diabetesexamination_name'))
                {
                    $diabetes_Names=implode(",", request('diabetesexamination_name'));
                }
                $GeneralDiabetes->signofdiabetes = isset($diabetes_Names)?$diabetes_Names:'';
                $GeneralDiabetes->podiatricexam= request('podiatricexam');
                if(request('typeofdiabetes'))
                {
                    $typeofdiabetes=implode(",", request('typeofdiabetes'));
                }
                $GeneralDiabetes->typeofdiabetes = isset($typeofdiabetes)?$typeofdiabetes:'';
                $GeneralDiabetes->diffdiagnosis= request('diffdianosis');
                $GeneralDiabetes->save();
            }

            if($name=='cardiology'){
                $Cardiology = new Cardiology();
                $Cardiology->doctor_id=$id;
                $Cardiology->examination_id=$lastexaminationid;
                $Cardiology->radial_rate = request('radial_rate');
                $Cardiology->rhythm = request('rhythm');
                $Cardiology->jugularpressure= request('jugularpressure');
                $Cardiology->carotidartery= request('carotidartery');
                $Cardiology->Thrills= request('thrills');
                $Cardiology->S1 = request('s1');
                $Cardiology->S2 = request('s2');
                $Cardiology->S3=  request('s3');
                $Cardiology->S4=  request('s4');
                $Cardiology->Murmurs= request('murmurs');
                $Cardiology->extrasounds = request('extrasounds');
                $Cardiology->pulmonaryexam = request('pulmonaryexam');
                $Cardiology->heartfailure= request('heartfailure');
                $Cardiology->endocarditis= request('endocarditis');
                $Cardiology->heartdsease = request('heartdsease');
                if(request('cardiacdisease'))
                {
                    $cardiacdisease=implode(",", request('cardiacdisease'));
                }
                $Cardiology->cardiacdisease = isset($cardiacdisease)?$cardiacdisease:'';
                $Cardiology->Other= request('others');
                $Cardiology->save();
            }

            if($name=='obstetricsandgynecology'){
              // dd('here');
                $Obstetrics = new Obstetrics();
                $Obstetrics->doctor_id=$id;
                $Obstetrics->examination_id=$lastexaminationid;
                if(request('obgpatient'))
                {
                    $obgpatient=implode(",", request('obgpatient'));
                }
                if(request('birthname'))
                {
                    $birthname=implode(",", request('birthname'));
                }
                if(request('dobofbirth'))
                {
                    $dobofbirth=implode(",", request('dobofbirth'));
                }
                if(request('sexofbirth'))
                {
                    $sexofbirth=implode(",", request('sexofbirth'));
                }
                if(request('compli'))
                {
                    $compli=implode(",", request('compli'));
                }
                $Obstetrics->namechild=isset($birthname)?$birthname:'';
                $Obstetrics->dateofbirth=isset($dobofbirth)?$dobofbirth:'';
                $Obstetrics->sex=isset($sexofbirth)?$sexofbirth:'';
                $Obstetrics->complications=isset($compli)?$compli:'';
                $Obstetrics->typesofobg=isset($obgpatient)?$obgpatient:'';
                $Obstetrics->Gravida=request('Gravida');
                $Obstetrics->Parity=request('Parity');
                $Obstetrics->Abortions=request('Abortions');
                $Obstetrics->Live=request('Live');
                $Obstetrics->LMP=request('LMP');
                $Obstetrics->EDD=request('EDD');
                $Obstetrics->ectopicpregnancy=request('ectopicpregnancy');
                $Obstetrics->obstetrichistory=request('obstetrichistory');
                $Obstetrics->BreastExam=request('BreastExam');
                $Obstetrics->CSscar=request('CSscar');
                $Obstetrics->SignsPregnancy=request('SignsPregnancy');
                $Obstetrics->SynphysisFundal=request('SynphysisFundal');
                $Obstetrics->PelvicGrip=request('PelvicGrip');
                $Obstetrics->Lie=request('Lie');
                $Obstetrics->Presentation=request('Presentation');
                $Obstetrics->AmnioticFluid=request('AmnioticFluid');
                $Obstetrics->FHR=request('FHR');
                $Obstetrics->InternalExamination=request('InternalExamination');
                $Obstetrics->ManualExamination=request('ManualExamination');
                $Obstetrics->BreastExamination=request('BreastExamination');
                $Obstetrics->PelvicExamination=request('PelvicExamination');
                $Obstetrics->SpeculumExamination=request('SpeculumExamination');
                $Obstetrics->BmanualExamination=request('BmanualExamination');
                $Obstetrics->RectalExamination=request('RectalExamination');
                $Obstetrics->save();
                
            }

            if($name=='orthopedics'){
                $Orthopedics = new Orthopedics();
                $Orthopedics->doctor_id=$id;
                $Orthopedics->examination_id=$lastexaminationid;
                if(request('types_orthopedic'))
                {
                    $types_orthopedic=implode(",", request('types_orthopedic'));
                }
                $Orthopedics->types_orthopedic = isset($types_orthopedic)?$types_orthopedic:'';
                $Orthopedics->consciousness = request('consciousness');
                $Orthopedics->gait= request('gait');
                $Orthopedics->nutrition= request('nutrition');
                $Orthopedics->painscale = request('painscale');
                $Orthopedics->skinissue = request('skinissue');
                $Orthopedics->abnormality= request('abnormality');
                $Orthopedics->bones= request('bones');
                $Orthopedics->joints= request('joints');
                $Orthopedics->muscles = request('muscles');
                $Orthopedics->sensations = request('sensations');
                $Orthopedics->motor= request('motor');
                $Orthopedics->dtrs= request('dtrs');
                $Orthopedics->spine = request('spine');
                $Orthopedics->specialtests = request('specialtests');
                $Orthopedics->save();
            }

            if($name=='psychiatry'){
                $Psychiatry = new Psychiatry();
                $Psychiatry->doctor_id=$id;
                $Psychiatry->examination_id=$lastexaminationid;
                if(request('risk_assessment'))
                {
                    $risk_assessment=implode(",", request('risk_assessment'));
                }
                $Psychiatry->risk_assessment = isset($risk_assessment)?$risk_assessment:'';
                $Psychiatry->appearance = request('appearance');
                $Psychiatry->speech= request('speech');
                $Psychiatry->mood= request('mood');
                $Psychiatry->thoughts = request('thoughts');
                $Psychiatry->perceptions = request('perceptions');
                $Psychiatry->delusions= request('delusions');
                $Psychiatry->cognition = request('cognition');
                $Psychiatry->insight = request('insight');
                if(request('diff_diagnosis'))
                {
                    $diff_diagnosis=implode(",", request('diff_diagnosis'));
                }if(request('drugname'))
                {
                    $drugname=implode(",", request('drugname'));
                }
                if(request('dose'))
                {
                    $dose=implode(",", request('dose'));
                }
                if(request('frequency'))
                {
                    $frequency=implode(",", request('frequency'));
                }
                if(request('since'))
                {
                    $since=implode(",", request('since'));
                }
                $Psychiatry->drug= isset($drugname)?$drugname:'';
                $Psychiatry->dose= isset($dose)?$dose:'';
                $Psychiatry->frequency= isset($frequency)?$frequency:'';
                $Psychiatry->since= isset($since)?$since:'';
                $Psychiatry->diff_diagnosis= isset($diff_diagnosis)?$diff_diagnosis:'';
                $Psychiatry->others= request('others');
                $Psychiatry->save();
            }

            if($name=='pulmonarymedicine'){
                $Pulmonary = new Pulmonary();
                $Pulmonary->doctor_id=$id;
                $Pulmonary->examination_id=$lastexaminationid;
                $Pulmonary->respiratory_rate = request('respiratory_rate');
                $Pulmonary->respiratory_rhythm = request('respiratory_rhythm');
                $Pulmonary->muscles_respiration = request('respiration');
                $Pulmonary->dioxide_retention= request('dioxide_retention');
                $Pulmonary->troisier_sign= request('troisier_sign');
                $Pulmonary->chest_expansion = request('chest_expansion');
                $Pulmonary->percussion_ribs = request('percussion_ribs');
                $Pulmonary->vocal_fremitus= request('vocal_fremitus');
                $Pulmonary->auscultation_notes= request('auscultation_notes');
                $Pulmonary->any_notes= request('any_notes');
                $Pulmonary->radial_Rate = request('radial_Rate');
                $Pulmonary->rhythm = request('rhythm');
                $Pulmonary->carotid_Rate= request('Carotid');
                $Pulmonary->jugular_pressure= request('jugular_pressure');
                $Pulmonary->diffdiagnosis= request('respiratory_rate');
                $Pulmonary->save();
            }

            if($name=='generalsurgery'){

                $GeneralSurgery = new GeneralSurgery();
                $GeneralSurgery->doctor_id=$id;
                $GeneralSurgery->examination_id=$lastexaminationid;
                $GeneralSurgery->abdominal = request('abdominal');
                $GeneralSurgery->organomegaly = request('organomegaly');
                $GeneralSurgery->hernial= request('hernial');
                $GeneralSurgery->rectal= request('rectal');
                $GeneralSurgery->breast = request('breast');
                $GeneralSurgery->localnodes = request('localnodes');
                $GeneralSurgery->metastasis= request('metastasis');
                $GeneralSurgery->lumpexam= request('lumpexam');
                $GeneralSurgery->genitaliaexam= request('genitaliaexam');
                $GeneralSurgery->thyroiddisease = request('thyroiddisease');
                $GeneralSurgery->eyeexam = request('eyeexam');
                $GeneralSurgery->thyroidexam= request('thyroidexam');
                $GeneralSurgery->pembertonsign= request('pembertonsign');
                $GeneralSurgery->ulcers_exam = request('ulcers_exam');
                $GeneralSurgery->limbs_exam = request('limbs_exam');
                $GeneralSurgery->system_exam= request('system_exam');
                $GeneralSurgery->diffdiagnosis= request('diffdiagnosis');
                $GeneralSurgery->save();

            }

            if($name=='neurology'){
                $Neurology = new Neurology();
                $Neurology->doctor_id=$id;
                $Neurology->examination_id=$lastexaminationid;
                $Neurology->glasgow_scale = request('glasgow_scale');
                $Neurology->Consciousness = request('Consciousness');
                $Neurology->Alertness= request('Alertness');
                $Neurology->Speech= request('Speech');
                $Neurology->Pupils = request('Pupils');
                $Neurology->CranialNerves = request('CranialNerves');
                $Neurology->Gait= request('Gait');
                $Neurology->InvoluntaryMovements = request('InvoluntaryMovements');
                $Neurology->AbnormalPostures = request('AbnormalPostures');
                $Neurology->Trophicchanges= request('Trophicchanges');
                $Neurology->Contractions= request('Contractions');
                $Neurology->MuscleTone = request('MuscleTone');
                $Neurology->MotorPower = request('MotorPower');
                $Neurology->DeepReflexes= request('DeepReflexes');
                $Neurology->SuperficialReflexes= request('SuperficialReflexes');
                $Neurology->tactilesensation= request('tactilesensation');
                $Neurology->tactilediscrimination = request('tactilediscrimination');
                $Neurology->temperaturediscrimination = request('temperaturediscrimination');
                $Neurology->jointpropioception= request('jointpropioception');
                $Neurology->painsensation= request('painsensation');
                $Neurology->vibrationsense= request('vibrationsense');
                $Neurology->UMN_lesion= request('UMN_lesion');
                $Neurology->LMN_lesion = request('LMN_lesion');
                $Neurology->Extrapyramidal_lesion = request('Extrapyramidal_lesion');
                $Neurology->Cerebellar_lesion= request('Cerebellar_lesion');
                $Neurology->raised_ict= request('raised_ict');
                $Neurology->Meningitis= request('Meningitis');
                $Neurology->head_trauma= request('head_trauma');
                $Neurology->peripheral_disease = request('peripheral_disease');
                $Neurology->Myopathies = request('Myopathies');
                $Neurology->systemic_notes= request('systemic_notes');
                $Neurology->diff_diagnosis= request('diff_diagnosis');
                $Neurology->save();
            }

            if($name=='neurosurgery'){
                $Neurosurgery = new Neurosurgery();
                $Neurosurgery->doctor_id=$id;
                $Neurosurgery->examination_id=$lastexaminationid;
                $Neurosurgery->glasgow_scale = request('glasgow_scale');
                $Neurosurgery->Consciousness = request('Consciousness');
                $Neurosurgery->Alertness= request('Alertness');
                $Neurosurgery->Speech= request('Speech');
                $Neurosurgery->Pupils = request('Pupils');
                $Neurosurgery->CranialNerves = request('CranialNerves');
                $Neurosurgery->Gait= request('Gait');
                $Neurosurgery->InvoluntaryMovements = request('InvoluntaryMovements');
                $Neurosurgery->AbnormalPostures = request('AbnormalPostures');
                $Neurosurgery->Trophicchanges= request('Trophicchanges');
                $Neurosurgery->Contractions= request('Contractions');
                $Neurosurgery->MuscleTone = request('MuscleTone');
                $Neurosurgery->MotorPower = request('MotorPower');
                $Neurosurgery->DeepReflexes= request('DeepReflexes');
                $Neurosurgery->SuperficialReflexes= request('SuperficialReflexes');
                $Neurosurgery->tactilesensation= request('tactilesensation');
                $Neurosurgery->tactilediscrimination = request('tactilediscrimination');
                $Neurosurgery->temperaturediscrimination = request('temperaturediscrimination');
                $Neurosurgery->jointpropioception= request('jointpropioception');
                $Neurosurgery->painsensation= request('painsensation');
                $Neurosurgery->vibrationsense= request('vibrationsense');
                $Neurosurgery->UMN_lesion= request('UMN_lesion');
                $Neurosurgery->LMN_lesion = request('LMN_lesion');
                $Neurosurgery->Extrapyramidal_lesion = request('Extrapyramidal_lesion');
                $Neurosurgery->Cerebellar_lesion= request('Cerebellar_lesion');
                $Neurosurgery->raised_ict= request('raised_ict');
                $Neurosurgery->Meningitis= request('Meningitis');
                $Neurosurgery->head_trauma= request('head_trauma');
                $Neurosurgery->peripheral_disease = request('peripheral_disease');
                $Neurosurgery->Myopathies = request('Myopathies');
                $Neurosurgery->systemic_notes= request('systemic_notes');
                $Neurosurgery->diff_diagnosis= request('diff_diagnosis');
                $Neurosurgery->save();
            }
            
             if($name=='ophthalmology')
            {
                $Ophthalmology = new Ophthalmology();
                $Ophthalmology->doctor_id=$id;
                $Ophthalmology->examination_id=$lastexaminationid;
                $Ophthalmology->visualacuity=request('visual_acuity');
                $Ophthalmology->pupils=request('pupils');
                $Ophthalmology->extraocularmotility=request('extraocular');
                $Ophthalmology->intraocular=request('intraocular');
                $Ophthalmology->confrontation=request('confrontation');
                $Ophthalmology->external=request('external');
                $Ophthalmology->slitlamp=request('slit');
                $Ophthalmology->fundoscopic=request('fundoscopic');
                $Ophthalmology->diff_diagnosis=request('diff_diagnosis');
                $Ophthalmology->planned_procedure=request('planned_procedure');
                $Ophthalmology->save();
            }
            
            if($name=='ent')
            {
                $ENT = new ENT();
                $ENT->doctor_id=$id;
                $ENT->examination_id=$lastexaminationid;
                $ENT->generalappearance=request('general_appearance');
                $ENT->abilitycommunicate=request('ability_communicate');
                $ENT->constitutional=request('constitutional');
                $ENT->externalexamination=request('external_examination');
                $ENT->nasalmucosa=request('nasal');
                $ENT->lips=request('lips');
                $ENT->examination_oropharynx=request('examination');
                $ENT->pharyngealwalls=request('pharyngeal');
                $ENT->laryngoscopic=request('laryngoscopic');
                $ENT->adenoids=request('adenoids');
                $ENT->externalauditory=request('external');
                $ENT->assementofhearing=request('assessment');
                $ENT->salivary_glands=request('salivary');
                $ENT->tender_areas=request('tender');
                $ENT->examination_neck=request('examination_neck');
                $ENT->thyroidexamination=request('thyroid_examination');
                $ENT->diff_diagnosis=request('diff_diagnosis');
                $ENT->planned_procedure=request('planned_procedure');
                $ENT->save();
            }
            
            if($name=='urology')
            {
                $Urology = new Urology();
                $Urology->doctor_id=$id;
                $Urology->examination_id=$lastexaminationid;
                $Urology->generalappearance=request('general');
                $Urology->armshands=request('arms_hands');
                $Urology->face=request('face');
                $Urology->headneck=request('head_neck');
                $Urology->chest=request('chest');
                $Urology->abdomen=request('abdomen');
                $Urology->legs=request('legs');
                $Urology->groin=request('groingenitals');
                $Urology->back=request('back');
                $Urology->pr_examination=request('prexamination');
                $Urology->diff_diagnosis=request('differentialdiagnosis');
                $Urology->planned_procedure=request('plannedprocedure');
                $Urology->save();
            }
            
            if($name=='nephrology')
            {
                $Nephrology = new Nephrology();
                $Nephrology->doctor_id=$id;
                $Nephrology->examination_id=$lastexaminationid;
                $Nephrology->generalappearance=request('general');
                $Nephrology->arms_hands=request('arms_hands');
                $Nephrology->face=request('face');
                $Nephrology->head_neck=request('head_neck');
                $Nephrology->chest=request('chest');
                $Nephrology->abdomen=request('abdomen');
                $Nephrology->legs=request('legs');
                $Nephrology->groin=request('groingenitals');
                $Nephrology->back=request('back');
                $Nephrology->prexamination=request('prexamination');
                $Nephrology->diff_diagnosis=request('diff_diagnosis');
                $Nephrology->plannned_procedure=request('planned_procedure');
                $Nephrology->save();
            }
            
            if($name=='gastroenterology')
            {
                $Gastroenterology = new Gastroenterology();
                $Gastroenterology->doctor_id=$id;
                $Gastroenterology->examination_id=$lastexaminationid;
                $Gastroenterology->generalappearance=request('general_appearance');
                $Gastroenterology->relevant_positive=request('relevant_positive');
                $Gastroenterology->relevant_positive_other=request('relevant_palpation');
                $Gastroenterology->tenderness=request('tenderness_points');
                $Gastroenterology->organomegaly=request('organomegaly');
                $Gastroenterology->hernial=request('hernialsites');
                $Gastroenterology->abdominal=request('abdominal_aorta');
                $Gastroenterology->relevant_percussion=request('relevant_percussion');
                $Gastroenterology->examination_ascites=request('examination_ascites');
                $Gastroenterology->relevant_auscultation=request('relevant_auscultation');
                $Gastroenterology->relevant_external=request('relevant_external');
                $Gastroenterology->diff_diagnosis=request('diff_diagnosis');
                $Gastroenterology->planned_procedure=request('planned_procedure');
                $Gastroenterology->save();
            }
            
            if($name=='surgicalgastroenterology')
            {
                $SurgicalGastroenterology = new SurgicalGastroenterology();
                $SurgicalGastroenterology->doctor_id=$id;
                $SurgicalGastroenterology->examination_id=$lastexaminationid;
                $SurgicalGastroenterology->generalappearance=request('general_appearance');
                $SurgicalGastroenterology->relevant_inspection=request('relevant_positive');
                $SurgicalGastroenterology->relevant_palpation=request('relevant_palpation');
                $SurgicalGastroenterology->tenderness=request('tenderness_points');
                $SurgicalGastroenterology->organomegaly=request('organomegaly');
                $SurgicalGastroenterology->hernial=request('hernialsites');
                $SurgicalGastroenterology->abdominal=request('abdominal_aorta');
                $SurgicalGastroenterology->relevant_percussion=request('relevant_percussion');
                $SurgicalGastroenterology->examination_ascites=request('examination_ascites');
                $SurgicalGastroenterology->auscultation=request('relevant_auscultation');
                $SurgicalGastroenterology->relevant_genitalia=request('relevant_external');
                $SurgicalGastroenterology->diff_diagnosis=request('diff_diagnosis');
                $SurgicalGastroenterology->planned_procedure=request('planned_procedure');
                $SurgicalGastroenterology->save();
            }
            
            if($name=='plasticsurgery')
            {
                $PlasticSurgery = new PlasticSurgery();
                $PlasticSurgery->doctor_id=$id;
                $PlasticSurgery->examination_id=$lastexaminationid;
                $PlasticSurgery->generalappearance=request('general');
                $PlasticSurgery->site=request('site');
                $PlasticSurgery->localexamination=request('local_examination');
                $PlasticSurgery->special_notes=request('special_note');
                $PlasticSurgery->diff_diagnosis=request('diff_diagnosis');
                $PlasticSurgery->planned_procedure=request('planned_procedure');
                $PlasticSurgery->save();
            }
            
            if($name=='dentistry')
            {
                $Dentistry = new Dentistry();
                $Dentistry->doctor_id=$id;
                $Dentistry->examination_id=$lastexaminationid;
                $Dentistry->generalappearance=request('general_appearance');
                $Dentistry->facies=request('facies');
                $Dentistry->skin=request('skin_nail');
                $Dentistry->palpation=request('palpation');
                $Dentistry->extra=request('extra_oral');
                $Dentistry->intra=request('intra_oral');
                $Dentistry->dental=request('dental_examination');
                $Dentistry->regional=request('regional_examination');
                $Dentistry->systemic=request('systemic_examination');
                $Dentistry->diff_diagnosis=request('diff_diagnosis');
                $Dentistry->planned_procedure=request('planned_procedure');
                $Dentistry->save();
            }
            
            if($name=='oncology')
            {
                $Oncology = new Oncology();
                $Oncology->doctor_id=$id;
                $Oncology->examination_id=$lastexaminationid;
                $Oncology->generalappearance=request('general_appearance');
                $Oncology->site=request('site');
                $Oncology->lumpexam=request('lump_exam');
                $Oncology->vascular=request('vascular_area');
                $Oncology->nerve=request('nerve_area');
                $Oncology->lymphatics=request('lymphatics_area');
                $Oncology->spread=request('spread_area');
                $Oncology->diff_diagnosis=request('diff_diagnosis');
                $Oncology->planned_procedure=request('planned_procedure');
                $Oncology->save();
            }
            
            if($name=='surgicaloncology')
            {
                $SurgicalOncology = new SurgicalOncology();
                $SurgicalOncology->doctor_id=$id;
                $SurgicalOncology->examination_id=$lastexaminationid;
                $SurgicalOncology->generalappearance=request('general_appearance');
                $SurgicalOncology->site=request('site');
                $SurgicalOncology->lumpexam=request('lump_exam');
                $SurgicalOncology->vascular=request('vascular_area');
                $SurgicalOncology->nerve=request('nerve_area');
                $SurgicalOncology->lymphatics=request('lymphatics_area');
                $SurgicalOncology->spread=request('spread_area');
                $SurgicalOncology->diff_diagnosis=request('diff_diagnosis');
                $SurgicalOncology->planned_procedure=request('planned_procedure');
                $SurgicalOncology->save();
            }
            
            if($name=='endocrinology')
            {
                $Endocrinology = new Endocrinology();
                $Endocrinology->doctor_id=$id;
                $Endocrinology->examination_id=$lastexaminationid;
                $Endocrinology->built=request('built');
                $Endocrinology->hair=request('hair');
                $Endocrinology->eye=request('eye');
                $Endocrinology->ear=request('ear');
                $Endocrinology->midfacial=request('mid');
                $Endocrinology->lip=request('lip');
                $Endocrinology->dental=request('dental');
                $Endocrinology->tongue=request('tongue');
                $Endocrinology->neck=request('neck');
                $Endocrinology->skin=request('skin');
                $Endocrinology->podiatric=request('podiatric');
                $Endocrinology->peripheral=request('vascular');
                $Endocrinology->complete=request('thyroid');
                $Endocrinology->external=request('external_gene');
                $Endocrinology->sexual=request('sexual');
                $Endocrinology->systemic=request('systemic');
                $Endocrinology->diff_diagnosis=request('diff_diagnosis');
                $Endocrinology->planned_procedure=request('planned_procedure');
                $Endocrinology->save();
            }
            
            if($name=='ctvs')
            {
                $CTVS = new CTVS();
                $CTVS->doctor_id=$id;
                $CTVS->examination_id=$lastexaminationid;
                $CTVS->generalappearance=request('general');
                $CTVS->radial=request('radial_rate');
                $CTVS->rhythm=request('rhythm');
                $CTVS->cardotid=request('carotidartery');
                $CTVS->jugular=request('jugularpressure');
                $CTVS->thrills=request('thrills');
                $CTVS->s1=request('s1');
                $CTVS->s2=request('s2');
                $CTVS->s3=request('s3');
                $CTVS->s4=request('s4');
                $CTVS->murmurs=request('murmurs');
                $CTVS->extrasounds=request('extrasounds');
                $CTVS->respiratory=request('respiratory_rate');
                $CTVS->pulmonary_rhythm=request('respiratory_rhythm');
                $CTVS->muscules=request('respiration');
                $CTVS->retention=request('dioxide_retention');
                $CTVS->troisier=request('troisier_sign');
                $CTVS->chest=request('chest_expansion');
                $CTVS->percussion=request('percussion_ribs');
                $CTVS->tactile=request('vocal_fremitus');
                $CTVS->auscultation=request('auscultation_notes');
                $CTVS->anyother=request('any_notes');
                $CTVS->vascular=request('peripheral_examination');
                $CTVS->congestive=request('heart_failure');
                $CTVS->infective=request('infective_endocarditis');
                $CTVS->rheumatic=request('heart_disease');
                $CTVS->diff_diagnosis=request('diff_diagnosis');
                $CTVS->planned_procedures=request('planned_procedure');
                $CTVS->save();
            }
            
            if($name=='pediatrics')
            {
                $Pediatrics = new Pediatrics();
                $Pediatrics->doctor_id=$id;
                $Pediatrics->examination_id=$lastexaminationid;
                $Pediatrics->perinatal=request('perinatal_birth');
                $Pediatrics->development=request('developmental_history');
                $Pediatrics->feeding=request('feeding_history');
                $Pediatrics->immunization=request('immunization_history');
                $Pediatrics->family=request('family_history');
                $Pediatrics->past=request('past_history');
                $Pediatrics->apgar=request('apgar_score');
                $Pediatrics->general_apperance=request('general_appearance');
                $Pediatrics->weight=request('weight');
                $Pediatrics->length=request('length');
                $Pediatrics->head=request('head_circum');
                $Pediatrics->skin=request('skin');
                $Pediatrics->lymph=request('lymph_nodes');
                $Pediatrics->facies=request('facies');
                $Pediatrics->oral=request('oral_cavity');
                $Pediatrics->chest=request('chest');
                $Pediatrics->abdomen=request('abdomen');
                $Pediatrics->genitalia=request('genitalia');
                $Pediatrics->rectum=request('rectum_anus');
                $Pediatrics->musculos=request('musculoskeletal');
                $Pediatrics->back=request('back');
                $Pediatrics->reflexs=request('reflexes');
                $Pediatrics->neurological=request('neurological_Examination');
                $Pediatrics->diff_diagnosis=request('diff_diagnosis');
                $Pediatrics->planned_procedure=request('planned_procedure');
                $Pediatrics->save();
            }
            
            if($name=='pediatricssurgery')
            {
                $PediatricSurgery = new PediatricSurgery();
                $PediatricSurgery->doctor_id=$id;
                $PediatricSurgery->examination_id=$lastexaminationid;
                $PediatricSurgery->perinatal=request('perinatal_birth');
                $PediatricSurgery->development=request('developmental_history');
                $PediatricSurgery->feeding=request('feeding_history');
                $PediatricSurgery->immunization=request('immunization_history');
                $PediatricSurgery->family=request('family_history');
                $PediatricSurgery->past=request('past_history');
                $PediatricSurgery->apgar=request('apgar_score');
                $PediatricSurgery->general_appearance=request('general_appearance');
                $PediatricSurgery->weight=request('weight');
                $PediatricSurgery->length=request('length');
                $PediatricSurgery->head=request('head_circum');
                $PediatricSurgery->skin=request('skin');
                $PediatricSurgery->lymph=request('lymph_nodes');
                $PediatricSurgery->facies=request('facies');
                $PediatricSurgery->oral=request('oral_cavity');
                $PediatricSurgery->chest=request('chest');
                $PediatricSurgery->abdomen=request('abdomen');
                $PediatricSurgery->genitalia=request('genitalia');
                $PediatricSurgery->rectum=request('rectum_anus');
                $PediatricSurgery->musculos=request('musculoskeletal');
                $PediatricSurgery->back=request('back');
                $PediatricSurgery->reflexes=request('reflexes');
                $PediatricSurgery->neurological=request('neurological_Examination');
                $PediatricSurgery->local=request('local_examimation');
                $PediatricSurgery->lump=request('lump_exam');
                $PediatricSurgery->ulcers=request('ulcers_exam');
                $PediatricSurgery->diff_diagnosis=request('diff_diagnosis');
                $PediatricSurgery->planned_procedures=request('planned_procedure');
                $PediatricSurgery->save();
            }
        
            //

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

        $id = Auth::user()->id;
        $doctor_speciality=DoctorDetail::where('doctor_id',$id)->first();
        $specialty=Speciality::where('id',$doctor_speciality->speciality)->first();
        $specialty_name=isset($specialty)?$specialty->speciality:'';
        $name=strtolower(preg_replace('/\s/', '', $specialty_name));
 //dd($name);
        if($name=='dermatology'){
            $PatientGeNew=Dermatology::where('examination_id',$testId)->first();
        }

        else if($name=='diabetes'){
            $PatientGeNew=GeneralDiabetes::where('examination_id',$testId)->first();
        }

        else if($name=='cardiology'){
            $PatientGeNew=Cardiology::where('examination_id',$testId)->first();
        }

        else if($name=='obstetricsandgynecology'){
            $PatientGeNew=Obstetrics::where('examination_id',$testId)->first();
        }

        else if($name=='orthopedics'){
            $PatientGeNew=Orthopedics::where('examination_id',$testId)->first();
        }

        else if($name=='psychiatry'){
            $PatientGeNew=Psychiatry::where('examination_id',$testId)->first();
          //dd($PatientGeNew);
        }

        else if($name=='pulmonarymedicine'){
            $PatientGeNew=Pulmonary::where('examination_id',$testId)->first();
        }

        else if($name=='generalsurgery'){
            $PatientGeNew=GeneralSurgery::where('examination_id',$testId)->first();
        }

        else if($name=='neurology'){
            $PatientGeNew=Neurology::where('examination_id',$testId)->first();
        }

        else if($name=='neurosurgery'){
            $PatientGeNew=Neurosurgery::where('examination_id',$testId)->first();
        }
        else
        {
            $PatientGeNew=PatientGeneralExamination::where('examination_id',$testId)->first();
        }
        
        return view('admin_main.healthdata.healthdata_Ge_edit',["patient_id" => $patient_id,'testId'=>$testId,'ge'=>$ge,'patientge'=>$patientge,'PatientGeNew'=>$PatientGeNew]);
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

        $id = Auth::user()->id;
        $doctor_speciality=DoctorSpecialitySelect::where('doctor_id',$id)->first();
        $specialty=Speciality::where('id',$doctor_speciality->speciality_id)->first();
        $specialty_name=isset($specialty)?$specialty->speciality:'';
        $name=strtolower(preg_replace('/\s/', '', $specialty_name));

         if($name=='dermatology'){

                $Dermatology = Dermatology::find($testId);
                $Dermatology->general_appearance = request('Generalnotes');
                $Dermatology->distribution = request('distribution');
                $Dermatology->which_surface= request('surface');
                $Dermatology->density_lesions= request('lesion');
                $Dermatology->other_lesion = request('notesoflesion');
                $Dermatology->examination_notes = request('systemnotes');
                $Dermatology->diffdiagnosis= request('diffdiagnosis');
                $Dermatology->save();

                
            }

            if($name=='diabetes'){
                $GeneralDiabetes = GeneralDiabetes::find($testId);
                $GeneralDiabetes->cardiovascular = request('cardiovascular');
                $GeneralDiabetes->respiratory = request('respiratory');
                $GeneralDiabetes->abdominal= request('abdominal');
                $GeneralDiabetes->genitourinary= request('genitourinary');
                $GeneralDiabetes->endocrinemeta = request('cardiovascular');
                if(request('diabetesexamination_name'))
                {
                    $diabetes_Names=implode(",", request('diabetesexamination_name'));
                }
                $GeneralDiabetes->signofdiabetes = isset($diabetes_Names)?$diabetes_Names:'';
                $GeneralDiabetes->podiatricexam= request('podiatricexam');
                if(request('typeofdiabetes'))
                {
                    $typeofdiabetes=implode(",", request('typeofdiabetes'));
                }
                $GeneralDiabetes->typeofdiabetes = isset($typeofdiabetes)?$typeofdiabetes:'';
                $GeneralDiabetes->diffdiagnosis= request('diffdianosis');
                $GeneralDiabetes->save();
            }

            if($name=='cardiology'){
                $Cardiology = Cardiology::find($testId);
                $Cardiology->radial_rate = request('radial_rate');
                $Cardiology->rhythm = request('rhythm');
                $Cardiology->jugularpressure= request('jugularpressure');
                $Cardiology->carotidartery= request('carotidartery');
                $Cardiology->Thrills= request('thrills');
                $Cardiology->S1 = request('s1');
                $Cardiology->S2 = request('s2');
                $Cardiology->S3=  request('s3');
                $Cardiology->S4=  request('s4');
                $Cardiology->Murmurs= request('murmurs');
                $Cardiology->extrasounds = request('extrasounds');
                $Cardiology->pulmonaryexam = request('pulmonaryexam');
                $Cardiology->heartfailure= request('heartfailure');
                $Cardiology->endocarditis= request('endocarditis');
                $Cardiology->heartdsease = request('heartdsease');
                if(request('cardiacdisease'))
                {
                    $cardiacdisease=implode(",", request('cardiacdisease'));
                }
                $Cardiology->cardiacdisease = isset($cardiacdisease)?$cardiacdisease:'';
                $Cardiology->Other= request('others');
                $Cardiology->save();
            }

            if($name=='obstetricsandgynecology'){
                $Obstetrics = Obstetrics::find($testId);
                if(request('obgpatient'))
                {
                    $obgpatient=implode(",", request('obgpatient'));
                }
                if(request('birthname'))
                {
                    $birthname=implode(",", request('birthname'));
                }
                if(request('dobofbirth'))
                {
                    $dobofbirth=implode(",", request('dobofbirth'));
                }
                if(request('sexofbirth'))
                {
                    $sexofbirth=implode(",", request('sexofbirth'));
                }
                if(request('compli'))
                {
                    $compli=implode(",", request('compli'));
                }
                $Obstetrics->namechild=$birthname;
                $Obstetrics->dateofbirth=$dobofbirth;
                $Obstetrics->sex=$sexofbirth;
                $Obstetrics->complications=$compli;
                $Obstetrics->typesofobg=$obgpatient;
                $Obstetrics->Gravida=request('Gravida');
                $Obstetrics->Parity=request('Parity');
                $Obstetrics->Abortions=request('Abortions');
                $Obstetrics->Live=request('Live');
                $Obstetrics->LMP=request('LMP');
                $Obstetrics->EDD=request('EDD');
                $Obstetrics->ectopicpregnancy=request('ectopicpregnancy');
                $Obstetrics->obstetrichistory=request('obstetrichistory');
                $Obstetrics->BreastExam=request('BreastExam');
                $Obstetrics->CSscar=request('CSscar');
                $Obstetrics->SignsPregnancy=request('SignsPregnancy');
                $Obstetrics->SynphysisFundal=request('SynphysisFundal');
                $Obstetrics->PelvicGrip=request('PelvicGrip');
                $Obstetrics->Lie=request('Lie');
                $Obstetrics->Presentation=request('Presentation');
                $Obstetrics->AmnioticFluid=request('AmnioticFluid');
                $Obstetrics->FHR=request('FHR');
                $Obstetrics->InternalExamination=request('InternalExamination');
                $Obstetrics->ManualExamination=request('ManualExamination');
                $Obstetrics->BreastExamination=request('BreastExamination');
                $Obstetrics->PelvicExamination=request('PelvicExamination');
                $Obstetrics->SpeculumExamination=request('SpeculumExamination');
                $Obstetrics->BmanualExamination=request('BmanualExamination');
                $Obstetrics->RectalExamination=request('RectalExamination');
                $Obstetrics->save();
            }

            if($name=='orthopedics'){
                $Orthopedics = Orthopedics::find($testId);
                if(request('types_orthopedic'))
                {
                    $types_orthopedic=implode(",", request('types_orthopedic'));
                }
                $Orthopedics->types_orthopedic = isset($types_orthopedic)?$types_orthopedic:'';
                $Orthopedics->consciousness = request('consciousness');
                $Orthopedics->gait= request('gait');
                $Orthopedics->nutrition= request('nutrition');
                $Orthopedics->painscale = request('painscale');
                $Orthopedics->skinissue = request('skinissue');
                $Orthopedics->abnormality= request('abnormality');
                $Orthopedics->bones= request('bones');
                $Orthopedics->joints= request('joints');
                $Orthopedics->muscles = request('muscles');
                $Orthopedics->sensations = request('sensations');
                $Orthopedics->motor= request('motor');
                $Orthopedics->dtrs= request('dtrs');
                $Orthopedics->spine = request('spine');
                $Orthopedics->specialtests = request('specialtests');
                $Orthopedics->save();
            }

            if($name=='psychiatry'){
                $Psychiatry = Psychiatry::find($testId);
                if(request('risk_assessment'))
                {
                    $risk_assessment=implode(",", request('risk_assessment'));
                }
                $Psychiatry->risk_assessment = isset($risk_assessment)?$risk_assessment:'';
                $Psychiatry->appearance = request('appearance');
                $Psychiatry->speech= request('speech');
                $Psychiatry->mood= request('mood');
                $Psychiatry->thoughts = request('thoughts');
                $Psychiatry->perceptions = request('perceptions');
                $Psychiatry->delusions= request('delusions');
                $Psychiatry->cognition = request('cognition');
                $Psychiatry->insight = request('insight');
                if(request('diff_diagnosis'))
                {
                    $diff_diagnosis=implode(",", request('diff_diagnosis'));
                }
                if(request('drugname'))
                {
                    $drugname=implode(",", request('drugname'));
                }
                if(request('dose'))
                {
                    $dose=implode(",", request('dose'));
                }
                if(request('frequency'))
                {
                    $frequency=implode(",", request('frequency'));
                }
                if(request('since'))
                {
                    $since=implode(",", request('since'));
                }
                $Psychiatry->drug= isset($drugname)?$drugname:'';
                $Psychiatry->dose= isset($dose)?$dose:'';
                $Psychiatry->frequency= isset($frequency)?$frequency:'';
                $Psychiatry->since= isset($since)?$since:'';
                $Psychiatry->diff_diagnosis= isset($diff_diagnosis)?$diff_diagnosis:'';
                $Psychiatry->others= request('others');
                $Psychiatry->save();
            }

            if($name=='pulmonarymedicine'){
                $Pulmonary = Pulmonary::find($testId);
                $Pulmonary->respiratory_rate = request('respiratory_rate');
                $Pulmonary->respiratory_rhythm = request('respiratory_rhythm');
                $Pulmonary->muscles_respiration = request('respiration');
                $Pulmonary->dioxide_retention= request('dioxide_retention');
                $Pulmonary->troisier_sign= request('troisier_sign');
                $Pulmonary->chest_expansion = request('chest_expansion');
                $Pulmonary->percussion_ribs = request('percussion_ribs');
                $Pulmonary->vocal_fremitus= request('vocal_fremitus');
                $Pulmonary->auscultation_notes= request('auscultation_notes');
                $Pulmonary->any_notes= request('any_notes');
                $Pulmonary->radial_Rate = request('radial_Rate');
                $Pulmonary->rhythm = request('rhythm');
                $Pulmonary->carotid_Rate= request('Carotid');
                $Pulmonary->jugular_pressure= request('jugular_pressure');
                $Pulmonary->diffdiagnosis= request('respiratory_rate');
                $Pulmonary->save();
            }

            if($name=='generalsurgery'){

                $GeneralSurgery = GeneralSurgery::find($testId);
                $GeneralSurgery->abdominal = request('abdominal');
                $GeneralSurgery->organomegaly = request('organomegaly');
                $GeneralSurgery->hernial= request('hernial');
                $GeneralSurgery->rectal= request('rectal');
                $GeneralSurgery->breast = request('breast');
                $GeneralSurgery->localnodes = request('localnodes');
                $GeneralSurgery->metastasis= request('metastasis');
                $GeneralSurgery->lumpexam= request('lumpexam');
                $GeneralSurgery->genitaliaexam= request('genitaliaexam');
                $GeneralSurgery->thyroiddisease = request('thyroiddisease');
                $GeneralSurgery->eyeexam = request('eyeexam');
                $GeneralSurgery->thyroidexam= request('thyroidexam');
                $GeneralSurgery->pembertonsign= request('pembertonsign');
                $GeneralSurgery->ulcers_exam = request('ulcers_exam');
                $GeneralSurgery->limbs_exam = request('limbs_exam');
                $GeneralSurgery->system_exam= request('system_exam');
                $GeneralSurgery->diffdiagnosis= request('diffdiagnosis');
                $GeneralSurgery->save();

            }

            if($name=='neurology'){
                $Neurology = Neurology::find($testId);
                $Neurology->glasgow_scale = request('glasgow_scale');
                $Neurology->Consciousness = request('Consciousness');
                $Neurology->Alertness= request('Alertness');
                $Neurology->Speech= request('Speech');
                $Neurology->Pupils = request('Pupils');
                $Neurology->CranialNerves = request('CranialNerves');
                $Neurology->Gait= request('Gait');
                $Neurology->InvoluntaryMovements = request('InvoluntaryMovements');
                $Neurology->AbnormalPostures = request('AbnormalPostures');
                $Neurology->Trophicchanges= request('Trophicchanges');
                $Neurology->Contractions= request('Contractions');
                $Neurology->MuscleTone = request('MuscleTone');
                $Neurology->MotorPower = request('MotorPower');
                $Neurology->DeepReflexes= request('DeepReflexes');
                $Neurology->SuperficialReflexes= request('SuperficialReflexes');
                $Neurology->tactilesensation= request('tactilesensation');
                $Neurology->tactilediscrimination = request('tactilediscrimination');
                $Neurology->temperaturediscrimination = request('temperaturediscrimination');
                $Neurology->jointpropioception= request('jointpropioception');
                $Neurology->painsensation= request('painsensation');
                $Neurology->vibrationsense= request('vibrationsense');
                $Neurology->UMN_lesion= request('UMN_lesion');
                $Neurology->LMN_lesion = request('LMN_lesion');
                $Neurology->Extrapyramidal_lesion = request('Extrapyramidal_lesion');
                $Neurology->Cerebellar_lesion= request('Cerebellar_lesion');
                $Neurology->raised_ict= request('raised_ict');
                $Neurology->Meningitis= request('Meningitis');
                $Neurology->head_trauma= request('head_trauma');
                $Neurology->peripheral_disease = request('peripheral_disease');
                $Neurology->Myopathies = request('Myopathies');
                $Neurology->systemic_notes= request('systemic_notes');
                $Neurology->diff_diagnosis= request('diff_diagnosis');
                $Neurology->save();
            }

            if($name=='neurosurgery'){
                $Neurosurgery = Neurosurgery::find($testId);
                $Neurosurgery->glasgow_scale = request('glasgow_scale');
                $Neurosurgery->Consciousness = request('Consciousness');
                $Neurosurgery->Alertness= request('Alertness');
                $Neurosurgery->Speech= request('Speech');
                $Neurosurgery->Pupils = request('Pupils');
                $Neurosurgery->CranialNerves = request('CranialNerves');
                $Neurosurgery->Gait= request('Gait');
                $Neurosurgery->InvoluntaryMovements = request('InvoluntaryMovements');
                $Neurosurgery->AbnormalPostures = request('AbnormalPostures');
                $Neurosurgery->Trophicchanges= request('Trophicchanges');
                $Neurosurgery->Contractions= request('Contractions');
                $Neurosurgery->MuscleTone = request('MuscleTone');
                $Neurosurgery->MotorPower = request('MotorPower');
                $Neurosurgery->DeepReflexes= request('DeepReflexes');
                $Neurosurgery->SuperficialReflexes= request('SuperficialReflexes');
                $Neurosurgery->tactilesensation= request('tactilesensation');
                $Neurosurgery->tactilediscrimination = request('tactilediscrimination');
                $Neurosurgery->temperaturediscrimination = request('temperaturediscrimination');
                $Neurosurgery->jointpropioception= request('jointpropioception');
                $Neurosurgery->painsensation= request('painsensation');
                $Neurosurgery->vibrationsense= request('vibrationsense');
                $Neurosurgery->UMN_lesion= request('UMN_lesion');
                $Neurosurgery->LMN_lesion = request('LMN_lesion');
                $Neurosurgery->Extrapyramidal_lesion = request('Extrapyramidal_lesion');
                $Neurosurgery->Cerebellar_lesion= request('Cerebellar_lesion');
                $Neurosurgery->raised_ict= request('raised_ict');
                $Neurosurgery->Meningitis= request('Meningitis');
                $Neurosurgery->head_trauma= request('head_trauma');
                $Neurosurgery->peripheral_disease = request('peripheral_disease');
                $Neurosurgery->Myopathies = request('Myopathies');
                $Neurosurgery->systemic_notes= request('systemic_notes');
                $Neurosurgery->diff_diagnosis= request('diff_diagnosis');
                $Neurosurgery->save();
            }
            
             if($name=='ophthalmology')
            {
                $Ophthalmology = Ophthalmology::find($testId);
                $Ophthalmology->doctor_id=$patient_id;
                $Ophthalmology->examination_id=$lastexaminationid;
                $Ophthalmology->visualacuity=request('visual_acuity');
                $Ophthalmology->pupils=request('pupils');
                $Ophthalmology->extraocularmotility=request('extraocular');
                $Ophthalmology->intraocular=request('intraocular');
                $Ophthalmology->confrontation=request('confrontation');
                $Ophthalmology->external=request('external');
                $Ophthalmology->slitlamp=request('slit');
                $Ophthalmology->fundoscopic=request('fundoscopic');
                $Ophthalmology->diff_diagnosis=request('diff_diagnosis');
                $Ophthalmology->planned_procedure=request('planned_procedure');
                $Ophthalmology->save();
            }
            
            if($name=='ent')
            {
                $ENT = ENT::find($testId);
                $ENT->doctor_id=$patient_id;
                $ENT->examination_id=$lastexaminationid;
                $ENT->generalappearance=request('general_appearance');
                $ENT->abilitycommunicate=request('ability_communicate');
                $ENT->constitutional=request('constitutional');
                $ENT->externalexamination=request('external_examination');
                $ENT->nasalmucosa=request('nasal');
                $ENT->lips=request('lips');
                $ENT->examination_oropharynx=request('examination');
                $ENT->pharyngealwalls=request('pharyngeal');
                $ENT->laryngoscopic=request('laryngoscopic');
                $ENT->adenoids=request('adenoids');
                $ENT->externalauditory=request('external');
                $ENT->assementofhearing=request('assessment');
                $ENT->salivary_glands=request('salivary');
                $ENT->tender_areas=request('tender');
                $ENT->examination_neck=request('examination_neck');
                $ENT->thyroidexamination=request('thyroid_examination');
                $ENT->diff_diagnosis=request('diff_diagnosis');
                $ENT->planned_procedure=request('planned_procedure');
                $ENT->save();
            }
            
            if($name=='urology')
            {
                //$Urology = new Urology();
                $Urology = Urology::find($testId);
                $Urology->doctor_id=$patient_id;
                $Urology->examination_id=$lastexaminationid;
                $Urology->generalappearance=request('general');
                $Urology->armshands=request('arms_hands');
                $Urology->face=request('face');
                $Urology->headneck=request('head_neck');
                $Urology->chest=request('chest');
                $Urology->abdomen=request('abdomen');
                $Urology->legs=request('legs');
                $Urology->groin=request('groingenitals');
                $Urology->back=request('back');
                $Urology->pr_examination=request('prexamination');
                $Urology->diff_diagnosis=request('differentialdiagnosis');
                $Urology->planned_procedure=request('plannedprocedure');
                $Urology->save();
            }
            
            if($name=='nephrology')
            {
                // $Nephrology = new Nephrology();
                $Nephrology = Nephrology::find($testId);
                $Nephrology->doctor_id=$patient_id;
                $Nephrology->examination_id=$lastexaminationid;
                $Nephrology->generalappearance=request('general');
                $Nephrology->arms_hands=request('arms_hands');
                $Nephrology->face=request('face');
                $Nephrology->head_neck=request('head_neck');
                $Nephrology->chest=request('chest');
                $Nephrology->abdomen=request('abdomen');
                $Nephrology->legs=request('legs');
                $Nephrology->groin=request('groingenitals');
                $Nephrology->back=request('back');
                $Nephrology->prexamination=request('prexamination');
                $Nephrology->diff_diagnosis=request('diff_diagnosis');
                $Nephrology->plannned_procedure=request('planned_procedure');
                $Nephrology->save();
            }
            
            if($name=='gastroenterology')
            {
                // $Gastroenterology = new Gastroenterology();
                $Gastroenterology = Gastroenterology::find($testId);
                $Gastroenterology->doctor_id=$patient_id;
                $Gastroenterology->examination_id=$lastexaminationid;
                $Gastroenterology->generalappearance=request('general_appearance');
                $Gastroenterology->relevant_positive=request('relevant_positive');
                $Gastroenterology->relevant_positive_other=request('relevant_palpation');
                $Gastroenterology->tenderness=request('tenderness_points');
                $Gastroenterology->organomegaly=request('organomegaly');
                $Gastroenterology->hernial=request('hernialsites');
                $Gastroenterology->abdominal=request('abdominal_aorta');
                $Gastroenterology->relevant_percussion=request('relevant_percussion');
                $Gastroenterology->examination_ascites=request('examination_ascites');
                $Gastroenterology->relevant_auscultation=request('relevant_auscultation');
                $Gastroenterology->relevant_external=request('relevant_external');
                $Gastroenterology->diff_diagnosis=request('diff_diagnosis');
                $Gastroenterology->planned_procedure=request('planned_procedure');
                $Gastroenterology->save();
            }
            
            if($name=='surgicalgastroenterology')
            {
                // $SurgicalGastroenterology = new SurgicalGastroenterology();
                $SurgicalGastroenterology = SurgicalGastroenterology::find($testId);
                $SurgicalGastroenterology->doctor_id=$patient_id;
                $SurgicalGastroenterology->examination_id=$lastexaminationid;
                $SurgicalGastroenterology->generalappearance=request('general_appearance');
                $SurgicalGastroenterology->relevant_inspection=request('relevant_positive');
                $SurgicalGastroenterology->relevant_palpation=request('relevant_palpation');
                $SurgicalGastroenterology->tenderness=request('tenderness_points');
                $SurgicalGastroenterology->organomegaly=request('organomegaly');
                $SurgicalGastroenterology->hernial=request('hernialsites');
                $SurgicalGastroenterology->abdominal=request('abdominal_aorta');
                $SurgicalGastroenterology->relevant_percussion=request('relevant_percussion');
                $SurgicalGastroenterology->examination_ascites=request('examination_ascites');
                $SurgicalGastroenterology->auscultation=request('relevant_auscultation');
                $SurgicalGastroenterology->relevant_genitalia=request('relevant_external');
                $SurgicalGastroenterology->diff_diagnosis=request('diff_diagnosis');
                $SurgicalGastroenterology->planned_procedure=request('planned_procedure');
                $SurgicalGastroenterology->save();
            }
            
            if($name=='plasticsurgery')
            {
                // $PlasticSurgery = new PlasticSurgery();
                $PlasticSurgery = PlasticSurgery::find($testId);
                $PlasticSurgery->doctor_id=$patient_id;
                $PlasticSurgery->examination_id=$lastexaminationid;
                $PlasticSurgery->generalappearance=request('general');
                $PlasticSurgery->site=request('site');
                $PlasticSurgery->localexamination=request('local_examination');
                $PlasticSurgery->special_notes=request('special_note');
                $PlasticSurgery->diff_diagnosis=request('diff_diagnosis');
                $PlasticSurgery->planned_procedure=request('planned_procedure');
                $PlasticSurgery->save();
            }
            
            if($name=='dentistry')
            {
                // $Dentistry = new Dentistry();
                $Dentistry = Dentistry::find($testId);
                $Dentistry->doctor_id=$patient_id;
                $Dentistry->examination_id=$lastexaminationid;
                $Dentistry->generalappearance=request('general_appearance');
                $Dentistry->facies=request('facies');
                $Dentistry->skin=request('skin_nail');
                $Dentistry->palpation=request('palpation');
                $Dentistry->extra=request('extra_oral');
                $Dentistry->intra=request('intra_oral');
                $Dentistry->dental=request('dental_examination');
                $Dentistry->regional=request('regional_examination');
                $Dentistry->systemic=request('systemic_examination');
                $Dentistry->diff_diagnosis=request('diff_diagnosis');
                $Dentistry->planned_procedure=request('planned_procedure');
                $Dentistry->save();
            }
            
            if($name=='oncology')
            {
                //$Oncology = new Oncology();
                $Oncology = Oncology::find($testId);
                $Oncology->doctor_id=$patient_id;
                $Oncology->examination_id=$lastexaminationid;
                $Oncology->generalappearance=request('general_appearance');
                $Oncology->site=request('site');
                $Oncology->lumpexam=request('lump_exam');
                $Oncology->vascular=request('vascular_area');
                $Oncology->nerve=request('nerve_area');
                $Oncology->lymphatics=request('lymphatics_area');
                $Oncology->spread=request('spread_area');
                $Oncology->diff_diagnosis=request('diff_diagnosis');
                $Oncology->planned_procedure=request('planned_procedure');
                $Oncology->save();
            }
            
            if($name=='surgicaloncology')
            {
                // $SurgicalOncology = new SurgicalOncology();
                $SurgicalOncology = SurgicalOncology::find($testId);
                $SurgicalOncology->doctor_id=$patient_id;
                $SurgicalOncology->examination_id=$lastexaminationid;
                $SurgicalOncology->generalappearance=request('general_appearance');
                $SurgicalOncology->site=request('site');
                $SurgicalOncology->lumpexam=request('lump_exam');
                $SurgicalOncology->vascular=request('vascular_area');
                $SurgicalOncology->nerve=request('nerve_area');
                $SurgicalOncology->lymphatics=request('lymphatics_area');
                $SurgicalOncology->spread=request('spread_area');
                $SurgicalOncology->diff_diagnosis=request('diff_diagnosis');
                $SurgicalOncology->planned_procedure=request('planned_procedure');
                $SurgicalOncology->save();
            }
            
            if($name=='endocrinology')
            {
                // $Endocrinology = new Endocrinology();
                $Endocrinology = Endocrinology::find($testId);
                $Endocrinology->doctor_id=$patient_id;
                $Endocrinology->examination_id=$lastexaminationid;
                $Endocrinology->built=request('built');
                $Endocrinology->hair=request('hair');
                $Endocrinology->eye=request('eye');
                $Endocrinology->ear=request('ear');
                $Endocrinology->midfacial=request('mid');
                $Endocrinology->lip=request('lip');
                $Endocrinology->dental=request('dental');
                $Endocrinology->tongue=request('tongue');
                $Endocrinology->neck=request('neck');
                $Endocrinology->skin=request('skin');
                $Endocrinology->podiatric=request('podiatric');
                $Endocrinology->peripheral=request('vascular');
                $Endocrinology->complete=request('thyroid');
                $Endocrinology->external=request('external_gene');
                $Endocrinology->sexual=request('sexual');
                $Endocrinology->systemic=request('systemic');
                $Endocrinology->diff_diagnosis=request('diff_diagnosis');
                $Endocrinology->planned_procedure=request('planned_procedure');
                $Endocrinology->save();
            }
            
            if($name=='ctvs')
            {
                // $CTVS = new CTVS();
                $CTVS = CTVS::find($testId);
                $CTVS->doctor_id=$patient_id;
                $CTVS->examination_id=$lastexaminationid;
                $CTVS->generalappearance=request('general');
                $CTVS->radial=request('radial_rate');
                $CTVS->rhythm=request('rhythm');
                $CTVS->cardotid=request('carotidartery');
                $CTVS->jugular=request('jugularpressure');
                $CTVS->thrills=request('thrills');
                $CTVS->s1=request('s1');
                $CTVS->s2=request('s2');
                $CTVS->s3=request('s3');
                $CTVS->s4=request('s4');
                $CTVS->murmurs=request('murmurs');
                $CTVS->extrasounds=request('extrasounds');
                $CTVS->respiratory=request('respiratory_rate');
                $CTVS->pulmonary_rhythm=request('respiratory_rhythm');
                $CTVS->muscules=request('respiration');
                $CTVS->retention=request('dioxide_retention');
                $CTVS->troisier=request('troisier_sign');
                $CTVS->chest=request('chest_expansion');
                $CTVS->percussion=request('percussion_ribs');
                $CTVS->tactile=request('vocal_fremitus');
                $CTVS->auscultation=request('auscultation_notes');
                $CTVS->anyother=request('any_notes');
                $CTVS->vascular=request('peripheral_examination');
                $CTVS->congestive=request('heart_failure');
                $CTVS->infective=request('infective_endocarditis');
                $CTVS->rheumatic=request('heart_disease');
                $CTVS->diff_diagnosis=request('diff_diagnosis');
                $CTVS->planned_procedures=request('planned_procedure');
                $CTVS->save();
            }
            
            if($name=='pediatrics')
            {
                // $Pediatrics = new Pediatrics();
                $Pediatrics = Pediatrics::find($testId);
                $Pediatrics->doctor_id=$patient_id;
                $Pediatrics->examination_id=$lastexaminationid;
                $Pediatrics->perinatal=request('perinatal_birth');
                $Pediatrics->development=request('developmental_history');
                $Pediatrics->feeding=request('feeding_history');
                $Pediatrics->immunization=request('immunization_history');
                $Pediatrics->family=request('family_history');
                $Pediatrics->past=request('past_history');
                $Pediatrics->apgar=request('apgar_score');
                $Pediatrics->general_apperance=request('general_appearance');
                $Pediatrics->weight=request('weight');
                $Pediatrics->length=request('length');
                $Pediatrics->head=request('head_circum');
                $Pediatrics->skin=request('skin');
                $Pediatrics->lymph=request('lymph_nodes');
                $Pediatrics->facies=request('facies');
                $Pediatrics->oral=request('oral_cavity');
                $Pediatrics->chest=request('chest');
                $Pediatrics->abdomen=request('abdomen');
                $Pediatrics->genitalia=request('genitalia');
                $Pediatrics->rectum=request('rectum_anus');
                $Pediatrics->musculos=request('musculoskeletal');
                $Pediatrics->back=request('back');
                $Pediatrics->reflexs=request('reflexes');
                $Pediatrics->neurological=request('neurological_Examination');
                $Pediatrics->diff_diagnosis=request('diff_diagnosis');
                $Pediatrics->planned_procedure=request('planned_procedure');
                $Pediatrics->save();
            }
            
            if($name=='pediatricssurgery')
            {
                // $PediatricSurgery = new PediatricSurgery();
                $PediatricSurgery = PediatricSurgery::find($testId);
                $PediatricSurgery->doctor_id=$patient_id;
                $PediatricSurgery->examination_id=$lastexaminationid;
                $PediatricSurgery->perinatal=request('perinatal_birth');
                $PediatricSurgery->development=request('developmental_history');
                $PediatricSurgery->feeding=request('feeding_history');
                $PediatricSurgery->immunization=request('immunization_history');
                $PediatricSurgery->family=request('family_history');
                $PediatricSurgery->past=request('past_history');
                $PediatricSurgery->apgar=request('apgar_score');
                $PediatricSurgery->general_appearance=request('general_appearance');
                $PediatricSurgery->weight=request('weight');
                $PediatricSurgery->length=request('length');
                $PediatricSurgery->head=request('head_circum');
                $PediatricSurgery->skin=request('skin');
                $PediatricSurgery->lymph=request('lymph_nodes');
                $PediatricSurgery->facies=request('facies');
                $PediatricSurgery->oral=request('oral_cavity');
                $PediatricSurgery->chest=request('chest');
                $PediatricSurgery->abdomen=request('abdomen');
                $PediatricSurgery->genitalia=request('genitalia');
                $PediatricSurgery->rectum=request('rectum_anus');
                $PediatricSurgery->musculos=request('musculoskeletal');
                $PediatricSurgery->back=request('back');
                $PediatricSurgery->reflexes=request('reflexes');
                $PediatricSurgery->neurological=request('neurological_Examination');
                $PediatricSurgery->local=request('local_examimation');
                $PediatricSurgery->lump=request('lump_exam');
                $PediatricSurgery->ulcers=request('ulcers_exam');
                $PediatricSurgery->diff_diagnosis=request('diff_diagnosis');
                $PediatricSurgery->planned_procedures=request('planned_procedure');
                $PediatricSurgery->save();
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
        
        $followupdate=Appointments::where('patient_id',$patient_id)->latest()->first();
        
        dd($followupdate);
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
                //->whereYear('patient_lab_detail.test_date', $currentyear)
                ->orderBy('patient_lab_detail.test_date')
                ->get();
        //11-06-2020 bhargav 
        $a=[];
        foreach ($lab_detail as $key => $l) {
            $datetime = DateTime::createFromFormat('d/m/Y', $l->test_date);
            $la['test_date']=$datetime->format('Y-m-d');
            $la['uniqueid']=$l->uniqueid;
            $la['id']=$l->id;
            $la['coach_id']=$l->coach_id;
            $la['patient_id']=$l->patient_id;
            $la['test_name']=$l->test_name;
            $la['value']=$l->value;
            $la['unit']=$l->unit;
            $la['result']=$l->result;
            $la['status']=$l->status;
            $la['created_at']=$l->created_at;
            $la['updated_at']=$l->updated_at;
            $a[]=$la;
        }
        $lab_detail=$a;
        array_multisort( array_column($lab_detail, "test_date"), SORT_DESC, $lab_detail );
        
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
            $datetime = DateTime::createFromFormat('d/m/Y', request('date'));
            $new_date = $datetime->format('d/m/Y');
            //$timestamp = strtotime(request('date'));
            //$new_date = date("Y-m-d", $timestamp);
            //$new_date = date("d/m/Y", $timestamp);
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
            $datetime = DateTime::createFromFormat('d/m/Y', request('date'));
            $new_date = $datetime->format('d/m/Y');
            //$timestamp = strtotime(request('date'));
            //$new_date = date("d/m/Y", $timestamp);
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
                //->orderBy('patient_procedure.procedure_date','DESC')
                ->get();
        $Procedure=Procedure::where('status',1)->orderby('procedure_name')->get();
        //dd($patient_detail);
        //11-06-2020 bhargav
$a=[];
foreach ($patient_detail as $key => $l) {
$datetime = DateTime::createFromFormat('d/m/Y', $l->procedure_date);
$la['procedure_date']=strtotime($datetime->format('Y-m-d'));
$la['uniqueid']=$l->uniqueid;
$la['id']=$l->id;
$la['coach_id']=$l->coach_id;
$la['patient_id']=$l->patient_id;
$la['procedure_name']=$l->procedure_name;
$la['remark']=$l->remark;
$la['status']=$l->status;
$la['created_at']=$l->created_at;
$la['updated_at']=$l->updated_at;
$a[]=$la;
}
$patient_detail=$a;
array_multisort( array_column($patient_detail, "procedure_date"), SORT_DESC, $patient_detail );

//dd($patient_detail);
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
            $datetime = DateTime::createFromFormat('d/m/Y', request('date'));
            $new_date = $datetime->format('d/m/Y');
            //dd($new_date);
            //$timestamp = strtotime(request('date'));
            //$new_date = date("Y-m-d", $timestamp);
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
            $datetime = DateTime::createFromFormat('d/m/Y', request('date'));
            $new_date = $datetime->format('d/m/Y');
            //$timestamp = strtotime(request('date'));
            //$new_date = date("Y-m-d", $timestamp);
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
                //->orderBy('patient_health_records.add_date', 'DESC')
                ->get();
        //11-06-2020 bhargav
        //dd($vitals_detail);
$a=[];
foreach ($vitals_detail as $key => $l) {
$datetime = DateTime::createFromFormat('d/m/Y', $l->add_date);
$la['add_date']=strtotime($datetime->format('Y-m-d'));
$la['uniqueid']=$l->uniqueid;
$la['id']=$l->id;
$la['patient_id']=$l->patient_id;
$la['blood_pressure_min_value']=$l->blood_pressure_min_value;
$la['blood_pressure_max_value']=$l->blood_pressure_max_value;
$la['pluse']=$l->pluse;
$la['temperature']=$l->temperature;
$la['oxygen_saturation']=$l->oxygen_saturation;
$la['breathing_rate']=$l->breathing_rate;
$la['abdominal_circumference']=$l->abdominal_circumference;
$la['blood_sugar']=$l->blood_sugar;
$la['weight']=$l->weight;
$la['height']=$l->height;
$la['bmi']=$l->bmi;
$la['status']=$l->status;
$la['created_at']=$l->created_at;
$la['updated_at']=$l->updated_at;
$a[]=$la;
}
$vitals_detail=$a;
array_multisort( array_column($vitals_detail, "add_date"), SORT_DESC, $vitals_detail );
        //dd($vitals_detail);
        $PatientDetail=PatientDetail::where('patient_id','=',$patient_id)->first();
        //dd($PatientDetail);
        return view('admin_main.vitals.index',["patient_id" => $patient_id,'vitals_detail'=>$vitals_detail,'PatientDetail'=>$PatientDetail]);
    }

     public function addVitals($patient_id){

         return view('admin_main.vitals.add_vitals',["patient_id" => $patient_id]);
     }

    public function storeVitals(Request $request,$id)
    {

            if($request->sbp){
            $validator = Validator::make($request->all(), [
                    'date' => 'required',
            ]);
            }elseif($request->dbp){
            $validator = Validator::make($request->all(), [
                    'date' => 'required',
            ]);
            }elseif($request->rr){
            $validator = Validator::make($request->all(), [
                    'date' => 'required',
            ]);
            }elseif($request->temp){
            $validator = Validator::make($request->all(), [
                    'date' => 'required',
            ]);
            }elseif($request->sp2){
            $validator = Validator::make($request->all(), [
                    'date' => 'required',
            ]);
            }elseif($request->hr){
            $validator = Validator::make($request->all(), [
                    'date' => 'required',
            ]);
            }elseif($request->fbs){
            $validator = Validator::make($request->all(), [
                    'date' => 'required',
            ]);
            }elseif($request->weight){
            $validator = Validator::make($request->all(), [
                    'date' => 'required',
            ]);
            }elseif($request->height){
            $validator = Validator::make($request->all(), [
                    'date' => 'required',
            ]);
            }elseif($request->bmi){
            $validator = Validator::make($request->all(), [
                    'date' => 'required',
            ]);
            }
           $errors = $validator->errors();
            if ($validator->fails()) {
                return redirect()->back()
                                ->withInput($request->all())
                                ->withErrors($errors);
                exit;
            }
            else{
                // $timestamp = strtotime(request('date'));
                // $new_date = date("d/m/Y", $timestamp);
$datetime = DateTime::createFromFormat('d/m/Y', request('date'));
$new_date = $datetime->format('d/m/Y');
            //dd($new_date);
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
       //11-06-2020 bhargav
        //dd($vitals_detail);
$a=[];
foreach ($vitals_detail as $key => $l) {
$datetime = DateTime::createFromFormat('d/m/Y', $l->add_date);
$la['add_date']=strtotime($datetime->format('Y-m-d'));
$la['uniqueid']=$l->uniqueid;
$la['id']=$l->id;
$la['patient_id']=$l->patient_id;
$la['blood_pressure_min_value']=$l->blood_pressure_min_value;
$la['blood_pressure_max_value']=$l->blood_pressure_max_value;
$la['pluse']=$l->pluse;
$la['temperature']=$l->temperature;
$la['oxygen_saturation']=$l->oxygen_saturation;
$la['breathing_rate']=$l->breathing_rate;
$la['abdominal_circumference']=$l->abdominal_circumference;
$la['blood_sugar']=$l->blood_sugar;
$la['weight']=$l->weight;
$la['height']=$l->height;
$la['bmi']=$l->bmi;
$la['status']=$l->status;
$la['created_at']=$l->created_at;
$la['updated_at']=$l->updated_at;
$a[]=$la;
}
$vitals_detail=$a;
array_multisort( array_column($vitals_detail, "add_date"), SORT_DESC, $vitals_detail );                
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
                //$timestamp = strtotime(request('date'));
                //$new_date = date("d/m/Y", $timestamp);
            $datetime = DateTime::createFromFormat('d/m/Y', request('date'));
            $new_date = $datetime->format('d/m/Y');
            
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
                    //->orderBy('date')
                    ->where('appointment_details.is_prescription','!=',1)
                    //->orderBy('time')
                    ->orderBy('date','DESC')
                    ->orderBy('time','DESC') 
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
                    ->where('appointment_details.is_prescription','!=',1)
                    //->orderBy('date')
                    //->orderBy('time')
                    ->orderBy('date','DESC')
                    ->orderBy('time','DESC')
                    ->get();
            //dd($patient_detail);
            return view('admin_main/appointments/upcoming',['PatientDetail'=>$patient_detail]);
        }

    }
    
    public function openreadlinkupcoming($id)
    {
        $Appointments=Appointments::find($id);
        $Appointments->is_read = 1;
        $Appointments->save();

        return redirect()->route('store_patient.edit',$Appointments->patient_id);
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
    
    public function openreadlinkpointofcare($id)
    {
        $doctorrefer=Doctorrefer::find($id);
        //dd($doctorrefer);
        $doctorrefer->is_read = 1;
        $doctorrefer->save();

        return redirect()->route('store_patient.edit',$doctorrefer->user_id);
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
                    ->whereDate('appointment_details.date','>=',date('Y-m-d'))
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
                    ->orwhere('appointment_details.is_prescription','=',1)
                    ->orderBy('date','DESC')
                    ->orderBy('time','DESC')
                    ->get();
            //dd($patient_detail);
            return  view('admin_main/appointments/past',['PatientDetail'=>$patient_detail]);
        }

        if($id->role_id==2)
        {
            // $patient_detail =Appointments::where('appointment_details.date','!=', date('d/m/Y'))->where('appointment_details.date','<=', date('d/m/Y'))->where('appointment_details.doctor_id','=',$user_id)->where('appointment_details.flag',1)->with('doctor','patient')->get();
             
                    $patient_detail = Appointments::
                    select('d.fname as doctorname','pds.age','pds.gender','p.fname as patientname','appointment_details.*')
                    ->join('users as d','appointment_details.doctor_id','=','d.id')
                    ->join('users as p','appointment_details.patient_id','=','p.id')
                    ->join('patient_detail as pds','pds.patient_id','=','appointment_details.patient_id')
                    ->where('appointment_details.date','<=',date('Y-m-d'))
                    ->where('doctor_id','=',$user_id)
                    //->orwhere('appointment_details.is_prescription','=',1)
                    ->orderBy('date','DESC')
                    ->orderBy('time','DESC')
                    ->get();
                    
             //dd($patient_detail);

            return  view('admin_main/appointments/past',['PatientDetail'=>$patient_detail]);
        }

    }

    public function apporverejectappointments($id,$status)
    {
        //dd($id."+".$status);
        $user_detail = Appointments::where('id',$id)->with('doctor','patient')->first();
        //dd($user_detail);
        if(Auth::check()){
            $clinic_id=Auth::user()->id;
        }else{
            $clinic_id=1;
        }
        
        PatientDetail::where('patient_id',$user_detail->patient_id)->update([
            'clinic_id' => $clinic_id,
        ]);
        
        Appointments::whereId($id)->update([
            'flag' => $status,
            'arrives' => 1,
            'clinic_id' => $clinic_id,
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
        if($role_id == 6){
            $settings=Poc::where('user_id',$id)->first();
            $city = City::get()->toArray();
            return view('admin_main/settings/editsettings',['settings'=>$settings,'city'=>$city]);       
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
        $AuthUser=Auth::user();
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
            
            if($AuthUser->role_id==6){
                $settings = Poc::where('user_id',$id)->first();
                $settings->manager_name=request('username');
                $settings->address=request('address');
                $settings->city=request('city');
                $settings->password = $newpassword;
                $settings->save();
            }else{
                $settings = Clinic::where('user_id',$id)->first();
                $settings->fname=request('username');
                $settings->address=request('address');
                $settings->city=request('city');
                $settings->password = $newpassword;
                $settings->book_flag=request('flag');
                $settings->save();
            }
            

            $userid=isset($settings->user_id)?$settings->user_id:'';
            $usercheck=User::find($userid);
            $password1 = Hash::check($request->currentpassword, $usercheck->password);
            
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
                        ->where('doctors.doctor_id','!=',$authuserdata->id)
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
       $patient_detail = Panalistrefer::select('panalistrefer.*','u.fname','u.id as uid','pd.age','pd.gender','u.contact_number','u.email','ct.city as cityname','pc.fname as pocname','pct.id as pctid')
                   ->leftjoin('users as u','panalistrefer.user_id','=','u.id')
                   ->leftjoin('patient_detail as pd','panalistrefer.user_id','=','pd.patient_id')
                   ->leftjoin('users as pc','panalistrefer.poc_id','=','pc.id')
                   ->leftjoin('pointofcare as pct','pct.user_id','=','panalistrefer.poc_id')
                   ->leftjoin('city as ct','ct.id','=','pct.city')
                   //->leftjoin('panalistrefer', 'u.id', '=', 'panalistrefer.user_id')
                   ->where('panalistrefer.panalist_id','=',$id)
                   ->get();
              //dd($patient_detail);
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
    
     public function panelreply($id)
    {
            return view('admin_main.replaypanelist',["Panelist_id" => $id]);
    }
    
     public function DoctorReplay($id)
    {
        
            return view('admin_main.replaydoctor',["dr_id" => $id]);
    }

    public function updatepanelreplay(Request $request)
    {
        
          //dd($request->all());
          $Panalistrefer = Panalistrefer::find($request->panel_id);
          //dd($Panalistrefer);
          if($Panalistrefer){
              $Panalistrefer->answer = $request->answer;
              $Panalistrefer->save();
          }
         //dd($Panalistrefer);
        return redirect()->route('panel.allpatient')->with('success','Answer submited successfully');
    }
    
    public function updatedrreplay(Request $request)
    {
        
         $doctorrefer=DB::table('doctorrefer')->where('user_id',$request->panel_id)->first();
         if($doctorrefer){
            $doctorrefer=DB::table('doctorrefer')->where('user_id',$request->panel_id)->update(['answer'=>$request->answer]);
         }
         //dd($doctorrefer);
         /*
         07-07-2020
          $Panalistrefer = Panalistrefer::find($request->poc_id);
          
          if($Panalistrefer){
              
              $Panalistrefer->answer = $request->answer;
              $Panalistrefer->save();
          }
          */
          return redirect()->route('admin_main.pocappointment')->with('success','Answer submited successfully');
//return redirect()->back()->with('success','Answer submited successfully');
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
        //dd($userid);
        $PatientDetail=PatientDetail::
        select('patient_detail.age','patient_detail.id','patient_detail.patient_id as uniqueid','users.*','patient_detail.dob','patient_detail.gender', 'users.contact_number','users.email','patient_detail.profile_pic','patient_health_history.allergies as allergies','patient_detail.height as height','patient_detail.weight as weight','patient_detail.bmi as bmi')
        ->leftjoin('users', 'patient_detail.patient_id', '=', 'users.id')
        ->leftjoin('patient_health_history', 'patient_detail.patient_id', '=', 'patient_health_history.patient_id')
        ->where('patient_detail.patient_id',$id)
        ->first();
        $familyhistory=DB::table('patient_health_history_family')->where('patient_id', '=',$id)->first();
        $doctor_speciality=DoctorDetail::where('doctor_id',$userid)->first();
      
      if($doctor_speciality)
      {
        $specialty=Speciality::where('id',$doctor_speciality->speciality)->first();
        
          $specialty_name=isset($specialty)?$specialty->speciality:'';
          
          $name=strtolower(preg_replace('/\s/', '', $specialty_name));  
          //dd($name);
      }
      else
      {
          $name='';
      }
        if($familyhistory){
            //dd($familyhistory);
            if(isset($familyhistory->problem_id))
            {
                    $familyhistory=explode(",",$familyhistory->problem_id);
                
                     $array=array();
                    foreach ($familyhistory as $ids) {
                           $db=DB::table('list_of_problem')->where('id','=',$ids)->first();
                           $array[] = $db->problem;
                    }
                $familyhistory=implode(",",$array);                    
            }
        
        }//familyhistory
        
        //patient_health_history
        $history=DB::table('patient_health_history')->where('patient_id', '=',$id)->first();
        
        $habit=array();
        if($history){
        $habit['smoking']=$history->smoking;
        $habit['alcohol_drinking']=$history->alcohol_drinking;
        if(isset($history->problem_id))
        {
            $history=explode(",",$history->problem_id);
             $array=array();
            foreach ($history as $ids1) {
                   $db=DB::table('list_of_problem')->where('id','=',$ids1)->first();
                   $array[] = $db->problem;
            }
        $habit['problem']=implode(",",$array);        
        }
        
        }//history
        /*
        $charts=PatientHealthRecordDetail::
        where('patient_id','=',$id)
        ->orderBy('add_date', 'DESC')
        ->get();
        */
        if(isset($_GET['StartDate'])){
            $enddate=date("Y-m-d",strtotime($_GET['StartDate']));
        }else{
            $enddate=date("Y-m-d",strtotime(date("Y-m-d")));
        }
        $startdate=date("Y-m-d",strtotime("-7 day", strtotime($enddate)));
        //dd(date("Y-m-d",$startdate));
        //select('patient_health_records.*',DB::raw('unix_timestamp(DATE_FORMAT(STR_TO_DATE(patient_health_records.add_date, "%e/%c/%Y"), "%Y-%m-%d")) as dateformat'))
        $charts=PatientHealthRecordDetail::
        select('patient_health_records.*',DB::raw('DATE_FORMAT(STR_TO_DATE(patient_health_records.add_date, "%e/%c/%Y"), "%Y-%m-%d") as dateformat'))
        ->where('patient_id','=',$id)
        ->get();
        $a=[];
        foreach ($charts as $key => $l) {
            if((strtotime($l->dateformat) <= strtotime($enddate)) && (strtotime($l->dateformat) >= strtotime($startdate))){
                //dd($startdate.'->'.$l->dateformat.'<-'.$enddate);
                $la['add_date']=$l->add_date;
                $la['patient_id']=$l->patient_id;
                $la['id']=$l->id;
                $la['blood_pressure_min_value']=$l->blood_pressure_min_value;
                $la['blood_pressure_max_value']=$l->blood_pressure_max_value;
                $la['pluse']=$l->pluse;
                $la['temperature']=$l->temperature;
                $la['oxygen_saturation']=$l->oxygen_saturation;
                $la['breathing_rate']=$l->breathing_rate;
                $la['abdominal_circumference']=$l->abdominal_circumference;
                $la['blood_sugar']=$l->blood_sugar;
                $la['weight']=$l->weight;
                $la['height']=$l->height;
                $la['bmi']=$l->bmi;
                $la['status']=$l->status;
                $la['created_at']=$l->created_at;
                $la['updated_at']=$l->updated_at;
                $a[]=$la;
            }
        }
        $charts=$a;
        array_multisort( array_column($charts, "add_date"), SORT_DESC, $charts );
        
        
        $PatientLab=PatientLabDetail::where('patient_id','=',$id)
        //->orderBy('test_name', 'ASC')
        ->get();
        //11-06-2020 bhargav 
        $a=[];
        foreach ($PatientLab as $key => $l) {
            $datetime = DateTime::createFromFormat('d/m/Y', $l->test_date);
            $la['test_date']=$datetime->format('Y-m-d');
            $la['uniqueid']=$l->uniqueid;
            $la['id']=$l->id;
            $la['coach_id']=$l->coach_id;
            $la['patient_id']=$l->patient_id;
            $la['test_name']=$l->test_name;
            $la['value']=$l->value;
            $la['unit']=$l->unit;
            $la['result']=$l->result;
            $la['status']=$l->status;
            $la['created_at']=$l->created_at;
            $la['updated_at']=$l->updated_at;
            $a[]=$la;
        }
        $PatientLab=$a;
        array_multisort( array_column($PatientLab, "test_date"), SORT_DESC, $PatientLab );
        //dd($PatientLab);
        
        
        $PatientProcedure=PatientProcedure::where('patient_procedure.patient_id','=',$id)
        //->orderBy('procedure_name', 'ASC')
        ->get();
//11-06-2020 bhargav
$a=[];
foreach ($PatientProcedure as $key => $l) {
$datetime = DateTime::createFromFormat('d/m/Y', $l->procedure_date);
$la['procedure_date']=strtotime($datetime->format('Y-m-d'));
$la['uniqueid']=$l->uniqueid;
$la['id']=$l->id;
$la['coach_id']=$l->coach_id;
$la['patient_id']=$l->patient_id;
$la['procedure_name']=$l->procedure_name;
$la['remark']=$l->remark;
$la['status']=$l->status;
$la['created_at']=$l->created_at;
$la['updated_at']=$l->updated_at;
$a[]=$la;
}
$PatientProcedure=$a;
array_multisort( array_column($PatientProcedure, "procedure_date"), SORT_DESC, $PatientProcedure );
        
        $PatientPriscription=PatientPriscription::
        select('patient_priscription.*','users.fname as Dfname','patient_detail.height as height','patient_detail.weight as weight','patient_detail.bmi as bmi')
        ->leftjoin('users', 'patient_priscription.doctor_id', '=', 'users.id')
        ->leftjoin('patient_detail', 'patient_priscription.patient_id', '=', 'patient_detail.patient_id')
        ->where('patient_priscription.patient_id','=',$id)
        ->orderBy('created_at', 'DESC')
        ->get();
        
        $PatientPanelists=Panalistrefer::
        select('panalistrefer.*','users.fname as Ptname','panelists.name as panelistsnames','panel.fname as panelistname')
        ->leftjoin('users', 'panalistrefer.user_id', '=', 'users.id')
        ->leftjoin('panelists', 'panalistrefer.panalist_id', '=', 'panelists.id')
        ->leftjoin('users as panel', 'panalistrefer.panalist_id', '=', 'panel.id')
        ->where('panalistrefer.user_id','=',$id)
        ->orderBy('created_at', 'DESC')
        ->get();
        
        $PatientPoc=PatientDetail::
        select('patient_detail.*','df.answer as dranswer','df.question as question','df.answer as answer','users.fname as pocname')//,'poc.fname as pocname'
        ->leftjoin('doctorrefer as df', 'patient_detail.patient_id', '=', 'df.user_id')
        ->leftjoin('users', 'df.poc_id', '=', 'users.id')
        ->where('patient_detail.patient_id','=',$id)
        ->get();
        //dd($PatientPoc);
         $pge=PatientGeneralExamination::select('patient_general_examination.*','df.fname as patientname')
          ->where('patient_general_examination.patient_id',$id)
          ->leftjoin('users as df', 'patient_general_examination.patient_id', '=', 'df.id')
          ->get();
          
         if($name=='dermatology'){
            
         }elseif($name=='generalmedicineanddiabetes'){
             
         }elseif($name=='cardiology'){
             
         }elseif($name=='obstetricsandgynecology'){
             
         }elseif($name=='orthopedics'){
             
         }elseif($name=='psychiatry'){
             
         }elseif($name=='pulmonarymedicine'){
             
         }elseif($name=='generalsurgery'){
             
         }elseif($name=='neurology'){
             
         }elseif($name=='neurosurgery'){
             
         }else{
             
         }
                return view('admin_main/past_health_records',array('PatientDetail' => $PatientDetail,'charts'=>$charts,'PatientLab'=>$PatientLab,'PatientPriscription'=>$PatientPriscription,'PatientProcedure'=>$PatientProcedure,'familyhistory'=>$familyhistory,'history'=>$habit,'PatientPanelists'=>$PatientPanelists,'PatientPoc'=>$PatientPoc,'pge'=>$pge));
    }
    //CLINICAL MANAGEMENT
    public function indexClinicalManagement($patient_id)
    {
        $authuserdata = Auth::user();
        $role_id = $authuserdata->role_id;
        
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
        
        if($role_id == 2)
        {
            $refer = DB::table('appointment_details')
            ->join('clinic', 'appointment_details.clinic_id', '=', 'clinic.user_id')
            ->join('doctor_speciality', 'appointment_details.speciality_id', '=', 'doctor_speciality.id')
            ->join('city', 'appointment_details.city_id', '=', 'city.id')
            ->join('users', 'appointment_details.doctor_id', '=', 'users.id')
            ->select('appointment_details.*','clinic.fname as Cfname', 'doctor_speciality.speciality', 'city.city','users.fname as Dfname')
            ->where('patient_id','=',$patient_id)
            ->where('doctor_id','!=',$authuserdata->id)
            ->get();
        }else{
            $refer = DB::table('appointment_details')
            ->join('clinic', 'appointment_details.clinic_id', '=', 'clinic.user_id')
            ->join('doctor_speciality', 'appointment_details.speciality_id', '=', 'doctor_speciality.id')
            ->join('city', 'appointment_details.city_id', '=', 'city.id')
            ->join('users', 'appointment_details.doctor_id', '=', 'users.id')
            ->select('appointment_details.*','clinic.fname as Cfname', 'doctor_speciality.speciality', 'city.city','users.fname as Dfname')
            ->where('patient_id','=',$patient_id)
            ->get();
        }

        //Priscription
        $lab_detail=PatientPriscription::select('patient_priscription.id as uniqueid','patient_priscription.*','d.fname as doctorname')
                ->leftjoin('users as d', 'patient_priscription.doctor_id', '=', 'd.id')
                ->where('patient_priscription.patient_id','=',$patient_id)
                ->get();
        $medicines=DB::table('medicines')->where('status',1)->orderby('name')->get();
        return view('admin_main.healthdata.healthdata_CM',["patient_id" => $patient_id,'patient_detail'=>$patient_detail,'city'=>$city,'speciality'=>$speciality,'hospital'=>$hospital,'lab_detail'=>$lab_detail,'refer'=>$refer,'medicines'=>$medicines]);
    }
    public function StoreClinicalManagement(Request $request,$patient_id)
    {
        $validator = Validator::make($request->all(), [
            //'diagnosis' => 'required',
            //'drugname' => 'required|array|min:0',
            //'drugname' => 'required|array|min:1',
            //'drugname.*' => 'required',
            //'frequency' => 'required|array|min:1',
            //'duration' => 'required|array|min:1',
            //'notes' => 'required|array|min:1',
            //'investigationnotes' => 'required',
            //'date' => 'required',
            //'city' => 'required',
            //'hostipal' => 'required',
        ]);
    $errors = $validator->errors();
        if ($validator->fails()) {
            return redirect()->back()
            ->withInput($request->all())
            ->withErrors($errors);
            exit;
        }
        
        // dd($request->drugname[0]);
         
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
        
        if($request->drugname[0] != null){
        //Priscription
        foreach ($request->drugname as $key => $value) {
            $pp = new PatientPriscription();
            $pp->patient_id=$patient_id;
            $pp->doctor_id=isset($dd->doctor_id)?$dd->doctor_id:'';
            $pp->diagnosis = isset($request->diagnosis)?$request->diagnosis:'';
            $pp->medicine_name = $request->drugname[$key];
            //$pp->dose = $request->dose[$key];
            $pp->freq = $request->frequency[$key];
            $pp->route = $request->route[$key];
            $pp->duration = $request->duration[$key];
            $pp->notes = isset($request->notes[$key]) ? $request->notes[$key] : '';//request('notes');
            $pp->save();
        }
        
        }
        
        $followupdate=Appointments::where('patient_id',$patient_id)->latest()->first();
        if($followupdate)
        {
            Appointments::where('id',$followupdate->id)->update(['is_prescription'=>1]);    
            $followupdate=Appointments::where('id',$followupdate->id)->latest()->first();
        }
        
        //dd($followupdate);
        //Advice Treatment
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
        $goal = request('goal');
        $no = request('no');
        $days = request('days');
        //dd($goal[0]);
            if($goal[0] != ""){
                 //dd('bhargav');
                foreach ($goal as $key => $value) {
                  $AdviceGoal = new AdviceTreatmentGoal();
                  $AdviceGoal->investigation_id = $advicetreatment_id;
                  $AdviceGoal->goal = isset($goal[$key]) ? $goal[$key] : '';
                  $AdviceGoal->no = isset($no[$key]) ? $no[$key] : '';
                  $AdviceGoal->daysofmonth = isset($days[$key]) ? $days[$key] : '';
                  $AdviceGoal->save();
                }
            }
            //dd($goal[0]);
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
    
     public function openreadlinkreferral($id)
    {
        $doctodoc=Doctodoc::find($id);
        $doctodoc->is_read = 1;
        $doctodoc->save();

        $Appointments=Doctodoc::select('appointment_details.patient_id')
        ->join('appointment_details', 'doctodoc.appointment_id', '=','appointment_details.id')
        ->where('doctodoc.id',$id)
        ->first();
        
        return redirect()->route('store_patient.edit',$Appointments->patient_id);
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
        return redirect()->back()->with('success','Health Plan Successfully.');
    }
    public function reappointment (Request $request,$id)
    {       
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'doctor' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);
        $errors = $validator->errors();
        if ($validator->fails()) {
        return redirect()->back()
        ->withInput($request->all())
        ->withErrors($errors);
        exit;
        }
            if($request->time == "Time slot"){
                $request->time = date("H:i");
            }
            $AuthUser = Auth::user();
            $UserQuery=User::query();
            $AppointmentsQuery=Appointments::query();

            $PatientData=$UserQuery
            ->where('role_id','=','4')
            ->where('id','=',$id)
            ->first();

            $DoctorDetail=DoctorDetail::
            where('id','=',$request->doctor)
            ->first();
            
            $DoctorSpeciality=DB::table('doctor_speciality_select')
            ->where('doctor_id',$DoctorDetail->doctor_id)
            ->orderby('created_at')
            ->first();
            $Appointments=new Appointments;
            $Appointments->user_id=$AuthUser->id;
            $Appointments->clinic_id=$DoctorDetail->clinic_id;
            $Appointments->patient_id=$PatientData->id;
            $Appointments->city_id=$DoctorDetail->city;
            $Appointments->hostipal_id=$DoctorDetail->clinic_id;
            $Appointments->speciality_id=$DoctorSpeciality->speciality_id;
            $Appointments->doctor_id=$DoctorDetail->doctor_id;
            $Appointments->date=date("Y-m-d", strtotime($request->date));
            $Appointments->time=date("H:i", strtotime($request->time));
            $Appointments->flag=1;
            $Appointments->adhaarno='';
            $Appointments->role=4;
            $Appointments->poc_id='';
            $Appointments->arrives=0;
            $Appointments->save();
            
            try {
            $patient=User::find($PatientData->id);
            $parameter['patient_name']=isset($patient->fname)?$patient->fname:'';
            
            $doctor=User::find($DoctorDetail->doctor_id);
            $Speciality=DB::table('doctor_speciality')
            ->where('id',$DoctorSpeciality->speciality_id)
            ->orderby('created_at')
            ->first();
            $parameter['doctor_name']=isset($doctor->fname)?$doctor->fname:'';
            $parameter['type']=isset($Speciality->speciality)?$Speciality->speciality:'';
            
    //$parameter['password']=@$pwd;
    $email = $patient->email;
    //Appointment 
    //dd($parameter);
    $ppp = Mail::send('emailTemplate.appointment', ['parameter' => $parameter], function ($m) use($email) {
    $m->from(Config::get('app.from_mail'), Config::get('app.from_name'));
    $m->to($email)->subject('Sensoriom | Appointment Confirmed');
    });

    //Download the App
    // $ppp = Mail::send('emailTemplate.downloadapp', ['parameter' => $parameter], function ($m) use($email) {
    // $m->from(Config::get('app.from_mail'), Config::get('app.from_name'));
    // $m->to($email)->subject('Welcome To Sensoriom');
    // });

} catch (Exception $e) {
echo 'Message: ' .$e->getMessage();
}
            /*
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
            $Appointments->save();
            */
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
                'clinicname' => @$appointment->clinicname,
                'city' => @$appointment->city,
                'doctorname' => @$appointment->doctorname,
                'appointmentdate' => @isset($appointment->date)?date("d-m-Y", strtotime($appointment->date)):'',
                'appointmenttime' => @isset($appointment->time)?date("g:i A", strtotime($appointment->time)):'',
            ];
        $pdf = PDF::loadView('print/appointment', $data)->setPaper('a4', 'portrait');
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
                    $slopt = $this->getServiceScheduleSlots($dd['time_slot'], $dd['start_time'],$dd['end_time'],$date);
                    foreach ($slopt as $key => $s) {
                      $sp[] = $s;
                    }
                }
                //dd($sp);
               $DoctorDays=$DoctorDaysQ->first();
               foreach ($sp as $slot) {
                    //dd($slot);
                    $checkAppointments=Appointments::
                    where('doctor_id','=',$dId->doctor_id)
                    ->whereDate('date','=',date("Y-m-d", strtotime($date)))
                    ->whereTime('time','=',date("H:i:s", strtotime($slot['start'])))
                    ->count();
                    
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
    public function getServiceScheduleSlots($duration, $start,$end,$date)
    {
        
        $start = new DateTime($start);
        $end = new DateTime($end);
        $currentdate=date("Y-m-d");
        if($currentdate == date('Y-m-d', strtotime($date))){
            $start_time = date("H:i");    
        }else{
            $start_time = $start->format('H:i');    
        }
        
        
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
    
    public function patientexaminationrecords($id)
    {
       
        $userid = Auth::user()->id;

        $doctor_speciality=DoctorDetail::where('doctor_id',$userid)->first();
      
        if($doctor_speciality)
        {
            $specialty=Speciality::where('id',$doctor_speciality->speciality)->first();
            
              $specialty_name=isset($specialty)?$specialty->speciality:'';
              
              $name=strtolower(preg_replace('/\s/', '', $specialty_name));  
              //dd($name);
        }
        else
        {
              $name='';
        }
    //dd($name);
        if($name=='dermatology'){
            $Dermatology=Dermatology::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.Dermatology',['Dermatology'=>$Dermatology,'userid'=>$userid]);
            
        }elseif($name=='generalmedicineanddiabetes'){
            $GeneralDiabetes=GeneralDiabetes::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.GeneralDiabetes',['GeneralDiabetes'=>$GeneralDiabetes,'userid'=>$userid]);
        }elseif($name=='cardiology'){
            $Cardiology=Cardiology::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.Cardiology',['Cardiology'=>$Cardiology,'userid'=>$userid]);
        }elseif($name=='obstetricsandgynecology'){
            //dd('here');
            $Obstetrics=Obstetrics::where('doctor_id',$userid)->where('examination_id',$id)->first();
           
            return view('admin_main.viewformsdata.Obstetrics',['Obstetrics'=>$Obstetrics,'userid'=>$userid]);
        }elseif($name=='orthopedics'){
            $Orthopedics=Orthopedics::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.Orthopedics',['Orthopedics'=>$Orthopedics,'userid'=>$userid]);
        }elseif($name=='psychiatry'){
            $Psychiatry=Psychiatry::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.Psychiatry',['Psychiatry'=>$Psychiatry,'userid'=>$userid]);
        }elseif($name=='pulmonarymedicine'){
            $Pulmonary=Pulmonary::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.Pulmonary',['Pulmonary'=>$Pulmonary,'userid'=>$userid]);
        }elseif($name=='generalsurgery'){
            $GeneralSurgery=GeneralSurgery::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.GeneralSurgery',['GeneralSurgery'=>$GeneralSurgery,'userid'=>$userid]);
        }elseif($name=='neurology'){
            $Neurology=Neurology::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.Neurology',['Neurology'=>$Neurology,'userid'=>$userid]);
        }elseif($name=='neurosurgery'){
            $Neurosurgery=Neurosurgery::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.Neurosurgery',['Neurosurgery'=>$Neurosurgery,'userid'=>$userid]);
        }elseif($name=='ophthalmology'){
            $Ophthalmology=Ophthalmology::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.Ophthalmology',['Ophthalmology'=>$Ophthalmology,'userid'=>$userid]);
        }elseif($name=='ent'){
            $ENT=ENT::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.ENT',['ENT'=>$ENT,'userid'=>$userid]);
        }elseif($name=='urology'){
            $Urology=Urology::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.Urology',['Urology'=>$Urology,'userid'=>$userid]);
        }elseif($name=='nephrology'){
            $Nephrology=Nephrology::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.Nephrology',['Nephrology'=>$Nephrology,'userid'=>$userid]);
        }elseif($name=='gastroenterology'){
            $Gastroenterology=Gastroenterology::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.Gastroenterology',['Gastroenterology'=>$Gastroenterology,'userid'=>$userid]);
        }elseif($name=='surgicalgastroenterology'){
            $SurgicalGastroenterology=SurgicalGastroenterology::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.SurgicalGastroenterology',['SurgicalGastroenterology'=>$SurgicalGastroenterology,'userid'=>$userid]);
        }elseif($name=='plasticsurgery'){
            $PlasticSurgery=PlasticSurgery::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.PlasticSurgery',['PlasticSurgery'=>$PlasticSurgery,'userid'=>$userid]);
        }elseif($name=='dentistry'){
            $Dentistry=Dentistry::where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.Dentistry',['Dentistry'=>$Dentistry,'userid'=>$userid]);
        }elseif($name=='oncology'){
            $Oncology=Oncology::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.Oncology',['Oncology'=>$Oncology,'userid'=>$userid]);
        }elseif($name=='surgicaloncology'){
            $SurgicalOncology=SurgicalOncology::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.SurgicalOncology',['SurgicalOncology'=>$SurgicalOncology,'userid'=>$userid]);
        }elseif($name=='endocrinology'){
            $Endocrinology=Endocrinology::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.Endocrinology',['Endocrinology'=>$Endocrinology,'userid'=>$userid]);
        }elseif($name=='ctvs'){
            $CTVS=CTVS::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.Neurosurgery',['CTVS'=>$CTVS,'userid'=>$userid]);
        }elseif($name=='pediatrics'){
            $Pediatrics=Pediatrics::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.Pediatrics',['Pediatrics'=>$Pediatrics,'userid'=>$userid]);
        }elseif($name=='pediatricssurgery'){
            $PediatricSurgery=PediatricSurgery::where('doctor_id',$userid)->where('examination_id',$id)->first();
            return view('admin_main.viewformsdata.PediatricSurgery',['PediatricSurgery'=>$PediatricSurgery,'userid'=>$userid]);
        }
        //dd($name);
    }

}
