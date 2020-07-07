<?php

namespace App\Http\Controllers;

use App\manufacture;
use App\product;
use App\product_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class shopController extends Controller
{
    //
    private function getPCat()
    {
        $pCat = product_type::all();
        return $pCat;
    }

    private function getHang()
    {
        $manufactures = manufacture::all();
        return $manufactures;
    }

    public function viewShop($type, $detail, $page)
    {
        $pCat = $this->getPCat();
        $manufactures = $this->getHang();

        switch ($type) {
            case 'pCat':
                $start_from = ($page - 1) * 6;
                //Title
                $get_p_cat = product_type::find($detail);

                $p_cat_title = $get_p_cat->name;

                $cat_id = $get_p_cat->id;

                $product = DB::table('product')
                    ->join('images', 'product.id', '=', 'images.id_product')
                    ->select('product.*', DB::raw('GROUP_CONCAT(images.link) as link'))
                    ->where([['product.id_type', '=', $cat_id],['product.status','=','1']])
                    ->groupBy('product.id')
                    ->offset($start_from)
                    ->limit(6)
                    ->get();

                $total = product::where([['id_type', '=', $cat_id],['status','=','1']])->count('*');

                $count = $product->count('*');

                return view(
                    'generic.shop',
                    ['count' => $count,
                    'type' => $type,
                    'detail' => $detail,
                    'title' => $p_cat_title,
                    'total' => $total,
                    'products' => $product,
                    'pCat' => $pCat,
                    'manufactures' => $manufactures]
                );
                break;

            case 'manu':
                $start_from = ($page - 1) * 6;
                //Title
                $get_p_cat = manufacture::find($detail);

                $p_cat_title = $get_p_cat->name;

                $cat_id = $get_p_cat->id;

                $product = DB::table('product')
                    ->join('images', 'product.id', '=', 'images.id_product')
                    ->select('product.*', DB::raw('GROUP_CONCAT(images.link) as link'))
                    ->where([['product.id_hang', '=', $detail],['product.status','=','1']])
                    ->groupBy('product.id')
                    ->offset($start_from)
                    ->limit(6)
                    ->get();

                $total = product::where([['id_hang', '=', $detail],['status','=','1']])->count('*');

                $count = $product->count('*');

                return view(
                    'generic.shop',
                    ['count' => $count,
                    'type' => $type,
                    'detail' => $detail,
                    'title' => $p_cat_title,
                    'total' => $total,
                    'products' => $product,
                    'pCat' => $pCat,
                    'manufactures' => $manufactures]
                );
                break;

            case 'search':
                $start_from = ($page - 1) * 6;
                //Title
                $p_cat_title = 'Tìm Kiếm';

                $product = DB::table('product')
                    ->join('images', 'product.id', '=', 'images.id_product')
                    ->select('product.*', DB::raw('GROUP_CONCAT(images.link) as link'))
                    ->where([['product.name', 'like', '%' . $detail . '%'],['product.status','=','1']])
                    ->groupBy('product.id')
                    ->offset($start_from)
                    ->limit(6)
                    ->get();

                $total = product::where([['name', 'like', '%' . $detail . '%'],['status','=','1']])->count('*');

                $count = $product->count('*');

                return view(
                    'generic.shop',
                    ['count' => $count,
                    'type' => $type,
                    'detail' => $detail,
                    'title' => $p_cat_title,
                    'total' => $total,
                    'products' => $product,
                    'pCat' => $pCat,
                    'manufactures' => $manufactures]
                );
                break;

            default:
                # code...
                break;
        }
    }
}
