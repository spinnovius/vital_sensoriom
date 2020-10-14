<?php

use Illuminate\Http\Request;

Route::post('login', 'API\AdminController@login');
Route::post('logout', 'API\AdminController@logout');
Route::post('notification', 'API\ConfigurationController@demo_notification');

Route::post('forgotpassword', 'API\AdminController@forgotpassword');
Route::post('mobileverification', 'API\AdminController@mobileverification');
Route::post('register', 'API\AdminController@register');
Route::post('city', 'API\ConfigurationController@getallcity');
Route::post('speciality', 'API\ConfigurationController@getallspeciality');
Route::post('authoritycouncil', 'API\ConfigurationController@getallauthoritycouncil');

Route::post('base64_image', 'API\AdminController@base64_image_demo');
Route::post('multipart_image_demo', 'API\AdminController@multipart_image_demo');

Route::middleware('auth:api')->group(function(){
Route::post('changepassword', 'API\AdminController@changepassword');
Route::post('updateuserlocation', 'API\AdminController@userlocation');	
Route::post('userprofile', 'API\AdminController@userprofile');	
Route::post('profilepic', 'API\AdminController@profile_pic');	

Route::post('problemslist', 'API\PatientController@problemlist');	
Route::post('getalldoctor', 'API\PatientController@alldoctor');	
Route::post('getallcoach', 'API\PatientController@allcoach');	
Route::post('getallhospital', 'API\PatientController@allhospital');	
Route::post('patienthealthteam', 'API\PatientController@patienthealthteam');
Route::post('patientcityhealthteam', 'API\PatientController@patientcityhealthteam');
Route::post('addpatienthealthteam', 'API\PatientController@addpatienthealthteam');
Route::post('availabledoctors', 'API\PatientController@availabledoctors');
Route::post('patientfamilycontact', 'API\PatientController@familycontact');
Route::post('addpatientfamilycontact', 'API\PatientController@addfamilycontact');
Route::post('deletepatientfamilycontact', 'API\PatientController@deletefamilycontact');
Route::post('patienthealthhistoryfamily', 'API\PatientController@patienthealthhistoryfamily');
// Route::post('patienthealthhistoryfamily', 'API\PatientController@patienthealthhistoryfamily');
Route::post('getallpatienthealthhistoryfamily', 'API\PatientController@getallhealthhistoryfamily');
Route::post('patienthealthhistorypast', 'API\PatientController@patienthealthhistorypast');
Route::post('patientpasthistory', 'API\PatientController@patientpasthistory');
Route::post('patienthealthhistory', 'API\PatientController@patienthealthhistory');
Route::post('getallpatienthealthhistory', 'API\PatientController@getallpatienthealthhistory');
Route::post('patienthealthrecords', 'API\PatientController@patienthealthrecords');
Route::post('patienthealthsubscriptionplan', 'API\PatientController@patientsubscriptionplan');
Route::post('savepatienthealthsubscriptionplan', 'API\PatientController@savepatientsubscriptionplan');
Route::post('purchasedpatienthealthsubscriptionplan', 'API\PatientController@purchasedpatienthealthsubscriptionplan');
Route::post('addpatienthealthrecords', 'API\PatientController@addpatienthealthrecords');
Route::post('deleteallergies', 'API\PatientController@deleteallergies');
Route::post('addpatientwallete', 'API\PatientController@addpatientwallete');
Route::post('getallpriscription', 'API\PatientController@getallpriscription');
Route::post('deleteprescription', 'API\PatientController@deleteprescription');
Route::post('getallvitalsdetailsgraph', 'API\PatientController@getallvitalsdetail');
Route::post('getalllabdetailsgraph', 'API\PatientController@getalllabreportdetail');
Route::post('getalllabdetailsdropdown', 'API\PatientController@getalllabdetailsdropdown');
Route::post('getallpatientproceduredetail', 'API\PatientController@getallpatientproceduredetail');

Route::post('doctorbankdetail', 'API\DoctorController@doctorbankdetail');
Route::post('adddoctorbankdetail', 'API\DoctorController@adddoctorbankdetail');
Route::post('doctorpatientlist', 'API\DoctorController@doctorpatientlist');
Route::post('doctorstatus', 'API\DoctorController@doctorchangestatus');
Route::post('allpatienthealthhistory', 'API\DoctorController@patienthealthhistory');
Route::post('patientallhealthrecords', 'API\DoctorController@patientallhealthrecords');
Route::post('getallpatientpriscription', 'API\DoctorController@getallpatientpriscription');
Route::post('addpatientpriscription', 'API\DoctorController@addpatientpriscription');
Route::post('adddoctorbalancedetail', 'API\DoctorController@adddoctorbalancedetail');
Route::post('deletediagnosis', 'API\DoctorController@deletediagnosis');
Route::post('changeprice', 'API\DoctorController@changeprice');
Route::post('doctorbalancehistory', 'API\DoctorController@doctorbalancehistory');

Route::post('coachpatientlist', 'API\CoachController@coachpatientlist');
Route::post('addreminder', 'API\CoachController@addreminder');

Route::post('allgetfaq', 'API\ConfigurationController@getallfaq');
Route::post('nearbydoctorlist', 'API\ConfigurationController@getallnearbydoctor');
Route::post('addchathistory', 'API\ConfigurationController@addchathistory');
Route::post('getchathistory', 'API\ConfigurationController@getchathistory');
Route::post('getalladmincontact', 'API\ConfigurationController@getadmincontact');
Route::post('callpaymentstatus', 'API\ConfigurationController@callpaymentstatus');
Route::post('addcallhistory', 'API\ConfigurationController@addcallhistory');
Route::post('pastteleconsultantpatientlist', 'API\ConfigurationController@pastteleconsultantpatientlist');
Route::post('getallreportname', 'API\ConfigurationController@getallreportname');
Route::post('addpatientlabreportdetail', 'API\ConfigurationController@addpatientlabreportdetail');
Route::post('getallunit', 'API\ConfigurationController@getallunit');
Route::post('getallprocedurename', 'API\ConfigurationController@getallprocedure');
Route::post('addpatientproceduredetail', 'API\ConfigurationController@addpatientproceduredetail');
Route::post('getallreminder', 'API\ConfigurationController@getallreminder');
Route::post('getallreminderforcoach', 'API\ConfigurationController@getallreminderforcoach');
Route::post('getallnotification', 'API\ConfigurationController@getallnotification');


});
