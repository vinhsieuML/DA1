@extends('user.userPageMaster')

@section('userContent')
<center>
    <!--  center Begin  -->

    <h1> Đơn hàng của bạn </h1>

    <p class="lead"> Tất cả đơn hàng được liệt kê</p>

    <p class="text-muted">

        Nếu bạn có thắc mắc, đừng ngại <a href="../contact.php">Liên hệ chúng tôi</a>. Chúng tôi sẽ trả lời sớm nhất có thể

    </p>

</center><!--  center Finish  -->


<hr>


<div class="table-responsive">
    <!--  table-responsive Begin  -->

    <table class="table table-bordered table-hover">
        <!--  table table-bordered table-hover Begin  -->

        <thead>
            <!--  thead Begin  -->

            <tr>
                <!--  tr Begin  -->

                <th> Mã Đơn Hàng: </th>
                <th> Tổng Tiền: </th>
                <th> Ngày đặt </th>
                <th> Tình Trạng: </th>
                <th> Mã GHN: </th>
                <th> GH Dự Kiến: </th>
                <th> Hành Động</th>

            </tr><!--  tr Finish  -->

        </thead><!--  thead Finish  -->

        <tbody>
            <!--  tbody Begin  -->

            <?php
            foreach ($orders as $order) {
                $order_id = $order->id;

                $due_amount = $order->total;

                $order_date = substr($order->date_order, 0, 11);

                $order_status = $order->status;

                $url_payment = $order->url_payment;

                $order_code =  $order->orderCode;

                $expectedDeliveryTime = $order->expectedDeliveryTime;
                

            ?>

                <tr>
                    <!--  tr Begin  -->

                    <th> <a href="{{url('/user/orderInfo/'.$order_id)}}" disable> ORD{{$order_id}} </a></th>
                    <td> <?php echo number_format($due_amount, 0, ',', '.'); ?> đ</td>
                    <td> <?php $date = date_create($order_date);
                            echo date_format($date, 'd-m-Y');
                            ?></td>
                    </td>
                    <td> <?php
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
                    <td>
                        <?php echo $order_code ?>
                    </td>
                    <td>
                        <?php echo $expectedDeliveryTime ?>
                    </td>
                    <td>
                        <?php
                        switch ($order_status) {
                            case 0:
                            case 1:
                                echo 'Chờ xác thực';
                                break;
                            case 2:
                                echo '<a href="' . $url_payment . '" target="_blank" class="btn btn-primary btn-sm" disable> Thanh toán lại </a>';
                                break;
                            case 3: ?>
                                <a href="{{url('/user/confirmOrder/' .$order_id)}}" class="btn btn-primary btn-sm" disable> Đã Nhận Hàng </a>
                        <?php
                                break;
                            case 4:
                                echo 'Hoàn Thành';
                                break;
                            case 5:
                                echo 'Đã hủy bởi bạn';
                                break;
                        } ?>
                    </td>

                </tr><!--  tr Finish  -->

            <?php } ?>

        </tbody><!--  tbody Finish  -->

    </table><!--  table table-bordered table-hover Finish  -->

</div><!--  table-responsive Finish  -->
@endsection