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
	Route::get('/formreg', 'AuthController@formreg')->name('auth.formreg');
	Route::post('/register', 'AuthController@register')->name('auth.register');
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

	Route::get('json/product', 'JsonController@product')->name('json.product');
	Route::get('json/category', 'JsonController@category')->name('json.category');
	Route::get('json/payment', 'JsonController@payment')->name('json.payment');
	Route::get('json/user', 'JsonController@user')->name('json.user');
	Route::get('json/order', 'JsonController@order')->name('json.order');

	Route::get('/sendmail', 'MailController@index')->name('mails.index');
	Route::post('/sendmailTo', 'MailController@send')->name('mails.send');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

/**
 * Password Reset Route(S)
 */
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
