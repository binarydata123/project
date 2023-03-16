@extends('lawyer.home.layouts.app')
@section('content')
<div class="working-box">
                <section class="lawyers-part-2 p-0">
                    <div class="container">
                        @include('lawyer.pages.community.groups.group-header')

                        

                        <div class="row">
                            <div class="col-lg-8" id="view-1024-100">
                                <div class="community-text1">
                                    <div class="top-header1">
                                        <div class="row align-items-center">
                                            <div class="col-sm-9 col-10">
                                                <div class="user-nav">
                                                    <div class="row">
                                                        <div class="col-sm-9">
                                                            <div class="row ">
                                                                <div class="col-sm-2 col-3 p-0 text-lg-start text-center">
                                                                    <div class="round-user">
                                                                        <img src="/storage/{{auth()->user()->getProfilePic(auth()->user()->id)}}"
                                                                            alt="question-1" class="user-li">
                                                                        <!-- <span class="round"></span> -->
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-10 col-9 names color-change">
                                                                    <p class="font-name">{{auth()->user()->name}}</p>
                                                                    <i class="fa-solid fa-location-dot color-blue"></i> <span
                                                                        class="font-ad">{{auth()->user()->getEmirates(auth()->user()->id)}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-2">
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

                                    <div class="form">
                                        <form action="{{route('lawyer.create.post')}}" method="POST" enctype="multipart/form-data">
                                            @csrf()
                                            <div class="mb-3  mt-3 col-12" id="title">
                                                <input type="text" id="Title" name="title" class="form-control title-class" placeholder="title">
                                                @error('title')
                                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                @enderror  
                                            </div>
                                            <div class="mb-3" id="title">
                                                <textarea class="form-control title-class" name="description" rows="3"
                                                    placeholder="Writte something here...">
                                                </textarea>                                                
                                                <!-- <div class="botton-class">
                                                    <img src="/new-design/user-dashboard/images/smie.png" alt="">
                                                    <img src="/new-design/user-dashboard/images/send.png" alt="">
                                                </div> -->
                                                <input type="hidden" name="page" value="all">
                                                <div class="col-12 text-end">
                                                    <button type="submit" class="publish_post" style="border:none;">Publish post</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>



                                <div class="all-posts">
                                    @foreach($posts as $k => $post)
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
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-4" id="view-1024-100">
                                <div class="border-pading">
                                    <div class="booked bg-none">
                                        <h4>Groups Created by me</h4>
                                        @foreach($groupsByMe as $k => $group)
                                            <div class="row mb-3" id="class-smae-color">
                                                <div class="col-3" id="color-class">
                                                    <h6> <img src="/new-design/user-dashboard/images/user1.png" alt=""> </h6>
                                                </div>
                                                <div class="col-9">
                                                    <h5>{{ $group->group_name }}</h5>
                                                    <p>Last post- {{$group->lastPost($group->id)}}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="text-center">
                                            <a href="#" class="">View All Groups</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="border-pading">
                                        <div class="booked bg-none">
                                            <h4>Groups I'm part</h4>
                                            @foreach($groupsIamIn as $k => $group)
                                                <div class="row mb-3" id="class-smae-color">
                                                    <div class="col-3" id="color-class">
                                                        <h6> <img src="/new-design/user-dashboard/images/user.png" alt=""> </h6>
                                                    </div>                                                    
                                                    <div class="col-9">
                                                        <h5>{{ $group->group->group_name }}</h5>
                                                        <p>Last post- {{ $group->lastPost($group->group_id) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="text-center">
                                                <a href="#" class="">View All Groups</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
        </div>

    
@endsection
@push('script')
    <script>
         $(document).ready(function() {
            $('.chosen-select').chosen({
                search_contains: true,
                placeholder_text_multiple: "Select the lawyers",
            });
        });
       
        function allLawyers() {
            window.location.href = "/lawyer/community/all-lawyers";
        }

        function groupsPage() {
            window.location.href = "/lawyer/community/groups";
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
            debugger
            var isOpen = $("#cmntList_"+id).val()
            if(isOpen == 0) {
                $("#cmntList_"+id).val(1)
                document.getElementById('commentList_'+id).style.display = "contents";
            }else {
                $("#cmntList_"+id).val(0)
                document.getElementById('commentList_'+id).style.display = "none";
            }
        }

        function submitForm(k) {
            debugger
            const form = document.getElementById('myForm-'+k);
            form.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent the default form submission behavior
                // Perform any additional validation or processing here
                form.submit(); // Submit the form
            });
        }

        

        function emojiPicker(id) {
            $("#last_picked_emoji").val(id)
            var element = document.getElementById('intercom-composer-emoji-popover-'+id);
            if (element.classList.contains('active')) {
                element.classList.remove('active');
            }else {
                element.classList.add('active');
            }
        }

        // $(document).click(function (e) {
        //     var id = $('#last_picked_emoji').val()
        //     if ($(e.target).attr('class') != '.intercom-composer-emoji-popover-'+id && $(e.target).parents(
        //             ".intercom-composer-emoji-popover-"+id).length == 0) {
        //         $(".intercom-composer-emoji-popover-"+id).removeClass("active");
        //     }
        // });

        $(document).on("click", ".intercom-emoji-picker-emoji", function (e) {
            var id = $('#last_picked_emoji').val()
            var old = $("#cmntField_"+id).val();
            $("#cmntField_"+id).val(old + $(this).html());
        });

        $('.intercom-composer-popover-input').on('input', function () {
            var query = this.value;
            if (query != "") {
                $(".intercom-emoji-picker-emoji:not([title*='" + query + "'])").hide();
            } else {
                $(".intercom-emoji-picker-emoji").show();
            }
        });

    </script>
@endpush