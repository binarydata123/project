@extends('common.home.layouts.app')
@section('content')
    <div class="p-80">
        <main class="bg-color  bg-f4fefa pt-0 pb-5">
            <div class="container" id="content-flex">
                <div class="row">
                    <div class="col-md-6 postn-icn">
                        <h1 class="moni"><span class="tst">Question & Answers</span></h1>
                    </div>
                    <div class="col-md-6 text-end">
                        <img src="/new-design/assets/images/Vector.png" class="vctr"><br>
                    </div>
                </div>
            </div>
            <section class="p-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <div class="plus-icn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <img src="/new-design/assets/images/client/plus.png" class="plus">
                                <h1 class="addtst">Add Question</h1>
                            </div>
                  
                            <div class="modal fade popuphome" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="puopclass">
                                                <h3 class="text-center">Submit your enquiry</h3>
                                                <form action="{{route('store.forum')}}" method="post" onsubmit="return validateForumForm(event)">
                                                    @csrf()
                                                    <input type="text" name="qa_name" id="qa-name" placeholder="Name" value="{{auth()->user() ? auth()->user()->name : ''}}" class="form-control mb-2">
                                                    @error('qa_name')
                                                        <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                    @enderror    
                                                    <input type="email" name="qa_email" id="qa-email" placeholder="Email Address" value="{{auth()->user() ? auth()->user()->email : ''}}" class="form-control mb-3">
                                                    @error('qa_email')
                                                        <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                    @enderror    
                                                    <div class="input-group mb-3" id="qa-mobile-div">
                                                        <span class="input-group-text" id="basic-addon1"> <img src="/new-design/assets/images/phone.png" alt=""> </span>
                                                        <input type="text" class="form-control left-bordr" name="mobile" id="qa-mobile" placeholder="Phone Number" aria-label="Username"
                                                        aria-describedby="basic-addon1">
                                                    </div>
                                                    @error('mobile')
                                                        <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                    @enderror    
                                                    <textarea class="form-control popup-descr qa-msg" name="message" placeholder="Your message"
                                                        id="exampleFormControlTextarea1" rows="3"></textarea>
                                                        @error('message')
                                                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                        @enderror    
                                                    <div class="text-end mt-lg-5 mt-3">
                                                        <button type="submit" class="btn btn-submit">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="text-right search-drop withsamesize">
                                <select class="department" onchange="sortBy(this)">
                                    <option value="desc">Sort by</option>
                                    <option value="desc" {{$sort === "desc" ? 'selected' : ''}}>Newest</option>
                                    <option value="asc" {{$sort === "asc" ? 'selected' : ''}}>Oldest</option>
                                </select>
                            </div>
                        </div>
                        <div class="splaying">
                            <div class="row">
                                <div class="col-sm-6 text-start">
                                    <a href="#" class="actor">{{$forums->count()}} <span>results for:</span> </a>
                                    <div class="btn-group drop">
                                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        All Countries
                                        </button>
                                        <ul class="dropdown-menu" style="">
                                            <li><a class="dropdown-item" href="#">UAE</a></li>
                                        </ul>
                                    </div>

                                    <!-- <div class="btn-group drop">
                                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        All areas of law
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">All areas of law </a></li>
                                        </ul>
                                    </div> -->
                                    <!-- <a href="#" class="img-dott"> <img src="/new-design/assets/images/edit.png" alt=""> </a> -->
                                </div>
                                <div class="col-sm-6 text-right">
                                    <div class="main-tabs">
                                        <ul class="nav nav-pills mb-3 calss-pull" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                                aria-selected="true"> <a href="#" class="img-dott"> <span>Change the view:</span><img
                                                    src="/new-design/assets/images/dotts.png" alt=""></a></button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                                aria-selected="false"> <a href="#" class="img-dott"> <img src="/new-design/assets/images/there.png" alt="">
                                                </a></button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                    <div class="row g-4 mt-4">
                        @forelse($forums as $k => $forum)
                            <div class=" col-sm-6 col-md-6 col-lg-6 col-xl-4" onclick="qaDetail('{{$forum->slug}}')" style="cursor:pointer;">
                                <div class="question-text position-relative">
                                    <div class="text-end dec">{{$forum->created_at->format('M d Y')}}</div>
                                    <h3>{{Str::limit($forum->title, 67)}}</h3>
                                    <p><strong>Q:</strong> {{Str::limit($forum->message, 150)}}
                                    </p>

                                    <div class="d-flex width-100">
                                        <div class="with-50">
                                            <div class="">
                                            <img src="images/question/Vector.png" alt="" class="img-responsive imf-smae">
                                            </div>
                                            <div>
                                            <h4>{{$forum->totalAnswerCount($forum->id)}}</h4>
                                            <span>Answers</span>
                                            </div>
                                        </div>
                                        <div class="with-50">
                                            <div class="">
                                                <img src="images/question/Vector (1).png" alt="" class="img-responsive imf-smae">
                                            </div>
                                            <div id="text-ten">
                                                <h4>{{$forum->views}}</h4>
                                                <span>Views</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p style="text-align: center;">No Questions</p>
                        @endforelse                    
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    @forelse($forums as $k => $forum)
                        <div class="question-text position-relative bg-1 mb-4">
                            <div class="row">
                                <div class="col-lg-9 col-9">
                                    <h3>{{Str::limit($forum->title, 67)}}</h3>
                                    <p><strong>Q:</strong> {{Str::limit($forum->message, 150)}}
                                    </p>
                                </div>
                                <div class="col-lg-1  col-1 text-center">
                                    <div>
                                    <h3>{{$forum->views}}</h3>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-2">
                                    <div class="text-end dec">{{$forum->created_at->format('M d Y')}}</div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p style="text-align: center;">No Questions</p>
                    @endforelse   
                </div>
            </div>
            {{$forums->links()}}
        </main>
    </div>       
@endsection

@push('script')
    <script>
        function validateForumForm(e) {
            var valid = true;
            $(".qa-errors").empty()
            var name = $("#qa-name").val()
            var email = $("#qa-email").val()
            var mobile = $("#qa-mobile").val()
            var msg = $(".qa-msg").val()

            if(!name) {
                valid = false;
                $("#qa-name").after('<span class="qa-errors" style="color:red;">This field is required</span>')
            }
            if(!email) {
                valid = false;
                $("#qa-email").after('<span class="qa-errors" style="color:red;">This field is required</span>')
            }
            if(!mobile) {
                valid = false;
                $("#qa-mobile-div").after('<span class="qa-errors" style="color:red;">This field is required</span>')
            }
            if(!msg) {
                valid = false;
                $(".qa-msg").after('<span class="qa-errors" style="color:red;">This field is required</span>')
            }

            if(!valid) {
                e.preventDefault()
            }
        }

        function sortBy(sort) {
            window.location.href = "/question-answers/"+sort.value
        }

        function qaDetail(slug) {
            window.location.href = "/question-answer/view/"+slug;
        }
    </script>
@endpush