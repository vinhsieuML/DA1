@extends('master')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                    Giỏ hàng
                </li>
            </ul><!-- breadcrumb Finish -->

        </div><!-- col-md-12 Finish -->

        <div id="cart" class="col-md-9">
            <!-- col-md-9 Begin -->

            <div class="box">
                <!-- box Begin -->

            <form action="{{url('user/cart')}}" method="post" enctype="multipart/form-data">
                    <!-- form Begin -->
                    {{ csrf_field() }}
                    <h1>Giỏ hàng</h1>

                    <p class="text-muted">Bạn có <?php //echo $sosanpham; 
                                                    ?> sản phẩm trong giỏ hàng</p>

                    <div class="table-responsive">
                        <!-- table-responsive Begin -->

                        <table class="table">
                            <!-- table Begin -->

                            <thead>
                                <!-- thead Begin -->

                                <tr>
                                    <!-- tr Begin -->

                                    <th colspan="2">Sản phẩm</th>
                                    <th>Số Lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Size</th>
                                    <th colspan="1">Xóa bớt</th>
                                    <th colspan="2">Sub-Total</th>

                                </tr><!-- tr Finish -->

                            </thead><!-- thead Finish -->

                            <tbody>
                                <!-- tbody Begin -->

                                <?php

                                $total = 0;
                                $cartArray = array();
                                foreach ($select_cart as $row_cart) {

                                    $pro_id = $row_cart->id;

                                    $pro_size = $row_cart->id_size_detail;

                                    $pro_qty = $row_cart->quantity;

                                    $name = $row_cart->size_name;

                                    $anCart = array(
                                        "id" => $pro_id,
                                        "idsize" => $pro_size,
                                        "quantity" => $pro_qty,
                                    );

                                    array_push($cartArray, $anCart);


                                    $product_title = $row_cart->name;

                                    $product_img1 = preg_split("/\,/", $row_cart->imageID)[0];

                                    $only_price = $row_cart->price;

                                    $sub_total = $only_price * $pro_qty;

                                    $total += $sub_total;
                                ?>

                                    <tr>
                                        <!-- tr Begin -->

                                        <td>
                                            <img class="img-responsive" src="{{url('images/product_images/'.$product_img1)}}" alt="$product_img1">
                                        </td>
                                        <td>
                                            <a href="{{url('productDetail/'. $pro_id)}}">{{$product_title}}</a>
                                        </td>

                                        <td>

                                            <input type="text" name="quantity" data-user_id="{{$userInfo->id}}" data-size_id="{{$pro_size}}" value="{{$pro_qty}}" class="quantity form-control" width="80px">

                                        </td>

                                        <td>

                                            <?php echo number_format($only_price, 0, ',', '.'); ?>

                                        </td>

                                        <td>

                                            <?php echo $name; ?>

                                        </td>

                                        <td>

                                            <input type="checkbox" name="remove[]" value="<?php echo $pro_size; ?>">

                                        </td>

                                        <td>

                                            <?php echo number_format($sub_total, 0, ',', '.'); ?> VNĐ

                                        </td>

                                    </tr><!-- tr Finish -->

                                <?php
                                } ?>

                            </tbody><!-- tbody Finish -->

                            <tfoot>
                                <!-- tfoot Begin -->

                                <tr>
                                    <!-- tr Begin -->

                                    <th colspan="5">Tổng tiền</th>
                                    <th colspan="2"><?php echo number_format($total, 0, ',', '.'); ?> VNĐ</th>

                                </tr><!-- tr Finish -->

                            </tfoot><!-- tfoot Finish -->

                        </table><!-- table Finish -->



                    </div><!-- table-responsive Finish -->

                    <div class="box-footer">
                        <!-- box-footer Begin -->

                        <div class="pull-left">
                            <!-- pull-left Begin -->

                            <a href="index.php" class="btn btn-default">
                                <!-- btn btn-default Begin -->

                                <i class="fa fa-chevron-left"></i> Tiếp tục mua sắm

                            </a><!-- btn btn-default Finish -->

                        </div><!-- pull-left Finish -->

                        <div class="pull-right">
                            <!-- pull-right Begin -->

                            <button type="submit" name="update" value="{{session()->get('customer_email')}}" class="btn btn-default">
                                <!-- btn btn-default Begin -->

                                <i class="fa fa-refresh"></i> Cập Nhật Giỏ Hàng

                            </button><!-- btn btn-default Finish -->

                            <a id="COD" class="btn btn-primary">

                                Thanh Toán <i class="fa fa-chevron-right"></i>

                            </a>

                            <a id="ONLINE" class="btn btn-primary">

                                Thanh Toán Online <i class="fa fa-chevron-right"></i>

                            </a>

                        </div><!-- pull-right Finish -->

                    </div><!-- box-footer Finish -->

                </form><!-- form Finish -->

            </div><!-- box Finish -->



            <div id="row same-heigh-row">
                <!-- #row same-heigh-row Begin -->
                <div class="col-md-3 col-sm-6">
                    <!-- col-md-3 col-sm-6 Begin -->
                    <div class="box same-height headline">
                        <!-- box same-height headline Begin -->
                        <h3 class="text-center">Sản phẩm bạn có thể thích</h3>
                    </div><!-- box same-height headline Finish -->
                </div><!-- col-md-3 col-sm-6 Finish -->

                <?php
                foreach ($semilarProducts as $semilarProduct) {
                    $pro_id = $semilarProduct->id;

                    $pro_title = $semilarProduct->name;

                    $pro_price = $semilarProduct->price;

                    $pro_price_f = number_format($pro_price, 0, ',', '.');


                    $pro_link = preg_split("/\,/", $semilarProduct->link)[0];
                ?>

                    <div class='col-md-3 col-sm-6 center-responsive'>

                        <div class='product eff'>

                            <a href='{{url('productDetail/'. $pro_id)}}'>

                                <img class='img-responsive' src='{{url('images/product_images/'.$pro_link)}}'>

                            </a>

                            <div class='text'>

                                <h3 class='pad_h'>

                                    <a href='{{url('productDetail/'. $pro_id)}}'>
        
                                    {{$pro_title}}
        
                                </a>
                            
                            </h3>
                            
                            <p class=' price'>

                                        {{$pro_price_f}} VNĐ

                                        </p>

                                        <p class='button'>

                                            <a class='btn btn-default' href='{{url('productDetail/'. $pro_id)}}'>

                                                Chi tiết

                                            </a>

                                            <a class=' btn btn-primary' href='{{url('productDetail/'. $pro_id)}}'>

                                                <i class='fa fa-shopping-cart'></i> Thêm vào giỏ

                                            </a>

                                        </p>

                            </div>

                        </div>

                    </div>
                <?php  } ?>

            </div><!-- #row same-heigh-row Finish -->

        </div><!-- col-md-9 Finish -->

        <div class="col-md-3">
            <!-- col-md-3 Begin -->

            <div id="order-summary" class="box">
                <!-- box Begin -->

                <div class="box-header">
                    <!-- box-header Begin -->

                    <h3>Tóm Tắt Giỏ Hàng</h3>

                </div><!-- box-header Finish -->

                <p class="text-muted">
                    <!-- text-muted Begin -->
                    Phí ship được tính theo địa chỉ trong thông tin cá nhân
                    <div class="column">
                        <div class="row">
                            <label class="col-md-5 control-label">Thành Phố</label>
                            <select name="city_select" id="city_select" class="setw form-control" style="width : 230px">
                            </select>
                        </div>
                        <div class="row">
                            <label class="col-md-5 control-label">Quận</label>
                            <select name="district_select" id="district_select" class="setw form-control" style="width : 230px">
                            </select>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <label class="col-md-5 control-label">Phường</label>
                            <select name="ward_select" class="setw form-control" id="ward_select" style="width : 230px">
                            </select>
                        </div>
                    </div>
                </p><!-- text-muted Finish -->

                <div class="table-responsive">
                    <!-- table-responsive Begin -->

                    <table class="table">
                        <!-- table Begin -->

                        <tbody>
                            <!-- tbody Begin -->

                            <tr>
                                <!-- tr Begin -->

                                <td> Tổng hóa đơn </td>
                                <th> <?php echo number_format($total, 0, ',', '.'); ?> VNĐ</th>

                            </tr><!-- tr Finish -->

                            <tr>
                                <!-- tr Begin -->

                                <td> Phí ship ước tính</td>
                                <td id="shipFee"> $0 </td>

                            </tr><!-- tr Finish -->



                            <tr class="total">
                                <!-- tr Begin -->

                                <td>Tổng Tiền</td>
                                <th> <?php echo number_format($total, 0, ',', '.'); ?> VNĐ</th>

                            </tr><!-- tr Finish -->

                        </tbody><!-- tbody Finish -->

                    </table><!-- table Finish -->

                </div><!-- table-responsive Finish -->

            </div><!-- box Finish -->

        </div><!-- col-md-3 Finish -->

    </div><!-- container Finish -->
</div><!-- #content Finish -->

<?php

$customer_city_id = $userInfo->cityID;

$customer_district_id = $userInfo->districtID;

$customer_ward_id = $userInfo->wardID;
?>
{{-- Thong Tin Dia Chi --}}
<input type="text" name="o_city_id" id="o_city_id" value='{{$customer_city_id}}' hidden>
<input type="text" name="o_district_id" id="o_district_id" value='{{$customer_district_id}}' hidden>
<input type="text" name="o_ward_id" id="o_ward_id" value='{{$customer_ward_id}}' hidden>'

<style>
    .loader {
        border: 6px solid #f3f3f3;
        border-radius: 50%;
        border-top: 6px solid #3498db;
        width: 20px;
        height: 20px;
        -webkit-animation: spin 2s linear infinite;
        /* Safari */
        animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<script>
    function delay(callback, ms) {
        var timer = 0;
        return function() {
            var context = this,
                args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function() {
                callback.apply(context, args);
            }, ms || 0);
        };
    }

    $(document).ready(function(data) {
        $(document).on('keyup', '.quantity', delay(function() {
            var id_users = $(this).data("user_id");
            var id_size = $(this).data("size_id");
            var quantity = $(this).val();
            if (quantity != '') {

                $.ajax({
                    url: "{{url('user/cart/change')}}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        _token: "{{ csrf_token() }}",
                        id_user: id_users,
                        id_size: id_size,
                        quantity: quantity
                    },
                    success: function() {
                        window.location.reload();
                    }

                });

            }

        }, 1000));
    });
</script>

{{-- Thanh Toan --}}
<script>
    $(document).ready(function() {
        $("#COD").click(function() {
            $.ajax({
                url: "{{url('user/cart/pay')}}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    type: 1 // 1 la cod, 2 la online
                },
                success: function(response) {
                    if (parseInt(response) === 1) {
                        alert('Giỏ hàng rỗng');
                    } else {
                        window.open('{{url('user/orders')}}', '_self');
                    }
                }
            });
        });
        $("#ONLINE").click(function() {
            $.ajax({
                url: "{{url('user/cart/pay')}}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    type: 2 // 1 la cod, 2 la online
                },
                success: function(response) {
                    if (parseInt(response) === 1) {
                        alert('Giỏ hàng rỗng');
                    } else {
                        window.open(response, '_self');
                    }
                }
            });
        });
    });
</script>

{{-- Ship fee --}}
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{Config::get('serverConfig.localIp').'/api/city'}}",
            method: "GET",
            headers: {},
            contentType: 'application/json; charset=utf-8',
            success: function(response) {
                var $select = $('#city_select');
                $.each(response, function(index, val) {
                    $select.append($('<option />', {
                        value: response[index]['ProvinceID'],
                        text: response[index]['ProvinceName']
                    }));
                });
                $('option[value=' + $('#o_city_id').val() + ']').attr('selected', true);
                $select.trigger('change');
            }
        });

        $('#city_select').on('change', function() {
            const cityid = this.value;
            $.ajax({
                url: "{{Config::get('serverConfig.localIp') . '/api/district/'}}" + cityid,
                method: "GET",
                headers: {},
                contentType: 'application/json; charset=utf-8',
                success: function(response) {
                    var $select = $('#district_select');
                    $select.empty();
                    $('#ward_select').empty();
                    $.each(response, function(index, val) {
                        $select.append($('<option />', {
                            value: response[index]['DistrictID'],
                            text: response[index]['DistrictName']
                        }));
                    });
                    $('option[value=' + $('#o_district_id').val() + ']').attr('selected', true);
                    $select.trigger('change');
                }
            });
        });

        $('#district_select').on('change', function() {
            const districtID = this.value;
            var $select = $('#ward_select');
            $select.empty();
            $select.append("<option> Đang Tải Dữ Liệu </option>");
            $.ajax({
                url: "{{Config::get('serverConfig.localIp') . '/api/ward/'}}" + districtID,
                method: "GET",
                headers: {},
                contentType: 'application/json; charset=utf-8',
                success: function(response) {
                    $select.empty();
                    $.each(response, function(index, val) {
                        $select.append($('<option />', {
                            value: response[index]['WardCode'],
                            text: response[index]['WardName']
                        }));
                    });
                    $('option[value=' + $('#o_ward_id').val() + ']').attr('selected', true);
                    $select.trigger('change');
                }
            });
        });
        $('#ward_select').on('change', function() {
            const districtID = $('#district_select').val();
            $('#shipFee').html("<div class='loader'></div>");
            $.ajax({
                url: "{{Config::get('serverConfig.localIp') . '/api/shipFee/'}}" + districtID + "/" + 1000,
                method: "GET",
                headers: {},
                contentType: 'application/json; charset=utf-8',
                success: function(response) {
                    console.log(response);
                    $('#shipFee').html(response['CalculatedFee'] + ' VNĐ');
                }
            });
        });
    });
</script>
</body>

</html>
@endsection