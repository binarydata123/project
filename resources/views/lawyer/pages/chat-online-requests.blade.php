@extends('lawyer.home.layouts.app')
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
                                    <td style="text-align: center;">{{$request->user->name}}</td>
                                    <td style="text-align: center;">{{$request->user->email}}</td>
                                    <td style="text-align: center;">{{$request->comment}}</td>
                                    <td style="text-align: center;">
                                        @if(!$request->status)
                                            <div class="form-check form-switch mb-2"  style="padding-left: 7.5em;">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" request_id="{{$request->id}}" {{$request->status ? 'checked' : ''}} onchange="acceptRequest(this)">
                                            </div>
                                        @else 
                                            Yes
                                        @endif
                                    </td>
                                    <td style="text-align: center;">
                                        @if(!$request->complete)
                                            <div class="form-check form-switch mb-2"  style="padding-left: 7.5em;">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" complete_id="{{$request->id}}" {{$request->complete ? 'checked' : ''}} onchange="completed(this)">
                                            </div>
                                        @else 
                                            Yes
                                        @endif
                                    </td>
                                    <td style="text-align: center;">
                                        @if($request->status)
                                            @if($request->complete)
                                                <a href="/online-chat/{{$request->user_id}}" target="_blank" style="color:#208c84;">Chat History</a>
                                            @else 
                                                <a href="/online-chat/{{$request->user_id}}" target="_blank" style="color:#208c84;">Chat Here</a>                                
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
