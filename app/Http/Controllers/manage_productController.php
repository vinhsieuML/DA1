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
    

        $product = DB::table('product')
            ->join('images', 'product.id', '=', 'images.id_product')
            ->select('product.*', DB::raw('GROUP_CONCAT(images.link) as link'))
         
            ->groupBy('product.id')
            ->Paginate(5);
        return view('admin.product.view_product', [ 'product' => $product]);
    }
    //AJAX pagination
   



    function index()
    {
     $data = DB::table('product')
     ->join('images', 'product.id', '=', 'images.id_product')
     ->select('product.*', DB::raw('GROUP_CONCAT(images.link) as link'))
 
     ->groupBy('product.id')
     
     ->orderBy('product.id', 'asc')
     ->paginate(10);
             
        return view('admin.product.view_product', compact('data'));
    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
      $sort_by = $request->get('sortby');
      $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
      $data = DB::table('product')
      ->join('images', 'product.id', '=', 'images.id_product')
      ->select('product.*', DB::raw('GROUP_CONCAT(images.link) as link'))
  
      ->groupBy('product.id')
                    ->where('product.id', 'like', '%'.$query.'%')
                    ->orWhere('product.name', 'like', '%'.$query.'%')
                    ->orWhere('product.price', 'like', '%'.$query.'%')
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(10);
      return view('admin.product.pagination_data', compact('data'))->render();
     }
    }

    function deactivate(Request $request, $p_id)
    {
        try { 

            $edit_pt = DB::table('product')
                ->where('id', $p_id)
                ->update(['status' => '0' ]);
              

                echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại)</script>";
        
                  
            

            } catch(\Illuminate\Database\QueryException $ex){ 
            dd($ex->getMessage()); 
            // Note any method of class PDOException can be called on $ex.
                echo "<script>alert('Có lỗi xảy ra! Vui lòng thử lại')</script>";
                return back();

        }
        return back();
    }


    
    function activate(Request $request, $p_id)
    {
        try { 

            $edit_pt = DB::table('product')
                ->where('id', $p_id)
                ->update(['status' => '1' ]);
              

                echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại)</script>";
        
                  
            

            } catch(\Illuminate\Database\QueryException $ex){ 
            dd($ex->getMessage()); 
            // Note any method of class PDOException can be called on $ex.
                echo "<script>alert('Có lỗi xảy ra! Vui lòng thử lại')</script>";
                return back();

        }
        return back();
    }



    public function getTypeInfoById($proId)
    {
        // Thong Tin danh mục
        $product = DB::table('product')
            
            ->select('product.*')
            ->where('product.id', '=', $proId)
         
            ->get();
       
        
       
        return view(
            'admin.product.edit_product',
            [
        
                'product' => $product [0]
              
            ]
        );
    }



}

  

