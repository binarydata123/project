<form action="{{route('login')}}" onsubmit="return validateLogin(event)" method="POST" id="login-form" class="white-popup-block col-xl-5 col-lg-7 col-sm-9  p-0 mx-auto mfp-hide">
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