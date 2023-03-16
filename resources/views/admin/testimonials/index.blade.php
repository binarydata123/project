@extends('admin/layouts/navbar_content')

@section('title', 'Testimonials')

@section('content')
    @include('admin.layouts.flash-message')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Testimonials</h5>
            <!-- <div class="col-md-12" >
                <button type="button" class="btn btn-primary" style="float: right;"><a href="{{route('admin.create.arbitration-area')}}" style="color:white;">Add Arbitration Area</a></button>
            </div> -->
        </div>
        <div class="card-body">
            <table id="myTable">
                <thead>
                    <tr style="text-align: center;">
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Emirate</th>
                        <th style="text-align: center;">Message</th>
                        <th style="text-align: center;">Is Approved</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($testimonials as $k => $testimonial)
                        <tr style="text-align: center;">
                            <td>{{$testimonial->name}}</td>
                            <td>{{$testimonial->emirate}}</td>
                            <td>{{$testimonial->message}}</td>
                            <td>{{$testimonial->approved ? 'Yes' : 'No'}}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>                                    
                                    <div class="dropdown-menu">
                                    <div class="form-check form-switch mb-2"  style="padding-left: 3.5em;">
                                        <label for="">Approve</label>
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" testimonial_id="{{$testimonial->id}}" {{$testimonial->approved ? 'checked' : ''}} onchange="verifyTestimonial(this, {{$testimonial->approved}})">
                                    </div>
                                        <a class="dropdown-item" href="{{route('admin.delete.testimonial', $testimonial->id)}}" onclick="return confirm('Are you sure?')"><i class="bx bx-trash me-1"></i> Delete</a>
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
@push('script')
    <script>
        function verifyTestimonial(data, isApproved) {
            var msg = isApproved == 0 ? 'Approve' : "Disapprove"
            Swal.fire({
                title: "Are you sure?",
                text: "Are you sure you want to "+msg+" this Testimonial?",
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
                    var testimonialId = $(data).attr('testimonial_id');
                    var status = $(data).val();
                    var msg = isApproved == 0 ? 'Approved' : "Disapproved"
                    $.ajax({
                        method:"post",
                        url: "/admin/approve/testimonial/"+testimonialId,
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
                }
            });
        }
    </script>
@endpush