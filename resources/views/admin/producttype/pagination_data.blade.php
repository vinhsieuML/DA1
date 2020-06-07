 
                                               <!-- panel-body begin -->
                                                        <div class="table-responsive"><!-- table-responsive begin -->
                                                        <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->
                                                                
                                                                <thead><!-- thead begin -->
                                                                <tr><!-- tr begin -->
                                                                        <th> Mã Danh Mục </th>
                                                                        <th> Tên Danh Mục </th>
                                                                        <th> Hình </th>
                                                                        <!-- <th> Top Product Category </th> -->
                                                                        <th> Thao tác </th>
                                                                       
                                                                </tr><!-- tr finish -->
                                                                </thead><!-- thead finish -->
                                                                
                                                                <tbody><!-- tbody begin -->
                                                                

                                                                <?php
                                                                foreach ($product_type as $key => $value) {
                                                                    $p_type_id = $value->id;
                                                                    $p_type_name = $value->name;
                                                                    $p_type_image = $value->image; ?>
                                                                <tr><!-- tr begin -->
                                                                        <td> {{$p_type_id}} </td>
                                                                        <td> {{$p_type_name}}  </td>
                                                                        <td>  <img width="65" height="65" src='{{url('images/other_images/'. $p_type_image)}}' alt="">  </td>
                                                                        <!-- <td width="300">  </td> -->
                                                                        <td> 
                                                                        <!-- <a href="{{url('admin/edit_p_type')}}"> -->

                                                                        <a href='{{url('admin/edit_p_type/'.$p_type_id)}}'>

                                                                                <br>
                                                                                <i class="fa fa-pencil"></i> Chỉnh sửa
                                                                        </a>
                                                                        </td>
                                                                       
                                                                </tr><!-- tr finish -->
                                                           


                                                                <?php
                                                                } ?>


                                                               
                                                                
                                                                
                                                                </tbody><!-- tbody finish -->
                                                                
                                                        </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                                                        {!! $product_type->links() !!}   
                                                        </div><!-- table-responsive finish -->


                                                                                      

                                                       