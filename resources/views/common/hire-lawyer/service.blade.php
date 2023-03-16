@extends('common.layouts.app')
@section('content')
   <!-- start page title -->
    <section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small for-lawyers-breadcrumb">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-start">Legal Services</h1>
                </div>
                <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <ul class="xs-text-center">
                        <li><a href="/">Home</a></li>
                        <li>Legal Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->

    <section class="big-section bg-light-gray wow animate__fadeIn">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center margin-seven-bottom">
                    <h6 class="alt-font text-extra-dark-gray font-weight-500">Legal Services</h6>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-md-2 row-cols-sm-6">
                @foreach($services as $k => $service)
                    <!-- start feature box item -->
                    <div class="col sm-margin-30px-bottom xs-margin-15px-bottom wow animate__fadeIn">
                        <div class="feature-box text-start feature-box-show-hover box-shadow-small-hover feature-box-bg-white-hover border-all border-color-black-transparent overflow-hidden">                            
                            <div class="feature-box-move-bottom-top padding-3-rem-tb padding-4-rem-lr md-padding-2-rem-tb md-padding-2-half-rem-lr sm-padding-3-rem-tb sm-padding-4-half-rem-lr">
                                <h4 class="feature-box-icon alt-font font-weight-500 text-black d-inline-block margin-20px-bottom letter-spacing-minus-2px">{{$service->title}}</h4>
                                <div class="feature-box-content last-paragraph-no-margin">
                                    <span class="text-extra-dark-gray text-small font-weight-300 text-uppercase d-block margin-10px-bottom alt-font">{{$service->arbitration->area}}</span>
                                    <p>{{$service->description}}</p>
                                </div>
                                <h4 style="color: black;">{{$service->getLowestFee($service->id)}} USD</h4>
                                <div class="move-bottom-top margin-15px-top">
                                    <a href="{{route('service.lawyers', $service->id)}}" class="btn btn-link p-0 btn-extra-large text-extra-dark-gray md-margin-auto-lr">View Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end feature box item -->
                @endforeach
            </div>
        </div>
    </section>
@endsection