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

    //Quản lí product type
    //Xem
    Route::get('/view_p_type','manage_product_typeController@getpro_type')-> name('viewproType');
        //--ajax phân trang
    Route::post('/view_p_type/fetch_data_product_type', 'manage_product_typeController@fetch_data_product_type')->name('paginationprotype.fetch');;

    //Thêm
    Route::get('/insert_p_type','manage_product_typeController@insert_pro_type');
    Route::post('/insert_p_type','manage_product_typeController@insert_pro_type_form');

    //Sửa
    Route::get('/edit_p_type/{proTypeId}','manage_product_typeController@getTypeInfoById');
    Route::post('/edit_p_type/{proTypeId}','manage_product_typeController@edit_pro_type_form');



    //Quản lí product
    Route::get('/view_product','manage_productController@getproduct');
        //ajax phân trang
    Route::post('/view_product/fetch_data_product', 'manage_productController@fetch_data_product')->name('paginationpro.fetch');

    //Xem 
    Route::post('/view_products/fetch_data', 'manage_productController@fetch_data');
    Route::get('/view_products', 'manage_productController@index');

    Route::get('/deactive/{proId}','manage_productController@deactivate');
    Route::get('/active/{proId}','manage_productController@activate');


    //Sửa
    Route::get('/edit_product/{proId}','manage_productController@getTypeInfoById');
    Route::post('/edit_product/{proId}','manage_productController@edit_pro_form');



}); 