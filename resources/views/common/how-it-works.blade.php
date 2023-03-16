@extends('common.layouts.app')
@section('content')
    <!-- start page title -->
    <section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small for-lawyers-breadcrumb">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-start">How It Works</h1>
                </div>
                <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <ul class="xs-text-center">
                        <li><a href="/">Home</a></li>
                        <li>How It Works</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="home-consulting big-section cover-background" style="background-image: url('images/home-consulting-about-bg.jpg');">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-6 col-md-10 md-margin-5-rem-bottom wow animate__fadeIn">
                    <h4 class="alt-font font-weight-500 text-extra-dark-gray letter-spacing-minus-1px margin-4-rem-bottom w-80 lg-w-90 md-margin-3-rem-bottom xs-margin-4-rem-bottom xs-w-100">How it works for <span class="text-tussock text-decoration-line-bottom-thick font-weight-600">clients</span></h4>
                    <p class="w-70 margin-40px-bottom lg-w-90 md-margin-25px-bottom">Lorem ipsum dolor sit amet consectetur adipiscing elit do eiusmod tempor incididunt ut labore et dolore magna ut enim ad minim veniam nostrud exercitation.</p>
                    <div class="panel-group accordion-event accordion-style-02 w-85 lg-w-100" id="accordion1" data-active-icon="icon-feather-minus" data-inactive-icon="icon-feather-plus">
                        <!-- start accordion item -->
                        <div class="panel bg-transparent">
                            <div class="panel-heading active-accordion border-color-black-transparent">
                                <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion1" href="#collapseOne">
                                    <div class="panel-title">
                                        <span class="alt-font text-dark-purple d-inline-block font-weight-500">Prevents cartilage and joint breakdown</span>
                                        <i class="text-dark-purple feather icon-feather-minus"></i>
                                    </div>
                                </a>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse show" data-bs-parent="#accordion1">
                                <div class="panel-body">Lorem ipsum dolor sit amet consectetur adipiscing do eiusmod tempor incididunt ut labore et dolore ut enim ad minim veniam nostrud.</div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                        <!-- start accordion item -->
                        <div class="panel bg-transparent">
                            <div class="panel-heading border-color-black-transparent">
                                <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion1" href="#collapseTwo">
                                    <div class="panel-title">
                                        <span class="alt-font text-dark-purple d-inline-block font-weight-500">Regulates your adrenal glands</span>
                                        <i class="indicator text-dark-purple feather icon-feather-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" data-bs-parent="#accordion1">
                                <div class="panel-body">Lorem ipsum dolor sit amet consectetur adipiscing do eiusmod tempor incididunt ut labore et dolore ut enim ad minim veniam nostrud.</div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                        <!-- start accordion item -->
                        <div class="panel bg-transparent">
                            <div class="panel-heading border-color-black-transparent">
                                <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion1" href="#collapseThree">
                                    <div class="panel-title">
                                        <span class="alt-font text-dark-purple d-inline-block font-weight-500">Boosts your immune system functionality</span>
                                        <i class="indicator text-dark-purple feather icon-feather-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" data-bs-parent="#accordion1">
                                <div class="panel-body">Lorem ipsum dolor sit amet consectetur adipiscing do eiusmod tempor incididunt ut labore et dolore ut enim ad minim veniam nostrud.</div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                    </div>
                </div>
                <div class="col-12 col-lg-5 offset-lg-1 col-md-10 wow animate__fadeIn" data-wow-delay="0.2s">
                    <div class="position-relative">
                        <div class="opacity-very-light bg-dark-slate-blue"></div>
                        <img class="w-100" src="https://via.placeholder.com/457x607" alt="" />
                        <a href="https://www.youtube.com/watch?v=g0f_BRYJLJE" class="popup-youtube absolute-middle-center video-icon-box video-icon-double-large left-0px">
                            <span>
                                <span class="video-icon bg-white box-shadow-large">
                                    <i class="feather icon-feather-play icon-medium text-tussock"></i>
                                </span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- start section -->
    <section class="big-section wow animate__fadeIn" style="background-color: white;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center margin-six-bottom">
                    <h6 class="alt-font text-extra-dark-gray font-weight-500">Contact Us</h6>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <form id="project-contact-form" action="{{route('store.contact-us')}}" method="post">
                        @csrf()
                        <div class="row row-cols-1 row-cols-md-2">
                            <div class="col margin-4-rem-bottom sm-margin-25px-bottom">
                                <input class="medium-input bg-white margin-25px-bottom required" type="text" name="contact_name" value="{{ old('contact_name') }}" placeholder="Your Name">
                                @error('contact_name')
                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                @enderror 
                                <input class="medium-input bg-white margin-25px-bottom required" type="email" name="contact_email" value="{{ old('contact_email') }}" placeholder="Your Email Address">
                                @error('contact_email')
                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                @enderror 
                                <div class="row">
                                    <div class="col-md-3">
                                        <input class="medium-input bg-white" readonly value="+971" />
                                    </div>
                                    <div class="col-md-9">
                                        <input class="medium-input bg-white margin-25px-bottom" type="tel" name="contact" value="{{ old('contact') }}" placeholder="Your Contact Number">
                                    </div>
                                </div>
                                <select name="contact_subject" class="medium-input bg-white mb-0" id="">
                                    <option value="">Subject</option>
                                    <option value="Customer Support" {{ old('contact_subject') === 'Customer Support' ? 'selected' : '' }}>Customer Support</option>
                                    <option value="General Enquiry" {{ old('contact_subject') === 'General Enquiry' ? 'selected' : '' }}>General Enquiry</option>
                                    <option value="Legal Question" {{ old('contact_subject') === 'Legal Question' ? 'selected' : '' }}>Legal Question</option>
                                </select>
                                @error('contact_subject')
                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                @enderror 
                            </div>
                            <div class="col margin-4-rem-bottom sm-margin-20px-bottom">
                                <textarea class="medium-textarea bg-white h-200px" rows="6" name="contact_message" placeholder="Your message">{{ old('contact_message') }}</textarea>
                                @error('contact_message')
                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                @enderror 
                            </div>
                            <div class="col text-center text-md-end">
                                <input type="hidden" name="redirect" value="">
                                <button id="project-contact-us-button" class="btn btn-medium btn-fancy mb-0" type="submit" style="background-color: #041d43;color:white;">Submit</button>
                            </div>
                        </div>
                        <div class="form-results d-none"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="big-section wow animate__fadeIn bg-light-gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center margin-six-bottom">
                    <h6 class="alt-font text-extra-dark-gray font-weight-500">Feedback</h6>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <form id="project-contact-form" action="{{route('store.testimonials')}}" method="post">
                        @csrf()
                        <div class="row row-cols-1 row-cols-md-2">
                            <div class="col margin-4-rem-bottom sm-margin-25px-bottom">
                                <input class="medium-input bg-white margin-25px-bottom required" type="text" name="name" value="{{ old('name') }}" placeholder="Your Name">
                                @error('name')
                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                @enderror 
                                <select name="emirate" id="" class="medium-input bg-white mb-0 required">
                                    <option value="">Please select emirate</option>
                                    <option value="UAE" {{ old('emirate') == 'UAE' ? 'selected' : '' }}>UAE</option>
                                    <option value="Qatar" {{ old('emirate') == 'Qatar' ? 'selected' : '' }}>Qatar</option>
                                </select>
                                @error('emirate')
                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                @enderror 
                            </div>
                            <div class="col margin-4-rem-bottom sm-margin-20px-bottom">
                                <textarea class="medium-textarea bg-white h-200px" rows="6" name="message" value="{{ old('message') }}" placeholder="Your message"></textarea>
                                @error('message')
                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                @enderror 
                            </div>
                            <div class="col text-center text-md-end">
                                <input type="hidden" name="redirect" value="">
                                <button id="project-contact-us-button" class="btn btn-medium btn-fancy mb-0" type="submit" style="background-color: #041d43;color:white;">Submit</button>
                            </div>
                        </div>
                        <div class="form-results d-none"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
@endsection