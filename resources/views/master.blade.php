<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here'," />
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