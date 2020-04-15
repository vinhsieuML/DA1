<?php

namespace App\Http\Controllers;

use App\boxes;
use App\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homepageController extends Controller
{
    //
    public function LoadData(){
        $slider = slider::all();
        $boxes = boxes::all();

        $products = DB::table('product')
                    ->join('images','product.id','=','images.id_product')
                    ->select('product.*', DB::raw('GROUP_CONCAT(images.link) as link'))
                    ->groupBy('product.id')
                    ->limit(8)
                    ->get();
        return view('homepage',['sliders'=> $slider,'boxes' => $boxes,'products'=>$products]);
    }
}
