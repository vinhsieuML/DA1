@extends('user.userPageMaster')

@section('userContent')
<center>
    <!--  center Begin  -->

    <h1> Chi Tiết Đơn Hàng </h1>

    <p class="lead"> Chi tiết được liệt kê</p>

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

                <th> STT </th>
                <th> Tên Sản Phẩm </th>
                <th> Size </th>
                <th> Số lượng </th>
                <th> Đơn giá</th>

            </tr><!--  tr Finish  -->

        </thead><!--  thead Finish  -->

        <tbody>
            <!--  tbody Begin  -->

            <?php

            foreach ($orderInfos as $key => $orderInfo) {

                $order_id = $orderInfo->id;

                $price = $orderInfo->price;

                $quantiy = $orderInfo->quantity;

                $name = $orderInfo->name;

                $status = $orderInfo->status;

                $size = $orderInfo->sizeName;
            ?>

                <tr>
                    <!--  tr Begin  -->

                    <th> <?php echo $key ?></th>
                    <td> <?php echo $name; ?> </td>
                    <td> <?php echo $size ?></td>
                    <td><?php echo $quantiy ?></td>
                    <td>
                        <?php echo $price?>
                    </td>

                </tr><!--  tr Finish  -->

            <?php } ?>

        </tbody><!--  tbody Finish  -->

    </table><!--  table table-bordered table-hover Finish  -->

</div><!--  table-responsive Finish  -->
@endsection