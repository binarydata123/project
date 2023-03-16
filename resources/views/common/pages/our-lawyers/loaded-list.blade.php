@foreach($lawyers as $k => $lawyer)
    <div class="our-lawyers-card-wrapper left">
        <div class="our-lawyers-card on-watch">
            <div class="d-flex">
                <div class="avatar-container">
                    <img class="avatar" src="/new-design/assets/image/our_lawyers/dummy_dp.png" >
                    <img class="crown" src="/new-design/assets/image/our_lawyers/avatar_crown.png" >
                </div>
                <div class="our-lawyers-card-content">
                    <h4>{{$lawyer->user->name}}</h4>
                    <div class="ratings">
                        <div class="ratings-card">
                            <img src="/new-design/assets/image/home/star.png" alt="">
                            <img src="/new-design/assets/image/home/star.png" alt="">
                            <img src="/new-design/assets/image/home/star.png" alt="">
                            <img src="/new-design/assets/image/home/star.png" alt="">
                            <img src="/new-design/assets/image/home/star.png" alt="">
                        </div>
                        <h5>(35 Reviews)</h5>
                    </div>
                    <div class="lawyer-location">
                        <img src="/new-design/assets/image/our_lawyers/location.png">
                        <p>{{$lawyer->emirates}}</p>
                    </div>
                </div>
                
            </div>
            <div class="our-lawyers-card-eye">
                <svg width="59" height="59" viewBox="0 0 59 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="29.5" cy="29.5" r="29" fill="white" stroke="#3DC9A1"/>
                    <path d="M30 18C21.8182 18 14.8309 23.1833 12 30.5C14.8309 37.8167 21.8182 43 30 43C38.1818 43 45.1691 37.8167 48 30.5C45.1691 23.1833 38.1818 18 30 18ZM30 38.8333C25.4836 38.8333 21.8182 35.1 21.8182 30.5C21.8182 25.9 25.4836 22.1667 30 22.1667C34.5164 22.1667 38.1818 25.9 38.1818 30.5C38.1818 35.1 34.5164 38.8333 30 38.8333ZM30 25.5C27.2836 25.5 25.0909 27.7333 25.0909 30.5C25.0909 33.2667 27.2836 35.5 30 35.5C32.7164 35.5 34.9091 33.2667 34.9091 30.5C34.9091 27.7333 32.7164 25.5 30 25.5Z" fill="#3DC9A1"/>
                </svg>                                                
            </div>
        </div>
    </div>
@endforeach