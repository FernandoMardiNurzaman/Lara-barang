<?php

use Illuminate\Support\Facades\Auth;
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


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard.index');

    Route::resource('category', 'CategoryController')->except(['show', 'create']);

    Route::resource('condition', 'ConditionController')->except(['show', 'create']);

    Route::resource('item', 'ItemController');
    Route::get('get-item', 'ItemController@getData')->name('get.item.data');
    Route::get('export/itemExcel', 'ItemController@exportExcel')->name("export.item.excel");

    Route::resource('customer', 'CustomerController');
    Route::get('/datacustomer', 'CustomerController@getData')->name("customer.data");
    Route::get('export/customer', 'CustomerController@exportExcel')->name('export.customer.excel');

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

    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::post('profile/informasidasar', 'ProfileController@updateInformation')->name('update.profile.information');
    Route::post('profile/updatepassword', 'ProfileController@updatePassword')->name('update.profile.password');
    Route::post('profile/updateimages', 'ProfileController@updateImage')->name('update.profile.image');


    Route::get('resetpassword/{id}', 'ProfileController@resetPassword')->name('reset.password');
});

Auth::routes([
    'register' => false,
    'password.request' => false,
    'password.reset' => false
]);


Route::get('/home', 'HomeController@index')->name('home');
