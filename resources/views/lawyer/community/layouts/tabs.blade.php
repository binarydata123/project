<div class="page-body container-fluid custom-padding profile-page">
    <div class="page-center" style="margin-left: 10%;">
        <div class="profile-cover">
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
        </div>
        <!-- profile cover end -->

        <!-- profile menu start -->
        <div class="profile-menu section-t-space">
            <ul>
                <li class="active">
                    <a href="{{route('lawyer.community')}}">
                        <i class="iw-14 ih-14" data-feather="clock"></i>
                        <h6>Feed</h6>
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
                    <a href="#" data-bs-toggle="modal" data-bs-target="#groupModal">
                        <i class="iw-14 ih-14" data-feather="users"></i>
                        <h6>Create Group</h6>
                    </a>
                </li>
            </ul>                
        </div>
        <!-- profile menu end -->
    </div>
</div>



<div class="modal fade mobile-full-width" id="groupModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-custom-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Group</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="background-color: #0389ca;color:white;">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="weather-search section-t-space">
                    <form class="theme-form" action="{{route('lawyer.community.group.store')}}" method="post">
                        @csrf()
                        <label for="">Group Name</label>
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Group Name" name="group" style="border: solid;">
                        </div>
                        <div class="input-group">
                            <label for="">Select Lawyers</label>
                            <select class="custom-select" id="lawyer-multiselect" data-placeholder="Select Lawyer" multiple="multiple" name="lawyers[]" style="border: solid;">
                                <option value="">Please select lawyers</option>
                                @foreach($lawyers as $k => $lawyer)
                                    <option value="{{$lawyer->user_id}}">{{$lawyer->user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="">About</label>
                            <div class="input-group">
                                <textarea name="about" id="" cols="30" rows="10" class="form-control" style="border: solid;"></textarea>
                            </div>
                        </div>
                        <div class="btn-section text-right">
                            <button type="submit" class="btn btn-solid">Create</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-solid">save changes</button>
            </div> -->
        </div>
    </div>
</div>