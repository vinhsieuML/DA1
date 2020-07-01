@extends('./admin.dashboard')

@section('content')

<br><br>
<br><br>




<div class="row" style="width:90%">
    <!-- row no: 2 begin -->

    <div class="col-lg-3 col-md-6">
        <!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-primary">
            <!-- panel panel-primary begin -->

            <div class="panel-heading">
                <!-- panel-heading begin -->
                <div class="row">
                    <!-- panel-heading row begin -->
                    <div class="col-xs-3">
                        <!-- col-xs-3 begin -->

                        <i class="fa fa-tasks fa-5x"></i>

                    </div><!-- col-xs-3 finish -->

                    <div class="col-xs-9 text-right">
                        <!-- col-xs-9 text-right begin -->
                        <div class="huge"> <?php echo $quan_pro; ?> </div>

                        <div> Sản phẩm hiện có </div>

                    </div><!-- col-xs-9 text-right finish -->

                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->

            <a href="{{url('admin/view_products')}}">
                <!-- a href begin -->
                <div class="panel-footer">
                    <!-- panel-footer begin -->

                    <span class="pull-left">
                        <!-- pull-left begin -->
                        Xem chi tiết
                    </span><!-- pull-left finish -->

                    <span class="pull-right">
                        <!-- pull-right begin -->
                        <i class="fa fa-arrow-circle-right"></i>
                    </span><!-- pull-right finish -->

                    <div class="clearfix"></div>

                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->

        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-3 col-md-6 finish -->

    <div class="col-lg-3 col-md-6">
        <!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-green">
            <!-- panel panel-green begin -->

            <div class="panel-heading">
                <!-- panel-heading begin -->
                <div class="row">
                    <!-- panel-heading row begin -->
                    <div class="col-xs-3">
                        <!-- col-xs-3 begin -->

                        <i class="fa fa-users fa-5x"></i>

                    </div><!-- col-xs-3 finish -->

                    <div class="col-xs-9 text-right">
                        <!-- col-xs-9 text-right begin -->
                        <div class="huge"> <?php echo $quan_user; ?> </div>

                        <div> Số lượng tài khoản </div>

                    </div><!-- col-xs-9 text-right finish -->

                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->

            <a href="{{url('admin/view_user')}}">
                <!-- a href begin -->
                <div class="panel-footer">
                    <!-- panel-footer begin -->

                    <span class="pull-left">
                        <!-- pull-left begin -->
                        Xem chi tiết
                    </span><!-- pull-left finish -->

                    <span class="pull-right">
                        <!-- pull-right begin -->
                        <i class="fa fa-arrow-circle-right"></i>
                    </span><!-- pull-right finish -->

                    <div class="clearfix"></div>

                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->

        </div><!-- panel panel-green finish -->
    </div><!-- col-lg-3 col-md-6 finish -->

    <div class="col-lg-3 col-md-6">
        <!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-orange">
            <!-- panel panel-yellow begin -->

            <div class="panel-heading">
                <!-- panel-heading begin -->
                <div class="row">
                    <!-- panel-heading row begin -->
                    <div class="col-xs-3">
                        <!-- col-xs-3 begin -->

                        <i class="fa fa-tags fa-5x"></i>

                    </div><!-- col-xs-3 finish -->

                    <div class="col-xs-9 text-right">
                        <!-- col-xs-9 text-right begin -->
                        <div class="huge"> <?php echo $quan_pro_type; ?> </div>

                        <div> Danh mục sản phẩm </div>

                    </div><!-- col-xs-9 text-right finish -->

                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->

            <a href="{{url('admin/view_p_type')}}">
                <!-- a href begin -->
                <div class="panel-footer">
                    <!-- panel-footer begin -->

                    <span class="pull-left">
                        <!-- pull-left begin -->
                        Xem chi tiết
                    </span><!-- pull-left finish -->

                    <span class="pull-right">
                        <!-- pull-right begin -->
                        <i class="fa fa-arrow-circle-right"></i>
                    </span><!-- pull-right finish -->

                    <div class="clearfix"></div>

                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->

        </div><!-- panel panel-yellow finish -->
    </div><!-- col-lg-3 col-md-6 finish -->

    <div class="col-lg-3 col-md-6">
        <!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-red">
            <!-- panel panel-red begin -->

            <div class="panel-heading">
                <!-- panel-heading begin -->
                <div class="row">
                    <!-- panel-heading row begin -->
                    <div class="col-xs-3">
                        <!-- col-xs-3 begin -->

                        <i class="fa fa-shopping-cart fa-5x"></i>

                    </div><!-- col-xs-3 finish -->

                    <div class="col-xs-9 text-right">
                        <!-- col-xs-9 text-right begin -->
                        <div class="huge"> <?php echo $quan_bill; ?> </div>

                        <div> Đơn hàng </div>

                    </div><!-- col-xs-9 text-right finish -->

                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->

            <a href="{{url('admin/view_order')}}">
                <!-- a href begin -->
                <div class="panel-footer">
                    <!-- panel-footer begin -->

                    <span class="pull-left">
                        <!-- pull-left begin -->
                        Xem chi tiết
                    </span><!-- pull-left finish -->

                    <span class="pull-right">
                        <!-- pull-right begin -->
                        <i class="fa fa-arrow-circle-right"></i>
                    </span><!-- pull-right finish -->

                    <div class="clearfix"></div>

                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->

        </div><!-- panel panel-red finish -->
    </div><!-- col-lg-3 col-md-6 finish -->

</div><!-- row no: 2 finish -->

<div class="row" style="width:90%">
    <!-- row no: 3 begin -->
    <div class="col-lg-8">
        <!-- col-lg-8 begin -->
        <div class="panel panel-primary">
            <!-- panel panel-primary begin -->
            <div class="panel-heading">
                <!-- panel-heading begin -->
                <h3 class="panel-title">
                    <!-- panel-title begin -->

                    <i class="fa fa-money fa-fw"></i> New Orders

                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body">
                <!-- panel-body begin -->
                <div class="table-responsive">
                    <!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered">
                        <!-- table table-hover table-striped table-bordered begin -->

                        <thead>
                            <!-- thead begin -->

                            <tr>
                                <!-- th begin -->

                                <th> Mã Đơn Hàng: </th>
                                <th> Email: </th>
                                <th> Tổng Tiền: </th>
                                <th> Status: </th>

                            </tr><!-- th finish -->

                        </thead><!-- thead finish -->

                        <tbody>
                            <!-- tbody begin -->

                            <?php

                            $i = 0;



                            foreach ($bill as $key) {

                                $order_id = $key->id;

                                $c_id = $key->id_customer;

                                $total = $key->total;
                                $customer_email = $key->email;
                                $order_status = $key->status;

                                $i++;

                            ?>

                                <tr>
                                    <!-- tr begin -->

                                    <td> ORD<?php echo $order_id; ?> </td>
                                    <td>
                                        <?php
                                        echo $customer_email;

                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $total; ?>
                                    </td>
                                    <td>

                                        <?php
                                        switch ($order_status) {
                                            case 0:
                                                echo "<p style='color:blue;'>Đang Chờ Duyệt COD</p>";
                                                break;
                                            case 1:
                                                echo "<p style='color:green;'>Đã Thanh Toán Online</p>";
                                                break;
                                            case 2:
                                                echo "<p style='color:red;'>Đã Hủy Online</p>";
                                                break;
                                            case 3:
                                                echo 'Đang Giao Hàng';
                                                break;
                                            case 4:
                                                echo "<p style='color:orange;'>Hoàn Thành</p>";
                                                break;
                                            case 5:
                                                echo "<p style='color:red;'>Đã Hủy</p>";
                                                break;
                                        }
                                        ?>

                                    </td>

                                </tr><!-- tr finish -->

                            <?php } ?>

                        </tbody><!-- tbody finish -->


                    </table><!-- table table-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->

                <div class="text-right">
                    <!-- text-right begin -->

                    <a href="{{url('admin/view_order')}}">
                        <!-- a href begin -->

                        View All Orders <i class="fa fa-arrow-circle-right"></i>

                    </a><!-- a href finish -->

                </div><!-- text-right finish -->

                <div id="app">
                </div>
            </div><!-- panel-body finish -->

        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-8 finish -->

    <div class="col-md-4">
        <!-- col-md-4 begin -->
        <div class="panel">
            <!-- panel begin -->
            <div class="panel-body">
                <!-- panel-body begin -->
                <div class="mb-md thumb-info">
                    <!-- mb-md thumb-info begin -->
                    <?php $hinh =  session()->get('admin')->image;  ?>

                    <img src='{{url('images/admin_images/'. $hinh)}}' alt="" class="rounded img-responsive" style=" height: auto; width: 50%;" alt="$hinh">


                    <div class="thumb-info-title">
                        <!-- thumb-info-title begin -->

                        <span class="thumb-info-inner"> <?php echo session()->get('admin')->name ?> </span>

                    </div><!-- thumb-info-title finish -->

                </div><!-- mb-md thumb-info finish -->

                <div class="mb-md">
                    <!-- mb-md begin -->
                    <div class="widget-content-expanded">
                        <!-- widget-content-expanded begin -->

                        <i class="fa fa-envelope"></i> <span> Contact: </span><?php echo session()->get('admin')->phone ?> <br />
                    </div><!-- widget-content-expanded finish -->

                    <div class="widget-content-expanded">
                        <!-- widget-content-expanded begin -->

                        <i class="fa fa-user"></i> <span> About me: &nbsp; &nbsp; </span> <br />
                    </div><!-- widget-content-expanded finish -->

                    <p>
                        <!-- p begin -->

                        <?php echo session()->get('admin')->about ?>

                    </p><!-- p finish -->

                    <!-- <h5 class="text-muted"> About Me </h5> -->
                </div><!-- mb-md finish -->

            </div><!-- panel-body finish -->
        </div><!-- panel finish -->
    </div><!-- col-md-4 finish -->
    <canvas id="myChart" width="400" height="100" class="col-md-4"></canvas>
</div><!-- row no: 3 finish -->



<script>
    var ctx = document.getElementById('myChart');
    ctx.style.backgroundColor = 'white';
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?php
                        foreach ($chart as $key => $value) {
                            echo "'" . $value->month . '/' . $value->year . "',";
                        }
                        ?>],
            datasets: [{
                label: 'Doanh thu tháng',
                data: [<?php
                        foreach ($chart as $key => $value) {
                            echo $value->totalIncome . ',';
                        }
                        ?>],
                backgroundColor: [
                    '#337ab7'
                ],
                borderColor: '#337ab7',
                borderWidth: 3,
                fill: false,
            }]
        },
        options: {
            tooltips: {
                callbacks: {
                    label: function(t, d) {
                        var xLabel = d.datasets[t.datasetIndex].label;
                        var yLabel = t.yLabel >= 1000 ? t.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : t.yLabel;
                        return xLabel + ': ' + yLabel;
                    }
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        callback: function(value, index, values) {
                            if (parseInt(value) >= 1000) {
                                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            } else {
                                return value;
                            }
                        }
                    }
                }]
            },
            title: {
                display: true,
                text: 'Thống Kê Doanh Thu 12 Tháng Gần Nhất'
            },
        }
    });
</script>


@endsection