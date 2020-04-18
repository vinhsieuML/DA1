<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class loginController extends Controller
{
    private function getForm()
    {
        return view('user.signin');
    }
    //
    public function login(Request $request)
    {
        if (!$request->session()->has('customer_email')) {
            return $this->getForm();
        } else {
            // chuyen sang trang thong tin
        }
    }

    public function logout(){
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
                ->where('id_customer','=',$auth[0]->id)
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
        }
        else{
            return "<script>alert('Server không hoạt động')</script>";
        }
        if ($bill == 0) {

            echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
        } else {

            return redirect()->route('homePage');
        }
    }
}
