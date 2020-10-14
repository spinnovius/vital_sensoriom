<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Mail;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\User;
use App\PatientDetail;
// use App\PatientHealthRecordDetail;
use App\PatientHealthPlan;
use App\PatientWalletDetail;
use App\PatientFamilyContact;
use App\PatientHealthHistory;
use App\PatientFamilyHealthHistory;
use App\PatientPastHealthHistory;
use App\PatientPastHistory;
use App\PatientHealthRecordDetail;
use App\HealthTeam;
use App\Chathistory;
use App\Role;
use App\PatientLabDetail;
use App\Appointments;

use PDF;
use App\UserLocation;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller {

    public function viewall_patient(Request $request) {
        return view('admin/viewall_patient_list');
    }

    public function patientall_detail($id) {

        // $doctor = Doctor::where('id', $id)->get()->toarray();

        $patient = DB::table('users')
                ->select('users.id', 'users.fname', 'users.email', 'users.contact_number','users.verified','users.status','users.created_at','patient_detail.gender','patient_detail.marital_status','patient_detail.dob','patient_detail.height','patient_detail.weight','patient_detail.profile_pic','patient_detail.bmi','patient_detail.blood_group','patient_detail.created_at','patient_detail.updated_at','role.role','city.city','master_health_plan.price','master_health_plan.one_line_description','master_health_plan.appointment','master_health_plan.plan_name',DB::raw('master_health_plan.created_at as plan_create_date'),DB::raw('master_health_plan.updated_at as plan_update_date'),'patient_health_plan.in_pay as in_pay')
                ->leftjoin('patient_detail', 'users.id', '=', 'patient_detail.patient_id')
                ->leftjoin('role', 'users.role_id', '=', 'role.id')
                ->leftjoin('city', 'patient_detail.city', '=', 'city.id')
                ->leftjoin('patient_health_plan', 'users.id', '=', 'patient_health_plan.patient_id')
                ->leftjoin('master_health_plan', 'patient_health_plan.plan_id', '=', 'master_health_plan.id')
                ->where('users.id', $id)
                ->first();

        return view('admin/viewall_patient_detail',array('patient' => $patient));
    }

    public function patientarray(Request $request) {
        $response = [];
        

        $users = User::select('id', 'fname', 'lname', 'email', 'contact_number', 'role_id', 'verified', 'status')->where('role_id',4)->get();
        $users = $users->toArray();
        foreach ($users as $user) {
            $sub = [];
            $id = $user['id'];
            //$countlab=DB::table('patient_lab_detail')->where('patient_id','=',$id)->count();
            //$countprocedure=DB::table('patient_procedure')->where('patient_id','=',$id)->count();
            $sub[] = $id;
            if($user['fname']){
            $username='<a href="' . route('patient.patientall_detail', $id) . '">'.ucfirst($user['fname']).'</a>';
            }else{
            $username='<a href="' . route('patient.patientall_detail', $id) . '">-</a>';
            }
            $sub[] = $username;            
            //$sub[] = ($user['fname']) ? ucfirst($user['fname']) : "-";
            // $sub[] = ($user['lname']) ? $user['lname'] : "-";
            $sub[] = ($user['email']) ? $user['email'] : "-";
            $sub[] = $user['contact_number'];

            $admin_role = Role::select('role')->where('id',$user['role_id'])->first()->toArray();

            $sub[] = $admin_role['role'];

            if($user['status'] == 1)
            {
                $verified_url = route('patient.verified', array($id , 0));
                //if($countlab==0 && $countprocedure==0){
                $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactive this patient ?`)"  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>' . ' ';
                /*}else{
                $sub[] = '<a  style="color:red" onclick="CountDataForInactiveDelete()" href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">Active</label></a>' . ' ';
                }*/
            }
            elseif($user['status'] == 0)
            {
                $verified_url = route('patient.verified', array($id, 1));
                $sub[] = '<a  style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to active this patient ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Inactive</label></a>' . ' ';
            }

            $delete_url = route("patient.delete", $id);

            if ($user['role_id'] != 1) {
                $action = '<a href="' . route('patient.createpdf', $id) . '"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>' . ' ';
                $action .= '<a href="' . route('patient.patientall_detail', $id) . '"><i class="fa fa-list" aria-hidden="true"></i></a>' . ' ';
                //if($countlab==0 && $countprocedure==0){
                $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this patient ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
                /*}else{
                $action .= '<a style="color:red" onclick="CountDataForInactiveDelete()" href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
                }*/
            } else {
                $action = '<a href="' . route('patient.patientall_detail', $id) . '"><i class="fa fa-list" aria-hidden="true"></i></a>' . ' ';
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
            if(!in_array( 8 ,$manager_permissions )){
            $response=[];
            }
            //dd($response);
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }

    public function verified($id,$status) {
        // echo $id;
        $user = User::select('id')->where('id',$id)->first();
        User::whereId($id)->update([
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

        return redirect()->route('patient.viewall_patient')->with('success',ucfirst($user->name).' is '.$msg.' successfully.');
    }

    public function changevitals(Request $request) {
        // echo $id;
        PatientHealthRecordDetail::whereId($request->id)->update([
            'vitals_id' => $request->vital,
            ]);

        return redirect()->route('patient.patientall_detail',$request->patient_id)->with('success','Vitals Updated successfully.')->with('vitals','Vitals Updated');
    }

    public function delete($id) {
        try{
            $patient_count = PatientDetail::select('id')->where('patient_id',$id)->count();
            $patient_contact_count = PatientFamilyContact::select('id')->where('patient_id',$id)->count();
            $patient_health_record_count = PatientHealthRecordDetail::select('id')->where('patient_id',$id)->count();
            $patient_health_plan_count = PatientHealthPlan::select('id')->where('patient_id',$id)->count();
            $patient_wallet_count = PatientWalletDetail::select('id')->where('patient_id',$id)->count();
            $patient_health_history_count = PatientHealthHistory::select('id')->where('patient_id',$id)->count();
            $patient_health_history_count = PatientHealthHistory::select('id')->where('patient_id',$id)->count();
            $patient_family_health_history_count = PatientFamilyHealthHistory::select('id')->where('patient_id',$id)->count();
            $patient_past_health_history_count = PatientPastHealthHistory::select('id')->where('patient_id',$id)->count();
            $patient_past_history_count = PatientPastHistory::select('id')->where('patient_id',$id)->count();
            $patient_health_team_count = HealthTeam::select('id')->where('patient_id',$id)->count();
            $chat_history_count = Chathistory::select('id')->where('patient_id',$id)->count();
            $location_count = UserLocation::where('user_id',$id)->count();
            $lab_report_count = PatientLabDetail::where('patient_id',$id)->count();

            $appointment = Appointments::where('patient_id',$id)->count();

            if($appointment > 0){
                $patient = Appointments::select('id')->where('patient_id',$id)->first();
                Appointments::where('id',@$patient->id)->delete();
            }

            if($patient_count > 0){
                $patient = PatientDetail::select('id')->where('patient_id',$id)->first();
                PatientDetail::where('id',@$patient->id)->delete();
            }

            if($patient_contact_count > 0)
            {
                $patient_family = PatientFamilyContact::select('id')->where('patient_id',$id)->first();
                PatientFamilyContact::where('id',@$patient_family->id)->delete();
            }

            if($patient_health_record_count > 0)
            {
                $patient_health_record = PatientHealthRecordDetail::select('id')->where('patient_id',$id)->first();
                PatientHealthRecordDetail::where('id',$patient_health_record->id)->delete();
            }

            if($patient_health_plan_count > 0)
            {
                $patient_health_plan = PatientHealthPlan::select('id')->where('patient_id',$id)->first();
                PatientHealthPlan::where('id',$patient_health_plan->id)->delete();
            }

            if($patient_wallet_count > 0)
            {
                $patient_wallet = PatientWalletDetail::select('id')->where('patient_id',$id)->first();
                PatientWalletDetail::where('id',$patient_wallet->id)->delete();
            }

            if($patient_health_history_count > 0)
            {
                $patient_health_history = PatientHealthHistory::select('id')->where('patient_id',$id)->first();
                PatientHealthHistory::where('id',$patient_health_history->id)->delete();
            }

            if($patient_family_health_history_count > 0)
            {
                $patient_family_health_history = PatientFamilyHealthHistory::select('id')->where('patient_id',$id)->first();
                PatientFamilyHealthHistory::where('id',$patient_family_health_history->id)->delete();
            }

            if($patient_past_health_history_count > 0)
            {
                $patient_past_health_history = PatientPastHealthHistory::select('id')->where('patient_id',$id)->first();
                PatientPastHealthHistory::where('id',$patient_past_health_history->id)->delete();
            }

            if($patient_past_history_count > 0)
            {
                $patient_past_history = PatientPastHistory::select('id')->where('patient_id',$id)->first();
                PatientPastHistory::where('id',$patient_past_history->id)->delete();
            }

            if($patient_health_team_count > 0)
            {
                $patient_health_team = HealthTeam::select('id')->where('patient_id',$id)->first();
                HealthTeam::where('id',@$patient_health_team->id)->delete();
            }

            if($chat_history_count > 0)
            {
                $chat_history = Chathistory::select('id')->where('patient_id',$id)->first();
                Chathistory::where('id',@$chat_history->id)->delete();
            }
            if($location_count > 0)
            {
                $location = UserLocation::select('id')->where('user_id',$id)->first();
                UserLocation::where('id', $location->id)->delete();
            }
            if($lab_report_count > 0)
            {
                // $lab_report = PatientLabDetail::select('id')->where('patient_id',$id)->get();
                // foreach ($lab_report as $l) {
                PatientLabDetail::where('patient_id', $id)->delete();
                // }
            }


            User::where('id', $id)->delete();
            return redirect()->route('patient.viewall_patient')->with('success', 'Patient deleted successfully');
        }catch (\Illuminate\Database\QueryException $exc) {
            return redirect()->route('patient.viewall_patient')->with('danger', 'Patient deleted failed');
        }
    }

    public function createpdf($id) {
        try{

            $patient_detail = DB::table('users')
                            ->select('users.fname','users.email','users.contact_number','patient_detail.gender','patient_detail.dob','patient_detail.marital_status','patient_detail.height','patient_detail.weight','patient_detail.bmi','city.city','patient_detail.blood_group','patient_detail.profile_pic','master_health_plan.plan_name',DB::raw('master_health_plan.price as plan_price'),'master_health_plan.one_line_description','patient_health_plan.in_pay')
                            ->leftjoin('patient_detail','users.id','patient_detail.patient_id')
                            ->leftjoin('city','patient_detail.city','city.id')
                            ->leftjoin('patient_health_plan','users.id','patient_health_plan.patient_id')
                            ->leftjoin('master_health_plan','patient_health_plan.plan_id','master_health_plan.id')
                            ->where('users.id',$id)
                            ->first();

            $patient_health_team = HealthTeam::where('patient_id',$id)->orderby('id','asc')->get()->toArray();
            $patient_family_contact = PatientFamilyContact::select('member_name','relation','contact_number')->where('patient_id',$id)->orderby('id','desc')->get()->toArray();

            $patient_health_history = PatientHealthHistory::select('problem_id','smoking','alcohol_drinking','allergies')->where('patient_id',$id)->get()->toArray();

            $patient_health_history_family = PatientFamilyHealthHistory::select('problem_id')->where('patient_id',$id)->get()->toArray();
            $patient_health_history_past = PatientPastHealthHistory::select('problem_id')->where('patient_id',$id)->get()->toArray();
            $patient_health_record = PatientHealthRecordDetail::select('add_date','blood_pressure_min_value','blood_pressure_max_value','pluse','temperature','oxygen_saturation','breathing_rate','abdominal_circumference','blood_sugar','weight','height','bmi')->where('patient_id',$id)->get()->toArray();

            $patient_lab_detail = DB::table('patient_lab_detail')
                                ->select(DB::raw('users.fname as coach_name'),'lab_report.test_name','patient_lab_detail.test_date','patient_lab_detail.value','patient_lab_detail.unit','patient_lab_detail.result')
                                ->leftjoin('lab_report','patient_lab_detail.test_name','lab_report.id')
                                ->leftjoin('users','patient_lab_detail.coach_id','users.id')
                                ->where('patient_lab_detail.patient_id',$id)
                                ->get()
                                ->toArray();
            //dd($patient_lab_detail);
            $patient_past_history = PatientPastHistory::where('patient_id',$id)->get()->toArray();

            $patient_prescrition = DB::table('patient_priscription')
                                ->select('patient_priscription.id','patient_priscription.medicine_name','patient_priscription.dose','patient_priscription.freq','patient_priscription.route','patient_priscription.duration','users.fname')
                                ->leftjoin('users','patient_priscription.doctor_id','users.id')
                                ->where('patient_priscription.patient_id',$id)
                                ->get();

            $patient_procedure = DB::table('patient_procedure')
                                ->select('patient_procedure.procedure_name','patient_procedure.procedure_date','patient_procedure.remark','users.fname')
                                ->leftjoin('users','patient_procedure.coach_id','users.id')
                                ->where('patient_procedure.patient_id',$id)
                                ->get();

            $data = [
                'title' => $patient_detail->fname,
                'name' => $patient_detail->fname,
                'email' => $patient_detail->email,
                'contact_number' => $patient_detail->contact_number,
                'gender' => $patient_detail->gender,
                'dob' => $patient_detail->dob,
                'marital_status' => $patient_detail->marital_status,
                'city' => $patient_detail->city,
                'height' => $patient_detail->height,
                'weight' => $patient_detail->weight,
                'bmi' => $patient_detail->bmi,
                'blood_group' => $patient_detail->blood_group,
                'profile_pic' => $patient_detail->profile_pic,
                'plan_name' => $patient_detail->plan_name,
                'plan_price' => $patient_detail->plan_price,
                'one_line_description' => $patient_detail->one_line_description,
                'in_pay' => $patient_detail->in_pay,
                'family_contact' => $patient_family_contact,
                'health_history' => $patient_health_history,
                'health_history_family' => $patient_health_history_family,
                'health_history_past' => $patient_health_history_past,
                'health_record' => $patient_health_record,
                'lab_report' => $patient_lab_detail,
                'past_history' => $patient_past_history,
                'health_team' => $patient_health_team,
                'patient_prescrition' => $patient_prescrition,
                'patient_procedure' => $patient_procedure
            ];

            $pdf = PDF::loadView('admin/patientpdf', $data);
            $pdf->setPaper('A4', 'landscape');
            return $pdf->download(ucfirst($patient_detail->fname).'.pdf');
        }catch (\Illuminate\Database\QueryException $exc) {
            return redirect()->route('patient.viewall_patient');
        }

    }

}
