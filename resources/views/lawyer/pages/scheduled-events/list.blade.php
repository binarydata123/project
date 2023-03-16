@extends('lawyer.home.layouts.app')
@section('content')
    <section #dashboard>
        <div id="dashboard" class="px-3 py-5 dashboard font-Poppins-regular">
            <div class="row">
                <div class="col-12">
                    <div class="card card-list">
                        <div class="row" style="display: flex;">
                            <div class="col-12" id="feed">
                                <span class="list-header">Scheduled Meetings</span>                
                                <div class="col-1 create-service-btn-card" id="create-service-btn-card-id" style="float:right;margin: 1% 0 6%;">
                                    <button class="create-service-button" onclick="addSlots()">
                                        <span style="vertical-align: text-bottom;" class="add-plus-btn">+ </span> 
                                        <span style="font: 24px 'Poppins-Bold';" class="add-service-txt"> Add Slots</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="myTable" class="row-border">
                                <thead>
                                    <tr style="color:#156075;font-size: 18px;" class="service-list-table-header">
                                        <th style="text-align: center;">Date</th>
                                        <th style="text-align: center;">Slot</th>
                                        <th style="text-align: center;">Amount</th>
                                        <th style="text-align: center;">Platform Fee</th>
                                        <th style="text-align: center;">Meeting Link</th>
                                        <th style="text-align: center;">Scheduled By</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach($scheduledMeetings as $k => $meeting)
                                        <tr style="text-align: center;">
                                            @php $startDateTime = $meeting->zoom ? new  \DateTime($meeting->zoom->start_date_time) : null; @endphp
                                            @if($startDateTime)
                                                <td>{{$startDateTime->format('Y-m-d')}}</td>
                                            @else 
                                                <td>-</td>
                                            @endif
                                            <td>{{$meeting->daysSlot->slot_start_time .'-'. $meeting->daysSlot->slot_end_time}}</td>
                                            <td>{{preg_replace('/[^0-9]/', '', $meeting->daysSlot->amount) + $meeting->daysSlot->getPlatformFee($meeting->days_slot_id, $meeting->lawyer_id)}}</td>
                                            <td>{{$meeting->daysSlot->getPlatformFee($meeting->days_slot_id, $meeting->lawyer_id)}}</td>
                                            @if($meeting->zoom)
                                                <td><a href="{{$meeting->zoom->join_url}}" target="_blank">Click here to join</a></td>
                                            @else 
                                                <td>No meeting link generated</td>
                                            @endif
                                            <td>{{$meeting->scheduledBy->name}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        function addSlots() {
            window.location.href = "/lawyer/slots";
        }
    </script>
@endpush