@extends('common.home.layouts.app')
@section('content')
<main class="bg-color  bg-f4fefa">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="height-same">
                        <div class="single-box">
                            <p class="date-single">{{$forum->created_at->format('M d Y')}}</p>
                            <h5 class="content-single">{{$forum->title}}</h5>

                            <p class="txt-single">{{$forum->message}}
                            </p>
                            <p class="sngl-ans">{{$forumAnswers->count()}} Answers</p>

                        </div>
                        @foreach($forumAnswers as $k => $answer)
                            <div class="single-box2">
                                <div class="row align-items-center">
                                    <div class="col-sm-1 col-1">
                                        <img src="/storage/{{$answer->getProfilePic($answer->lawyer_id)}}" class="qus">
                                    </div>
                                    <div class="col-md-5 col-5">
                                        <h3 class="singl">{{$answer->lawyer->name}}</h3>
                                        <p class="snl">{{$answer->getPosition($answer->lawyer_id)}} <span class="tm">{{date('g:i A', strtotime($answer->created_at))}}</span></p>
                                    </div>
                                    <div class="col-md-5 col-5 text-end">
                                        <ul class="star-fa star-1">
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-regular fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="row pt-4">
                                    <p class="txt-sgl pb-3">{{$answer->answer}}</p>
                                    <div class="col-lg-4 col-4">
                                        <div class="d-none d-lg-block">
                                            @if(auth()->user())
                                                @if(auth()->user()->user_type == 3)
                                                    @if(!$answer->isRatedAlready($answer->id))
                                                        <button class="bookbtn color-bg-change" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$answer->id}}"><i
                                                            class="fa-regular fa-star dtsr"></i>Rate
                                                        Answers</button>
                                                    @else 
                                                        <button class="bookbtn color-bg-change"><i
                                                            class="fa-regular fa-star dtsr"></i>Rated Already</button>
                                                    @endif                                                    
                                                @endif
                                            @else 
                                                <button class="bookbtn color-bg-change" onclick="loginPage()"><i
                                                        class="fa-regular fa-star dtsr"></i>Rate
                                                    Answers</button>
                                            @endif
                                        </div>
                                        <i class="fa-regular fa-thumbs-up d-block d-lg-none"
                                            style="color:#156075;font-size: 25px;"></i>
                                        <i class="fa-regular fa-thumbs-down d-block d-lg-none"
                                            style="color:#AA0000;font-size: 25px;"></i>
                                    </div>
                                    <div class="col-lg-4 col-4">
                                        <div class="cntn-box">
                                            <button class="bookbtn" data-bs-toggle="modal" data-bs-target="#consult-lawyer-{{$answer->id}}">Consult the Lawyer</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-4">
                                        <div class="cntn-box-1">
                                            <button class="bookbtn bg-btn-change" onclick="lawyerServices('{{$answer->lawyer_id}}')">Hire the Lawyer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade modal-popups" id="staticBackdrop-{{$answer->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-dialog-centered" id="modal-login">
                                    <div class="modal-content"> 
                                        <div class="modal-header text-right"> 
                                            <button type="button" class="btn-close rounded" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-popup-des rounded" id="pills-tabContent">
                                                <form action="{{route('question-answer.rate', $answer->id)}}" method="post">
                                                    @csrf()
                                                    <h4 class="give-rating"><i class="fa-solid fa-thumbs-up"></i> Give Rating</h4>
                                                    <p class="font-fee mt-4 mb-4">Your Rating*</p>

                                                    <ul class="your-rating">
                                                        <li><i class="fa-solid fa-star rate" id="star_{{$answer->id}}_1" onclick="star(1, '{{$answer->id}}')"></i></li>
                                                        <li><i class="fa-solid fa-star rate" id="star_{{$answer->id}}_2" onclick="star(2, '{{$answer->id}}')"></i></li>
                                                        <li><i class="fa-solid fa-star rate" id="star_{{$answer->id}}_3" onclick="star(3, '{{$answer->id}}')"></i></li>
                                                        <li><i class="fa-regular fa-star rate" id="star_{{$answer->id}}_4" onclick="star(4, '{{$answer->id}}')"></i></li>
                                                        <li><i class="fa-regular fa-star rate" id="star_{{$answer->id}}_5" onclick="star(5, '{{$answer->id}}')"></i></li>
                                                        <li class="star_status"><p>Very Good</p></li>
                                                        <input type="hidden" name="rating" id="starRate_{{$answer->id}}" value="3">
                                                    </ul>

                                                    <div class="eles group-invite area"> 
                                                        <div class="links-icons">
                                                            <textarea placeholder="Comment" name="comment" class="description"></textarea> 
                                                        </div>
                                                    </div> 
                                                    <div class="text-right mb-3">
                                                        <button class="btn-lgn" type="submit">Share review</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade modal-popups" id="staticBackdrop-{{$answer->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-dialog-centered" id="modal-login">
                                    <div class="modal-content"> 
                                        <div class="modal-header text-right"> 
                                            <button type="button" class="btn-close rounded" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-popup-des rounded" id="pills-tabContent">
                                                <form action="{{route('question-answer.rate', $answer->id)}}" method="post">
                                                    @csrf()
                                                    <h4 class="give-rating"><i class="fa-solid fa-thumbs-up"></i> Give Rating</h4>
                                                    <p class="font-fee mt-4 mb-4">Your Rating*</p>

                                                    <ul class="your-rating">
                                                        <li><i class="fa-solid fa-star rate" id="star_{{$answer->id}}_1" onclick="star(1, '{{$answer->id}}')"></i></li>
                                                        <li><i class="fa-solid fa-star rate" id="star_{{$answer->id}}_2" onclick="star(2, '{{$answer->id}}')"></i></li>
                                                        <li><i class="fa-solid fa-star rate" id="star_{{$answer->id}}_3" onclick="star(3, '{{$answer->id}}')"></i></li>
                                                        <li><i class="fa-regular fa-star rate" id="star_{{$answer->id}}_4" onclick="star(4, '{{$answer->id}}')"></i></li>
                                                        <li><i class="fa-regular fa-star rate" id="star_{{$answer->id}}_5" onclick="star(5, '{{$answer->id}}')"></i></li>
                                                        <li class="star_status"><p>Very Good</p></li>
                                                        <input type="hidden" name="rating" id="starRate_{{$answer->id}}" value="3">
                                                    </ul>

                                                    <div class="eles group-invite area"> 
                                                        <div class="links-icons">
                                                            <textarea placeholder="Comment" name="comment" class="description"></textarea> 
                                                        </div>
                                                    </div> 
                                                    <div class="text-right mb-3">
                                                        <button class="btn-lgn" type="submit">Share review</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade modal-popups" id="consult-lawyer-{{$answer->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-dialog-centered modal-lg" id="modal-login">
                                    <div class="modal-content"> 
                                        <div class="modal-header text-right"> 
                                            <button type="button" class="btn-close rounded" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-popup-des rounded" id="pills-tabContent">
                                                <form action="{{route('consult.lawyer')}}" method="post" onsubmit="return validateConsultForm(event, '{{$answer->id}}')">
                                                    @csrf()
                                                    <input type="hidden" name="lawyerId" value="{{$answer->lawyer_id}}">
                                                    <h4 class="give-rating"> Contact Form</h4>                                                    
                                                    <div class="eles group-invite area"> 
                                                        <input type="text" name="name" id="name-{{$answer->id}}" placeholder="Name" class="mb-4" value="{{auth()->user() ? auth()->user()->name : ''}}">
                                                        @error('name')
                                                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                        @enderror   
                                                        <input type="email" name="email" id="email-{{$answer->id}}" placeholder="Email" class="mb-4" value="{{auth()->user() ? auth()->user()->email : ''}}">
                                                        @error('email')
                                                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                        @enderror   
                                                        <div class="input-group mb-3" id="mobile-div-{{$answer->id}}">
                                                            <span class="input-group-text" id="basic-addon1"> <img src="/new-design/assets/images/phone.png" alt=""> </span>
                                                            <input type="text" class="form-control left-bordr" name="mobile" id="mobile-{{$answer->id}}" placeholder="Phone Number" aria-label="Username"
                                                            aria-describedby="basic-addon1">
                                                        </div> 
                                                        @error('mobile')
                                                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                        @enderror   
                                                        <div class="links-icons">
                                                            <textarea placeholder="Message" name="message" id="msg-{{$answer->id}}" class="description"></textarea> 
                                                        </div>
                                                        @error('message')
                                                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                        @enderror   
                                                    </div> 
                                                    <div class="text-right mb-3">
                                                        <button class="btn-lgn" type="submit">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <!-- <div class="cnnt-3 border-0">
                            <div class="row">
                                <div class="col-sm-1 col-1">
                                    <img src="/new-design/assets/images/question-2.png" class="wer">
                                </div>
                                <div class="col-md-6 col-6">
                                    <h5 class="amir">Rhesh Amir Abdul</h5>
                                    <p class="lgl">Legal Consultant<span class="thm">12/Nov/22</span></p>
                                </div>
                                <div class="col-md-4 col-4">
                                    <ul class="star-fa star-1">
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-regular fa-star"></i></li>
                                        <li><i class="fa-regular fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="col-lg-4 calasschane" id="box-right-lowyar">
                    <div class="box-rew">
                        <div class="row">
                            <div class="d-flex border-bottom">
                                <div class="with-50">
                                    <div class="">
                                        <img src="/new-design/assets/images/question/Vector.png" alt="" class="img-responsive imf-smae">
                                    </div>
                                    <div>
                                        <h4>{{$forum->views}}</h4>
                                        <span>Views</span>
                                    </div>
                                </div>
                                <div class="with-50">
                                    <div class="">
                                        <img src="/new-design/assets/images/question/Vector (1).png" alt=""
                                            class="img-responsive imf-smae">
                                    </div>
                                    <div id="text-ten">
                                        <h4>{{$forumAnswers->count()}}</h4>
                                        <span>Answers</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h1 class="lo py-3">Our Lawyers</h1>
                        @foreach($randomLawyers as $k => $lawyer)
                            <div class="law-box prime">
                                <div class="row align-items-center">
                                    <div class="col-3 text-center m-p-0 over-n">
                                        <div class="img-class-same">
                                            
                                            <img src="/storage/{{$lawyer->profile_pic}}" alt="Group">
                                        </div>
                                        
                                    </div>
                                    <div class="col-7">
                                        <h5>{{$lawyer->user->name}}</h5>
                                        <div class="row align-items-center">
                                            <div class="col-6 p-0">
                                                <ul class="star-part-2">
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                </ul>
                                            </div>
                                            <div class="col-6 p-0">
                                                <span class="rev-35">(35 Reviews)</span>
                                            </div>
                                        </div>
                                        <p class="mt-2"><i class="fa-solid fa-location-dot"></i> {{$lawyer->emirates}}</p>

                                    </div>
                                    <div class="col-2 text-right ">
                                        <i class="fa-solid fa-eye eye-pri green"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <h5 class="viwe_all">View All Lawyers</h5>
                    </div>
                </div>
            </div>



            <h3 class="related">RELATED SERVICES</h3>
            <div class="row g-4">
                @foreach($randomServices as $k => $service)
                    <div class="col-md-6" id="hover">
                        <div class="question-text bg-two">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="category">{{$service->arbitration->area}}</div>
                                </div>
                            </div>
                            <h3>{{$service->title}}</h3>
                            <p>{{ $service->short_descr }}</p>
                            <div class="row align-items-center">
                                <div class="col-md-6 col-6">
                                    <h1 class="aed-class">AED {{$service->getLawyerFee($service->id) + $service->getPlatformFee($service->id)}}</h1>
                                </div>
                                <div class="col-md-6 col-6 text-end">
                                    <a href="{{route('service.step-one', $service->id)}}" class="seebtn  bg-change">see more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>






            @include('common.page-footer')
    </main>
@endsection

@push('script')
<script>
    // $(document).ready(function() {
    //     $('#rateMe2').mdbRate();
    // });

    function loginPage() {
        window.location.href = "/login";
    }

    function lawyerServices(lawyerId) {
        window.location.href = "/lawyer-services/"+lawyerId;
    }

    function star(rating, answerId) {
        $("#starRate_"+answerId).val(rating);
        $(".star_status").empty()
        if(rating == 1) {
            debugger
            $(".star_status").append("<p>Very Bad</p>")
        }else if(rating == 2) {            
            $(".star_status").append("<p>Bad</p>")
        }else if(rating == 3) {            
            $(".star_status").append("<p>Good</p>")
        }else if(rating == 4) {            
            $(".star_status").append("<p>Very Good</p>")
        }else if(rating == 5) {            
            $(".star_status").append("<p>Excellent</p>")
        }
        $(".rate").removeClass('fa-solid fa-star').addClass('fa-regular fa-star');
        for (var i = 1; i <= rating; i++) {
            $("#star_"+answerId+'_'+i).removeClass('fa-regular fa-star').addClass('fa-solid fa-star');
        }
    }

    function validateConsultForm(e, id) {
        var valid = true;
        $(".errors").empty()
        var name = $("#name-"+id).val()
        var email = $("#email-"+id).val()
        var mobile = $("#mobile-"+id).val()
        var msg = $("#msg-"+id).val()

        if(!name) {
            valid = false;
            $("#name-"+id).after('<span class="errors" style="color:red;">This field is required</span>')
        }
        if(!email) {
            valid = false;
            $("#email-"+id).after('<span class="errors" style="color:red;">This field is required</span>')
        }
        if(!mobile) {
            valid = false;
            $("#mobile-div-"+id).after('<span class="errors" style="color:red;">This field is required</span>')
        }
        if(!msg) {
            valid = false;
            $("#msg-"+id).after('<span class="errors" style="color:red;">This field is required</span>')
        }

        if(!valid) {
            e.preventDefault()
        }
    }
</script>
@endpush