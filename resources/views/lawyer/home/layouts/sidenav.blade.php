<!-- <section>
    <div id="mySidenav" class="sidenav" onclick="closeNav()">
        <div class="sidenav-wraper">
            <img id="closeNav" class="side-nav-logo" src="/new-design/assets/image/home/side-nav-logo.png" alt="">
            {{--<main>
                <div class="fix-height"></div>
            </main>--}}
            <div class="tab-content sidenav-menu" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
                    <ul class="mainmenu-list" style="margin-left: 25px;">
                        <li>
                            {{-- request()->is('sites/*/edit') ? 'active' : '' --}}
                            <a class="{{request()->is('lawyer/dashboard') ? 'active' : ''}}" href="{{route('lawyer.dashboard')}}">
                            <span class="icon-Vector-1"></span>Dashboard </a>
                        </li>
                        <li>
                            <a class="{{request()->is('lawyer/my-activity') ? 'active' : ''}}" href="{{route('lawyer.my-activity')}}">
                            <span class="icon-Vector-2"></span>My Activity </a>
                        </li>
                        <li>
                            <a class="{{request()->is('lawyer/scheduled-events') ? 'active' : ''}}" href="{{route('lawyer.scheduled-events')}}">
                            <span class="icon-Vector-3"></span>Scheduled Events </a>
                        </li>
                        <li>
                            <a class="{{request()->is('lawyer/online-chat-requests') ? 'active' : ''}}" href="{{route('lawyer.online-chat-requests')}}">
                            <span class="icon-Vector-4"></span>Chat Online Requests </a>
                        </li>
                        <li>
                            <a class="{{request()->is('lawyer/services') ? 'active' : ''}}" href="{{route('lawyer.services')}}">
                            <span class="icon-Vector-5"></span>Services </a>
                        </li>
                        <li>
                            <a class="{{request()->is('lawyer/community') ? 'active' : ''}}" href="{{route('lawyer.community')}}">
                            <span class="icon-Vector-6"></span>Lawyers Community </a>
                        </li>
                        <li>
                            <a class="{{request()->is('/lawyer/question-answer/list') ? 'active' : ''}}" href="{{route('lawyer.qa.list')}}">
                            <span class="icon-Group-2"></span>Question & Answer </a>
                        </li>
                        <li>
                            <a class="{{request()->is('/lawyer/articles') ? 'active' : ''}}" href="{{route('lawyer.article')}}">
                            <span class="icon-Vector-7"></span>Lawyer Articles </a>
                        </li>
                    </ul>
                </div>
            </div>           
        </div> 
    </div>
</section> -->

<div class="left-menu-bar">
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
    <ul class="list-group">
        <a href="#" data-toggle="sidebar-colapse"
        class=" list-group-item list-group-item-action d-flex align-items-center mmmm">
        <div class="d-flex w-100 justify-content-start align-items-center">
            <span id="collapse-icon" class="fa fa-2x mr-3"><img src="/new-design/user-dashboard/images/fa-white.png" alt="fa-white"
                class="fav-white"></span>
            <span id="collapse-text" class="menu-collapsed"><img src="/new-design/user-dashboard/images/off-logo.png" alt="off-logo"
                class="fav-icon"> </span>
        </div>
        </a>
        <div id='submenu1' class="collapse sidebar-submenu">
        <ul class="menu-left">
            <li><a href="/" class="active-nav"><i class="fa-solid fa-house-user"></i> Home</a></li>
            <li><a href="{{route('lawyer.dashboard')}}"><i class="fa-solid fa-landmark"></i>Dashboard</a></li>
            <!-- <li><a href="#"><i class="fa-solid fa-users"></i>My Activity</a></li> -->
            <li><a href="{{route('lawyer.consultation-requests')}}"><i class="fa-solid fa-question"></i> Consultation Requests</a></li>
            <li><a href="#"><i class="fa-solid fa-star"></i> Chat Online Requests</a></li>
            <li><a href="{{route('lawyer.services')}}"><i class="fa-solid fa-bag-shopping"></i>Services</a></li>
            <li><a href="{{route('lawyer.community')}}"><i class="fa-solid fa-user"></i> Lawyer Community</a></li>
            <li><a href="{{route('lawyer.qa.list')}}"><i class="fa-solid fa-scale-balanced"></i>Question & Answer</a></li>
            <li><a href="#"><i class="fa-solid fa-book"></i>Lawyer Articles</a></li>
        </ul>
        </div>

        <div class="icons-part-left">
        <ul class="menu-left white-left">
            <li><a href="#"><i class="fa-solid fa-user"></i></a></li>
            <li><a href="#"><i class="fa-solid fa-table"></i></a></li>
            <li><a href="#"><i class="fa-regular fa-comment"></i> </a></li>
            <li><a href="#"><i class="fa-solid fa-table-cells-large"></i> </a></li>
            <li><a href="#"><i class="fa-solid fa-question"></i> </a></li>
            <li><a href="#"><i class="fa-solid fa-right-from-bracket"></i> </a></li>
        </ul>
        </div>
        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
        </li>
    </ul>
    </div>
</div>