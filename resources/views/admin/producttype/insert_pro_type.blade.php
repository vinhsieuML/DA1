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
                                                    
                                                        <i class="fa fa-money fa-fw"></i> Thêm danh mục sản phẩm
                                                    
                                                    </h3><!-- panel-title finish -->
                                                </div><!-- panel-heading finish -->
                                                
                                                <div class="panel-body"><!-- panel-body begin -->
                                                    <form method="post" action="{{url('admin/insert_p_type')}}" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal begin -->
                                                        
                                                        {{ csrf_field() }}
                                                        <div class="form-group"><!-- form-group begin -->
                                                        
                                                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                                                            
                                                                Tên Danh Mục
                                                            
                                                            </label><!-- control-label col-md-3 finish --> 
                                                            
                                                            <div class="col-md-6"><!-- col-md-6 begin -->
                                                            
                                                                <input name="name" type="text" class="form-control">
                                                            
                                                            </div><!-- col-md-6 finish -->
                                                        
                                                        </div><!-- form-group finish -->
                                                        
                                                        
                                                        <div class="form-group"><!-- form-group 3 begin -->
                                                        
                                                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                                                            
                                                            Hình Danh Mục
                                                            
                                                            </label><!-- control-label col-md-3 finish --> 
                                                            
                                                            <div class="col-md-6"><!-- col-md-6 begin -->
                                                            
                                                                <input type="text" name="image" class="form-control">
                                                            
                                                            </div><!-- col-md-6 finish -->
                                                        
                                                        </div><!-- form-group 3 finish -->
                                                        
                                                        <div class="form-group"><!-- form-group begin -->
                                                        
                                                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                                                            
                                                            </label><!-- control-label col-md-3 finish --> 
                                                            
                                                            <div class="col-md-6"><!-- col-md-6 begin -->
                                                            
                                                                <input value="Submit Product Category" name="submit" type="submit" class="form-control btn btn-primary">
                                                            
                                                            </div><!-- col-md-6 finish -->
                                                        
                                                        </div><!-- form-group finish -->
                                                    </form><!-- form-horizontal finish -->
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
