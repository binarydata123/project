@extends('common.home.layouts.app')
@section('content')
  <div class="p-80">
    <main class="bg-color  bg-f4fefa pt-0 pb-5">
      <div class="container" id="content-flex">
        <div class="row">
          <div class="col-md-6 postn-icn">
            <h1 class="moni"><span class="tst">Legal Services</span></h1>
          </div>
          <div class="col-md-6 text-end">
            <img src="/new-design/assets/images/sotket.png" class="vctr"><br>
          </div>
        </div>
      </div>
      <div id="hire_page">
        <section>
          <div class="container">
            <div class="row">
              <div class="text-right search-drop">
                <div class="row">
                  <div class="col-md-8">
                   <div class="searchfild">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="search" id="search" placeholder="Search..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <span class="input-group-text search-button" id="basic-addon2"><img src="/new-design/assets/images/search.png" alt=""></span>
                    </div>
                  </div>
                   </div>
                  <div class="col-md-2 col-6">
                    <select class="department class-width-same" onchange="sortByCost(this)">
                      <option value="ASC" {{$sort === "ASC" ? 'selected' : ''}}>Low to High</option>
                      <option value="DESC" {{$sort === "DESC" ? 'selected' : ''}}>High to Low</option>
                    </select>
                  </div>
                </div>
                <input type="hidden" id="sortedBy" value="{{$sort}}">
                <input type="hidden" id="searchedVal" value="{{$search}}">
                <input type="hidden" id="selectedArea" value="{{$area}}">
              </div>

              <div class="splaying">
                <div class="row g-2">
                  <div class="col-sm-6 text-start">
                    <a href="#" class="actor">{{$services->count()}} <span>results for:</span> </a>
                    <div class="btn-group drop">
                      <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        All Countries
                      </button>
                      <ul class="dropdown-menu" style="">
                        <li><a class="dropdown-item" href="">UAE</a></li>
                      </ul>
                    </div>

                    <div class="btn-group drop">
                      <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        @if($arbitrationArea) {{$arbitrationArea}} @else All areas of law @endif
                      </button>
                      <ul class="dropdown-menu">
                        @foreach($areas as $k => $area)
                          <li>
                            <a class="dropdown-item" href="#" onclick="filterByArea('{{$k}}')">{{$area}} </a>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                    <a href="#" class="img-dott"> <img src="/new-design/assets/images/edit.png" alt=""> </a>
                  </div>
                  <div class="col-sm-6 text-right">
                    <div class="btn-group drop ">
                      <button type="button" class="btn dropdown-toggle border-0" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Change the view:
                      </button>
                      <ul class="dropdown-menu" style="">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Action 2</a></li>
                      </ul>
                    </div>
                    <a href="#" class="img-dott"> <img src="/new-design/assets/images/there.png" alt=""> </a>
                    <a href="#" class="img-dott"> <img src="/new-design/assets/images/dotts.png" alt=""> </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <section id="heire">
        <div class="container">
          <div class="cardtype" id="search-results">
            <div class="row g-4 mb-3">
              @foreach($services as $k => $service)            
                <div class="col-md-6" id="hover">
                  <div class="question-text bg-two">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="category">{{$service->arbitration->area}}</div>
                      </div>
                    </div>
                    <h3>{{$service->title}}</h3>
                    <p>{{ $service->short_descr }}</p>
                    <div class="row align-items-center">
                      <div class="col-md-6 col-6">
                        <h1 class="aed-class">AED {{$service->getLawyerFee($service->id) + $service->getPlatformFee($service->id)}}</h1>
                      </div>
                      <div class="col-md-6 col-6 text-end">
                        <a href="{{route('service.step-one', $service->id)}}" class="seebtn  bg-change">see more</a>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            {{ $services->links() }}
          </div>
        </div>
      </section>
      @include('common.page-footer')
    </main>
  </div>
@endsection

@push('script')
    <script>
        function serviceLawyers(serviceId) {
          window.location.href = "/service/lawyers/" + serviceId;
        }

        function sortByCost(sortBy) {
          window.location.href = "/legal-services/" + sortBy.value;
        }

        function filterByArea(areaId) {          
          var sorted = $("#sortedBy").val();
          var search = $("#searchedVal").val();
          if(areaId && search) {
            window.location.href = "/legal-services/" + sorted + "/" + search + "/" + parseInt(areaId);
          }else if(!search) {
            window.location.href = "/legal-services/" + sorted + "/" + parseInt(areaId);
          }
        }

        $('.search-button').click(function() {
          var sorted = $("#sortedBy").val();
          var search = $("#search").val();
          var areaId = $("#selectedArea").val();
          if(areaId && search) {
            window.location.href = "/legal-services/" + sorted + "/" + search + "/" + parseInt(areaId);
          }else if(!areaId) {
            window.location.href = "/legal-services/" + sorted + "/" + search;
          }
        });

        $('#search').keydown(function(event) {
            if (event.keyCode === 13) { // Enter key
                event.preventDefault();
                $('.search-button').click();
            }
        });
    </script>
@endpush