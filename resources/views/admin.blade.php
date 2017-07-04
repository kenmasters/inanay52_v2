<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title')</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- BOOTSTRAP DATETIMEPICKER STYLES-->
    <link href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet" />
     <!--WIZARD STYLES-->
    <link href="{{asset('assets/css/wizard/normalize.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/wizard/wizardMain.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/wizard/jquery.steps.css')}}" rel="stylesheet" />
     <!--ICHECK STYLES-->
    <link href="{{asset('square/green.css')}}" rel="stylesheet" />

    <!--CUSTOM BASIC STYLES-->
    <link href="{{asset('assets/css/basic.css')}}" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" />

    @yield('header')
    
    
</head>
<body class="admin {{isset($page) && $page ? $page : ''}}">
    <div id="wrapper">
        {{-- NAVTOP --}}
        @include('section.navtop')
        
        {{-- NAVSIDE --}}
        @include('section.navside')

        {{-- CONTENT --}}
        @yield('content')
    </div>

    {{-- FOOTER --}}
   <!--  <div id="footer-sec">
        &copy; {{ date('Y') }} iNanay | Design By : Team MaMAASIN
    </div> -->

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script type="text/javascript" src="{{asset('assets/js/jquery-1.10.2.js')}}"></script>
    <!-- JQUERY.VALIDATE SCRIPTS -->
    <script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.js')}}"></script>
    <!-- MOMENT SCRIPTS-->
    <script type="text/javascript" src="{{asset('assets/js/moment.min.js')}}"></script>
    <!-- BOOTSTRAP DATETIMEPICKER SCRIPTS-->
    <script type="text/javascript" src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
    <!-- METISMENU SCRIPTS -->
    <script type="text/javascript" src="{{asset('assets/js/jquery.metisMenu.js')}}"></script>
    <!-- WIZARD SCRIPTS -->
    <script src="{{asset('assets/js/wizard/modernizr-2.6.2.min.js')}}"></script>
    <script src="{{asset('assets/js/wizard/jquery.cookie-1.3.1.js')}}"></script>
    <script src="{{asset('assets/js/wizard/jquery.steps.js')}}"></script>
    <!-- ICHECK SCRIPTS -->
    <script type="text/javascript" src="{{asset('icheck.min.js')}}"></script>
    @yield('footer')

    <!-- CUSTOM SCRIPTS -->
    <script type="text/javascript" src="{{asset('assets/js/global.js')}}"></script> 
    <script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script> 


</body>
</html>