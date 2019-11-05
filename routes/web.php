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
Route::get('/shop/add-to-cart', 'ShopController@addToCart');
Route::get('/shop/category/{id}', 'ProductController@category')->where(['id'=>'[0-9]+']);
Route::post('/shop/category/{id}', 'ProductController@category')->where(['id'=>'[0-9]+']);
Route::get('/blog', 'PostController@index');
Route::post('/blog', 'PostController@index');
Route::get('/blog/category/{id}', 'PostController@category')->where(['id'=>'[0-9]+']);
Route::post('/blog/category/{id}', 'PostController@category')->where(['id'=>'[0-9]+']);

Route::get('locale/{locale}', 'HomeController@locale')->name('locale');
