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

//if (App::environment('production')) {
//    URL::forceScheme('https');
//}

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/user',"UserController@index");

Auth::routes();

//Admin routes
Route::prefix('admin')->middleware(['isAdmin','auth'])->group(function (){

    //Dashboard
    Route::get('/dashboard',"Admin\AdminController@index")->name('dashboard');

    //Packet Umroh
    Route::get('/packet',"Admin\PacketUmrohController@index")->name('packetList');
    Route::get('/packet/detail/{id}',"Admin\PacketUmrohController@detail")->name('packetDetail');
    Route::get('/packet/create',"Admin\PacketUmrohController@create")->name('packetCreate');
    Route::post('/packet/store',"Admin\PacketUmrohController@store")->name('packetStore');
    Route::put('/packet/update/{id}',"Admin\PacketUmrohController@update")->name('packetUpdate');

    //Agent
    Route::get('/agents',"Admin\AgentController@index")->name('agentList');
    Route::get('/agents/detail/{id}',"Admin\AgentController@edit")->name('agentDetail');
    Route::post('/agents/approve',"Admin\AgentController@update")->name('agentApprove');

    //Payment Admin
    Route::get('/payment','Admin\PaymentController@index')->name('paymentList');
    Route::get('/payment/detail/{id}','Admin\PaymentController@detail')->name('paymentDetail');
    Route::post('/payment/update','Admin\PaymentController@update')->name('paymentUpdate');

    //Transaction Admin
    Route::get('/transaction','Admin\TransactionController@index')->name('transactionList');
    Route::get('/transaction/detail/{id}','Admin\TransactionController@detail')->name('transactionDetail');
    Route::get('/transaction/update','Admin\TransactionController@edit')->name('transactionEdit');
    Route::post('/transaction/update','Admin\TransactionController@update')->name('transactionUpdate');
    Route::get('/getPacket/{id}',"Admin\TransactionController@getPacket")->name('transactionGetPacket');

    //Master Data index
    Route::get('/master_data','Admin\MasterDataController@index')->name('masterData');

    //Master Data Method
    Route::get('/master_data/method/create','Admin\MasterDataController@createMethod')->name('createMethod');
    Route::post('/master_data/method/store','Admin\MasterDataController@storeMethod')->name('store.Method');
    Route::get('/master_data/method/edit/{id}','Admin\MasterDataController@editMethod')->name('edit.Method');
    Route::put('/master_data/method/update/{id}','Admin\MasterDataController@updateMethod')->name('update.Method');

    //Master Data Room
    Route::get('/master_data/room/create','Admin\MasterDataController@createRoomType')->name('createRoom');
    Route::post('/master_data/room/store','Admin\MasterDataController@storeRoomType')->name('storeRoom');
    Route::get('/master_data/room/edit/{id}','Admin\MasterDataController@editRoomType')->name('editRoom');
    Route::put('/master_data/room/update/{id}','Admin\MasterDataController@updateRoomType')->name('updateRoom');

    //Master Data Airlines
    Route::get('/master_data/airlines/create','Admin\MasterDataController@createAirlines')->name('createAirlines');
    Route::post('/master_data/airlines/store','Admin\MasterDataController@storeAirlines')->name('storeAirlines');
    Route::get('/master_data/airlines/edit/{id}','Admin\MasterDataController@editAirlines')->name('editAirlines');
    Route::put('/master_data/airlines/update/{id}','Admin\MasterDataController@updateAirlines')->name('updateAirlines');

    //Master Data Category
    Route::get('/master_data/category/create','Admin\MasterDataController@createCategory')->name('createCategory');
    Route::post('/master_data/category/store','Admin\MasterDataController@storeCategory')->name('storeCategory');
    Route::get('/master_data/category/edit/{id}','Admin\MasterDataController@editCategory')->name('editCategory');
    Route::put('/master_data/category/update/{id}','Admin\MasterDataController@updateCategory')->name('updateCategory');

    //Master Data bank and rekening
    Route::get('/master_data/bank/create','Admin\MasterDataController@createBank')->name('createBank');
    Route::post('/master_data/bank/store','Admin\MasterDataController@storeBank')->name('storeBank');
    Route::get('/master_data/rekening/add','Admin\MasterDataController@addRekening')->name('addRekening');
    Route::post('/master_data/rekening/store','Admin\MasterDataController@storeRekening')->name('storeRekening');
    Route::get('/master_data/rekening/edit/{id}','Admin\MasterDataController@editRekening')->name('editRekening');
    Route::put('/master_data/rekening/update/{id}','Admin\MasterDataController@updateRekening')->name('updateRekening');
});

//* User Route *///
Route::prefix('u')->group(function (){

    //Routes guest
    Route::get('/home', 'User\HomeController@index')->name('home');
    Route::get('/listPacket','User\HomeController@show')->name('listPacket');
    Route::get('/listPacket/detail/{id}','User\HomeController@detail')->name('detailPacket');

    //Routes auth
    Route::middleware(['isUser','auth'])->group(function (){

        //Transaction order
        Route::get('/order','User\TransactionController@index')->name('orderPacket');
        Route::post('/order/purchase','User\TransactionController@store')->name('orderStore');
        Route::post('/checkCodeAgent','User\TransactionController@checkCodeAgent')->name('checkCodeAgent');
        //payment
        Route::get('/payment/{id}','User\PaymentController@index')->name('paymentIndex');
        Route::post('/payment/confirm','User\PaymentController@confirm')->name('paymentConfirm');
        Route::get('/payment/expired/{id}','User\PaymentController@expired')->name('paymentExpired');

        //purchase list
        Route::get('/purchase-list/{id}','User\TransactionController@showList')->name('purchaseShow');

        Route::get('/account','User\UserController@index')->name('account');
        Route::post('/account/agent','User\UserController@agent')->name('agent');
        Route::post('/account/update','User\UserController@update')->name('account.update');
    });
});




/**
Route::get('{path}','HomeController@index')->where( 'path', '([A-z\d-/_.]+)?' );**/

