 
    <!-- panel-body begin -->
    
    

    <?php
                    foreach ($data as $row) {
                        $u_id = $row->id;
                        $u_name = $row->name;
                        $u_phone=$row->phone;
                        $u_email =$row->email;
                        $u_add= $row->address;
                   

                    ?>

                        
                    <tr id="tr_ho">
                    <td id="sta">{{ $u_id}}</td>
                    <td id="sta">{{ $u_name }}</td>
                    <td id="sta">{{ $u_email}}</td>
                    <td id="sta">{{ $u_add }}</td> 
                    <td id="sta">{{ $u_phone }}</td> 
                   
                 
    
                                <td> 
                                    <a href='{{url('admin/edit_product/'.$u_id)}}'>
                                    <br>
                                    <i class="fa fa-pencil"></i> <b> Xóa <b>
                                    </a>
                                   <br>
                                    
                                </td>
                    

                    <tr>
                        
                    
                     <?php
                     } ?>

                 

                      
                  

                    <td colspan="6" align="center">
                        {!! $data->links() !!}
                    </td>
                    </tr>

                   

                                            

            