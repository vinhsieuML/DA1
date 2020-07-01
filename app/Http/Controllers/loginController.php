<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class loginController extends Controller
{
    private function getLoginForm()
    {
        return view('user.signin');
    }private function getRegisterForm()
    {
        return view('user.register');
    }
    //
    public function login(Request $request)
    {
        if (!$request->session()->has('customer_email')) {
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
        return redirect()->route('homePage');
    }


    public function handleForm(Request $request)
    {
        $customer_email = $request->c_email;
        $pass = $request->c_pass;
        $customer_pass = md5($pass);

        $auth = DB::table('users')
            ->where([['email', '=', $customer_email], ['password', '=', $customer_pass]])
            ->select('users.*')
            ->get();
        if ($auth->count('*') == 0) {
            echo "<script>alert('Bạn đã nhập sai mật khẩu hoặc email')</script>";
            exit();
        }

        //Kiem tra so luong bill
        $bill = DB::table('bill')
            ->where('id_customer', '=', $auth[0]->id)
            ->count('*');
        // Thuc hien request
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => Config::get('serverConfig.localIp') . '/api/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "email=$customer_email&pass=$pass",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // Kiem tra phan hoi
        if (isset(json_decode($response, true)['token'])) {
            session(['token' => json_decode($response, true)['token']]);
            session(['customer_email' => $customer_email]);
        } else {
            return "<script>alert('Server không hoạt động')</script>";
        }
        if ($bill == 0) {

            echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
        } else {

            return redirect()->route('homePage');
        }
    }

    public function handleRegisterForm(Request $request)
    {
        $c_name = $request->c_name;

        $c_email = $request->c_email;

        $c_pass = $request->c_pass;

        $c_phone = $request->c_phone;

        $c_pass_repeat = $request->c_pass_repeat;

        $c_address = $request->c_address;

        $city_id = $request->city_select;

        $district_id = $request->district_select;

        $ward_id = $request->ward_select;

        if (!isset($c_name) || !isset($c_email) || !isset($c_phone) || !isset($c_address) || !isset($city_id) || !isset($district_id) || !isset($ward_id)) {
            echo "<script>alert('Vui lòng nhập đầy đủ')</script>";
            exit();
        }
        if ($c_pass != $c_pass_repeat) {
            echo "<script>alert('Mật khẩu không trùng nhau')</script>";
            exit();
        }
        $c_pass = md5($c_pass);

        $insert_customer = "insert into users (email,password,name,phone,address,cityID,districtID,wardID) values ('$c_email','$c_pass','$c_name','$c_phone','$c_address','$city_id','$district_id','$ward_id')";

        $newUser= new User();
        $newUser->email=$c_email;
        $newUser->password=$c_pass;
        $newUser->name=$c_name;
        $newUser->phone=$c_phone;
        $newUser->address=$c_address;
        $newUser->cityID=$city_id;
        $newUser->districtID=$district_id;
        $newUser->wardID=$ward_id;

        $check = $newUser->save();

        if ( $check ) {

            echo "<script>alert('Đăng Kí Thành Công')</script>";

            $redirect = url('/');

            echo "<script>window.open('$redirect','_self')</script>";
        } else {
            echo "<script>alert('Email Đã Tồn Tại')</script>";
            
            $redirect = url('/');

            echo "<script>window.open('$redirect','_self')</script>";
        }
    }
}
