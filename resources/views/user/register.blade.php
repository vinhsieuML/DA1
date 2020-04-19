@extends('master')

@section('content')
<div id="content">
    <!-- #content Begin -->
    <div class="container">
        <!-- container Begin -->
        <div class="col-md-12">
            <!-- col-md-12 Begin -->

            <ul class="breadcrumb">
                <!-- breadcrumb Begin -->
                <li>
                    <a href="index.php">Trang Chủ</a>
                </li>
                <li>
                    Đăng Kí
                </li>
            </ul><!-- breadcrumb Finish -->

        </div><!-- col-md-12 Finish -->

        <div class="col-md-12">
            <!-- col-md-12 Begin -->

            <div class="box">
                <!-- box Begin -->

                <div class="box-header">
                    <!-- box-header Begin -->

                    <center>
                        <!-- center Begin -->

                        <h2> Đăng Kí Tài Khoản Mới </h2>

                    </center><!-- center Finish -->

                <form action="{{url('/register')}}" method="post" enctype="multipart/form-data">
                    
                        {{ csrf_field() }}
                        <!-- form Begin -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label>Tên Của Bạn</label>

                            <input type="text" class="form-control" name="c_name" required>

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label>Email</label>

                            <input type="text" class="form-control" name="c_email" required>

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label>Số Điện Thoại</label>

                            <input type="text" class="form-control" name="c_phone" required>

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label>Mật Khẩu</label>

                            <input type="password" class="form-control" name="c_pass" required>

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label>Nhập lại mật khẩu</label>

                            <input type="password" class="form-control" name="c_pass_repeat" required>

                        </div><!-- form-group Finish -->

                        <div class="column">
                            <div class="row">
                                <label class="col-md-5 control-label">Thành Phố</label>
                                <select name="city_select" id="city_select" class="setw form-control" style="width : 40%">
                                </select>
                            </div>
                            <div class="row" style="margin-top: 5px">
                                <label class="col-md-5 control-label">Quận</label>
                                <select name="district_select" id="district_select" class="setw form-control" style="width : 40%">
                                </select>
                            </div>
                            <div class="row" style="margin-top: 5px">
                                <label class="col-md-5 control-label">Phường</label>
                                <select name="ward_select" class="setw form-control" id="ward_select" style="width : 40%">
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label>Địa chỉ của bạn</label>

                            <input type="text" class="form-control" name="c_address" required>

                        </div><!-- form-group Finish -->

                        <div class="text-center">
                            <!-- text-center Begin -->

                            <button type="submit" name="register" class="btn btn-primary">

                                <i class="fa fa-user-md"></i> Đăng Kí

                            </button>

                        </div><!-- text-center Finish -->

                    </form><!-- form Finish -->

                </div><!-- box-header Finish -->

            </div><!-- box Finish -->

        </div><!-- col-md-12 Finish -->

    </div><!-- container Finish -->
</div><!-- #content Finish -->

<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{Config::get('serverConfig.localIp') . '/api/city'}}",
            method: "GET",
            headers: {},
            contentType: 'application/json; charset=utf-8',
            success: function(response) {
                var $select = $('#city_select');
                $.each(response, function(index, val) {
                    $select.append($('<option />', {
                        value: response[index]['ProvinceID'],
                        text: response[index]['ProvinceName']
                    }));
                });
            }
        });

        $('#city_select').on('change', function() {
            const cityid = this.value;
            $.ajax({
                url: "{{Config::get('serverConfig.localIp') .'/api/district/'}}" + cityid,
                method: "GET",
                headers: {},
                contentType: 'application/json; charset=utf-8',
                success: function(response) {
                    var $select = $('#district_select');
                    $select.empty();
                    $('#ward_select').empty();
                    $.each(response, function(index, val) {
                        $select.append($('<option />', {
                            value: response[index]['DistrictID'],
                            text: response[index]['DistrictName']
                        }));
                    });
                }
            });
        });

        $('#district_select').on('change', function() {
            const districtID = this.value;
            var $select = $('#ward_select');
            $select.empty();
            $select.append("<option> Đang Tải Dữ Liệu </option>");
            $.ajax({
                url: "{{Config::get('serverConfig.localIp') .'/api/ward/'}}" + districtID,
                method: "GET",
                headers: {},
                contentType: 'application/json; charset=utf-8',
                success: function(response) {
                    $select.empty();
                    $.each(response, function(index, val) {
                        $select.append($('<option />', {
                            value: response[index]['WardCode'],
                            text: response[index]['WardName']
                        }));
                    });
                }
            });
        });
    });
</script>
@endsection