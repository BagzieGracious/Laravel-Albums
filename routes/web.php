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


// authentication
Route::get('/login', 'SessionController@create');
Route::get('/users/profile', 'SessionController@show');
Route::patch('/users/profile', 'SessionController@update');
Route::patch('/users/resetpassword', 'SessionController@reset');

Route::post('/login', 'SessionController@store')->name('login');
Route::get('/logout', 'SessionController@destroy');

Route::resource('register', 'RegistrationController');
