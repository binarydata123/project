@foreach($lawyers as $k => $lawyer)
    @if($lawyer->user->isOnline())
        <div class="user-online-g sp-r-l" data-bs-toggle="modal" data-bs-target="#lawyers_profile_{{$lawyer->id}}">
            <a href="#">
                <div class="row">
                    <div class="col-3">
                        <img src="/storage/{{$lawyer->profile_pic}}" alt="legal-1" class="legal-1">
                    </div>
                    <div class="col-7">
                        <p class="name-uaser">{{$lawyer->user->name}}</p>
                        <p class="short-mes">{{$lawyer->emirates}}</p>
                    </div>
                    <!-- <div class="col-2"><img src="/new-design/assets/images/prem.png" alt="prem"></div> -->
                </div>
            </a>
        </div>
    @endif
@endforeach
@if($onlineLawyers < 1) 
    <div class="user-online-g sp-r-l ">
        <a href="#">
            <div class="row">
                <div class="col-7">
                    <p class="name-uaser">No Lawyers Are Online</p>
                </div>
                <!-- <div class="col-2"><img src="/new-design/assets/images/prem.png" alt="prem"></div> -->
            </div>
        </a>
    </div>
@endif


<div class="offline-lawyers">
    <p>Lawyers offline</p>
</div>
@foreach($lawyers as $k => $lawyer)
    @if(!$lawyer->user->isOnline())
        <div class="user-online-g sp-r-l">
            <a href="#">
                <div class="row">
                    <div class="col-3">
                        <img src="/storage/{{$lawyer->profile_pic}}" alt="question-1" class="legal-1">
                    </div>
                    <div class="col-9">
                        <p class="name-uaser">{{$lawyer->user->name}}</p>
                        <p class="short-mes">{{$lawyer->emirates}}</p>
                    </div>
                </div>
            </a>
        </div>
    @endif
@endforeach