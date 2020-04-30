<?php

namespace App\Http\Controllers;

use App\bill;
use App\User;
use App\orderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    //Orders
    public function orders()
    {
        $user = User::where('email', '=', session()->get('customer_email'))->get();

        $order = bill::where('id_customer', $user[0]->id)->orderBy('id', 'desc')->get();

        return view(
            'user.userPages.orders',
            [
                'user' => $user[0],
                'orders' => $order
            ]
        );
    }

    public function orderDetail($billId)
    {
        $orderInfos = DB::table('bill_detail')
            ->join('bill', 'bill_detail.id_product', '=', 'bill.id')
            ->join('product', 'product.id', '=', 'bill_detail.id_product')
            ->join('size_detail', 'size_detail.id', '=', 'bill_detail.id_size_detail')
            ->join('size', 'size.id', '=', 'size_detail.id_size')
            ->select('bill_detail.id', 'bill_detail.price', 'bill_detail.quantity', 'product.name', 'size.name as sizeName', 'bill.status')
            ->where('bill_detail.id_bill', '=', $billId)->get();
        return view('user.userPages.orderInfo', ['orderInfos' => $orderInfos]);
    }

    public function confirmOrder($billId)
    {
        DB::table('bill')->where('id', '=', $billId)
            ->update(['status' => 4]);

        return redirect()->route('userHome');
    }

    //Account
    public function accountInfo()
    {
        $user = User::where('email', '=', session()->get('customer_email'))->get()[0];

        return view('user.userPages.accountInfo', ['user' => $user]);
    }

    public function editAccInfo(Request $request)
    {
        $update_id = $request->customer_id;

        $c_name = $request->c_name;

        $c_address = $request->c_address;

        $c_contact = $request->c_contact;

        $city_id = $request->city_select;

        $district_id = $request->district_select;

        $ward_id = $request->ward_select;

        if (isset($city_id) && isset($district_id) && isset($ward_id)) {
            $affected = DB::table('users')->where('id', '=', $update_id)
                ->update([
                    'name' => $c_name,
                    'address' => $c_address,
                    'phone' => $c_contact,
                    'cityID' => $city_id,
                    'districtID' => $district_id,
                    'wardID' => $ward_id
                ]);
            if ($affected) {
                return redirect()->route('userInfo');
            }
        }
    }

    public function changePass()
    {
        return view('user.userPages.password');
    }
    public function changePassHandler(Request $request)
    {
        $c_email = session()->get('customer_email');

        $c_old_pass = md5($request['old_pass']);

        $c_new_pass = $request['new_pass'];

        $c_new_pass_again = $request['new_pass_again'];

        $sel_c_old_pass = "select * from users where email='$c_email' and password = '$c_old_pass'";

        $sel_c_old_pass = DB::table('users')
            ->where([['email', '=', $c_email], ['password', '=', $c_old_pass]])
            ->count('*')->get();
        if ($sel_c_old_pass == 0) {

            echo "<script>alert('Mật khẩu cũ không đúng vui lòng thử lại')</script>";

            exit();
        }

        if ($c_new_pass != $c_new_pass_again) {

            echo "<script>alert('Mật khẩu mới không trùng khớp')</script>";

            exit();
        }
        $c_new_pass = md5($c_new_pass);

        $update_c_pass = DB::table('users')->where('email', '=', $c_email)
            ->update(['password' => $c_new_pass]);

        if ($update_c_pass) {

            echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại)</script>";

            echo "<script>window.open('logout.php','_self')</script>";
        }
    }
}
