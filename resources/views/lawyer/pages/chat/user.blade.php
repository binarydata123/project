@extends('lawyer.home.layouts.app')
@section('content')
    <section>
        <div class="container chat-main-container" style="margin-top: 50px;">
        <div class="messaging">
            <div class="inbox_msg">
                <div class="inbox_people col-12">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <div class="chat_img" style="width: 30%;"> <img src="/storage/{{auth()->user()->getProfilePic(auth()->user()->id)}}" alt="" class="prof"> </div>
                        </div>
                        <div class="srch_bar" style="padding-top: 15px;">
                            <div class="stylish-input-group">
                            <input type="text" class="search-bar"  >
                            <span class="input-group-addon">
                            <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                            </span> </div>
                        </div>
                    </div>
                    <div class="inbox_chat">
                        @foreach($incompletedChatRequests as $k => $user)
                            <div class="chat_list {{request()->id == $user->user_id ? 'active_chat' : ''}}" onclick="chatWithUser('{{$user->user_id}}')" style="cursor:pointer;">
                                <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>{{$user->user->name}} <span class="babdge_count pull-right">{{$user->unSeenMsgCount($user->user_id)}}</span> </h5>
                                        <p>{{$user->latestMsg($user->user_id)}}</p>
                                        <span class="chat_date pull-right">{{$user->latestMsgCreatedAt($user->user_id)}}</span> 
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="headind_srch col-12">
                    <div class="recent_heading current-chat-heading" style="display: flex;">
                        <div class="chat_img chat_img2" style="width: 10%;margin-left: 10px;"> 
                            <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil" class="chat-img-prof" style="height:40px; width: 50px;"> 
                        </div>
                        <div class="chat_ib">
                            <h5 style="margin:0;">{{$user->name}}</h5>
                            <!-- <p>Dubai, UAE</p> -->
                        </div>
                    </div>
                    <div class="srch_bar" style="padding-top: 15px;width: 20%;">
                        <div class="stylish-input-group" style="width: 85%;">
                            <input type="text" class="search-bar"  >
                            <span class="input-group-addon">
                            <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                            </span> 
                        </div>
                            <img onclick="myFunction()" src="/new-design/assets/image/dashboard/horizontal_dots.png" alt="" class="w-auto chat-option" style="position: absolute;
                            margin: -1%;">
                            <div id="myDropdown" class="dropdown-content">
                                <a href="#home">Home</a>
                                <a href="#about">About</a>
                                <a href="#contact">Contact</a>
                            </div>
                    </div>
                </div>
                <div class="mesgs chat-history col-12">
                    <p class="sending" style="display:none;text-align: center;"><b>Sending...</b></p>
                    <div class="msg_history messages-content" id="chat-text">
                        <input type="hidden" name="" id="user_id" value="{{request()->id}}">
                        @foreach($messages as $k => $msg)
                            @php 
                                $attachment = null;
                                if($msg->attachment) {
                                    $attachment = json_decode($msg->attachment);                                                           
                                }
                            @endphp
                            @if($msg->from_id != auth()->user()->id)
                                <div class="incoming_msg">
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            @if(@$attachment->old_name)
                                                <p class="chat_p">
                                                    <a href="{{ route(config('chatify.attachments.download_route_name'), ['fileName'=>@$attachment->new_name, 'ogName'=>@$attachment->old_name]) }}" class="file-download">
                                                                <span class="fa fa-file"></span> {{@$attachment->old_name}}</a>
                                            @else
                                                <p class="chat_p"> {{$msg->body}}   <i class="fa-thin fa-check-double"></i>
                                            @endif
                                            <span class="time_date"> {{date('g:i A', strtotime($msg->created_at))}}    |    {{$msg->created_at->diffForHumans()}}</span></p>                         
                                        </div>
                                    </div>
                                </div>
                            @else 
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        @if(@$attachment->old_name)
                                            <p class="chat_p">
                                                <a href="{{ route(config('chatify.attachments.download_route_name'), ['fileName'=>@$attachment->new_name, 'ogName'=>@$attachment->old_name]) }}" class="file-download">
                                                            <span class="fa fa-file"></span> {{@$attachment->old_name}}</a>
                                        @else
                                            <p class="chat_p"> {{$msg->body}}   <i class="fa-thin fa-check-double"></i>
                                        @endif
                                        <span class="time_date"> {{date('g:i A', strtotime($msg->created_at))}}    |    {{$msg->created_at->diffForHumans()}}</span></p>                                       
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="type_msg">
                        <form id="message-form" method="POST" action="{{ route('send.message') }}" onsubmit="return false;">
                            @csrf()
                            <div class="drop_box" id="fileUpload" style="display: none;">
                                <header>
                                    <h4>Select File here</h4>
                                </header>
                                <p>Files Supported: PDF, TEXT, DOC , DOCX</p>
                                <p id="filehere" style="display: none;"></p>
                                <input type="file" accept=".pdf" class="upload-attachment" name="file" id="fileID" style="display:none;">
                                <button class="btn">Choose File</button>
                            </div>
                            <div class="input_msg_write" style="display: flex;">
                                <div style="margin: 2%;">
                                    <img src="/new-design/assets/image/dashboard/document.png" onclick="showFile()" alt="" class="w-auto">
                                </div>
                                <div>
                                    <img src="/new-design/assets/image/dashboard/emoji.png" onclick="showEmoji()"  alt="" class="w-auto" style="position: absolute;
                                    height: 22px;
                                    margin: 2%;
                                    margin-left: 0%;">
                                </div> 
                                <input type="text" id="fname" class="write_msg m-send" placeholder="Type a message" style="padding-left: 5%;font-size: 20px;">
                                <button class="msg_send_btn" type="button" onclick="sendMessage()"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                            </div>                            
                        </form>
                    </div>
                    @include('lawyer.pages.chat.emojis')
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        const getMessengerId = () => $("meta[name=id]").attr("content");
        const access_token = $('meta[name="csrf-token"]').attr("content");

        $("#chat-text").animate({ scrollTop: $('#chat-text').prop("scrollHeight")}, 1000);

        function sendMessage() {
            document.getElementById('fileUpload').style.display = "none";
            const messagesContainer = $(".chat-history");
            const messageInput = $("#message-form .m-send")
            const inputValue = $.trim(messageInput.val());
            $(".sending").css('display', 'block');
            $(".sending").css('text-align', 'center');
            var msg = $(".write_msg").val();
            var toId = $("#user_id").val();
            $("#fname").val("")            
            let hasFile = !!$(".upload-attachment").val();  
            const formData = new FormData($("#message-form")[0]);            
            formData.append("_token", access_token);
            formData.append("msg", msg);
            $.ajax({
                method:"post",
                url: "/chat-with-user/"+toId,
                data: formData,
                dataType: "JSON",
                processData: false,
                contentType: false,
                beforeSend: () => {   
                },
                success: function(res){        
                    console.log(res)
                    $("#chat-text").animate({ scrollTop: $('#chat-text').prop("scrollHeight")}, 1000);
                    $('#chat-text').scrollTop($('#chat-text')[0].scrollHeight);
                }
            });
        }

        function chatWithUser(userId) {
            window.location.href = "/lawyer/chat-with-user/"+userId;
        }

        var pusher = new Pusher('a34a416e0fe588185c8e', {
            cluster: 'ap2'
        });

        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('post-comment');

        // Bind a function to a Event (the full Laravel class)
        channel.bind('App\\Events\\PostComment', function(data) {
            if(data.type === "endUserMsg") {
                $.ajax({
                    method:"post",
                    url: "/user/latest-group-chat",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'data':data
                    },
                    success: function(res){
                        // $(".all-posts-"+data.postComment.post_id).empty();
                        $(".sending").css('display', 'none');
                        $(".messages-content").append(res);
                        $("#chat-text").animate({ scrollTop: $('#chat-text').prop("scrollHeight")}, 1000);
                    }
                });
            }
        }); 
    </script>
@endpush