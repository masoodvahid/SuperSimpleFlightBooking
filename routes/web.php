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

Route::get('/', 'FlightController@list');

Route::post('/search', 'FlightController@search');

Route::get('/reserve/{id}', 'FlightController@reserve');

Route::post('/register', 'FlightController@regiser');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
