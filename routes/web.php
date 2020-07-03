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

if (App::environment('production')) {
    URL::forceScheme('https');
}
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/user',"UserController@index");

Auth::routes();
Route::middleware(['isAdmin','auth'])->group(function (){});
Route::get('/dashboard',"Admin\AdminController@index")->name('dashboard');
Route::get('/packet',"Admin\AdminController@packet")->name('packetList');
Route::get('/packet/detail/{id}',"Admin\AdminController@detailPacket")->name('packetDetail');
Route::get('/packet/create',"Admin\AdminController@createPacket")->name('packetCreate');

Route::get('/agents',"Admin\AdminController@indexAgent")->name('agentList');
Route::get('/agents/detail/{id}','Admin\AdminController@detailAgent')->name('agentDetail');

Route::get('/payment','Admin\PaymentController@index')->name('paymentList');
Route::get('/payment/detail/{id}','Admin\PaymentController@detail')->name('paymentDetail');

Route::get('/transaction','Admin\TransactionController@index')->name('transactionList');
Route::get('/transaction/detail/{id}','Admin\TransactionController@detail')->name('transactionDetail');
Route::get('/transaction/update','Admin\TransactionController@update')->name('transactionUpdate');

Route::get('/master_data','Admin\MasterDataController@index')->name('masterData');
Route::get('/master_data/create_method','Admin\MasterDataController@createMethod')->name('createMethod');
Route::get('/master_data/create_room_type','Admin\MasterDataController@createRoomType')->name('createRoom');
Route::get('/master_data/create_airlines','Admin\MasterDataController@createAirlines')->name('createAirlines');
Route::get('/master_data/create_category','Admin\MasterDataController@createCategory')->name('createCategory');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/listPacket', function (){
    return view('user.listProduct');
});
Route::get('/listPacket/detail',function (){
    return view('user.detailProduct');
});
Route::get('/purchase',function (){
    return view('user.transaction');
});

Route::get('/purchase/payment',function (){
    return view('user.paymentConfirm');
});

Route::get('/purchase/list',function (){
    return view('user.purchaseList');
});

Route::get('/account/profile',function (){
    return view('user.accountProfile');
});


/**
Route::get('{path}','HomeController@index')->where( 'path', '([A-z\d-/_.]+)?' );**/

