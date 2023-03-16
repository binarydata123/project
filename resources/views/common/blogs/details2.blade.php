@extends('common.layouts.app')
@section('content')
<!-- start blog content section --> 
    <section class="blog-right-side-bar" style="background-color: white;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 right-sidebar md-margin-60px-bottom sm-margin-40px-bottom" style="color: black;">
                    <div class="row">
                        <div class="col-12 blog-details-text last-paragraph-no-margin margin-6-rem-bottom">
                            <ul class="list-unstyled margin-2-rem-bottom">
                                <li class="d-inline-block align-middle margin-25px-right"><i class="feather icon-feather-calendar text-fast-blue margin-10px-right"></i><a>{{date('M d Y', strtotime($blog->created_at));}}</a></li>
                                <li class="d-inline-block align-middle"><i class="feather icon-feather-user text-fast-blue margin-10px-right"></i>By <a >{{$blog->written_by}}</a></li>
                            </ul>
                            <img src="{{$blog->image}}" alt="" class="w-100 border-radius-6px margin-4-half-rem-bottom">                                                        
                        </div>                        
                        {!! $blog->full_descr !!}
                    </div>
                </div>
                <!-- start sidebar -->
                <aside class="col-12 col-xl-3 offset-xl-1 col-lg-4 col-md-7 blog-sidebar lg-padding-4-rem-left md-padding-15px-left">
                    <div class="d-inline-block w-100 margin-5-rem-bottom">
                        <span class="alt-font font-weight-500 text-large text-extra-dark-gray d-block margin-25px-bottom">Contact Us</span>
                        <form id="search-form" role="search" method="post" action="{{route('store.contact-us')}}">
                            @csrf()
                            <div class="position-relative">
                                <input class="medium-input bg-white margin-25px-bottom required" type="text" name="contact_name" value="{{ old('contact_name') }}" placeholder="Your Name">
                                    @error('contact_name')
                                        <span class="error-msg" style="color:red;">{{ $message }}</span>
                                    @enderror 
                                    <input class="medium-input bg-white margin-25px-bottom required" type="email" name="contact_email" value="{{ old('contact_email') }}" placeholder="Your Email Address">
                                    @error('contact_email')
                                        <span class="error-msg" style="color:red;">{{ $message }}</span>
                                    @enderror 
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input class="medium-input bg-white" readonly value="+971" />
                                        </div>
                                        <div class="col-md-7">
                                            <input class="medium-input bg-white margin-25px-bottom" type="tel" name="contact" value="{{ old('contact') }}" placeholder="Contact No">
                                        </div>
                                    </div>
                                    <select name="contact_subject" class="medium-input bg-white mb-5" id="">
                                        <option value="">Subject</option>
                                        <option value="Customer Support" {{ old('contact_subject') === 'Customer Support' ? 'selected' : '' }}>Customer Support</option>
                                        <option value="General Enquiry" {{ old('contact_subject') === 'General Enquiry' ? 'selected' : '' }}>General Enquiry</option>
                                        <option value="Legal Question" {{ old('contact_subject') === 'Legal Question' ? 'selected' : '' }}>Legal Question</option>
                                    </select>
                                    @error('contact_subject')
                                        <span class="error-msg" style="color:red;">{{ $message }}</span>
                                    @enderror 
                                </div>
                                <div class="col margin-4-rem-bottom sm-margin-20px-bottom">
                                    <textarea class="medium-textarea bg-white h-200px" rows="6" name="contact_message" placeholder="Your message">{{ old('contact_message') }}</textarea>
                                    @error('contact_message')
                                        <span class="error-msg" style="color:red;">{{ $message }}</span>
                                    @enderror 
                                </div>
                                <div class="col text-center text-md-end">
                                    <input type="hidden" name="redirect" value="">
                                    <button id="project-contact-us-button" class="btn btn-medium btn-fancy mb-0" type="submit" style="background-color: #041d43;color:white;">Submit</button>
                                </div>
                            </div> 
                        </form>
                    </div>
                </aside>
                <!-- end sidebar -->
            </div>
        </div>
    </section>
@endsection