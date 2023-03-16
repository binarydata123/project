@extends('admin.layouts.navbar_content')

@section('title', 'Arbitration Area')
@section('page-script')
    <script src="{{asset('assets/js/arbitration-area.js')}}"></script>
@endsection

@section('content')
    @include('admin.layouts.flash-message')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Arbitration Area</h5>
            <div class="col-md-12" >
                <button type="button" class="btn btn-primary" style="float: right;"><a href="{{route('admin.create.arbitration-area')}}" style="color:white;">Add Arbitration Area</a></button>
            </div>
        </div>
        <div class="card-body">
            <table id="myTable">
                <thead>
                    <tr style="text-align: center;">
                        <th style="text-align: center;">Area</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($arbitrationArea as $k => $area)
                        <tr style="text-align: center;">
                            <td>{{$area->area}}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.edit.arbitration-area', $area->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="{{route('admin.delete.arbitration-area', $area->id)}}" onclick="return confirm('Are you sure?')"><i class="bx bx-trash me-1"></i> Delete</a>
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