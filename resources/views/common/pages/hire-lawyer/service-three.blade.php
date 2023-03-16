@extends('common.home.layouts.app')
@section('content')

<section class="practice-area bg-grad-2">
    <div class="container">    
        <div class="step-box">
            <ul class="step-ul">
                <li><a href="#" class="done-step">
                <i class="fa-solid fa-circle-check"></i> Service <i class="fa-solid fa-angles-right"></i>
                </a></li>

                <li><a href="#" class="done-step">
                <i class="fa-solid fa-circle-check"></i> Terms <i class="fa-solid fa-angles-right"></i>
                </a></li>

                <li><a href="#" class="activ-step">
                <i class="fa-solid fa-circle-check"></i> Contact <i class="fa-solid fa-angles-right"></i>
                </a></li>

                <li><a href="#" class="next-step">
                <i class="fa-solid fa-circle-check"></i> Payment <i class="fa-solid fa-angles-right"></i>
                </a></li>

                <li class="pr-0"><a href="#" class="next-step pr-0">
                <i class="fa-solid fa-circle-check"></i> Order Done 
                </a></li>
            </ul>
        </div>

        <div class="terms-step">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <form action="{{ route('service.payment') }}" method="POST" id="my-form">
                        @csrf()
                        @php 
                            $totalAmt = $service->getLawyerFee($service->id) + $service->getPlatformFee($service->id);
                            $prodName = $service->added_by.'-'.$service->id.'-'.$totalAmt;
                        @endphp

                        <input type="hidden" name="product_name" value="{{$prodName}}">
                        <input type="hidden" name="amount" value="{{$totalAmt}}">
                        <input type="hidden" name="serviceId" value="{{$service->id}}"> 
                        <input type="hidden" name="lawyer_user_id" value="{{$service->added_by}}">    
                        <div class="box-redi" id="contact-five">
                            <h3>Contact Info</h3> 
                            <div class="firm-info">
                                <h3>Who will receive the service?</h3>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" placeholder="First Name" name="first_name">
                                        @error('first_name')
                                            <span class="error-msg" style="color:red;">{{ $message }}</span>
                                        @enderror  
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="text" placeholder="Last Name" name="last_name"> 
                                    @error('last_name')
                                        <span class="error-msg" style="color:red;">{{ $message }}</span>
                                    @enderror  
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                    <input type="text" placeholder="Email" name="email" value="{{auth()->user() ? auth()->user()->email : ''}}">
                                    @error('email')
                                        <span class="error-msg" style="color:red;">{{ $message }}</span>
                                    @enderror  
                                    </div>
                                    <div class="col-sm-6 position-relative mb-0">
                                    <input type="text" placeholder="Phone Number" name="mobile" class=" mb-0"> 
                                    @error('mobile')
                                        <span class="error-msg" style="color:red;">{{ $message }}</span>
                                    @enderror  
                                    <p>Should be in international format: +XXX XXXX…</p>
                                    </div>
                                </div>

                                <h5 class="any">Date of Birth</h5>
                                <div class="row">
                                    <div class="col-sm-3"> 
                                        <select name="day">
                                            @for ($day = 1; $day <= 31; $day++)
                                                <option value={{$day}}>{{$day}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-sm-3"> 
                                        <select name="month">
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3"> 
                                    <select name="year">
                                        @for ($year = date('Y'); $year >= date('Y') - 100; $year--)
                                            <option value='{{$year}}'>{{$year}}</option>
                                        @endfor
                                    </select>
                                    </div>
                                </div>
                                <h5 class="any">Add any comments for the lawyer (optional)</h5>
                                <textarea placeholder="Write Something..." name="comments_for_lawyer" class="somet"></textarea><br><br>
                            </div>
                        
                            <div class="i-accept">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <a href="{{route('service.step-two', $service->id)}}" class="next-step-btn back">Back Step</a>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="#" onclick="submitForm()" class="next-step-btn rightbtn">PAY NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="box-redi card-summary">
                        <h3>Summary Service</h3>
                        <div class="p-3">
                            <img src="/new-design/assets/images/Rectangle-m.png" alt="Rectangle-m" class="Rectangle-m mb-3">
                            <p>Two-hour Intellectual Property counselling session exclusive for you</p>

                            <div class="law-box" id="summary-law">
                                <div class="row">
                                    <div class="col-3 text-center m-p-0 over-n">
                                        <img src="/new-design/assets/images/Group.png" alt="Group"> 
                                        <i class="fa-solid fa-crown crown-p"></i>
                                    </div>
                                    <div class="col-7">
                                        <h5>Jaidev Kumar</h5>
                                        <div class="row">
                                            <div class="col-6">
                                                <ul class="star-part-2">
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>  
                                                </ul>
                                            </div>
                                            <div class="col-6 p-0">                    
                                                <span class="rev-35">(35 Reviews)</span>
                                            </div>
                                        </div>                                                 
                                    </div>
                                    <div class="col-2 text-right ">
                                        <p class="aed">AED <br> <span>450</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('script')
    <script>
        function submitForm() {
          document.getElementById("my-form").submit();
        }
    </script>
@endpush