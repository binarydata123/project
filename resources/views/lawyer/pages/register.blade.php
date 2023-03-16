@extends('common.home.layouts.app')
@section('content')
    <section class="lawyers-part bg-f4fefa">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <h1 class="banner-heading">For <span class="span-color-dark">Lawyers</span></h1>
                    <p>Connect Legal is an online community for lawyers and clients to discuss various legal issues. Being the first online marketplace for lawyers in the Middle East, it leverages innovative digital technology to effectively connect lawyers from across the region with their prospective clients.</p>


                    <p>Connect Legal is an online community for lawyers and clients to discuss various legal issues. Being the first online marketplace for lawyers in the Middle East, it leverages innovative digital technology to effectively connect lawyers from across the region with their prospective clients.</p>

                    <p>Connect Legal is an online community for lawyers and clients to discuss various legal issues. Being the first online marketplace for lawyers in the Middle East, it leverages innovative digital technology to effectively connect lawyers from across the region with their prospective clients.</p>


                    <p>Connect Legal is an online community for lawyers and clients to discuss various legal issues. Being the first online marketplace for lawyers in the Middle East, it leverages innovative digital technology to effectively connect lawyers from across the region with their prospective clients.</p>


                    <p>Connect Legal is an online community for lawyers and clients to discuss various legal issues. Being the first online marketplace for lawyers in the Middle East, it leverages innovative digital technology to effectively connect lawyers from across the region with their prospective clients.</p>


                    <p>Connect Legal is an online community for lawyers and clients to discuss various legal issues. Being the first online marketplace for lawyers in the Middle East, it leverages innovative digital technology to effectively connect lawyers from across the region with their prospective clients.</p>
                </div>
                <div class="col-lg-6 col-md-12">
                    <form action="{{route('lawyer.register')}}" method="post">
                        @csrf()
                        <div class="firm-info">
                        <h3>Law firm info</h3>
                        <input type="text" placeholder="Law firm name" value="{{ old('lawfirm_name') }}" name="lawfirm_name">
                        <input type="text" placeholder="Law firm website URL" value="{{ old('lawfirm_website') }}" name="lawfirm_website">
                        <select id="lawyer-location" name="emirate">
                            <option value="UAE" {{ old('emirate') === 'UAE' ? 'selected' : '' }}>UAE</option>
                            <option value="Qatar" {{ old('emirate') === 'Qatar' ? 'selected' : '' }}>Qatar</option>
                        </select>
                        <input type="text" placeholder="Your office address" name="office_address" value="{{ old('office_address') }}">
                        <br>
                        <div class="in-form">
                            <h3>Contact info</h3>
                
                            <div class="row">
                            <div class="col-3">
                                <select class="mr-ms" name="pref">
                                <option value="Mr" {{old('pref') === "Mr" ? 'selected' : ''}}> Mr</option>
                                <option value="Ms" {{old('pref') === "Ms" ? 'selected' : ''}}> Ms</option>
                                <option value="Dr" {{old('pref') === "Dr" ? 'selected' : ''}}> Dr</option> 
                                </select>
                            </div>
                            <div class="col-9">
                            <input type="text" placeholder="Your name" value="{{ old('name') }}" name="name">
                            @error('name')
                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                @enderror
                            </div> 
                            </div>
                
                            <input type="text" placeholder="Your email address" value="{{ old('email') }}" name="email">
                            @error('email')
                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                @enderror 
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" placeholder="+971" value="+971">
                                </div>
                                <div class="col-9">
                                    <input type="text" placeholder="Contact number" value="{{ old('contact_number') }}" name="contact_number">
                                </div> 
                            </div>
                            @error('contact_number')
                                <span class="error-msg" style="color:red;">{{ $message }}</span>
                            @enderror  
                            <input type="text" placeholder="Your MOJ Number" value="{{ old('moj_reg_no') }}" name="moj_reg_no">
                            @error('moj_reg_no')
                                <span class="error-msg" style="color:red;">{{ $message }}</span>
                            @enderror  
                            <select id="area" name="area">
                                <option value="">Select your practice area</option>
                                @foreach($areas as $k => $area)
                                    <option value="{{$k}}" {{ old('area') == $k ? 'selected' : '' }}>{{$area}}</option>
                                @endforeach
                            </select>
                            @error('area')
                                <span class="error-msg" style="color:red;">{{ $message }}</span>
                            @enderror  
                            <input type="text" placeholder="Your position (eg. Partner, associate, etc...)" value="{{ old('position') }}" name="position">
                            @error('position')
                                <span class="error-msg" style="color:red;">{{ $message }}</span>
                            @enderror
                            <input type="text" placeholder="Your linkedin profile URL" value="{{ old('linkedin') }}" name="linkedin"><br><br>
                            @error('linkedin')
                                <span class="error-msg" style="color:red;">{{ $message }}</span>
                            @enderror
                            <input type="password" placeholder="Password"  name="password">
                            @error('password')
                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                @enderror
                            <div class="text-right mar-top">
                            <button class="submit-btn" type="submit">Submit</button>
                            </div>
                
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        
    </script>
@endpush