<?php

namespace App\Http\Controllers;

use App\admin;
use App\product_type;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class manage_productController extends Controller
{
  

    //** Quản lý sản phẩm */
   
    public function getproduct()
    {
    

        $products = DB::table('product')
            ->join('images', 'product.id', '=', 'images.id_product')
            ->select('product.*', DB::raw('GROUP_CONCAT(images.link) as link'))
         
            ->groupBy('product.id')
            ->paginate(15);
        return view('admin.product.view_product', [ 'products' => $products]);
    }
    //AJAX pagination
    function fetch_data_product(Request $request)
    {
        if($request->ajax())
        {
            $products = DB::table('product')
            ->join('images', 'product.id', '=', 'images.id_product')
            ->select('product.*', DB::raw('GROUP_CONCAT(images.link) as link'))
        
            ->groupBy('product.id')
            ->paginate(15);
        return view('admin.product.pagination_data', compact('products'))->render();

        }
    }
    


  
}
