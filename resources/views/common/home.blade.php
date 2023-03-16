@extends('common.home.layouts.app')
@section('content')
    @php 
        $nothing = 0;
        $lawyers = App\Models\Lawyer::whereIsVerified(1)->get();
        $onlineLawyers = 0;
        $offlineLawyers = 0;
        foreach($lawyers as $k => $v) {
            if($v->user->isOnline()) {
                ++$onlineLawyers;
            }else {
                ++$offlineLawyers;
            }
        }
    @endphp
    @include('common.home.sections.banner')
    @include('common.home.sections.banner-bottom-cards')
    @include('common.home.sections.appointment')
    @include('common.home.sections.lawyers-online')
    @include('common.home.sections.services')
    @include('common.home.sections.testimonials')
    @include('common.home.sections.how-it-works')
    @include('common.home.sections.register')

    <div class="modal fade popuphome" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="puopclass">
                        <h3 class="text-center">Submit your enquiry</h3>
                        <form action="{{route('store.forum')}}" method="post" onsubmit="return validateForumForm(event)">
                            @csrf()
                            <input type="text" name="qa_name" id="qa-name" placeholder="Name" value="{{auth()->user() ? auth()->user()->name : ''}}" class="form-control mb-2">
                            @error('qa_name')
                                <span class="error-msg" style="color:red;">{{ $message }}</span>
                            @enderror    
                            <input type="email" name="qa_email" id="qa-email" placeholder="Email Address" value="{{auth()->user() ? auth()->user()->email : ''}}" class="form-control mb-3">
                            @error('qa_email')
                                <span class="error-msg" style="color:red;">{{ $message }}</span>
                            @enderror    
                            <div class="input-group mb-3" id="qa-mobile-div">
                                <span class="input-group-text" id="basic-addon1"> <img src="/new-design/assets/images/phone.png" alt=""> </span>
                                <input type="text" class="form-control left-bordr" name="mobile" id="qa-mobile" placeholder="Phone Number" aria-label="Username"
                                aria-describedby="basic-addon1">
                            </div>
                            @error('mobile')
                                <span class="error-msg" style="color:red;">{{ $message }}</span>
                            @enderror    
                            <textarea class="form-control popup-descr qa-msg" name="message" placeholder="Your message"
                                id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('message')
                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                @enderror    
                            <div class="text-end mt-lg-5 mt-3">
                                <button type="submit" class="btn btn-submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>   
    $(".open-d").click(function () {
        $(".vat-box").toggle();
    });

    $('.counter-value').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 3500,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    $("#news-slider11").owlCarousel({
        items: 1,
        itemsDesktop: [1199, 1],
        itemsMobile: [600, 1],
        pagination: true,
        // autoPlay : true
    });

    $(window).scroll(function () {
        if ($(document).scrollTop() > 70) {
            $(".top-header").addClass("head-fixed");
        } else {
            $(".top-header").removeClass("head-fixed");
        }
    });

    function hireALawyer() {
        window.location.href = "/legal-services";
    }

    function qaPage() {
        window.location.href = "/question-answers/desc";
    }

    function legalBlogs() {
        window.location.href = "/blogs-articles/1";
    }

    var success = true
    var emailStatus = {{ Session::get('success') ?? $nothing }};
    
    {{ Session::forget('success') }}
    var email = "{{ Session::get('email') ?? $nothing }}";

    if(emailStatus) {
        $("#email_sent_to").text(email)
        sendResetPasswordLink()
        {{ Session::forget('email_sent_to') }}
    }

    function resendEmail() {
        closeForgotPasswordConfirm()
        $.ajax({
            method:"get",
            url: "/forgot-password/"+email,
            success: function(res){
                if(res === "success") {
                    sendResetPasswordLink()
                }
            }
        });
    }

    function passDescr() {
        var descr = $(".banner-descr").val();
        var descr2 = document.querySelector(".popup-descr");
        descr2.innerHTML = descr
    }
    
    function validateForumForm(e) {
        var valid = true;
        $(".qa-errors").empty()
        var name = $("#qa-name").val()
        var email = $("#qa-email").val()
        var mobile = $("#qa-mobile").val()
        var msg = $(".qa-msg").val()

        if(!name) {
            valid = false;
            $("#qa-name").after('<span class="qa-errors" style="color:red;">This field is required</span>')
        }
        if(!email) {
            valid = false;
            $("#qa-email").after('<span class="qa-errors" style="color:red;">This field is required</span>')
        }
        if(!mobile) {
            valid = false;
            $("#qa-mobile-div").after('<span class="qa-errors" style="color:red;">This field is required</span>')
        }
        if(!msg) {
            valid = false;
            $(".qa-msg").after('<span class="qa-errors" style="color:red;">This field is required</span>')
        }

        if(!valid) {
            e.preventDefault()
        }
    }
    // var pusher = new Pusher('a34a416e0fe588185c8e', {
    //     cluster: 'ap2'
    // });
    // // Subscribe to the channel we specified in our Laravel Event
    // var channel = pusher.subscribe('lawyer-login-logout');

    // // Bind a function to a Event (the full Laravel class)
    // channel.bind('App\\Events\\LawyerLoginLogout', function(data) {
    //     if(data.type === "lawyerLoginLogout") {
    //         $.ajax({
    //             method:"get",
    //             url: "/online-offline-lawyers/home",
    //             success: function(res){
    //                 $("#lawyer_online_section").empty();
    //                 $("#lawyer_online_section").append(res);
    //             }
    //         });
    //     }
    // }); 

</script>
@endpush