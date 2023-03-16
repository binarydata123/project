<!-- start hero section -->
<section class="p-0 cover-background overlap-height" style="background-image: url('/banner/background-home.jpeg');">
    <div class="opacity-very-light bg-dark-slate-blue"></div>
    <div class="container position-relative">
        <div class="row full-screen md-h-800px sm-h-500px">
            <div class="col-12 col-xl-5 col-lg-6 col-md-7 col-sm-10 d-flex flex-column justify-content-center banner-image">
                <a href="javascript:void(0);" class="btn btn-extra-large btn-expand-ltr animate__bounceInDown wow text-white text-white-hover btn-rounded d-table d-lg-inline-block lg-margin-15px-bottom md-margin-auto-lr open-menu"><b>Lawyers Online</b><span style="background-color: #f0b500;"></span></a>
                <hr>
                <h2 class="alt-font text-white line-height-65px font-weight-500 letter-spacing-minus-1px margin-65px-bottom sm-line-height-50px sm-margin-25px-bottom">Get Online Legal Support Services</h2>
                <div class="alt-font text-medium font-weight-500 text-uppercase letter-spacing-2px d-flex">
                    <span class="w-40px h-1px bg-tussock align-self-center margin-25px-right"></span><span class="text-tussock">This Platform Provides an opportunity to Connect Lawyers or Legal Consultants with those who are seeking for Legal Advice in UAE</span>
                </div>
            </div>
            <div class="col-12 col-xl-5 col-lg-6 col-md-7 col-sm-10 d-flex flex-column justify-content-center">
                <img src="/banner/connect-banner-image.png" data-tilt-options='{ "maxTilt": 20, "perspective": 1000, "easing": "cubic-bezier(.03,.98,.52,.99)", "scale": 1, "speed": 500, "transition": true, "reset": true, "glare": false, "maxGlare": 1 }' alt=""/>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row justify-content-end ms-auto w-750px position-absolute right-0px bottom-0px z-index-1 sm-position-relative sm-w-100">
        <div class="row align-items-center justify-content-end mx-0 w-100">
            <div class="col-12 col-sm-9 align-items-center d-flex h-100 padding-3-rem-tb padding-5-rem-lr xs-padding-3-rem-lr" style="background-color: #f0b500;">
                <h5 class="alt-font text-white font-weight-300 m-0"><span class="font-weight-600"><a href="#free-advice-form" style="color: white;" class="text-center align-items-center d-flex justify-content-center h-100 popup-with-form">Get Free Advice</a></span></h5>
            </div>
            <div class="col-3 p-0 h-100 d-none d-xl-inline-block">
                <a href="#free-advice-form" class="text-center align-items-center d-flex justify-content-center bg-seashell h-100 popup-with-form"><i class="line-icon-Arrow-OutRight icon-extra-large text-tussock"></i></a>
            </div>
        </div>
    </div>
    <!-- start contact form -->
    <div id="free-advice-form" class="white-popup-block col-xl-9 col-lg-7 col-sm-9  p-0 mx-auto mfp-hide">
        <div class="padding-fifteen-all bg-white border-radius-6px xs-padding-six-all">
            <div class="row border-top border-width-1px border-color-medium-gray" style="height: 120px;">
                <div class="col-12 p-0 tab-style-07">
                    <!-- start tab navigation -->
                    <ul class="nav nav-tabs justify-content-center text-center text-uppercase font-weight-500 alt-font margin-10-rem-bottom lg-margin-8-rem-bottom border-bottom border-color-medium-gray md-margin-6-rem-bottom">
                        <li class="nav-item"><a data-bs-toggle="tab" href="#question" class="nav-link active">Question</a></li>
                        @if(auth()->user())
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#chat">Chat</a></li>
                        @else 
                            <li class="nav-item"><a href="#login-form3" class="nav-link popup-with-form">Chat</a></li>
                        @endif
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#callback">Callback</a></li>
                    </ul>
                    <!-- end tab navigation -->
                </div>
            </div>
            <div class="tab-content">
                <div id="question" class="tab-pane fade in active show">
                    <h6 class="text-extra-dark-gray font-weight-500 margin-35px-bottom xs-margin-15px-bottom p-5 text-center">Ask A Question</h6> 
                    <form action="{{route('store.forum')}}" method="post">
                        @csrf()
                        <input class="medium-input margin-25px-bottom xs-margin-10px-bottom required" required type="email" name="email" placeholder="Your email address">
                        @error('email')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror    
                        <textarea class="medium-textarea xs-h-100px xs-margin-10px-bottom" rows="6" required name="message" placeholder="Your message"></textarea>
                        @error('message')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror    
                        <input type="hidden" name="redirect" value="">
                        <button class="btn btn-medium mb-0" type="submit" style="background-color: #041d43;color:white;float:right;">Post</button>
                    </form>
                    <div class="form-results d-none"></div>

                    <div class="row justify-content-center">
                        <div class="col-12 col-xl-8 col-lg-10 text-center overlap-gap-section">
                            <div class="w-40px h-2px separator-line-vertical margin-30px-tb d-inline-block" style="background-color: #041d43;"></div>
                            <h3 class="alt-font font-weight-500 text-extra-dark-gray letter-spacing-minus-1px">Know How It <span class="font-weight-600" style="color:#f0b500;">Works</span></h3>
                            <p>Ask your legal question and you will recieve an answer from a lawyer. If you do not get an immediate response, you will be notified you through email as soon as there is an answer. Register with us</p>
                        </div>
                    </div>
                </div>
                <div id="chat" class="tab-pane fade">
                    <h6 class="text-extra-dark-gray font-weight-500 margin-35px-bottom xs-margin-15px-bottom p-5 text-center">Chat Online</h6> 
                    <form action="{{route('chat-online')}}" method="POST">
                        @csrf()
                        <textarea class="medium-textarea xs-h-100px xs-margin-10px-bottom" rows="6" name="message" placeholder="Your message" required></textarea>     
                        @error('message')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror              
                        <button class="btn btn-medium mb-0" type="submit" style="background-color: #041d43;color:white;float:right;">Submit</button>
                    </form>
                    <div class="form-results d-none"></div>

                    <div class="row justify-content-center">
                        <div class="col-12 col-xl-8 col-lg-10 text-center overlap-gap-section">
                            <div class="w-40px h-2px separator-line-vertical margin-30px-tb d-inline-block" style="background-color: #041d43;"></div>
                            <h3 class="alt-font font-weight-500 text-extra-dark-gray letter-spacing-minus-1px">Know How It <span class="font-weight-600" style="color:#f0b500;">Works</span></h3>
                            <p>Send an instance message and you will get a revert back from a lawyer only if they are online. In case if no lawyers are online, then in that case we will respond you back with a email with regards to your legal issues complete your registration</p>
                        </div>
                    </div>
                </div>
                <div id="callback" class="tab-pane fade">
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
    </div>
    <!-- end contact form -->

    <form action="{{route('login')}}" onsubmit="return validateLogin(event)" method="POST" id="login-form3" class="white-popup-block col-xl-5 col-lg-7 col-sm-9  p-0 mx-auto mfp-hide">
        @csrf()
        <div class="padding-fifteen-all bg-white border-radius-6px xs-padding-six-all">
            <div class="row border-top border-width-1px border-color-medium-gray" style="height: 120px;margin-top: -60px;">                
                <div class="col-12 p-0 tab-style-07">
                    <!-- start tab navigation -->
                    <ul class="nav nav-tabs justify-content-center text-center text-uppercase font-weight-500 alt-font margin-10-rem-bottom lg-margin-8-rem-bottom border-bottom border-color-medium-gray md-margin-6-rem-bottom">
                        <li class="nav-item"><a data-bs-toggle="tab" href="#login" class="nav-link active">Login</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#register">Register</a></li>
                    </ul>
                    <!-- end tab navigation -->
                </div>
            </div>
            <div class="tab-content">
                <p style="color:red;">Note: Please login to send request for online chat</p>
                <div id="login" class="tab-pane fade in active show">
                    <h6 class="text-extra-dark-gray font-weight-500 margin-35px-bottom xs-margin-15px-bottom"></h6> 
                    <input class="medium-input margin-25px-bottom xs-margin-10px-bottom required" type="email" name="email" id="email" placeholder="Your email address">                    
                    <input class="medium-input required" type="password" name="password" id="pwd" placeholder="Your password">
                    
                    <input type="hidden" name="redirect" value="">
                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" style="margin-bottom: 2%;"></div>
                    @error('g-recaptcha-response')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <button class="btn btn-medium mb-0" type="submit" style="background-color: #041d43;color:white;">Login</button>
                    <a href="{{route('forgot.password.get')}}" style="float:right;">Forgot Password?</a>
                    <br>
                    <p>
                        <span style="color:red" class="email-error"></span>
                        <br>
                        <span style="color:red" class="pwd-error"></span>
                    </p>
                    <div class="form-results d-none"></div>
                </div>
                <div id="register" class="tab-pane fade">
                    <h6 class="text-extra-dark-gray font-weight-500 margin-35px-bottom xs-margin-15px-bottom" style="text-align: center;">Are You A Lawyer/Legal Consultant?</h6> 
                    <input type="hidden" name="redirect" value="">
                   
                    <div class="row justify-content-center">
                        <div class="col-12 btn-dual text-center">
                            <a href="{{route('lawyer.register-page')}}" class="btn btn-large btn-dark-gray btn-round-edge d-table d-lg-inline-block lg-margin-15px-bottom md-margin-auto-lr">Yes</a>
                            <a href="#login2-form" class="btn btn-large btn-dark-gray btn-round-edge d-table d-lg-inline-block lg-margin-15px-bottom md-margin-auto-lr popup-with-form">No</a>
                        </div>
                    </div>
                    <div class="form-results d-none"></div>
                </div>
            </div>
        </div>
    </form>
    <div id="login2-form" class="white-popup-block col-xl-5 col-lg-7 col-sm-9  p-0 mx-auto mfp-hide">
        <div class="padding-fifteen-all bg-white border-radius-6px xs-padding-six-all">
            <div class="row border-top border-width-1px border-color-medium-gray" style="height: 120px;margin-top: -60px;">
                <div class="col-12 p-0 tab-style-07">
                    <!-- start tab navigation -->
                    <ul class="nav nav-tabs justify-content-center text-center text-uppercase font-weight-500 alt-font margin-10-rem-bottom lg-margin-8-rem-bottom border-bottom border-color-medium-gray md-margin-6-rem-bottom">
                        <li class="nav-item"><a data-bs-toggle="tab" href="#login" class="nav-link">Login</a></li>
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#register">Register</a></li>
                    </ul>
                    <!-- end tab navigation -->
                </div>
            </div>
            <div class="tab-content">
                <div id="login" class="tab-pane fade">
                    <h6 class="text-extra-dark-gray font-weight-500 margin-35px-bottom xs-margin-15px-bottom"></h6> 
                    <input class="medium-input margin-25px-bottom xs-margin-10px-bottom required" type="email" name="email" placeholder="Your email address">
                    <input class="medium-input margin-25px-bottom xs-margin-10px-bottom required" type="password" name="password" placeholder="Your password">
                    
                    <input type="hidden" name="redirect" value="">
                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" style="margin-bottom: 2%;"></div>
                    @error('g-recaptcha-response')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <button class="btn btn-medium mb-0" type="submit" style="background-color: #041d43;color:white;">Login</button>
                    <a href="{{route('forgot.password.get')}}" style="float:right;">Forgot Password?</a>
                    <div class="form-results d-none"></div>
                </div>
                <div id="register" class="tab-pane fade in active show">
                    <h6 class="text-extra-dark-gray font-weight-500 margin-35px-bottom xs-margin-15px-bottom"></h6> 
                    <form action="{{route('user.register')}}" method="post">
                        @csrf()
                        <input class="medium-input margin-25px-bottom xs-margin-10px-bottom required" type="name" name="name" placeholder="Your name">
                        <input class="medium-input margin-25px-bottom xs-margin-10px-bottom required" type="email" name="email" placeholder="Your email address">
                        <input class="medium-input margin-25px-bottom xs-margin-10px-bottom required" type="password" name="password" placeholder="Your password">
                        
                        <input type="hidden" name="redirect" value="">
                        <button class="btn btn-medium mb-0" type="submit" style="background-color: #041d43;color:white;">Signup</button>
                    </form>
                    <div class="form-results d-none"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end hero section -->