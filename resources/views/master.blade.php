<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SH Basketball</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap-337.min.css')}}">
    <link rel="stylesheet" href="{{asset('font-awsome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
    


</head>

<body>
    @include('sweetalert::alert')
   
    @include('./layouts.header')
    @yield('content')
   
    
    @include('./layouts.footer')
   
</body>

</html>