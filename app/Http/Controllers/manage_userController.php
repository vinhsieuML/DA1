<?php

namespace App\Http\Controllers;

use App\admin;
use App\product_type;
use App\product;
use App\images;
use App\User;
use App\size_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class manage_userController extends Controller
{
    public function index()
    {
        $data = DB::table('users')
     
   
     ->paginate(5);
             
        return view('admin.user.view_user', compact('data'));
    }

    public function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $data = DB::table('users')
        ->where('users.id', 'like', '%'.$query.'%')
        ->orWhere('users.name', 'like', '%'.$query.'%')
        ->orWhere('users.phone', 'like', '%'.$query.'%')
        ->orWhere('users.email', 'like', '%'.$query.'%')
        ->orWhere('users.address', 'like', '%'.$query.'%')
        ->orderBy($sort_by, $sort_type)
        ->paginate(5);
            return view('admin.user.pagination_data', compact('data'))->render();
        }
    }


    public function deactivate(Request $request, $u_id)
    {
        try { 

            $edit_pt = DB::table('users')
                ->where('id', $u_id)
                ->update(['status' => '0' ]);
              

                alert()->success('Thành công','Đã cập nhật');
        
                  
            

            } catch(\Illuminate\Database\QueryException $ex){ 
            dd($ex->getMessage()); 
            // Note any method of class PDOException can be called on $ex.
                echo "<script>alert('Có lỗi xảy ra! Vui lòng thử lại')</script>";
                alert()->success('Thành công','Đã xóa');
                return back();

        }
        return back();
    }


    
    public function activate(Request $request, $u_id)
    {
        try { 

            $edit_pt = DB::table('users')
                ->where('id', $u_id)
                ->update(['status' => '1' ]);
              

                alert()->success('Thành công','Đã cập nhật');
        
                  
            

            } catch(\Illuminate\Database\QueryException $ex){ 
            dd($ex->getMessage()); 
            // Note any method of class PDOException can be called on $ex.
                echo "<script>alert('Có lỗi xảy ra! Vui lòng thử lại')</script>";
                alert()->success('Thành công','Đã kích hoạt lại');
                return back();

        }
        return back();
    }



}