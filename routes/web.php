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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index');

//Booking
Route::get('/', 'BookingController@index');
Route::get('/booking', 'BookingController@bookingIndex');

//Rates
Route::resource('rate', 'RatesController');
Route::get('rate/delete/{id}','RatesController@destroy');
Route::post('rate/update/{id}','RatesController@update');
Route::get('rate-list','RatesController@RateList');

//Timings
Route::resource('timing', 'TimingController');
Route::get('timing/delete/{id}','TimingController@destroy');
Route::post('timing/update/{id}','TimingController@update');
Route::get('timing-list','TimingController@TimingList');

//Timings Overrides
Route::resource('timing-override', 'TimingOverrideController');
Route::get('timing-override/delete/{id}','TimingOverrideController@destroy');
Route::post('timing-override/update/{id}','TimingOverrideController@update');
Route::get('timing-override-list','TimingOverrideController@TimingList');

//Number of cleaning services at once
Route::resource('cleaning', 'NoOfCleaningController');
Route::get('cleaning/delete/{id}','NoOfCleaningController@destroy');
Route::post('cleaning/update/{id}','NoOfCleaningController@update');
Route::get('cleaning-list','NoOfCleaningController@CleaningList');

//Services
Route::resource('service', 'ServiceController');
Route::get('service/delete/{id}','ServiceController@destroy');
Route::post('service/update/{id}','ServiceController@update');
Route::get('service-list','ServiceController@ServicesList');
