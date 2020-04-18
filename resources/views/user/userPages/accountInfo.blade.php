@extends('user.userPageMaster')

@section('userContent')
<?php

$customer_id = $user->id;

$customer_name = $user->name;

$customer_email = $user->email;

$customer_contact = $user->phone;

$customer_address = $user->address;

$customer_city_id = $user->cityID;

$customer_district_id = $user->districtID;

$customer_ward_id = $user->wardID;
?>

<h1 align="center"> Chỉnh sửa tài khoản </h1>

<form action="{{url('user/updateInfo')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <!-- form Begin -->
    <input type="text" name="customer_id" id="customer_id" value="<?php echo $customer_id; ?>" hidden>
    <input type="text" name="o_city_id" id="o_city_id" value="<?php echo $customer_city_id; ?>" hidden>
    <input type="text" name="o_district_id" id="o_district_id" value="<?php echo $customer_district_id; ?>" hidden>
    <input type="text" name="o_ward_id" id="o_ward_id" value="<?php echo $customer_ward_id; ?>" hidden>
    <div class="form-group">
        <!-- form-group Begin -->

        <label> Tên Của Bạn: </label>

        <input type="text" name="c_name" class="form-control" value="<?php echo $customer_name; ?>" required>

    </div><!-- form-group Finish -->

    <div class="form-group">
        <!-- form-group Begin -->

        <label> Email: </label>

        <input type="text" name="c_email" class="form-control" value="<?php echo $customer_email; ?>" readonly required>

    </div><!-- form-group Finish -->


    <div class="form-group">
        <!-- form-group Begin -->

        <label> Số Điện Thoại: </label>

        <input type="text" name="c_contact" class="form-control" value="<?php echo $customer_contact; ?>" required>

    </div><!-- form-group Finish -->
    <div class="column">
        <div class="row">
            <label class="col-md-5 control-label">Thành Phố</label>
            <select name="city_select" id="city_select" class="setw form-control" style="width : 230px">
            </select>
        </div>
        <div class="row" style="margin-top: 5px">
            <label class="col-md-5 control-label">Quận</label>
            <select name="district_select" id="district_select" class="setw form-control" style="width : 230px">
            </select>
        </div>
        <div class="row" style="margin-top: 5px">
            <label class="col-md-5 control-label">Phường</label>
            <select name="ward_select" class="setw form-control" id="ward_select" style="width : 230px">
            </select>
        </div>
    </div>

    <div class="form-group">
        <!-- form-group Begin -->

        <label> Địa Chỉ: </label>

        <input type="text" name="c_address" class="form-control" value="<?php echo $customer_address; ?>" required>

    </div><!-- form-group Finish -->


    <div class="text-center">
        <!-- text-center Begin -->

        <button name="update" class="btn btn-primary">
            <!-- btn btn-primary Begin -->

            <i class="fa fa-user-md"></i> Cập Nhật

        </button><!-- btn btn-primary inish -->

    </div><!-- text-center Finish -->

</form><!-- form Finish -->
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
                $('option[value=' + $('#o_city_id').val() + ']').attr('selected', true);
                $select.trigger('change');
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
                    $('option[value=' + $('#o_district_id').val() + ']').attr('selected', true);
                    $select.trigger('change');
                }
            });
        });

        $('#district_select').on('change', function() {
            const districtID = this.value;
            var $select = $('#ward_select');
            $select.empty();
            $select.append("<option> Đang Tải Dữ Liệu...</option>");
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
                    $('option[value=' + $('#o_ward_id').val() + ']').attr('selected', true);
                }
            });
        });
    });
</script>
@endsection