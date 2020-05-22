<?php

namespace App\Http\Controllers;

use App\admin;
use App\product_type;
use App\product;
use App\images;
use App\User;
use App\size_detail;
use App\bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class manage_orderController extends Controller
{
    public function index()
    {
        $data = DB::table('bill')
        ->join('users', 'bill.id_customer', '=', 'users.id')
        ->select('bill.id', 'bill.id_customer','bill.status','bill.total', 'users.email','users.phone','bill.date_order','users.name','bill.orderCode')
    
        ->orderBy('bill.status', 'asc')
        ->paginate(10);
             


        
    

        return view('admin.order.view_order', compact('data'));
    }

    public function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $data = DB::table('bill')
        ->join('users', 'bill.id_customer', '=', 'users.id')
        ->select('bill.id', 'bill.id_customer','bill.status','bill.total', 'users.email','users.phone','bill.date_order','users.name','bill.orderCode')
      
        ->where('bill.id', 'like', '%'.$query.'%')
        ->orWhere('users.name', 'like', '%'.$query.'%')
        ->orWhere('users.phone', 'like', '%'.$query.'%')
        ->orWhere('users.email', 'like', '%'.$query.'%')
        ->orWhere('bill.total', 'like', '%'.$query.'%')
        ->orderBy('bill.status', 'asc')
        ->paginate(10);
            return view('admin.order.pagination_data', compact('data'))->render();
        }
    }

    public function getTypeInfoById($billId)
    {


       

        // Thong Tin order detail
        $data = DB::table('bill_detail')
        ->join('bill', 'bill.id', '=', 'bill_detail.id_bill')
        ->join('product','product.id','=','bill_detail.id_product')
        ->join('size_detail','size_detail.id','=','bill_detail.id_size_detail')
        ->join('size','size.id','=','size_detail.id_size')
        ->select('bill_detail.id','bill_detail.price','bill_detail.quantity','product.name','bill.status','size.name as sname')
        
        ->where('bill.id', '=', $billId)
        ->get();


        // $sizeArray = DB::table('bill_detail')
        // ->join('bill', 'bill.id', '=', 'bill_detail.id_bill')
        // ->join('product','product.id','=','bill_detail.id_product')
        // ->join('size_detail','size_detail.id','=','bill_detail.id_size_detail')
        // ->join('size','size.id','=','size_detail.id_size')
        // ->select('size.name')
        
        // ->where('bill.id', '=', $billId)
        // ->get();
       
        
       
        return view(
            'admin.order.view_order_detail',
            [
        
                'data' => $data
                // 'sizeArray' => $sizeArray
              
            ]
        );
    }








}