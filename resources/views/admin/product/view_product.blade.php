@extends('./admin.dashboard')

@section('content')

        <br><br>
        <br><br>

        <div class="row"><!-- row 2 begin -->
        <div class="col-lg-12"><!-- col-lg-12 begin -->
                <div class="panel panel-default"><!-- panel panel-default begin -->
                <div class="panel-heading"><!-- panel-heading begin -->
                        <h3 class="panel-title" style="padding:10px"><!-- panel-title begin -->
                        
                            <font style="font-size:20px" ><b> <i class="fa fa-tags fa-fw"></i> DANH SÁCH SẢN PHẨM </b> </font>
                        
                        </h3><!-- panel-title finish -->
                </div><!-- panel-heading finish -->
                {{ csrf_field() }}


                <center>
                <div class="form-group">
              <b id="tk"> Tìm kiếm: </b>
                <input type="text" name="serach" id="serach"  />
               
                </div>
                </center>
                
                

                <div id="table_data" class="panel-body">
                    
    <div class="table-responsive"><!-- table-responsive begin -->
    
    <table id="example" class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->
            
            <thead><!-- thead begin -->
            <tr><!-- tr begin -->
            <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"></span></th>
            <th width="35%"  data-column_name="post_title" style="cursor: pointer">Tên sản phẩm <span id="post_title_icon"></span></th>
            <th width="15%">Giá</th>
            <th width="15%">Hình ảnh</th>
            <th width="10%"> Trạng thái </th>
            <th width="20%"> Thao tác</th>

               
            </tr><!-- tr finish -->
            </thead><!-- thead finish -->

                    <tbody><!-- tbody begin -->
                    @include('./admin/product/pagination_data')
                    </tbody><!-- tbody finish -->
           
              

                             
            </table><!-- tabel tabel-hover table-striped table-bordered finish -->
            <input type="hidden" name="hidden_page" id="hidden_page" value="{{ $data->currentPage() }}" />
            <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
            <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />

           
            </div><!-- table-responsive finish -->
                </div>
                </div><!-- panel panel-default finish -->
        </div><!-- col-lg-12 finish -->
        </div><!-- row 2 finish -->


        <script>
$(document).ready(function(){


    $(document).ready(function() {
    $("#serach").val('');
    });


 function clear_icon()
 {
  $('#id_icon').html('');
  $('#post_title_icon').html('');
 }

 function fetch_data(page, sort_type, sort_by, query)
 {
    var _token = $("input[name=_token]").val();
  $.ajax({
   url:"view_products/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
   method:"POST",
    data:{_token:_token, page:page},
   success:function(data)
   {
    $('tbody').html('');
    $('tbody').html(data);
   }
  })
 }

 $(document).on('keyup', '#serach', function(){
  var query = $('#serach').val();
  var column_name = $('#hidden_column_name').val();
  var sort_type = $('#hidden_sort_type').val();
  var page = $('#hidden_page').val();
  fetch_data(1, sort_type, column_name, query);
 });
 

 $(document).on('click', '.sorting', function(){
  var column_name = $(this).data('column_name');
  var order_type = $(this).data('sorting_type');
  var reverse_order = '';
  if(order_type == 'asc')
  {
   $(this).data('sorting_type', 'desc');
   reverse_order = 'desc';
   clear_icon();
   $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');
  }
  if(order_type == 'desc')
  {
   $(this).data('sorting_type', 'asc');
   reverse_order = 'asc';
   clear_icon();
   $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');
  }
  $('#hidden_column_name').val(column_name);
  $('#hidden_sort_type').val(reverse_order);
  var page = $('#hidden_page').val();
  var query = $('#serach').val();
  fetch_data(1, reverse_order, column_name, query);
 });

 $(document).on('click', '.page-link', function(event){
  event.preventDefault();
  var page = $(this).attr('href').split('page=')[1];
  $('#hidden_page').val(page);
  var column_name = $('#hidden_column_name').val();
  var sort_type = $('#hidden_sort_type').val();
        
  var query = $('#serach').val();

  $('li').removeClass('active');
        $(this).parent().addClass('active');
  fetch_data(page, sort_type, column_name, query);
 });


});
</script>

@endsection