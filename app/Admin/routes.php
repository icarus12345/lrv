<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
	\DB::listen(function($sql) {
		\Log::info([ 
			'sql' 		=> $sql->sql,
			'bindings'	=> $sql->bindings,
		]);
	});
    Route::get('/', 'HomeController@index')->name('admin.home');

	Route::group(['prefix' => 'type/{type}', 'where' => ['type' => '[a-zA-Z0-9-_]+']],function (){
	    Route::resource('post', 'PostController');
		Route::resource('categories', 'CategoryController');
		Route::resource('product', 'ProductController');
		Route::resource('banners', 'BannerController');
	});
	Route::resource('post', 'PostController');
	Route::resource('categories', 'CategoryController');
	Route::resource('product', 'ProductController');
	Route::resource('banners', 'BannerController');
});
