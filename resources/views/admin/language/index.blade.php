@extends('admin.layouts.navbar_content')

@section('title', 'Languages')

@section('content')
    @include('admin.layouts.flash-message')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Languages</h5>
            <div class="col-md-12" >
                <button type="button" class="btn btn-info" style="float: right;margin-right:2%;"><a href="{{route('admin.language.create')}}" style="color:white;">Add Language</a></button>
            </div>
        </div>
        <div class="card-body">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th style="text-align: center;">Language</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($languages as $k => $language)
                        <tr style="text-align: center;">
                            <td>{{$language->language}}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.language.edit', $language->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="{{route('admin.language.delete', $language->id)}}" onclick="return confirm('Are you sure?')"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection