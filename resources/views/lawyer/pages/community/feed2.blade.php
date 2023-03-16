@extends('lawyer.home.layouts.app')
@section('content')
    <section>
        <div class="row" >
            <div class="col-1" id="feed" style="padding-top: 1.5rem;margin-left: 340px;">
                <div class="card card-darkgreen border-0 h-100 card-border-radius" style="background-color: #E0EDF1 !important;width: 121px;cursor: pointer;">
                    <div style="display: flex;">
                        <div class="card-body" style="text-align: center;">
                            <strong style="color: #156075;font-size: 140%;">Feed</strong>
                        </div>
                        <div class="card-body" style="text-align: center;">
                            <strong style="color: #156075;font-size: 140%;"><a href="{{route('lawyer.community.groups')}}">Groups</a></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-7" style="padding-top: 2.5rem;">
                <div>
                    <div class="card-body pull-right">
                        <strong onclick="allLawyers()">All Lawyers</strong> 
                    </div>
                </div>
            </div>

            <div class="col-1" style="padding-top: 2.5rem;">
                <div>
                    <div class="card-body pull-right">
                        <strong> Created Groups</strong> 
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">            
            <div class="col-6 py-4" id="dashboardaa" style="margin-left: 340px!important;">
                <div class="dashboard font-Poppins-regular" >
                    <div class="card border-0 h-100 box-card-shadow card-border-radius">
                        <div class="card-body"> 
                            <div class="d-flex align-items-center">
                                <div class="card-body row">
                                    <div class="col-2" style="width: 10%">
                                        <img src="/storage/{{auth()->user()->getProfilePic(auth()->user()->id)}}" alt="" class="avatar">
                                    </div>
                                    <div class="col-5" style="height: 11px; padding-right: 5px;">
                                        <p style="padding-top: 8px;font-weight: bolder;">{{auth()->user()->name}}</p>
                                        <h6><img src="/new-design/lawyer/assets/image/dashboard/location.png" alt="" class="w-auto" style="height: 11px;
                                            padding-right: 5px;"> {{auth()->user()->getEmirates(auth()->user()->id)}}</h6>
                                    </div>
                                    <div class="col-5" style="width: 48%">
                                        <h6 class="pull-right" style="padding-top: 8px;"><img src="/new-design/lawyer/assets/image/dashboard/three_dots.png" alt="" class="w-auto"> </h6>
                                    </div>
                                    <form action="{{route('lawyer.create.post')}}" method="POST" enctype="multipart/form-data">
                                        @csrf()
                                        <div class="form-group row" style="margin-top: 15px;margin-bottom: 15px;">
                                            <input type="text" class="form-control" id="Title" name="title" placeholder="Title">
                                            @error('title')
                                                <span class="error-msg" style="color:red;">{{ $message }}</span>
                                            @enderror  
                                        </div>
                                        <div class="form-group row" style="margin-top: 15px;margin-bottom: 15px;">
                                            <textarea class="form-control" name="description" rows="5" id="message-text" placeholder="Write something here..."></textarea>
                                        </div>
                                        <input type="hidden" name="page" value="all">
                                        <button style="background-color: #209C84;border-radius: 0px;border: 0px;width: 40%;float:right;" type="submit" class="btn btn-danger" data-bs-dismiss="modal">
                                            Publish Post
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                @foreach($posts as $k => $post)
                    <div class="dashboard font-Poppins-regular" >
                        <div class="card border-0 h-100 box-card-shadow card-border-radius">
                            <div class="card-body"> 
                                <div class="d-flex align-items-center">
                                    <div class="card-body row">
                                        <div class="col-1">
                                            <img src="/storage/{{$post->getLawyerProfilePic($post->user_id)}}" alt="" class="avatar">
                                        </div>
                                        <div class="col-4" style="height: 11px;padding-right: 5px;">
                                            <p style="padding-top: 8px;font-weight: bolder;">{{$post->user->name}}</p>
                                            <h6>
                                                <img 
                                                    src="/new-design/lawyer/assets/image/dashboard/location.png" 
                                                    alt="" 
                                                    class="w-auto" 
                                                    style="height: 11px; padding-right: 5px;"> 
                                                    {{$post->user->getEmirates($post->user_id)}} 
                                                    <span style="font-size: 10px;color: grey;">Yesterday 2:30 pm</span>
                                            </h6>
                                        </div>
        
                                        <div class="col-7">
                                            <h6 class="pull-right" style="padding-top: 8px;"><img src="/new-design/lawyer/assets/image/dashboard/three_dots.png" alt="" class="w-auto"> </h6>
                                        </div>
                                        <br>
                                        <div>
                                            <h2 style="color: #156075;
                                            margin-bottom: 10px;
                                            margin-top: 20px;font-size: 16px!important"> <strong>{{$post->title}}</strong> </h2>
                                            <p style="font-size: 13px;">
                                                {{$post->description}}
                                            </p>
                                        </div>
                                        <div>
                                          
                                            <hr>
                                        </div>
                                        <div class="col-6" style="display: flex" onclick="showComment('{{$k}}')">
                                            <img src="/new-design/lawyer/assets/image/dashboard/comment.png" alt="" class="w-auto" style="padding-right: 10px;
                                                ">
                                            <span style="padding-top: 5px" >Comment</span> 
                                        </div>                                       
                                        <div class="col-6" >
                                            <span class="pull-right" style="font-size: 13px;" onclick="showCommentList('{{$k}}')">{{$post->getCountOfComments($post->id)}} Comment  </span> 
                                        </div>
                                        <input type="hidden" id="cmntPost_{{$k}}" value="0">
                                        <input type="hidden" id="cmntList_{{$k}}" value="0">
                                        <form action="{{route('lawyer.add.comment', $post->id)}}" method="post">
                                            @csrf()
                                            <div style="display: none;margin-top: 30px" id="commentPost_{{$k}}">
                                                <input type="hidden" name="page" value="all">
                                                <img src="/storage/{{auth()->user()->getProfilePic(auth()->user()->id)}}" alt="" class="avatar_comment" style="padding-right: 10px;">
                                                <input type="text" class="form-control" id="Title" placeholder="Type message here" name="comment" style="border-radius: 20px;font-size: small;">     
                                                <input type="image" src="/new-design/lawyer/assets/image/dashboard/attachment.png" alt="Submit" style="width: 2%;
                                                position: absolute;
                                                right: 95px;
                                                margin-top: 15px;">                                 
                                            </div>  
                                        </form>
                                        
                                        <div #comment class="row" id="commentList_{{$k}}"  style="display: none">
                                            @foreach($post->getComments($post->id) as $k => $comment)
                                                <div class="col-1" style="margin-top: 24px;padding-left: 0px">
                                                    <img src="/storage/{{$comment->getLawyerProfilePic($comment->user_id)}}" alt="" class="avatar_comment">
                                                </div>
                                                <div class="col-11 comment-gry">
                                                    <p style="padding-top: 8px;
                                                    font-weight: bolder;">{{$comment->user->name}}</p>
                                                    <h6><img src="/new-design/lawyer/assets/image/dashboard/location.png" alt="" class="w-auto" style="height: 11px;
                                                        padding-right: 5px;"> {{$comment->user->getEmirates($comment->user_id)}}  <span style="font-size: 10px;color: grey;">{{$comment->created_at->diffForHumans()}}</span></h6>                                                        
                                                    <p style="font-size: 13px; margin-bottom: 15px;margin-top: 15px">
                                                        {{$comment->comment}}
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
            
            @include('lawyer.pages.community.feed-group-list')
        </div>
    </section>
@endsection
@push('script')
    <script>
        
        function allLawyers() {
            window.location.href = "/lawyer/community/all-lawyers";
        }

        function showComment(id) {
            var isOpen = $("#cmntPost_"+id).val()
            if(isOpen == 0) {
                $("#cmntPost_"+id).val(1)
                document.getElementById('commentPost_'+id).style.display = "flex";
            }else {
                $("#cmntPost_"+id).val(0)
                document.getElementById('commentPost_'+id).style.display = "none";
            }
        }

        function showCommentList(id) {
            var isOpen = $("#cmntList_"+id).val()
            if(isOpen == 0) {
                $("#cmntList_"+id).val(1)
                document.getElementById('commentList_'+id).style.display = "flex";
            }else {
                $("#cmntList_"+id).val(0)
                document.getElementById('commentList_'+id).style.display = "none";
            }
        }

    </script>
@endpush