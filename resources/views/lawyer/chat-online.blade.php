@extends('lawyer/layouts/navbar_content')

@section('title', 'Requests: Chat Online')

@section('content')
    @include('admin.layouts.flash-message')
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
                        <th style="text-align: center;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($onlineRequests as $k => $request)
                        <tr style="text-align: center;">
                            <td>{{$request->user->name}}</td>
                            <td>{{$request->user->email}}</td>
                            <td>{{$request->comment}}</td>
                            <td>
                                @if(!$request->status)
                                    <div class="form-check form-switch mb-2"  style="padding-left: 7.5em;">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" request_id="{{$request->id}}" {{$request->status ? 'checked' : ''}} onchange="acceptRequest(this)">
                                    </div>
                                @else 
                                    Yes
                                @endif
                            </td>
                            <td>
                                @if(!$request->complete)
                                    <div class="form-check form-switch mb-2"  style="padding-left: 7.5em;">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" complete_id="{{$request->id}}" {{$request->complete ? 'checked' : ''}} onchange="completed(this)">
                                    </div>
                                @else 
                                    Yes
                                @endif
                            </td>
                            <td>
                                @if($request->status)
                                    @if($request->complete)
                                        <a href="/online-chat/{{$request->user_id}}" target="_blank">Chat History</a>
                                    @else 
                                        <a href="/online-chat/{{$request->user_id}}" target="_blank">Chat Here</a>                                
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
@endsection
@push('script')
    <script>
        function acceptRequest(data) {
            Swal.fire({
                title: "Are you sure?",
                text: "Are you sure you want to accept this request?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "green",
                confirmButtonText: "Yes, accept it!",
                cancelButtonColor: "red",
                cancelButtonText: "Cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
            })
            .then((verify) => {
                if (verify.isConfirmed) {
                    var request_id = $(data).attr('request_id');
                    var status = $(data).val();
                    $.ajax({
                        method:"post",
                        url: "/lawyer/accept/chat-online-request/"+request_id,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'status': status
                        },
                        success: function(res){
                            if(res === "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Accepted',
                                    text: 'Success'
                                })
                            }else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops. Someone already accepted this request just before you',
                                    text: 'Error'
                                })
                            }

                            setTimeout(window.location.reload.bind(window.location), 1000);
                        }
                    });
                } else {
                    Swal.fire("Cancelled!");
                }
            });
        }

        function completed(data) {
            Swal.fire({
                title: "Are you sure?",
                text: "Are you sure you want to mark it as completed?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "green",
                confirmButtonText: "Yes, mark it as completed!",
                cancelButtonColor: "red",
                cancelButtonText: "Cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
            })
            .then((verify) => {
                if (verify.isConfirmed) {
                    var complete_id = $(data).attr('complete_id');
                    var status = $(data).val();
                    $.ajax({
                        method:"post",
                        url: "/lawyer/complete/chat-online-request/"+complete_id,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'status': status
                        },
                        success: function(){
                            Swal.fire({
                                icon: 'success',
                                title: 'Completed',
                                text: 'Success'
                            })
                            setTimeout(window.location.reload.bind(window.location), 1000);
                        }
                    });
                } else {
                    Swal.fire("Cancelled!");
                }
            });
        }
    </script>
@endpush
