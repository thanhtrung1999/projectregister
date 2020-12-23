<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

//login
Route::get('/login','AuthController@getLogin')->name('login');
Route::post('/login','AuthController@login')->name('postLogin');
Route::get('/logout','AuthController@logout')->name('logout');
Route::get('/signup','AuthController@getSignup')->name('getsignup');
Route::post('/signup','AuthController@signup')->name('signup');

// admin
//Route::prefix('admin')->group(function (){
Route::middleware(['checkrole:admin'])->prefix('admin')->group(function(){

    Route::get('/getuser', 'AdminController@getUser')->name('getuser');
    Route::get('/createuser','AdminController@create')->name('getcreateuser');
    Route::post('/createuser', 'AdminController@createUser')->name('postcreateuser');
    Route::get('/deleteuser/{id}', 'AdminController@deleteUser')->name('deleteuser');
    Route::get('/updateuser/{id}', 'AdminController@getUpdateUser')->name('getupdate');
    Route::post('/updateuser/{id}', 'AdminController@updateUser')->name('update');
    Route::get('/information', 'AdminController@getInfor')->name('getinforadmin');
    Route::get('/editinformation', 'AdminController@editInfor')->name('inforadmin');
    Route::post('/updateinformation', 'AdminController@updateInfor')->name('updateinforadmin');
});

//student

Route::middleware(['checkrole:student'])->prefix('student')->group(function(){

    Route::get('/createtopic', 'StudentController@getTopic')->name('gettopic');
    Route::post('/createtopic', 'StudentController@postTopic')->name('posttopic');
    Route::get('/status', 'StudentController@statusTopic')->name('statustopic');
    Route::get('/canceltopic', 'StudentController@getcancelTopic')->name('getcancel');
    Route::get('/canceltopic/{id}', 'StudentController@cancelTopic')->name('canceltopic');
    Route::get('/extendtopic', 'StudentController@extendTopic')->name('extendTopic');
//    Route::post('/extendtopic', 'StudentController@postExtendTopic')->name('postExtendTopic');
    Route::get('/submitreport', 'StudentController@getFormSubmit')->name('submitreport');
    Route::post('/submitreport', 'StudentController@submitReport')->name('submit');
    Route::get('/information', 'StudentController@getInfor')->name('getinforstudent');
    Route::get('/editinformation', 'StudentController@editInfor')->name('inforstudent');
    Route::post('/updateinformation', 'StudentController@updateInfor')->name('updateinforstudent');
    Route::get('/getextend/{id}', 'StudentController@getExtendTopic')->name('formextend');
    Route::post('/postextend/{id}', 'StudentController@postExtendTopic')->name('postextend');

});
//lecture
Route::middleware(['checkrole:teacher'])->prefix('lecture')->group(function(){

    Route::get('listtopic', 'LecturerController@getTopicStudent')->name('listtopic');

    Route::get('confirmregister', 'LecturerController@getConfirmRegisterTopic')->name('confirmregister');
    Route::get('confirmregister/{id}', 'LecturerController@confirmRegisterTopic')->name('postconfirmregister');
    Route::get('cancelregistertopic/{id}', 'LecturerController@cancelRegisterTopic')->name('cancelregister');

    Route::get('confirmextend', 'LecturerController@getConfirmExtendTopic')->name('confirmextend');
    Route::get('confirmextend/{id}', 'LecturerController@confirmExtendTopic')->name('postconfirmextend');
    Route::get('cancelextendtopic/{id}', 'LecturerController@cancelExtendTopic')->name('cancelextend');

    Route::get('confirmcancel', 'LecturerController@getConfirmCancelTopic')->name('confirmcancel');
    Route::get('confirmcancel/{id}', 'LecturerController@confirmCancelTopic')->name('postconfirmcancel');
    Route::get('notconfirmcanceltopic/{id}', 'LecturerController@notConfirmCancelTopic')->name('notconfirmcanceltopic');

    Route::get('/information/', 'LecturerController@getInfor')->name('getinforlecture');
    Route::get('/editinformation', 'LecturerController@editInfor')->name('inforlecture');
    Route::post('/updateinformation', 'LecturerController@updateInfor')->name('updateinforlecture');
});
