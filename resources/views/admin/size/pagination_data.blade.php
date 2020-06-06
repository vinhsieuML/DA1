 
 


 
 <!-- panel-body begin -->
 <div  class="table-responsive" id="table_w">

                        <!-- table-responsive begin -->
                        
                        <table  class="table table-hover table-striped table-bordered">
                            <!-- tabel tabel-hover table-striped table-bordered begin -->

                            <thead>
                                <!-- thead begin -->
                                <tr >
                                    <!-- tr begin -->
                                    <th width="25%" > <center> Tên Danh Mục </center> </th>
                                    <th width="25%" > <center> Các Size </center> </th>
                                    <th width="10%" > <center> Trạng thái </center> </th>
                                    <th width="40%" > <center> Thao tác </center>  </th>
                                    <!-- <th> Xóa </th> -->
                                </tr><!-- tr finish -->
                            </thead><!-- thead finish -->

                            <tbody>
                                <!-- tbody begin -->

                                <?php

                                
                                
                                foreach ($product_type as $row) {
                                    $p_type_id = $row->id;
                                    $p_type_name = $row->name;
                                    $p_type_image =$row->image;
                                   
                                    $count=1;
                                   
                                   
                                    foreach ($size as $rows) {
                                        # code...
                                       
                                       
                                        if($rows->id_type == $p_type_id)
                                        {
                                            $count++;
                                            
                                        }
    
                                    }
                                 
                         

                                    if ($count == 1) {
                                     ?>
                                    
                                    <tr>
                                    <td id="center_cell" style ="font-size: 25px;"> {{$p_type_name}} 
                                      <!-- <img width="100" height="100" src='{{url('images/other_images/'. $p_type_image)}}' alt=""> -->
                                    </td>
                                        
                                        <td></td>
                                        <td></td>
                                        
                                    </tr>
                                    <?php

                                    } else { ?>

                                     
                                    <tr>
                                    <td rowspan= {{$count}} id="center_cell"  style ="font-size: 25px;">  {{$p_type_name}}  
                                      <!-- <img width="100" height="100" src='{{url('images/other_images/'. $p_type_image)}}' alt=""> -->
                                    </td>
                                    </tr>
                                    <?php
                                        foreach($size as $rows)
                                        {
                                            $s_stt = $rows->status;
                                            $s_id = $rows->id;
                                            if($rows ->id_type == $p_type_id )
                                            {   $size_id = $rows->id;
                                                ?>
                                                <tr>
                                                    <td id="center_cell">{{$rows->name}}</td>
                                                    <td id="center_cell">
                                                    
                                                    <?php
                                                    if($s_stt==1)
                                                    {
                                                        echo"
                                                        
                                                        <font style='color:#00e600'> <b> Hoạt động </b> </font>
                                                        ";
                                                        }
                                                        if($s_stt==0)
                                                        {
                                                            echo"
                                                            
                                                            <font style='color:#ff8080'> <b> Không hoạt động </b> </font>
                                                            ";
                                                        }
                    
                                                    ?>  
                                                    
                                                    </td>
                                                    <td id="center_cell">
                                                    <a href='{{url('admin/edit_size/'.$size_id)}}'>
                                                   <i class='fa fa-pencil' style="padding-left:45px"></i> <b>  Chỉnh sửa <b>
                                                    </a>
                                                    <br>
                                                    <!-- <a href='index.php?delete_size='>
                                                        <i class='fa fa-trash'></i> Xóa
                                                    </a> -->

                                                    
                                                    <?php
                                                            $link_deactive = url('admin/s/deactive/'.$s_id);
                                                            $link_active =  url('admin/s/active/'.$s_id);
                                                            if($s_stt==1)
                                                            {
                                                                echo"<a href='$link_deactive'>
                                                                
                                                                <i class='glyphicon glyphicon-remove'></i> <font style='color:red'> <b> Xóa </b> </font>
                                                                </a>";
                                                            }
                                                            if($s_stt==0)
                                                            {
                                                                echo"<a href='$link_active'>
                                                                
                                                                <i class='glyphicon glyphicon-ok'></i> <font style='color:green'><b> Kích hoạt lại </b> </font>
                                                                </a>";
                                                            }
                        
                                                        ?>

                                                </td>
                                               
                                                </tr>
                                                
                                                <?php
                                                
                                            }
                                        }
                                           
                                    }

                                    
                                }
                                ?>


                                    <!-- tr finish -->

                                

                            </tbody><!-- tbody finish -->

                        </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                        {!! $product_type->links() !!} 
                    </div><!-- table-responsive finish -->

