<!-- LOGIN MODAL -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-lg modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <div class="custom-modal-header">
                    <button type="btn" class="btn login-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Login</button>
                    <button type="btn" class="btn register-btn" data-bs-toggle="modal" data-bs-target="#register-modal">Register</button>
                    <button type="button" class="btn-close custom-modal-btn" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body">
                <div class="login-modal">
                    <div class="login-modal-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-8">
                                <div class="thebest-legal-card-wraper">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="thebest-legal-card">
                                                <img class="legal-card-small-img"
                                                    src="/new-design/assets/image/home/Group 170.png" alt="">
                                                <h1>The best Legal
                                                    Portal in UAE</h1>
                                                <p>Be found. Register with us and get new leads every day.
                                                    Adding more
                                                    lorem ipsum
                                                    and will be remplaced for the final text.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="thebest-legal-card-img">
                                                <img src="/new-design/assets/image/modal/login-image.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="login-card">
                                    <h1>Log In </h1>
                                    <p>Alredy haven’t account?<a href="#" data-bs-toggle="modal" data-bs-target="#register-modal">Register now</a></p>
                                    <form class="login-card-form" action="{{route('login')}}" onsubmit="return validateLogin(event)" method="POST">
                                        @csrf()
                                        <div class="">
                                            <label for="email" class="form-label">Email
                                                address</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                aria-describedby="emailHelp" placeholder="email@domain.com">

                                        </div>
                                        <div class="">
                                            <label for="pwd"
                                                class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="pwd" placeholder="Password">
                                        </div>
                                        <div class="forgot-password">
                                            <a href="#" type="submit" class="btn" data-bs-toggle="modal" data-bs-target="#forgotPwd">Forgot password?</a>
                                        </div>
                                        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" style="margin-bottom: 2%;"></div>
                                        @error('g-recaptcha-response')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                        <div class="form-login-btn">
                                            <button type="submit" class="btn">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- REGISTER MODAL -->
<div class="modal fade" id="register-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="register-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-lg modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <div class="custom-modal-header">
                    <button type="btn" class="btn login-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Login</button>
                    <button type="btn" class="btn register-btn" data-bs-toggle="modal" data-bs-target="#register-modal">Register</button>
                    <button type="button" class="btn-close custom-modal-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body">
                <div class="login-modal">
                    <div class="login-modal-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="thebest-legal-card-wraper register-lawyer-card">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="thebest-legal-card register-lawyer">
                                                <img class="legal-card-small-img"
                                                    src="/new-design/assets/image/home/Group 170.png" alt="">
                                                <h1>Register<br>
                                                    like a Lawyer</h1>
                                                <p>Join us like a bigger buffet of lawyers in the Middle East
                                                </p>
                                                <button type="btn" class="btn">Register like a Lawyer</button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="thebest-legal-card-img">
                                                <img src="/new-design/assets/image/modal/register-like-lawyer.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="thebest-legal-card-wraper register-user-card">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="thebest-legal-card register-user">
                                                <img class="legal-card-small-img"
                                                    src="/new-design/assets/image/home/Group 170.png" alt="">
                                                <h1>Register<br>
                                                    like user</h1>
                                                <p>Are you looking to hire a lawyer or make one consultant?
                                                    Register now!
                                                </p>
                                                <div class="div">
                                                    <button type="btn" class="btn" data-bs-toggle="modal" data-bs-target="#log-inmodal">Register like a User</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="thebest-legal-card-img">
                                                <img src="/new-design/assets/image/modal/register-like-user.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- USER REGISTER MODAL -->
<div class="modal fade" id="log-inmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="log-inmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-lg modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <div class="custom-modal-header">
                    <button type="btn" class="btn login-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Login</button>
                    <button type="btn" class="btn register-btn" data-bs-toggle="modal" data-bs-target="#register-modal">Register</button>
                    <button type="button" class="btn-close custom-modal-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body">
                <div class="login-modal">
                    <div class="login-modal-body find-lawyer-modal-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-8">
                                <div class="thebest-legal-card-wraper">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="thebest-legal-card">
                                                <img class="legal-card-small-img"
                                                    src="/new-design/assets/image/home/Group 170.png" alt="">
                                                <h1>Find your lawyer or make your
                                                    consultation</h1>
                                                <p>Be found. Register with us and get new leads every day.
                                                    <b>Adding more lorem ipsum</b> and will be remplaced for the
                                                    final text.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="thebest-legal-card-img">
                                                <img src="/new-design/assets/image/modal/signin-img.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="login-card">
                                    <h1>Register </h1>
                                    <p>Alredy haven’t account?<a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Log in</a></p>
                                    <form class="login-card-form" action="{{route('user.register')}}" method="post">
                                        @csrf()
                                        <div class="">
                                            <label for="exampleInputEmail1" class="form-label">Name
                                            </label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="name" placeholder="Enter your name">
                                        </div>
                                        <div class="">
                                            <label for="exampleInputEmail1" class="form-label">Email
                                                address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="email" placeholder="email@domain.com">
                                        </div>
                                        <div class="">
                                            <label for="exampleInputPassword1"
                                                class="form-label">Password</label>
                                            <input type="password" class="form-control"
                                                id="exampleInputPassword1" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-login-btn">
                                            <button type="submit" class="btn">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="forgotPwd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">      
      <div class="modal-body">
        <div class="row col-12 col-md-12 p-3">
            <span class="r-p-text">Reset Password</span>
            <p>Enter your email, and we'll send you the link to reset your password</p>
            <div class="form-content mt-4 p-2">
                <form action="{{ route('forgot.password.post') }}" method="POST">
                    @csrf()
                    <div class="form-area-wrapper mb-4">
                        <div class="form-input-wrapper">
                            <input type="text" class="form-control" placeholder="E-Mail Address" value="{{ old('email') }}" name="email">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto mt-3">
                        <button class="btn btn-primary" type="submit" style="background-color: #208C84;">Send Email</button>
                    </div>
                </form>
            </div>
        </div>
      </div>      
    </div>
  </div>
</div>