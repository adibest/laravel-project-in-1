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

Route::prefix('admin')->group(function () {
	Route::get('/form', 'AuthController@form')->name('auth.form');
	Route::post('/login', 'AuthController@login')->name('auth.login');
	Route::post('/logout', 'AuthController@logout')->name('auth.logout');
	// Route::get('/home', function () {
	// 	return view('index');
	// });
	Route::get('/home', 'HomeController@index')->name('home.index');
	Route::resource('/categories', 'CategoryController');
	Route::resource('/payments', 'PaymentController');
	Route::resource('/users', 'UserController');
	Route::resource('/products', 'ProductController');
	Route::resource('/orders', 'OrderController');
	Route::get('/filters', 'FilterController@index')->name('filters.index');
	Route::post('/filters/show', 'FilterController@show')->name('filters.show');
	Route::post('/filters/print', 'FilterController@print')->name('filters.print');
	Route::post('/filters/export', 'FilterController@export')->name('filters.export');
	Route::post('/orders/print', 'OrderController@print')->name('orders.print');
});
