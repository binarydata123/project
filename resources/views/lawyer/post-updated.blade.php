<div class="community-text2 mt-4">
    <div class="top-header1">
        <div class="row align-items-center">
            <div class="col-sm-9 col-10">
                <div class="user-nav">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 col-10">
                            <div class="row ">
                                <div class="col-lg-3 col-md-3 col-3 p-0">
                                    <div class="round-user">
                                        <img src="/storage/{{$post->getLawyerProfilePic($post->user_id)}}"
                                            alt="question-1" class="user-li">
                                        <!-- <span class="round"></span> -->
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-9 col-9 names color-change">
                                    <p class="font-name"> {{$post->user->name}}</p>
                                    <i class="fa-solid fa-location-dot color-blue"></i> <span
                                        class="font-ad">{{$post->user->getEmirates($post->user_id)}},</span> <span>{{$post->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-2">
                <div class=" pl-0 text-right">
                    <ul class="moreoption">
                        <li class="navbar nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"
                                role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"><i
                                    class="fa-solid fa-ellipsis"></i></a>
                            <!-- <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"> <img
                                            src="/new-design/user-dashboard/images/file-2.png" alt="">
                                        Action</a>
                                </li>
                                <li><a class="dropdown-item" href="#"> <img
                                            src="/new-design/user-dashboard/images/file-2.png" alt="">
                                        Action</a>
                                </li>
                                <li><a class="dropdown-item" href="#"> <img
                                            src="/new-design/user-dashboard/images/file-2.png" alt="">
                                        Action</a>
                                </li>
                                <li><a class="dropdown-item" href="#"> <img
                                            src="/new-design/user-dashboard/images/file-2.png" alt="">
                                        Action</a>
                                </li>
                                <li><a class="dropdown-item" href="#"> <img
                                            src="/new-design/user-dashboard/images/file-2.png" alt="">
                                        Action</a>
                                </li>
                            </ul> -->
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="chat-datial">
        <h5>{{$post->title}}</h5>
        <p>{{$post->description}}</p>
        <span> #Connectlegal</span>
        <hr class="d-none d-lg-block">
    </div>
    <div class="row">
        <div class="col-lg-6 order-lg-0 order-last col-12">
            <ul class="same-flex">
                <!-- <li> <img src="/new-design/user-dashboard/images/like.png" alt=""> Like</li> -->
                <li onclick="showComment('{{$post->id}}')"> <img src="/new-design/user-dashboard/images/mass.png" alt=""> Comment</li>
                <!-- <li> <img src="/new-design/user-dashboard/images/shere.png" alt=""> Share</li> -->
            </ul>
        </div>
        <div class="col-sm-6 text-end order-lg-0 order-first">
            <ul class="same-flex">
                <li onclick="showCommentList('{{$post->id}}')" id="commentCounts_{{$post->id}}"><span>{{$post->getCountOfComments($post->id)}} comments</span></li>
            </ul>
        </div>
        <hr class="d-block d-lg-none">
    </div>
    <input type="hidden" id="cmntPost_{{$post->id}}" value="0">
    <input type="hidden" id="cmntList_{{$post->id}}" value="0">
    <input type="hidden" id="last_picked_emoji" value="0">
    <div class="position-relative mt-4">
        <div class="intercom-composer-popover intercom-composer-emoji-popover" id="intercom-composer-emoji-popover-{{$post->id}}">
            <div class="intercom-emoji-picker">
                <div class="intercom-composer-popover-header"><input
                        class="intercom-composer-popover-input"
                        placeholder="Search" value=""></div>
                @include('vendor.Chatify.pages.emoji')
            </div>
            <div class="intercom-composer-popover-caret"></div>
        </div>
        <form action="{{route('lawyer.add.comment', $post->id)}}" id="myForm-{{$post->id}}" method="post">
            @csrf()
            <div class="row align-items-center" style="display:none;" id="commentPost_{{$post->id}}">
                <div class="col-lg-1  col-md-2 col-3 md-p0">
                    <img src="/storage/{{auth()->user()->getProfilePic(auth()->user()->id)}}" alt="" style="width: 100%;height: 30px;border-radius: 20px;">
                </div>
                <div class="col-lg-11 col-md-10  col-9 position-relative">
                    <div class="input-group button-gropup">
                        <input type="text" class="form-control border-0" name="comment" id="cmntField_{{$post->id}}"
                            placeholder="Type a message" aria-label="Recipient's username"
                            aria-describedby="basic-addon2">
                        <span class="input-group-text border-0" id="basic-addon2"> <img
                                src="/new-design/user-dashboard/images/smie.png" id="emoji-picker-{{$post->id}}" onclick="emojiPicker('{{$post->id}}')" alt=""> 
                                <img src="/new-design/user-dashboard/images/snd-1.png" alt=""  onclick="submitForm('{{$post->id}}')"> </span>
                    </div>
                </div>
            </div>
        </form>


        <div class="top-header" style="display:none;" id="commentList_{{$post->id}}">
            @foreach($post->getComments($post->id) as $kl => $comment)
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
            @endforeach
        </div>
        
    </div>
</div>