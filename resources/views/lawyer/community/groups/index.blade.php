<!DOCTYPE html>
<html lang="en">
    @include('lawyer.community.layouts.head')
    <body class="bg-smile">
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
                                <h3>Groups Created By Me</h3>
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
                                        @forelse($groupsByMe as $k => $group)
                                            <li>
                                                <div class="profile-box friend-box">
                                                    <div class="profile-content">
                                                        <div class="profile-detail">
                                                            <h2>{{$group->group_name}}</h2>
                                                            <!-- <h5>Admin: {{$group->admin->name}}</h5> -->
                                                            <div class="counter-stats">
                                                                <ul>
                                                                    <li>
                                                                        <h3 class="counter-value">{{$group->totalMembers($group->id) + 1}}</h3>
                                                                        <h5>Members</h5>
                                                                    </li>                                                                   
                                                                </ul>
                                                            </div>
                                                            <a href="{{route('lawyer.community.group.feed', $group->id)}}" class="btn btn-outline">view</a>
                                                            <a href="{{route('lawyer.community.group.chat', $group->id)}}" class="btn btn-outline">Chat</a>
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
                        <div class="friend-list-box section-b-space">
                            <div class="card-title">
                                <h3>Groups I'm Part Of</h3>
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
                                        @forelse($groupsIamIn as $k => $group)
                                            <li>
                                                <div class="profile-box friend-box">
                                                    <div class="profile-content">
                                                        <div class="profile-detail">
                                                            <h2>{{$group->group->group_name}}</h2>
                                                            <h5>Admin: {{$group->group->admin->name}}</h5>
                                                            <div class="counter-stats">
                                                                <ul>
                                                                    <li>
                                                                        <h3 class="counter-value">{{$group->totalMembers($group->group_id) + 1}}</h3>
                                                                        <h5>Members</h5>
                                                                    </li>                                                                   
                                                                </ul>
                                                            </div>
                                                            <a href="{{route('lawyer.community.group.feed', $group->group_id)}}" class="btn btn-outline">view</a>
                                                            <a href="{{route('lawyer.community.group.chat', $group->group_id)}}" class="btn btn-outline">Chat</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                            <div style="margin-left: 34%">
                                                <h3 class="counter-value" >Oops! You are not part of someone else's group</h3>
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