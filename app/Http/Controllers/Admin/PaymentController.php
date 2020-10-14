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
use App\Doctor;
use App\DoctorDetail;
use App\Role;
use App\HealthTeam;
use App\DoctorBankDetail;
use App\DoctorBalance;
use App\DoctorSpecialitySelect;
use App\PatientWalletDetail;

use App\UserLocation;
use App\AdminNotification;
use App\Clinic;
use App\Poc;
use App\City;
use Auth;
use App\Experties;
use App\Panelists;
use App\Admin_manager;
use App\User;
use App\PatientDetail;
use App\PatientHealthRecordDetail;
use App\PatientProcedure;
use App\PatientLabDetail;

use App\Callhistory;
use PDF;
use App\Helpers\Notification\PushNotification;
use Illuminate\Support\Facades\Storage;
use Config;

class PaymentController extends Controller {
    
    public function index(Request $request){
        return view('admin.all_payment');
    }
    
    public function refundrequest(Request $request){
        return view('admin.all_payment_refund');
    }
    
    public function refund($call_history_id,$status){
        $callhistory=Callhistory::
        select('call_history.*','patient.fname as patientname','doctor.fname as doctorname')
        ->leftjoin("users as patient","call_history.patient_id","patient.id")
        ->leftjoin("users as doctor","call_history.doctor_id","doctor.id")
        ->where('call_history.id',$call_history_id)
        ->first();
        
        $DoctorBalanceCheck=DoctorBalance::where('doctor_id',$callhistory
        ->doctor_id)
        ->orderby('id','DESC')
        ->first();
        $PatientWalletDetailCheck=PatientWalletDetail::where('patient_id',$callhistory
        ->patient_id)
        ->orderby('id','DESC')
        ->first();
        
        //dd($DoctorBalanceCheck->total_amount."+".$callhistory->refund_amount);
        //Doctor has No Money
        if($DoctorBalanceCheck->total_amount < $callhistory->refund_amount){
            return redirect()->route('admin.payment.refund')->withErrors('Doctor Balance Less');
        }
        
        $RefundAmount = $callhistory->refund_amount;
        $PatientTotal = $PatientWalletDetailCheck->total_amount+$RefundAmount;
        $DoctorTotal = $DoctorBalanceCheck->total_amount-$RefundAmount;
        
        $DoctorOnline = $DoctorBalanceCheck->total_amount-$RefundAmount;
        $DoctorOffline = 0;
        
        $patientwallet = new PatientWalletDetail;
        $patientwallet->patient_id = $callhistory
        ->patient_id;
        $patientwallet->credit_amount = $RefundAmount;
        $patientwallet->debit_amount = 0;
        $patientwallet->total_amount = isset($PatientTotal)?$PatientTotal:0;
        $patientwallet->amount_description ='Refund Amount Credit By '.$callhistory->doctorname.'.';
        
        $patientwallet->save();
            /*
            if(isset($DoctorBalance)){
                DoctorBalance::where('id',$DoctorBalance->id)->update(['total_amount'=>$DoctorTotal]);    
            }
            
            $doctorbalance = new DoctorBalance;
            $doctorbalance->call_history_id = $call_history_id;
            $doctorbalance->total_amount = $DoctorTotal;
            $doctorbalance->online_amount = $DoctorOnline;
            $doctorbalance->offline_amount = $DoctorOffline;
            $doctorbalance->amount_description = "Refund Amount To ".$callhistory->patientname;
            $doctorbalance->save();
            */
        

        Callhistory::whereId($call_history_id)->update([
        'refund_status' => $status,
        'refund_amount' => 0,
        ]);
        
        if($status == 1)
        {
            $msg = 'No Refund Request';
        }
        elseif($status == 0)
        {
            $msg = 'Refund Request';
        }
        return redirect()->route('admin.payment.refund')->with('success',$msg.' successfully.');
    }
    
    public function paymentrefundarray(Request $request) {
        $response = [];

        $data = 
        Callhistory::
        select(
            'call_history.id', 'call_history.patient_id', 'call_history.doctor_id',  'call_history.calling_time','call_history.refund_status','call_history.refund_amount', 'call_history.created_at',
            'patient.fname as patientname',
            'doctor.fname as doctorname'
        )
        ->leftjoin("users as patient","call_history.patient_id","patient.id")
        ->leftjoin("users as doctor","call_history.doctor_id","doctor.id")
        ->where("call_history.refund_status",1)
        ->orderby('call_history.created_at','DESC')
        ->get();

        $data = $data->toArray();
        foreach ($data as $pointofcare) {
            $sub = [];
            $id = $pointofcare['id'];
            $sub[] = $id;
            $sub[] = $pointofcare['patientname'];
            $sub[] = $pointofcare['doctorname'];
            $sub[] = $pointofcare['calling_time'];
            $sub[] = $pointofcare['refund_amount'];
            $sub[] = $pointofcare['refund_amount'];
            $sub[] = date("d-m-Y H:i:s",strtotime($pointofcare['created_at']));
            
            if(Session::get('admin_role') != 7){
              if($pointofcare['refund_status'] == 0)
              {
                  $sub[] = '<a  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">No Refund Request</label></a>' . ' ';
              }
              elseif($pointofcare['refund_status'] == 1)
              {
                  $verified_url = route('payment.refund', array($id, 0));
                  $sub[] = '<a   onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to Refund Request accept ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Refund Request</label></a>' . ' ';
              }
              /*    
              $delete_url1 = route("poc.deletepoc", $id);

              if (Session::get('admin_role')==1) {
                  $action = '<a href="' . route('poc.editpoc', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                  $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url1 . '`,`Are you sure you want to delete this POC ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
              } else {
                  $action = '<a href="' . route('poc.editpoc', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
              }
              $sub[] = $action;
              */
          }
            $sub[] = $response[] = $sub;
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }
    
    public function paymentarray(Request $request) {
        $response = [];

        $data = 
        Callhistory::
        select(
            'call_history.id', 'call_history.patient_id', 'call_history.doctor_id',  'call_history.calling_time','call_history.refund_status','call_history.refund_amount', 'call_history.created_at',
            'patient.fname as patientname',
            'doctor.fname as doctorname'
        )
        ->leftjoin("users as patient","call_history.patient_id","patient.id")
        ->leftjoin("users as doctor","call_history.doctor_id","doctor.id")
        ->orderby('call_history.created_at','DESC')
        ->get();

        $data = $data->toArray();
        foreach ($data as $pointofcare) {
            $sub = [];
            $id = $pointofcare['id'];
            $sub[] = $id;
            $sub[] = $pointofcare['patientname'];
            $sub[] = $pointofcare['doctorname'];
            $sub[] = $pointofcare['calling_time'];
            $sub[] = $pointofcare['refund_amount'];
            $sub[] = $pointofcare['refund_amount'];
            $sub[] = date("d-m-Y H:i:s",strtotime($pointofcare['created_at']));
            
            if(Session::get('admin_role') != 7){
              if($pointofcare['refund_status'] == 0)
              {
                  $sub[] = '<a  href="#"><label class="label label-success" data-toggle="tooltip" title="click here to inactive">No Refund Request</label></a>' . ' ';
              }
              elseif($pointofcare['refund_status'] == 1)
              {
                  $verified_url = route('payment.refund', array($id, 0));
                  $sub[] = '<a   onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to Refund Request accept ?`)"  href="#"><label class="label label-danger" data-toggle="tooltip" title="click here to active">Refund Request</label></a>' . ' ';
              }
              /*    
              $delete_url1 = route("poc.deletepoc", $id);

              if (Session::get('admin_role')==1) {
                  $action = '<a href="' . route('poc.editpoc', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
                  $action .= '<a style="color:red" onclick="return confirm(`' . $delete_url1 . '`,`Are you sure you want to delete this POC ?`)"  href="#"><i class="fa fa-trash"></i>&nbsp;</a>';
              } else {
                  $action = '<a href="' . route('poc.editpoc', $id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . ' ';
              }
              $sub[] = $action;
              */
          }
            $sub[] = $response[] = $sub;
        }
        $userjson = json_encode(["data" => $response]);
        echo $userjson;
    }
    
}