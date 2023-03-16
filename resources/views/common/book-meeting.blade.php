@extends('common.layouts.app')
@section('content')
    <section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small for-lawyers-breadcrumb"> 
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-8 col-lg-6">
                    <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-start">Book A Meeting</h1>
                </div>
                <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                    <ul class="xs-text-center">
                        <li><a href="/">Home</a></li>
                        <li>Book A Meeting</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
    <!-- start section -->
    <section class="parallax xs-padding-15px-lr" data-parallax-background-ratio="0.5" style="background-color:aliceblue;">
        <div class="container">
            <input type="hidden" name="" id="unavailableDays" value="{{implode(',', $unavailableDays)}}">
            <h5>{{$slot->title ?? ''}}</h5>
            <textarea  class="form-control" readonly id="" cols="30" rows="10">{{$slot->description ?? ''}}</textarea>
            <input type="text" name="" id="datePick" class="form-control">            
            <p style="text-align: center;" class="note">Select Date to view the slots</p>
            @forelse($daySlots as $k => $slot)
                @if($slot->isAvailable($slot->slot_id, $slot->day))
                    <div class="row">
                        <div class="col-md-8 slot_{{$slot->day}} allDays" style="display:none;">
                            <span>{{$slot->day}}</span>
                            <p id="tueTimeOnlyExample_0" style="display: flex;">
                                <input type="text" readonly class="form-control time start" value="{{$slot->slot_start_time}}" style="margin-right: 2%;" /> - 
                                <input type="text" readonly class="form-control time end" value="{{$slot->slot_end_time}}" style="margin-left: 2%;"/> 
                                <input type="text" readonly class="form-control" value="{{preg_replace('/[^0-9]/', '', $slot->amount) + $slot->getPlatformFee($slot->id, $slot->slot->lawyer_id)}}" style="margin-left: 2%;" />   
                                <!-- <button class="btn btn-primary col-md-2" style="height: fit-content;margin-left: 2%;">Select</button>      -->
                                <a href="#free-advice-form-{{$k}}" class="btn btn-medium bg-extra-dark-gray d-block text-white section-link popup-with-form col-md-2" style="height: fit-content;margin-left: 2%;">Schedule</a>                
                            </p>
                        </div>
                    </div>
                    
                    <div id="free-advice-form-{{$k}}" class="white-popup-block col-xl-9 col-lg-7 col-sm-9  p-0 mx-auto mfp-hide">
                        <main>
                            <div class="row">
                                <aside class="col-sm-6 offset-3">
                                    <article class="card">
                                        <div class="card-body p-5">
                                            <ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                                                    <i class="fa fa-credit-card"></i>Card Details</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="nav-tab-card">
                                                    @foreach (['danger', 'success'] as $status)
                                                        @if(Session::has($status))
                                                            <p class="alert alert-{{$status}}">{{ Session::get($status) }}</p>
                                                        @endif
                                                    @endforeach
                                                    <form role="form" method="POST" id="paymentForm" action="{{ route('schedule.meeting') }}">
                                                        @csrf
                                                        <input type="hidden" name="slotId" value="{{$slot->slot_id}}"> 
                                                        <input type="hidden" name="daySlotId" value="{{$slot->id}}"> 
                                                        <input type="hidden" name="amount" value="{{preg_replace('/[^0-9]/', '', $slot->amount) + $slot->getPlatformFee($slot->id, $slot->slot->lawyer_id)}}">                                                   
                                                        <input type="hidden" name="lawyerUserId" value="{{$lawyer->user_id}}">    
                                                        <input type="hidden" name="lawyerId" value="{{$lawyer->id}}">    
                                                        <input type="hidden" name="date" class="dateVal" value="0">                                                   
                                                        <div class="form-group">
                                                            <label for="username">Full name (on the card)</label>
                                                            <input type="text" class="form-control" name="fullName" placeholder="Full Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="cardNumber">Card number</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="cardNumber" placeholder="Card Number">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text text-muted">
                                                                    <i class="fab fa-cc-visa fa-lg pr-1"></i>
                                                                    <i class="fab fa-cc-amex fa-lg pr-1"></i>
                                                                    <i class="fab fa-cc-mastercard fa-lg"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <label><span class="hidden-xs">Expiration</span> </label>
                                                                    <div class="input-group">
                                                                        <select class="form-control" name="month">
                                                                            <option value="">MM</option>
                                                                            @foreach(range(1, 12) as $month)
                                                                                <option value="{{$month}}">{{$month}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <select class="form-control" name="year">
                                                                            <option value="">YYYY</option>
                                                                            @foreach(range(date('Y'), date('Y') + 10) as $year)
                                                                                <option value="{{$year}}">{{$year}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label data-toggle="tooltip" title=""
                                                                        data-original-title="3 digits code on back side of the card">CVV <i
                                                                        class="fa fa-question-circle"></i></label>
                                                                    <input type="number" class="form-control" placeholder="CVV" name="cvv">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="subscribe btn btn-primary btn-block" type="submit"> Confirm </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </aside>
                            </div>
                        </main>
                    </div>
                @endif
            @empty
                <p style="text-align: center;">No slots available</p>
            @endforelse
        </div>
    </section>
@endsection
@section('script')
    <script>
        var dateToday = new Date();
        $("#datePick").datepicker({
            dateFormat:"yy-mm-dd",
            minDate: dateToday,
            beforeShowDay: checkAvailable
        });

        $("#datePick").on('change', function(){
            $(".note").css('display', 'none');
            $(".allDays").css('display', 'none');
            var datePick = $("#datePick").val();
            var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            var today = new Date(datePick);
            $('.slot_'+days[today.getDay()]).css('display','block');
            $(".dateVal").val(datePick)
        });
        
        var unavailableDays = @json($unavailableDays);
        function checkAvailable(date) {
            d = date.getDay();
            if ($.inArray(d, unavailableDays) != -1) {
                return [false, "", "unAvailable"];
            } else {
                var day = date.getDay();
                return [(day != 0 && day != 6)];
            }
        }
    </script>
@endsection