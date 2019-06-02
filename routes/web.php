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


Route::get('getproducttype','AjaxController@getProductType');
Route::group(['prefix' => 'admin'],function(){
	Route::resource('category','CategoryController');
	Route::resource('producttype','ProductTypeController');
	Route::resource('product','ProductController');
	
	Route::post('updatePro/{id}','ProductController@update');
});

Route::get('callback/{social}','UserController@handleProviderCallback');
Route::get('login/{social}','UserController@redirectProvider')->name('login.social');
Route::get('logout','UserController@logout');
Route::post('updatepass','UserController@updatePassClient')->name('updatepassword');
Route::post('login','UserController@loginClient')->name('login');
Route::post('register','UserController@registerClient')->name('register');

Route::get('/','HomeController@index');

Route::resource('cart','CartController');
Route::get('addcart/{id}','CartController@addCart')->name('addCart');
Route::get('checkout','CartController@checkout')->name('cart.ckeckout');

Route::resource('customer','CustomerController');