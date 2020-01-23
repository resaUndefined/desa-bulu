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
    return view('client.base');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
// Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.token');
// Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.request');
Route::post('/login/custom', 'LoginController@login')->name('login.custom');
Route::group(['middleware' => ['web', 'auth']], function(){
	Route::get('logout', 'LoginController@logout')->name('logout.custom');
});

Route::group(['middleware' => ['web', 'auth', 'isAdmin']], function(){
	Route::get('/admin-web', 'Admin\DashboardController@index')->name('admin');
	Route::prefix('admin-web')->group(function () {
	    Route::resource('user', 'Admin\UserController');
	});
});
Route::group(['middleware' => ['web', 'auth', 'isStaff']], function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/staff', 'Staff\DashboardController@index')->name('staff');
	Route::prefix('staff')->group(function () {
		Route::resource('dusun', 'Staff\DesaController');
		Route::resource('batas-dusun', 'Staff\BatasDesaController');
		Route::resource('fasilitas', 'Staff\FasilitasController');
		Route::resource('masyarakat', 'Staff\MasyarakatController');
		Route::resource('kegiatan', 'Staff\KegiatanController');
		Route::resource('rt', 'Staff\RtController');
		Route::resource('karta-bule', 'Staff\KartaBuleController');
		Route::resource('bukid', 'Staff\BukidController');
		// Route::get('profile', 'Staff\DashboardController@profile')->name('staff.profile');
		// Route::put('profile', 'Staff\DashboardController@profile_update')->name('staff.profile_update');
		// Route::resource('pertemuan', 'Staff\PertemuanController');
		// // bendahara
		// Route::get('tambah-iuran', 'Staff\BendaharaController@create')->name('iuran.create');
		// Route::post('tambah-iuran', 'Staff\BendaharaController@store')->name('iuran.store');
		// Route::get('edit-iuran/{id}', 'Staff\BendaharaController@edit')->name('iuran.edit');
		// Route::put('edit-iuran/{id}', 'Staff\BendaharaController@update')->name('iuran.update');
		// Route::get('lihat-iuran/{id}', 'Staff\BendaharaController@show')->name('iuran.show');
		// Route::get('list-kasflow', 'Staff\BendaharaController@kasflow_list')->name('kasflow.list');
		// Route::get('kasflow', 'Staff\BendaharaController@kasflow_create')->name('kasflow.create');
		// Route::post('kasflow', 'Staff\BendaharaController@kasflow_store')->name('kasflow.store');
		// Route::get('download-kas','Staff\BendaharaController@download_kas')->name('download.kas');

		// // sekretaris
		// Route::get('tambah-notulen', 'Staff\SekretarisController@create')->name('notulen.create');
		// Route::post('tambah-notulen', 'Staff\SekretarisController@store')->name('notulen.store');

		// // staff
		// Route::get('iuranku', 'Staff\StaffController@index')->name('iuranku');
		// Route::get('kehadiranku', 'Staff\StaffController@hadir')->name('kehadiranku');
		// Route::get('list-notulen', 'Staff\StaffController@list_notulen')->name('notulen.list');
		// Route::get('detail-notulen/{id}', 'Staff\StaffController@detail_notulen')->name('notulen.show');
		// Route::get('list-user', 'Staff\StaffController@list_user')->name('list.user');
		// Route::get('detail-user/{id}', 'Staff\StaffController@detail_user')->name('detail.user');
		// Route::get('kehadiran-user', 'Staff\StaffController@kehadiran')->name('kehadiran.index');
		// Route::get('kehadiran-user/{id}', 'Staff\StaffController@kehadiran_show')->name('kehadiran.show');
	});
});
