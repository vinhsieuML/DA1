<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Aler;

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

    Route::get('/shop', function () {
        return redirect('shop/pCat/1/1');
    });

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
Route::group(['middleware'=>['web','checkadmin'],'prefix'=>'admin'],function(){
    //Login(Không Cần Middleware check Auth)
    Route::get('/', function () {
        redirect()->route('homePageAdmin');
    });
    Route::get('/login','adminloginController@login')->name('homePageAdmin');
    Route::post('/login','adminloginController@handleForm');
    Route::get('/logout', 'adminloginController@logout');
    
    // Route::get('/login','adminloginController@l');
    Route::get('/dashboard', 'adminloginController@LoadDashBoard')->name('dashBoard');
    

    //Quản lí product type--------------------------------------------------------
    //Xem
    Route::get('/view_p_type','manage_product_typeController@getpro_type')-> name('viewproType');
        //--ajax phân trang
    Route::post('/view_p_type/fetch_data_product_type', 'manage_product_typeController@fetch_data_product_type')->name('paginationprotype.fetch');

    //Thêm
    Route::get('/insert_p_type','manage_product_typeController@insert_pro_type');
    Route::post('/insert_p_type','manage_product_typeController@insert_pro_type_form');

    //Sửa
    Route::get('/edit_p_type/{proTypeId}','manage_product_typeController@getTypeInfoById');
    Route::post('/edit_p_type/{proTypeId}','manage_product_typeController@edit_pro_type_form');



    //Quản lí product--------------------------------------------------------
    Route::get('/view_product','manage_productController@getproduct');
        
    Route::post('/view_product/fetch_data_product', 'manage_productController@fetch_data_product')->name('paginationpro.fetch');

    //Xem 
    Route::post('/view_products/fetch_data', 'manage_productController@fetch_data');
    Route::get('/view_products', 'manage_productController@index')->name('viewpro');

    Route::get('/deactive/{proId}','manage_productController@deactivate');
    Route::get('/active/{proId}','manage_productController@activate');

    //Thêm
    Route::get('/insert_product','manage_productController@getInsert');
    Route::get('/insert_product/action', 'manage_productController@action')->name('live_search.action');
    Route::post('/insert_product','manage_productController@insert_product');


    //Sửa
    Route::get('/edit_product/{proId}','manage_productController@getTypeInfoById');
    Route::post('/edit_product/{proId}','manage_productController@edit_product');
    Route::get('/edit_product/action', 'manage_productController@action_insert')->name('live_search.actionfix');

    //Quản lý hãng--------------------------------------------------------
    Route::get('/view_hang','manage_hangController@get_hang')-> name('viewhang');
    //--ajax phân trang
    Route::post('/view_hang/fetch_data_hang', 'manage_hangController@fetch_data_hang')->name('paginationhang.fetch');

    //Thêm hãng
    Route::get('/insert_hang','manage_hangController@insert_hang');
    Route::post('/insert_hang','manage_hangController@insert_hang_form');

    //Sửa
    Route::get('/edit_hang/{hangId}','manage_hangController@getTypeInfoById');
    Route::post('/edit_hang/{hangId}','manage_hangController@edit_hang_form');

    

    //Quản lý size--------------------------------------------------------
    Route::get('/view_size','manage_sizeController@get_size')-> name('viewsize');
    //--ajax phân trang
    Route::post('/view_size/fetch_data_size', 'manage_sizeController@fetch_data_size')->name('paginationsize.fetch');

    //Thêm size
    Route::get('/insert_size','manage_sizeController@insert_size');
    Route::post('/insert_size','manage_sizeController@insert_size_form');

    Route::get('/s/deactive/{sizeId}','manage_sizeController@deactivate');
    Route::get('/s/active/{sizeId}','manage_sizeController@activate');

    //Sửa
    Route::get('/edit_size/{sizeId}','manage_sizeController@getTypeInfoById');
    Route::post('/edit_size/{sizeId}','manage_sizeController@edit_size_form');

    //Quản lý slider--------------------------------------------------------
    Route::get('/view_slider','manage_sliderController@get_slider')-> name('viewslider');

     //Thêm slider
     Route::get('/insert_slider','manage_sliderController@insert_slider');
     Route::post('/insert_slider','manage_sliderController@insert_slider_form');

     //Sửa slider
    Route::get('/edit_slider/{sliderId}','manage_sliderController@getTypeInfoById');
    Route::post('/edit_slider/{sliderId}','manage_sliderController@edit_slider_form');

    //Xóa slider
    Route::get('/delete_slider/{sliderId}','manage_sliderController@delete_slider');

    //Quản lý User
    Route::post('/view_user/fetch_data', 'manage_userController@fetch_data');
    Route::get('/view_user', 'manage_userController@index')->name('viewuser');

    Route::get('/u/deactive/{userId}','manage_userController@deactivate');
    Route::get('/u/active/{userId}','manage_userController@activate');



    //Xem order
    Route::post('/view_order/fetch_data', 'manage_orderController@fetch_data');
    Route::get('/view_order', 'manage_orderController@index')->name('vieworder');
    Route::get('/o/deactive/{orderId}','manage_orderController@deactivate');

    //Xem order detail
     Route::get('/view_order_detail/{billId}','manage_orderController@getTypeInfoById');


    
    //Quản lý administrator--------------------------------------------------------
    Route::get('/view_administrator','manage_adminController@get_admin')-> name('viewadmin');
    //--ajax phân trang
    Route::post('/view_administrator/fetch_data_admin', 'manage_adminController@fetch_data_admin')->name('paginationadmin.fetch');

     //Thêm hãng
     Route::get('/insert_administrator','manage_adminController@insert_administrator');
     Route::post('/insert_administrator','manage_adminController@insert_administrator_form');

    
    //Quản lý boxes--------------------------------------------------------
    Route::get('/view_boxes','manage_boxesController@get_boxes')-> name('viewbox');

    //Thêm boxes
    Route::get('/insert_boxes','manage_boxesController@insert_boxes');
    Route::post('/insert_boxes','manage_boxesController@insert_boxes_form');

    //Sửa boxes
   Route::get('/edit_boxes/{boxId}','manage_boxesController@getTypeInfoById');
   Route::post('/edit_boxes/{boxId}','manage_boxesController@edit_boxes_form');

   //Xóa boxes
   Route::get('/delete_boxes/{boxId}','manage_boxesController@delete_boxes');
 


}); 