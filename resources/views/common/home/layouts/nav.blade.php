<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light main-menu">
        <div id="mySidenav1" class="offcanvas offcanvas-start" data-bs-scroll="true"
            data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling"
            aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-body">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
        </div>


        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1"
            id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdroped with scrolling
                </h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <p>Try scrolling the rest of the page to see this option in action.</p>
            </div>
        </div>

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
                    <a class="nav-link" href="{{route('question-answer')}}">Q & A</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('testimonials')}}">Testimonials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('blogs-articles', 1)}}">Blogs & Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('hire-a-lawyer')}}">Legal Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('our-lawyers')}}">Our Lawyers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="practice-area.html">Practice Area</a>
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
                            <a class="nav-link" href="{{route('user.dashboard')}}">Dashboard</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="{{route('user.logout')}}" class="nav-link" onclick="return confirm('Are you sure you want to logout?')" style="color: white;">Logout</a>
                        </li> -->
                    @endif
                @else 
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.login')}}">Login</a>
                    </li>                    
                @endif
            </ul>
        </div>
    </nav>
</div>



