<?php

namespace App\Http\Controllers;

use App\admin;
use App\product_type;
use App\product;
use App\manufacture;
use App\boxes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class manage_boxesController extends Controller
{
  
    
  


    //***Quản lý danh mục

    public function get_boxes()
    {
        // $product_type = product_type::all()->paginate(3);
        $boxes = DB::table('boxes_section')
        ->get();
       
        return view("admin.boxes.view_boxes", ["boxes"=>$boxes]);
    
    }

  

    public function insert_boxes()
    {
        
        
        return view('admin.boxes.insert_boxes');

    
    }
    

    public function insert_boxes_form(Request $request)
    {   
        $boxes = DB::table('boxes_section');
        // $count = $boxes->count('*');
        $count = 1;


        if($request->isMethod('post')&& $count<4 )
        {
            $tile = $request->input("box_tile");
            $desc = $request->input("box_desc");
           

            $boxes = new boxes();
            $boxes->box_tile = $tile;
            $boxes->box_desc= $desc;
         
            $boxes->save();

         
        }
        else 
        {
            echo "<script>alert('Không thể thêm quá 4 boxes, vui lòng xóa bớt')</script>";
            return back();
        }
        echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại)</script>";
        return redirect()-> route('viewbox');
    }

  

    public function edit_boxes_form(Request $request, $b_id)
    {   

        try { 
            $new_tile = $request->input('box_tile');
            $new_desc = $request->input('box_desc');

         
            

            $edit_b = DB::table('boxes_section')
                ->where('id', $b_id)
                ->update([
                    'box_tile' => $new_tile,
                    'box_desc' => $new_desc
                ]);
              

                echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại)</script>";
        
                  
            

            } catch(\Illuminate\Database\QueryException $ex){ 
            dd($ex->getMessage()); 
            // Note any method of class PDOException can be called on $ex.
                echo "<script>alert('Có lỗi xảy ra! Vui lòng thử lại')</script>";
                return redirect()-> route('admin.hang.edit_hang');
        }
       
      
        return redirect()-> route('viewbox');

    }


    public function getTypeInfoById($boxId)
    {
        // Thong Tin danh mục
        $boxes = DB::table('boxes_section')
            
            ->select('boxes_section.*')
            ->where('boxes_section.id', '=', $boxId)
         
            ->get();
       
        
       
        return view(
            'admin.boxes.edit_boxes',
            [
        
                'boxes' => $boxes[0]
              
            ]
        );
    }


    public function delete_boxes($boxId)
    {
        
       

        DB::table('boxes_section')
        ->where('id', $boxId)
        ->delete();


       
        return back();

    }


    


  
}
