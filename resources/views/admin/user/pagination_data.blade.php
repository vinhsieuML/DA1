 
    <!-- panel-body begin -->
    
    

    <?php
                    foreach ($data as $row) {
                        $u_id = $row->id;
                        $u_name = $row->name;
                        $u_phone=$row->phone;
                        $u_email =$row->email;
                        $u_add= $row->address;
                        $u_stt = $row->status
                   

                    ?>

                        
                    <tr id="tr_ho">
                    <td id="id">{{ $u_id}}</td>
                    <td id="name">{{ $u_name }}</td>
                    <td id="email">{{ $u_email}}</td>
                    <td id="address">{{ $u_add }}</td> 
                    <td id="phone">{{ $u_phone }}</td>
                    <td id="status"> <?php
                                    if($u_stt==1)
                                    {
                                        echo"
                                        
                                         <font style='color:#00e600'> <b> Hoạt động </b> </font>
                                         ";
                                        }
                                        if($u_stt==0)
                                        {
                                            echo"
                                            
                                            <font style='color:#ff8080'> <b> Không hoạt động </b> </font>
                                            ";
                                        }
    
                                    ?>  
                                </td></td>  
                   
                 
    
                                <td> 
                                   
                                    
                                   
                                    </a>
                                  
                                   <?php
                                        $link_deactive = url('admin/u/deactive/'.$u_id);
                                        $link_active =  url('admin/u/active/'.$u_id);
                                        if($u_stt==1)
                                        {
                                            echo"<a href='$link_deactive'>
                                            
                                            <i class='glyphicon glyphicon-remove'></i> <font style='color:red'> <b> Xóa </b> </font>
                                            </a>";
                                        }
                                        if($u_stt==0)
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

                 

                      
                  

                    <td colspan="7" align="center">
                        {!! $data->links() !!}
                    </td>
                    </tr>

                   

                                            

            