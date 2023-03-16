@extends('common.home.layouts.app')
@section('content')
<main class="bg-color" id="bg-back">
        <div class="container py-5">
            <div class="row" id="blog-catagary">
                <div class="col-md-6 col-6">
                    <h4><a href="{{route('blogs-articles', 1)}}" style="color:#156075">/ BLOG /</a> CATEGORY</h4>
                </div>
                <div class="col-md-6 col-6 text-end">
                    <h4>{{date('d/M/Y', strtotime($blog->created_at));}}</h4>
                </div>
            </div>
            <div class="banner">
                <img src="{{$blog->image}}" class="b-bnr">
            </div>
            <div class="row">
                <div class="col-1 d-none d-lg-block">
                    <div class="line-con">
                        <p class="sh">Share</p>
                       <li><i class="fa-brands fa-twitter"></i></li>
                       <li><i class="fa-brands fa-facebook-f"></i></li>
                      <li><i class="fa-brands fa-linkedin-in"></i></li>
                       <li><i class="fa-brands fa-instagram"></i></li>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="lorm">
                        <h1 class="lrm mt-4">{!! $blog->title !!}
                        </h1>
                        {!! $blog->full_descr !!}
                    </div>                    
                </div>
            </div>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="line-con d-block d-lg-none">
                               <li><i class="fa-brands fa-twitter"></i></li>
                               <li><i class="fa-brands fa-facebook-f"></i></li>
                              <li><i class="fa-brands fa-linkedin-in"></i></li>
                               <li><i class="fa-brands fa-instagram"></i></li>
                               <li class="sh">Share</li>
                            </div>
                        </div>
                    </div>
                    <div class="dt-tm">
                        <div class="col-md-6">
                          <div class="dt-txt">
                            <h5 class="rtd">RELATED ARTICLES</h5>
                        </div>
                        </div>
                            <div class="col-md-6 text-md-end">
                              <div class="btn-group drop">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> 
                                  Relevant <i class="fa-solid fa-sort"></i>
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="#">Name </a></li> 
                                  <li><a class="dropdown-item" href="#">Name 2</a></li> 
                                </ul>
                              </div>
                              <div class="btn-group drop">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> 
                                 Date <i class="fa-solid fa-sort"></i>
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="#">Name </a></li> 
                                  <li><a class="dropdown-item" href="#">Name 2</a></li> 
                                </ul>
                              </div>
                            </div>
                        </div>

                    <div class="row">
                        @foreach($randomBlogs as $k => $blog)
                            <div class="col-md-3 col-6" onclick="blogDetail('{{$blog->id}}')" style="cursor:pointer;">
                                <img src="{{$blog->image}}" class="img-rltd">
                                <p class="dt">{{date('d/M/Y', strtotime($blog->created_at))}}</p>
                                <h1 class="h-rltd">{!! $blog->title !!}
                                </h1>
                                <p class="plt">{!! Illuminate\Support\Str::limit($blog->description, 100) !!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
    </main>

@endsection

@push('script')
    <script>
        function blogDetail(blogId) {
            window.location.href = "/blogs-articles-details/"+blogId;
        }
    </script>
@endpush