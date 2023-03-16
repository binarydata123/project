@extends('admin/layouts/navbar_content')

@section('title', 'Dashboard - Analytics')
@section('page-script')
    <script src="{{asset('assets/js/arbitration-area.js')}}"></script>
@endsection

@section('content')
    @include('admin.layouts.flash-message')
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Add Arbitration Area</h5>
            <div class="card-body">
                <form action="{{route('admin.store.arbitration-area')}}" method="POST">
                    @csrf()
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Area</label>
                        <input type="text" class="form-control" name="area" id="exampleFormControlInput1" placeholder="Arbitration Area" />
                        @error('area')
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