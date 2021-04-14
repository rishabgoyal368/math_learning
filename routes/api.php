<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
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



Route::post('/register', 'ApiController@user_registration');
Route::post('/login', 'ApiController@user_login');
Route::post('/forgot-password','ApiController@forgot_password');
Route::post('/reset-password','ApiController@reset_password');

Route::post('/logout','ApiController@logout'); 
Route::post('/get-profile','ApiController@profile'); 
Route::post('/update-profile','ApiController@updateProfile'); 

Route::post('/app-setting','Api\AppSettingController@index'); 

Route::post('/mcq','Api\McqController@index');

//=================== Report ====================
Route::post('/report','Api\McqController@submit_result');
//=================== Report ====================

//=================== view result ====================
Route::get('/view-result','Api\McqController@view_result');
//=================== view result ====================