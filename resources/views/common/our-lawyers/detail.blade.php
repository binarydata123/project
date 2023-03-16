@extends('common.layouts.app')
@section('content')
    <!-- start page title -->
    <section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small for-lawyers-breadcrumb">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-start">Our Lawyers</h1>
                </div>
                <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <ul class="xs-text-center">
                        <li><a href="/">Home</a></li>
                        <li>Our Lawyers</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light-gray pt-5 padding-eleven-lr xl-padding-two-lr lg-no-padding-lr">
        <div class="container">
            <div class="container-fluid">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="lawfirm_name" class="form-label">Law Firm Name</label>
                        <input class="form-control" type="text" id="lawfirm_name" readonly name="lawfirm_name" value="{{$lawyerDetails->law_firm_name}}" autofocus />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="lawfirm_website" class="form-label">Lawfirm Website</label>
                        <input class="form-control" type="text" name="lawfirm_website" readonly id="lawfirm_website" value="{{$lawyerDetails->law_firm_website}}" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Emirates</label>
                        <input type="text" class="form-control" value="{{$lawyerDetails->emirates}}" readonly>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control" id="position" readonly name="position" value="{{$lawyerDetails->position}}" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="other_lang" class="form-label">Other Languages</label>
                        <input type="text" class="form-control" id="other_lang" readonly name="other_lang" placeholder="Ex: Language 1, Language 2" value="{{implode(', ', $langs)}}" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="area" class="form-label">Arbitration Area</label>
                        <input class="form-control" type="text" id="linkedin_profile" readonly name="linkedin_profile" value="{{$lawyerDetails->arbitration->area}}" />
                    </div>                    
                    <div class="mb-3 col-md-6">
                        <label for="education" class="form-label">Education</label>
                        <input type="text" class="form-control" id="education" readonly name="education" value="{{$lawyerDetails->education}}" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="assosiation_and_membership" class="form-label">Assosiation & Memebership</label>
                        <input type="text" class="form-control" id="assosiation_and_membership" readonly name="assosiation_and_membership" value="{{$lawyerDetails->assosiation_and_membership}}" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="summary" class="form-label">Summary</label>
                        <textarea name="summary" id="" cols="30" rows="10" readonly class="form-control">{{$lawyerDetails->summary}}</textarea>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="honors_and_awards" class="form-label">Honors and Awards</label>
                        <textarea name="honors_and_awards" id="" cols="30" readonly rows="10" class="form-control">{{$lawyerDetails->honors_and_awards}}</textarea>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="disclaimer" class="form-label">Disclaimer</label>
                        <textarea name="disclaimer" id="" cols="30" rows="10" readonly class="form-control">{{$lawyerDetails->disclaimer}}</textarea>
                    </div>
                </div>
                <div class="row">
                    @foreach($answers as $k => $answer)
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    {{$answer->created_at->format('d M Y')}}
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$answer->forum->title}}</h5>
                                    <p class="card-text">
                                        {{$answer->answer}}
                                    </p>
                                    @php 
                                        $rating = $answer->ratingData($answer->id);
                                    @endphp
                                    @if($rating)                                        
                                        <span class="text-orange text-extra-small d-block" style="text-align: end;">
                                            <i class="bx bx-star" style="color:{{$rating >= 1 ? 'red' : ''}}"></i>
                                            <i class="bx bx-star" style="color:{{$rating >= 2 ? 'red' : ''}}"></i>
                                            <i class="bx bx-star" style="color:{{$rating >= 3 ? 'red' : ''}}"></i>
                                            <i class="bx bx-star" style="color:{{$rating >= 4 ? 'red' : ''}}"></i>
                                            <i class="bx bx-star" style="color:{{$rating >= 5 ? 'red' : ''}}"></i>
                                        </span>
                                    @endif
                                    <a href="{{route('question-answer.view', $answer->forum->slug)}}" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection