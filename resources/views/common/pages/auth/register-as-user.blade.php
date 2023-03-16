@extends('common.home.layouts.app')
@section('content')

<section class="practice-area bg-grad-2">
    <div class="container">
        <div class="terms-step" id="form">
            <div class="row">
                <div class="col-lg-8">
                    <div class="bk">
                        <div class="row">
                            <div class="col-md-6 order-lg-0 order-last">
                                <div class="container ">
                                    <div class="rg-cn position-relative">
                                        <img src="/new-design/assets/images/fevicon.png" class="fv">
                                        <h1 class="h-tg">Find your lawyeror make your
                                            consultation</h1>
                                        <p class="tg">Be found. Register with us and get new leads every day. Adding
                                            more lorem ipsum and will be remplaced for the final text.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 order-lg-0 order-first">
                                <img src="/new-design/assets/images/register/Grouplike.png" class="rggggg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="Login">
                        <h5 class="lgn-pg">Sign up</h5>
                        <p class="ph">Alredy have an account?<span class="rgstr" onclick="login()" style="cursor:pointer;"> Log in</span></p>
                        <form action="{{route('user.register')}}" method="POST">
                            @csrf()
                            <div class="form-1 mt-md-5 mt-2">
                                <label class="hed mt-3 mb-3" >Name</label>
                                <input type="text" name="name" class="f-input form-control" placeholder="Enter your name">
                                @error('name')
                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                @enderror
                                <br>  
                                <label class="hed mt-3 mb-3">Email Address</label>
                                <input type="Email" name="email" class="f-input form-control" placeholder="email@domain.com">
                                @error('email')
                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                @enderror
                                <br>
                                <label class="hed mt-3">Password</label>
                                <input type="Password" name="password" class="f-input form-control" placeholder=".......">
                                @error('password')
                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                @enderror
                                <br>
                                <button class="btn-lgn mt-3" type="submit">Sign Up</button>
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
    <script>
        function login() {
            window.location.href = "/login";
        }
    </script>
@endpush