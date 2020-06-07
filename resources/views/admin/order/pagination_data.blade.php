<!-- tbody begin -->




<?php
$i=0;
foreach ($data as $row) {
                     
                        $i++;

                        $order_id = $row->id;

                        $c_id =$row->id_customer;  
                    
                        $order_status = $row->status;
                    
                        $total = $row->total;
                    
                        $customer_email = $row->email;
                    
                        $sdt = $row->phone;
                    
                        $dataOrder = $row->date_order;
                    
                        $name = $row->name;
                    
                        $orderCode = $row->orderCode;
                    
                        
?>






    <tr>
        <!-- tr begin -->
        <td> <?php echo $i; ?> </td>
        <td> <a href='{{url('admin/view_order_detail/'.$order_id)}}'> <?php echo 'ORD' . $order_id . ' </a>' ?></td>
        <td> <?php echo $name; ?> </td>
        <td> <?php echo $sdt; ?></td>
        <td> <?php echo $customer_email; ?> </td>
        <td> <?php $date = date_create($dataOrder);
                echo date_format($date, 'd-m-Y');
                ?></td>
        <td> <?php echo number_format($total, 0, ',', '.'); ?> </td>
        <td id= "status<?php echo $order_id ?>"">
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
        <td id="action<?php echo $order_id; ?>">
            <?php
            $link_deactive = url('admin/o/deactive/'.$order_id);
            switch ($order_status) {
                case 0:
                case 1:
                    echo '
                    <a href="' . $link_deactive . '>">
                        <i class="fa fa-trash-o"></i> Huỷ đơn hàng
                    </a>
                    <a style="marginLeft: 10px" id="verify" name ="verify" data-order_id=' . $order_id . '>
                        <i class="fa fa-check"></i> Xác Thực
                    </a>
                    ';
                    break;
                case 2:
                case 3:
                case 4:
                case 5:
                    echo 'Không có hành động';
                    break;
            }

            ?>
        </td>
        <td id="GHN<?php echo $order_id; ?>">
        <?php echo $orderCode; ?>
        </td>
    </tr><!-- tr finish -->

<?php } ?>

<td colspan="10" align="center">
    {!! $data->links() !!}
</td>
</tr>


