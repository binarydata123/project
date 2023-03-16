<!DOCTYPE html>
<html lang="en">

    @include('lawyer.community.layouts.head')

    <!-- <body  style="background-image: url('/community/assets/images/smiley-bg.jpg');"> -->
    <body  class="bg-smile">
        @include('common.layouts.header')
        <!-- page body start -->
        @include('lawyer.community.layouts.tabs')

        <div class="page-center" style="margin-left:12%;width: calc(100% - 245px)!important;">
            <div class="container-fluid section-t-space px-0">
                <div class="page-content">
                    <div class="content-center w-100">
                        <!-- friend list -->
                        <div class="friend-list-box section-b-space">
                            <div class="card-title">
                                <h3>Lawyers</h3>
                                <!-- <div class="right-setting">
                                    <div class="search-input input-style icon-right">
                                        <i data-feather="search" class="icon-dark icon iw-16"></i>
                                        <input type="text" class="form-control" placeholder="find friends...">
                                    </div>                                    
                                </div> -->
                            </div>
                            <div class="container-fluid">
                                <div class="friend-list friend-page-list">
                                    <ul>
                                        @forelse($lawyers as $k => $lawyer)
                                            <li>
                                                <div class="profile-box friend-box">
                                                    <div class="profile-content">
                                                        <div class="profile-detail">
                                                            <h2>{{$lawyer->user->name}}</h2>
                                                            <h5>{{$lawyer->user->email}}</h5>
                                                            <h5>{{$lawyer->emirates}}</h5>

                                                            <a href="/online-chat/{{$lawyer->user_id}}" class="btn btn-outline">Chat</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                            <div style="margin-left: 34%">
                                                <h3 class="counter-value" >Oops! You haven't created any group yet</h3>
                                            </div>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('lawyer.community.layouts.scripts')

    </body>

</html>