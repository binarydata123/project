@extends('common.home.layouts.app')
@section('content')
        <main>
            <div class="open-width">
                <section class="bg-1 bg-71b2c382 m-sp-same py-3 p-80" id="cover-padding">
                <div class="container">
                    <div class="row potion">
                        <div class="col-md-6">
                            <h1 class="txt-bl">THE BLOG</h1>
                            <p class="txt-bl-2">Make an appointment with Advocates and Legal consultancy, Today!
                                or chat
                                with a lawyer online for free in Dubai and across UAE now.</p>
                        </div>
                        <div class="col-md-6 text-end">
                            <img src="/new-design/assets/images/boxthere.png" class="icn">
                        </div>
                    </div>

                    <div class="row py-lg-5" id="tab-sp ">
                        @foreach($blogs as $k => $blog)
                            @if($k == 0)
                                <div class="col-md-6" onclick="blogDetail('{{$blog->id}}')" style="cursor:pointer;">
                                    <img src="{{$blog->image}}" class="rctngl"><br>
                                    <small class="mt-3">{{date('d/M/Y', strtotime($blog->created_at))}}</small>
                                    <h2 class="lorm-blg">{!! $blog->title !!}
                                    </h2>
                                    <p class="img-appoin sb-b">{!! Illuminate\Support\Str::limit($blog->description, 100) !!}</p>
                                </div>
                            @endif
                        @endforeach
                        <div class="col-md-6">
                            <div class="row">
                                @foreach($blogs as $k => $blog)
                                    @if($k > 0)
                                        <div class="col-md-6 col-6" onclick="blogDetail('{{$blog->id}}')" style="cursor:pointer;">
                                            <img src="{{$blog->image}}" class="rctnagl-136">
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <small>{{date('d/M/Y', strtotime($blog->created_at))}}</small>
                                            <p class="col-txt">{!! $blog->title !!}</p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="m-sp-same p-80">
                <div class="container">
                    <div class="dt-tm">
                        <div class="col-md-6">
                            <div class="dt-txt">
                                <h1 class="txt-rlt">RELATED ARTICLES</h1>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="btn-group drop">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Relevant <i class="fa-solid fa-sort"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Name </a></li>
                                    <li><a class="dropdown-item" href="#">Name 2</a></li>
                                </ul>
                            </div>
                            <div class="btn-group drop">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
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
                                <div class="img-class">
                                    <img src="{{$blog->image}}" class="pic">
                                    <p class="date">{{date('d/M/Y', strtotime($blog->created_at))}}</p>
                                    <p class="sec-txt">{!! $blog->title !!}
                                    </p>
                                    <p class="sec-txt-2">{!! Illuminate\Support\Str::limit($blog->description, 100) !!}</p>
                                </div>
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