@extends('lawyer.home.layouts.app')
@section('content')
<div class="working-box">
                    <div class="row">
                        <div class="col-xl-8 col-lg-12 mb-lg-0 mb-3">
                            <div class="row g-4">
                                <div class="col-lg-4 col-md-6 col-6">
                                    <div class="booked">
                                        <div class="text-right">
                                            <img src="/new-design/user-dashboard/images/register/666.png" alt="">
                                        </div>
                                        <h5>{{$questionAnswered}}</h5>
                                        <p>Questions Answered</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-6">
                                    <div class="booked bg-C6EEE2">
                                        <div class="text-right">
                                            <img src="/new-design/user-dashboard/images/register/66.png" alt="">
                                        </div>
                                        <h5>4.7/5</h5>
                                        <p>My Rating</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-6">
                                    <div class="booked bg-EDEEC6 border-0">
                                        <div class="text-right">
                                            <img src="/new-design/user-dashboard/images/register/5.png" alt="">
                                        </div>
                                        <h6>Tips from <br>
                                            Connect Legal</h6>
                                        <a href="#">See more ></a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-6 d-block d-lg-none">
                                    <div class="booked bg-EDEEC6 border-0">
                                        <div class="text-right">
                                            <img src="/new-design/user-dashboard/images/register/666.png" alt="">
                                        </div>
                                        <h5>32</h5>
                                        <p>Booked Appointments</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-8 col-lg-12 mt-4">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-10">
                                                <h3 class="sp-15">Chat Notifications </h3>
                                            </div>
                                            <div class="col-2 text-right  right-icons sp-15">
                                                <i class="fa-solid fa-chart-column"></i>
                                            </div>
                                        </div>
                                        <div class="hover-ef">
                                            <div class="mb-3">
                                                <div class="row" id="color-smae">
                                                    @if($chatNotifications && isset($chatNotifications[0]))
                                                        <div class="col-md-2 icon-center text-center col-3">
                                                            <img src="/new-design/user-dashboard/images/onlie.png" alt="banner-icon-1" class="online-class1">
                                                        </div>
                                                        <div class="col-md-7 col-7" onclick="chatWithUser('{{$chatNotifications[0]->from_user}}')">
                                                            <h5 class="font-22"><strong>{{$chatNotifications[0]->fromUser->name}}
                                                            </strong></h5>
                                                            <p class="font-20">{{$chatNotifications[0]->msg}}</p>
                                                        </div>
                                                        <div class="col-md-3 text-right  right-icons col-2">
                                                            <p class="date-r">{{$chatNotifications[0]->getDateDescription($chatNotifications[0]->created_at)}}</p>
                                                            <p class="time-r">{{date('g:i A', strtotime($chatNotifications[0]->created_at))}}</p>
                                                            <div class="d-flex2">
                                                                <img src="/new-design/user-dashboard/images/cheak-green.png" onclick="closeNotification('{{$chatNotifications[0]->id}}')" alt="">
                                                                <img src="/new-design/user-dashboard/images/delete-red.png" onclick="closeNotification('{{$chatNotifications[0]->id}}')" alt="">
                                                            </div>
                                                        </div>
                                                    @else 
                                                        <div>
                                                            <h6><center>No Notifications</center></h6>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                @foreach($chatNotifications as $k => $notification)
                                    @if($k > 0)
                                        <div class="hover-ef mt-3">
                                            <div class="row" id="color-smae">
                                                <div class="col-md-2 icon-center text-center col-3">
                                                    <img src="/new-design/user-dashboard/images/onlie.png" alt="banner-icon-1" class="online-class1">
                                                </div>
                                                <div class="col-md-7 col-7" onclick="chatWithUser('{{$notification->from_user}}')">
                                                    <h5 class="font-22"><strong>{{$notification->fromUser->name}}
                                                    </strong></h5>
                                                    <p class="font-20">{{$notification->msg}}</p>
                                                </div>
                                                <div class="col-md-3 text-right  right-icons col-2">
                                                    <p class="date-r">{{$notification->getDateDescription($notification->created_at)}}</p>
                                                    <p class="time-r">{{date('g:i A', strtotime($notification->created_at))}}</p>
                                                    <div class="d-flex2">
                                                    <img src="/new-design/user-dashboard/images/cheak-green.png" onclick="closeNotification('{{$notification->id}}')" alt="">
                                                    <img src="/new-design/user-dashboard/images/delete-red.png" onclick="closeNotification('{{$notification->id}}')" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <p class="text-center Reques mt-3"><a href="#">View All Chat Notifications</a></p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12 mt-4">
                            <div class="card-box border-0 p-0">
                            <div class="booked bg-208C84-change" id="booked-new">
                                <h4>New Questions</h4>
                                <div class="row mb-3">
                                <div class="col-2">
                                    <h6 class="text-white">01</h6>
                                </div>
                                <div class="col-10">
                                    <p>It is a long establishIt is a long established fact that a reader will be distracted?
                                    </p>
                                </div>
                                </div>
                                <div class="row mb-3">
                                <div class="col-2">
                                    <h6 class="text-white">02</h6>
                                </div>
                                <div class="col-10">
                                    <p>It is a long establishIt is a long established fact that a reader will be distracted?
                                    </p>
                                </div>
                                </div>
                                <div class="row mb-3">
                                <div class="col-2">
                                    <h6 class="text-white">03</h6>
                                </div>
                                <div class="col-10">
                                    <p>It is a long establishIt is a long established fact that a reader will be distracted?
                                    </p>
                                </div>
                                </div>
                                <div class="row mb-3">
                                <div class="col-2">
                                    <h6 class="text-white">03</h6>
                                </div>
                                <div class="col-10">
                                    <p>It is a long establishIt is a long established fact that a reader will be distracted?
                                    </p>
                                </div>
                                </div>
                                <div class="row mb-3">
                                <div class="col-2">
                                    <h6 class="text-white">05</h6>
                                </div>
                                <div class="col-10">
                                    <p>It is a long establishIt is a long established fact that a reader will be distracted?
                                    </p>
                                </div>
                                </div>
                                <div class="text-center">
                                <a href="#" class="viwe_all text-white" style="font-weight: 600; font-size:14px;">View All</a>
                                </div>
                            </div>
                            </div>
                    </div>
                    </div>
                </div>
                <div class="col-xl-4  col-lg-12 mb-lg-0 mb-3 mt-lg-0 mt-3">
                    <div class="height-cover">
                    <div class="bookedd" id="listbox">
                        <h4>Your To-Do List</h4>
                        <div class="row mb-3 align-items-center">
                        <div class="col-3">
                            <div class="color-1">
                            <h6><img src="/new-design/user-dashboard/images/dashcopy/Group.png" alt=""></h6>
                            </div>
                        </div>
                        <div class="col-9">
                            <span>Urgent Alejandro’s Call</span>
                            <p>March 06 at 9:00 am
                            </p>
                        </div>
                        </div>
                        <div class="row mb-3 align-items-center">
                        <div class="col-3">
                            <div class="color-1 color-bg1">
                            <h6> <img src="/new-design/user-dashboard/images/dashcopy/Vector (6).png" alt=""> </h6>
                            </div>
                        </div>
                        <div class="col-9">
                            <span>Send Message to Devi</span>
                            <p>March 06 at 9:00 am
                            </p>
                        </div>
                        </div>
                        <div class="row mb-3 align-items-center">
                        <div class="col-3">
                            <div class="color-1 color-bg2">
                            <h6> <img src="/new-design/user-dashboard/images/dashcopy/Vector (7).png" alt=""></h6>
                            </div>
                        </div>
                        <div class="col-9">
                            <span>Make Copy of VISA</span>
                            <p>March 06 at 9:00 am
                            </p>
                        </div>
                        </div>
                        <div class="row mb-3 align-items-center">
                        <div class="col-3">
                            <div class="color-1 color-bg3">
                            <h6> <img src="/new-design/user-dashboard/images/dashcopy/material-symbols_video-chat-rounded.png" alt=""> </h6>
                            </div>
                        </div>
                        <div class="col-9">
                            <span>Meeting with Customer</span>
                            <p>March 06 at 9:00 am
                            </p>
                        </div>
                        </div>
                        <div class="row mb-3 align-items-center">
                        <div class="col-3">
                            <div class="color-1">
                            <h6> <img src="/new-design/user-dashboard/images/dashcopy/Vector (8).png" alt=""></h6>
                            </div>
                        </div>
                        <div class="col-9">
                            <span>Send Message to Kate Jm</span>
                            <p>March 06 at 9:00 am
                            </p>
                        </div>
                        </div>
                        <div class="row mb-3 align-items-center">
                        <div class="col-3">
                            <div class="color-1 color-bg5">
                            <h6> <img src="/new-design/user-dashboard/images/dashcopy/ic_twotone-attach-email.png" alt=""></h6>
                            </div>
                        </div>
                        <div class="col-9">
                            <span>Check email of Prabhjas</span>
                            <p>March 06 at 9:00 am
                            </p>
                        </div>
                        </div>
                        <div class="text-center">
                        <a href="#" class="viwe_all"> View All</a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="row g-4">
                <div class="col-xl-8 col-lg-12 mb-lg-0 mb-3" id="swiperdemoclass">
                    <div class="swiper mySwiper d-none d-md-block">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                        <div class="row" id="border-class">
                            <div class="col-md-4 p-0">
                            <div class="img-swiper">
                                <img src="/new-design/user-dashboard/images/baba.png" alt="">
                            </div>
                            </div>
                            <div class="col-md-8">
                            <div class="padding-cover">
                                <span>RECENT ARTICLES</span>
                                <h5>VISA Inmigration to Dubai, UAE</h5>
                                <p>It is a long established fact that a reader will be
                                distracted by the readable content of a page when looking
                                at its layout. The point of using Lorem Ipsum is that it has a
                                more-or-less normal distribution of letters, as opposed to using
                                'Content here, content here', making it look like readable English.</p>
                                <div class="row">
                                <div class="col-sm-4">
                                    <p> <strong>Autor:</strong> Alejandro M.</p>
                                </div>
                                <div class="col-sm-8">
                                    <p> <strong></strong> 12 Dic 2022 - 12:56 pm</p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="swiper-slide">
                        <div class="row" id="border-class">
                            <div class="col-md-4 p-0">
                            <div class="img-swiper">
                                <img src="/new-design/user-dashboard/images/baba.png" alt="">
                            </div>
                            </div>
                            <div class="col-md-8">
                            <div class="padding-cover">
                                <span>RECENT ARTICLES</span>
                                <h5>VISA Inmigration to Dubai, UAE</h5>
                                <p>It is a long established fact that a reader will be
                                distracted by the readable content of a page when looking
                                at its layout. The point of using Lorem Ipsum is that it has a
                                more-or-less normal distribution of letters, as opposed to using
                                'Content here, content here', making it look like readable English.</p>
                                <div class="row">
                                <div class="col-sm-4">
                                    <p> <strong>Autor:</strong> Alejandro M.</p>
                                </div>
                                <div class="col-sm-8">
                                    <p> <strong></strong> 12 Dic 2022 - 12:56 pm</p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="swiper-slide">
                        <div class="row" id="border-class">
                            <div class="col-md-4 p-0">
                            <div class="img-swiper">
                                <img src="/new-design/user-dashboard/images/baba.png" alt="">
                            </div>
                            </div>
                            <div class="col-md-8">
                            <div class="padding-cover">
                                <span>RECENT ARTICLES</span>
                                <h5>VISA Inmigration to Dubai, UAE</h5>
                                <p>It is a long established fact that a reader will be
                                distracted by the readable content of a page when looking
                                at its layout. The point of using Lorem Ipsum is that it has a
                                more-or-less normal distribution of letters, as opposed to using
                                'Content here, content here', making it look like readable English.</p>
                                <div class="row">
                                <div class="col-sm-4">
                                    <p> <strong>Autor:</strong> Alejandro M.</p>
                                </div>
                                <div class="col-sm-8">
                                    <p> <strong></strong> 12 Dic 2022 - 12:56 pm</p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="swiper-slide">
                        <div class="row" id="border-class">
                            <div class="col-md-4 p-0">
                            <div class="img-swiper">
                                <img src="/new-design/user-dashboard/images/baba.png" alt="">
                            </div>
                            </div>
                            <div class="col-md-8">
                            <div class="padding-cover">
                                <span>RECENT ARTICLES</span>
                                <h5>VISA Inmigration to Dubai, UAE</h5>
                                <p>It is a long established fact that a reader will be
                                distracted by the readable content of a page when looking
                                at its layout. The point of using Lorem Ipsum is that it has a
                                more-or-less normal distribution of letters, as opposed to using
                                'Content here, content here', making it look like readable English.</p>
                                <div class="row">
                                <div class="col-sm-4">
                                    <p> <strong>Autor:</strong> Alejandro M.</p>
                                </div>
                                <div class="col-sm-8">
                                    <p> <strong></strong> 12 Dic 2022 - 12:56 pm</p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                    </div>

                    <div class="demo d-block d-md-none">
                    <div class="container">
                        <div class="row">
                        <div class="col-md-12">
                            <div id="testimonial-slider" class="owl-carousel">
                            <div class="testimonial">
                                <div class="row py-5">
                                <div class="col-md-4 ">
                                    <div class="img-swiper">
                                    <img src="/new-design/user-dashboard/images/baba.png" alt="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="padding-cover mt-lg-0 mt-4">
                                    <span>RECENT ARTICLES</span>
                                    <h5>VISA Inmigration to Dubai, UAE</h5>
                                    <p>It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking
                                        at its layout. The point of using Lorem Ipsum is that it has a
                                        more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English.</p>
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                        <p> <strong>Autor:</strong> Alejandro M.</p>
                                        </div>
                                        <div class="col-md-8 col-12">
                                        <p> <strong></strong> 12 Dic 2022 - 12:56 pm</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <div class="testimonial">
                                <div class="row py-5">
                                <div class="col-md-4 ">
                                    <div class="img-swiper">
                                    <img src="/new-design/user-dashboard/images/baba.png" alt="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="padding-cover mt-lg-0 mt-4">
                                    <span>RECENT ARTICLES</span>
                                    <h5>VISA Inmigration to Dubai, UAE</h5>
                                    <p>It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking
                                        at its layout. The point of using Lorem Ipsum is that it has a
                                        more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English.</p>
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                        <p> <strong>Autor:</strong> Alejandro M.</p>
                                        </div>
                                        <div class="col-md-8 col-12">
                                        <p> <strong></strong> 12 Dic 2022 - 12:56 pm</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="testimonial">
                                <div class="row py-5">
                                <div class="col-md-4 ">
                                    <div class="img-swiper">
                                    <img src="/new-design/user-dashboard/images/baba.png" alt="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="padding-cover mt-lg-0 mt-4">
                                    <span>RECENT ARTICLES</span>
                                    <h5>VISA Inmigration to Dubai, UAE</h5>
                                    <p>It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking
                                        at its layout. The point of using Lorem Ipsum is that it has a
                                        more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English.</p>
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                        <p> <strong>Autor:</strong> Alejandro M.</p>
                                        </div>
                                        <div class="col-md-8 col-12">
                                        <p> <strong></strong> 12 Dic 2022 - 12:56 pm</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="testimonial">
                                <div class="row py-5">
                                <div class="col-md-4 ">
                                    <div class="img-swiper">
                                    <img src="/new-design/user-dashboard/images/baba.png" alt="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="padding-cover mt-lg-0 mt-4">
                                    <span>RECENT ARTICLES</span>
                                    <h5>VISA Inmigration to Dubai, UAE</h5>
                                    <p>It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking
                                        at its layout. The point of using Lorem Ipsum is that it has a
                                        more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English.</p>
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                        <p> <strong>Autor:</strong> Alejandro M.</p>
                                        </div>
                                        <div class="col-md-8 col-12">
                                        <p> <strong></strong> 12 Dic 2022 - 12:56 pm</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-6 d-none d-xl-block">
                    <div class="booked bg-EDEEC6 height-same border-0">
                    <div class="text-start" id="booked-white">
                        <img src="/new-design/user-dashboard/images/cheak1.png" alt="" class="img-responsive mb-3">
                    <p>Write your own article</p>
                    <span>Write one article</span>
                    </div>
                </div>

                </div>
            </div>
@endsection
@push('script')
    <script>
        function chatWithUser(userId) {
            window.open("/online-chat/"+userId, "_blank");    
        }

        function closeNotification(notificationId) {
            window.location.href = "/lawyer/close-notification/"+notificationId
        }
    </script>
@endpush