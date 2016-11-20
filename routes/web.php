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

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//$this->get('register', 'Auth\RegisterController@showRegistrationForm');
//$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/', 'SiteController@index');
Route::get('/orders', 'OrderController@index');



Route::get('/order/create', 'OrderController@create');
Route::post('/order/store', 'OrderController@store');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/admin/info/edit', 'Admin\InfoController@edit');
	Route::post('/admin/info/store', 'Admin\InfoController@store');

	Route::get('/admin/purchase/edit', 'Admin\PurchaseController@edit');
	Route::post('/admin/purchase/store', 'Admin\PurchaseController@store');
});

