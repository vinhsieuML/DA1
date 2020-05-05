<!DOCTYPE html>
        <html lang="en">

        <head>
                <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>SH Basketball</title>
            <link rel="stylesheet" href="{{asset('css/bootstrap-337.min.css')}}">
            <link rel="stylesheet" href="{{asset('font-awsome/css/font-awesome.min.css')}}">
            <link rel="stylesheet" href="{{asset('css/style.css')}}">

            
              
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
                                                        <h3 class="panel-title" style="padding:10px"><!-- panel-title begin -->
                                                        
                                                         <font style="font-size:20px" ><b> <i class="fa fa-tags fa-fw"></i> DANH SÁCH DANH MỤC </b> </font>
                                                        
                                                        </h3><!-- panel-title finish -->
                                                </div><!-- panel-heading finish -->
                                                <div id="table_data" class="panel-body">

                                                        @include('./admin/producttype/pagination_data')
                                                </div>
                                                </div><!-- panel panel-default finish -->
                                        </div><!-- col-lg-12 finish -->
                                        </div><!-- row 2 finish -->


                                </div><!-- container-fluid finish -->
                        </div><!-- #page-wrapper finish -->
                        </center>
                </div><!-- wrapper finish -->

             
        </body>

</html>
<script src="{{asset('js/bootstrap-337.min.js')}}"></script>

<script>
$(document).ready(function(){

        $(document).on('click','.pagination a', function(e){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  fetch_data(page);
 });

 function fetch_data(page)
 {
  $.ajax({
   url:"view_p_type/fetch_data?page="+page,
   success:function(data)
   {
    $('#table_data').html(data);
   }
  });
 }
 
});
</script>
