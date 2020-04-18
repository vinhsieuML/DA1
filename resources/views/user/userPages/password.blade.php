@extends('user.userPageMaster')

@section('userContent')
<h1 align="center"> Đổi Mật Khẩu </h1>


<form action="{{url('user/changePass')}}" method="post"><!-- form Begin -->
    {{ csrf_field() }}
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Mật Khẩu Cũ: </label>
        
        <input type="text" name="old_pass" class="form-control" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Mật Khẩu Mới: </label>
        
        <input type="password" name="new_pass" class="form-control" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Nhập lại mật khẩu mới: </label>
        
        <input type="password" name="new_pass_again" class="form-control" required>
        
    </div><!-- form-group Finish -->
    
    <div class="text-center"><!-- text-center Begin -->
        
        <button type="submit" name="submit" class="btn btn-primary"><!-- btn btn-primary Begin -->
            
            <i class="fa fa-user-md"></i> Cập Nhật
            
        </button><!-- btn btn-primary inish -->
        
    </div><!-- text-center Finish -->
    
</form><!-- form Finish -->



@endsection