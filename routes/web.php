<?php

use Illuminate\Support\Facades\Route;

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


Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard.index');

    Route::resource('category', 'CategoryController')->except(['show', 'create']);

    Route::resource('condition', 'ConditionController')->except(['show', 'create']);

    Route::resource('item', 'ItemController');
    Route::get('get-item', 'ItemController@getData')->name('get.item.data');
    Route::get('export/itemExcel', 'ItemController@export')->name("export.item.excel");

    Route::resource('customer', 'CustomerController');
    Route::get('/datacustomer', 'CustomerController@getData')->name("customer.data");
    Route::get('export/customer_data', 'CustomerController@exportExcel')->name('export.customer.excel');

    Route::resource('user', 'UserController');
    Route::get('datauser', 'UserController@getData')->name('user.data');

    Route::resource('status', 'StatusController');
    Route::resource('locker', 'LockerController');

    Route::resource('schedule', 'ScheduleController');
    Route::get('get-schedule', 'ScheduleController@getData')->name('get.schedule.data');
    Route::get('/update/status/{id}', 'ScheduleController@updateStatus')->name("admin.schedule.update.status");
    Route::get('export/shecdule', 'ScheduleController@exportExcel')->name('export.schedule.excel');

    Route::resource('exit', 'ItemExitController');
    Route::get('dataExit', 'ItemExitController@getData')->name('data.exit');
    Route::get('export/itemexitexcel', 'ItemExitController@exportExcel')->name('export.item.exit.excel');
    Route::get('export/itemexitpdf/{id}', 'ItemExitController@exportPdf')->name('export.item.exit.pdf');
    Route::view('profile', 'admin.profile.edit');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
