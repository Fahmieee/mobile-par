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
Auth::routes();

Route::get('/', function () {
    return view('splash.index');
});

Route::get('/login', function () {
    return view('login.index');
})->name('login');


Route::get('login/logout', array(
    'as' => 'logout-user',
    'uses' => 'LoginController@logout'
));

Route::post('login/user', 'LoginController@loginUser')->name('login_submit');
Route::get('/', 'LoginController@showLoginForm')->name('login.user');


Route::get('/', function () {
    return view('splash.index');
});

Route::group(['middleware' => 'auth:user'], function(){

	Route::get('/intro', function () {
	    return view('intro.index');
	});

	Route::get('/coba', 'LoginController@Coba');

	Route::get('/home', function () {
	    return view('content.home.index');
	});

	Route::get('/driver', function () {
	    return view('content.home.driver');
	});

	Route::get('/driver_ada', function () {
	    return view('content.home.driver-ada');
	});

	Route::get('/korlap', function () {
	    return view('content.home.korlap');
	});

	Route::get('/home2', function () {
	    return view('content.home.index2');
	});

	Route::get('/pretripcheck', function () {
	    return view('content.trip_check.index');
	});

	Route::get('/approve', function () {
	    return view('content.approve.index');
	});
});