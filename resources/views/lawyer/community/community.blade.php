<!DOCTYPE html>
<html lang="en">

    @include('lawyer.community.layouts.head')

    <!-- <body  style="background-image: url('/community/assets/images/smiley-bg.jpg');"> -->
    <body  class="bg-smile">
        @include('common.layouts.header')
        <!-- page body start -->
        @include('lawyer.community.layouts.tabs')

        <!-- <div class="page-body container-fluid custom-padding newsfeed-style4">        
            <div class="page-center page-lg"> -->
            <div class="container-fluid section-t-space px-0">
                <div class="page-content">
                    <div class="content-center content-full" style="margin-left:13%;width: calc(100% - 264px)!important;">
                        <div class="row">
                            <div class="col-xl-12">
                                <!-- create post -->
                                <div class="create-post">
                                    <form action="{{route('lawyer.create.post')}}" method="POST" enctype="multipart/form-data">
                                        @csrf()
                                        <div class="static-section">
                                            <div class="card-title">
                                                <h3>create post</h3>                                            
                                            </div>
                                            <div class="search-input input-style icon-right">
                                                <div class="form-control" style="margin-bottom: 10px;">
                                                    <input type="text" class="form-control enable" placeholder="Title" name="title">
                                                    @error('title')
                                                        <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                    @enderror  
                                                </div>
                                                <div class="form-control">
                                                    <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Write something here..."></textarea>
                                                </div>
                                                <input type="hidden" name="page" value="all">
                                            </div>
                                        </div>
                                        <div id="post-btn" class="post-btn">
                                            <button>post</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="overlay-bg"></div>
                                <div class="post-panel section-t-space all-posts">
                                    @foreach($posts as $k => $post)
                                        <div class="post-wrapper col-grid-box" style="margin-bottom: 2%;">
                                            <div class="post-title">
                                                <div class="profile">
                                                    <div class="media">
                                                        <a class="popover-cls user-img" data-bs-toggle="popover"
                                                            data-placement="right" data-name="{{$post->user->name}}"
                                                            data-img="/storage/{{$post->getLawyerProfilePic($post->user_id)}}">
                                                            <img src="/storage/{{$post->getLawyerProfilePic($post->user_id)}}"
                                                                class="img-fluid blur-up lazyload bg-img" alt="user">
                                                        </a>
                                                        <div class="media-body">
                                                            <h5>{{$post->user->name}}</h5>
                                                            <h6>{{$post->created_at->diffForHumans()}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-details">
                                                @if($post->file)
                                                    <div class="img-wrapper">
                                                        <img src="/storage/{{$post->file}}"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </div>
                                                @endif
                                                <div class="detail-box">
                                                    <h3>{{$post->title}}</h3>
                                                    <p>
                                                        {{$post->description}}
                                                    </p>                                                    
                                                </div>
                                                <div class="like-panel">                                                    
                                                    <div class="right-stats">
                                                        <ul>
                                                            <li>
                                                                <h5>
                                                                    <i class="iw-16 ih-16"
                                                                        data-feather="message-square"></i> <span id="commentCounts_{{$post->id}}">{{$post->getCountOfComments($post->id)}} </span>
                                                                    comment
                                                                </h5>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="post-react">
                                                    <ul>
                                                        <li class="comment-click" onclick="enable('{{$post->id}}')">
                                                            <a href="javascript:void(0)">
                                                                <i class="iw-18 ih-18" data-feather="message-square"></i>
                                                                comment
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="comment-section" id="comment-section-{{$post->id}}">
                                                    <div class="comments d-block">
                                                        <input type="hidden" id="isOpen_{{$post->id}}" value="0">
                                                        <div class="ldr-comments" id="ldr-comments-{{$post->id}}">
                                                            <ul>
                                                                <li>
                                                                    <div class="media">
                                                                        <div class="ldr-img"></div>
                                                                        <div class="media-body">
                                                                            <div class="contents">
                                                                                <div class="ldr-content"></div>
                                                                                <div class="ldr-content"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <ul class="sub-comment">
                                                                        <li>
                                                                            <div class="media">
                                                                                <div class="ldr-img"></div>
                                                                                <div class="media-body">
                                                                                    <div class="contents">
                                                                                        <div class="ldr-content"></div>
                                                                                        <div class="ldr-content"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <div class="media">
                                                                        <div class="ldr-img"></div>
                                                                        <div class="media-body">
                                                                            <div class="contents">
                                                                                <div class="ldr-content"></div>
                                                                                <div class="ldr-content"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="media">
                                                                        <div class="ldr-img"></div>
                                                                        <div class="media-body">
                                                                            <div class="contents">
                                                                                <div class="ldr-content"></div>
                                                                                <div class="ldr-content"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="all-comments-{{$post->id}}">
                                                            @foreach($post->getComments($post->id) as $k => $comment)
                                                                <div class="main-comment">
                                                                    <div class="media">
                                                                        <a href="#" class="user-img popover-cls"
                                                                            data-bs-toggle="popover" data-placement="right"
                                                                            data-name="{{$comment->user->name}}"
                                                                            data-img="/storage/{{$comment->getLawyerProfilePic($comment->user_id)}}">
                                                                            <img src="/storage/{{$comment->getLawyerProfilePic($comment->user_id)}}"
                                                                                class="img-fluid blur-up lazyload bg-img"
                                                                                alt="user">
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <a href="#">
                                                                                <h5>{{$comment->user->name}}</h5>
                                                                            </a>
                                                                            <p>
                                                                                {{$comment->comment}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="comment-time">
                                                                            <h6>{{$comment->created_at->diffForHumans()}}</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="reply">
                                                        <form action="{{route('lawyer.add.comment', $post->id)}}" method="post">
                                                            @csrf()
                                                            <div class="search-input input-style input-lg icon-right" style="margin-bottom: 1%;">
                                                                <input type="text" class="form-control emojiPicker"
                                                                    placeholder="write a comment.." name="comment">
                                                                <a href="javascript:void(0)">
                                                                    <i data-feather="smile" class="icon icon-2 iw-14 ih-14"></i>
                                                                </a>
                                                                <input type="hidden" name="page" value="all">
                                                                <!-- @error('comment')
                                                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                                @enderror -->
                                                            </div>
                                                            <button class="btn btn-primary">Comment</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- </div>

        </div> -->
        <!-- page body end -->

        @include('lawyer.community.layouts.scripts')

    </body>

</html>