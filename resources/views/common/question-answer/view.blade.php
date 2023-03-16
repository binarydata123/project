@extends('common.layouts.app')
@section('content')
    <section class="blog-right-side-bar" style="background-color: white;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 right-sidebar md-margin-60px-bottom sm-margin-40px-bottom">
                    <div class="row">
                        <div class="col-12 blog-details-text last-paragraph-no-margin margin-6-rem-bottom">
                            <ul class="list-unstyled margin-2-rem-bottom">
                                <li class="d-inline-block align-middle margin-25px-right"><i class="feather icon-feather-calendar text-fast-blue margin-10px-right"></i><a href="blog-grid.html">{{$forum->created_at->format('d M Y')}}</a></li>
                                <li class="d-inline-block align-middle"><i class="feather icon-feather-user text-fast-blue margin-10px-right"></i>By <a href="blog-grid.html">{{$forum->email}}</a></li>
                            </ul>
                            <h5 class="alt-font font-weight-500 text-extra-dark-gray margin-4-half-rem-bottom">{{$forum->title}}</h5>
                            <blockquote class="alt-font border-width-4px border-color-fast-blue margin-60px-left pe-0 margin-5-half-rem-tb md-margin-40px-left sm-no-margin-left wow animate__fadeIn">
                                <p>{{$forum->message}}</p>
                            </blockquote>
                        </div>                                                 
                    </div>
                </div>               
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 text-center margin-5-rem-bottom wow animate__fadeIn">
                    <h6 class="alt-font text-extra-dark-gray font-weight-500">Answers: {{$forumAnswers->count()}}</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-9 mx-auto wow animate__fadeIn">
                    <ul class="blog-comment">
                        @foreach($forumAnswers as $k => $answer)
                            <li style="padding-bottom:1px;">
                                <div class="d-block d-md-flex w-100 align-items-center align-items-md-start ">
                                    <div class="w-75px sm-w-50px sm-margin-10px-bottom">
                                        <img src="/storage/{{$answer->getProfilePic($answer->lawyer_id)}}" class="rounded-circle w-95 sm-w-100" style="height:70px;" alt=""/>
                                    </div>
                                    <div class="w-100 padding-25px-left last-paragraph-no-margin sm-no-padding-left">
                                        <a href="#" class="text-extra-dark-gray text-fast-blue-hover alt-font font-weight-500 text-medium">{{$answer->lawyer->name}}</a>
                                        <!-- <a href="#comments" class="btn-reply text-medium-gray text-uppercase section-link">Reply</a> -->
                                        <div class="text-medium text-medium-gray margin-15px-bottom">{{$answer->created_at->format('d M Y')}}, {{date('g:i A', strtotime($answer->created_at))}}</div>
                                        <p class="w-85">{{$answer->answer}}</p>
                                        <a href="{{route('lawyer.services.list', $answer->lawyer_id)}}" class="btn btn-info" style="float:right;margin-left:2%;">Legal Service</a>
                                        @if(auth()->user())
                                        @if(auth()->user()->user_type == 3 && !$answer->isRatedAlready($answer->id))
                                        <button class="btn btn-primary" style="float:right;" data-bs-toggle="modal" data-bs-target="#rateModal_{{$answer->id}}">Rate</button>
                                        @endif
                                        @else 
                                        <a href="#login-form" type="button" class="btn btn-primary popup-with-form" style="float:right;">Rate</a>  
                                        @endif
                                        @if(auth()->user() && auth()->user()->user_type == 3 && $answer->isRatedAlready($answer->id))
                                            <br>
                                            <span><b><u>Your Rating: </u></b></span>
                                            <span class="text-orange text-extra-small d-block" style="text-align: end;">
                                                <i class="{{$answer->getRating($answer->id) >= 1 ? 'fas fa-star' : 'far fa-star'}}"></i>
                                                <i class="{{$answer->getRating($answer->id) >= 2 ? 'fas fa-star' : 'far fa-star'}}"></i>
                                                <i class="{{$answer->getRating($answer->id) >= 3 ? 'fas fa-star' : 'far fa-star'}}"></i>
                                                <i class="{{$answer->getRating($answer->id) >= 4 ? 'fas fa-star' : 'far fa-star'}}"></i>
                                                <i class="{{$answer->getRating($answer->id) >= 5 ? 'fas fa-star' : 'far fa-star'}}"></i>
                                            </span>
                                            <p style="text-align: end;">{{$answer->getComment($answer->id)}}</p>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <div class="modal fade mobile-full-width" id="rateModal_{{$answer->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-custom-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Give rating</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="background-color: #0389ca;color:white;border-color:#0389ca;">
                                                <span aria-hidden="true">X</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="weather-search section-t-space">
                                                <form action="{{route('question-answer.rate', $answer->id)}}" method="post">
                                                    @csrf()
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 margin-30px-bottom">
                                                            <label class="margin-15px-bottom">Your rating <span class="text-radical-red">*</span></label>                                    
                                                            <span class="text-orange text-extra-small d-block">
                                                                <i class="far fa-star rate" id="star_{{$answer->id}}_1" onclick="star(1, '{{$answer->id}}')"></i>
                                                                <i class="far fa-star rate" id="star_{{$answer->id}}_2" onclick="star(2, '{{$answer->id}}')"></i>
                                                                <i class="far fa-star rate" id="star_{{$answer->id}}_3" onclick="star(3, '{{$answer->id}}')"></i>
                                                                <i class="far fa-star rate" id="star_{{$answer->id}}_4" onclick="star(4, '{{$answer->id}}')"></i>
                                                                <i class="far fa-star rate" id="star_{{$answer->id}}_5" onclick="star(5, '{{$answer->id}}')"></i>
                                                                <input type="hidden" name="rating" id="starRate_{{$answer->id}}" value="0">
                                                            </span>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="margin-15px-bottom">Your comment</div>
                                                            <textarea class="medium-textarea border-radius-4px bg-white h-120px margin-2-half-rem-bottom" rows="6" name="comment" placeholder="Enter your comment"></textarea>
                                                        </div>
                                                        <div class="col-12 sm-margin-20px-bottom">
                                                            <button type="submit" class="btn btn-medium btn-dark-gray mb-0 btn-round-edge-small">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- <div class="modal-footer">
                                            <button type="button" class="btn btn-solid">save changes</button>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach                        
                    </ul> 
                </div>
            </div>
        </div>
        @include('login_modal')
    </section>
@endsection
@section('script')
    <script>
        function star(rating, answerId) {
            $("#starRate_"+answerId).val(rating);
            $(".rate").removeClass('fas fa-star').addClass('far fa-star');
            for (var i = 1; i <= rating; i++) {
                $("#star_"+answerId+'_'+i).removeClass('far fa-star').addClass('fas fa-star');
            }
        }
    </script>
@endsection