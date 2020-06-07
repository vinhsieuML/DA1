 
                                               <!-- panel-body begin -->
                                               <div class="table-responsive"><!-- table-responsive begin -->
                                                        <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->
                                                                
                                                                <thead><!-- thead begin -->
                                                                <tr><!-- tr begin -->
                                                                    <th> No: </th>
                                                                    <th> Tên: </th>
                                                                    <th> Hình Ảnh: </th>
                                                                    <th> Tên Đăng Nhập: </th>
                                                                    <th> Số Điện Thoại: </th>                                                                      
                                                                </tr><!-- tr finish -->
                                                                </thead><!-- thead finish -->
                                                                
                                                                <tbody><!-- tbody begin -->
                                                                

                                                                <?php
                                                                $i=0;
                                                                foreach ($admin as $key => $value) {
                                                                    $i++;
                                                                    $admin_id = $value->id;
                                                                    $admin_name = $value->name;
                                                                    $admin_image = $value->image; 
                                                                    $admin_username = $value->username;
                                                                    $admin_phone = $value->phone;
                                                                    
                                                                   
                                                                     
                                                                    
                                                                ?>
                                                                <tr><!-- tr begin -->
                                                                        <td> {{$i}} </td>
                                                                        <td> {{$admin_name}}  </td>
                                                                        <td>  <img width="65" height="65" src='{{url('images/admin_images/'. $admin_image)}}' alt="">  </td>
                                                                        <td>{{$admin_username}}</td>
                                                                        <td>{{$admin_phone}}</td>
                                                                       
                                                                </tr><!-- tr finish -->
                                                           


                                                                <?php
                                                                } ?>


                                                               
                                                                
                                                                
                                                                </tbody><!-- tbody finish -->
                                                                
                                                        </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                                                        {!! $admin->links() !!}   
                                                        </div><!-- table-responsive finish -->


                                                                                      

                                                       