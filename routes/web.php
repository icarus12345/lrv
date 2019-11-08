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

Auth::routes(['verify' => true]);

Route::group([
	'middleware' => ['auth'],
], function () use ($router) {
	Route::group([
		'middleware' => ['verified'],
	], function () use ($router) {
		// Route::get('/home', 'HomeController@index')->name('home');
	});
	// Route::get('/demo', 'HomeController@demo')->name('demo');
});

Route::get('/home', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/product/detail/{id}', 'ProductController@detail')->where(['id'=>'[0-9]+']);

Route::get('/shop', 'ProductController@index');
Route::post('/shop', 'ProductController@index');

Route::get('/shop/cart', 'ShopController@index');
Route::get('/shop/add-to-cart', 'ShopController@addToCart');
Route::post('/shop/add-to-cart', 'ShopController@addToCart');
Route::post('/shop/remove-from-cart', 'ShopController@removeFromCart');
Route::post('/shop/update-to-cart', 'ShopController@updateToCart');
Route::post('/shop/update-shiping-type', 'ShopController@updateShipingType');

Route::get('/shop/category/{id}', 'ProductController@category')->where(['id'=>'[0-9]+']);
Route::post('/shop/category/{id}', 'ProductController@category')->where(['id'=>'[0-9]+']);

Route::get('/blog', 'PostController@index');
Route::get('/blog/category/{id}', 'PostController@category')->where(['id'=>'[0-9]+']);
Route::get('/blog/archive/{month}', 'PostController@archive')->where(['month'=>'[0-9-]+']);
Route::get('/blog/detail/{id}', 'PostController@detail')->where(['month'=>'[0-9]+']);
Route::post('/blog/{id}/comment', 'PostController@comment')->where(['id'=>'[0-9]+']);

Route::get('locale/{locale}', 'HomeController@locale')->name('locale');
