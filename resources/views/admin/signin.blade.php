<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SH Basketball</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap-337.min.css')}}">
    <link rel="stylesheet" href="{{asset('font-awsome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <script src="../../public/js/jquery-331.min.js"></script>
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>

</head>
<!-- 
<body>
  
    <form class="ad-box" method="post" action="{{url('admin/login')}}" >
        {{ csrf_field() }}
        <h1>Đăng nhập Admin</h1>
        </br>
        <input type="text" name="c_email" placeholder="Username">
        <input type="password" name="c_pass" placeholder="Password">
        <input type="submit" name="login" value="Đăng nhập">
    </form>
   
</body> -->

<body class="login"> 
    @include('sweetalert::alert')
    <div class="contact-form">
        <img src= "../../storage/images/other_images/3.jpg" class="avatar" alt="avatar">
        <h2>Admin Login</h2>
        <form method="post" action="{{url('admin/login')}}">
            {{ csrf_field() }}
            <br><br>
            <p>Email</p>
            <input type="text" name="c_email" placeholder="Enter Email" required>
            <p>Password</p>
            <input type="password" name="c_pass" placeholder="Enter Password" required>
            <input type="submit" name="login" value="Đăng nhập">
            
        </form>
    </div>
</body>


</html>