
<header>
    <!-- start navigation -->
    <nav class="navbar navbar-expand-lg navbar-boxed navbar-dark border-bottom border-color-white-transparent fixed-top" style="background-color:#041d43;">
        <div class="container-fluid nav-header-container">
            <div class="col-auto col-sm-6 col-lg-2 me-auto ps-lg-0">
                <a class="navbar-brand" href="/">
                    <img src="/logo.png" data-at2x="/logo.png" class="default-logo" alt="" style="max-height: 50px!important;margin-left:23px;">
                    <img src="/logo.png" data-at2x="/logo.png" class="alt-logo" alt="">
                    <img src="/logo.png" data-at2x="/logo.png" class="mobile-logo" alt="">
                </a>
            </div>
            <div class="col-auto menu-order px-lg-0">
                <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav alt-font">
                        <li class="nav-item dropdown megamenu">
                            <a href="/" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('howItWorks')}}" class="nav-link" style="color: white;">How It Works</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('lawyer.register-page')}}" class="nav-link" style="color: white;">For Lawyers</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('question-answer')}}" class="nav-link" style="color: white;">Q & A</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('testimonials')}}" class="nav-link" style="color: white;">Testimonials</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('blogs-articles', 1)}}" class="nav-link" style="color: white;">Blogs & Articles</a>
                        </li>
                        <li class="nav-item dropdown simple-dropdown">
                            <a href="#" class="nav-link">Lawyers</a>
                            <i class="fa fa-angle-down dropdown-toggle" data-bs-toggle="dropdown" aria-hidden="true"></i>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown">
                                    <a href="#">Corporate Lawyers</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Criminal Lawyers</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Divorce Lawyers</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Labout Lawyers</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Family Lawyers</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Immigration Lawyers</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown simple-dropdown">
                            <a href="#" class="nav-link">Practice Area</a>
                            <i class="fa fa-angle-down dropdown-toggle" data-bs-toggle="dropdown" aria-hidden="true"></i>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown">
                                    <a href="#">Project And Construction</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">UAE Labour Law</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Energy</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Banking And Finance</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">General Civil Law</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Commercial Property</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Corporate Commercial Law</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Islamic Finance</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Criminal</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Family</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Accident Law</a>
                                </li>
                            </ul>
                        </li>      
                        @if(auth()->user())                      
                            @if(auth()->user()->user_type == 2)
                                <li class="nav-item">
                                    <a href="{{route('logout')}}" class="nav-link" onclick="return confirm('Are you sure you want to logout?')" style="color: white;">Logout</a>
                                </li>
                            @elseif(auth()->user()->user_type == 3)
                                <!-- <li class="nav-item">
                                    <a href="{{route('online-chat.requests')}}" class="nav-link" style="color: white;">Online Chat Requests</a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="{{route('user.logout')}}" class="nav-link" onclick="return confirm('Are you sure you want to logout?')" style="color: white;">Logout</a>
                                </li>
                            @endif
                        @else 
                            <li class="nav-item">
                                <a href="#login-form" class="nav-link popup-with-form" style="color: white;">Login</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navigation -->
    @include('login_modal')

    
</header>
@include('common.layouts.header2')