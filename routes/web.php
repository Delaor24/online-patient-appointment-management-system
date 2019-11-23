<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//.............................frontEnd route start............................

Route::get('/', 'frontEnd\FrontEndController@index')->name('frontEnd.home');

Route::get('doctor-single-page/{id}','frontEnd\FrontEndController@doctorSinglePage')->name('doctor.singlePage');
Route::get('doctor-lists/','frontEnd\FrontEndController@doctorList')->name('doctor.list');
Route::get('specialist/doctor-list/{id}','frontEnd\FrontEndController@specialistDoctorList')->name('specialist.doctor.list');
Route::get('contact-us','frontEnd\FrontEndController@contactPage')->name('frontEnd.contactPage');
Route::post('contact-us/store','frontEnd\FrontEndController@contactUsStore')->name('frontEnd.contactUsStore');
Route::get('appointment-create/{id}/{title}','frontEnd\FrontEndController@appointmentCreate')->name('frontEnd.appointment.create');

//api
Route::get('appointment/{id}/',function($id){

    

   $day = App\Day::findOrFail($id);
   $times = $day->times;


       
       return json_encode($times);
});


Route::post('appointment/store','frontEnd\FrontEndController@appointmentStore')->name('frontEnd.appointment.store');
//.............................frontEnd route end............................






//.............................admin route start............................

Route::group(['prefix'=>'admin','namespace'=>'admin'],function(){

  //.................login route start...................
  Route::get('login','Auth\LoginController@showLoginForm')->name('admin.login');
  Route::post('login-process','Auth\LoginController@login')->name('admin.login-process');
  Route::post('/logout','Auth\LoginController@logout')->name('admin.logout');
 //.................login route end...................

  Route::get('dashboard','DashboardController@index')->name('admin.dashboard');


  Route::resource('specialists','SpecialistController');
  Route::resource('staffs','StaffController');
  Route::resource('doctors','AddDoctorController');
  Route::resource('doctordays','AddDayController');
  

  Route::resource('doctortimes','AddTimeController');

  Route::get('doctor/{id}/',function($id){

    

   $doctor = App\Doctor::findOrFail($id);
   $days = $doctor->days;


       
       return json_encode($days);
});


  Route::resource('appointments','AppointmentController');

  //..........setting route start...................
  Route::get('setting/profile','SettingController@profile')->name('admin.profile');
  Route::put('setting/profile/update','SettingController@update')->name('admin.profile.update');
  Route::put('setting/change-password','SettingController@changePassword')->name('admin.changePassword');
  //..........setting route end...................

   //..........contact us route start...................
  Route::get('contact/incomming-mail-contact-us','SettingController@contactUs')->name('admin.contactUs');
   Route::delete('contact-us-delete/{id}','SettingController@commentDelete')->name('admin.contact.destroy');
  //..........contact us route end...................



});



//.............................doctor route start............................

Route::group(['prefix'=>'doctor','namespace'=>'doctor'],function(){

  //.................login route start...................
  Route::get('login','Auth\LoginController@showLoginForm')->name('doctor.login');
  Route::post('login-process','Auth\LoginController@login')->name('doctor.login-process');
  Route::post('/logout','Auth\LoginController@logout')->name('doctor.logout');

 //.................login route end...................

  Route::get('dashboard','DashboardController@index')->name('doctor.dashboard');
  Route::get('appointmetn/view-all-appointments','AssignAppointment@index')->name('doctor.appointment.index');
  Route::get('appointmetn/{id}/status-update','AssignAppointment@statusUpdate')->name('doctor.updateAppointment');
  Route::delete('appointments/{id}','AssignAppointment@deleteAppointment')->name('doctor.deleteAppointment');
  //..........setting route start...................
  Route::get('setting/profile','SettingController@profile')->name('doctor.profile');
  Route::put('setting/profile/update','SettingController@update')->name('doctor.profile.update');
  Route::put('setting/change-password','SettingController@changePassword')->name('doctor.changePassword');
  //..........setting route end...................

  //notification
    Route::get('doctor-single-appointment/{id}/{title}/{a}','AssignAppointment@doctorSingleViewAppointment')->name('doctor.view.appointment');




});


//.............................doctor route end............................

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
