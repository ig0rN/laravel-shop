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
    return redirect()->route('login');
});

Route::namespace('Auth')
    ->group(function(){

    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');

    // Registration Routes...
    // Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    // Route::post('register', 'RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');

    // Email Verification Routes...
    // Route::get('email/verify', 'VerificationController@show')->name('verification.notice');
    // Route::get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
    // Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');
    

});

Route::middleware('auth')->group(function(){


    Route::get('/shops', 'ShopController@showAll')->name('shops');
    Route::post('/pick-shop', 'ShopController@pickShop')->name('shop.pick');
    Route::post('/change-shop', 'ShopController@changeShop')->name('shop.change');
    
    // Logout
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    
    // Part for Admin
    Route::namespace('Admin')->middleware('admin')->prefix('admin')->group(function(){
        // Shop
        Route::get('/shop', 'ShopController@index')->name('admin.shop');
        Route::get('/shop/create', 'ShopController@create')->name('admin.shop.create');
        Route::post('/shop/store', 'ShopController@store')->name('admin.shop.store');
        Route::get('shop/{shop}/edit', 'ShopController@edit')->name('admin.shop.edit');
        Route::post('shop/{shop}/edit', 'ShopController@update')->name('admin.shop.update');
        Route::post('shop/{shop}/delete', 'ShopController@destroy')->name('admin.shop.delete');

    });

    // Part for all users
    Route::middleware('shop')->prefix('shop')->group(function(){

        Route::get('/', 'ShopController@shop')->name('shop');

        // Category
        Route::get('/category', 'CategoryController@index')->name('category');
        Route::get('/category/create', 'CategoryController@create')->name('category.create');
        Route::post('/category/store', 'CategoryController@store')->name('category.store');
        Route::get('category/{category}/edit', 'CategoryController@edit')->name('category.edit');
        Route::post('category/{category}/edit', 'CategoryController@update')->name('category.update');
        Route::post('category/{category}/delete', 'CategoryController@destroy')->name('category.delete');

    });
    

});

