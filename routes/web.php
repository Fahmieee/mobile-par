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

Route::get('/login', 'LoginController@showLoginForm')->name('login');


Route::get('login/logout', array(
    'as' => 'logout-user',
    'uses' => 'LoginController@logout'
));

Route::post('login/user', 'LoginController@loginUser')->name('login_submit');
Route::get('/logins', 'LoginController@showLoginForm')->name('login.user');
Route::post('logins/store', 'LoginController@store')->name('StoreUsers');

Route::post('logins/activity', 'LoginController@activity')->name('ActivityLogin');


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


	Route::get('/detailmonitoring', function () {
	    return view('content.monitoring.detail');
	});

	Route::get('dcu', 'DCUController@index');

	Route::get('driver', 'DriverController@index');
	Route::post('driver/terimapair', 'DriverController@terimapair')->name('TerimaPair');
	Route::post('driver/tolakpair', 'DriverController@tolakpair')->name('TolakPair');
	Route::post('driver/getlembur', 'DriverController@getlembur')->name('GetLembur');

	Route::get('pretripcheck', 'PreTripCheckController@index');
	Route::post('pretripcheck/get', 'PreTripCheckController@GetData')->name('GetPreTripCheck');
	Route::post('pretripcheck/submit', 'PreTripCheckController@SubmitPretripCheck')->name('SubmitPretripCheck');
	Route::post('pretripcheck/validasi', 'PreTripCheckController@Validasi')->name('ValidasiPretripCheck');
	Route::post('pretripcheck/valiadasinotoke', 'PreTripCheckController@validasinotoke')->name('ValidasiNotOke');
	Route::post('pretripcheck/answer', 'PreTripCheckController@getdataanswer')->name('GetPreTripCheckAnswer');
	Route::post('pretripcheck/koordinat', 'PreTripCheckController@koordinat')->name('KoordinatPTC');
	Route::post('pretripcheck/kategorisubmited', 'PreTripCheckController@getsubmited')->name('GetKategoriSubmited');
	Route::post('pretripcheck/kirimptc', 'PreTripCheckController@kirimptc')->name('KirimPretripCheck');
	Route::get('pretripcheck/{id}', 'PreTripCheckController@detail');
	Route::get('pretripcheck/detail/{id}', 'PreTripCheckController@lebihdetail');
	Route::get('pretripcheck/detail/mobil/{id}', 'PreTripCheckController@mobil');
	Route::post('pretripcheck/ptcanswer', 'PreTripCheckController@ptcanswer')->name('PTCAnswer');


	Route::post('clocks/clockin', 'ClocksController@create')->name('ClokinSubmit');
	Route::post('clocks/validasi', 'ClocksController@validasi')->name('ValidasiClock');
	Route::post('clocks/clockout', 'ClocksController@clockout')->name('ClokoutSubmit');
	Route::post('clocks/clockinkoordinat', 'ClocksController@clockinkoordinat')->name('KoordinatClockin');

	Route::post('medical_checkup/store', 'MedicalCheckupController@create')->name('MedicalStore');
	Route::post('medical_checkup/validasi', 'MedicalCheckupController@validasi')->name('MedicalValidasi');
	Route::post('medical_checkup/koordinat', 'MedicalCheckupController@koordinat')->name('KoordinatMedical');

	Route::get('history', 'HistoryController@index');
	Route::post('history/getdata', 'HistoryController@GetData')->name('GetdataHistory');
	Route::post('history/detail', 'HistoryController@detail')->name('DetailRiwayatHistory');

	Route::get('korlap', 'KorlapController@index');
	Route::get('lihatdriver', 'KorlapController@lihatdriver');
	Route::post('korlap/lihatnilaidriver', 'KorlapController@getnilaidriver')->name('LihatNilaiDriver');
	Route::get('lihatkendaraan', 'KorlapController@lihatkendaraan');
	Route::post('getptchigh', 'KorlapController@getptchigh')->name('GetPTCHigh');
	Route::post('getptcforapprove', 'KorlapController@getptcforapprove')->name('GetPTCforApprove');
	Route::post('approveptcnow', 'KorlapController@approveptcnow')->name('ApprovePTCNow');
	Route::post('approveptcsementara', 'KorlapController@approveptcsementara')->name('ApprovePTCSementara');
	Route::post('getptcmedium', 'KorlapController@getptcmedium')->name('GetPTCMedium');
	Route::post('getptclow', 'KorlapController@getptclow')->name('GetPTCLow');
	Route::post('getdcusakit', 'KorlapController@getdcusakit')->name('GetDCUSakit');
	Route::post('korlap/getdcudetail', 'KorlapController@getdcudetail')->name('GetDCUDetail');

	Route::get('approve', 'ApproveController@index');
	Route::post('approve/get', 'ApproveController@getdata')->name('GetApprove');
	Route::post('approve/detail', 'ApproveController@getdetail')->name('GetDetail');
	Route::post('approve/store', 'ApproveController@approve')->name('Approved');

	Route::get('client', 'ClientController@index');
	Route::post('client/get', 'ClientController@getdata')->name('GetDataClient');
	Route::post('client/listdriver', 'ClientController@listdriver')->name('DriverListPairing');
	Route::post('client/pairing', 'ClientController@pairing')->name('ProsesPairing');

	Route::get('client-approve', 'ClientController@client_approve');
	Route::post('client-approve/get', 'ClientController@getdataapprove')->name('GetApproveClient');
	Route::post('client-approve/detail', 'ClientController@getdataapprovedetail')->name('GetApproveClientDetail');
	Route::post('client-approve/approve', 'ClientController@approve')->name('ClientApprove');

	Route::get('suara', 'SuaraPelangganController@index');
	Route::post('suara/save', 'SuaraPelangganController@submit')->name('SubmitSuara');
	Route::post('suara/change', 'SuaraPelangganController@change')->name('ChangeTypes');

	Route::get('lihatsuara', 'LihatSuaraController@index');
	Route::post('lihatsuara/get', 'LihatSuaraController@getsuara')->name('GetLihatSuara');
	Route::post('lihatsuara/detail', 'LihatSuaraController@getsuaradetail')->name('LihatSuaraDetail');

	Route::get('nilaidriver', 'NilaiDriverController@index');
	Route::post('nilaidriver/getdetail', 'NilaiDriverController@getdetail')->name('GetDetailNilaiDriver');
	Route::post('nilaidriver/submit', 'NilaiDriverController@submit')->name('SubmitNilaiDriver');
	Route::post('nilaidriver/validasi', 'NilaiDriverController@validasi')->name('ValidasiNilaiDriver');
	Route::post('nilaidriver/getsubmited', 'NilaiDriverController@getsubmited')->name('GetNilaiDrivers');
	Route::post('nilaidriver/getrating', 'NilaiDriverController@getratingkategori')->name('GetRatingKategori');
	Route::post('nilaidriver/getdrivers', 'NilaiDriverController@getdriver')->name('GetDriver');

	Route::get('nilaikendaraan', 'NilaiKendaraanController@index');
	Route::post('nilaikendaraan/getdetail', 'NilaiKendaraanController@getdetail')->name('GetDetailNilaiKendaraan');
	Route::post('nilaikendaraan/submit', 'NilaiKendaraanController@submit')->name('SubmitNilaiKendaraan');
	Route::post('nilaikendaraan/validasi', 'NilaiKendaraanController@validasi')->name('ValidasiNilaiKendaraan');
	Route::post('nilaikendaraan/getsubmited', 'NilaiKendaraanController@getsubmited')->name('GetNilaiKendaraan');
	Route::post('nilaikendaraan/getrating', 'NilaiKendaraanController@getratingkategori')->name('GetRatingKategoriKendaraan');
	Route::post('nilaikendaraan/getkendaraan', 'NilaiKendaraanController@getkendaraan')->name('GetKendaraan');

	Route::get('profile', 'ProfileController@index');
	Route::post('profile/get', 'ProfileController@getdata')->name('GetDataProfile');
	Route::post('profile/update', 'ProfileController@store')->name('UpdateProfile');
	Route::post('profile/role', 'ProfileController@role')->name('RoleProfile');
	Route::post('profile/photo', 'ProfileController@gantiphoto')->name('GantiPhoto');
	Route::post('profile/fcmtoken', 'ProfileController@gettoken')->name('TokenFCM');

	Route::get('ubahpassword', 'ProfileController@ubahpassword');
	Route::post('ubahpassword/update', 'ProfileController@updatepass')->name('UpdatePassword');

	Route::get('monitoring', 'MonitoringController@index');
	Route::get('detailmonitoring/{id}', 'MonitoringController@detail');


	Route::get('/approve', function () {
	    return view('content.approve.index');
	});
});