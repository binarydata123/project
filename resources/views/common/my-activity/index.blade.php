@extends('common.layouts.app')
@section('content')
    <section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small for-lawyers-breadcrumb">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-start">My Activity</h1>
                </div>
                <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <ul class="xs-text-center">
                        <li><a href="/">Home</a></li>
                        <li>My Activity</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="big-section" style="background-color: white;">
        <div class="container">
        
            <div class="row">
                <div class="col-12 col-lg-10 mx-auto margin-60px-bottom md-margin-30px-bottom wow animate__fadeIn" data-wow-delay="0.2s">
                    <div class="d-block d-md-flex w-100 box-shadow-small align-items-center border-radius-5px padding-4-rem-all">
                        <div class="w-130px text-center margin-60px-right sm-margin-auto-lr">
                            <!-- <img src="https://via.placeholder.com/125x125" class="rounded-circle w-110px" alt=""/> -->
                            <a class="text-extra-dark-gray alt-font font-weight-500 margin-20px-top d-inline-block text-medium">{{auth()->user()->name}}</a>
                            <span class="text-medium d-block line-height-18px sm-margin-15px-bottom">{{auth()->user()->email}}</span>
                        </div>
                        <div class="w-75 sm-w-100 last-paragraph-no-margin text-center text-md-start">
                            <ul>
                                <li>Request For Quotes: <b>{{$requestForQuotes->count()}}</b></li>
                                <li>Total Questions Asked: <b>{{$forumQuestions->count()}}</b></li>
                                <li>Online Chat Requests: <b>{{$chatRequests->count()}}</b></li>
                                <li>Callback Requests: <b>{{$callbackRequests->count()}}</b></li>
                                <li>Lawyers Hired: <b>{{$hiredData->count()}}</b></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center margin-five-bottom">
                        <h6 class="alt-font text-extra-dark-gray font-weight-500">Request For Quotes</h6>
                    </div>
                </div>
                <div class="col-12 position-relative p-0 wow animate__fadeIn" data-wow-delay="0.4s">
                    @if($requestForQuotes->count() > 4)
                        <div class="swiper-container h-auto padding-15px-all black-move" data-slider-options='{ "loop": true, "slidesPerView": 1, "spaceBetween": 30, "autoplay": { "delay": 3000, "disableOnInteraction": false },  "observer": true, "observeParents": true, "navigation": { "nextEl": ".swiper-button-next-nav-3", "prevEl": ".swiper-button-previous-nav-3" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 4 }, "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 2 } }, "effect": "slide" }'>
                    @else
                        <div class="swiper-container h-auto padding-15px-all black-move" data-slider-options='{ "loop": false, "slidesPerView": 1, "spaceBetween": 30, "autoplay": { "delay": 3000, "disableOnInteraction": false },  "observer": true, "observeParents": true, "navigation": { "nextEl": ".swiper-button-next-nav-3", "prevEl": ".swiper-button-previous-nav-3" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 4 }, "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 2 } }, "effect": "slide" }'>
                    @endif
                        <div class="swiper-wrapper">
                            @foreach($requestForQuotes as $k => $quote)
                                <div class="swiper-slide box-shadow-small box-shadow-extra-large-hover">
                                    <div class="position-relative bg-white padding-3-rem-all md-padding-4-rem-lr">
                                        <div class="bg-neon-orange text-small font-weight-500 alt-font text-white text-uppercase position-absolute top-minus-15px right-0px padding-5px-tb padding-20px-lr">${{$quote->lawyerService->lawyer_fee + $quote->lawyerService->platform_fee}}</div>
                                        <!-- <span class="text-medium text-uppercase d-block margin-5px-bottom">08 Days</span> -->
                                        <a href="#" class="alt-font font-weight-500 d-block margin-30px-bottom line-height-24px text-extra-dark-gray text-neon-orange-hover d-block">{{$quote->lawyerService->services->title}}</a>
                                        <span class="text-golden-yellow text-small line-height-18px d-block">{{$quote->lawyerService->user->name}}</span>
                                        <span class="text-medium">{{$quote->lawyerService->getEmirate($quote->lawyerService->lawyer_id)}}</span>
                                        <a href="#hire-lawyer-form-{{$k}}" class="btn btn-medium bg-extra-dark-gray d-block text-white section-link popup-with-form">Hire Now</a>
                                    </div>
                                </div>

                                <div id="hire-lawyer-form-{{$k}}" class="white-popup-block col-xl-9 col-lg-7 col-sm-9  p-0 mx-auto mfp-hide">
                                    <main>
                                        <div class="row">
                                            <aside class="col-sm-6 offset-3">
                                                <article class="card">
                                                    <div class="card-body p-5">
                                                        <ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                                                                <i class="fa fa-credit-card"></i>Card Details</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane fade show active" id="nav-tab-card">
                                                                @foreach (['danger', 'success'] as $status)
                                                                    @if(Session::has($status))
                                                                        <p class="alert alert-{{$status}}">{{ Session::get($status) }}</p>
                                                                    @endif
                                                                @endforeach
                                                                <form role="form" method="POST" id="paymentForm" action="{{ route('stripe.payment') }}">
                                                                    @csrf
                                                                    <input type="hidden" name="serviceId" value="{{$quote->lawyer_service_id}}"> 
                                                                    <input type="hidden" name="amount" value="{{$quote->lawyerService->lawyer_fee + $quote->lawyerService->platform_fee}}">                                                   
                                                                    <div class="form-group">
                                                                        <label for="username">Full name (on the card)</label>
                                                                        <input type="text" class="form-control" name="fullName" placeholder="Full Name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="cardNumber">Card number</label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" name="cardNumber" placeholder="Card Number">
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text text-muted">
                                                                                <i class="fab fa-cc-visa fa-lg pr-1"></i>
                                                                                <i class="fab fa-cc-amex fa-lg pr-1"></i>
                                                                                <i class="fab fa-cc-mastercard fa-lg"></i>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-8">
                                                                            <div class="form-group">
                                                                                <label><span class="hidden-xs">Expiration</span> </label>
                                                                                <div class="input-group">
                                                                                    <select class="form-control" name="month">
                                                                                        <option value="">MM</option>
                                                                                        @foreach(range(1, 12) as $month)
                                                                                            <option value="{{$month}}">{{$month}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <select class="form-control" name="year">
                                                                                        <option value="">YYYY</option>
                                                                                        @foreach(range(date('Y'), date('Y') + 10) as $year)
                                                                                            <option value="{{$year}}">{{$year}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">
                                                                                <label data-toggle="tooltip" title=""
                                                                                    data-original-title="3 digits code on back side of the card">CVV <i
                                                                                    class="fa fa-question-circle"></i></label>
                                                                                <input type="number" class="form-control" placeholder="CVV" name="cvv">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button class="subscribe btn btn-primary btn-block" type="submit"> Confirm </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </aside>
                                        </div>
                                    </main>
                                </div>
                            @endforeach
                        </div> 
                    </div>
                    <div class="swiper-button-next-nav-3 swiper-button-next rounded-circle light slider-navigation-style-07 box-shadow-double-large" tabindex="0" role="button" aria-label="Next slide"><i class="feather icon-feather-arrow-right"></i></div>
                    <div class="swiper-button-previous-nav-3 swiper-button-prev rounded-circle light slider-navigation-style-07 box-shadow-double-large" tabindex="0" role="button" aria-label="Previous slide"><i class="feather icon-feather-arrow-left"></i></div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center margin-five-bottom">
                        <h6 class="alt-font text-extra-dark-gray font-weight-500">Hired Data</h6>
                    </div>
                </div>
                <div class="col-12 position-relative p-0 wow animate__fadeIn" data-wow-delay="0.4s">
                    @if($hiredData->count() > 4)
                        <div class="swiper-container h-auto padding-15px-all black-move" data-slider-options='{ "loop": true, "slidesPerView": 1, "spaceBetween": 30, "autoplay": { "delay": 3000, "disableOnInteraction": false },  "observer": true, "observeParents": true, "navigation": { "nextEl": ".swiper-button-next-nav-3", "prevEl": ".swiper-button-previous-nav-3" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 4 }, "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 2 } }, "effect": "slide" }'>
                    @else
                        <div class="swiper-container h-auto padding-15px-all black-move" data-slider-options='{ "loop": false, "slidesPerView": 1, "spaceBetween": 30, "autoplay": { "delay": 3000, "disableOnInteraction": false },  "observer": true, "observeParents": true, "navigation": { "nextEl": ".swiper-button-next-nav-3", "prevEl": ".swiper-button-previous-nav-3" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 4 }, "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 2 } }, "effect": "slide" }'>
                    @endif
                    <div class="swiper-wrapper">
                        @foreach($hiredData as $k => $hired)
                            <div class="swiper-slide box-shadow-small box-shadow-extra-large-hover">
                                <div class="position-relative bg-white padding-3-rem-all md-padding-4-rem-lr">
                                    <div class="bg-neon-orange text-small font-weight-500 alt-font text-white text-uppercase position-absolute top-minus-15px right-0px padding-5px-tb padding-20px-lr">${{$hired->lawyerService->lawyer_fee + $hired->lawyerService->platform_fee}}</div>
                                    <!-- <span class="text-medium text-uppercase d-block margin-5px-bottom">08 Days</span> -->
                                    <a href="#" class="alt-font font-weight-500 d-block margin-30px-bottom line-height-24px text-extra-dark-gray text-neon-orange-hover d-block">{{$hired->lawyerService->services->title}}</a>
                                    <span class="text-golden-yellow text-small line-height-18px d-block">Lawyer Name: {{$hired->lawyerService->user->name}}</span>
                                    <span class="text-medium">Emirate: {{$hired->lawyerService->getEmirate($hired->lawyerService->lawyer_id)}}</span>
                                    <p><span class="text-medium">{{$hired->created_at->format('d M Y')}}</span></p>
                                </div>
                            </div>
                        @endforeach
                    </div> 
                </div>
                <div class="swiper-button-next-nav-3 swiper-button-next rounded-circle light slider-navigation-style-07 box-shadow-double-large" tabindex="0" role="button" aria-label="Next slide"><i class="feather icon-feather-arrow-right"></i></div>
                <div class="swiper-button-previous-nav-3 swiper-button-prev rounded-circle light slider-navigation-style-07 box-shadow-double-large" tabindex="0" role="button" aria-label="Previous slide"><i class="feather icon-feather-arrow-left"></i></div>
            </div>
            <hr>
            <div class="row">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center margin-five-bottom">
                        <h6 class="alt-font text-extra-dark-gray font-weight-500">Questions Asked</h6>
                    </div>
                </div>
                <div class="col-12 position-relative p-0 wow animate__fadeIn" data-wow-delay="0.4s">
                    @if($forumQuestions->count() > 4)
                        <div class="swiper-container h-auto padding-15px-all black-move" data-slider-options='{ "loop": true, "slidesPerView": 1, "spaceBetween": 30, "autoplay": { "delay": 3000, "disableOnInteraction": false },  "observer": true, "observeParents": true, "navigation": { "nextEl": ".swiper-button-next-nav-3", "prevEl": ".swiper-button-previous-nav-3" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 4 }, "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 2 } }, "effect": "slide" }'>
                    @else
                        <div class="swiper-container h-auto padding-15px-all black-move" data-slider-options='{ "loop": false, "slidesPerView": 1, "spaceBetween": 30, "autoplay": { "delay": 3000, "disableOnInteraction": false },  "observer": true, "observeParents": true, "navigation": { "nextEl": ".swiper-button-next-nav-3", "prevEl": ".swiper-button-previous-nav-3" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 4 }, "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 2 } }, "effect": "slide" }'>
                    @endif
                        <div class="swiper-wrapper">
                            @foreach($forumQuestions as $k => $question)
                                <div class="swiper-slide box-shadow-small box-shadow-extra-large-hover">
                                    <div class="position-relative bg-white padding-3-rem-all md-padding-4-rem-lr">
                                        <div class="bg-neon-orange text-small font-weight-500 alt-font text-white text-uppercase position-absolute top-minus-15px right-0px padding-5px-tb padding-20px-lr">{{$question->created_at->format('d M Y')}}</div>
                                        <!-- <span class="text-medium text-uppercase d-block margin-5px-bottom">08 Days</span> -->
                                        <a href="#" class="alt-font font-weight-500 d-block margin-30px-bottom line-height-24px text-extra-dark-gray text-neon-orange-hover d-block">{{Str::limit($question->message, 150)}}</a>
                                        @if($question->to_lawyer)
                                            <span class="text-golden-yellow text-small line-height-18px d-block">Lawyer: {{$question->toLawyer->user->name}}</span>
                                        @else 
                                            <span class="text-golden-yellow text-small line-height-18px d-block">Lawyer: Any</span>
                                        @endif
                                        <span class="text-medium">Status: <b>{{$question->is_verified == 1 ? 'Approved' : 'Pending'}}</b></span>
                                        @if($question->isAnswered($question->id))
                                            <a href="{{route('question-answer.view', $question->slug)}}" class="btn btn-medium bg-extra-dark-gray d-block text-white section-link">View Answer</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div> 
                    </div>
                    <div class="swiper-button-next-nav-3 swiper-button-next rounded-circle light slider-navigation-style-07 box-shadow-double-large" tabindex="0" role="button" aria-label="Next slide"><i class="feather icon-feather-arrow-right"></i></div>
                    <div class="swiper-button-previous-nav-3 swiper-button-prev rounded-circle light slider-navigation-style-07 box-shadow-double-large" tabindex="0" role="button" aria-label="Previous slide"><i class="feather icon-feather-arrow-left"></i></div>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="col-md-12 text-center margin-five-bottom">
                    <h6 class="alt-font text-extra-dark-gray font-weight-500">Online Chat Requests</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Requests</h5>
                </div>
                <div class="card-body">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Email</th>
                                <th style="text-align: center;">Comments</th>
                                <th style="text-align: center;">Accepted</th>
                                <th style="text-align: center;">Completed</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chatRequests as $k => $request)
                                <tr style="text-align: center;">
                                    <td>{{$request->lawyer->user->name}}</td>
                                    <td>{{$request->lawyer->user->email}}</td>
                                    <td>{{$request->comment}}</td>
                                    <td>
                                        {{$request->status ? "Yes" : "No"}}
                                    </td>
                                    <td>
                                    {{$request->complete ? 'Yes' : 'No'}}
                                    </td>
                                    <td>
                                        @if($request->status && !$request->complete)
                                            <a href="/online-chat/{{$request->lawyer->user_id}}" style="color:blue;" target="_blank">Chat Here</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="col-md-12 text-center margin-five-bottom">
                    <h6 class="alt-font text-extra-dark-gray font-weight-500">Callback Requests</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Callback Requests</h5>
                </div>
                <div class="card-body">
                    <table id="myTable2">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Lawyer</th>
                                <th style="text-align: center;">Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($callbackRequests as $k => $request)
                                <tr style="text-align: center;">
                                    <td>{{$request->to_lawyer ? $request->lawyer->name : 'Any'}}</td>
                                    <td>{{$request->created_at->format('d M Y')}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
