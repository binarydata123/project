@extends('common.home.layouts.app')
@section('content')
    <div class="p-80">
        <section class="p-0">
            <div class="container" id="accodian-class">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="accodian-cover">
                            <h1 class="f-txt">How it works for <span class="clnt">Individuals</span></h1>
                            <p class="txt-lorm">Lorem ipsum dolor sit amet consectetur adipiscing elit do eiusmod tempor
                            incididunt ut labore et dolore magna ut enim ad minim veniam nostrud exercitation.</p>
                            <div class="accordion ouraccordion" id="accordionExample">
                                <div class="accordion-item" id="accordionidclass">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            LEGAL SERVICES
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit do eiusmod tempor
                                            incididunt ut labore et dolore magna ut enim ad minim veniam nostrud
                                            exercitation.
                                            <div class="mt-5 mb-5" id="twobtn1">
                                                <a href="#" class="Generatebtn addclassstyle">View our Parnetrs Lawyers</a>
                                                <a href="#" class="Generatebtn addclassstyle2">View Legal Services</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item" id="accordionidclass">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            PRO Services
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit do eiusmod tempor
                                            incididunt ut labore et dolore magna ut enim ad minim veniam nostrud
                                            exercitation.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item" id="accordionidclass">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Legal Translation
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit do eiusmod tempor
                                            incididunt ut labore et dolore magna ut enim ad minim veniam nostrud
                                            exercitation.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item" id="accordionidclass">
                                    <h2 class="accordion-header" id="headingfour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#headingfour" aria-expanded="false" aria-controls="collapseThree">
                                            PRO Bono Services
                                        </button>
                                    </h2>
                                    <div id="headingfour" class="accordion-collapse collapse" aria-labelledby="headingfour"
                                    data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit do eiusmod tempor
                                            incididunt ut labore et dolore magna ut enim ad minim veniam nostrud
                                            exercitation.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 mt-lg-0 mt-5">
                        <div class="img-work">
                            <img src="/new-design/assets/images/AdobeStock_315034883 (1) 1.png" class="wrk">
                            <img src="/new-design/assets/images/Group 298.png" class="play" onclick="howitworksPopup()">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <form class="form-horizontal-class" action="{{route('store.contact-us')}}" method="POST">
                            @csrf()
                            <h2 class="mb-3">Contact Us</h2>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <input type="text" class="form-control repairs" id="your-name" name="contact_name"
                                    placeholder="Your Name">
                                </div>
                                @error('contact_name')
                                    <div class="text-red-500" style="color:red;">{{ $message }}</div>
                                @enderror
                                <div class="col-md-12">
                                    <input type="email" class="form-control repairs" id="your-surname" name="contact_email"
                                    placeholder="Your email address">
                                </div>
                                @error('contact_email')
                                    <div class="text-red-500" style="color:red;">{{ $message }}</div>
                                @enderror
                                <div class="col-md-3">
                                    <input type="number" class="form-control repairs" id="prefix" name="prefix"
                                    placeholder="+971">
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control repairs" id="your-mobile" name="contact_mobile"
                                    placeholder="Contact number">
                                </div>
                                @error('contact_mobile')
                                    <div class="text-red-500" style="color:red;">{{ $message }}</div>
                                @enderror
                                <div class="col-md-12">
                                    <input type="text" class="form-control repairs" id="your-subject" name="contact_subject"
                                    placeholder="Subject">
                                </div>
                                @error('contact_subject')
                                    <div class="text-red-500" style="color:red;">{{ $message }}</div>
                                @enderror
                                <div class="col-12">
                                    <textarea class="form-control repairs" id="your-message" name="contact_message" rows="5"
                                    placeholder="Your message"></textarea>
                                </div>
                                @error('contact_message')
                                    <div class="text-red-500" style="color:red;">{{ $message }}</div>
                                @enderror
                                <div class="col-12 text-lg-end mt-5">
                                    <button type="submit" class="btn  hvr-btn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5">
                        <div class="border-right ">
                            <div class="row boxes">
                                <div class="txt-rew p-0">
                                    <p class="tst-mon">Client Testimonials</p>
                                </div>
                            </div>
                            <div class="rew-box1">
                                <div class="row boxes1">
                                    <div class="col-md-2 col-2">
                                        <img src="/new-design/assets/images/Group 299.png" class="quots">
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p class="txtabdal">Rahman Abdal</p>
                                        <p class="fast">Fast,efficient and user friendly</p>
                                    </div>
                                    <div class="col-md-3 col-3">
                                        <p class="date">12 OCT 2022</p>
                                    </div>
                                </div>
                            </div>
                            <div class="rew-box1 border-1">
                                <div class="row boxes1">
                                    <div class="col-md-2 col-2">
                                        <img src="/new-design/assets/images/Group 299.png" class="quots">
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p class="txtabdal">Rahman Abdal</p>
                                        <p class="fast">Fast,efficient and user friendly</p>
                                    </div>
                                    <div class="col-md-3 col-3">
                                        <p class="date">12 OCT 2022</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div id="popup" style="display: none;position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);">
            <iframe id="video" width="560" height="315" src="https://www.youtube.com/embed/tqnCaBUDcMg" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>

@endsection

@push('script')
    <script>

        function howitworksPopup() {
            $("#popup").fadeIn();
            $("#video")[0].src += "?autoplay=1";
        }

        $(document).mouseup(function(e) {
            var container = $("#popup");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                container.fadeOut();
                $("#video")[0].src = $("#video")[0].src.replace("?autoplay=1", "");
            }
        });

        $("#popup").click(function() {
            $(this).fadeOut();
            $("#video")[0].src = $("#video")[0].src.replace("?autoplay=1", "");
        });

    </script>
@endpush