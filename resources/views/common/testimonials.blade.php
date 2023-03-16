@extends('common.layouts.app')
@section('content')
   <!-- start page title -->
    <section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small for-lawyers-breadcrumb">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-start">Testimonials</h1>
                </div>
                <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <ul class="xs-text-center">
                        <li><a href="/">Home</a></li>
                        <li>Testimonials</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->

    <section class="big-section bg-light-gray wow animate__fadeIn">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center margin-six-bottom">
                    <h4 class="alt-font text-extra-dark-gray font-weight-500">Testimonials <small>({{$testimonials->count()}})</h4>
                </div>
            </div>
            <div class="row overlap-gap-section">
                <div class="col-12 col-md-4 position-relative sm-padding-10-rem-bottom xs-padding-9-rem-bottom">
                    <h1 class="alt-font font-weight-600 text-extra-dark-gray letter-spacing-minus-2px margin-5-rem-bottom"><span class="text-border text-border-color-black text-border-width-2px opacity-3">Proud</span> stories</h1>
                    <div class="swiper-button-next-nav-02 swiper-button-next slider-navigation-style-03 white rounded-circle"><i class="feather icon-feather-arrow-right"></i></div>
                    <div class="swiper-button-previous-nav-02 swiper-button-prev slider-navigation-style-03 white rounded-circle"><i class="feather icon-feather-arrow-left"></i></div>
                </div>
                <div class="col-12 col-xl-5 col-lg-6 offset-lg-1 col-md-8 swiper-simple-arrow-style-1" data-wow-delay="0.2s">
                    <div class="swiper-container black-move" data-slider-options='{ "loop": true, "slidesPerView": 1, "observer": true, "observeParents": true, "navigation": { "nextEl": ".swiper-button-next-nav-02", "prevEl": ".swiper-button-previous-nav-02" }, "autoplay": { "delay": 4500, "disableOnInteraction": false }, "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
                        <div class="swiper-wrapper">
                            @foreach($testimonials as $k => $testimonial)
                                <!-- start testimonial item -->
                                <div class="swiper-slide">
                                    <span class="alt-font text-large line-height-38px md-line-height-32px letter-spacing-minus-1-half d-block margin-3-rem-bottom">{{$testimonial->message}}</span>
                                    <div class="feature-box feature-box-left-icon-middle">
                                        <!-- <div class="feature-box-icon margin-25px-right">
                                            <img class="rounded-circle w-85px h-85px" src="https://via.placeholder.com/125x125" alt="" />
                                        </div> -->
                                        <div class="feature-box-content">
                                            <div class="text-extra-dark-gray text-large alt-font line-height-20px text-gradient-peacock-blue-crome-yellow-2 text-uppercase d-inline-block"><span class="font-weight-600">{{$testimonial->name}}</span></div>
                                            <span class="alt-font text-medium d-block text-uppercase margin-5px-top">{{$testimonial->created_at->format('d M Y')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end testimonial item -->
                            @endforeach      
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection