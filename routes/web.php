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

// Route::get('/', function () {
//     return view('client.base');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'ClientController@index')->name('client');
Route::get('/event', 'ClientController@event')->name('client.event');
Route::get('/artikel', 'ClientController@artikel')->name('client.artikel');
Route::get('/destinasi', 'ClientController@destinasi')->name('client.destinasi');
Route::get('/galeri', 'ClientController@galeri')->name('client.galeri');
Route::get('/{id}/detail', 'ClientController@detail')->name('client.detail');
Route::get('/about/dusun', 'ClientController@dusun')->name('client.dusun');
Route::get('/about/data-dusun', 'ClientController@data_dusun')->name('client.data-dusun');
Route::get('/about/organisasi', 'ClientController@organisasi')->name('client.organisasi');
Route::get('/about/kampung-kb', 'ClientController@kampung_kb')->name('client.kampung-kb');
Route::post('/search', 'ClientController@search')->name('client.search');
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
		Route::resource('rembulan', 'Staff\RembulanController');
		Route::resource('galeri', 'Staff\GaleriController');
		Route::resource('artikel', 'Staff\ArtikelController');
		Route::resource('event', 'Staff\EventController');
		Route::resource('destinasi', 'Staff\DestinasiController');
	});
});
