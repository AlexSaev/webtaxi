<?php
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => ['is.admin']], function()
{
    Route::get('/main', 'AdminController@mainAdminPanel')->name('admin.main');

    Route::get('/passengers', 'AdminController@showPassengers')->name('show.passengers');
    Route::post('/deletePassenger', 'AdminController@deletePassenger')->name('delete.passenger');
    Route::post('/createPassenger', 'AdminController@createPassenger')->name('create.passenger');
    Route::post('/updatePassenger', 'AdminController@updatePassenger')->name('update.passenger');
    Route::post('/enterPassengerInfo', 'AdminController@enterPassengerInfo')->name('enter.passenger.info');

    Route::get('/automobiles', 'AdminController@showAutomobiles')->name('show.automobiles');
    Route::post('/deleteAutomobile', 'AdminController@deleteAutomobile')->name('delete.automobile');
    Route::post('/createAutomobile', 'AdminController@createAutomobile')->name('create.automobile');
    Route::post('/updateAutomobile', 'AdminController@updateAutomobile')->name('update.automobile');
    Route::post('/enterAutomobileInfo', 'AdminController@enterAutomobileInfo')->name('enter.automobile.info');

    Route::get('/drivers', 'AdminController@showDrivers')->name('show.drivers');
    Route::post('/deleteDriver', 'AdminController@deleteDriver')->name('delete.driver');
    Route::post('/createDriver', 'AdminController@createDriver')->name('create.driver');
    Route::post('/updateDriver', 'AdminController@updateDriver')->name('update.driver');
    Route::post('/enterDriverInfo', 'AdminController@enterDriverInfo')->name('enter.driver.info');

    Route::get('/orders', 'AdminController@showOrders')->name('show.orders');
    Route::post('/deleteOrder', 'AdminController@deleteOrder')->name('delete.order');
    Route::post('/createOrder', 'AdminController@createOrder')->name('create.order');
    Route::post('/updateOrder', 'AdminController@updateOrder')->name('update.order');
    Route::post('/enterOrderInfo', 'AdminController@enterOrderInfo')->name('enter.order.info');

    Route::get('/roadlists', 'AdminController@showRoadLists')->name('show.roadLists');
    Route::post('/deleteRoadList', 'AdminController@deleteRoadList')->name('delete.roadList');
    Route::post('/createRoadList', 'AdminController@createRoadList')->name('create.roadList');
    Route::post('/updateRoadList', 'AdminController@updateRoadList')->name('update.roadList');
    Route::post('/enterRoadListInfo', 'AdminController@enterRoadListInfo')->name('enter.roadList.info');

});

Route::group(['prefix' => 'passenger', 'middleware' => []], function ()
{
    Route::get('/main', 'PassengerController@mainPassengerPanel')->name('passenger.main');
    Route::post('/makeOrder', 'PassengerController@makeOrder')->name('make.order');
    Route::get('/checkOrder', 'PassengerController@checkOrder')->name('check.order');
    Route::get('/showAllOrders', 'PassengerController@showAllOrders')->name('show.all.orders');
});

Route::group(['prefix' => 'driver', 'middleware' => []], function ()
{
    Route::get('/main', 'DriverController@mainDriverPanel')->name('driver.main');

    Route::post('/takeOrder', 'DriverController@takeOrder')->name('take.order');

    Route::get('/showAvailableOrders', 'DriverController@showAvailableOrders')->name('show.available.orders');

    Route::get('/showTakenOrder', 'DriverController@showTakenOrder')->name('show.taken.order');

    Route::get('/showFinishedOrders', 'DriverController@showFinishedOrders')->name('show.finished.orders');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/getTravelDistance', 'PriceController@getTravelDistance')->name('get.distance');

//Route::get('/main', '')