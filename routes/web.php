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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => []], function()
{
    Route::get('/main', 'AdminController@mainAdminPanel')->name('admin.main');

    Route::get('/passengers', 'AdminController@showPassengers')->name('show.passengers');

    Route::get('/automobiles', 'AdminController@showAutomobiles')->name('show.automobiles');

    Route::get('/drivers', 'AdminController@showDrivers')->name('show.drivers');

    Route::get('/orders', 'AdminController@showOrders')->name('show.orders');

    Route::get('/roadlists', 'AdminController@showRoadLists')->name('show.road.lists');

}
);





Route::get('/home', 'HomeController@index')->name('home');
