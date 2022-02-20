<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('shop', 'ShopCrudController');
    Route::crud('slider', 'SliderCrudController');
    Route::crud('client', 'ClientCrudController');
    Route::crud('color', 'ColorCrudController');
    Route::crud('size', 'SizeCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('product', 'ProductCrudController');
    Route::crud('coupon', 'CouponCrudController');
    Route::crud('campaign', 'CampaignCrudController');
    Route::crud('order', 'OrderCrudController');
    Route::crud('shopuser', 'ShopUserCrudController');
    Route::crud('flete', 'FleteCrudController');
    Route::crud('attributeproduct', 'AttributeProductCrudController');
    Route::crud('inventary_product', 'Inventary_productCrudController');
    Route::crud('user', 'UserCrudController');
    Route::crud('suscription', 'SuscriptionCrudController');
}); // this should be the absolute last line of this file