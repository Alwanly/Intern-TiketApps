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
Route::prefix('admin')->middleware(['isAdmin','auth'])->group(function (){
    Route::get('/dashboard',"Admin\AdminController@index")->name('dashboard');

    Route::get('/packet',"Admin\PacketUmrohController@index")->name('packetList');
    Route::get('/packet/detail/{id}',"Admin\PacketUmrohController@detail")->name('packetDetail');
    Route::get('/packet/create',"Admin\PacketUmrohController@create")->name('packetCreate');
    Route::post('/packet/store',"Admin\PacketUmrohController@store")->name('packetStore');
    Route::put('/packet/update/{id}',"Admin\PacketUmrohController@update")->name('packetUpdate');

    Route::get('/agents',"Admin\AdminController@indexAgent")->name('agentList');
    Route::get('/agents/detail/{id}','Admin\AdminController@detailAgent')->name('agentDetail');

    Route::get('/payment','Admin\PaymentController@index')->name('paymentList');
    Route::get('/payment/detail/{id}','Admin\PaymentController@detail')->name('paymentDetail');
    Route::post('/payment/update','Admin\PaymentController@update')->name('paymentUpdate');

    Route::get('/transaction','Admin\TransactionController@index')->name('transactionList');
    Route::get('/transaction/detail/{id}','Admin\TransactionController@detail')->name('transactionDetail');
    Route::get('/transaction/update','Admin\TransactionController@edit')->name('transactionEdit');
    Route::post('/transaction/update','Admin\TransactionController@update')->name('transactionUpdate');
    Route::get('/getpacket/{id}',"Admin\TransactionController@getPacket")->name('transactionGetPacket');

    Route::get('/master_data','Admin\MasterDataController@index')->name('masterData');

    Route::get('/master_data/method/create','Admin\MasterDataController@createMethod')->name('createMethod');
    Route::post('/master_data/method/store','Admin\MasterDataController@storeMethod')->name('store.Method');
    Route::get('/master_data/method/edit/{id}','Admin\MasterDataController@editMethod')->name('edit.Method');
    Route::put('/master_data/method/update/{id}','Admin\MasterDataController@updateMethod')->name('update.Method');

    Route::get('/master_data/room/create','Admin\MasterDataController@createRoomType')->name('createRoom');
    Route::post('/master_data/room/store','Admin\MasterDataController@storeRoomType')->name('storeRoom');
    Route::get('/master_data/room/edit/{id}','Admin\MasterDataController@editRoomType')->name('editRoom');
    Route::put('/master_data/room/update/{id}','Admin\MasterDataController@updateRoomType')->name('updateRoom');

    Route::get('/master_data/airlines/create','Admin\MasterDataController@createAirlines')->name('createAirlines');
    Route::post('/master_data/airlines/store','Admin\MasterDataController@storeAirlines')->name('storeAirlines');
    Route::get('/master_data/airlines/edit/{id}','Admin\MasterDataController@editAirlines')->name('editAirlines');
    Route::put('/master_data/airlines/update/{id}','Admin\MasterDataController@updateAirlines')->name('updateAirlines');


    Route::get('/master_data/category/create','Admin\MasterDataController@createCategory')->name('createCategory');
    Route::post('/master_data/category/store','Admin\MasterDataController@storeCategory')->name('storeCategory');
    Route::get('/master_data/category/edit/{id}','Admin\MasterDataController@editCategory')->name('editCategory');
    Route::put('/master_data/category/update/{id}','Admin\MasterDataController@updateCategory')->name('updateCategory');

    Route::get('/master_data/bank/create','Admin\MasterDataController@createBank')->name('createBank');
    Route::post('/master_data/bank/store','Admin\MasterDataController@storeBank')->name('storeBank');

    Route::get('/master_data/rekening/add','Admin\MasterDataController@addRekening')->name('addRekening');
    Route::post('/master_data/rekening/store','Admin\MasterDataController@storeRekening')->name('storeRekening');
    Route::get('/master_data/rekening/edit/{id}','Admin\MasterDataController@editRekening')->name('editRekening');
    Route::put('/master_data/rekening/update/{id}','Admin\MasterDataController@updateRekening')->name('updateRekening');
});
//* User Route *///
Route::get('/home', 'User\HomeController@index')->name('home');
Route::get('/listPacket','User\HomeController@show')->name('listPacket');
Route::prefix('u')->middleware(['isUser','auth'])->group(function (){

    Route::get('/listPacket/detail/{id}','User\HomeController@detail')->name('detailPacket');
    Route::post('/order','User\TransactionController@index')->name('orderPacket');
    Route::post('/order/purchase','User\TransactionController@store')->name('orderStore');

    Route::get('/payment/{id}','User\PaymentController@index')->name('paymentIndex');
    Route::post('/payment/confirm','User\PaymentController@confirm')->name('paymentConfirm');
    Route::get('/payment/expired/{id}','User\PaymentController@expired')->name('paymentExpired');

    Route::get('/purchase-list/{id}','User\TransactionController@showList')->name('purchaseShow');

});


Route::get('/purchase/list',function (){
    return view('user.purchaseList');
});

Route::get('/account/profile',function (){
    return view('user.accountProfile');
});


/**
Route::get('{path}','HomeController@index')->where( 'path', '([A-z\d-/_.]+)?' );**/

