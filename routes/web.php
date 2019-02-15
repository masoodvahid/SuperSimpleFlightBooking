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


Auth::routes();

Route::get('/', 'FlightController@list');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/search', 'FlightController@search');

Route::get('/reserve/{id}', 'FlightController@show');

Route::post('/reserve', 'FlightController@reserve');

Route::get('/delete/{user_id}/{flight_id}', 'FlightController@delete');



