<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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


Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'homepageController@LoadData')->name('homePage');

    Route::get('/images/{type}/{name}','imageServe@image');

    Route::get('/productDetail/{proId}','productDetailController@getInfoById');
    
    Route::post('/productDetail/{proId}','productDetailController@add_cart');

    //Dang Nhap-Dang Xuat
    Route::get('/login','loginController@login');
    Route::post('/login','loginController@handleForm');
    Route::get('/logout','loginController@logout');

    // Quan ly tai khoan
    Route::group(['prefix' => 'user'], function () {
        //Orders
        Route::get('orders', 'userController@orders')->name('userHome');

        Route::get('orderInfo/{billId}', 'userController@orderDetail');
        Route::get('confirmOrder/{billId}','userController@confirmOrder');

        //Account
        Route::get('accountInfo','userController@accountInfo')->name('userInfo');
        Route::post('updateInfo','userController@editAccInfo');

        Route::get('changePass','userController@changePass');
        Route::post('changePass','userController@changePassHandler');

        //Cart
        Route::get('cart','cartController@viewCart');
        Route::post('cart/change','cartController@updateCart');
        Route::post('cart/pay','cartController@pay');
    });
});

