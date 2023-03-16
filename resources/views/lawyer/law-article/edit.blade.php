@extends('lawyer.layouts.navbar_content')

@section('title', 'Articles')

@section('content')
    @include('admin.layouts.flash-message')
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Update Article</h5>
            <div class="card-body">
                <form action="{{route('lawyer.article.update', $article->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf()
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <select name="category" id="" class="form-control">
                            @foreach($categories as $k => $category) 
                                <option value="{{$k}}" {{$article->category_id == $k ? 'selected' : ''}}>{{$category}}</option>
                            @endforeach
                        </select>
                        @error('title')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Add Title" value="{{$article->title}}" />
                        @error('title')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" id="exampleFormControlInput1" placeholder="Add Image" />
                        @error('image')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror  
                    </div>
                    <p>Uploaded Image: </p>
                    @if($article->image)
                        <img src="/storage/{{$article->image}}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                    @endif
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="ckeditor form-control" placeholder="Add Description">{{$article->descr}}</textarea>
                        @error('description')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror  
                    </div>
                    <div class="card-footer" style="float:right;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection