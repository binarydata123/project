@extends('admin/layouts/navbar_content')

@section('title', 'Forums')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light"><a href="{{route('admin.dashboard')}}">Dashboard</a> /</span> Forums
</h4>
<div class="list-group list-group-horizontal-md text-md-center p-5">
    <a class="list-group-item list-group-item-action pending {{ (request()->is('admin/forums/0')) ? 'active' : '' }}" id="home-list-item" href="{{route('admin.forums', 0)}}">Pending</a>
    <a class="list-group-item list-group-item-action approved {{ (request()->is('admin/forums/1')) ? 'active' : '' }}" id="profile-list-item" href="{{route('admin.forums', 1)}}">Approved</a>
    <a class="list-group-item list-group-item-action deleted {{ (request()->is('admin/forums/2')) ? 'active' : '' }}" id="profile-list-item" href="{{route('admin.forums', 2)}}">Deleted</a>
</div>
@include('admin.layouts.flash-message')
<div class="card col-md-12">
    <div class="container">
        <div class="spinner-border spinner-border-lg text-primary" role="status" id="loader" style="position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;z-index:9999;">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="row p-2" id="forumData">
            @foreach($forums as $k => $forum)
                <div class="col-md-6 col-lg-4">
                    <input type="hidden" name="status" value={{$forum->is_verified}}>
                    <div class="card text-center mb-3" style="background-color: aliceblue;cursor:pointer;">
                        @if(!$forum->title && !$forum->deleted_at)
                            <form action="{{route('admin.forum.add-title', $forum->id)}}" method="post">
                                @csrf()
                                <div class="input-group p-3">
                                    <input type="text" class="form-control" name="title" placeholder="Please add title" aria-label="Title" aria-describedby="button-addon2">
                                    <button class="btn btn-primary" type="submit" id="button-addon2">Save</button>
                                </div>
                            </form>
                        @endif
                        @if($forum->title && !$forum->deleted_at)
                            <i class="bx bx-edit p-3" onclick="editTitle({{$forum->id}})"></i> 
                        @endif
                        <div class="card-body" data-bs-toggle="modal" onclick="forumModal('{{$forum->id}}')">
                            @if($forum->title)
                                <h5 class="card-title editTitle">{{$forum->title}}</h5>
                            @endif
                            <p class="card-text">{{Str::limit($forum->message, 100)}}</p> 
                            <p><small>Posted On: {{$forum->created_at->diffForHumans();}}</small></p>
                        </div>
                        <div class="card-footer">
                            @if(!$forum->deleted_at)
                                <button type="button" class="{{$forum->is_verified ? 'btn btn-warning' : 'btn btn-primary'}}" onclick="verifyForum('{{$forum->id}}', '{{$forum->is_verified}}', '{{$forum->title}}')">{{$forum->is_verified ? 'Move To Pending' : 'Approve'}}</button>
                                <a href="{{route('admin.delete.forum', $forum->id)}}" type="submit" class="btn btn-danger nav-item p-2" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o">Delete It</i></a>
                            @else
                                <button type="button" class="{{$forum->is_verified ? 'btn btn-warning' : 'btn btn-primary'}}" onclick="verifyForum('{{$forum->id}}', 1, '', 'deleted')">Move To Pending</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $forums->links() }}
        </div>
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script>
        $("#loader").hide();
        function verifyForum(forumId, status, title, deleted = null) { 
            if(!title && !deleted) {
                Swal.fire({
                    title: "Oops!",
                    text: "Please add title before approving",
                    icon: "info",
                    showCancelButton: false,
                    confirmButtonColor: "green",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true,
                    closeOnCancel: false
                })
            }else {
                var msg = status == "0" ? "Approve" : "Move To Pending"   
                Swal.fire({
                    title: "Are you sure?",
                    text: "Are you sure you want to "+msg+" this Forum?",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "green",
                    confirmButtonText: "Yes!",
                    cancelButtonColor: "red",
                    cancelButtonText: "Cancel!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                })
                .then((verify) => {
                    if (verify.isConfirmed) {     
                        $.ajax({
                            method:"post",
                            url: "/admin/change-status/forum/"+forumId,
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "status" : status
                            },
                            success: function(res){
                                var title = status == 0 ? "Approved" : "Moved To Pending"   
                                Swal.fire({
                                    icon: 'success',
                                    title: title,
                                    text: 'Success'
                                })
                                if(status == 0) {
                                    forums(1)
                                }else {
                                    forums(0)
                                }
                            }
                        });
                    } else {
                        Swal.fire("Cancelled!");
                    }
                });
            }
        }

        function editTitle(id) {
            $("#forumData").hide();
            $("#loader").show();
            $('#modalCenter').modal('show'); 
            $.ajax({
                method:"get",
                url: "/admin/forum/edit-title/"+id,
                data: {},
                success: function(res){
                    $(".modal-content").empty();
                    $(".modal-content").html(res);
                    $("#forumData").show();
                    $("#loader").hide();
                }
            });
        }

        function forums(status) {
            $("#forumData").empty();
            $("#loader").show();
            if(status == 0) {
                $('.approved').removeClass('active');
                $('.pending').addClass('active');
            }else {
                $('.pending').removeClass('active');
                $('.approved').addClass('active');
            }
            $.ajax({
                method:"get",
                url: "/admin/filtered-forums/"+status,
                data: {},
                success: function(res){
                    $("#loader").hide();
                    $("#forumData").append(res)
                }
            });
        }

        function forumModal(forumId) {
            $("#forumData").hide();
            $("#loader").show();
            $('#modalCenter').modal('show'); 
            $.ajax({
                method:"get",
                url: "/admin/forum-modal/"+forumId,
                data: {},
                success: function(res){
                    $(".modal-content").empty();
                    $(".modal-content").html(res);
                    $("#forumData").show();
                    $("#loader").hide();
                }
            });
        }
    </script>
@endpush