@extends('lawyer/layouts/navbar_content')
@section('title', 'Profile')
@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Account Settings /</span> My Activity
    </h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item"><a class="nav-link" href="{{route('lawyer.profile')}}"><i class="bx bx-user me-1"></i> Account</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{route('lawyer.my-activity')}}"><i class="bx bx-bell me-1"></i> My Activity</a></li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Answered Questions</h5>
            <!-- Account -->
                <div class="card-body">
                    <div class="row mb-5">
                        @foreach($answers as $k => $answer)
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        {{$answer->created_at->format('d M Y')}}
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$answer->forum->title}}</h5>
                                        <p class="card-text">
                                            {{$answer->answer}}
                                        </p>
                                        @php 
                                            $rating = $answer->ratingData($answer->id);
                                        @endphp
                                        @if($rating)                                        
                                            <span class="text-orange text-extra-small d-block" style="text-align: end;">
                                                <i class="bx bx-star" style="color:{{$rating >= 1 ? 'red' : ''}}"></i>
                                                <i class="bx bx-star" style="color:{{$rating >= 2 ? 'red' : ''}}"></i>
                                                <i class="bx bx-star" style="color:{{$rating >= 3 ? 'red' : ''}}"></i>
                                                <i class="bx bx-star" style="color:{{$rating >= 4 ? 'red' : ''}}"></i>
                                                <i class="bx bx-star" style="color:{{$rating >= 5 ? 'red' : ''}}"></i>
                                            </span>
                                        @else 
                                            <p>No one rated yet</p>
                                        @endif
                                        <a href="{{route('lawyer.qa.view', $answer->forum->slug)}}" class="btn btn-primary">View</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            <!-- /Account -->
            </div>


            <div class="card mb-4">
                <h5 class="card-header">Hired By</h5>
            <!-- Account -->
                <div class="card-body">
                    <div class="row mb-5">
                        @forelse($hiredData as $k => $hired)
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        {{$hired->created_at->format('d M Y')}}
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$hired->lawyerService->services->title}}</h5>
                                        <p class="card-text">
                                            Hired By: <b>{{$hired->hiredBy->name}}</b>
                                        </p>                                        
                                    </div>
                                </div>
                            </div>
                        @empty 
                            <p>No Data</p>
                        @endforelse
                    </div>
                </div>
            <!-- /Account -->
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        var input = document.getElementById('upload');
        input.addEventListener('change', showFileName);
        function showFileName(event) {
            $("#is_selected").empty()
            var input = event.srcElement;
            var fileName = input.files[0].name;
            if(fileName)
                $("#is_selected").append('Profile pic selected: '+ fileName)
        }
    </script>
@endsection