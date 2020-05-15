<?php

namespace App\Http\Controllers;

use App\admin;
use App\product_type;
use App\product;
use App\manufacture;
use App\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class manage_sliderController extends Controller
{
  
    
  


    //***Quản lý danh mục

    public function get_slider()
    {
        // $product_type = product_type::all()->paginate(3);
        $slider = DB::table('slider')
        ->get();
       
        return view("admin.slider.view_slider", ["slider"=>$slider]);
    
    }

    //AJAX pagination
    // function fetch_data_hang(Request $request)
    // {
    //     if($request->ajax())
    //     {
    //      $hang = DB::table('hang')->paginate(2);
    //      return view('admin.hang.pagination_data', compact('hang'))->render();
   
    //     }
    // }


    public function insert_slider()
    {
        
        
        return view('admin.slider.insert_slider');

    
    }
    

    public function insert_slider_form(Request $request)
    {   
        $slide = DB::table('slider');
        $count = $slide->count('*');


        if($request->isMethod('post')&& $count<4 )
        {
            $name = $request->input("slide_name");
            $link = $request->input("slide_url");
            $image_name = $request->file('slide_image')->getClientOriginalName();

            $slider = new slider();
            $slider->slider_name = $name;
            $slider->slider_image= $image_name;
            $slider->slider_url = $link;
            $slider->save();

            $image = $request->file('slide_image');
            $image->move(base_path('\storage\images\slides_images'), $image_name);
        }
        else 
        {
            echo "<script>alert('Không thể thêm quá 4 slide, vui lòng xóa bớt')</script>";
            return back();
        }
        echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại)</script>";
        return redirect()-> route('viewslider');
    }

  

    public function edit_slider_form(Request $request, $s_id)
    {   

        try { 
            $new_name = $request->input('slide_name');
            $new_url = $request->input('slide_url');
            $new_image = $request->file('slide_image')->getClientOriginalName(); 
            $image = $request->file('slide_image');
            

            $edit_s = DB::table('slider')
                ->where('id', $s_id)
                ->update(['slider_name' => $new_name,
                'slider_image' => $new_image,
                'slider_url' => $new_url 
                ]);
              

                echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại)</script>";
        
                  
            

            } catch(\Illuminate\Database\QueryException $ex){ 
            dd($ex->getMessage()); 
            // Note any method of class PDOException can be called on $ex.
                echo "<script>alert('Có lỗi xảy ra! Vui lòng thử lại')</script>";
                return redirect()-> route('admin.hang.edit_hang');
        }
        $image->move(base_path('\storage\images\slides_images'), $new_image);

      
        return redirect()-> route('viewslider');

    }


    public function getTypeInfoById($sliderId)
    {
        // Thong Tin danh mục
        $slider = DB::table('slider')
            
            ->select('slider.*')
            ->where('slider.id', '=', $sliderId)
         
            ->get();
       
        
       
        return view(
            'admin.slider.edit_slider',
            [
        
                'slider' => $slider[0]
              
            ]
        );
    }


    public function delete_slider($sliderId)
    {
        
        $image_data = DB::table('slider')
        ->where('id', $sliderId)
        ->get();
        
        foreach($image_data as $image_del)
        {
            unlink(storage_path('images/slides_images/'.$image_del->slider_image));
        }

        DB::table('slider')
        ->where('id', $sliderId)
        ->delete();


       
        return back();

    }


    


  
}
