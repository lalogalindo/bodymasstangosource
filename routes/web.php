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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/records/{user}', 'HomeController@records')->name('records');

Route::post('/records','HomeController@newRecord')->name('newRecord');

Route::get('/calculator', 'HomeController@calculator')->name('calculator');
