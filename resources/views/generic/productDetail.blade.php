@extends('master')

@section('content')

<?php
$product_id = $product->id;

$p_cat_id = $product->id_type;

$pro_title = $product->name;

$pro_price = $product->price;

$pro_desc = $product->description;

$pro_link = $product->link;

$p_cat_title = $product_type->name;
?>
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
                    <a href="shop.php">Cửa hàng</a>
                </li>

                <li>
                    <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                </li>
                <li> <?php echo $pro_title; ?> </li>
            </ul><!-- breadcrumb Finish -->

        </div><!-- col-md-12 Finish -->

        <div class="col-md-12">
            <!-- col-md-12 Begin -->
            <div id="productMain" class="row">
                <!-- row Begin -->
                <div class="col-sm-6">
                    <!-- col-sm-6 Begin -->
                    <div id="mainImage">
                        <!-- #mainImage Begin -->
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- carousel slide Begin -->
                            <ol class="carousel-indicators">
                                <!-- carousel-indicators Begin -->
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol><!-- carousel-indicators Finish -->

                            <div class="carousel-inner">
                                <?php
                                foreach (preg_split("/\,/", $pro_link) as $key => $value) {
                                    if ($key == 0) {
                                ?>
                                            <div class='item active'>
                                                <center><img class='img-responsive' src='{{url('images/product_images/'. $value)}}' alt='Product 3-a'></center>
                                            </div>"
                                <?php
                                    } else {
                                ?>
                                        <div class='item'>
                                            <center><img class='img-responsive' src='{{url('images/product_images/'. $value)}}' alt='Product 3-a'></center>
                                        </div>
                                <?php
                                    }
                                }
                                ?>

                            </div>

                            <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                                <!-- left carousel-control Begin -->
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a><!-- left carousel-control Finish -->

                            <a href="#myCarousel" class="right carousel-control" data-slide="next">
                                <!-- right carousel-control Begin -->
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a><!-- right carousel-control Finish -->

                        </div><!-- carousel slide Finish -->
                    </div><!-- mainImage Finish -->


                </div><!-- col-sm-6 Finish -->

                <div class="col-sm-6">
                    <!-- col-sm-6 Begin -->
                    <div class="box">
                        <h1 class="text-center"> <?php echo $pro_title; ?> </h1>
                        <?php //add_cart(); 
                        ?>
                        <form action="{{url()->current()}}" class="form-horizontal" method="post">
                            <input id="email" value={{ session()->get('customer_email') ?? ''}} name='email' readonly hidden />
                            <input id="product_id" value=<?php echo $product_id; ?> name='product_id' readonly hidden />

                            @csrf

                            <!--form-horizontal Begin-->
                            <div class="form-group">
                                <!-- form-group Begin-->
                                <label for="" class="col-md-5 control-label">Số lượng </label>

                                <div class="col-md-7">
                                    <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                    <input type="number" id="number" value="1" name='product_qty' readonly />
                                    <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                                    <script>
                                        function increaseValue() {
                                            var value = parseInt(document.getElementById('number').value, 10);
                                            value = isNaN(value) ? 0 : value;
                                            value++;
                                            console.log(value);
                                            document.getElementById('number').value = value;
                                        }

                                        function decreaseValue() {
                                            var value = parseInt(document.getElementById('number').value, 10);
                                            value = isNaN(value) ? 0 : value;
                                            value < 2 ? value = 2 : '';
                                            value--;
                                            document.getElementById('number').value = value;
                                        }
                                    </script>
                                </div>

                            </div> <!-- form-group Finish-->
                            <br>

                            <div class="form-group">
                                <!-- form-group Begin-->
                                <label class="col-md-5 control-label">Chọn size</label>

                                <div class="col-md-7">
                                    <select name="product_size" class="setw">
                                        <?php
                                        foreach ($size_details as $size_detail) {
                                            $id = $size_detail->id_size_detail;
                                            $name = $size_detail->name;
                                            echo '<option value= "' . $id . '"> ' . $name . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div> <!-- form-group Finish-->
                            <hr>
                            <p class="price"> <?php echo number_format($pro_price, 0, ',', '.'); ?> VNĐ</p>

                            <p class="text-center button"><button class="btn btn-primary i fa fa-shopping-cart"><strong> Thêm vào giỏ </strong></button></p>

                        </form>
                        <!--form-horizontal Finish-->
                    </div>

                    <div class="row" id="thumbs">
                        <!-- row Begin -->

                        <?php foreach (preg_split("/\,/", $pro_link) as $key => $value) { ?>
                            <div class='col-xs-4'>
                                <a data-target='#myCarousel' data-slide-to='$key' href='#' class='thumbs'>
                                    <img src='{{url('images/product_images/'.$value)}}' alt='' class='img-responsive'>
                                </a>
                            </div>
                        <?php } ?>
                    </div> <!-- row Begin -->
                </div> <!-- col-sm-6 Finish -->


            </div><!-- row Finish -->

            <div class="box" id="details">
                <!-- box Begin -->
                <center>
                    <h2 style="color:#4FBFA8;">
                        <strong>
                            <font size="6">Chi tiết sản phẩm</font>
                        </strong>
                    </h2>
                    <p>
                        <?php echo $pro_desc; ?>
                    </p>
                    <hr>
                </center>
            </div><!-- box Finish -->

            <div id="row same-heigh-row">
                <!-- #row same-heigh-row Begin -->
                <div class="box">
                    <!-- box Begin -->

                    <div class="container">
                        <!-- container Begin -->

                        <div class="col-md-12">
                            <!-- col-md-12 Begin -->
                            <center>
                                <h2 style="color:#4FBFA8;">
                                    <strong> Sản phẩm bạn có thể thích </strong>
                                </h2>
                            </center>

                        </div><!-- col-md-12 Finish -->

                    </div><!-- container Finish -->

                </div><!-- box Finish -->

                <?php
                foreach ($product_recommends as $product_recommend) {
                    $pro_id = $product_recommend->id;
                        $pro_title = $product_recommend->name;
                        $pro_price = $product_recommend->price;
                        $pro_price_f = number_format($pro_price, 0, ',', '.');
                        $pro_link = preg_split("/\,/", $product_recommend->link)[0];
                ?>
                    
                    <div class='col-md-3 col-sm-6 center-responsive'>
                    
                        <div class='product eff'>
                        
                        <a href='{{url("productDetail/$pro_id")}}'>
                            
                                <img class='img-responsive' src='{{url('images/product_images/'.$pro_link)}}'>
                            
                            </a>
                            
                            <div class='text'>
                            
                                <h3 class='pad_h'>
                        
                                    <a href='{{url("productDetail/$pro_id")}}'>
            
                                        <?php echo $pro_title ?>
            
                                    </a>
                                
                                </h3>
                                
                                <p class='price'>
                                
                                    <?php echo $pro_price_f  ?>VNĐ
                                
                                </p>
                                
                                <p class='button'>
                                
                                    <a class='btn btn-default' href='{{url("productDetail/$pro_id")}}'>
            
                                        Chi tiết
            
                                    </a>
                                
                                    <a class='btn btn-primary' href='{{url("productDetail/$pro_id")}}'>
            
                                        <i class='fa fa-shopping-cart'></i> Thêm vào giỏ
            
                                    </a>
                                
                                </p>
                            
                            </div>
            
                            
                        
                        </div>
                    
                    </div>
                    
                    

                <?php }?>

            </div><!-- #row same-heigh-row Finish -->

        </div><!-- col-md-12 Finish -->

    </div><!-- container Finish -->
</div><!-- #content Finish -->

@endsection