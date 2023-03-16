<form action="{{route('admin.forum.update-title', $forumTitle->id)}}" method="post">
    @csrf()
    <div class="input-group p-3">
        <input type="text" class="form-control" name="title" value="{{$forumTitle->title}}" aria-label="Title" aria-describedby="button-addon2">
        <button class="btn btn-primary" type="submit" id="button-addon2">Update</button>
    </div>
</form>