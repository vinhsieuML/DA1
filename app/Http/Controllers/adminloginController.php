<?php

namespace App\Http\Controllers;

use App\admin;
use App\product_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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


  

    public function getpro_type()
    {
        // $product_type = product_type::all()->paginate(3);
        $product_type = DB::table('product_type')->paginate(5);

        return view("admin.producttype.view_pro_type", ["product_type"=>$product_type]);

    
    }

    public function insert_pro_type()
    {
        
        
        return view('admin.producttype.insert_pro_type');

    
    }
    

    public function insert_pro_type_form(Request $request)
    {
    


        if($request->isMethod('post'))
        {
            $name = $request->input("name");
            $image_name = $request->file('image')->getClientOriginalName();

            $product_type = new product_type();
            $product_type->name =$name;
            $product_type->image=$image_name;
            $product_type->save();

            $image = $request->file('image');
            $image->move(base_path('\storage\images\other_images'), $image_name);
        }
        echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại)</script>";
        return redirect()-> route('viewproType');
    }


   

    public function edit_pro_type_form(Request $request, $pt_id)
    {   
        // $new_name = $request->input('p_cat_title');
        // $new_image = $request->file('p_cat_image')->getClientOriginalName(); 
        // $image = $request->file('image');
        // $image->move(base_path('\storage\images\other_images'), $image_name);

        // DB::table('product_type')
        //     ->where('id', $pt_id)
        //     ->update(['name' => $new_name,'image' => $new_image ]);


        try { 
            $new_name = $request->input('p_cat_title');
            $new_image = $request->file('p_cat_image')->getClientOriginalName(); 
            $image = $request->file('p_cat_image');
            

            $edit_pt = DB::table('product_type')
                ->where('id', $pt_id)
                ->update(['name' => $new_name,'image' => $new_image ]);
              

                echo "<script>alert('Thay đổi thành công, vui lòng đăng nhập lại)</script>";
        
                  
            

            } catch(\Illuminate\Database\QueryException $ex){ 
            dd($ex->getMessage()); 
            // Note any method of class PDOException can be called on $ex.
                echo "<script>alert('Có lỗi xảy ra! Vui lòng thử lại')</script>";
                return redirect()-> route('admin.producttype.edit_pro_type');
        }
        $image->move(base_path('\storage\images\other_images'), $new_image);

      
        return redirect()-> route('viewproType');

    }


    public function getTypeInfoById($proTypeId)
    {
        // Thong Tin San Pham
        $product_type = DB::table('product_type')
            
            ->select('product_type.*')
            ->where('product_type.id', '=', $proTypeId)
         
            ->get();
       
        // San Pham Recommend
       
        return view(
            'admin.producttype.edit_pro_type',
            [
        
                'product_type' => $product_type[0]
              
            ]
        );
    }


    public function handleRegisterForm(Request $request)
    {
        //SAI: phan nay cua User
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
