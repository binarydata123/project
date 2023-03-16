@extends('admin.layouts.navbar_content')

@section('title', 'QA Ratings')

@section('content')
    @include('admin.layouts.flash-message')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">QA Ratings</h5>
        </div>
        <div class="card-body">
            <table id="myTable">
                <thead>
                    <tr style="text-align: center;">
                        <!-- <th style="text-align: center;">Question</th>
                        <th style="text-align: center;">Answer</th>
                        <th style="text-align: center;">Lawyer</th> -->
                        <th style="text-align: center;">Rating</th>
                        <th style="text-align: center;">Comment</th>
                        <th style="text-align: center;">Rated By</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($ratings as $k => $rate)
                        <tr style="text-align: center;">
                            <!-- <td>{{$rate->answer->forum->message}}</td>
                            <td>{{$rate->answer->answer}}</td>
                            <td>{{$rate->answer->lawyer->name}}</td> -->
                            <td>
                                <i class="bx bx-star" style="color:{{$rate->rate >= 1 ? 'red' : ''}}"></i>
                                <i class="bx bx-star" style="color:{{$rate->rate >= 2 ? 'red' : ''}}"></i>
                                <i class="bx bx-star" style="color:{{$rate->rate >= 3 ? 'red' : ''}}"></i>
                                <i class="bx bx-star" style="color:{{$rate->rate >= 4 ? 'red' : ''}}"></i>
                                <i class="bx bx-star" style="color:{{$rate->rate >= 5 ? 'red' : ''}}"></i>
                            </td>
                            <td>{{$rate->comment ?? 'No Comment'}}</td>
                            <td>{{$rate->user->name}}</td>
                            <td>
                                <div class="form-check form-switch mb-2"  style="padding-left: 3.5em;">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" rate_id="{{$rate->id}}" {{$rate->is_verified ? 'checked' : ''}} onchange="verifyRating(this, {{$rate->is_verified}})"></td>
                                </div>
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
        function verifyRating(data, isVerified) {
            var msg = isVerified == 0 ? 'Verify' : "Unverify"
            Swal.fire({
                title: "Are you sure?",
                text: "Are you sure you want to "+msg+" this Rating?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "green",
                confirmButtonText: "Yes, "+msg+" it!",
                cancelButtonColor: "red",
                cancelButtonText: "Cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
           })
            .then((verify) => {
                if (verify.isConfirmed) {
                    var ratingId = $(data).attr('rate_id');
                    var status = $(data).val();
                    var msg = isVerified == 0 ? 'Verify' : "Unverify"
                    $.ajax({
                        method:"post",
                        url: "/admin/verify/rating/"+ratingId,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'status': status
                        },
                        success: function(){
                            Swal.fire({
                                icon: 'success',
                                title: msg,
                                text: 'Success'
                            })

                            setTimeout(window.location.reload.bind(window.location), 1000);
                        }
                    });
                } else {
                    Swal.fire("Cancelled!");
                    setTimeout(window.location.reload.bind(window.location), 1000);
                }
            });
        }
    </script>
@endpush