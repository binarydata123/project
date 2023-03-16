@if($message->from_id != auth()->user()->id)
    <ul>
        <li class="row col-md-6 sender color-border">
            <div class="chat-left">
                <p>{{$message->body}}</p>
                <h6 class="text-end">{{date('g:i A', strtotime($message->created_at))}}
                    @if($message->seen)
                        <i class="fas fa-check-double"></i>
                    @else 
                        <i class="fa-solid fa-check"></i>
                    @endif
                </h6>
            </div>
        </li>
    </ul>
@else
    <ul>
        <li class="row col-md-6 repaly reply-two">
            <div class="chat-left colorchane">
                <p>{{$message->body}}</p>
                <h6 class="text-end">{{date('g:i A', strtotime($message->created_at))}}
                    @if($message->seen)
                        <i class="fas fa-check-double"></i>
                    @else 
                        <i class="fa-solid fa-check"></i>
                    @endif
                </h6>
            </div>
        </li>
    </ul>
@endif