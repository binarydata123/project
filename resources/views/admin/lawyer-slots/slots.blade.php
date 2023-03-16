@extends('admin.layouts.navbar_content')
@section('title', 'Slots')
@section('page-style')
<style>
    .app-time {
  border: 1px solid #fff;
  padding: 20px 30px;
  box-shadow: 2px 4px 10px 0px #c7cacce3;
    }

    .option-input {
    -webkit-appearance: none;
    -moz-appearance: none;
    -ms-appearance: none;
    -o-appearance: none;
    appearance: none;
    position: relative;
    top: 5px;
    right: 0;
    bottom: 0;
    left: 40px;
    height: 20px;
    width: 20px;
    transition: all 0.15s ease-out 0s;
    background: #fff;
    border: 1px solid #999;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    margin-right: 0.5rem;
    outline: none;
    position: relative;
    z-index: 1000;
    }
    .option-input:hover {
    background: #e5e7eb;
    }
    .option-input:checked {
    border: 1px solid #fff;
    }
    .option-input:checked::before {
    color: #d9486d;
    height: 40px;
    width: 40px;
    position: absolute;
    content: "✔";
    display: inline-block;
    font-size: 12px;
    left: 4px;
    line-height: 20px;
    }
    .option-input:checked::after {
    -webkit-animation: click-wave 0.65s;
    -moz-animation: click-wave 0.65s;
    animation: click-wave 0.65s;
    background: #40e0d0;
    content: "";
    display: block;
    position: relative;
    z-index: 100;
    }

    .option-input.radio {
    border-radius: 50%;
    }
    .option-input.radio::after {
    border-radius: 50%;
    }
    .app-check {
    display: flex;
    }
    .app-border {
    border: 1px solid #ece9e9;
    border-radius: 7px;
    padding: 5px 7px 5px 9px;
    padding-left: 40px;
    min-height: 30px;
    }

    .option-input.radio:checked + .app-border {
    background: #d9486d;
    }
    .option-input.radio:disabled,
    .option-input.radio:disabled + .app-border {
    cursor: not-allowed;
    opacity: 0.6;
    }
    .app-label {
    position: relative;
    top: 5px;
    margin-right: 10px;
    }

</style>
@endsection
@section('content')
  @include('admin.layouts.flash-message') 
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Update Slots</h5>
            <div class="card-body">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#monday" aria-controls="monday" aria-selected="true"><i class="tf-icons bx bx-calendar"></i> Monday </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#tuesday" aria-controls="tuesday" aria-selected="false"><i class="tf-icons bx bx-calendar"></i> Tuesday</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#wednesday" aria-controls="wednesday" aria-selected="false"><i class="tf-icons bx bx-calendar"></i> Wednesday</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#thursday" aria-controls="thursday" aria-selected="false"><i class="tf-icons bx bx-calendar"></i> Thursday</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#friday" aria-controls="friday" aria-selected="false"><i class="tf-icons bx bx-calendar"></i> Friday</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#saturday" aria-controls="saturday" aria-selected="false"><i class="tf-icons bx bx-calendar"></i> Saturday</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#sunday" aria-controls="sunday" aria-selected="false"><i class="tf-icons bx bx-calendar"></i> Sunday</button>
                    </li>
                </ul>
                <form action="{{route('admin.update-slots', $slotData->id)}}" method="POST">
                    @csrf()
                    <div class="tab-content">
                        <!-- MONDAY -->
                        @php 
                            $monCount = 0;
                            $tueCount = 0;
                            $wedCount = 0;
                            $thurCount = 0;
                            $friCount = 0;
                            $satCount = 0;
                            $sunCount = 0;
                        @endphp
                        <div class="tab-pane fade show active" id="monday" role="tabpanel">
                            <div class="app-time">
                                <div id="appended-monday">
                                    @forelse($data['monSlot'] as $k => $slot)
                                        <div class="app-check col-md-12" id="monday_div_{{$k}}" style="margin-bottom: 2%;">
                                            <div class="col-md-12 row">
                                                <div>
                                                    <p id="monTimeOnlyExample_{{$k}}" style="display: flex;">
                                                        <input type="text" class="form-control time start" readonly value="{{$slot->slot_start_time}}" name="mon_strt_time[]" id="mon_start_time_{{$k}}" placeholder="Start time" style="margin-right: 5%;" /> to
                                                        <input type="text" class="form-control time end" readonly value="{{$slot->slot_end_time}}" name="mon_end_time[]" id="mon_end_time_{{$k}}" onchange="endTime('#mon_start_time_{{$k}}', '#mon_end_time_{{$k}}', '{{$k}}')" placeholder="End time" style="margin-left: 5%;"/> 
                                                        <input type="text" class="form-control" name="mon_amt[]" readonly value="{{$slot->amount}}" id="mon_amt_{{$k}}" placeholder="Ex: AED 50" style="margin-left: 5%;" />    
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p style="text-align: center;">No Slots Selected</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <!-- TUESDAY -->
                        <div class="tab-pane fade" id="tuesday" role="tabpanel">
                            <div class="app-time">
                                <div id="appended-tuesday">
                                    @forelse($data['tueSlot'] as $k => $slot)
                                        <div class="app-check col-md-6" id="tuesday_div_{{$k}}" style="margin-bottom: 2%;">
                                            <div class="col-md-12 row">
                                                <div>
                                                    <p id="tueTimeOnlyExample_{{$k}}" style="display: flex;">
                                                        <input type="text" class="form-control time start" value="{{$slot->slot_start_time}}" name="tue_strt_time[]" id="tue_start_time_{{$k}}" placeholder="Start time" style="margin-right: 5%;" /> to
                                                        <input type="text" class="form-control time end" value="{{$slot->slot_end_time}}" name="tue_end_time[]" id="tue_end_time_{{$k}}" onchange="endTime('#tue_start_time_{{$k}}', '#tue_end_time_{{$k}}', '{{$k}}')" placeholder="End time" style="margin-left: 5%;"/> 
                                                        <input type="text" class="form-control" name="tue_amt[]" value="{{$slot->amount}}" id="tue_amt_{{$k}}" placeholder="Ex: AED 50" style="margin-left: 5%;" />                        
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p style="text-align: center;">No Slots Selected</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <!-- WEDNESDAY -->
                        <div class="tab-pane fade" id="wednesday" role="tabpanel">
                            <div class="app-time">
                                <div id="appended-wednesday">
                                    @forelse($data['wedSlot'] as $k => $slot)
                                        <div class="app-check col-md-6" id="wednesday_div_{{$k}}" style="margin-bottom: 2%;">
                                            <div class="col-md-12 row">
                                                <div>
                                                    <p id="wedTimeOnlyExample_{{$k}}" style="display: flex;">
                                                        <input type="text" class="form-control time start" value="{{$slot->slot_start_time}}" name="wed_strt_time[]" id="wed_start_time_{{$k}}" placeholder="Start time" style="margin-right: 5%;" /> to
                                                        <input type="text" class="form-control time end" value="{{$slot->slot_end_time}}" name="wed_end_time[]" id="wed_end_time_{{$k}}" onchange="endTime('#wed_start_time_{{$k}}', '#wed_end_time_{{$k}}', '{{$k}}')" placeholder="End time" style="margin-left: 5%;"/> 
                                                        <input type="text" class="form-control" name="wed_amt[]" value="{{$slot->amount}}" id="wed_amt_{{$k}}" placeholder="Ex: AED 50" style="margin-left: 5%;" />                        
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p style="text-align: center;">No Slots Selected</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <!-- THURSDAY -->
                        <div class="tab-pane fade" id="thursday" role="tabpanel">
                            <div class="app-time">
                                <div id="appended-thursday">
                                    @forelse($data['thurSlot'] as $k => $slot)
                                        <div class="app-check col-md-6" id="thursday_div_{{$k}}" style="margin-bottom: 2%;">
                                            <div class="col-md-12 row">
                                                <div>
                                                    <p id="thurTimeOnlyExample_{{$k}}" style="display: flex;">
                                                        <input type="text" class="form-control time start" value="{{$slot->slot_start_time}}" name="thur_strt_time[]" id="thur_start_time_{{$k}}" placeholder="Start time" style="margin-right: 5%;" /> to
                                                        <input type="text" class="form-control time end" value="{{$slot->slot_end_time}}" name="thur_end_time[]" id="thur_end_time_{{$k}}" onchange="endTime('#thur_start_time_{{$k}}', '#thur_end_time_{{$k}}', '{{$k}}')" placeholder="End time" style="margin-left: 5%;"/> 
                                                        <input type="text" class="form-control" name="thur_amt[]" value="{{$slot->amount}}" id="thur_amt_{{$k}}" placeholder="Ex: AED 50" style="margin-left: 5%;" />                        
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p style="text-align: center;">No Slots Selected</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <!-- FRIDAY -->
                        <div class="tab-pane fade" id="friday" role="tabpanel">
                            <div class="app-time">
                                <div id="appended-friday">
                                    @forelse($data['friSlot'] as $k => $slot)
                                        <div class="app-check col-md-6" id="friday_div_{{$k}}" style="margin-bottom: 2%;">
                                            <div class="col-md-12 row">
                                                <div>
                                                    <p id="friTimeOnlyExample_{{$k}}" style="display: flex;">
                                                        <input type="text" class="form-control time start" value="{{$slot->slot_start_time}}" name="fri_strt_time[]" id="fri_start_time_{{$k}}" placeholder="Start time" style="margin-right: 5%;" /> to
                                                        <input type="text" class="form-control time end" value="{{$slot->slot_end_time}}" name="fri_end_time[]" id="fri_end_time_{{$k}}" onchange="endTime('#fri_start_time_{{$k}}', '#fri_end_time_{{$k}}', '{{$k}}')" placeholder="End time" style="margin-left: 5%;"/> 
                                                        <input type="text" class="form-control" name="fri_amt[]" value="{{$slot->amount}}" id="fri_amt_{{$k}}" placeholder="Ex: AED 50" style="margin-left: 5%;" />                        
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p style="text-align: center;">No Slots Selected</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <!-- SATURDAY -->
                        <div class="tab-pane fade" id="saturday" role="tabpanel">
                            <div class="app-time">
                                <div id="appended-saturday">
                                    @forelse($data['satSlot'] as $k => $slot)
                                        <div class="app-check col-md-6" id="saturday_div_{{$k}}" style="margin-bottom: 2%;">
                                            <div class="col-md-12 row">
                                                <div>
                                                    <p id="satTimeOnlyExample_{{$k}}" style="display: flex;">
                                                        <input type="text" class="form-control time start" value="{{$slot->slot_start_time}}" name="sat_strt_time[]" id="sat_start_time_{{$k}}" placeholder="Start time" style="margin-right: 5%;" /> to
                                                        <input type="text" class="form-control time end" value="{{$slot->slot_end_time}}" name="sat_end_time[]" id="sat_end_time_{{$k}}" onchange="endTime('#sat_start_time_{{$k}}', '#sat_end_time_{{$k}}', '{{$k}}')" placeholder="End time" style="margin-left: 5%;"/> 
                                                        <input type="text" class="form-control" name="sat_amt[]" value="{{$slot->amount}}" id="sat_amt_{{$k}}" placeholder="Ex: AED 50" style="margin-left: 5%;" />                        
                                                    </p>
                                                </div>
                                            </div> 
                                        </div>
                                    @empty
                                        <p style="text-align: center;">No Slots Selected</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <!-- SUNDAY -->
                        <div class="tab-pane fade" id="sunday" role="tabpanel">
                            <div class="app-time">
                                <div id="appended-sunday">
                                    @forelse($data['sunSlot'] as $k => $slot)                    
                                        <div class="app-check col-md-6" id="sunday_div_{{$k}}">
                                            <div class="col-md-12 row">
                                                <div>
                                                    <p id="sunTimeOnlyExample_{{$k}}" style="display: flex;">
                                                        <input type="text" class="form-control time start" name="sun_strt_time[]" id="sun_start_time_{{$k}}" placeholder="Start time" style="margin-right: 5%;" /> to
                                                        <input type="text" class="form-control time end" name="sun_end_time[]" id="sun_end_time_{{$k}}" onchange="endTime('#sun_start_time_{{$k}}', '#sun_end_time_{{$k}}', '{{$k}}')" placeholder="End time" style="margin-left: 5%;"/> 
                                                        <input type="text" class="form-control" name="sun_amt[]" id="sun_amt_{{$k}}" placeholder="Ex: AED 50" style="margin-left: 5%;" />                        
                                                    </p>
                                                </div>
                                            </div> 
                                        </div>
                                    @empty
                                        <p style="text-align: center;">No Slots Selected</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" style="float:right;">Submit</button>
                </form>
            </div>
        </div>
    </div>  
@endsection