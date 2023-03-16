@extends('common.user-dashboard.layouts.app')
@section('content')

<div class="working-box">
        <div class="row g-4">
          <div class="col-lg-3 col-md-6 col-6">
            <div class="booked">
              <div class="text-right">
                <img src="/new-design/user-dashboard/images/register/1.png" alt="">
              </div>
              <h5>{{$data['lawyers_consulted_count']}}</h5>
              <p>Consulted The Lawyer</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6">
            <div class="booked bg-C6EEE2">
              <div class="text-right">
                <img src="/new-design/user-dashboard/images/register/2.png" alt="">
              </div>
              <h5>{{$data['service_purchased_count']}}</h5>
              <p>Services Purchased</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6">
            <div class="booked bg-EDEEC6 border-0">
              <div class="text-right">
                <img src="/new-design/user-dashboard/images/register/3.png" alt="">
              </div>
              <h5>{{$data['chat_requests_count']}}</h5>
              <p>Chat Requests</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6">
            <div class="booked bg-FFD6E5">
              <div class="text-right">
                <img src="/new-design/user-dashboard/images/register/4.png" alt="">
              </div>
              <h5>{{$data['chat_requests_completed_count']}}</h5>
              <p>Chat Requests Completed</p>
            </div>
          </div>
        </div>

        <div class="row mt-4 g-4">
          <div class="col-lg-6 col-md-12">
            <div class="card-box">
              <div class="row">
                <div class="col-10">
                  <h3 class="sp-15">Questions asked</h3>
                </div>
                <div class="col-2 text-right  right-icons sp-15">
                <img src="/new-design/user-dashboard/images/dash/777.png" alt="">
                </div>
              </div>

                @foreach($data['questions_asked'] as $k => $question)
                    <div class="hover-ef">
                        <div class="row">
                        <div class="col-9">
                            <p class="g-color">{{$question->to_lawyer ? $question->toLawyer->name : 'Any Lawyer'}}</p>
                            <p class="p-16"><b>{{$question->title ?? 'No title has been added yet by the Admin'}}</b></p>
                        </div>
                        <div class="col-3 text-right  right-icons">
                            <p class="date-r">{{date('d/m/Y', strtotime($question->created_at))}}</p>
                            <p class="time-r">{{date('g:i A', strtotime($question->created_at))}}</p>
                        </div>
                        <div class="col-12">
                            <p class="short-p">{{$question->message}}</p>
                        </div>
                        </div>
                    </div>
                @endforeach

              <p class="text-center Reques"><a href="#">View All Questions Asked</a></p>
            </div>
          </div>

          <div class="col-lg-6 col-md-12">
            <div class="card-box">
              <div class="row">
                <div class="col-10">
                  <h3 class="sp-15">Service Purchased</h3>
                </div>
                <div class="col-2 text-right  right-icons sp-15">
                  <img src="/new-design/user-dashboard/images/dash/77.png" alt="">
                </div>
              </div>
                @foreach($data['service_purchased'] as $k => $service)
                    <div class="hover-ef">
                        <div class="row">
                        <div class="col-9">
                            <p class="g-color">{{$service->service ? $service->service->arbitration->area : '-'}}</p>
                            <p class="p-16"><b>{{$service->service->title}}</b></p>
                        </div>
                        <div class="col-3 text-right  right-icons">
                            <p class="aed-r">AED {{$service->getTotalAmount($service->lawyer_id, $service->service_id)}}</p>
                            <p class="time-r">{{date('g:i A', strtotime($service->created_at))}}</p>
                        </div>
                        <div class="col-12">
                            <p class="short-p">{{$service->service->description}}</p>
                        </div>
                        </div>
                    </div>
                @endforeach
              <p class="text-center Reques"><a href="#">View All Service Purchased</a></p>
            </div>
          </div>

        </div>

        <div class="row mt-4">
          <div class="col-lg-6 col-md-12">
            <div class="card-box">
              <div class="row">
                <div class="col-10">
                  <h3 class="sp-15">Lawyer Consultation</h3>
                </div>
                <div class="col-2 text-right  right-icons sp-15">
                  <img src="/new-design/user-dashboard/images/dash/55.png" alt="">
                </div>
              </div>
            
              @foreach($data['lawyers_consulted'] as $k => $consultation)
                <div class="hover-ef">
                    <div class="row">
                    <div class="col-9">
                        <p class="p-16"><b>{{ substr($consultation->message, 0, 40) }}</b>
                        </p>
                    </div>
                    <div class="col-3 text-right  right-icons">
                        <p class="date-r">{{date('d/m/Y', strtotime($consultation->created_at))}}</p>
                        <p class="time-r">{{date('g:i A', strtotime($consultation->created_at))}}</p>
                    </div>
                    <div class="col-12">
                        <p class="short-p">{{substr($consultation->message, 0, 100)}}</p>
                    </div>
                    </div>
                </div>
                @endforeach

              

              <p class="text-center Reques"><a href="#">View All Consulted Data</a></p>
            </div>
          </div>


          <div class="col-lg-6 col-md-12">
            <div class="card-box">
              <div class="row">
                <div class="col-10">
                  <h3 class="sp-15">Chat Requested </h3>
                </div>
                <div class="col-2 text-right  right-icons sp-15">
                  <img src="/new-design/user-dashboard/images/dash/2.png" alt="">
                </div>
              </div>

              @foreach($data['chat_requests'] as $k => $chatRqst)
                <div class="hover-ef" onclick="chatWithLawyer('{{$chatRqst->lawyer->user_id}}')">
                    <div class=" mb-3">
                    <div class="row align-items-center" id="color-smae">
                        <div class="col-md-2  col-3 icon-center text-center">
                            <img src="/storage/{{$chatRqst->lawyer->profile_pic}}" style="width: 40px;height: 40px;border-radius: 20px;" alt="banner-icon-1" class="online-class">
                        </div>
                        <div class="col-md-7 col-7">
                        <h5 class="font-22"><strong>{{$chatRqst->lawyer->user->name}}</strong></h5>
                        <p class="font-20">{{substr($chatRqst->comment, 0, 40)}}
                        </p>
                        </div>
                        <div class="col-md-2 col-2 text-right  right-icons">
                        <p class="date-r">{{date('d/m/Y', strtotime($chatRqst->created_at))}}</p>
                        <p class="time-r">{{date('g:i A', strtotime($chatRqst->created_at))}}</p>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
            <p class="text-center Reques mt-3"><a href="#">View All Chat Requests</a></p>
          </div>
        </div>
      </div>

@endsection

@push('script')
  <script>
    function chatWithLawyer(lawyerId) {
            window.location.href = "/online-chat/"+lawyerId;
            $(".chatbox").addClass('showbox');
        }
  </script>
@endpush