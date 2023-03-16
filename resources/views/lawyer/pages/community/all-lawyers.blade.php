@extends('lawyer.home.layouts.app')
@section('content')


<div class="working-box">
        <section class="lawyers-part-2 p-0">
          <div class="container-">
          @include('lawyer.pages.community.groups.group-header')

            <div class="commn_section">
              <div class="row">
                <div class="col-lg-6 col-md-4 col-12 mb-lg-0 mb-4">
                  <h1 class="font-64"><span class="span-color-dark">All Lawyers</span></h1>
                  <p>Displaying <span class="span-color">1 - 10 of 10 layers</span></p>
                </div>
                <div class="col-lg-6 col-md-8 col-12">
                  <div class="text-right search-drop">
                    <span class="glass"><a href="#"><i class="fa-solid fa-magnifying-glass"></i></a></span>
                    <select class="department  mb-3">
                      <option>Select Department</option>
                      <option>Department 2</option>
                      <option>Department 3</option>
                      <option>Department 4</option>
                    </select>

                    <select class="department">
                      <option>Select Location</option>
                      <option>Location 2</option>
                      <option>Location 3</option>
                      <option>Location 4</option>
                    </select>
                  </div>

                  <div class="col-lg-12 col-12 text-right mt-3">
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
                    <a href="#" class="dot4 same-1024"><i class="fa-solid fa-bars"></i></a>
                    <a href="#" class="dot4 same-1024"><i class="fa-solid fa-arrows-to-dot"></i></a>
                  </div>
                </div>
              </div>
              <div class="large-12">
                @foreach($lawyers as $k => $lawyer)
                    <div class="box-1" style="cursor:pointer;" onclick="chatWithLawyer('{{$lawyer->user_id}}')">
                        <div class="home-box-fifth add-class">
                            <div class="text-center">
                            <div class="box">
                                <img src="/storage/{{$lawyer->profile_pic}}" alt="" style="width:50%!important;height:75px!important">
                                <!-- <i class="fa-solid fa-crown crown-p"></i> -->
                                <div class="box-content">
                                <ul class="icon">
                                    <li><a href="#"><i class="fa-solid fa-eye"></i></a></li>
                                </ul>
                                </div>
                            </div>
                            </div>
                            <h5 class="text-center">{{$lawyer->user->name}}</h5>
                            <div class="d-flex text-center-class">
                            <div class="">
                                <ul class="star-part-2">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="">
                                <span class="rev-35">(35 Reviews)</span>
                            </div>
                            </div>
                            <p class="mt-2 text-center text-cont text-cont"><i class="fa-solid fa-location-dot icon-color"></i> {{$lawyer->emirates}}</p>
                        </div>
                    </div>
                @endforeach
                
                </div>
                 
            </div>
          </div>
      </div>
      </section>
    </div>


@endsection

@push('script')

  <script>
    function allLawyers() {
            window.location.href = "/lawyer/community/all-lawyers";
        }

        function groupsPage() {
            window.location.href = "/lawyer/community/groups";
        }

      function chatWithLawyer(id) {
        window.location.href = "/online-chat/"+id;
      }
  </script>

@endpush