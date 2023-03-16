@extends('admin.layouts.navbar_content')

@section('title', 'Callback Requests')
@section('content')
    @include('admin.layouts.flash-message')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Callback Requests</h5>
        </div>
        <div class="card-body">
            <table id="myTable">
                <thead>
                    <tr style="text-align: center;">
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">Contact No</th>
                        <th style="text-align: center;">Message</th>
                        <th style="text-align: center;">To Lawyer</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($callbackRequests as $k => $request)
                        <tr style="text-align: center;">
                            <td>{{$request->name}}</td>
                            <td>{{$request->email}}</td>
                            <td>{{$request->contact_no}}</td>
                            <td>{{$request->message}}</td>
                            <td>{{$request->lawyer ? $request->lawyer->name : 'Any'}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection