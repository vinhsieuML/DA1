 
                                               <!-- panel-body begin -->
                                               <div class="table-responsive"><!-- table-responsive begin -->
                                                        <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->
                                                                
                                                                <thead><!-- thead begin -->
                                                                <tr><!-- tr begin -->
                                                                        <th> Mã Hãng </th>
                                                                        <th> Tên Hãng </th>
                                                                        <th> Hình </th>
                                                                        <!-- <th> Top Product Category </th> -->
                                                                        <th> Thao tác </th>
                                                                       
                                                                </tr><!-- tr finish -->
                                                                </thead><!-- thead finish -->
                                                                
                                                                <tbody><!-- tbody begin -->
                                                                

                                                                <?php
                                                                foreach ($hang as $key => $value) {
                                                                    $hang_id = $value->id;
                                                                    $hang_name = $value->name;
                                                                    $hang_image = $value->image; ?>
                                                                <tr><!-- tr begin -->
                                                                        <td> {{$hang_id}} </td>
                                                                        <td> {{$hang_name}}  </td>
                                                                        <td>  <img width="65" height="65" src='{{url('images/other_images/'. $hang_image)}}' alt="{{$hang_name}}">  </td>
                                                                        <!-- <td width="300">  </td> -->
                                                                        <td> 
                                                                        <!-- <a href="{{url('admin/edit_p_type')}}"> -->

                                                                        <a href='{{url('admin/edit_hang/'.$hang_id)}}'>

                                                                                <br>
                                                                                <i class="fa fa-pencil"></i> Chỉnh sửa
                                                                        </a>
                                                                        </td>
                                                                       
                                                                </tr><!-- tr finish -->
                                                           


                                                                <?php
                                                                } ?>


                                                               
                                                                
                                                                
                                                                </tbody><!-- tbody finish -->
                                                                
                                                        </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                                                        {!! $hang->links() !!}   
                                                        </div><!-- table-responsive finish -->


                                                                                      

                                                       