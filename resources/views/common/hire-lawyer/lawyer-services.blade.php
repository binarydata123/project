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
    
    <section class="big-section bg-light-gray border-top border-color-medium-gray wow animate__fadeIn">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center margin-seven-bottom">
                    <h6 class="alt-font text-extra-dark-gray font-weight-500">Buy Services</h6>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2 interactive-banners-style-04">
                @forelse($lawyerServices as $k => $service)
                    <!-- start interactive banner item -->
                    <div class="col text-center interactive-banners-content sm-text-center md-margin-30px-bottom xs-margin-15px-bottom wow animate__zoomIn" data-wow-delay="0.2s">
                        <div class="position-relative padding-4-rem-tb bg-white box-shadow-large overflow-hidden">
                            <img src="/storage/{{$service->getProfilePic($service->lawyer_id)}}" class="w-10 margin-35px-bottom sm-w-100px" alt=""/>
                            <span class="alt-font text-extra-dark-gray d-block font-weight-500 line-height-22px">{{$service->user->name}}</span>
                            <span class="d-block">{{$service->getEmirate($service->lawyer_id)}}</span>
                            <span class="d-block text-black"><b>{{$service->platform_fee + $service->lawyer_fee}} USD</b></span>
                            
                            <!-- <button type="submit" class="btn btn-medium bg-extra-dark-gray d-block text-white section-link">Hire Now</button> -->
                            <a href="#free-advice-form-{{$k}}" class="btn btn-medium bg-extra-dark-gray d-block text-white section-link popup-with-form">Hire Now</a>
                        </div>
                    </div>

                    <div id="free-advice-form-{{$k}}" class="white-popup-block col-xl-9 col-lg-7 col-sm-9  p-0 mx-auto mfp-hide">
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
                                                    <input type="hidden" name="serviceId" value="{{$service->id}}"> 
                                                    <input type="hidden" name="amount" value="{{$service->platform_fee + $service->lawyer_fee}}">                                                   
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
                    <!-- end interactive banner item -->
                @empty                    
                    <span style="text-align: center;margin-left:38%;">No Services</span>
                @endforelse
                
            </div>
        </div>
    </section>
@endsection