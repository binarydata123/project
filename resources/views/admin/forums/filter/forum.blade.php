@foreach($forums as $k => $forum)
    <div class="col-md-6 col-lg-4">
        <div class="card text-center mb-3" style="background-color: aliceblue;">
            @if(!$forum->title)
                <form action="{{route('admin.forum.add-title', $forum->id)}}" method="post">
                    @csrf()
                    <div class="input-group p-3">
                        <input type="text" class="form-control" name="title" placeholder="Please add title" aria-label="Title" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Save</button>
                    </div>
                </form>
            @endif
            <div class="card-body" data-bs-toggle="modal" onclick="forumModal('{{$forum->id}}')">
                @if($forum->title)
                    <h5 class="card-title">{{$forum->title}}</h5>
                @endif
                <p class="card-text">{{Str::limit($forum->message, 100)}}</p>
                <p><small>Posted On: {{$forum->created_at->diffForHumans()}}</small></p>                
            </div>
            <div class="card-footer">
                @if($forum->is_verified)
                    <input type="hidden" name="status" value=1>
                    <button type="button" class="btn btn-danger" onclick="verifyForum('{{$forum->id}}', 0, '{{$forum->title}}')">Move To Pending</button>
                @else 
                    <input type="hidden" name="status" value=0>
                    <button type="button" class="btn btn-primary" onclick="verifyForum('{{$forum->id}}', 1, '{{$forum->title}}')">Approve</button>
                @endif
            </div>
        </div>
    </div>
@endforeach
{{ $forums->links() }}