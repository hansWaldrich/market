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
    return view('login');
});

Route::get('/products', 'ProductsController@getProducts');

Route::post('/login/auth', 'AuthValidate@validateAuthentication');

Route::get('/mail', [
	'uses' => 'MailController@send',
	'as' => 'mail.send'
]);

Route::get('/remove/{id}', [
	'uses' => 'ProductsController@getRemoveItem',
	'as' => 'product.removeItem'
]);

Route::get('/products/{id}', [
	'uses' => 'ProductsController@addItems',
	'as' => 'product.addToCart'
]);

Route::get('/cart', [
	'uses' => 'ProductsController@getCart',
	'as' => 'product.getCart'
]);

Route::get('/changeMoneyType/{type}', [
	'uses' => 'ChangeMoneyType@change',
	'as' => 'change.changeMoneyType'
]);

Route::get('/finish', [
	'uses' => 'FinishController@finish',
	'as' => 'product.finish'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
