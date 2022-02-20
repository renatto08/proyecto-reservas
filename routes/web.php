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

Route::group([
    //'namespace'  => 'app\Http\Controllers\Auth',
    'middleware' => 'web',
    'prefix'     => config('backpack.base.route_prefix'),
], function () { // custom admin routes
// Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('backpack.auth.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout')->name('backpack.auth.logout');
    Route::post('logout', 'Auth\LoginController@logout');

// Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('backpack.auth.register');
    Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('backpack.auth.password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('backpack.auth.password.reset.token');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('backpack.auth.password.email');

});

Auth::routes(['verify' => true]);


Route::get('/assignRole','HomeController@assignRoleAdmin');
Route::get('/','backoffice\LoginController@index');

 //Route::get('/','SiteController@index');
 /*Route::get('/',function (){
    return redirect()->route('login');
});*/

Route::get('/home','HomeController@index');

Route::get('/email','EmailTestController@reserva');

Route::get('deploy','DeployController@deploy');
Route::post('deploy','DeployController@deploy');


Route::group([
   'prefix' => 'backoffice',
    'namespace' => '\App\Http\Controllers\Backoffice'
],function(){
    Route::get('/',function (){
        return redirect()->route('login');
    });
    Route::get('login','LoginController@index')->name('login');
    Route::post('login','LoginController@postLogin')->name('b.login');

    Route::group([
        'middleware' => ['web','auth.client']/*,
        'guard' => backpack_guard_name(),*/
    ],function (){

        Route::get('select-shop', 'DashboardController@selectShop')->name('b.selectshop');
        //Route::post('select-shop', 'DashboardController@postSelectShop')->name('b.post.selectshop');
        Route::get('select-shop-change', 'DashboardController@postSelectShop')->name('b.get.selectshop');

        Route::group([
            'middleware' => ['shop.client'],
        ],function (){
            Route::get('logout', 'LoginController@logout')->name('b.logout');

            Route::get('dashboard','DashboardController@index')->name('b.dashboard');

            Route::resource('clients','ClientController');
            Route::get('client_search','ClientController@search')->name('clients.search');

            Route::get('orders-detail-sku','OrderController@detail_sku')->name('orders.detail_sku');
            Route::get('orders-received','OrderController@received')->name('orders.received');
            Route::get('orders-total-sell','OrderController@total_sell')->name('orders.received_total');
            Route::get('orders/createsell','OrderController@createSell')->name('orders.create_sell');
            Route::get('orders/sell/{order}/{edit?}','OrderController@sell')->name('orders.sell');
            Route::get('orders/print/{order}','OrderController@print')->name('orders.print');
            Route::resource('orders','OrderController');
            Route::get('order_salida/table_ajax','OrdenSalidaController@table_ajax');
            Route::resource('order_salida','OrdenSalidaController');

            Route::get('inventary','InventaryController@index')->name('b.inventary.index');
            Route::post('inventary/import','InventaryController@import')->name('b.inventary.import');
        });

    });

    Route::group([
        'prefix' => 'api'
    ],function(){
        Route::get('search_product','ApiController@search_producto');
        Route::get('search_producto_inventary','ApiController@search_producto_inventary');
        Route::get('detail_order','ApiController@detail_order');
        Route::get('attribute_product','ApiController@attribute_search');
        Route::get('category_parent','ApiController@category_parent');
        Route::get('color','ApiController@color');
        Route::get('size','ApiController@size');
        Route::get('product','ApiController@product');
        Route::get('category','ApiController@category_search');
        Route::get('client','ApiController@client_search');
        Route::get('campaign','ApiController@campaign_search');
        Route::get('coupon','ApiController@coupon_search');
    });
});

Route::group([
    'prefix' => 'shop',
    'namespace' => '\App\Http\Controllers\Client'
],function(){
    Route::get('redirect/{id}','ShopController@redirect')->name('shop.redirect');
    Route::get('{code}','ShopController@home')->name('shop.home');
    Route::get('{code}/account','ShopController@account')->name('shop.account');
    Route::post('{code}/login','LoginController@postLogin')->name('shop.login');

    Route::get('{code}/cart','ShopController@cart')->name('shop.cart');
    Route::get('{code}/checkout','ShopController@checkout')->name('shop.checkout');
    Route::post('{code}/checkout_post','ShopController@checkout_post')->name('shop.checkout_post');

    Route::get('{code}/shop','ShopController@shop')->name('shop.shop');
    Route::get('{code}/shop/{category}/{category_id}','ShopController@shop')->name('shop.category');

    Route::get('{code}/product/{product_id}-{slug}','ShopController@product')->name('shop.product');

    Route::post('{code}/subscription','ShopController@subscription')->name('shop.subscription');

    Route::post('{code}/add_cart','ShopController@add_cart')->name('shop.add_cart');
    Route::post('{code}/add_wishlist','ShopController@add_wishlist')->name('shop.add_wishlist');

    Route::post('{code}/update_cart','ShopController@update_cart')->name('shop.update_cart');
    Route::get('{code}/delete_wishlist','ShopController@delete_wishlist')->name('shop.delete_wishlist');
    Route::get('{code}/delete_cart','ShopController@delete_cart')->name('shop.delete_cart');


    Route::post('{code}/buy','ShopController@buy')->name('shop.buy');
    Route::get('{code}/success','ShopController@success')->name('shop.success');
    Route::get('{code}/wishlist','ShopController@wishlist')->name('shop.wishlist');
    Route::get('{code}/contact','ShopController@contact')->name('shop.contact');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/','SiteController@index');
Route::get('/about', 'SiteController@about')->name('about');
Route::get('/contact', 'SiteController@contact')->name('contact');
Route::get('/catalogo', 'SiteController@catalogo')->name('catalogo');
