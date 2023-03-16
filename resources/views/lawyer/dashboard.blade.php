@extends('lawyer.layouts.navbar_content')

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


<div class="row mb-4">
    <div class="col-md">
        <div class="card">
            <h5 class="card-header">Chat Notifications</h5>
            <div class="card-body">
              @forelse($chatNotifications as $k => $notification)
                @if($notification->is_group)
                  <div class="alert alert-primary alert-dismissible" role="alert">
                    Group: <b>{{$notification->group->group_name}}</b>
                    <br>
                    Message: <b>{{Str::limit($notification->msg, 100)}}</b>
                    <br>
                    From: <b>{{$notification->fromUser->name}}</b>
                    <a href="{{route('lawyer.community.group.chat', $notification->group_id)}}" target="_blank" style="float:right;" onclick="closeNotification('{{$notification->id}}')">View Message</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="closeNotification('{{$notification->id}}')">
                    </button>
                  </div>
                @else 
                  <div class="alert alert-primary alert-dismissible" role="alert">
                    Message: <b>{{Str::limit($notification->msg, 100)}}</b>
                    <br>
                    From: <b>{{$notification->fromUser->name}}</b>
                    <a href="/online-chat/{{$notification->from_user}}" target="_blank" style="float:right;" onclick="closeNotification('{{$notification->id}}')">View Message</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="closeNotification('{{$notification->id}}')">
                    </button>
                  </div>
                @endif
              @empty 
                <p>No Notifications</p>
              @endforelse 
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="card mb-4"> 
        <h5 class="card-header">Hired By (Last 5 Records)</h5>
        <div class="col-md-12" >
            <button type="button" class="btn btn-info" style="float: right;margin-right:2%;"><a href="{{route('lawyer.my-activity')}}" style="color:white;">More</a></button>
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
                                    Hired By: <b>{{$hired->hiredBy->name}} - {{$hired->hiredBy->email}}</b> 
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

@endsection

@push('script')

  <script>
    function closeNotification(notificationId) {
      $.ajax({
        method:"post",
        url: "/lawyer/close-notification/"+notificationId,
        data: {
            "_token": "{{ csrf_token() }}",
        },
        success: function(){}
      });
    }
  </script>

@endpush