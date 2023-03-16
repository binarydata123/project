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
                        <li>Legal Articles</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
   
    <section class="bg-light-gray pt-0 padding-eight-lr lg-no-padding-lr">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 mt-5">
                        <select name="category" 
                                id="category" 
                                class="medium-input border-radius-5px margin-25px-bottom" 
                                style="border-color: black;" 
                                onchange="filterByCategory(this)">
                            <option value="">Filter By Category</option>
                            @foreach($categories as $k => $category)
                                <option value="{{$k}}">{{$category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 blog-content" id="cat-filter">
                        <ul class="blog-overlay-image blog-wrapper grid grid-loading grid-4col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large">
                            <li class="grid-sizer"></li>
                            @foreach($articleList as $k => $article)
                                <li class="grid-item wow animate__fadeIn" data-wow-delay="0.6s">
                                    <div class="blog-post bg-white box-shadow-medium border-radius-5px padding-3-half-rem-all xl-padding-2-half-rem-all">
                                        <div class="blog-post-image">
                                            <div class="cover-background h-100 w-100" style="background-image: url(/storage/{{$article->image}})"></div>
                                            <div class="blog-overlay-image bg-transparent-gradiant-black"></div>
                                        </div>
                                        <div class="post-details">
                                            <a  class="blog-category alt-font border-color-medium-gray margin-6-half-rem-bottom">{{$article->category->category}}</a>
                                            <a  class="post-date alt-font font-weight-500 text-small text-uppercase d-block" title="">{{$article->created_at->format('d M Y')}}</a>
                                            <a href="{{route('legal.article-details', $article->id)}}" class="post-title alt-font text-large font-weight-600 text-dark-slate-blue text-uppercase d-block margin-15px-bottom w-95 sm-w-100">{{$article->title}}</a>
                                            <a  class="post-read alt-font font-weight-500 text-extra-small text-uppercase text-black border-bottom border-gradient-sky-blue-pink d-inline-block">By: {{$article->addedBy->name}}</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        {{$articleList->links()}}
                    </div>
                </div>
            </div>
        </section>

@endsection
@section('script')
    <script>
        function filterByCategory(data) {
            var category = $("#category").val();
            $.ajax({
                method:"get",
                url: "/filter-by-category",
                data: {
                    'category': category
                },
                success: function(res){
                    $("#cat-filter").empty();
                    $("#cat-filter").append(res);
                }
            });
        }
    </script>
@endsection