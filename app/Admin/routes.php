<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');

	Route::resource('post', 'PostController');
	Route::resource('categories', 'CategoryController');
	Route::group(['prefix' => 'type/{type}', 'where' => ['type' => '[a-zA-Z0-9-_]+']],function (){
	    Route::resource('post', 'PostController');
		Route::resource('categories', 'CategoryController');
	});
});
