<div class="row align-items-center mt-3">
    <div class="col-sm-12">
        <div class="user-nav">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row ">
                        <div class="col-lg-1 col-md-2 col-2 p-0">
                            <div class="round-user">
                                <img src="/storage/{{$comment->getLawyerProfilePic($comment->user_id)}}"
                                    alt="question-1" class="user-li">
                                <!-- <span class="round"></span> -->
                            </div>
                        </div>
                        <div class="col-lg-11 col-md-10 col-10 names color-change"
                            id="color-chat">
                            <p class="font-name"> {{$comment->user->name}}</p>
                            <span class="font-ad">{{$comment->user->getEmirates($comment->user_id)}}</span>
                            <span>{{$comment->created_at->diffForHumans()}}</span>
                            <p>{{$comment->comment}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>