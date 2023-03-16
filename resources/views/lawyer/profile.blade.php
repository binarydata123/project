@extends('lawyer.layouts.navbar_content')
@section('title', 'Profile')
@section('content')
    @include('admin.layouts.flash-message')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Account Settings /</span> Account
    </h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('lawyer.my-activity')}}"><i class="bx bx-bell me-1"></i> My Activity</a></li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
            <div class="card-body">
                @php 
                    $languageIds = explode(',', $lawyer->language_ids);
                @endphp
                <form id="formAccountSettings" method="POST" action="{{route('lawyer.update_profile', $lawyer->id)}}" enctype="multipart/form-data">
                    @csrf()
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            @if(!$lawyer->profile_pic)
                                <img src="https://media.istockphoto.com/vectors/user-icon-flat-isolated-on-white-background-user-symbol-vector-vector-id1300845620?k=20&m=1300845620&s=612x612&w=0&h=f4XTZDAv7NPuZbG0habSpU0sNgECM0X7nbKzTUta3n8=" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar"/>
                            @else 
                                <img src="/storage/{{$lawyer->profile_pic}}" alt="user-avatar" name="profile_pic" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            @endif
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" name="profile_pic"hidden accept="image/png, image/jpeg" />
                                </label>
                                <p class="text-muted mb-0" id="is_selected"></p>
                                <!-- <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p> -->
                            </div>
                        </div>
                    </div>
                    <p>Name: <b>{{auth()->user()->name}}</b></p>
                    <p>Email: <b>{{auth()->user()->email}}</b></p>
                    <hr class="my-2">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="lawfirm_name" class="form-label">Law Firm Name</label>
                            <input class="form-control" type="text" id="lawfirm_name" name="lawfirm_name" value="{{$lawyer->law_firm_name}}" autofocus />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="lawfirm_website" class="form-label">Lawfirm Website</label>
                            <input class="form-control" type="text" name="lawfirm_website" id="lawfirm_website" value="{{$lawyer->law_firm_website}}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Emirates</label>
                            <select name="emirates" id="" class="form-control">
                                <option value="UAE" {{ $lawyer->emirates === 'UAE' ? 'selected' : '' }}>UAE</option>
                                <option value="Qatar" {{ $lawyer->emirates === 'Qatar' ? 'selected' : '' }}>Qatar</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="office_address" class="form-label">Office Address</label>
                            <textarea name="office_address" id="" cols="30" rows="10" class="form-control">{{$lawyer->office_address}}</textarea>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="contact_number">Contact Number</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">+971</span>
                                <input type="text" id="contact_number" name="contact_number" class="form-control" value="{{$lawyer->contact_number}}"/>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="landline_number">Landline Number</label>
                            <div class="input-group input-group-merge">
                                <!-- <span class="input-group-text">+971</span> -->
                                <input type="text" id="landline_number" name="landline_number" class="form-control" value="{{$lawyer->landline_number}}"/>
                            </div>
                        </div>  
                        <div class="mb-3 col-md-6">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" class="form-control" id="position" name="position" value="{{$lawyer->position}}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="linkedin_profile" class="form-label">LinkedIn Profile URL</label>
                            <input class="form-control" type="text" id="linkedin_profile" name="linkedin_profile" value="{{$lawyer->linkedin_profile}}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="language" class="form-label">Language</label>
                            <select name="language[]" id="language-multiselect" multiple="multiple" class="custom-select">
                                @if($lawyer->language_ids)
                                    @foreach($languages as $k => $language)
                                        <option value="{{$k}}" {{in_array($k, $languageIds) ? 'selected' : ''}}>{{$language}}</option>
                                    @endforeach
                                @else 
                                    @foreach($languages as $k => $language)
                                        <option value="{{$k}}">{{$language}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="other_lang" class="form-label">Other Languages</label>
                            <input type="text" class="form-control" id="other_lang" name="other_lang" placeholder="Ex: Language 1, Language 2" value="{{$lawyer->other_lang}}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="area" class="form-label">Arbitration Area</label>
                            <select name="area" id="" class="form-control">
                                <option value="">Please select</option>
                                @foreach($arbitrationArea as $k => $area)
                                    <option value="{{$k}}" {{$k == $lawyer->arbitration_area_id ? 'selected' : ''}}>{{$area}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="summary" class="form-label">Summary</label>
                            <textarea name="summary" id="" cols="30" rows="10" class="form-control">{{$lawyer->summary}}</textarea>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="education" class="form-label">Education</label>
                            <input type="text" class="form-control" id="education" name="education" value="{{$lawyer->education}}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="assosiation_and_membership" class="form-label">Assosiation & Memebership</label>
                            <input type="text" class="form-control" id="assosiation_and_membership" name="assosiation_and_membership" value="{{$lawyer->assosiation_and_membership}}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="honors_and_awards" class="form-label">Honors and Awards</label>
                            <textarea name="honors_and_awards" id="" cols="30" rows="10" class="form-control">{{$lawyer->honors_and_awards}}</textarea>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="disclaimer" class="form-label">Disclaimer</label>
                            <textarea name="disclaimer" id="" cols="30" rows="10" class="form-control">{{$lawyer->disclaimer}}</textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        var input = document.getElementById('upload');
        input.addEventListener('change', showFileName);
        function showFileName(event) {
            $("#is_selected").empty()
            var input = event.srcElement;
            var fileName = input.files[0].name;
            if(fileName)
                $("#is_selected").append('Profile pic selected: '+ fileName)
        }

        
    </script>
@endsection