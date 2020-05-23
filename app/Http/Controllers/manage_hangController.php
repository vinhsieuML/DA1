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

class manage_hangController extends Controller
{
  
    
  


    //***Quản lý hãng

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


    public function insert_hang()
    {
        
       
        return view('admin.hang.insert_hang');

    
    }
    

    public function insert_hang_form(Request $request)
    {
    


        if($request->isMethod('post'))
        {
            $name = $request->input("name");
            $image_name = $request->file('image')->getClientOriginalName();

            $hang = new manufacture();
            $hang->name =$name;
            $hang->image=$image_name;
            $hang->save();

            $image = $request->file('image');
            $image->move(base_path('\storage\images\other_images'), $image_name);
        }
        echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại)</script>";
        alert()->success('Thành công','Đã thêm hãng');
        return redirect()-> route('viewhang');
    }


   

    public function edit_hang_form(Request $request, $h_id)
    {   
   
        try { 
            $new_name = $request->input('hang_title');
            $new_image = $request->file('hang_image')->getClientOriginalName(); 
            $image = $request->file('hang_image');
            

            $edit_h = DB::table('hang')
                ->where('id', $h_id)
                ->update(['name' => $new_name,'image' => $new_image ]);
              

                echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại)</script>";
        
                  
            

            } catch(\Illuminate\Database\QueryException $ex){ 
            dd($ex->getMessage()); 
            // Note any method of class PDOException can be called on $ex.
                echo "<script>alert('Có lỗi xảy ra! Vui lòng thử lại')</script>";
                return redirect()-> route('admin.hang.edit_hang');
        }
        $image->move(base_path('\storage\images\other_images'), $new_image);

        alert()->success('Thành công','Đã cập nhật');
        return redirect()-> route('viewhang');

    }


    public function getTypeInfoById($hangId)
    {
        // Thong Tin danh mục
        $hang = DB::table('hang')
            
            ->select('hang.*')
            ->where('hang.id', '=', $hangId)
         
            ->get();
       
        
       
        return view(
            'admin.hang.edit_hang',
            [
        
                'hang' => $hang[0]
              
            ]
        );
    }



    


  
}
