<!-- login popup -->
<div class="loginPopup" id="myForm1">
        <div class="loginPopup-btns">
            <div><button class="loginPopup-loginbtn bg-green" onclick="openLogin()">Login</button></div>
            <div><button class="loginPopup-registerbtn" onclick="openRegister()">Register</button></div>
            <div><button class="loginPopup-closebtn" onclick="closeForm()">X</button></div>
        </div>
        <div class="loginPopup-content">
            <div class="s9-grid">
                <div class="loginPopup-item1">
                    <div class="s9-grid-s1-logo">
                        <img src="/images/basicImages/s9-logo.png" alt=""/>
                    </div>
                    <div class="s9-grid-s1-body">
                    <div class="s9-grid-s1-group">
                        <p class="s9-grid-s1-h">The best Legal 
                            Portal in UAE</p>
                        <p class="s9-grid-s1-p">Be found. Register with us and get new leads every day. Adding more lorem ipsum and will be remplaced for the final text.</p>
                    </div>
                    </div>
                </div>
                <div class="s9-grid-item2">
                    <p class="s9-grid-s2-t">
                        Log In
                    </p>
                    <p class="s9-grid-s2-st">
                        Don't have an account? <a class='linkStyle w-700' onclick="openRegister()">Register now</a>
                    </p>
                    <form class="s9-form" action="{{route('login')}}" onsubmit="return validateLogin(event)" method="POST">
                        @csrf()
                        <div><label for="email">Email Address</label></div>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            label="Email Address"
                            placeholder="email@domain.com"
                        />
                        <span class="email-error" style="color:red;"></span>
                        <div><label for="pwd">Password</label></div>
                        <input
                            name="password"
                            id="pwd"
                            label="Password"
                            placeholder="........."
                            type="password"
                        />
                        <span class="pwd-error" style="color:red;"></span>
                        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" ></div>
                        @error('g-recaptcha-response')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                        <a class="linkStyle login-forgotpassword" onclick="forgotPassword()">Forgot password</a>
                        
                        <button class="s9-signup" type='submit'>Log in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

      <!-- forgot password -->
      <div class="forgotPasswordPopup" id="forgotPassword">
        <div class="forgotPassword-container">
            <div class="loginPopup-btns">
                <div><button class="loginPopup-closebtn" onclick="closeForgotPassword()">X</button></div>
            </div>
            <div class="loginPopup-content">
                <div class="forgotPassword-content">
                    <h1>Reset Password</h1>
                    <p>Enter your email, and we'll send you the link to reset your password</p>
                    <br>
                    <form class="forgotPassword-form" action="{{ route('forgot.password.post') }}" method="POST" id="forgotPasswordCheck">
                        @csrf()
                        <input placeholder="email@domain.com" value="{{ old('email') }}" name="email" id="reset-email" required>
                        @if($errors->has('email'))
                            <span class="text-danger" style="color:red;">{{ $errors->first('email') }}</span>
                        @endif
                        <span class="reset-email-error" style="color:red;"></span>
                        <div>
                            <button class="s9-signup" type="submit">Send email</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- confirm forgot password -->
    <div class="forgotPasswordPopup" id="forgotPasswordConfirm">
        <div class="forgotPassword-container">
            <div class="loginPopup-btns">
                <div><button class="loginPopup-closebtn" onclick="closeForgotPasswordConfirm()">X</button></div>
            </div>
            <div class="loginPopup-content">
                <div class="forgotPassword-content">
                    <h1>Email Sent</h1>
                    <p>Please check the email address <b><span id="email_sent_to"></span></b> for instructions to reset your password.</p>
                    <br>
                    <p>if you dont have received any email, please check your spam folder or request a <a href="#" onclick="resendEmail()" class="green">resend email here.</a></p>
                    <div>
                        <button class="s9-signup" onclick="closeForgotPasswordConfirm()">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- register popup -->
    <div class="loginPopup" id="myForm2">
        <div class="loginPopup-btns">
            <div><button class="loginPopup-loginbtn" onclick="openLogin()">Login</button></div>
            <div><button class="loginPopup-registerbtn bg-green" onclick="openRegister()">Register</button></div>
            <div><button class="loginPopup-closebtn" onclick="closeForm()">X</button></div>
        </div>
        <div class="loginPopup-content">
            <div class="register-container">
                <div class="register-container-item1">
                    <h1 class="s6-boxItem-1">Register like a Lawyer</h1>
                    <p class="">Join us like a bigger buffet of lawyers in the Middle East</p>
                    <a href="{{route('lawyer.register-page')}}" style="text-decoration: none"><button class="registerpopup-btn">Register like a Lawyer</button></a>
                </div>
                <div class="register-container-item2">
                    <h1 class="s6-boxItem-2">Register like user</h1>
                    <p class="">Are you looking to hire a lawyer or make one consultant? Register now! </p>
                    <button class="registerpopup-btn" onclick="openSignUpUser()">Register like a user</button>
                </div>
            </div>
        </div>
    </div>

    <!-- register user pop up -->
    <div class="loginPopup" id="myForm3">
        <div class="loginPopup-btns">
            <div><button class="loginPopup-loginbtn" onclick="openLogin()">Login</button></div>
            <div><button class="loginPopup-registerbtn bg-green" onclick="openRegister()">Register</button></div>
            <div><button class="loginPopup-closebtn" onclick="closeForm()">X</button></div>
        </div>
        <div class="loginPopup-content">
            <div class="s9-grid">
                <div class="signUpPopup-item1">
                    <div class="s9-grid-s1-logo">
                        <img src="/images/basicImages/s9-logo.png" alt=""/>
                    </div>
                    <div class="s9-grid-s1-body">
                    <div class="s9-grid-s1-group">
                        <h1 class="s9-grid-s1-h-signup">Find your lawyer or make your consultation</h1>
                        <p class="s9-grid-s1-p">Be found. Register with us and get new leads every day. Adding more lorem ipsum and will be remplaced for the final text.</p>
                    </div>
                    </div>
                </div>
                <div class="s9-grid-item2">
                    <p class="s9-grid-s2-t">
                        Sign Up
                    </p>
                    <p class="s9-grid-s2-st">
                        Already have an account? <a class='linkStyle w-700' onclick="openLogin()">Log in</a>
                    </p>
                    <form class="s9-form" action="{{route('user.register')}}" onsubmit="return validateRegistration(event)" method="post">
                        @csrf()
                        <div><label for="name">Name</label></div>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            label="Name"
                            placeholder="Enter your name"
                        />
                        <span class="name-error" style="color:red;"></span>
                        @error('name')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror  

                        <div><label for="email">Email Address</label></div>
                        <input
                            type="email"
                            name="email"
                            id="email-reg"
                            label="Email Address"
                            placeholder="email@domain.com"
                        />
                        <span class="email-error" style="color:red;"></span>
                        @error('email')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror  

                        <div><label for="password">Password</label></div>
                        <input  
                            name="password"
                            id="password-reg"
                            label="Password"
                            placeholder="........."
                            type="password"
                        />
                        <span class="pwd-error" style="color:red;"></span>
                        @error('password')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror  
                        
                        <button class="s9-signup" type='submit'>Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- contact now popup -->
    <div class="contactnowPopup" id="contactnowPopup">
        <div class="loginPopup-btns">
            <div><button class="loginPopup-closebtn" onclick="closecontactnow()">X</button></div>
        </div>
        <div class="contactnow-content">
            <div class="contactnow-grid">
                <div class="contactnow-item1">
                    <div class="contactnow-item1-heading">
                        <h3>Looking for something else?</h3>
                        <img src="/images/basicImages/contactnowQoute.png" alt=""/>
                    </div>
                    <div>
                        <textarea class="contactnow-item1-textarea" placeholder="Describe your legal issue here..."></textarea>
                    </div>
                    <div class="contactnow-item1-btns">
                        <button class="contactnow-item1-btn1" onclick="openPostaQn()"><span class="material-symbols-rounded">post_add</span>&nbsp; Post a question</button>
                        <button class="contactnow-item1-btn2"><span class="material-symbols-rounded">chat</span>&nbsp; Chat online</button>
                        <button class="contactnow-item1-btn3"><span class="material-symbols-rounded">business_center</span>&nbsp; Hire a lawyer</button>
                    </div>
                </div>
                <div class="contactnow-lawyers">
                    <div class="contactnow-lawyers-item1">
                        <img src="/images/basicImages/arundhati.png"/>
                        <h3>Arundhati</h3>
                        <p>UAE, Abu Dhabi</p>
                    </div>
                    <div class="contactnow-lawyers-item2">
                        <img src="/images/basicImages/rashidAli.png"/>
                        <h3>Rashid Ali</h3>
                        <p>UAE, Qatar</p>
                    </div>
                    <div class="contactnow-lawyers-item3">
                        <img src="/images/basicImages/michelle.png"/>
                        <h3>Michelle</h3>
                        <p>UAE, Abu Dhabi</p>
                    </div>
                </div>
                <div class="contactnow-item2">
                    <h1 class="d-blue">Need a Lawyer?</h1>
                    <p>Hire lawyers online. Buy fixed-fee legal services or submit your request and get <strong>multiple competitive offers</strong> from qualified lawyers.</p>
                    <div class="contactnow-item2-btns">
                        <button class="contactnow-item2-btn1"><span class="material-symbols-rounded">filter_none</span>&nbsp; Buy services</button>
                        <button class="contactnow-item2-btn2"><span class="material-symbols-rounded">format_quote</span>&nbsp; Get quote</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="PostaQnPopup" id="openPostaQnPopup">
        <div class="loginPopup-btns">
            <div><button class="loginPopup-closebtn" onclick="closePostaQn()">X</button></div>
        </div>
        <div class="contactnow-content">
            <div class="postaQn-container">
                <form>
                    <div>
                        <textarea class="postaQn-textarea" placeholder="Post a question here..."></textarea>
                    </div>
                    <div class="registerLawyer-submit-btn">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="forgotPasswordPopup" id="howitworksPopup">
        <div class="howitworksPopup-container">
            <div class="loginPopup-btns">
                <div><button class="loginPopup-closebtn" onclick="ClosehowitworksPopup()">X</button></div>
            </div>
            <div class="howitworksPopup-container-vid">
                <iframe id="howitworkVid" style="border: none; width: 100%; height:100%"
                    src="https://www.youtube.com/embed/n_dZNLr2cME?enablejsapi=1">
                </iframe>
            </div>
        </div>
    </div>