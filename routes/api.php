<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/login/{nomor_hp}', 'ApiController@login');
Route::get('/tps/{id_relawan}', 'ApiController@tps');
Route::post('/updateTps', 'ApiController@updateTps');
Route::post('/updateSuaraCalon', 'ApiController@updateSuaraCalon');
Route::post('/updateSuaraPartai', 'ApiController@updateSuaraPartai');
