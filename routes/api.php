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

Route::post('login','APIControllers\LoginController@login');
Route::post('register','APIControllers\RegisterController@register');
Route::post('otp','APIControllers\LoginController@otp');
Route::get('logout','APIControllers\LoginController@logout');
Route::get('packet','APIControllers\HomeController@home');
Route::get('packet/all','APIControllers\HomeController@packet');
Route::get('packet/{id}','APIControllers\HomeController@packetById');

Route::middleware(['jwt.verify','otp.verify'])->group(function (){
    //Transaction
    Route::get('purchase','APIControllers\TransactionController@index');
    Route::post('purchase/buy','APIControllers\TransactionController@purchase');

    //Master Bank
    Route::get('bank','APIControllers\PaymentController@bank');

    //Payment
    Route::get('payment/{id}','APIControllers\PaymentController@index');
    Route::post('payment/confirm','APIControllers\PaymentController@paymentConfirm');
});
