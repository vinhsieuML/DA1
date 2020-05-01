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
    Route::get('/contact', function () {
        return view('generic.contact');
    });
    Route::get('/images/{type}/{name}','imageServe@image');

    Route::get('/productDetail/{proId}','productDetailController@getInfoById');

    Route::post('/productDetail/{proId}','productDetailController@add_cart')->middleware('checkLogin');

    //Shop 
    Route::get('/shop/{type}/{detail}/{page}','shopController@viewShop');
    //Dang Nhap-Dang Xuat-DangKi
    Route::get('/login','loginController@login');
    Route::post('/login','loginController@handleForm');
    Route::get('/logout','loginController@logout');
    Route::get('/register','loginController@register');
    Route::post('/register','loginController@handleRegisterForm');


    //Route::get('/admin/login','adminloginController@login');
    //Route::post('admin/login','adminloginController@handleForm');


    // Quan ly tai khoan
    Route::group(['prefix' => 'user','middleware'=>'checkLogin'], function () {
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
        Route::post('cart','cartController@deleteProduct');

    });

    
});

//Admin (dung prefix: admin)
Route::group(['middleware'=>['web'],'prefix'=>'admin'],function(){
    //Login(Không Cần Middleware check Auth)
    Route::get('/login','adminloginController@login')->name('homePageAdmin');
    Route::post('/login','adminloginController@handleForm');

    
    // Route::get('/login','adminloginController@l');
    Route::get('/dashboard', 'adminloginController@LoadDashBoard')->name('dashBoard');
}); 