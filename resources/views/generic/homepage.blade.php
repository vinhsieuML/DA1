@extends('master')

@section('content')
<div class="container" id="slider">
    <!-- container Begin -->

    <div class="col-md-12">
        <!-- col-md-12 Begin -->

        <div class="carousel slide" id="myCarousel" data-ride="carousel">
            <!-- carousel slide Begin -->

            <ol class="carousel-indicators">
                <!-- carousel-indicators Begin -->

                <?php
                $count = 0;
                foreach ($sliders as $slider) {
                    if ($count == 0) {
                        echo
                            '
                      <li class="active" data-target="#myCarousel" data-slide-to="' . $count . '"></li>
                     ';
                    } else {
                        echo
                            '
                      <li data-target="#myCarousel" data-slide-to="' . $count . '"></li>
                     ';
                    }
                    $count = $count + 1;
                }
                
                // $query = "select * from slider";
                // $result = mysqli_query($con, $query);

                
                // while ($row_slides = mysqli_fetch_array($result)) {
                
                // }

                ?>

            </ol> <!-- carousel-indicators Finish -->

            <div class="carousel-inner">
                <!-- carousel-inner Begin -->

                <?php

                $count = 0;
                foreach ($sliders as $slider) {
                    $slide_name = $slider->name;
                    $slide_image = $slider->slider_image;
                    $url =  $slider->slider_url;
                    if ($count == 0) {
                        echo
                            '<div class="item active">';
                    } else {
                        echo
                            '
                            <div class="item">';
                    }?>

                            <a href='$url' target='_self'>
                                <img src='{{url('images/slides_images/'. $slide_image)}}' href = '$url'>
                            </a>
                            </div>
                        <?php
                    $count = $count + 1;
                }


                ?>

            </div><!-- carousel-inner Finish -->

            <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                <!-- left carousel-control Begin -->

                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>

            </a><!-- left carousel-control Finish -->

            <a href="#myCarousel" class="right carousel-control" data-slide="next">
                <!-- left carousel-control Begin -->

                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>

            </a><!-- left carousel-control Finish -->

        </div><!-- carousel slide Finish -->

    </div><!-- col-md-12 Finish -->

</div><!-- container Finish -->

<div id="advantages">
    <!-- #advantages Begin -->

    <div class="container">
        <!-- container Begin -->

        <div class="same-height-row">
            <!-- same-height-row Begin -->

            <?php

            // $get_boxes = "select * from boxes_section";
            // $run_boxes = mysqli_query($con, $get_boxes);
            foreach ($boxes as $box) {
                $box_id = $box->id;
                $box_title = $box->box_tile;
                $box_desc = $box->box_desc;
            ?>

                <div class="col-sm-4">
                    <!-- col-sm-4 Begin -->

                    <div class="box same-height">
                        <!-- box same-height Begin -->

                        <div class="icon">
                            <!-- icon Begin -->

                            <i class="fa fa-heart"></i>

                        </div><!-- icon Finish -->

                        <h3><a href="#"><?php   echo $box_title;  ?></a></h3>

                        <p> <?php echo $box_desc; ?> </p>

                    </div><!-- box same-height Finish -->

                </div><!-- col-sm-4 Finish -->

            <?php    } ?>

        </div><!-- same-height-row Finish -->

    </div><!-- container Finish -->

</div><!-- #advantages Finish -->

<div id="hot">
    <!-- #hot Begin -->

    <div class="box">
        <!-- box Begin -->

        <div class="container">
            <!-- container Begin -->

            <div class="col-md-12">
                <!-- col-md-12 Begin -->

                <h2>
                    <strong> Sản phẩm mới nhất </strong>
                </h2>

            </div><!-- col-md-12 Finish -->

        </div><!-- container Finish -->

    </div><!-- box Finish -->

</div><!-- #hot Finish -->

<div id="content" class="container">
    <!-- container Begin -->

    <div class="row">
        <!-- row Begin -->

        <?php
        foreach ($products as $product) {
            $pro_id = $product->id;

            $pro_title = $product->name;

            $pro_price = $product->price;

            $pro_price_f = number_format($pro_price, 0, ',', '.');

            $pro_link = preg_split("/\,/", $product->link)[0];
        ?>
            
            <div class='col-md-4 col-sm-6 single'>
            
                <div class='product eff'>
                
                    <a href='{{url('productDetail/'.$pro_id)}}'>
                    
                        <img class='img-responsive' src='{{url('images/product_images/' . $pro_link)}}'>
                    
                    </a>
                    
                    <div class='text'>

                
                    
                        <h3 class='pad_h'>
                
                            <a href='{{url('productDetail/'.$pro_id)}}'>
                                <?php echo $pro_title ?>

                            </a>
                        
                        </h3>
                        
                        <p class='price'>
                        <?php echo $pro_price_f  ?>
                        VNĐ
                        </p>
                        
                        <p class='button'>
                        
                            <a class='btn btn-default' href='{{url('productDetail/'.$pro_id)}}'>

                                Chi tiết

                            </a>
                        
                            <a class='btn btn-primary' href='{{url('productDetail/'.$pro_id)}}'>

                                <i class='fa fa-shopping-cart'></i> Thêm vào giỏ hàng

                            </a>
                        
                        </p>
                    
                    </div>

                </div>
            
            </div>
        <?php } ?>

    </div><!-- row Finish -->

</div><!-- container Finish -->
@endsection