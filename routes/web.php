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
#Route::group(['middleware' => 'web'], function() {
	Route::get('/', 'HomeController@index');

	Auth::routes(['verify' => true]);

	Route::group([
		'middleware' => ['auth'],
	], function () {
		Route::group([
			'middleware' => ['verified'],
		], function () {
			Route::get('/account', 'AccountController@index')->name('account.index');
			Route::get('/account/payment-method', 'AccountController@paymentMethod')->name('account.payment.method');
			Route::get('/account/address', 'AccountController@address')->name('account.address');
			Route::get('/account/transaction', 'AccountController@transaction')->name('account.transaction');
			Route::get('/account/transaction/{status}', 'AccountController@transaction')->name('account.transaction.status');
			
			Route::post('/account/profile/update', 'AccountController@updateProfile')->name('account.profile.update');
			
		});
		// Route::get('/demo', 'HomeController@demo')->name('demo');
	});

	Route::get('/home', 'HomeController@index');
	Route::get('/about', 'HomeController@about');
	Route::get('/contact', 'HomeController@contact');
	Route::get('/product/detail/{id}', 'ProductController@detail')->where(['id'=>'[0-9]+']);

	Route::get('/shop', 'ProductController@index');
	Route::post('/shop', 'ProductController@index');

	Route::get('/shop/cart', 'ShopController@index');
	Route::post('/shop/cart', 'ShopController@index');
	Route::get('/shop/checkout', 'ShopController@checkout');
	Route::post('/shop/checkout', 'ShopController@createOrder');
	Route::get('/order/ORD{no}', 'ShopController@orderDetail');

	Route::post('/send-request', 'HomeController@sendRequest');

	Route::get('/shop/add-to-cart', 'ShopController@addToCart');
	Route::post('/shop/add-to-cart', 'ShopController@addToCart');
	Route::post('/shop/remove-from-cart', 'ShopController@removeFromCart');
	Route::post('/shop/update-to-cart', 'ShopController@updateToCart');
	Route::post('/shop/update-shiping-type', 'ShopController@updateShipingType');
	Route::post('/shop/apply-coupon', 'ShopController@applyCoupon');
	Route::post('/shop/remove-coupon', 'ShopController@removeCoupon');

	Route::get('/shop/category/{id}', 'ProductController@category')->where(['id'=>'[0-9]+']);
	Route::post('/shop/category/{id}', 'ProductController@category')->where(['id'=>'[0-9]+']);

	Route::get('/blog', 'PostController@index');
	Route::get('/blog/category/{id}', 'PostController@category')->where(['id'=>'[0-9]+']);
	Route::get('/blog/archive/{month}', 'PostController@archive')->where(['month'=>'[0-9-]+']);
	Route::get('/blog/detail/{id}', 'PostController@detail')->where(['month'=>'[0-9]+']);

	Route::post('/comment/{topic_type}/{topic_id}/add', 'CommentController@add')->where([
		'topic_id'=>'[0-9]+'
	]);

	Route::get('locale/{locale}', 'HomeController@locale')->name('locale');
	Route::get('currency/{currency}', 'HomeController@currency')->name('currency');
#});
