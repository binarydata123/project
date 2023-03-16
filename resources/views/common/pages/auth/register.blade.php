@extends('common.home.layouts.app')
@section('content')

<section class="practice-area bg-grad-2">
    <div class="container">
        <div class="terms-step" id="form">
            <div class="row">
                <div class="col-lg-6">
                    <div class="back-1">
                        <div class="row">
                            <div class="col-md-6 order-lg-0 order-last">
                                <div class="icn-png">
                                    <div class="container">
                                        <img src="/new-design/assets/images/fevicon.png" class="reg-fav">
                                        <h1 class="rg">Register
                                            like a Lawyer</h1>
                                        <p class="gr">Join us like a bigger buffet of lawyers in the Middle East
                                        </p>
                                        <button class="btn-rgstrr" onclick="registerLikeLawyer()">Register like a Lawyer</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 order-lg-0 order-first">
                                <img src="/new-design/assets/images/register/Group 388.png" class="rg-1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-4">
                    <div class="back-12">
                        <div class="row">
                            <div class="col-md-4 order-lg-0 order-last">
                                <div class="container">
                                    <div class="icn-png">
                                        <img src="/new-design/assets/images/fevicon.png" class="reg-fav">
                                        <h1 class="rgb">Register 
                                            like user
                                            </h1>
                                        <p class="grr">Are you looking to hire a lawyer or make one consultant? Register now!
                                        </p>
                                        <button class="btn-rgstr" onclick="registerLikeUser()">Register like a user</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 order-lg-0 order-first">
                                <img src="/new-design/assets/images/register/Group 1210.png" class="rg-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('script')
    <script>
        function registerLikeLawyer() {
            window.location.href = "/lawyer/register";
        }
        
        function registerLikeUser() {
            window.location.href = "/user-register";
        }
    </script>
@endpush