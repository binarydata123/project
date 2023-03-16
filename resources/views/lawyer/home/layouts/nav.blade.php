<!-- <div class="row contaoner-fluid">
    <section #navbar> 
        <nav class="navbar navbar-expand-lg custom-navbar fixed-top">
            <span id="openNav" onclick="openNav()"><img class="open-btn" src="/new-design/assets/image/home/hamburgor-white.png" alt=""></span>
            <a class="navbar-brand" id="navbar_brand_mobile" href="#">Connect Legal</a>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('howItWorks')}}"> How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('lawyer.register-page')}}">For Lawyers </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('question-answer')}}">Q & A </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('testimonials')}}">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blogs-articles', 1)}}">Blogs & Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Practice Area</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Lawyers</a>
                    </li>
                    @if(!auth()->user()) 
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Login</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <div class="navlist-profile">
                                <div class="navlist-profile-img">
                                    <img src="/new-design/assets/image/home/register3.png" alt="">
                                    <img class="active_circle" src="/new-design/assets/image/home/active-circle.png" alt="">

                                </div>

                                <div class="navlist-profile-description">
                                    <div class="profile-description-inner">
                                        <h4>{{auth()->user()->name}}</h4>
                                    </div>

                                    <div class="profile-hamburgur">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="/new-design/assets/image/home/white-dot.png" alt="">
                                            </button>
                                            @if(auth()->user()->user_type == 3)
                                                <ul class="dropdown-menu profile-dropdown">
                                                    <li><a class="dropdown-item" href="#"><img src="/new-design/assets/image/home/Vector (19).png"
                                                                alt="">My Profile</a></li>
                                                    <li><a class="dropdown-item" href="#"><img src="/new-design/assets/image/home/Vector (19).png"
                                                                alt="">Dashboard</a></li>
                                                    <li><a class="dropdown-item" href="{{route('user.logout')}}" onclick="return confirm('Are you sure you want to logout?')"><img src="/new-design/assets/image/home/Vector (19).png"
                                                                alt="">Log Out</a></li>
                                                </ul>
                                            @else 
                                                <ul class="dropdown-menu profile-dropdown">
                                                    <li><a class="dropdown-item" href="#"><img src="/new-design/assets/image/home/Vector (19).png"
                                                                alt="">My Profile</a></li>
                                                    <li><a class="dropdown-item" href="{{route('lawyer.dashboard')}}"><img src="/new-design/assets/image/home/Vector (19).png"
                                                                alt="">Dashboard</a></li>
                                                    <li><a class="dropdown-item" href="{{route('logout')}}" onclick="return confirm('Are you sure you want to logout?')"><img src="/new-design/assets/image/home/Vector (19).png"
                                                                alt="">Log Out</a></li>
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
            <div id="mobile-nav-profile">
                <img src="/storage/{{auth()->user()->getProfilePic(auth()->user()->id)}}" onclick="myFunction()" alt="" class="mobile-prof-image dropbtn">
                <div id="myDropdown" class="dropdown-content">
                    <a href="" class="mobile_prof_text"> <img src="/new-design/lawyer/assets/image/home/profile_icon.png" alt="" class="mobile_prof_icon"> My Profile</a>
                    <a href="{{route('lawyer.dashboard')}}" class="mobile_prof_text"><img src="/new-design/lawyer/assets/image/home/dash.png" alt="" class="mobile_prof_icon"> Dashboard</a>
                    <a href="{{route('logout')}}" class="mobile_prof_text"><img src="/new-design/lawyer/assets/image/home/logout.png" alt="" class="mobile_prof_icon"> Logout</a>
                </div>                
            </div>
        </nav>
    </section>
</div> -->


<div class="top-header">
                <div class="row">
                    <div class="col-sm-9 d-none d-xl-block">
                        <nav class="navbar navbar-expand-lg navbar-light main-menu">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="/">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('howItWorks')}}">How It Works</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('lawyer.register-page')}}">For Lawyers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('testimonials')}}">Testimonials</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('blogs-articles', 1)}}">Blogs &amp; Articles</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Lawyers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Practice Area</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="col-sm-3 d-none d-xl-block">
                        <div class="user-nav">
                            <div class="row">
                                <!-- <div class="col-sm-2">
                                    <p class="bell-icon">
                                        <a href="#"><i class="fa-solid fa-bell"></i></a>
                                        <span class="round-white"></span>
                                    </p>
                                </div> -->
                                <div class="col-sm-9">
                                    <div class="row ">
                                        <div class="col-sm-4">
                                            <div class="round-user">
                                                <img src="/new-design/user-dashboard/images/question-1.png" alt="question-1" class="user-li">
                                                <span class="round"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 names">
                                            <p class="font-name"> {{auth()->user()->name}}</p>
                                            <p class="font-ad">{{auth()->user()->getEmirates(auth()->user()->id)}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1 pl-0 ">
                                    <ul class="moreoption">
                                        <li class="navbar nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="fa-solid fa-ellipsis-vertical text-white"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{route('logout')}}" onclick="return confirm('Are you sure you want to logout?')"> <img src="/new-design/user-dashboard/images/file-2.png"
                                                            alt="">
                                                        Logout</a>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-8  col-12 d-block d-xl-none">
                        <div class="d-flex1 ">
                            <div class="col-md-2">
                                <a class="" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                                    aria-controls="offcanvasExample">
                                    <img src="/new-design/user-dashboard/images/toogle.png" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a class="" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                                    aria-controls="offcanvasExample">
                                    <center> <img src="/new-design/user-dashboard/images/ft-logo.png" alt="off-logo" class="off-logo m-0">
                                    </center>
                                </a>
                            </div>
                            <div class="col-md-3 text-end">
                                <a class="" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                                    aria-controls="offcanvasExample">
                                    <img src="/new-design/user-dashboard/images/question-1.png" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                            aria-labelledby="offcanvasExampleLabel">
                            <div class="offcanvas-header">
                                <div class="text-left-part"> <img src="/new-design/user-dashboard/images/off-logo.png" alt="off-logo"
                                        class="off-logo"></div> <a type="button" class="btn-close bg-des"
                                    data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></a>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="menu-left">
                                    <li><a href="" class="active-nav"><i class="fa-solid fa-house-user"></i> Home</a>
                                    </li>
                                    <li><a href="#"><i class="fa-solid fa-landmark"></i> How It Works</a></li>
                                    <li><a href="#"><i class="fa-solid fa-users"></i> For Lawyers</a></li>
                                    <li><a href="#"><i class="fa-solid fa-question"></i> Testimonials</a></li>
                                    <li><a href="#"><i class="fa-solid fa-star"></i> Testimonials</a></li>
                                    <li><a href="#"><i class="fa-solid fa-bag-shopping"></i> Our Lawyers</a></li>
                                    <li><a href="#"><i class="fa-solid fa-user"></i> Lawyers</a></li>
                                    <li><a href="#"><i class="fa-solid fa-scale-balanced"></i> Practice Area</a></li>
                                    <li><a href="#"><i class="fa-solid fa-book"></i> Blogs & Articles</a></li>
                                    <li><a href="#"><i class="fa-solid fa-address-card"></i>Legal Services</a></li>
                                    <li><a href="#"><i class="fa-solid fa-gavel"></i> Legal Articles</a></li>
                                    <li><a href="#"><i class="fa-solid fa-right-from-bracket"></i> Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>