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
}