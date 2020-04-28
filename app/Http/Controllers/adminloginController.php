<?php

namespace App\Http\Controllers;

use App\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class adminloginController extends Controller
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
        return redirect()->route('homePage');
    }


    public function handleForm(Request $request)
    {
        $customer_email = $request->c_email;
        $pass = $request->c_pass;
        $customer_pass = $pass;

        $auth = DB::table('admin')
            ->where([['username', '=', $customer_email], ['password', '=', $customer_pass]])
            ->select('admin.*')
            ->get();
        if ($auth->count('*') == 0) {
            echo "<script>alert('Bạn đã nhập sai mật khẩu hoặc email')</script>";
            //exit();
            return view('admin.signin');
        }
        else{
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
