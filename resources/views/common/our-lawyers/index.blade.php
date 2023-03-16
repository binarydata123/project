@extends('common.layouts.app')
@section('content')
    <!-- start page title -->
    <section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small for-lawyers-breadcrumb">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-start">Our Lawyers</h1>
                </div>
                <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <ul class="xs-text-center">
                        <li><a href="/">Home</a></li>
                        <li>Our Lawyers</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light-gray pt-5 padding-eleven-lr xl-padding-two-lr lg-no-padding-lr">
        <div class="container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <input type="search" name="" id="search" placeholder="Search laweyer name" class="form-control" onkeyup="searchByName()">
                    </div>
                    <div class="col-md-6">
                        <select name="" id="arbitration-area" class="form-control" onchange="filterByArea(this)">
                            <option value="">Filter by area</option>
                            @foreach($arbitrationAreas as $k => $area)
                                <option value="{{$k}}">{{$area}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-12 col-md-8 col-sm-10 blog-content sm-no-padding-lr" id="lawyer-list">
                        <ul class="blog-widget blog-wrapper grid grid-loading grid-3col xl-grid-3col lg-grid-2col md-grid-1col sm-grid-1col xs-grid-1col gutter-double-extra-large">
                            <li class="grid-sizer"></li>
                            @foreach($lawyers as $k => $lawyer)
                                <li class="grid-item wow animate__fadeIn">
                                    <div class="d-flex box-shadow-medium bg-white padding-30px-all xs-padding-15px-all border-radius-4px">
                                        <figure class="flex-shrink-0" style="width:140px;height:140px;">
                                            <a href="{{route('our-lawyer.details', $lawyer->id)}}">
                                                <img src="/storage/{{$lawyer->profile_pic}}" alt="" style="width:140px;height:140px;">
                                            </a>
                                        </figure>
                                        <div class="media-body flex-grow-1">
                                            <a href="blog-masonry.html" class="text-extra-small alt-font d-block margin-5px-bottom">{{$lawyer->emirates}}</a>
                                            <a href="blog-post-layout-01.html" class="alt-font font-weight-500 text-extra-dark-gray margin-5px-bottom d-block line-height-22px">{{$lawyer->user->name}}</a>
                                            <span class="text-extra-small alt-font"><a href="blog-masonry.html">{{$lawyer->arbitration->area}}</a></span>    
                                            <br>                                        
                                            <span class="text-extra-small alt-font"><a href="{{route('our-lawyer.details', $lawyer->id)}}" type="button" class="btn btn-primary" style="margin-top:38%;">View</a></span>                                            
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        {{ $lawyers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    <script>
        
        function searchByName() {
            var name = $("#search").val();
            var area = $("#arbitration-area").val();
            $.ajax({
                method:"get",
                url: "/filter-by-lawyer-name",
                data: {
                    'name': name,
                    'area': area,
                },
                success: function(res){
                    $("#lawyer-list").empty();
                    $("#lawyer-list").append(res);
                }
            });
        }

        function filterByArea(data) {
            var name = $("#search").val();
            var area = $("#arbitration-area").val();
            $.ajax({
                method:"get",
                url: "/filter-by-area",
                data: {
                    'name': name,
                    'area': area,
                },
                success: function(res){
                    $("#lawyer-list").empty();
                    $("#lawyer-list").append(res);
                }
            });
        }
    </script>
@endsection