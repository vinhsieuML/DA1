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
                <div id="table_data" class="panel-body">

                        @include('./admin/product/pagination_data')
                </div>
                </div><!-- panel panel-default finish -->
        </div><!-- col-lg-12 finish -->
        </div><!-- row 2 finish -->


        <script>
            $(document).ready(function(){

            $(document).on('click', '.page-link', function(event){
                event.preventDefault(); 
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page)
            {
            var _token = $("input[name=_token]").val();
            $.ajax({
                url:"{{ route('paginationpro.fetch') }}",
                method:"POST",
                data:{_token:_token, page:page},
                success:function(data)
                {
                $('#table_data').html(data);
                }
                });
            }

            });
        </script> 




@endsection
                               



