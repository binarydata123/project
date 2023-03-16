@extends('common.home.layouts.app')
@section('content')
    <section class="practice-area bg-grad-2">   
        <div class="container">
            <div class="terms-step" id="form">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="box-redi border-0" id="id-hide">
                            <div class="row">
                                <div class="col-md-4" id="bg-img">
                                    <div class="tip-class">
                                        <span>TIP</span>
                                        <h1>Make a Strong
                                        Password</h1>
                                        <p>Use letters, numbers, special characters and a minimum length of 8 characters</p>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <form action="{{ route('reset.password.post') }}" method="POST">
                                        @csrf()
                                        <div class="password-text">
                                            <h5>Change your Password</h5>
                                            <p>Reset your password here</p>
                                            <div class="firm-info">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="password" name="new_password" placeholder="new password">
                                                    </div>
                                                    <input type="hidden" name="dummy" value="{{$token}}">
                                                    @if ($errors->has('new_password'))
                                                        <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                                    @endif
                                                    <div class="col-sm-12">
                                                        <input type="password" name="new_password_confirmation" placeholder="Confirm password">
                                                    </div>
                                                    @if ($errors->has('new_password_confirmation'))
                                                        <span class="text-danger">{{ $errors->first('new_password_confirmation') }}</span>
                                                    @endif
                                                </div>
                                                <div class="mt-2 mb-5" id="pdng-cover">
                                                    <button type="submit" class="addpay" style="border: none;">Confirm change</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection