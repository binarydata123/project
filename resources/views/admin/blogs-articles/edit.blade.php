@extends('admin.layouts.navbar_content')

@section('title', 'Blogs & Article')

@section('content')
    @include('admin.layouts.flash-message')
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Update Blogs & Article</h5>
            <div class="card-body">
                <form action="{{route('admin.blogs-article.update', $blog->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf()
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Add Title" value="{{$blog->title}}" />
                        @error('title')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" id="exampleFormControlInput1" placeholder="Upload Image" />
                        @error('image')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror   
                    </div>
                    <p>Uploaded Image: </p>
                    @if($blog->image)
                        <img src="{{$blog->image}}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                    @endif
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Written By</label>
                        <input type="text" class="form-control" name="written_by" id="exampleFormControlInput1" placeholder="Written By" value="{{old('written_by') ?? $blog->written_by}}" />
                        @error('written_by')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror   
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Short Description</label>
                        <input type="text" name="short_description" id="" class="form-control" placeholder="Add Short Description" value="{{old('short_description') ?? $blog->description}}">
                        @error('short_description')
                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                        @enderror   
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="ckeditor form-control" placeholder="Add Description">
                            {{old('description') ?? $blog->full_descr}}
                        </textarea>
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