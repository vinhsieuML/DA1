<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class productDetailController extends Controller
{
    //
    public function getInfoByDetail($id){
        $products = DB::table('product')
                    ->join('images','product.id','=','images.id_product')
                    ->select('product.*', DB::raw('GROUP_CONCAT(images.link) as link'))
                    ->where('product.id','=',$id)
                    ->groupBy('product.id')
                    ->get();

    }
}
