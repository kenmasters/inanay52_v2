<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="{{asset('assets/css/basic.css')}}" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
        {{-- CONTENT --}}
        @yield('content')

        {{-- FOOTER --}}
        <div id="footer-sec">
            &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
        </div>

        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="{{asset('assets/js/jquery-1.10.2.js')}}"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="{{asset('assets/js/bootstrap.js')}}"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="{{asset('assets/js/jquery.metisMenu.js')}}"></script>
           <!-- CUSTOM SCRIPTS -->
        <script src="{{asset('assets/js/custom.js')}}"></script>  

</body>
</html>