<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','HomeController@index');
Route::get('login','SessionsController@create');
Route::get('logout','SessionsController@destroy');
Route::get('add/{product_id}','SessionsController@addProduct');


Route::resource('sessions','SessionsController');