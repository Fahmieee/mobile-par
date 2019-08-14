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
Route::get('/logins', 'LoginController@showLoginForm')->name('login.user');


Route::get('/', function () {
    return view('splash.index');
});

Route::get('/coba', 'LoginController@Coba');

Route::group(['middleware' => 'auth:user'], function(){

	Route::get('/intro', function () {
	    return view('intro.index');
	});

	Route::get('/home', function () {
	    return view('content.home.index');
	});

	Route::get('/driver', function () {
	    return view('content.home.driver.index');
	});

	Route::get('pretripcheck', 'PreTripCheckController@index');
	Route::post('pretripcheck/get', 'PreTripCheckController@GetData')->name('GetPreTripCheck');
	Route::post('pretripcheck/submit', 'PreTripCheckController@SubmitPretripCheck')->name('SubmitPretripCheck');
	Route::post('pretripcheck/validasi', 'PreTripCheckController@Validasi')->name('ValidasiPretripCheck');
	Route::get('pretripcheck/kategori', 'PreTripCheckController@getkategori')->name('GetKategori');
	Route::post('pretripcheck/valiadasinotoke', 'PreTripCheckController@validasinotoke')->name('ValidasiNotOke');

	Route::post('clocks/clockin', 'ClocksController@create')->name('ClokinSubmit');
	Route::post('clocks/validasi', 'ClocksController@validasi')->name('ValidasiClock');
	Route::post('clocks/clockout', 'ClocksController@clockout')->name('ClokoutSubmit');

	Route::get('history', 'HistoryController@index');
	Route::post('history/getdata', 'HistoryController@GetData')->name('GetdataHistory');
	Route::post('history/detail', 'HistoryController@detail')->name('DetailRiwayatHistory');

	Route::get('korlap', 'KorlapController@index');
	Route::post('korlap/getprofile', 'KorlapController@getprofile')->name('GetProfile');

	Route::get('approve', 'ApproveController@index');
	Route::post('approve/get', 'ApproveController@getdata')->name('GetApprove');
	Route::post('approve/detail', 'ApproveController@getdetail')->name('GetDetail');
	Route::post('approve/store', 'ApproveController@approve')->name('Approved');

	Route::get('client', 'ClientController@index');

	Route::get('suara', 'SuaraPelangganController@index');
	Route::post('suara/save', 'SuaraPelangganController@submit')->name('SubmitSuara');

	Route::get('nilaidriver', 'NilaiDriverController@index');
	Route::get('nilaidriver/gettype', 'NilaiDriverController@gettype')->name('GetTypeNilaiDriver');
	Route::post('nilaidriver/getdetail', 'NilaiDriverController@getdetail')->name('GetDetailNilaiDriver');

	Route::get('/home2', function () {
	    return view('content.home.korlap');
	});


	Route::get('/approve', function () {
	    return view('content.approve.index');
	});
});