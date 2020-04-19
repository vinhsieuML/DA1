<body>
    <script src="{{asset('js/jquery-331.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-337.min.js')}}"></script>
    <div id="top">
        <!-- Top Begin -->

        <div class="container">
            <!-- container Begin -->

            <div class="col-md-6 offer">
                <!-- col-md-6 offer Begin -->

                <a href="#" class="btn btn-success btn-sm">

                    <?php

                    if (!session()->has('customer_email')) {

                        echo "Xin chào: Guest";
                    } else {

                        echo "Xin chào: " . session()->get('customer_email');
                    }

                    ?>

                </a>


            </div><!-- col-md-6 offer Finish -->

            <div class="col-md-6">
                <!-- col-md-6 Begin -->

                <ul class="menu">
                    <!-- cmenu Begin -->
                    <li>
                        <a href="{{url('user/orders')}}">Tài khoản của tôi</a>
                    </li>
                    <!-- <li>
                       <a href="cart.php">Go To Cart</a>
                   </li> -->
                    <li>
                        <a href="checkout.php">

                            <?php

                            if (!session()->has('customer_email')) {

                            ?>
                                <a href='{{url('/login')}}'> Đăng Nhập </a>;
                    <li>
                        <a href='{{url('/register')}}'>Đăng Kí</a>
                    </li>";

                <?php } else { ?>

                    <a href='{{url('logout')}}'> Đăng xuất </a>

                <?php  } ?>

                </a>
                </li>

                </ul><!-- menu Finish -->

            </div><!-- col-md-6 Finish -->

        </div><!-- container Finish -->

    </div><!-- Top Finish -->

    <div id="navbar" class="navbar navbar-default">
        <!-- navbar navbar-default Begin -->

        <div class="container">
            <!-- container Begin -->

            <div class="navbar-header">
                <!-- navbar-header Begin -->

                <a href="{{url('/')}}" class="navbar-brand home">
                    <!-- navbar-brand home Begin -->

                    <img src="{{url('images/logo/logo2.png')}}" alt="M-dev-Store Logo" class="hidden-xs">
                    <img src="{{url('images/logo/logo-res.png')}}" alt="M-dev-Store Logo" class="visible-xs">

                </a><!-- navbar-brand home Finish -->

                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

                    <span class="sr-only">Toggle Navigation</span>

                    <i class="fa fa-align-justify"></i>

                </button>

                <button class="navbar-toggle" data-toggle="collapse" data-target="#search">

                    <span class="sr-only">Toggle Search</span>

                    <i class="fa fa-search"></i>

                </button>

            </div><!-- navbar-header Finish -->

            <div class="navbar-collapse collapse" id="navigation">
                <!-- navbar-collapse collapse Begin -->

                <div class="padding-nav">
                    <!-- padding-nav Begin -->

                    <ul class="nav navbar-nav left">
                        <!-- nav navbar-nav left Begin -->

                        <li class="<?php //if (strpos(url()->current(), '/')) { echo "active"; } ?>">
                            <a href="{{url('/')}}">Trang chủ</a>
                        </li>
                        <li class="<?php if (strpos(url()->current(), 'shop')) {
                                        echo "active";
                                    } ?>">
                            <a href="{{url('/shop/pCat/1/1')}}">Cửa hàng</a>
                        </li>

                        <li class="<?php if (strpos(url()->current(), 'contact')) {
                                        echo "active";
                                    } ?>">
                            <a href="{{url('/contact')}}">Liên hệ</a>
                        </li>

                    </ul><!-- nav navbar-nav left Finish -->

                </div><!-- padding-nav Finish -->

                <a href="{{url('user/cart')}}" class="btn navbar-btn btn-primary right">
                    <!-- btn navbar-btn btn-primary Begin -->

                    <i class="fa fa-shopping-cart"></i>

                    <span> <?php $sosanpham = DB::table('cart_detail')
                                ->join('users', 'users.id', '=', 'cart_detail.id_customer')
                                ->where('users.email', '=', session()->get('customer_email'))
                                ->count('*');
                            echo $sosanpham;
                            ?> Sản phẩm trong giỏ hàng</span>

                </a><!-- btn navbar-btn btn-primary Finish -->

                <div class="navbar-collapse collapse right">
                    <!-- navbar-collapse collapse right Begin -->

                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                        <!-- btn btn-primary navbar-btn Begin -->

                        <span class="sr-only">Toggle Search</span>

                        <i class="fa fa-search"></i>

                    </button><!-- btn btn-primary navbar-btn Finish -->

                </div><!-- navbar-collapse collapse right Finish -->

                <div class="collapse clearfix" id="search">
                    <!-- collapse clearfix Begin -->

                    <form method="get" action="shop.php" class="navbar-form">
                        <!-- navbar-form Begin -->

                        <div class="input-group">
                            <!-- input-group Begin -->

                            <input type="text" class="form-control" placeholder="Search" name="user_query" required>

                            <span class="input-group-btn">
                                <!-- input-group-btn Begin -->

                                <button type="submit" name="search" value="Search" class="btn btn-primary">
                                    <!-- btn btn-primary Begin -->

                                    <i class="fa fa-search"></i>

                                </button><!-- btn btn-primary Finish -->

                            </span><!-- input-group-btn Finish -->

                        </div><!-- input-group Finish -->

                    </form><!-- navbar-form Finish -->

                </div><!-- collapse clearfix Finish -->

            </div><!-- navbar-collapse collapse Finish -->

        </div><!-- container Finish -->

    </div><!-- navbar navbar-default Finish -->