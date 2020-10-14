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
/**
 *
 */
class PaymentController extends Controller
{
    
}