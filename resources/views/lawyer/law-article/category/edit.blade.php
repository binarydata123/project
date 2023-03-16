@extends('lawyer.layouts.navbar_content')

@section('title', 'Categories')

@section('content')
    @include('admin.layouts.flash-message')
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Update Category</h5>
            <div class="card-body">
                <form action="{{route('lawyer.article.category.update', $category->id)}}" method="POST">
                    @csrf()
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Category</label>
                        <input type="text" class="form-control" name="category" id="exampleFormControlInput1" placeholder="Add Category" value="{{$category->category}}" />
                        @error('category')
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