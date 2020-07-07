@extends('./admin.dashboard')

@section('content')
    <br><br>
    <br><br>

    <?php
       $product_id = $product->id;
       $product_name = $product->name;
       $product_hang = $product->id_hang;
       $product_loai = $product->id_type;
       $product_price = $product->price;
       $product_des = $product->description;
       $k =0;
    ?>


    <div class="row"><!-- row 2 begin -->
        <div class="col-lg-12"><!-- col-lg-12 begin -->
            <div class="panel panel-default"><!-- panel panel-default begin -->
                <div class="panel-heading"><!-- panel-heading begin -->
                    <h3 class="panel-title" style="padding:10px"><!-- panel-title begin -->
                        
                        <font style="font-size:20px" ><b> <i class="fa fa-tags fa-fw"></i> CHỈNH SỬA SẢN PHẨM </b> </font>
                        
                    </h3><!-- panel-title finish -->
                </div><!-- panel-heading finish -->
                
                <div class="panel-body"><!-- panel-body begin -->
                    <form action='{{url('admin/edit_product/'.$product_id)}}' class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    
                        {{ csrf_field() }}
                        <div class="form-group"><!-- form-group begin -->
                        
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                                Tên Sản Phẩm
                            
                            </label><!-- control-label col-md-3 finish --> 
                            
                            <div class="col-md-6"><!-- col-md-6 begin -->
                            
                                <input value="{{$product_name}}" name="p_name" type="text" class="form-control" required>
                            
                            </div><!-- col-md-6 finish -->
                        
                        </div><!-- form-group finish -->
                        
                

                        <div class="form-group"><!-- form-group 3 begin -->
                        
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Hãng
                            
                            </label><!-- control-label col-md-3 finish --> 
                            

                            <div class="col-md-6"><!-- col-md-6 begin -->
                            <select name="p_hang" class="form-control" onchange="showUser(this.value)">
                            
                           
                                    <!-- col-md-6 bat dau -->

                                    
                                    <?php

                                            foreach ($hang as $row){
                                            $idall = $row -> id;
                                            $title = $row -> name;
                                            
                                            if ($idall == $product_hang) {
                                                ?>   
                                            <option value='{{$idall}}' selected> {{$title}} </option>
                                    
                                            <?php
                                            } else { ?>
                                              <option value='{{$idall}}' > {{$title}} </option>
                                              <?php } ?>
                                              
                                   <?php } ?>
                               
                                  

                           
                            
                            </select>
                           

                            
                            
                           
                            
                            </div><!-- col-md-6 finish -->

                            
                        
                        </div><!-- form-group 3 finish -->

                        
                        <div class="form-group"><!-- form-group 3 begin -->
                        
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Danh mục sản phẩm
                            
                            </label><!-- control-label col-md-3 finish --> 
                            

                            <div class="col-md-6"><!-- col-md-6 begin -->
                            <select id="searchs" name="p_type" class="form-control" onchange="showUser(this.value); " disabled>
                            <option selected > Chọn danh mục </option>
                           
                                    <!-- col-md-6 bat dau -->

                                                                    
                                                                
                                <?php

                                foreach ($product_type as $row){
                                $idall = $row -> id;
                                $title = $row -> name;

                                if ($idall == $product_loai) {
                                    ?>   
                                <option value='{{$idall}}' selected> {{$title}} </option>

                                <?php
                                } else { ?>
                                <option value='{{$idall}}' > {{$title}} </option>
                                <?php } ?>
                                
                                <?php } ?>
                                 
                                  

                            
                            </select>
                            <br>

                            
                            
                           
                            
                            </div><!-- col-md-6 finish -->

                            
                        
                        </div><!-- form-group 3 finish -->




                        <div class="form-group">
                                <!-- form-group bat dau -->

                                <label class="col-md-3 control-label"> Size </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 bat dau -->

                                    <div class="table-responsive">
                                        <!-- table-responsive bat dau -->
                                        <table class="table table-hover table-striped table-bordered">
                                            <!-- tabel tabel-hover table-striped table-bordered bat dau -->

                                            <thead>
                                                <!-- thead bat dau -->
                                                <tr>
                                                    <!-- tr bat dau -->
                                                    <th> Tên Size </th>
                                                    <th> Số lượng </th>
                                                </tr><!-- tr xong -->
                                            </thead><!-- thead xong -->

                                            <tbody>
                                                <!-- tbody bat dau -->

                                             
                                                
                                            
                                                <?php 
                                                    
                                                    //$available = isset($_POST[$k][0]) ? $_POST[$k][0] : "";
                                                
                                                    foreach($size_detail as $row) {
                                                        $k++;
                                                        $size_detail_id = $row->id;
                                                        $size_name = $row->name;
                                                        $size_quantity = $row->number;
                                                    
                                                    
                                                    ?>

                                                    <tr>
                                                    <td> {{$size_name}} </td>
                                                    <td>
                                                    <input type='number' min='0' name="p_sl_size<?php echo"$size_detail_id"; ?>" class='form-control' placeholder='Số lượng' value= {{ $size_quantity}}  oninput="validity.valid||(value='');">
                                                    </td>
                                                    </tr>

                                                    <?php
                                                    } 
                                                ?>
                                                                                                

                                                

                                            </tbody><!-- tbody xong -->

                                        </table><!-- tabel tabel-hover table-striped table-bordered xong -->
                                    </div><!-- table-responsive xong -->

                                </div><!-- col-md-6 xong -->

                            </div><!-- form-group xong -->



                        <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Upload hình mới
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                        <input id="file-input" name="image[]" accept="image/*" type="file" multiple>
                        <div id="preview"></div>
                        
                        </div><!-- col-md-6 finish -->
                    
                        </div><!-- form-group finish -->
                    

                        <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Giá
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="{{$product_price}}" name="p_price" type="number" min="0" class="form-control" oninput="validity.valid||(value='');" required>
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->



                    <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Chi tiết sản phẩm
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="{{$product_des}}" name="p_des" type="text" class="form-control" required>
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->
                        
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                                Hình Ảnh Hiện Tại
                            
                            </label><!-- control-label col-md-3 finish --> 
                            
                          
                            <?php 
                            foreach ($images as $key) {
                                $img = $key->link;
                             ?>
                                  <div class="col-md-1"><!-- col-md-6 begin -->
                                <img width="85" height="85" src='{{url('images/product_images/'. $img)}}' alt="{{$img}}">
                                </div><!-- col-md-6 finish -->
                            <?php
                            }
                            ?>
                               
                            
                            
                        
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
           
<script>
function previewImages() {

var $preview = $('#preview').empty();
if (this.files) $.each(this.files, readAndPreview);

function readAndPreview(i, file) {
  
  if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
    return alert(file.name +" is not an image");
  } // else...
  
  var reader = new FileReader();

  $(reader).on("load", function() {
    $preview.append($("<img/>", {src:this.result, height:100}));
  });

  reader.readAsDataURL(file);
  
}

}

$('#file-input').on("change", previewImages);




$(document).ready(function(){

fetch_customer_data();

function fetch_customer_data(query = '')
{
 $.ajax({
  url:"{{ route('live_search.action') }}",
  method:'GET',
  data:{query:query},
  dataType:'json',
  success:function(data)
  {
   $('tbody').html(data.table_data);

  }
 })
}

$(document).on('change', '#searchs', function(){
 var query = $(this).val();
 fetch_customer_data(query);
});
});


//Check img from client

$(document).on('change', ':file',function () {
    const file = this.files[0];
    const fileType = file['type'];
    const validImageTypes = ['image/jpeg', 'image/png', 'image/jpg' ];
    if (!validImageTypes.includes(fileType)) {
        alert('Only JPEG and PNG file types are allowed');
        this.value = '';
    }
});

</script>   



@endsection