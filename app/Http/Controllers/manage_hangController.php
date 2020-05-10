<?php

namespace App\Http\Controllers;

use App\admin;
use App\product_type;
use App\product;
use App\manufacture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class manage_hangController extends Controller
{
  
    
  


    //***Quản lý danh mục

    public function get_hang()
    {
        // $product_type = product_type::all()->paginate(3);
        $hang = DB::table('hang')->paginate(2);

       
        return view("admin.hang.view_hang", ["hang"=>$hang]);
    
    }

    //AJAX pagination
    function fetch_data_hang(Request $request)
    {
        if($request->ajax())
        {
         $hang = DB::table('hang')->paginate(2);
         return view('admin.hang.pagination_data', compact('hang'))->render();
   
        }
    }


    // public function insert_pro_type()
    // {
        
        
    //     return view('admin.producttype.insert_pro_type');

    
    // }
    

    // public function insert_pro_type_form(Request $request)
    // {
    


    //     if($request->isMethod('post'))
    //     {
    //         $name = $request->input("name");
    //         $image_name = $request->file('image')->getClientOriginalName();

    //         $product_type = new product_type();
    //         $product_type->name =$name;
    //         $product_type->image=$image_name;
    //         $product_type->save();

    //         $image = $request->file('image');
    //         $image->move(base_path('\storage\images\other_images'), $image_name);
    //     }
    //     echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại)</script>";
    //     return redirect()-> route('viewproType');
    // }


   

    // public function edit_pro_type_form(Request $request, $pt_id)
    // {   
    //     // $new_name = $request->input('p_cat_title');
    //     // $new_image = $request->file('p_cat_image')->getClientOriginalName(); 
    //     // $image = $request->file('image');
    //     // $image->move(base_path('\storage\images\other_images'), $image_name);

    //     // DB::table('product_type')
    //     //     ->where('id', $pt_id)
    //     //     ->update(['name' => $new_name,'image' => $new_image ]);


    //     try { 
    //         $new_name = $request->input('p_cat_title');
    //         $new_image = $request->file('p_cat_image')->getClientOriginalName(); 
    //         $image = $request->file('p_cat_image');
            

    //         $edit_pt = DB::table('product_type')
    //             ->where('id', $pt_id)
    //             ->update(['name' => $new_name,'image' => $new_image ]);
              

    //             echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại)</script>";
        
                  
            

    //         } catch(\Illuminate\Database\QueryException $ex){ 
    //         dd($ex->getMessage()); 
    //         // Note any method of class PDOException can be called on $ex.
    //             echo "<script>alert('Có lỗi xảy ra! Vui lòng thử lại')</script>";
    //             return redirect()-> route('admin.producttype.edit_pro_type');
    //     }
    //     $image->move(base_path('\storage\images\other_images'), $new_image);

      
    //     return redirect()-> route('viewproType');

    // }


    // public function getTypeInfoById($proTypeId)
    // {
    //     // Thong Tin danh mục
    //     $product_type = DB::table('product_type')
            
    //         ->select('product_type.*')
    //         ->where('product_type.id', '=', $proTypeId)
         
    //         ->get();
       
        
       
    //     return view(
    //         'admin.producttype.edit_pro_type',
    //         [
        
    //             'product_type' => $product_type[0]
              
    //         ]
    //     );
    // }



    


  
}
