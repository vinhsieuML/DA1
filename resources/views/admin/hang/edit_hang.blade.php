@extends('./admin.dashboard')

@section('content')
    <br><br>
    <br><br>

    <?php
        $hang_id = $hang->id;
        $hang_name = $hang->name;
        $hang_image = $hang->image;
        
    ?>


    <div class="row"><!-- row 2 begin -->
        <div class="col-lg-12"><!-- col-lg-12 begin -->
            <div class="panel panel-default"><!-- panel panel-default begin -->
                <div class="panel-heading"><!-- panel-heading begin -->
                    <h3 class="panel-title" style="padding:10px"><!-- panel-title begin -->
                        
                        <font style="font-size:20px" ><b> <i class="fa fa-tags fa-fw"></i> CHỈNH SỬA HÃNG </b> </font>
                        
                    </h3><!-- panel-title finish -->
                </div><!-- panel-heading finish -->
                
                <div class="panel-body"><!-- panel-body begin -->
                    <form action='{{url('admin/edit_hang/'.$hang_id)}}' class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    
                        {{ csrf_field() }}
                        <div class="form-group"><!-- form-group begin -->
                        
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                                Tên Danh Mục
                            
                            </label><!-- control-label col-md-3 finish --> 
                            
                            <div class="col-md-6"><!-- col-md-6 begin -->
                            
                                <input value="<?php echo $hang_name; ?>" name="hang_title" type="text" class="form-control" required>
                            
                            </div><!-- col-md-6 finish -->
                        
                        </div><!-- form-group finish -->
                        
                        
                        <div class="form-group"><!-- form-group 3 begin -->
                        
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Hình Ảnh Mới
                            
                            </label><!-- control-label col-md-3 finish --> 
                            

                            <div class="col-md-6"><!-- col-md-6 begin -->
                            
                                <input type="file" name="hang_image" class="form-control" required>
                            
                            <br>

                            
                          
                            
                            </div><!-- col-md-6 finish -->

                            
                        
                        </div><!-- form-group 3 finish -->


                        <div class="form-group"><!-- form-group begin -->
                        
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                                Hình Ảnh Hiện Tại
                            
                            </label><!-- control-label col-md-3 finish --> 
                            
                            <div class="col-md-1"><!-- col-md-6 begin -->
                            
                                <img width="140" height="140" src='{{url('images/other_images/'. $hang_image)}}' alt="{{$hang_image}}">
                            
                            </div><!-- col-md-6 finish -->
                        
                        </div><!-- form-group finish -->

                        
                        <div class="form-group"><!-- form-group begin -->
                        
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            </label><!-- control-label col-md-3 finish --> 
                            
                            <div class="col-md-6"><!-- col-md-6 begin -->
                            
                                <input value="Cập nhật" name="update" type="submit" class="form-control btn btn-primary">
                            
                            </div><!-- col-md-6 finish -->
                        
                        </div><!-- form-group finish -->
                    </form><!-- form-horizontal finish -->
                </div><!-- panel-body finish -->
                
            </div><!-- panel panel-default finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 2 finish -->
                                     
@endsection