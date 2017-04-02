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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
	Route::get('/dashboard', 'DashBoardController@index');

	// Member 
	Route::get('/member', 'MemberController@index');
	Route::get('/member/create', 'MemberController@create');
	Route::post('/member/store', 'MemberController@store');
});


Route::get('/email/verify', function() {
	$user = \App\User::find(1)->first();
	// return view('emails/verify', ['user' => $user]);
	
	Mail::to('client_email@gmail.com')
	->send(new \App\Mail\UserRegisterVerify($user,'dev.sst.com/verify/ddlsafjl1dfaueiu123u1i4u'));
	return 'mail was sent';

});

