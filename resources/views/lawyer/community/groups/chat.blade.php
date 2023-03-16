@extends('lawyer.home.layouts.app')
@section('content')

<section class="message-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="chat-area">
                                <!-- chatlist -->
                                <div class="chatlist">
                                    <div class="modal-dialog-scrollable fadeup">
                                        <div class="modal-content">
                                            <div class="chat-header">
                                                <div class="msg-search">
                                                    <img src="/new-design/user-dashboard/images/legal-2.png" alt="">
                                                    <a class="add" href="#" style="text-decoration:none;">
                                                        <ul class="moreoption">
                                                            <i class="fa-solid fa-magnifying-glass"></i>
                                                        </ul>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <!-- chat-list -->
                                                <div class="chat-lists">
                                                    <div class="tab-content" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="Open" role="tabpanel"
                                                            aria-labelledby="Open-tab">
                                                            <!-- chat-list -->
                                                            <div class="chat-list">
                                                                @foreach($allGroups as $k => $group)
                                                                    <a href="#" onclick="openGroupChat('{{$group->id}}')" class="d-flex">
                                                                        <div class="flex-shrink-0 img-width">
                                                                            <img class="img-fluid" src="/new-design/user-dashboard/images/user111.png"
                                                                                alt="user img">
                                                                            <!-- <span class="active"></span> -->
                                                                        </div>
                                                                        <div class="flex-grow-1 ms-3">
                                                                            <h3>{{$group->group_name}}</h3>
                                                                            <p>{{$group->getLatestGroupMsg($group->id)}}
                                                                                <strong>{{$group->getLatestGroupMsgDate($group->id)}}</strong>
                                                                            </p>
                                                                        </div>
                                                                    </a>
                                                                @endforeach
                                                            </div>
                                                            <!-- chat-list -->
                                                        </div>
                                                        <div class="tab-pane fade" id="Closed" role="tabpanel"
                                                            aria-labelledby="Closed-tab">

                                                            <!-- chat-list -->
                                                            <div class="chat-list">
                                                                @foreach($allGroups as $k => $group)
                                                                    <a href="{{route('lawyer.community.group.chat', $group->id)}}" class="d-flex">
                                                                        <div class="flex-shrink-0 img-width">
                                                                            <img class="img-fluid" src="/new-design/user-dashboard/images/user111.png"
                                                                                alt="user img">
                                                                            <span class="active"></span>
                                                                        </div>
                                                                        <div class="flex-grow-1 ms-3">
                                                                            <h3>{{$group->group_name}}</h3>
                                                                            <p>{{$group->getLatestGroupMsg($group->id)}}</p>
                                                                        </div>
                                                                    </a>
                                                                @endforeach
                                                            </div>
                                                            <!-- chat-list -->
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- chat-list -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- chatlist -->



                                <!-- chatbox -->
                                <div class="chatbox">
                                    <div class="modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="msg-head">
                                                <div class="row align-items-center">
                                                    <div class="col-8">
                                                        <div class="d-flex align-items-center">
                                                            <span class="chat-icon"><i
                                                                    class="fa-solid fa-arrow-left"></i></span>
                                                            <div class="flex-shrink-0 img-width" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal">
                                                                <img class="img-fluid" src="/new-design/user-dashboard/images/user111.png"
                                                                    alt="user img">
                                                            </div>
                                                            <div class="flex-grow-1 color-p-syte ms-3">
                                                                <h3>{{$groupDetail->group_name}}
                                                                </h3>
                                                                <p>{{substr($groupDetail->about, 0, 20)}}</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    

                                                    <div class="col-4">
                                                        <!-- <ul class="moreoption">
                                                            <div class="search-container">
                                                                <input type="text" placeholder="Search...">
                                                                <i class="fa-solid fa-magnifying-glass"
                                                                    id="search-btn"></i>
                                                                <li class="navbar nav-item dropdown">
                                                                    <a class="nav-link dropdown-toggle" href="#"
                                                                        role="button" data-bs-toggle="dropdown"
                                                                        aria-expanded="false"><i
                                                                            class="fa-solid fa-ellipsis"></i></a>
                                                                    <ul class="dropdown-menu">
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
                                                                    </ul>
                                                                </li>

                                                        </ul> -->

                                                    </div>
                                                </div>
                                            </div>
    

                                            <div class="modal-body chat-history">
                                                <div class="msg-body messages-content" id="chat-text">
                                                    @foreach($messages as $k => $message)
                                                        @if($message->from_id != auth()->user()->id)
                                                            <small style="color:{{$message->fromUser->messenger_color}}"><strong>{{$message->fromUser->name}}</strong></small>
                                                            <ul>
                                                                <li class="sender color-border">
                                                                    <div class="chat-left">
                                                                        <p>{{$message->body}}
                                                                        </p>
                                                                        <h6 class="text-end">{{$message->created_at->diffForHumans()}} {{date('g:i A', strtotime($message->created_at))}} <i
                                                                                class="fa-solid fa-check"></i></h6>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        @else
                                                            <ul>
                                                                <li class="repaly reply-two">
                                                                    <div class="chat-left colorchane">
                                                                        <p>{{$message->body}}
                                                                        </p>
                                                                        <h6 class="text-end">{{$message->created_at->diffForHumans()}} {{date('g:i A', strtotime($message->created_at))}} <i
                                                                                class="fa-solid fa-check"></i></h6>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        @endif
                                                    @endforeach
                                                    
                                                    <!-- <div class="upload-image">
                                                        <div class="text-center max-file">
                                                            <img src="/new-design/user-dashboard/images/file.png" alt="" id="image-preview"
                                                                style="display:none;">
                                                            <p class="m-0 mt-3">Name of file.pdf</p>
                                                            <p class="m-0"> 3.5 MB · PDF</p>
                                                        </div>
                                                    </div> -->


                                                </div>
                                            </div>
                                            <div class="send-box position-relative">
                                                <div class="intercom-composer-popover intercom-composer-emoji-popover">
                                                    <div class="intercom-emoji-picker">
                                                        <div class="intercom-composer-popover-header"><input
                                                                class="intercom-composer-popover-input"
                                                                placeholder="Search" value=""></div>
                                                        @include('vendor.Chatify.pages.emoji')
                                                    </div>
                                                    <div class="intercom-composer-popover-caret"></div>
                                                </div>
                                                <form id="message-form" method="POST" action="{{ route('send.message') }}" onsubmit="return false;">
                                                    @csrf()
                                                    <input type="hidden" id="groupId" value="{{$groupId}}">
                                                    <input type="text" class="form-control" id="msgField"
                                                        aria-label="message…" placeholder="Write message…">
                                                    <img style="cursor: pointer;" id="emoji-picker"
                                                        src="/new-design/user-dashboard/images/file-snd.png" alt="" class="postiotion-1">
                                                    <label><input type="file" onchange="updateImagePreview()" multiple
                                                            class="img-file"> <img src="/new-design/user-dashboard/images/filesnd.png"
                                                            class="postiotion-2 img--"></label>
                                                    <button type="button" onclick="sendMessage()"><i class="fa fa-paper-plane"
                                                            aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- chatbox -->
                        </div>
                    </div>
                </div>
        </div>

        <div class="modal fade chat-popup" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                <div class="popupclass">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0 img-width">
                                                                            <img class="img-fluid" src="/new-design/user-dashboard/images/user111.png" alt="user img">
                                                                        </div>
                                                                        <div class="flex-grow-1 color-p-syte ms-3">
                                                                            <h3>{{$groupDetail->group_name}}
                                                                            </h3>
                                                                            <!-- <span>{{$groupDetail->group_name}}</span> -->
                                                                        </div>
                                                                    </div>

                                                                    <div class="abouts-popup">
                                                                        <strong>About:</strong>
                                                                        <p class="mb-4">{{$groupDetail->about}}</p>
                                                                    <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <ul>
                                                                            <li><strong>Date Created:</strong></li>
                                                                            <li><strong> Total No of Members:</strong></li>
                                                                            <li><strong>Members:</strong></li> 
                                                                            <li><strong>Administrator:</strong></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-sm-9">
                                                                        <ul>
                                                                            <li>{{$groupDetail->created_at ?? '-'}}</li>
                                                                            <li> {{$groupDetail->totalMembers($groupDetail->id)}}</li>
                                                                            <li> {{$groupDetail->getMembers($groupDetail->id)}}</li> 
                                                                            <li>{{$groupDetail->admin->name}}</li>
                                                                        </ul>
                                                                    </div>
                                                                    </div>
                                                                        </div>
                                                                    <div class="modal-footer border-0">
                                                                        <button type="button" class="chatbtnpopup" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
        </section>

@endsection


@push('script')
<script type="text/javascript">

        function openGroupChat(groupId) {
            window.location.href = "/lawyer/community/group/chat/"+groupId;
        }

        $(document).ready(function () {
            const messagesContainer = $(".chat-history");
            scrollToBottom(messagesContainer)
            $('#chat-text').scrollTop($('#chat-text')[0].scrollHeight);
            // Hide submenus
            $('#body-row .collapse').collapse('hide');

            // Collapse/Expand icon
            $('#collapse-icon').addClass('fa-angle-double-left');

            // Collapse click
            $('[data-toggle=sidebar-colapse]').click(function () {
                SidebarCollapse();
            });

            function SidebarCollapse() {
                $('.menu-collapsed').toggleClass('d-none');
                $('.sidebar-submenu').toggleClass('d-none');
                $('.submenu-icon').toggleClass('d-none');
                $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');

                // Collapse/Expand icon
                $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
            }
        });
    </script>
    <script>
        jQuery(document).ready(function () {

            $(".chat-list a").click(function () {
                $(".chatbox").addClass('showbox');
                return false;
            });

            $(".chat-icon").click(function () {
                $(".chatbox").removeClass('showbox');
            });


        });



        $(document).on("click", "#emoji-picker", function (e) {
            e.stopPropagation();
            $('.intercom-composer-emoji-popover').toggleClass("active");
        });

        $(document).click(function (e) {
            if ($(e.target).attr('class') != '.intercom-composer-emoji-popover' && $(e.target).parents(".intercom-composer-emoji-popover").length == 0) {
                $(".intercom-composer-emoji-popover").removeClass("active");
            }
        });

        $(document).on("click", ".intercom-emoji-picker-emoji", function (e) {
            var old = $("#msgField").val();
            $("#msgField").val(old + $(this).html());
        });

        $('.intercom-composer-popover-input').on('input', function () {
            var query = this.value;
            if (query != "") {
                $(".intercom-emoji-picker-emoji:not([title*='" + query + "'])").hide();
            }
            else {
                $(".intercom-emoji-picker-emoji").show();
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(document).scrollTop() > 70) {
                    $(".top-header").addClass("head-fixed");
                } else {
                    $(".top-header").removeClass("head-fixed");
                }
            });
        });
    </script>


    <script>
        function updateImagePreview() {
            var input = document.querySelector('input[type="file"]');
            var preview = document.querySelector('#image-preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
                preview.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
    </script>
    <script type="text/javascript">

        const searchBtn = document.getElementById('search-btn');
        const searchInput = document.querySelector('.search-container input');

        // searchBtn.addEventListener('click', function () {
        //     searchInput.classList.toggle('expand');
        //     searchBtn.classList.toggle('collapse');
        //     searchInput.focus();
        // });


       
        var temporaryMsgId = 0;        


        function sendMessage() {
            var access_token = $('meta[name="csrf-token"]').attr("content");
            temporaryMsgId += 1;
            let tempID = `temp_${temporaryMsgId}`;
            const messagesContainer = $(".chat-history");
            const messageInput = $("#message-form .m-send")
            const inputValue = $.trim(messageInput.val());
            var groupId = $("#groupId").val();
            $(".sending").css('display', 'block');
            $(".sending").css('text-align', 'center');
            var msg = $("#msgField").val();
            if(msg) {

                $("#msgField").val("")            
                let hasFile = !!$(".upload-attachment").val();  
                // const formData = "abcd";
                const formData = new FormData($("#message-form")[0]);            
                formData.append("_token", access_token);
                formData.append("temporaryMsgId", tempID);
                formData.append("msg", msg);
                // debugger
                // document.getElementById('msgField').setAttribute("style","padding-left:5%;overflow:hidden;overflow-wrap:break-word;");
                // if(msg) {
                $.ajax({
                    method:"post",
                    url: "/lawyer/community/group/send-message/"+groupId,
                    // data: {
                    //     "_token": "{{ csrf_token() }}",
                    //     'msg':msg,
                    //     'data':formData 
                    // },
                    data: formData,
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    beforeSend: () => {
                        // remove message hint
                        $(".messages").find(".message-hint").remove();
                        // append a temporary message card
                        
                        // scroll to bottom
                        scrollToBottom(messagesContainer);
                        messageInput.css({ height: "42px" });
                        // form reset and focus
                        $("#message-form").trigger("reset");
                        // cancelAttachment();
                        messageInput.focus();
                    },
                    success: function(res){                    
                        $("#chat-text").animate({ scrollTop: $('#chat-text').prop("scrollHeight")}, 1000);
                        $('#chat-text').scrollTop($('#chat-text')[0].scrollHeight);
                    }
                });
            }
            // }
        }

        function scrollToBottom(container) {
            $(container)
                .stop()
                .animate({
                scrollTop: $(container)[0].scrollHeight,
                });
        }

    </script>
@endpush