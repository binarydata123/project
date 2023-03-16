@extends('common.home.layouts.app')
@section('content')
    <div class="fix-height"></div>
    <section class="practice-area p-a-detail">
        <div class="container" style="margin-bottom: 10%;">
            <div class="row">
                <span class="p-a-detail-heading">Family Law <span style="color: #191919;">Dubai</span></span>
            </div>
            <div class="row p-a-cat-slider">
                <div class="p-a-categories">
                    <img src="/new-design/assets/image/practice-area/cat1.png" class="p-a-cat-image" alt="">
                    <span class="p-a-cat-name">Family Law</span>
                    <span class="p-a-active"></span>
                </div>
                <div class="p-a-categories">
                    <img src="/new-design/assets/image/practice-area/cat2.png" class="p-a-cat-image" alt="">
                    <span class="p-a-cat-name">Family Law</span>                    
                </div>
                <div class="p-a-categories">
                    <img src="/new-design/assets/image/practice-area/cat3.png" class="p-a-cat-image" alt="">
                    <span class="p-a-cat-name">Family Law</span>                    
                </div>
                <div class="p-a-categories">
                    <img src="/new-design/assets/image/practice-area/cat4.png" class="p-a-cat-image" alt="">
                    <span class="p-a-cat-name">Family Law</span>                    
                </div>
                <div class="p-a-categories">
                    <img src="/new-design/assets/image/practice-area/cat5.png" class="p-a-cat-image" alt="">
                    <span class="p-a-cat-name">Family Law</span>                    
                </div>
                <div class="p-a-categories">
                    <img src="/new-design/assets/image/practice-area/cat6.png" class="p-a-cat-image" alt="">
                    <span class="p-a-cat-name">Family Law</span>                    
                </div>
                <div class="p-a-categories">
                    <img src="/new-design/assets/image/practice-area/cat7.png" class="p-a-cat-image" alt="">
                    <span class="p-a-cat-name">Family Law</span>                    
                </div>
                <div class="p-a-categories">
                    <img src="/new-design/assets/image/practice-area/cat8.png" class="p-a-cat-image" alt="">
                    <span class="p-a-cat-name">Family Law</span>                    
                </div>
            </div>
            <div class="row p-a-cat-detail">
                <span class="p-a-detail-heading2">Family Law <span style="color: #191919;">Dubai</span></span>
                <img src="/new-design/assets/image/practice-area/cat-detail.jpeg" alt="" class="cat-detail-img">
                <div class="p-a-cat-detail-descr">
                    <p class="p-a-cat-detail-descr-p">Family Law Dubai refers to the practice area of the law that deals with a variety of topics such as divorce, child support, allocation, property disputes, parenting orders and much more legal issues related to the family. Given that these tend to be sensitive legal problems, it’s helpful to count on legal counsel and support that can help you achieve a good solution.</p>
                    <p class="p-a-cat-detail-descr-p">Family Law Dubai refers to the practice area of the law that deals with a variety of topics such as divorce, child support, allocation, property disputes, parenting orders and much more legal issues related to the family. Given that these tend to be sensitive legal problems, it’s helpful to count on legal counsel and support that can help you achieve a good solution.</p>
                    <p class="p-a-cat-detail-descr-p">Family Law Dubai refers to the practice area of the law that deals with a variety of topics such as divorce, child support, allocation, property disputes, parenting orders and much more legal issues related to the family. Given that these tend to be sensitive legal problems, it’s helpful to count on legal counsel and support that can help you achieve a good solution.</p>
                    <p class="p-a-cat-detail-descr-p">Family Law Dubai refers to the practice area of the law that deals with a variety of topics such as divorce, child support, allocation, property disputes, parenting orders and much more legal issues related to the family. Given that these tend to be sensitive legal problems, it’s helpful to count on legal counsel and support that can help you achieve a good solution.</p>
                    <div class="p-a-w-coll-sec">
                    <button class="p-a-accordion p-a-detail-accord"><span class="p-a-d-a-text">How can I get assistance with the criminal procedure code?</span></button>
                    <div class="p-a-panel p-a-d-panel">
                        <p>Our team of lawyers have experience with criminal law and crimes act, thus they can understand your unique requirements.</p>
                    </div>

                    <button class="p-a-accordion p-a-detail-accord"><span class="p-a-d-a-text">How can I find a lawyer with experience in family law?</span></button>
                    <div class="p-a-panel p-a-d-panel">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>

                    <button class="p-a-accordion p-a-detail-accord"><span class="p-a-d-a-text">Boosts your immune systems functionlity</span></button>
                    <div class="p-a-panel p-a-d-panel">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                </div>
            </div>            
        </div>
        <div class="row col-xs-10 col-12 col-sm-12 col-md-10 col-xl-10 ask-lawyer-main mb-5 p-5">
            <div class="col-12 col-md-6 col-xl-7 ask-lawyer-form w-md-auto">
                <!-- <span class="p-a-l-f-s-else"><img src="/new-design/assets/image/practice-area/hangout.png" alt="" class="p-a-hangout-img"></span> -->
                <div class="row p-1">
                    <div class="col-10 col-sm-10 looking-else">Looking for something else? </div>
                    <div class="col-2 col-sm-2"><img src="/new-design/assets/image/practice-area/hangout.png" alt="" class="hangout-img"></div>
                </div>
                <form action="">
                    @csrf()
                    <textarea name="" class="form-control p-a-textarea" id="" cols="3" rows="6" placeholder="Describe your legal issues here"></textarea>
                </form>
                <div class="row p-2">
                    <div class="col-4 col-md-4 d-flex justify-content-evenly bg-white">
                        <span class="advice-txt"><img src="/new-design/assets/image/practice-area/question.png" alt="" class="advice-btns"> Post a question</span>
                    </div>    
                    <div class="col-4 col-md-4 d-flex justify-content-evenly bg-white">
                        <span class="advice-txt"><img src="/new-design/assets/image/practice-area/chat.png" alt="" class="advice-btns"> Chat Online</span>
                    </div>    
                    <div class="col-4 col-md-4 d-flex justify-content-evenly bg-gray">
                        <span class="advice-txt"><img src="/new-design/assets/image/practice-area/hire.png" alt="" class="advice-btns"> Hire a Lawyer</span>
                    </div>    
                </div>            
            </div>
            <div class="col-12 col-md-6 col-xl-5 lawyers-section">
                <div class="row d-flex col-xl-11">
                    <div class="lawyers">
                        <img src="/new-design/assets/image/home/areyou-lawyer2.png" alt="" class="p-a-lawyer1">
                        <span class="p-a-l-name1">Arundati</span>
                        <small class="p-a-l-loc1">UAE, Abu Dhabi</small>
                    </div>
                    <div class="lawyers">
                        <img src="/new-design/assets/image/home/areyou-lawyer3.png" alt="" class="p-a-lawyer1">
                        <span class="p-a-l-name1">Rashid Ali</span>
                        <small class="p-a-l-loc1">UAE, Qatar</small>
                    </div>
                    <div class="lawyers lawyer-3">
                        <img src="/new-design/assets/image/home/areyou-lawyer3.png" alt="" class="p-a-lawyer1">
                        <span class="p-a-l-name1">Michelle</span>
                        <small class="p-a-l-loc1">UAE, Abu Dhabi</small>
                    </div>
                </div>
                <div class="row d-flex col-xl-12 single-lawyer mt-2 m-auto">   
                    <div class="col-xl-8 buy-quote-sec">
                        <span class="need-lawyer">Need a Lawyer?</span>
                        <p class="need-lawyer-descr">Hire lawyers online. Buy fixed-fee legal services or submit your request and get multiple competitive offers from qualified lawyers.</p>
                        <div class="row mt-3">
                            <span class="col-6 col-md-6"><img src="/new-design/assets/image/practice-area/buy.png" alt="" class="buy-img buy-quote"> <span class="">Buy Service</span></span>
                            <span class="col-6 col-md-6"><img src="/new-design/assets/image/practice-area/quote.png" alt="" class="quote-img buy-quote"> <span class="">Get Quote</span></span>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        var acc = document.getElementsByClassName("p-a-accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("p-a-active-box");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
                } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
                } 
            });
        }
    </script>
@endpush