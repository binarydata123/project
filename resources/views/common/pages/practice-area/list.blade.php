@extends('common.home.layouts.app')
@section('content')

<div class="fix-height"></div>
<section class="practice-area">
    <div class="container" style="margin-bottom: 10%;">
        <div class="row">
            <div class="col-12 p-a-header">
                <span>Browse by specialist</span>
            </div>            
            <div class="row col-6 p-a-col-6">
                <div class="col-md-3 p-a-cards">
                    <img src="/new-design/assets/image/practice-area/card1.png" alt="" class="p-a-card-img">
                    <span class="p-a-card-name">Family Law</span>
                    <button class="p-a-card-btn">See More ></button>
                </div>
                <div class="col-md-3 p-a-cards">
                    <img src="/new-design/assets/image/practice-area/card2.png" alt="" class="p-a-card-img">
                    <span class="p-a-card-name">Financial Law</span>
                    <button class="p-a-card-btn">See More ></button>
                </div>
                <div class="col-md-3 p-a-cards">
                    <img src="/new-design/assets/image/practice-area/card5.png" alt="" class="p-a-card-img">
                    <span class="p-a-card-name">Drug Offences</span>
                    <button class="p-a-card-btn">See More ></button>
                </div>
                <div class="col-md-3 p-a-cards">
                    <img src="/new-design/assets/image/practice-area/card6.png" alt="" class="p-a-card-img">
                    <span class="p-a-card-name">Islamic Finance</span>
                    <button class="p-a-card-btn">See More ></button>
                </div>
            </div>
            <div class="row col-6 p-a-second-card p-a-col-6">
                <div class="col-md-3 p-a-cards">
                    <img src="/new-design/assets/image/practice-area/card3.png" alt="" class="p-a-card-img">
                    <span class="p-a-card-name">General Civil Law</span>
                    <button class="p-a-card-btn">See More ></button>
                </div>
                <div class="col-md-3 p-a-cards">
                    <img src="/new-design/assets/image/practice-area/card4.png" alt="" class="p-a-card-img">
                    <span class="p-a-card-name">Civil Litigation</span>
                    <button class="p-a-card-btn">See More ></button>
                </div>
                <div class="col-md-3 p-a-cards">
                    <img src="/new-design/assets/image/practice-area/card7.png" alt="" class="p-a-card-img">
                    <span class="p-a-card-name">Labor and Employment Law</span>
                    <button class="p-a-card-btn">See More ></button>
                </div>
                <div class="col-md-3 p-a-cards">
                    <img src="/new-design/assets/image/practice-area/card8.png" alt="" class="p-a-card-img">
                    <span class="p-a-card-name">Construction Law</span>
                    <button class="p-a-card-btn">See More ></button>
                </div>
            </div>
        </div>
        <div class="row p-a-second-row">
            <div class="col-6 p-a-man-col-6">
                <img src="/new-design/assets/image/practice-area/practice-area-man.jpeg" alt="" class="p-a-man img-fluid">
            </div>
            <div class="col-6 p-a-third-row">
                <span class="p-a-faq-text">FAQ'S</span>
                <span class="p-a-frequent-text">Frquently <span class="p-a-a-q">Asked</span><br><span class="p-a-a-q">Questions</span></span>
                <div class="p-a-w-coll-sec">
                    <button class="p-a-accordion">How can I get assistance with the criminal procedure code?</button>
                    <div class="p-a-panel">
                        <p>Our team of lawyers have experience with criminal law and crimes act, thus they can understand your unique requirements.</p>
                    </div>

                    <button class="p-a-accordion">How can I find a lawyer with experience in family law?</button>
                    <div class="p-a-panel">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>

                    <button class="p-a-accordion">Boosts your immune systems functionlity</button>
                    <div class="p-a-panel">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-a-fourth-row">
            <div class="col-12">
                <span class="p-a-testimonials-header">Testimonials</span>
            </div>
            <div class="row slick">
                <div class="p-a-testimonials" onclick="openTestimonialModal('Testimonails fghf gfh fgh ghh')">
                    {{-- set char limit 157 --}}
                    <p class="p-a-t-text">"We quickly had to get legal counsel, and luckily for us, we found the Connect Legal platform. The rapport and guidance was outstanding at all times, prompt”.
                    <img src="/new-design/assets/image/our_lawyers/dummy_dp.png" alt="" class="p-a-user-prof">
                    <span class="p-a-user-name">Rahman Abdul</span>
                    <span class="p-a-user-title">CEO</span>
                    <small class="p-a-testimonial-time">Since 2 months</small>
                    </p>                    
                </div>
                <div class="p-a-testimonials"></div>
                <div class="p-a-testimonials"></div>
                <div class="p-a-testimonials"></div>
                <div class="p-a-testimonials"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
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

        function openTestimonialModal(text) {            
            document.getElementById('exampleModalLabel').innerHTML = text
            $("#exampleModal").modal("toggle");
        }
    </script>
@endpush