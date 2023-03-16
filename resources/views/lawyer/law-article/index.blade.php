@extends('lawyer.layouts.navbar_content')

@section('title', 'Articles')

@section('content')
    @include('admin.layouts.flash-message')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Articles</h5>
            <div class="col-md-12" >
                <button type="button" class="btn btn-primary" style="float: right;"><a href="{{route('lawyer.article.create')}}" style="color:white;">Add Article</a></button>
            </div>
            <div class="col-md-12" >
                <button type="button" class="btn btn-info" style="float: right;margin-right:2%;"><a href="{{route('lawyer.article.categories')}}" style="color:white;">Categories</a></button>
            </div>
        </div>
        <div class="card-body">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th style="text-align: center;">Category</th>
                        <th style="text-align: center;">Title</th>
                        <!-- <th style="text-align: center;">Description</th> -->
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($articles as $k => $article)
                        <tr style="text-align: center;">
                            <td>{{$article->category ? $article->category->category : '-'}}</td>
                            <td>{{$article->title}}</td>
                            <!-- <td>{{$article->descr}}</td> -->
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('lawyer.article.edit', $article->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="{{route('lawyer.article.delete', $article->id)}}" onclick="return confirm('Are you sure?')"><i class="bx bx-trash me-1"></i> Delete</a>
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