<?php

namespace App\Http\Controllers;
Use Alert;
use Charts;
use App\Charts\SampleChart;
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
        return redirect()->route('homePageAdmin');
    }

    //Load trang giao dien Admin
    public function LoadDashBoard(){
        
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
        
        ->select('bill.id', 'bill.id_customer','bill.status','bill.total', 'users.email','users.phone','bill.date_order','users.name','bill.orderCode')
    
        ->orderBy('bill.date_order', 'desc')
        ->limit(5)
        ->get();

        // 'SELECT SUM(total) FROM `bill` WHERE date_order BETWEEN '2019-12-01' AND '2020-12-31''
        $year=strval(date("Y"));
        // $te1='-01-31' ;
        // $t1 =$year.''.$te1;

        $data_chart1 = DB::table('bill')
        ->whereBetween('date_order', [ $year.''.'-01-01', $year.''.'-01-31'])
        ->sum('total');

        $data_chart2 = DB::table('bill')
        ->whereBetween('date_order', [ $year.''.'-02-01', $year.''.'-02-31'])
        ->sum('total');

        $data_chart3 = DB::table('bill')
        ->whereBetween('date_order', [ $year.''.'-03-01', $year.''.'-03-31'])
        ->sum('total');

        $data_chart4 = DB::table('bill')
        ->whereBetween('date_order', [ $year.''.'-04-01', $year.''.'-04-31'])
        ->sum('total');

        $data_chart5 = DB::table('bill')
        ->whereBetween('date_order', [ $year.''.'-05-01', $year.''.'-05-31'])
        ->sum('total');

        $data_chart6 = DB::table('bill')
        ->whereBetween('date_order', [ $year.''.'-06-01', $year.''.'-06-31'])
        ->sum('total');

        $data_chart7 = DB::table('bill')
        ->whereBetween('date_order', [ $year.''.'-07-01', $year.''.'-07-31'])
        ->sum('total');

        $data_chart8 = DB::table('bill')
        ->whereBetween('date_order', [ $year.''.'-08-01', $year.''.'-08-31'])
        ->sum('total');

        $data_chart9 = DB::table('bill')
        ->whereBetween('date_order', [ $year.''.'-09-01', $year.''.'-09-31'])
        ->sum('total');

        $data_chart10 = DB::table('bill')
        ->whereBetween('date_order', [ $year.''.'-10-01', $year.''.'-10-31'])
        ->sum('total');

        $data_chart11 = DB::table('bill')
        ->whereBetween('date_order', [ $year.''.'-11-01', $year.''.'-11-31'])
        ->sum('total');

        $data_chart12 = DB::table('bill')
        ->whereBetween('date_order', [ $year.''.'-12-01', $year.''.'-12-31'])
        ->sum('total');
       
        // $u = $data_chart->sum('total');
        $ar[] = [2,2,2,2];
        $array = array(2, 2, 3, 4);
        



        $chart = new SampleChart;
        $chart->labels(['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4','Tháng 5',
        'Tháng 6','Tháng 7','Tháng 8','Tháng 9','Tháng 10','Tháng 11','Tháng 12']);
        $chart->dataset('Biểu đồ cột', 'bar', [$data_chart1,$data_chart2,$data_chart3,$data_chart4,$data_chart5,
        $data_chart6,$data_chart7,$data_chart8,$data_chart9,$data_chart10,$data_chart11,$data_chart12])
        ->color("rgb(0, 0, 0)")
        ->backgroundcolor("rgba(64, 207, 255, .4)")
        ->fill(true)
        ->linetension(0.5);
       
        
        $chart->dataset('Biều đồ đường', 'line', [$data_chart1,$data_chart2,$data_chart3,$data_chart4,$data_chart5,
        $data_chart6,$data_chart7,$data_chart8,$data_chart9,$data_chart10,$data_chart11,$data_chart12])
        ->color("rgb(0, 0, 0)")
        ->backgroundcolor("rgba(0, 0, 0, 1)")
        ->fill(false)
        ->linetension(0.75)
        ->dashed([0]);
        $chart->title('Doanh thu',  36, '#666', true,  "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
        

        
        //$u = session()->get('admin');

        

         return view("admin.index",[
                "quan_pro" =>  $quan_pro,
                "quan_user" =>  $quan_user,
                "quan_pro_type" =>  $quan_pro_type,
                "quan_bill" => $quan_bill,
                "bill" => $bill,
                "chart" => $chart,
                //"u" => $u
               
              
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
            alert()->error('Đăng nhập thất bại','Xin vui lòng kiểm tra lại mật khẩu và tài khoản');
            return view('admin.signin');
        }
        else{

            $auth[0]->password=null;
            session(['admin' => $auth[0]]);
            $hi = $auth[0]->name;
            alert()->success('Thành công','Đăng nhập thành công, chào mừng '.$hi.' quay trở lại');
           

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
