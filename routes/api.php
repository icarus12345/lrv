<?php

use Illuminate\Routing\Router;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Admin::routes();
Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    // 'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    Route::get('categories/{type}', function($type) {
        // If the Content-Type and Accept headers are set to 'application/json', 
        // this will return a JSON structure. This will be cleaned up later.
        $rows = \App\Models\Category::where('type', $type)->get();
        return \App\Models\Category::buildNested($rows);
        //return \App\Models\Category::all()->toArray();
    });
    
    Route::get('products', '\App\Admin\Controllers\ProductController@apiList')
        ->name('api.product.list');
    Route::get('products/{id}', '\App\Admin\Controllers\ProductController@apiDetail')
        ->where(['id'=>'[0-9]+'])
        ->name('api.product.detail');

    Route::get('warehouses', '\App\Admin\Controllers\WarehouseController@list')->name('warehouses.list');
    Route::get('warehouses/avaiable-by-product-id', '\App\Admin\Controllers\WarehouseController@avaiable')->name('warehouses.avaiable');
    Route::get('orders', '\App\Admin\Controllers\OrderController@list')->name('order.list');
    Route::get('orders/detail/{order_id}', '\App\Admin\Controllers\OrderController@orderDetailList')->name('order.detail.list');
    Route::get('orders/out-of-stock/{order_id}', '\App\Admin\Controllers\OrderController@orderOutOfStock')->name('order.outofstock');

    // Route::put('product/{id}', '\App\Admin\Controllers\ProductController@apiUpdate')->name('product.update');
});