@extends('master')

@section('content')
<div id="content">
    <!-- #content Begin -->
    <div class="container">
        <!-- container Begin -->
        <div class="col-md-12">
            <!-- col-md-12 Begin -->

            <ul class="breadcrumb">
                <!-- breadcrumb Begin -->
                <li>
                    <a href="index.php">Trang Chủ</a>
                </li>
                <li>
                    Thanh Toán
                </li>
            </ul><!-- breadcrumb Finish -->

        </div><!-- col-md-12 Finish -->

        <div class="col-md-12">
            <!-- col-md-12 Begin -->
            <div class="box">
                <!-- box Begin -->
            
                <div class="box-header">
                    <!-- box-header Begin -->
            
                    <center>
                        <!-- center Begin -->
            
                        <h1> Đăng nhập </h1>
            
                        <!-- <p class="lead"> Already have our account..? </p>
                      
                      <p class="text-muted"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, maxime. Laudantium omnis, ullam, fuga officia provident error corporis consectetur aliquid corrupti recusandae minus ipsam quasi. Perspiciatis nemo, nostrum magni odit! </p>
                       -->
                    </center><!-- center Finish -->
            
                </div><!-- box-header Finish -->
            
                <form method="post" action="{{url('login')}}">
                    <!-- form Begin -->
                    {{ csrf_field() }}
                    <div class="form-group">
                        <!-- form-group Begin -->
            
                        <label> Email </label>
            
                        <input name="c_email" type="text" class="form-control" required>
            
                    </div><!-- form-group Finish -->
            
                    <div class="form-group">
                        <!-- form-group Begin -->
            
                        <label> Mật khẩu </label>
            
                        <input name="c_pass" type="password" class="form-control" required>
            
                    </div><!-- form-group Finish -->
            
                    <div class="text-center">
                        <!-- text-center Begin -->
            
                        <button name="login" value="Login" class="btn btn-primary">
            
                            <i class="fa fa-sign-in"></i> Đăng nhập
            
                        </button>
            
                    </div><!-- text-center Finish -->
            
                </form><!-- form Finish -->
            
                <center>
                    <!-- center Begin -->
            
                    <a href="customer_register.php">
            
                        <h3> Chưa có tài khoản? Đăng ký ngay ở đây </h3>
            
                    </a>
            
                </center><!-- center Finish -->
            
            </div><!-- box Finish -->
           
            <?php

            // if (!isset($_SESSION['customer_email'])) {

            //     include("customer/customer_login.php");
            // } else {

            //     include("payment_options.php");
            // }

            ?>

        </div><!-- col-md-12 Finish -->

    </div><!-- container Finish -->
</div><!-- #content Finish -->
@endsection