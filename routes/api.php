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
use Illuminate\Support\Facades\Route;
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login','API\LoginController@login');
Route::post('register','API\RegisterController@register');
Route::post('otp','API\LoginController@otp');

Route::middleware(['jwt.verify','otp.verify'])->group(function (){
    Route::get('packet','API\HomeController@home');
});
