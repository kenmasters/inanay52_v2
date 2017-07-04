<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    @include('layouts.favicon')

    <!-- BOOTSTRAP STYLES-->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" />

    @yield('header')

</head>
<body class="{{isset($page) && $page == 'welcome' ? 'welcome v1 v2' : ''}}">
    <div id="wrapper">
        
        @yield('content')
    </div>

    

    @yield('footer')

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script type="text/javascript" src="{{asset('assets/js/jquery-1.10.2.js')}}"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.js')}}"></script>
</body>
</html>
