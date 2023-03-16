@extends('admin.layouts.navbar_content')
@section('title', 'Lawyers')
@section('content')
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Lawyers Scheduled</h5>
            <div class="card-body">
                <table id="myTable" class="table">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Lawyer Name</th>
                            <th style="text-align: center;">Lawyer Email</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($lawyersScheduled as $k => $lawyers)
                            <tr style="text-align: center;">
                                <td>{{$lawyers->lawyer->name}}</td>
                                <td>{{$lawyers->lawyer->email}}</td>
                                <td>
                                    <a class="dropdown-item btn btn-primary" type="button" style="color:white;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop{{$k}}" aria-controls="offcanvasTop"><i class="bx bx-dollar-circle me-1"></i> Add Fee</a>
                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasTop{{$k}}" aria-labelledby="offcanvasTopLabel" style="height: 100%!important;">
                                        <div class="offcanvas-header">
                                            <h5 id="offcanvasTopLabel" class="offcanvas-title">Add Platform Fee</h5>
                                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <form action="{{route('admin.update-slots', $lawyers->lawyer_id)}}" method="POST">
                                                @csrf()
                                                <div class="row">
                                                    <div class="col-xl">
                                                        <div class="card mb-4">
                                                            <div class="card-body">                                                            
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="basic-default-company">15 minute session</label>
                                                                    <input type="text" class="form-control" id="basic-default-company" placeholder="Ex: AED 50" name="fifteen" value="{{$lawyers->getSessionAmount(15, $lawyers->lawyer_id)}}" />                                                                   
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="basic-default-company">30 minute session</label>
                                                                    <input type="text" class="form-control" id="basic-default-company" placeholder="Ex: AED 50" name="thirty" value="{{$lawyers->getSessionAmount(30, $lawyers->lawyer_id)}}" />                                                                   
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
    </div>
@endsection