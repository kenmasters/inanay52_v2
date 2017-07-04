@extends('layouts.app')

@section('header')
<link href="{{asset('assets/css/login.css')}}" rel="stylesheet" />
@endsection

@section('content')
<!-- Mixins-->
<!-- Pen Title-->
<div class="loginPage">
<img src="{{ asset('assets/img/Logo.png') }}">
<div class="container center-div">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}" autocomplete="off">
    {{ csrf_field() }}
      <div class="input-container ">
        {{-- <input id="email" type="text" name="email" required="required" value="{{ old('email') }}"> --}}
        <input id="email" type="text" name="login" required="required" value="{{ old('login') }}">
        <!-- <input type="#{type}" id="#{label}" required="required"/> -->
        <label for="#login">Username or Email</label>
        <div class="bar"></div>
      </div>

      <div class="input-container">
        <input id="password" type="password" name="password" required="required">
        <!-- <input type="#{type}" id="#{label}" /> -->
        <label for="#password">Password</label>
        <div class="bar"></div>
      </div>

      <div class="error-container text-center {{ $errors->has('email') ? ' has-error' : '' }}">
        @if ($errors->has('email'))
              <span class="help-block">
                  {{ $errors->first('email') }}
              </span>
        @endif
      </div>
        
      <div class="button-container">
        <a href="/" class="home"><span>Home</span></a>
        <button class="login"><span>Login</span></button>
      </div>
      <!-- <div class="footer"><a href="#">Forgot your password?</a></div> -->
    </form>
  </div>

</div>
</div>

@endsection
