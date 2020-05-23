<?php

namespace App\Http\Controllers;

use Alert;
use App\admin;
use App\product_type;
use App\product;
use App\size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class manage_sizeController extends Controller
{
  
    
  


    //***Quản lý size

    public function get_size()
    {
        // $product_type = product_type::all()->paginate(3);
        $product_type = DB::table('product_type')->paginate(3);
        $size = DB::table('size')
        ->select('size.*')
        ->get();
     
        
   
        return view("admin.size.view_size", [
            "product_type"=>$product_type, 
            "size"=> $size
        ]);
    
    }

    //AJAX pagination
    function fetch_data_size(Request $request)
    {
        if($request->ajax())
        {
         $product_type = DB::table('product_type')->paginate(3);
         $size = DB::table('size')
         ->select('size.*')
         ->get();
      
         
         return view('admin.size.pagination_data', compact('product_type','size'))->render();
   
        }
    }


    public function insert_size()
    {
        $product_type = DB::table('product_type')
        ->get();
        
        
        return view("admin.size.insert_size", [
            "product_type"=>$product_type
        ]);
    
    }
    

    public function insert_size_form(Request $request)
    {
    


        if($request->isMethod('post'))
        {
            $name = $request->input("name");
            $id_type = $request->input("id_type");

            $size = new size();
            $size->name =$name;
            $size->id_type=$id_type;
            $size->save();

            
        }
        echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại)</script>";
        alert()->success('Thành công','Đã thêm size');
        return redirect()-> route('viewsize');
    }


   

    public function edit_size_form(Request $request, $size_id)
    {   
      

        try { 
            $new_name = $request->input('size_name');
        
            

            $edit_size = DB::table('size')
                ->where('id', $size_id)
                ->update(['name' => $new_name ]);
              

                echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại)</script>";
        
                  
            

            } catch(\Illuminate\Database\QueryException $ex){ 
            dd($ex->getMessage()); 
            // Note any method of class PDOException can be called on $ex.
                echo "<script>alert('Có lỗi xảy ra! Vui lòng thử lại')</script>";
                return redirect()-> route('admin.size.edit_size');
        }
      

        alert()->success('Thành công','Đã cập nhật');
        return redirect()-> route('viewsize');

    }


    public function getTypeInfoById($sizeId)
    {
        // Thong Tin danh mục
        $size = DB::table('size')
            
            ->select('size.*')
            ->where('size.id', '=', $sizeId)
         
            ->get();
       
        
       
        return view(
            'admin.size.edit_size',
            [
        
                'size' => $size[0]
              
            ]
        );
    }



    


  
}
