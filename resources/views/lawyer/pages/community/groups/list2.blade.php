@extends('lawyer.home.layouts.app')
@section('content')
    <section>
        <div class="py-5">
            <div class="row" style="display: contents;">
                <div class="col-6" id="feed" style="padding-top: 1.5rem;margin-left: 370px;">
                    <h2 class="group-heading">Groups Created By Me</h2>                
                </div>
                <div class="col-3 create-group-btn-card" style="float:right;">
                <button class="create-group-button" data-bs-toggle="modal" data-bs-target="#createGroup"><span style="vertical-align: text-bottom;">+ </span> <span style="font: 24px 'Poppins-Bold';"> Create Group</span></button>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div id="group-list" class="px-3 dashboard font-Poppins-regular" style="margin-left: 370px;">
            <div class="col-1" style="padding-top: 3.5rem;font-size:18px;">
                <span>{{ $groupsByMe->count() }} results</span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row group-card-gap">
                        @foreach($groupsByMe as $k => $group)
                            <div class="col-5 py-2 group-card">
                                <div class="d-flex">
                                    <div class="col-1">
                                        <div class="copy todo me-3 mt-3" style="background:#C6EEE2;border-radius:30px;">
                                            <img src="/new-design/lawyer/assets/image/dashboard/groups.png" alt="meesage" style="width: 60%;">
                                        </div>
                                    </div>
                                    <div class="col-9 group-name-card">
                                        <span class="group-name">{{$group->group_name}}</span>
                                        <p class="group-descr">{{$group->about}}</p>
                                    </div>
                                    <div class="col-2 group-chat-count-card">
                                    <div class="group-chat-count me-3 mt-3">
                                        {{$group->unseenMsg($group->id)}}
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{$groupsByMe->appends(Request::query(), 'groups-created-by-me')->links()}}
                    </div>
                </div>
            </div>
        </div>        
    </section>
    <section>
        <div class="py-5">
            <div class="row" style="display: contents;">
                <div class="col-6" id="feed" style="padding-top: 1.5rem;margin-left: 370px;">
                    <h2 class="group-heading">Groups I'm Part Of</h2>                
                </div>
            </div>
        </div>
    </section>
    <section>
        <div id="group-list" class="px-3 dashboard font-Poppins-regular" style="margin-left: 370px;margin-bottom:5%;">
            <div class="col-1" style="padding-top: 3.5rem;font-size:18px;">
                <span>{{ $groupsIamIn->count() }} results</span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row group-card-gap">
                        @foreach($groupsIamIn as $k => $group)
                            <div class="col-5 py-2 group-card" style="background-color: #E0EDF1!important;">
                                <div class="d-flex">
                                    <div class="col-1">
                                        <div class="copy todo me-3 mt-3" style="background:#E0EDF1;border-radius:30px;">
                                            <img src="/new-design/lawyer/assets/image/dashboard/Group_part.png" alt="meesage" style="width: 60%;">
                                        </div>
                                    </div>
                                    <div class="col-9 group-name-card">
                                        <span class="group-name">{{$group->group->group_name}}</span>
                                        <p class="group-descr">{{$group->group->about}}</p>
                                    </div>
                                    <div class="col-2 group-chat-count-card">
                                    <div class="group-chat-count me-3 mt-3" style="background:#156075!important">
                                        {{$group->unseenMsg($group->group_id)}}
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{$groupsIamIn->appends(Request::query(), 'groups-im-in')->links();}}
                    </div>
                </div>
            </div>
        </div>        
    </section>
    <section>
        <div class="modal" id="createGroup" style="top: 25%;">
            <div class="modal-dialog  modal-md">
              <div class="modal-content">
                <div class="modal-body row" style="margin:5px">       
                    <form action="{{route('lawyer.community.group.store')}}" method="post">
                        @csrf()
                        <div class="form-group row" style="margin-top: 15px;margin-bottom: 15px;">
                          <input type="text" class="form-control" id="group_name" placeholder="Group Name" name="group">
                            @error('group')
                                <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                            @enderror  
                        </div>
                        <div class="form-group row" style="margin-top: 15px;margin-bottom: 15px;">  
                            <select class="form-control" id="lawyer-multiselect" data-placeholder="Select Lawyer" multiple="multiple" name="lawyers[]">
                                <option value="">Please select lawyers</option>
                                @foreach($lawyers as $k => $lawyer)
                                    <option value="{{$lawyer->user_id}}" {{isset(old('lawyers')[$k]) ? (old('lawyers')[$k] == $lawyer->user_id ? 'selected' : '') : ''}}>{{$lawyer->user->name}}</option>
                                @endforeach
                            </select>
                            @error('lawyers')
                                <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                            @enderror  
                        </div>
                        <div class="form-group row" style="margin-top: 15px;margin-bottom: 15px;">  
                            <textarea name="about" id="" cols="10" rows="3" class="form-control" placeholder="About"></textarea>
                            @error('about')
                                <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                            @enderror  
                        </div>
                        <div>
                            <button type="submit" class="btn btn-danger create-group" data-bs-dismiss="modal">Create Group</button>
                        </div>
                      </form>
                </div>
          
              </div>
            </div>
          </div>
    </section>
@endsection

@push('script')
<script>
</script>
@endpush