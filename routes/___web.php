<?php


Route::group(array('domain' => '{user}.innoviussoftware.com'), function() {
    // Place your routes in here, like for example
    Route::get('/', function ($user) {
        return $user;
    });
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


Route::get('/', function () {
    // return view('welcome');


    return redirect()->route('admin.index');
});

Route::get('plan', 'Admin\AdminController@check_plan_status');

Route::get('admin', 'Admin\AdminController@index')->name('admin.index');
Route::post('admin/login', 'Admin\AdminController@login')->name('admin.login');
Route::get('admin/account/logout', 'Admin\AdminController@logout')->name('admin.logout');
// Route::post('admin/reset/store/email', 'Admin\AdminController@reset_store_email')->name('admin.reset.store_email');
Route::group(['middleware' => 'CheckDoctor'], function() {
	Route::get('admin_maindoctor','Admin_main\AdminmainController@dashboard')->name('admin_maindoctor.dashboard');
});
/*Admin Main*/
Route::group(['middleware' => ['CheckAuthClinic']], function() {

Route::get('admin_main','Admin_main\AdminmainController@dashboard')->name('admin_main.dashboard');
Route::get('add_patient','Admin_main\AdminmainController@addpatient')->name('admin_main.addpatient');
Route::post('store_patient','Admin_main\AdminmainController@patientstore')->name('admin_main.store_patient');
Route::get('all_patient','Admin_main\AdminmainController@allpatient')->name('admin_main.allpatient');
Route::get('admin/patient/patientarray', 'Admin_main\AdminmainController@patientsarray')->name('store_patient.patientarray');
Route::get('admin/patient/edit/{id}', 'Admin_main\AdminmainController@edit')->name('store_patient.edit');
Route::patch('admin/patient/update', 'Admin_main\AdminmainController@update')->name('store_patient.update');
Route::get('admin/patient/deletepatient/{id}', 'Admin_main\AdminmainController@deletepatient')->name('store_patient.deletepatient');
Route::post('admin/patient_share_doctor','Admin_main\AdminmainController@patientsharedoctor')->name('admin_main.patientsharedoctor');


Route::get('hospital/byCity/{city_id}', 'Admin_main\AdminmainController@hospitalByCityid')->name('hostipal.bycity');
Route::get('doctor/bySpeciality/{speciality_id}/{city_id}', 'Admin_main\AdminmainController@doctorBySpeciality')->name('doctor.bySpeciality');

// HOPI
Route::get('/patient/{id}/hopi', 'Admin_main\AdminmainController@indexHopi')->name('admin_main.hopiindex');
Route::get('/patient/{society_id}/hopiadd', 'Admin_main\AdminmainController@addHopi')->name(
	'admin_main.hopiadd');
Route::post('/patient/{society_id}/hopi/store', 'Admin_main\AdminmainController@storeHopi')->name('admin_main.hopistore');
Route::get('/patient/{society_id}/hopi/edit/{hopi}', 'Admin_main\AdminmainController@editHopi')->name('admin_main.hopiedit');
Route::patch('/patient/{society_id}/hopi/update/{hopi}', 'Admin_main\AdminmainController@updateHopi')->name('admin_main.hopiupdate');
Route::get('/patient/{society_id}/delete/hopi/{hopi}', 'Admin_main\AdminmainController@deleteHopi')->name('admin_main.hopidelete');
Route::get('/patient/gethopi', 'Admin_main\AdminmainController@getHopi')->name('admin_main.Hopiget');
Route::get('/patient/getHopicomorbidities', 'Admin_main\AdminmainController@getHopicomorbidities')->name('admin_main.Hopigetcomorbidities');

// General Examination
Route::get('/patient/{id}/ge', 'Admin_main\AdminmainController@indexGeneral')->name('admin_main.geindex');
Route::get('/patient/{society_id}/geadd', 'Admin_main\AdminmainController@addGeneral')->name(
	'admin_main.geadd');
Route::post('/patient/{society_id}/ge/store', 'Admin_main\AdminmainController@storeGeneral')->name('admin_main.gestore');
Route::get('/patient/{society_id}/ge/edit/{ge}', 'Admin_main\AdminmainController@editGeneral')->name('admin_main.geedit');
Route::patch('/patient/{society_id}/ge/update/{ge}', 'Admin_main\AdminmainController@updateGeneral')->name('admin_main.geupdate');
Route::get('/patient/{society_id}/delete/ge/{ge}', 'Admin_main\AdminmainController@deleteGeneral')->name('admin_main.gedelete');

//Systemic Examination
Route::get('/patient/{id}/se', 'Admin_main\AdminmainController@indexSystem')->name(
	'admin_main.seindex');
Route::get('/patient/{society_id}/seadd', 'Admin_main\AdminmainController@addSystem')->name(
	'admin_main.seadd');
Route::post('/patient/{society_id}/se/store', 'Admin_main\AdminmainController@storeSystem')->name('admin_main.sestore');
Route::get('/patient/{society_id}/se/edit/{se}', 'Admin_main\AdminmainController@editSystem')->name('admin_main.seedit');
Route::patch('/patient/{society_id}/se/update/{se}', 'Admin_main\AdminmainController@updateSystem')->name('admin_main.seupdate');
Route::get('/patient/{society_id}/delete/se/{se}', 'Admin_main\AdminmainController@deleteSystem')->name('admin_main.sedelete');

//Advice Treatment
Route::get('/patient/{id}/at', 'Admin_main\AdminmainController@indexAdviceTreatment')->name(
	'admin_main.atindex');
Route::get('/patient/{society_id}/atadd', 'Admin_main\AdminmainController@addAdviceTreatment')->name(
	'admin_main.atadd');
Route::post('/patient/{society_id}/at/store', 'Admin_main\AdminmainController@storeAdviceTreatment')->name('admin_main.atstore');
Route::get('/patient/{society_id}/at/edit/{at}', 'Admin_main\AdminmainController@editAdviceTreatment')->name('admin_main.atedit');
Route::patch('/patient/{society_id}/at/update/{at}', 'Admin_main\AdminmainController@updateAdviceTreatment')->name('admin_main.atupdate');
Route::get('/patient/{society_id}/delete/at/{at}', 'Admin_main\AdminmainController@deleteAdviceTreatment')->name('admin_main.atdelete');

//Prescription
Route::get('/patient/{id}/pp', 'Admin_main\AdminmainController@indexPrescription')->name('admin_main.ppindex');
Route::get('/patient/{society_id}/ppadd', 'Admin_main\AdminmainController@addPrescription')->name(
	'admin_main.ppadd');
Route::post('/patient/{society_id}/pp/store', 'Admin_main\AdminmainController@storePrescription')->name('admin_main.ppstore');
Route::get('/patient/{society_id}/pp/edit/{pp}', 'Admin_main\AdminmainController@editPrescription')->name('admin_main.ppedit');
Route::patch('/patient/{society_id}/pp/update/{pp}', 'Admin_main\AdminmainController@updatePrescription')->name('admin_main.ppupdate');
Route::get('/patient/{society_id}/delete/pp/{pp}', 'Admin_main\AdminmainController@deletePrescription')->name('admin_main.ppdelete');

//Advice Treatment



Route::get('/patient/{id}/labtest', 'Admin_main\AdminmainController@indexLabtests')->name('admin_main.labtestindex');
Route::get('/patient/{society_id}/labtestadd', 'Admin_main\AdminmainController@addLabtests')->name(
	'admin_main.labtestadd');
Route::post('/patient/{society_id}/labtest/store', 'Admin_main\AdminmainController@storeLabtests')->name('admin_main.labteststore');
Route::get('/patient/{society_id}/labtest/edit/{labtest}', 'Admin_main\AdminmainController@editLabtests')->name('admin_main.labtestedit');
Route::patch('/patient/{society_id}/labtest/update/{labtest}', 'Admin_main\AdminmainController@updateLabtests')->name('admin_main.labtestupdate');
Route::get('/patient/{society_id}/delete/labtest/{labtest}', 'Admin_main\AdminmainController@deleteLabtests')->name('admin_main.labtestdelete');


Route::get('/patient/{id}/vitals', 'Admin_main\AdminmainController@indexVitals')->name(
	'admin_main.vitalsindex');
Route::get('/patient/{society_id}/vitalsadd', 'Admin_main\AdminmainController@addVitals')->name(
	'admin_main.vitalsadd');
Route::post('/patient/{society_id}/vitals/store', 'Admin_main\AdminmainController@storeVitals')->name('admin_main.vitalsstore');
Route::get('/patient/{society_id}/vitals/edit/{vital}', 'Admin_main\AdminmainController@editVitals')->name('admin_main.vitalsedit');
Route::patch('/patient/{society_id}/vitals/update/{vital}', 'Admin_main\AdminmainController@updateVitals')->name('admin_main.vitalsupdate');
Route::get('/patient/{society_id}/delete/vitals/{vital}', 'Admin_main\AdminmainController@deleteVitals')->name('admin_main.vitalsdelete');


Route::get('/patient/{id}/procedure', 'Admin_main\AdminmainController@indexProcedure')->name('admin_main.procedureindex');
Route::get('/patient/{society_id}/procedureadd', 'Admin_main\AdminmainController@addProcedure')->name(
	'admin_main.procedurseadd');
Route::post('/patient/{society_id}/procedure/store', 'Admin_main\AdminmainController@storeProcedure')->name('admin_main.procedurestore');
Route::get('/patient/{society_id}/delete/procedure/{id}', 'Admin_main\AdminmainController@deleteProcedure')->name('admin_main.proceduredelete');
Route::get('/patient/{society_id}/procedure/edit/{id}', 'Admin_main\AdminmainController@editProcedure')->name('admin_main.procedureedit');
Route::patch('/patient/{society_id}/procedure/update/{id}', 'Admin_main\AdminmainController@updateProcedure')->name('admin_main.procedureupdate');

Route::get('add_doctor','Admin_main\AdminmainController@add_doctor')->name('admin_main.add_doctor');
Route::get('all_doctor','Admin_main\AdminmainController@all_doctor')->name('admin_main.all_doctor');
Route::post('store_doctor','Admin_main\AdminmainController@storedoctor')->name('admin_main.store_doctor');
Route::get('admin/doctor/ajax/doctorsarray', 'Admin_main\AdminmainController@doctorsarray')->name('doctor.ajax.doctorsarray');
Route::get('admin/doctor/verifieddoctor/{id}/{status}', 'Admin_main\AdminmainController@verifieddoctor')->name('doctor.verifieddoctor');
Route::get('admin/doctor/editdoctors/{id}', 'Admin_main\AdminmainController@editdoctors')->name('doctor.editdoctors');
Route::patch('admin/doctor/updatedotors', 'Admin_main\AdminmainController@updatedotors')->name('doctor.updatedotors');
Route::get('admin/doctor/deletedoctors/{id}', 'Admin_main\AdminmainController@deletedoctors')->name('doctor.deletedoctors');

Route::get('upcomingappointment','Admin_main\AdminmainController@upcomingappointmentlist')->name('admin_main.upcomingappointment');
Route::get('pendingappointment','Admin_main\AdminmainController@pendingappointmentlist')->name('admin_main.pendingappointment');
Route::get('cancelappointment','Admin_main\AdminmainController@cancelledappointmentlist')->name('admin_main.cancelappointment');
Route::get('pastappointment','Admin_main\AdminmainController@pastappointmentlist')->name('admin_main.pastappointment');
Route::get('pocappointment','Admin_main\AdminmainController@pointofcareappointmentlist')->name('admin_main.pocappointment');
Route::get('appointment/verified/{id}/{status}', 'Admin_main\AdminmainController@apporverejectappointments')->name('admin_main.apporve');


Route::get('settings/{id}','Admin_main\AdminmainController@editsettings')->name('admin_main.editsettings');

Route::patch('settings/update/{id}', 'Admin_main\AdminmainController@updatesettings')->name('admin_main.updatesettings');


//Panellists Appointments
Route::get('get/panelist/bycity/{id}','Admin_main\AdminmainController@getcitybypanalist')->name('panel.getcitybypanalist');
Route::post('post/panalist/refer','Admin_main\AdminmainController@referpanalistpatient')->name('poc.refer.patient');
Route::get('panel/all_patient','Admin_main\AdminmainController@allpanalistpatient')->name('panel.allpatient');
Route::get('panel/patient/{id}/vitals', 'Admin_main\AdminmainController@panelVitals')->name('admin_main.panel.vitalsindex');
Route::get('panel/patient/{id}/labtest', 'Admin_main\AdminmainController@panelLabtests')->name('admin_main.panel.labtestindex');
Route::get('panel/patient/{id}/procedure', 'Admin_main\AdminmainController@panelProcedure')->name('admin_main.panel.procedureindex');
Route::get('panel/patient/edit/{id}', 'Admin_main\AdminmainController@paneledit')->name('admin_main.panel.edit');

});
//Route::get('admin_main','Admin_main\AdminmainController@dashboard')->name('admin_main.dashboard');
//Route::get('admin_main','Admin_main\AdminmainController@dashboard')->name('admin_main.dashboard');
Route::get('profile','Admin_main\AdminmainController@profile')->name('admin_main.profile');
Route::get('upcoming','Admin_main\AdminmainController@upcoming')->name('admin_main.upcoming');




Route::group(['middleware' => 'CheckAuth'], function() {

Route::get('admin/profile', 'Admin\AdminController@profile')->name('admin.profile');
Route::get('admin/reset_email', 'Admin\AdminController@reset_email')->name('admin.reset_email');
Route::get('admin/alladmin', 'Admin\AdminController@viewall_admin')->name('admin.viewall_admin');
Route::get('admin/ajax/adminarray', 'Admin\AdminController@adminarray')->name('admin.ajax.adminarray');
Route::get('admin/add_new', 'Admin\AdminController@add_new')->name('admin.new');
Route::post('admin/store', 'Admin\AdminController@store')->name('admin.store');
Route::get('admin/edit/{id}', 'Admin\AdminController@edit')->name('admin.edit');
Route::patch('admin/update', 'Admin\AdminController@update')->name('admin.update');
Route::get('admin/verified/{id}/{status}', 'Admin\AdminController@verified')->name('admin.verified');
Route::get('admin/delete/{id}', 'Admin\AdminController@delete')->name('admin.delete');

Route::get('admin/viewnotification/{id}', 'Admin\AdminController@viewnotification')->name('admin.viewnotification');


//speciality

Route::get('admin/speciality/add_new', 'Admin\SpecialityController@add_new')->name('speciality.new');
Route::get('admin/speciality/ajax/specialityarray', 'Admin\SpecialityController@specialityarray')->name('speciality.ajax.specialityarray');
Route::post('admin/speciality/store', 'Admin\SpecialityController@store')->name('speciality.store');
Route::get('admin/speciality/edit/{id}', 'Admin\SpecialityController@edit')->name('speciality.edit');
Route::patch('admin/speciality/update', 'Admin\SpecialityController@update')->name('speciality.update');
Route::get('admin/speciality/verified/{id}/{status}', 'Admin\SpecialityController@verified')->name('speciality.verified');
Route::get('admin/speciality/delete/{id}', 'Admin\SpecialityController@delete')->name('speciality.delete');

//Advertisement

Route::get('admin/advertisement/add_new', 'Admin\AdvertisementController@add_new')->name('advertisement.new');
Route::get('admin/advertisement/ajax/advertisementarray', 'Admin\AdvertisementController@advertisementarray')->name('advertisement.ajax.advertisementarray');
Route::post('admin/advertisement/store', 'Admin\AdvertisementController@store')->name('advertisement.store');
Route::get('admin/advertisement/edit/{id}', 'Admin\AdvertisementController@edit')->name('advertisement.edit');
Route::patch('admin/advertisement/update', 'Admin\AdvertisementController@update')->name('advertisement.update');
Route::get('admin/advertisement/verified/{id}/{status}', 'Admin\AdvertisementController@verified')->name('advertisement.verified');
Route::get('admin/advertisement/delete/{id}', 'Admin\AdvertisementController@delete')->name('advertisement.delete');

//city
Route::get('admin/city/add_new', 'Admin\CityController@add_new')->name('city.new');
Route::get('admin/city/ajax/cityarray', 'Admin\CityController@cityarray')->name('city.ajax.cityarray');
Route::post('admin/city/store', 'Admin\CityController@store')->name('city.store');
Route::get('admin/city/edit/{id}', 'Admin\CityController@edit')->name('city.edit');
Route::patch('admin/city/update', 'Admin\CityController@update')->name('city.update');
Route::get('admin/city/verified/{id}/{status}', 'Admin\CityController@verified')->name('city.verified');
Route::get('admin/city/delete/{id}', 'Admin\CityController@delete')->name('city.delete');

//Authority Counsil
Route::get('admin/authority_council/add_new', 'Admin\AuthorityCouncilController@add_new')->name('authority_council.new');
Route::get('admin/authority_council/ajax/authority_council', 'Admin\AuthorityCouncilController@authority_councilarray')->name('authority_council.ajax.authority_councilarray');
Route::post('admin/authority_council/store', 'Admin\AuthorityCouncilController@store')->name('authority_council.store');
Route::get('admin/authority_council/edit/{id}', 'Admin\AuthorityCouncilController@edit')->name('authority_council.edit');
Route::patch('admin/authority_council/update', 'Admin\AuthorityCouncilController@update')->name('authority_council.update');
Route::get('admin/authority_council/verified/{id}/{status}', 'Admin\AuthorityCouncilController@verified')->name('authority_council.verified');
Route::get('admin/authority_council/delete/{id}', 'Admin\AuthorityCouncilController@delete')->name('authority_council.delete');

//Hospital
Route::get('admin/hospital/add_new', 'Admin\HospitalController@add_new')->name('hospital.new');
Route::get('admin/allhospital', 'Admin\HospitalController@viewall_hospital')->name('hospital.viewall_hospital');
Route::get('admin/hospital/ajax/hospitalarray', 'Admin\HospitalController@hospitalarray')->name('hospital.ajax.hospitalarray');
Route::post('admin/hospital/store', 'Admin\HospitalController@store')->name('hospital.store');
Route::get('admin/hospital/edit/{id}', 'Admin\HospitalController@edit')->name('hospital.edit');
Route::patch('admin/hospital/update', 'Admin\HospitalController@update')->name('hospital.update');
Route::get('admin/hospital/verified/{id}/{status}', 'Admin\HospitalController@verified')->name('hospital.verified');
Route::get('admin/hospital/delete/{id}', 'Admin\HospitalController@delete')->name('hospital.delete');

//Pharmacy
Route::get('admin/pharmacy/add_new', 'Admin\PharmacyController@add_new')->name('pharmacy.new');
Route::get('admin/pharmacy', 'Admin\PharmacyController@viewall_hospital')->name('pharmacy.viewall_pharmacy');
Route::get('admin/pharmacy/ajax/pharmacyarray', 'Admin\PharmacyController@hospitalarray')->name('pharmacy.ajax.pharmacyarray');
Route::post('admin/pharmacy/store', 'Admin\PharmacyController@store')->name('pharmacy.store');
Route::get('admin/pharmacy/edit/{id}', 'Admin\PharmacyController@edit')->name('pharmacy.edit');
Route::patch('admin/pharmacy/update', 'Admin\PharmacyController@update')->name('pharmacy.update');
Route::get('admin/pharmacy/verified/{id}/{status}', 'Admin\PharmacyController@verified')->name('pharmacy.verified');
Route::get('admin/pharmacy/delete/{id}', 'Admin\PharmacyController@delete')->name('pharmacy.delete');


//List Of Problem
Route::get('admin/health_problem/add_new', 'Admin\HealthProblemController@add_new')->name('health_problem.new');
Route::get('admin/health_problem/ajax/problemarray', 'Admin\HealthProblemController@problemarray')->name('health_problem.ajax.problemarray');
Route::post('admin/health_problem/store', 'Admin\HealthProblemController@store')->name('health_problem.store');
Route::get('admin/health_problem/edit/{id}', 'Admin\HealthProblemController@edit')->name('health_problem.edit');
Route::patch('admin/health_problem/update', 'Admin\HealthProblemController@update')->name('health_problem.update');
Route::get('admin/health_problem/verified/{id}/{status}', 'Admin\HealthProblemController@verified')->name('health_problem.verified');
Route::get('admin/health_problem/delete/{id}', 'Admin\HealthProblemController@delete')->name('health_problem.delete');

//Unit For Lab Detail
Route::get('admin/unit/add_new', 'Admin\UnitController@add_new')->name('unit.new');
Route::get('admin/unit/ajax/unitarray', 'Admin\UnitController@unitarray')->name('unit.ajax.unitarray');
Route::post('admin/unit/store', 'Admin\UnitController@store')->name('unit.store');
Route::get('admin/unit/edit/{id}', 'Admin\UnitController@edit')->name('unit.edit');
Route::patch('admin/unit/update', 'Admin\UnitController@update')->name('unit.update');
Route::get('admin/unit/verified/{id}/{status}', 'Admin\UnitController@verified')->name('unit.verified');
Route::get('admin/unit/delete/{id}', 'Admin\UnitController@delete')->name('unit.delete');

//Master Health Plan
Route::get('admin/health_plan/add_new', 'Admin\HealthPlanController@add_new')->name('health_plan.new');
Route::get('admin/health_plan/ajax/planarray', 'Admin\HealthPlanController@planarray')->name('health_plan.ajax.planarray');
Route::post('admin/health_plan/store', 'Admin\HealthPlanController@store')->name('health_plan.store');
Route::get('admin/health_plan/edit/{id}', 'Admin\HealthPlanController@edit')->name('health_plan.edit');
Route::patch('admin/health_plan/update', 'Admin\HealthPlanController@update')->name('health_plan.update');
Route::get('admin/health_plan/verified/{id}/{status}', 'Admin\HealthPlanController@verified')->name('health_plan.verified');
Route::get('admin/health_plan/delete/{id}', 'Admin\HealthPlanController@delete')->name('health_plan.delete');
Route::get('admin/health_plan/description/{id}', 'Admin\HealthPlanController@adddescription')->name('health_plan.description');
Route::patch('admin/health_plan/storedescription', 'Admin\HealthPlanController@storedescription')->name('health_plan.storedescription');
Route::patch('admin/health_plan/editdescription', 'Admin\HealthPlanController@updatedescription')->name('health_plan.editdescription');
Route::get('admin/health_plan_description/status/{id}/{status}', 'Admin\HealthPlanController@updatestatus')->name('health_plan.changestatus');
Route::get('admin/health_plan/deletedescription/{id}', 'Admin\HealthPlanController@deletedescription')->name('health_plan.deletedescription');

//Pending Doctor
Route::get('admin/doctor/viewall_pending_doctor', 'Admin\DoctorController@viewall_pending_doctor')->name('doctor.viewall_pending_doctor');
Route::get('admin/doctor/ajax/pendingdoctorarray', 'Admin\DoctorController@pendingdoctorarray')->name('pendingdoctor.ajax.pendingdoctorarray');
Route::patch('admin/doctor/createpassword', 'Admin\DoctorController@createpassword')->name('doctor.createpassword');
Route::get('admin/doctor/verified/{id}/{status}', 'Admin\DoctorController@verified')->name('doctor.verified');
Route::get('admin/doctor/doctorall_detail/{id}', 'Admin\DoctorController@doctorall_detail')->name('doctor.doctorall_detail');
Route::get('admin/doctor/delete/{id}', 'Admin\DoctorController@delete')->name('doctor.delete');


//clinic
Route::get('admin/clinic/add_clinic', 'Admin\DoctorController@add_clinic')->name('clinic.add_clinic');
Route::post('admin/clinic/store_clinic', 'Admin\DoctorController@store_clinic')->name('clinic.store_clinic');
Route::get('admin/clinic/all_clinic', 'Admin\DoctorController@all_clinic')->name('clinic.all_clinic');
Route::get('admin/clinic/ajax/clinicallarray', 'Admin\DoctorController@clinicallarray')->name('clinic.ajax.clinicallarray');
Route::get('admin/clinic/deleteclinic/{id}', 'Admin\DoctorController@deleteclinic')->name('clinic.deleteclinic');
Route::get('admin/clinic/verifiedclinic/{id}/{status}', 'Admin\DoctorController@verifiedclinic')->name('clinic.verifiedclinic');

Route::get('admin/clinic/editclinic/{id}', 'Admin\DoctorController@editclinic')->name('clinic.editclinic');
Route::patch('admin/clinic/updateclinic', 'Admin\DoctorController@updateclinic')->name('clinic.updateclinic');


//POC
Route::get('admin/poc/add_poc', 'Admin\DoctorController@add_poc')->name('poc.add_poc');
Route::post('admin/poc/store_poc', 'Admin\DoctorController@store_poc')->name('poc.store_poc');
Route::get('admin/poc/all_poc', 'Admin\DoctorController@all_poc')->name('poc.all_poc');
Route::get('admin/poc/ajax/pocallarray', 'Admin\DoctorController@pocallarray')->name('poc.ajax.pocallarray');
Route::get('admin/poc/verifiedpoc/{id}/{status}', 'Admin\DoctorController@verifiedpoc')->name('poc.verifiedpoc');
Route::get('admin/poc/editpoc/{id}', 'Admin\DoctorController@editpoc')->name('poc.editpoc');
Route::patch('admin/poc/updatepoc', 'Admin\DoctorController@updatepoc')->name('poc.updatepoc');
Route::get('admin/poc/deletepoc/{id}', 'Admin\DoctorController@deletepoc')->name('poc.deletepoc');

//Admin_Manager
Route::get('admin/manager/add_manager', 'Admin\DoctorController@add_manager')->name('manager.add_manager');
Route::get('admin/manager/all_manager', 'Admin\DoctorController@all_manager')->name('manager.all_manager');
Route::post('admin/manager/store_manager', 'Admin\DoctorController@store_manager')->name('manager.store_manager');
Route::get('admin/manager/ajax/managerarray', 'Admin\DoctorController@managerarray')->name('manager.ajax.managerarray');
Route::get('admin/manager/verifiedmanager/{id}/{status}', 'Admin\DoctorController@verifiedmanager')->name('manager.verifiedmanager');
Route::get('admin/manager/editmanager/{id}', 'Admin\DoctorController@editmanager')->name('manager.editmanager');
Route::patch('admin/manager/updatemanager', 'Admin\DoctorController@updatemanager')->name('manager.updatemanager');
Route::get('admin/manager/deletemanager/{id}', 'Admin\DoctorController@deletemanager')->name('manager.deletemanager');



//Panelists
Route::get('admin/panelists/add_panelists', 'Admin\DoctorController@add_panelists')->name('panelists.add_panelists');
Route::post('admin/panelists/store_panelists', 'Admin\DoctorController@store_panelists')->name('panelists.store_panelists');
Route::get('admin/panelists/ajax/panelistsarray', 'Admin\DoctorController@panelistsarray')->name('panelists.ajax.panelistsarray');
Route::get('admin/panelists/all_panelists', 'Admin\DoctorController@all_panelists')->name('panelists.all_panelists');
Route::get('admin/panelists/verifiedpanelists/{id}/{status}', 'Admin\DoctorController@verifiedpanelists')->name('panelists.verifiedpanelists');
Route::get('admin/panelists/editpanelists/{id}', 'Admin\DoctorController@editpanelists')->name('panelists.editpanelists');
Route::patch('admin/panelists/updatepanelists', 'Admin\DoctorController@updatepanelists')->name('panelists.updatepanelists');
Route::get('admin/panelists/deletepanelists/{id}', 'Admin\DoctorController@deletepanelists')->name('panelists.deletepanelists');






//Expertise
Route::get('admin/panelists/add_expertise','Admin\ExpertiseController@add_expertise')->name('panelists.add_expertise');
Route::post('admin/panelists/store_expertise', 'Admin\ExpertiseController@store_expertise')->name('panelists.store_experties');
Route::get('admin/panelists/edit_expertise/{id}', 'Admin\ExpertiseController@edit_expertise')->name('panelists.edit_experties');
Route::get('admin/panelists/ajax/expertiesarray', 'Admin\ExpertiseController@expertiesarray')->name('panelists.ajax.expertiesarray');
Route::patch('admin/panelists/updateexperties', 'Admin\ExpertiseController@updateexperties')->name('panelists.updateexperties');
Route::get('admin/panelists/verified_expertise/{id}/{status}', 'Admin\ExpertiseController@verified_expertise')->name('panelists.verified_expertise');
Route::get('admin/panelists/delete/{id}', 'Admin\ExpertiseController@delete')->name('panelists.delete');


//Approve Doctor
Route::get('admin/doctor/viewall_approve_doctor', 'Admin\DoctorController@viewall_approve_doctor')->name('doctor.viewall_approve_doctor');
Route::get('admin/doctor/ajax/approvedoctorarray', 'Admin\DoctorController@approvedoctorarray')->name('approvedoctor.ajax.approvedoctorarray');
Route::patch('admin/doctor/sendnotification', 'Admin\DoctorController@sendnotification')->name('doctor.sendnotification');
Route::get('admin/doctor/createpdf/{id}', 'Admin\DoctorController@createpdf')->name('doctor.createpdf');

//Pending Coach
Route::get('admin/coach/viewall_pending_coach', 'Admin\CoachController@viewall_pending_coach')->name('coach.viewall_pending_coach');
Route::get('admin/coach/ajax/pendingcoacharray', 'Admin\CoachController@pendingcoacharray')->name('pendingcoach.ajax.pendingcoacharray');
Route::patch('admin/coach/createpassword', 'Admin\CoachController@createpassword')->name('coach.createpassword');
Route::get('admin/coach/verified/{id}/{status}', 'Admin\CoachController@verified')->name('coach.verified');
Route::get('admin/coach/coachall_detail/{id}', 'Admin\CoachController@coachall_detail')->name('coach.coachall_detail');
Route::get('admin/coach/delete/{id}', 'Admin\CoachController@delete')->name('coach.delete');

//Approve Coach
Route::get('admin/coach/viewall_approve_coach', 'Admin\CoachController@viewall_approve_coach')->name('coach.viewall_approve_coach');
Route::get('admin/coach/ajax/approvecoacharray', 'Admin\CoachController@approvecoacharray')->name('approvecoach.ajax.approvecoacharray');
Route::patch('admin/coach/sendnotification', 'Admin\CoachController@sendnotification')->name('coach.sendnotification');
Route::get('admin/coach/createpdf/{id}', 'Admin\CoachController@createpdf')->name('coach.createpdf');

//Patient
Route::get('admin/patient/viewall_patient', 'Admin\PatientController@viewall_patient')->name('patient.viewall_patient');
Route::get('admin/patient/ajax/patientarray', 'Admin\PatientController@patientarray')->name('patientarray.ajax.patientarray');
Route::get('admin/coach/patientall_detail/{id}', 'Admin\PatientController@patientall_detail')->name('patient.patientall_detail');
Route::patch('admin/patient/changevitals', 'Admin\PatientController@changevitals')->name('patient.changevitals');
Route::get('admin/patient/verified/{id}/{status}', 'Admin\PatientController@verified')->name('patient.verified');
Route::get('admin/patient/delete/{id}', 'Admin\PatientController@delete')->name('patient.delete');
Route::get('admin/patient/createpdf/{id}', 'Admin\PatientController@createpdf')->name('patient.createpdf');

//FAQ
Route::get('admin/faq/general/add_new', 'Admin\FaqController@add_general_new')->name('generalfaq.new');
Route::get('admin/faq/general/ajax/faqarray', 'Admin\FaqController@faqarray')->name('generalfaq.ajax.faqarray');
Route::post('admin/faq/general/store', 'Admin\FaqController@store_general')->name('generalfaq.store');
Route::get('admin/faq/general/edit/{id}', 'Admin\FaqController@edit_general')->name('generalfaq.edit');
Route::patch('admin/faq/general/update', 'Admin\FaqController@general_update')->name('generalfaq.update');
Route::get('admin/faq/general/verified/{id}/{status}', 'Admin\FaqController@generalfaq_verified')->name('generalfaq.verified');
Route::get('admin/faq/general/delete/{id}', 'Admin\FaqController@generalfaq_delete')->name('generalfaq.delete');

Route::get('admin/faq/coach/add_new', 'Admin\FaqController@add_coach_new')->name('coachfaq.new');
Route::get('admin/faq/coach/ajax/faqarray', 'Admin\FaqController@coachfaqarray')->name('coachfaq.ajax.faqarray');
Route::post('admin/faq/coach/store', 'Admin\FaqController@store_coach')->name('coachfaq.store');
Route::get('admin/faq/coach/edit/{id}', 'Admin\FaqController@edit_coach')->name('coachfaq.edit');
Route::patch('admin/faq/coach/update', 'Admin\FaqController@coach_update')->name('coachfaq.update');
Route::get('admin/faq/coach/verified/{id}/{status}', 'Admin\FaqController@coachfaq_verified')->name('coachfaq.verified');
Route::get('admin/faq/coach/delete/{id}', 'Admin\FaqController@coachfaq_delete')->name('coachfaq.delete');

Route::get('admin/faq/account/add_new', 'Admin\FaqController@add_account_new')->name('accountfaq.new');
Route::get('admin/faq/account/ajax/faqarray', 'Admin\FaqController@accountfaqarray')->name('accountfaq.ajax.faqarray');
Route::post('admin/faq/account/store', 'Admin\FaqController@store_account')->name('accountfaq.store');
Route::get('admin/faq/account/edit/{id}', 'Admin\FaqController@edit_account')->name('accountfaq.edit');
Route::patch('admin/faq/account/update', 'Admin\FaqController@account_update')->name('accountfaq.update');
Route::get('admin/faq/account/verified/{id}/{status}', 'Admin\FaqController@accountfaq_verified')->name('accountfaq.verified');
Route::get('admin/faq/account/delete/{id}', 'Admin\FaqController@accountfaq_delete')->name('accountfaq.delete');

Route::get('admin/faq/doctor/add_new', 'Admin\FaqController@add_doctor_new')->name('doctorfaq.new');
Route::get('admin/faq/doctor/ajax/faqarray', 'Admin\FaqController@doctorfaqarray')->name('doctorfaq.ajax.faqarray');
Route::post('admin/faq/doctor/store', 'Admin\FaqController@store_doctor')->name('doctorfaq.store');
Route::get('admin/faq/doctor/edit/{id}', 'Admin\FaqController@edit_doctor')->name('doctorfaq.edit');
Route::patch('admin/faq/doctor/update', 'Admin\FaqController@doctor_update')->name('doctorfaq.update');
Route::get('admin/faq/doctor/verified/{id}/{status}', 'Admin\FaqController@doctorfaq_verified')->name('doctorfaq.verified');
Route::get('admin/faq/doctor/delete/{id}', 'Admin\FaqController@doctorfaq_delete')->name('doctorfaq.delete');


//Admin Contact
Route::get('admin/contact/add_new', 'Admin\AdminContactController@add_new')->name('admin.contact');
Route::get('admin/contact/ajax/cityarray', 'Admin\AdminContactController@contactarray')->name('admin.ajax.contactarray');
Route::post('admin/contact/store', 'Admin\AdminContactController@store')->name('admin.contactstore');
Route::get('admin/contact/edit/{id}', 'Admin\AdminContactController@edit')->name('admin.contactedit');
Route::patch('admin/contact/update', 'Admin\AdminContactController@update')->name('admin.contactupdate');
Route::get('admin/contact/verified/{id}/{status}', 'Admin\AdminContactController@verified')->name('admin.contactverified');
Route::get('admin/contact/delete/{id}', 'Admin\AdminContactController@delete')->name('admin.contactdelete');

//Lab report test name
Route::get('admin/lab_report/add_new', 'Admin\LabReportController@add_new')->name('labreport.new');
Route::get('admin/lab_report/ajax/reportarray', 'Admin\LabReportController@reportarray')->name('labreport.ajax.reportarray');
Route::post('admin/lab_report/store', 'Admin\LabReportController@store')->name('labreport.store');
Route::get('admin/lab_report/edit/{id}', 'Admin\LabReportController@edit')->name('labreport.edit');
Route::patch('admin/lab_report/update', 'Admin\LabReportController@update')->name('labreport.update');
Route::get('admin/lab_report/verified/{id}/{status}', 'Admin\LabReportController@verified')->name('labreport.verified');
Route::get('admin/lab_report/delete/{id}', 'Admin\LabReportController@delete')->name('labreport.delete');

//Admin Procedure
Route::get('admin/procedure/add_new', 'Admin\ProcedureController@add_new')->name('procedure.new');
Route::get('admin/procedure/ajax/procedurearray', 'Admin\ProcedureController@procedurearray')->name('procedure.ajax.procedurearray');
Route::post('admin/procedure/store', 'Admin\ProcedureController@store')->name('procedure.store');
Route::get('admin/procedure/edit/{id}', 'Admin\ProcedureController@edit')->name('procedure.edit');
Route::patch('admin/procedure/update', 'Admin\ProcedureController@update')->name('procedure.update');
Route::get('admin/procedure/verified/{id}/{status}', 'Admin\ProcedureController@verified')->name('procedure.verified');
Route::get('admin/procedure/delete/{id}', 'Admin\ProcedureController@delete')->name('procedure.delete');

//clinicvisit
Route::get('admin/clinic/patient', 'Admin\DoctorController@all_clinic_patient')->name('clinic.all_clinic_patient');
Route::get('admin/clinic/patient/clinicpatientarray', 'Admin\DoctorController@clinic_patientallarray')->name('clinic.clinic_patientallarray');

//clinicvisitdoctor
Route::get('admin/clinic/doctor', 'Admin\DoctorController@all_clinic_doctor')->name('clinic.all_clinic_doctor');
Route::get('admin/clinic/doctor/clinicdoctorarray', 'Admin\DoctorController@clinic_doctorallarray')->name('clinic.clinicdoctorarray');

//vitalsclinicvisit
Route::get('admin/clinic/patientvital/{id}', 'Admin\DoctorController@all_clinic_vitals')->name('clinic.patientvital');
Route::get('admin/clinic/patient/vitalsallarray/{id}', 'Admin\DoctorController@vitalsallarray')->name('clinic.vitalsallarray');

//procedureclinicvisit
Route::get('admin/clinic/patientprocedure/{id}', 'Admin\DoctorController@all_clinic_procedure')->name('clinic.patientprocedure');
Route::get('admin/clinic/patient/procedurearray/{id}', 'Admin\DoctorController@procedureallarray')->name('clinic.patientprocedurearray');

//labtestclinicvisit
Route::get('admin/clinic/patientlabtest/{id}', 'Admin\DoctorController@all_clinic_labtest')->name('clinic.patientlabtest');
Route::get('admin/clinic/patient/labtestarray/{id}', 'Admin\DoctorController@labtestallarray')->name('clinic.patientlabtestarray');


});
