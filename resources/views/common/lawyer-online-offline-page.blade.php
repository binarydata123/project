<div class="connect-legal-logo">
    <img src="/new-design/assets/image/home/Group (2).png" alt="">
</div>
<div class="lawyers-online">
    <img src="/new-design/assets/image/home/Group 1.png" alt="">
    <h5>Lawyers Online</h5>
</div>
<div class="lawyers-online-inner">
    <h5>Lawyers online ({{$onlineLawyers}})</h5>
    <div class="all">
        <img src="/new-design/assets/image/home/Group (3).png" alt="">
        <h6>All</h6>
    </div>
</div>
@foreach($lawyers as $k => $lawyer)
    @if($lawyer->user->isOnline())
        <div class="connect-legal-post-card bottom-line">
            <div class="connect-legal-post">
                <img src="/storage/{{$lawyer->profile_pic}}" style="width:40px; height: 40px;border-radius: 20px;" alt="">
                <div class="">
                    <h5>{{$lawyer->user->name}}</h5>
                    <h6>{{$lawyer->emirates}}</h6>
                </div>
            </div>
            {{--<div class="connect-legal-premium">
                <img src="/new-design/assets/image/home/Vector (10).png" alt="">
                <h4>Premium</h4>
            </div>--}}
        </div>
    @endif
@endforeach