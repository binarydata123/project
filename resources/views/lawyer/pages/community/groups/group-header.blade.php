<div class="row">
    <div class="col-lg-6 col-md-4 col-4">
        <ul class="d-flex1 d-flex top-sp-">
            <li class="{{Route::currentRouteName() === 'lawyer.community' ? 'active' : ''}} sp-ek">
                <span>Feed</span>
            </li>
            <li class="d-none d-lg-inline" onclick="groupsPage()">
                <p>Groups</p>
            </li>
        </ul>
    </div>
    <div class="col-lg-6 col-md-8 text-end col-8">
        <ul class="d-flex1 class-add">
            <li class="{{Route::currentRouteName() === 'lawyer.community.all-lawyers' ? 'active' : ''}}" onclick="allLawyers()">
                <h1>All Lawyers</h1>
            </li>
            <li data-bs-toggle="modal" data-bs-target="#staticBackdrop3">
                <h2>Create Group</h2>
            </li>

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
                                                            <img src="/storage/{{auth()->user()->getProfilePic(auth()->user()->id)}}" alt="question-2" class="img-user-pop" style="width: 85%;height: 70px;border-radius: 200px;">
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
                                            <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                                        @enderror  
                                        <div class="links-icons">
                                            <textarea placeholder="About this group" name="about"></textarea>                                                                    
                                        </div>
                                        @error('about')
                                            <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                                        @enderror  
                                        <select class=" col-md-12 chosen-select mt-3" multiple name="lawyers[]">
                                            @foreach($lawyers as $k => $lawyer)
                                                <option value="{{$lawyer->user_id}}" {{isset(old('lawyers')[$k]) ? (old('lawyers')[$k] == $lawyer->user_id ? 'selected' : '') : ''}}>{{$lawyer->user->name}}</option>
                                            @endforeach
                                        </select>    
                                        @error('lawyers')
                                            <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
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
        </ul>
    </div>
</div>