@extends('./admin.dashboard')

@section('content')


<br><br>
<br><br>

<div class="row">
    <!-- row 2 begin -->
    <div class="col-lg-12">
        <!-- col-lg-12 begin -->
        <div class="panel panel-default">
            <!-- panel panel-default begin -->
            <div class="panel-heading">
                <!-- panel-heading begin -->
                <h3 class="panel-title" style="padding:10px">
                    <!-- panel-title begin -->

                    <font style="font-size:20px"><b> <i class="fa fa-tags fa-fw"></i> DANH SÁCH ĐƠN HÀNG </b> </font>

                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            {{ csrf_field() }}

            <center>
                <div class="form-group">
                    <b id="tk"> Tìm kiếm: </b>
                    <input type="text" name="serach" id="serach" />
                </div>
            </center>


            <div class="panel-body">
                <!-- panel-body begin -->
                <div class="table-responsive">
                    <!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover">
                        <!-- table table-striped table-bordered table-hover begin -->

                        <thead>
                            <!-- thead begin -->
                            <tr>
                                <!-- tr begin -->
                                <th> ID: </th>
                                <th> Mã Đơn Hàng: </th>
                                <th> Tên khách hàng: </th>
                                <th> SĐT: </th>
                                <th> Email khách: </th>
                                <th> Ngày Đặt: </th>
                                <th> Tổng Tiền: </th>
                                <th> Status: </th>
                                <th> Hành Động: </th>
                                <th> Mã GHN: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody>
                            @include('./admin/order/pagination_data')
                        </tbody><!-- tbody finish -->

                    </table><!-- table table-striped table-bordered table-hover finish -->
                    <input type="hidden" name="hidden_page" id="hidden_page" value="{{ $data->currentPage() }}" />
                    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->

        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<style>
    .loader {
        border: 6px solid #f3f3f3;
        border-radius: 50%;
        border-top: 6px solid #3498db;
        width: 20px;
        height: 20px;
        -webkit-animation: spin 2s linear infinite;
        /* Safari */
        animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<script>
    $(document).ready(function() {


        $(document).ready(function() {
            $("#serach").val('');
        });


        function clear_icon() {
            $('#id_icon').html('');
            $('#post_title_icon').html('');
        }

        function fetch_data(page, sort_type, sort_by, query) {
            var _token = $("input[name=_token]").val();
            $.ajax({
                url: "view_order/fetch_data?page=" + page + "&sortby=" + sort_by + "&sorttype=" + sort_type + "&query=" + query,
                method: "POST",
                data: {
                    _token: _token,
                    page: page
                },
                error: function(err){
                    console.log(err);
                },
                success: function(data) {
                    $('tbody').html('');
                    $('tbody').html(data);
                }
            })
        }

        $(document).on('keyup', '#serach', function(e) {
            if(e.which == 13){
            var query = $('#serach').val();
            var column_name = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();
            var page = $('#hidden_page').val();
            fetch_data(1, sort_type, column_name, query);
            }
        });


        $(document).on('click', '.sorting', function() {
            var column_name = $(this).data('column_name');
            var order_type = $(this).data('sorting_type');
            var reverse_order = '';
            if (order_type == 'asc') {
                $(this).data('sorting_type', 'desc');
                reverse_order = 'desc';
                clear_icon();
                $('#' + column_name + '_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');
            }
            if (order_type == 'desc') {
                $(this).data('sorting_type', 'asc');
                reverse_order = 'asc';
                clear_icon();
                $('#' + column_name + '_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');
            }
            $('#hidden_column_name').val(column_name);
            $('#hidden_sort_type').val(reverse_order);
            var page = $('#hidden_page').val();
            var query = $('#serach').val();
            fetch_data(1, reverse_order, column_name, query);
        });

        $(document).on('click', '.page-link', function(event) {
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


        $(document).on("click",'a[name ="verify"]',function(e) {
            e.preventDefault();
            var id_order = $(this).data("order_id");
            $('#GHN' + id_order).html("<div class='loader'></div>");
            $('#action' + id_order).html("<div class='loader'></div>");
            $.ajax({
                "url": "{{Config::get('serverConfig.localIp') . '/api/getGHN'}}",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                "data": {
                    "billID": id_order,
                    "isCod": "0"
                },
                success: function(response) {
                    if (response !== 'THAT_BAI') {
                        $('#GHN' + id_order).html(response);
                        $('#status' + id_order).html('Đang Giao Hàng');
                        $('#action' + id_order).html('Không có hành động');
                    } else {
                        $('#GHN' + id_order).html('Lỗi đường truyền, vui lòng thực hiện lại');
                    }
                }
            });
        });

        $(document).on("click",'a[name ="delete"]',function(e) {
            e.preventDefault();
            if (!confirm("Bạn có chắc chắn hủy đơn hàng?")) {
                return;
            }
            var id_order = $(this).data("order_id");
            $('#GHN' + id_order).html("<div class='loader'></div>");
            $('#action' + id_order).html("<div class='loader'></div>");
            $.ajax({
                "url": "{{url('admin/o/deactive')}}" +"/" + id_order,
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                error: function(err){
                    console.log(err);
                },
                success: function(response) {
                    console.log(response);
                    if (response !== 'THAT_BAI') {
                        $('#GHN' + id_order).html("");
                        $('#status' + id_order).html('Đơn hàng đã hủy');
                        $('#action' + id_order).html('Không có hành động');
                    } else {
                        $('#GHN' + id_order).html('Lỗi đường truyền, vui lòng thực hiện lại');
                    }
                }
            });
        });
    });
</script>



@endsection