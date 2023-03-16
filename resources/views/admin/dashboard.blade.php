@extends('admin/layouts/navbar_content')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')

<div class="row">
    <div class="card mb-4"> 
        <h5 class="card-header">Hired By (Last 5 Records)</h5>
        <div class="col-md-12" >
            <button type="button" class="btn btn-info" style="float: right;margin-right:2%;"><a href="{{route('admin.hired-lawyer')}}" style="color:white;">More</a></button>
        </div>
        <div class="card-body">
            <div class="row mb-5">
                @forelse($hiredData as $k => $hired)
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                {{$hired->created_at->format('d M Y')}}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$hired->lawyerService->services->title}}</h5>
                                <p class="card-text">
                                    Lawyer: <b>{{$hired->lawyerService->user->name}}</b>
                                    <span style="float: right;">Hired By: <b>{{$hired->hiredBy->name}}</b></span>
                                </p>                                        
                                <p class="card-text">
                                </p>       
                                <p class="card-text">
                                    Total Amount: <b>{{$hired->lawyerService->lawyer_fee + $hired->lawyerService->platform_fee}}</b>
                                    <span style="float: right;">Platform Fee: <b>{{$hired->lawyerService->platform_fee}}</b></span>
                                </p>                                 
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No Data</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="card mb-4"> 
        <h5 class="card-header">Unresponded Chats</h5>
        <div class="card-body">
            <div class="row mb-5">
                @forelse($unrespondedChatRqsts as $k => $chatRqst)
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                {{$chatRqst->created_at->format('d M Y')}}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$chatRqst->comment}}</h5>
                                <p class="card-text">
                                    Lawyer: <b>{{$chatRqst->lawyer->user->name}} - ({{$chatRqst->lawyer->user->email}})</b>
                                    <span style="float: right;">Requested By: <b>{{$chatRqst->user->name}} - ({{$chatRqst->user->email}})</b></span>
                                </p>     
                                <button type="button" class="btn btn-info" style="margin-right:2%;margin-top:2%;"><a href="{{route('admin.send-reminder', $chatRqst->id)}}" style="color:white;">Send Reminder</a></button>                         
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No Data</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection