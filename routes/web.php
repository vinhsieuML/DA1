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
    Route::get('/productDetail/{id}', function ($id) {
        $product = App\product::find($id);
        
        echo $product->name;
    });
    
    Route::get('/', 'homepageController@LoadData');

    Route::get('/images/{type}/{name}','imageServe@image');
});

