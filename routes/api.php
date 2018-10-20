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
Route::post('/mobile/api/register','mobileApi\RegisterController@registerUser');
Route::post('/mobile/api/login','mobileApi\LoginController@loginUser');
Route::get('/mobile/api/getData' , 'mobileApi\AreaController@getData')->middleware('auth:api');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
