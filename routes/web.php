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
		Route::get('/home', 'HomeController@index')->name('home');
	});
	Route::get('/demo', 'HomeController@demo')->name('demo');

});
// Allow roles `administrator` and `editor` access the routes under group.

