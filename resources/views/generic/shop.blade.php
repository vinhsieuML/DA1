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
                    <a href="index.php">Trang chủ</a>
                </li>
                <li>
                    Cửa hàng
                </li>
            </ul><!-- breadcrumb Finish -->

        </div><!-- col-md-12 Finish -->

        <div class="col-md-3">
            <!-- col-md-3 Begin -->

            @include('layouts.sidebar')

        </div><!-- col-md-3 Finish -->

        <div class="col-md-9">
            <!-- col-md-9 Begin -->
            <?php if ($count == 0) { ?>
                <div class='box'>
                    <h1> Không có sản phẩm nào </h1>
                </div>
            <?php
                exit();
            } else {
                $total_pages = ceil($total / 6);
            ?>
                <div class='box'>
                    <center>
                        <strong>
                            <h1 style='color:#4FBFA8'> {{$title}} </h1>
                        </strong>
                    </center>
                </div>
                <center>
                    <ul class="pagination">
                        <li><a href='{{url('shop/'.$type.'/'.$detail.'/1')}}'> Trang Đầu </a> </li>
                        <?php
                                for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <li>
                            <a href='{{url('shop/'.$type.'/'.$detail.'/'.$i)}}'> {{$i}}  </a>
                        </li>
                        <?php     }; ?>
                    <li><a href='{{url('shop/'.$type.'/'.$detail.'/'.$total_pages)}}'>Trang cuối</a> </li>
                    </ul> <!-- pagination Finish -->
                </center>
    <?php
            }
            foreach ($products as $product) {

                $pro_id = $product->id;

                $pro_title = $product->name;

                $pro_price = $product->price;

                $pro_price_f = number_format($pro_price, 0, ',', '.');


                $pro_link = preg_split("/\,/", $product->link)[0];


    ?>
                                <div class='col-md-4 col-sm-6 center-responsive'>

                                    <div class='product eff'>
                                        <a href='{{url('productDetail/'.$pro_id)}}'>
                                            <img class='img-responsive' src='{{url('images/product_images/' . $pro_link)}}'>
                                        </a>

                                        <div class='text'>
                                            <h3 class='pad_h'>
                                                <a href='{{url('productDetail/'.$pro_id)}}' class='pro_title_size'>
                                                    {{$pro_title}}
                                                </a>
                                            </h3>

                                            <p class='price'>
                                                <strong> {{$pro_price_f}} VNĐ </strong>
                                            </p>

                                            <p class='button'>
                                                <a class='btn btn-default' href='{{url('productDetail/'.$pro_id)}}'>
                                                    Chi tiết
                                                </a>

                                                <a class='btn btn-primary' href='{{url('productDetail/'.$pro_id)}}'>
                                                    <i class='fa fa-shoping-cart'></i> Thêm vào giỏ hàng
                                                </a>
                                            </p>
                                        </div>

                                    </div>

                                </div>
                            <?php
                        }

                            ?>



        </div><!-- col-md-9 Finish -->

        <div id=" wait" style="position:absolute;top:40%;left:45%;padding: 200px 100px 100px 100px;">
        </div>

    </div><!-- container Finish -->
</div><!-- #content Finish -->

@endsection