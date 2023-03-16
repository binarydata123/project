@extends('common.layouts.app')
@section('content')
    <section class="half-section bg-light-gray parallax" data-parallax-background-ratio="0.5" style="background-image:url('images/portfolio-bg2.jpg');">
        <div class="container">
            <div class="row align-items-stretch justify-content-center extra-small-screen">
                <div class="col-12 col-xl-6 col-lg-7 col-md-8 page-title-extra-small text-center d-flex justify-content-center flex-column">
                    <!-- <h1 class="alt-font text-gradient-sky-blue-pink margin-15px-bottom d-inline-block">Blogs & Articles</h1> -->
                    <h2 class="text-extra-dark-gray alt-font font-weight-500 letter-spacing-minus-1px line-height-50 sm-line-height-45 xs-line-height-30 no-margin-bottom">Blogs & Articles</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
    <!-- start section --> 
    <section class="bg-light-gray pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-9 col-md-12 col-xl-10 blog-content">
                    <div class="blog-list blog-side-image">
                        @foreach($response as $k => $v)
                            <!-- start blog item --> 
                            <div class="blog-post bg-white box-shadow-medium margin-30px-bottom wow animate__fadeIn">
                                <div class="d-flex flex-column flex-md-row align-items-center">
                                    <div class="blog-post-image sm-margin-25px-bottom">
                                        <a href="{{route('blogs-article-details', $v->id)}}" title=""><img src="{{$v->yoast_head_json->og_image[0]->url}}" alt="" /></a>
                                    </div>
                                    <div class="post-details padding-4-half-rem-lr md-padding-2-half-rem-lr sm-no-padding">
                                        <a class="alt-font text-small text-fast-blue font-weight-500 text-uppercase d-inline-block margin-15px-bottom sm-margin-10px-bottom">{{date('M d Y', strtotime($v->date));}}</a>
                                        <a href="{{route('blogs-article-details', $v->id)}}" class="alt-font font-weight-500 text-extra-large text-extra-dark-gray d-block margin-20px-bottom sm-margin-10px-bottom">{!! $v->title->rendered !!}</a>
                                        <p class="margin-seventeen-bottom sm-margin-25px-bottom">{!! Illuminate\Support\Str::limit($v->excerpt->rendered, 100) !!}</p>
                                        <div class="alt-font text-extra-small text-uppercase d-flex align-items-center sm-margin-10px-bottom">
                                            <img class="avtar-image" src="https://via.placeholder.com/149x149" alt="">
                                            <span>
                                                @php $writtenBy = "Written by"; @endphp
                                                <span class="d-inline-block">By <a class="text-extra-dark-gray">{{$v->yoast_head_json->twitter_misc->$writtenBy}}</a></span>
                                                <span class="separator bg-medium-gray"></span>
                                                <!-- <span class="d-inline-block">In <a href="blog-masonry.html" class="text-extra-dark-gray">Creative</a></span> -->
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end blog item -->
                        @endforeach                        
                    </div>
                    <!-- start pagination -->
                    <div class="col-12 d-flex justify-content-center margin-7-half-rem-top sm-margin-5-half-rem-top wow animate__fadeIn">
                        <ul class="pagination pagination-style-01 text-small font-weight-500 align-items-center">
                            @php $pageTmp = $page; @endphp
                            @if($page > 1)
                                <li class="page-item"><a class="page-link" href="{{route('blogs-articles', --$pageTmp)}}"><i class="feather icon-feather-arrow-left icon-extra-small d-xs-none"></i></a></li>
                            @else 
                                <li class="page-item"><a class="page-link"><i class="feather icon-feather-arrow-left icon-extra-small d-xs-none"></i></a></li>
                            @endif
                            @foreach($pagesNo as $k => $v)
                                <li class="page-item {{$page == $v ? 'active' : ''}}"><a class="page-link" href="{{route('blogs-articles', $v)}}">{{$v}}</a></li>
                            @endforeach
                            @php $pageTmp2 = $page; @endphp
                            @if($page < count($pagesNo))
                                <li class="page-item"><a class="page-link" href="{{route('blogs-articles', ++$pageTmp2)}}"><i class="feather icon-feather-arrow-right icon-extra-small  d-xs-none"></i></a></li>
                            @else 
                                <li class="page-item"><a class="page-link"><i class="feather icon-feather-arrow-right icon-extra-small  d-xs-none"></i></a></li>
                            @endif
                        </ul>
                    </div>
                    <!-- end pagination -->
                </div>
            </div>
        </div>
    </section>
@endsection
        <!-- end section -->  