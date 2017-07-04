@extends('layouts.app')

@section('header')
<link href="{{asset('assets/css/login.css')}}" rel="stylesheet" />
@endsection

@section('content')

@include('section.navtop')
    
{{-- <nav role="navigation" class="navbar navbar-default navbar-fixed-top navbar-cls-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        <a class="navbar-brand" href="{{url('dashboard')}}">Team MaMAASIN</a>
        </div>
        
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
            <li><a href="{{url('login')}}" title="Login"><i class="fa fa-btn fa-sign-in"></i> LOGIN</a></li>
            </ul>
        </div>
    </div>
</nav> --}}

    <h1 class="school">University of the Philippines-Visayas</h1>
    <h2 class="course m-0">Bachelor of Science in Public Health</h2>
    <img class="img-responsive center-block logo" src="{{ asset('assets/img/Logo.png') }}">
    <h1 class="team m-0">Team MaMaasin</h1>
    <h3 class="slogan m-0">Techie Nanay: Makabagong Nanay Para sa Ligtas na Buhay</h3>


@endsection




