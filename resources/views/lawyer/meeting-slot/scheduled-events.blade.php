@extends('lawyer.layouts.navbar_content')
@section('title', 'Scheduled Events')
@section('content')
    <div class="row mb-5">
        <a href="{{route('lawyer.slots')}}" type="button" class="btn btn-primary col-md-2">Slots</a>
    </div>
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Scheduled Meetings</h5>
            <div class="card-body">
                <table id="myTable" class="table">
                    <thead>
                        <tr>
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
@endsection