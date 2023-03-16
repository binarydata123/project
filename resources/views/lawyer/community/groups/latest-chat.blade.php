@if($message->from_id != auth()->user()->id)
    <small style="color:{{$message->fromUser->messenger_color}}"><strong>{{$message->fromUser->name}}</strong></small>
    <ul>
        <li class="sender color-border">
            <div class="chat-left">
                <p>{{$message->body}}
                </p>
                <h6 class="text-end">{{$message->created_at->diffForHumans()}} {{date('g:i A', strtotime($message->created_at))}} <i
                        class="fa-solid fa-check"></i></h6>
            </div>
        </li>
    </ul>
@else
    <ul>
        <li class="repaly reply-two">
            <div class="chat-left colorchane">
                <p>{{$message->body}}
                </p>
                <h6 class="text-end">{{$message->created_at->diffForHumans()}} {{date('g:i A', strtotime($message->created_at))}} <i
                        class="fa-solid fa-check"></i></h6>
            </div>
        </li>
    </ul>
@endif