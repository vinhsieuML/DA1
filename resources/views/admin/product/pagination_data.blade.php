 
    <!-- panel-body begin -->
    
    

    <div class="table-responsive"><!-- table-responsive begin -->
    
            <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->
                    
                    <thead><!-- thead begin -->
                    <tr><!-- tr begin -->
                            <th> Mã Sản Phẩm </th>
                            <th> Tên Sản Phẩm </th>
                            <th> Hình </th>
                            <th> Giá</th>
                            <th> Trạng Thái</th>
                            <th> Thao Tác</th>

                       
                    </tr><!-- tr finish -->
                    </thead><!-- thead finish -->
                    
                    <tbody><!-- tbody begin -->
                    

                    <?php
                    foreach ($products as $item) {
                        $p_id = $item->id;
                        $p_name = $item->name;
                        $p_price= number_format($item->price, 0, ',', '.');
                        $p_link = preg_split("/\,/", $item->link)[0];
                        $p_stt = $item->status;

                            ?>
                    <tr><!-- tr begin -->
                            <td> {{$p_id}} </td>

                            <td> {{$p_name}}  </td>
                            
                            <td>  <img width="75" height="75" src='{{url('images/product_images/'. $p_link)}}' alt="">  </td>

                            <td> {{$p_price}}  </td>

                            <td>   <?php
                                    if($p_stt==1)
                                    {
                                        echo"
                                        
                                         <font style='color:#00e600'> <b> Đã Kích Hoạt </b> </font>

                                        ";
                                    }
                                    if($p_stt==0)
                                    {
                                        echo"
                                        
                                        <font style='color:#ff9933'> <b> Chưa Kích Hoạt </b> </font>

                                        ";
                                    }

                                ?>  
                            </td>

                            <td> 
                                <a href='{{url('admin/edit_p_type/'.$p_id)}}'>
                                <br>
                                <i class="fa fa-pencil"></i> <b> Chỉnh sửa <b>
                                </a>
                               <br>
                                <?php
                                    if($p_stt==1)
                                    {
                                        echo"<a href='{{url('admin/edit_p_type/'.$p_id)}}'>
                                        
                                        <i class='glyphicon glyphicon-remove'></i> <font style='color:red'> <b> Xóa </b> </font>
                                        </a>";
                                    }
                                    if($p_stt==0)
                                    {
                                        echo"<a href='{{url('admin/edit_p_type/'.$p_id)}}'>
                                        
                                        <i class='glyphicon glyphicon-ok'></i> <font style='color:green'><b> Kích hoạt lại </b> </font>
                                        </a>";
                                    }

                                ?>
                            </td>
                            
                        
                            
                    </tr><!-- tr finish -->
                


                    <?php
                    } ?>


                    
                    
                    
                    </tbody><!-- tbody finish -->
                    
            </table><!-- tabel tabel-hover table-striped table-bordered finish -->
            
            {!! $products->links() !!}     
            </div><!-- table-responsive finish -->
        

                                            

            