@extends('common.layouts.app')
@section('content')
    <!-- start page title -->
    <section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small for-lawyers-breadcrumb">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-start">Register</h1>
                </div>
                <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <ul class="xs-text-center">
                        <li><a href="/">Home</a></li>
                        <li>Register</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->

    <!-- start section -->
    <section class="parallax xs-padding-15px-lr" data-parallax-background-ratio="0.5" style="background-color:aliceblue;">
        <div class="container">
            <div class="row">
                <div class="col-12 bg-golden-brown overflow-hidden position-relative">
                    <div class="row">
                        <div class="col-12 col-md-5 cover-background sm-h-350px wow animate__fadeInLeft for-lawyers" data-wow-delay="0.4s" style="background-color: #041d43;color:white;overflow:auto;">
                            <h5 class="alt-font font-weight-500 text-white margin-4-rem-bottom">For Lawyers</h5>
                            <p>@lang('Connect Legal is an online community for lawyers and clients to discuss various legal issues. Being the first online marketplace for lawyers in the Middle East, it leverages innovative digital technology to effectively connect lawyers from across the region with their prospective clients.')</p>
                            <p>Connect Legal is an online community for lawyers and clients to discuss various legal issues. Being the first online marketplace for lawyers in the Middle East, it leverages innovative digital technology to effectively connect lawyers from across the region with their prospective clients.</p>
                            <p>Connect Legal is an online community for lawyers and clients to discuss various legal issues. Being the first online marketplace for lawyers in the Middle East, it leverages innovative digital technology to effectively connect lawyers from across the region with their prospective clients.</p>
                            <p>Connect Legal is an online community for lawyers and clients to discuss various legal issues. Being the first online marketplace for lawyers in the Middle East, it leverages innovative digital technology to effectively connect lawyers from across the region with their prospective clients.</p>
                            <p>Connect Legal is an online community for lawyers and clients to discuss various legal issues. Being the first online marketplace for lawyers in the Middle East, it leverages innovative digital technology to effectively connect lawyers from across the region with their prospective clients.</p>
                            <p>Connect Legal is an online community for lawyers and clients to discuss various legal issues. Being the first online marketplace for lawyers in the Middle East, it leverages innovative digital technology to effectively connect lawyers from across the region with their prospective clients.</p>                                
                        </div>
                        <div class="col-12 col-md-7 padding-7-rem-all lg-padding-5-rem-all xs-padding-4-rem-all wow animate__fadeIn for-lawyers-form" data-wow-delay="0.4s" style="background-color: white;">
                            <form action="{{route('lawyer.register')}}" method="post" class="alt-font text-extra-dark-gray">
                                @csrf()
                                <h6 class="alt-font text-extra-dark-gray font-weight-600 margin-35px-bottom md-margin-25px-bottom text-center">Law firm info                                    
                                <input class="input-border-bottom border-color-extra-dark-gray bg-transparent placeholder-dark medium-input text-black px-0 margin-25px-bottom border-radius-0px required" type="text" value="{{ old('lawfirm_name') }}" name="lawfirm_name" placeholder="Lawfirm Name" />
                                <input class="input-border-bottom border-color-extra-dark-gray bg-transparent placeholder-dark medium-input text-black px-0 margin-25px-bottom border-radius-0px required" type="text" value="{{ old('lawfirm_website') }}" name="lawfirm_website" placeholder="Lawfirm Webiste URL" />
                                <select name="emirate" id="" class="input-border-bottom border-color-extra-dark-gray bg-transparent placeholder-dark medium-input text-black px-0 margin-25px-bottom border-radius-0px required">
                                    <option value="UAE" {{ old('emirate') === 'UAE' ? 'selected' : '' }}>UAE</option>
                                    <option value="Qatar" {{ old('emirate') === 'Qatar' ? 'selected' : '' }}>Qatar</option>
                                </select>
                                <textarea class="input-border-bottom border-color-extra-dark-gray bg-transparent placeholder-dark medium-input text-black px-0 margin-35px-bottom border-radius-0px" name="office_address" value="{{ old('office_address') }}" rows="3" placeholder="Your Office Address"></textarea>
                                
                                <h6 class="alt-font text-extra-dark-gray font-weight-600 margin-35px-bottom md-margin-25px-bottom text-center">Contact Info</h6>
                                <div class="row">
                                    <div class="col-md-2">
                                        <select name="pref" id="" class="input-border-bottom border-color-extra-dark-gray bg-transparent placeholder-dark medium-input text-black px-0 margin-25px-bottom border-radius-0px required">
                                            <option value="Mr." {{ old('pref') === 'Mr.' ? 'selected' : '' }}>Mr.</option>
                                            <option value="Ms." {{ old('pref') === 'Ms.' ? 'selected' : '' }}>Ms.</option>
                                            <option value="Dr." {{ old('pref') === 'Dr.' ? 'selected' : '' }}>Dr.</option>
                                        </select>
                                    </div>
                                    <div class="col-md-10">
                                        <input class="input-border-bottom border-color-extra-dark-gray bg-transparent placeholder-dark medium-input text-black px-0 margin-25px-bottom border-radius-0px required" type="text" value="{{ old('name') }}" name="name" placeholder="Your Name" />
                                        @error('name')
                                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                                        @enderror  
                                    </div>
                                </div>
                                <input class="input-border-bottom border-color-extra-dark-gray bg-transparent placeholder-dark medium-input text-black px-0 margin-25px-bottom border-radius-0px required" type="email" value="{{ old('email') }}" name="email" placeholder="Your Email Address" />
                                @error('email')
                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                @enderror  
                                <div class="row">
                                    <div class="col-md-2">
                                        <input class="input-border-bottom border-color-extra-dark-gray bg-transparent placeholder-dark medium-input text-black px-0 margin-25px-bottom border-radius-0px" readonly value="+971" />
                                    </div>
                                    <div class="col-md-10">
                                        <input class="input-border-bottom border-color-extra-dark-gray bg-transparent placeholder-dark medium-input text-black px-0 margin-25px-bottom border-radius-0px required" type="number" value="{{ old('contact_number') }}" name="contact_number" placeholder="Your Contact Number" />
                                        @error('contact_number')
                                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                                        @enderror  
                                    </div>
                                </div>
                                <input class="input-border-bottom border-color-extra-dark-gray bg-transparent placeholder-dark medium-input text-black px-0 margin-25px-bottom border-radius-0px required" type="number" value="{{ old('landline') }}" name="landline" placeholder="Your Landline Number" />
                                <input class="input-border-bottom border-color-extra-dark-gray bg-transparent placeholder-dark medium-input text-black px-0 margin-25px-bottom border-radius-0px required" type="text" value="{{ old('position') }}" name="position" placeholder="Your Position (eg.Partner, Associate etc..)" />
                                @error('position')
                                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                                        @enderror  
                                <input class="input-border-bottom border-color-extra-dark-gray bg-transparent placeholder-dark medium-input text-black px-0 margin-25px-bottom border-radius-0px required" type="text" value="{{ old('linkedin') }}" name="linkedin" placeholder="Your Linkedin Profile URL" />
                                @error('linkedin')
                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                @enderror  
                                <input class="input-border-bottom border-color-extra-dark-gray bg-transparent placeholder-dark medium-input text-black px-0 margin-25px-bottom border-radius-0px required" type="text" value="{{ old('calendly_link') }}" name="calendly_link" placeholder="Your Calendly Link - Ex: https://calendly.com/abcd" />
                                @error('calendly_link')
                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                @enderror  
                                <input class="input-border-bottom border-color-extra-dark-gray bg-transparent placeholder-dark medium-input text-black px-0 margin-25px-bottom border-radius-0px required" type="password" name="password" placeholder="Password" />
                                @error('password')
                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                @enderror  
                                <button class="btn btn-medium mb-0" type="submit" style="background-color: #041d43;color:white;">Register</button>
                                <div class="form-results d-none"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
@endsection