@extends('admin.layouts.navbar_content')

@section('title', 'Blogs & Articles')

@section('content')
    @include('admin.layouts.flash-message')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Blogs & Articles</h5>
            <div class="col-md-12" >
                <button type="button" class="btn btn-info" style="float: right;margin-right:2%;"><a href="{{route('admin.blogs-article.create')}}" style="color:white;">Add Blogs & Article</a></button>
            </div>
        </div>
        <div class="card-body">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th style="text-align: center;">Title</th>
                        <th style="text-align: center;">Written By</th>
                        <th style="text-align: center;">Image</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($blogsArticles as $k => $article)
                        <tr style="text-align: center;">
                            <td>{!! $article->title !!}</td>
                            <td>{{$article->written_by}}</td>
                            <td>
                                <img src="{{$article->image}}" alt="" style="height:100px;width:auto">
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.blogs-article.edit', $article->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="{{route('admin.blogs-article.delete', $article->id)}}" onclick="return confirm('Are you sure?')"><i class="bx bx-trash me-1"></i> Delete</a>
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