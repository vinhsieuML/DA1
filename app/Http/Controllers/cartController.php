<?php

namespace App\Http\Controllers;

use App\cartDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class cartController extends Controller
{
    //
    public function viewCart()
    {
        $select_cart = DB::table('cart_detail')
            ->join('size_detail', 'cart_detail.id_size_detail', '=', 'size_detail.id')
            ->join('size', 'size.id', '=', 'size_detail.id_size')
            ->join('users', 'users.id', '=', 'cart_detail.id_customer')
            ->join('product', 'product.id', '=', 'cart_detail.id_product')
            ->join('images', 'product.id', '=', 'images.id_product')
            ->where('users.email', '=', session()->get('customer_email'))
            ->groupBy('cart_detail.id_size_detail')
            ->select(
                'product.*',
                'size.name as size_name',
                'cart_detail.quantity',
                'cart_detail.id_size_detail',
                DB::raw('GROUP_CONCAT(images.link) as imageID')
            )
            ->get();

        $semilarPro = DB::table('product')
            ->join('images', 'product.id', '=', 'images.id_product')
            ->select('product.*', DB::raw('GROUP_CONCAT(images.link) as link'))
            ->groupBy('product.id')
            ->limit(3)
            ->orderBy(DB::raw('rand()'))
            ->get();
        $userInfo = DB::table('users')
            ->where('email', '=', session()->get('customer_email'))
            ->get()[0];
        return view(
            'user.cart',
            [
                'select_cart' => $select_cart,
                'semilarProducts' => $semilarPro,
                'userInfo' => $userInfo
            ]
        );
    }
    //Update cart
    public function updateCart(Request $request)
    {
        if (isset($request->id_user)) {
            $id_user = $request->id_user;
            $id_size = $request->id_size;
            $qty = $request->quantity;
            Log::debug($id_size);
            $update = DB::table('cart_detail')
                ->where([
                    ['id_size_detail', '=', $id_size],
                    ['id_customer', '=', $id_user]
                ])
                ->update(['quantity' => $qty]);
            if ($update) {
                echo "THANH_CONG";
            } else {
                echo 'THAT_BAI';
            }
        }
    }
    //Delete product
    public function deleteProduct(Request $request)
    {
        if (isset($request['update'])) {
            $email = $request['update'];
            foreach ($request['remove'] as $remove_id) {
                $user = User::where('email','=',$email)->get()[0]->id;
                $check = cartDetail::where([
                    ['id_size_detail','=',$remove_id],
                    ['id_customer','=',$user]
                    ])->delete();
                if (!$check) {

                    echo "<script>alert('Có lỗi xảy ra')</script>";
                }
            }
            $redirect = url('/user/cart');
            echo "<script>window.open('$redirect','_self')</script>";
        }
    }
    public function pay(Request $request)
    {
        if (isset($request->type)) {

            $token =  session()->get('token');
            // Them Buoc Check So Luong

            //Lay data
            $email = session()->get('customer_email');

            $select_cart = DB::table('cart_detail')
                ->join('users', 'users.id', '=', 'cart_detail.id_customer')
                ->where('users.email', '=', $email)
                ->get();
            if ($select_cart->count() == 0) {
                return 1;
            }

            $arrayDetail = array();
            foreach ($select_cart as $key => $row_cart) {

                $pro_id = $row_cart->id_product;

                $pro_size = $row_cart->id_size_detail;

                $pro_qty = $row_cart->quantity;

                $anCart = array(
                    "id" => $pro_id,
                    "idsize" => $pro_size,
                    "quantity" => $pro_qty,
                );

                array_push($arrayDetail, $anCart);
            }
            //Check Out
            if ($request->type == 1) {
                $url = Config::get('serverConfig.localIp') . '/api/cart';

                $fields = array(
                    'token' => $token,
                    'arrayDetail' => $arrayDetail,
                );

                //url-ify the data for the POST
                $fields_string = http_build_query($fields);

                //open connection
                $ch = curl_init();

                //set the url, number of POST vars, POST data
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

                //execute post
                $result = curl_exec($ch);
                curl_close($ch);

                if ($result == "THANH CONG") {
                    echo "1";
                } else {
                    echo "2";
                }

                //close connection
            } else {
                $url =  Config::get('serverConfig.localIp') . '/api/cartOnline';

                $fields = array(
                    'token' => $token,
                    'arrayDetail' => $arrayDetail,
                );

                //url-ify the data for the POST
                $fields_string = http_build_query($fields);

                //open connection
                $ch = curl_init();

                //set the url, number of POST vars, POST data
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                //execute post
                $result = curl_exec($ch);
                curl_close($ch);

                echo $result;
            }
        }
    }
}
