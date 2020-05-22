@extends('./admin.dashboard')

@section('content')

                <br><br>
                <br><br>

                <div class="row"><!-- row 2 begin -->
                <div class="col-lg-12"><!-- col-lg-12 begin -->
                        <div class="panel panel-default"><!-- panel panel-default begin -->
                        <div class="panel-heading"><!-- panel-heading begin -->
                                <h3 class="panel-title" style="padding:10px"><!-- panel-title begin -->
                                
                                        <font style="font-size:20px" ><b> <i class="fa fa-tags fa-fw"></i> DANH SÁCH HÃNG </b> </font>
                                
                                </h3><!-- panel-title finish -->
                        </div><!-- panel-heading finish -->
                        {{ csrf_field() }}
                        <div id="table_data" class="panel-body">

                         
                                               <!-- panel-body begin -->
                                               <div class="table-responsive"><!-- table-responsive begin -->
                                                        <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->
                                                                
                                                                <thead><!-- thead begin -->
                                                                <tr><!-- tr begin -->
                                                                <th> STT </th>
                                                                    <th> Tên Sản Phẩm </th>
                                                                    <th> Size </th>
                                                                    <th> Số lượng </th>
                                                                    <th> Đơn giá</th>
                                                                       
                                                                </tr><!-- tr finish -->
                                                                </thead><!-- thead finish -->
                                                                
                                                                <tbody><!-- tbody begin -->
                                                                

                                                                <?php
                                                                $i=0;
                                                                foreach ($data as $row) {
                                                                    $i++;
                                                                    $order_id = $row->id;

                                                                    $price = $row->price;
                                                    
                                                                    $quantity = $row->quantity;
                                                    
                                                                    $name = $row->name;
                                                    
                                                                    $status = $row->status;
                                                    
                                                                    $size = $row->sname;
                                                                ?>
                                                                <tr><!-- tr begin -->
                                                                        <th>{{$i}} </th>
                                                                        <td>{{$name}} </td>
                                                                        <td>{{$size}} </td>
                                                                        <td>{{$quantity}} </td>
                                                                        <td>{{$price}} </td>
                                                                       
                                                                </tr><!-- tr finish -->
                                                           


                                                                <?php
                                                                } ?>


                                                               
                                                                
                                                                
                                                                </tbody><!-- tbody finish -->
                                                                
                                                        </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                                                        
                                                        </div><!-- table-responsive finish -->

                        </div>
                        </div><!-- panel panel-default finish -->
                </div><!-- col-lg-12 finish -->
                </div><!-- row 2 finish -->



        <script src="{{asset('js/bootstrap-337.min.js')}}"></script>
    
      
     

@endsection


        