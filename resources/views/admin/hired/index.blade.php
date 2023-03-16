@extends('admin.layouts.navbar_content')

@section('title', 'Hired Lawyers')

@section('content')
    @include('admin.layouts.flash-message')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Hired Lawyers</h5>
        </div>
        <div class="card-body">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th style="text-align: center;">Lawyer</th>
                        <th style="text-align: center;">Service</th>
                        <th style="text-align: center;">Hired By</th>
                        <th style="text-align: center;">Total Amount</th>
                        <th style="text-align: center;">Platform Amount</th>
                        <th style="text-align: center;">Date</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($hired as $k => $val)
                        <tr style="text-align: center;">
                            <td>{{$val->lawyerService->user->name}}</td>
                            <td>{{$val->lawyerService->services->title}}</td>
                            <td>{{$val->hiredBy->name}}</td>
                            <td>{{$val->lawyerService->lawyer_fee + $val->lawyerService->platform_fee}}</td>
                            <td>{{$val->lawyerService->platform_fee}}</td>
                            <td>{{$val->created_at->format('M d Y')}}</td>                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection