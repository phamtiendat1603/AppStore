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
<<<<<<< HEAD
Route::post('admin/login','UserController@loginAdmin')->name('admin.login');
Route::view('admin/login','admin.pages.login')->name('login.admin');
=======
//Admin
Route::view('admin/login','admin.pages.login')->name('login.admin');
Route::post('admin/login','UserController@loginAdmin')->name('admin.login');
>>>>>>> 166467ded0d365a09d37792c0aa378a1696bcc66

Route::get('getproducttype','AjaxController@getProductType');
Route::group(['prefix' => 'admin', 'middleware' => 'adminMiddleware'],function(){
	Route::view('/','admin.pages.index');
	Route::resource('category','CategoryController');
	Route::resource('producttype','ProductTypeController');
	Route::resource('product','ProductController');
	Route::post('updatePro/{id}','ProductController@update');
<<<<<<< HEAD
=======

>>>>>>> 166467ded0d365a09d37792c0aa378a1696bcc66
	Route::resource('order','OrderController');
});

//Client
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
