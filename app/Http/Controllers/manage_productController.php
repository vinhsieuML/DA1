<?php

namespace App\Http\Controllers;

use App\admin;
use App\product_type;
use App\product;
use App\images;
use App\size_detail;
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

    public function deactivate(Request $request, $p_id)
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


    
    public function activate(Request $request, $p_id)
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



    public function getInsert()
    {
        $hang = DB::table('hang')            
        ->select('hang.*')
        ->get();

        $product_type = DB::table('product_type')            
        ->select('product_type.*')
        ->get();

        return view(
            'admin.product.insert_product',
            [
        
                 
                'hang' => $hang,
                'product_type' => $product_type
                
            ]
        );
       
    }



    public function getTypeInfoById($proId)
    {
        // Thong Tin danh mục
        $product = DB::table('product')
            
            ->select('product.*')
            ->where('product.id', '=', $proId)
         
            ->get();
       
        $hang = DB::table('hang')            
        ->select('hang.*')
        ->get();

        $product_type = DB::table('product_type')            
        ->select('product_type.*')
        ->get();
       
      

        $size_detail = DB::table('size_detail')
 
        ->join('size', 'size.id', '=', 'size_detail.id_size')
        ->select('size.name', 'size_detail.number', 'size_detail.id')
        ->where('size_detail.id_product', '=', $proId)
        ->get();

        

        // $new_image[] = $request->file('p_cat_image')->getClientOriginalName(); 
        
        return view(
            'admin.product.edit_product',
            [
        
                'product' => $product [0], 
                'hang' => $hang,
                'product_type' => $product_type,
                'size_detail' => $size_detail 
            ]
        );
    }


    function action_insert(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('size')
         ->where('id_type',$query)
         
         ->get();
         
      }
      $x = "''";
      $total_row = $data->count();
      if($total_row > 0)
      {
          $i=0;
       foreach($data as $row)
       {
           $i++;
        $output .= '
        <tr>
         <td>'.$row->name.'</td>
         <td>  <input type="number" min="0" name="p_sl_size'.$i.'" class="form-control" placeholder="Số lượng" value="" oninput="validity.valid||(value='.$x.');"/> </td>
        
        </tr>
        ';
       }
      }

      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
   



    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('size')
         ->where('id_type',$query)
         
         ->get();
         
      }
      $x = "''";
      $total_row = $data->count();
      if($total_row > 0)
      {
          $i=0;
       foreach($data as $row)
       {
           $i++;
        $output .= '
        <tr>
         <td>'.$row->name.'</td>
         <td>  <input type="number" min="0" name="p_sl_size'.$i.'" class="form-control" placeholder="Số lượng" value="" oninput="validity.valid||(value='.$x.');"/> </td>
        
        </tr>
        ';
       }
      }

      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

    
    public function edit_product(Request $request, $proId)
    {
        if($request->isMethod('post'))
        {
            $name = $request->input("p_name");
            $type = $request->input("p_type");
            $hang = $request->input("p_hang");
            $stt = '1';
            $price = $request->input("p_price");
            $des = $request->input("p_des");

            $type_old = DB::table('product')
                    
            ->where('id',$proId)
            
            ->get();
            //$product_id = product::find($pro_id[0]->id);
            $temp_type = $type_old[0]->id_type;



            // $image_name = $request->file('image')->getClientOriginalName();

            try {
                // Get the updated rows count here. Keep in mind that zero is a
                // valid value (not failure) if there were no updates needed
                DB::table('product')
                ->where('id', $proId)
                ->update([
                'name' => $name,
                'id_type' => $type,
                'id_hang' => $hang, 
                'status' => $stt,
                'price' => $price,
                'description' => $des

                ]);
          
               
            } catch (\Illuminate\Database\QueryException $e) {
                // Do whatever you need if the query failed to execute
            }

                //Xóa dữ liệu cũ
                $image_data = DB::table('images')
                ->where('id_product', $proId)
                ->get();
                
                foreach($image_data as $image_del)
                {
                    unlink(storage_path('images/product_images/'.$image_del->link));
                }

                DB::table('images')->where('id_product', $proId)->delete();
                

                
                    DB::table('size_detail')->where('id_product', $proId)->delete();

                    $data = DB::table('size')
                    ->where('id_type', $type)
                    ->get();
                        

                    $total_row = $data->count();
                    $j=0;
                    for($i=1; $i <= $total_row; $i++)
                    {
                        $so_luong =  $request->input("p_sl_size$i");
                        $size_id = $data[$j]->id;

                        $size_detail = new size_detail();
                        $size_detail->id_size = $size_id;
                        $size_detail->number = $so_luong;
                        $size_detail->id_product = $proId;

                        $size_detail->save();
                        $j++;
                    }
               
                    // $data = DB::table('size')
                    // ->where('id_type',$type)
                    // ->get();

                    // $total_row = $data->count();
                    // $j=0;
                    // for($i=1; $i <= $total_row; $i++)
                    // {
                    //     $so_luong =  $request->input("p_sl_size$i");
                    //     $size_id = $data[$j]->id;

                      
                    //     DB::table('size_detail')
                    //     ->where([['id_product', $proId], ['id_size', $size_id]])
                    //     ->update([

                    //     'number' => $so_luong
                       
        
                    //     ]);
                       
                    //     $j++;
                    // }
                    // for($i=1; $i <= $total_row; $i++){
                    //     $so_luong =  $request->input("p_sl_size$i");
                    //     $size_id = $data[$j]->id;
                    //     $update = size_detail::where([['id_product', '=', $proId], ['id_size', '=', $size_id]])->get()[0];
                    //     $update->number = $so_luong;
                    //     $update->save();
                    // }

                


                 // $int = (int)$num;
                // $intpro = (int)$pro_id;
                
                if($files=$request->file('image')){
                    foreach($files as $file){
                    $name=$file->getClientOriginalName();

                        $image = new images();
                        $image->link =$name;
                        $image->id_product = $proId;

                        $check_product = $image->save();
                        if($check_product)
                        {
                            $file->move(base_path('\storage\images\product_images'), $name);
                        }
                    
                    
                    }
                }
            
              
           

            // $image = $request->file('image');
            // $image->move(base_path('\storage\images\other_images'), $image_name);
        }
        echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại)</script>";
        return redirect()-> route('viewpro');

    }

    public function insert_product(Request $request)
    {
        
        if($request->isMethod('post'))
        {
            $name = $request->input("p_name");
            $type = $request->input("p_type");
            $hang = $request->input("p_hang");
            $stt = '1';
            $price = $request->input("p_price");
            $des = $request->input("p_des");



            // $image_name = $request->file('image')->getClientOriginalName();

            $product = new product();
            $product->name =$name;
            $product->id_type=$type;
            $product->id_hang =$hang;
            $product->status = $stt;
            $product->price =$price;
            $product->description= $des;

            $check = $product->save();
           if($check)
           {
                $pro_id = DB::table('product')
                    
                ->where('name',$name)
                
                ->get();
                //$product_id = product::find($pro_id[0]->id);
                $id_p = $pro_id[0]->id;


                $data = DB::table('size')
                ->where('id_type',$type)
                
                ->get();
                    
                
                
                $total_row = $data->count();
                $j=0;
                for($i=1; $i <= $total_row; $i++)
                {
                    $so_luong =  $request->input("p_sl_size$i");
                    $size_id = $data[$j]->id;

                    $size_detail = new size_detail();
                    $size_detail->id_size = $size_id;
                    $size_detail->number = $so_luong;
                    $size_detail->id_product = $id_p;

                    $size_detail->save();
                    $j++;
                }


               
                 // $int = (int)$num;
                // $intpro = (int)$pro_id;
                
                if($files=$request->file('image')){
                    foreach($files as $file){
                    $name=$file->getClientOriginalName();

                        $image = new images();
                        $image->link =$name;
                        $image->id_product = $id_p;

                        $check_product = $image->save();
                        if($check_product)
                        {
                            $file->move(base_path('\storage\images\product_images'), $name);
                        }
                    
                    
                    }
                }
            
              
           }

            // $image = $request->file('image');
            // $image->move(base_path('\storage\images\other_images'), $image_name);
        }
        echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại)</script>";
        return redirect()-> route('viewpro');

    }



}

  

