@extends('lawyer.home.layouts.app')
@section('content')

<div class="working-box">
                <section class="lawyers-part-2 p-0">
                    <div class="" id=" ">
                        <div class="row align-items-center mt-lg-5" id="service-pages">
                            <div class="col-md-6 col-6">
                                <ul class="d-flex1">
                                    <li class="p-0">
                                        <h4 class="gng created-title">Groups created by me</h4>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-6 text-right">
                                <div class="plus-icn-servie plue-cahne clone">
                                    <div>
                                        <img src="/new-design/assets/images/client/plus.png" class="pluus">
                                    </div>
                                    <div data-bs-toggle="modal" data-bs-target="#staticBackdrop3">
                                        <h1 class="addtst">Create Group</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade modal-popups" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" id="modal-login">
                                            <div class="modal-content"> 
                                                <div class="modal-header text-right"> 
                                                    <button type="button" class="btn-close rounded" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-popup-des rounded" id="pills-tabContent">
                                                        <div class="row">
                                                            <div class="group-user">
                                                                <div class="row">
                                                                    <div class="col-sm-6 col-10">
                                                                        <div class="group-george">
                                                                            <div class="row">
                                                                                <div class="col-md-3 col-3 pr-0 text-center">
                                                                                    <img src="/storage/{{auth()->user()->getProfilePic(auth()->user()->id)}}" alt="question-2" class="img-user-pop" style="width: 90%;height: 65px;border-radius: 200px;">
                                                                                </div>
                                                                                <div class="col-md-9 col-9  ">
                                                                                    <p class="font-24">{{auth()->user()->name}}</p>
                                                                                    <p class="font-16"><i class="fa-solid fa-location-dot"></i> {{auth()->user()->getEmirates(auth()->user()->id)}}</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-2">
                                                                        <p class="right dot-three">...</p> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <form action="{{route('lawyer.community.group.store')}}" method="post">
                                                            @csrf()
                                                            <div class="eles group-invite">
                                                                <input type="text" placeholder="Name of the Group" name="group">
                                                                @error('group')
                                                                    <span class="error-msg text-left" style="color:red;margin-top:2%;">{{ $message }}</span>
                                                                @enderror  
                                                                <div class="links-icons">
                                                                    <textarea placeholder="About this group" name="about"></textarea>                                                                    
                                                                </div>
                                                                @error('about')
                                                                    <span class="error-msg text-left" style="color:red;margin-top:2%;">{{ $message }}</span>
                                                                @enderror  
                                                                <select class=" col-md-12 chosen-select mt-3" multiple name="lawyers[]">
                                                                    @foreach($lawyers as $k => $lawyer)
                                                                        <option value="{{$lawyer->user_id}}" {{isset(old('lawyers')[$k]) ? (old('lawyers')[$k] == $lawyer->user_id ? 'selected' : '') : ''}}>{{$lawyer->user->name}}</option>
                                                                    @endforeach
                                                                </select>    
                                                                @error('lawyers')
                                                                    <span class="error-msg text-left" style="color:red;margin-top:2%;">{{ $message }}</span>
                                                                @enderror                                                      
                                                            </div>
                                                            <div class="text-right mt-5 mb-3">
                                                                <button type="submit" class="create-group">Create Group</button>
                                                            </div> 
                                                        </form>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        <div class="row mt-lg-5 align-items-center">
                    <div class="col-lg-6 col-md-2"></div>
                    <div class="col-lg-6 col-md-10 text-right">
                        <div class="text-right search-drop sp-top-select">
                            <select class="department" onchange="sortBy(this)">
                                <option value="desc">Sort by</option>
                                <option value="desc" {{$sort === "desc" ? 'selected' : ''}}>Newest</option>
                                <option value="asc" {{$sort === "asc" ? 'selected' : ''}}>Oldest</option>
                            </select>
                          </div>
                    </div>
                        </div>
                            <div class="row align-items-center mt-3">
                                <div class="col-lg-6 col-md-4 col-3">
                                    <h6 class="result"> <strong>{{ $groupsByMe->count() }}</strong> results</h6>
                                </div>
                            <div class="col-lg-6 col-md-8 col-9">
                            <div class="icn-tdt d-flex justify-content-end align-items-center">
                                <!-- <h4 class="chn">Change the view:</h4>
                                <a href="#" class="dot4"><i class="fa-solid fa-bars"></i></a>
                                <a href="#" class="dot4"><i class="fa-solid fa-arrows-to-dot"></i></a> -->
                            </div>
                           </div>
                        </div>
                        <div class="row p-3">
                            @foreach($groupsByMe as $k => $group)
                                <div class="col-lg-12 col-md-12 col-xl-6 mt-4" style="cursor:pointer;" onclick="groupChat('{{$group->id}}')">
                                        <div class="grp">
                                            <div id="group-div">
                                            <div class="row ">
                                        <div class="col-sm-2 col-2">
                                            <div class="circle-color">
                                            <img src="/new-design/user-dashboard/images/user1.png" class="prf">
                                            </div>
                                        </div>
                                        <div class="col-sm-9 col-9">
                                        <div class="list-text">
                                            <h4 class="itm">{{$group->group_name}}</h4>
                                            <p class="tnm">{{$group->about}}</p>
                                        </div>
                                        </div>
                                        <div class="col-sm-1 col-1">
                                            <h2 class="mth">{{$group->unseenMsg($group->id)}}</h2>
                                        </div>
                                    </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                            {{$groupsByMe->appends(Request::query(), 'groups-created-by-me')->links()}}
                        </div>


                        <div class="was-validated mt-5" id="pagination-class2">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                                            <span aria-hidden="true"> <img src="/new-design/user-dashboard/images/Vector (2).png" alt=""> </span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)" aria-label="Next">
                                            <span aria-hidden="true"> <img src="/new-design/user-dashboard/images/Vector (3).png" alt=""> </span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>




                        <div class="row align-items-center" id="service-pages">
                            <div class="col-md-6 col-6">
                                <ul class="d-flex1 p-0">
                                    <li class="p-0">
                                        <h4>Groups I'm part</h4>
                                    </li>
                                </ul>  
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-2 "></div>
                            <div class="col-lg-6 col-md-10  text-right">
                                <div class="text-right search-drop sp-top-select">
                                    <select class="department" onchange="sortBy(this)">
                                        <option value="desc2">Sort by</option>
                                        <option value="desc2" {{$sort2 === "desc" ? 'selected' : ''}}>Newest</option>
                                        <option value="asc2" {{$sort2 === "asc" ? 'selected' : ''}}>Oldest</option>
                                    </select>
                              
                                  </div>
                            </div>
                                </div>

                           <div class="row align-items-center mt-3">
                                <div class="col-lg-6 col-md-4 col-3">
                                <h6 class="result"> <strong>{{ $groupsIamIn->count() }}</strong> results</h6>
                                </div>
                           <div class="col-lg-6 col-md-8 col-9">
                                <!-- <div class="icn-tdt d-flex justify-content-end  align-items-center">
                                    <h4 class="chn">Change the view:</h4>
                                    <a href="#" class="dot4"><i class="fa-solid fa-bars"></i></a>
                                    <a href="#" class="dot4"><i class="fa-solid fa-arrows-to-dot"></i></a>
                                </div> -->
                           </div>
                        </div>


                        <div class="row mt-5 position-relative">
                            @foreach($groupsIamIn as $k => $group)
                                <div class="col-lg-12 col-md-12 col-xl-6 mt-4" style="cursor:pointer;" onclick="groupChat('{{$group->group_id}}')">
                                    <div class="grp">
                                        <div id="group-div1">
                                        <div class="row ">
                                    <div class="col-sm-2 col-2">
                                        <div class="circle-color color-group">
                                        <img src="/new-design/user-dashboard/images/userall.png" class="prf">
                                        </div>
                                    </div>
                                    <div class="col-sm-9 col-9">
                                    <div class="list-text">
                                        <h4 class="itm">{{$group->group->group_name}}</h4>
                                        <p class="tnm">{{$group->group->about}}</p>
                                    </div>
                                    </div>
                                    <div class="col-sm-1 col-1">
                                        <h2 class="mth chngemah">{{$group->unseenMsg($group->group_id)}}</h2>
                                    </div>
                                </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach                         
                        </div>
                        <div class="was-validated" id="pagination-class2">
                            {{$groupsIamIn->appends(Request::query(), 'groups-im-in')->links()}}
                        </div>

                      
                    </div>
                </section>
            </div>

@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.chosen-select').chosen({
                search_contains: true,
                placeholder_text_multiple: "Select the lawyers",
            });
        });

        function sortBy(sort) {
            window.location.href = "/lawyer/community/groups/"+sort.value;
        }

        function groupChat(groupId) {
            window.location.href = "/lawyer/community/group/chat/"+groupId;
        }

    </script>
@endpush