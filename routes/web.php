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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/setting', 'HomeController@setting')->name('setting');
Route::post('/setting', 'HomeController@updateSetting');
Route::get('/data', 'HomeController@dataDashboard');
Route::get('/partai', 'HomeController@partai')->name('partai');
Route::resource('/relawan', 'RelawanController');

Route::prefix('tps')->group(function () {
    Route::get('provinsi', 'TpsController@tpsProvinsi')->name('tpsProvinsi');
    Route::get('kabupaten/{idkabupaten}', 'TpsController@tpsKabupaten')->name('tpsKabupaten');
    Route::get('kecamatan/{idkecamatan}', 'TpsController@tpsKecamatan')->name('tpsKecamatan');
    Route::get('kelurahan/{idkelurahan}', 'TpsController@tpsKelurahan')->name('tpsKelurahan');
    Route::get('tps/{idtps}', 'TpsController@tps')->name('tps');
    Route::get('relawan/{idtps}/edit', 'TpsController@editRelawanTps')->name('tps.editRelawan');
    Route::put('relawan/{idtps}', 'TpsController@updateRelawanTps')->name('tps.updateRelawan');
});