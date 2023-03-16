//CROP-IMAGE 
var $modal = $('#modal');
var $choosePhoto = $('#choosePhoto');
var image = document.getElementById('image');
var cropper;

$("body").on("change", ".image", function(e){
    var files = e.target.files;
    var done = function (url) {
        image.src = url;
        $modal.modal('show');
    };
    var reader;
    var file;
    var url;
    if (files && files.length > 0) {
        file = files[0];
        if (URL) {
            done(URL.createObjectURL(file));
        } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function (e) {
                done(reader.result);
            };
            reader.readAsDataURL(file);
        }
    }
});

$modal.on('shown.bs.modal', function () {
    cropper = new Cropper(image, {
        aspectRatio: 1,
        viewMode: 3,
        preview: '.preview'
    });
}).on('hidden.bs.modal', function () {
    cropper.destroy();
    cropper = null;
});

$("#crop").click(function(){
    canvas = cropper.getCroppedCanvas({
        width: 800,
        height: 1000,
    });
    canvas.toBlob(function(blob) {
        url = URL.createObjectURL(blob);
        var reader = new FileReader();
        reader.readAsDataURL(blob); 
        reader.onloadend = function() {
            var base64data = reader.result; 
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "/upload/story",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    'image': base64data
                },
                success: function(data){
                    console.log(data);
                    $modal.modal('hide');
                    $choosePhoto.modal('hide');
                    // alert("Crop image successfully uploaded");                    
                    toastr.success('Story added successfully');
                    setTimeout(function () {
                        location.reload(true);
                      }, 1000);
                }
            });
        }
    });
})

function cancelCropImageModal() {
    var $modal = $('#modal');
    $modal.modal('hide');
}

function showStories(userid) {
    // console.log(localStorage.getItem("storyUserId"));
    // $(".story_"+localStorage.getItem("storyUserId")).css("display","none");
    // $(".view_"+localStorage.getItem("storyUserId")).css("display","none");
    // $(".story_"+userid).show();
    // $(".view_"+userid).show();
    // localStorage.setItem("storyUserId", userid);

    $.ajax({
        method:"get",
        url: "/get-user/stories/"+userid,
        success: function(data){            
            $("#storyModel").empty()
            $("#storyModel").append(data);
            var $storyModel = $('#storyModel');
            $storyModel.modal('show');
            $(".showCloseButton").show();
        }
    });
}

function cancelStoryModal() {
    $("#storyModel").empty()
    var $modal = $('#storyModel');
    $modal.modal('toggle');
}

// $(document).ready(function() {
    // $(".story-model").modal('hide');
//     var userOrAdminId = $("#first-story").val();
//     $.ajax({
//         method:"get",
//         url: "/get-user/stories/"+userOrAdminId,
//         success: function(data){
//             $("#user-stories").empty()
//             $("#user-stories").append(data.stories);
//             $("#story-progress-bar").empty()
//             $("#story-progress-bar").append(data.storyProgressBar);
//         }
//     });
// });

// function checkStories(id) {
//     $.ajax({
//         method:"get",
//         url: "/get-user/stories/"+id,
//         success: function(data){
//             $("#user-stories").empty()
//             $("#user-stories").append(data.stories);
//             $("#story-progress-bar").empty()
//             $("#story-progress-bar").append(data.storyProgressBar);
//         }
//     });
// }

