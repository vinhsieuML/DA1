
@extends('./admin.dashboard')

@section('content')

                <br><br>
                <br><br>




<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                <font style="font-size:20px" ><b> <i class="fa fa-tags fa-fw"></i> DANH SÁCH BOX </b> </font>
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
            {{ csrf_field() }}
                <?php 
                    foreach ($boxes as $key) {
                        # code...
                        $boxes_tile = $key->box_tile;
                        $boxes_desc =$key->box_desc;
                        $boxes_id = $key->id;
                    
                ?>
            
                
                <div class="col-lg-4 col-md-4"><!-- col-lg-3 col-md-3 begin -->
                    <div class="panel panel-primary"><!-- panel panel-primary begin -->
                        <div class="panel-heading"><!-- panel-heading begin -->
                            <h3 class="panel-title" align="center"><!-- panel-title begin -->
                            
                                <?php echo $boxes_tile; ?>
                                
                            </h3><!-- panel-title finish -->
                        </div><!-- panel-heading finish -->
                        
                        <div class="panel-body"><!-- panel-body begin -->
                            
                            <?php echo $boxes_desc; ?>
                            
                        </div><!-- panel-body finish -->
                        
                        <div class="panel-footer"><!-- panel-footer begin -->
                            <center><!-- center begin -->
                                
                                

                                <a href='{{url('admin/delete_boxes/'.$boxes_id)}}' class="pull-right"><!-- pull-right begin -->
                                
                                 <i class="fa fa-trash"></i> Xóa
                                
                                </a><!-- pull-right finish -->
                                
                                <a href='{{url('admin/edit_boxes/'.$boxes_id)}}' class="pull-left"><!-- pull-left begin -->
                                
                                 <i class="fa fa-pencil"></i> Chỉnh sửa
                                
                                </a><!-- pull-left finish -->
                                
                                <div class="clearfix"></div>
                                
                            </center><!-- center finish -->
                        </div><!-- panel-footer finish -->
                        
                    </div><!-- panel panel-primary finish -->
                </div><!-- col-lg-3 col-md-3 finish -->
                
               
                <?php
                    }

                ?>

            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->


<script src="{{asset('js/bootstrap-337.min.js')}}"></script>

@endsection
