<a href="index.html" class="logo">
    Booking Hotel
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>
    <div class="navbar-right">
        <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
        
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-user"></i>
                    <span>{{auth()->user()->name}} <i class="caret"></i></span>
                </a>
                <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                    <li class="dropdown-header text-center">Account</li>

                    <li class="divider"></li>   

                    <li>
                        <a href="/logout"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>