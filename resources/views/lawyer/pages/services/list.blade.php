@extends('lawyer.home.layouts.app')
@section('content')

<div class="working-box">
                <section class="lawyers-part-2 p-0">
                    <div class="" id="border-full">
                        <div class="row align-items-center" id="service-pages">
                            <div class="col-md-6 col-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <ul class="d-flex1">
                                    <li>
                                        <h4>Services</h4>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-8 text-right">
                                <div class="plus-icn-servie" data-bs-toggle="modal" data-bs-target="#staticBackdrop4">
                                    <div>
                                        <img src="/new-design/assets/images/client/plus.png" class="plus">
                                    </div>
                                    <div>
                                        <h1 class="addtst">Add Service</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-4"></div>
                            <div class="col-sm-8 text-right">
                                <div class="btn-group drop">
                                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Relevant <i class="fa-solid fa-sort"></i>
                                    </button>
                                    <ul class="dropdown-menu" style="">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Action 2</a></li>
                                    </ul>
                                </div>

                                <div class="btn-group drop">
                                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Name A-Z <i class="fa-solid fa-sort"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Name </a></li>
                                        <li><a class="dropdown-item" href="#">Name 2</a></li>
                                    </ul>
                                </div>

                               <!--  <a href="#" class="dot4"><i class="fa-solid fa-bars"></i></a>
                                <a href="#" class="dot4"><i class="fa-solid fa-arrows-to-dot"></i> --></a>

                            </div>
                        </div>
                        <div class="table-responsive table-wdes">
                            <table class="table mt-5 ">
                                <thead class="thead-th">
                                    <tr style="border-bottom: 2px solid #C2DDE4;">
                                        <th scope="col">ARBITRATION AREA </th>
                                        <th scope="col">TITLE</th>
                                        <th scope="col"> DESCRIPTION </th>
                                        <th scope="col">MY FEE </th>
                                        <th scope="col"> PLATFORM FEE </th>
                                        <th scope="col"> ACTIONS </th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach($services as $k => $service)
                                        <tr>
                                            <th scope="row">{{$service->services->arbitration->area}}</th>
                                            <td>{{$service->services->title}}</td>
                                            <td>{!! \Illuminate\Support\Str::words($service->services->description, 10,'....')  !!}</td>
                                            <td>{{$service->lawyer_fee}}</td>
                                            <td>{{$service->platform_fee ?? '-'}}</td>
                                            <td class="images"  data-bs-toggle="modal" data-bs-target="#edit-service-{{$service->id}}" onclick="addRichTextEditor('{{$service->id}}')"> <img src="/new-design/assets/images/data.png" alt=""> </td>
                                        </tr>


                                        <div class="modal fade modal-popups" id="edit-service-{{$service->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg  modal-dialog-centered" id="modal-login">
                                                <div class="modal-content"> 
                                                    <div class="modal-header text-right"> 
                                                        <button type="button" class="btn-close rounded" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-popup-des rounded" id="pills-tabContent">
                                                            <form action="{{route('lawyer.service.update', $service->id)}}" method="POST">
                                                                @csrf()
                                                                <div class="eles group-invite area">
                                                                    <select name="area">
                                                                        @foreach($areas as $k => $area)
                                                                            <option value="{{$k}}" {{$service->services->arbitration_area_id == $k ? 'selected' : ''}}>{{$area}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('area')
                                                                        <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                                                                    @enderror  
                                                                    <input type="text" placeholder="Tite of Service" name="title" value="{{$service->services->title}}" class="mt-3">
                                                                    @error('title')
                                                                        <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                                                                    @enderror 
                                                                    <div class="links-icons">
                                                                        <textarea placeholder="Short Description" name="short_descr" class="description">{{$service->services->short_descr}}</textarea> 
                                                                    </div>
                                                                    @error('short_descr')
                                                                        <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                                                                    @enderror 
                                                                    <div class="links-icons">
                                                                        <textarea placeholder="Description" id="mytextarea-{{$service->id}}" name="description" class="description">{{$service->services->description}}</textarea> 
                                                                    </div>
                                                                    @error('description')
                                                                        <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                                                                    @enderror
                                                                    <p class="font-fee mb-5 mt-3">MY FEE (In AED): 
                                                                        <input type="number" placeholder="50" name="fee" value="{{$service->getLawyerFee($service->service_id)}}">  
                                                                        @error('fee')
                                                                            <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                                                                        @enderror 
                                                                    </p>                                  
                                                                </div>
                                                                <div class="text-right mb-3">
                                                                    <button class="btn-lgn">Post Service</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>


                                    @endforeach                                
                                </tbody>
                            </table>

                        </div>
                        <div class="  was-validated" id="pagination-class">
                            {{$services->links()}}
                        </div>
                    </div>
                </section>


                


        </div>

        <div class="modal fade modal-popups" id="staticBackdrop4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg  modal-dialog-centered" id="modal-login">
                        <div class="modal-content"> 
                            <div class="modal-header text-right"> 
                                <button type="button" class="btn-close rounded" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-popup-des rounded" id="pills-tabContent">
                                    <form action="{{route('lawyer.service.store')}}" method="POST">
                                        @csrf()
                                        <div class="eles group-invite area">
                                            <select name="area">
                                                @foreach($areas as $k => $area)
                                                    <option value="{{$k}}" {{old('area') == $k ? 'selected' : ''}}>{{$area}}</option>
                                                @endforeach
                                            </select>
                                            @error('area')
                                                <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                                            @enderror  
                                            <input type="text" placeholder="Tite of Service" name="title" value="{{old('title')}}" class="mt-3">
                                            @error('title')
                                                <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                                            @enderror 
                                            <div class="links-icons">
                                                <textarea placeholder="Short Description" name="short_descr" class="description">{{old('short_descr')}}</textarea> 
                                            </div>
                                            @error('short_descr')
                                                <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                                            @enderror 
                                            <div class="links-icons">
                                                <textarea placeholder="Description" id="richText" name="description" class="description">{{old('description')}}</textarea> 
                                            </div>
                                            @error('description')
                                                <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                                            @enderror
                                            <p class="font-fee mb-5 mt-3">MY FEE (In AED): 
                                                <input type="number" placeholder="50" name="fee" value="{{old('fee')}}">  
                                                @error('fee')
                                                    <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                                                @enderror 
                                            </p>                                  
                                        </div>
                                        <div class="text-right mb-3">
                                            <button class="btn-lgn">Post Service</button>
                                        </div>
                                    </form>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
@endsection

@push('script')


<script>
    function addRichTextEditor(id) {
        tinymce.init({
          selector: '#mytextarea-'+id,
          plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
          toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
      });
    }
</script>


@endpush