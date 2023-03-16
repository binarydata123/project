@extends('common.home.layouts.app')
@section('content')
    <div class="fix-height"></div>
    <section class="book-a-meeting">
        <div class="container-fluid p-md-5 p-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-10 col-xl-5 p-3">
                            <span class="fs-2 fw-bolder mb-4">Book a Meeting</span>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row p-3">
                                        <span class="fs-5 fw-bolder">About Lawyer Service</span>
                                        <div class="">
                                            <div class="form-group row" style="margin-top: 15px;margin-bottom: 15px;">
                                                <input type="text" class="form-control book-a-meeting-form" id="title" placeholder="Lawyer service" name="title" value="{{old('title') ?? $slot->title}}">
                                                @error('title')
                                                    <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                                                @enderror  
                                            </div>
                                            <div class="form-group row" style="margin-top: 15px;margin-bottom: 15px;">
                                                <textarea name="description" class="form-control book-a-meeting-form" id="" cols="30" rows="10" placeholder="Description of the lawyer service">{{old('description') ?? $slot->description}}</textarea>
                                                @error('description')
                                                    <span class="error-msg" style="color:red;margin-top:2%;">{{ $message }}</span>
                                                @enderror  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="" id="unavailableDays" value="{{implode(',', $unavailableDays)}}">
                        <div class="col-12 col-md-12 col-xl-5 p-5 mt-5 slot-section">
                            <div class="d-flex date-select" id="check">
                                <div class="mr-md-4">
                                    <img src="/new-design/assets/image/home/calendar.png" alt="" class="calendar">
                                </div>
                                <input type="text" name="" id="datePick" class="form-control book-a-meeting-form">
                            </div>
                            <div>
                                @forelse($daySlots as $k => $slot)
                                    @if($slot->isAvailable($slot->slot_id, $slot->day))
                                        <div class="slot_{{$slot->day}} allDays" style="display:none;">
                                            <form method="POST" id="paymentForm" action="{{ route('schedule.meeting') }}">
                                                @csrf
                                                @php 
                                                    $prodName = $slot->slot->lawyer_id.'-'.$slot->id.'-'.$slot->amount;
                                                @endphp
                                                <input type="hidden" name="product_name" value="{{$prodName}}">
                                                <input type="hidden" name="amount" value="{{$slot->amount}}">
                                                <input type="hidden" name="daySlotId" value="{{$slot->id}}"> 
                                                <input type="hidden" name="lawyerUserId" value="{{$lawyer->user_id}}"> 
                                                <input type="hidden" name="date" class="dateVal" value="0">       
                                                <div class="d-flex mt-4">
                                                    <div class="col-2 col-md-2 col-xl-1 slot-calendar-img-section">
                                                        <img src="/new-design/lawyer/assets/image/home/calendar.png" alt="" class="calendar-img">
                                                    </div>
                                                    <button type="button" class="col-md-4 mr-3 btn btn-outline-dark slot-time-amt" disabled>{{$slot->slot_start_time}}</button>
                                                    <div class="col-1 mt-2 time-devider">
                                                        -
                                                    </div>
                                                    <button type="button" class="col-md-4 mr-3 btn btn-outline-dark slot-time-amt" disabled>{{$slot->slot_end_time}}</button>
                                                    <button type="button" class="col-md-4 mr-3 btn btn-outline-dark slot-time-amt" disabled>{{$slot->amount}}</button>
                                                    @if(auth()->user())
                                                        <button type="submit" class="col-md-4 mr-3 btn btn-outline-dark slot-time-amt" style="background-color: #208C84;color:white;border:none;" data-bs-toggle="modal" data-bs-target="#paymentForm">Schedule</button>
                                                    @else 
                                                        <button type="button" class="col-md-4 mr-3 btn btn-outline-dark slot-time-amt" style="background-color: #208C84;color:white;border:none;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Schedule</button>
                                                    @endif
                                                </div>                                
                                            </form>
                                        </div>
                                    @endif
                                @empty
                                    <p style="text-align: center;">No slots available</p>
                                @endforelse
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
        var dateToday = new Date();
        $("#datePick").datepicker({
            dateFormat:"yy-mm-dd",
            minDate: dateToday,
            beforeShowDay: checkAvailable,
            todayHighlight: true
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
        
        function checkAvailable(date) {
            var unavailableDays = @json($unavailableDays);
            d = date.getDay();
            if ($.inArray(d, unavailableDays) != -1) {
                return [false, "", "unAvailable"];
            } else {
                var day = date.getDay();
                return [(day != 0 && day != 6)];
                // return [false,"","Available"]; 
            }
        }
    </script>
@endpush