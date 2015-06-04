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
Route::post('add',array('before'=>'auth','uses'=>'SessionsController@addProduct'));
Route::get('shop','HomeController@indexShop');
Route::get('empty','SessionsController@emptyCart');
Route::get('remove/{product_id}','SessionsController@removeProduct');
Route::post('update','SessionsController@updateQuantityProduct');
Route::get('shop/user_details','HomeController@userDetails');
Route::post('store','UserController@store');


Route::resource('sessions','SessionsController');