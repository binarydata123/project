@extends('admin.layouts.navbar_content')

@section('title', 'Chat Requests')
@section('content')
    <div class="list-group list-group-horizontal-md text-md-center p-5">
        <a class="list-group-item list-group-item-action pending {{ (request()->is('admin/chat/requests')) ? 'active' : '' }}" id="home-list-item" href="{{route('admin.chat.requests', 0)}}">All</a>
        <a class="list-group-item list-group-item-action pending {{ (request()->is('admin/chat/requests/0')) ? 'active' : '' }}" id="home-list-item" href="{{route('admin.pending.chat.requests', 0)}}">Pending</a>
        <a class="list-group-item list-group-item-action approved {{ (request()->is('admin/chat/requests/1')) ? 'active' : '' }}" id="profile-list-item" href="{{route('admin.pending.chat.requests', 1)}}">Accepted</a>
        <a class="list-group-item list-group-item-action deleted {{ (request()->is('admin/chat/requests/2')) ? 'active' : '' }}" id="profile-list-item" href="{{route('admin.pending.chat.requests', 2)}}">Completed</a>
    </div>
    @include('admin.layouts.flash-message')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Chat Requests</h5>
        </div>
        <div class="card-body">
            <table id="myTable">
                <thead>
                    <tr style="text-align: center;">
                        <th style="text-align: center;">User Name</th>
                        <th style="text-align: center;">Lawyer Name</th>
                        <th style="text-align: center;">Comment</th>
                        <th style="text-align: center;">Status</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($chatRqsts as $k => $request)
                        @if($request->lawyer)
                            <tr style="text-align: center;">
                                <td>{{$request->user->name}} - ({{$request->user->email}})</td>
                                <td>{{$request->lawyer->user->name}} - ({{$request->lawyer->user->email}})</td>
                                <td>{{$request->comment}}</td>
                                @if($request->status == 0 || $request->status == 1 && $request->complete == 0)
                                    <td>{{$request->status == 1 ? 'Accepted' : 'Pending'}}</td>
                                @else 
                                    <td>Completed</td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection