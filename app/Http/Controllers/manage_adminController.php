<?php

namespace App\Http\Controllers;
use Alert;
use App\admin;
use App\product_type;
use App\product;
use App\manufacture;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class manage_adminController extends Controller
{
  
    
  


    //***Quản lý hãng

    public function get_admin()
    {
        // $product_type = product_type::all()->paginate(3);
        $admin = DB::table('admin')->paginate(2);

       
        return view("admin.administrator.view_administrator", ["admin"=>$admin]);
    
    }

    //AJAX pagination
    function fetch_data_admin(Request $request)
    {
        if($request->ajax())
        {
         $admin = DB::table('admin')->paginate(2);
         return view('admin.administrator.pagination_data', compact('admin'))->render();
   
        }
    }


    public function insert_administrator()
    {
        
        
        return view('admin.administrator.insert_administrator');

    
    }
    

    public function insert_administrator_form(Request $request)
    {
    


        if($request->isMethod('post'))
        {
            $name = $request->input("admin_name");
            $username = $request->input("admin_username");
            $password = $request->input("admin_password");
            $phone = $request->input("admin_phone");
            $about = $request->input("admin_about");

            $image_name = $request->file('admin_image')->getClientOriginalName();

            $admin = new admin();
            $admin->name =$name;
            $admin->username =$username;
            $admin->password =$password;
            $admin->phone =$phone;
            $admin->about =$about;
            $admin->image=$image_name;
            $admin->save();

            $image = $request->file('admin_image');
            $image->move(base_path('\storage\images\admin_images'), $image_name);
        }
        echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại)</script>";
        alert()->success('Thành công','Đã thêm admin');
        return redirect()-> route('viewadmin');
    }


   

    // public function edit_hang_form(Request $request, $h_id)
    // {   
    //     // $new_name = $request->input('p_cat_title');
    //     // $new_image = $request->file('p_cat_image')->getClientOriginalName(); 
    //     // $image = $request->file('image');
    //     // $image->move(base_path('\storage\images\other_images'), $image_name);

    //     // DB::table('product_type')
    //     //     ->where('id', $pt_id)
    //     //     ->update(['name' => $new_name,'image' => $new_image ]);


    //     try { 
    //         $new_name = $request->input('hang_title');
    //         $new_image = $request->file('hang_image')->getClientOriginalName(); 
    //         $image = $request->file('hang_image');
            

    //         $edit_h = DB::table('hang')
    //             ->where('id', $h_id)
    //             ->update(['name' => $new_name,'image' => $new_image ]);
              

    //             echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại)</script>";
        
                  
            

    //         } catch(\Illuminate\Database\QueryException $ex){ 
    //         dd($ex->getMessage()); 
    //         // Note any method of class PDOException can be called on $ex.
    //             echo "<script>alert('Có lỗi xảy ra! Vui lòng thử lại')</script>";
    //             return redirect()-> route('admin.hang.edit_hang');
    //     }
    //     $image->move(base_path('\storage\images\other_images'), $new_image);

      
    //     return redirect()-> route('viewhang');

    // }


    // public function getTypeInfoById($hangId)
    // {
    //     // Thong Tin danh mục
    //     $hang = DB::table('hang')
            
    //         ->select('hang.*')
    //         ->where('hang.id', '=', $hangId)
         
    //         ->get();
       
        
       
    //     return view(
    //         'admin.hang.edit_hang',
    //         [
        
    //             'hang' => $hang[0]
              
    //         ]
    //     );
    // }



    


  
}
