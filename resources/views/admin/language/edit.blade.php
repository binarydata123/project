@extends('admin.layouts.navbar_content')

@section('title', 'Languages')

@section('content')
    @include('admin.layouts.flash-message')
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Update Language</h5>
            <div class="card-body">
                <form action="{{route('admin.language.update', $language->id)}}" method="POST">
                    @csrf()
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Language</label>
                        <input type="text" class="form-control" name="language" id="exampleFormControlInput1" placeholder="Add Language" value="{{$language->language}}" />
                        @error('language')
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