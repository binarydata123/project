@extends('common.layouts.app')
@section('content')
    <!-- start page title -->
    <section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small for-lawyers-breadcrumb">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-start">Legal Articles</h1>
                </div>
                <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <ul class="xs-text-center">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{route('legal.article-list')}}">Legal Articles</a></li>
                        <li>Legal Article Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
   
    <section class="big-section cover-background overlap-height padding-70px-bottom" style="background-image: url('images/blog-post-layout-03-img-01.jpg');background-color: white;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-6 col-lg-7 col-sm-8 overlap-gap-section text-center">
                    <div class="d-inline-block text-center text-uppercase margin-25px-bottom text-yellow-ochre-light">
                        <a class="alt-font d-inline-block align-middle text-yellow-ochre-light text-extra-dark-gray-hover">{{$article->category->category}}</a>
                            <span class="text-extra-large d-inline-block align-middle">&nbsp;&nbsp;&#8226;&nbsp;&nbsp;</span>
                        <a  class="alt-font d-inline-block align-middle text-yellow-ochre-light text-extra-dark-gray-hover">{{$article->created_at->format('d M Y')}}</a>
                    </div>
                    <h4 class="alt-font text-extra-dark-gray font-weight-500 letter-spacing-minus-1px margin-35px-bottom">{{$article->title}}</h4>
                    <div class="d-flex justify-content-center align-items-center alt-font text-uppercase">
                        <img class="rounded-circle w-35px margin-15px-right" style="height: 35px;" src="/storage/{{$article->getProfilePic($article->added_by)}}" alt=""/>
                        <span>By <a href="blog-grid.html" class="text-yellow-ochre-light-hover">{{$article->addedBy->name}}</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-right-side-bar" style="background-color: white;padding:0px 0;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8 right-sidebar md-margin-60px-bottom">
                        <div class="row">
                            <div class="col-12 blog-details-text last-paragraph-no-margin margin-6-rem-bottom">
                                <img src="/storage/{{$article->image}}" alt="" class="w-100 border-radius-6px">                            
                            </div>                         
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <section style="background-color: white;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 last-paragraph-no-margin margin-6-rem-bottom wow animate__fadeIn" data-wow-delay="0.2s">
                    <p class="margin-10px-bottom"><span class="first-letter-big text-yellow-ochre-light me-4"></span>{!! $article->descr !!}</p>
                </div>
            </div>
        </div>
    </section>

@endsection