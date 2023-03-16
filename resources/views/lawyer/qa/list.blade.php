@extends('lawyer.home.layouts.app')
@section('content')
    <div class="container p-5">
    <div class="row mb-5">
        @foreach($forums as $k => $forum)
            <div class="col-md-6 col-lg-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">{{$forum->title}}</h5>
                        <!-- <p>{{substr($forum->message, 0, 20)}}...</p> -->
                        <a href="{{route('lawyer.qa.view', $forum->slug)}}" class="btn-sm" style="color:#208C84;">View</a>
                    </div>
                    <div class="card-footer" style="background:#208C84;color:white;">
                        {{$forum->created_at->format('d M Y')}}
                    </div>
                </div>
            </div>
        @endforeach
        <div>
            {{$forums->links()}}
        </div>
    </div>
    </div>
@endsection