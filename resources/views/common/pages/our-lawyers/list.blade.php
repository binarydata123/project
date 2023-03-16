@extends('common.home.layouts.app')
@section('content')
    <div class="p-80">
        <section class="lawyers-part p-0 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 order-lg-0 order-last">
                        <h1 class="font-64 br-dask m-mr-top">Our <br><span class="span-color-dark">Lawyers</span></h1>
                        <p>Our team of lawyers have experience with criminal law and crimes act, thus they can understand your unique
                            requirements.</p>
                    </div>
                    <div class="col-sm-4 order-lg-0 order-first text-lg-0 text-end">
                        <img src="/new-design/assets/images/har.png" alt="har" class="har">
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6 mt-5">
                        <div class="searchfild">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="searchTerm" placeholder="Search..." aria-label="Recipient's username"
                                    aria-describedby="basic-addon2">
                                <input type="hidden" id="selectedArea" value="{{$areaSelected}}">
                                <span class="input-group-text" id="basic-addon2" onclick="getSearchedResult()"><img src="/new-design/assets/images/search.png" alt=""></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-right search-drop withsamesize department-width">
                            <select class="department" onchange="filterByArea(this)">
                                <option>Select Area</option>
                                @foreach($arbitrationAreas as $k => $area)
                                    <option value="{{$k}}" {{$areaSelected == $k ? 'selected' : ''}}>{{$area}}</option>
                                @endforeach
                            </select>

                            <select class="department" onchange="reload()">
                                <option>Select Location</option>
                                <option value="UAE" >UAE</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="splaying">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- <p>Displaying <span class="span-color">1 - 8 lawyers</span></p> -->
                        </div>
                        <!-- <div class="col-sm-6 text-right">
                            <div class="btn-group drop">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Relevant <i class="fa-solid fa-sort"></i>
                                </button>
                                <ul class="dropdown-menu" style="">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Action 2</a></li>
                                </ul>
                            </div>

                            <div class="btn-group drop">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Name A-Z <i class="fa-solid fa-sort"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Name </a></li>
                                    <li><a class="dropdown-item" href="#">Name 2</a></li>
                                </ul>
                            </div>

                            <a href="#" class="dot4"><i class="fa-solid fa-bars"></i></a>
                            <a href="#" class="dot4"><i class="fa-solid fa-arrows-to-dot"></i></a>

                        </div> -->
                    </div>
                </div>

                <div class="">
                    <div class="row">
                        @foreach($lawyers as $k => $lawyer)
                            <div class="col-lg-6 col-md-12 mt-4">
                                <div class="law-box">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center m-p-0 over-n">
                                            <div class="sma-amse">
                                                <img src="/storage/{{$lawyer->profile_pic}}" alt="Group">
                                                <!-- <i class="fa-solid fa-crown crown-p"></i> -->
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <h5>{{$lawyer->user->name}}</h5>
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="star-part-2 fa-start-des">
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="col-6 p-0">
                                                    <span class="rev-35">(35 Reviews)</span>
                                                </div>
                                            </div>
                                            <p class="mt-2"><i class="fa-solid fa-location-dot"></i> {{$lawyer->emirates}}<br>{{$lawyer->position}}</p>
                                        </div>
                                        <div class="col-2 "  data-bs-toggle="modal" data-bs-target="#lawyer-profile-{{$lawyer->id}}">
                                            <i class="fa-solid fa-eye eye-pri"></i>
                                        </div>
                                    </div>
                                </div>                    
                            </div>

                            <div class="modal fade popuphome videopopup" id="lawyer-profile-{{$lawyer->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content border-0">
                                        <div class="modal-body">
                                            <div class="puopclass overflowclass">
                                                <div class="law-box1 prime">
                                                    <div class="row">
                                                        <div class="col-md-3 col-3 text-center m-p-0 over-n">
                                                            <div class="sma-amse">
                                                                <img src="/storage/{{$lawyer->profile_pic}}" alt="Group">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-9" id="jaidev-text">
                                                            <h5>{{ $lawyer->user->name }}</h5>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <ul class="star-part-2 fa-start-des">
                                                                        <li><i class="fa-solid fa-star"></i></li>
                                                                        <li><i class="fa-solid fa-star"></i></li>
                                                                        <li><i class="fa-solid fa-star"></i></li>
                                                                        <li><i class="fa-solid fa-star"></i></li>
                                                                        <li><i class="fa-solid fa-star"></i></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-6 p-0">
                                                                    <span class="rev-35">(35 Reviews)</span>
                                                                </div>
                                                            </div>
                                                            <p class="mt-2"><i class="fa-solid fa-location-dot"></i> {{$lawyer->emirates}} {{$lawyer->position}}</p>
                                                        </div>
                                                        <div class="col-md-3 col-12 mb-lg-0 mb-4">
                                                            <div class="btn-hire" onclick="closePrevModal('{{$lawyer->id}}')" data-bs-toggle="modal" data-bs-target="#consult-{{$lawyer->id}}">
                                                                <button class="btn1-hire">  <img src="/new-design/assets/images/Group1.png" alt=""> Consult</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($lawyer->disclaimer)
                                                    <h6 class="mt-xl-5 mt-0"><strong>Description:</strong></h6>
                                                    <p>{{$lawyer->disclaimer}}</p>
                                                @endif
                                                <div class="row mb-4">
                                                    <div class="col-sm-4">
                                                        <ul>
                                                            <!-- <li><strong>Experience:</strong></li> -->
                                                            <li><strong>Position:</strong></li>
                                                            <li><strong> Expertise:</strong></li>
                                                            <li><strong> Address:</strong></li>
                                                            <li><strong>Lanuages:</strong></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <ul>
                                                            <!-- <li>25 Years of experience</li> -->
                                                            <li> {{$lawyer->position}}</li>
                                                            <li> {{$lawyer->arbitration->area}}</li>
                                                            <li> {{$lawyer->emirates}}</li>
                                                            <li> {{$lawyer->getLanguages($lawyer->id)}}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <img src="/new-design/assets/images/pupvideo.png" alt="" class="img-responsive img-fluid">
                                                <div class="text-end">
                                                    <button type="button" class=" mt-lg-5 mt-2 btn bg1" onclick="lawyerServices('{{$lawyer->user_id}}')">Lawyer Services</button>
                                                    @if(auth()->user())
                                                        <button type="button" class=" mt-lg-5 mt-2 btn bg2" onclick="closeContactModal('{{$lawyer->user_id}}')" data-bs-toggle="modal" data-bs-target="#chat-request-{{$lawyer->id}}">Chat Request</button>
                                                    @else 
                                                        <button type="button" class=" mt-lg-5 mt-2 btn bg2" onclick="login()">Chat Request</button>
                                                    @endif
                                                    <button type="button" class=" mt-lg-5 mt-2 btn bg3" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade popuphome" id="consult-{{$lawyer->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="puopclass">
                                                <h3 class="text-center" data-bs-toggle="modal" data-bs-target="#lowyar1">Contact form</h3>
                                                <form action="{{route('consult.lawyer')}}" method="post" onsubmit="return validateConsultForm(event, '{{$lawyer->id}}')">
                                                    @csrf()
                                                    <input type="text" name="name" id="name-{{$lawyer->id}}" placeholder="Name" class="form-control mb-2">
                                                    @error('name')
                                                        <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                    @enderror   
                                                    <input type="email" name="email" id="email-{{$lawyer->id}}" placeholder="Email Address" class="form-control mb-3">
                                                    @error('email')
                                                        <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                    @enderror   
                                                    <div class="input-group mb-3" id="mobile-div-{{$lawyer->id}}">
                                                        <span class="input-group-text" id="basic-addon1"> <img src="/new-design/assets/images/phone.png" alt=""> </span>
                                                        <input type="text" class="form-control left-bordr" name="mobile" id="mobile-{{$lawyer->id}}" placeholder="Phone Number" aria-label="Username"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                    @error('mobile')
                                                        <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                    @enderror   
                                                    <textarea class="form-control" name="message" id="msg-{{$lawyer->id}}" placeholder="Message" id="exampleFormControlTextarea1"
                                                    rows="3"></textarea>
                                                    <div class="text-end mt-lg-5 mt-3">
                                                        <button type="submit" class="btn btn-submit">Submit</button>
                                                    </div>
                                                    @error('message')
                                                        <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                    @enderror   
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade popuphome" id="chat-request-{{$lawyer->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="puopclass">
                                                <form action="{{route('send.chat.request')}}" method="post" onsubmit="return validateChatRqstForm(event, '{{$lawyer->id}}')">
                                                    @csrf()
                                                    <input type="hidden" name="lawyerId" value="{{$lawyer->id}}">
                                                    <h3 class="text-center" data-bs-toggle="modal" data-bs-target="#lowyar1">Chat Request</h3>
                                                    <input type="email" readonly name="" id="" placeholder="Email Address" class="form-control mb-3" value="{{auth()->user()->email}}">
                                                    <textarea class="form-control chat-rqst-form-{{$lawyer->id}}" placeholder="Add your query" name="description" id="exampleFormControlTextarea1"
                                                    rows="3"></textarea>
                                                    <div class="text-end mt-lg-5 mt-3">
                                                        <button type="submit" class="btn btn-submit">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{$lawyers->links()}}
                    </dvi>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('script')
    <script>
        $('.auto-load').hide();
        var page = 1;
        function loadMoreLawyers() {
            ++page
            $.ajax({
                method:"get",
                url: "our-lawyers?page=" +page,
                beforeSend: function () {
                    $('.auto-load').show();
                },
                success: function(data){            
                    if (data.length == 0) {
                        $('.auto-load').html("We don't have more data to display :(");
                        return;
                    }
                    $('.auto-load').hide();
                    $(".custom-col").append(data);
                }
            });
        }

        function closePrevModal(id) {
            $('#lawyer-profile-'+id).modal('hide');
        }

        function closeContactModal(id) {
            $('#consult-'+id).modal('hide');
        }

        function lawyerServices(lawyerId) {
            window.location.href = "/lawyer-services/"+lawyerId;
        }

        function reload() {
            location.reload()
        }

        function login() {
            window.location.href = "/login";
        }

        function filterByArea(area) {
            window.location.href = "/our-lawyers/"+area.value
        }

        function getSearchedResult() {
            var area = $("#selectedArea").val()
            var search = $("#searchTerm").val()
            if(area && search) {
                window.location.href = "/our-lawyers/"+area+"/"+search;
            }else {
                window.location.href = "/our-lawyers/"+search;
            }
        }

        function validateConsultForm(e, id) {
            var valid = true;
            $(".errors").empty()
            var name = $("#name-"+id).val()
            var email = $("#email-"+id).val()
            var mobile = $("#mobile-"+id).val()
            var msg = $("#msg-"+id).val()

            if(!name) {
                valid = false;
                $("#name-"+id).after('<span class="errors" style="color:red;">This field is required</span>')
            }
            if(!email) {
                valid = false;
                $("#email-"+id).after('<span class="errors" style="color:red;">This field is required</span>')
            }
            if(!mobile) {
                valid = false;
                $("#mobile-div-"+id).after('<span class="errors" style="color:red;">This field is required</span>')
            }
            if(!msg) {
                valid = false;
                $("#msg-"+id).after('<span class="errors" style="color:red;">This field is required</span>')
            }

            if(!valid) {
                e.preventDefault()
            }
        }

        function validateChatRqstForm(e, id) {
            var valid = true;
            $(".cf-errors").empty()
            var descr = $(".chat-rqst-form-"+id).val();
            if(!descr) {
                valid = false;
                $(".chat-rqst-form-"+id).after('<span class="cf-errors" style="color:red;">This field is required</span>')
            }

            if(!valid) {
                e.preventDefault()
            }
        }

    </script>
@endpush