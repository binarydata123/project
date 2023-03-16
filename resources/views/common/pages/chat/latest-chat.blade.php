@if($message->from_id != auth()->user()->id)
    <div class="incoming_msg">
        <div class="received_msg">
            <div class="received_withd_msg">
                @if(@$attachment->old_name)
                    <p class="chat_p">
                        <a href="{{ route(config('chatify.attachments.download_route_name'), ['fileName'=>@$attachment->new_name, 'ogName'=>@$attachment->old_name]) }}" class="file-download">
                                    <span class="fa fa-file"></span> {{@$attachment->old_name}}</a>
                @else
                    <p class="chat_p"> {{$message->body}}   <i class="fa-thin fa-check-double"></i>
                @endif
                    <span class="time_date" style="color: black;"> {{date('g:i A', strtotime($message->created_at))}}    |    {{$message->created_at->diffForHumans()}}</span>
                </p>
                <input type="hidden" name="" id="to_id" value="{{$message->to_id}}">                                            
            </div>
        </div>
    </div>
@else 
    <div class="outgoing_msg">
        <div class="sent_msg">
            <@if(@$attachment->old_name)
                <p class="chat_p">
                    <a href="{{ route(config('chatify.attachments.download_route_name'), ['fileName'=>@$attachment->new_name, 'ogName'=>@$attachment->old_name]) }}" class="file-download">
                                <span class="fa fa-file"></span> {{@$attachment->old_name}}</a>
            @else
                <p class="chat_p"> {{$message->body}}   <i class="fa-thin fa-check-double"></i>
            @endif
            <span class="time_date"> {{date('g:i A', strtotime($message->created_at))}}    |    {{$message->created_at->diffForHumans()}}</span></p>                                       
        </div>
    </div>
@endif
