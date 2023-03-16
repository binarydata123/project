@extends('common.layouts.app')
@section('content')
    <!-- start page title -->
    <section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small for-lawyers-breadcrumb">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-start">Online Chat Requests</h1>
                </div>
                <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <ul class="xs-text-center">
                        <li><a href="/">Home</a></li>
                        <li>Online Chat Requests</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="big-section wow animate__fadeIn" style="background-color: white;">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Requests</h5>
                </div>
                <div class="card-body">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Email</th>
                                <th style="text-align: center;">Comments</th>
                                <th style="text-align: center;">Accepted</th>
                                <th style="text-align: center;">Completed</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chatRequests as $k => $request)
                                <tr style="text-align: center;">
                                    <td>{{$request->lawyer->user->name}}</td>
                                    <td>{{$request->lawyer->user->email}}</td>
                                    <td>{{$request->comment}}</td>
                                    <td>
                                        {{$request->status ? "Yes" : "No"}}
                                    </td>
                                    <td>
                                       {{$request->complete ? 'Yes' : 'No'}}
                                    </td>
                                    <td>
                                        @if($request->status)
                                            @if($request->complete)
                                                <a href="/online-chat/{{$request->lawyer->user_id}}" target="_blank" style="color:blue;">Chat History</a>
                                            @else 
                                                <a href="/online-chat/{{$request->lawyer->user_id}}" target="_blank" style="color:blue;">Chat Here</a>                                
                                            @endif
                                        @else 
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection