function addDropdownValue(value) {
    $("#post-dropdown").empty();
    $("#post-dropdown").append(value);
    $("#toWhome").empty();
    $("#toWhome").val(value);
}

function imagePreview(data) {
    $("#post").empty();
    $("#post").css("display", "block");
    $('.Disable').prop("disabled", false);
    $('.post-btn').addClass("post-block")
    document.getElementById('post').src = window.URL.createObjectURL(data.files[0])
}

// document.getElementById('fileInput').click();


function addComment(postId) {
    var comment = $("#add-comment-"+postId).val();
    if(comment) {
        $.ajax({
            method:"post",
            url: "/add/comment-post/"+postId,
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                'comment': comment
            },
            success: function(data){                        
                $(".emojionearea-editor").empty();
                toastr.success("Added comment successfully");
                $("#feed-comments-"+postId).empty();
                $("#comments-count-"+postId).empty();
                $("#comments-count-"+postId).append(data.commentsCount);
                $("#feed-comments-"+postId).append(data.comments);
            }
        });
    }
}

function enableButton(data) {
    var value = $(data).val();
    var image = $("#post").val();
    if(!image) {
        if(value.length < 1) {
            $('.Disable').prop("disabled", true);
            $('.post-btn').removeClass("post-block")
        }else {
            $('.Disable').prop("disabled", false);
            $('.post-btn').addClass("post-block");   
        }
    }
}

function likePost(postId) {
    $.ajax({
        method:"post",
        url: "/like/post/"+postId,
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){                        
            if(data.message === "added") {
                $(".like-click-"+postId).css("fill", "red");
                $(".like-click-"+postId).css("color", "red");
                $("#likes-count-"+postId).empty();
                $("#likes-count-"+postId).append(data.likesCount);
            }else {
                $(".like-click-"+postId).css("fill", "none");
                $(".like-click-"+postId).css("color", "black");
                $("#likes-count-"+postId).empty();
                $("#likes-count-"+postId).append(data.likesCount);
            }
        }
    });
}

$(document).on('click', '#postId', function(e){

    e.preventDefault();

    var url = $(this).data('url');

    $('#dynamic-share').html(''); // leave it blank before ajax call

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'html'
    })
    .done(function(data){
        console.log(data);
        
        $('#dynamic-share').html('');    
        $('#dynamic-share').html(data); // load response 
    })
    .fail(function(){
        $('#dynamic-share').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#modal-loader').hide();
    });
});

function sharePost(postId) {
    var comment = $("#share-post-comment").val();
    $.ajax({
        method:"post",
        url: "/create/post",
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "postId": postId,
            "comment": comment,
        },
        success: function(data){                        
            location.reload();
        }
    });
}