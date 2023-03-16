@extends('lawyer.layouts.navbar_content')

@section('title', 'Services')

@section('content')
    @include('admin.layouts.flash-message')
    <div class="card">
        <div class="card-header">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd" style="float: right;">Add Service</button>
            <h5 class="card-title">Services</h5>
        </div>
        <div class="card-body">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th style="text-align: center;">Arbitration Area</th>
                        <th style="text-align: center;">Title</th>
                        <th style="text-align: center;">Description</th>
                        <th style="text-align: center;">My Fee</th>
                        <th style="text-align: center;">Platform Fee</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($services as $k => $service)
                        <tr style="text-align: center;">
                            <td>{{$service->services->arbitration->area}}</td>
                            <td>{{$service->services->title}}</td>
                            <td>{!! \Illuminate\Support\Str::words($service->services->description, 10,'....')  !!}</td>
                            <td>{{$service->lawyer_fee}}</td>
                            <td>{{$service->platform_fee}}</td>
                            <td>
                                <a class="dropdown-item btn btn-primary" type="button" style="color:white;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop{{$k}}" aria-controls="offcanvasTop"><i class="bx bx-dollar-circle me-1"></i> Add Fee</a>
                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasTop{{$k}}" aria-labelledby="offcanvasTopLabel" style="height: 100%!important;">
                                    <div class="offcanvas-header">
                                        <h5 id="offcanvasTopLabel" class="offcanvas-title">Add Fee</h5>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <form action="{{route('lawyer.service.add-fee', $service->id)}}" method="POST">
                                            @csrf()
                                            <div class="row">
                                                <div class="col-xl">
                                                    <div class="card mb-4">
                                                        <div class="card-header d-flex justify-content-between align-items-center">
                                                            <h5 class="mb-0">Service: {{$service->services->title}}</h5>
                                                        </div>
                                                        <div class="card-body">                                                            
                                                            <div class="mb-3">
                                                                <label class="form-label" for="basic-default-company">Your Fee</label>
                                                                <input type="text" class="form-control" id="basic-default-company" name="fee" value="{{$service->getLawyerFee($service->service_id)}}" />
                                                                @error('fee')
                                                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </div>                                      
                                            <button type="submit" class="btn btn-success">Add</button>
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Close</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-3 col-md-6">
            <small class="text-light fw-semibold mb-3">Create Service</small>
            <div class="mt-3">
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasEndLabel" class="offcanvas-title">Add Service</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                        <form action="{{route('lawyer.service.store')}}" method="POST">
                            @csrf()
                            <div class="row">
                                <div class="col-xl">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-fullname">Arbitration Area</label>
                                                <select name="area" id="" class="form-control">
                                                    <option value="{{$arbitrationArea->arbitration_area_id}}">{{$arbitrationArea->arbitration->area}}</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-company">Title</label>
                                                <input type="text" class="form-control" id="basic-default-company" name="title"/>
                                                @error('title')
                                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                @enderror  
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-message">Description</label>
                                                <textarea id="basic-default-message" class="form-control" name="description"></textarea>
                                                @error('description')
                                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                @enderror  
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                
                            </div>                                      
                            <button type="submit" class="btn btn-success">Add</button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection