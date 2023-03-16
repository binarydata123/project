@extends('lawyer.home.layouts.app')
@section('content')
    @php 
        $monCount = 0;
        $tueCount = 0;
        $wedCount = 0;
        $thurCount = 0;
        $friCount = 0;
        $satCount = 0;
        $sunCount = 0;
    @endphp
    <section #dashboard>
        <div id="dashboard" class="px-3 py-5 dashboard font-Poppins-regular">
            <div class="container slot-container">
                <div class="card">
                    <div class="card-body slot-service-card-body">
                        <div class="row p-3">
                            <span class="fs-2 fw-bolder slot-title">Add Slots</span>
                        </div>
                        <div class="row col-10 col-md-12 p-3 m-2">
                            <ul class="nav nav-pills mb-3  justify-content-md-between slider" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link day-slot active" id="pills-monday-tab" data-bs-toggle="pill" data-bs-target="#pills-monday" type="button" role="tab" aria-controls="pills-monday" aria-selected="true">Monday</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link day-slot" id="pills-tuesday-tab" data-bs-toggle="pill" data-bs-target="#pills-tuesday" type="button" role="tab" aria-controls="pills-tuesday" aria-selected="false">Tuesday</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link day-slot" id="pills-wednesday-tab" data-bs-toggle="pill" data-bs-target="#pills-wednesday" type="button" role="tab" aria-controls="pills-wednesday" aria-selected="false">Wednesday</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link day-slot" id="pills-thursday-tab" data-bs-toggle="pill" data-bs-target="#pills-thursday" type="button" role="tab" aria-controls="pills-thursday" aria-selected="false">Thursday</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link day-slot" id="pills-friday-tab" data-bs-toggle="pill" data-bs-target="#pills-friday" type="button" role="tab" aria-controls="pills-friday" aria-selected="false">Friday</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link day-slot" id="pills-saturday-tab" data-bs-toggle="pill" data-bs-target="#pills-saturday" type="button" role="tab" aria-controls="pills-saturday" aria-selected="false">Saturday</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link day-slot" id="pills-sunday-tab" data-bs-toggle="pill" data-bs-target="#pills-sunday" type="button" role="tab" aria-controls="pills-sunday" aria-selected="false">Sunday</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-monday" role="tabpanel" aria-labelledby="pills-monday-tab" tabindex="0">
                                    <div class="row">
                                        @include('lawyer.pages.scheduled-events.add-service')
                                        <div class="col-12 col-md-6 mt-2">
                                            @php 
                                                $week = "monday";
                                                $short = "mon";
                                                $slotName = $week."_slot";
                                            @endphp
                                            <div class="form-check form-switch d-flex justify-content-end">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" style="margin:inherit;margin-right:1%;" {{$slotData ? ($slotData->$slotName ? 'checked' : '') : ''}} onchange="availableStatus('{{ucfirst($week)}}')">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">  Available</label>
                                            </div>
                                            @include('lawyer.pages.scheduled-events.note', ['week' => $week])
                                            <div class="row mt-4">
                                                <div class="col-12 col-md-12">
                                                    <form action="{{route('lawyer.store-slots')}}" method="POST">
                                                        @csrf()
                                                        <div class="row col-12 appended-{{$week}} slot-main">
                                                            <input type="hidden" id="monExistingCount" value="{{count($data['monSlot'])}}">
                                                            <input type="hidden" name="day" value="{{ucfirst($week)}}">
                                                            @forelse($data['monSlot'] as $k => $slot)
                                                                <div id="{{$week}}_div_{{$k}}">
                                                                    <div class="row mt-3" id="{{$short}}TimeOnlyExample_{{$k}}">
                                                                        <div class="col-2 col-md-2 col-xl-1 slot-calendar-img-section">
                                                                            <img src="/new-design/lawyer/assets/image/home/calendar.png" alt="" class="calendar-img">
                                                                        </div>
                                                                        <div class="col-7 col-md-4 col-xl-2 time-one">
                                                                            <input type="text" class="form-control time start start-end" name="{{$short}}_strt_time[]" value="{{$slot->slot_start_time}}" id="{{$short}}_start_time_{{$k}}" placeholder="7:00 am" />
                                                                        </div>
                                                                        <div class="col-1 mt-2 time-devider">
                                                                            -
                                                                        </div>
                                                                        <div class="col-7 col-md-3 time-two">
                                                                            <input type="text" class="form-control time end start-end" name="{{$short}}_end_time[]" value="{{$slot->slot_end_time}}" id="{{$short}}_end_time_{{$k}}" onchange="endTime('#{{$short}}_start_time_{{$k}}', '#{{$short}}_end_time_{{$k}}', 0)" placeholder="7:15 am" />
                                                                        </div>
                                                                        <div class="col-4 col-md-4 col-xl-2 amount">
                                                                            <input type="text" class="form-control start-end-amt" name="{{$short}}_amt[]" value="{{preg_replace('/[^0-9]/', '', $slot->amount)}}" id="{{$short}}_amt_{{$k}}" placeholder="50" style="margin-left: 5%;" />
                                                                        </div>                    
                                                                        @if($monCount == 0)                                          
                                                                            <div class="col-3 col-md-1 slot-plus-btn">
                                                                                <button type="button" class="plus-btn" onclick="appendField('{{ucfirst($week)}}')"><i class="fa fa-plus"></i></button>
                                                                            </div>
                                                                        @else 
                                                                            <div class="col-3 col-md-1 slot-plus-btn">
                                                                                <button type="button" class="minus-btn" onclick="removeField('{{ucfirst($week)}}', {{$k}})"><i class="fa fa-minus"></i></button>
                                                                            </div>
                                                                        @endif
                                                                        <input type="hidden" name="{{$week}}_dynamic" id="{{$week}}_dynamic" value="{{++$monCount}}">  
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <div id="{{$week}}_div_0">
                                                                    <div class="row mt-3" id="{{$short}}TimeOnlyExample_0">
                                                                        <div class="col-2 col-md-2 col-xl-1 slot-calendar-img-section">
                                                                            <img src="/new-design/lawyer/assets/image/home/calendar.png" alt="" class="calendar-img">
                                                                        </div>
                                                                        <div class="col-7 col-md-4 col-xl-2 time-one">
                                                                            <input type="text" class="form-control time start start-end" name="{{$short}}_strt_time[]" id="{{$short}}_start_time_0" placeholder="7:00 am" />
                                                                        </div>
                                                                        <div class="col-1 mt-2 time-devider">
                                                                            -
                                                                        </div>
                                                                        <div class="col-7 col-md-3 time-two">
                                                                            <input type="text" class="form-control time end start-end" name="{{$short}}_end_time[]" id="{{$short}}_end_time_0" onchange="endTime('#{{$short}}_start_time_0', '#{{$short}}_end_time_0', 0)" placeholder="7:15 am" />
                                                                        </div>
                                                                        <div class="col-4 col-md-4 col-xl-2 amount">
                                                                            <input type="text" class="form-control start-end-amt" name="{{$short}}_amt[]" id="{{$short}}_amt_0" placeholder="50" style="margin-left: 5%;" />
                                                                        </div>                                                            
                                                                        <div class="col-3 col-md-1 slot-plus-btn">
                                                                            <button type="button" class="plus-btn" onclick="appendField('{{ucfirst($week)}}')"><i class="fa fa-plus"></i></button>
                                                                            <input type="hidden" name="{{$week}}_dynamic" id="{{$week}}_dynamic" value="0">  
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforelse
                                                        </div>
                                                        <div class="text-center mt-5">
                                                            <button type="submit" class="btn btn-primary slot-submit-btn">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-tuesday" role="tabpanel" aria-labelledby="pills-tuesday-tab" tabindex="0">
                                    <div class="row">
                                        @include('lawyer.pages.scheduled-events.add-service')
                                        <div class="col-12 col-md-6 mt-2">
                                            @php 
                                                $week = "tuesday";
                                                $short = "tue";
                                                $slotName = $week."_slot";
                                            @endphp
                                            <div class="form-check form-switch d-flex justify-content-end">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" style="margin:inherit;margin-right:1%;" {{$slotData ? ($slotData->$slotName ? 'checked' : '') : ''}} onchange="availableStatus('{{ucfirst($week)}}')">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">  Available</label>
                                            </div>
                                            @include('lawyer.pages.scheduled-events.note', ['week' => $week])
                                            <div class="row mt-4">
                                                <div class="col-12 col-md-12">
                                                    <form action="{{route('lawyer.store-slots')}}" method="POST">
                                                        @csrf()
                                                        <div class="row col-12 appended-{{$week}} slot-main">
                                                            <input type="hidden" id="tueExistingCount" value="{{count($data['tueSlot'])}}">
                                                            <input type="hidden" name="day" value="{{ucfirst($week)}}">
                                                            @forelse($data['tueSlot'] as $k => $slot)
                                                                <div id="{{$week}}_div_{{$k}}">
                                                                    <div class="row mt-3" id="{{$short}}TimeOnlyExample_{{$k}}">
                                                                        <div class="col-2 col-md-2 col-xl-1 slot-calendar-img-section">
                                                                            <img src="/new-design/lawyer/assets/image/home/calendar.png" alt="" class="calendar-img">
                                                                        </div>
                                                                        <div class="col-7 col-md-4 col-xl-2 time-one">
                                                                            <input type="text" class="form-control time start start-end" name="{{$short}}_strt_time[]" value="{{$slot->slot_start_time}}" id="{{$short}}_start_time_{{$k}}" placeholder="7:00 am" />
                                                                        </div>
                                                                        <div class="col-1 mt-2 time-devider">
                                                                            -
                                                                        </div>
                                                                        <div class="col-7 col-md-3 time-two">
                                                                            <input type="text" class="form-control time end start-end" name="{{$short}}_end_time[]" value="{{$slot->slot_end_time}}" id="{{$short}}_end_time_{{$k}}" onchange="endTime('#{{$short}}_start_time_{{$k}}', '#{{$short}}_end_time_{{$k}}', 0)" placeholder="7:15 am" />
                                                                        </div>
                                                                        <div class="col-4 col-md-4 col-xl-2 amount">
                                                                            <input type="text" class="form-control start-end-amt" name="{{$short}}_amt[]" value="{{preg_replace('/[^0-9]/', '', $slot->amount)}}" id="{{$short}}_amt_{{$k}}" placeholder="50" style="margin-left: 5%;" />
                                                                        </div>                    
                                                                        @if($tueCount == 0)                                          
                                                                            <div class="col-3 col-md-1 slot-plus-btn">
                                                                                <button type="button" class="plus-btn" onclick="appendField('{{ucfirst($week)}}')"><i class="fa fa-plus"></i></button>
                                                                            </div>
                                                                        @else 
                                                                            <div class="col-3 col-md-1 slot-plus-btn">
                                                                                <button type="button" class="minus-btn" onclick="removeField('{{ucfirst($week)}}', {{$k}})"><i class="fa fa-minus"></i></button>
                                                                            </div>
                                                                        @endif
                                                                        <input type="hidden" name="{{$week}}_dynamic" id="{{$week}}_dynamic" value="{{++$tueCount}}">  
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <div id="{{$week}}_div_0">
                                                                    <div class="row mt-3" id="{{$short}}TimeOnlyExample_0">
                                                                        <div class="col-2 col-md-2 col-xl-1 slot-calendar-img-section">
                                                                            <img src="/new-design/lawyer/assets/image/home/calendar.png" alt="" class="calendar-img">
                                                                        </div>
                                                                        <div class="col-7 col-md-4 col-xl-2 time-one">
                                                                            <input type="text" class="form-control time start start-end" name="{{$short}}_strt_time[]" id="{{$short}}_start_time_0" placeholder="7:00 am" />
                                                                        </div>
                                                                        <div class="col-1 mt-2 time-devider">
                                                                            -
                                                                        </div>
                                                                        <div class="col-7 col-md-3 time-two">
                                                                            <input type="text" class="form-control time end start-end" name="{{$short}}_end_time[]" id="{{$short}}_end_time_0" onchange="endTime('#{{$short}}_start_time_0', '#{{$short}}_end_time_0', 0)" placeholder="7:15 am" />
                                                                        </div>
                                                                        <div class="col-4 col-md-4 col-xl-2 amount">
                                                                            <input type="text" class="form-control start-end-amt" name="{{$short}}_amt[]" id="{{$short}}_amt_0" placeholder="50" style="margin-left: 5%;" />
                                                                        </div>                                                            
                                                                        <div class="col-3 col-md-1 slot-plus-btn">
                                                                            <button type="button" class="plus-btn" onclick="appendField('{{ucfirst($week)}}')"><i class="fa fa-plus"></i></button>
                                                                            <input type="hidden" name="{{$week}}_dynamic" id="{{$week}}_dynamic" value="0">  
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforelse
                                                        </div>
                                                        <div class="text-center mt-5">
                                                            <button type="submit" class="btn btn-primary slot-submit-btn">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-wednesday" role="tabpanel" aria-labelledby="pills-wednesday-tab" tabindex="0">
                                    <div class="row">
                                        @include('lawyer.pages.scheduled-events.add-service')
                                        <div class="col-12 col-md-6 mt-2">
                                            @php 
                                                $week = "wednesday";
                                                $short = "wed";
                                                $slotName = $week."_slot";
                                            @endphp
                                            <div class="form-check form-switch d-flex justify-content-end">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" style="margin:inherit;margin-right:1%;" {{$slotData ? ($slotData->$slotName ? 'checked' : '') : ''}} onchange="availableStatus('{{ucfirst($week)}}')">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">  Available</label>
                                            </div>
                                            @include('lawyer.pages.scheduled-events.note', ['week' => $week])
                                            <div class="row mt-4">
                                                <div class="col-12 col-md-12">
                                                    <form action="{{route('lawyer.store-slots')}}" method="POST">
                                                        @csrf()
                                                        <div class="row col-12 appended-{{$week}} slot-main">
                                                            <input type="hidden" id="wedExistingCount" value="{{count($data['wedSlot'])}}">
                                                            <input type="hidden" name="day" value="{{ucfirst($week)}}">
                                                            @forelse($data['wedSlot'] as $k => $slot)
                                                                <div id="{{$week}}_div_{{$k}}">
                                                                    <div class="row mt-3" id="{{$short}}TimeOnlyExample_{{$k}}">
                                                                        <div class="col-2 col-md-2 col-xl-1 slot-calendar-img-section">
                                                                            <img src="/new-design/lawyer/assets/image/home/calendar.png" alt="" class="calendar-img">
                                                                        </div>
                                                                        <div class="col-7 col-md-4 col-xl-2 time-one">
                                                                            <input type="text" class="form-control time start start-end" name="{{$short}}_strt_time[]" value="{{$slot->slot_start_time}}" id="{{$short}}_start_time_{{$k}}" placeholder="7:00 am" />
                                                                        </div>
                                                                        <div class="col-1 mt-2 time-devider">
                                                                            -
                                                                        </div>
                                                                        <div class="col-7 col-md-3 time-two">
                                                                            <input type="text" class="form-control time end start-end" name="{{$short}}_end_time[]" value="{{$slot->slot_end_time}}" id="{{$short}}_end_time_{{$k}}" onchange="endTime('#{{$short}}_start_time_{{$k}}', '#{{$short}}_end_time_{{$k}}', 0)" placeholder="7:15 am" />
                                                                        </div>
                                                                        <div class="col-4 col-md-4 col-xl-2 amount">
                                                                            <input type="text" class="form-control start-end-amt" name="{{$short}}_amt[]" value="{{preg_replace('/[^0-9]/', '', $slot->amount)}}" id="{{$short}}_amt_{{$k}}" placeholder="50" style="margin-left: 5%;" />
                                                                        </div>                    
                                                                        @if($wedCount == 0)                                          
                                                                            <div class="col-3 col-md-1 slot-plus-btn">
                                                                                <button type="button" class="plus-btn" onclick="appendField('{{ucfirst($week)}}')"><i class="fa fa-plus"></i></button>
                                                                            </div>
                                                                        @else 
                                                                            <div class="col-3 col-md-1 slot-plus-btn">
                                                                                <button type="button" class="minus-btn" onclick="removeField('{{ucfirst($week)}}', {{$k}})"><i class="fa fa-minus"></i></button>
                                                                            </div>
                                                                        @endif
                                                                        <input type="hidden" name="{{$week}}_dynamic" id="{{$week}}_dynamic" value="{{++$monCount}}">  
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <div id="{{$week}}_div_0">
                                                                    <div class="row mt-3" id="{{$short}}TimeOnlyExample_0">
                                                                        <div class="col-2 col-md-2 col-xl-1 slot-calendar-img-section">
                                                                            <img src="/new-design/lawyer/assets/image/home/calendar.png" alt="" class="calendar-img">
                                                                        </div>
                                                                        <div class="col-7 col-md-4 col-xl-2 time-one">
                                                                            <input type="text" class="form-control time start start-end" name="{{$short}}_strt_time[]" id="{{$short}}_start_time_0" placeholder="7:00 am" />
                                                                        </div>
                                                                        <div class="col-1 mt-2 time-devider">
                                                                            -
                                                                        </div>
                                                                        <div class="col-7 col-md-3 time-two">
                                                                            <input type="text" class="form-control time end start-end" name="{{$short}}_end_time[]" id="{{$short}}_end_time_0" onchange="endTime('#{{$short}}_start_time_0', '#{{$short}}_end_time_0', 0)" placeholder="7:15 am" />
                                                                        </div>
                                                                        <div class="col-4 col-md-4 col-xl-2 amount">
                                                                            <input type="text" class="form-control start-end-amt" name="{{$short}}_amt[]" id="{{$short}}_amt_0" placeholder="50" style="margin-left: 5%;" />
                                                                        </div>                                                            
                                                                        <div class="col-3 col-md-1 slot-plus-btn">
                                                                            <button type="button" class="plus-btn" onclick="appendField('{{ucfirst($week)}}')"><i class="fa fa-plus"></i></button>
                                                                            <input type="hidden" name="{{$week}}_dynamic" id="{{$week}}_dynamic" value="0">  
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforelse
                                                        </div>
                                                        <div class="text-center mt-5">
                                                            <button type="submit" class="btn btn-primary slot-submit-btn">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-thursday" role="tabpanel" aria-labelledby="pills-thursday-tab" tabindex="0">
                                    <div class="row">
                                        @include('lawyer.pages.scheduled-events.add-service')
                                        <div class="col-12 col-md-6 mt-2">
                                            @php 
                                                $week = "thursday";
                                                $short = "thur";
                                                $slotName = $week."_slot";
                                            @endphp
                                            <div class="form-check form-switch d-flex justify-content-end">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" style="margin:inherit;margin-right:1%;" {{$slotData ? ($slotData->$slotName ? 'checked' : '') : ''}} onchange="availableStatus('{{ucfirst($week)}}')">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">  Available</label>
                                            </div>
                                            @include('lawyer.pages.scheduled-events.note', ['week' => $week])
                                            <div class="row mt-4">
                                                <div class="col-12 col-md-12">
                                                    <form action="{{route('lawyer.store-slots')}}" method="POST">
                                                        @csrf()
                                                        <div class="row col-12 appended-{{$week}} slot-main">
                                                            <input type="hidden" id="thurExistingCount" value="{{count($data['thurSlot'])}}">
                                                            <input type="hidden" name="day" value="{{ucfirst($week)}}">
                                                            @forelse($data['thurSlot'] as $k => $slot)
                                                                <div id="{{$week}}_div_{{$k}}">
                                                                    <div class="row mt-3" id="{{$short}}TimeOnlyExample_{{$k}}">
                                                                        <div class="col-2 col-md-2 col-xl-1 slot-calendar-img-section">
                                                                            <img src="/new-design/lawyer/assets/image/home/calendar.png" alt="" class="calendar-img">
                                                                        </div>
                                                                        <div class="col-7 col-md-4 col-xl-2 time-one">
                                                                            <input type="text" class="form-control time start start-end" name="{{$short}}_strt_time[]" value="{{$slot->slot_start_time}}" id="{{$short}}_start_time_{{$k}}" placeholder="7:00 am" />
                                                                        </div>
                                                                        <div class="col-1 mt-2 time-devider">
                                                                            -
                                                                        </div>
                                                                        <div class="col-7 col-md-3 time-two">
                                                                            <input type="text" class="form-control time end start-end" name="{{$short}}_end_time[]" value="{{$slot->slot_end_time}}" id="{{$short}}_end_time_{{$k}}" onchange="endTime('#{{$short}}_start_time_{{$k}}', '#{{$short}}_end_time_{{$k}}', 0)" placeholder="7:15 am" />
                                                                        </div>
                                                                        <div class="col-4 col-md-4 col-xl-2 amount">
                                                                            <input type="text" class="form-control start-end-amt" name="{{$short}}_amt[]" value="{{preg_replace('/[^0-9]/', '', $slot->amount)}}" id="{{$short}}_amt_{{$k}}" placeholder="50" style="margin-left: 5%;" />
                                                                        </div>                    
                                                                        @if($thurCount == 0)                                          
                                                                            <div class="col-3 col-md-1 slot-plus-btn">
                                                                                <button type="button" class="plus-btn" onclick="appendField('{{ucfirst($week)}}')"><i class="fa fa-plus"></i></button>
                                                                            </div>
                                                                        @else 
                                                                            <div class="col-3 col-md-1 slot-plus-btn">
                                                                                <button type="button" class="minus-btn" onclick="removeField('{{ucfirst($week)}}', {{$k}})"><i class="fa fa-minus"></i></button>
                                                                            </div>
                                                                        @endif
                                                                        <input type="hidden" name="{{$week}}_dynamic" id="{{$week}}_dynamic" value="{{++$monCount}}">  
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <div id="{{$week}}_div_0">
                                                                    <div class="row mt-3" id="{{$short}}TimeOnlyExample_0">
                                                                        <div class="col-2 col-md-2 col-xl-1 slot-calendar-img-section">
                                                                            <img src="/new-design/lawyer/assets/image/home/calendar.png" alt="" class="calendar-img">
                                                                        </div>
                                                                        <div class="col-7 col-md-4 col-xl-2 time-one">
                                                                            <input type="text" class="form-control time start start-end" name="{{$short}}_strt_time[]" id="{{$short}}_start_time_0" placeholder="7:00 am" />
                                                                        </div>
                                                                        <div class="col-1 mt-2 time-devider">
                                                                            -
                                                                        </div>
                                                                        <div class="col-7 col-md-3 time-two">
                                                                            <input type="text" class="form-control time end start-end" name="{{$short}}_end_time[]" id="{{$short}}_end_time_0" onchange="endTime('#{{$short}}_start_time_0', '#{{$short}}_end_time_0', 0)" placeholder="7:15 am" />
                                                                        </div>
                                                                        <div class="col-4 col-md-4 col-xl-2 amount">
                                                                            <input type="text" class="form-control start-end-amt" name="{{$short}}_amt[]" id="{{$short}}_amt_0" placeholder="50" style="margin-left: 5%;" />
                                                                        </div>                                                            
                                                                        <div class="col-3 col-md-1 slot-plus-btn">
                                                                            <button type="button" class="plus-btn" onclick="appendField('{{ucfirst($week)}}')"><i class="fa fa-plus"></i></button>
                                                                            <input type="hidden" name="{{$week}}_dynamic" id="{{$week}}_dynamic" value="0">  
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforelse
                                                        </div>
                                                        <div class="text-center mt-5">
                                                            <button type="submit" class="btn btn-primary slot-submit-btn">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-friday" role="tabpanel" aria-labelledby="pills-friday-tab" tabindex="0">
                                    <div class="row">
                                        @include('lawyer.pages.scheduled-events.add-service')
                                        <div class="col-12 col-md-6 mt-2">
                                            @php 
                                                $week = "friday";
                                                $short = "fri";
                                                $slotName = $week."_slot";
                                            @endphp
                                            <div class="form-check form-switch d-flex justify-content-end">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" style="margin:inherit;margin-right:1%;" {{$slotData ? ($slotData->$slotName ? 'checked' : '') : ''}} onchange="availableStatus('{{ucfirst($week)}}')">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">  Available</label>
                                            </div>
                                            @include('lawyer.pages.scheduled-events.note', ['week' => $week])
                                            <div class="row mt-4">
                                                <div class="col-12 col-md-12">
                                                    <form action="{{route('lawyer.store-slots')}}" method="POST">
                                                        @csrf()
                                                        <div class="row col-12 appended-{{$week}} slot-main">
                                                            <input type="hidden" id="friExistingCount" value="{{count($data['friSlot'])}}">
                                                            <input type="hidden" name="day" value="{{ucfirst($week)}}">
                                                            @forelse($data['friSlot'] as $k => $slot)
                                                                <div id="{{$week}}_div_{{$k}}">
                                                                    <div class="row mt-3" id="{{$short}}TimeOnlyExample_{{$k}}">
                                                                        <div class="col-2 col-md-2 col-xl-1 slot-calendar-img-section">
                                                                            <img src="/new-design/lawyer/assets/image/home/calendar.png" alt="" class="calendar-img">
                                                                        </div>
                                                                        <div class="col-7 col-md-4 col-xl-2 time-one">
                                                                            <input type="text" class="form-control time start start-end" name="{{$short}}_strt_time[]" value="{{$slot->slot_start_time}}" id="{{$short}}_start_time_{{$k}}" placeholder="7:00 am" />
                                                                        </div>
                                                                        <div class="col-1 mt-2 time-devider">
                                                                            -
                                                                        </div>
                                                                        <div class="col-7 col-md-3 time-two">
                                                                            <input type="text" class="form-control time end start-end" name="{{$short}}_end_time[]" value="{{$slot->slot_end_time}}" id="{{$short}}_end_time_{{$k}}" onchange="endTime('#{{$short}}_start_time_{{$k}}', '#{{$short}}_end_time_{{$k}}', 0)" placeholder="7:15 am" />
                                                                        </div>
                                                                        <div class="col-4 col-md-4 col-xl-2 amount">
                                                                            <input type="text" class="form-control start-end-amt" name="{{$short}}_amt[]" value="{{preg_replace('/[^0-9]/', '', $slot->amount)}}" id="{{$short}}_amt_{{$k}}" placeholder="50" style="margin-left: 5%;" />
                                                                        </div>                    
                                                                        @if($friCount == 0)                                          
                                                                            <div class="col-3 col-md-1 slot-plus-btn">
                                                                                <button type="button" class="plus-btn" onclick="appendField('{{ucfirst($week)}}')"><i class="fa fa-plus"></i></button>
                                                                            </div>
                                                                        @else 
                                                                            <div class="col-3 col-md-1 slot-plus-btn">
                                                                                <button type="button" class="minus-btn" onclick="removeField('{{ucfirst($week)}}', {{$k}})"><i class="fa fa-minus"></i></button>
                                                                            </div>
                                                                        @endif
                                                                        <input type="hidden" name="{{$week}}_dynamic" id="{{$week}}_dynamic" value="{{++$monCount}}">  
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <div id="{{$week}}_div_0">
                                                                    <div class="row mt-3" id="{{$short}}TimeOnlyExample_0">
                                                                        <div class="col-2 col-md-2 col-xl-1 slot-calendar-img-section">
                                                                            <img src="/new-design/lawyer/assets/image/home/calendar.png" alt="" class="calendar-img">
                                                                        </div>
                                                                        <div class="col-7 col-md-4 col-xl-2 time-one">
                                                                            <input type="text" class="form-control time start start-end" name="{{$short}}_strt_time[]" id="{{$short}}_start_time_0" placeholder="7:00 am" />
                                                                        </div>
                                                                        <div class="col-1 mt-2 time-devider">
                                                                            -
                                                                        </div>
                                                                        <div class="col-7 col-md-3 time-two">
                                                                            <input type="text" class="form-control time end start-end" name="{{$short}}_end_time[]" id="{{$short}}_end_time_0" onchange="endTime('#{{$short}}_start_time_0', '#{{$short}}_end_time_0', 0)" placeholder="7:15 am" />
                                                                        </div>
                                                                        <div class="col-4 col-md-4 col-xl-2 amount">
                                                                            <input type="text" class="form-control start-end-amt" name="{{$short}}_amt[]" id="{{$short}}_amt_0" placeholder="50" style="margin-left: 5%;" />
                                                                        </div>                                                            
                                                                        <div class="col-3 col-md-1 slot-plus-btn">
                                                                            <button type="button" class="plus-btn" onclick="appendField('{{ucfirst($week)}}')"><i class="fa fa-plus"></i></button>
                                                                            <input type="hidden" name="{{$week}}_dynamic" id="{{$week}}_dynamic" value="0">  
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforelse
                                                        </div>
                                                        <div class="text-center mt-5">
                                                            <button type="submit" class="btn btn-primary slot-submit-btn">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-saturday" role="tabpanel" aria-labelledby="pills-saturday-tab" tabindex="0">
                                    <div class="row">
                                        @include('lawyer.pages.scheduled-events.add-service')
                                        <div class="col-12 col-md-6 mt-2">
                                            @php 
                                                $week = "saturday";
                                                $short = "sat";
                                                $slotName = $week."_slot";
                                            @endphp
                                            <div class="form-check form-switch d-flex justify-content-end">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" style="margin:inherit;margin-right:1%;" {{$slotData ? ($slotData->$slotName ? 'checked' : '') : ''}} onchange="availableStatus('{{ucfirst($week)}}')">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">  Available</label>
                                            </div>
                                            @include('lawyer.pages.scheduled-events.note', ['week' => $week])
                                            <div class="row mt-4">
                                                <div class="col-12 col-md-12">
                                                    <form action="{{route('lawyer.store-slots')}}" method="POST">
                                                        @csrf()
                                                        <div class="row col-12 appended-{{$week}} slot-main">
                                                            <input type="hidden" id="satExistingCount" value="{{count($data['satSlot'])}}">
                                                            <input type="hidden" name="day" value="{{ucfirst($week)}}">
                                                            @forelse($data['satSlot'] as $k => $slot)
                                                                <div id="{{$week}}_div_{{$k}}">
                                                                    <div class="row mt-3" id="{{$short}}TimeOnlyExample_{{$k}}">
                                                                        <div class="col-2 col-md-2 col-xl-1 slot-calendar-img-section">
                                                                            <img src="/new-design/lawyer/assets/image/home/calendar.png" alt="" class="calendar-img">
                                                                        </div>
                                                                        <div class="col-7 col-md-4 col-xl-2 time-one">
                                                                            <input type="text" class="form-control time start start-end" name="{{$short}}_strt_time[]" value="{{$slot->slot_start_time}}" id="{{$short}}_start_time_{{$k}}" placeholder="7:00 am" />
                                                                        </div>
                                                                        <div class="col-1 mt-2 time-devider">
                                                                            -
                                                                        </div>
                                                                        <div class="col-7 col-md-3 time-two">
                                                                            <input type="text" class="form-control time end start-end" name="{{$short}}_end_time[]" value="{{$slot->slot_end_time}}" id="{{$short}}_end_time_{{$k}}" onchange="endTime('#{{$short}}_start_time_{{$k}}', '#{{$short}}_end_time_{{$k}}', 0)" placeholder="7:15 am" />
                                                                        </div>
                                                                        <div class="col-4 col-md-4 col-xl-2 amount">
                                                                            <input type="text" class="form-control start-end-amt" name="{{$short}}_amt[]" value="{{preg_replace('/[^0-9]/', '', $slot->amount)}}" id="{{$short}}_amt_{{$k}}" placeholder="50" style="margin-left: 5%;" />
                                                                        </div>                    
                                                                        @if($satCount == 0)                                          
                                                                            <div class="col-3 col-md-1 slot-plus-btn">
                                                                                <button type="button" class="plus-btn" onclick="appendField('{{ucfirst($week)}}')"><i class="fa fa-plus"></i></button>
                                                                            </div>
                                                                        @else 
                                                                            <div class="col-3 col-md-1 slot-plus-btn">
                                                                                <button type="button" class="minus-btn" onclick="removeField('{{ucfirst($week)}}', {{$k}})"><i class="fa fa-minus"></i></button>
                                                                            </div>
                                                                        @endif
                                                                        <input type="hidden" name="{{$week}}_dynamic" id="{{$week}}_dynamic" value="{{++$monCount}}">  
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <div id="{{$week}}_div_0">
                                                                    <div class="row mt-3" id="{{$short}}TimeOnlyExample_0">
                                                                        <div class="col-2 col-md-2 col-xl-1 slot-calendar-img-section">
                                                                            <img src="/new-design/lawyer/assets/image/home/calendar.png" alt="" class="calendar-img">
                                                                        </div>
                                                                        <div class="col-7 col-md-4 col-xl-2 time-one">
                                                                            <input type="text" class="form-control time start start-end" name="{{$short}}_strt_time[]" id="{{$short}}_start_time_0" placeholder="7:00 am" />
                                                                        </div>
                                                                        <div class="col-1 mt-2 time-devider">
                                                                            -
                                                                        </div>
                                                                        <div class="col-7 col-md-3 time-two">
                                                                            <input type="text" class="form-control time end start-end" name="{{$short}}_end_time[]" id="{{$short}}_end_time_0" onchange="endTime('#{{$short}}_start_time_0', '#{{$short}}_end_time_0', 0)" placeholder="7:15 am" />
                                                                        </div>
                                                                        <div class="col-4 col-md-4 col-xl-2 amount">
                                                                            <input type="text" class="form-control start-end-amt" name="{{$short}}_amt[]" id="{{$short}}_amt_0" placeholder="50" style="margin-left: 5%;" />
                                                                        </div>                                                            
                                                                        <div class="col-3 col-md-1 slot-plus-btn">
                                                                            <button type="button" class="plus-btn" onclick="appendField('{{ucfirst($week)}}')"><i class="fa fa-plus"></i></button>
                                                                            <input type="hidden" name="{{$week}}_dynamic" id="{{$week}}_dynamic" value="0">  
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforelse
                                                        </div>
                                                        <div class="text-center mt-5">
                                                            <button type="submit" class="btn btn-primary slot-submit-btn">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-sunday" role="tabpanel" aria-labelledby="pills-sunday-tab" tabindex="0">
                                    <div class="row">
                                        @include('lawyer.pages.scheduled-events.add-service')
                                        <div class="col-12 col-md-6 mt-2">
                                            @php 
                                                $week = "sunday";
                                                $short = "sun";
                                                $slotName = $week."_slot";
                                            @endphp
                                            <div class="form-check form-switch d-flex justify-content-end">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" style="margin:inherit;margin-right:1%;" {{$slotData ? ($slotData->$slotName ? 'checked' : '') : ''}} onchange="availableStatus('{{ucfirst($week)}}')">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">  Available</label>
                                            </div>
                                            @include('lawyer.pages.scheduled-events.note', ['week' => $week])
                                            <div class="row mt-4">
                                                <div class="col-12 col-md-12">
                                                    <form action="{{route('lawyer.store-slots')}}" method="POST">
                                                        @csrf()
                                                        <div class="row col-12 appended-{{$week}} slot-main">
                                                            <input type="hidden" id="sunExistingCount" value="{{count($data['sunSlot'])}}">
                                                            <input type="hidden" name="day" value="{{ucfirst($week)}}">
                                                            @forelse($data['sunSlot'] as $k => $slot)
                                                                <div id="{{$week}}_div_{{$k}}">
                                                                    <div class="row mt-3" id="{{$short}}TimeOnlyExample_{{$k}}">
                                                                        <div class="col-2 col-md-2 col-xl-1 slot-calendar-img-section">
                                                                            <img src="/new-design/lawyer/assets/image/home/calendar.png" alt="" class="calendar-img">
                                                                        </div>
                                                                        <div class="col-7 col-md-4 col-xl-2 time-one">
                                                                            <input type="text" class="form-control time start start-end" name="{{$short}}_strt_time[]" value="{{$slot->slot_start_time}}" id="{{$short}}_start_time_{{$k}}" placeholder="7:00 am" />
                                                                        </div>
                                                                        <div class="col-1 mt-2 time-devider">
                                                                            -
                                                                        </div>
                                                                        <div class="col-7 col-md-3 time-two">
                                                                            <input type="text" class="form-control time end start-end" name="{{$short}}_end_time[]" value="{{$slot->slot_end_time}}" id="{{$short}}_end_time_{{$k}}" onchange="endTime('#{{$short}}_start_time_{{$k}}', '#{{$short}}_end_time_{{$k}}', 0)" placeholder="7:15 am" />
                                                                        </div>
                                                                        <div class="col-4 col-md-4 col-xl-2 amount">
                                                                            <input type="text" class="form-control start-end-amt" name="{{$short}}_amt[]" value="{{preg_replace('/[^0-9]/', '', $slot->amount)}}" id="{{$short}}_amt_{{$k}}" placeholder="50" style="margin-left: 5%;" />
                                                                        </div>                    
                                                                        @if($sunCount == 0)                                          
                                                                            <div class="col-3 col-md-1 slot-plus-btn">
                                                                                <button type="button" class="plus-btn" onclick="appendField('{{ucfirst($week)}}')"><i class="fa fa-plus"></i></button>
                                                                            </div>
                                                                        @else 
                                                                            <div class="col-3 col-md-1 slot-plus-btn">
                                                                                <button type="button" class="minus-btn" onclick="removeField('{{ucfirst($week)}}', {{$k}})"><i class="fa fa-minus"></i></button>
                                                                            </div>
                                                                        @endif
                                                                        <input type="hidden" name="{{$week}}_dynamic" id="{{$week}}_dynamic" value="{{++$monCount}}">  
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <div id="{{$week}}_div_0">
                                                                    <div class="row mt-3" id="{{$short}}TimeOnlyExample_0">
                                                                        <div class="col-2 col-md-2 col-xl-1 slot-calendar-img-section">
                                                                            <img src="/new-design/lawyer/assets/image/home/calendar.png" alt="" class="calendar-img">
                                                                        </div>
                                                                        <div class="col-7 col-md-4 col-xl-2 time-one">
                                                                            <input type="text" class="form-control time start start-end" name="{{$short}}_strt_time[]" id="{{$short}}_start_time_0" placeholder="7:00 am" />
                                                                        </div>
                                                                        <div class="col-1 mt-2 time-devider">
                                                                            -
                                                                        </div>
                                                                        <div class="col-7 col-md-3 time-two">
                                                                            <input type="text" class="form-control time end start-end" name="{{$short}}_end_time[]" id="{{$short}}_end_time_0" onchange="endTime('#{{$short}}_start_time_0', '#{{$short}}_end_time_0', 0)" placeholder="7:15 am" />
                                                                        </div>
                                                                        <div class="col-4 col-md-4 col-xl-2 amount">
                                                                            <input type="text" class="form-control start-end-amt" name="{{$short}}_amt[]" id="{{$short}}_amt_0" placeholder="50" style="margin-left: 5%;" />
                                                                        </div>                                                            
                                                                        <div class="col-3 col-md-1 slot-plus-btn">
                                                                            <button type="button" class="plus-btn" onclick="appendField('{{ucfirst($week)}}')"><i class="fa fa-plus"></i></button>
                                                                            <input type="hidden" name="{{$week}}_dynamic" id="{{$week}}_dynamic" value="0">  
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforelse
                                                        </div>
                                                        <div class="text-center mt-5">
                                                            <button type="submit" class="btn btn-primary slot-submit-btn">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
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
    function appendField(day) {             
        if(day === "Monday") {
            var week = "monday";
            var short = "mon";             
        }
        else if(day === "Tuesday") {
            var week = "tuesday";
            var short = "tue";            
        }
        else if(day === "Wednesday") {
            var week = "wednesday";
            var short = "wed";             
        }
        else if(day === "Thursday") {
            var week = "thursday";
            var short = "thur"; 
        }
        else if(day === "Friday") {
            var week = "friday";
            var short = "fri"; 
        }
        else if(day === "Saturday") {
            var week = "saturday";
            var short = "sat"; 
        }
        else if(day === "Sunday") {
            var week = "sunday";
            var short = "sun"; 
        }

        dayDyn = $("#"+week+"_dynamic").val()
        dayDyn++
        $("#"+week+"_dynamic").val(dayDyn)
        strtId = "#"+short+"_start_time_"+dayDyn;
        endId = "#"+short+"_end_time_"+dayDyn;
        $(".appended-"+week+"").append('<div id="'+week+'_div_'+dayDyn+'"><div class="row mt-3" id="'+short+'TimeOnlyExample_'+dayDyn+'"><div class="col-2 col-md-2 col-xl-1 slot-calendar-img-section"><img src="/new-design/lawyer/assets/image/home/calendar.png" alt="" class="calendar-img"></div><div class="col-7 col-md-4 time-one"><input type="text" class="form-control time start start-end" name="'+short+'_strt_time[]" id="'+short+'_start_time_'+dayDyn+'" placeholder="7:00 am" /></div><div class="col-1 mt-2 time-devider">-</div><div class="col-7 col-md-3 time-two"><input type="text" class="form-control time end start-end" name="'+short+'_end_time[]" id="'+short+'_end_time_'+dayDyn+'" onchange="endTime(\''+strtId+'\', \''+endId+'\', '+dayDyn+')" placeholder="7:15 am" /></div><div class="col-4 col-md-4 col-xl-2 amount"><input type="text" class="form-control start-end-amt" name="'+short+'_amt[]" id="'+short+'_amt_'+dayDyn+'" placeholder="50" style="margin-left: 5%;" /></div><div class="col-3 col-md-1 slot-plus-btn"><button type="button" class="minus-btn" onclick="removeField(\''+day+'\', '+dayDyn+')"><i class="fa fa-minus"></i></button></div></div></div>')
        var pid = "#"+short+"TimeOnlyExample_"+dayDyn+" .time";
        var id = short+"TimeOnlyExample_"+dayDyn;
        appendedTimepicker(pid, id, dayDyn)
    }

    function appendedTimepicker(pId, id, dayDyn) {
        debugger
        $(pId).timepicker({
            'timeFormat': 'g:ia',
            "step": 15,
            "minTime": '07:00:00',
            "startTime": '07:00:00', 
        });

        var timeOnlyExampleEl = document.getElementById(id);
        console.log(timeOnlyExampleEl)
        var timeOnlyDatepair = new Datepair(timeOnlyExampleEl, {
            'defaultTimeDelta': 15*60*1000, // milliseconds
        });
    }

    function removeField(day, count) {
      if(day === "Monday") {
        $("#monday_div_"+count).remove();
      }
      if(day === "Tuesday") {
        $("#tuesday_div_"+count).remove();
      }
      if(day === "Wednesday") {
        $("#wednesday_div_"+count).remove();
      }
      if(day === "Thursday") {
        $("#thursday_div_"+count).remove();
      }
      if(day === "Friday") {
        $("#friday_div_"+count).remove();
      }
      if(day === "Saturday") {
        $("#saturday_div_"+count).remove();
      }
      if(day === "Sunday") {
        $("#sunday_div_"+count).remove();
      }
    }

    function availableStatus(day) {
      $.ajax({
        method:"post",
        url: "{{route('lawyer.slot.available-day')}}",
        data: {
            "_token": "{{ csrf_token() }}",
            "day" : day
        },
        success: function(res){
          Swal.fire({
              icon: 'success',
              title: "Updated",
              text: 'Success'
          })
          // setTimeout(window.location.reload.bind(window.location), 1000);
        }
      });
    }

    function endTime(strtId, endId, lenVal) {
      var strt = $(strtId).val()
      var end = $(endId).val()
      console.log(strt)
      var amPm = null;
      if(strt.includes("am")) {
        var tmpStartTime = strt.replace('am',':00');
        amPm = "am"
        var startTime = strt.replace('am','');
      }else {
        var tmpStartTime = strt.replace('pm',':00');
        amPm = "pm"
        var startTime = strt.replace('pm','');
      }
      if(strt === "11:45am") {
        amPm = "pm"
      } 
      if(end.includes("am")) {
        var endTime = end.replace('am','');
      }else {
        var endTime = end.replace('pm','');
      }

      var strtTimeArr = startTime.split(":");
      var endTimeArr = endTime.split(":");

      var strtTimeInMinutes = Math.floor(strtTimeArr[0] * 60);
      strtTimeInMinutes = parseInt(strtTimeInMinutes) + parseInt(strtTimeArr[1]);

      var endTimeInMinutes = Math.floor(endTimeArr[0] * 60);
      endTimeInMinutes = parseInt(endTimeInMinutes) + parseInt(endTimeArr[1]);
      var timeDiff = strtTimeInMinutes - endTimeInMinutes;
      if(Math.abs(timeDiff) > 30) {
        var maxTime = addMinutes(tmpStartTime, '15');
        $(endId).val(maxTime+amPm)
        Swal.fire({
            icon: 'error',
            title: "Oops",
            text: 'Please choose max 30 minutes session'
        })
        return;
      }else if(Math.abs(timeDiff) == 0) {
        var maxTime = addMinutes(tmpStartTime, '15');
        $(endId).val(maxTime+amPm)
        Swal.fire({
            icon: 'error',
            title: "Oops",
            text: 'Please choose atleast 30 minutes session'
        })
        return;
      }
    }

    const timepickerIds2 = ["monExistingCount", "tueExistingCount", "wedExistingCount", "thurExistingCount", "friExistingCount", "satExistingCount", "sunExistingCounts"];
    timepickerIds2.forEach(timepickerFunc2);
    
    function timepickerFunc2(id, index) {
        var appended = $("#"+id).val();
        for(i = 1; i < parseInt(appended); i++) {
            var short = id.slice(0, 3);
            var idWithClass = "#"+short+"TimeOnlyExample_"+i+" .time";
            $(idWithClass).timepicker({
                'timeFormat': 'g:ia',
                "step": 15,
                "minTime": '07:00:00',
                "startTime": '07:00:00',
            });
      
            var timeOnlyExampleEl = document.getElementById(short+"TimeOnlyExample_"+i);
            var timeOnlyDatepair = new Datepair(timeOnlyExampleEl, {
                'defaultTimeDelta': 15*60*1000, // milliseconds
            });
        }
    }
    

    const timepickerIds = ["monTimeOnlyExample_0", "tueTimeOnlyExample_0", "wedTimeOnlyExample_0", "thurTimeOnlyExample_0", "friTimeOnlyExample_0", "satTimeOnlyExample_0", "sunTimeOnlyExample_0"];
    timepickerIds.forEach(timepickerFunc);


    function timepickerFunc(id, index) {
        console.log(id)
      var idWithClass = '#'+id+" .time";
      $(idWithClass).timepicker({
          // 'showDuration': true,
          'timeFormat': 'g:ia',
          "step": 15,
          "minTime": '07:00:00',
          // "maxTime": '10:00:00',
          "startTime": '07:00:00',
      });
  
      var timeOnlyExampleEl = document.getElementById(id);
      var timeOnlyDatepair = new Datepair(timeOnlyExampleEl, {
        'defaultTimeDelta': 15*60*1000, // milliseconds
      });
    }

    function timeConvert(n) {
      var num = n;
      var hours = (num / 60);
      var rhours = Math.floor(hours);
      var minutes = (hours - rhours) * 60;
      var rminutes = Math.round(minutes);
      return rhours;
    }

    function addMinutes(time, minsToAdd) {
      function D(J) 
        { 
          return (J<10? '0':'') + J;
        };
      var piece = time.split(':');
      var mins = piece[0]*60 + +piece[1] + +minsToAdd;

      return D(mins%(24*60)/60 | 0) + ':' + D(mins%60);  
    }  
  </script>
@endpush