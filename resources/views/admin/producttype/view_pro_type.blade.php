<!DOCTYPE html>
        <html lang="en">

        <head>
                <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>SH Basketball</title>
            <link rel="stylesheet" href="{{asset('css/bootstrap-337.min.css')}}">
            <link rel="stylesheet" href="{{asset('font-awsome/css/font-awesome.min.css')}}">
            <link rel="stylesheet" href="{{asset('css/style.css')}}">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        </head>

        <body>

                <div id="wrapper">
                        <!-- #wrapper begin -->

                        @include('./layouts.adminsidebar')
                        <center>
                        <div id="page-wrapper">
                                <!-- #page-wrapper begin -->
                                <div class="container-fluid"><!-- container-fluid begin -->

                                      <br><br>
                                      <br><br>

                                        <div class="row"><!-- row 2 begin -->
                                        <div class="col-lg-12"><!-- col-lg-12 begin -->
                                                <div class="panel panel-default"><!-- panel panel-default begin -->
                                                <div class="panel-heading"><!-- panel-heading begin -->
                                                        <h3 class="panel-title"><!-- panel-title begin -->
                                                        
                                                        <i class="fa fa-tags fa-fw"></i> View Product Categories
                                                        
                                                        </h3><!-- panel-title finish -->
                                                </div><!-- panel-heading finish -->
                                                
                                                <div class="panel-body"><!-- panel-body begin -->
                                                        <div class="table-responsive"><!-- table-responsive begin -->
                                                        <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->
                                                                
                                                                <thead><!-- thead begin -->
                                                                <tr><!-- tr begin -->
                                                                        <th> Mã Danh Mục </th>
                                                                        <th> Tên Danh Mục </th>
                                                                        <!-- <th> Top Product Category </th> -->
                                                                        <th> Chỉnh sửa </th>
                                                                        <th> Xóa </th>
                                                                </tr><!-- tr finish -->
                                                                </thead><!-- thead finish -->
                                                                
                                                                <tbody><!-- tbody begin -->
                                                                

                                                                <?php
                                                                foreach ($product_type as $key => $value) {
                                                                        
                                                                        $p_id = $value->id;
                                                                        $p_name = $value->name;

                                                                ?>
                                                                <tr><!-- tr begin -->
                                                                        <td> {{$p_id}} </td>
                                                                        <td> {{$p_name}}  </td>
                                                                        <!-- <td width="300">  </td> -->
                                                                        <td> 
                                                                        <a href="index.php?edit_p_cat=  ">
                                                                                <i class="fa fa-pencil"></i> Chỉnh sửa
                                                                        </a>
                                                                        </td>
                                                                        <td> 
                                                                        <a href="index.php?delete_p_cat= ">
                                                                                <i class="fa fa-trash"></i> Xóa
                                                                        </a>
                                                                        </td>
                                                                </tr><!-- tr finish -->
                                                           


                                                                <?php } ?>


                                                               
                                                                
                                                                
                                                                </tbody><!-- tbody finish -->
                                                                
                                                        </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                                                        </div><!-- table-responsive finish -->
                                                </div><!-- panel-body finish -->
                                                
                                                </div><!-- panel panel-default finish -->
                                        </div><!-- col-lg-12 finish -->
                                        </div><!-- row 2 finish -->


                                </div><!-- container-fluid finish -->
                        </div><!-- #page-wrapper finish -->
                        </center>
                </div><!-- wrapper finish -->

                <script src="{{asset('js/bootstrap-337.min.js')}}"></script>
        </body>

        </html>
