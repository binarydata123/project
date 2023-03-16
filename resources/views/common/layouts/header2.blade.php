@php 
    $lawyers = App\Models\Lawyer::whereIsVerified(1)->get();
@endphp
<header class="side-menu menu-style-2">
    <!-- start sidebar strip -->
    <div class="sidebar-nav-action" style="background-color:#041d43;">
        <div class="sidebar-nav-action-main">
            <a href="/" class="logo">
                <img alt="" src="/logo.png" class="mobile-logo" data-at2x="/logo.png">
            </a>
            <div class="side-menu-button">
                <a href="javascript:void(0);" class="nav-icon" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
            <ul class="sidebar-social-icon list-unstyled d-none d-sm-inline-block">
                <li><a href="https://www.facebook.com/" target="_blank" class="text-white"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                <li><a href="https://twitter.com/" target="_blank" class="text-white"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="http://www.linkedin.com" target="_blank" class="text-white"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
    <!-- end sidebar strip -->
    <!-- start navigation -->
    <div class="bg-black sidebar-nav-menu navbar-expand-lg">
        <div class="hover-background-color bg-extra-dark-gray d-none d-lg-block"></div>
        <!-- start menu -->
        <div class="col-12 h-100 padding-3-half-rem-lr sm-padding-1-rem-lr">
            <div class="menu-list-wrapper" data-scroll-options='{ "theme": "light" }'>
                <ul class="menu-list alt-font alt-font w-70 xl-w-100 margin-auto-lr tab-pane med-text mainMenu fade in active show" id="main-menu">
                    <!-- start menu item -->
                    <li class="menu-list-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="menu-list-item">
                        <a href="{{route('howItWorks')}}">How It Works</a>
                    </li>
                    <li class="menu-list-item">
                        <a href="{{route('lawyer.register-page')}}">For Lawyers</a>
                    </li>
                    <li class="menu-list-item">
                        <a href="{{route('question-answer')}}">Q&A</a>
                    </li>
                    <li class="menu-list-item">
                        <a href="{{route('testimonials')}}">Testimonials</a>
                    </li>
                    <li class="menu-list-item">
                        <a href="{{route('our-lawyers')}}">Our Lawyers</a>
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
                        <li class="menu-list-item">
                            <a href="{{route('blogs-articles', 1)}}">Blogs & Articles</a>
                        </li>
                        <li class="menu-list-item">
                            <a href="{{route('hire-a-lawyer')}}">Hire Lawyer</a>
                        </li>
                        <li class="menu-list-item">
                            <a href="{{route('legal.article-list')}}">Legal Articles</a>
                        </li>
                    @if(auth()->user() && auth()->user()->user_type == 2)
                        <li class="menu-list-item">
                            <a href="{{route('logout')}}">Logout</a>
                        </li>
                    @elseif(auth()->user() && auth()->user()->user_type == 3)
                        <li class="menu-list-item">
                            <a href="{{route('user.activity')}}">My Activity</a>
                        </li>
                        <li class="menu-list-item">
                            <a href="{{route('online-chat.requests')}}">Online Chat Requests</a>
                        </li>
                        <li class="menu-list-item">
                            <a href="{{route('user.logout')}}">Logout</a>
                        </li>
                    @else
                        <li class="menu-list-item">
                            <a href="#login-form" class="popup-with-form">Login</a>
                        </li>
                    @endif
                    <!-- end menu item -->
                </ul>
                <ul class="menu-list alt-font alt-font w-70 xl-w-100 margin-auto-lr tab-pane med-text fade in lawyerOnline" id="lawyer-online">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <ul class="list-style-08">
                                <hr>
                                <strong>Lawyers Online</strong>
                                @foreach($lawyers as $k => $lawyer)
                                    @if($lawyer->user->isOnline())
                                        <hr>
                                        <li class="border-bottom border-color-black-transparent" style="padding: 0px 0;">
                                            <a class="modal-popup" href="#modal-popup{{$lawyer->id}}">
                                                <img class="rounded-circle border-all border-width-6px border-color-green box-shadow-small margin-25px-right xs-w-40px xs-margin-4px-right" src="/logo.png" alt="" style="width: 50px;"/>
                                            </a>
                                            <div class="w-100 lg-w-65 xs-w-60 xs-margin-10px-right last-paragraph-no-margin avatar avatar-online">
                                                <span class="font-weight-300 text-small text-white">{{$lawyer->user->name}}</span>
                                                <small><p>{{$lawyer->emirates}}</p></small>
                                            </div>
                                            <input type="hidden" id="lawyer" value="{{$lawyer->id}}">
                                            <div id="modal-popup{{$lawyer->id}}" class="col-11 col-xl-3 col-lg-6 col-md-8 col-sm-9 position-relative mx-auto bg-white text-center modal-popup-main padding-4-half-rem-all mfp-hide border-radius-6px sm-padding-2-half-rem-lr">
                                                <ul class="list-style-02 alt-font font-weight-500 text-small text-uppercase text-extra-dark-gray">
                                                    <li class="padding-15px-bottom border-bottom border-color-medium-gray"><i class="feather  icon-feather-message-square text-large text-black margin-10px-right"></i>Post a question</li>
                                                    @if(auth()->user())
                                                        <li class="padding-15px-tb border-bottom border-color-medium-gray"><i class="feather icon-feather-message-circle text-large text-black margin-10px-right"></i><a href="#chat-online-form" style="color:black;" class="popup-with-form online-chatting" onclick="onlineChatting({{$lawyer->id}})">Chat online</a></li>
                                                    @else 
                                                        <li class="padding-15px-tb border-bottom border-color-medium-gray"><i class="feather icon-feather-message-circle text-large text-black margin-10px-right"></i><a href="#login-form" style="color:black;" class="popup-with-form online-chatting">Chat online</a></li>
                                                    @endif
                                                    <li class="padding-15px-tb border-bottom border-color-medium-gray"><i class="feather icon-feather-phone-call text-large text-black margin-10px-right"></i><a href="#callback-form" style="color:black;" class="popup-with-form callback-form" onclick="callbackReq({{$lawyer->user->id}})">Request a callback<a></li>
                                                    @if($lawyer->isReadyWithSlot($lawyer->user->id))
                                                        <li class="padding-15px-tb border-bottom border-color-medium-gray"><i class="feather icon-feather-calendar text-large text-black margin-10px-right"></i><a href="{{route('book-a-meeting', $lawyer->id)}}" style="color:black;">Book a meeting</a></li>
                                                    @endif
                                                    <li class="padding-15px-tb border-bottom border-color-medium-gray"><i class="feather icon-feather-briefcase text-large text-black margin-10px-right"></i><a href="{{route('lawyer.services.list', $lawyer->user->id)}}" style="color:black;">Hire The lawyer</a></li>
                                                    <li class="padding-15px-tb border-bottom border-color-medium-gray"><i class="feather icon-feather-user-plus text-large text-black margin-10px-right"></i>Open profile</li>
                                                </ul>
                                                <a class="btn btn-fancy btn-small btn-transparent-light-gray popup-modal-dismiss" href="#">Dismiss</a>
                                            </div>
                                            <!-- <div class="font-weight-500 text-extra-medium text-extra-dark-gray">$10.00</div> -->
                                        </li>
                                        <!-- <div class="font-weight-500 text-extra-medium text-extra-dark-gray">$10.00</div> -->
                                        
                                        <!-- <div class="font-weight-500 text-extra-medium text-extra-dark-gray">$10.00</div> -->
                                        <hr>
                                    @endif
                                @endforeach
                                
                                <strong>Lawyers Offline</strong>
                                @foreach($lawyers as $k => $lawyer)
                                    @if(!$lawyer->user->isOnline())
                                        <hr>
                                        <li class="border-bottom border-color-black-transparent" style="padding: 0px 0;margin-bottom: 35px;">
                                            <a class="modal-popup" href="#modal-popup{{$lawyer->id}}">
                                                <img class="rounded-circle border-all border-width-6px border-color-green box-shadow-small margin-25px-right xs-w-40px xs-margin-4px-right" src="/logo.png" alt="" style="width: 50px;border-color:red!important;"/>
                                            </a>
                                            <div class="w-100 lg-w-65 xs-w-60 xs-margin-10px-right last-paragraph-no-margin avatar avatar-online">
                                                <span class="font-weight-300 text-small text-white">{{$lawyer->user->name}}</span>
                                                <small><p>{{$lawyer->emirates}}</p></small>
                                            </div>
                                            <input type="hidden" id="lawyer" value="{{$lawyer->id}}">
                                            <div id="modal-popup{{$lawyer->id}}" class="col-11 col-xl-3 col-lg-6 col-md-8 col-sm-9 position-relative mx-auto bg-white text-center modal-popup-main padding-4-half-rem-all mfp-hide border-radius-6px sm-padding-2-half-rem-lr">
                                                <ul class="list-style-02 alt-font font-weight-500 text-small text-uppercase text-extra-dark-gray">
                                                    <li class="padding-15px-bottom border-bottom border-color-medium-gray"><i class="feather  icon-feather-message-square text-large text-black margin-10px-right"></i>Post a question</li>
                                                    @if(auth()->user())
                                                        <li class="padding-15px-tb border-bottom border-color-medium-gray"><i class="feather icon-feather-message-circle text-large text-black margin-10px-right"></i><a href="#chat-online-form" style="color:black;" class="popup-with-form online-chatting" onclick="onlineChatting({{$lawyer->id}})">Chat online</a></li>
                                                    @else 
                                                        <li class="padding-15px-tb border-bottom border-color-medium-gray"><i class="feather icon-feather-message-circle text-large text-black margin-10px-right"></i><a href="#login-form" style="color:black;" class="popup-with-form online-chatting">Chat online</a></li>
                                                    @endif
                                                    <li class="padding-15px-tb border-bottom border-color-medium-gray"><i class="feather icon-feather-phone-call text-large text-black margin-10px-right"></i><a href="#callback-form" style="color:black;" class="popup-with-form online-chatting" onclick="callbackReq({{$lawyer->user->id}})">Request a callback<a></li>
                                                    @if($lawyer->isReadyWithSlot($lawyer->user->id))
                                                        <li class="padding-15px-tb border-bottom border-color-medium-gray"><i class="feather icon-feather-calendar text-large text-black margin-10px-right"></i><a href="{{route('book-a-meeting', $lawyer->id)}}" style="color:black;">Book a meeting</a></li>
                                                    @endif
                                                    <li class="padding-15px-tb"><i class="feather icon-feather-briefcase text-large text-black margin-10px-right"></i> <a href="{{route('lawyer.services.list', $lawyer->user->id)}}" style="color:black;">Hire The lawyer</a> </li>
                                                    <li class="padding-15px-tb"><i class="feather icon-feather-user-plus text-large text-black margin-10px-right"></i>Open profile</li>
                                                </ul>
                                                <a class="btn btn-fancy btn-small btn-transparent-light-gray popup-modal-dismiss" href="#">Dismiss</a>
                                            </div>
                                            <!-- <div class="font-weight-500 text-extra-medium text-extra-dark-gray">$10.00</div> -->
                                            <div id="modal-popup-{{$lawyer->id}}" class="col-11 col-xl-12 col-lg-12 col-md-12 col-sm-12 position-relative mx-auto bg-white text-center modal-popup-main padding-4-half-rem-all mfp-hide border-radius-6px sm-padding-2-half-rem-lr">
                                                <!-- start section -->
                                                <div class="calendly-inline-widget" style="min-width:320px;height:580px;" data-auto-load="false">
                                                <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script>
                                                <script>
                                                    Calendly.initInlineWidget({
                                                        url: '{{$lawyer->calendly_link}}'
                                                    });
                                                </script>
                                            </div>
                                        </li>
                                        <hr>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
        <div id="chat-online-form" class="white-popup-block col-xl-9 col-lg-7 col-sm-9  p-0 mx-auto mfp-hide">
            <div class="padding-fifteen-all bg-white border-radius-6px xs-padding-six-all">                
                <div class="tab-content">    
                    <form action="{{route('chat-online')}}" method="POST">
                        @csrf()
                        <div id="chat">
                            <h6 class="text-extra-dark-gray font-weight-500 margin-35px-bottom xs-margin-15px-bottom p-5 text-center">Chat Online</h6> 
                            <textarea class="medium-textarea xs-h-100px xs-margin-10px-bottom" rows="6" name="message" placeholder="Your message"></textarea>
                            <input type="hidden" name="redirect" value="">
                            <input type="hidden" name="lawyerId" id="lawyerId" value="">
                            <button class="btn btn-medium mb-0" type="submit" style="background-color: #041d43;color:white;float:right;">Submit</button>
                            <div class="form-results d-none"></div>
    
                            <div class="row justify-content-center">
                                <div class="col-12 col-xl-8 col-lg-10 text-center overlap-gap-section">
                                    <div class="w-40px h-2px separator-line-vertical margin-30px-tb d-inline-block" style="background-color: #041d43;"></div>
                                    <h3 class="alt-font font-weight-500 text-extra-dark-gray letter-spacing-minus-1px">Know How It <span class="font-weight-600" style="color:#f0b500;">Works</span></h3>
                                    <p>Send an instance message and you will get a revert back from a lawyer only if they are online. In case if no lawyers are online, then in that case we will respond you back with a email with regards to your legal issues complete your registration</p>
                                </div>
                            </div>
                        </div>
                    </form>                
                </div>
            </div>
        </div>
        <div id="callback-form" class="white-popup-block col-xl-9 col-lg-7 col-sm-9  p-0 mx-auto mfp-hide">
            <div class="padding-fifteen-all bg-white border-radius-6px xs-padding-six-all">                
                <div class="tab-content">    
                    <h6 class="text-extra-dark-gray font-weight-500 margin-35px-bottom xs-margin-15px-bottom p-5 text-center">Request A Callback</h6> 
                    <form action="{{route('callback')}}" method="post">
                        @csrf()
                        <input class="medium-input margin-25px-bottom xs-margin-10px-bottom required" required type="name" name="name" placeholder="Your Full Name">
                        @error('name')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror    
                        <input class="medium-input margin-25px-bottom xs-margin-10px-bottom" type="email" name="email" placeholder="Your email address">
                        <input class="medium-input margin-25px-bottom xs-margin-10px-bottom required" required type="number" name="contact" placeholder="Your contact number">
                        @error('contact')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror    
                        <textarea class="medium-textarea xs-h-100px xs-margin-10px-bottom" rows="6" name="message" placeholder="Your message"></textarea>
                        @error('message')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror    
                        <input type="hidden" name="lawyer_id" id="callback_lawyerId" value="">
                        <button class="btn btn-medium" type="submit" style="background-color: #041d43;color:white;float:right;">Submit</button>
                    </form>
                    <div class="form-results d-none"></div>

                    <div class="row justify-content-center">
                        <div class="col-12 col-xl-8 col-lg-10 text-center overlap-gap-section">
                            <div class="w-40px h-2px separator-line-vertical margin-30px-tb d-inline-block" style="background-color: #041d43;"></div>
                            <h3 class="alt-font font-weight-500 text-extra-dark-gray letter-spacing-minus-1px">Know How It <span class="font-weight-600" style="color:#f0b500;">Works</span></h3>
                            <p>In case you will require a lawyers suggestion on a particular issue – drop your query here consider weekend and holidays as off days as you will hear on the subnsequest working day of the week</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!-- end menu -->
        <div class="bottomNavbar">
            <a href="#main-menu" class="mainMenu active" onclick="mainMenu()">
                <i class="feather icon-feather-menu align-middle"> Menu</i>
            </a>
            <a href="#lawyer-online" class="lawyerOnline" onclick="lawyerOnline()">
                <i class="feather icon-feather-message-square align-middle"> Lawyers Online</i>
            </a>
        </div>

    </div>
    <!-- end navigation -->
</header>