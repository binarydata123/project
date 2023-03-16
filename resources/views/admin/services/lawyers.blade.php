@extends('admin.layouts.navbar_content')

@section('title', 'Service - Lawyers')

@section('content')
    @include('admin.layouts.flash-message')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Service - Lawyers : <b>{{$getServiceDetails->arbitration->area}}</b></h5>
        </div>
        <div class="card-body">
            <table id="myTable">
                <thead>
                    <tr style="text-align: center;">
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">Lawyer Fee</th>
                        <th style="text-align: center;">Platform Fee</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($lawyers as $k => $lawyer)
                        <tr style="text-align: center;">
                            <td>{{$lawyer->user->name}}</td>
                            <td>{{$lawyer->user->email}}</td>
                            <td>{{$lawyer->getLawyerFee($getServiceDetails->id) ?? '-'}}</td>
                            <td>{{$lawyer->getPlatformFee($getServiceDetails->id)}}</td>
                            <td>
                                <a class="dropdown-item btn btn-primary" type="button" style="color:white;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop{{$k}}" aria-controls="offcanvasTop"><i class="bx bx-dollar-circle me-1"></i> Add Platform Fee</a>
                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasTop{{$k}}" aria-labelledby="offcanvasTopLabel" style="height: 100%!important;">
                                    <div class="offcanvas-header">
                                        <h5 id="offcanvasTopLabel" class="offcanvas-title">Add Platform Fee</h5>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <form action="{{route('admin.service.lawyers.add-platform-fee', $lawyer->user->id)}}" method="POST">
                                            @csrf()
                                            <div class="row">
                                                <div class="col-xl">
                                                    <div class="card mb-4">
                                                        <div class="card-header d-flex justify-content-between align-items-center">
                                                            <h5 class="mb-0">Lawyer: {{$lawyer->user->name}}</h5>
                                                        </div>
                                                        <div class="card-body">                                                            
                                                            <div class="mb-3">
                                                                <input type="hidden" name="service_id" value="{{$getServiceDetails->id}}">
                                                                <label class="form-label" for="basic-default-company">Platform Fee</label>
                                                                <input type="text" class="form-control" id="basic-default-company" name="platform_fee" value="{{$lawyer->getPlatformFee($getServiceDetails->id)}}" />
                                                                @error('platform_fee')
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
    </div>
@endsection