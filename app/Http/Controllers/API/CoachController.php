<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Plivo\RestClient;
use Validator;
use App\User;
use App\Reminder;
use App\HealthTeam;
use App\PatientDiagnosis;
use App\DiagnosisMaster;
use Illuminate\Support\Facades\Storage;

class CoachController extends Controller {

    public function coachpatientlist(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'coach_id.required' => 'Coach Id is required.',
                ];
                $validator = Validator::make($request->all(), [
                            'coach_id' => 'required|integer',
                                ], $messages);

                $errors = $validator->errors();
                if ($validator->fails()) {
                    $response = array(
                                "data" => $errors,
                                "error_code" => 1,
                                "message" => 'Please fill all data' 
                            );
                    return response()->json($response);
                    exit;
                }

            $coachpatient_count = HealthTeam::where('coach_id',$request->coach_id)->count();
            // $doctorpatient = HealthTeam::where('doctor_id',$request->doctor_id)->get();

            if($coachpatient_count)
            {
                $coachpatient = DB::table('health_team')
                    ->select('users.id', 'users.fname','users.contact_number','city.city','patient_detail.dob','patient_detail.profile_pic','patient_detail.gender')
                    ->leftjoin('users', 'health_team.patient_id', '=', 'users.id')
                    ->leftjoin('patient_detail', 'health_team.patient_id', '=', 'patient_detail.patient_id')
                    ->leftjoin('city', 'patient_detail.city', '=', 'city.id')
                    ->where('health_team.coach_id', $request->coach_id)
                    ->get();

                    foreach ($coachpatient as $value) {
                        $value = (array) $value;

                        $patient_diagnosis = PatientDiagnosis::select('id','diagnosis','year')->where('patient_id',$value['id'])->get()->toArray();
$dateOfBirth = date("d-m-Y", strtotime($value['dob']));
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
//$diff->format('%y')
                        $response_data = array(
                            'id' => $value['id'],
                            'fname' => $value['fname'],
                            'contact_number' => $value['contact_number'],
                            'city' => $value['city'],
                            'dob' => $diff->format('%y'),
                            'profile_pic' => $value['profile_pic'],
                            'gender' => $value['gender'],
                            'diagnosis' => $patient_diagnosis
                        );

                        $coachpatientlist[] = $response_data;
                    } 

                 $coachpatient = array_map("unserialize", array_unique(array_map("serialize", $coachpatientlist)));

                    
                $response = array(
                    "data" => $coachpatient,
                    "error_code" => 0,
                    "message" => $coachpatient_count.' patient available' 
                );
            }
            else
            {
                $response = array(
                    "data" => [],
                    "error_code" => 1,
                    "message" => 'No patient available' 
                );
            }
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => [],
                    "error_code" => 1,
                    "message" => 'No record Found' 
                );
        }
    return response()->json($response);
    }

    public function addreminder(Request $request)
    {
        try{

            $messages = [
                    'required' => ':attribute is required.',
                    'coach_id' => 'Coach id is requuired',
                    'patient_id.required' => 'Patient Id is requuired.',
                    'reminder_text.required' => 'Reminder Text is requuired.',
                    'reminder_date.required' => 'Reminder Date is requuired.',
                    'reminder_time.required' => 'Reminder Time is requuired.',
                ];
                $validator = Validator::make($request->all(), [
                            'patient_id' => 'required|integer',
                            'coach_id' => 'required|integer',
                            'reminder_text' => 'required',
                            'reminder_date' => 'required',
                            'reminder_time' => 'required',
                        ], $messages);

                $errors = $validator->errors();
                if ($validator->fails()) {
                    $response = array(
                                "data" => $errors,
                                "error_code" => 1,
                                "message" => 'Please fill all data' 
                            );
                    return response()->json($response);
                    exit;
                }

            $reminder = new Reminder;
            $reminder->patient_id = $request->patient_id;
            $reminder->coach_id = $request->coach_id;
            $reminder->reminder_text = $request->reminder_text;
            $reminder->reminder_time = $request->reminder_time;
            $reminder->reminder_date = $request->reminder_date;
            $reminder->save();

            $response = array(
                "data" => $reminder,
                "error_code" => 0,
                "message" => 'Reminder added' 
            );
        }catch (\Illuminate\Database\QueryException $exc) {
            $response = array(
                    "data" => '',
                    "error_code" => 1,
                    "message" => 'reminer added failed' 
                );
        }
    return response()->json($response);
    }
    
    public function get_diagnosislist(Request $request)
    {
    
        // $type=request('type');

        // if($type=='other')
        // {
        //     $DiagnosisMaster = new DiagnosisMaster;
        //     $DiagnosisMaster->name =request('name');
        //     $DiagnosisMaster->save();

        //     $DiagnosisMaster=DiagnosisMaster::all();
        // }
        // else
        // {
        //     $DiagnosisMaster=DiagnosisMaster::all();
        // }
        
        $DiagnosisMaster=DiagnosisMaster::all();
        $response = array(
                "data" => $DiagnosisMaster,
                "error_code" => 0,
                "message" => 'Diagnosis added' 
            );

         return response()->json($response);


    }

}
