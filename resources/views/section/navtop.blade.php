
<nav role="navigation" class="navbar navbar-default navbar-fixed-top navbar-cls-top">
        
    <div class="container-fluid">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('dashboard')}}" title="Dashboard">Team MaMaasin</a>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
                <li><a href="{{url('login')}}" title="Login"><i class="fa fa-btn fa-sign-in"></i> Login</a></li>
            @else
                <li><a href="{{url('logout')}}" title="Logout"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
            @endif
            </ul>
        </div>

     </div>

</nav>