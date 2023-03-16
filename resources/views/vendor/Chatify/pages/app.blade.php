<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat_lowyar_2 </title>
    <meta name="description" content="A description of the page content.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- css File link  -->
    <link rel="stylesheet" type="text/css" href="/new-design/user-dashboard/css/style-dash.css">
    <link rel="stylesheet" type="text/css" href="/new-design/user-dashboard/css/style.css">
    <link rel="stylesheet" type="text/css" href="/new-design/user-dashboard/css/respinsive.css">
    <!-- Google Font Poppins-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Dont-Awesome Icon-->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!--carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">

    <!-- fevicon icon -->
    <link href="/new-design/user-dashboard/images/fevicon.png" rel="shortcut icon" type="image/png">
</head>

<body>
    <div class="flex-part">
        <div class="left-menu-bar">
            <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
                <ul class="list-group">
                    <a href="#" data-toggle="sidebar-colapse"
                        class=" list-group-item list-group-item-action d-flex mmmm">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span id="collapse-icon" class="fa fa-2x mr-3"><img src="/new-design/user-dashboard/images/fa-white.png" alt="fa-white"
                                    class="fav-white"></span>
                            <span id="collapse-text" class="menu-collapsed"><img src="/new-design/user-dashboard/images/off-logo.png"
                                    alt="off-logo" class="fav-icon"> </span>
                        </div>
                    </a>
                    <div id='submenu1' class="collapse sidebar-submenu">
                        <ul class="menu-left">
                            <li><a href="" class="active-nav"><i class="fa-solid fa-house-user"></i> Home</a></li>
                            <li><a href="#"><i class="fa-solid fa-landmark"></i>Dashboard</a></li>
                            <li><a href="#"><i class="fa-solid fa-users"></i>My Activity</a></li>
                            <li><a href="#"><i class="fa-solid fa-question"></i> Schedule Events</a></li>
                            <li><a href="#"><i class="fa-solid fa-star"></i> Chat Online Requests</a></li>
                            <li><a href="#"><i class="fa-solid fa-bag-shopping"></i>Services</a></li>
                            <li><a href="#"><i class="fa-solid fa-user"></i> Lawyer Community</a></li>
                            <li><a href="#"><i class="fa-solid fa-scale-balanced"></i>Question & Answer</a></li>
                            <li><a href="#"><i class="fa-solid fa-book"></i>Lawyer Articles</a></li>
                            <li><a href="#"><i class="fa-solid fa-address-card"></i>Q & A</a></li>
                        </ul>
                    </div>

                    <div class="icons-part-left">
                        <ul class="menu-left white-left">
                            <li><a href="#"><i class="fa-solid fa-user"></i></a></li>
                            <li><a href="#"><i class="fa-solid fa-table"></i></a></li>
                            <li><a href="#"><i class="fa-regular fa-comment"></i> </a></li>
                            <li><a href="#"><i class="fa-solid fa-table-cells-large"></i> </a></li>
                            <li><a href="#"><i class="fa-solid fa-question"></i> </a></li>
                            <li><a href="#"><i class="fa-solid fa-right-from-bracket"></i> </a></li>
                        </ul>
                    </div>
                    <li class="list-group-item sidebar-separator-title text-muted d-flex menu-collapsed">
                    </li>
                </ul>
            </div>
        </div>
        <div class="dash-body">
            <div class="top-header">
                <div class="row">
                    <div class="col-sm-9 d-none d-xl-block">
                        <nav class="navbar navbar-expand-lg navbar-light main-menu">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="#">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">How It Works</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">For Lawyers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Testimonials</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Blogs &amp; Articles</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Lawyers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Practice Area</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="col-sm-3 d-none d-xl-block">
                        <div class="user-nav">
                            <div class="row">
                                <div class="col-sm-2">
                                    <p class="bell-icon">
                                        <a href="#"><i class="fa-solid fa-bell"></i></a>
                                        <span class="round-white"></span>
                                    </p>
                                </div>
                                <div class="col-sm-9">
                                    <div class="row ">
                                        <div class="col-sm-4">
                                            <div class="round-user">
                                                <img src="/new-design/user-dashboard/images/question-1.png" alt="question-1" class="user-li">
                                                <span class="round"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 names">
                                            <p class="font-name"> Ranjit Devi</p>
                                            <p class="font-ad">UAE, Dubai</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1 pl-0 ">
                                    <ul class="moreoption">
                                        <li class="navbar nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#"
                                                role="button" data-bs-toggle="dropdown"
                                                aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical text-white"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"> <img
                                                            src="/new-design/user-dashboard/images/file-2.png" alt="">
                                                        Action</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#"> <img
                                                            src="/new-design/user-dashboard/images/file-2.png" alt="">
                                                        Action</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#"> <img
                                                            src="/new-design/user-dashboard/images/file-2.png" alt="">
                                                        Action</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#"> <img
                                                            src="/new-design/user-dashboard/images/file-2.png" alt="">
                                                        Action</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#"> <img
                                                            src="/new-design/user-dashboard/images/file-2.png" alt="">
                                                        Action</a>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-8  col-12 d-block d-xl-none">
                        <div class="d-flex1 ">
                            <div class="col-md-2">
                                <a class="" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                                    aria-controls="offcanvasExample">
                                    <img src="/new-design/user-dashboard/images/toogle.png" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a class="" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                                    aria-controls="offcanvasExample">
                                    <center> <img src="/new-design/user-dashboard/images/ft-logo.png" alt="off-logo" class="off-logo m-0">
                                    </center>
                                </a>
                            </div>
                            <div class="col-md-3 text-end">
                                <a class="" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                                    aria-controls="offcanvasExample">
                                    <img src="/new-design/user-dashboard/images/question-1.png" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                            aria-labelledby="offcanvasExampleLabel">
                            <div class="offcanvas-header">
                                <div class="text-left-part"> <img src="/new-design/user-dashboard/images/off-logo.png" alt="off-logo" class="off-logo"></div>  <a type="button" class="btn-close bg-des" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></a>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="menu-left">
                                    <li><a href="" class="active-nav"><i class="fa-solid fa-house-user"></i> Home</a>
                                    </li>
                                    <li><a href="#"><i class="fa-solid fa-landmark"></i> How It Works</a></li>
                                    <li><a href="#"><i class="fa-solid fa-users"></i> For Lawyers</a></li>
                                    <li><a href="#"><i class="fa-solid fa-question"></i> Testimonials</a></li>
                                    <li><a href="#"><i class="fa-solid fa-star"></i> Testimonials</a></li>
                                    <li><a href="#"><i class="fa-solid fa-bag-shopping"></i> Our Lawyers</a></li>
                                    <li><a href="#"><i class="fa-solid fa-user"></i> Lawyers</a></li>
                                    <li><a href="#"><i class="fa-solid fa-scale-balanced"></i> Practice Area</a></li>
                                    <li><a href="#"><i class="fa-solid fa-book"></i> Blogs & Articles</a></li>
                                    <li><a href="#"><i class="fa-solid fa-address-card"></i>Legal services</a></li>
                                    <li><a href="#"><i class="fa-solid fa-gavel"></i> Legal Articles</a></li>
                                    <li><a href="#"><i class="fa-solid fa-right-from-bracket"></i> Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="message-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="chat-area">
                                <!-- chatlist -->
                                <div class="chatlist">
                                    <div class="modal-dialog-scrollable fadeup">
                                        <div class="modal-content">
                                            <div class="chat-header">
                                                <div class="msg-search">
                                                    @if($lawyerDetail)
                                                        <img src="/new-design/user-dashboard/images/legal-2.png" alt="">
                                                    @else 
                                                        <img src="/storage/{{auth()->user()->getProfilePic(auth()->user()->id)}}"  style="width: 40px;height: 40px;border-radius: 20px;" alt="">
                                                    @endif
                                                    <a class="add" href="#" style="text-decoration:none;">
                                                        <ul class="moreoption">
                                                            <i class="fa-solid fa-magnifying-glass"></i>
                                                            <!-- <li class="navbar nav-item dropdown">
                                                                <a class="nav-link dropdown-toggle d-none d-md-block" href="#"
                                                                    role="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false"><i
                                                                        class="fa-solid fa-ellipsis"></i></a>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="#"> <img
                                                                                src="/new-design/user-dashboard/images/file-2.png" alt="">
                                                                            Action</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item" href="#"> <img
                                                                                src="/new-design/user-dashboard/images/file-2.png" alt="">
                                                                            Action</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item" href="#"> <img
                                                                                src="/new-design/user-dashboard/images/file-2.png" alt="">
                                                                            Action</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item" href="#"> <img
                                                                                src="/new-design/user-dashboard/images/file-2.png" alt="">
                                                                            Action</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item" href="#"> <img
                                                                                src="/new-design/user-dashboard/images/file-2.png" alt="">
                                                                            Action</a>
                                                                    </li>
                                                                </ul>
                                                            </li> -->

                                                        </ul>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <!-- chat-list -->
                                                <div class="chat-lists">
                                                    <div class="tab-content" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="Open" role="tabpanel"
                                                            aria-labelledby="Open-tab">
                                                            <!-- chat-list -->
                                                            <div class="chat-list">
                                                                @if($acceptedLawyers)
                                                                    @foreach($acceptedLawyers as $k => $lawyer)
                                                                        <a href="#" onclick="chatWithLawyer('{{$lawyer->lawyer->user_id}}')" class="d-flex">
                                                                            <div class="flex-shrink-0">
                                                                                <img class="img-fluid"
                                                                                    src="/storage/{{$lawyer->lawyer->profile_pic}}"
                                                                                    style="width: 40px;height: 40px;border-radius: 20px;"
                                                                                    alt="user img">
                                                                                <!-- <span class="active"></span> -->
                                                                            </div>
                                                                            <div class="flex-grow-1 ms-3">
                                                                                <h3>{{$lawyer->lawyer->user->name}}</h3>
                                                                                <p>{{$lawyer->latestMsg($lawyer->lawyer->user_id)}}
                                                                                    <strong>{{$lawyer->latestMsgCreatedAt($lawyer->lawyer->user_id)}}</strong> </p>
                                                                            </div>
                                                                        </a>
                                                                    @endforeach
                                                                @else 
                                                                    @foreach($usersAccepted as $k => $user)
                                                                        <a href="#" onclick="chatWithLawyer('{{$user->user_id}}')" class="d-flex">
                                                                            <div class="flex-shrink-0">
                                                                                <!-- <img class="img-fluid"
                                                                                    src=""
                                                                                    style="width: 40px;height: 40px;border-radius: 20px;"
                                                                                    alt="user img"> -->
                                                                                <!-- <span class="active"></span> -->
                                                                            </div>
                                                                            <div class="flex-grow-1 ms-3">
                                                                                <h3>{{$user->user->name}}</h3>
                                                                                <p>{{$user->latestMsg($user->user_id)}}
                                                                                    <strong>{{$user->latestMsgCreatedAt($user->user_id)}}</strong> </p>
                                                                            </div>
                                                                        </a>
                                                                    @endforeach

                                                                @endif
                                                            </div>
                                                            <!-- chat-list -->
                                                        </div>
                                                        <div class="tab-pane fade" id="Closed" role="tabpanel"
                                                            aria-labelledby="Closed-tab">

                                                            <!-- chat-list -->
                                                            <div class="chat-list">
                                                                @if($acceptedLawyers)
                                                                    @foreach($acceptedLawyers as $k => $lawyer)
                                                                        <a href="#" onclick="chatWithLawyer('{{$lawyer->lawyer->user_id}}')" class="d-flex">
                                                                            <div class="flex-shrink-0">
                                                                                <img class="img-fluid"
                                                                                    style="width: 40px;height: 40px;border-radius: 20px;"
                                                                                    src="/storage/{{$lawyer->lawyer->profile_pic}}"
                                                                                    alt="user img">
                                                                                <span class="active"></span>
                                                                            </div>
                                                                            <div class="flex-grow-1 ms-3">
                                                                                <h3>{{$lawyer->lawyer->user->name}}</h3>
                                                                                <p>{{$lawyer->latestMsg($lawyer->lawyer->user_id)}}
                                                                                    <strong>{{$lawyer->latestMsgCreatedAt($lawyer->lawyer->user_id)}}</strong> </p>
                                                                            </div>
                                                                        </a>
                                                                    @endforeach
                                                                @else
                                                                    @foreach($usersAccepted as $k => $user)
                                                                        <a href="#" onclick="chatWithLawyer('{{$user->user_id}}')" class="d-flex">
                                                                            <div class="flex-shrink-0">
                                                                            </div>
                                                                            <div class="flex-grow-1 ms-3">
                                                                                <h3>{{$user->user->name}}</h3>
                                                                                <p>{{$user->latestMsg($user->user_id)}}
                                                                                    <strong>{{$user->latestMsgCreatedAt($user->user_id)}}</strong> </p>
                                                                            </div>
                                                                        </a>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                            <!-- chat-list -->
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- chat-list -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- chatlist -->



                                <!-- chatbox -->
                                <div class="chatbox">
                                    <div class="modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="msg-head">
                                                <div class="row align-items-center">
                                                    <div class="col-8">
                                                        <div class="d-flex align-items-center">
                                                            <span class="chat-icon"><i
                                                                    class="fa-solid fa-arrow-left"></i></span>
                                                            <div class="flex-shrink-0">
                                                                @if($lawyerDetail)
                                                                    <img class="img-fluid"
                                                                        style="width: 40px;height: 40px;border-radius: 20px;"
                                                                        src="/storage/{{$lawyerDetail ? $lawyerDetail->profile_pic : null}}"
                                                                        alt="{{$lawyerDetail ? $lawyerDetail->user->name : $userDetail->name}}">
                                                                @endif
                                                            </div>
                                                            <div class="flex-grow-1 color-p-syte ms-3">
                                                                <h3>{{$lawyerDetail ? $lawyerDetail->user->name : $userDetail->name}}
                                                                </h3>
                                                                <p>{{$lawyerDetail ? $lawyerDetail->emirates : '-'}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <ul class="moreoption">
                                                            <i class="fa-solid fa-magnifying-glass"></i>
                                                            <li class="navbar nav-item dropdown">
                                                                <a class="nav-link dropdown-toggle" href="#"
                                                                    role="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false"><i
                                                                        class="fa-solid fa-ellipsis"></i></a>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="#"> <img
                                                                                src="/new-design/user-dashboard/images/file-2.png" alt="">
                                                                            Action</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item" href="#"> <img
                                                                                src="/new-design/user-dashboard/images/file-2.png" alt="">
                                                                            Action</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item" href="#"> <img
                                                                                src="/new-design/user-dashboard/images/file-2.png" alt="">
                                                                            Action</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item" href="#"> <img
                                                                                src="/new-design/user-dashboard/images/file-2.png" alt="">
                                                                            Action</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item" href="#"> <img
                                                                                src="/new-design/user-dashboard/images/file-2.png" alt="">
                                                                            Action</a>
                                                                    </li>
                                                                </ul>
                                                            </li>

                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal-body chat-history">
                                                <div class="msg-body appendLatestMsg" id="chat-text">
                                                    <input type="hidden" name="to_id" id="to_id" value="{{$id}}">
                                                    @foreach($messages as $k => $message)
                                                        @if($message->from_id != auth()->user()->id)
                                                            <ul>
                                                                <li class="row col-md-6 sender color-border">
                                                                    <div class="chat-left">
                                                                        <p>{{$message->body}}</p>
                                                                        <h6 class="text-end">{{date('g:i A', strtotime($message->created_at))}}
                                                                            @if($message->seen)
                                                                                <i class="fas fa-check-double"></i>
                                                                            @else 
                                                                                <i class="fa-solid fa-check"></i>
                                                                            @endif
                                                                        </h6>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        @else
                                                            <ul>
                                                                <li class="row col-md-6 repaly reply-two">
                                                                    <div class="chat-left colorchane">
                                                                        <p>{{$message->body}}</p>
                                                                        <h6 class="text-end">{{date('g:i A', strtotime($message->created_at))}}
                                                                            @if($message->seen)
                                                                                <i class="fas fa-check-double"></i>
                                                                            @else 
                                                                                <i class="fa-solid fa-check"></i>
                                                                            @endif
                                                                        </h6>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        @endif
                                                    @endforeach
                                                    
                                                    <div class="upload-image" style="display: none;">
                                                        <div class="text-center max-file">
                                                            <img src="/new-design/user-dashboard/images/file.png" alt="">
                                                            <p class="m-0 mt-3">Name of file.pdf</p>
                                                            <p class="m-0"> 3.5 MB · PDF</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="send-box position-relative">
                                                <div class="intercom-composer-popover intercom-composer-emoji-popover">
                                                    <div class="intercom-emoji-picker">
                                                        <div class="intercom-composer-popover-header"><input
                                                                class="intercom-composer-popover-input"
                                                                placeholder="Search" value=""></div>
                                                        @include('vendor.Chatify.pages.emoji')
                                                    </div>
                                                    <div class="intercom-composer-popover-caret"></div>
                                                </div>
                                                <form id="message-form" method="POST" action="{{ route('send.message') }}" onsubmit="return false;">
                                                    @csrf()
                                                    <input type="text" class="form-control" id="msgField"
                                                        aria-label="message…" placeholder="Write message…">
                                                    <img style="cursor: pointer;" id="emoji-picker"
                                                        src="/new-design/user-dashboard/images/file-snd.png" alt="" class="postiotion-1">
                                                    <img src="/new-design/user-dashboard/images/filesnd.png" class="postiotion-2">
                                                    <button type="button" onclick="sendMessage()"><i class="fa fa-paper-plane"
                                                            aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- chatbox -->
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <!-- char-area -->
    </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="//js.pusher.com/3.1/pusher.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js">
    </script>


    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('a34a416e0fe588185c8e', {
            cluster: 'ap2'
        });
        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('user-msg');

        // Bind a function to a Event (the full Laravel class)
        channel.bind('App\\Events\\UserMsg', function(data) {
            if(data.type === "UserMsg") {
                    $.ajax({
                    method:"get",
                    url: "/user-latest-msg/"+data.toId,
                    success: function(res) {
                        $(".appendLatestMsg").append(res);
                    }
                });
            }
        }); 

        function chatWithLawyer(lawyerId) {
            window.location.href = "/online-chat/"+lawyerId;
            $(".chatbox").addClass('showbox');
        }

    </script>

    <script type="text/javascript">
        var temporaryMsgId = 0;
        const access_token = $('meta[name="csrf-token"]').attr("content");
        $(document).ready(function () {         
            $(".chatbox").addClass('showbox');   
            // Hide submenus
            $('#body-row .collapse').collapse('hide');

            // Collapse/Expand icon
            $('#collapse-icon').addClass('fa-angle-double-left');

            // Collapse click
            $('[data-toggle=sidebar-colapse]').click(function () {
                SidebarCollapse();
            });

            function SidebarCollapse() {
                $('.menu-collapsed').toggleClass('d-none');
                $('.sidebar-submenu').toggleClass('d-none');
                $('.submenu-icon').toggleClass('d-none');
                $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');

                // Collapse/Expand icon
                $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
            }
        });
    </script>
    <script>
        jQuery(document).ready(function () {
            $(".chat-list a").click(function () {
                $(".chatbox").addClass('showbox');
                return false;
            });

            $(".chat-icon").click(function () {
                $(".chatbox").removeClass('showbox');
            });


        });



        $(document).on("click", "#emoji-picker", function (e) {
            e.stopPropagation();
            $('.intercom-composer-emoji-popover').toggleClass("active");
        });

        $(document).click(function (e) {
            if ($(e.target).attr('class') != '.intercom-composer-emoji-popover' && $(e.target).parents(
                    ".intercom-composer-emoji-popover").length == 0) {
                $(".intercom-composer-emoji-popover").removeClass("active");
            }
        });

        $(document).on("click", ".intercom-emoji-picker-emoji", function (e) {
            var old = $("#msgField").val();
            $("#msgField").val(old + $(this).html());
        });

        $('.intercom-composer-popover-input').on('input', function () {
            var query = this.value;
            if (query != "") {
                $(".intercom-emoji-picker-emoji:not([title*='" + query + "'])").hide();
            } else {
                $(".intercom-emoji-picker-emoji").show();
            }
        });


        function sendMessage() {
            
            temporaryMsgId += 1;
            let tempID = `temp_${temporaryMsgId}`;
            const messagesContainer = $(".chat-history");
            const messageInput = $("#message-form .m-send")
            const inputValue = $.trim(messageInput.val());
            var toId = $("#to_id").val()
            $(".sending").css('display', 'block');
            $(".sending").css('text-align', 'center');
            var msg = $("#msgField").val();
            if(msg) {

                $("#msgField").val("")            
                let hasFile = !!$(".upload-attachment").val();  
                // const formData = "abcd";
                const formData = new FormData($("#message-form")[0]);            
                formData.append("_token", access_token);
                formData.append("temporaryMsgId", tempID);
                formData.append("message", msg);
                formData.append("to_id", toId);
                // debugger
                // document.getElementById('msgField').setAttribute("style","padding-left:5%;overflow:hidden;overflow-wrap:break-word;");
                // if(msg) {
                $.ajax({
                    method:"post",
                    url: "/online-chat/sendMessage",
                    // data: {
                    //     "_token": "{{ csrf_token() }}",
                    //     'msg':msg,
                    //     'data':formData 
                    // },
                    data: formData,
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    beforeSend: () => {
                        // remove message hint
                        $(".messages").find(".message-hint").remove();
                        // append a temporary message card
                        
                        // scroll to bottom
                        scrollToBottom(messagesContainer);
                        messageInput.css({ height: "42px" });
                        // form reset and focus
                        $("#message-form").trigger("reset");
                        // cancelAttachment();
                        messageInput.focus();
                    },
                    success: function(res){                    
                        $("#chat-text").animate({ scrollTop: $('#chat-text').prop("scrollHeight")}, 1000);
                        $('#chat-text').scrollTop($('#chat-text')[0].scrollHeight);
                    }
                });
            }
            // }
        }

        function scrollToBottom(container) {
            $(container)
                .stop()
                .animate({
                scrollTop: $(container)[0].scrollHeight,
                });
        }
    </script>
</body>

</html>
