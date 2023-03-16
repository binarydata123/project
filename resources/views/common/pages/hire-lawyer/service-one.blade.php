@extends('common.home.layouts.app')
@section('content')

<main class="bg-color  bg-f4fefa">
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="clorwhite">
                                    <img src="/new-design/assets/images/Rectangleb.png" alt="" class="img-responsive img-full">
                                    <div class="col-md-12" id="hover">
                                        <div class="question-text1">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="category mt-3">{{$service->arbitration->area}}</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-9 col-12">
                                                    <h3>{{$service->title}}</h3>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="add-450">
                                                        <!-- <p>Starts from</p> -->
                                                        <h1>AED {{$service->getLawyerFee($service->id) + $service->getPlatformFee($service->id)}}</h1>
                                                    </div>
                                                    <!-- <img src="/new-design/assets/images/img1.png" alt="" class="img-responsive img-1">
                                                    <img src="/new-design/assets/images/img2.png" alt="" class="img-responsive img-2"> -->
                                                </div>
                                            </div>
                                            <p>{{$service->short_descr}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="service-description">
                                        <h2 class="mt-3 mb-3">Service description</h2>
                                        {!! $service->description !!}
                                        <br>
                                        <div class="text-end">
                                            <a href="{{route('service.step-two', $service->id)}}" class="btnbynew">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 mt-lg-0 mt-4">
                                <div class="slide-staice" id="statec">
                                    <div class="buy-service">
                                        <h5> <img src="/new-design/assets/images/Screenshot1.png" alt="">Buy service from</h5>
                                    </div>
                                    <hr>
                                    <!-- <h3>Recomended Lawyer</h3>
                                    <div class="law-box overbox" id="summary-law">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center m-p-0 over-n">
                                                <img src="/new-design/assets/images/Group.png" alt="Group">
                                                <i class="fa-solid fa-crown crown-p"></i>
                                            </div>
                                            <div class="col-7">
                                                <h5>Jaidev Kumar</h5>
                                                <div class="row">
                                                    <div class="col-6 p-0">
                                                        <ul class="star-part-2">
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-6 text-center p-0">
                                                        <span class="rev-35">(35 Reviews)</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-2 p-0 ">
                                                <p class="aed">AED <br> <span>450</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="law-box overbox" id="summary-law">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center m-p-0 over-n">
                                                <img src="/new-design/assets/images/Group.png" alt="Group">
                                                <i class="fa-solid fa-crown crown-p"></i>
                                            </div>
                                            <div class="col-7">
                                                <h5>Jaidev Kumar</h5>
                                                <div class="row">
                                                    <div class="col-6 p-0">
                                                        <ul class="star-part-2">
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-6 text-center p-0">
                                                        <span class="rev-35">(35 Reviews)</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-2 p-0 ">
                                                <p class="aed">AED <br> <span>450</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="law-box overbox" id="summary-law">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center m-p-0 over-n">
                                                <img src="/new-design/assets/images/Group.png" alt="Group">
                                            </div>
                                            <div class="col-7">
                                                <h5>Jaidev Kumar</h5>
                                                <div class="row">
                                                    <div class="col-6 p-0">
                                                        <ul class="star-part-2">
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-6 text-center p-0">
                                                        <span class="rev-35">(35 Reviews)</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-2 p-0 ">
                                                <p class="aed">AED <br> <span>450</span></p>
                                            </div>
                                        </div>
                                    </div> -->
                                    <h3>Other Lawyer</h3>
                                    @foreach($relatedLawyers as $k => $lawyer)
                                        <div class="law-box" id="summary-law">
                                            <div class="row align-items-center">
                                                <div class="col-3 text-center m-p-0 over-n">
                                                    <img src="/storage/{{$lawyer->profile_pic}}" alt="Group">
                                                </div>
                                                <div class="col-7"`>
                                                    <h5>{{$lawyer->user->name}}</h5>
                                                    <div class="row">
                                                        <div class="col-6 p-0">
                                                            <ul class="star-part-2">
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-6 text-center p-0">
                                                            <span class="rev-35">(35 Reviews)</span>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-2 p-0 ">
                                                    <p class="aed">AED <br> <span>{{$lawyer->lowestAmountOfferingForThisCategory($lawyer->user_id, $service->arbitration_area_id)}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                </section>
                <section id="heire">
                    <div class="container pb-5">
                        <h4>Related Services</h4>
                        <div class="cardtype">
                            <div class="row g-4">
                                @forelse($relatedServices as $k => $related)
                                    <div class="col-md-6" id="hover">
                                        <div class="question-text bg-two">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="category">{{$related->arbitration->area}}</div>
                                                </div>
                                            </div>
                                            <h3>{{$related->title}}</h3>
                                            <p>{{$related->description}}
                                            </p>
                                            <div class="row align-items-center">
                                                <div class="col-md-6 col-6">
                                                    <h1 class="aed-class">AED {{$related->getLawyerFee($related->id) + $related->getPlatformFee($related->id)}}</h1>
                                                </div>
                                                <div class="col-md-6 col-6 text-center">
                                                    <a href="{{route('service.step-one', $service->id)}}" class="seebtn  bg-change">see more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty 
                                    <center><h5>No Related Services</h5></center>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </section>




                <section class="hire-class">
                    <div class="container">
                        <div class="need-lawyer">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="eles">
                                        <div class="row">
                                            <div class="col-10">
                                                <h4>Looking for something else?</h4>
                                            </div>
                                            <div class="col-2 m-p-0">
                                                <img src="/new-design/assets/images/vector-8.png" alt="vector-8" class="vector-8">
                                            </div>
                                        </div>

                                        <div class="links-icons">
                                            <textarea placeholder="Describe your legal issue here..."></textarea>
                                            <div class="links">
                                                <a href="#"><i class="fa-regular fa-face-smile"></i></a>
                                                <a href="#"><i class="fa-solid fa-paperclip"></i></a>
                                            </div>
                                        </div>

                                        <ul class="post-1">
                                            <li><a href="#"><img src="/new-design/assets/images/post-3.png" alt="post-3"> Post a
                                                    question</a>
                                            </li>
                                            <li><a href="#"><img src="/new-design/assets/images/post-2.png" alt="post-2"> Chat online</a>
                                            </li>
                                            <li><a href="#"><img src="/new-design/assets/images/post-1.png" alt="post-1"> Hire a Lawyer</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 mt-xl-0 mt-3">
                                    <div class="abu">
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-3 col-4 m-p-0">
                                                <div class="d-flex-right dn">
                                                    <div class="cards needs">
                                                        <img src="/new-design/assets/images/one.png" alt="Group">
                                                        <p class="name-uaser">Arundhati</p>
                                                        <p class="short-mes">UAE, Abu Dhabi</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-4 m-p-0">
                                                <div class="d-flex-right">
                                                    <div class="cards needs">
                                                        <img src="/new-design/assets/images/Group.png" alt="Group">
                                                        <p class="name-uaser">Rashid Ali</p>
                                                        <p class="short-mes">UAE, Qatar</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-4 m-p-0">
                                                <div class="d-flex-right">
                                                    <div class="cards needs">
                                                        <img src="/new-design/assets/images/onetwo.png" alt="Group">
                                                        <p class="name-uaser">Michelle</p>
                                                        <p class="short-mes">UAE, Abu Dhabi</p>
                                                    </div>

                                                    <div class="cards needs alg">
                                                        <img src="/new-design/assets/images/one.png" alt="Group">
                                                        <p class="name-uaser">Arundhati</p>
                                                        <p class="short-mes">UAE, Abu Dhabi</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="Hire">
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <h5>Need a Lawyer?</h5>
                                                    <p>Hire lawyers online. Buy fixed-fee legal services or submit your
                                                        request
                                                        and get <b>multiple competitive offers</b> from qualified
                                                        lawyers.
                                                    </p>
                                                </div>
                                            </div>
                                            <ul class="post-1 text-left">
                                                <li><a href="#"><img src="/new-design/assets/images/post-3.png" alt="post-3"> Post a
                                                        question</a>
                                                </li>
                                                <li><a href="#"><img src="/new-design/assets/images/post-2.png" alt="post-2"> Chat
                                                        online</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
@endsection

@push('script')
    <script>
        
    </script>
@endpush