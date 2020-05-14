 
 


 
 <!-- panel-body begin -->
 <div  class="table-responsive" id="table_w">

                        <!-- table-responsive begin -->
                        
                        <table  class="table table-hover table-striped table-bordered">
                            <!-- tabel tabel-hover table-striped table-bordered begin -->

                            <thead>
                                <!-- thead begin -->
                                <tr >
                                    <!-- tr begin -->
                                    <th width="40%" > <center> Tên Danh Mục </center> </th>
                                    <th width="40%" > <center> Các Size </center> </th>
                                    <th width="20%" > <center> Thao tác </center>  </th>
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
                                    <td id="center_cell"> {{$p_type_name}} 
                                      <br>  <br><img width="100" height="100" src='{{url('images/other_images/'. $p_type_image)}}' alt="">
                                    </td>
                                        
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php

                                    } else { ?>

                                     
                                    <tr>
                                    <td rowspan= {{$count}} id="center_cell">  {{$p_type_name}}  
                                       <br> <br><img width="100" height="100" src='{{url('images/other_images/'. $p_type_image)}}' alt="">
                                    </td>
                                    </tr>
                                    <?php
                                        foreach($size as $rows)
                                        {
                                            if($rows ->id_type == $p_type_id )
                                            {   $size_id = $rows->id;
                                                ?>
                                                <tr>
                                                    <td id="center_cell">{{$rows->name}}</td>
                                                    <td id="center_cell">
                                                    <a href='{{url('admin/edit_size/'.$size_id)}}'>
                                                        <i class='fa fa-pencil'></i> Chỉnh sửa
                                                    </a>
                                                    &emsp;&emsp;
                                                    <a href='index.php?delete_size='>
                                                        <i class='fa fa-trash'></i> Xóa
                                                    </a>
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

