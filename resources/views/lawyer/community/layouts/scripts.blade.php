@include('layouts.sections.scriptsIncludes')
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/theme-vendors.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>    
    <!-- latest jquery-->
    <script src="{{asset('community/assets/js/jquery-3.6.0.min.js')}}"></script>
    
    <!-- popper js-->
    <script src="{{asset('community/assets/js/popper.min.js')}}"></script>
    
    <!-- slick slider js -->
    <script src="{{asset('community/assets/js/slick.js')}}"></script>
    <script src="{{asset('community/assets/js/custom-slick.js')}}"></script>
    
    <!-- chatbox js -->
    <script src="{{asset('community/assets/js/chatbox-2.js')}}"></script>
    
    <!-- counter js -->
    <script src="{{asset('community/assets/js/counter.js')}}"></script>
    
    <!-- popover js for custom popover -->
    <script src="{{asset('community/assets/js/popover.js')}}"></script>
    
    <!-- feather icon js-->
    <script src="{{asset('community/assets/js/feather.min.js')}}"></script>
    
    <!-- map js -->
    <script src="{{asset('community/assets/js/custom_map.js')}}"></script>
    
    <!-- emoji picker js-->
    <script src="{{asset('community/assets/js/emojionearea.min.js')}}"></script>
    
    <!-- Bootstrap js-->
    <script src="{{asset('community/assets/js/bootstrap.js')}}"></script>
    
    <!-- lazyload js-->
    <script src="{{asset('community/assets/js/lazysizes.min.js')}}"></script>
    
    <!-- theme setting js-->
    <script src="{{asset('community/assets/js/theme-setting.js')}}"></script>
    <script src="{{asset('community/assets/select2/js/select2.full.min.js')}}"></script>

    <!-- Theme js-->
    <script src="{{asset('community/assets/js/script.js')}}"></script>
    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
    
    <script>
        const getMessengerId = () => $("meta[name=id]").attr("content");
        const access_token = $('meta[name="csrf-token"]').attr("content");
        auth_id = $("meta[name=url]").attr("data-user");
        var messenger,
            typingTimeout,
            typingNow = 0,
            temporaryMsgId = 0,
            defaultAvatarInSettings = null,
            messengerColor,
            dark_mode,
            messages_page = 1;

        function handleVisibilityChange() {
            if (!document?.hidden) {
                makeSeen(true);
            }
        }

        document.addEventListener("visibilitychange", handleVisibilityChange, false);

        function makeSeen(status) {
            console.log("first");
            if (document?.hidden) {
                return;
            }
            // seen
            $.ajax({
                url: "/lawyer/community/group/make-seen",
                method: "POST",
                data: { _token: access_token, id: getMessengerId() },
                dataType: "JSON",
                success: function(res) {
                    console.log("----")
                    console.log(res)
                    console.log("----")
                    if(res == 1) {
                        groupSeen(auth_id, getMessengerId(), status)
                    }
                    console.log("[seen] Messages seen - " + getMessengerId());
                }
            });
            
            // return channel.trigger("group-seen", {
            //     from_id: auth_id, // Me
            //     group_id: getMessengerId(), // Messenger
            //     seen: data.status,
            // });
        }

        function groupSeen(fromId, groupId, status) {
            if (groupId == getMessengerId() && fromId == auth_id) {
                if (status) {
                    $(".msg-seen")
                        .find(".fa-check")
                        .before('<span class="fas fa-check-double seen"></span> ');
                    $(".msg-seen").find(".fa-check").remove();
                    console.info("[seen] triggered!");
                } else {
                    console.error("[seen] event not triggered!");
                }
            }
        }
        // channel.bind("group-seen", function (data) {
        //     if (data.group_id == getMessengerId() && data.from_id == auth_id) {
        //         if (data.seen == true) {
        //         $(".msg-seen")
        //             .find(".fa-check")
        //             .before('<span class="fas fa-check-double seen"></span> ');
        //         $(".msg-seen").find(".fa-check").remove();
        //         console.info("[seen] triggered!");
        //         } else {
        //         console.error("[seen] event not triggered!");
        //         }
        //     }
        // });

        $('.comment-section .main-comment').hide();
        feather.replace();
        $(".emojiPicker").emojioneArea({
            inline: true,
            placement: 'absleft',
            pickerPosition: "top left",
        });

       
        $('#lawyer-multiselect').select2({
            width: '100%',
            placeholder: "Select Lawyer",
            allowClear: true,
            closeOnSelect:false,
        })

        // Enable pusher logging - don't include this in production
        // Pusher.logToConsole = true;

        var pusher = new Pusher('a34a416e0fe588185c8e', {
        cluster: 'ap2'
        });

        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('post-comment');

        // Bind a function to a Event (the full Laravel class)
        channel.bind('App\\Events\\PostComment', function(data) {
            if(data.type === "comment") {
                $.ajax({
                    method:"post",
                    url: "/lawyer/updated-comment",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'data':data
                    },
                    success: function(res){
                        $(".all-comments-"+data.postComment.post_id).empty();
                        $(".all-comments-"+data.postComment.post_id).prepend(res.comments);
                        $("#commentCounts_"+data.postComment.post_id).empty();
                        $("#commentCounts_"+data.postComment.post_id).prepend(res.count);
                    }
                });
            }else if(data.type === "post") {
                $.ajax({
                    method:"post",
                    url: "/lawyer/updated-post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'data':data
                    },
                    success: function(res){
                        // $(".all-posts-"+data.postComment.post_id).empty();
                        $(".all-posts").prepend(res);
                    }
                });
            }else if(data.type === "groupPost") {
                $.ajax({
                    method:"post",
                    url: "/lawyer/updated-post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'data':data
                    },
                    success: function(res){
                        // $(".all-posts-"+data.postComment.post_id).empty();
                        $(".all-group-posts").prepend(res);
                    }
                });
            }else if(data.type === "groupMessage") {
                $.ajax({
                    method:"post",
                    url: "/lawyer/community/group/latest-group-chat",
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

        var input = document.getElementById("msgFieldFirst");
        input.addEventListener("keyup", function(event) {
            if (event.code === "Enter") {
                sendMessage()
            }
        });

        function sendMessage() {
            temporaryMsgId += 1;
            let tempID = `temp_${temporaryMsgId}`;
            const messagesContainer = $(".chat-history");
            const messageInput = $("#message-form .m-send")
            const inputValue = $.trim(messageInput.val());
            $(".sending").css('display', 'block');
            $(".sending").css('text-align', 'center');
            var msg = $(".emojionearea-editor").text();
            var groupId = $("#groupId").val();
            $("#msgField").val("")            
            $(".emojionearea-editor").empty();
            let hasFile = !!$(".upload-attachment").val();  
            // const formData = "abcd";
            const formData = new FormData($("#message-form")[0]);            
            formData.append("_token", access_token);
            formData.append("temporaryMsgId", tempID);
            formData.append("msg", msg);
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
                    if (hasFile) {
                    messagesContainer
                        .find(".messages")
                        .append(
                        sendTempMessageCard(
                            inputValue + "\n" + loadingSVG("28px"),
                            tempID
                        )
                        );
                    } else {
                    messagesContainer
                        .find(".messages")
                        .append(sendTempMessageCard(inputValue, tempID));
                    }
                    // scroll to bottom
                    scrollToBottom(messagesContainer);
                    messageInput.css({ height: "42px" });
                    // form reset and focus
                    $("#message-form").trigger("reset");
                    cancelAttachment();
                    messageInput.focus();
                },
                success: function(res){                    
                    $("#chat-text").animate({ scrollTop: $('#chat-text').prop("scrollHeight")}, 1000);
                    $('#chat-text').scrollTop($('#chat-text')[0].scrollHeight);
                }
            });
            // }
        }

        function sendTempMessageCard(message, id) {
  
            console.log("message", message);
            return `
            <div class="message-card mc-sender" data-id="${id}">
                <p>
                    ${message}
                    <sub>
                        <span class="far fa-clock"></span>
                    </sub>
                </p>
            </div>
            `;
        }

        function cancelAttachment() {
            $(".message-box").find(".attachment-preview").remove();
            $(".upload-attachment").replaceWith(
                $(".upload-attachment").val("").clone(true)
            );
        }

        function scrollToBottom(container) {
            $(container)
                .stop()
                .animate({
                scrollTop: $(container)[0].scrollHeight,
                });
        }


        const escapeHtml = (unsafe) => {
            return unsafe
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;");
            };

        function loadingSVG(size = "25px", className = "", style = "") {
            return `
            <svg style="${style}" class="loadingSVG ${className}" xmlns="http://www.w3.org/2000/svg" width="${size}" height="${size}" viewBox="0 0 40 40" stroke="#ffffff">
            <g fill="none" fill-rule="evenodd">
            <g transform="translate(2 2)" stroke-width="3">
            <circle stroke-opacity=".1" cx="18" cy="18" r="18"></circle>
            <path d="M36 18c0-9.94-8.06-18-18-18" transform="rotate(349.311 18 18)">
            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur=".8s" repeatCount="indefinite"></animateTransform>
            </path>
            </g>
            </g>
            </svg>
            `;
        }

        function attachmentTemplate(fileType, fileName, imgURL = null) {
            if (fileType != "image") {
                return (
                `
            <div class="attachment-preview" style="margin-left: 5%;">
            <span class="fas fa-times cancel"></span>
            <p style="padding:0px 30px;"><span class="fas fa-file"></span> ` +
                escapeHtml(fileName) +
                `</p>
            </div>
            `
                );
            } else {
                return (
                `
            <div class="attachment-preview" style="margin-left: 5%;">
            <span class="fas fa-times cancel"></span>
            <div class="image-file chat-image" style="background-image: url('` +
                imgURL +
                `');"></div>
            <p><span class="fas fa-file-image"></span> ` +
                escapeHtml(fileName) +
                `</p>
            </div>
            `
                );
            }
        }

        $("body").on("change", ".upload-attachment", (e) => {
            let file = e.target.files[0];
            if (!attachmentValidate(file)) return false;
            let reader = new FileReader();
            let sendCard = $(".message-box");
            reader.readAsDataURL(file);
            reader.addEventListener("loadstart", (e) => {
            $("#message-form").before(loadingSVG());
            });
            reader.addEventListener("load", (e) => {
            $(".message-box").find(".loadingSVG").remove();
            if (!file.type.match("image.*")) {
                // if the file not image
                sendCard.find(".attachment-preview").remove(); // older one
                sendCard.prepend(attachmentTemplate("file", file.name));
            } else {
                // if the file is an image
                sendCard.find(".attachment-preview").remove(); // older one
                sendCard.prepend(
                attachmentTemplate("image", file.name, e.target.result)
                );
            }
            });
        });

        function attachmentValidate(file) {
            const fileElement = $(".upload-attachment");
            const { name: fileName, size: fileSize } = file;
            const fileExtension = fileName.split(".").pop();
            if (
            !getAllowedExtensions.includes(fileExtension.toString().toLowerCase())
            ) {
            alert("Only PDF format is allowed");
            fileElement.val("");
            return false;
            }
            // Validate file size.
            if (fileSize > getMaxUploadSize) {
            alert("File is too large!");
            return false;
            }
            return true;
        }

    </script>
    