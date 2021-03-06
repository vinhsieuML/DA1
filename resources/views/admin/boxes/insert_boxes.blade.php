@extends('./admin.dashboard')

@section('content')
    <br><br>
    <br><br>

    <div class="row"><!-- row 2 begin -->
        <div class="col-lg-12"><!-- col-lg-12 begin -->
            <div class="panel panel-default"><!-- panel panel-default begin -->
                <div class="panel-heading"><!-- panel-heading begin -->
                    <h3 class="panel-title" style="padding:10px"><!-- panel-title begin -->
                        
                        <font style="font-size:20px" ><b> <i class="fa fa-tags fa-fw"></i> THÊM BOX </b> </font>
                        
                    </h3><!-- panel-title finish -->
                </div><!-- panel-heading finish -->
                
                <div class="panel-body"><!-- panel-body begin -->
                    <form method="post" action="{{url('admin/insert_boxes')}}" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal begin -->
                        
                        {{ csrf_field() }}
                        <div class="form-group"><!-- form-group begin -->
                        
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                                Box Title
                            
                            </label><!-- control-label col-md-3 finish --> 
                            
                            <div class="col-md-6"><!-- col-md-6 begin -->
                            
                                <input name="box_tile" type="text" class="form-control" required>
                            
                            </div><!-- col-md-6 finish -->
                        
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group 2 begin -->
                    
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                                Box Description
                            
                            </label><!-- control-label col-md-3 finish --> 
                            
                            <div class="col-md-6"><!-- col-md-6 begin -->
                            
                                <textarea name="box_desc" type="text" class="form-control" rows="6" cols="18"></textarea>
                            
                            </div><!-- col-md-6 finish -->
                
                        </div><!-- form-group 2 finish -->
                        
                        
                        
                        
                        <div class="form-group"><!-- form-group begin -->
                        
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            </label><!-- control-label col-md-3 finish --> 
                            
                            <div class="col-md-6"><!-- col-md-6 begin -->
                            
                                <input value="Thêm box" name="submit" type="submit" class="form-control btn btn-primary">
                            
                            </div><!-- col-md-6 finish -->
                        
                        </div><!-- form-group finish -->
                    </form><!-- form-horizontal finish -->
                </div><!-- panel-body finish -->
                
            </div><!-- panel panel-default finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 2 finish -->
        
@endsection
