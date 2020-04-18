<?php

namespace App\Http\Controllers;

use App\cartDetail;
use App\product;
use App\product_type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productDetailController extends Controller
{
    //
    public function getInfoById($proId)
    {
        // Thong Tin San Pham
        $product = DB::table('product')
            ->join('images', 'product.id', '=', 'images.id_product')
            ->select('product.*', DB::raw('GROUP_CONCAT(images.link) as link'))
            ->where('product.id', '=', $proId)
            ->groupBy('product.id')
            ->get();
        $product_type = product_type::find($product[0]->id_type);
        $size_detail = DB::table('product')
            ->join('size_detail', 'product.id', '=', 'size_detail.id_product')
            ->join('size', 'size.id', '=', 'size_detail.id_size')
            ->select('size.name', 'size_detail.number', 'size_detail.id as id_size_detail')
            ->where([['product.id', '=', $proId,], ['size_detail.number', '>', 0]])
            ->get();
        // San Pham Recommend
        $product_recommend = DB::table('product')
            ->join('images', 'product.id', '=', 'images.id_product')
            ->select('product.*', DB::raw('GROUP_CONCAT(images.link) as link'))
            ->groupBy('product.id')
            ->orderBy(DB::raw('rand()'))
            ->limit(4)
            ->get();
        return view(
            'generic.productDetail',
            [
                'product' => $product[0],
                'product_type' => $product_type,
                'size_details' => $size_detail,
                'product_recommends' => $product_recommend
            ]
        );
    }
    public function add_cart(Request $request)
    {
        if (isset($request->product_id)) {

            $p_id = $request->product_id;

            $product_qty = $request->product_qty;

            $product_size = $request->product_size;

            $email = $request->email;

            $user_id = User::where('email', '=', $email)->get()[0]->id;

            $check = DB::table('cart_detail')->where(
                [
                    ['id_customer', '=', $user_id],
                    ['id_size_detail', '=', $product_size]
                ]
            )->get();

            if ($check->count() == 0) {
                $insert = new cartDetail();
                $insert->id_customer = $user_id;
                $insert->id_product = $p_id;
                $insert->quantity = $product_qty;
                $insert->id_size_detail = $product_size;
                $insert->save();
            } else {
                $update = cartDetail::where([['id_customer', '=', $user_id], ['id_size_detail', '=', $product_size]])->get()[0];
                $update->quantity += $product_qty;
                $update->save();
            }
            $reload = url('productDetail/'.$p_id);
            echo "<script>window.open('$reload','_self')</script>";
        }
    }
}
