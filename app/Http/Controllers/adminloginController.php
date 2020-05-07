<?php

namespace App\Http\Controllers;

use App\admin;
use App\product_type;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

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
        //SAI: phan nay cua User
        if (!$request->session()->has('customer_email')) {
            return $this->getRegisterForm();
        } else {
            return redirect()->route('userHome');
        }
    }
    public function logout()
    {
        //SAI: phan nay cua User
        session()->flush();
        return redirect()->route('homePage');
    }

    //Load trang giao dien Admin
    public function LoadDashBoard(){
        return view('admin.dashboard');
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
            //SAI: phan nay cua User
            //return redirect()->route('homePage');
            return redirect()->route('dashBoard');
        }

       
        
    }


    


  
}
