<div class="modal-header">
    @if($forum->title)
        <h5 class="modal-title" id="modalCenterTitle">{{$forum->title}}</h5>
    @endif
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="col-md-12 col-lg-12">
        <div class="card text-center mb-3" style="background-color: aliceblue;cursor:pointer;"  data-bs-toggle="modal" onclick="forumModal('{{$forum->id}}')">
            <div class="card-body">
                <p class="card-text">{{$forum->message}}</p> 
                <p><small>Posted On: {{$forum->created_at->diffForHumans();}}</small></p>
                
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
    @if($forum->is_verified)
        <button type="button" class="btn btn-danger" onclick="verifyForum('{{$forum->id}}', 0)" data-bs-dismiss="modal">Move To Pending</button>
    @else 
        <button type="button" class="btn btn-primary" onclick="verifyForum('{{$forum->id}}', 1)" data-bs-dismiss="modal">Approve</button>
    @endif
    @if(!$forum->deleted_at)
        <a href="{{route('admin.delete.forum', $forum->id)}}" type="submit" class="btn btn-danger nav-item p-2" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o">Delete It</i></a>
    @endif
</div>