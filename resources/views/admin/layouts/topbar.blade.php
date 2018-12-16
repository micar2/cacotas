<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- UserTableSeeder Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('images/logo-footer.png') }}" class="user-image" alt="User Image">
                    <span class="hidden-xs">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- UserTableSeeder image -->
                    <li class="user-header">
                        <img src={{ asset('images/logo.png') }} class="img-circle" alt="User Image">

                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-right">
                            <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->

        </ul>
    </div>
</nav>