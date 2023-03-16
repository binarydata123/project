@extends('common.user-dashboard.layouts.app')
@section('content')
<div class="working-box">
                <section class="lawyers-part-2 p-0">
                    <div class="" id="border-full">
                        <div class="row align-items-center" id="service-pages">
                            <div class="col-md-6 col-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <ul class="d-flex1">
                                    <li>
                                        <h4>Chat Requests</h4>
                                    </li>
                                </ul>
                            </div>
                        </div>                        
                        <div class="table-responsive table-wdes">
                            <table class="table mt-5 ">
                                <thead class="thead-th">
                                    <tr style="border-bottom: 2px solid #C2DDE4;">
                                        <th style="text-align: center;">Name</th>
                                        <th style="text-align: center;">Email</th>
                                        <th style="text-align: center;">Comments</th>
                                        <th style="text-align: center;">Accepted</th>
                                        <th style="text-align: center;">Completed</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                @foreach($chatRequests as $k => $request)
                                <tr style="text-align: center;">
                                    <td style="text-align: center;">{{$request->lawyer->user->name}}</td>
                                    <td style="text-align: center;">{{$request->lawyer->user->email}}</td>
                                    <td style="text-align: center;">{{$request->comment}}</td>
                                    <td style="text-align: center;">
                                        {{$request->status ? "Yes" : "No"}}
                                    </td>
                                    <td style="text-align: center;">
                                       {{$request->complete ? 'Yes' : 'No'}}
                                    </td>
                                    <td style="text-align: center;">
                                        @if($request->status)
                                            @if($request->complete)
                                                <a href="/online-chat/{{$request->lawyer->user_id}}" target="_blank" style="color:#208c84;">Chat History</a>
                                            @else 
                                                <a href="/online-chat/{{$request->lawyer->user_id}}" target="_blank" style="color:#208c84;">Chat Here</a>                                
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
                        <div class="  was-validated" id="pagination-class">
                            {{$chatRequests->links()}}
                        </div>
                    </div>
                </section>


                


        </div>

@endsection