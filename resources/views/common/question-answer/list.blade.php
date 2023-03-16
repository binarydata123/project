@extends('common.layouts.app')
@section('content')
   <!-- start page title -->
    <section class="half-section parallax" data-parallax-background-ratio="0.5" style="background-image:url('images/portfolio-bg.jpg');">
        <div class="container">
            <div class="row align-items-stretch justify-content-center extra-small-screen">
                <div class="col-12 col-xl-6 col-lg-7 col-md-8 page-title-extra-small text-center d-flex justify-content-center flex-column">
                    <h2 class="text-extra-dark-gray alt-font font-weight-500 letter-spacing-minus-1px line-height-50 sm-line-height-25 xs-line-height-20 no-margin-bottom">Question & Answers</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
    <!-- start section --> 
    <section class="blog-right-side-bar pt-0" style="background-color: white;">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach($forums as $k => $forum)
                        <div class="col-12 col-lg-6 right-sidebar md-margin-60px-bottom sm-margin-40px-bottom">
                            <!-- start blog item --> 
                            <div class="col-12 blog-post-content border-all border-color-medium-gray border-radius-6px overflow-hidden text-center p-0 margin-4-half-rem-bottom wow animate__fadeIn">
                                <div class="blog-text d-inline-block w-100 p-3">
                                    <div class="content padding-5-half-rem-all lg-padding-4-half-rem-all xs-padding-20px-lr xs-padding-40px-tb position-relative mx-auto w-90 lg-w-100">
                                        <div class="blog-details-overlap text-small font-weight-500 bg-fast-blue border-radius-4px alt-font text-white text-uppercase"><a href="blog-masonry.html" class="text-white">{{$forum->created_at->format('d M Y')}}</a></div>
                                        <h6 class="alt-font font-weight-500"><a href="blog-post-layout-01.html" class="text-extra-dark-gray text-fast-blue-hover">{{$forum->title}}</a></h6>
                                        <p>{{Str::limit($forum->message, 150)}}</p>
                                        <a href="{{route('question-answer.view', $forum->slug)}}" class="btn btn-small btn-transparent-dark-gray btn-round-edge btn-slide-up-bg margin-10px-top">View<span class="bg-extra-dark-gray"></span></a>
                                    </div>
                                    <!-- <div class="row row-cols-1 author border-top border-color-extra-medium-gray text-medium-gray text-very-small text-uppercase alt-font m-0">
                                        <div class="col col-sm blog-hover-btn padding-20px-tb border-right border-color-extra-medium-gray xs-no-border-right xs-border-bottom">
                                            <a href="blog-masonry.html"><i class="far fa-user blog-icon"></i><i class="far fa-user blog-icon blog-icon-hover text-sky-blue"></i>By shane doe</a>
                                        </div>
                                        <div class="col col-sm blog-hover-btn padding-20px-tb border-right border-color-extra-medium-gray xs-no-border-right xs-border-bottom">
                                            <a href="blog-post-layout-01.html"><i class="far fa-heart blog-icon"></i><i class="far fa-heart blog-icon blog-icon-hover text-sky-blue"></i>05 Like post</a>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <!-- end blog item -->
                        </div>
                    @endforeach
                    {{ $forums->links() }}
                </div>
            </div>
        </section>
        <!-- end section -->  

@endsection