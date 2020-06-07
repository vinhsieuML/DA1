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
            <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
            

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            <script src="https://cdn.jsdelivr.net/npm/fusioncharts@3.12.2/fusioncharts.js" charset="utf-8"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>
            <script src="https://cdn.jsdelivr.net/npm/frappe-charts@1.1.0/dist/frappe-charts.min.iife.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.7.0/d3.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.6.7/c3.min.js"></script> -->
        </head>

        <body>
                @include('sweetalert::alert')
                <div id="wrapper">
                        <!-- #wrapper begin -->

                        @include('./layouts.adminsidebar')
                        <center>
                        <div id="page-wrapper">
                        @yield('content')
                        </div><!-- #page-wrapper finish -->
                        </center>
                </div><!-- wrapper finish -->

             
        </body>

</html>

<script src="{{asset('js/bootstrap-337.min.js')}}"></script>

