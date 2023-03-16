@extends('common.home.layouts.app')
@section('content')


<section class="practice-area bg-grad-2">
    <div class="container">
        <div class="terms-step" id="form">
            <div class="row">
                <div class="col-lg-8">
                    <div class="background">
                        <div class="icon">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="/new-design/assets/images/fevicon.png" class="icn-1">
                                    <div class="txt-icn">
                                        <h4 class="l-txt font-tal">The best Legal Portal in UAE</h4>
                                        <p class="l-a">Be found. Register with us and get new leads every day. Adding more lorem
                                            ipsum and will be remplaced for the final text.</p>
        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img src="/new-design/assets/images/login page/Group 394 (1).png" class="grp">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="txt-icn">
                            <h4 class="l-txt">The best Legal
                                Portal in UAE</h4>
                            <p class="l-a">Be found. Register with us and get new leads every day. Adding more lorem
                                ipsum and will be remplaced for the final text.</p>

                        </div> -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="Login" id="login">
                        <h1 class="lgn-pg">Log in</h1>
                        <p class="ph">Alredy haven’t account? <span class="rgstr" onclick="registerAs()" style="cursor:pointer;">Register now {{session('email')}}</span></p>
                        <form action="{{route('login')}}" method="post">
                            @csrf()
                            <div class="form-1 mt-md-5 mt-2 position-relative" id="login-id">
                                <label class="hed mt-3 mb-3" >Email Address</label>
                                <input type="text" name="email" class="f-input form-control" placeholder="email@domain.com">
                                @error('email')
                                    <div class="text-red-500" style="color:red;">{{ $message }}</div>
                                @enderror
                                <label class="hed mt-3 mb-3">Password</label>
                                <div class="d-flex">
                                    <input type="password" name="password"  class="f-input form-control" id="password-field" placeholder=".........">
                                    <i class="fa-solid fa-eye view-icon" id="toggle-password" style="top: 44%!important;"></i>
                                </div>
                                @error('password')
                                    <div class="text-red-500" style="color:red;">{{ $message }}</div>
                                @enderror
                                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" ></div>
                                @error('g-recaptcha-response')
                                    <div class="text-red-500" style="color:red;">{{ $message }}</div>
                                @enderror                                
                                <p class="f-p mt-4 mb-4"  data-bs-toggle="modal" data-bs-target="#staticBackdrop6" style="cursor:pointer;">Forgot Password?</p>                                
                                <button type="submit" class="btn-lgn">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('email'))
    <script>
        const body = document.body;
        // Add a class to the body element
        body.classList.add('modal-open');
        
        // Append the backdrop to the body element
        const backdrop = document.createElement('div');
        backdrop.classList.add('modal-backdrop', 'show');
        body.appendChild(backdrop);
    </script>
    <div class="modal fade modal-popups show" style="display:block;" id="staticBackdrop7" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-centered" id="modal-login">
            <div class="modal-content"> 
                <div class="modal-header text-right"> 
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body">
                <div class="form-popup-des sp-xl" id="pills-tabContent">
                <h3 class="font-pop-title">Email Sent</h3>
                <p class="font-pop-pera">Please check the email address email@domain.com for instructions to reset your password.</p>
                <p class="font-pop-pera">if you dont have received any email, please check your spam folder or request a <a href="" onclick="resendEmail('{{session('email')}}')">resend email here.</a></p>                
                    <div class="text-center">
                    <button class="btn-lgn Send-email-btn black" onclick="closeModal()">Close</button>
                </div>

                </div>
                </div> 
            </div>
            </div>
        </div>
        @php session()->forget('email')@endphp
    @endif

    <div class="modal fade modal-popups" id="staticBackdrop6" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" id="modal-login">
            <div class="modal-content"> 
                <div class="modal-header text-right"> 
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body">
                    <div class="form-popup-des sp-xl" id="pills-tabContent">
                        <h3 class="font-pop-title">Reset Password</h3>
                        <form action="{{route('forgot.password.post')}}" method="post">
                            @csrf()
                            <p class="font-pop-pera">Enter your email, and we'll send you the link to reset your password</p>
                            <div class="form-part form-e">
                                <input type="email" placeholder="email@domain.com"  value="{{ old('email') }}" name="email"> 
                            </div>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                            <div class="text-center">
                                <button class="btn-lgn Send-email-btn" type="submit">Send email</button>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>


    
</section>


@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var passwordField = document.getElementById("password-field");
        var togglePassword = document.getElementById("toggle-password");

        togglePassword.addEventListener("click", function() {
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        });

        function registerAs() {
            window.location.href = "/register-as";
        }

        function closeModal() {
            location.reload();
        }

        function closeSB7() {
            const myDiv = document.querySelector('#staticBackdrop7');
            // Remove the 'show' class
            myDiv.classList.remove('show');

            // Update the display style to 'none'
            myDiv.style.display = 'none';
        }

        function resendEmail(email) {
            closeSB7()            
            $.ajax({
                method:"get",
                url: "/forgot-password/"+email,
                success: function(res){
                    if(res === "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Your message has been sent.',
                            confirmButtonText: 'OK'
                        });
                    }
                }
            });
        }
    </script>
@endpush