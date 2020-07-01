<?php

namespace App\Http\Controllers;

use Alert;
use Charts;
use App\Charts\SampleChart;
use App\admin;
use App\bill;
use App\product_type;
use App\product;
use DateInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use stdClass;

class adminLoginController extends Controller
{
    private function getLoginForm()
    {

        return view('admin.signin');
    }
    private function getRegisterForm()
    {
        return view('user.register');
    }
    //
    public function login(Request $request)
    {
        //SAI: phan nay cua User
        if (!$request->session()->has('username')) {
            return $this->getLoginForm();
        } else {
            return redirect()->route('userHome');
        }
    }
    public function register(Request $request)
    {
        if (!$request->session()->has('customer_email')) {
            return $this->getRegisterForm();
        } else {
            return redirect()->route('userHome');
        }
    }
    public function logout()
    {
        session()->flush();
        return redirect()->route('homePageAdmin');
    }

    //Load trang giao dien Admin
    public function LoadDashBoard()
    {

        // alert()->success('Title','Lorem Lorem Lorem');
        return $this->LoadData();
    }

    public function LoadData()
    {
        $product = DB::table('product')
            ->get();
        $quan_pro = $product->count('*');

        $users = DB::table('users')
            ->get();
        $quan_user = $users->count('*');

        $product_type = DB::table('product_type')
            ->get();
        $quan_pro_type = $product_type->count('*');

        $h_id = '1';

        $order = DB::table('bill')
            ->where('status', 0)
            ->select('bill.id')
            ->get();
        $quan_bill = $order->count('*');

        $bill = DB::table('bill')
            ->join('users', 'bill.id_customer', '=', 'users.id')
            ->select('bill.id', 'bill.id_customer', 'bill.status', 'bill.total', 'users.email', 'users.phone', 'bill.date_order', 'users.name', 'bill.orderCode')
            ->orderBy('bill.date_order', 'desc')
            ->groupBy()
            ->limit(5)
            ->get();

        $chart = DB::table('bill')
            ->select(DB::Raw("MONTH(date_order) as month,YEAR(date_order) as year, SUM(total) as totalIncome"))
            ->whereRaw("date_order >= DATE_ADD(DATE_ADD('19000101' , INTERVAL TIMESTAMPDIFF(MONTH, '19000101', now()) MONTH),INTERVAL -12 MONTH ) AND status = 4")
            ->groupByRaw("YEAR(date_order), MONTH(date_order)")
            ->orderByRaw("YEAR(date_order), MONTH(date_order)")
            ->get();
        
        $result = array();
        $yearago = now()->sub(new DateInterval('P13M'));

        for ($i=0; $i <=12 ; $i++) { 
            $yearago = $yearago->add(new DateInterval('P1M'));
                $isExist = false;
                foreach ($chart as $key => $value) {
                    $nextMonth = $value->month;
                    $nextYear = $value->year;
                    if($nextMonth == $yearago->month && $nextYear == $yearago->year)
                    {
                        array_push($result,$value);
                        $isExist = true;
                        break;
                    }
                }
                if ($isExist) continue;
                $newObject = new stdClass;
                $newObject->month = $yearago->month;
                $newObject->year = $yearago->year;
                $newObject->totalIncome = 0;
                array_push($result, $newObject);
        }
        return view("admin.index", [
            "quan_pro" =>  $quan_pro,
            "quan_user" =>  $quan_user,
            "quan_pro_type" =>  $quan_pro_type,
            "quan_bill" => $quan_bill,
            "bill" => $bill,
            "chart" => $result,
        ]);
    }

    public function handleForm(Request $request)
    {
        $customer_email = $request->c_email;
        $pass = $request->c_pass;
        $customer_pass = $pass;

        $auth = admin::where([['username', '=', $customer_email], ['password', '=', $customer_pass]])
            ->select('admin.*')
            ->get();
        if ($auth->count('*') == 0) {

            //exit();
            alert()->error('Đăng nhập thất bại', 'Xin vui lòng kiểm tra lại mật khẩu và tài khoản');
            return view('admin.signin');
        } else {

            $auth[0]->password = null;
            session(['admin' => $auth[0]]);
            $hi = $auth[0]->name;
            alert()->success('Thành công', 'Đăng nhập thành công, chào mừng ' . $hi . ' quay trở lại');


            return redirect()->route('dashBoard');
            // return LoadDashBoard($quan_pro,$quan_user,$quan_pro_type,$quan_bill,$bill,$auth[0]);
            // return view("admin.index",[
            //     "quan_pro" =>  $quan_pro,
            //     "quan_user" =>  $quan_user,
            //     "quan_pro_type" =>  $quan_pro_type,
            //     "quan_bill" => $quan_bill,
            //     "bill" => $bill,
            //     "auth" => $auth[0]
            // ]);
        }
    }
}
