 
    <!-- panel-body begin -->
    
    

                    <?php
                    foreach ($data as $row) {
                        $p_id = $row->id;
                        $p_name = $row->name;
                        $p_price= number_format($row->price, 0, ',', '.');
                        $p_link = preg_split("/\,/", $row->link)[0];
                        $p_stt = $row->status;

                    ?>

                        
                    <tr id="tr_ho">
                    <td id="sta">{{ $row->id}}</td>
                    <td id="sta">{{ $row->name }}</td>
                    <td id="sta">{{ $p_price }}</td>  
                    <td>  <img width="85" height="85" src='{{url('images/product_images/'. $p_link)}}' alt="{{$row->name}}">  </td>    
                    <td id="sta">   <?php
                                    if($p_stt==1)
                                    {
                                        echo"
                                        
                                         <font style='color:#00e600'> <b> Đã Kích Hoạt </b> </font>
                                         ";
                                        }
                                        if($p_stt==0)
                                        {
                                            echo"
                                            
                                            <font style='color:#ff8080'> <b> Chưa Kích Hoạt </b> </font>
                                            ";
                                        }
    
                                    ?>  
                                </td>
    
                                <td> 
                                    <a href='{{url('admin/edit_product/'.$p_id)}}'>
                                    <br>
                                    <i class="fa fa-pencil"></i> <b> Chỉnh sửa <b>
                                    </a>
                                   <br>
                                    <?php
                                        $link_deactive = url('admin/deactive/'.$p_id);
                                        $link_active =  url('admin/active/'.$p_id);
                                        if($p_stt==1)
                                        {
                                            echo"<a href='$link_deactive'>
                                            
                                            <i class='glyphicon glyphicon-remove'></i> <font style='color:red'> <b> Xóa </b> </font>
                                            </a>";
                                        }
                                        if($p_stt==0)
                                        {
                                            echo"<a href='$link_active'>
                                            
                                            <i class='glyphicon glyphicon-ok'></i> <font style='color:green'><b> Kích hoạt lại </b> </font>
                                            </a>";
                                        }
    
                                    ?>
                                </td>
                    

                    <tr>
                        
                    
                     <?php
                     } ?>

                 

                      
                  

                    <td colspan="6" align="center">
                        {!! $data->links() !!}
                    </td>
                    </tr>

                   

                                            

            