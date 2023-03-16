<div class="page-body container-fluid custom-padding profile-page">
    <div class="page-center" style="margin-left: 10%;">
        <!-- <div class="profile-cover">
            <img src="{{asset('community/assets/images/cover/1.jpg')}}" class="img-fluid blur-up lazyload bg-img" alt="cover">
            <div class="setting-dropdown btn-group custom-dropdown arrow-none dropdown-sm">
                <div class="dropdown-menu dropdown-menu-right custom-dropdown">
                    <ul>
                        <li>
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#choosePhoto"><i
                                    class="icon-font-light iw-16 ih-16" data-feather="image"></i>choose
                                photo</a>
                        </li>
                        <li class="choose-file">
                            <a href=""><i class="icon-font-light iw-16 ih-16" data-feather="upload"></i>upload
                                photo</a>
                            <input type="file">
                        </li>
                        <li>
                            <a href=""><i class="icon-font-light iw-16 ih-16" data-feather="maximize"></i>set
                                position</a>
                        </li>
                        <li>
                            <a href=""><i class="icon-font-light iw-16 ih-16" data-feather="trash-2"></i>remove
                                photo</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> -->
        <!-- profile cover end -->

        <!-- profile menu start -->
        <div class="profile-menu section-t-space">
            <ul>
                <li class="active">
                    <a href="{{route('lawyer.community')}}">
                        <i class="iw-14 ih-14" data-feather="clock"></i>
                        <h6>All Feed</h6>
                    </a>
                </li>
                <li class="active">
                    <a href="{{route('lawyer.community.group.feed', $groupId)}}">
                        <i class="iw-14 ih-14" data-feather="clock"></i>
                        <h6>Feed</h6>
                    </a>
                </li>
                <li>
                    <a href="{{route('lawyer.community.group.about', $groupId)}}">
                        <i class="iw-14 ih-14" data-feather="info"></i>
                        <h6>about</h6>
                    </a>
                </li>
                <li>
                    <a href="{{route('lawyer.community.groups')}}">
                        <i class="iw-14 ih-14" data-feather="users"></i>
                        <h6>Groups</h6>
                    </a>
                </li>
                <!-- <li>
                    <a href="profile-gallery.html">
                        <i class="iw-14 ih-14" data-feather="image"></i>
                        <h6>photos</h6>
                    </a>
                </li> -->
            </ul>
            <ul class="right-menu d-xl-flex d-none">
                <li>
                    <a href="{{route('lawyer.community.all-lawyers')}}">
                        <i class="iw-14 ih-14" data-feather="award"></i>
                        <h6>All Lawyers</h6>
                    </a>
                </li>
                <li class="active" style="cursor:pointer;">
                    <a href="{{route('lawyer.community.group.chat', $groupId)}}">
                        <i class="iw-14 ih-14" data-feather="message-square"></i>
                        <h6>Chat</h6>
                    </a>
                </li>
            </ul>                
        </div>
        <!-- profile menu end -->
    </div>
</div>
