<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    <img src="{{asset('assets/img/avatar-female.jpg')}}" class="img-thumbnail" />

                    <div class="inner-text"> iNanay <br />
                        <small>Administrator</small>
                    </div>
                </div>

            </li>

            <li>
                <a class="{{ ( isset($main_menu) && $main_menu == 'dashboard' ? 'active-menu' : '' ) }}" href="{{url('dashboard')}}"><i class="fa fa-dashboard "></i>Dashboard</a>
            </li>

            <li>
                <a href="#" class="{{ ( isset($main_menu) && $main_menu == 'users' ? 'active-menu-top' : '' ) }}"><i class="fa fa-users "></i>Patients<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level {{ ( isset($main_menu) && $main_menu == 'users' ? 'in' : '' ) }}">
                    <li>
                    <a href="{{url('users')}}" class="{{ ( isset($sub_menu) && $sub_menu == 'users_list' ? 'active-menu' : '' ) }}"><i class="fa fa-users"></i>All Patients</a>
                    </li>
                    <li>
                    <a href="{{url('users/create')}}" class="{{ ( isset($sub_menu) && $sub_menu == 'user_new' ? 'active-menu' : '' ) }}"><i class="fa fa-plus "></i>Add New Patient</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="{{ ( isset($main_menu) && $main_menu == 'appointments' ? 'active-menu' : '' ) }}" href="{{url('appointments')}}"><i class="fa fa-calendar"></i>All Appointments</a>
            </li>

            <li>
                <a class="{{ ( isset($main_menu) && $main_menu == 'aboutus' ? 'active-menu' : '' ) }}" href="{{url('about-us')}}"><i class="fa fa-dashboard "></i>Meet the Team</a>
            </li>
        <!--
           <li>
                <a href="#" class="{{ ( isset($main_menu) && $main_menu == 'appointments' ? 'active-menu-top' : '' ) }}"><i class="fa fa-calendar-o"></i>Appointments<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level {{ ( isset($main_menu) && $main_menu == 'appointments' ? 'in' : '' ) }}">
                    <li>
                    <a href="{{url('appointments')}}" class="{{ ( isset($sub_menu) && $sub_menu == 'appointments_list' ? 'active-menu' : '' ) }}"><i class="fa fa-calendar"></i>All Appointments</a>
                    </li>
                    <li>
                    {{-- <a href="{{url('appointments/create')}}" class="{{ ( isset($sub_menu) && $sub_menu == 'appointment_new' ? 'active-menu' : '' ) }}"><i class="fa fa-plus "></i>Add New</a>
                    </li> --}}
                </ul>
            </li>
            -->
        </ul>
    </div>
</nav>