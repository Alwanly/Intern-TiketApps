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
Route::get('packet/home','APIControllers\HomeController@home');
Route::get('packet/all','APIControllers\HomeController@packet');
Route::get('packet/id/{id}','APIControllers\HomeController@packetById');
Route::get('packet/search/','APIControllers\HomeController@packetBySearchAndSorting');
Route::get('getBannerPacket','APIControllers\HomeController@getImagePacket');

Route::middleware(['jwt.verify','otp.verify'])->group(function (){
    //Transaction
    Route::get('purchase','APIControllers\TransactionController@index');
    Route::post('purchase/buy','APIControllers\TransactionController@purchase');
    Route::get('purchase/list','APIControllers\TransactionController@showList');
    //check code agent
    Route::post('checkCodeAgent','APIControllers\TransactionController@checkCodeAgent');

    //Master Bank
    Route::get('bank','APIControllers\PaymentController@bank');

    //Payment
    Route::get('payment/{id}','APIControllers\PaymentController@index');
    Route::post('payment/confirm','APIControllers\PaymentController@paymentConfirm');
    Route::post('payment/expired','APIControllers\PaymentController@paymentExpired');

    //Account and Agent
    Route::get('account','APIControllers\AccountController@account');
    Route::post('account/update','APIControllers\AccountController@update');
    Route::post('register/agent','APIControllers\AccountController@agent');

    //get Image
    Route::get('getProfile','APIControllers\AccountController@getImageProfile');



});
